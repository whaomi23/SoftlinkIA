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
                $table->string('creador_nombre')->nullable()->after('creador_id');
            }
            if (!Schema::hasColumn('cursos', 'creador_apellido')) {
                $table->string('creador_apellido')->nullable()->after('creador_nombre');
            }
            if (!Schema::hasColumn('cursos', 'creador_profesion')) {
                $table->string('creador_profesion')->nullable()->after('creador_apellido');
            }
            if (!Schema::hasColumn('cursos', 'creador_descripcion')) {
                $table->text('creador_descripcion')->nullable()->after('creador_profesion');
            }

            // Redes sociales (solo si no existen)
            if (!Schema::hasColumn('cursos', 'facebook_usuario')) {
                $table->string('facebook_usuario')->nullable()->after('creador_descripcion');
            }
            if (!Schema::hasColumn('cursos', 'twitter_usuario')) {
                $table->string('twitter_usuario')->nullable()->after('facebook_usuario');
            }
            if (!Schema::hasColumn('cursos', 'linkedin_usuario')) {
                $table->string('linkedin_usuario')->nullable()->after('twitter_usuario');
            }
            if (!Schema::hasColumn('cursos', 'instagram_usuario')) {
                $table->string('instagram_usuario')->nullable()->after('linkedin_usuario');
            }
            if (!Schema::hasColumn('cursos', 'vk_usuario')) {
                $table->string('vk_usuario')->nullable()->after('instagram_usuario');
            }
            if (!Schema::hasColumn('cursos', 'tiktok_usuario')) {
                $table->string('tiktok_usuario')->nullable()->after('vk_usuario');
            }

            // Campos adicionales del curso (solo si no existen)
            if (!Schema::hasColumn('cursos', 'nivel_dificultad')) {
                $table->string('nivel_dificultad')->nullable()->after('tiktok_usuario');
            }
            if (!Schema::hasColumn('cursos', 'objetivos_aprendizaje')) {
                $table->text('objetivos_aprendizaje')->nullable()->after('nivel_dificultad');
            }
            if (!Schema::hasColumn('cursos', 'requisitos_previos')) {
                $table->text('requisitos_previos')->nullable()->after('objetivos_aprendizaje');
            }
            if (!Schema::hasColumn('cursos', 'url_video')) {
                $table->string('url_video')->nullable()->after('requisitos_previos');
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
                'tiktok_usuario',
                'nivel_dificultad',
                'objetivos_aprendizaje',
                'requisitos_previos',
                'url_video'
            ]);
        });
    }
};
