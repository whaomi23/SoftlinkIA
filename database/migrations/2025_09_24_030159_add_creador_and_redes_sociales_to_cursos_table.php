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
            // Campos del creador (solo si no existen)
            if (!Schema::hasColumn('cursos', 'creador_nombre')) {
                $table->string('creador_nombre')->nullable()->comment('Nombre del creador del curso');
            }
            if (!Schema::hasColumn('cursos', 'creador_apellido')) {
                $table->string('creador_apellido')->nullable()->comment('Apellido del creador del curso');
            }
            if (!Schema::hasColumn('cursos', 'creador_profesion')) {
                $table->string('creador_profesion')->nullable()->comment('Profesión del creador del curso');
            }
            if (!Schema::hasColumn('cursos', 'creador_descripcion')) {
                $table->text('creador_descripcion')->nullable()->comment('Descripción del creador del curso');
            }

            // Campos de redes sociales
            if (!Schema::hasColumn('cursos', 'facebook_usuario')) {
                $table->string('facebook_usuario')->nullable()->comment('Usuario de Facebook del creador');
            }
            if (!Schema::hasColumn('cursos', 'twitter_usuario')) {
                $table->string('twitter_usuario')->nullable()->comment('Usuario de Twitter del creador');
            }
            if (!Schema::hasColumn('cursos', 'linkedin_usuario')) {
                $table->string('linkedin_usuario')->nullable()->comment('Usuario de LinkedIn del creador');
            }
            if (!Schema::hasColumn('cursos', 'instagram_usuario')) {
                $table->string('instagram_usuario')->nullable()->comment('Usuario de Instagram del creador');
            }
            if (!Schema::hasColumn('cursos', 'vk_usuario')) {
                $table->string('vk_usuario')->nullable()->comment('Usuario de VK del creador');
            }
            if (!Schema::hasColumn('cursos', 'tiktok_usuario')) {
                $table->string('tiktok_usuario')->nullable()->comment('Usuario de TikTok del creador');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn([
                'creador_nombre',
                'creador_apellido',
                'creador_profesion',
                'creador_descripcion',
                'facebook_usuario',
                'twitter_usuario',
                'linkedin_usuario',
                'instagram_usuario',
                'vk_usuario',
                'tiktok_usuario'
            ]);
        });
    }
};
