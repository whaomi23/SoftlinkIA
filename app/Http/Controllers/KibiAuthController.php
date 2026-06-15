<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Controllers\CorreoServiceAccountsController;

class KibiAuthController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLoginForm()
    {
        return view('KIBI.auth.login');
    }

    /**
     * Procesar login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Usar el guardia 'kibi' para mantener sesiones separadas
        if (Auth::guard('kibi')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::guard('kibi')->user();

            // Verificar si el usuario ha verificado su email
            if (!$user->isEmailVerified()) {
                return redirect()->route('kibi.email.verification.required')
                    ->with('warning', 'Debes verificar tu email antes de continuar.');
            }

            // Redirigir al dashboard de KIBI
            return redirect()->intended(route('kibi.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput($request->only('email'));
    }

    /**
     * Mostrar formulario de registro
     */
    public function showRegisterForm()
    {
        return view('KIBI.auth.register');
    }

    /**
     * Procesar registro
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ]);

        // Obtener el ID del tipo de usuario 'empleado' dinámicamente
        $tipoUsuarioId = DB::table('tipos_usuarios')->where('nombre', 'empleado')->value('id');

        if (!$tipoUsuarioId) {
            return back()->withErrors(['error' => 'Error del sistema. Contacta al administrador.'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo_usuario_id' => $tipoUsuarioId, // ID dinámico del tipo 'empleado'
            'verificado' => false, // Requiere verificación
            'status' => 'activo',
            'email_verified_at' => null,
        ]);

        // Enviar email de verificación usando CorreoServiceAccounts (indicar que es de Kibi)
        $correoService = new CorreoServiceAccountsController();
        $emailSent = $correoService->enviarEmailVerificacionNuevoUsuario($user, true);

        // Log del resultado del envío de email
        if ($emailSent) {
            Log::info('Email de verificación enviado exitosamente durante registro KIBI', [
                'user_id' => $user->id,
                'email' => $user->email,
                'timestamp' => now()
            ]);
        } else {
            Log::error('Error al enviar email de verificación durante registro KIBI', [
                'user_id' => $user->id,
                'email' => $user->email,
                'timestamp' => now()
            ]);
        }

        // Iniciar sesión temporalmente para mostrar la página de verificación
        // El usuario no tendrá acceso hasta verificar su email
        Auth::guard('kibi')->login($user);

        // Redirigir a la página de verificación requerida
        return redirect()->route('kibi.email.verification.required')
            ->with('success', '¡Registro exitoso! Por favor verifica tu email para acceder a tu cuenta.');
    }

    /**
     * Mostrar formulario de recuperación de contraseña
     */
    public function showForgotPasswordForm()
    {
        return view('KIBI.auth.forgot-password');
    }

    /**
     * Enviar enlace de recuperación
     */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Mostrar formulario de restablecimiento de contraseña
     */
    public function showResetPasswordForm(Request $request, $token)
    {
        return view('KIBI.auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Procesar restablecimiento de contraseña
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('kibi.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    /**
     * Mostrar página de verificación de email requerida
     */
    public function showEmailVerificationRequired()
    {
        return view('KIBI.auth.email-verification-required');
    }

    /**
     * Reenviar email de verificación
     */
    public function resendVerificationEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->isEmailVerified()) {
            return back()->with('info', 'Tu email ya está verificado.');
        }

        $correoService = new CorreoServiceAccountsController();
        if ($correoService->enviarEmailVerificacionUsuarioExistente($user, true)) {
            return back()->with('success', 'Email de verificación reenviado exitosamente.');
        }

        return back()->with('error', 'Error al reenviar el email de verificación.');
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        // Usar el guardia 'kibi' para cerrar sesión en Kibi
        Auth::guard('kibi')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('kibi.login');
    }
}
