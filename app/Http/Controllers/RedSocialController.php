<?php
//11
namespace App\Http\Controllers;

use App\Models\RedesSociales;
use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    /**
     * Aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de redes sociales
     */
    public function index()
    {
        $redes = RedesSociales::with('usuario')->latest()->get();
        return view('redes_sociales.index', compact('redes'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('redes_sociales.create');
    }

    /**
     * Guardar una nueva red social
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'url'    => 'required|url',
            'status' => 'nullable|in:activo,inactivo',
        ]);

        $validated['usuario_id'] = auth()->id();
        $validated['status'] = $validated['status'] ?? 'activo';

        RedesSociales::create($validated);

        return redirect()
            ->route('redes_sociales.index')
            ->with('success', 'Red social creada correctamente.');
    }

    /**
     * Mostrar una red social específica
     */
    public function show(RedesSociales $redSocial)
    {
        return view('redes_sociales.show', compact('redSocial'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(RedesSociales $redSocial)
    {
        return view('redes_sociales.edit', compact('redSocial'));
    }

    /**
     * Actualizar una red social
     */
    public function update(Request $request, RedesSociales $redSocial)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'url'    => 'required|url',
            'status' => 'nullable|in:activo,inactivo',
        ]);

        $redSocial->update($validated);

        return redirect()
            ->route('redes_sociales.index')
            ->with('success', 'Red social actualizada correctamente.');
    }

    /**
     * Eliminar una red social
     */
    public function destroy(RedesSociales $redSocial)
    {
        $redSocial->delete();

        return redirect()
            ->route('redes_sociales.index')
            ->with('success', 'Red social eliminada correctamente.');
    }
}
