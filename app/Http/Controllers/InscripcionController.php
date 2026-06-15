<?php
//9
namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Curso;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Middleware de autenticación para todas las rutas
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de inscripciones
     */
    public function index(Request $request)
    {
        $query = Inscripcion::with(['usuario', 'curso']);

        // Filtros
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('curso_id') && $request->curso_id) {
            $query->where('curso_id', $request->curso_id);
        }

        if ($request->has('usuario_id') && $request->usuario_id) {
            $query->where('usuario_id', $request->usuario_id);
        }

        $inscripciones = $query->latest()->paginate(15);

        return view('inscripciones.index', compact('inscripciones'));
    }

    /**
     * Inscribir usuario en un curso
     */
    public function store(Request $request, Curso $curso)
    {
        $usuario = auth()->user();

        // Verificar si ya está inscrito activamente
        $inscripcionExistente = Inscripcion::where('usuario_id', $usuario->id)
            ->where('curso_id', $curso->id)
            ->where('status', 'activo')
            ->first();

        if ($inscripcionExistente) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ya estás inscrito en este curso.'
                ], 422);
            }

            return back()->with('error', 'Ya estás inscrito en este curso.');
        }

        // Verificar si hay una inscripción cancelada o completada que se pueda reactivar
        $inscripcionAnterior = Inscripcion::where('usuario_id', $usuario->id)
            ->where('curso_id', $curso->id)
            ->whereIn('status', ['cancelado', 'completado'])
            ->first();

        // Verificar cupos disponibles
        if (!$curso->tieneCuposDisponibles()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'El curso no tiene cupos disponibles.'
                ], 422);
            }

            return back()->with('error', 'El curso no tiene cupos disponibles.');
        }

        // Verificar que el curso esté activo
        if (!$curso->activo) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'El curso no está disponible para inscripciones.'
                ], 422);
            }

            return back()->with('error', 'El curso no está disponible para inscripciones.');
        }

        // Crear o reactivar inscripción
        if ($inscripcionAnterior) {
            // Reactivar inscripción anterior
            $inscripcion = $inscripcionAnterior->reactivar();
        } else {
            // Crear nueva inscripción
            $inscripcion = Inscripcion::create([
                'usuario_id' => $usuario->id,
                'curso_id' => $curso->id,
                'fecha_inscripcion' => now(),
                'progreso' => 0.00,
                'status' => 'activo',
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Te has inscrito exitosamente en el curso.',
                'inscripcion' => $inscripcion->load(['usuario', 'curso'])
            ]);
        }

        return redirect()
            ->route('cursos.ver', $curso)
            ->with('success', 'Te has inscrito exitosamente en el curso.');
    }

    /**
     * Mostrar inscripción específica
     */
    public function show(Inscripcion $inscripcion)
    {
        $inscripcion->load(['usuario', 'curso.lecciones']);
        return view('inscripciones.show', compact('inscripcion'));
    }

    /**
     * Actualizar estado de inscripción
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        $validated = $request->validate([
            'status' => 'required|in:activo,completado,cancelado',
        ]);

        $inscripcion->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Estado de inscripción actualizado correctamente.',
                'inscripcion' => $inscripcion
            ]);
        }

        return back()->with('success', 'Estado de inscripción actualizado correctamente.');
    }

    /**
     * Cancelar inscripción
     */
    public function cancelar(Request $request, Inscripcion $inscripcion)
    {
        // Solo el usuario propietario o un admin puede cancelar
        if ($inscripcion->usuario_id !== auth()->id() && !auth()->user()->isAdmin()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permisos para realizar esta acción.'
                ], 403);
            }

            return back()->with('error', 'No tienes permisos para realizar esta acción.');
        }

        $inscripcion->update(['status' => 'cancelado']);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Inscripción cancelada correctamente.'
            ]);
        }

        return back()->with('success', 'Inscripción cancelada correctamente.');
    }

    /**
     * Eliminar inscripción (solo admin)
     */
    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Inscripción eliminada correctamente.'
            ]);
        }

        return back()->with('success', 'Inscripción eliminada correctamente.');
    }

    /**
     * Mis inscripciones (para usuarios)
     */
    public function misInscripciones(Request $request)
    {
        $usuario = auth()->user();

        $query = $usuario->inscripciones()->with('curso');

        // Filtros
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $inscripciones = $query->latest()->paginate(10);

        return view('inscripciones.mis-inscripciones', compact('inscripciones'));
    }

    /**
     * Obtener estadísticas de inscripciones
     */
    public function estadisticas()
    {
        $estadisticas = [
            'total' => Inscripcion::count(),
            'activas' => Inscripcion::activas()->count(),
            'completadas' => Inscripcion::completadas()->count(),
            'canceladas' => Inscripcion::canceladas()->count(),
            'progreso_promedio' => Inscripcion::activas()->avg('progreso') ?? 0,
        ];

        if (request()->ajax()) {
            return response()->json($estadisticas);
        }

        return view('inscripciones.estadisticas', compact('estadisticas'));
    }
}
