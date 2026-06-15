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
        // Check if table exists, if not create it, if yes modify it
        if (!Schema::hasTable('progreso_lecciones')) {
            Schema::create('progreso_lecciones', function (Blueprint $table) {
                $table->id();
                $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('leccion_id')->constrained('lecciones')->onDelete('cascade');
                $table->boolean('completado')->default(false);
                $table->timestamp('completado_en')->nullable();
                $table->timestamps();

                // Evitar registros duplicados
                $table->unique(['usuario_id', 'leccion_id']);
            });
        } else {
            // Table exists, add missing columns
            Schema::table('progreso_lecciones', function (Blueprint $table) {
                if (!Schema::hasColumn('progreso_lecciones', 'usuario_id')) {
                    $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('progreso_lecciones', 'leccion_id')) {
                    $table->foreignId('leccion_id')->constrained('lecciones')->onDelete('cascade');
                }
                if (!Schema::hasColumn('progreso_lecciones', 'completado')) {
                    $table->boolean('completado')->default(false);
                }
                if (!Schema::hasColumn('progreso_lecciones', 'completado_en')) {
                    $table->timestamp('completado_en')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progreso_lecciones');
    }
};
