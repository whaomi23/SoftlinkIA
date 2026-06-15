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
        Schema::table('progreso_lecciones', function (Blueprint $table) {
            // Agregar curso_id después de usuario_id
            $table->foreignId('curso_id')->after('usuario_id')->constrained('cursos')->onDelete('cascade');

            // Agregar índice compuesto para mejor rendimiento
            $table->index(['usuario_id', 'curso_id'], 'idx_prog_lec_usuario_curso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progreso_lecciones', function (Blueprint $table) {
            $table->dropForeign(['curso_id']);
            $table->dropIndex('idx_prog_lec_usuario_curso');
            $table->dropColumn('curso_id');
        });
    }
};
