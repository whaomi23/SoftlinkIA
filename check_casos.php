<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Casos de éxito totales: " . \App\Models\CasoExito::count() . PHP_EOL;
echo "Casos publicados: " . \App\Models\CasoExito::where('status', 'publicado')->count() . PHP_EOL;

$casos = \App\Models\CasoExito::where('status', 'publicado')->get(['id', 'titulo', 'status']);
foreach($casos as $caso) {
    echo "ID: {$caso->id} - Título: {$caso->titulo} - Status: {$caso->status}" . PHP_EOL;
}
