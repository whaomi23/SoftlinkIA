<?php

// Global polyfills for legacy functions used by FPDF on PHP 8+
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


