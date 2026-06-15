<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Solo actualizar si no se ha actualizado en esta sesión
            if (!$request->session()->has('last_login_updated')) {
                // Guardar el último acceso anterior en la sesión antes de actualizar
                // Esto nos permite mostrarlo en el dashboard
                if ($user->last_login) {
                    $request->session()->put('previous_last_login', $user->last_login->toIso8601String());
                }
                
                // Actualizar last_login con la hora actual
                $user->last_login = now();
                $user->save();
                
                // Marcar en sesión para evitar actualizaciones repetidas
                $request->session()->put('last_login_updated', true);
            }
        }

        return $next($request);
    }
}

