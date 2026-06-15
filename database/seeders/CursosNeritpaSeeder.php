<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CursosNeritpaSeeder extends Seeder
{
    public function run(): void
    {
        // Crear o verificar el usuario creador neritpa@gmail.com
        $creadorId = $this->crearUsuarioNeritpa();

        // Obtener categorías disponibles
        $categorias = DB::table('categorias')->pluck('id', 'nombre')->toArray();

        // Si no hay categorías, crear algunas básicas
        if (empty($categorias)) {
            $categorias = $this->crearCategoriasBasicas();
        }

        // Crear cursos de ejemplo para neritpa
        $this->crearCursosNeritpa($creadorId, $categorias);
    }

    private function crearUsuarioNeritpa()
    {
        // Buscar el tipo de usuario creador
        $tipoCreadorId = DB::table('tipos_usuarios')
            ->where('nombre', 'creador')
            ->value('id');

        if (!$tipoCreadorId) {
            // Si no existe el tipo creador, crearlo
            $tipoCreadorId = DB::table('tipos_usuarios')->insertGetId([
                'nombre' => 'creador',
                'descripcion' => 'Creador de contenido educativo',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Crear o actualizar el usuario neritpa
        $usuarioId = DB::table('users')->updateOrInsert(
            ['email' => 'neritpa@gmial.com'],
            [
                'name' => 'Neritpa',
                'apellido_paterno' => 'García',
                'apellido_materno' => 'López',
                'password' => Hash::make('HiddenCobra18@'),
                'tipo_usuario_id' => $tipoCreadorId,
                'verificado' => true,
                'status' => 'activo',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Si es insert, obtener el ID
        if ($usuarioId === true) {
            $usuarioId = DB::table('users')
                ->where('email', 'neritpa@gmial.com')
                ->value('id');
        }

        return $usuarioId;
    }

    private function crearCategoriasBasicas()
    {
        $categorias = [
            'Programación' => 'Cursos de desarrollo de software y programación',
            'Diseño' => 'Cursos de diseño gráfico, web y UX/UI',
            'Marketing' => 'Cursos de marketing digital y estrategias de ventas',
            'Negocios' => 'Cursos de emprendimiento y gestión empresarial',
            'Tecnología' => 'Cursos de nuevas tecnologías y herramientas digitales',
            'Ciberseguridad' => 'Cursos de seguridad informática y hacking ético',
            'Data Science' => 'Cursos de ciencia de datos y análisis',
        ];

        $categoriaIds = [];
        foreach ($categorias as $nombre => $descripcion) {
            $id = DB::table('categorias')->updateOrInsert(
                ['nombre' => $nombre],
                [
                    'nombre' => $nombre,
                    'descripcion' => $descripcion,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            if ($id === true) {
                $id = DB::table('categorias')->where('nombre', $nombre)->value('id');
            }
            $categoriaIds[$nombre] = $id;
        }

        return $categoriaIds;
    }

    private function crearCursosNeritpa($creadorId, $categorias)
    {
        $cursos = [
            [
                'titulo' => 'Desarrollo Web Full Stack con Laravel y Vue.js',
                'descripcion' => 'Aprende a crear aplicaciones web modernas y escalables desde cero. Este curso completo te enseñará Laravel como backend y Vue.js como frontend, incluyendo autenticación, APIs REST, bases de datos y deployment en producción.',
                'objetivos_aprendizaje' => "• Dominar Laravel 10 y sus características principales\n• Implementar autenticación y autorización robusta\n• Crear APIs REST con documentación\n• Desarrollar interfaces modernas con Vue.js 3\n• Integrar frontend y backend de manera eficiente\n• Implementar testing automatizado\n• Desplegar aplicaciones en producción\n• Optimizar rendimiento y seguridad",
                'requisitos_previos' => "• Conocimientos básicos de PHP (recomendado)\n• Familiaridad con HTML, CSS y JavaScript\n• Experiencia básica con bases de datos SQL\n• Conocimientos básicos de Git\n• Motivación para aprender desarrollo web moderno",
                'categoria_id' => $categorias['Programación'] ?? 1,
                'precio' => 299.99,
                'duracion_horas' => 60,
                'nivel_dificultad' => 'intermedio',
                'cupo_maximo' => 30,
                'fecha_inicio' => Carbon::now()->addDays(7),
                'fecha_fin' => Carbon::now()->addDays(67),
                'slug' => 'desarrollo-web-fullstack-laravel-vuejs',
                'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'creador_nombre' => 'Neritpa',
                'creador_apellido' => 'García López',
                'creador_profesion' => 'Desarrollador Full Stack Senior',
                'creador_descripcion' => 'Desarrollador con más de 8 años de experiencia en desarrollo web. Especialista en Laravel, Vue.js, React y Node.js. Ha trabajado en proyectos para empresas Fortune 500 y startups exitosas. Certificado en AWS y Google Cloud.',
                'facebook_usuario' => 'neritpa.dev',
                'twitter_usuario' => '@neritpa_dev',
                'linkedin_usuario' => 'neritpa-garcia',
                'instagram_usuario' => '@neritpa_codes',
                'tiktok_usuario' => '@neritpa_tech',
                'activo' => true,
                'comentarios_aprobacion' => 'Curso aprobado - Contenido de alta calidad técnica',
                'fecha_aprobacion' => Carbon::now()->subDays(2),
                'aprobado_por' => 1,
            ],
            [
                'titulo' => 'Ciberseguridad Avanzada y Ethical Hacking',
                'descripcion' => 'Domina las técnicas de ciberseguridad y hacking ético. Aprende a proteger sistemas, realizar auditorías de seguridad, análisis de vulnerabilidades y respuesta a incidentes. Incluye certificaciones reconocidas en la industria.',
                'objetivos_aprendizaje' => "• Comprender fundamentos de ciberseguridad\n• Realizar pruebas de penetración éticas\n• Analizar vulnerabilidades en sistemas\n• Implementar medidas de seguridad robustas\n• Responder a incidentes de seguridad\n• Obtener certificaciones CEH y CISSP\n• Desarrollar políticas de seguridad\n• Crear planes de continuidad del negocio",
                'requisitos_previos' => "• Conocimientos básicos de redes y sistemas operativos\n• Experiencia con Linux (recomendado)\n• Conocimientos básicos de programación\n• Compromiso ético y legal\n• Motivación para aprender seguridad informática",
                'categoria_id' => $categorias['Ciberseguridad'] ?? 1,
                'precio' => 399.99,
                'duracion_horas' => 80,
                'nivel_dificultad' => 'avanzado',
                'cupo_maximo' => 20,
                'fecha_inicio' => Carbon::now()->addDays(14),
                'fecha_fin' => Carbon::now()->addDays(94),
                'slug' => 'ciberseguridad-avanzada-ethical-hacking',
                'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'creador_nombre' => 'Neritpa',
                'creador_apellido' => 'García López',
                'creador_profesion' => 'Especialista en Ciberseguridad',
                'creador_descripcion' => 'Especialista en ciberseguridad con 10 años de experiencia. Certificado CEH, CISSP y OSCP. Ha trabajado en auditorías de seguridad para bancos, gobiernos y empresas tecnológicas. Experto en respuesta a incidentes.',
                'facebook_usuario' => 'neritpa.security',
                'twitter_usuario' => '@neritpa_sec',
                'linkedin_usuario' => 'neritpa-security',
                'instagram_usuario' => '@neritpa_security',
                'tiktok_usuario' => '@neritpa_hack',
                'activo' => true,
                'comentarios_aprobacion' => 'Curso avanzado aprobado - Contenido especializado',
                'fecha_aprobacion' => Carbon::now()->subDays(1),
                'aprobado_por' => 1,
            ],
            [
                'titulo' => 'Data Science y Machine Learning con Python',
                'descripcion' => 'Aprende ciencia de datos y machine learning desde cero usando Python. Incluye análisis estadístico, visualización de datos, algoritmos de ML, deep learning y proyectos reales con datasets del mundo real.',
                'objetivos_aprendizaje' => "• Dominar Python para ciencia de datos\n• Realizar análisis estadístico avanzado\n• Crear visualizaciones impactantes\n• Implementar algoritmos de machine learning\n• Desarrollar modelos de deep learning\n• Trabajar con big data y Spark\n• Crear pipelines de datos automatizados\n• Desplegar modelos en producción",
                'requisitos_previos' => "• Conocimientos básicos de programación\n• Matemáticas básicas (estadística recomendada)\n• Motivación para aprender data science\n• Acceso a computadora con internet\n• Paciencia para trabajar con datos",
                'categoria_id' => $categorias['Data Science'] ?? 1,
                'precio' => 349.99,
                'duracion_horas' => 70,
                'nivel_dificultad' => 'intermedio',
                'cupo_maximo' => 25,
                'fecha_inicio' => Carbon::now()->addDays(21),
                'fecha_fin' => Carbon::now()->addDays(91),
                'slug' => 'data-science-machine-learning-python',
                'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'creador_nombre' => 'Neritpa',
                'creador_apellido' => 'García López',
                'creador_profesion' => 'Data Scientist Senior',
                'creador_descripcion' => 'Data Scientist con 7 años de experiencia en machine learning y análisis de datos. PhD en Ciencias de la Computación. Ha trabajado en proyectos de IA para empresas Fortune 500 y startups de tecnología.',
                'facebook_usuario' => 'neritpa.data',
                'twitter_usuario' => '@neritpa_data',
                'linkedin_usuario' => 'neritpa-datascience',
                'instagram_usuario' => '@neritpa_ai',
                'tiktok_usuario' => '@neritpa_ml',
                'activo' => true,
                'comentarios_aprobacion' => 'Excelente curso de data science',
                'fecha_aprobacion' => Carbon::now()->subDays(3),
                'aprobado_por' => 1,
            ]
        ];

        foreach ($cursos as $cursoData) {
            $cursoData['creador_id'] = $creadorId;
            $cursoData['created_at'] = now();
            $cursoData['updated_at'] = now();

            // Usar updateOrInsert para evitar duplicados
            $cursoId = DB::table('cursos')->updateOrInsert(
                ['slug' => $cursoData['slug']],
                $cursoData
            );

            // Si es insert, obtener el ID
            if ($cursoId === true) {
                $cursoId = DB::table('cursos')
                    ->where('slug', $cursoData['slug'])
                    ->value('id');
            }

            // Crear niveles y subniveles para cada curso
            $this->crearNivelesYSubniveles($cursoId, $cursoData['titulo']);
        }
    }

    private function crearNivelesYSubniveles($cursoId, $tituloCurso)
    {
        $nivelesData = $this->obtenerEstructuraNiveles($tituloCurso);

        foreach ($nivelesData as $nivelIndex => $nivelData) {
            // Usar updateOrInsert para evitar duplicados
            $nivelId = DB::table('niveles')->updateOrInsert(
                [
                    'curso_id' => $cursoId,
                    'numero' => $nivelIndex + 1,
                ],
                [
                    'curso_id' => $cursoId,
                    'numero' => $nivelIndex + 1,
                    'titulo' => $nivelData['titulo'],
                    'descripcion' => $nivelData['descripcion'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            // Si es insert, obtener el ID
            if ($nivelId === true) {
                $nivelId = DB::table('niveles')
                    ->where('curso_id', $cursoId)
                    ->where('numero', $nivelIndex + 1)
                    ->value('id');
            }

            // Crear subniveles para este nivel
            foreach ($nivelData['subniveles'] as $subnivelIndex => $subnivelData) {
                DB::table('subniveles')->updateOrInsert(
                    [
                        'nivel_id' => $nivelId,
                        'numero' => $subnivelIndex + 1,
                    ],
                    [
                        'nivel_id' => $nivelId,
                        'numero' => $subnivelIndex + 1,
                        'titulo' => $subnivelData['titulo'],
                        'descripcion' => $subnivelData['descripcion'],
                        'url_iframe' => $subnivelData['url_iframe'] ?? null,
                        'url_video' => $subnivelData['url_video'] ?? null,
                        'video_archivo_path' => $subnivelData['video_archivo_path'] ?? null,
                        'video_archivo_nombre' => $subnivelData['video_archivo_nombre'] ?? null,
                        'video_archivo_tipo' => $subnivelData['video_archivo_tipo'] ?? null,
                        'video_archivo_tamaño' => $subnivelData['video_archivo_tamaño'] ?? null,
                        'usar_iframe' => $subnivelData['usar_iframe'] ?? false,
                        'usar_url_video' => $subnivelData['usar_url_video'] ?? false,
                        'usar_video_archivo' => $subnivelData['usar_video_archivo'] ?? false,
                        'recurso_path' => $subnivelData['recurso_path'] ?? null,
                        'recurso_nombre' => $subnivelData['recurso_nombre'] ?? null,
                        'recurso_tipo' => $subnivelData['recurso_tipo'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }

    private function obtenerEstructuraNiveles($tituloCurso)
    {
        if (strpos($tituloCurso, 'Laravel') !== false) {
            return [
                [
                    'titulo' => 'Fundamentos de Laravel',
                    'descripcion' => 'Aprende los conceptos básicos de Laravel y configura tu entorno de desarrollo profesional.',
                    'subniveles' => [
                        [
                            'titulo' => 'Instalación y Configuración',
                            'descripcion' => 'Configura Laravel en tu sistema y entiende la estructura del framework.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                            'recurso_nombre' => 'guia-instalacion-laravel.pdf',
                            'recurso_tipo' => 'pdf',
                        ],
                        [
                            'titulo' => 'Estructura de Directorios',
                            'descripcion' => 'Comprende la organización de archivos y carpetas en Laravel.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Artisan CLI',
                            'descripcion' => 'Domina las herramientas de línea de comandos de Laravel.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Bases de Datos y Eloquent',
                    'descripcion' => 'Aprende a trabajar con bases de datos usando Eloquent ORM de Laravel.',
                    'subniveles' => [
                        [
                            'titulo' => 'Migraciones',
                            'descripcion' => 'Crea y gestiona la estructura de tu base de datos.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                            'recurso_nombre' => 'ejemplos-migraciones.sql',
                            'recurso_tipo' => 'sql',
                        ],
                        [
                            'titulo' => 'Modelos Eloquent',
                            'descripcion' => 'Crea modelos y relaciones entre entidades.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Relaciones',
                            'descripcion' => 'Implementa relaciones uno a uno, uno a muchos y muchos a muchos.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Frontend con Vue.js',
                    'descripcion' => 'Integra Vue.js con Laravel para crear interfaces modernas y reactivas.',
                    'subniveles' => [
                        [
                            'titulo' => 'Configuración de Vue.js',
                            'descripcion' => 'Configura Vue.js en tu proyecto Laravel.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Componentes Vue',
                            'descripcion' => 'Crea componentes reutilizables con Vue.js.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Comunicación con API',
                            'descripcion' => 'Conecta Vue.js con tu API Laravel.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'APIs REST y Autenticación',
                    'descripcion' => 'Crea APIs REST robustas y sistemas de autenticación seguros.',
                    'subniveles' => [
                        [
                            'titulo' => 'Crear APIs REST',
                            'descripcion' => 'Desarrolla endpoints RESTful con Laravel.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Autenticación JWT',
                            'descripcion' => 'Implementa autenticación con tokens JWT.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Documentación API',
                            'descripcion' => 'Documenta tus APIs con Swagger/OpenAPI.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Testing y Deployment',
                    'descripcion' => 'Implementa testing automatizado y despliega tu aplicación.',
                    'subniveles' => [
                        [
                            'titulo' => 'Testing Unitario',
                            'descripcion' => 'Escribe tests unitarios con PHPUnit.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Testing de Integración',
                            'descripcion' => 'Crea tests de integración para tus APIs.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Deployment en Producción',
                            'descripcion' => 'Despliega tu aplicación en servidores de producción.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ]
            ];
        } elseif (strpos($tituloCurso, 'Ciberseguridad') !== false) {
            return [
                [
                    'titulo' => 'Fundamentos de Ciberseguridad',
                    'descripcion' => 'Aprende los conceptos básicos de seguridad informática y amenazas cibernéticas.',
                    'subniveles' => [
                        [
                            'titulo' => 'Introducción a la Ciberseguridad',
                            'descripcion' => 'Comprende qué es la ciberseguridad y por qué es importante.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Tipos de Amenazas',
                            'descripcion' => 'Identifica diferentes tipos de amenazas cibernéticas.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Modelos de Seguridad',
                            'descripcion' => 'Aprende sobre modelos de seguridad como CIA y Zero Trust.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Análisis de Vulnerabilidades',
                    'descripcion' => 'Aprende a identificar y analizar vulnerabilidades en sistemas.',
                    'subniveles' => [
                        [
                            'titulo' => 'Reconocimiento',
                            'descripcion' => 'Técnicas de reconocimiento y recolección de información.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Escaneo de Puertos',
                            'descripcion' => 'Herramientas para escanear puertos y servicios.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Análisis de Vulnerabilidades',
                            'descripcion' => 'Identifica vulnerabilidades usando herramientas especializadas.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Pruebas de Penetración',
                    'descripcion' => 'Realiza pruebas de penetración éticas en sistemas.',
                    'subniveles' => [
                        [
                            'titulo' => 'Metodología de Pentesting',
                            'descripcion' => 'Aprende metodologías estándar de pruebas de penetración.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Explotación de Vulnerabilidades',
                            'descripcion' => 'Técnicas para explotar vulnerabilidades encontradas.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Post-explotación',
                            'descripcion' => 'Mantén acceso y escalación de privilegios.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Herramientas de Seguridad',
                    'descripcion' => 'Domina herramientas profesionales de ciberseguridad.',
                    'subniveles' => [
                        [
                            'titulo' => 'Kali Linux',
                            'descripcion' => 'Usa Kali Linux para pruebas de penetración.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Metasploit Framework',
                            'descripcion' => 'Explota vulnerabilidades con Metasploit.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Burp Suite',
                            'descripcion' => 'Analiza aplicaciones web con Burp Suite.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Respuesta a Incidentes',
                    'descripcion' => 'Aprende a responder efectivamente a incidentes de seguridad.',
                    'subniveles' => [
                        [
                            'titulo' => 'Detección de Incidentes',
                            'descripcion' => 'Identifica y detecta incidentes de seguridad.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Contención y Erradicación',
                            'descripcion' => 'Contiene y elimina amenazas de seguridad.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Recuperación y Lecciones',
                            'descripcion' => 'Recupera sistemas y aprende de incidentes.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ]
            ];
        } else {
            // Estructura para Data Science
            return [
                [
                    'titulo' => 'Fundamentos de Python para Data Science',
                    'descripcion' => 'Aprende Python desde cero enfocado en ciencia de datos.',
                    'subniveles' => [
                        [
                            'titulo' => 'Python Básico',
                            'descripcion' => 'Fundamentos de programación en Python.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'NumPy y Pandas',
                            'descripcion' => 'Manipulación de datos con NumPy y Pandas.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Visualización con Matplotlib',
                            'descripcion' => 'Crea visualizaciones impactantes con Matplotlib.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Análisis Estadístico',
                    'descripcion' => 'Aprende estadística aplicada para ciencia de datos.',
                    'subniveles' => [
                        [
                            'titulo' => 'Estadística Descriptiva',
                            'descripcion' => 'Medidas de tendencia central y dispersión.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Distribuciones de Probabilidad',
                            'descripcion' => 'Distribuciones normales, binomiales y otras.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Pruebas de Hipótesis',
                            'descripcion' => 'Realiza pruebas estadísticas de hipótesis.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Machine Learning Supervisado',
                    'descripcion' => 'Algoritmos de machine learning con datos etiquetados.',
                    'subniveles' => [
                        [
                            'titulo' => 'Regresión Lineal',
                            'descripcion' => 'Implementa modelos de regresión lineal.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Clasificación',
                            'descripcion' => 'Algoritmos de clasificación como Random Forest.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Validación Cruzada',
                            'descripcion' => 'Evalúa modelos usando validación cruzada.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Machine Learning No Supervisado',
                    'descripcion' => 'Algoritmos para datos sin etiquetas.',
                    'subniveles' => [
                        [
                            'titulo' => 'Clustering',
                            'descripcion' => 'Algoritmos de clustering como K-means.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Reducción de Dimensionalidad',
                            'descripcion' => 'PCA y otras técnicas de reducción.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Detección de Anomalías',
                            'descripcion' => 'Identifica patrones anómalos en datos.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ],
                [
                    'titulo' => 'Deep Learning',
                    'descripcion' => 'Redes neuronales y deep learning con TensorFlow.',
                    'subniveles' => [
                        [
                            'titulo' => 'Redes Neuronales',
                            'descripcion' => 'Fundamentos de redes neuronales artificiales.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'TensorFlow y Keras',
                            'descripcion' => 'Implementa modelos con TensorFlow y Keras.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                        [
                            'titulo' => 'Proyecto Final',
                            'descripcion' => 'Desarrolla un proyecto completo de deep learning.',
                            'url_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                            'usar_url_video' => true,
                        ],
                    ]
                ]
            ];
        }
    }
}
