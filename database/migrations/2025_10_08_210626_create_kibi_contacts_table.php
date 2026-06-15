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
        Schema::create('kibi_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('celular');
            $table->string('email');
            $table->string('institucion');
            $table->string('puesto');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('sitio_web')->nullable();
            $table->boolean('whatsapp')->default(false);
            $table->boolean('email_contact')->default(false);
            $table->enum('status', ['nuevo', 'contactado', 'interesado', 'no_interesado', 'convertido'])->default('nuevo');
            $table->text('notas')->nullable();
            $table->timestamp('contactado_at')->nullable();
            $table->timestamps();

            // Índices para optimizar consultas
            $table->index(['status', 'created_at']);
            $table->index('email');
            $table->index('institucion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kibi_contacts');
    }
};
