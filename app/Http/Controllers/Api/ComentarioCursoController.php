<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ComentarioCurso;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComentarioCursoController extends Controller
{
    /**
     * Obtener comentarios de un curso específico
     */
    public function index($cursoId): JsonResponse
    {
        try {
            $comentarios = ComentarioCurso::with([
                'usuario',
                'nivel',
                'children' => function($query) {
                    $query->with(['usuario', 'nivel'])
                          ->orderBy('created_at', 'asc');
                }
            ])
                ->where('curso_id', $cursoId)
                ->whereNull('parent_id') // Comentarios principales (sin padre)
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $comentarios
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar comentarios: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar un comentario del estudiante (solo autor del comentario)
     */
    public function update(Request $request, $comentarioId): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'comentario' => 'required|string|min:3|max:1000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Datos inválidos',
                    'errors' => $validator->errors()
                ], 422);
            }

            $comentario = ComentarioCurso::find($comentarioId);
            if (!$comentario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Comentario no encontrado'
                ], 404);
            }

            if ($comentario->usuario_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permisos para editar este comentario'
                ], 403);
            }

            $comentario->update([
                'comentario' => $request->comentario,
                // cuando el alumno edita, vuelve a marcar como no leído para el creador
                'leido_por_creador' => false,
            ]);

            $comentario->load(['usuario', 'nivel']);

            return response()->json([
                'success' => true,
                'message' => 'Comentario actualizado',
                'data' => $comentario
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar comentario: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar un comentario (autor o creador del curso)
     */
    public function destroy($comentarioId): JsonResponse
    {
        try {
            $comentario = ComentarioCurso::find($comentarioId);
            if (!$comentario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Comentario no encontrado'
                ], 404);
            }

            $esAutor = $comentario->usuario_id === Auth::id();
            $esCreadorCurso = optional($comentario->curso)->creador_id === Auth::id();

            if (!$esAutor && !$esCreadorCurso) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permisos para eliminar este comentario'
                ], 403);
            }

            $comentario->delete();

            return response()->json([
                'success' => true,
                'message' => 'Comentario eliminado'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar comentario: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Crear un nuevo comentario
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'curso_id' => 'required|exists:cursos,id',
                'nivel_id' => 'nullable|exists:niveles,id',
                'comentario' => 'required|string|min:3|max:1000',
                'parent_id' => 'nullable|exists:comentarios_curso,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Datos inválidos',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Verificar que el usuario esté inscrito en el curso
            $cursoId = $request->curso_id;
            // Validar que curso_id sea numérico para evitar errores con PostgreSQL
            if (!is_numeric($cursoId) || (int) $cursoId <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID de curso inválido'
                ], 422);
            }

            $curso = Curso::find((int) $cursoId);
            if (!$curso) {
                return response()->json([
                    'success' => false,
                    'message' => 'Curso no encontrado'
                ], 404);
            }

            // Verificar inscripción (opcional, puedes implementar esta lógica)
            // $inscripcion = Inscripcion::where('curso_id', $request->curso_id)
            //     ->where('usuario_id', Auth::id())
            //     ->where('status', 'activo')
            //     ->first();

            // Si no hay parent_id, significa que es un comentario principal
            // Los comentarios principales no tienen parent_id (son el inicio del hilo)
            $parentId = $request->parent_id ?: null;

            $comentario = ComentarioCurso::create([
                'curso_id' => $request->curso_id,
                'usuario_id' => Auth::id(),
                'nivel_id' => $request->nivel_id ?: null,
                'comentario' => $request->comentario,
                'parent_id' => $parentId,
                'leido_por_creador' => false
            ]);

            $comentario->load(['usuario', 'nivel', 'children.usuario']);

            return response()->json([
                'success' => true,
                'message' => 'Comentario publicado exitosamente',
                'data' => $comentario
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al publicar comentario: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Responder a un comentario (solo para creadores) - Crear nuevo comentario en hilo
     */
    public function responder(Request $request, $comentarioId): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'respuesta' => 'required|string|min:3|max:1000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Respuesta inválida',
                    'errors' => $validator->errors()
                ], 422);
            }

            $comentarioOriginal = ComentarioCurso::find($comentarioId);
            if (!$comentarioOriginal) {
                return response()->json([
                    'success' => false,
                    'message' => 'Comentario no encontrado'
                ], 404);
            }

            // Verificar que el usuario autenticado sea el creador del curso
            $curso = $comentarioOriginal->curso;
            if ($curso->creador_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permisos para responder este comentario'
                ], 403);
            }

            // Crear nuevo comentario como respuesta en el hilo
            $nuevaRespuesta = ComentarioCurso::create([
                'curso_id' => $comentarioOriginal->curso_id,
                'usuario_id' => Auth::id(), // El creador
                'nivel_id' => $comentarioOriginal->nivel_id,
                'comentario' => $request->respuesta,
                'parent_id' => $comentarioOriginal->parent_id ?: $comentarioOriginal->id, // Si es respuesta a hilo, mantener el parent original
                'leido_por_creador' => true
            ]);

            // Marcar el comentario original como leído
            $comentarioOriginal->update([
                'leido_por_creador' => true
            ]);

            $nuevaRespuesta->load(['usuario', 'nivel']);

            return response()->json([
                'success' => true,
                'message' => 'Respuesta publicada exitosamente',
                'data' => $nuevaRespuesta
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al responder comentario: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar respuesta del creador
     */
    public function actualizarRespuesta(Request $request, $comentarioId): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'respuesta' => 'required|string|min:3|max:1000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Respuesta inválida',
                    'errors' => $validator->errors()
                ], 422);
            }

            $comentario = ComentarioCurso::find($comentarioId);
            if (!$comentario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Comentario no encontrado'
                ], 404);
            }

            if (optional($comentario->curso)->creador_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permisos para actualizar esta respuesta'
                ], 403);
            }

            $comentario->update([
                'respuesta' => $request->respuesta,
                'respuesta_fecha' => now(),
                'leido_por_creador' => true,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Respuesta actualizada'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar respuesta: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar respuesta del creador (dejar comentario sin respuesta)
     */
    public function eliminarRespuesta($comentarioId): JsonResponse
    {
        try {
            $comentario = ComentarioCurso::find($comentarioId);
            if (!$comentario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Comentario no encontrado'
                ], 404);
            }

            if (optional($comentario->curso)->creador_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permisos para eliminar esta respuesta'
                ], 403);
            }

            $comentario->update([
                'respuesta' => null,
                'respuesta_fecha' => null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Respuesta eliminada'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar respuesta: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Marcar comentarios como leídos (para creadores)
     */
    public function marcarLeidos(Request $request): JsonResponse
    {
        try {
            $cursoId = $request->curso_id;

            if (!$cursoId) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID de curso requerido'
                ], 400);
            }

            // Validar que cursoId sea numérico
            if (!is_numeric($cursoId) || (int) $cursoId <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID de curso inválido'
                ], 422);
            }

            // Verificar que el usuario sea el creador del curso
            $curso = Curso::find((int) $cursoId);
            if (!$curso || $curso->creador_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permisos para esta acción'
                ], 403);
            }

            ComentarioCurso::where('curso_id', (int) $cursoId)
                ->where('leido_por_creador', false)
                ->update(['leido_por_creador' => true]);

            return response()->json([
                'success' => true,
                'message' => 'Comentarios marcados como leídos'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al marcar comentarios: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener estadísticas de comentarios para creadores
     */
    public function estadisticas($cursoId): JsonResponse
    {
        try {
            // Validar que cursoId sea numérico
            if (!is_numeric($cursoId) || (int) $cursoId <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID de curso inválido'
                ], 422);
            }

            $curso = Curso::find((int) $cursoId);
            if (!$curso || $curso->creador_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permisos para ver estas estadísticas'
                ], 403);
            }

            $totalComentarios = ComentarioCurso::where('curso_id', (int) $cursoId)->count();
            $comentariosSinRespuesta = ComentarioCurso::where('curso_id', (int) $cursoId)
                ->whereNull('respuesta')
                ->count();
            $comentariosNoLeidos = ComentarioCurso::where('curso_id', (int) $cursoId)
                ->where('leido_por_creador', false)
                ->count();

            return response()->json([
                'success' => true,
                'data' => [
                    'total_comentarios' => $totalComentarios,
                    'sin_respuesta' => $comentariosSinRespuesta,
                    'no_leidos' => $comentariosNoLeidos
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener estadísticas: ' . $e->getMessage()
            ], 500);
        }
    }
}
