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
        // Primero eliminar la tabla si existe
        Schema::dropIfExists('progreso_lecciones');

        // Crear la tabla con la estructura correcta
        Schema::create('progreso_lecciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('leccion_id')->constrained('subniveles')->onDelete('cascade');
            $table->boolean('completado')->default(false);
            $table->timestamp('completado_en')->nullable();
            $table->timestamps();

            // Evitar registros duplicados
            $table->unique(['usuario_id', 'leccion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progreso_lecciones');
    }
};
