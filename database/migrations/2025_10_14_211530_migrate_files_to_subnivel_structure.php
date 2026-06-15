<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Models\Curso;
use App\Models\Categoria;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->migrateFilesToSubnivelStructure();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->revertFilesFromSubnivelStructure();
    }

    private function migrateFilesToSubnivelStructure()
    {
        echo "Iniciando migración a estructura por subnivel...\n";

        $cursos = Curso::with(['categoria', 'niveles.subniveles'])->get();

        foreach ($cursos as $curso) {
            echo "Procesando curso: {$curso->titulo} (ID: {$curso->id})\n";

            // Generar ruta base del curso
            $creadorId = $curso->creador_id;
            $categoriaSlug = $curso->categoria ? $curso->categoria->slug : 'sin-categoria';
            $cursoSlug = $curso->slug;
            $cursoBasePath = "creadores/{$creadorId}/{$categoriaSlug}/{$cursoSlug}";

            // Migrar recursos de subniveles a estructura por subnivel
            foreach ($curso->niveles as $nivel) {
                echo "  Procesando Nivel {$nivel->numero}: {$nivel->titulo}\n";

                foreach ($nivel->subniveles as $subnivel) {
                    echo "    Procesando Subnivel {$subnivel->numero}: {$subnivel->titulo}\n";

                    $subnivelPath = "{$cursoBasePath}/nivel_{$nivel->numero}/subnivel_{$subnivel->numero}";

                    // Migrar recursos
                    if ($subnivel->recurso_path) {
                        $paths = is_array($subnivel->recurso_path) ?
                            $subnivel->recurso_path :
                            json_decode($subnivel->recurso_path, true);

                        if ($paths) {
                            $newPaths = [];
                            foreach ($paths as $index => $oldPath) {
                                if (Storage::disk('public')->exists($oldPath)) {
                                    $fileName = basename($oldPath);
                                    $newPath = $subnivelPath . '/recursos/' . $fileName;

                                    if ($this->moveFile($oldPath, $newPath)) {
                                        $newPaths[] = $newPath;
                                        echo "      ✓ Recurso migrado: {$fileName}\n";
                                    } else {
                                        $newPaths[] = $oldPath;
                                    }
                                } else {
                                    $newPaths[] = $oldPath;
                                }
                            }

                            $subnivel->recurso_path = json_encode($newPaths);
                        }
                    }

                    // Migrar videos
                    if ($subnivel->video_archivo_path && Storage::disk('public')->exists($subnivel->video_archivo_path)) {
                        $oldPath = $subnivel->video_archivo_path;
                        $fileName = basename($oldPath);
                        $newPath = $subnivelPath . '/videos/' . $fileName;

                        if ($this->moveFile($oldPath, $newPath)) {
                            $subnivel->video_archivo_path = $newPath;
                            echo "      ✓ Video migrado: {$fileName}\n";
                        }
                    }

                    $subnivel->save();
                }
            }

            echo "Curso {$curso->titulo} migrado completamente.\n\n";
        }

        echo "Migración a estructura por subnivel completada!\n";
    }

    private function revertFilesFromSubnivelStructure()
    {
        echo "Revirtiendo migración de estructura por subnivel...\n";

        $cursos = Curso::with(['categoria', 'niveles.subniveles'])->get();

        foreach ($cursos as $curso) {
            echo "Revirtiendo curso: {$curso->titulo} (ID: {$curso->id})\n";

            // Revertir recursos de subniveles
            foreach ($curso->niveles as $nivel) {
                foreach ($nivel->subniveles as $subnivel) {
                    // Revertir recursos
                    if ($subnivel->recurso_path) {
                        $paths = is_array($subnivel->recurso_path) ?
                            $subnivel->recurso_path :
                            json_decode($subnivel->recurso_path, true);

                        if ($paths) {
                            $newPaths = [];
                            foreach ($paths as $index => $oldPath) {
                                if (str_contains($oldPath, '/nivel_') && str_contains($oldPath, '/subnivel_')) {
                                    $fileName = basename($oldPath);
                                    $newPath = 'recursos-subniveles/' . $fileName;

                                    if ($this->moveFile($oldPath, $newPath)) {
                                        $newPaths[] = $newPath;
                                        echo "  ✓ Recurso revertido: {$fileName}\n";
                                    } else {
                                        $newPaths[] = $oldPath;
                                    }
                                } else {
                                    $newPaths[] = $oldPath;
                                }
                            }

                            $subnivel->recurso_path = json_encode($newPaths);
                        }
                    }

                    // Revertir videos
                    if ($subnivel->video_archivo_path && str_contains($subnivel->video_archivo_path, '/nivel_') && str_contains($subnivel->video_archivo_path, '/subnivel_')) {
                        $oldPath = $subnivel->video_archivo_path;
                        $fileName = basename($oldPath);
                        $newPath = 'videos-subniveles/' . $fileName;

                        if ($this->moveFile($oldPath, $newPath)) {
                            $subnivel->video_archivo_path = $newPath;
                            echo "  ✓ Video revertido: {$fileName}\n";
                        }
                    }

                    $subnivel->save();
                }
            }
        }

        echo "Reversión completada!\n";
    }

    private function moveFile($oldPath, $newPath)
    {
        try {
            // Crear directorio de destino si no existe
            $newDir = dirname($newPath);
            if (!Storage::disk('public')->exists($newDir)) {
                Storage::disk('public')->makeDirectory($newDir);
            }

            // Mover archivo
            Storage::disk('public')->move($oldPath, $newPath);
            return true;
        } catch (Exception $e) {
            echo "  ✗ Error moviendo archivo {$oldPath}: " . $e->getMessage() . "\n";
            return false;
        }
    }
};
