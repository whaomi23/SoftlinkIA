<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\FileMagicValidator;

class ValidateFileMagicNumbers
{
    public function handle(Request $request, Closure $next)
    {
        // Solo validar en rutas de carga de archivos
        if ($request->isMethod('POST') || $request->isMethod('PUT')) {
            $this->validateUploadedFiles($request);
        }

        return $next($request);
    }

    private function validateUploadedFiles(Request $request)
    {
        $allFiles = $request->allFiles();

        foreach ($allFiles as $fieldName => $files) {
            if (is_array($files)) {
                // Múltiples archivos
                foreach ($files as $file) {
                    if ($file && $file->isValid()) {
                        $this->validateSingleFile($file, $fieldName);
                    }
                }
            } else {
                // Un solo archivo
                if ($files && $files->isValid()) {
                    $this->validateSingleFile($files, $fieldName);
                }
            }
        }
    }

    private function validateSingleFile($file, $fieldName)
    {
        $extension = strtolower($file->getClientOriginalExtension());

        // Determinar el tipo de archivo esperado basado en el nombre del campo
        $expectedTypes = $this->getExpectedTypesForField($fieldName);

        $isValid = false;
        foreach ($expectedTypes as $type) {
            if (FileMagicValidator::validateFileType($file, $type)) {
                $isValid = true;
                break;
            }
        }

        if (!$isValid) {
            abort(422, "El archivo en el campo '{$fieldName}' no es válido o contiene contenido peligroso.");
        }
    }

    private function getExpectedTypesForField($fieldName)
    {
        $fieldTypeMap = [
            'url_imagen' => ['jpg', 'jpeg', 'png', 'gif'],
            'video_archivo' => ['mp4', 'avi', 'mov', 'wmv', 'webm'],
            'recursos' => ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'rar', 'txt', 'jpg', 'jpeg', 'png', 'gif', 'mp3', 'wav', 'ogg'],
            'recurso' => ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'rar'],
        ];

        // Buscar coincidencias parciales para campos anidados
        foreach ($fieldTypeMap as $pattern => $types) {
            if (strpos($fieldName, $pattern) !== false) {
                return $types;
            }
        }

        // Tipos por defecto si no se encuentra coincidencia
        return ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'rar', 'txt', 'jpg', 'jpeg', 'png', 'gif', 'mp3', 'wav', 'ogg'];
    }
}
