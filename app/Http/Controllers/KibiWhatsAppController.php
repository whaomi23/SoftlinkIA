<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KibiContact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class KibiWhatsAppController extends Controller
{
    /**
     * Mostrar formulario de envío de WhatsApp
     */
    public function show(KibiContact $contacto)
    {
        // Verificar que el usuario sea de marketing
        if (!Auth::user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        return view('KIBI.admin.dashboard.contactos-solicitudes.send-whatsapp', compact('contacto'));
    }

    /**
     * Enviar mensaje de WhatsApp
     */
    public function send(Request $request, KibiContact $contacto)
    {
        // Verificar que el usuario sea de marketing
        if (!Auth::user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        $request->validate([
            'message' => 'required|string|max:1000',
            'template' => 'nullable|string|in:demo,proposal,followup,custom'
        ]);

        try {
            // Preparar el número de teléfono (agregar código de país si no lo tiene)
            $phoneNumber = $this->formatPhoneNumber($contacto->celular);

            // Preparar el mensaje
            $message = $this->prepareMessage($request->message, $contacto, $request->template);

            // Enviar mensaje usando WhatsApp Business API
            $response = $this->sendWhatsAppMessage($phoneNumber, $message);

            if ($response['success']) {
                // Actualizar el contacto como contactado
                $contacto->marcarComoContactado();
                $contacto->cambiarStatus('contactado');

                // Log del envío exitoso
                Log::info('Mensaje de WhatsApp enviado exitosamente', [
                    'contacto_id' => $contacto->id,
                    'telefono' => $phoneNumber,
                    'usuario' => Auth::user()->email,
                    'template' => $request->template,
                    'timestamp' => now(),
                ]);

                return redirect()
                    ->route('kibi.contacts.show', $contacto)
                    ->with('success', 'Mensaje de WhatsApp enviado exitosamente a ' . $contacto->nombre_completo);
            } else {
                throw new \Exception($response['error']);
            }

        } catch (\Exception $e) {
            Log::error('Error al enviar mensaje de WhatsApp', [
                'contacto_id' => $contacto->id,
                'telefono' => $contacto->celular,
                'usuario' => Auth::user()->email,
                'error' => $e->getMessage(),
                'timestamp' => now(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Error al enviar el mensaje: ' . $e->getMessage());
        }
    }

    /**
     * Formatear número de teléfono para WhatsApp
     */
    private function formatPhoneNumber($phone)
    {
        // Remover caracteres no numéricos
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Si no tiene código de país, agregar +52 (México)
        if (strlen($phone) == 10) {
            $phone = '52' . $phone;
        } elseif (strlen($phone) == 12 && substr($phone, 0, 2) == '52') {
            // Ya tiene código de país
        } else {
            // Asumir que es un número mexicano
            $phone = '52' . $phone;
        }

        return $phone;
    }

    /**
     * Preparar mensaje según plantilla
     */
    private function prepareMessage($message, $contacto, $template = null)
    {
        if ($template && $template !== 'custom') {
            $templates = $this->getMessageTemplates();
            $message = $templates[$template] ?? $message;
        }

        // Reemplazar variables en el mensaje
        $message = str_replace('{{nombre}}', $contacto->nombre, $message);
        $message = str_replace('{{institucion}}', $contacto->institucion, $message);
        $message = str_replace('{{puesto}}', $contacto->puesto, $message);

        return $message;
    }

    /**
     * Obtener plantillas de mensajes
     */
    private function getMessageTemplates()
    {
        return [
            'demo' => "¡Hola {{nombre}}! 👋

Soy del equipo de KIBI, la plataforma educativa innovadora. Me gustaría agendar una demostración personalizada para {{institucion}}.

¿Tendrías 15 minutos esta semana para mostrarte cómo KIBI puede transformar la experiencia educativa?

¡Gracias! 🚀",

            'proposal' => "¡Hola {{nombre}}! 👋

Te envío la propuesta comercial de KIBI para {{institucion}}.

KIBI incluye:
✅ Contenido educativo interactivo
✅ Seguimiento del progreso estudiantil
✅ Plataforma intuitiva y fácil de usar
✅ Soporte técnico especializado

¿Podríamos agendar una llamada para resolver cualquier duda?

¡Saludos! 📚",

            'followup' => "¡Hola {{nombre}}! 👋

Espero que hayas podido revisar la información de KIBI que te envié.

¿Tienes alguna pregunta sobre cómo KIBI puede beneficiar a {{institucion}}?

Estoy aquí para ayudarte con cualquier consulta.

¡Gracias! 🤝"
        ];
    }

    /**
     * Enviar mensaje usando WhatsApp Business API
     */
    private function sendWhatsAppMessage($phoneNumber, $message)
    {
        try {
            // Configuración de WhatsApp Business API
            $accessToken = env('WHATSAPP_ACCESS_TOKEN');
            $phoneNumberId = env('WHATSAPP_PHONE_NUMBER_ID');
            $apiVersion = env('WHATSAPP_API_VERSION', 'v18.0');

            if (!$accessToken || !$phoneNumberId) {
                // Si no hay configuración de API, simular envío para desarrollo
                Log::info('WhatsApp API no configurada - Simulando envío', [
                    'telefono' => $phoneNumber,
                    'mensaje' => substr($message, 0, 100) . '...'
                ]);

                return [
                    'success' => true,
                    'message_id' => 'simulated_' . time(),
                    'note' => 'Mensaje simulado - Configura WhatsApp Business API para envío real'
                ];
            }

            $url = "https://graph.facebook.com/{$apiVersion}/{$phoneNumberId}/messages";

            $data = [
                'messaging_product' => 'whatsapp',
                'to' => $phoneNumber,
                'type' => 'text',
                'text' => [
                    'body' => $message
                ]
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json'
            ])->post($url, $data);

            if ($response->successful()) {
                $responseData = $response->json();
                return [
                    'success' => true,
                    'message_id' => $responseData['messages'][0]['id'] ?? null
                ];
            } else {
                return [
                    'success' => false,
                    'error' => 'Error de API: ' . $response->body()
                ];
            }

        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
