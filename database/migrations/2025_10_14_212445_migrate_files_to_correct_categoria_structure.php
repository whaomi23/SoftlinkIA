<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;
use App\Models\Curso;
use App\Models\Categoria;

return new class extends Migration
{
    public function up()
    {
        echo "Migrando archivos a estructura correcta: creadores/cursos/{categoria_slug}/{creador_id}/{curso_slug}/\n";

        $cursos = Curso::with(['categoria', 'niveles.subniveles'])->get();

        foreach ($cursos as $curso) {
            echo "Procesando curso: {$curso->titulo} (ID: {$curso->id})\n";

            $creadorId = $curso->creador_id;
            $categoriaSlug = $curso->categoria ? $curso->categoria->slug : 'sin-categoria';
            $cursoSlug = $curso->slug;

            $nuevaRutaBase = "creadores/cursos/{$categoriaSlug}/{$creadorId}/{$cursoSlug}";

            // Migrar imagen principal del curso
            if ($curso->url_imagen) {
                $rutaActual = $curso->url_imagen;
                $nombreArchivo = basename($rutaActual);
                $nuevaRuta = "{$nuevaRutaBase}/{$nombreArchivo}";

                if (Storage::disk('public')->exists($rutaActual)) {
                    Storage::disk('public')->move($rutaActual, $nuevaRuta);
                    $curso->url_imagen = $nuevaRuta;
                    $curso->save();
                    echo "Imagen principal: {$rutaActual} → {$nuevaRuta}\n";
                }
            }

            // Migrar archivos de subniveles
            foreach ($curso->niveles as $nivel) {
                foreach ($nivel->subniveles as $subnivel) {
                    $nivelNumero = $nivel->numero;
                    $subnivelNumero = $subnivel->numero;

                    // Migrar videos
                    if ($subnivel->video_archivo_path) {
                        $rutaActual = $subnivel->video_archivo_path;
                        $nombreArchivo = basename($rutaActual);
                        $nuevaRuta = "{$nuevaRutaBase}/nivel_{$nivelNumero}/subnivel_{$subnivelNumero}/videos/{$nombreArchivo}";

                        if (Storage::disk('public')->exists($rutaActual)) {
                            Storage::disk('public')->move($rutaActual, $nuevaRuta);
                            $subnivel->video_archivo_path = $nuevaRuta;
                            echo "Video: {$rutaActual} → {$nuevaRuta}\n";
                        }
                    }

                    // Migrar recursos
                    if ($subnivel->recurso_path) {
                        $paths = is_array($subnivel->recurso_path) ?
                            $subnivel->recurso_path :
                            json_decode($subnivel->recurso_path, true);
                        $names = is_array($subnivel->recurso_nombre) ?
                            $subnivel->recurso_nombre :
                            json_decode($subnivel->recurso_nombre, true);
                        $types = is_array($subnivel->recurso_tipo) ?
                            $subnivel->recurso_tipo :
                            json_decode($subnivel->recurso_tipo, true);

                        if ($paths && $names && $types) {
                            $nuevasRutas = [];
                            $nuevosNombres = [];
                            $nuevosTipos = [];

                            foreach ($paths as $index => $rutaActual) {
                                $nombreArchivo = basename($rutaActual);
                                $nuevaRuta = "{$nuevaRutaBase}/nivel_{$nivelNumero}/subnivel_{$subnivelNumero}/recursos/{$nombreArchivo}";

                                if (Storage::disk('public')->exists($rutaActual)) {
                                    Storage::disk('public')->move($rutaActual, $nuevaRuta);
                                    $nuevasRutas[] = $nuevaRuta;
                                    $nuevosNombres[] = $names[$index] ?? $nombreArchivo;
                                    $nuevosTipos[] = $types[$index] ?? 'application/octet-stream';
                                    echo "Recurso: {$rutaActual} → {$nuevaRuta}\n";
                                }
                            }

                            $subnivel->recurso_path = json_encode($nuevasRutas);
                            $subnivel->recurso_nombre = json_encode($nuevosNombres);
                            $subnivel->recurso_tipo = json_encode($nuevosTipos);
                        }
                    }

                    $subnivel->save();
                }
            }
        }

        echo "Migración completada exitosamente\n";
    }

    public function down()
    {
        echo "Revirtiendo migración...\n";

        $cursos = Curso::with(['categoria', 'niveles.subniveles'])->get();

        foreach ($cursos as $curso) {
            $creadorId = $curso->creador_id;
            $categoriaSlug = $curso->categoria ? $curso->categoria->slug : 'sin-categoria';
            $cursoSlug = $curso->slug;

            $rutaActual = "creadores/cursos/{$categoriaSlug}/{$creadorId}/{$cursoSlug}";

            // Revertir imagen principal
            if ($curso->url_imagen) {
                $nombreArchivo = basename($curso->url_imagen);
                $rutaAnterior = "cursos/{$nombreArchivo}";

                if (Storage::disk('public')->exists($curso->url_imagen)) {
                    Storage::disk('public')->move($curso->url_imagen, $rutaAnterior);
                    $curso->url_imagen = $rutaAnterior;
                    $curso->save();
                }
            }

            // Revertir archivos de subniveles
            foreach ($curso->niveles as $nivel) {
                foreach ($nivel->subniveles as $subnivel) {
                    // Revertir videos
                    if ($subnivel->video_archivo_path) {
                        $nombreArchivo = basename($subnivel->video_archivo_path);
                        $rutaAnterior = "videos-subniveles/{$nombreArchivo}";

                        if (Storage::disk('public')->exists($subnivel->video_archivo_path)) {
                            Storage::disk('public')->move($subnivel->video_archivo_path, $rutaAnterior);
                            $subnivel->video_archivo_path = $rutaAnterior;
                        }
                    }

                    // Revertir recursos
                    if ($subnivel->recurso_path) {
                        $paths = json_decode($subnivel->recurso_path, true);
                        $names = json_decode($subnivel->recurso_nombre, true);
                        $types = json_decode($subnivel->recurso_tipo, true);

                        if ($paths && $names && $types) {
                            $rutasAnteriores = [];
                            $nombresAnteriores = [];
                            $tiposAnteriores = [];

                            foreach ($paths as $index => $rutaActual) {
                                $nombreArchivo = basename($rutaActual);
                                $rutaAnterior = "recursos-subniveles/{$nombreArchivo}";

                                if (Storage::disk('public')->exists($rutaActual)) {
                                    Storage::disk('public')->move($rutaActual, $rutaAnterior);
                                    $rutasAnteriores[] = $rutaAnterior;
                                    $nombresAnteriores[] = $names[$index] ?? $nombreArchivo;
                                    $tiposAnteriores[] = $types[$index] ?? 'application/octet-stream';
                                }
                            }

                            $subnivel->recurso_path = json_encode($rutasAnteriores);
                            $subnivel->recurso_nombre = json_encode($nombresAnteriores);
                            $subnivel->recurso_tipo = json_encode($tiposAnteriores);
                        }
                    }

                    $subnivel->save();
                }
            }
        }

        echo "Reversión completada\n";
    }
};
