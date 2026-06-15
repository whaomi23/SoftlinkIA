<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureCartEnabled
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $tipoId = optional(Auth::user())->tipo_usuario_id;
        if (!in_array((int) $tipoId, [3, 4], true)) {
            abort(403, 'Carrito disponible solo para tipos de usuario 3 y 4.');
        }

        return $next($request);
    }
}