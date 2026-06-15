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
            // Campos para URL de video
            $table->text('url_video')->nullable()->comment('URL del video de servicios externos (YouTube, Vimeo, etc.)');

            // Campos para archivo de video
            $table->string('video_archivo_path')->nullable()->comment('Ruta del archivo de video subido');
            $table->string('video_archivo_nombre')->nullable()->comment('Nombre original del archivo de video');
            $table->string('video_archivo_tipo')->nullable()->comment('Tipo MIME del archivo de video');
            $table->bigInteger('video_archivo_tamaño')->nullable()->comment('Tamaño del archivo de video en bytes');

            // Campos para controlar qué tipo de contenido usar
            $table->boolean('usar_iframe')->default(false)->comment('Indica si usar iframe HTML embebido');
            $table->boolean('usar_url_video')->default(false)->comment('Indica si usar URL de video externo');
            $table->boolean('usar_video_archivo')->default(false)->comment('Indica si usar archivo de video subido');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subniveles', function (Blueprint $table) {
            $table->dropColumn([
                'url_video',
                'video_archivo_path',
                'video_archivo_nombre',
                'video_archivo_tipo',
                'video_archivo_tamaño',
                'usar_iframe',
                'usar_url_video',
                'usar_video_archivo'
            ]);
        });
    }
};
