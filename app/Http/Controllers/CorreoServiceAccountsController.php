<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CorreoServiceAccountsController extends Controller
{
    /**
     * Enviar email de verificación para usuario nuevo
     */
    public function enviarEmailVerificacionNuevoUsuario(User $user, bool $isKibi = false)
    {
        try {
            // Generar token de verificación
            $token = $user->generateEmailVerificationToken();

            // Enviar email
            $this->enviarEmailVerificacion($user, $token, 'nuevo_usuario', null, $isKibi);

            Log::info('Email de verificación enviado para usuario nuevo', [
                'user_id' => $user->id,
                'email' => $user->email,
                'isKibi' => $isKibi,
                'timestamp' => now()
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Error al enviar email de verificación para usuario nuevo', [
                'user_id' => $user->id,
                'email' => $user->email,
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);

            return false;
        }
    }

    /**
     * Enviar email de verificación para usuario existente
     */
    public function enviarEmailVerificacionUsuarioExistente(User $user, bool $isKibi = false)
    {
        try {
            // Generar token de verificación
            $token = $user->generateEmailVerificationToken();

            // Enviar email
            $this->enviarEmailVerificacion($user, $token, 'usuario_existente', null, $isKibi);

            Log::info('Email de verificación enviado para usuario existente', [
                'user_id' => $user->id,
                'email' => $user->email,
                'isKibi' => $isKibi,
                'timestamp' => now()
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Error al enviar email de verificación para usuario existente', [
                'user_id' => $user->id,
                'email' => $user->email,
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);

            return false;
        }
    }

    /**
     * Enviar email de verificación con token de sesión
     */
    public function enviarEmailConTokenSesion(User $user, string $sessionToken)
    {
        try {
            // Generar token de verificación
            $token = $user->generateEmailVerificationToken();

            // Enviar email con token de sesión
            $this->enviarEmailVerificacion($user, $token, 'token_sesion', $sessionToken);

            Log::info('Email con token de sesión enviado', [
                'user_id' => $user->id,
                'email' => $user->email,
                'session_token' => $sessionToken,
                'timestamp' => now()
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Error al enviar email con token de sesión', [
                'user_id' => $user->id,
                'email' => $user->email,
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);

            return false;
        }
    }

    /**
     * Método principal para enviar emails de verificación
     */
    private function enviarEmailVerificacion(User $user, string $token, string $tipo = 'verificacion', string $sessionToken = null, bool $isKibi = false)
    {
        try {
            // Generar URL de verificación con parámetro kibi si corresponde
            $verificationUrl = $isKibi 
                ? route('email.verify', ['token' => $token, 'kibi' => '1'])
                : route('email.verify', ['token' => $token]);

            $data = [
                'user' => $user,
                'token' => $token,
                'verificationUrl' => $verificationUrl,
                'tipo' => $tipo,
                'sessionToken' => $sessionToken
            ];

            // Seleccionar template según el tipo
            $template = $this->seleccionarTemplate($tipo);
            $subject = $this->seleccionarAsunto($tipo);

            Mail::send($template, $data, function ($message) use ($user, $subject) {
                $message->to($user->email, $user->nombreCompleto)
                        ->subject($subject);
            });

            Log::info('Email de verificación enviado exitosamente', [
                'user_id' => $user->id,
                'email' => $user->email,
                'tipo' => $tipo,
                'template' => $template,
                'timestamp' => now()
            ]);

        } catch (\Exception $e) {
            Log::error('Error al enviar email de verificación', [
                'user_id' => $user->id,
                'email' => $user->email,
                'tipo' => $tipo,
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);

            throw $e;
        }
    }

    /**
     * Seleccionar template de email según el tipo
     */
    private function seleccionarTemplate(string $tipo): string
    {
        switch ($tipo) {
            case 'nuevo_usuario':
                return 'emails.verificacion-nuevo-usuario';
            case 'usuario_existente':
                return 'emails.verificacion-usuario-existente';
            case 'token_sesion':
                return 'emails.verificacion-token-sesion';
            default:
                return 'emails.email-verification';
        }
    }

    /**
     * Seleccionar asunto del email según el tipo
     */
    private function seleccionarAsunto(string $tipo): string
    {
        switch ($tipo) {
            case 'nuevo_usuario':
                return 'Bienvenido a SoftLinkIA - Verifica tu cuenta';
            case 'usuario_existente':
                return 'Verificación de cuenta - SoftLinkIA';
            case 'token_sesion':
                return 'Token de sesión - SoftLinkIA';
            default:
                return 'Verifica tu cuenta en SoftLinkIA';
        }
    }

    /**
     * Verificar email con token
     */
    public function verificarEmailConToken(Request $request, string $token)
    {
        try {
            $user = User::whereHas('emailVerifications', function ($query) use ($token) {
                $query->valid()->where('token', $token);
            })->first();

            if (!$user) {
                return redirect()->route('login')->with('error', 'Token de verificación inválido o expirado.');
            }

            if ($user->verifyEmailToken($token)) {
                // Detectar si viene de Kibi verificando referer o parámetro
                $isFromKibi = $request->has('kibi') || 
                             str_contains($request->header('referer', ''), '/kibi/') ||
                             $request->session()->has('kibi_session');

                if ($isFromKibi) {
                    // Iniciar sesión con guardia 'kibi'
                    Auth::guard('kibi')->login($user);
                    
                    Log::info('Email verificado exitosamente - KIBI', [
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'timestamp' => now()
                    ]);

                    return redirect()->route('kibi.dashboard')->with('success', 'Tu email ha sido verificado exitosamente. Bienvenido a KIBI Educación.');
                } else {
                    // Iniciar sesión con guardia por defecto
                    Auth::login($user);

                    Log::info('Email verificado exitosamente', [
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'timestamp' => now()
                    ]);

                    // Redirigir según el tipo de usuario
                    if ($user->isAdmin()) {
                        return redirect()->route('dashboard')->with('success', 'Tu email ha sido verificado exitosamente. Bienvenido al panel de administración.');
                    } elseif ($user->isCreador()) {
                        return redirect()->route('creador.dashboard')->with('success', 'Tu email ha sido verificado exitosamente. Bienvenido al panel de creador.');
                    } else {
                        return redirect()->route('usuario-estudiante')->with('success', 'Tu email ha sido verificado exitosamente. Bienvenido a SoftLinkIA.');
                    }
                }
            }

            return redirect()->route('login')->with('error', 'Error al verificar el email.');
        } catch (\Exception $e) {
            Log::error('Error al verificar email con token', [
                'token' => $token,
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);

            return redirect()->route('login')->with('error', 'Error al verificar el email.');
        }
    }

    /**
     * Reenviar email de verificación
     */
    public function reenviarEmailVerificacion(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->isEmailVerified()) {
            return back()->with('info', 'Tu email ya está verificado.');
        }

        if ($this->enviarEmailVerificacionUsuarioExistente($user)) {
            return back()->with('success', 'Email de verificación reenviado exitosamente.');
        }

        return back()->with('error', 'Error al reenviar el email de verificación.');
    }
}
