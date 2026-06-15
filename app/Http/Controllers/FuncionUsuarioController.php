<?php
//8
namespace App\Http\Controllers;

use App\Models\FuncionUsuario;
use Illuminate\Http\Request;

class FuncionUsuarioController extends Controller
{
    /**
     * Aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de funciones de usuario
     */
    public function index()
    {
        $funciones = FuncionUsuario::with('tipoUsuario')->latest()->get();
        return view('funciones_usuario.index', compact('funciones'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('funciones_usuario.create');
    }

    /**
     * Guardar una nueva función de usuario
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_usuario_id' => 'required|exists:tipos_usuarios,id',
            'funcion'         => 'required|string|max:255',
        ]);

        FuncionUsuario::create($validated);

        return redirect()
            ->route('funciones_usuario.index')
            ->with('success', 'Función creada correctamente.');
    }

    /**
     * Mostrar una función específica
     */
    public function show(FuncionUsuario $funcionUsuario)
    {
        return view('funciones_usuario.show', compact('funcionUsuario'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(FuncionUsuario $funcionUsuario)
    {
        return view('funciones_usuario.edit', compact('funcionUsuario'));
    }

    /**
     * Actualizar una función de usuario
     */
    public function update(Request $request, FuncionUsuario $funcionUsuario)
    {
        $validated = $request->validate([
            'funcion' => 'required|string|max:255',
        ]);

        $funcionUsuario->update($validated);

        return redirect()
            ->route('funciones_usuario.index')
            ->with('success', 'Función actualizada correctamente.');
    }

    /**
     * Eliminar una función de usuario
     */
    public function destroy(FuncionUsuario $funcionUsuario)
    {
        $funcionUsuario->delete();

        return redirect()
            ->route('funciones_usuario.index')
            ->with('success', 'Función eliminada correctamente.');
    }
}
