<?php

namespace App\Helpers;

class FileMagicValidator
{
    /**
     * Magic numbers para diferentes tipos de archivos
     */
    private static $magicNumbers = [
        // Documentos
        'pdf' => ['25504446', '255044462D'], // %PDF-
        'doc' => ['D0CF11E0A1B11AE1'], // Microsoft Office
        'docx' => ['504B0304'], // ZIP-based (Office 2007+)
        'ppt' => ['D0CF11E0A1B11AE1'], // Microsoft Office
        'pptx' => ['504B0304'], // ZIP-based (Office 2007+)
        'xls' => ['D0CF11E0A1B11AE1'], // Microsoft Office
        'xlsx' => ['504B0304'], // ZIP-based (Office 2007+)

        // Archivos comprimidos
        'zip' => ['504B0304', '504B0506', '504B0708'], // PK
        'rar' => ['526172211A0700', '526172211A070100'], // RAR!

        // Imágenes
        'jpg' => ['FFD8FFE0', 'FFD8FFE1', 'FFD8FFE2', 'FFD8FFE3', 'FFD8FFE8'],
        'jpeg' => ['FFD8FFE0', 'FFD8FFE1', 'FFD8FFE2', 'FFD8FFE3', 'FFD8FFE8'],
        'png' => ['89504E470D0A1A0A'], // PNG
        'gif' => ['474946383761', '474946383961'], // GIF87a, GIF89a

        // Videos
        'mp4' => ['00000018667479706D703432', '00000020667479706D703432'], // ftypmp42
        'avi' => ['52494646'], // RIFF
        'mov' => ['000000146674797071742020', '000000186674797071742020'], // ftypqt
        'wmv' => ['3026B2758E66CF11A6D900AA0062CE6C'], // ASF
        'webm' => ['1A45DFA3'], // WebM

        // Audio
        'mp3' => ['FFFB', 'FFF3', 'FFF2', '494433'], // MP3, ID3
        'wav' => ['52494646'], // RIFF
        'ogg' => ['4F676753'], // OggS

        // Texto
        'txt' => [], // Los archivos de texto no tienen magic number específico

        // Archivos peligrosos que NO deben permitirse
        'php' => ['3C3F706870', '3C3F504850'], // <?php, <?PHP
        'exe' => ['4D5A'], // MZ
        'bat' => ['40404040'], // @@@@
        'cmd' => ['40404040'], // @@@@
        'sh' => ['23212F62696E2F7368'], // #!/bin/sh
        'js' => ['3C736372697074', '66756E6374696F6E'], // <script, function
        'html' => ['3C68746D6C', '3C48544D4C'], // <html, <HTML
        'htm' => ['3C68746D6C', '3C48544D4C'], // <html, <HTML
    ];

    /**
     * Valida si el archivo es realmente del tipo que dice ser
     */
    public static function validateFileType($file, $expectedExtension): bool
    {
        if (!$file || !$file->isValid()) {
            return false;
        }

        $extension = strtolower($expectedExtension);

        // Leer los primeros bytes del archivo
        $handle = fopen($file->getPathname(), 'rb');
        if (!$handle) {
            return false;
        }

        $header = fread($handle, 32); // Leer primeros 32 bytes
        fclose($handle);

        if ($header === false) {
            return false;
        }

        $hexHeader = strtoupper(bin2hex($header));

        // Verificar si es un archivo peligroso disfrazado
        if (self::isDangerousFile($hexHeader)) {
            return false;
        }

        // Si no hay magic numbers definidos para este tipo, permitir (como txt)
        if (!isset(self::$magicNumbers[$extension]) || empty(self::$magicNumbers[$extension])) {
            return true;
        }

        // Verificar magic numbers
        foreach (self::$magicNumbers[$extension] as $magicNumber) {
            if (strpos($hexHeader, $magicNumber) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verifica si el archivo es peligroso independientemente de su extensión
     */
    private static function isDangerousFile(string $hexHeader): bool
    {
        $dangerousPatterns = [
            '3C3F706870', // <?php
            '3C3F504850', // <?PHP
            '4D5A', // MZ (executables)
            '23212F62696E2F7368', // #!/bin/sh
            '3C736372697074', // <script
            '3C68746D6C', // <html
            '3C48544D4C', // <HTML
            '66756E6374696F6E', // function (JavaScript)
        ];

        foreach ($dangerousPatterns as $pattern) {
            if (strpos($hexHeader, $pattern) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Obtiene el tipo real del archivo basado en magic numbers
     */
    public static function getRealFileType($file): ?string
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        $handle = fopen($file->getPathname(), 'rb');
        if (!$handle) {
            return null;
        }

        $header = fread($handle, 32);
        fclose($handle);

        if ($header === false) {
            return null;
        }

        $hexHeader = strtoupper(bin2hex($header));

        foreach (self::$magicNumbers as $extension => $magicNumbers) {
            foreach ($magicNumbers as $magicNumber) {
                if (strpos($hexHeader, $magicNumber) === 0) {
                    return $extension;
                }
            }
        }

        return null;
    }

    /**
     * Valida múltiples archivos
     */
    public static function validateMultipleFiles($files, $expectedExtensions): bool
    {
        if (!is_array($files)) {
            return false;
        }

        foreach ($files as $index => $file) {
            $expectedExtension = $expectedExtensions[$index] ?? null;
            if (!$expectedExtension || !self::validateFileType($file, $expectedExtension)) {
                return false;
            }
        }

        return true;
    }
}
