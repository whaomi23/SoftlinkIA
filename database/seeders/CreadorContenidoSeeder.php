<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Curso;
use App\Models\Categoria;
use App\Models\Nivel;
use App\Models\Subnivel;

class CreadorContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurar rol 'creador'
        $creadorTipoId = DB::table('tipos_usuarios')
            ->where('nombre', 'creador')
            ->value('id');

        if (!$creadorTipoId) {
            $creadorTipoId = DB::table('tipos_usuarios')->insertGetId([
                'nombre' => 'creador',
                'descripcion' => 'Creador de contenido',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Obtener o crear un usuario creador
        $creador = User::firstOrCreate(
            ['email' => 'creador@example.com'],
            [
                'name' => 'Juan',
                'apellido_paterno' => 'Pérez',
                'apellido_materno' => 'González',
                'password' => Hash::make('password'),
                'tipo_usuario_id' => $creadorTipoId,
            ]
        );

        // Obtener o crear una categoría
        $categoria = Categoria::first();
        if (!$categoria) {
            $categoria = Categoria::create([
                'nombre' => 'Programación',
                'descripcion' => 'Cursos de desarrollo de software',
            ]);
        }

        // Crear curso de ejemplo
        $titulo = 'Curso de Laravel para Principiantes';
        $slugBase = Str::slug($titulo);
        $slug = $slugBase;
        $i = 1;
        while (Curso::where('slug', $slug)->exists()) {
            $slug = $slugBase.'-'.$i++;
        }

        $curso = Curso::create([
            'titulo' => $titulo,
            'descripcion' => 'Aprende los fundamentos de Laravel creando una aplicación real.',
            'categoria_id' => $categoria->id,
            'precio' => 49.99,
            'duracion_horas' => 12,
            'nivel_dificultad' => 'principiante',
            'objetivos_aprendizaje' => 'Rutas, Controladores, Vistas, Eloquent, Migraciones',
            'requisitos_previos' => 'PHP básico, Composer instalado',
            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'cupo_maximo' => 100,
            'fecha_inicio' => now()->toDateString(),
            'fecha_fin' => now()->addMonth()->toDateString(),
            'slug' => $slug,
            'creador_id' => $creador->id,
            'activo' => false,
            'creador_nombre' => 'Juan',
            'creador_apellido' => 'Pérez',
            'creador_profesion' => 'Desarrollador Full Stack',
            'creador_descripcion' => 'Apasionado por Laravel y el desarrollo web.',
            'facebook_usuario' => 'juan.perez.dev',
            'twitter_usuario' => 'juanperez',
            'linkedin_usuario' => 'juan-perez',
            'instagram_usuario' => 'juanperez.dev',
            'vk_usuario' => null,
            'tiktok_usuario' => null,
        ]);

        // Opcional: imagen de curso dummy
        $categoriaSlug = Str::slug($categoria->nombre);
        $basePath = "creadores/{$creador->id}/{$categoriaSlug}/{$curso->slug}";
        Storage::disk('public')->makeDirectory("{$basePath}/imagenes");
        // Crear una imagen dummy vacía sólo para probar la ruta
        Storage::disk('public')->put("{$basePath}/imagenes/portada.txt", 'Imagen de curso (dummy)');

        // Crear niveles y subniveles
        $nivelesData = [
            [
                'numero' => 1,
                'titulo' => 'Introducción a Laravel',
                'descripcion' => 'Instalación y primeros pasos',
                'subniveles' => [
                    [
                        'numero' => 1,
                        'titulo' => 'Instalación y Configuración',
                        'descripcion' => 'Configura tu entorno con Composer y Laravel',
                        'usar_url_video' => true,
                        'url_video' => 'https://www.youtube.com/watch?v=ysz5S6PUM-U',
                    ],
                    [
                        'numero' => 2,
                        'titulo' => 'Estructura del Proyecto',
                        'descripcion' => 'Repaso de directorios y ciclo de request',
                        'usar_iframe' => true,
                        'url_iframe' => '<iframe src="https://www.youtube.com/embed/ysz5S6PUM-U" width="100%" height="300" frameborder="0" allowfullscreen></iframe>',
                    ],
                ],
            ],
            [
                'numero' => 2,
                'titulo' => 'Rutas y Controladores',
                'descripcion' => 'Manejo de rutas, controladores y respuestas',
                'subniveles' => [
                    [
                        'numero' => 1,
                        'titulo' => 'Rutas básicas',
                        'descripcion' => 'GET, POST y controladores invocables',
                        'usar_url_video' => true,
                        'url_video' => 'https://vimeo.com/76979871',
                    ],
                ],
            ],
        ];

        foreach ($nivelesData as $nivelData) {
            $nivel = Nivel::create([
                'curso_id' => $curso->id,
                'numero' => $nivelData['numero'],
                'titulo' => $nivelData['titulo'],
                'descripcion' => $nivelData['descripcion'] ?? null,
            ]);

            foreach ($nivelData['subniveles'] as $sub) {
                Subnivel::create([
                    'nivel_id' => $nivel->id,
                    'numero' => $sub['numero'],
                    'titulo' => $sub['titulo'],
                    'descripcion' => $sub['descripcion'] ?? null,
                    'url_iframe' => $sub['url_iframe'] ?? null,
                    'url_video' => $sub['url_video'] ?? null,
                    'usar_iframe' => !empty($sub['usar_iframe']),
                    'usar_url_video' => !empty($sub['usar_url_video']),
                    'usar_video_archivo' => false,
                ]);
            }
        }
    }
}


