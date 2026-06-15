<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PreguntaCuestionario;
use App\Models\RespuestaCuestionarioUsuario;
use App\Models\Subnivel;
use App\Models\ProgresoLeccion;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CuestionarioController extends Controller
{
    /**
     * Obtener el cuestionario de un subnivel
     */
    public function obtenerCuestionario(Request $request, $subnivelId): JsonResponse
    {
        $usuarioId = Auth::id();

        $subnivel = Subnivel::with(['nivel.curso', 'preguntas' => function($q) {
            $q->orderBy('numero_pregunta');
        }])->find($subnivelId);

        if (!$subnivel) {
            return response()->json([
                'success' => false,
                'message' => 'Subnivel no encontrado'
            ], 404);
        }

        // Verificar inscripción
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

        // Verificar si el subnivel requiere cuestionario
        if (!$subnivel->requiere_cuestionario) {
            return response()->json([
                'success' => false,
                'message' => 'Este subnivel no requiere cuestionario'
            ], 400);
        }

        // Verificar si ya está aprobado
        $progreso = ProgresoLeccion::where('usuario_id', $usuarioId)
            ->where('leccion_id', $subnivelId)
            ->first();

        $yaAprobado = $progreso && $progreso->cuestionario_aprobado;
        $intentoActual = $progreso ? $progreso->intento_cuestionario : 0;

        // Obtener preguntas (sin mostrar la respuesta correcta)
        $preguntas = $subnivel->preguntas->map(function($pregunta) {
            return [
                'id' => $pregunta->id,
                'numero_pregunta' => $pregunta->numero_pregunta,
                'pregunta_texto' => $pregunta->pregunta_texto,
                'opciones' => [
                    1 => $pregunta->opcion_1,
                    2 => $pregunta->opcion_2,
                    3 => $pregunta->opcion_3,
                ],
                // No enviar respuesta_correcta al estudiante
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'subnivel_id' => $subnivel->id,
                'subnivel_titulo' => $subnivel->titulo,
                'preguntas' => $preguntas,
                'total_preguntas' => $preguntas->count(),
                'ya_aprobado' => $yaAprobado,
                'intento_actual' => $intentoActual,
            ]
        ]);
    }

    /**
     * Evaluar respuestas del cuestionario
     */
    public function evaluarCuestionario(Request $request, $subnivelId): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'respuestas' => 'required|array',
            'respuestas.*.pregunta_id' => 'required|integer|exists:preguntas_cuestionario,id',
            'respuestas.*.respuesta_seleccionada' => 'required|integer|in:1,2,3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $usuarioId = Auth::id();

        $subnivel = Subnivel::with(['nivel.curso', 'preguntas'])->find($subnivelId);

        if (!$subnivel) {
            return response()->json([
                'success' => false,
                'message' => 'Subnivel no encontrado'
            ], 404);
        }

        // Verificar inscripción
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

        if (!$subnivel->requiere_cuestionario) {
            return response()->json([
                'success' => false,
                'message' => 'Este subnivel no requiere cuestionario'
            ], 400);
        }

        // Obtener progreso actual
        $progreso = ProgresoLeccion::where('usuario_id', $usuarioId)
            ->where('leccion_id', $subnivelId)
            ->first();

        $intentoNumero = $progreso ? ($progreso->intento_cuestionario + 1) : 1;

        // Obtener todas las preguntas del subnivel
        $preguntas = $subnivel->preguntas->keyBy('id');
        $totalPreguntas = $preguntas->count();
        $respuestasCorrectas = 0;
        $respuestasDetalle = [];

        // Evaluar cada respuesta
        foreach ($request->respuestas as $respuestaData) {
            $preguntaId = $respuestaData['pregunta_id'];
            $respuestaSeleccionada = (int)$respuestaData['respuesta_seleccionada'];

            $pregunta = $preguntas->get($preguntaId);
            if (!$pregunta) {
                continue;
            }

            $esCorrecta = $pregunta->esCorrecta($respuestaSeleccionada);
            if ($esCorrecta) {
                $respuestasCorrectas++;
            }

            // Guardar respuesta del usuario
            RespuestaCuestionarioUsuario::create([
                'usuario_id' => $usuarioId,
                'subnivel_id' => $subnivelId,
                'pregunta_id' => $preguntaId,
                'respuesta_seleccionada' => $respuestaSeleccionada,
                'es_correcta' => $esCorrecta,
                'intento_numero' => $intentoNumero,
            ]);

            $respuestasDetalle[] = [
                'pregunta_id' => $preguntaId,
                'numero_pregunta' => $pregunta->numero_pregunta,
                'respuesta_seleccionada' => $respuestaSeleccionada,
                'respuesta_correcta' => $pregunta->respuesta_correcta,
                'es_correcta' => $esCorrecta,
            ];
        }

        // Calcular porcentaje (mínimo 70% para aprobar)
        $porcentajeAprobado = ($respuestasCorrectas / $totalPreguntas) * 100;
        $aprobado = $porcentajeAprobado >= 70;

        // Actualizar o crear progreso
        $progreso = ProgresoLeccion::updateOrCreate(
            [
                'usuario_id' => $usuarioId,
                'leccion_id' => $subnivelId,
            ],
            [
                'curso_id' => $cursoId,
                'cuestionario_aprobado' => $aprobado,
                'intento_cuestionario' => $intentoNumero,
                // Si aprueba, marcar como completado también
                'completado' => $aprobado ? true : ($progreso ? $progreso->completado : false),
                'completado_en' => $aprobado ? now() : ($progreso ? $progreso->completado_en : null),
            ]
        );

        // Si aprueba, desbloquear siguiente contenido
        $contenidoDesbloqueado = null;
        if ($aprobado) {
            $contenidoDesbloqueado = $this->desbloquearSiguienteContenido($usuarioId, $subnivel, $cursoId);

            // Actualizar progreso del curso
            $progresoCalculado = $inscripcion->calcularProgreso();
            $inscripcion->update(['progreso' => $progresoCalculado]);
        }

        return response()->json([
            'success' => true,
            'message' => $aprobado
                ? '¡Felicitaciones! Has aprobado el cuestionario'
                : 'No has alcanzado el mínimo requerido (70%). Inténtalo de nuevo.',
            'data' => [
                'aprobado' => $aprobado,
                'respuestas_correctas' => $respuestasCorrectas,
                'total_preguntas' => $totalPreguntas,
                'porcentaje' => round($porcentajeAprobado, 2),
                'intento_numero' => $intentoNumero,
                'respuestas_detalle' => $respuestasDetalle,
                'progreso' => $progreso,
                'subnivel_id' => $subnivelId,
                'contenido_desbloqueado' => $contenidoDesbloqueado,
            ]
        ]);
    }

    /**
     * Verificar si el cuestionario está aprobado
     */
    public function verificarAprobacion(Request $request, $subnivelId): JsonResponse
    {
        $usuarioId = Auth::id();

        $progreso = ProgresoLeccion::where('usuario_id', $usuarioId)
            ->where('leccion_id', $subnivelId)
            ->first();

        $aprobado = $progreso && $progreso->cuestionario_aprobado;

        return response()->json([
            'success' => true,
            'data' => [
                'aprobado' => $aprobado,
                'intento_numero' => $progreso ? $progreso->intento_cuestionario : 0,
            ]
        ]);
    }

    /**
     * Verificar si un subnivel está desbloqueado
     */
    public function verificarDesbloqueo(Request $request, $subnivelId): JsonResponse
    {
        $usuarioId = Auth::id();

        $subnivel = Subnivel::with(['nivel.curso', 'nivel.subniveles'])->find($subnivelId);

        if (!$subnivel) {
            return response()->json([
                'success' => false,
                'message' => 'Subnivel no encontrado'
            ], 404);
        }

        $cursoId = $subnivel->nivel->curso->id;

        // Verificar inscripción
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

        $desbloqueado = $this->estaDesbloqueado($usuarioId, $subnivel, $cursoId);

        return response()->json([
            'success' => true,
            'data' => [
                'desbloqueado' => $desbloqueado,
                'requiere_cuestionario' => $subnivel->requiere_cuestionario,
                'razon_bloqueo' => $desbloqueado ? null : $this->obtenerRazonBloqueo($usuarioId, $subnivel, $cursoId),
            ]
        ]);
    }

    /**
     * Desbloquear siguiente contenido después de aprobar cuestionario
     * Retorna información sobre el contenido desbloqueado
     */
    private function desbloquearSiguienteContenido($usuarioId, Subnivel $subnivel, $cursoId)
    {
        $nivel = $subnivel->nivel;
        $contenidoDesbloqueado = null;

        // Buscar siguiente subnivel en el mismo nivel
        $siguienteSubnivel = $nivel->subniveles()
            ->where('numero', '>', $subnivel->numero)
            ->orderBy('numero')
            ->first();

        if ($siguienteSubnivel) {
            // Verificar si el siguiente subnivel ya tiene progreso
            $progresoSiguiente = ProgresoLeccion::where('usuario_id', $usuarioId)
                ->where('leccion_id', $siguienteSubnivel->id)
                ->first();

            // Si no tiene progreso y no requiere cuestionario, crear progreso inicial
            // Esto permite que el usuario acceda al siguiente subnivel
            if (!$progresoSiguiente && !$siguienteSubnivel->requiere_cuestionario) {
                ProgresoLeccion::create([
                    'usuario_id' => $usuarioId,
                    'curso_id' => $cursoId,
                    'leccion_id' => $siguienteSubnivel->id,
                    'completado' => false,
                    'cuestionario_aprobado' => false,
                    'intento_cuestionario' => 0,
                ]);

                $contenidoDesbloqueado = [
                    'tipo' => 'subnivel',
                    'id' => $siguienteSubnivel->id,
                    'titulo' => $siguienteSubnivel->titulo,
                    'mensaje' => "El siguiente subnivel '{$siguienteSubnivel->titulo}' ha sido desbloqueado"
                ];
            } else {
                // El siguiente subnivel ya está disponible (tiene progreso o requiere cuestionario)
                $contenidoDesbloqueado = [
                    'tipo' => 'subnivel',
                    'id' => $siguienteSubnivel->id,
                    'titulo' => $siguienteSubnivel->titulo,
                    'mensaje' => "El siguiente subnivel '{$siguienteSubnivel->titulo}' está disponible"
                ];
            }
        } else {
            // Si no hay más subniveles en este nivel, verificar siguiente nivel
            $siguienteNivel = $nivel->curso->niveles()
                ->where('numero', '>', $nivel->numero)
                ->orderBy('numero')
                ->first();

            if ($siguienteNivel) {
                $primerSubnivelSiguienteNivel = $siguienteNivel->subniveles()
                    ->orderBy('numero')
                    ->first();

                if ($primerSubnivelSiguienteNivel) {
                    // Verificar si el primer subnivel del siguiente nivel ya tiene progreso
                    $progresoPrimerSubnivel = ProgresoLeccion::where('usuario_id', $usuarioId)
                        ->where('leccion_id', $primerSubnivelSiguienteNivel->id)
                        ->first();

                    // Si no tiene progreso y no requiere cuestionario, crear progreso inicial
                    // Esto permite que el usuario acceda al primer subnivel del siguiente nivel
                    if (!$progresoPrimerSubnivel && !$primerSubnivelSiguienteNivel->requiere_cuestionario) {
                        ProgresoLeccion::create([
                            'usuario_id' => $usuarioId,
                            'curso_id' => $cursoId,
                            'leccion_id' => $primerSubnivelSiguienteNivel->id,
                            'completado' => false,
                            'cuestionario_aprobado' => false,
                            'intento_cuestionario' => 0,
                        ]);

                        $contenidoDesbloqueado = [
                            'tipo' => 'nivel',
                            'id' => $primerSubnivelSiguienteNivel->id,
                            'titulo' => $siguienteNivel->titulo,
                            'subnivel_titulo' => $primerSubnivelSiguienteNivel->titulo,
                            'mensaje' => "El siguiente nivel '{$siguienteNivel->titulo}' ha sido desbloqueado"
                        ];
                    } else {
                        $contenidoDesbloqueado = [
                            'tipo' => 'nivel',
                            'id' => $primerSubnivelSiguienteNivel->id,
                            'titulo' => $siguienteNivel->titulo,
                            'subnivel_titulo' => $primerSubnivelSiguienteNivel->titulo,
                            'mensaje' => "El siguiente nivel '{$siguienteNivel->titulo}' está disponible"
                        ];
                    }
                }
            }
        }

        return $contenidoDesbloqueado;
    }

    /**
     * Verificar si un subnivel está desbloqueado
     */
    private function estaDesbloqueado($usuarioId, Subnivel $subnivel, $cursoId): bool
    {
        // Si es el primer subnivel del primer nivel, siempre está desbloqueado
        $nivel = $subnivel->nivel;
        $esPrimerSubnivelPrimerNivel = $nivel->numero === 1 && $subnivel->numero === 1;

        if ($esPrimerSubnivelPrimerNivel) {
            return true;
        }

        // Verificar subnivel anterior en el mismo nivel
        $subnivelAnterior = $nivel->subniveles()
            ->where('numero', '<', $subnivel->numero)
            ->orderBy('numero', 'desc')
            ->first();

        if ($subnivelAnterior) {
            // Si el subnivel anterior requiere cuestionario, verificar si está aprobado
            if ($subnivelAnterior->requiere_cuestionario) {
                $progresoAnterior = ProgresoLeccion::where('usuario_id', $usuarioId)
                    ->where('leccion_id', $subnivelAnterior->id)
                    ->first();

                if (!$progresoAnterior || !$progresoAnterior->cuestionario_aprobado) {
                    return false;
                }
            } else {
                // Si no requiere cuestionario, verificar si está completado
                $progresoAnterior = ProgresoLeccion::where('usuario_id', $usuarioId)
                    ->where('leccion_id', $subnivelAnterior->id)
                    ->where('completado', true)
                    ->first();

                if (!$progresoAnterior) {
                    return false;
                }
            }
        } else {
            // No hay subnivel anterior, verificar nivel anterior
            $nivelAnterior = $nivel->curso->niveles()
                ->where('numero', '<', $nivel->numero)
                ->orderBy('numero', 'desc')
                ->first();

            if ($nivelAnterior) {
                $ultimoSubnivelNivelAnterior = $nivelAnterior->subniveles()
                    ->orderBy('numero', 'desc')
                    ->first();

                if ($ultimoSubnivelNivelAnterior) {
                    if ($ultimoSubnivelNivelAnterior->requiere_cuestionario) {
                        $progresoAnterior = ProgresoLeccion::where('usuario_id', $usuarioId)
                            ->where('leccion_id', $ultimoSubnivelNivelAnterior->id)
                            ->first();

                        if (!$progresoAnterior || !$progresoAnterior->cuestionario_aprobado) {
                            return false;
                        }
                    } else {
                        $progresoAnterior = ProgresoLeccion::where('usuario_id', $usuarioId)
                            ->where('leccion_id', $ultimoSubnivelNivelAnterior->id)
                            ->where('completado', true)
                            ->first();

                        if (!$progresoAnterior) {
                            return false;
                        }
                    }
                }
            }
        }

        return true;
    }

    /**
     * Obtener razón de bloqueo
     */
    private function obtenerRazonBloqueo($usuarioId, Subnivel $subnivel, $cursoId): string
    {
        $nivel = $subnivel->nivel;

        // Verificar subnivel anterior
        $subnivelAnterior = $nivel->subniveles()
            ->where('numero', '<', $subnivel->numero)
            ->orderBy('numero', 'desc')
            ->first();

        if ($subnivelAnterior) {
            if ($subnivelAnterior->requiere_cuestionario) {
                $progresoAnterior = ProgresoLeccion::where('usuario_id', $usuarioId)
                    ->where('leccion_id', $subnivelAnterior->id)
                    ->first();

                if (!$progresoAnterior || !$progresoAnterior->cuestionario_aprobado) {
                    return "Debes aprobar el cuestionario del subnivel anterior: '{$subnivelAnterior->titulo}'";
                }
            } else {
                return "Debes completar el subnivel anterior: '{$subnivelAnterior->titulo}'";
            }
        }

        // Verificar nivel anterior
        $nivelAnterior = $nivel->curso->niveles()
            ->where('numero', '<', $nivel->numero)
            ->orderBy('numero', 'desc')
            ->first();

        if ($nivelAnterior) {
            $ultimoSubnivelNivelAnterior = $nivelAnterior->subniveles()
                ->orderBy('numero', 'desc')
                ->first();

            if ($ultimoSubnivelNivelAnterior) {
                if ($ultimoSubnivelNivelAnterior->requiere_cuestionario) {
                    return "Debes aprobar el cuestionario del último subnivel del nivel anterior: '{$ultimoSubnivelNivelAnterior->titulo}'";
                } else {
                    return "Debes completar el último subnivel del nivel anterior: '{$ultimoSubnivelNivelAnterior->titulo}'";
                }
            }
        }

        return "Debes completar el contenido anterior para desbloquear este subnivel";
    }
}
