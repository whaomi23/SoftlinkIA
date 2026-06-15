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
        Schema::table('users', function (Blueprint $table) {
            // Campos para solicitudes de creador
            $table->enum('solicitud_creador', ['pendiente', 'aprobada', 'rechazada'])->nullable()->after('status');
            $table->text('motivo_solicitud')->nullable()->after('solicitud_creador');
            $table->text('experiencia_solicitud')->nullable()->after('motivo_solicitud');

            // Campos para aprobación/rechazo
            $table->text('comentario_aprobacion')->nullable()->after('experiencia_solicitud');
            $table->timestamp('fecha_aprobacion')->nullable()->after('comentario_aprobacion');
            $table->unsignedBigInteger('aprobado_por')->nullable()->after('fecha_aprobacion');
            $table->text('motivo_rechazo')->nullable()->after('aprobado_por');
            $table->timestamp('fecha_rechazo')->nullable()->after('motivo_rechazo');
            $table->unsignedBigInteger('rechazado_por')->nullable()->after('fecha_rechazo');

            // Foreign keys
            $table->foreign('aprobado_por')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rechazado_por')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar foreign keys primero
            $table->dropForeign(['aprobado_por']);
            $table->dropForeign(['rechazado_por']);

            // Eliminar columnas
            $table->dropColumn([
                'solicitud_creador',
                'motivo_solicitud',
                'experiencia_solicitud',
                'comentario_aprobacion',
                'fecha_aprobacion',
                'aprobado_por',
                'motivo_rechazo',
                'fecha_rechazo',
                'rechazado_por'
            ]);
        });
    }
};
