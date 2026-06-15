<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
//2
class CategoriaController extends Controller
{
    /**
     * Middleware de autenticación para todas las rutas
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de categorías
     */
    public function index()
    {
        $categorias = Categoria::withCount('cursos')->latest()->paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Guardar una nueva categoría
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Categoría creada correctamente.',
                'categoria' => $categoria
            ]);
        }

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Mostrar una categoría específica
     */
    public function show(Categoria $categoria)
    {
        $categoria->load(['cursos' => function ($query) {
            $query->activo()->with('creador');
        }]);

        return view('categorias.show', compact('categoria'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Categoria $categoria)
    {
        if (request()->ajax()) {
            return response()->json([
                'nombre' => $categoria->nombre,
                'descripcion' => $categoria->descripcion,
            ]);
        }

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Actualizar una categoría
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $categoria->id,
            'descripcion' => 'nullable|string',
        ]);

        $categoria->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Categoría actualizada correctamente.',
                'categoria' => $categoria
            ]);
        }

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Eliminar una categoría
     */
    public function destroy(Categoria $categoria)
    {
        // Verificar si tiene cursos asociados
        if ($categoria->cursos()->count() > 0) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se puede eliminar la categoría porque tiene cursos asociados.'
                ], 422);
            }

            return back()->with('error', 'No se puede eliminar la categoría porque tiene cursos asociados.');
        }

        $categoria->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Categoría eliminada correctamente.'
            ]);
        }

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }

    /**
     * Obtener categorías para select (AJAX)
     */
    public function getCategorias()
    {
        $categorias = Categoria::select('id', 'nombre')->orderBy('nombre')->get();

        return response()->json($categorias);
    }
}
