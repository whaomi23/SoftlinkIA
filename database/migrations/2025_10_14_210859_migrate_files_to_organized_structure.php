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
        $this->migrateCursoFiles();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->revertCursoFiles();
    }

    private function migrateCursoFiles()
    {
        echo "Iniciando migración de archivos a estructura organizada...\n";

        $cursos = Curso::with(['categoria', 'niveles.subniveles'])->get();

        foreach ($cursos as $curso) {
            echo "Procesando curso: {$curso->titulo} (ID: {$curso->id})\n";

            // Generar nueva ruta organizada
            $creadorId = $curso->creador_id;
            $categoriaSlug = $curso->categoria ? $curso->categoria->slug : 'sin-categoria';
            $cursoSlug = $curso->slug;
            $newBasePath = "creadores/{$creadorId}/{$categoriaSlug}/{$cursoSlug}";

            // Migrar imagen principal
            if ($curso->url_imagen && Storage::disk('public')->exists($curso->url_imagen)) {
                $oldPath = $curso->url_imagen;
                $fileName = basename($oldPath);
                $newPath = $newBasePath . '/' . $fileName;

                if ($this->moveFile($oldPath, $newPath)) {
                    $curso->url_imagen = $newPath;
                    echo "  ✓ Imagen migrada: {$oldPath} -> {$newPath}\n";
                }
            }

            // Migrar recursos de subniveles
            foreach ($curso->niveles as $nivel) {
                foreach ($nivel->subniveles as $subnivel) {
                    if ($subnivel->recurso_path) {
                        $paths = is_array($subnivel->recurso_path) ?
                            $subnivel->recurso_path :
                            json_decode($subnivel->recurso_path, true);

                        if ($paths) {
                            $newPaths = [];
                            foreach ($paths as $index => $oldPath) {
                                if (Storage::disk('public')->exists($oldPath)) {
                                    $fileName = basename($oldPath);
                                    $newPath = $newBasePath . '/recursos/' . $fileName;

                                    if ($this->moveFile($oldPath, $newPath)) {
                                        $newPaths[] = $newPath;
                                        echo "  ✓ Recurso migrado: {$oldPath} -> {$newPath}\n";
                                    } else {
                                        $newPaths[] = $oldPath; // Mantener ruta original si falla
                                    }
                                } else {
                                    $newPaths[] = $oldPath; // Mantener ruta original si no existe
                                }
                            }

                            $subnivel->recurso_path = json_encode($newPaths);
                        }
                    }

                    // Migrar videos
                    if ($subnivel->video_archivo_path && Storage::disk('public')->exists($subnivel->video_archivo_path)) {
                        $oldPath = $subnivel->video_archivo_path;
                        $fileName = basename($oldPath);
                        $newPath = $newBasePath . '/videos/' . $fileName;

                        if ($this->moveFile($oldPath, $newPath)) {
                            $subnivel->video_archivo_path = $newPath;
                            echo "  ✓ Video migrado: {$oldPath} -> {$newPath}\n";
                        }
                    }

                    $subnivel->save();
                }
            }

            $curso->save();
            echo "Curso {$curso->titulo} migrado completamente.\n\n";
        }

        echo "Migración completada!\n";
    }

    private function revertCursoFiles()
    {
        echo "Revirtiendo migración de archivos...\n";

        $cursos = Curso::with(['categoria', 'niveles.subniveles'])->get();

        foreach ($cursos as $curso) {
            echo "Revirtiendo curso: {$curso->titulo} (ID: {$curso->id})\n";

            // Revertir imagen principal
            if ($curso->url_imagen && str_contains($curso->url_imagen, 'creadores/')) {
                $oldPath = $curso->url_imagen;
                $fileName = basename($oldPath);
                $newPath = 'cursos/' . $fileName;

                if ($this->moveFile($oldPath, $newPath)) {
                    $curso->url_imagen = $newPath;
                    echo "  ✓ Imagen revertida: {$oldPath} -> {$newPath}\n";
                }
            }

            // Revertir recursos de subniveles
            foreach ($curso->niveles as $nivel) {
                foreach ($nivel->subniveles as $subnivel) {
                    if ($subnivel->recurso_path) {
                        $paths = is_array($subnivel->recurso_path) ?
                            $subnivel->recurso_path :
                            json_decode($subnivel->recurso_path, true);

                        if ($paths) {
                            $newPaths = [];
                            foreach ($paths as $index => $oldPath) {
                                if (str_contains($oldPath, 'creadores/')) {
                                    $fileName = basename($oldPath);
                                    $newPath = 'recursos-subniveles/' . $fileName;

                                    if ($this->moveFile($oldPath, $newPath)) {
                                        $newPaths[] = $newPath;
                                        echo "  ✓ Recurso revertido: {$oldPath} -> {$newPath}\n";
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
                    if ($subnivel->video_archivo_path && str_contains($subnivel->video_archivo_path, 'creadores/')) {
                        $oldPath = $subnivel->video_archivo_path;
                        $fileName = basename($oldPath);
                        $newPath = 'videos-subniveles/' . $fileName;

                        if ($this->moveFile($oldPath, $newPath)) {
                            $subnivel->video_archivo_path = $newPath;
                            echo "  ✓ Video revertido: {$oldPath} -> {$newPath}\n";
                        }
                    }

                    $subnivel->save();
                }
            }

            $curso->save();
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
