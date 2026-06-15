<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RememberMeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario está autenticado y tiene una sesión de "recuérdame"
        if (Auth::check() && $request->session()->has('remember_me')) {
            // Extender la duración de la sesión para usuarios que marcaron "recuérdame"
            $request->session()->put('remember_me', true);
        }

        return $next($request);
    }
}