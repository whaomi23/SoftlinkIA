<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Curso;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Nivel;
use App\Models\Subnivel;
use Illuminate\Support\Facades\Storage;

class TestCreadorEstructura extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:creador-estructura';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Probar la creación de estructura de carpetas para creadores';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🧪 Probando estructura de carpetas para creadores...');

        // Buscar un usuario creador
        $creador = User::whereHas('tipoUsuario', function($query) {
            $query->where('nombre', 'creador');
        })->first();

        if (!$creador) {
            $this->error('❌ No se encontró ningún usuario creador. Crea uno primero.');
            return;
        }

        $this->info("👤 Usuario creador encontrado: {$creador->name}");

        // Buscar una categoría
        $categoria = Categoria::first();
        if (!$categoria) {
            $this->error('❌ No se encontró ninguna categoría. Crea una primero.');
            return;
        }

        $this->info("📂 Categoría encontrada: {$categoria->nombre}");

        // Crear un curso de prueba
        $curso = Curso::create([
            'titulo' => 'Curso de Prueba - Estructura de Carpetas',
            'descripcion' => 'Este es un curso de prueba para verificar la estructura de carpetas',
            'categoria_id' => $categoria->id,
            'creador_id' => $creador->id,
            'slug' => 'curso-prueba-estructura-carpetas',
            'precio' => 0,
            'activo' => false,
            'creador_nombre' => $creador->name,
            'creador_apellido' => $creador->apellido_paterno ?? 'Apellido',
            'creador_profesion' => 'Desarrollador de Prueba',
            'creador_descripcion' => 'Creador de contenido de prueba',
        ]);

        $this->info("📚 Curso creado: {$curso->titulo}");

        // Crear niveles y subniveles de prueba
        $nivel1 = Nivel::create([
            'curso_id' => $curso->id,
            'numero' => 1,
            'titulo' => 'Nivel 1: Fundamentos',
            'descripcion' => 'Aprende los conceptos básicos',
        ]);

        $nivel2 = Nivel::create([
            'curso_id' => $curso->id,
            'numero' => 2,
            'titulo' => 'Nivel 2: Intermedio',
            'descripcion' => 'Profundiza en los conceptos',
        ]);

        // Crear subniveles para el nivel 1
        Subnivel::create([
            'nivel_id' => $nivel1->id,
            'numero' => 1,
            'titulo' => 'Subnivel 1.1: Introducción',
            'descripcion' => 'Primera lección del nivel 1',
        ]);

        Subnivel::create([
            'nivel_id' => $nivel1->id,
            'numero' => 2,
            'titulo' => 'Subnivel 1.2: Conceptos Básicos',
            'descripcion' => 'Segunda lección del nivel 1',
        ]);

        // Crear subniveles para el nivel 2
        Subnivel::create([
            'nivel_id' => $nivel2->id,
            'numero' => 1,
            'titulo' => 'Subnivel 2.1: Conceptos Avanzados',
            'descripcion' => 'Primera lección del nivel 2',
        ]);

        $this->info("📖 Niveles y subniveles creados");

        // Cargar las relaciones
        $curso->load(['niveles.subniveles']);

        // Crear la estructura de carpetas
        $this->crearEstructuraCarpetas($curso);

        $this->info("✅ Estructura de carpetas creada exitosamente!");
        $this->info("📁 Ruta base: storage/app/public/creadores/{$creador->id}/{$categoria->nombre}/{$curso->slug}/");

        // Mostrar la estructura creada
        $this->mostrarEstructura($curso);

        // Limpiar el curso de prueba
        $this->info("🧹 Limpiando curso de prueba...");
        $curso->delete();
        $this->info("✅ Curso de prueba eliminado");
    }

    private function crearEstructuraCarpetas(Curso $curso)
    {
        $user = $curso->creador;
        $categoria = $curso->categoria;

        // Estructura base: creadores/{user_id}/{categoria}/{curso-slug}/
        $basePath = "creadores/{$user->id}/{$categoria->nombre}/{$curso->slug}";

        // Crear carpetas principales
        $carpetas = [
            "{$basePath}/niveles",
            "{$basePath}/recursos",
            "{$basePath}/imagenes",
            "{$basePath}/videos"
        ];

        foreach ($carpetas as $carpeta) {
            Storage::disk('public')->makeDirectory($carpeta);
        }

        // Crear estructura de niveles y subniveles
        if ($curso->niveles) {
            foreach ($curso->niveles as $nivel) {
                // Crear carpeta del nivel: niveles/nivel-1/
                $carpetaNivel = "{$basePath}/niveles/nivel-{$nivel->numero}";
                Storage::disk('public')->makeDirectory($carpetaNivel);

                // Crear carpetas de recursos y videos por nivel
                $carpetasNivel = [
                    "{$carpetaNivel}/recursos",
                    "{$carpetaNivel}/videos"
                ];

                foreach ($carpetasNivel as $carpetaNivelEspecifica) {
                    Storage::disk('public')->makeDirectory($carpetaNivelEspecifica);
                }

                // Crear carpetas de subniveles
                foreach ($nivel->subniveles as $subnivel) {
                    $carpetaSubnivel = "{$carpetaNivel}/subnivel-{$subnivel->numero}";
                    Storage::disk('public')->makeDirectory($carpetaSubnivel);

                    // Crear subcarpetas dentro de cada subnivel
                    $carpetasSubnivel = [
                        "{$carpetaSubnivel}/recursos",
                        "{$carpetaSubnivel}/videos"
                    ];

                    foreach ($carpetasSubnivel as $carpetaSubnivelEspecifica) {
                        Storage::disk('public')->makeDirectory($carpetaSubnivelEspecifica);
                    }
                }
            }
        }

        // Crear estructura adicional de recursos y videos por nivel
        if ($curso->niveles) {
            foreach ($curso->niveles as $nivel) {
                // Recursos por nivel: recursos/nivel-1/
                $carpetaRecursosNivel = "{$basePath}/recursos/nivel-{$nivel->numero}";
                Storage::disk('public')->makeDirectory($carpetaRecursosNivel);

                // Videos por nivel: videos/nivel-1/
                $carpetaVideosNivel = "{$basePath}/videos/nivel-{$nivel->numero}";
                Storage::disk('public')->makeDirectory($carpetaVideosNivel);

                // Crear subcarpetas de subniveles dentro de recursos y videos
                foreach ($nivel->subniveles as $subnivel) {
                    // Recursos por subnivel: recursos/nivel-1/subnivel-1/
                    $carpetaRecursosSubnivel = "{$carpetaRecursosNivel}/subnivel-{$subnivel->numero}";
                    Storage::disk('public')->makeDirectory($carpetaRecursosSubnivel);

                    // Videos por subnivel: videos/nivel-1/subnivel-1/
                    $carpetaVideosSubnivel = "{$carpetaVideosNivel}/subnivel-{$subnivel->numero}";
                    Storage::disk('public')->makeDirectory($carpetaVideosSubnivel);
                }
            }
        }

        // Crear carpeta para imagen del curso
        $carpetaImagenes = "{$basePath}/imagenes";
        Storage::disk('public')->makeDirectory($carpetaImagenes);
    }

    private function mostrarEstructura(Curso $curso)
    {
        $user = $curso->creador;
        $categoria = $curso->categoria;
        $basePath = "creadores/{$user->id}/{$categoria->nombre}/{$curso->slug}";

        $this->info("📁 Estructura creada:");
        $this->line("storage/app/public/{$basePath}/");
        $this->line("├── niveles/");

        foreach ($curso->niveles as $nivel) {
            $this->line("│   ├── nivel-{$nivel->numero}/");
            $this->line("│   │   ├── recursos/");
            $this->line("│   │   ├── videos/");

            foreach ($nivel->subniveles as $subnivel) {
                $this->line("│   │   ├── subnivel-{$subnivel->numero}/");
                $this->line("│   │   │   ├── recursos/");
                $this->line("│   │   │   └── videos/");
            }
        }

        $this->line("├── recursos/");
        foreach ($curso->niveles as $nivel) {
            $this->line("│   ├── nivel-{$nivel->numero}/");
            foreach ($nivel->subniveles as $subnivel) {
                $this->line("│   │   ├── subnivel-{$subnivel->numero}/");
            }
        }

        $this->line("├── imagenes/");
        $this->line("└── videos/");
        foreach ($curso->niveles as $nivel) {
            $this->line("    ├── nivel-{$nivel->numero}/");
            foreach ($nivel->subniveles as $subnivel) {
                $this->line("    │   ├── subnivel-{$subnivel->numero}/");
            }
        }
    }
}
