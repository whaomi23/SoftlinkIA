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
        Schema::create('preguntas_cuestionario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subnivel_id')->constrained('subniveles')->onDelete('cascade');
            $table->integer('numero_pregunta')->comment('Número de pregunta (1-10)');
            $table->text('pregunta_texto');
            $table->string('opcion_1', 500);
            $table->string('opcion_2', 500);
            $table->string('opcion_3', 500);
            $table->tinyInteger('respuesta_correcta')->comment('1, 2 o 3 - indica qué opción es la correcta');
            $table->timestamps();

            // Índices
            $table->index(['subnivel_id', 'numero_pregunta']);
            $table->unique(['subnivel_id', 'numero_pregunta']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas_cuestionario');
    }
};
