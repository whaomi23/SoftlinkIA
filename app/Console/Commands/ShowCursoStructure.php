<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Curso;

class ShowCursoStructure extends Command
{
    protected $signature = 'show:curso-structure {curso_id}';
    protected $description = 'Mostrar la estructura completa de un curso';

    public function handle()
    {
        $cursoId = $this->argument('curso_id');
        $curso = Curso::with(['categoria', 'niveles.subniveles'])->find($cursoId);

        if (!$curso) {
            $this->error("Curso con ID {$cursoId} no encontrado");
            return;
        }

        $this->info("=== ESTRUCTURA DEL CURSO ID {$cursoId} ===");
        $this->info("Título: {$curso->titulo}");
        $this->info("Slug: {$curso->slug}");
        $this->info("Creador ID: {$curso->creador_id}");
        $this->info("Categoría: " . ($curso->categoria ? $curso->categoria->nombre : 'Sin categoría'));

        $creadorId = $curso->creador_id;
        $categoriaSlug = $curso->categoria ? $curso->categoria->slug : 'sin-categoria';
        $cursoSlug = $curso->slug;

        $this->info("\n=== RUTA BASE ===");
        $this->info("storage/app/public/creadores/cursos/{$categoriaSlug}/{$creadorId}/{$cursoSlug}/");

        $this->info("\n=== ESTRUCTURA JERÁRQUICA ===");
        $this->line("📁 \"{$curso->titulo}\"/");

        foreach ($curso->niveles as $nivel) {
            $this->line("└── 📁 Nivel {$nivel->numero}: \"{$nivel->titulo}\"");

            foreach ($nivel->subniveles as $subnivel) {
                $this->line("    └── 📁 Subnivel {$subnivel->numero}: \"{$subnivel->titulo}\"");

                // Mostrar recursos
                if ($subnivel->recurso_path) {
                    $paths = is_array($subnivel->recurso_path) ?
                        $subnivel->recurso_path :
                        json_decode($subnivel->recurso_path, true);
                    $names = is_array($subnivel->recurso_nombre) ?
                        $subnivel->recurso_nombre :
                        json_decode($subnivel->recurso_nombre, true);

                    if ($paths && $names) {
                        $this->line("        ├── 📁 Recursos:");
                        foreach ($paths as $index => $path) {
                            $name = $names[$index] ?? 'Sin nombre';
                            $this->line("        │   ├── 📄 {$name}");
                            $this->line("        │   │   └── Ruta: {$path}");
                        }
                    }
                } else {
                    $this->line("        ├── 📁 Recursos: (Sin recursos)");
                }

                // Mostrar videos
                if ($subnivel->video_archivo_path) {
                    $this->line("        └── 🎥 Video: \"{$subnivel->video_archivo_nombre}\"");
                    $this->line("            └── Ruta: {$subnivel->video_archivo_path}");
                } else {
                    $this->line("        └── 🎥 Video: (No tiene video)");
                }
            }
        }

        $this->info("\n=== ESTRUCTURA DE DIRECTORIOS ===");
        $basePath = "creadores/cursos/{$categoriaSlug}/{$creadorId}/{$cursoSlug}";
        $this->line("📁 {$basePath}/");

        foreach ($curso->niveles as $nivel) {
            $this->line("├── 📁 nivel_{$nivel->numero}/");

            foreach ($nivel->subniveles as $subnivel) {
                $this->line("│   └── 📁 subnivel_{$subnivel->numero}/");

                if ($subnivel->recurso_path) {
                    $this->line("│       ├── 📁 recursos/");
                    $paths = is_array($subnivel->recurso_path) ?
                        $subnivel->recurso_path :
                        json_decode($subnivel->recurso_path, true);
                    if ($paths) {
                        foreach ($paths as $path) {
                            $fileName = basename($path);
                            $this->line("│       │   └── 📄 {$fileName}");
                        }
                    }
                }

                if ($subnivel->video_archivo_path) {
                    $this->line("│       └── 📁 videos/");
                    $fileName = basename($subnivel->video_archivo_path);
                    $this->line("│           └── 🎥 {$fileName}");
                }
            }
        }
    }
}
