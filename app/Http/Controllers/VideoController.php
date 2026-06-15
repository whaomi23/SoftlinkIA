<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Subnivel;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{
    /**
     * Servir video de forma protegida
     * Verifica que el usuario esté autenticado y tenga acceso al curso
     */
    public function stream(Request $request, $path)
    {
        try {
            // Verificar autenticación
            if (!Auth::check()) {
                abort(403, 'Debes estar autenticado para ver este video');
            }

            // Decodificar la ruta (puede venir codificada)
            $decodedPath = urldecode($path);

            // Construir la ruta completa del archivo
            $filePath = storage_path('app/public/' . $decodedPath);

            // Verificar que el archivo existe
            if (!file_exists($filePath) || !is_file($filePath)) {
                Log::warning('Video no encontrado', ['path' => $filePath]);
                abort(404, 'Video no encontrado');
            }

            // Verificar que es un archivo de video
            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
            $allowedExtensions = ['mp4', 'webm', 'ogg', 'ogv', 'mov', 'avi', 'mkv'];
            if (!in_array($extension, $allowedExtensions)) {
                abort(403, 'Tipo de archivo no permitido');
            }

            // Buscar el curso al que pertenece este video
            // El path generalmente es: creadores/{creador_id}/videos/{video_file}
            $curso = $this->findCursoByVideoPath($decodedPath);

            if (!$curso) {
                // Si no se encuentra el curso, verificar si el usuario es el creador
                // o si el archivo está en una ruta pública permitida
                if (!$this->hasAccessToVideo($decodedPath)) {
                    abort(403, 'No tienes permiso para ver este video');
                }
            } else {
                // Verificar que el usuario tenga acceso al curso
                if (!$this->hasAccessToCurso($curso)) {
                    abort(403, 'No estás inscrito en este curso');
                }
            }

            // Obtener información del archivo
            $fileSize = filesize($filePath);
            $mimeType = $this->getMimeType($extension);

            // Obtener el rango solicitado (para streaming)
            $range = $request->header('Range');

            if ($range) {
                // Servir video con soporte para Range requests (streaming)
                return $this->streamRange($filePath, $range, $fileSize, $mimeType);
            } else {
                // Servir video completo
                return $this->streamFull($filePath, $fileSize, $mimeType);
            }

        } catch (\Exception $e) {
            Log::error('Error al servir video', [
                'path' => $path,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            abort(500, 'Error al cargar el video');
        }
    }

    /**
     * Buscar el curso al que pertenece un video
     */
    private function findCursoByVideoPath($path)
    {
        // Buscar en subniveles que tengan este video
        $subnivel = Subnivel::where('video_archivo_path', 'like', '%' . basename($path) . '%')
            ->orWhere('video_archivo_path', $path)
            ->first();

        if ($subnivel && $subnivel->nivel && $subnivel->nivel->curso) {
            return $subnivel->nivel->curso;
        }

        return null;
    }

    /**
     * Verificar si el usuario tiene acceso al video
     */
    private function hasAccessToVideo($path)
    {
        $user = Auth::user();

        // Si el usuario es creador y el video está en su carpeta
        if ($user->tipo_usuario_id == 2) { // Tipo 2 = Creador
            if (strpos($path, 'creadores/' . $user->id . '/') !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verificar si el usuario tiene acceso al curso
     */
    private function hasAccessToCurso($curso)
    {
        $user = Auth::user();

        // Si el usuario es el creador del curso
        if ($curso->creador_id == $user->id) {
            return true;
        }

        // Si el usuario es admin
        if ($user->tipo_usuario_id == 1) { // Tipo 1 = Admin
            return true;
        }

        // Verificar si el usuario está inscrito en el curso (activo o completado)
        $inscripcion = Inscripcion::where('usuario_id', $user->id)
            ->where('curso_id', $curso->id)
            ->whereIn('status', ['activo', 'completado'])
            ->first();

        return $inscripcion !== null;
    }

    /**
     * Servir video completo
     */
    private function streamFull($filePath, $fileSize, $mimeType)
    {
        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'Content-Length' => $fileSize,
            'Accept-Ranges' => 'bytes',
            'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'private, max-age=3600',
        ]);
    }

    /**
     * Servir video con Range requests (streaming)
     */
    private function streamRange($filePath, $range, $fileSize, $mimeType)
    {
        // Parsear el rango
        list($unit, $range) = explode('=', $range, 2);

        if ($unit !== 'bytes') {
            abort(416, 'Range Not Satisfiable');
        }

        // Obtener rangos múltiples (si hay)
        $ranges = explode(',', $range);
        $range = trim($ranges[0]);

        list($start, $end) = explode('-', $range, 2);

        $start = (int) $start;
        $end = $end === '' ? $fileSize - 1 : (int) $end;

        if ($start > $end || $start < 0 || $end >= $fileSize) {
            abort(416, 'Range Not Satisfiable');
        }

        $length = $end - $start + 1;

        // Abrir el archivo
        $file = fopen($filePath, 'rb');
        if (!$file) {
            abort(500, 'Error al abrir el archivo');
        }

        // Mover el puntero al inicio del rango
        fseek($file, $start);

        // Crear respuesta de streaming
        $response = new StreamedResponse(function() use ($file, $length) {
            $remaining = $length;
            $chunkSize = 8192; // 8KB chunks

            while ($remaining > 0 && !feof($file)) {
                $read = min($remaining, $chunkSize);
                echo fread($file, $read);
                $remaining -= $read;
                flush();
            }

            fclose($file);
        }, 206); // 206 Partial Content

        // Configurar headers
        $response->headers->set('Content-Type', $mimeType);
        $response->headers->set('Content-Length', $length);
        $response->headers->set('Content-Range', sprintf('bytes %d-%d/%d', $start, $end, $fileSize));
        $response->headers->set('Accept-Ranges', 'bytes');
        $response->headers->set('Content-Disposition', 'inline; filename="' . basename($filePath) . '"');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Cache-Control', 'private, max-age=3600');

        return $response;
    }

    /**
     * Obtener MIME type basado en la extensión
     */
    private function getMimeType($extension)
    {
        $mimeTypes = [
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            'ogg' => 'video/ogg',
            'ogv' => 'video/ogg',
            'mov' => 'video/quicktime',
            'avi' => 'video/x-msvideo',
            'mkv' => 'video/x-matroska',
        ];

        return $mimeTypes[$extension] ?? 'video/mp4';
    }
}

