<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class SetKibiSession
{
    /**
     * Handle an incoming request.
     *
     * Este middleware configura el nombre de cookie de sesión específico para Kibi
     * para asegurar que las sesiones de Kibi y SoftlinkIA sean independientes.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si la ruta es de Kibi
        if ($request->is('kibi/*') || $request->routeIs('kibi.*')) {
            // Configurar el nombre de cookie de sesión específico para Kibi
            // Esto asegura que las sesiones de Kibi y SoftlinkIA sean independientes
            Config::set('session.cookie', 'kibi_session');
        }
        
        return $next($request);
    }
}

