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
        Schema::create('subniveles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nivel_id')->constrained('niveles')->onDelete('cascade');
            $table->integer('numero');
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('url_iframe')->nullable();
            $table->string('recurso_path')->nullable();
            $table->string('recurso_nombre')->nullable();
            $table->string('recurso_tipo')->nullable();
            $table->timestamps();
            // Índices
            $table->index(['nivel_id', 'numero']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subniveles');
    }
};
