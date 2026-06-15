<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Inscripcion;
use App\Models\User;
use App\Mail\CoursePurchaseConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    /**
     * Manejar webhooks de Stripe
     */
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\UnexpectedValueException $e) {
            Log::error('Invalid payload in Stripe webhook: ' . $e->getMessage());
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::error('Invalid signature in Stripe webhook: ' . $e->getMessage());
            return response('Invalid signature', 400);
        }

        // Manejar diferentes tipos de eventos
        switch ($event->type) {
            case 'checkout.session.completed':
                $this->handleCheckoutSessionCompleted($event->data->object);
                break;
            case 'payment_intent.succeeded':
                $this->handlePaymentIntentSucceeded($event->data->object);
                break;
            case 'payment_intent.payment_failed':
                $this->handlePaymentIntentFailed($event->data->object);
                break;
            default:
                Log::info('Unhandled Stripe webhook event type: ' . $event->type);
        }

        return response('Webhook handled', 200);
    }

    /**
     * Manejar sesión de checkout completada
     */
    private function handleCheckoutSessionCompleted($session)
    {
        Log::info('Checkout session completed', [
            'session_id' => $session->id,
            'payment_status' => $session->payment_status,
            'metadata' => $session->metadata
        ]);

        // Si el pago fue exitoso, procesar inscripciones
        if ($session->payment_status === 'paid') {
            $this->processEnrollmentsFromWebhook($session);
        }
    }

    /**
     * Manejar pago exitoso
     */
    private function handlePaymentIntentSucceeded($paymentIntent)
    {
        Log::info('Payment intent succeeded', [
            'payment_intent_id' => $paymentIntent->id,
            'amount' => $paymentIntent->amount,
            'metadata' => $paymentIntent->metadata
        ]);
    }

    /**
     * Manejar pago fallido
     */
    private function handlePaymentIntentFailed($paymentIntent)
    {
        Log::warning('Payment intent failed', [
            'payment_intent_id' => $paymentIntent->id,
            'amount' => $paymentIntent->amount,
            'last_payment_error' => $paymentIntent->last_payment_error
        ]);
    }

    /**
     * Procesar inscripciones desde webhook
     */
    private function processEnrollmentsFromWebhook($session)
    {
        $paymentSessionId = $session->metadata['payment_session_id'] ?? null;
        $userId = $session->metadata['user_id'] ?? null;

        if (!$paymentSessionId || !$userId) {
            Log::error('Missing metadata in Stripe session', [
                'session_id' => $session->id,
                'metadata' => $session->metadata
            ]);
            return;
        }

        // Obtener usuario
        $user = User::find($userId);
        if (!$user) {
            Log::error('User not found for webhook processing', [
                'user_id' => $userId,
                'session_id' => $session->id
            ]);
            return;
        }

        // Buscar items del carrito en la sesión
        $cartItems = CartItem::with('curso')->where('user_id', $userId)->get();
        $inscripcionesCreadas = collect();
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            // Verificar si ya está inscrito
            $existingEnrollment = Inscripcion::where('usuario_id', $userId)
                ->where('curso_id', $item->curso_id)
                ->where('status', 'activo')
                ->first();

            if (!$existingEnrollment) {
                // Crear nueva inscripción
                $inscripcion = Inscripcion::create([
                    'usuario_id' => $userId,
                    'curso_id' => $item->curso_id,
                    'status' => 'activo',
                    'fecha_inscripcion' => now(),
                    'metodo_pago' => 'stripe',
                    'monto_pagado' => $item->curso->precio * $item->quantity,
                    'stripe_session_id' => $session->id
                ]);

                $inscripcionesCreadas->push($inscripcion);
                $totalAmount += $item->curso->precio * $item->quantity;

                Log::info('Enrollment created from webhook', [
                    'user_id' => $userId,
                    'curso_id' => $item->curso_id,
                    'session_id' => $session->id
                ]);
            }
        }

        // Limpiar carrito
        CartItem::where('user_id', $userId)->delete();

        Log::info('Cart cleared after successful payment', [
            'user_id' => $userId,
            'session_id' => $session->id
        ]);

        // Enviar correo de confirmación si se crearon inscripciones
        if ($inscripcionesCreadas->count() > 0) {
            try {
                // Cargar las relaciones necesarias para el correo
                $inscripcionesConCursos = Inscripcion::with('curso')
                    ->whereIn('id', $inscripcionesCreadas->pluck('id'))
                    ->get();

                Mail::to($user->email)->send(new CoursePurchaseConfirmation(
                    $user,
                    $inscripcionesConCursos,
                    $totalAmount,
                    $session->id
                ));

                Log::info('Purchase confirmation email sent', [
                    'user_id' => $userId,
                    'email' => $user->email,
                    'courses_count' => $inscripcionesConCursos->count(),
                    'total_amount' => $totalAmount,
                    'session_id' => $session->id
                ]);

            } catch (\Exception $e) {
                Log::error('Failed to send purchase confirmation email', [
                    'user_id' => $userId,
                    'email' => $user->email,
                    'error' => $e->getMessage(),
                    'session_id' => $session->id
                ]);
            }
        }
    }
}
