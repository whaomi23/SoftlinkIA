<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\EnsureUserHasRole::class,
            'remember.me' => \App\Http\Middleware\RememberMeMiddleware::class,
            'creador' => \App\Http\Middleware\CreadorMiddleware::class,
            'solo.creador' => \App\Http\Middleware\SoloCreadorMiddleware::class,
            'articulos.manage' => \App\Http\Middleware\EnsureUserCanManageArticulos::class,
            'email.verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
            'cart.enabled' => \App\Http\Middleware\EnsureCartEnabled::class,
            'course.access' => \App\Http\Middleware\CheckCourseAccess::class,
            'kibi.session' => \App\Http\Middleware\SetKibiSession::class,
        ]);
        
        // Ejecutar SetKibiSession antes de StartSession para rutas de Kibi
        // Esto se ejecuta globalmente pero solo actúa en rutas de Kibi
        $middleware->web(prepend: [
            \App\Http\Middleware\SetKibiSession::class,
            \App\Http\Middleware\UpdateLastLogin::class,
        ]);
        
        // Reemplazar el middleware CSRF por defecto
        $middleware->replace(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class, \App\Http\Middleware\VerifyCsrfToken::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
