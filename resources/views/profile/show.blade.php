@extends('layouts.app')

@section('title', 'Mi Perfil - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Main Content -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-cyan-300">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors duration-300">Inicio</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li><a href="{{ route('dashboard') }}"
                            class="hover:text-white transition-colors duration-300">Dashboard</a></li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li class="text-slate-300">Mi Perfil</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Mi Perfil</h1>
                <p class="text-slate-300">Gestiona tu información personal y configuración de cuenta</p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-500/20 border border-green-500/50 rounded-xl p-4">
                    <div class="flex items-center">
                        <span class="material-icons text-green-400 mr-3">check_circle</span>
                        <p class="text-green-300">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Profile Card -->
                <div class="lg:col-span-1">
                    <div
                        class="bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-2xl p-6 shadow-2xl">
                        <!-- Avatar -->
                        <div class="text-center mb-6">
                            <div class="relative inline-block">
                                <div
                                    class="w-24 h-24 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-3xl text-white font-bold">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}{{ strtoupper(substr($user->apellido_paterno, 0, 1)) }}
                                    </span>
                                </div>
                                <div
                                    class="absolute -bottom-1 -right-1 w-8 h-8 bg-green-500 rounded-full border-4 border-slate-800 flex items-center justify-center">
                                    <span class="material-icons text-white text-sm">verified</span>
                                </div>
                            </div>
                            <h2 class="text-xl font-bold text-white">{{ $user->name }} {{ $user->apellido_paterno }}
                                {{ $user->apellido_materno }}</h2>
                            <p class="text-slate-400">{{ $user->email }}</p>
                            @if($user->tipoUsuario)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-cyan-500/20 text-cyan-400 border border-cyan-500/30 mt-2">
                                    <span class="material-icons text-xs mr-1">admin_panel_settings</span>
                                    {{ $user->tipoUsuario->nombre }}
                                </span>
                            @endif
                        </div>
                        <h2 class="text-xl font-bold text-white">{{ $user->name }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</h2>
                        <p class="text-slate-400">{{ $user->email }}</p>
                        @if($user->tipoUsuario)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-cyan-500/20 text-cyan-400 border border-cyan-500/30 mt-2">
                                <span class="material-icons text-xs mr-1">admin_panel_settings</span>
                                {{ $user->tipoUsuario->nombre }}
                            </span>
                        @endif

                        <!-- Solicitud de Creador -->
                        @if(!$user->isCreador() && !$user->isAdmin())
                            <div class="mt-4">
                                @if($user->solicitud_creador === 'pendiente')
                                    <div class="bg-yellow-500/20 border border-yellow-500/50 rounded-lg p-3 mb-3">
                                        <div class="flex items-center justify-center">
                                            <span class="material-icons text-yellow-400 text-sm mr-2">schedule</span>
                                            <span class="text-yellow-300 text-sm font-medium">Solicitud de Creador Pendiente</span>
                                        </div>
                                        <p class="text-yellow-200 text-xs mt-1 text-center">Esperando aprobación del administrador</p>
                                    </div>
                                @elseif($user->solicitud_creador === 'rechazada')
                                    <div class="bg-red-500/20 border border-red-500/50 rounded-lg p-3 mb-3">
                                        <div class="flex items-center justify-center">
                                            <span class="material-icons text-red-400 text-sm mr-2">cancel</span>
                                            <span class="text-red-300 text-sm font-medium">Solicitud Rechazada</span>
                                        </div>
                                        <p class="text-red-200 text-xs mt-1 text-center">Tu solicitud fue rechazada</p>
                                    </div>
                                    <button onclick="solicitarSerCreador()"
                                            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:scale-105 flex items-center justify-center">
                                        <span class="material-icons text-sm mr-2">refresh</span>
                                        Solicitar Nuevamente
                                    </button>
                                @else
                                    <button onclick="solicitarSerCreador()"
                                            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:scale-105 flex items-center justify-center">
                                        <span class="material-icons text-sm mr-2">add_circle</span>
                                        Solicitar ser Creador
                                    </button>
                                @endif
                            </div>
                        @endif
                    </div>

                        <!-- Stats -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-slate-700/50 rounded-xl">
                                <div class="flex items-center">
                                    <span class="material-icons text-blue-400 mr-3">article</span>
                                    <span class="text-slate-300">Artículos</span>
                                </div>
                                <span class="text-white font-semibold">{{ $user->articulos->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-slate-700/50 rounded-xl">
                                <div class="flex items-center">
                                    <span class="material-icons text-purple-400 mr-3">school</span>
                                    <span class="text-slate-300">Cursos</span>
                                </div>
                                <span class="text-white font-semibold">{{ $user->cursos->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-slate-700/50 rounded-xl">
                                <div class="flex items-center">
                                    <span class="material-icons text-green-400 mr-3">verified</span>
                                    <span class="text-slate-300">Certificados</span>
                                </div>
                                <span class="text-white font-semibold">{{ $user->certificados->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Information -->
                <div class="lg:col-span-2">
                    <div
                        class="bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-2xl p-6 shadow-2xl">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-white">Información Personal</h3>
                            <a href="{{ route('profile.edit') }}"
                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 text-white text-sm font-semibold rounded-lg hover:from-cyan-400 hover:to-blue-400 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-400/30">
                                <span class="material-icons text-sm mr-2">edit</span>
                                Editar Perfil
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Nombre</label>
                                <div class="p-3 bg-slate-700/50 rounded-xl">
                                    <p class="text-white">{{ $user->name }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Apellido Paterno</label>
                                <div class="p-3 bg-slate-700/50 rounded-xl">
                                    <p class="text-white">{{ $user->apellido_paterno }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Apellido Materno</label>
                                <div class="p-3 bg-slate-700/50 rounded-xl">
                                    <p class="text-white">{{ $user->apellido_materno }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Correo Electrónico</label>
                                <div class="p-3 bg-slate-700/50 rounded-xl">
                                    <p class="text-white">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Tipo de Usuario</label>
                                <div class="p-3 bg-slate-700/50 rounded-xl">
                                    <p class="text-white">
                                        {{ $user->tipoUsuario ? $user->tipoUsuario->nombre : 'No asignado' }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Estado de Verificación</label>
                                <div class="p-3 bg-slate-700/50 rounded-xl">
                                    <div class="flex items-center">
                                        @if($user->verificado)
                                            <span class="material-icons text-green-400 mr-2 text-sm">verified</span>
                                            <span class="text-green-400">Verificado</span>
                                        @else
                                            <span class="material-icons text-yellow-400 mr-2 text-sm">pending</span>
                                            <span class="text-yellow-400">Pendiente</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Miembro desde</label>
                                <div class="p-3 bg-slate-700/50 rounded-xl">
                                    <p class="text-white">{{ $user->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Última actualización</label>
                                <div class="p-3 bg-slate-700/50 rounded-xl">
                                    <p class="text-white">{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Change Password Card -->
                    <div
                        class="mt-6 bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-2xl p-6 shadow-2xl">
                        <h3 class="text-xl font-bold text-white mb-4">Cambiar Contraseña</h3>
                        <form method="POST" action="{{ route('profile.password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="current_password"
                                        class="block text-sm font-medium text-slate-400 mb-2">Contraseña Actual</label>
                                    <input type="password" id="current_password" name="current_password" required
                                        class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-colors">
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-slate-400 mb-2">Nueva
                                        Contraseña</label>
                                    <input type="password" id="password" name="password" required
                                        class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-colors">
                                </div>
                                <div>
                                    <label for="password_confirmation"
                                        class="block text-sm font-medium text-slate-400 mb-2">Confirmar Nueva
                                        Contraseña</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                        class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-colors">
                                </div>
                                <div class="flex items-end">
                                    <button type="submit"
                                        class="w-full inline-flex items-center justify-center px-4 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-sm font-semibold rounded-lg hover:from-green-400 hover:to-emerald-400 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-green-400/30">
                                        <span class="material-icons text-sm mr-2">lock</span>
                                        Actualizar Contraseña
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
async function solicitarSerCreador() {
    const { value: formValues } = await Swal.fire({
        title: 'Solicitar ser Creador de Contenido',
        width: 900,
        html: `
            <div class="text-left text-[12.5px] max-h-[26rem] overflow-y-auto pr-1">
                <!-- Sección: Información básica -->
                <div class="flex items-center gap-2 mb-2">
                    <span class="material-icons text-xs text-purple-400">info</span>
                    <h4 class="text-slate-200 font-semibold">Información básica</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                    <div class="md:col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Motivo de la solicitud <span class="text-red-400">*</span></label>
                        <textarea id="motivo" class="w-full px-3 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50" rows="3" placeholder="¿Por qué quieres ser creador en SoftLinkIA?"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Experiencia previa</label>
                        <textarea id="experiencia" class="w-full px-3 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50" rows="2" placeholder="Resume tu experiencia en enseñanza o creación de contenido"></textarea>
                    </div>
                </div>
                <!-- Sección: Perfil profesional -->
                <div class="flex items-center gap-2 mb-2 mt-1">
                    <span class="material-icons text-xs text-cyan-400">badge</span>
                    <h4 class="text-slate-200 font-semibold">Perfil profesional</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
                    <div class="md:col-span-1">
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Categoría principal</label>
                        <div class="relative">
                            <span class="material-icons text-[15px] text-slate-400 absolute left-2 top-1.5">category</span>
                            <select id="categoria" class="w-full pl-8 pr-3 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 focus:outline-none focus:ring-2 focus:ring-purple-500/50">
                                <option value="">Selecciona</option>
                                <option>Software</option>
                                <option>Diseño</option>
                                <option>Ciberseguridad</option>
                                <option>Otros</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Dedicación (horas/sem)</label>
                        <div class="relative">
                            <span class="material-icons text-[15px] text-slate-400 absolute left-2 top-1.5">schedule</span>
                            <input id="horas" type="number" min="1" max="80" placeholder="6" class="w-full pl-8 pr-3 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50" />
                        </div>
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Disponibilidad</label>
                        <div class="relative">
                            <span class="material-icons text-[15px] text-slate-400 absolute left-2 top-1.5">event_available</span>
                            <select id="disponibilidad" class="w-full pl-8 pr-3 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 focus:outline-none focus:ring-2 focus:ring-purple-500/50">
                                <option value="">Selecciona</option>
                                <option>Tiempo parcial</option>
                                <option>Tiempo completo</option>
                                <option>Fines de semana</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Sección: Redes y portafolio -->
                <div class="flex items-center gap-2 mb-2 mt-1">
                    <span class="material-icons text-xs text-amber-400">link</span>
                    <h4 class="text-slate-200 font-semibold">Redes y portafolio</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Portafolio</label>
                        <div class="relative">
                            <span class="material-icons text-[15px] text-slate-400 absolute left-2 top-1.5">web</span>
                            <input id="portafolio" type="url" placeholder="https://mi-portafolio.com" class="w-full pl-8 pr-3 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">LinkedIn</label>
                        <div class="relative">
                            <span class="material-icons text-[15px] text-slate-400 absolute left-2 top-1.5">work</span>
                            <input id="linkedin" type="url" placeholder="https://linkedin.com/in/usuario" class="w-full pl-8 pr-3 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Twitter/X</label>
                        <div class="relative">
                            <span class="material-icons text-[15px] text-slate-400 absolute left-2 top-1.5">alternate_email</span>
                            <input id="twitter" type="url" placeholder="https://x.com/usuario" class="w-full pl-8 pr-3 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50" />
                        </div>
                    </div>
                </div>
                <div class="mt-3 flex items-start gap-2">
                    <input id="acepta" type="checkbox" class="mt-0.5 accent-purple-500">
                    <label for="acepta" class="text-[11.5px] text-slate-300">Acepto que un administrador revise mi perfil y valide mi solicitud.</label>
                </div>
            </div>
        `,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Enviar Solicitud',
        cancelButtonText: 'Cancelar',
        background: '#0f172a',
        color: '#e2e8f0',
        confirmButtonColor: '#8b5cf6',
        cancelButtonColor: '#475569',
        customClass: {
            popup: 'border border-slate-700 rounded-2xl',
            title: 'text-slate-100',
            htmlContainer: 'text-slate-300'
        },
        preConfirm: () => {
            const motivo = (document.getElementById('motivo')?.value || '').trim();
            const experiencia = (document.getElementById('experiencia')?.value || '').trim();
            const acepta = document.getElementById('acepta')?.checked;
            if (!motivo) { Swal.showValidationMessage('El motivo es requerido'); return false; }
            if (!acepta) { Swal.showValidationMessage('Debes aceptar la revisión del administrador'); return false; }
            return {
                motivo,
                experiencia,
                categoria: document.getElementById('categoria')?.value || null,
                portafolio: document.getElementById('portafolio')?.value || null,
                linkedin: document.getElementById('linkedin')?.value || null,
                twitter: document.getElementById('twitter')?.value || null,
                horas: document.getElementById('horas')?.value || null,
                disponibilidad: document.getElementById('disponibilidad')?.value || null,
            };
        }
    });

    if (formValues) {
        try {
            const response = await fetch('{{ route("profile.solicitar-creador") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    motivo: formValues.motivo,
                    experiencia: formValues.experiencia,
                    extra: {
                        categoria: formValues.categoria,
                        portafolio: formValues.portafolio,
                        linkedin: formValues.linkedin,
                        twitter: formValues.twitter,
                        horas: formValues.horas,
                        disponibilidad: formValues.disponibilidad,
                    }
                })
            });

            if (!response.ok) {
                let errText = 'Error al enviar la solicitud';
                try {
                    const ejson = await response.json();
                    if (ejson?.message) errText = ejson.message;
                    if (ejson?.errors) {
                        const first = Object.values(ejson.errors)[0];
                        if (first && first[0]) errText = first[0];
                    }
                } catch (_) {
                    const t = await response.text();
                    if (t) errText = t.substring(0, 200);
                }
                throw new Error(errText);
            }

            const data = await response.json();

            if (data.success) {
                Swal.fire({ title: '¡Solicitud Enviada!', text: 'Tu solicitud ha sido enviada al administrador para su revisión.', icon: 'success', background: '#0f172a', color: '#e2e8f0', confirmButtonColor: '#8b5cf6' }).then(() => location.reload());
            } else {
                Swal.fire({ title: 'Error', text: data.message || 'Hubo un problema al enviar la solicitud', icon: 'error', background: '#0f172a', color: '#e2e8f0', confirmButtonColor: '#ef4444' });
            }
        } catch (error) {
            Swal.fire({ title: 'Error', text: error?.message || 'Hubo un problema de conexión. Inténtalo de nuevo.', icon: 'error', background: '#0f172a', color: '#e2e8f0', confirmButtonColor: '#ef4444' });
        }
    }
}
</script>
@endpush

@endsection
