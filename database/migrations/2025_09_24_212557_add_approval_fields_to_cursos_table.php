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
        Schema::table('cursos', function (Blueprint $table) {
            $table->text('comentarios_aprobacion')->nullable()->after('tiktok_usuario');
            $table->timestamp('fecha_aprobacion')->nullable()->after('comentarios_aprobacion');
            $table->unsignedBigInteger('aprobado_por')->nullable()->after('fecha_aprobacion');
            $table->text('motivo_rechazo')->nullable()->after('aprobado_por');
            $table->timestamp('fecha_rechazo')->nullable()->after('motivo_rechazo');
            $table->unsignedBigInteger('rechazado_por')->nullable()->after('fecha_rechazo');

            $table->foreign('aprobado_por')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rechazado_por')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['aprobado_por']);
            $table->dropForeign(['rechazado_por']);
            $table->dropColumn([
                'comentarios_aprobacion',
                'fecha_aprobacion',
                'aprobado_por',
                'motivo_rechazo',
                'fecha_rechazo',
                'rechazado_por'
            ]);
        });
    }
};
