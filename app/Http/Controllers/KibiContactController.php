<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\KibiContact;

class KibiContactController extends Controller
{
    /**
     * Mostrar formulario de contacto de KIBI
     */
    public function show()
    {
        return view('kibi.contact-form');
    }

    /**
     * Procesar formulario de contacto de KIBI
     */
    public function store(Request $request)
    {
        // Log para debug - verificar si llegan los datos
        Log::info('KibiContactController@store - Datos recibidos:', [
            'all_data' => $request->all(),
            'method' => $request->method(),
            'url' => $request->url(),
            'timestamp' => now(),
        ]);

        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'celular' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'institucion' => 'required|string|max:255',
                'puesto' => 'required|string|max:255',
                'ciudad' => 'required|string|max:255',
                'estado' => 'required|string|max:255',
                'sitio_web' => 'nullable|url|max:255',
                'terminos' => 'required',
                'whatsapp' => 'nullable|boolean',
                'email_contact' => 'nullable|boolean',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Si es una petición AJAX, devolver JSON con errores de validación
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Por favor corrige los errores en el formulario.',
                    'errors' => $e->errors()
                ], 422);
            }
            
            // Si no es AJAX, redirigir con errores
            throw $e;
        }

        // Validar términos manualmente
        if (!$request->has('terminos') || $request->input('terminos') !== '1') {
            $errorMessage = 'Debes aceptar los términos y condiciones.';

            // Si es una petición AJAX, devolver JSON con error
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'errors' => ['terminos' => [$errorMessage]]
                ], 422);
            }

            return back()->withErrors(['terminos' => $errorMessage])
                ->withInput();
        }

        try {
            // Guardar contacto en la base de datos
            $contacto = KibiContact::create([
                'nombre' => $validated['nombre'],
                'apellidos' => $validated['apellidos'],
                'celular' => $validated['celular'],
                'email' => $validated['email'],
                'institucion' => $validated['institucion'],
                'puesto' => $validated['puesto'],
                'ciudad' => $validated['ciudad'],
                'estado' => $validated['estado'],
                'sitio_web' => $validated['sitio_web'] ?? null,
                'whatsapp' => $request->input('whatsapp') === '1',
                'email_contact' => $request->input('email_contact') === '1',
                'status' => 'nuevo',
            ]);

            // Log del formulario recibido
            Log::info('Formulario de contacto KIBI recibido y guardado', [
                'contacto_id' => $contacto->id,
                'nombre' => $contacto->nombre_completo,
                'email' => $contacto->email,
                'institucion' => $contacto->institucion,
                'puesto' => $contacto->puesto,
                'ciudad' => $contacto->ciudad,
                'estado' => $contacto->estado,
                'whatsapp' => $contacto->whatsapp,
                'email_contact' => $contacto->email_contact,
                'timestamp' => now(),
            ]);

            // Aquí puedes agregar lógica adicional como:
            // - Enviar email de confirmación
            // - Enviar notificación al equipo de marketing
            // - Integrar con CRM

            // Si es una petición AJAX, devolver JSON
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => '¡Gracias por tu interés en KIBI! Nos pondremos en contacto contigo pronto.'
                ]);
            }

            // Si no es AJAX, redirigir normalmente
            return redirect()->back()
                ->with('success', '¡Gracias por tu interés en KIBI! Nos pondremos en contacto contigo pronto.');

        } catch (\Exception $e) {
            Log::error('Error al procesar formulario de contacto KIBI', [
                'error' => $e->getMessage(),
                'data' => $validated,
                'timestamp' => now(),
            ]);

            // Si es una petición AJAX, devolver JSON con error
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al procesar tu solicitud. Por favor, inténtalo de nuevo.'
                ], 500);
            }

            return back()->withErrors(['error' => 'Hubo un error al procesar tu solicitud. Por favor, inténtalo de nuevo.'])
                ->withInput();
        }
    }

    /**
     * Mostrar página de éxito
     */
    public function success()
    {
        return view('kibi.contact-success');
    }
}
