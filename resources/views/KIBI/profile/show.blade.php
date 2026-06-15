@extends('KIBI.layouts.auth')

@section('title', 'Mi Perfil - KIBI Educación')

@section('content')
<div class="min-h-[60vh] bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Breadcrumbs -->
        <nav class="mb-4 text-sm" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-slate-500">
                <li><a href="{{ route('soluciones.kibi') }}" class="hover:text-slate-700">Inicio</a></li>
                <li class="material-icons text-xs">chevron_right</li>
                <li><a href="{{ route('kibi.dashboard') }}" class="hover:text-slate-700">Dashboard</a></li>
                <li class="material-icons text-xs">chevron_right</li>
                <li class="text-slate-700 font-medium" aria-current="page">Mi Perfil</li>
            </ol>
        </nav>
        <!-- Hero / Header -->
        <div class="relative overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm mb-8">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 via-blue-500/10 to-indigo-500/10"></div>
            <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between p-6 md:p-8">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 text-white font-bold text-xl flex items-center justify-center ring-8 ring-white mr-4">
                        {{ strtoupper(substr(auth('kibi')->user()->name, 0, 1)) }}{{ strtoupper(substr(auth('kibi')->user()->apellido_paterno ?? '', 0, 1)) }}
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">Mi Perfil</h1>
                        <p class="text-slate-600">Información de tu cuenta en KIBI Educación</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 flex items-center gap-3">
                    <a href="{{ route('kibi.dashboard') }}" class="inline-flex items-center h-10 px-4 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition">
                        <span class="material-icons text-base mr-2">dashboard</span>
                        Dashboard
                    </a>
                    <a href="{{ route('kibi.profile.edit') }}" class="inline-flex items-center h-10 px-4 rounded-xl bg-slate-900 text-white hover:bg-slate-800 transition">
                        <span class="material-icons text-base mr-2">edit</span>
                        Editar perfil
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1">
                <div class="relative overflow-hidden bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-blue-600/5"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl">
                            {{ strtoupper(substr(auth('kibi')->user()->name, 0, 1)) }}{{ strtoupper(substr(auth('kibi')->user()->apellido_paterno ?? '', 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-slate-900 font-semibold leading-tight">{{ auth('kibi')->user()->name }} {{ auth('kibi')->user()->apellido_paterno ?? '' }} {{ auth('kibi')->user()->apellido_materno ?? '' }}</div>
                            <div class="text-slate-500 text-sm">{{ auth('kibi')->user()->email }}</div>
                        </div>
                    </div>
                    <div class="relative mt-6 grid grid-cols-2 gap-3 text-sm">
                        <div class="rounded-xl border border-slate-200 p-3 bg-slate-50">
                            <div class="text-slate-500">Rol</div>
                            <div class="text-slate-900 font-medium">{{ optional(auth('kibi')->user()->tipoUsuario)->nombre ?? 'Usuario' }}</div>
                        </div>
                        <div class="rounded-xl border border-slate-200 p-3 bg-slate-50">
                            <div class="text-slate-500">Estado</div>
                            <div class="text-emerald-700 font-medium">Activo</div>
                        </div>
                    </div>

                    <!-- Perfil completado -->
                    @php
                        $user = auth('kibi')->user();
                        $fields = [
                            !empty($user->name),
                            !empty($user->apellido_paterno),
                            !empty($user->apellido_materno),
                            !empty($user->email),
                            !empty(optional($user->tipoUsuario)->nombre),
                        ];
                        $completed = (int) (array_sum($fields) / count($fields) * 100);
                    @endphp
                    <div class="relative mt-6">
                        <div class="flex items-center justify-between mb-2 text-xs">
                            <span class="text-slate-600">Completitud del perfil</span>
                            <span class="font-semibold text-slate-700">{{ $completed }}%</span>
                        </div>
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-cyan-500 to-blue-600" style="width: {{ $completed }}%"></div>
                        </div>
                        <p class="mt-2 text-[11px] text-slate-500">Completa tus apellidos y rol para mejorar tu experiencia educativa.</p>
                    </div>

                    <!-- Solicitar Rol Section (para empleados y usuarios sin roles avanzados) -->
                    @php
                        $user = auth('kibi')->user();
                        $rolesKibi = ['marketing', 'empleado', 'administrador'];
                        $tieneRolAvanzado = $user->tipoUsuario && in_array($user->tipoUsuario->nombre, $rolesKibi);
                    @endphp
                    @if(auth('kibi')->check() && !$tieneRolAvanzado && !auth('kibi')->user()->isAdmin())
                        <div class="relative mt-6 overflow-hidden rounded-2xl border border-pink-200 bg-gradient-to-br from-pink-50 to-purple-50 shadow-sm">
                            <div class="absolute inset-0 bg-gradient-to-r from-pink-600/5 to-purple-600/5"></div>
                            <div class="relative p-5">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="w-10 h-10 bg-gradient-to-r from-pink-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-sm font-bold text-pink-900">Solicitar Rol Adicional</h3>
                                        <p class="text-xs text-pink-700 mt-0.5">Obtén más permisos y acceso</p>
                                    </div>
                                </div>
                                
                                @if($user->solicitud_rol === 'pendiente')
                                    <div class="mt-3 p-3 bg-yellow-50 rounded-xl border border-yellow-200">
                                        <div class="flex items-center justify-center mb-1">
                                            <svg class="w-4 h-4 text-yellow-600 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-yellow-700 text-xs font-medium">Solicitud Pendiente</span>
                                        </div>
                                        <p class="text-yellow-600 text-[10px] text-center">Rol solicitado: {{ ucfirst(str_replace('_', ' ', $user->rol_solicitado ?? 'N/A')) }}</p>
                                        <p class="text-yellow-600 text-[10px] text-center mt-1">Revisando tu solicitud</p>
                                    </div>
                                @elseif($user->solicitud_rol === 'rechazada')
                                    <div class="mt-3 p-3 bg-red-50 rounded-xl border border-red-200">
                                        <div class="flex items-center justify-center mb-1">
                                            <svg class="w-4 h-4 text-red-600 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            <span class="text-red-700 text-xs font-medium">Solicitud Rechazada</span>
                                        </div>
                                        <p class="text-red-600 text-[10px] text-center">Rol solicitado: {{ ucfirst(str_replace('_', ' ', $user->rol_solicitado ?? 'N/A')) }}</p>
                                        @if($user->motivo_rechazo_rol)
                                            <p class="text-red-600 text-[10px] text-center mt-1">{{ \Illuminate\Support\Str::limit($user->motivo_rechazo_rol, 50) }}</p>
                                        @endif
                                    </div>
                                @endif

                                @if($user->solicitud_rol !== 'pendiente' && $user->solicitud_rol !== 'aprobada')
                                <button onclick="solicitarRol()"
                                       class="mt-4 w-full px-4 py-2.5 bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 text-white rounded-xl transition-all duration-200 font-semibold text-xs text-center transform hover:scale-105 shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                    <span>{{ $user->solicitud_rol === 'rechazada' ? 'Solicitar Nuevamente' : 'Solicitar Rol' }}</span>
                                </button>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="overflow-hidden bg-white border border-slate-200 rounded-2xl shadow-sm">
                    <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
                        <h2 class="text-base font-semibold text-slate-900">Datos de la cuenta</h2>
                        <a href="{{ route('kibi.profile.edit') }}" class="text-sm text-slate-600 hover:text-slate-900 inline-flex items-center">
                            <span class="material-icons text-sm mr-1">edit</span>
                            Editar
                        </a>
                    </div>
                    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div class="rounded-xl p-4 bg-gradient-to-br from-slate-50 to-white border border-slate-200">
                            <div class="text-slate-500">Nombre</div>
                            <div class="text-slate-900 font-medium">{{ auth('kibi')->user()->name }}</div>
                        </div>
                        <div class="rounded-xl p-4 bg-gradient-to-br from-slate-50 to-white border border-slate-200">
                            <div class="text-slate-500">Apellido paterno</div>
                            <div class="text-slate-900 font-medium">{{ auth('kibi')->user()->apellido_paterno ?? '—' }}</div>
                        </div>
                        <div class="rounded-xl p-4 bg-gradient-to-br from-slate-50 to-white border border-slate-200">
                            <div class="text-slate-500">Apellido materno</div>
                            <div class="text-slate-900 font-medium">{{ auth('kibi')->user()->apellido_materno ?? '—' }}</div>
                        </div>
                        <div class="rounded-xl p-4 bg-gradient-to-br from-slate-50 to-white border border-slate-200 sm:col-span-2">
                            <div class="text-slate-500">Correo</div>
                            <div class="text-slate-900 font-medium">{{ auth('kibi')->user()->email }}</div>
                        </div>
                    </div>
                </div>

                <!-- Resumen educativo / KPI de aprendizaje -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="absolute -top-8 -right-6 w-24 h-24 rounded-full bg-cyan-50"></div>
                        <div class="relative flex items-center justify-between">
                            <div>
                                <p class="text-xs uppercase tracking-wide text-slate-500">Cursos activos</p>
                                <p class="mt-1 text-2xl font-extrabold text-slate-900">0</p>
                            </div>
                            <span class="material-icons text-cyan-600">school</span>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="absolute -top-8 -right-6 w-24 h-24 rounded-full bg-indigo-50"></div>
                        <div class="relative flex items-center justify-between">
                            <div>
                                <p class="text-xs uppercase tracking-wide text-slate-500">Lecciones completadas</p>
                                <p class="mt-1 text-2xl font-extrabold text-slate-900">0</p>
                            </div>
                            <span class="material-icons text-indigo-600">task_alt</span>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="absolute -top-8 -right-6 w-24 h-24 rounded-full bg-amber-50"></div>
                        <div class="relative flex items-center justify-between">
                            <div>
                                <p class="text-xs uppercase tracking-wide text-slate-500">Horas de estudio</p>
                                <p class="mt-1 text-2xl font-extrabold text-slate-900">0h</p>
                            </div>
                            <span class="material-icons text-amber-600">schedule</span>
                        </div>
                    </div>
                </div>

                <!-- Sugerencias / Callout educativo -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-br from-slate-50 to-white shadow-sm">
                    <div class="p-5 flex items-start">
                        <div class="mr-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-100 text-cyan-700">
                            <span class="material-icons">lightbulb</span>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Mejora tu experiencia</h3>
                            <p class="mt-1 text-sm text-slate-600">Completa tu perfil y mantiene tu contraseña actualizada para acceder a certificados y recomendaciones personalizadas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
async function solicitarRol() {
    const rolesKibi = {
        'marketing': 'Marketing - Acceso completo a campañas, contactos y usuarios',
        'empleado': 'Empleado - Acceso básico a KIBI',
        'administrador': 'Administrador - Acceso completo al sistema'
    };

    const { value: formValues } = await Swal.fire({
        title: 'Solicitar Rol Adicional',
        width: 700,
        html: `
            <div class="text-left text-sm">
                <div class="mb-4">
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Rol a solicitar <span class="text-red-500">*</span></label>
                    <select id="rol_solicitado" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-pink-500/50">
                        <option value="">Selecciona un rol...</option>
                        <option value="marketing">Marketing</option>
                        <option value="empleado">Empleado</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Motivo de la solicitud <span class="text-red-500">*</span></label>
                    <textarea id="motivo_solicitud_rol" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-pink-500/50" rows="4" placeholder="¿Por qué quieres obtener este rol en KIBI?"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-xs font-semibold text-slate-700 mb-2">Experiencia y conocimientos <span class="text-red-500">*</span></label>
                    <textarea id="experiencia_solicitud_rol" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-pink-500/50" rows="4" placeholder="Describe tu experiencia y conocimientos relacionados con este rol..."></textarea>
                </div>
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 text-xs text-blue-700" id="permisos-info" style="display: none;">
                    <p class="font-semibold mb-1">Permisos del rol:</p>
                    <p id="permisos-text" class="text-blue-600"></p>
                </div>
            </div>
        `,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Enviar Solicitud',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#ec4899',
        cancelButtonColor: '#6b7280',
        didOpen: () => {
            const rolSelect = document.getElementById('rol_solicitado');
            const permisosInfo = document.getElementById('permisos-info');
            const permisosText = document.getElementById('permisos-text');
            
            rolSelect.addEventListener('change', function() {
                const rolSeleccionado = this.value;
                if (rolSeleccionado && rolesKibi[rolSeleccionado]) {
                    permisosText.textContent = rolesKibi[rolSeleccionado];
                    permisosInfo.style.display = 'block';
                } else {
                    permisosInfo.style.display = 'none';
                }
            });
        },
        preConfirm: () => {
            const rolEl = document.getElementById('rol_solicitado');
            const motivoEl = document.getElementById('motivo_solicitud_rol');
            const experienciaEl = document.getElementById('experiencia_solicitud_rol');
            
            if (!rolEl || !motivoEl || !experienciaEl) {
                Swal.showValidationMessage('Error al obtener los campos del formulario');
                return false;
            }

            const rol = rolEl.value.trim();
            const motivo = motivoEl.value.trim();
            const experiencia = experienciaEl.value.trim();

            if (!rol) {
                Swal.showValidationMessage('Debes seleccionar un rol');
                return false;
            }

            if (!motivo) {
                Swal.showValidationMessage('El motivo de la solicitud es requerido');
                return false;
            }

            if (!experiencia) {
                Swal.showValidationMessage('La experiencia es requerida');
                return false;
            }

            return {
                rol_solicitado: rol,
                motivo_solicitud_rol: motivo,
                experiencia_solicitud_rol: experiencia
            };
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    if (formValues) {
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                             document.querySelector('input[name="_token"]')?.value;
            
            if (!csrfToken) {
                Swal.fire({
                    title: 'Error',
                    text: 'No se encontró el token de seguridad. Por favor recarga la página.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
                return;
            }

            const url = '{{ route("kibi.solicitar.rol") }}';
            
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(formValues),
                credentials: 'same-origin'
            });

            if (!response.ok) {
                let errorMessage = `Error HTTP ${response.status}`;
                try {
                    const errorData = await response.json();
                    errorMessage = errorData.message || errorData.error || errorMessage;
                } catch (e) {
                    const errorText = await response.text();
                    if (errorText) {
                        errorMessage = errorText.substring(0, 200);
                    }
                }
                throw new Error(errorMessage);
            }

            const data = await response.json();

            if (data.success) {
                Swal.fire({
                    title: '¡Solicitud Enviada!',
                    text: data.message || 'Tu solicitud ha sido enviada al equipo de marketing para su revisión.',
                    icon: 'success',
                    confirmButtonColor: '#ec4899'
                }).then(() => {
                    location.reload();
                });
            } else {
                let errorMessage = data.message || 'Hubo un problema al enviar la solicitud';
                if (data.errors) {
                    const errorList = Object.values(data.errors).flat().join(', ');
                    errorMessage = errorList || errorMessage;
                }
                
                Swal.fire({
                    title: 'Error',
                    html: errorMessage,
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        } catch (error) {
            console.error('Error al enviar solicitud:', error);
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al enviar la solicitud: ' + (error.message || 'Por favor intenta de nuevo.'),
                icon: 'error',
                confirmButtonColor: '#ef4444'
            });
        }
    }
}
</script>
@endpush
@endsection


