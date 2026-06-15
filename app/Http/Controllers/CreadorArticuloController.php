<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CreadorArticuloController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'solo.creador']);
    }

    /**
     * Mostrar la lista de artículos del creador
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // Obtener solo los artículos del creador actual
        $query = Articulo::with(['autor'])
            ->where('autor_id', $user->id);

        // Aplicar filtros (alineados con Admin)
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->get('categoria'));
        }

        // Filtro por búsqueda de texto
        if ($request->filled('busqueda')) {
            $busqueda = $request->get('busqueda');
            $query->where(function($q) use ($busqueda) {
                $q->where('titulo', 'LIKE', '%' . $busqueda . '%')
                  ->orWhere('subtitulo', 'LIKE', '%' . $busqueda . '%')
                  ->orWhere('contenido', 'LIKE', '%' . $busqueda . '%')
                  ->orWhere('categoria', 'LIKE', '%' . $busqueda . '%');
            });
        }

        $articulos = $query->latest()->paginate(9);

        // Obtener categorías predefinidas (igual que Admin)
        $categorias = ArticuloController::getCategorias();

        // Obtener categorías disponibles para el modal
        $categoriasDisponibles = [
            ['value' => 'Desarrollo Web', 'icon' => 'web', 'color' => 'blue'],
            ['value' => 'Inteligencia Artificial', 'icon' => 'psychology', 'color' => 'purple'],
            ['value' => 'Ciberseguridad', 'icon' => 'security', 'color' => 'red'],
            ['value' => 'Cloud Computing', 'icon' => 'cloud', 'color' => 'cyan'],
            ['value' => 'DevOps', 'icon' => 'settings', 'color' => 'green'],
            ['value' => 'Mobile Development', 'icon' => 'phone_android', 'color' => 'orange'],
            ['value' => 'Data Science', 'icon' => 'analytics', 'color' => 'indigo'],
            ['value' => 'Blockchain', 'icon' => 'account_balance', 'color' => 'yellow'],
            ['value' => 'IoT', 'icon' => 'devices', 'color' => 'teal'],
            ['value' => 'UI/UX Design', 'icon' => 'design_services', 'color' => 'pink'],
            ['value' => 'Gaming', 'icon' => 'sports_esports', 'color' => 'lime'],
            ['value' => 'Redes', 'icon' => 'router', 'color' => 'amber'],
        ];

        return view('creadores.articulos.index', compact('articulos', 'categorias', 'categoriasDisponibles'));
    }

    /**
     * Mostrar formulario para crear un nuevo artículo
     */
    public function create()
    {
        return view('creadores.articulos.create');
    }

    /**
     * Almacenar un nuevo artículo
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

        $validated['autor_id'] = Auth::id();
        
        // Convertir categorías múltiples a una cadena separada por comas
        $validated['categoria'] = implode(', ', $validated['categorias']);
        unset($validated['categorias']);

        // Definir carpeta base para almacenar imágenes del artículo
        $autorId = (int) $validated['autor_id'];
        $categoriaPrincipal = trim(explode(',', $validated['categoria'])[0] ?? 'general');
        $categoriaSlug = Str::slug($categoriaPrincipal ?: 'general');
        $tituloSlug = Str::slug($request->input('titulo', 'articulo'));
        $imagenesDir = "articulos/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
        $bannerDir = "articulos/{$autorId}/{$categoriaSlug}/{$tituloSlug}/banner";

        // Manejar imagen banner subida
        if ($request->hasFile('url_imagen')) {
            $imagePath = $request->file('url_imagen')->store($bannerDir, 'public');
            $validated['url_imagen'] = $imagePath;
        }

        $articulo = Articulo::create($validated);

        // Si es una petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Artículo creado correctamente.',
                'articulo' => $articulo->load('autor')
            ]);
        }

        return redirect()
            ->route('creador.articulos.index')
            ->with('success', 'Artículo creado correctamente.');
    }

    /**
     * Mostrar un artículo específico
     */
    public function show(Articulo $articulo)
    {
        // Incrementar el contador de vistas
        $articulo->incrementarVistas();
        
        $articulo->load('autor');
        
        // Parsear contenido en secciones si existe
        $sections = [];
        if (!empty($articulo->contenido)) {
            $sections = $this->parseContenido($articulo->contenido);
        }
        
        // Calcular tiempo de lectura
        $lecturaMin = $this->calcularTiempoLectura($articulo->contenido);
        
        // Obtener artículos relacionados
        $articulosRelacionados = Articulo::where('status', 'publicado')
            ->where('id', '!=', $articulo->id)
            ->where(function($q) use ($articulo) {
                $categorias = array_map('trim', explode(',', $articulo->categoria));
                foreach ($categorias as $categoria) {
                    $q->orWhere('categoria', 'like', "%{$categoria}%");
                }
            })
            ->with(['autor'])
            ->latest()
            ->take(4)
            ->get();

        return view('creadores.articulos.show', compact('articulo', 'sections', 'lecturaMin', 'articulosRelacionados'));
    }

    /**
     * Mostrar formulario para editar un artículo
     */
    public function edit(Articulo $articulo)
    {
        // Verificar que el artículo pertenece al usuario actual
        if ($articulo->autor_id !== Auth::id()) {
            abort(403, 'No tienes permisos para editar este artículo.');
        }

        // Si es una petición AJAX, devolver JSON
        if (request()->ajax()) {
            return response()->json([
                'titulo' => $articulo->titulo,
                'subtitulo' => $articulo->subtitulo,
                'nivel_dificultad' => $articulo->nivel_dificultad,
                'categoria' => $articulo->categoria ? array_map('trim', explode(',', $articulo->categoria)) : [],
                'contenido' => $articulo->contenido,
                'status' => $articulo->status,
                'url_imagen' => $articulo->url_imagen,
                'url_imagen_banner' => $articulo->url_imagen_banner,
            ]);
        }

        return view('creadores.articulos.edit', compact('articulo'));
    }

    /**
     * Actualizar un artículo
     */
    public function update(Request $request, Articulo $articulo)
    {
        // Verificar que el artículo pertenece al usuario actual
        if ($articulo->autor_id !== Auth::id()) {
            abort(403, 'No tienes permisos para editar este artículo.');
        }

        $validated = $request->validate([
            'titulo'            => 'required|string|max:255',
            'subtitulo'         => 'nullable|string|max:255',
            'nivel_dificultad'  => 'required|in:' . implode(',', Articulo::getNivelesDificultad()),
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

        // Recalcular rutas base (por si cambió el título o categoría)
        $autorId = (int) $articulo->autor_id;
        $categoriaPrincipal = trim(explode(',', $validated['categoria'])[0] ?? 'general');
        $categoriaSlug = Str::slug($categoriaPrincipal ?: 'general');
        $tituloSlug = Str::slug($request->input('titulo', $articulo->titulo));
        $imagenesDir = "articulos/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
        $bannerDir = "articulos/{$autorId}/{$categoriaSlug}/{$tituloSlug}/banner";

        // Solo eliminar imagen banner si se solicita específicamente
        if ($request->boolean('eliminar_imagen_banner') && $articulo->url_imagen) {
            Storage::disk('public')->delete($articulo->url_imagen);
            $validated['url_imagen'] = null;
        }

        // Manejar nueva imagen principal
        if ($request->hasFile('url_imagen')) {
            // Eliminar imagen anterior si existe
            if ($articulo->url_imagen) {
                Storage::disk('public')->delete($articulo->url_imagen);
            }
            $imagePath = $request->file('url_imagen')->store($bannerDir, 'public');
            $validated['url_imagen'] = $imagePath;
        }

        $articulo->update($validated);


        // Si es una petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Artículo actualizado correctamente.',
                'articulo' => $articulo->load('autor')
            ]);
        }

        return redirect()
            ->route('creador.articulos.index')
            ->with('success', 'Artículo actualizado correctamente.');
    }

    /**
     * Eliminar un artículo
     */
    public function destroy(Articulo $articulo)
    {
        // Verificar que el artículo pertenece al usuario actual
        if ($articulo->autor_id !== Auth::id()) {
            abort(403, 'No tienes permisos para eliminar este artículo.');
        }

        // Eliminar todas las imágenes asociadas antes de eliminar el artículo
        $this->deleteArticuloImages($articulo);
        
        $articulo->delete();

        // Si es una petición AJAX, devolver JSON
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Artículo eliminado correctamente.'
            ]);
        }

        return redirect()
            ->route('creador.articulos.index')
            ->with('success', 'Artículo eliminado correctamente.');
    }

    /**
     * Eliminar imagen desde Summernote
     */
    public function deleteImage(Request $request)
    {
        $request->validate([
            'image_url' => 'required|string',
            'articulo_id' => 'nullable|integer|exists:articulos,id',
        ]);

        $autorId = auth()->id();
        $imageUrl = $request->image_url;
        
        // Extraer la ruta del archivo desde la URL
        $parsedUrl = parse_url($imageUrl);
        if (!$parsedUrl || !isset($parsedUrl['path'])) {
            return response()->json(['error' => 'URL de imagen inválida'], 400);
        }
        
        // Remover '/storage/' del path para obtener la ruta relativa
        $relativePath = str_replace('/storage/', '', $parsedUrl['path']);
        
        // Verificar que la imagen pertenece a la estructura de artículos del usuario
        if (!str_starts_with($relativePath, "articulos/{$autorId}/")) {
            // Si hay un artículo específico, verificar permisos
            if ($request->has('articulo_id') && $request->articulo_id) {
                $articulo = Articulo::findOrFail($request->articulo_id);
                if ($articulo->autor_id !== $autorId) {
                    return response()->json(['error' => 'No tienes permisos para eliminar esta imagen'], 403);
                }
            } else {
                return response()->json(['error' => 'No tienes permisos para eliminar esta imagen'], 403);
            }
        }
        
        // Eliminar el archivo físico
        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
            return response()->json(['success' => true, 'message' => 'Imagen eliminada correctamente']);
        } else {
            return response()->json(['error' => 'La imagen no existe'], 404);
        }
    }

    /**
     * Manejar subida de imágenes desde Summernote
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'articulo_id' => 'nullable|integer|exists:articulos,id',
            'categoria' => 'nullable|string|max:120',
            'titulo' => 'nullable|string|max:255',
        ]);

        $autorId = auth()->id();
        
        // Si se proporciona un ID de artículo, usar su estructura
        if ($request->has('articulo_id') && $request->articulo_id) {
            $articulo = Articulo::findOrFail($request->articulo_id);
            
            // Verificar que el artículo pertenezca al usuario actual
            if ($articulo->autor_id !== $autorId) {
                return response()->json(['error' => 'No tienes permisos para subir imágenes a este artículo'], 403);
            }
            
            // Usar la estructura del artículo específico (siempre con "articulos")
            $categoriaPrincipal = trim(explode(',', $articulo->categoria)[0] ?? 'general');
            $categoriaSlug = Str::slug($categoriaPrincipal ?: 'general');
            $tituloSlug = Str::slug($articulo->titulo);
            $imagenesDir = "articulos/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
        } else {
            // Para artículos nuevos, usar la categoría y título enviados desde el frontend
            $categoriaPrincipal = $request->input('categoria', 'general');
            $titulo = $request->input('titulo', 'articulo');
            $categoriaSlug = Str::slug($categoriaPrincipal);
            $tituloSlug = Str::slug($titulo);
            $imagenesDir = "articulos/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
        }

        // Guardar la imagen
        $imagePath = $request->file('image')->store($imagenesDir, 'public');
        
        // Retornar la URL pública de la imagen
        $imageUrl = asset('storage/' . $imagePath);
        
        return response()->json([
            'url' => $imageUrl
        ]);
    }

    /**
     * Eliminar todas las imágenes asociadas a un artículo
     */
    private function deleteArticuloImages(Articulo $articulo)
    {
        // Eliminar imagen principal si existe
        if ($articulo->url_imagen) {
            Storage::disk('public')->delete($articulo->url_imagen);
        }

        // Eliminar la carpeta completa del artículo
        $autorId = (int) $articulo->autor_id;
        $categoriaPrincipal = trim(explode(',', $articulo->categoria)[0] ?? 'general');
        $categoriaSlug = Str::slug($categoriaPrincipal ?: 'general');
        $tituloSlug = Str::slug($articulo->titulo);
        $articuloDir = "articulos/{$autorId}/{$categoriaSlug}/{$tituloSlug}";
        
        // Eliminar toda la carpeta del artículo (incluye banner/ e imagenes/)
        if (Storage::disk('public')->exists($articuloDir)) {
            Storage::disk('public')->deleteDirectory($articuloDir);
        }
        
        // También eliminar carpetas temporales si existen
        $temporalDir = "articulos/{$autorId}/temporal/nuevo-articulo";
        if (Storage::disk('public')->exists($temporalDir)) {
            Storage::disk('public')->deleteDirectory($temporalDir);
        }
        
        // Intentar eliminar carpetas vacías de niveles superiores
        $this->cleanupEmptyDirectories($autorId, $categoriaSlug);
        
        // Log para debugging
        \Log::info('Articulo images and directories deleted (Creator)', [
            'articulo_id' => $articulo->id,
            'articulo_dir' => $articuloDir,
            'temporal_dir' => $temporalDir
        ]);
    }

    /**
     * Limpiar carpetas vacías después de eliminar un artículo
     */
    private function cleanupEmptyDirectories($autorId, $categoriaSlug)
    {
        try {
            // Verificar si la carpeta de categoría está vacía
            $categoriaDir = "articulos/{$autorId}/{$categoriaSlug}";
            if (Storage::disk('public')->exists($categoriaDir)) {
                $files = Storage::disk('public')->allFiles($categoriaDir);
                if (empty($files)) {
                    Storage::disk('public')->deleteDirectory($categoriaDir);
                    \Log::info('Empty category directory deleted (Creator)', ['dir' => $categoriaDir]);
                }
            }
            
            // Verificar si la carpeta del autor está vacía
            $autorDir = "articulos/{$autorId}";
            if (Storage::disk('public')->exists($autorDir)) {
                $files = Storage::disk('public')->allFiles($autorDir);
                if (empty($files)) {
                    Storage::disk('public')->deleteDirectory($autorDir);
                    \Log::info('Empty author directory deleted (Creator)', ['dir' => $autorDir]);
                }
            }
        } catch (\Exception $e) {
            \Log::warning('Error cleaning up empty directories (Creator)', [
                'error' => $e->getMessage(),
                'autor_id' => $autorId,
                'categoria_slug' => $categoriaSlug
            ]);
        }
    }

    /**
     * Parsear contenido del artículo en secciones
     */
    private function parseContenido($contenido)
    {
        $sections = [];
        
        // Buscar secciones marcadas con ## o ###
        preg_match_all('/##\s+(.+?)(?=##|$)/s', $contenido, $matches, PREG_SET_ORDER);
        
        foreach ($matches as $index => $match) {
            $title = trim($match[1]);
            $body = trim($match[0]);
            
            // Extraer título limpio
            $cleanTitle = preg_replace('/^##\s+/', '', $title);
            
            $sections[] = [
                'title' => $cleanTitle,
                'body' => $body,
                'bodyHtml' => $body,
                'imagePath' => null
            ];
        }
        
        return $sections;
    }

    /**
     * Calcular tiempo de lectura estimado
     */
    private function calcularTiempoLectura($contenido)
    {
        $palabras = str_word_count(strip_tags($contenido));
        $minutos = ceil($palabras / 200); // 200 palabras por minuto
        return max(1, $minutos);
    }

    /**
     * Obtener estadísticas de artículos para el dashboard
     */
    public static function getArticulosStats($userId)
    {
        // Estadísticas básicas
        $totalArticulos = Articulo::where('autor_id', $userId)->count();
        $articulosPublicados = Articulo::where('autor_id', $userId)->where('status', 'publicado')->count();
        $articulosBorrador = Articulo::where('autor_id', $userId)->where('status', 'borrador')->count();
        $articulosArchivados = Articulo::where('autor_id', $userId)->where('status', 'archivado')->count();
        $articulosRecientes = Articulo::where('autor_id', $userId)->latest()->take(3)->get();
        
        // Estadísticas por categoría
        $articulosPorCategoria = Articulo::where('autor_id', $userId)
            ->selectRaw('categoria, COUNT(*) as cantidad')
            ->groupBy('categoria')
            ->pluck('cantidad', 'categoria');
        
        // Categorías disponibles para el modal
        $categoriasDisponibles = [
            ['value' => 'Desarrollo Web', 'icon' => 'web', 'color' => 'blue'],
            ['value' => 'Inteligencia Artificial', 'icon' => 'psychology', 'color' => 'purple'],
            ['value' => 'Ciberseguridad', 'icon' => 'security', 'color' => 'red'],
            ['value' => 'Cloud Computing', 'icon' => 'cloud', 'color' => 'cyan'],
            ['value' => 'DevOps', 'icon' => 'settings', 'color' => 'green'],
            ['value' => 'Mobile Development', 'icon' => 'phone_android', 'color' => 'orange'],
            ['value' => 'Data Science', 'icon' => 'analytics', 'color' => 'indigo'],
            ['value' => 'Blockchain', 'icon' => 'account_balance', 'color' => 'yellow'],
            ['value' => 'IoT', 'icon' => 'devices', 'color' => 'teal'],
            ['value' => 'UI/UX Design', 'icon' => 'design_services', 'color' => 'pink'],
            ['value' => 'Gaming', 'icon' => 'sports_esports', 'color' => 'lime'],
            ['value' => 'Redes', 'icon' => 'router', 'color' => 'amber'],
        ];

        return [
            'totalArticulos' => $totalArticulos,
            'articulosPublicados' => $articulosPublicados,
            'articulosBorrador' => $articulosBorrador,
            'articulosArchivados' => $articulosArchivados,
            'articulosRecientes' => $articulosRecientes,
            'articulosPorCategoria' => $articulosPorCategoria,
            'categoriasDisponibles' => $categoriasDisponibles
        ];
    }
}
