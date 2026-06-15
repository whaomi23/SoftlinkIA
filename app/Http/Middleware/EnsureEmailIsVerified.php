<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Detectar si estamos en una ruta de Kibi
        $isKibiRoute = str_starts_with($request->path(), 'kibi/') || 
                       str_contains($request->route()->getName() ?? '', 'kibi.');
        
        // Usar el guardia apropiado
        $guard = $isKibiRoute ? 'kibi' : 'web';
        
        if (auth($guard)->check()) {
            $user = auth($guard)->user();
            \Log::info('Middleware email.verified - Usuario autenticado', [
                'user_id' => $user->id,
                'email' => $user->email,
                'verificado' => $user->verificado,
                'isEmailVerified' => $user->isEmailVerified(),
                'route' => $request->route()->getName(),
                'url' => $request->url(),
                'guard' => $guard
            ]);

            if (!$user->isEmailVerified()) {
                // Si el usuario no ha verificado su email, redirigir a una página de verificación
                \Log::warning('Usuario no verificado, redirigiendo', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'verificado' => $user->verificado,
                    'guard' => $guard
                ]);
                
                $verificationRoute = $isKibiRoute 
                    ? 'kibi.email.verification.required' 
                    : 'email.verification.required';
                    
                return redirect()->route($verificationRoute)
                    ->with('warning', 'Debes verificar tu email antes de continuar.');
            }
        }

        return $next($request);
    }
}