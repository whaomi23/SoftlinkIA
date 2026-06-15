<?php
//7
namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Certificado;
use App\Models\Curso;
use App\Models\RedesSociales;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:administrador']);
    }

    /**
     * Mostrar Dashboard con métricas, actividad y datos para gráficas
     */
    public function index(Request $request)
    {
        [$start, $end, $activeRange] = $this->resolveRange($request);

        // Métricas totales
        $totalUsuarios = User::count();
        $totalArticulos = Articulo::count();
        $totalCursos = Curso::count();
        $totalCertificados = Certificado::count();

        // Nuevos en el rango
        $nuevosUsuarios = User::whereBetween('created_at', [$start, $end])->count();
        $nuevosArticulos = Articulo::whereBetween('created_at', [$start, $end])->count();
        $nuevosCursos = Curso::whereBetween('created_at', [$start, $end])->count();
        $nuevosCertificados = Certificado::whereBetween('created_at', [$start, $end])->count();

        // Redes sociales (aproximación)
        $totalEnlaces = RedesSociales::count();
        $currentPeriodEnlaces = RedesSociales::whereBetween('created_at', [$start, $end])->count();
        $prevStart = (clone $start)->subSeconds($end->diffInSeconds($start) + 1);
        $prevEnd = (clone $start)->subSecond();
        $prevPeriodEnlaces = RedesSociales::whereBetween('created_at', [$prevStart, $prevEnd])->count();
        $crecimientoRedes = $prevPeriodEnlaces > 0
            ? round((($currentPeriodEnlaces - $prevPeriodEnlaces) / $prevPeriodEnlaces) * 100)
            : ($currentPeriodEnlaces > 0 ? 100 : 0);
        $totalInteracciones = $currentPeriodEnlaces; // Si no hay métrica real, aproximamos a enlaces publicados en el periodo

        // Actividad reciente combinada (últimos 10 eventos)
        $actividades = $this->buildRecentActivity();

        // Datos para gráficas (por día)
        $period = $this->buildPeriod($activeRange, $start, $end);
        $chartData = $this->buildChartData($period, $start, $end);

        // Distribuciones por estado (para donuts)
        $distCursos = [
            'activo' => (int) Curso::where('activo', true)->count(),
            'inactivo' => (int) Curso::where('activo', false)->count(),
        ];

        $distArticulos = [
            'publicado' => (int) Articulo::where('status', 'publicado')->count(),
            'borrador' => (int) Articulo::where('status', 'borrador')->count(),
            'archivado' => (int) Articulo::where('status', 'archivado')->count(),
        ];

        $distCertificados = [
            'valido' => (int) Certificado::where('status', 'valido')->count(),
            'revocado' => (int) Certificado::where('status', 'revocado')->count(),
            'expirado' => (int) Certificado::where('status', 'expirado')->count(),
        ];

        // Artículos más y menos leídos
        $articulosMasLeidos = Articulo::masLeidos(5);
        $articulosMenosLeidos = Articulo::menosLeidos(5);

        return view('dashboard', compact(
            'totalUsuarios', 'nuevosUsuarios',
            'totalArticulos', 'nuevosArticulos',
            'totalCursos', 'nuevosCursos',
            'totalCertificados', 'nuevosCertificados',
            'totalInteracciones', 'crecimientoRedes', 'totalEnlaces',
            'actividades', 'chartData', 'activeRange',
            'distCursos', 'distArticulos', 'distCertificados',
            'articulosMasLeidos', 'articulosMenosLeidos'
        ));
    }

    /**
     * Endpoint de búsqueda unificada (usuarios, cursos, artículos)
     */
    public function search(Request $request)
    {
        $q = trim((string) $request->get('q', ''));
        if ($q === '') {
            return response()->json(['usuarios' => [], 'cursos' => [], 'articulos' => []]);
        }

        $usuarios = User::query()
            ->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%$q%")
                    ->orWhere('apellido_paterno', 'like', "%$q%")
                    ->orWhere('apellido_materno', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%");
            })
            ->orderByDesc('created_at')
            ->limit(5)
            ->get(['id', 'name', 'apellido_paterno', 'apellido_materno']);

        $cursos = Curso::query()
            ->where(function ($sub) use ($q) {
                $sub->where('titulo', 'like', "%$q%")
                    ->orWhere('descripcion', 'like', "%$q%")
                    ->orWhere('slug', 'like', "%$q%");
            })
            ->orderByDesc('created_at')
            ->limit(5)
            ->get(['id', 'titulo', 'slug']);

        $articulos = Articulo::query()
            ->where(function ($sub) use ($q) {
                $sub->where('titulo', 'like', "%$q%")
                    ->orWhere('subtitulo', 'like', "%$q%")
                    ->orWhere('contenido', 'like', "%$q%");
            })
            ->orderByDesc('created_at')
            ->limit(5)
            ->get(['id', 'titulo']);

        $usuariosFormatted = $usuarios->map(function ($u) {
            $nombre = trim($u->name . ' ' . $u->apellido_paterno . ' ' . $u->apellido_materno);
            return [
                'id' => $u->id,
                'label' => $nombre,
                'type' => 'usuario',
                'url' => route('usuarios.show', $u->id),
            ];
        });

        // Preferimos el show público si existe, sino el admin show
        $cursosFormatted = $cursos->map(function ($c) {
            try {
                $publicUrl = route('cursos.ver', $c->slug ?? $c->id);
            } catch (\Exception $e) {
                $publicUrl = null;
            }

            // Para admin, usamos la ruta de edición ya que no hay show específico
            $adminUrl = route('admin.cursos.edit', $c->id);

            return [
                'id' => $c->id,
                'label' => $c->titulo,
                'type' => 'curso',
                'url' => $publicUrl ?? $adminUrl,
                'adminUrl' => $adminUrl,
            ];
        });

        $articulosFormatted = $articulos->map(function ($a) {
            return [
                'id' => $a->id,
                'label' => $a->titulo,
                'type' => 'articulo',
                'url' => route('articulos.ver', $a->id),
                'adminUrl' => route('admin.articulos.show', $a->id),
            ];
        });

        return response()->json([
            'usuarios' => $usuariosFormatted,
            'cursos' => $cursosFormatted,
            'articulos' => $articulosFormatted,
        ]);
    }

    private function resolveRange(Request $request): array
    {
        $range = $request->get('range');
        $now = Carbon::now();
        switch ($range) {
            case 'today':
                $start = $now->copy()->startOfDay();
                $end = $now->copy()->endOfDay();
                $activeRange = 'today';
                break;
            case '7d':
                $start = $now->copy()->subDays(6)->startOfDay();
                $end = $now->copy()->endOfDay();
                $activeRange = '7d';
                break;
            case '30d':
            default:
                $start = $now->copy()->subDays(29)->startOfDay();
                $end = $now->copy()->endOfDay();
                $activeRange = '30d';
                break;
        }
        return [$start, $end, $activeRange];
    }

    private function buildPeriod(string $activeRange, Carbon $start, Carbon $end): CarbonPeriod
    {
        return CarbonPeriod::create($start->copy()->startOfDay(), '1 day', $end->copy()->endOfDay());
    }

    private function buildChartData(CarbonPeriod $period, Carbon $start, Carbon $end): array
    {
        $labels = [];
        $usuariosCounts = [];
        $articulosCounts = [];
        $cursosCounts = [];
        $certificadosCounts = [];

        // Detectar el driver de la base de datos y usar la función correcta
        $driverName = DB::connection()->getDriverName();
        $dateFormatFunction = $driverName === 'pgsql'
            ? "TO_CHAR(created_at, 'YYYY-MM-DD')"
            : "DATE_FORMAT(created_at, '%Y-%m-%d')";

        $usuariosByDay = User::select(DB::raw("$dateFormatFunction as d"), DB::raw('COUNT(*) as c'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('d')
            ->pluck('c', 'd');
        $articulosByDay = Articulo::select(DB::raw("$dateFormatFunction as d"), DB::raw('COUNT(*) as c'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('d')
            ->pluck('c', 'd');
        $cursosByDay = Curso::select(DB::raw("$dateFormatFunction as d"), DB::raw('COUNT(*) as c'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('d')
            ->pluck('c', 'd');
        $certificadosByDay = Certificado::select(DB::raw("$dateFormatFunction as d"), DB::raw('COUNT(*) as c'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('d')
            ->pluck('c', 'd');

        foreach ($period as $date) {
            $key = $date->format('Y-m-d');
            $labels[] = $date->format('d M');
            $usuariosCounts[] = (int) ($usuariosByDay[$key] ?? 0);
            $articulosCounts[] = (int) ($articulosByDay[$key] ?? 0);
            $cursosCounts[] = (int) ($cursosByDay[$key] ?? 0);
            $certificadosCounts[] = (int) ($certificadosByDay[$key] ?? 0);
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Usuarios',
                    'data' => $usuariosCounts,
                    'borderColor' => '#22d3ee',
                    'backgroundColor' => 'rgba(34, 211, 238, 0.15)',
                    'tension' => 0.35,
                ],
                [
                    'label' => 'Artículos',
                    'data' => $articulosCounts,
                    'borderColor' => '#34d399',
                    'backgroundColor' => 'rgba(52, 211, 153, 0.15)',
                    'tension' => 0.35,
                ],
                [
                    'label' => 'Cursos',
                    'data' => $cursosCounts,
                    'borderColor' => '#818cf8',
                    'backgroundColor' => 'rgba(129, 140, 248, 0.15)',
                    'tension' => 0.35,
                ],
                [
                    'label' => 'Certificados',
                    'data' => $certificadosCounts,
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.15)',
                    'tension' => 0.35,
                ],
            ],
        ];
    }

    private function buildRecentActivity(): array
    {
        $events = [];

        // Usuarios
        foreach (User::orderByDesc('created_at')->limit(5)->get(['id','name','apellido_paterno','apellido_materno','created_at']) as $u) {
            $events[] = [
                'timestamp' => $u->created_at,
                'color' => 'cyan',
                'icono' => 'person_add',
                'descripcion' => 'Nuevo usuario: ' . trim($u->name . ' ' . $u->apellido_paterno . ' ' . $u->apellido_materno),
                'fecha' => optional($u->created_at)->diffForHumans(),
            ];
        }

        // Cursos
        foreach (Curso::orderByDesc('created_at')->limit(5)->get(['id','titulo','created_at']) as $c) {
            $events[] = [
                'timestamp' => $c->created_at,
                'color' => 'purple',
                'icono' => 'school',
                'descripcion' => 'Curso creado: ' . $c->titulo,
                'fecha' => optional($c->created_at)->diffForHumans(),
            ];
        }

        // Artículos
        foreach (Articulo::orderByDesc('created_at')->limit(5)->get(['id','titulo','created_at']) as $a) {
            $events[] = [
                'timestamp' => $a->created_at,
                'color' => 'emerald',
                'icono' => 'article',
                'descripcion' => 'Artículo publicado: ' . $a->titulo,
                'fecha' => optional($a->created_at)->diffForHumans(),
            ];
        }

        // Certificados
        foreach (Certificado::orderByDesc('created_at')->limit(5)->get(['id','codigo_unico','created_at']) as $ce) {
            $events[] = [
                'timestamp' => $ce->created_at,
                'color' => 'amber',
                'icono' => 'verified',
                'descripcion' => 'Certificado emitido: ' . $ce->codigo_unico,
                'fecha' => optional($ce->created_at)->diffForHumans(),
            ];
        }

        // Ordenar por fecha desc y limitar
        usort($events, function ($a, $b) {
            $ta = $a['timestamp'] instanceof Carbon ? $a['timestamp']->getTimestamp() : 0;
            $tb = $b['timestamp'] instanceof Carbon ? $b['timestamp']->getTimestamp() : 0;
            return $tb <=> $ta;
        });

        $events = array_slice($events, 0, 10);
        // Limpiar timestamp antes de enviar a la vista
        return array_map(function ($e) {
            unset($e['timestamp']);
            return $e;
        }, $events);
    }
}
