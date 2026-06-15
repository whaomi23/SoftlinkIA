<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioCursoController extends Controller
{
    /**
     * Mostrar cursos adquiridos por el usuario
     */
    public function cursosAdquiridos()
    {
        $cursosAdquiridos = Inscripcion::with('curso.categoria')
            ->where('usuario_id', Auth::id())
            ->where('status', 'activo')
            ->orderBy('fecha_inscripcion', 'desc')
            ->get();

        return view('usuario-estudiante.cursos-adquiridos', compact('cursosAdquiridos'));
    }

    /**
     * Mostrar un curso específico (solo si está adquirido)
     */
    public function show(Curso $curso)
    {
        // Verificar que el usuario tenga acceso al curso
        $inscripcion = Inscripcion::where('usuario_id', Auth::id())
            ->where('curso_id', $curso->id)
            ->where('status', 'activo')
            ->first();

        if (!$inscripcion) {
            return redirect()->route('usuario.cursos.adquiridos')
                ->with('error', 'No tienes acceso a este curso. Debes comprarlo primero.');
        }

        // Cargar el curso con sus niveles y subniveles
        $curso->load(['niveles.subniveles', 'categoria']);

        return view('usuario-estudiante.cursos.show', compact('curso'));
    }
}
