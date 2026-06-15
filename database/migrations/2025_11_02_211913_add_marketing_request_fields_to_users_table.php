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
            // Campos para solicitudes de marketing
            $table->enum('solicitud_marketing', ['pendiente', 'aprobada', 'rechazada'])->nullable()->after('rechazado_por');
            $table->text('motivo_solicitud_marketing')->nullable()->after('solicitud_marketing');
            $table->text('experiencia_solicitud_marketing')->nullable()->after('motivo_solicitud_marketing');

            // Campos para aprobación/rechazo de marketing
            $table->text('comentario_aprobacion_marketing')->nullable()->after('experiencia_solicitud_marketing');
            $table->timestamp('fecha_aprobacion_marketing')->nullable()->after('comentario_aprobacion_marketing');
            $table->unsignedBigInteger('aprobado_por_marketing')->nullable()->after('fecha_aprobacion_marketing');
            $table->text('motivo_rechazo_marketing')->nullable()->after('aprobado_por_marketing');
            $table->timestamp('fecha_rechazo_marketing')->nullable()->after('motivo_rechazo_marketing');
            $table->unsignedBigInteger('rechazado_por_marketing')->nullable()->after('fecha_rechazo_marketing');

            // Foreign keys
            $table->foreign('aprobado_por_marketing')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rechazado_por_marketing')->references('id')->on('users')->onDelete('set null');

            // Campos genéricos para solicitudes de roles (editor_contenido, gestor_usuarios, gestor_contactos, etc.)
            $table->enum('solicitud_rol', ['pendiente', 'aprobada', 'rechazada'])->nullable()->after('rechazado_por_marketing');
            $table->string('rol_solicitado', 100)->nullable()->after('solicitud_rol'); // Nombre del rol solicitado
            $table->text('motivo_solicitud_rol')->nullable()->after('rol_solicitado');
            $table->text('experiencia_solicitud_rol')->nullable()->after('motivo_solicitud_rol');

            // Campos para aprobación/rechazo de roles
            $table->text('comentario_aprobacion_rol')->nullable()->after('experiencia_solicitud_rol');
            $table->timestamp('fecha_aprobacion_rol')->nullable()->after('comentario_aprobacion_rol');
            $table->unsignedBigInteger('aprobado_por_rol')->nullable()->after('fecha_aprobacion_rol');
            $table->text('motivo_rechazo_rol')->nullable()->after('aprobado_por_rol');
            $table->timestamp('fecha_rechazo_rol')->nullable()->after('motivo_rechazo_rol');
            $table->unsignedBigInteger('rechazado_por_rol')->nullable()->after('fecha_rechazo_rol');

            // Foreign keys para roles genéricos
            $table->foreign('aprobado_por_rol')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rechazado_por_rol')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar foreign keys primero
            $table->dropForeign(['aprobado_por_marketing']);
            $table->dropForeign(['rechazado_por_marketing']);

            // Eliminar foreign keys de roles genéricos
            $table->dropForeign(['aprobado_por_rol']);
            $table->dropForeign(['rechazado_por_rol']);

            // Eliminar columnas
            $table->dropColumn([
                'solicitud_marketing',
                'motivo_solicitud_marketing',
                'experiencia_solicitud_marketing',
                'comentario_aprobacion_marketing',
                'fecha_aprobacion_marketing',
                'aprobado_por_marketing',
                'motivo_rechazo_marketing',
                'fecha_rechazo_marketing',
                'rechazado_por_marketing',
                'solicitud_rol',
                'rol_solicitado',
                'motivo_solicitud_rol',
                'experiencia_solicitud_rol',
                'comentario_aprobacion_rol',
                'fecha_aprobacion_rol',
                'aprobado_por_rol',
                'motivo_rechazo_rol',
                'fecha_rechazo_rol',
                'rechazado_por_rol'
            ]);
        });
    }
};
