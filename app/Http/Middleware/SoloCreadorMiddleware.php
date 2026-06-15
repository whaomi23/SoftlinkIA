<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SoloCreadorMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            throw new HttpException(403);
        }

        $user = auth()->user();
        if (method_exists($user, 'isCreador') && $user->isCreador()) {
            return $next($request);
        }

        throw new HttpException(403);
    }
}


