<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ArticuloController extends Controller
{
    /**
     * Obtener las categorías predefinidas
     */
    public static function getCategorias()
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
     * Obtener iconos para niveles de dificultad
     */
    public static function getNivelesDificultadConIconos()
    {
        return [
            ['value' => 'Básico / Introductorio', 'icon' => 'school', 'color' => 'green'],
            ['value' => 'Fácil', 'icon' => 'trending_up', 'color' => 'light-green'],
            ['value' => 'Intermedio bajo', 'icon' => 'keyboard_double_arrow_up', 'color' => 'yellow'],
            ['value' => 'Intermedio', 'icon' => 'equalizer', 'color' => 'orange'],
            ['value' => 'Intermedio alto', 'icon' => 'trending_up', 'color' => 'deep-orange'],
            ['value' => 'Avanzado', 'icon' => 'speed', 'color' => 'red'],
            ['value' => 'Experto', 'icon' => 'star', 'color' => 'purple'],
            ['value' => 'Investigación / Académico', 'icon' => 'science', 'color' => 'indigo'],
            ['value' => 'Crítico / Analítico', 'icon' => 'psychology', 'color' => 'blue-grey'],
            ['value' => 'Práctico / Aplicado', 'icon' => 'engineering', 'color' => 'teal'],
        ];
    }
    /**
     * Aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de artículos
     */
    public function index(Request $request)
    {
        $query = Articulo::with('autor')->latest();

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

        $articulos = $query->paginate(9);
        $categorias = self::getCategorias();
        $nivelesDificultad = self::getNivelesDificultadConIconos();

        // Obtener categorías disponibles para el modal
        $categoriasDisponibles = [
            ['value' => 'Desarrollo Web', 'icon' => 'language', 'color' => 'blue'],
            ['value' => 'Inteligencia Artificial', 'icon' => 'smart_toy', 'color' => 'purple'],
            ['value' => 'Ciberseguridad', 'icon' => 'shield', 'color' => 'red'],
            ['value' => 'Cloud Computing', 'icon' => 'cloud_queue', 'color' => 'cyan'],
            ['value' => 'DevOps', 'icon' => 'build', 'color' => 'green'],
            ['value' => 'Mobile Development', 'icon' => 'smartphone', 'color' => 'orange'],
            ['value' => 'Data Science', 'icon' => 'bar_chart', 'color' => 'indigo'],
            ['value' => 'Blockchain', 'icon' => 'account_balance_wallet', 'color' => 'yellow'],
            ['value' => 'IoT', 'icon' => 'sensors', 'color' => 'teal'],
            ['value' => 'UI/UX Design', 'icon' => 'palette', 'color' => 'pink'],
            ['value' => 'Gaming', 'icon' => 'videogame_asset', 'color' => 'lime'],
            ['value' => 'Redes', 'icon' => 'hub', 'color' => 'amber'],
            ['value' => 'Base de Datos', 'icon' => 'storage', 'color' => 'brown'],
            ['value' => 'Testing', 'icon' => 'bug_report', 'color' => 'deep-orange'],
            ['value' => 'Microservicios', 'icon' => 'view_module', 'color' => 'grey'],
            ['value' => 'API Development', 'icon' => 'api', 'color' => 'light-blue'],
        ];

        return view('admin.articulos.index', compact('articulos', 'categorias', 'categoriasDisponibles', 'nivelesDificultad'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('admin.articulos.create');
    }

    /**
     * Guardar un nuevo artículo
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

        // Definir carpeta base para almacenar imágenes del artículo
        $autorId = (int) ($validated['autor_id'] ?? auth()->id());
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
            ->route('admin.articulos.index')
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
        [$introHtml, $sections, $outroHtml] = $this->parseContenido($articulo->contenido);
        $lecturaMin = $this->computeReadingTime($articulo->contenido);

        // Obtener artículos relacionados
        $articulosRelacionados = Articulo::where('id', '!=', $articulo->id)
            ->where('status', 'publicado')
            ->where(function($query) use ($articulo) {
                $query->where('categoria', $articulo->categoria)
                      ->orWhere('autor_id', $articulo->autor_id);
            })
            ->with('autor')
            ->latest()
            ->limit(5)
            ->get();
        
        return view('admin.articulos.show', compact('articulo', 'introHtml', 'sections', 'outroHtml', 'lecturaMin', 'articulosRelacionados'));

    }

    /**
     * Mostrar formulario de edición (para AJAX)
     */
    public function edit(Articulo $articulo)
    {
        // Si es una petición AJAX, devolver JSON
        if (request()->ajax()) {
            // Separar las categorías si están unidas por comas
            $categorias = $articulo->categoria ? explode(', ', $articulo->categoria) : [];
            return response()->json([
                'titulo' => $articulo->titulo,
                'subtitulo' => $articulo->subtitulo,
                'nivel_dificultad' => $articulo->nivel_dificultad,
                'categoria' => $categorias,
                'contenido' => $articulo->contenido,
                'status' => $articulo->status,
                'url_imagen_banner' => $articulo->url_imagen_banner,
                'url_imagen' => $articulo->url_imagen,
            ]);
        }

        // Fallback para peticiones no-AJAX (mantener compatibilidad)
        return view('admin.articulos.edit', compact('articulo'));
    }

    /**
     * Actualizar un artículo
     */
    public function update(Request $request, Articulo $articulo)
    {
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
        $autorId = (int) ($articulo->autor_id);
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
            ->route('admin.articulos.index')
            ->with('success', 'Artículo actualizado correctamente.');
    }

    /**
     * Eliminar un artículo
     */
    public function destroy(Articulo $articulo)
    {
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
            ->route('admin.articulos.index')
            ->with('success', 'Artículo eliminado correctamente.');
    }

    /**
     * Catálogo (usuarios): lista de artículos publicados con filtros.
     */
    public function catalogo(Request $request)
    {
        $query = Articulo::query()
            ->where('status', 'publicado')
            ->with('autor')
            ->latest();

        // Filtro por categoría
        if ($request->filled('categoria')) {
            $query->where('categoria', 'LIKE', '%' . $request->get('categoria') . '%');
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

        $articulos = $query->paginate(8);
        $categorias = self::getCategorias();
        $nivelesDificultad = self::getNivelesDificultadConIconos();

        return view('usuario-estudiante.articulos.catalogo', compact('articulos', 'categorias', 'nivelesDificultad'));
    }

    /**
     * Ver artículo (usuarios).
     */
    /**
     * Ver artículo (alias para show) - Acepta slug del artículo
     */
    public function ver(Articulo $articulo)
    {
        // Incrementar el contador de vistas
        $articulo->incrementarVistas();
        
        $articulo->load('autor');
        [$introHtml, $sections, $outroHtml] = $this->parseContenido($articulo->contenido);
        $lecturaMin = $this->computeReadingTime($articulo->contenido);

        // Obtener artículos relacionados
        $articulosRelacionados = Articulo::where('id', '!=', $articulo->id)
            ->where('status', 'publicado')
            ->where(function($query) use ($articulo) {
                $query->where('categoria', $articulo->categoria)
                      ->orWhere('autor_id', $articulo->autor_id);
            })
            ->with('autor')
            ->latest()
            ->limit(5)
            ->get();

        return view('usuario-estudiante.articulos.ver', compact('articulo', 'introHtml', 'sections', 'outroHtml', 'lecturaMin', 'articulosRelacionados'));
    }

    private function parseContenido(?string $contenido): array
    {
        $contenido = (string) ($contenido ?? '');
        if (trim($contenido) === '') {
            return ['', [], ''];
        }

        // Separar por encabezados: numerados (1. Título), markdown (## Título) y detectar "Conclusión"
        $lines = preg_split('/\r\n|\r|\n/', $contenido);
        $sections = [];
        $currentTitle = null;
        $currentBody = [];
        $introParts = [];
        $inOutro = false;

        foreach ($lines as $line) {
            $trimmed = trim($line);
            $isConclusion = preg_match('/^conclusi[óo]n\s*:?$/i', $trimmed) === 1;
            $isMarkdown = preg_match('/^##\s+(.*)$/', $line, $m1) === 1;
            $isNumbered = !$isMarkdown && preg_match('/^\s*\d+\.\s+(.*)$/', $line, $m2) === 1;

            if ($isConclusion) {
                // Cerrar sección previa si existe
                if ($currentTitle !== null) {
                    $sections[] = [
                        'title' => $currentTitle,
                        'bodyHtml' => trim(implode("\n", $currentBody)),
                        'imagePath' => null,
                    ];
                    $currentTitle = null;
                    $currentBody = [];
                } else {
                    // si no había título, lo acumulado pertenece al intro
                    if (!empty($currentBody)) {
                        $introParts = $currentBody;
                        $currentBody = [];
                    }
                }
                $inOutro = true;
                continue;
            }

            if ($inOutro) {
                $currentBody[] = $line;
                continue;
            }

            if ($isMarkdown || $isNumbered) {
                $title = $isMarkdown ? trim($m1[1]) : trim($m2[1]);
                if ($currentTitle !== null) {
                    $sections[] = [
                        'title' => $currentTitle,
                        'bodyHtml' => trim(implode("\n", $currentBody)),
                        'imagePath' => null,
                    ];
                } elseif (!empty($currentBody)) {
                    $introParts = $currentBody;
                }
                $currentTitle = $title;
                $currentBody = [];
            } else {
                $currentBody[] = $line;
            }
        }

        if ($inOutro) {
            $outroHtml = trim(implode("\n", $currentBody));
        } else {
            $outroHtml = '';
            if ($currentTitle !== null) {
                $sections[] = [
                    'title' => $currentTitle,
                    'bodyHtml' => trim(implode("\n", $currentBody)),
                    'imagePath' => null,
                ];
            } else {
                $introParts = array_merge($introParts, $currentBody);
            }
        }

        $introHtml = trim(implode("\n", $introParts));

        return [$introHtml, $sections, $outroHtml];
    }

    private function computeReadingTime(?string $contenido): int
    {
        $text = strip_tags((string) ($contenido ?? ''));
        $words = str_word_count($text);
        return max(1, (int) ceil($words / 200));
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
                if ($articulo->autor_id !== $autorId && !auth()->user()->isAdmin()) {
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
            
            // Verificar que el usuario tenga permisos sobre este artículo
            if ($articulo->autor_id !== $autorId && !auth()->user()->isAdmin()) {
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
        \Log::info('Articulo images and directories deleted (Admin)', [
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
                    \Log::info('Empty category directory deleted (Admin)', ['dir' => $categoriaDir]);
                }
            }
            
            // Verificar si la carpeta del autor está vacía
            $autorDir = "articulos/{$autorId}";
            if (Storage::disk('public')->exists($autorDir)) {
                $files = Storage::disk('public')->allFiles($autorDir);
                if (empty($files)) {
                    Storage::disk('public')->deleteDirectory($autorDir);
                    \Log::info('Empty author directory deleted (Admin)', ['dir' => $autorDir]);
                }
            }
        } catch (\Exception $e) {
            \Log::warning('Error cleaning up empty directories (Admin)', [
                'error' => $e->getMessage(),
                'autor_id' => $autorId,
                'categoria_slug' => $categoriaSlug
            ]);
        }
    }
}
