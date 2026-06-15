<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PayPalController extends Controller
{
    /**
     * Obtener token de acceso de PayPal
     */
    private function getAccessToken()
    {
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');
        $mode = config('services.paypal.mode', 'sandbox'); // sandbox o live

        // Validar que las credenciales estén configuradas
        if (empty($clientId) || empty($clientSecret)) {
            Log::error('Credenciales de PayPal no configuradas', [
                'client_id_set' => !empty($clientId),
                'client_secret_set' => !empty($clientSecret)
            ]);
            return null;
        }

        $baseUrl = $mode === 'live'
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';

        try {
            $response = Http::asForm()->withBasicAuth($clientId, $clientSecret)
                ->post("{$baseUrl}/v1/oauth2/token", [
                    'grant_type' => 'client_credentials'
                ]);

            if ($response->successful()) {
                return $response->json()['access_token'];
            }

            Log::error('Error obteniendo token de PayPal', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('Excepción al obtener token de PayPal: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Crear orden de pago en PayPal
     */
    public function createOrder(Request $request)
    {
        $user = Auth::user();

        Log::info('PayPal order creation started', [
            'user_id' => $user->id,
            'user_name' => $user->name
        ]);

        // Obtener items del carrito
        $cartItems = CartItem::with('curso')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            Log::warning('Empty cart for PayPal payment', ['user_id' => $user->id]);
            return response()->json([
                'success' => false,
                'message' => 'Tu carrito está vacío.'
            ], 400);
        }

        // Calcular total
        $total = $cartItems->reduce(function ($carry, $item) {
            return $carry + (($item->curso->precio ?? 0) * $item->quantity);
        }, 0);

        // Generar ID único para esta sesión de pago
        $paymentSessionId = Str::uuid();

        // Guardar información de la sesión de pago
        session([
            'paypal_payment_session_id' => $paymentSessionId,
            'paypal_payment_items' => $cartItems->map(function ($item) {
                return [
                    'curso_id' => $item->curso_id,
                    'quantity' => $item->quantity,
                    'precio' => $item->curso->precio,
                    'titulo' => $item->curso->titulo
                ];
            })->toArray(),
            'paypal_payment_total' => $total
        ]);

        // Obtener token de acceso
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            $clientId = config('services.paypal.client_id');
            $clientSecret = config('services.paypal.client_secret');

            // Mensaje más específico si las credenciales no están configuradas
            if (empty($clientId) || empty($clientSecret)) {
                Log::error('PayPal credentials not configured in .env file');
                return response()->json([
                    'success' => false,
                    'message' => 'Las credenciales de PayPal no están configuradas. Por favor, configura PAYPAL_CLIENT_ID y PAYPAL_CLIENT_SECRET en el archivo .env'
                ], 500);
            }

            return response()->json([
                'success' => false,
                'message' => 'Error al conectar con PayPal. Verifica tus credenciales e inténtalo de nuevo.'
            ], 500);
        }

        // Preparar items para PayPal
        $paypalItems = $cartItems->map(function ($item) {
            return [
                'name' => $item->curso->titulo,
                'description' => substr($item->curso->descripcion ?? 'Curso de SoftLinkIA', 0, 127),
                'quantity' => (string)$item->quantity,
                'unit_amount' => [
                    'currency_code' => 'MXN',
                    'value' => number_format($item->curso->precio, 2, '.', '')
                ]
            ];
        })->toArray();

        $mode = config('services.paypal.mode', 'sandbox');
        $baseUrl = $mode === 'live'
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';

        $returnUrl = route('paypal.success');
        $cancelUrl = route('paypal.cancel');

        // Crear orden en PayPal
        try {
            $response = Http::withToken($accessToken)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ])
                ->post("{$baseUrl}/v2/checkout/orders", [
                    'intent' => 'CAPTURE',
                    'purchase_units' => [
                        [
                            'reference_id' => $paymentSessionId,
                            'description' => 'Cursos de SoftLinkIA',
                            'custom_id' => $paymentSessionId,
                            'amount' => [
                                'currency_code' => 'MXN',
                                'value' => number_format($total, 2, '.', ''),
                                'breakdown' => [
                                    'item_total' => [
                                        'currency_code' => 'MXN',
                                        'value' => number_format($total, 2, '.', '')
                                    ]
                                ]
                            ],
                            'items' => $paypalItems
                        ]
                    ],
                    'application_context' => [
                        'brand_name' => 'SoftLinkIA',
                        'landing_page' => 'BILLING',
                        'user_action' => 'PAY_NOW',
                        'return_url' => $returnUrl,
                        'cancel_url' => $cancelUrl,
                        'locale' => 'es-MX'
                    ]
                ]);

            if ($response->successful()) {
                $order = $response->json();

                Log::info('PayPal order created successfully', [
                    'user_id' => $user->id,
                    'order_id' => $order['id'],
                    'payment_session_id' => $paymentSessionId
                ]);

                // Guardar order_id en sesión
                session(['paypal_order_id' => $order['id']]);

                // Buscar link de aprobación (para flujo de redirect, si se necesita)
                $approveLink = collect($order['links'])->firstWhere('rel', 'approve');

                // Devolver respuesta con order_id (requerido por JS SDK)
                return response()->json([
                    'success' => true,
                    'order_id' => $order['id'],
                    'approve_url' => $approveLink['href'] ?? null // Opcional, para compatibilidad
                ]);
            }

            Log::error('Error creating PayPal order', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error al crear la orden de pago. Inténtalo de nuevo.'
            ], 500);

        } catch (\Exception $e) {
            Log::error('Excepción al crear orden de PayPal: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error de conexión con PayPal. Inténtalo de nuevo.'
            ], 500);
        }
    }

    /**
     * Capturar el pago después de la aprobación
     */
    public function captureOrder(Request $request)
    {
        // Obtener orderID desde el body (JS SDK) o desde query/token (redirect flow)
        $orderId = $request->input('orderID') ?? $request->input('token') ?? session('paypal_order_id');

        if (!$orderId) {
            // Si es una petición AJAX, devolver JSON
            if ($request->expectsJson() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Orden de pago no encontrada.'
                ], 400);
            }
            return redirect()->route('carrito.index')->with('error', 'Orden de pago no encontrada.');
        }

        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            if ($request->expectsJson() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al conectar con PayPal.'
                ], 500);
            }
            return redirect()->route('carrito.index')->with('error', 'Error al conectar con PayPal.');
        }

        $mode = config('services.paypal.mode', 'sandbox');
        $baseUrl = $mode === 'live'
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';

        try {
            // Capturar el pago
            $response = Http::withToken($accessToken)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ])
                ->post("{$baseUrl}/v2/checkout/orders/{$orderId}/capture");

            if ($response->successful()) {
                $order = $response->json();

                if ($order['status'] === 'COMPLETED') {
                    // Procesar inscripciones
                    $paymentSessionId = session('paypal_payment_session_id');
                    $this->processEnrollments($paymentSessionId, 'paypal');

                    // Limpiar carrito
                    CartItem::where('user_id', Auth::id())->delete();

                    // Limpiar sesión
                    session()->forget([
                        'paypal_payment_session_id',
                        'paypal_payment_items',
                        'paypal_payment_total',
                        'paypal_order_id'
                    ]);

                    Log::info('PayPal payment completed successfully', [
                        'user_id' => Auth::id(),
                        'order_id' => $orderId,
                        'payment_id' => $order['purchase_units'][0]['payments']['captures'][0]['id'] ?? null
                    ]);

                    // Si es una petición AJAX (JS SDK), devolver JSON
                    if ($request->expectsJson() || $request->wantsJson()) {
                        return response()->json([
                            'success' => true,
                            'message' => '¡Pago exitoso con PayPal! Ya tienes acceso a tus cursos.',
                            'order_id' => $orderId
                        ]);
                    }

                    return redirect()->route('usuario.cursos.adquiridos')
                        ->with('success', '¡Pago exitoso con PayPal! Ya tienes acceso a tus cursos.');
                }
            }

            Log::error('Error capturing PayPal order', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            $errorMessage = 'No se pudo completar el pago. Inténtalo de nuevo.';

            if ($request->expectsJson() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 500);
            }

            return redirect()->route('carrito.index')
                ->with('error', $errorMessage);

        } catch (\Exception $e) {
            Log::error('Excepción al capturar orden de PayPal: ' . $e->getMessage());

            $errorMessage = 'Error al procesar el pago. Contacta soporte.';

            if ($request->expectsJson() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 500);
            }

            return redirect()->route('carrito.index')
                ->with('error', $errorMessage);
        }
    }

    /**
     * Manejar éxito del pago (callback de PayPal)
     */
    public function success(Request $request)
    {
        // PayPal redirige aquí después de la aprobación
        // Necesitamos capturar el pago
        return $this->captureOrder($request);
    }

    /**
     * Manejar cancelación del pago
     */
    public function cancel()
    {
        // Limpiar sesión de PayPal
        session()->forget([
            'paypal_payment_session_id',
            'paypal_payment_items',
            'paypal_payment_total',
            'paypal_order_id'
        ]);

        return redirect()->route('carrito.index')
            ->with('info', 'Pago cancelado. Puedes intentar de nuevo cuando quieras.');
    }

    /**
     * Procesar inscripciones después del pago exitoso
     */
    private function processEnrollments($paymentSessionId, $metodoPago = 'paypal')
    {
        $paymentItems = session('paypal_payment_items', []);

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
                    'metodo_pago' => $metodoPago,
                    'monto_pagado' => $item['precio'] * $item['quantity']
                ]);

                Log::info("Usuario inscrito en curso via PayPal", [
                    'user_id' => Auth::id(),
                    'curso_id' => $item['curso_id'],
                    'payment_session_id' => $paymentSessionId
                ]);
            }
        }
    }
}

