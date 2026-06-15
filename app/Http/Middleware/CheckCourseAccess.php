<?php

namespace App\Http\Middleware;

use App\Models\Inscripcion;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCourseAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Solo aplicar a usuarios estudiantes (tipo_usuario_id 3 o 4)
        if (!Auth::check() || !in_array(Auth::user()->tipo_usuario_id, [3, 4])) {
            return $next($request);
        }

        // Obtener el curso de la ruta
        $curso = $request->route('curso');

        if ($curso) {
            // Verificar si el usuario tiene acceso al curso
            $inscripcion = Inscripcion::where('usuario_id', Auth::id())
                ->where('curso_id', $curso->id)
                ->where('status', 'activo')
                ->first();

            if (!$inscripcion) {
                return redirect()->route('usuario.cursos.adquiridos')
                    ->with('error', 'No tienes acceso a este curso. Debes comprarlo primero.');
            }
        }

        return $next($request);
    }
}
