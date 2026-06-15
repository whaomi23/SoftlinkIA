<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Polyfills para compatibilidad con FPDF en PHP 8+
        if (!function_exists('get_magic_quotes_runtime')) {
            function get_magic_quotes_runtime(): bool
            {
                return false;
            }
        }
        if (!function_exists('set_magic_quotes_runtime')) {
            function set_magic_quotes_runtime($new_setting): bool
            {
                return false;
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
