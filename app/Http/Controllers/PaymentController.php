<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Crear enlace de pago de Stripe para el carrito
     */
    public function createPaymentLink(Request $request)
    {
        $user = Auth::user();

        // Log para debug
        Log::info('Payment link creation started', [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_type' => $user->tipo_usuario_id
        ]);

        // Obtener items del carrito
        $cartItems = CartItem::with('curso')->where('user_id', $user->id)->get();

        Log::info('Cart items found', [
            'count' => $cartItems->count(),
            'items' => $cartItems->map(function($item) {
                return [
                    'curso_id' => $item->curso_id,
                    'titulo' => $item->curso->titulo,
                    'precio' => $item->curso->precio,
                    'quantity' => $item->quantity
                ];
            })
        ]);

        if ($cartItems->isEmpty()) {
            Log::warning('Empty cart for payment', ['user_id' => $user->id]);
            return redirect()->route('carrito.index')->with('error', 'Tu carrito está vacío.');
        }

        // Calcular total
        $total = $cartItems->reduce(function ($carry, $item) {
            return $carry + (($item->curso->precio ?? 0) * $item->quantity);
        }, 0);

        // Crear descripción del pedido
        $description = $this->createOrderDescription($cartItems);

        // Generar ID único para esta sesión de pago
        $paymentSessionId = Str::uuid();

        // Guardar información de la sesión de pago en la sesión
        session([
            'payment_session_id' => $paymentSessionId,
            'payment_items' => $cartItems->map(function ($item) {
                return [
                    'curso_id' => $item->curso_id,
                    'quantity' => $item->quantity,
                    'precio' => $item->curso->precio,
                    'titulo' => $item->curso->titulo
                ];
            })->toArray(),
            'payment_total' => $total,
            'payment_description' => $description
        ]);

        // Crear enlace de pago de Stripe
        Log::info('Creating Stripe payment link', [
            'total' => $total,
            'description' => $description,
            'payment_session_id' => $paymentSessionId
        ]);

        $stripePaymentLink = $this->createStripePaymentLink($total, $description, $paymentSessionId);

        if (!$stripePaymentLink) {
            Log::error('Failed to create Stripe payment link', [
                'user_id' => $user->id,
                'total' => $total
            ]);
            return redirect()->route('carrito.index')->with('error', 'Error al crear el enlace de pago. Inténtalo de nuevo.');
        }

        Log::info('Stripe payment link created successfully', [
            'user_id' => $user->id,
            'payment_link' => $stripePaymentLink
        ]);

        // Redirigir al enlace de pago de Stripe
        return redirect($stripePaymentLink);
    }

    /**
     * Crear descripción del pedido
     */
    private function createOrderDescription($cartItems)
    {
        $items = $cartItems->map(function ($item) {
            $quantity = $item->quantity > 1 ? " (x{$item->quantity})" : "";
            return "• {$item->curso->titulo}{$quantity}";
        })->join("\n");

        return "Cursos de SoftLinkIA:\n" . $items;
    }

    /**
     * Crear enlace de pago de Stripe usando Payment Links
     */
    private function createStripePaymentLink($amount, $description, $paymentSessionId)
    {
        try {
            // Configurar Stripe (usar tu clave secreta)
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            // Crear producto en Stripe
            $product = \Stripe\Product::create([
                'name' => 'Cursos SoftLinkIA',
                'description' => $description,
                'metadata' => [
                    'payment_session_id' => $paymentSessionId,
                    'user_id' => Auth::id(),
                    'platform' => 'SoftLinkIA'
                ]
            ]);

            // Crear precio
            $price = \Stripe\Price::create([
                'product' => $product->id,
                'unit_amount' => $amount * 100, // Stripe usa centavos
                'currency' => 'mxn',
                'metadata' => [
                    'payment_session_id' => $paymentSessionId
                ]
            ]);

            // Crear Payment Link
            $paymentLink = \Stripe\PaymentLink::create([
                'line_items' => [
                    [
                        'price' => $price->id,
                        'quantity' => 1,
                    ],
                ],
                'metadata' => [
                    'payment_session_id' => $paymentSessionId,
                    'user_id' => Auth::id()
                ],
                'after_completion' => [
                    'type' => 'redirect',
                    'redirect' => [
                        'url' => 'http://127.0.0.1:8000/payment/success'
                    ]
                ],
                'allow_promotion_codes' => true,
                'billing_address_collection' => 'required',
                'shipping_address_collection' => [
                    'allowed_countries' => ['US', 'MX', 'CA', 'ES', 'AR', 'CO', 'PE', 'CL', 'VE', 'EC', 'UY', 'PY', 'BO', 'CR', 'PA', 'GT', 'HN', 'SV', 'NI', 'DO', 'HT', 'JM']
                ]
            ]);

            return $paymentLink->url;

        } catch (\Exception $e) {
            Log::error('Error creating Stripe payment link: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Manejar éxito del pago
     */
    public function paymentSuccess(Request $request)
    {
        $paymentSessionId = session('payment_session_id');

        if (!$paymentSessionId) {
            return redirect()->route('carrito.index')->with('error', 'Sesión de pago no encontrada.');
        }

        try {
            // Verificar el pago en Stripe
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            // Buscar sesiones de pago completadas
            $sessions = \Stripe\Checkout\Session::all([
                'limit' => 10,
                'status' => 'complete'
            ]);

            $paymentFound = false;
            foreach ($sessions->data as $session) {
                if (isset($session->metadata['payment_session_id']) &&
                    $session->metadata['payment_session_id'] === $paymentSessionId) {
                    $paymentFound = true;
                    break;
                }
            }

            if (!$paymentFound) {
                return redirect()->route('carrito.index')->with('error', 'No se pudo verificar el pago.');
            }

            // Procesar inscripciones
            $this->processEnrollments($paymentSessionId);

            // Limpiar carrito
            CartItem::where('user_id', Auth::id())->delete();

            // Limpiar sesión de pago
            session()->forget(['payment_session_id', 'payment_items', 'payment_total', 'payment_description']);

            return redirect()->route('usuario.cursos.adquiridos')->with('success', '¡Pago exitoso! Ya tienes acceso a tus cursos.');

        } catch (\Exception $e) {
            Log::error('Error processing payment success: ' . $e->getMessage());
            return redirect()->route('carrito.index')->with('error', 'Error al procesar el pago. Contacta soporte.');
        }
    }

    /**
     * Procesar inscripciones después del pago exitoso
     */
    private function processEnrollments($paymentSessionId)
    {
        $paymentItems = session('payment_items', []);

        foreach ($paymentItems as $item) {
            // Verificar si ya está inscrito
            $existingEnrollment = Inscripcion::where('usuario_id', Auth::id())
                ->where('curso_id', $item['curso_id'])
                ->where('status', 'activo')
                ->first();

            if (!$existingEnrollment) {
                // Crear nueva inscripción
                Inscripcion::create([
                    'usuario_id' => Auth::id(),
                    'curso_id' => $item['curso_id'],
                    'status' => 'activo',
                    'fecha_inscripcion' => now(),
                    'metodo_pago' => 'stripe',
                    'monto_pagado' => $item['precio'] * $item['quantity']
                ]);

                Log::info("Usuario inscrito en curso", [
                    'user_id' => Auth::id(),
                    'curso_id' => $item['curso_id'],
                    'payment_session_id' => $paymentSessionId
                ]);
            }
        }
    }

    /**
     * Manejar cancelación del pago
     */
    public function paymentCancel()
    {
        return redirect()->route('carrito.index')->with('info', 'Pago cancelado. Puedes intentar de nuevo cuando quieras.');
    }
}
