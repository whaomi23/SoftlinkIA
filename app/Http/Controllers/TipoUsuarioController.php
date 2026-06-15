<?php
//12
namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    /**
     * Aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de tipos de usuario
     */
    public function index()
    {
        $tipos = TipoUsuario::latest()->get();
        return view('tipos_usuarios.index', compact('tipos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('tipos_usuarios.create');
    }

    /**
     * Guardar un nuevo tipo de usuario
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        TipoUsuario::create($validated);

        return redirect()
            ->route('tipos_usuarios.index')
            ->with('success', 'Tipo de usuario creado correctamente.');
    }

    /**
     * Mostrar un tipo de usuario específico
     */
    public function show(TipoUsuario $tipoUsuario)
    {
        return view('tipos_usuarios.show', compact('tipoUsuario'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(TipoUsuario $tipoUsuario)
    {
        return view('tipos_usuarios.edit', compact('tipoUsuario'));
    }

    /**
     * Actualizar un tipo de usuario
     */
    public function update(Request $request, TipoUsuario $tipoUsuario)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $tipoUsuario->update($validated);

        return redirect()
            ->route('tipos_usuarios.index')
            ->with('success', 'Tipo de usuario actualizado correctamente.');
    }

    /**
     * Eliminar un tipo de usuario
     */
    public function destroy(TipoUsuario $tipoUsuario)
    {
        $tipoUsuario->delete();

        return redirect()
            ->route('tipos_usuarios.index')
            ->with('success', 'Tipo de usuario eliminado correctamente.');
    }
}
