<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Color\Color;
//3
class CertificadoController extends Controller
{
    /**
     * Aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de certificados del usuario
     */
    public function index()
    {
        $certificados = Certificado::with(['usuario', 'curso'])
            ->where('usuario_id', Auth::user()->id)
            ->latest()
            ->get();

        return view('certificados.index', compact('certificados'));
    }

    /**
     * Generar certificado automáticamente cuando se completa un curso
     */
    public function generar(Request $request, Curso $curso = null)
    {
        try {
            $usuario = Auth::user();

            // Determinar el curso desde el parámetro o desde el request
            if ($curso) {
                $cursoId = $curso->id;
            } else {
                $cursoId = $request->input('curso_id');
                $curso = Curso::findOrFail($cursoId);
            }

            // Verificar que el usuario esté inscrito
            $inscripcion = Inscripcion::where('usuario_id', $usuario->id)
                ->where('curso_id', $cursoId)
                ->first();

            if (!$inscripcion) {
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => 'No estás inscrito en este curso.'], 400);
                }
                return redirect()->back()->with('error', 'No estás inscrito en este curso.');
            }

            // Verificar progreso del curso (al menos 50% completado para cursos de prueba)
            $progresoMinimo = 50; // Reducido de 80% a 50% para cursos de prueba
            if ($inscripcion->progreso < $progresoMinimo) {
                $mensaje = "Necesitas completar al menos el {$progresoMinimo}% del curso para generar el certificado. Tu progreso actual es: {$inscripcion->progreso}%";
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => $mensaje], 400);
                }
                return redirect()->back()->with('warning', $mensaje);
            }

            // Verificar si ya tiene un certificado
            $certificadoExistente = Certificado::where('usuario_id', $usuario->id)
                ->where('curso_id', $cursoId)
                ->first();

            if ($certificadoExistente) {
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => 'Ya tienes un certificado para este curso.', 'certificado_id' => $certificadoExistente->id], 400);
                }
                return redirect()->route('certificados.show', $certificadoExistente)
                    ->with('info', 'Ya tienes un certificado para este curso.');
            }

            // Verificar que el curso tenga contenido suficiente
            // Para cursos de prueba o cursos pequeños, reducir el requisito mínimo
            $totalLecciones = $curso->lecciones()->count();
            $leccionesMinimas = 1; // Reducido de 3 a 1 para permitir cursos de prueba

            if ($totalLecciones < $leccionesMinimas) {
                $mensaje = 'Este curso no tiene contenido suficiente para generar un certificado.';
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => $mensaje], 400);
                }
                return redirect()->back()->with('error', $mensaje);
            }

            // Generar código único
            $codigoUnico = $this->generarCodigoUnico();

            // Generar código QR único
            $qrCodePath = $this->generarCodigoQR($codigoUnico);

            // Crear certificado con validaciones adicionales
            $certificado = Certificado::create([
                'usuario_id' => $usuario->id,
                'curso_id' => $cursoId,
                'codigo_unico' => $codigoUnico,
                'qr_code' => $qrCodePath,
                'fecha_emision' => now(),
                'status' => 'valido'
            ]);

            // Log de la generación del certificado
            Log::info("Certificado generado", [
                'certificado_id' => $certificado->id,
                'usuario_id' => $usuario->id,
                'curso_id' => $cursoId,
                'codigo_unico' => $codigoUnico,
                'progreso_curso' => $inscripcion->progreso
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => '¡Felicitaciones! Tu certificado ha sido generado exitosamente.',
                    'certificado_id' => $certificado->id
                ]);
            }

            return redirect()->route('certificados.show', $certificado)
                ->with('success', '¡Felicitaciones! Tu certificado ha sido generado exitosamente.');

        } catch (\Exception $e) {
            Log::error("Error generando certificado", [
                'usuario_id' => Auth::id(),
                'curso_id' => $curso->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error',
                'Hubo un error al generar el certificado. Por favor, intenta nuevamente o contacta al soporte.');
        }
    }

    /**
     * Mostrar certificado en formato web
     */
    public function show(Certificado $certificado)
    {
        // Verificar que el certificado pertenezca al usuario autenticado
        if ($certificado->usuario_id !== Auth::user()->id) {
            abort(403, 'No tienes acceso a este certificado.');
        }

        $certificado->load(['usuario', 'curso', 'curso.creador']);

        // Extraer curso y usuario para facilitar el acceso en la vista
        $curso = $certificado->curso;
        $usuario = $certificado->usuario;

        // Calcular estadísticas para el certificado
        $totalLecciones = $curso->lecciones()->count();
        $fechaFinalizacion = $certificado->fecha_emision ?? $certificado->created_at;

        // Obtener información adicional del curso
        $duracionHoras = $curso->duracion_horas ?? 0;
        $nivelDificultad = $curso->nivel_dificultad ?? 'Intermedio';
        $categoriaNombre = $curso->categoria->nombre ?? 'General';

        // Generar ID único para el certificado
        $certificadoId = 'SL-' . str_pad($certificado->id, 6, '0', STR_PAD_LEFT) . '-' . $certificado->fecha_emision->format('Y');

        return view('certificates.curso-certificado', compact(
            'certificado',
            'curso',
            'usuario',
            'totalLecciones',
            'fechaFinalizacion',
            'duracionHoras',
            'nivelDificultad',
            'categoriaNombre',
            'certificadoId'
        ));
    }

    /**
     * Descargar certificado como PDF usando FPDF/FPDI y plantilla existente.
     */
    public function descargar(Certificado $certificado)
    {
        // Verificar que el certificado pertenezca al usuario autenticado
        if ($certificado->usuario_id !== Auth::user()->id) {
            abort(403, 'No tienes acceso a este certificado.');
        }

        try {
            // Generar QR si no existe (ANTES de cargar la plantilla)
            if (!$certificado->qr_code || !Storage::disk('public')->exists($certificado->qr_code)) {
                $qrPath = $this->generarCodigoQR($certificado->codigo_unico);
                if ($qrPath) {
                    $certificado->update(['qr_code' => $qrPath]);
                    $certificado->refresh();
                }
            }

            $certificado->load(['usuario', 'curso', 'curso.creador']);

            // Obtener la ruta absoluta del QR ANTES de crear el PDF
            $qrAbsolutePath = null;
            if ($certificado->qr_code && Storage::disk('public')->exists($certificado->qr_code)) {
                $qrAbsolutePath = Storage::disk('public')->path($certificado->qr_code);
                if (!file_exists($qrAbsolutePath)) {
                    $qrAbsolutePath = null;
                }
            }

            // Extraer curso y usuario para facilitar el acceso en la vista
            $curso = $certificado->curso;
            $usuario = $certificado->usuario;

            // Datos auxiliares
            $fechaFinalizacion = $certificado->fecha_emision ?? $certificado->created_at;
            $certificadoId = 'SL-' . str_pad($certificado->id, 6, '0', STR_PAD_LEFT) . '-' . $fechaFinalizacion->format('Y');
            $totalLecciones = $curso->lecciones()->count();
            $duracionHoras = $curso->duracion_horas ?? 0;
            $nivelDificultad = ucfirst((string) ($curso->nivel_dificultad ?? 'Intermedio'));
            $categoriaNombre = $curso->categoria->nombre ?? 'General';

            // Ruta de la plantilla PDF (tu diseño)
            $templatePath = resource_path('views/certificates/Cft.pdf');
            if (!file_exists($templatePath)) {
                throw new \RuntimeException('No se encontró la plantilla de certificado en ' . $templatePath);
            }

            // Crear PDF en horizontal A4
            $pdf = new Fpdi('L', 'mm', 'A4');
            $pdf->SetAutoPageBreak(false);

            // Cargar plantilla
            $pdf->setSourceFile($templatePath);
            $tplId = $pdf->importPage(1);
            $pdf->AddPage();
            // A4 Landscape: 297mm x 210mm
            $pdf->useTemplate($tplId, 0, 0, 297, 210, true);

            // Helper para textos (manejo de UTF-8)
            $encode = static function (string $text): string {
                return iconv('UTF-8', 'windows-1252//TRANSLIT', $text);
            };

            // Color y fuente (Arial es core en FPDF, no requiere AddFont)
            $pdf->SetTextColor(20, 23, 29); // gris oscuro

            // Se certifica que
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetXY(80, 20);
            $pdf->Cell(237, 6, $encode('Se certifica que'), 0, 1, 'C');

            // Nombre
            $pdf->SetFont('Arial', 'B', 28);

            // Coordenadas aproximadas (ajustables a tu plantilla)
            // Nombre del alumno (centrado)
            $pdf->SetXY(80, 35); // X,Y
            $pdf->Cell(237, 22, $encode(trim(($usuario->name ?? '') . ' ' . ($usuario->apellido_paterno ?? '') . ' ' . ($usuario->apellido_materno ?? ''))), 0, 1, 'C');

            // Título del curso (centrado) con degradado: #3b82f6 -> #9333ea -> #ec4899
            $pdf->SetFont('Arial', 'B', 52);
            $title = strtoupper((string) $curso->titulo);
            // Calcular ancho del texto y punto de inicio para centrar dentro de 237mm
            $titleWidth = $pdf->GetStringWidth($title);
            $areaX = 80; $areaW = 237;
            $startX = $areaX + max(0, ($areaW - $titleWidth) / 2);
            $baselineY = 90; // posición base para el texto grande
            $len = max(1, strlen($title));
            // Colores de degradado
            $c1 = [59,130,246];   // #3b82f6
            $c2 = [147,51,234];   // #9333ea
            $c3 = [236,72,153];   // #ec4899
            $half = (int) floor($len / 2);
            $x = $startX;
            for ($i = 0; $i < $len; $i++) {
                $ch = $title[$i];
                $w = $pdf->GetStringWidth($ch);
                if ($len == 1) {
                    $r=$c2[0]; $g=$c2[1]; $b=$c2[2];
                } elseif ($i <= $half) {
                    // Interpolar de c1 -> c2
                    $t = $half == 0 ? 1.0 : $i / max(1,$half);
                    $r = (int) round($c1[0] + ($c2[0]-$c1[0])*$t);
                    $g = (int) round($c1[1] + ($c2[1]-$c1[1])*$t);
                    $b = (int) round($c1[2] + ($c2[2]-$c1[2])*$t);
                } else {
                    // Interpolar de c2 -> c3
                    $t = ($i-$half)/max(1, $len-$half-1);
                    $r = (int) round($c2[0] + ($c3[0]-$c2[0])*$t);
                    $g = (int) round($c2[1] + ($c3[1]-$c2[1])*$t);
                    $b = (int) round($c2[2] + ($c3[2]-$c2[2])*$t);
                }
                $pdf->SetTextColor($r,$g,$b);
                $pdf->Text($x, $baselineY, $encode($ch));
                $x += $w;
            }
            // Restaurar color por defecto para siguientes textos
            $pdf->SetTextColor(20, 23, 29);

            // Subtítulo: categoría y nivel
            $pdf->SetFont('Arial', '', 12);
            $pdf->SetXY(80, 98);
            $pdf->Cell(237, 7, $encode($categoriaNombre . ' - Nivel ' . $nivelDificultad), 0, 1, 'C');

            // Descripción
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetXY(115, 118);
            $pdf->MultiCell(167, 5, $encode('Cumpliendo con todos los requisitos y criterios para esta certificación a través de entrenamiento y evaluación administrada por SoftLinkIA.'), 0, 'C');

            // Fecha (centrado)
            $pdf->SetFont('Arial', '', 14);
            $fechaEs = \Carbon\Carbon::parse($fechaFinalizacion)->locale('es')->translatedFormat('j \d\e F \d\e Y');
            $pdf->SetXY(80, 133);
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(237, 5, $encode('Esta certificación fue obtenida el'), 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetXY(80, 139);
            $pdf->Cell(237, 6, $encode($fechaEs), 0, 1, 'C');

            // Estadísticas con valores en degradado
            $pdf->SetTextColor(59, 63, 72);
            $pdf->SetFont('Arial', '', 9);
            // Helper para pintar texto con degradado (mismo que en el título)
            $drawGradient = function($x, $yBaseline, $text, $width) use ($pdf, $encode) {
                $c1 = [59,130,246];  // #3b82f6
                $c2 = [147,51,234];  // #9333ea
                $c3 = [236,72,153];  // #ec4899
                $str = (string) $text;
                $len = max(1, strlen($str));
                $half = (int) floor($len / 2);
                $textWidth = $pdf->GetStringWidth($str);
                $startX = $x + max(0, ($width - $textWidth) / 2);
                $cursor = $startX;
                for ($i = 0; $i < $len; $i++) {
                    $ch = $str[$i];
                    $w = $pdf->GetStringWidth($ch);
                    if ($len == 1) {
                        $r=$c2[0]; $g=$c2[1]; $b=$c2[2];
                    } elseif ($i <= $half) {
                        $t = $half == 0 ? 1.0 : $i / max(1,$half);
                        $r = (int) round($c1[0] + ($c2[0]-$c1[0])*$t);
                        $g = (int) round($c1[1] + ($c2[1]-$c1[1])*$t);
                        $b = (int) round($c1[2] + ($c2[2]-$c1[2])*$t);
                    } else {
                        $t = ($i-$half)/max(1, $len-$half-1);
                        $r = (int) round($c2[0] + ($c3[0]-$c2[0])*$t);
                        $g = (int) round($c2[1] + ($c3[1]-$c2[1])*$t);
                        $b = (int) round($c2[2] + ($c3[2]-$c2[2])*$t);
                    }
                    $pdf->SetTextColor($r,$g,$b);
                    $pdf->Text($cursor, $yBaseline, $encode($ch));
                    $cursor += $w;
                }
            };
            // Progreso
            $pdf->SetXY(140, 152);
            $pdf->Cell(40, 4, $encode('Progreso'), 0, 2, 'C');
            $pdf->SetFont('Arial', 'B', 14);
            $drawGradient(140, 163, '100%', 40);
            // Duración
            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(180, 152);
            $pdf->Cell(40, 4, $encode('Duración'), 0, 2, 'C');
            $pdf->SetFont('Arial', 'B', 14);
            $drawGradient(180, 163, (string) $duracionHoras . 'h', 40);
            // Lecciones
            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(220, 152);
            $pdf->Cell(40, 4, $encode('Lecciones'), 0, 2, 'C');
            $pdf->SetFont('Arial', 'B', 14);
            $drawGradient(220, 163, (string) $totalLecciones, 40);

            // Restablecer color
            $pdf->SetTextColor(80, 85, 95);

            // Bloque lateral izquierdo: CERTIFICADO / Acreditación Profesional / Verificado digitalmente
            // Diseñado para superponerse al sidebar oscuro de la plantilla
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->SetXY(18, 165);
            $pdf->Cell(80, 8, $encode('CERTIFICADO'), 0, 1, 'L');
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetXY(18, 175);
            $pdf->Cell(80, 6, $encode('Acreditación Profesional'), 0, 1, 'L');
            $pdf->SetTextColor(200, 210, 220);
            $pdf->SetXY(18, 183);
            $pdf->Cell(80, 6, $encode('Verificado digitalmente'), 0, 1, 'L');
            $pdf->SetTextColor(80, 85, 95);

            // ID de certificado (resaltado en blanco y bold)
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetXY(-10, 98);
            $pdf->Cell(77, 6, $encode('ID: ' . $certificadoId), 0, 1, 'R');
            // Código único del certificado (misma área)
            $pdf->SetXY(5, 105);
            $pdf->Cell(77, 6, $encode('Código: ' . ($certificado->codigo_unico ?? 'N/A')), 0, 1, 'R');

            // Agregar código QR único al PDF (siempre debe estar)
            if ($qrAbsolutePath && file_exists($qrAbsolutePath)) {
                try {
                    // Posición del QR en el sidebar izquierdo (A4 Landscape: 297mm x 210mm)
                    $qrSize = 30; // Tamaño del QR en mm (reducido)
                    $qrX = 35; // Posición X desde la izquierda (movido más a la derecha)
                    $qrY = 120; // Posición Y desde arriba (movido más arriba)

                    // Fondo blanco para el QR (para que se vea bien en el sidebar oscuro)
                    $pdf->SetFillColor(255, 255, 255);
                    $pdf->Rect($qrX - 2, $qrY - 2, $qrSize + 4, $qrSize + 4, 'F');

                    // Detectar si el QR es SVG y convertirlo a PNG temporalmente
                    $extension = strtolower(pathinfo($certificado->qr_code, PATHINFO_EXTENSION));
                    $qrPathForPdf = $qrAbsolutePath;

                    if ($extension === 'svg') {
                        // Convertir SVG a PNG temporalmente para el PDF
                        $qrPathForPdf = $this->convertirSvgAPng($qrAbsolutePath, $certificado->codigo_unico);
                        if (!$qrPathForPdf) {
                            Log::warning("No se pudo convertir SVG a PNG, intentando regenerar QR como PNG", [
                                'certificado_id' => $certificado->id
                            ]);
                            // Si falla la conversión, regenerar como PNG
                            $qrPathPNG = $this->generarCodigoQR($certificado->codigo_unico, true); // forzar PNG
                            if ($qrPathPNG && Storage::disk('public')->exists($qrPathPNG)) {
                                $qrPathForPdf = Storage::disk('public')->path($qrPathPNG);
                            }
                        }
                    }

                    // Agregar el QR usando Image() de FPDF
                    // Nota: FPDI extiende FPDF, así que Image() debería funcionar
                    $pdf->Image($qrPathForPdf, $qrX, $qrY, $qrSize, $qrSize, 'PNG');

                    // Limpiar archivo temporal si se creó uno
                    if ($extension === 'svg' && $qrPathForPdf !== $qrAbsolutePath && file_exists($qrPathForPdf)) {
                        @unlink($qrPathForPdf);
                    }

                    // Texto debajo del QR
                    $pdf->SetFont('Arial', '', 6);
                    $pdf->SetTextColor(255, 255, 255);
                    $pdf->SetXY($qrX - 2, $qrY + $qrSize + 3);
                    $pdf->Cell($qrSize + 4, 3, $encode('Escanea para verificar'), 0, 1, 'C');

                    // Código único debajo del texto (más pequeño)
                    $pdf->SetFont('Arial', '', 5);
                    $pdf->SetTextColor(200, 210, 220);
                    $pdf->SetXY($qrX - 2, $qrY + $qrSize + 6);
                    $pdf->Cell($qrSize + 4, 3, $encode($certificado->codigo_unico), 0, 1, 'C');

                    Log::info("QR agregado al PDF exitosamente", [
                        'certificado_id' => $certificado->id,
                        'qr_path' => $qrAbsolutePath,
                        'position' => ['x' => $qrX, 'y' => $qrY, 'size' => $qrSize]
                    ]);
                } catch (\Exception $e) {
                    Log::error("Error agregando QR al PDF", [
                        'certificado_id' => $certificado->id,
                        'qr_path' => $qrAbsolutePath,
                        'error' => $e->getMessage()
                    ]);
                }
            } else {
                // Si no hay QR, intentar generarlo
                Log::warning("No se encontró QR para el certificado, intentando generar", [
                    'certificado_id' => $certificado->id
                ]);

                $qrPath = $this->generarCodigoQR($certificado->codigo_unico, true); // forzar PNG para PDF
                if ($qrPath && Storage::disk('public')->exists($qrPath)) {
                    $certificado->update(['qr_code' => $qrPath]);
                    $qrAbsolutePath = Storage::disk('public')->path($qrPath);

                    if (file_exists($qrAbsolutePath)) {
                        $qrSize = 30; // Tamaño del QR en mm (reducido)
                        $qrX = 35; // Posición X desde la izquierda (movido más a la derecha)
                        $qrY = 120; // Posición Y desde arriba (movido más arriba)
                        $pdf->SetFillColor(255, 255, 255);
                        $pdf->Rect($qrX - 2, $qrY - 2, $qrSize + 4, $qrSize + 4, 'F');

                        // Detectar tipo de archivo
                        $extension = strtolower(pathinfo($qrPath, PATHINFO_EXTENSION));
                        $qrPathForPdf = $qrAbsolutePath;
                        $isTempFile = false;
                        if ($extension === 'svg') {
                            $qrPathForPdf = $this->convertirSvgAPng($qrAbsolutePath, $certificado->codigo_unico);
                            $isTempFile = ($qrPathForPdf && $qrPathForPdf !== $qrAbsolutePath);
                        }

                        $pdf->Image($qrPathForPdf ?: $qrAbsolutePath, $qrX, $qrY, $qrSize, $qrSize, 'PNG');

                        // Limpiar archivo temporal si se creó uno
                        if ($isTempFile && $qrPathForPdf && file_exists($qrPathForPdf)) {
                            @unlink($qrPathForPdf);
                        }
                        $pdf->SetFont('Arial', '', 6);
                        $pdf->SetTextColor(255, 255, 255);
                        $pdf->SetXY($qrX - 2, $qrY + $qrSize + 3);
                        $pdf->Cell($qrSize + 4, 3, $encode('Escanea para verificar'), 0, 1, 'C');
                        $pdf->SetFont('Arial', '', 5);
                        $pdf->SetTextColor(200, 210, 220);
                        $pdf->SetXY($qrX - 2, $qrY + $qrSize + 6);
                        $pdf->Cell($qrSize + 4, 3, $encode($certificado->codigo_unico), 0, 1, 'C');
                    }
                }
            }

            // Firmas: Instructor y Director en la misma línea, con líneas de firma encima
            $instructor = trim(($curso->creador->name ?? 'SoftLinkIA') . ' ' . ($curso->creador->apellido_paterno ?? ''));
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetTextColor(80, 85, 95);
            // Líneas de firma (gris claro)
            $pdf->SetDrawColor(209, 213, 219);
            $pdf->SetLineWidth(0.4);
            // Línea para Instructor (posición fija)
            $pdf->Line(110, 186, 170, 186);
            // Línea para Director (posición fija)
            $pdf->Line(180, 186, 240, 186);
            // Colocar cada texto con coordenadas absolutas para que uno no mueva al otro
            // Instructor
            $pdf->SetXY(110, 188);
            $pdf->Cell(60, 6, $encode('Instructor: ' . $instructor), 0, 0, 'C');
            // Director
            $pdf->SetXY(180, 188);
            $pdf->Cell(60, 6, $encode('SoftLinkIA — Director Ejecutivo'), 0, 1, 'C');

            // Nombre del archivo
            $filename = 'certificado-' . Str::slug($curso->titulo) . '-' . $certificadoId . '.pdf';

            // Salida como descarga
            $content = $pdf->Output('S'); // string
            return response($content)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        } catch (\Exception $e) {
            Log::error("Error descargando certificado (FPDF)", [
                'certificado_id' => $certificado->id,
                'usuario_id' => Auth::id(),
                'error' => $e->getMessage(),
            ]);

            return redirect()->back()->with('error',
                'Hubo un error al descargar el certificado. Por favor, intenta nuevamente.');
        }
    }

    /**
     * Verificar certificado público (por código único)
     */
    public function verificar($codigo)
    {
        try {
        $certificado = Certificado::where('codigo_unico', $codigo)
            ->with(['usuario', 'curso'])
            ->first();

        if (!$certificado) {
            return view('certificates.verificar', [
                'encontrado' => false,
                'mensaje' => 'Certificado no encontrado.'
            ]);
        }

            // Verificar que las relaciones estén cargadas
            if (!$certificado->usuario || !$certificado->curso) {
                Log::error("Certificado sin relaciones cargadas", [
                    'certificado_id' => $certificado->id,
                    'codigo_unico' => $codigo,
                    'tiene_usuario' => $certificado->usuario ? true : false,
                    'tiene_curso' => $certificado->curso ? true : false
                ]);
                return view('certificates.verificar', [
                    'encontrado' => false,
                    'mensaje' => 'Error al cargar la información del certificado.'
                ]);
            }

        // Generar QR si no existe o si el archivo no existe físicamente
        $needsQR = false;
        if (!$certificado->qr_code) {
            $needsQR = true;
            Log::info("Certificado no tiene QR code, generando uno nuevo", [
                'certificado_id' => $certificado->id,
                'codigo_unico' => $certificado->codigo_unico
            ]);
        } else {
            // Verificar si existe físicamente
            $fullPath = storage_path('app/public/' . $certificado->qr_code);
            if (!file_exists($fullPath)) {
                $needsQR = true;
                Log::warning("QR code del certificado no existe físicamente, regenerando", [
                    'certificado_id' => $certificado->id,
                    'qr_path' => $certificado->qr_code,
                    'full_path' => $fullPath
                ]);
            }
        }

        if ($needsQR) {
            $qrPath = $this->generarCodigoQR($certificado->codigo_unico);
            if ($qrPath) {
                $certificado->update(['qr_code' => $qrPath]);
                $certificado->refresh();
                Log::info("QR code generado y guardado exitosamente", [
                    'certificado_id' => $certificado->id,
                    'qr_path' => $qrPath
                ]);
            } else {
                Log::error("No se pudo generar el QR code para el certificado", [
                    'certificado_id' => $certificado->id,
                    'codigo_unico' => $certificado->codigo_unico
                ]);
            }
        }

            // Verificar que el QR existe físicamente antes de pasar a la vista
            if ($certificado->qr_code) {
                $fullPath = storage_path('app/public/' . $certificado->qr_code);
                if (!file_exists($fullPath)) {
                    Log::warning("QR file no existe en verificar, regenerando", [
                        'certificado_id' => $certificado->id,
                        'qr_path' => $certificado->qr_code,
                        'full_path' => $fullPath
                    ]);
                    // Intentar regenerar
                    $qrPath = $this->generarCodigoQR($certificado->codigo_unico);
                    if ($qrPath) {
                        $certificado->update(['qr_code' => $qrPath]);
                        $certificado->refresh();
                    }
                }
            }

        return view('certificates.verificar', [
            'encontrado' => true,
            'certificado' => $certificado
        ]);
        } catch (\Exception $e) {
            Log::error("Error en verificar certificado", [
                'codigo' => $codigo,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return view('certificates.verificar', [
                'encontrado' => false,
                'mensaje' => 'Ocurrió un error al verificar el certificado. Por favor, intenta nuevamente.'
            ]);
        }
    }

    /**
     * Descargar código QR de un certificado
     */
    public function descargarQR($codigo)
    {
        try {
            $certificado = Certificado::where('codigo_unico', $codigo)->first();

            if (!$certificado) {
                return redirect()->route('certificados.verificar', $codigo)
                    ->with('error', 'Certificado no encontrado.');
            }

            // Generar QR si no existe
            if (!$certificado->qr_code || !file_exists(storage_path('app/public/' . $certificado->qr_code))) {
                $qrPath = $this->generarCodigoQR($certificado->codigo_unico);
                if ($qrPath) {
                    $certificado->update(['qr_code' => $qrPath]);
                    $certificado->refresh();
                } else {
                    return redirect()->route('certificados.verificar', $codigo)
                        ->with('error', 'No se pudo generar el código QR para descargar.');
                }
            }

            $fullPath = storage_path('app/public/' . $certificado->qr_code);
            if (!file_exists($fullPath)) {
                return redirect()->route('certificados.verificar', $codigo)
                    ->with('error', 'El archivo QR no existe.');
            }

            // Detectar el tipo de archivo basado en la extensión
            $extension = strtolower(pathinfo($certificado->qr_code, PATHINFO_EXTENSION));
            $mimeType = $extension === 'svg' ? 'image/svg+xml' : 'image/png';
            $filename = 'qr-certificado-' . $certificado->codigo_unico . '.' . $extension;

            return response()->download($fullPath, $filename, [
                'Content-Type' => $mimeType,
            ]);

        } catch (\Exception $e) {
            Log::error("Error al descargar QR", [
                'codigo' => $codigo,
                'error' => $e->getMessage()
            ]);

            return redirect()->route('certificados.verificar', $codigo)
                ->with('error', 'Ocurrió un error al descargar el QR: ' . $e->getMessage());
        }
    }

    /**
     * Regenerar código QR para un certificado
     */
    public function regenerarQR($codigo)
    {
        try {
            $certificado = Certificado::where('codigo_unico', $codigo)->first();

            if (!$certificado) {
                return redirect()->route('certificados.verificar', $codigo)
                    ->with('error', 'Certificado no encontrado.');
            }

            // Eliminar QR anterior si existe
            if ($certificado->qr_code) {
                $fullPath = storage_path('app/public/' . $certificado->qr_code);
                if (file_exists($fullPath)) {
                    @unlink($fullPath);
                    Log::info("QR anterior eliminado", [
                        'certificado_id' => $certificado->id,
                        'old_path' => $certificado->qr_code
                    ]);
                }
            }

            // Generar nuevo QR
            $qrPath = $this->generarCodigoQR($certificado->codigo_unico);
            if ($qrPath) {
                $certificado->update(['qr_code' => $qrPath]);
                $certificado->refresh();

                // Verificar que el archivo existe
                $fullPath = storage_path('app/public/' . $qrPath);
                if (file_exists($fullPath)) {
                    Log::info("QR regenerado exitosamente", [
                        'certificado_id' => $certificado->id,
                        'new_path' => $qrPath,
                        'file_size' => filesize($fullPath)
                    ]);

                    return redirect()->route('certificados.verificar', $codigo)
                        ->with('success', 'Código QR regenerado exitosamente.')
                        ->with('qr_regenerated', true);
                } else {
                    Log::error("QR regenerado pero archivo no existe", [
                        'certificado_id' => $certificado->id,
                        'qr_path' => $qrPath,
                        'full_path' => $fullPath
                    ]);

                    return redirect()->route('certificados.verificar', $codigo)
                        ->with('error', 'El QR se generó pero no se pudo verificar el archivo.');
                }
            } else {
                Log::error("No se pudo generar el QR", [
                    'certificado_id' => $certificado->id,
                    'codigo_unico' => $codigo
                ]);

                $gdLoaded = extension_loaded('gd');
                $gdInfo = $gdLoaded ? gd_info() : null;

                Log::error("Error al regenerar QR - Detalles completos", [
                    'certificado_id' => $certificado->id,
                    'codigo_unico' => $codigo,
                    'gd_loaded' => $gdLoaded,
                    'gd_info' => $gdInfo,
                    'php_version' => PHP_VERSION,
                    'sapi' => php_sapi_name(),
                    'memory_limit' => ini_get('memory_limit'),
                    'php_ini_loaded' => php_ini_loaded_file(),
                    'loaded_extensions' => get_loaded_extensions()
                ]);

                $errorMessage = 'No se pudo generar el código QR. ';

                // Verificar si GD está disponible
                if (!$gdLoaded) {
                    $errorMessage .= 'La extensión GD de PHP no está disponible en el servidor web. ';
                    $errorMessage .= 'Nota: Aunque GD puede estar disponible en CLI, el servidor web puede usar una configuración diferente. ';
                    $errorMessage .= 'Por favor, verifica que GD esté habilitada en el php.ini del servidor web y reinicia el servidor.';
                } else {
                    $errorMessage .= 'Aunque GD está disponible, hubo un error al generar el QR. ';
                    $errorMessage .= 'Por favor, revisa los logs del servidor para más detalles o contacta al soporte técnico.';
                }

                return redirect()->route('certificados.verificar', $codigo)
                    ->with('error', $errorMessage);
            }
        } catch (\Exception $e) {
            Log::error("Error al regenerar QR", [
                'codigo' => $codigo,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('certificados.verificar', $codigo)
                ->with('error', 'Ocurrió un error al regenerar el QR: ' . $e->getMessage());
        }
    }

    /**
     * Mostrar formulario de creación (solo admin)
     */
    public function create()
    {
        $this->authorize('create', Certificado::class);
        return view('certificados.create');
    }

    /**
     * Guardar un nuevo certificado (solo admin)
     */
    public function store(Request $request)
    {
        $this->authorize('create', Certificado::class);

        $validated = $request->validate([
            'usuario_id'   => 'required|exists:users,id',
            'curso_id'     => 'required|exists:cursos,id',
            'codigo_unico' => 'required|unique:certificados,codigo_unico',
            'status'       => 'nullable|in:valido,revocado',
        ]);

        $validated['fecha_emision'] = $validated['fecha_emision'] ?? now();
        $validated['status'] = $validated['status'] ?? 'valido';

        Certificado::create($validated);

        return redirect()
            ->route('certificados.index')
            ->with('success', 'Certificado creado correctamente.');
    }

    /**
     * Mostrar formulario de edición (solo admin)
     */
    public function edit(Certificado $certificado)
    {
        $this->authorize('update', $certificado);
        return view('certificados.edit', compact('certificado'));
    }

    /**
     * Actualizar un certificado (solo admin)
     */
    public function update(Request $request, Certificado $certificado)
    {
        $this->authorize('update', $certificado);

        $validated = $request->validate([
            'codigo_unico' => 'required|unique:certificados,codigo_unico,' . $certificado->id,
            'status'       => 'nullable|in:valido,revocado',
        ]);

        $certificado->update($validated);

        return redirect()
            ->route('certificados.index')
            ->with('success', 'Certificado actualizado correctamente.');
    }

    /**
     * Eliminar un certificado (solo admin)
     */
    public function destroy(Certificado $certificado)
    {
        $this->authorize('delete', $certificado);

        $certificado->delete();

        return redirect()
            ->route('certificados.index')
            ->with('success', 'Certificado eliminado correctamente.');
    }

    /**
     * Verificar elegibilidad para certificado
     */
    public function verificarElegibilidad(Curso $curso)
    {
        try {
            $usuario = Auth::user();

            // Verificar inscripción
            $inscripcion = Inscripcion::where('usuario_id', $usuario->id)
                ->where('curso_id', $curso->id)
                ->first();

            if (!$inscripcion) {
                return response()->json([
                    'elegible' => false,
                    'mensaje' => 'No estás inscrito en este curso.',
                    'progreso' => 0
                ]);
            }

            // Verificar si ya tiene certificado
            $certificadoExistente = Certificado::where('usuario_id', $usuario->id)
                ->where('curso_id', $curso->id)
                ->first();

            if ($certificadoExistente) {
                return response()->json([
                    'elegible' => true,
                    'ya_tiene_certificado' => true,
                    'certificado_id' => $certificadoExistente->id,
                    'mensaje' => 'Ya tienes un certificado para este curso.',
                    'progreso' => $inscripcion->progreso
                ]);
            }

            // Verificar progreso mínimo (reducido para cursos de prueba)
            $progresoMinimo = 50; // Reducido de 80% a 50% para cursos de prueba
            $elegible = $inscripcion->progreso >= $progresoMinimo;

            return response()->json([
                'elegible' => $elegible,
                'ya_tiene_certificado' => false,
                'progreso' => $inscripcion->progreso,
                'progreso_minimo' => $progresoMinimo,
                'mensaje' => $elegible
                    ? '¡Felicidades! Puedes generar tu certificado.'
                    : "Necesitas completar al menos el {$progresoMinimo}% del curso. Tu progreso actual es: {$inscripcion->progreso}%"
            ]);

        } catch (\Exception $e) {
            Log::error("Error verificando elegibilidad", [
                'usuario_id' => Auth::id(),
                'curso_id' => $curso->id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'elegible' => false,
                'mensaje' => 'Error al verificar elegibilidad.',
                'progreso' => 0
            ], 500);
        }
    }

    /**
     * Generar código único para certificado
     */
    private function generarCodigoUnico()
    {
        do {
            $codigo = 'CERT-' . strtoupper(Str::random(8)) . '-' . now()->format('Y');
        } while (Certificado::where('codigo_unico', $codigo)->exists());

        return $codigo;
    }

    /**
     * Generar código QR único para certificado en formato PNG
     * Similar a SimpleSoftwareIO pero usando endroid/qr-code
     */
    private function generarCodigoQR($codigoUnico, $forzarPNG = false)
    {
        try {
            // URL de verificación del certificado
            $verificationUrl = route('certificados.verificar', $codigoUnico);

            Log::info("Iniciando generación de QR Code", [
                'codigo_unico' => $codigoUnico,
                'verification_url' => $verificationUrl
            ]);

            // Verificar que la extensión GD esté disponible (necesaria para PNG)
            $gdLoaded = extension_loaded('gd');
            $gdInfo = $gdLoaded ? gd_info() : null;

            Log::info("Verificación de extensión GD antes de generar QR", [
                'gd_loaded' => $gdLoaded,
                'gd_info' => $gdInfo,
                'php_version' => PHP_VERSION,
                'sapi' => php_sapi_name()
            ]);

            // Intentar generar el QR de todas formas
            // Si GD no está disponible, el error se capturará en el catch

            // Generar QR Code - Intentar PNG primero, si falla usar SVG (no requiere GD)
            $usePNG = $forzarPNG ? true : true; // Si se fuerza PNG, intentar PNG primero
            $result = null;
            $writer = null;

            // Intentar PNG primero (requiere GD) - o si se fuerza PNG
            if ($gdLoaded || $forzarPNG) {
                try {
                    $qrCode = new QrCode(
                        data: $verificationUrl,
                        encoding: new Encoding('UTF-8'),
                        errorCorrectionLevel: ErrorCorrectionLevel::High,
                        size: 300,
                        margin: 10,
                        roundBlockSizeMode: RoundBlockSizeMode::Margin,
                        foregroundColor: new Color(0, 0, 0),
                        backgroundColor: new Color(255, 255, 255)
                    );

                    $writer = new PngWriter();
                    $result = $writer->write($qrCode);
                    $usePNG = true;

                    Log::info("QR Code generado exitosamente en PNG", [
                        'codigo_unico' => $codigoUnico,
                        'result_class' => get_class($result)
                    ]);
                } catch (\Throwable $pngError) {
                    Log::warning("Error al generar QR en PNG, intentando SVG", [
                        'codigo_unico' => $codigoUnico,
                        'error' => $pngError->getMessage()
                    ]);
                    $usePNG = false;
                }
            } else {
                $usePNG = false;
                Log::info("GD no disponible, usando SVG para QR", [
                    'codigo_unico' => $codigoUnico
                ]);
            }

            // Si PNG falló o GD no está disponible, usar SVG (solo si no se fuerza PNG)
            if ((!$usePNG || !$result) && !$forzarPNG) {
                try {
                    $qrCode = new QrCode(
                        data: $verificationUrl,
                        encoding: new Encoding('UTF-8'),
                        errorCorrectionLevel: ErrorCorrectionLevel::High,
                        size: 300,
                        margin: 10,
                        roundBlockSizeMode: RoundBlockSizeMode::Margin,
                        foregroundColor: new Color(0, 0, 0),
                        backgroundColor: new Color(255, 255, 255)
                    );

                    $writer = new SvgWriter();
                    $result = $writer->write($qrCode);
                    $usePNG = false;

                    Log::info("QR Code generado exitosamente en SVG", [
                        'codigo_unico' => $codigoUnico,
                        'result_class' => get_class($result)
                    ]);
                } catch (\Throwable $svgError) {
                    Log::error("Error al generar el QR Code en SVG", [
                        'codigo_unico' => $codigoUnico,
                        'error' => $svgError->getMessage(),
                        'error_class' => get_class($svgError),
                        'trace' => $svgError->getTraceAsString(),
                        'file' => $svgError->getFile(),
                        'line' => $svgError->getLine()
                    ]);
                    throw new \Exception("Error al generar el QR (intentó PNG y SVG): " . $svgError->getMessage());
                }
            }

            // Verificar que el resultado tenga contenido
            if (!$result) {
                throw new \Exception("El writer no retornó resultado");
            }

            try {
                $qrString = $result->getString();
            } catch (\Throwable $stringError) {
                Log::error("Error al obtener el string del QR", [
                    'error' => $stringError->getMessage(),
                    'trace' => $stringError->getTraceAsString()
                ]);
                throw new \Exception("Error al obtener el contenido del QR: " . $stringError->getMessage());
            }

            if (empty($qrString)) {
                throw new \Exception("El QR code generado está vacío");
            }

            // Guardar en storage
            $directory = 'certificados/qr-codes';
            $extension = $usePNG ? 'png' : 'svg';
            $filename = 'qr-' . str_replace(['/', '\\', ':', '*', '?', '"', '<', '>', '|'], '-', $codigoUnico) . '-' . time() . '.' . $extension;
            $path = $directory . '/' . $filename;

            // Asegurar que el directorio existe
            $fullDirectoryPath = storage_path('app/public/' . $directory);
            if (!file_exists($fullDirectoryPath)) {
                if (!mkdir($fullDirectoryPath, 0755, true)) {
                    throw new \Exception("No se pudo crear el directorio: " . $fullDirectoryPath . ". Verifica los permisos de escritura.");
                }
            }

            // Verificar permisos de escritura
            if (!is_writable($fullDirectoryPath)) {
                throw new \Exception("El directorio no tiene permisos de escritura: " . $fullDirectoryPath);
            }

            // Guardar el archivo PNG directamente
            $fullPath = storage_path('app/public/' . $path);
            $bytesWritten = @file_put_contents($fullPath, $qrString);

            if ($bytesWritten === false) {
                $lastError = error_get_last();
                throw new \Exception("No se pudo escribir el archivo QR: " . $fullPath . ". Error: " . ($lastError['message'] ?? 'Desconocido'));
            }

            // Verificar que el archivo se guardó correctamente
            if (!file_exists($fullPath)) {
                throw new \Exception("El archivo QR no existe después de guardarlo: " . $fullPath);
            }

            $fileSize = filesize($fullPath);
            if ($fileSize === false || $fileSize === 0) {
                throw new \Exception("El archivo QR está vacío o no se puede leer: " . $fullPath);
            }

            Log::info("QR Code generado exitosamente", [
                'codigo_unico' => $codigoUnico,
                'path' => $path,
                'full_path' => $fullPath,
                'url' => $verificationUrl,
                'file_exists' => file_exists($fullPath),
                'file_size' => $fileSize,
                'bytes_written' => $bytesWritten
            ]);

            // Retornar la ruta relativa para almacenar en BD
            return $path;

        } catch (\Throwable $e) {
            $gdLoaded = extension_loaded('gd');
            $gdInfo = $gdLoaded ? gd_info() : null;

            Log::error("Error generando código QR - Detalles completos", [
                'codigo_unico' => $codigoUnico,
                'error' => $e->getMessage(),
                'error_class' => get_class($e),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'gd_loaded' => $gdLoaded,
                'gd_info' => $gdInfo,
                'php_version' => PHP_VERSION,
                'sapi' => php_sapi_name(),
                'memory_limit' => ini_get('memory_limit'),
                'loaded_extensions' => get_loaded_extensions()
            ]);

            // Retornar null si hay error, pero no fallar la creación del certificado
            return null;
        }
    }

    /**
     * Convertir SVG a PNG temporalmente para usar en PDF
     */
    private function convertirSvgAPng($svgPath, $codigoUnico)
    {
        try {
            // Leer el contenido SVG
            $svgContent = file_get_contents($svgPath);
            if (!$svgContent) {
                Log::warning("No se pudo leer el contenido SVG", ['path' => $svgPath]);
                return null;
            }

            // Extraer la URL de verificación del SVG o regenerar el QR como PNG
            // La forma más confiable es regenerar el QR como PNG temporalmente
            $verificationUrl = route('certificados.verificar', $codigoUnico);

            // Verificar si GD está disponible
            if (!extension_loaded('gd')) {
                Log::warning("GD no disponible para convertir SVG a PNG", ['codigo' => $codigoUnico]);
                return null;
            }

            // Regenerar el QR como PNG temporalmente usando la misma URL
            $qrCode = new QrCode(
                data: $verificationUrl,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 300,
                margin: 10,
                roundBlockSizeMode: RoundBlockSizeMode::Margin,
                foregroundColor: new Color(0, 0, 0),
                backgroundColor: new Color(255, 255, 255)
            );

            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $pngContent = $result->getString();

            // Guardar temporalmente
            $tempPath = sys_get_temp_dir() . '/qr-temp-' . $codigoUnico . '-' . time() . '.png';
            file_put_contents($tempPath, $pngContent);

            Log::info("SVG convertido a PNG temporalmente para PDF", [
                'codigo' => $codigoUnico,
                'temp_path' => $tempPath
            ]);

            return $tempPath;

        } catch (\Exception $e) {
            Log::error("Error al convertir SVG a PNG", [
                'codigo' => $codigoUnico,
                'svg_path' => $svgPath,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }
}
