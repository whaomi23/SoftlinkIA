<?php

namespace App\Http\Controllers;

use App\Models\CasoExito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CasoExitoController extends Controller
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
        $this->middleware('auth')->except(['catalogo', 'ver']);
    }

    /**
     * Mostrar lista de casos de éxito
     */
    public function index(Request $request)
    {
        $query = CasoExito::with('autor')->latest();

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

        $casosExito = $query->paginate(9);
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

        return view('admin.casos-exito.index', compact('casosExito', 'categorias', 'categoriasDisponibles', 'nivelesDificultad'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('admin.casos-exito.create');
    }

    /**
     * Guardar un nuevo caso de éxito
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo'            => 'required|string|max:255',
            'subtitulo'         => 'nullable|string|max:255',
            'nivel_dificultad'  => 'required|in:' . implode(',', CasoExito::getNivelesDificultad()),
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

        // Definir carpeta base para almacenar imágenes del caso de éxito
        $autorId = (int) ($validated['autor_id'] ?? auth()->id());
        $categoriaPrincipal = trim(explode(',', $validated['categoria'])[0] ?? 'general');
        $categoriaSlug = Str::slug($categoriaPrincipal ?: 'general');
        $tituloSlug = Str::slug($request->input('titulo', 'caso-exito'));
        $imagenesDir = "casos-exito/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
        $bannerDir = "casos-exito/{$autorId}/{$categoriaSlug}/{$tituloSlug}/banner";

        // Manejar imagen banner subida
        if ($request->hasFile('url_imagen')) {
            $imagePath = $request->file('url_imagen')->store($bannerDir, 'public');
            $validated['url_imagen'] = $imagePath;
        }

        try {
            $casoExito = CasoExito::create($validated);
        } catch (\Throwable $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'No se pudo crear el caso de éxito', 'error' => $e->getMessage()], 422);
            }
            throw $e;
        }

        // Si es una petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Caso de éxito creado correctamente.',
                'casoExito' => $casoExito->load('autor')
            ]);
        }

        return redirect()
            ->route('admin.casos-exito.index')
            ->with('success', 'Caso de éxito creado correctamente.');
    }

    /**
     * Mostrar un caso de éxito específico
     */
    public function show(CasoExito $casoExito)
    {
        $casoExito->load('autor');
        [$introHtml, $sections, $outroHtml] = $this->parseContenido($casoExito->contenido);
        $lecturaMin = $this->computeReadingTime($casoExito->contenido);

        // Obtener casos de éxito relacionados
        $casosExitoRelacionados = CasoExito::where('id', '!=', $casoExito->id)
            ->where('status', 'publicado')
            ->where(function($query) use ($casoExito) {
                $query->where('categoria', $casoExito->categoria)
                      ->orWhere('autor_id', $casoExito->autor_id);
            })
            ->with('autor')
            ->latest()
            ->limit(5)
            ->get();
        
        return view('admin.casos-exito.show', compact('casoExito', 'introHtml', 'sections', 'outroHtml', 'lecturaMin', 'casosExitoRelacionados'));
    }

    /**
     * Mostrar formulario de edición (para AJAX)
     */
    public function edit(CasoExito $casoExito)
    {
        // Si es una petición AJAX, devolver JSON
        if (request()->ajax()) {
            // Separar las categorías si están unidas por comas
            $categorias = $casoExito->categoria ? explode(', ', $casoExito->categoria) : [];
            return response()->json([
                'titulo' => $casoExito->titulo,
                'subtitulo' => $casoExito->subtitulo,
                'nivel_dificultad' => $casoExito->nivel_dificultad,
                'categoria' => $categorias,
                'contenido' => $casoExito->contenido,
                'status' => $casoExito->status,
                'url_imagen_banner' => $casoExito->url_imagen_banner,
                'url_imagen' => $casoExito->url_imagen,
            ]);
        }

        // Fallback para peticiones no-AJAX (mantener compatibilidad)
        return view('admin.casos-exito.edit', compact('casoExito'));
    }

    /**
     * Actualizar un caso de éxito
     */
    public function update(Request $request, CasoExito $casoExito)
    {
        $validated = $request->validate([
            'titulo'            => 'required|string|max:255',
            'subtitulo'         => 'nullable|string|max:255',
            'nivel_dificultad'  => 'required|in:' . implode(',', CasoExito::getNivelesDificultad()),
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
        $autorId = (int) ($casoExito->autor_id);
        $categoriaPrincipal = trim(explode(',', $validated['categoria'])[0] ?? 'general');
        $categoriaSlug = Str::slug($categoriaPrincipal ?: 'general');
        $tituloSlug = Str::slug($request->input('titulo', $casoExito->titulo));
        $imagenesDir = "casos-exito/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
        $bannerDir = "casos-exito/{$autorId}/{$categoriaSlug}/{$tituloSlug}/banner";

        // Solo eliminar imagen banner si se solicita específicamente
        if ($request->boolean('eliminar_imagen_banner') && $casoExito->url_imagen) {
            Storage::disk('public')->delete($casoExito->url_imagen);
            $validated['url_imagen'] = null;
        }

        // Manejar nueva imagen principal
        if ($request->hasFile('url_imagen')) {
            // Eliminar imagen anterior si existe
            if ($casoExito->url_imagen) {
                Storage::disk('public')->delete($casoExito->url_imagen);
            }
            $imagePath = $request->file('url_imagen')->store($bannerDir, 'public');
            $validated['url_imagen'] = $imagePath;
        }

        $casoExito->update($validated);

        // Si es una petición AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Caso de éxito actualizado correctamente.',
                'casoExito' => $casoExito->load('autor')
            ]);
        }

        return redirect()
            ->route('admin.casos-exito.index')
            ->with('success', 'Caso de éxito actualizado correctamente.');
    }

    /**
     * Eliminar un caso de éxito
     */
    public function destroy(CasoExito $casoExito)
    {
        // Eliminar todas las imágenes asociadas antes de eliminar el caso de éxito
        $this->deleteCasoExitoImages($casoExito);

        $casoExito->delete();

        // Si es una petición AJAX, devolver JSON
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Caso de éxito eliminado correctamente.'
            ]);
        }

        return redirect()
            ->route('admin.casos-exito.index')
            ->with('success', 'Caso de éxito eliminado correctamente.');
    }

    /**
     * Catálogo (usuarios): lista de casos de éxito publicados con filtros.
     */
    public function catalogo(Request $request)
    {
        $query = CasoExito::query()
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

        $casosExito = $query->paginate(12);
        $categorias = self::getCategorias();
        $nivelesDificultad = self::getNivelesDificultadConIconos();

        return view('usuario-estudiante.casos-exito.catalogo', compact('casosExito', 'categorias', 'nivelesDificultad'));
    }

    /**
     * Ver caso de éxito (alias para show) - Acepta slug del caso de éxito
     */
    public function ver(CasoExito $casoExito)
    {
        $casoExito->load('autor');
        [$introHtml, $sections, $outroHtml] = $this->parseContenido($casoExito->contenido);
        $lecturaMin = $this->computeReadingTime($casoExito->contenido);

        // Obtener casos de éxito relacionados
        $casosExitoRelacionados = CasoExito::where('id', '!=', $casoExito->id)
            ->where('status', 'publicado')
            ->where(function($query) use ($casoExito) {
                $query->where('categoria', $casoExito->categoria)
                      ->orWhere('autor_id', $casoExito->autor_id);
            })
            ->with('autor')
            ->latest()
            ->limit(5)
            ->get();

        return view('usuario-estudiante.casos-exito.ver', compact('casoExito', 'introHtml', 'sections', 'outroHtml', 'lecturaMin', 'casosExitoRelacionados'));
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
            'caso_exito_id' => 'nullable|integer|exists:casos_exito,id',
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
        
        // Verificar que la imagen pertenece a la estructura de casos de éxito del usuario
        if (!str_starts_with($relativePath, "casos-exito/{$autorId}/")) {
            // Si hay un caso de éxito específico, verificar permisos
            if ($request->has('caso_exito_id') && $request->caso_exito_id) {
                $casoExito = CasoExito::findOrFail($request->caso_exito_id);
                if ($casoExito->autor_id !== $autorId && !auth()->user()->isAdmin()) {
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
            'caso_exito_id' => 'nullable|integer|exists:casos_exito,id',
            'categoria' => 'nullable|string|max:120',
            'titulo' => 'nullable|string|max:255',
        ]);

        $autorId = auth()->id();
        
        // Si se proporciona un ID de caso de éxito, usar su estructura
        if ($request->has('caso_exito_id') && $request->caso_exito_id) {
            $casoExito = CasoExito::findOrFail($request->caso_exito_id);
            
            // Verificar que el usuario tenga permisos sobre este caso de éxito
            if ($casoExito->autor_id !== $autorId && !auth()->user()->isAdmin()) {
                return response()->json(['error' => 'No tienes permisos para subir imágenes a este caso de éxito'], 403);
            }
            
            // Usar la estructura del caso de éxito específico (siempre con "casos-exito")
            $categoriaPrincipal = trim(explode(',', $casoExito->categoria)[0] ?? 'general');
            $categoriaSlug = Str::slug($categoriaPrincipal ?: 'general');
            $tituloSlug = Str::slug($casoExito->titulo);
            $imagenesDir = "casos-exito/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
        } else {
            // Para casos de éxito nuevos, usar la categoría y título enviados desde el frontend
            $categoriaPrincipal = $request->input('categoria', 'general');
            $titulo = $request->input('titulo', 'caso-exito');
            $categoriaSlug = Str::slug($categoriaPrincipal);
            $tituloSlug = Str::slug($titulo);
            $imagenesDir = "casos-exito/{$autorId}/{$categoriaSlug}/{$tituloSlug}/imagenes";
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
     * Eliminar todas las imágenes asociadas a un caso de éxito
     */
    private function deleteCasoExitoImages(CasoExito $casoExito)
    {
        // Eliminar imagen principal si existe
        if ($casoExito->url_imagen) {
            Storage::disk('public')->delete($casoExito->url_imagen);
        }

        // Eliminar la carpeta completa del caso de éxito
        $autorId = (int) $casoExito->autor_id;
        $categoriaPrincipal = trim(explode(',', $casoExito->categoria)[0] ?? 'general');
        $categoriaSlug = Str::slug($categoriaPrincipal ?: 'general');
        $tituloSlug = Str::slug($casoExito->titulo);
        $casoExitoDir = "casos-exito/{$autorId}/{$categoriaSlug}/{$tituloSlug}";
        
        // Eliminar toda la carpeta del caso de éxito (incluye banner/ e imagenes/)
        if (Storage::disk('public')->exists($casoExitoDir)) {
            Storage::disk('public')->deleteDirectory($casoExitoDir);
        }
        
        // También eliminar carpetas temporales si existen
        $temporalDir = "casos-exito/{$autorId}/temporal/nuevo-caso-exito";
        if (Storage::disk('public')->exists($temporalDir)) {
            Storage::disk('public')->deleteDirectory($temporalDir);
        }
        
        // Intentar eliminar carpetas vacías de niveles superiores
        $this->cleanupEmptyDirectories($autorId, $categoriaSlug);
        
        // Log para debugging
        \Log::info('Caso de éxito images and directories deleted (Admin)', [
            'caso_exito_id' => $casoExito->id,
            'caso_exito_dir' => $casoExitoDir,
            'temporal_dir' => $temporalDir
        ]);
    }

    /**
     * Limpiar carpetas vacías después de eliminar un caso de éxito
     */
    private function cleanupEmptyDirectories($autorId, $categoriaSlug)
    {
        try {
            // Verificar si la carpeta de categoría está vacía
            $categoriaDir = "casos-exito/{$autorId}/{$categoriaSlug}";
            if (Storage::disk('public')->exists($categoriaDir)) {
                $files = Storage::disk('public')->allFiles($categoriaDir);
                if (empty($files)) {
                    Storage::disk('public')->deleteDirectory($categoriaDir);
                    \Log::info('Empty category directory deleted (Admin)', ['dir' => $categoriaDir]);
                }
            }
            
            // Verificar si la carpeta del autor está vacía
            $autorDir = "casos-exito/{$autorId}";
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
