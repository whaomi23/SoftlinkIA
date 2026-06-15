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
        Schema::create('casos_exito', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('subtitulo', 255)->nullable();
            $table->enum('nivel_dificultad', [
                'Básico / Introductorio',
                'Fácil',
                'Intermedio bajo',
                'Intermedio',
                'Intermedio alto',
                'Avanzado',
                'Experto',
                'Investigación / Académico',
                'Crítico / Analítico',
                'Práctico / Aplicado'
            ])->default('Básico / Introductorio');
            $table->text('contenido')->nullable();
            $table->string('url_imagen', 255)->nullable();
            $table->string('url_imagen_banner', 255)->nullable();
            $table->string('slug', 255)->unique();
            $table->enum('status', ['publicado','borrador','archivado'])->default('borrador');
            $table->foreignId('autor_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casos_exito');
    }
};
