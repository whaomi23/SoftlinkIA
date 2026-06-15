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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->text('descripcion')->nullable();
            $table->string('url_imagen', 255)->nullable();
            $table->foreignId('creador_id')->constrained('users')->onDelete('cascade');
            $table->decimal('precio', 8, 2)->default(0);
            $table->integer('duracion_horas')->nullable();
            $table->enum('nivel', ['principiante', 'intermedio', 'avanzado'])->default('principiante');
            $table->boolean('activo')->default(true);
            $table->date('fecha_inicio')->nullable();
            $table->string('slug', 255)->unique()->nullable(); 
            $table->integer('cupo_maximo')->nullable(); 
            $table->text('requisitos')->nullable(); 
            $table->date('fecha_fin')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};