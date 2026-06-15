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
            $table->boolean('cuestionario_aprobado')->default(false)->after('completado_en')->comment('Si el cuestionario del subnivel fue aprobado');
            $table->integer('intento_cuestionario')->default(0)->after('cuestionario_aprobado')->comment('Número de intentos del cuestionario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progreso_lecciones', function (Blueprint $table) {
            $table->dropColumn(['cuestionario_aprobado', 'intento_cuestionario']);
        });
    }
};
