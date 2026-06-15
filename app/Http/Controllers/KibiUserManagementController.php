<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KibiUserManagementController extends Controller
{
    /**
     * Mostrar lista de usuarios para gestión (solo marketing)
     */
    public function index(Request $request)
    {
        // Verificar que el usuario sea de marketing
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        $query = User::with('tipoUsuario')
            ->select(['*']) // Asegurar que se carguen todos los campos incluyendo solicitud_rol, rol_solicitado, etc.
            ->latest();
        
        // Solo mostrar usuarios con roles de KIBI (excluir roles de SoftlinkIA: creador, estudiante, user)
        $rolesKibi = TipoUsuario::whereIn('nombre', [
            'marketing', 
            'empleado', 
            'administrador',
            'editor_contenido',
            'gestor_usuarios',
            'gestor_contactos',
            'supervisor'
        ])->pluck('id');
        $query->whereIn('tipo_usuario_id', $rolesKibi);

        // Búsqueda
        if ($request->filled('q')) {
            $q = trim($request->string('q'));
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('apellido_paterno', 'like', "%{$q}%")
                    ->orWhere('apellido_materno', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        // Filtro por tipo de usuario
        if ($request->filled('tipo')) {
            $tipoId = (int) $request->input('tipo');
            $query->where('tipo_usuario_id', $tipoId);
        }

        // Filtro por estado
        if ($request->filled('estado')) {
            $estado = $request->input('estado');
            $query->where('status', $estado);
        }

        $usuarios = $query->paginate(15)->appends($request->query());
        // Solo mostrar roles de KIBI - excluir roles de SoftlinkIA (creador, estudiante, user)
        $tiposUsuarios = TipoUsuario::whereIn('nombre', [
            'marketing', 
            'empleado', 
            'administrador',
            'editor_contenido',
            'gestor_usuarios',
            'gestor_contactos',
            'supervisor'
        ])->get();

        if ($request->ajax()) {
            return view('KIBI.admin.usuarios.partials.table', compact('usuarios'))->render();
        }

        return view('KIBI.admin.usuarios.index', compact('usuarios', 'tiposUsuarios'));
    }

    /**
     * Mostrar detalle de usuario
     */
    public function show(User $usuario)
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        $usuario->load('tipoUsuario')
                ->loadCount(['articulos', 'cursos', 'certificados']);

        return view('KIBI.admin.usuarios.show', compact('usuario'));
    }

    /**
     * Actualizar rol de usuario
     */
    public function updateRole(Request $request, User $usuario)
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permisos para realizar esta acción.'
            ], 403);
        }

        $request->validate([
            'tipo_usuario_id' => 'required|exists:tipos_usuarios,id'
        ]);

        // Solo permitir asignar roles de KIBI
        $rolesKibi = TipoUsuario::whereIn('nombre', [
            'marketing', 
            'empleado', 
            'administrador',
            'editor_contenido',
            'gestor_usuarios',
            'gestor_contactos',
            'supervisor'
        ])->pluck('id')->toArray();
        if (!in_array($request->tipo_usuario_id, $rolesKibi)) {
            return response()->json([
                'success' => false,
                'message' => 'Solo se pueden asignar roles de KIBI.'
            ], 400);
        }

        // No permitir cambiar el rol de administradores
        if ($usuario->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede modificar el rol de un administrador.'
            ], 400);
        }

        $tipoAnterior = $usuario->tipoUsuario->nombre ?? 'Sin rol';
        $tipoNuevo = TipoUsuario::find($request->tipo_usuario_id);

        $usuario->update([
            'tipo_usuario_id' => $request->tipo_usuario_id
        ]);

        return response()->json([
            'success' => true,
            'message' => "Rol actualizado de '{$tipoAnterior}' a '{$tipoNuevo->nombre}'.",
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombreCompleto,
                'email' => $usuario->email,
                'tipo' => $tipoNuevo->nombre
            ]
        ]);
    }

    /**
     * Aprobar solicitud de marketing (para marketing)
     */
    public function aprobarSolicitudMarketing(Request $request, User $usuario)
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permisos para realizar esta acción.'
            ], 403);
        }

        if ($usuario->solicitud_marketing !== 'pendiente') {
            return response()->json([
                'success' => false,
                'message' => 'Esta solicitud no está pendiente.'
            ], 400);
        }

        $tipoMarketing = TipoUsuario::where('nombre', 'marketing')->first();
        if (!$tipoMarketing) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el tipo de usuario marketing.'
            ], 500);
        }

        $usuario->update([
            'tipo_usuario_id' => $tipoMarketing->id,
            'solicitud_marketing' => 'aprobada',
            'comentario_aprobacion_marketing' => $request->comentario ?? null,
            'fecha_aprobacion_marketing' => now(),
            'aprobado_por_marketing' => Auth::guard('kibi')->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Solicitud aprobada correctamente.'
        ]);
    }

    /**
     * Rechazar solicitud de marketing (para marketing)
     */
    public function rechazarSolicitudMarketing(Request $request, User $usuario)
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permisos para realizar esta acción.'
            ], 403);
        }

        if ($usuario->solicitud_marketing !== 'pendiente') {
            return response()->json([
                'success' => false,
                'message' => 'Esta solicitud no está pendiente.'
            ], 400);
        }

        $request->validate([
            'motivo' => 'required|string|max:1000'
        ]);

        $usuario->update([
            'solicitud_marketing' => 'rechazada',
            'motivo_rechazo_marketing' => $request->motivo,
            'fecha_rechazo_marketing' => now(),
            'rechazado_por_marketing' => Auth::guard('kibi')->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Solicitud rechazada correctamente.'
        ]);
    }

    /**
     * Obtener solicitudes de marketing pendientes (para marketing)
     */
    public function solicitudesMarketing()
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        $solicitudes = User::where('solicitud_marketing', 'pendiente')
            ->select(['id', 'name', 'apellido_paterno', 'apellido_materno', 'email', 'motivo_solicitud_marketing', 'experiencia_solicitud_marketing', 'updated_at'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'solicitudes' => $solicitudes
        ]);
    }

    /**
     * Obtener solicitudes de roles pendientes (para marketing)
     */
    public function solicitudesRoles()
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        $solicitudes = User::where('solicitud_rol', 'pendiente')
            ->select(['id', 'name', 'apellido_paterno', 'apellido_materno', 'email', 'rol_solicitado', 'motivo_solicitud_rol', 'experiencia_solicitud_rol', 'updated_at'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'solicitudes' => $solicitudes
        ]);
    }

    /**
     * Obtener todas las solicitudes pendientes (marketing + roles genéricos)
     */
    public function todasSolicitudesPendientes()
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        // Solicitudes de marketing pendientes
        $solicitudesMarketing = User::where('solicitud_marketing', 'pendiente')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'apellido_paterno' => $user->apellido_paterno,
                    'apellido_materno' => $user->apellido_materno,
                    'email' => $user->email,
                    'tipo_solicitud' => 'marketing',
                    'rol_solicitado' => 'marketing',
                    'motivo' => $user->motivo_solicitud_marketing,
                    'experiencia' => $user->experiencia_solicitud_marketing,
                    'updated_at' => $user->updated_at,
                ];
            });

        // Solicitudes de roles genéricos pendientes
        $solicitudesRoles = User::where('solicitud_rol', 'pendiente')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'apellido_paterno' => $user->apellido_paterno,
                    'apellido_materno' => $user->apellido_materno,
                    'email' => $user->email,
                    'tipo_solicitud' => 'rol',
                    'rol_solicitado' => $user->rol_solicitado,
                    'motivo' => $user->motivo_solicitud_rol,
                    'experiencia' => $user->experiencia_solicitud_rol,
                    'updated_at' => $user->updated_at,
                ];
            });

        // Combinar ambas colecciones y ordenar por fecha
        $todasSolicitudes = $solicitudesMarketing->concat($solicitudesRoles)
            ->sortByDesc('updated_at')
            ->values();

        return response()->json([
            'success' => true,
            'solicitudes' => $todasSolicitudes
        ]);
    }

    /**
     * Obtener historial completo de solicitudes (pendientes, aprobadas, rechazadas)
     */
    public function historialSolicitudes()
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        // Obtener historial de marketing
        $historialMarketing = User::whereNotNull('solicitud_marketing')
            ->whereIn('solicitud_marketing', ['pendiente', 'aprobada', 'rechazada'])
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'apellido_paterno' => $user->apellido_paterno,
                    'apellido_materno' => $user->apellido_materno,
                    'email' => $user->email,
                    'tipo_solicitud' => 'marketing',
                    'rol_solicitado' => 'marketing',
                    'estado' => $user->solicitud_marketing,
                    'motivo' => $user->motivo_solicitud_marketing,
                    'experiencia' => $user->experiencia_solicitud_marketing,
                    'comentario_aprobacion' => $user->comentario_aprobacion_marketing,
                    'motivo_rechazo' => $user->motivo_rechazo_marketing,
                    'fecha_aprobacion' => $user->fecha_aprobacion_marketing,
                    'fecha_rechazo' => $user->fecha_rechazo_marketing,
                    'updated_at' => $user->updated_at,
                ];
            });

        // Obtener historial de roles genéricos
        $historialRoles = User::whereNotNull('solicitud_rol')
            ->whereIn('solicitud_rol', ['pendiente', 'aprobada', 'rechazada'])
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'apellido_paterno' => $user->apellido_paterno,
                    'apellido_materno' => $user->apellido_materno,
                    'email' => $user->email,
                    'tipo_solicitud' => 'rol',
                    'rol_solicitado' => $user->rol_solicitado,
                    'estado' => $user->solicitud_rol,
                    'motivo' => $user->motivo_solicitud_rol,
                    'experiencia' => $user->experiencia_solicitud_rol,
                    'comentario_aprobacion' => $user->comentario_aprobacion_rol,
                    'motivo_rechazo' => $user->motivo_rechazo_rol,
                    'fecha_aprobacion' => $user->fecha_aprobacion_rol,
                    'fecha_rechazo' => $user->fecha_rechazo_rol,
                    'updated_at' => $user->updated_at,
                ];
            });

        // Combinar ambos historiales y ordenar por fecha
        $historialCompleto = $historialMarketing->concat($historialRoles)
            ->sortByDesc('updated_at')
            ->values();

        return response()->json([
            'success' => true,
            'historial' => $historialCompleto
        ]);
    }

    /**
     * Mostrar vista del historial de solicitudes
     */
    public function mostrarHistorialSolicitudes()
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            abort(403, 'No tienes permisos para acceder a esta función.');
        }

        // Obtener historial de marketing
        $historialMarketing = User::whereNotNull('solicitud_marketing')
            ->whereIn('solicitud_marketing', ['pendiente', 'aprobada', 'rechazada'])
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'apellido_paterno' => $user->apellido_paterno,
                    'apellido_materno' => $user->apellido_materno,
                    'email' => $user->email,
                    'tipo_solicitud' => 'marketing',
                    'rol_solicitado' => 'marketing',
                    'estado' => $user->solicitud_marketing,
                    'motivo' => $user->motivo_solicitud_marketing,
                    'experiencia' => $user->experiencia_solicitud_marketing,
                    'comentario_aprobacion' => $user->comentario_aprobacion_marketing,
                    'motivo_rechazo' => $user->motivo_rechazo_marketing,
                    'fecha_aprobacion' => $user->fecha_aprobacion_marketing,
                    'fecha_rechazo' => $user->fecha_rechazo_marketing,
                    'updated_at' => $user->updated_at,
                ];
            });

        // Obtener historial de roles genéricos
        $historialRoles = User::whereNotNull('solicitud_rol')
            ->whereIn('solicitud_rol', ['pendiente', 'aprobada', 'rechazada'])
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'apellido_paterno' => $user->apellido_paterno,
                    'apellido_materno' => $user->apellido_materno,
                    'email' => $user->email,
                    'tipo_solicitud' => 'rol',
                    'rol_solicitado' => $user->rol_solicitado,
                    'estado' => $user->solicitud_rol,
                    'motivo' => $user->motivo_solicitud_rol,
                    'experiencia' => $user->experiencia_solicitud_rol,
                    'comentario_aprobacion' => $user->comentario_aprobacion_rol,
                    'motivo_rechazo' => $user->motivo_rechazo_rol,
                    'fecha_aprobacion' => $user->fecha_aprobacion_rol,
                    'fecha_rechazo' => $user->fecha_rechazo_rol,
                    'updated_at' => $user->updated_at,
                ];
            });

        // Combinar ambos historiales y ordenar por fecha
        $historialCompleto = $historialMarketing->concat($historialRoles)
            ->sortByDesc('updated_at')
            ->values();

        return view('KIBI.admin.solicitudes.historial', [
            'historial' => $historialCompleto
        ]);
    }

    /**
     * Aprobar solicitud de rol (para marketing)
     */
    public function aprobarSolicitudRol(Request $request, User $usuario)
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permisos para realizar esta acción.'
            ], 403);
        }

        if ($usuario->solicitud_rol !== 'pendiente') {
            return response()->json([
                'success' => false,
                'message' => 'Esta solicitud no está pendiente.'
            ], 400);
        }

        $tipoRol = TipoUsuario::where('nombre', $usuario->rol_solicitado)->first();
        if (!$tipoRol) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el tipo de usuario solicitado.'
            ], 500);
        }

        $usuario->update([
            'tipo_usuario_id' => $tipoRol->id,
            'solicitud_rol' => 'aprobada',
            'comentario_aprobacion_rol' => $request->comentario ?? null,
            'fecha_aprobacion_rol' => now(),
            'aprobado_por_rol' => Auth::guard('kibi')->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Solicitud aprobada correctamente.'
        ]);
    }

    /**
     * Rechazar solicitud de rol (para marketing)
     */
    public function rechazarSolicitudRol(Request $request, User $usuario)
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permisos para realizar esta acción.'
            ], 403);
        }

        if ($usuario->solicitud_rol !== 'pendiente') {
            return response()->json([
                'success' => false,
                'message' => 'Esta solicitud no está pendiente.'
            ], 400);
        }

        $request->validate([
            'motivo' => 'required|string|max:1000'
        ]);

        $usuario->update([
            'solicitud_rol' => 'rechazada',
            'motivo_rechazo_rol' => $request->motivo,
            'fecha_rechazo_rol' => now(),
            'rechazado_por_rol' => Auth::guard('kibi')->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Solicitud rechazada correctamente.'
        ]);
    }

    /**
     * Activar/Desactivar usuario
     */
    public function toggleStatus(User $usuario)
    {
        if (!Auth::guard('kibi')->user()->isMarketing()) {
            return response()->json([
                'success' => false,
                'message' => 'No tienes permisos para realizar esta acción.'
            ], 403);
        }

        // No permitir desactivar administradores
        if ($usuario->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede cambiar el estado de un administrador.'
            ], 400);
        }

        $nuevoEstado = $usuario->status === 'activo' ? 'inactivo' : 'activo';
        $usuario->update(['status' => $nuevoEstado]);

        return response()->json([
            'success' => true,
            'message' => "Usuario {$nuevoEstado} correctamente.",
            'usuario' => [
                'id' => $usuario->id,
                'status' => $nuevoEstado
            ]
        ]);
    }
}

