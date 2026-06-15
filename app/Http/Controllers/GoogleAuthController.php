<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirigir al usuario a Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Manejar la respuesta de Google OAuth
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            Log::info('Iniciando callback de Google OAuth', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now()
            ]);

            // Verificar configuración de Google
            Log::info('Configuración de Google', [
                'client_id' => config('services.google.client_id'),
                'client_secret' => config('services.google.client_secret') ? 'CONFIGURADO' : 'NO CONFIGURADO',
                'redirect' => config('services.google.redirect')
            ]);

            $googleUser = Socialite::driver('google')->user();

            // Log del intento de login con Google
            Log::info('Intento de login con Google', [
                'google_id' => $googleUser->getId(),
                'email' => $googleUser->getEmail(),
                'name' => $googleUser->getName(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now()
            ]);

            // Buscar usuario existente por email
            $existingUser = User::where('email', $googleUser->getEmail())->first();

            if ($existingUser) {
                // Usuario existe, verificar si ya tiene Google ID
                if (!$existingUser->google_id) {
                    $existingUser->update([
                        'google_id' => $googleUser->getId(),
                        'verificado' => 1, // Marcar como verificado automáticamente
                    ]);
                } else {
                    // Si ya tiene Google ID, asegurar que esté verificado
                    if ($existingUser->verificado != 1) {
                        $existingUser->update(['verificado' => 1]);
                    }
                }

                // Iniciar sesión
                Auth::login($existingUser);

                Log::info('Login con Google exitoso - Usuario existente', [
                    'user_id' => $existingUser->id,
                    'email' => $existingUser->email,
                    'verificado' => $existingUser->verificado,
                    'google_id' => $existingUser->google_id,
                    'ip' => $request->ip(),
                    'timestamp' => now()
                ]);

                // Redirigir según el tipo de usuario
                if ($existingUser->isAdmin()) {
                    return redirect()->route('dashboard')->with('success', 'Bienvenido de vuelta al panel de administración');
                } elseif ($existingUser->isCreador()) {
                    // Para creadores, usar redirección directa para evitar problemas con intended()
                    return redirect()->route('creador.dashboard')->with('success', 'Bienvenido de vuelta al panel de creador');
                } else {
                    // Usuario normal/estudiante
                    return redirect()->route('usuario-estudiante')->with('success', 'Bienvenido de vuelta a SoftLinkIA');
                }
            } else {
                // Crear nuevo usuario
                $newUser = User::create([
                    'name' => $this->extractFirstName($googleUser->getName()),
                    'apellido_paterno' => $this->extractLastName($googleUser->getName()),
                    'apellido_materno' => '', // Google no proporciona apellido materno
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => Hash::make(Str::random(16)), // Contraseña aleatoria
                    'verificado' => 1, // Marcar como verificado automáticamente
                    'status' => 'activo',
                    'tipo_usuario_id' => 2, // Estudiante por defecto
                ]);

                // Iniciar sesión
                Auth::login($newUser);

                Log::info('Login con Google exitoso - Usuario nuevo', [
                    'user_id' => $newUser->id,
                    'email' => $newUser->email,
                    'verificado' => $newUser->verificado,
                    'google_id' => $newUser->google_id,
                    'ip' => $request->ip(),
                    'timestamp' => now()
                ]);

                // Redirigir según el tipo de usuario
                if ($newUser->isAdmin()) {
                    return redirect()->route('dashboard')->with('success', '¡Bienvenido a SoftLinkIA! Tu cuenta ha sido creada exitosamente.');
                } elseif ($newUser->isCreador()) {
                    return redirect()->route('creador.dashboard')->with('success', '¡Bienvenido a SoftLinkIA! Tu cuenta ha sido creada exitosamente.');
                } else {
                    // Usuario normal/estudiante
                    return redirect()->route('usuario-estudiante')->with('success', '¡Bienvenido a SoftLinkIA! Tu cuenta ha sido creada exitosamente.');
                }
            }

        } catch (\Exception $e) {
            Log::error('Error en login con Google', [
                'error' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'previous' => $e->getPrevious() ? $e->getPrevious()->getMessage() : null,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now()
            ]);

            return redirect()->route('login')->with('error', 'Error al iniciar sesión con Google: ' . $e->getMessage());
        }
    }

    /**
     * Extraer el primer nombre del nombre completo
     */
    private function extractFirstName($fullName)
    {
        $names = explode(' ', trim($fullName));
        return $names[0] ?? '';
    }

    /**
     * Extraer el apellido del nombre completo
     */
    private function extractLastName($fullName)
    {
        $names = explode(' ', trim($fullName));
        return count($names) > 1 ? $names[1] : '';
    }
}
