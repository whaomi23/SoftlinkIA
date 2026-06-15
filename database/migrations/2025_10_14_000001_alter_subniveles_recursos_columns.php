<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subniveles', function (Blueprint $table) {
            // Cambiar a longText para almacenar múltiples rutas/nombres/tipos como JSON
            $table->longText('recurso_path')->nullable()->change();
            $table->longText('recurso_nombre')->nullable()->change();
            $table->longText('recurso_tipo')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('subniveles', function (Blueprint $table) {
            // Reversión a string por compatibilidad; ajuste según esquema previo si fuera distinto
            $table->string('recurso_path', 255)->nullable()->change();
            $table->string('recurso_nombre', 255)->nullable()->change();
            $table->string('recurso_tipo', 255)->nullable()->change();
        });
    }
};


