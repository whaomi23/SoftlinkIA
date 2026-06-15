@extends('KIBI.layouts.auth')

@section('title', 'KIBI - Gestión de Usuarios')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-white to-blue-50 rounded-2xl shadow-xl p-6 mb-8 border border-blue-100">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-purple-800 bg-clip-text text-transparent">
                                Gestión de Usuarios KIBI
                            </h1>
                            <p class="text-gray-600 mt-1 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span>Administra usuarios y otorga/deniega accesos</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('kibi.historial.solicitudes.vista') }}"
                       class="px-5 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-xl transition-all duration-200 shadow-md hover:shadow-lg flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span class="font-medium">Ver Solicitudes</span>
                    </a>
                    <a href="{{ route('kibi.dashboard') }}"
                       class="px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-200 hover:border-gray-300 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 border border-gray-100">
            <form method="GET" action="{{ route('kibi.usuarios.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Nombre, email..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Usuario</label>
                    <select name="tipo" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Todos</option>
                        @foreach($tiposUsuarios as $tipo)
                            <option value="{{ $tipo->id }}" {{ request('tipo') == $tipo->id ? 'selected' : '' }}>
                                {{ ucfirst($tipo->nombre) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                    <select name="estado" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Todos</option>
                        <option value="activo" {{ request('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ request('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full px-6 py-2 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
                        Filtrar
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabla de Usuarios -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-purple-50 to-pink-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Usuario</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Rol</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Solicitud de Rol</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="usuarios-table">
                        @forelse($usuarios as $usuario)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                            {{ $usuario->iniciales }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $usuario->nombreCompleto }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">{{ $usuario->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($usuario->tipoUsuario)
                                            @if($usuario->tipoUsuario->nombre == 'administrador') bg-red-100 text-red-800
                                            @elseif($usuario->tipoUsuario->nombre == 'marketing') bg-purple-100 text-purple-800
                                            @elseif($usuario->tipoUsuario->nombre == 'creador') bg-blue-100 text-blue-800
                                            @else bg-gray-100 text-gray-800
                                            @endif
                                        @else
                                            bg-gray-100 text-gray-800
                                        @endif">
                                        {{ $usuario->tipoUsuario->nombre ?? 'Sin rol' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $usuario->status == 'activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($usuario->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($usuario->solicitud_marketing)
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($usuario->solicitud_marketing == 'pendiente') bg-yellow-100 text-yellow-800
                                            @elseif($usuario->solicitud_marketing == 'aprobada') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            Marketing: {{ ucfirst($usuario->solicitud_marketing) }}
                                        </span>
                                    @elseif($usuario->solicitud_rol)
                                        <div class="flex flex-col space-y-1">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($usuario->solicitud_rol == 'pendiente') bg-yellow-100 text-yellow-800
                                                @elseif($usuario->solicitud_rol == 'aprobada') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst(str_replace('_', ' ', $usuario->rol_solicitado ?? 'Rol')) }}: {{ ucfirst($usuario->solicitud_rol) }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button onclick="editarRol({{ $usuario->id }}, '{{ $usuario->tipoUsuario->nombre ?? '' }}', {{ $usuario->tipo_usuario_id ?? 'null' }})" 
                                                class="text-purple-600 hover:text-purple-900" title="Cambiar Rol">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        @if($usuario->solicitud_marketing == 'pendiente')
                                            <button onclick="aprobarSolicitudMarketing({{ $usuario->id }})" 
                                                    class="text-green-600 hover:text-green-900" title="Aprobar Solicitud">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </button>
                                            <button onclick="rechazarSolicitudMarketing({{ $usuario->id }})" 
                                                    class="text-red-600 hover:text-red-900" title="Rechazar Solicitud">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        @endif
                                        @if(!$usuario->isAdmin())
                                            <button onclick="toggleEstado({{ $usuario->id }}, '{{ $usuario->status }}')" 
                                                    class="text-gray-600 hover:text-gray-900" title="{{ $usuario->status == 'activo' ? 'Desactivar' : 'Activar' }}">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    @if($usuario->status == 'activo')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                                    @else
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    @endif
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <p class="mt-4 text-lg font-medium">No se encontraron usuarios</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            @if($usuarios->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $usuarios->links() }}
                </div>
            @endif
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
async function editarRol(usuarioId, rolActual, tipoUsuarioId) {
    const { value: tipoNuevoId } = await Swal.fire({
        title: 'Cambiar Rol de Usuario',
        html: `
            <div class="text-left">
                <p class="text-sm text-gray-600 mb-4">Rol actual: <span class="font-semibold">${rolActual || 'Sin rol'}</span></p>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nuevo Rol:</label>
                <select id="tipo_usuario_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    @foreach($tiposUsuarios as $tipo)
                        <option value="{{ $tipo->id }}" ${tipoUsuarioId == {{ $tipo->id }} ? 'selected' : ''}>{{ ucfirst($tipo->nombre) }}</option>
                    @endforeach
                </select>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Actualizar Rol',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#9333ea',
        cancelButtonColor: '#6b7280',
        preConfirm: () => {
            return document.getElementById('tipo_usuario_id').value;
        }
    });

    if (tipoNuevoId) {
        try {
            const response = await fetch(`{{ url('kibi/usuarios') }}/${usuarioId}/actualizar-rol`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ tipo_usuario_id: tipoNuevoId })
            });

            const data = await response.json();

            if (data.success) {
                Swal.fire({
                    title: '¡Actualizado!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonColor: '#9333ea'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.message || 'Hubo un problema al actualizar el rol.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al actualizar el rol.',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}

async function aprobarSolicitudMarketing(usuarioId) {
    const { value: comentario } = await Swal.fire({
        title: 'Aprobar Solicitud de Marketing',
        input: 'textarea',
        inputLabel: 'Comentario (opcional)',
        inputPlaceholder: 'Agrega un comentario...',
        showCancelButton: true,
        confirmButtonText: 'Aprobar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#10b981',
        cancelButtonColor: '#6b7280'
    });

    if (comentario !== undefined) {
        try {
            const response = await fetch(`{{ url('kibi/solicitudes-marketing') }}/${usuarioId}/aprobar`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ comentario: comentario })
            });

            const data = await response.json();

            if (data.success) {
                Swal.fire({
                    title: '¡Aprobado!',
                    text: 'El usuario ahora tiene el rol de marketing.',
                    icon: 'success',
                    confirmButtonColor: '#10b981'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.message || 'Hubo un problema al aprobar la solicitud.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al aprobar la solicitud.',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}

async function rechazarSolicitudMarketing(usuarioId) {
    const { value: motivo } = await Swal.fire({
        title: 'Rechazar Solicitud de Marketing',
        input: 'textarea',
        inputLabel: 'Motivo del rechazo <span class="text-red-500">*</span>',
        inputPlaceholder: 'Explica por qué se rechaza...',
        inputValidator: (value) => {
            if (!value) {
                return 'Debes proporcionar un motivo';
            }
        },
        showCancelButton: true,
        confirmButtonText: 'Rechazar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280'
    });

    if (motivo) {
        try {
            const response = await fetch(`{{ url('kibi/solicitudes-marketing') }}/${usuarioId}/rechazar`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ motivo: motivo })
            });

            const data = await response.json();

            if (data.success) {
                Swal.fire({
                    title: 'Rechazada',
                    text: 'La solicitud ha sido rechazada.',
                    icon: 'success',
                    confirmButtonColor: '#ef4444'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.message || 'Hubo un problema al rechazar la solicitud.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al rechazar la solicitud.',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}

async function toggleEstado(usuarioId, estadoActual) {
    const accion = estadoActual === 'activo' ? 'desactivar' : 'activar';
    
    const result = await Swal.fire({
        title: `${accion.charAt(0).toUpperCase() + accion.slice(1)} Usuario`,
        text: `¿Estás seguro de que quieres ${accion} este usuario?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: `Sí, ${accion}`,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: estadoActual === 'activo' ? '#ef4444' : '#10b981',
        cancelButtonColor: '#6b7280'
    });

    if (result.isConfirmed) {
        try {
            const response = await fetch(`{{ url('kibi/usuarios') }}/${usuarioId}/toggle-estado`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            const data = await response.json();

            if (data.success) {
                Swal.fire({
                    title: '¡Actualizado!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonColor: '#9333ea'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.message || 'Hubo un problema al actualizar el estado.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al actualizar el estado.',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}

// Función para obtener nombre de rol formateado
function formatearRol(rol) {
    const roles = {
        'marketing': 'Marketing',
        'empleado': 'Empleado',
        'administrador': 'Administrador'
    };
    return roles[rol] || rol.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
}

async function aprobarSolicitudRol(usuarioId) {
    const { value: comentario } = await Swal.fire({
        title: 'Aprobar Solicitud de Rol',
        input: 'textarea',
        inputLabel: 'Comentario (opcional)',
        inputPlaceholder: 'Agrega un comentario sobre la aprobación...',
        showCancelButton: true,
        confirmButtonText: 'Aprobar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#10b981',
        cancelButtonColor: '#6b7280'
    });

    if (comentario !== undefined) {
        try {
            const response = await fetch(`{{ url('kibi/solicitudes-roles') }}/${usuarioId}/aprobar`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ comentario: comentario })
            });

            const data = await response.json();

            if (data.success) {
                Swal.fire({
                    title: '¡Aprobado!',
                    text: 'El rol ha sido asignado al usuario.',
                    icon: 'success',
                    confirmButtonColor: '#10b981'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.message || 'Hubo un problema al aprobar la solicitud.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al aprobar la solicitud.',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}

async function rechazarSolicitudRol(usuarioId) {
    const { value: motivo } = await Swal.fire({
        title: 'Rechazar Solicitud de Rol',
        input: 'textarea',
        inputLabel: 'Motivo del rechazo <span class="text-red-500">*</span>',
        inputPlaceholder: 'Explica por qué se rechaza...',
        inputValidator: (value) => {
            if (!value) {
                return 'Debes proporcionar un motivo';
            }
        },
        showCancelButton: true,
        confirmButtonText: 'Rechazar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280'
    });

    if (motivo) {
        try {
            const response = await fetch(`{{ url('kibi/solicitudes-roles') }}/${usuarioId}/rechazar`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ motivo: motivo })
            });

            const data = await response.json();

            if (data.success) {
                Swal.fire({
                    title: 'Rechazada',
                    text: 'La solicitud ha sido rechazada.',
                    icon: 'success',
                    confirmButtonColor: '#ef4444'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.message || 'Hubo un problema al rechazar la solicitud.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al rechazar la solicitud.',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}
</script>
@endpush
@endsection

