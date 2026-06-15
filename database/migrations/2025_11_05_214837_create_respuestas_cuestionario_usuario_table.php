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
        Schema::create('respuestas_cuestionario_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('subnivel_id')->constrained('subniveles')->onDelete('cascade');
            $table->foreignId('pregunta_id')->constrained('preguntas_cuestionario')->onDelete('cascade');
            $table->tinyInteger('respuesta_seleccionada')->comment('1, 2 o 3 - respuesta que seleccionó el usuario');
            $table->boolean('es_correcta')->default(false);
            $table->integer('intento_numero')->default(1)->comment('Número de intento del cuestionario completo');
            $table->timestamps();

            // Índices
            $table->index(['usuario_id', 'subnivel_id', 'intento_numero'], 'idx_resp_cuest_usuario');
            $table->index(['pregunta_id'], 'idx_resp_cuest_pregunta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas_cuestionario_usuario');
    }
};
