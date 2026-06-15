<?php

require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Testing Payment Controller...\n";

// Simular autenticación
$user = \App\Models\User::where('tipo_usuario_id', 3)->first();
if (!$user) {
    echo "❌ No se encontró usuario estudiante\n";
    exit;
}

// Simular login
auth()->login($user);
echo "✅ Usuario autenticado: " . $user->name . "\n";

// Verificar carrito
$cartItems = \App\Models\CartItem::where('user_id', $user->id)->get();
echo "✅ Items en carrito: " . $cartItems->count() . "\n";

if ($cartItems->count() > 0) {
    // Calcular total
    $total = $cartItems->reduce(function ($carry, $item) {
        return $carry + (($item->curso->precio ?? 0) * $item->quantity);
    }, 0);

    echo "✅ Total del carrito: $" . number_format($total, 2) . "\n";

    // Test crear enlace de pago
    try {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        // Crear producto de prueba
        $product = \Stripe\Product::create([
            'name' => 'Test Product',
            'description' => 'Test payment link creation'
        ]);

        echo "✅ Producto de Stripe creado: " . $product->id . "\n";

        // Crear precio
        $price = \Stripe\Price::create([
            'product' => $product->id,
            'unit_amount' => $total * 100, // Stripe usa centavos
            'currency' => 'usd'
        ]);

        echo "✅ Precio de Stripe creado: " . $price->id . "\n";

        // Crear Payment Link
        $paymentLink = \Stripe\PaymentLink::create([
            'line_items' => [
                [
                    'price' => $price->id,
                    'quantity' => 1,
                ],
            ],
            'after_completion' => [
                'type' => 'redirect',
                'redirect' => [
                    'url' => 'http://127.0.0.1:8000/payment/success'
                ]
            ]
        ]);

        echo "✅ Payment Link creado: " . $paymentLink->url . "\n";
        echo "✅ El sistema de pagos está funcionando correctamente!\n";

    } catch (Exception $e) {
        echo "❌ Error creando Payment Link: " . $e->getMessage() . "\n";
    }
} else {
    echo "❌ No hay items en el carrito para probar\n";
}

echo "\nTest completado!\n";
