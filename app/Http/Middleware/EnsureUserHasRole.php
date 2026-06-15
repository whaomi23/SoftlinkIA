<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $roles)
    {
        // Detectar si estamos en una ruta de Kibi
        $isKibiRoute = str_starts_with($request->path(), 'kibi/') || 
                       str_contains($request->route()->getName() ?? '', 'kibi.');
        
        // Usar el guardia apropiado
        $guard = $isKibiRoute ? 'kibi' : 'web';
        
        if (!auth($guard)->check()) {
            throw new HttpException(403);
        }

        // Normalizamos los roles permitidos: trim + lowercase
        $allowedRoles = array_map(function ($r) {
            return strtolower(trim($r));
        }, explode(',', $roles));

        $user = auth($guard)->user();
        $userRole = null;

        if (method_exists($user, 'tipoUsuario') && $user->relationLoaded('tipoUsuario') || method_exists($user, 'tipoUsuario')) {
            $userRole = optional($user->tipoUsuario)->nombre;
        }

        // Fallback if there's a plain string column
        if (!$userRole && isset($user->tipo_usuario)) {
            $userRole = $user->tipo_usuario;
        }

        // Final fallback: lookup by foreign key id
        if (!$userRole && isset($user->tipo_usuario_id)) {
            $userRole = DB::table('tipos_usuarios')->where('id', $user->tipo_usuario_id)->value('nombre');
        }

        // Normalizar posibles sinónimos/labels (trim + lowercase)
        $normalized = is_string($userRole) ? strtolower(trim($userRole)) : null;
        // Ya no convertimos 'administrador' a 'admin' - mantenemos el nombre original
        if ($normalized === 'cliente' || $normalized === 'usuario' || $normalized === 'operador') {
            $normalized = 'user';
        }

        if (!in_array($normalized ?? $userRole, $allowedRoles, true)) {
            throw new HttpException(403);
        }

        return $next($request);
    }
}


