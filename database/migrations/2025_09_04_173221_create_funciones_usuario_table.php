<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funciones_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_usuario_id')->constrained('tipos_usuarios')->onDelete('cascade');
            $table->string('funcion', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funciones_usuario');
    }
};
