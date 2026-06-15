<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Store a newly created contact form submission.
     */
    public function store(Request $request)
    {
        try {
            // Obtener configuración
            $limits = config('contact.limits');
            
            // Validar los datos del formulario
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:' . $limits['max_name_length'],
                'compania' => 'required|string|max:' . $limits['max_company_length'],
                'industria' => 'required|string|max:255',
                'telefono' => 'nullable|string|max:20',
                'email' => 'required|email|max:255',
                'tipo_consulta' => 'required|string|max:255',
                'profesionales' => 'required|integer|min:' . $limits['min_professionals'] . '|max:' . $limits['max_professionals'],
                'mensaje' => 'required|string|max:' . $limits['max_message_length'],
                'tecnologias' => 'nullable|array',
                'tecnologias.*' => 'string|max:100',
                'donde_encontraste' => 'required|string|max:255',
            ], [
                'nombre.required' => 'El nombre es requerido',
                'compania.required' => 'La compañía es requerida',
                'industria.required' => 'La industria es requerida',
                'email.required' => 'El correo electrónico es requerido',
                'email.email' => 'El correo electrónico debe ser válido',
                'tipo_consulta.required' => 'El tipo de consulta es requerido',
                'profesionales.required' => 'El número de profesionales es requerido',
                'profesionales.integer' => 'El número de profesionales debe ser un número',
                'profesionales.min' => 'Se requiere al menos 1 profesional',
                'profesionales.max' => 'El máximo de profesionales es 50',
                'mensaje.required' => 'El mensaje es requerido',
                'donde_encontraste.required' => 'La información sobre dónde nos encontraste es requerida',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Por favor corrige los errores en el formulario',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Preparar los datos para el email
            $data = [
                'nombre' => $request->nombre,
                'compania' => $request->compania,
                'industria' => $request->industria,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'tipo_consulta' => $request->tipo_consulta,
                'profesionales' => $request->profesionales,
                'mensaje' => $request->mensaje,
                'tecnologias' => $request->tecnologias ? implode(', ', $request->tecnologias) : 'Ninguna seleccionada',
                'donde_encontraste' => $request->donde_encontraste,
                'fecha_envio' => now()->format('d/m/Y H:i:s'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ];

            // Log de la información para debugging
            if (config('contact.log_submissions', true)) {
                Log::info('Nuevo formulario de contacto recibido', [
                    'email' => $data['email'],
                    'compania' => $data['compania'],
                    'tipo_consulta' => $data['tipo_consulta'],
                    'ip' => $data['ip_address']
                ]);
            }

            // Enviar email si está habilitado
            if (config('contact.send_emails', true)) {
                try {
                    Mail::send('emails.contact-form', $data, function ($message) use ($data) {
                        $message->to(config('contact.email_to'), config('contact.company_name'))
                                ->subject('Nuevo formulario de contacto - ' . $data['compania'])
                                ->replyTo($data['email'], $data['nombre']);
                    });
                    
                    Log::info('Email de formulario de contacto enviado exitosamente', [
                        'email' => $data['email'],
                        'compania' => $data['compania']
                    ]);
                } catch (\Exception $emailError) {
                    Log::error('Error al enviar email de formulario de contacto', [
                        'error' => $emailError->getMessage(),
                        'email' => $data['email'],
                        'compania' => $data['compania']
                    ]);
                    // No fallar el proceso si el email falla
                }
            }

            // Log del procesamiento exitoso
            if (config('contact.log_submissions', true)) {
                Log::info('Formulario de contacto procesado exitosamente', $data);
            }

            return response()->json([
                'success' => true,
                'message' => '¡Formulario enviado exitosamente! Nos pondremos en contacto contigo pronto.',
                'data' => [
                    'nombre' => $data['nombre'],
                    'compania' => $data['compania'],
                    'email' => $data['email']
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error al procesar formulario de contacto', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar tu solicitud. Por favor intenta nuevamente.',
                'error' => config('app.debug') ? $e->getMessage() : 'Error interno del servidor'
            ], 500);
        }
    }
}
