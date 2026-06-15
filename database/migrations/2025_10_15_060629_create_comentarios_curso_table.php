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
        Schema::create('comentarios_curso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('nivel_id')->nullable()->constrained('niveles')->onDelete('set null');
            $table->text('comentario');
            $table->text('respuesta')->nullable();
            $table->timestamp('respuesta_fecha')->nullable();
            $table->boolean('leido_por_creador')->default(false);
            $table->timestamps();

            $table->index(['curso_id', 'created_at']);
            $table->index(['usuario_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios_curso');
    }
};
