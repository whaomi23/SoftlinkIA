<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // En desarrollo, puedes excluir rutas específicas si es necesario
        // 'kibi/login',
    ];

    /**
     * Determine if the session and input CSRF tokens match.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function tokensMatch($request)
    {
        // En desarrollo local, deshabilitar completamente la verificación CSRF
        if (app()->environment('local') || config('app.debug')) {
            return true;
        }

        return parent::tokensMatch($request);
    }
}
