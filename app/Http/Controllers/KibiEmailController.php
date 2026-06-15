<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KibiContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KibiEmailController extends Controller
{
    /**
     * Mostrar formulario de envío de email
     */
    public function show(KibiContact $contacto)
    {
        return view('KIBI.admin.dashboard.contactos-solicitudes.send-email', compact('contacto'));
    }

    /**
     * Enviar email al contacto
     */
    public function send(Request $request, KibiContact $contacto)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'cc' => 'nullable|string|max:500',
            'bcc' => 'nullable|string|max:500',
            'attachments.*' => 'nullable|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png,gif,ppt,pptx',
        ]);

        try {
            // Preparar datos del email
            $emailData = [
                'contacto' => $contacto,
                'subject' => $request->subject,
                'emailMessage' => $request->message,
                'sender' => Auth::user(),
                'attachments' => $request->file('attachments', []),
                'cc' => $request->cc,
                'bcc' => $request->bcc,
            ];

            // Enviar email usando Mail facade
            Mail::send('emails.kibi-contact', $emailData, function ($message) use ($emailData) {
                $message->to($emailData['contacto']->email, $emailData['contacto']->nombre_completo)
                        ->subject($emailData['subject'])
                        ->from(config('mail.from.address'), 'KIBI - SoftLinkIA');

                // Agregar CC si existe
                if (!empty($emailData['cc'])) {
                    $ccEmails = array_map('trim', explode(',', $emailData['cc']));
                    foreach ($ccEmails as $ccEmail) {
                        if (filter_var($ccEmail, FILTER_VALIDATE_EMAIL)) {
                            $message->cc($ccEmail);
                        }
                    }
                }

                // Agregar BCC si existe
                if (!empty($emailData['bcc'])) {
                    $bccEmails = array_map('trim', explode(',', $emailData['bcc']));
                    foreach ($bccEmails as $bccEmail) {
                        if (filter_var($bccEmail, FILTER_VALIDATE_EMAIL)) {
                            $message->bcc($bccEmail);
                        }
                    }
                }

                // Adjuntar archivos si existen
                foreach ($emailData['attachments'] as $attachment) {
                    $message->attach($attachment->getRealPath(), [
                        'as' => $attachment->getClientOriginalName(),
                        'mime' => $attachment->getMimeType(),
                    ]);
                }
            });

            // Log del envío
            Log::info('Email enviado exitosamente', [
                'contacto_id' => $contacto->id,
                'contacto_email' => $contacto->email,
                'subject' => $request->subject,
                'sender' => Auth::user()->email,
                'cc' => $request->cc,
                'bcc' => $request->bcc,
                'attachments_count' => count($request->file('attachments', [])),
                'timestamp' => now(),
            ]);

            // Actualizar status del contacto si es necesario
            if ($contacto->status === 'nuevo') {
                $contacto->cambiarStatus('contactado', 'Email inicial enviado');
            }

            return redirect()
                ->route('kibi.contacts.show', $contacto)
                ->with('success', 'Email enviado exitosamente a ' . $contacto->email);

        } catch (\Exception $e) {
            Log::error('Error al enviar email', [
                'contacto_id' => $contacto->id,
                'error' => $e->getMessage(),
                'sender' => Auth::user()->email,
                'timestamp' => now(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Error al enviar el email: ' . $e->getMessage());
        }
    }
}
