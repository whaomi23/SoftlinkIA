<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validar el email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Por favor, ingresa un email válido.'
            ], 400);
        }

        $email = $request->input('email');

        try {
            // Enviar email de bienvenida al newsletter usando la vista
            Mail::send('emails.newsletter-welcome', [
                'email' => $email
            ], function ($message) use ($email) {
                $message->to($email)
                    ->subject('¡Bienvenido a SoftLinkIA Newsletter!')
                    ->from(config('mail.from.address'), config('mail.from.name'));
            });

            return response()->json([
                'success' => true,
                'message' => '¡Gracias por suscribirte! Te hemos enviado un email de confirmación.'
            ]);

        } catch (\Exception $e) {
            Log::error('Error sending newsletter email: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar tu suscripción. Por favor, inténtalo de nuevo.'
            ], 500);
        }
    }
}