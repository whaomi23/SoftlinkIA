<?php
//6
namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use App\Models\Nivel;
use App\Models\Subnivel;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CursoController extends Controller
{
    /**
     * Middleware de autenticación para todas las rutas
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de cursos
     */
    public function index(Request $request)
    {
        $query = Curso::with(['creador', 'categoria']);

        // Filtros
        if ($request->has('nivel') && $request->nivel) {
            $query->where('nivel', $request->nivel);
        }

        if ($request->has('categoria_id') && $request->categoria_id) {
            $query->where('categoria_id', $request->categoria_id);
        }

        $cursos = $query->latest()->paginate(12);
        $categorias = Categoria::orderBy('nombre')->get();

        return view('admin.cursos.create', compact('cursos', 'categorias'));
    }

    /**
     * Mostrar catálogo de cursos
     */
    public function catalogo(Request $request)
    {
        $query = Curso::where('activo', true)
            ->with(['creador', 'categoria', 'niveles']);

        // Filtros
        if ($request->has('nivel') && $request->nivel) {
            $query->where('nivel', $request->nivel);
        }

        if ($request->has('categoria_id') && $request->categoria_id) {
            $query->where('categoria_id', $request->categoria_id);
        }

        if ($request->has('precio_max') && $request->precio_max) {
            $query->where('precio', '<=', $request->precio_max);
        }

        // Búsqueda por título/descripcion
        if ($request->has('q') && trim($request->q) !== '') {
            $q = trim($request->q);
            $query->where(function ($sub) use ($q) {
                $sub->where('titulo', 'like', "%$q%")
                    ->orWhere('descripcion', 'like', "%$q%");
            });
        }

        // Ordenamiento
        if ($request->has('orden')) {
            switch ($request->orden) {
                case 'antiguos':
                    $query->oldest();
                    break;
                case 'precio_asc':
                    $query->orderBy('precio', 'asc');
                    break;
                case 'precio_desc':
                    $query->orderBy('precio', 'desc');
                    break;
                case 'duracion_asc':
                    $query->orderBy('duracion_horas', 'asc');
                    break;
                case 'duracion_desc':
                    $query->orderBy('duracion_horas', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        $cursos = $query->paginate(9);
        $categorias = Categoria::orderBy('nombre')->get();

        // Si el usuario es admin, mostrar vista de admin
        if (auth()->user()->isAdmin()) {
            return view('admin.cursos.show.card', compact('cursos', 'categorias'));
        }

        // Para usuarios normales, mostrar vista pública
        return view('usuario-estudiante.cursos.catalogo', compact('cursos', 'categorias'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('admin.cursos.create', compact('categorias'));
    }

    /**
     * Guardar un nuevo curso
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo'         => 'required|string|max:255',
            'descripcion'    => 'required|string',
            'url_imagen'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id'   => 'nullable|exists:categorias,id',
            'precio'         => 'required|numeric|min:0',
            'duracion_horas' => 'nullable|integer|min:1',
            'nivel'          => 'required|in:principiante,intermedio,avanzado',
            'activo'         => 'boolean',
            'cupo_maximo'    => 'nullable|integer|min:1',
            'fecha_inicio'   => 'nullable|date',
            'fecha_fin'      => 'nullable|date|after_or_equal:fecha_inicio',
            'slug'           => 'nullable|string|max:255',
            'requisitos'     => 'nullable|string',
            // Campos del creador
            'creador_nombre' => 'required|string|max:255',
            'creador_apellido' => 'required|string|max:255',
            'creador_profesion' => 'nullable|string|max:255',
            'creador_descripcion' => 'nullable|string',
            // Campos de redes sociales
            'facebook_usuario' => 'nullable|string|max:255',
            'twitter_usuario' => 'nullable|string|max:255',
            'linkedin_usuario' => 'nullable|string|max:255',
            'instagram_usuario' => 'nullable|string|max:255',
            'vk_usuario' => 'nullable|string|max:255',
            'tiktok_usuario' => 'nullable|string|max:255',
            // Campos de niveles y subniveles
            'niveles'        => 'nullable|array',
            'niveles.*.numero' => 'required|integer|min:1',
            'niveles.*.titulo' => 'required|string|max:255',
            'niveles.*.descripcion' => 'nullable|string',
            'niveles.*.subniveles' => 'nullable|array',
            'niveles.*.subniveles.*.titulo' => 'nullable|string|max:255',
            'niveles.*.subniveles.*.descripcion' => 'nullable|string',
            'niveles.*.subniveles.*.url_iframe' => 'nullable|string',
            'niveles.*.subniveles.*.url_video' => 'nullable|string',
            'niveles.*.subniveles.*.video_archivo' => 'nullable|file|mimes:mp4,avi,mov,wmv,webm|max:512000',
            'niveles.*.subniveles.*.usar_iframe' => 'nullable|boolean',
            'niveles.*.subniveles.*.usar_url_video' => 'nullable|boolean',
            'niveles.*.subniveles.*.usar_video_archivo' => 'nullable|boolean',
            'niveles.*.subniveles.*.recurso' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip,rar|max:51200',
        ]);

        // Manejar la imagen
        if ($request->hasFile('url_imagen')) {
            $imagePath = $request->file('url_imagen')->store('cursos', 'public');
            $validated['url_imagen'] = $imagePath;
        }

        // Generar slug si no se proporciona
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['titulo']);
        }

        // Verificar que el slug sea único
        $counter = 1;
        $originalSlug = $validated['slug'];
        while (Curso::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['creador_id'] = auth()->id();
        $validated['activo'] = $request->has('activo');

        // Crear el curso
        $curso = Curso::create($validated);

        // Procesar niveles y subniveles
        if ($request->has('niveles') && is_array($request->niveles)) {
            foreach ($request->niveles as $nivelData) {
                // Crear el nivel
                $nivel = Nivel::create([
                    'curso_id' => $curso->id,
                    'numero' => $nivelData['numero'],
                    'titulo' => $nivelData['titulo'],
                    'descripcion' => $nivelData['descripcion'] ?? null,
                ]);

                // Procesar subniveles
                if (isset($nivelData['subniveles']) && is_array($nivelData['subniveles'])) {
                    foreach ($nivelData['subniveles'] as $subnivelIndex => $subnivelData) {
                        $subnivelInfo = [
                            'nivel_id' => $nivel->id,
                            'numero' => $subnivelIndex + 1,
                            'titulo' => $subnivelData['titulo'] ?? null,
                            'descripcion' => $subnivelData['descripcion'] ?? null,
                            'url_iframe' => $subnivelData['url_iframe'] ?? null,
                            'url_video' => $subnivelData['url_video'] ?? null,
                            'usar_iframe' => isset($subnivelData['usar_iframe']) ? (bool)$subnivelData['usar_iframe'] : false,
                            'usar_url_video' => isset($subnivelData['usar_url_video']) ? (bool)$subnivelData['usar_url_video'] : false,
                            'usar_video_archivo' => isset($subnivelData['usar_video_archivo']) ? (bool)$subnivelData['usar_video_archivo'] : false,
                            'video_archivo_path' => null,
                            'video_archivo_nombre' => null,
                            'video_archivo_tipo' => null,
                            'video_archivo_tamaño' => null,
                            'recurso_path' => null,
                            'recurso_nombre' => null,
                            'recurso_tipo' => null,
                        ];

                        // Manejar archivo de video del subnivel
                        if (isset($subnivelData['video_archivo']) && $subnivelData['video_archivo']->isValid()) {
                            $videoPath = $subnivelData['video_archivo']->store('videos-subniveles', 'public');
                            $subnivelInfo['video_archivo_path'] = $videoPath;
                            $subnivelInfo['video_archivo_nombre'] = $subnivelData['video_archivo']->getClientOriginalName();
                            $subnivelInfo['video_archivo_tipo'] = $subnivelData['video_archivo']->getClientMimeType();
                            $subnivelInfo['video_archivo_tamaño'] = $subnivelData['video_archivo']->getSize();
                        }

                        // Manejar archivo de recurso del subnivel
                        if (isset($subnivelData['recurso']) && $subnivelData['recurso']->isValid()) {
                            $recursoPath = $subnivelData['recurso']->store('recursos-subniveles', 'public');
                            $subnivelInfo['recurso_path'] = $recursoPath;
                            $subnivelInfo['recurso_nombre'] = $subnivelData['recurso']->getClientOriginalName();
                            $subnivelInfo['recurso_tipo'] = $subnivelData['recurso']->getClientOriginalExtension();
                        }

                        Subnivel::create($subnivelInfo);
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Curso creado correctamente.',
            'curso' => [
                'id' => $curso->id,
                'titulo' => $curso->titulo,
                'descripcion' => $curso->descripcion,
                'precio' => $curso->precio,
                'duracion_horas' => $curso->duracion_horas,
                'nivel' => $curso->nivel,
                'activo' => $curso->activo,
                'cupo_maximo' => $curso->cupo_maximo,
                'fecha_inicio' => $curso->fecha_inicio ? $curso->fecha_inicio->format('d/m/Y') : null,
                'fecha_fin' => $curso->fecha_fin ? $curso->fecha_fin->format('d/m/Y') : null,
                'slug' => $curso->slug,
                'requisitos' => $curso->requisitos,
                'url_imagen' => $curso->url_imagen,
                'creador_nombre' => $curso->creador_nombre,
                'creador_apellido' => $curso->creador_apellido,
                'creador_profesion' => $curso->creador_profesion,
                'creador_descripcion' => $curso->creador_descripcion,
                'facebook_usuario' => $curso->facebook_usuario,
                'twitter_usuario' => $curso->twitter_usuario,
                'linkedin_usuario' => $curso->linkedin_usuario,
                'instagram_usuario' => $curso->instagram_usuario,
                'vk_usuario' => $curso->vk_usuario,
                'tiktok_usuario' => $curso->tiktok_usuario,
                'creador' => [
                    'name' => $curso->creador->name,
                    'apellido_paterno' => $curso->creador->apellido_paterno,
                    'apellido_materno' => $curso->creador->apellido_materno,
                ],
                'created_at' => $curso->created_at->format('d/m/Y H:i'),
                'updated_at' => $curso->updated_at->format('d/m/Y H:i')
            ]
        ]);
    }

    /**
     * Generar un slug único basado en el título
     */
    private function generateUniqueSlug($titulo)
    {
        $slug = Str::slug($titulo);
        $originalSlug = $slug;
        $counter = 1;

        while (Curso::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Mostrar un curso específico
     */
    public function show(Curso $curso)
    {
        $curso->load(['creador', 'niveles.subniveles' => function($query) {
            $query->orderBy('numero');
        }]);
        return view('admin.cursos.show', compact('curso'));
    }

    /**
     * Mostrar curso
     */
    public function ver($idOrSlug)
    {
        $curso = Curso::where('id', $idOrSlug)
            ->orWhere('slug', $idOrSlug)
            ->with(['creador', 'niveles.subniveles' => function($query) {
                $query->orderBy('numero');
            }])
            ->firstOrFail();

        // Verificar si el usuario está inscrito
        $inscripcion = null;
        if (auth()->check()) {
            $inscripcion = $curso->inscripciones()
                ->where('usuario_id', auth()->id())
                ->whereIn('status', ['activo', 'completado'])
                ->first();

            // Si está inscrito, calcular progreso actualizado
            if ($inscripcion) {
                // Actualizar progreso en la base de datos si es necesario
                $progresoCalculado = $inscripcion->calcularProgreso();
                if ($inscripcion->progreso != $progresoCalculado) {
                    $inscripcion->update(['progreso' => $progresoCalculado]);
                    $inscripcion->progreso = $progresoCalculado;
                }
            }
        }

        // Definir colores según el nivel del curso
        $nivelColor = match($curso->nivel) {
            'principiante' => 'bg-green-500/20 border-green-400/30 text-green-300',
            'intermedio' => 'bg-yellow-500/20 border-yellow-400/30 text-yellow-300',
            'avanzado' => 'bg-purple-500/20 border-purple-400/30 text-purple-300',
            default => 'bg-gray-500/20 border-gray-400/30 text-gray-300'
        };

        $nivelGradient = match($curso->nivel) {
            'principiante' => 'bg-gradient-to-r from-green-500 to-emerald-600',
            'intermedio' => 'bg-gradient-to-r from-yellow-500 to-orange-600',
            'avanzado' => 'bg-gradient-to-r from-purple-500 to-indigo-600',
            default => 'bg-gradient-to-r from-gray-500 to-gray-600'
        };

        // Si el usuario es admin, mostrar vista de admin
        if (auth()->user()->isAdmin()) {
            return view('admin.cursos.show', compact('curso', 'inscripcion', 'nivelColor', 'nivelGradient'));
        }

        // Para usuarios normales, mostrar vista pública
        return view('usuario-estudiante.cursos.ver', compact('curso', 'inscripcion', 'nivelColor', 'nivelGradient'));
    }

    /**
     * Obtener solo la sección de progreso para actualización AJAX
     */
    public function progresoSection($id)
    {
        $curso = Curso::with(['niveles.subniveles' => function($query) {
            $query->orderBy('numero');
        }])->findOrFail($id);

        // Verificar acceso
        if (!Auth::check()) {
            abort(403, 'Debes estar autenticado para ver este curso.');
        }

        // Verificar inscripción
        $inscripcion = Inscripcion::where('usuario_id', Auth::id())
            ->where('curso_id', $curso->id)
            ->where('status', 'activo')
            ->first();

        if (!$inscripcion) {
            abort(403, 'No estás inscrito en este curso.');
        }

        return view('usuario-estudiante.cursos.partials.progreso-section', compact('curso'));
    }

    /**
     * Mostrar formulario de edición (para AJAX)
     */
    public function edit(Curso $curso)
    {
        return response()->json([
            'titulo' => $curso->titulo,
            'descripcion' => $curso->descripcion,
            'precio' => $curso->precio,
            'duracion_horas' => $curso->duracion_horas,
            'nivel' => $curso->nivel,
            'activo' => $curso->activo,
            'cupo_maximo' => $curso->cupo_maximo,
            'fecha_inicio' => $curso->fecha_inicio ? $curso->fecha_inicio->format('Y-m-d') : null,
            'fecha_fin' => $curso->fecha_fin ? $curso->fecha_fin->format('Y-m-d') : null,
            'slug' => $curso->slug,
            'requisitos' => $curso->requisitos,
            'creador_nombre' => $curso->creador_nombre,
            'creador_apellido' => $curso->creador_apellido,
            'creador_profesion' => $curso->creador_profesion,
            'creador_descripcion' => $curso->creador_descripcion,
            'facebook_usuario' => $curso->facebook_usuario,
            'twitter_usuario' => $curso->twitter_usuario,
            'linkedin_usuario' => $curso->linkedin_usuario,
            'instagram_usuario' => $curso->instagram_usuario,
            'vk_usuario' => $curso->vk_usuario,
            'tiktok_usuario' => $curso->tiktok_usuario,
            'total_niveles' => $curso->niveles()->count(),
        ]);
    }

    /**
     * Actualizar un curso
     */
    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'titulo'         => 'required|string|max:255',
            'descripcion'    => 'required|string',
            'url_imagen'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id'   => 'nullable|exists:categorias,id',
            'precio'         => 'required|numeric|min:0',
            'duracion_horas' => 'nullable|integer|min:1',
            'nivel'          => 'required|in:principiante,intermedio,avanzado',
            'activo'         => 'boolean',
            'cupo_maximo'    => 'nullable|integer|min:1',
            'fecha_inicio'   => 'nullable|date',
            'fecha_fin'      => 'nullable|date|after_or_equal:fecha_inicio',
            'slug'           => 'nullable|string|max:255',
            'requisitos'     => 'nullable|string',
            // Campos del creador
            'creador_nombre' => 'required|string|max:255',
            'creador_apellido' => 'required|string|max:255',
            'creador_profesion' => 'nullable|string|max:255',
            'creador_descripcion' => 'nullable|string',
            // Campos de redes sociales
            'facebook_usuario' => 'nullable|string|max:255',
            'twitter_usuario' => 'nullable|string|max:255',
            'linkedin_usuario' => 'nullable|string|max:255',
            'instagram_usuario' => 'nullable|string|max:255',
            'vk_usuario' => 'nullable|string|max:255',
            'tiktok_usuario' => 'nullable|string|max:255',
            // Campos de niveles y subniveles
            'niveles'        => 'nullable|array',
            'niveles.*.numero' => 'required|integer|min:1',
            'niveles.*.titulo' => 'required|string|max:255',
            'niveles.*.descripcion' => 'nullable|string',
            'niveles.*.subniveles' => 'nullable|array',
            'niveles.*.subniveles.*.titulo' => 'nullable|string|max:255',
            'niveles.*.subniveles.*.descripcion' => 'nullable|string',
            'niveles.*.subniveles.*.url_iframe' => 'nullable|string',
            'niveles.*.subniveles.*.url_video' => 'nullable|string',
            'niveles.*.subniveles.*.video_archivo' => 'nullable|file|mimes:mp4,avi,mov,wmv,webm|max:512000',
            'niveles.*.subniveles.*.usar_iframe' => 'nullable|boolean',
            'niveles.*.subniveles.*.usar_url_video' => 'nullable|boolean',
            'niveles.*.subniveles.*.usar_video_archivo' => 'nullable|boolean',
            'niveles.*.subniveles.*.recurso' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip,rar|max:51200',
        ]);

        // Manejar la imagen
        if ($request->hasFile('url_imagen')) {
            // Eliminar imagen anterior si existe
            if ($curso->url_imagen) {
                Storage::disk('public')->delete($curso->url_imagen);
            }

            $imagePath = $request->file('url_imagen')->store('cursos', 'public');
            $validated['url_imagen'] = $imagePath;
        } elseif ($request->has('eliminar_imagen') && $request->eliminar_imagen) {
            // Eliminar imagen si se solicita
            if ($curso->url_imagen) {
                Storage::disk('public')->delete($curso->url_imagen);
            }
            $validated['url_imagen'] = null;
        }

        // Generar slug si no se proporciona o si ya existe
        if (empty($validated['slug'])) {
            $validated['slug'] = $this->generateUniqueSlug($validated['titulo']);
        } else {
            // Verificar si el slug ya existe (excluyendo el curso actual)
            $originalSlug = $validated['slug'];
            $counter = 1;
            while (Curso::where('slug', $validated['slug'])->where('id', '!=', $curso->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        $validated['activo'] = $request->has('activo');

        $curso->update($validated);

        // Procesar niveles y subniveles
        if ($request->has('niveles') && is_array($request->niveles)) {
            // Eliminar niveles existentes
            $curso->niveles()->delete();

            foreach ($request->niveles as $nivelData) {
                // Crear el nivel
                $nivel = Nivel::create([
                    'curso_id' => $curso->id,
                    'numero' => $nivelData['numero'],
                    'titulo' => $nivelData['titulo'],
                    'descripcion' => $nivelData['descripcion'] ?? null,
                ]);

                // Procesar subniveles
                if (isset($nivelData['subniveles']) && is_array($nivelData['subniveles'])) {
                    foreach ($nivelData['subniveles'] as $subnivelIndex => $subnivelData) {
                        $subnivelInfo = [
                            'nivel_id' => $nivel->id,
                            'numero' => $subnivelIndex + 1,
                            'titulo' => $subnivelData['titulo'] ?? null,
                            'descripcion' => $subnivelData['descripcion'] ?? null,
                            'url_iframe' => $subnivelData['url_iframe'] ?? null,
                            'url_video' => $subnivelData['url_video'] ?? null,
                            'usar_iframe' => isset($subnivelData['usar_iframe']) ? (bool)$subnivelData['usar_iframe'] : false,
                            'usar_url_video' => isset($subnivelData['usar_url_video']) ? (bool)$subnivelData['usar_url_video'] : false,
                            'usar_video_archivo' => isset($subnivelData['usar_video_archivo']) ? (bool)$subnivelData['usar_video_archivo'] : false,
                            'video_archivo_path' => null,
                            'video_archivo_nombre' => null,
                            'video_archivo_tipo' => null,
                            'video_archivo_tamaño' => null,
                            'recurso_path' => null,
                            'recurso_nombre' => null,
                            'recurso_tipo' => null,
                        ];

                        // Manejar archivo de video del subnivel
                        if (isset($subnivelData['video_archivo']) && $subnivelData['video_archivo']->isValid()) {
                            $videoPath = $subnivelData['video_archivo']->store('videos-subniveles', 'public');
                            $subnivelInfo['video_archivo_path'] = $videoPath;
                            $subnivelInfo['video_archivo_nombre'] = $subnivelData['video_archivo']->getClientOriginalName();
                            $subnivelInfo['video_archivo_tipo'] = $subnivelData['video_archivo']->getClientMimeType();
                            $subnivelInfo['video_archivo_tamaño'] = $subnivelData['video_archivo']->getSize();
                        }

                        // Manejar archivo de recurso del subnivel
                        if (isset($subnivelData['recurso']) && $subnivelData['recurso']->isValid()) {
                            $recursoPath = $subnivelData['recurso']->store('recursos-subniveles', 'public');
                            $subnivelInfo['recurso_path'] = $recursoPath;
                            $subnivelInfo['recurso_nombre'] = $subnivelData['recurso']->getClientOriginalName();
                            $subnivelInfo['recurso_tipo'] = $subnivelData['recurso']->getClientOriginalExtension();
                        }

                        Subnivel::create($subnivelInfo);
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Curso actualizado correctamente.',
            'curso' => [
                'id' => $curso->id,
                'titulo' => $curso->titulo,
                'descripcion' => $curso->descripcion,
                'precio' => $curso->precio,
                'duracion_horas' => $curso->duracion_horas,
                'nivel' => $curso->nivel,
                'activo' => $curso->activo,
                'cupo_maximo' => $curso->cupo_maximo,
                'fecha_inicio' => $curso->fecha_inicio ? $curso->fecha_inicio->format('d/m/Y') : null,
                'fecha_fin' => $curso->fecha_fin ? $curso->fecha_fin->format('d/m/Y') : null,
                'slug' => $curso->slug,
                'requisitos' => $curso->requisitos,
                'url_imagen' => $curso->url_imagen,
                'creador_nombre' => $curso->creador_nombre,
                'creador_apellido' => $curso->creador_apellido,
                'creador_profesion' => $curso->creador_profesion,
                'creador_descripcion' => $curso->creador_descripcion,
                'facebook_usuario' => $curso->facebook_usuario,
                'twitter_usuario' => $curso->twitter_usuario,
                'linkedin_usuario' => $curso->linkedin_usuario,
                'instagram_usuario' => $curso->instagram_usuario,
                'vk_usuario' => $curso->vk_usuario,
                'tiktok_usuario' => $curso->tiktok_usuario,
                'creador' => [
                    'name' => $curso->creador->name,
                    'apellido_paterno' => $curso->creador->apellido_paterno,
                    'apellido_materno' => $curso->creador->apellido_materno,
                ],
                'created_at' => $curso->created_at->format('d/m/Y H:i'),
                'updated_at' => $curso->updated_at->format('d/m/Y H:i')
            ]
        ]);
    }

    /**
     * Eliminar un curso
     */
    public function destroy(Curso $curso)
    {
        // Eliminar imagen si existe
        if ($curso->url_imagen) {
            Storage::disk('public')->delete($curso->url_imagen);
        }

        $curso->delete();

        return response()->json([
            'success' => true,
            'message' => 'Curso eliminado correctamente.'
        ]);
    }

    /**
     * Inscribir usuario en curso
     */
    public function inscribir(Request $request, Curso $curso)
    {
        $usuario = auth()->user();

        // Verificar si ya está inscrito activamente
        $inscripcionExistente = $curso->inscripciones()
            ->where('usuario_id', $usuario->id)
            ->where('status', 'activo')
            ->first();

        if ($inscripcionExistente) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ya estás inscrito en este curso.'
                ], 422);
            }

            return redirect()
                ->route('cursos.ver', $curso)
                ->with('error', 'Ya estás inscrito en este curso.');
        }

        // Verificar si hay una inscripción cancelada o completada que se pueda reactivar
        $inscripcionAnterior = $curso->inscripciones()
            ->where('usuario_id', $usuario->id)
            ->whereIn('status', ['cancelado', 'completado'])
            ->first();

        // Verificar cupos disponibles
        if (!$curso->tieneCuposDisponibles()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'El curso no tiene cupos disponibles.'
                ], 422);
            }

            return redirect()
                ->route('cursos.ver', $curso)
                ->with('error', 'El curso no tiene cupos disponibles.');
        }

        // Verificar que el curso esté activo
        if (!$curso->activo) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'El curso no está disponible para inscripciones.'
                ], 422);
            }

            return redirect()
                ->route('cursos.ver', $curso)
                ->with('error', 'El curso no está disponible para inscripciones.');
        }

        // Crear o reactivar inscripción
        if ($inscripcionAnterior) {
            // Reactivar inscripción anterior
            $inscripcion = $inscripcionAnterior->reactivar();
        } else {
            // Crear nueva inscripción
            $inscripcion = \App\Models\Inscripcion::create([
                'usuario_id' => $usuario->id,
                'curso_id' => $curso->id,
                'fecha_inscripcion' => now(),
                'progreso' => 0.00,
                'status' => 'activo',
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => '¡Te has inscrito exitosamente en el curso!',
                'inscripcion' => [
                    'id' => $inscripcion->id,
                    'progreso' => $inscripcion->progreso,
                    'status' => $inscripcion->status
                ]
            ]);
        }

        return redirect()
            ->route('cursos.ver', $curso)
            ->with('success', '¡Te has inscrito exitosamente en el curso!');
    }

    /**
     * Buscar cursos (para filtros)
     */
    public function search(Request $request)
    {
        $query = Curso::with('creador');

        if ($request->has('estado') && $request->estado) {
            $query->where('activo', $request->estado === 'activo');
        }

        if ($request->has('nivel') && $request->nivel) {
            $query->where('nivel', $request->nivel);
        }

        if ($request->has('busqueda') && $request->busqueda) {
            $query->where(function ($q) use ($request) {
                $q->where('titulo', 'like', '%' . $request->busqueda . '%')
                  ->orWhere('descripcion', 'like', '%' . $request->busqueda . '%');
            });
        }

        // Ordenamiento
        if ($request->has('orden')) {
            switch ($request->orden) {
                case 'antiguos':
                    $query->oldest();
                    break;
                case 'precio_asc':
                    $query->orderBy('precio', 'asc');
                    break;
                case 'precio_desc':
                    $query->orderBy('precio', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $cursos = $query->paginate(10);

        return view('admin.cursos.index', compact('cursos'));
    }

    /**
     * Acciones masivas sobre cursos
     */
    public function bulk(Request $request)
    {
        $validated = $request->validate([
            'action' => 'required|in:activar,desactivar,eliminar',
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:cursos,id',
        ]);

        $ids = $validated['ids'];
        switch ($validated['action']) {
            case 'activar':
                Curso::whereIn('id', $ids)->update(['activo' => true]);
                return back()->with('success', 'Cursos activados correctamente.');
            case 'desactivar':
                Curso::whereIn('id', $ids)->update(['activo' => false]);
                return back()->with('success', 'Cursos desactivados correctamente.');
            case 'eliminar':
                // Nota: no elimina imágenes por simplicidad en masivo
                Curso::whereIn('id', $ids)->delete();
                return back()->with('success', 'Cursos eliminados correctamente.');
        }

        return back()->with('error', 'Acción no válida.');
    }

    /**
     * Aprobar un curso creado por un creador
     */
    public function aprobar(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'comentarios' => 'nullable|string|max:1000',
        ]);

        $curso->update([
            'activo' => true,
            'comentarios_aprobacion' => $validated['comentarios'] ?? null,
            'fecha_aprobacion' => now(),
            'aprobado_por' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Curso aprobado correctamente.',
            'curso' => [
                'id' => $curso->id,
                'titulo' => $curso->titulo,
                'activo' => $curso->activo,
                'fecha_aprobacion' => $curso->fecha_aprobacion->format('d/m/Y H:i'),
            ]
        ]);
    }

    /**
     * Rechazar un curso creado por un creador
     */
    public function rechazar(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'motivo_rechazo' => 'required|string|max:1000',
        ]);

        $curso->update([
            'activo' => false,
            'motivo_rechazo' => $validated['motivo_rechazo'],
            'fecha_rechazo' => now(),
            'rechazado_por' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Curso rechazado correctamente.',
            'curso' => [
                'id' => $curso->id,
                'titulo' => $curso->titulo,
                'activo' => $curso->activo,
                'motivo_rechazo' => $curso->motivo_rechazo,
            ]
        ]);
    }

    /**
     * Mostrar cursos pendientes de aprobación (solo admin)
     */
    public function pendientes()
    {
        $cursos = Curso::where('activo', false)
            ->whereNull('motivo_rechazo')
            ->with(['creador', 'categoria'])
            ->latest()
            ->paginate(10);

        return view('admin.cursos.pendientes', compact('cursos'));
    }
}
