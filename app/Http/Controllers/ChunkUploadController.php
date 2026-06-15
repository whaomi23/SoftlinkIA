<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use App\Helpers\FileMagicValidator;

class ChunkUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'email.verified', 'solo.creador']);
    }

    /**
     * Procesa la carga de archivos por fragmentos
     */
    public function process(Request $request)
    {
        try {
            $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

            if (!$receiver->isUploaded()) {
                return response()->json([
                    'error' => 'Archivo no subido correctamente'
                ], 400);
            }

            $fileReceived = $receiver->receive(); // recibir archivo

            if ($fileReceived->isFinished()) { // carga completa
                \Log::info('Chunk upload finished, processing file');
                $file = $fileReceived->getFile(); // obtener archivo

                // Validar tipo de archivo con magic numbers
                if (!$this->validateVideoFile($file)) {
                    \Log::error('Invalid video file type');
                    // Eliminar archivo temporal
                    unlink($file->getPathname());
                    return response()->json([
                        'error' => 'Tipo de archivo no válido. Solo se permiten videos MP4, AVI, MOV, WMV, WebM'
                    ], 400);
                }

                $extension = $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $fileName = str_replace('.'.$extension, '', $originalName);
                $fileName .= '_' . md5(time() . $originalName) . '.' . $extension;

                // Generar ruta organizada
                $cursoId = $request->input('curso_id');
                // Validar y limpiar curso_id para evitar errores con null
                if ($cursoId === 'null' || $cursoId === null || $cursoId === '') {
                    $cursoId = null;
                } elseif (is_numeric($cursoId) && (int) $cursoId > 0) {
                    $cursoId = (int) $cursoId;
                } else {
                    // Si no es válido, mantener como null
                    $cursoId = null;
                }

                $nivelNumero = $request->input('nivel_numero');
                $subnivelNumero = $request->input('subnivel_numero');

                $path = $this->generateChunkPath($cursoId, $nivelNumero, $subnivelNumero);

                $disk = Storage::disk('public');
                $finalPath = $disk->putFileAs($path, $file, $fileName);

                // Obtener información del archivo ANTES de eliminarlo
                $fileSize = $file->getSize();
                $mimeType = $file->getClientMimeType();
                $tempPath = $file->getPathname();

                // Eliminar archivo temporal de forma segura
                if (file_exists($tempPath)) {
                    unlink($tempPath);
                    \Log::info('Temporary file deleted', ['temp_path' => $tempPath]);
                } else {
                    \Log::warning('Temporary file not found for deletion', ['temp_path' => $tempPath]);
                }

                \Log::info('File uploaded successfully', [
                    'path' => $finalPath,
                    'filename' => $fileName,
                    'size' => $fileSize
                ]);

                return response()->json([
                    'success' => true,
                    'path' => $finalPath,
                    'filename' => $fileName,
                    'original_name' => $originalName,
                    'size' => $fileSize,
                    'mime_type' => $mimeType,
                    'url' => asset('storage/' . $finalPath)
                ], 200);

            } else {
                // Devolver información de progreso
                $handler = $fileReceived->handler();
                return response()->json([
                    'done' => $handler->getPercentageDone(),
                    'status' => true
                ], 200);
            }

        } catch (\Exception $e) {
            \Log::error('Chunk upload error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'error' => 'Error en la carga: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Valida archivos de video usando magic numbers
     */
    private function validateVideoFile($file): bool
    {
        if (!$file || !$file->isValid()) {
            \Log::error('File validation failed: Invalid file');
            return false;
        }

        // Log información del archivo para debugging
        \Log::info('Validating video file', [
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getSize()
        ]);

        // Primero validar por extensión
        $allowedExtensions = ['mp4', 'avi', 'mov', 'wmv', 'webm', 'mkv', 'flv', 'm4v'];
        $extension = strtolower($file->getClientOriginalExtension());

        if (!in_array($extension, $allowedExtensions)) {
            \Log::error('File validation failed: Extension not allowed', ['extension' => $extension]);
            return false;
        }

        // Validar por MIME type
        $allowedMimeTypes = [
            'video/mp4',
            'video/avi',
            'video/quicktime',
            'video/x-ms-wmv',
            'video/webm',
            'video/x-matroska',
            'video/x-flv',
            'video/x-m4v',
            'application/octet-stream' // Algunos videos pueden tener este MIME type
        ];

        $mimeType = $file->getClientMimeType();
        if (!in_array($mimeType, $allowedMimeTypes)) {
            \Log::warning('File validation: MIME type not in allowed list', ['mime_type' => $mimeType]);
            // No fallar por MIME type, solo loggear
        }

        // Validar con magic numbers si está disponible
        try {
            $allowedVideoTypes = ['mp4', 'avi', 'mov', 'wmv', 'webm'];
            foreach ($allowedVideoTypes as $type) {
                if (FileMagicValidator::validateFileType($file, $type)) {
                    \Log::info('File validation passed with magic numbers', ['type' => $type]);
                    return true;
                }
            }

            // Si no pasó magic numbers pero tiene extensión válida, permitir
            \Log::info('File validation passed by extension only (magic numbers failed)', [
                'extension' => $extension,
                'mime_type' => $mimeType
            ]);
            return true;

        } catch (\Exception $e) {
            \Log::warning('Magic number validation failed, using extension validation', [
                'error' => $e->getMessage()
            ]);
            // Permitir por extensión si hay error en magic numbers
            return true;
        }
    }

    /**
     * Genera la ruta organizada para archivos de video por fragmentos
     */
    private function generateChunkPath($cursoId = null, $nivelNumero = null, $subnivelNumero = null)
    {
        $creadorId = Auth::id();
        $categoriaSlug = 'sin-categoria';

        // Buscar curso solo si cursoId es válido y numérico
        if ($cursoId && is_int($cursoId)) {
            $curso = \App\Models\Curso::find($cursoId);
            if ($curso) {
                $categoria = $curso->categoria;
                $categoriaSlug = $categoria ? $categoria->slug : 'sin-categoria';
                $cursoSlug = $curso->slug;
            } else {
                $cursoSlug = 'curso-' . $cursoId;
            }
        } else {
            $cursoSlug = 'curso-temp';
        }

        $basePath = "creadores/cursos/{$categoriaSlug}/{$creadorId}/{$cursoSlug}";

        if ($nivelNumero && $subnivelNumero) {
            return "{$basePath}/nivel_{$nivelNumero}/subnivel_{$subnivelNumero}/videos";
        }

        return "{$basePath}/videos-temp";
    }

    /**
     * Elimina un archivo temporal de video
     */
    public function deleteTempVideo(Request $request)
    {
        $path = $request->input('path');

        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);

            return response()->json([
                'success' => true,
                'message' => 'Archivo eliminado correctamente'
            ]);
        }

        return response()->json([
            'error' => 'Archivo no encontrado'
        ], 404);
    }
}
