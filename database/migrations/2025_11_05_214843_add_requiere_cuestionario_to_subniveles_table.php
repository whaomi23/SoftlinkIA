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
        Schema::table('subniveles', function (Blueprint $table) {
            $table->boolean('requiere_cuestionario')->default(false)->after('recurso_tipo')->comment('Si requiere cuestionario aprobado para desbloquear siguiente contenido');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subniveles', function (Blueprint $table) {
            $table->dropColumn('requiere_cuestionario');
        });
    }
};
