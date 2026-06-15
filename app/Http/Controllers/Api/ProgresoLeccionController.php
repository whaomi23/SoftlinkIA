<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProgresoLeccion;
use App\Models\Subnivel;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProgresoLeccionController extends Controller
{
    /**
     * Marcar una lección (subnivel) como completada
     */
    public function marcarCompletada(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'subnivel_id' => 'required|integer|exists:subniveles,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $usuarioId = Auth::id();
        $subnivelId = $request->subnivel_id;

        // Verificar que el usuario esté inscrito en el curso
        $subnivel = Subnivel::with('nivel.curso')->find($subnivelId);
        if (!$subnivel) {
            return response()->json([
                'success' => false,
                'message' => 'Subnivel no encontrado'
            ], 404);
        }

        $cursoId = $subnivel->nivel->curso->id;
        $inscripcion = Inscripcion::where('usuario_id', $usuarioId)
            ->where('curso_id', $cursoId)
            ->where('status', 'activo')
            ->first();

        if (!$inscripcion) {
            return response()->json([
                'success' => false,
                'message' => 'No estás inscrito en este curso o tu inscripción no está activa'
            ], 403);
        }

        // Crear o actualizar el progreso
        $progreso = ProgresoLeccion::updateOrCreate(
            [
                'usuario_id' => $usuarioId,
                'leccion_id' => $subnivelId,
            ],
            [
                'curso_id' => $cursoId,
                'completado' => true,
                'completado_en' => now(),
            ]
        );

        // Actualizar el progreso general en la inscripción
        $progresoCalculado = $inscripcion->calcularProgreso();
        $inscripcion->update(['progreso' => $progresoCalculado]);

        return response()->json([
            'success' => true,
            'message' => '¡Lección completada exitosamente!',
            'data' => [
                'progreso_leccion' => $progreso,
                'progreso_curso' => $progresoCalculado,
                'subnivel_completado' => true
            ]
        ]);
    }

    /**
     * Marcar una lección como no completada
     */
    public function marcarNoCompletada(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'subnivel_id' => 'required|integer|exists:subniveles,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $usuarioId = Auth::id();
        $subnivelId = $request->subnivel_id;

        // Verificar inscripción
        $subnivel = Subnivel::with('nivel.curso')->find($subnivelId);
        if (!$subnivel) {
            return response()->json([
                'success' => false,
                'message' => 'Subnivel no encontrado'
            ], 404);
        }

        $cursoId = $subnivel->nivel->curso->id;
        $inscripcion = Inscripcion::where('usuario_id', $usuarioId)
            ->where('curso_id', $cursoId)
            ->where('status', 'activo')
            ->first();

        if (!$inscripcion) {
            return response()->json([
                'success' => false,
                'message' => 'No estás inscrito en este curso'
            ], 403);
        }

        // Eliminar el progreso
        ProgresoLeccion::where('usuario_id', $usuarioId)
            ->where('leccion_id', $subnivelId)
            ->delete();

        // Actualizar el progreso general
        $progresoCalculado = $inscripcion->calcularProgreso();
        $inscripcion->update(['progreso' => $progresoCalculado]);

        return response()->json([
            'success' => true,
            'message' => 'Lección marcada como no completada',
            'data' => [
                'progreso_curso' => $progresoCalculado,
                'subnivel_completado' => false
            ]
        ]);
    }

    /**
     * Obtener el estado de progreso de un subnivel específico
     */
    public function obtenerEstado(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'subnivel_id' => 'required|integer|exists:subniveles,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $usuarioId = Auth::id();
        $subnivelId = $request->subnivel_id;

        $progreso = ProgresoLeccion::where('usuario_id', $usuarioId)
            ->where('leccion_id', $subnivelId)
            ->first();

        return response()->json([
            'success' => true,
            'data' => [
                'completado' => $progreso ? $progreso->completado : false,
                'completado_en' => $progreso ? $progreso->completado_en : null,
            ]
        ]);
    }

    /**
     * Obtener el estado de progreso de múltiples subniveles
     */
    public function obtenerEstadosLote(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'subnivel_ids' => 'required|array',
            'subnivel_ids.*' => 'integer|exists:subniveles,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $usuarioId = Auth::id();
        $subnivelIds = $request->subnivel_ids;

        $progresos = ProgresoLeccion::where('usuario_id', $usuarioId)
            ->whereIn('leccion_id', $subnivelIds)
            ->where('completado', true)
            ->pluck('leccion_id')
            ->toArray();

        // Crear objeto con estados
        $estados = [];
        foreach ($subnivelIds as $subnivelId) {
            $estados[$subnivelId] = in_array($subnivelId, $progresos);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'estados' => $estados,
                'total_completados' => count($progresos),
                'total_subniveles' => count($subnivelIds)
            ]
        ]);
    }
}
