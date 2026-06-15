<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;

class MarketingController extends Controller
{
    /**
     * Aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware(middleware: 'auth')->except(['catalogo', 'ver']);
    }
    /**
     * Obtener las categorías predefinidas
     */
    public function getCategorias()
    {
        return [
            'Desarrollo Web',
            'Inteligencia Artificial',
            'Ciberseguridad',
            'Cloud Computing',
            'DevOps',
            'Mobile Development',
            'Data Science',
            'Blockchain',
            'IoT',
            'UI/UX Design',
            'Gaming',
            'Redes',
            'Base de Datos',
            'Testing',
            'Microservicios',
            'API Development'
        ];
    }

    /**
     * Mostrar el catálogo de artículos de KIBI
     */
    public function catalogo(Request $request)
    {
        $query = Articulo::where('status', 'publicado')
            ->with(['autor'])
            ->latest();

        // Filtro por categoría si se proporciona
        if ($request->has('categoria') && $request->categoria) {
            $query->where('categoria', 'like', "%{$request->categoria}%");
        }

        // Filtro por búsqueda si se proporciona
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('titulo', 'like', "%{$searchTerm}%")
                  ->orWhere('contenido', 'like', "%{$searchTerm}%")
                  ->orWhere('subtitulo', 'like', "%{$searchTerm}%");
            });
        }

        $articulos = $query->paginate(8);
        $categorias = $this->getCategorias();

        return view('KIBI.admin.articulos.catalogo', compact('articulos', 'categorias'));
    }

    /**
     * Mostrar un artículo específico de KIBI
     */
    public function ver(Articulo $articulo)
    {
        // Verificar que el artículo esté publicado
        if ($articulo->status !== 'publicado') {
            abort(404);
        }

        $articulo->load(['autor']);

        // Calcular tiempo de lectura estimado
        $lecturaMin = $this->calcularTiempoLectura($articulo->contenido);

        // Obtener artículos relacionados (misma categoría, excluyendo el actual)
        $articulosRelacionados = Articulo::where('status', 'publicado')
            ->where('categoria', $articulo->categoria)
            ->where('id', '!=', $articulo->id)
            ->with(['autor'])
            ->latest()
            ->take(6)
            ->get();

        // Si no hay suficientes artículos de la misma categoría, completar con los más recientes
        if ($articulosRelacionados->count() < 6) {
            $necesarios = 6 - $articulosRelacionados->count();
            $adicionales = Articulo::where('status', 'publicado')
                ->where('id', '!=', $articulo->id)
                ->whereNotIn('id', $articulosRelacionados->pluck('id'))
                ->with(['autor'])
                ->latest()
                ->take($necesarios)
                ->get();
            
            $articulosRelacionados = $articulosRelacionados->merge($adicionales);
        }

        return view('KIBI.admin.articulos.ver', compact('articulo', 'lecturaMin', 'articulosRelacionados'));
    }

    /**
     * Mostrar la página de administración de artículos de KIBI
     */
    public function adminIndex(Request $request)
    {
        $query = Articulo::where('autor_id', auth()->id())
            ->with(['autor'])
            ->latest();

        // Filtro por estado si se proporciona
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filtro por categoría si se proporciona
        if ($request->has('categoria') && $request->categoria) {
            $query->where('categoria', 'like', "%{$request->categoria}%");
        }

        // Filtro por búsqueda si se proporciona
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('titulo', 'like', "%{$searchTerm}%")
                  ->orWhere('contenido', 'like', "%{$searchTerm}%")
                  ->orWhere('subtitulo', 'like', "%{$searchTerm}%");
            });
        }

        $articulos = $query->paginate(12);
        $categorias = $this->getCategorias();

        return view('KIBI.admin.articulos.index', compact('articulos', 'categorias'));
    }

    /**
     * Crear un nuevo artículo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo'            => 'required|string|max:255',
            'subtitulo'         => 'nullable|string|max:255',
            'nivel_dificultad'  => 'required|in:' . implode(',', Articulo::getNivelesDificultad()),
            'categorias'        => 'required|array|min:1',
            'categorias.*'      => 'required|string|max:120',
            'contenido'         => 'nullable|string',
            'url_imagen'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url_imagen_banner' => 'nullable|url|max:255',
            'status'            => 'required|in:publicado,borrador,archivado',
        ]);

        $validated['autor_id'] = auth()->id();
        
        // Convertir categorías múltiples a una cadena separada por comas
        $validated['categoria'] = implode(', ', $validated['categorias']);
        unset($validated['categorias']);

        // Manejar imagen subida
        if ($request->hasFile('url_imagen')) {
            $imagePath = $request->file('url_imagen')->store('articulos', 'public');
            $validated['url_imagen'] = $imagePath;
        }

        try {
            $articulo = Articulo::create($validated);
        } catch (\Throwable $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'No se pudo crear el artículo', 'error' => $e->getMessage()], 422);
            }
            throw $e;
        }

        // Si es una petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Artículo creado correctamente.',
                'articulo' => $articulo->load('autor')
            ]);
        }

        return redirect()
            ->route('kibi.articulos.admin')
            ->with('success', 'Artículo creado correctamente.');
    }

    /**
     * Obtener datos de un artículo para edición
     */
    public function edit(Articulo $articulo)
    {
        // Verificar que el usuario sea el autor del artículo
        if ($articulo->autor_id !== auth()->id()) {
            abort(403, 'No tienes permisos para editar este artículo.');
        }

        $articulo->load('autor');
        
        // Convertir categorías de string a array
        $categorias = $articulo->categoria ? array_map('trim', explode(',', $articulo->categoria)) : [];
        
        return response()->json([
            'success' => true,
            'articulo' => $articulo,
            'categorias' => $categorias
        ]);
    }

    /**
     * Actualizar un artículo
     */
    public function update(Request $request, Articulo $articulo)
    {
        // Verificar que el usuario sea el autor del artículo
        if ($articulo->autor_id !== auth()->id()) {
            abort(403, 'No tienes permisos para editar este artículo.');
        }

        $validated = $request->validate([
            'titulo'            => 'required|string|max:255',
            'subtitulo'         => 'nullable|string|max:255',
            'nivel_dificultad'  => 'required|string|max:255',
            'categorias'        => 'required|array|min:1',
            'categorias.*'      => 'required|string|max:120',
            'contenido'         => 'nullable|string',
            'status'            => 'required|in:publicado,borrador,archivado',
            'url_imagen'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url_imagen_banner' => 'nullable|url|max:255',
        ]);
        
        // Convertir categorías múltiples a una cadena separada por comas
        $validated['categoria'] = implode(', ', $validated['categorias']);
        unset($validated['categorias']);

        // Manejar nueva imagen
        if ($request->hasFile('url_imagen')) {
            // Eliminar imagen anterior si existe
            if ($articulo->url_imagen) {
                \Storage::disk('public')->delete($articulo->url_imagen);
            }
            
            $imagePath = $request->file('url_imagen')->store('articulos', 'public');
            $validated['url_imagen'] = $imagePath;
        }

        try {
            $articulo->update($validated);
        } catch (\Throwable $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'No se pudo actualizar el artículo', 'error' => $e->getMessage()], 422);
            }
            throw $e;
        }

        // Si es una petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Artículo actualizado correctamente.',
                'articulo' => $articulo->load('autor')
            ]);
        }

        return redirect()
            ->route('kibi.articulos.admin')
            ->with('success', 'Artículo actualizado correctamente.');
    }

    /**
     * Eliminar un artículo
     */
    public function destroy(Articulo $articulo)
    {
        // Verificar que el usuario sea el autor del artículo
        if ($articulo->autor_id !== auth()->id()) {
            abort(403, 'No tienes permisos para eliminar este artículo.');
        }

        try {
            // Eliminar imagen si existe
            if ($articulo->url_imagen) {
                \Storage::disk('public')->delete($articulo->url_imagen);
            }
            
            $articulo->delete();
        } catch (\Throwable $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'No se pudo eliminar el artículo', 'error' => $e->getMessage()], 422);
            }
            throw $e;
        }

        // Si es una petición AJAX, devolver JSON
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Artículo eliminado correctamente.'
            ]);
        }

        return redirect()
            ->route('kibi.articulos.admin')
            ->with('success', 'Artículo eliminado correctamente.');
    }

    /**
     * Subir imagen desde Summernote
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Obtener información del formulario
            $categoria = $request->input('categoria', 'general');
            $titulo = $request->input('titulo', 'articulo');
            $articuloId = $request->input('articulo_id');

            // Crear estructura de directorios
            $autorId = auth()->id();
            $categoriaSlug = \Str::slug($categoria);
            $tituloSlug = \Str::slug($titulo);
            
            if ($articuloId) {
                // Para artículos existentes, usar su estructura
                $articulo = Articulo::find($articuloId);
                if ($articulo && $articulo->autor_id === auth()->id()) {
                    $categoriaSlug = \Str::slug(explode(',', $articulo->categoria)[0] ?? 'general');
                    $tituloSlug = \Str::slug($articulo->titulo);
                }
            }

            $directory = "articulos/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
            
            // Subir imagen
            $imagePath = $request->file('image')->store($directory, 'public');
            
            return response()->json([
                'success' => true,
                'url' => asset('storage/' . $imagePath)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error al subir la imagen: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar imagen desde Summernote
     */
    public function deleteImage(Request $request)
    {
        try {
            $imageUrl = $request->input('image_url');
            $articuloId = $request->input('articulo_id');

            if (!$imageUrl) {
                return response()->json([
                    'success' => false,
                    'error' => 'URL de imagen no proporcionada'
                ], 400);
            }

            // Extraer la ruta relativa de la URL
            $parsedUrl = parse_url($imageUrl);
            $path = str_replace('/storage/', '', $parsedUrl['path'] ?? '');
            
            if (empty($path)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Ruta de imagen no válida'
                ], 400);
            }

            // Verificar que la imagen pertenece al usuario
            if ($articuloId) {
                $articulo = Articulo::find($articuloId);
                if (!$articulo || $articulo->autor_id !== auth()->id()) {
                    return response()->json([
                        'success' => false,
                        'error' => 'No tienes permisos para eliminar esta imagen'
                    ], 403);
                }
            }

            // Eliminar archivo físico
            if (\Storage::disk('public')->exists($path)) {
                \Storage::disk('public')->delete($path);
            }

            return response()->json([
                'success' => true,
                'message' => 'Imagen eliminada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error al eliminar la imagen: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Calcular tiempo de lectura estimado
     */
    private function calcularTiempoLectura($contenido)
    {
        // Remover HTML tags para contar solo texto
        $texto = strip_tags($contenido);
        $palabras = str_word_count($texto);
        
        // Promedio de 200 palabras por minuto
        $minutos = ceil($palabras / 200);
        
        return max(1, $minutos); // Mínimo 1 minuto
    }
}
