@extends('KIBI.layouts.auth')

@section('title', 'KIBI - Historial de Solicitudes')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-white to-blue-50 rounded-2xl shadow-xl p-6 mb-8 border border-blue-100">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="p-3 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-orange-800 bg-clip-text text-transparent">
                                Historial de Solicitudes de Roles
                            </h1>
                            <p class="text-gray-600 mt-1 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span>Revisa todas las solicitudes de roles (pendientes, aprobadas y rechazadas)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('kibi.usuarios.index') }}"
                       class="px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-200 hover:border-gray-300 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="font-medium">Gestión de Usuarios</span>
                    </a>
                    <a href="{{ route('kibi.dashboard') }}"
                       class="px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-200 hover:border-gray-300 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tabla de Solicitudes -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-orange-50 to-red-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Usuario</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Rol Solicitado</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Fecha Solicitud</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($historial as $solicitud)
                            @php
                                $estadoColor = [
                                    'pendiente' => 'bg-yellow-100 text-yellow-800',
                                    'aprobada' => 'bg-green-100 text-green-800',
                                    'rechazada' => 'bg-red-100 text-red-800'
                                ][$solicitud['estado']] ?? 'bg-gray-100 text-gray-800';
                                
                                $estadoTexto = [
                                    'pendiente' => 'Pendiente',
                                    'aprobada' => 'Aprobada',
                                    'rechazada' => 'Rechazada'
                                ][$solicitud['estado']] ?? $solicitud['estado'];
                                
                                $rolSolicitado = $solicitud['rol_solicitado'] ?? 'marketing';
                                $rolFormateado = ucfirst(str_replace('_', ' ', $rolSolicitado));
                            @endphp
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-semibold text-sm">
                                                {{ strtoupper(substr($solicitud['name'], 0, 1)) }}
                                            </span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $solicitud['name'] }} 
                                                @if($solicitud['apellido_paterno'] || $solicitud['apellido_materno'])
                                                    {{ $solicitud['apellido_paterno'] ?? '' }} {{ $solicitud['apellido_materno'] ?? '' }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $solicitud['email'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $rolFormateado }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $estadoColor }}">
                                        {{ $estadoTexto }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($solicitud['updated_at'])->format('d/m/Y H:i') }}
                                    @if($solicitud['fecha_aprobacion'])
                                        <div class="text-xs text-green-600 mt-1">
                                            Aprobada: {{ \Carbon\Carbon::parse($solicitud['fecha_aprobacion'])->format('d/m/Y H:i') }}
                                        </div>
                                    @endif
                                    @if($solicitud['fecha_rechazo'])
                                        <div class="text-xs text-red-600 mt-1">
                                            Rechazada: {{ \Carbon\Carbon::parse($solicitud['fecha_rechazo'])->format('d/m/Y H:i') }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="verDetalleSolicitud({{ json_encode($solicitud) }})" 
                                            class="text-orange-600 hover:text-orange-900 mr-3">
                                        Ver Detalle
                                    </button>
                                    @if($solicitud['estado'] === 'pendiente')
                                        <button onclick="aprobarSolicitud({{ $solicitud['id'] }}, '{{ $solicitud['tipo_solicitud'] }}')" 
                                                class="text-green-600 hover:text-green-900 mr-3">
                                            Aprobar
                                        </button>
                                        <button onclick="rechazarSolicitud({{ $solicitud['id'] }}, '{{ $solicitud['tipo_solicitud'] }}')" 
                                                class="text-red-600 hover:text-red-900">
                                            Rechazar
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                        <p class="text-lg font-medium">No hay solicitudes en el historial</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function formatearRol(rol) {
    const roles = {
        'marketing': 'Marketing',
        'empleado': 'Empleado',
        'administrador': 'Administrador'
    };
    return roles[rol] || rol.charAt(0).toUpperCase() + rol.slice(1).replace(/_/g, ' ');
}

function verDetalleSolicitud(solicitud) {
    const fecha = new Date(solicitud.updated_at).toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
    const rolSolicitado = formatearRol(solicitud.rol_solicitado);
    
    let html = `
        <div class="text-left text-sm space-y-4">
            <div class="bg-slate-50 p-4 rounded-lg">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">
                            ${solicitud.name.charAt(0).toUpperCase()}
                        </span>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800">${solicitud.name} ${solicitud.apellido_paterno || ''} ${solicitud.apellido_materno || ''}</p>
                        <p class="text-xs text-slate-600">${solicitud.email}</p>
                        <p class="text-xs text-orange-600 font-medium mt-1">Rol solicitado: ${rolSolicitado}</p>
                        <p class="text-xs text-slate-500 mt-1">Fecha: ${fecha}</p>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <div>
                    <p class="text-xs font-semibold text-slate-700 mb-1">Motivo:</p>
                    <p class="text-xs text-slate-600 bg-slate-50 p-2 rounded">${solicitud.motivo || 'No especificado'}</p>
                </div>
                ${solicitud.experiencia ? `
                <div>
                    <p class="text-xs font-semibold text-slate-700 mb-1">Experiencia:</p>
                    <p class="text-xs text-slate-600 bg-slate-50 p-2 rounded">${solicitud.experiencia}</p>
                </div>
                ` : ''}
                ${solicitud.comentario_aprobacion ? `
                <div>
                    <p class="text-xs font-semibold text-green-700 mb-1">Comentario de aprobación:</p>
                    <p class="text-xs text-green-600 bg-green-50 p-2 rounded">${solicitud.comentario_aprobacion}</p>
                </div>
                ` : ''}
                ${solicitud.motivo_rechazo ? `
                <div>
                    <p class="text-xs font-semibold text-red-700 mb-1">Motivo de rechazo:</p>
                    <p class="text-xs text-red-600 bg-red-50 p-2 rounded">${solicitud.motivo_rechazo}</p>
                </div>
                ` : ''}
            </div>
        </div>
    `;
    
    Swal.fire({
        title: 'Detalle de Solicitud',
        html: html,
        width: 600,
        showConfirmButton: true,
        confirmButtonText: 'Cerrar',
        confirmButtonColor: '#f97316'
    });
}

async function aprobarSolicitud(usuarioId, tipoSolicitud) {
    const { value: comentario } = await Swal.fire({
        title: 'Aprobar Solicitud',
        input: 'textarea',
        inputLabel: 'Comentario (opcional)',
        inputPlaceholder: 'Agrega un comentario sobre la aprobación...',
        inputAttributes: {
            'aria-label': 'Comentario sobre la aprobación'
        },
        showCancelButton: true,
        confirmButtonText: 'Aprobar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#10b981',
        cancelButtonColor: '#6b7280'
    });

    if (comentario !== undefined) {
        try {
            let url;
            if (tipoSolicitud === 'marketing') {
                url = `{{ url('kibi/solicitudes-marketing') }}/${usuarioId}/aprobar`;
            } else {
                url = `{{ url('kibi/solicitudes-roles') }}/${usuarioId}/aprobar`;
            }
            
            const response = await fetch(url, {
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
                    text: data.message || 'La solicitud ha sido aprobada exitosamente.',
                    icon: 'success',
                    confirmButtonColor: '#10b981'
                }).then(() => {
                    window.location.reload();
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
                text: 'Hubo un problema al procesar la solicitud.',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}

async function rechazarSolicitud(usuarioId, tipoSolicitud) {
    const { value: motivo } = await Swal.fire({
        title: 'Rechazar Solicitud',
        input: 'textarea',
        inputLabel: 'Motivo del rechazo',
        inputPlaceholder: 'Explica el motivo del rechazo...',
        inputAttributes: {
            'aria-label': 'Motivo del rechazo'
        },
        showCancelButton: true,
        confirmButtonText: 'Rechazar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        inputValidator: (value) => {
            if (!value) {
                return 'Debes ingresar un motivo para el rechazo';
            }
        }
    });

    if (motivo) {
        try {
            let url;
            if (tipoSolicitud === 'marketing') {
                url = `{{ url('kibi/solicitudes-marketing') }}/${usuarioId}/rechazar`;
            } else {
                url = `{{ url('kibi/solicitudes-roles') }}/${usuarioId}/rechazar`;
            }
            
            const response = await fetch(url, {
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
                    text: data.message || 'La solicitud ha sido rechazada.',
                    icon: 'info',
                    confirmButtonColor: '#ef4444'
                }).then(() => {
                    window.location.reload();
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
                text: 'Hubo un problema al procesar la solicitud.',
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}
</script>
@endpush

@endsection

