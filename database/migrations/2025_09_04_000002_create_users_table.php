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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('apellido_paterno', 100);
            $table->string('apellido_materno', 100);
            $table->string('email', 255)->unique();
            $table->string('password', 255); // Compatible con Laravel Auth
            $table->foreignId('tipo_usuario_id')->constrained('tipos_usuarios')->onDelete('cascade');
            $table->boolean('verificado')->default(false);
            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->rememberToken(); // <-- opcional, útil para "recordarme"
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
    }
};
