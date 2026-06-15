<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SecurePassword implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $password = (string) $value;

        // Mínimo 8 caracteres
        if (strlen($password) < 8) {
            $fail('La contraseña debe tener al menos 8 caracteres.');
            return;
        }

        // Debe contener al menos una letra minúscula
        if (!preg_match('/[a-z]/', $password)) {
            $fail('La contraseña debe contener al menos una letra minúscula.');
            return;
        }

        // Debe contener al menos una letra mayúscula
        if (!preg_match('/[A-Z]/', $password)) {
            $fail('La contraseña debe contener al menos una letra mayúscula.');
            return;
        }

        // Debe contener al menos un número
        if (!preg_match('/[0-9]/', $password)) {
            $fail('La contraseña debe contener al menos un número.');
            return;
        }

        // Debe contener al menos un carácter especial
        if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
            $fail('La contraseña debe contener al menos un carácter especial (!@#$%^&*).');
            return;
        }

        // No debe contener espacios
        if (preg_match('/\s/', $password)) {
            $fail('La contraseña no puede contener espacios.');
            return;
        }

        // No debe ser una contraseña común
        $commonPasswords = [
            'password', '123456', '123456789', 'qwerty', 'abc123',
            'password123', 'admin', 'letmein', 'welcome', 'monkey'
        ];

        if (in_array(strtolower($password), $commonPasswords)) {
            $fail('La contraseña es demasiado común. Por favor elige una contraseña más segura.');
            return;
        }
    }
}