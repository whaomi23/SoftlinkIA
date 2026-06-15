@extends('layouts.app')

@section('title', 'Perfil de Usuario - ' . ($usuario->name ?? 'Usuario'))

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23334155" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
        
        <main class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Header -->
            <div class="relative overflow-hidden">
                <div class="relative backdrop-blur-sm bg-slate-800/40 border border-slate-700/50 rounded-3xl p-8 mb-8 shadow-2xl">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="flex items-center gap-6">
                            <!-- Avatar with enhanced design -->
                            <div class="relative group">
                                <div class="absolute -inset-2 rounded-3xl bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500 opacity-75 blur group-hover:opacity-100 transition-all duration-300"></div>
                                <div class="relative bg-gradient-to-br from-slate-800 to-slate-900 p-6 rounded-3xl border border-slate-600/50 shadow-xl">
                                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg">
                                        <span class="material-icons text-white text-3xl">person</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-white via-cyan-100 to-blue-100 bg-clip-text text-transparent">
                                    {{ $usuario->name }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}
                                </h1>
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-slate-400 text-sm">email</span>
                                    <p class="text-slate-300 text-sm break-all lg:break-normal">{{ $usuario->email }}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-slate-400 text-sm">schedule</span>
                                    <p class="text-slate-400 text-xs">Miembro desde {{ optional($usuario->created_at)->format('M Y') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row lg:flex-col items-start sm:items-center lg:items-end gap-4">
                            <div class="text-center lg:text-right">
                                <p class="text-xs text-slate-400 uppercase tracking-wider font-medium">Rol de Usuario</p>
                                <div class="mt-2 px-4 py-2 bg-gradient-to-r from-emerald-500/20 to-cyan-500/20 border border-emerald-400/30 rounded-xl flex items-center justify-center gap-2">
                                    @php
                                        $rolNombre = optional($usuario->tipoUsuario)->nombre ?? 'N/A';
                                        $icono = match(strtolower($rolNombre)) {
                                            'administrador', 'admin' => 'admin_panel_settings',
                                            'creador', 'creador de contenido' => 'create',
                                            'estudiante', 'usuario estudiante' => 'school',
                                            default => 'person'
                                        };
                                        $color = match(strtolower($rolNombre)) {
                                            'administrador', 'admin' => 'text-red-300',
                                            'creador', 'creador de contenido' => 'text-purple-300',
                                            'estudiante', 'usuario estudiante' => 'text-blue-300',
                                            default => 'text-emerald-300'
                                        };
                                    @endphp
                                    <span class="material-icons {{ $color }} text-sm">{{ $icono }}</span>
                                    <p class="text-emerald-300 font-semibold text-sm">{{ $rolNombre }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 mt-4">
                <!-- Artículos Card -->
                <div class="group relative overflow-hidden">
                    <div class="relative backdrop-blur-sm bg-slate-800/60 border border-emerald-500/20 rounded-2xl p-6 hover:border-emerald-400/40 transition-all duration-300 hover:shadow-xl hover:shadow-emerald-500/10">
                        <div class="flex items-center justify-between">
                            <div class="space-y-2">
                                <p class="text-slate-400 text-sm font-medium">Artículos Publicados</p>
                                <p class="text-4xl font-bold bg-gradient-to-r from-emerald-400 to-green-300 bg-clip-text text-transparent">{{ $usuario->articulos_count }}</p>
                                <div class="flex items-center gap-1">
                                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                                    <p class="text-emerald-300 text-xs font-medium">Activos</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-emerald-400/20 to-green-500/20 rounded-xl blur-sm"></div>
                                <div class="relative bg-gradient-to-br from-emerald-500/30 to-green-600/30 p-4 rounded-xl border border-emerald-400/30">
                                    <span class="material-icons text-emerald-300 text-2xl">article</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cursos Card -->
                <div class="group relative overflow-hidden">
                    <div class="relative backdrop-blur-sm bg-slate-800/60 border border-indigo-500/20 rounded-2xl p-6 hover:border-indigo-400/40 transition-all duration-300 hover:shadow-xl hover:shadow-indigo-500/10">
                        <div class="flex items-center justify-between">
                            <div class="space-y-2">
                                <p class="text-slate-400 text-sm font-medium">Cursos Completados</p>
                                <p class="text-4xl font-bold bg-gradient-to-r from-indigo-400 to-blue-300 bg-clip-text text-transparent">{{ $usuario->cursos_count }}</p>
                                <div class="flex items-center gap-1">
                                    <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></div>
                                    <p class="text-indigo-300 text-xs font-medium">En progreso</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-indigo-400/20 to-blue-500/20 rounded-xl blur-sm"></div>
                                <div class="relative bg-gradient-to-br from-indigo-500/30 to-blue-600/30 p-4 rounded-xl border border-indigo-400/30">
                                    <span class="material-icons text-indigo-300 text-2xl">school</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificados Card -->
                <div class="group relative overflow-hidden">
                    <div class="relative backdrop-blur-sm bg-slate-800/60 border border-amber-500/20 rounded-2xl p-6 hover:border-amber-400/40 transition-all duration-300 hover:shadow-xl hover:shadow-amber-500/10">
                        <div class="flex items-center justify-between">
                            <div class="space-y-2">
                                <p class="text-slate-400 text-sm font-medium">Certificados Obtenidos</p>
                                <p class="text-4xl font-bold bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">{{ $usuario->certificados_count }}</p>
                                <div class="flex items-center gap-1">
                                    <div class="w-2 h-2 bg-amber-400 rounded-full animate-pulse"></div>
                                    <p class="text-amber-300 text-xs font-medium">Verificados</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-amber-400/20 to-yellow-500/20 rounded-xl blur-sm"></div>
                                <div class="relative bg-gradient-to-br from-amber-500/30 to-yellow-600/30 p-4 rounded-xl border border-amber-400/30">
                                    <span class="material-icons text-amber-300 text-2xl">verified</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Content Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Artículos Section -->
                <div class="group relative overflow-hidden">
                    <div class="relative backdrop-blur-sm bg-slate-800/60 border border-slate-600/30 rounded-2xl p-6 hover:border-cyan-400/40 transition-all duration-300">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white flex items-center gap-3">
                                <div class="bg-gradient-to-r from-cyan-500/20 to-blue-500/20 p-2 rounded-lg border border-cyan-400/30">
                                    <span class="material-icons text-cyan-300">article</span>
                                </div>
                                <span class="bg-gradient-to-r from-white to-cyan-100 bg-clip-text text-transparent">Últimos Artículos</span>
                            </h2>
                            <div class="flex items-center gap-2 px-3 py-1 bg-cyan-500/10 border border-cyan-400/20 rounded-full">
                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></div>
                                <span class="text-cyan-300 text-xs font-medium">{{ $ultimosArticulos->count() }} artículos</span>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            @forelse($ultimosArticulos as $a)
                                <a href="{{ route('admin.articulos.show', $a->id) }}"
                                    class="group/item block p-4 rounded-xl border border-slate-600/30 hover:border-cyan-400/40 hover:bg-gradient-to-r hover:from-cyan-500/5 hover:to-blue-500/5 transition-all duration-300">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-slate-200 font-medium text-sm truncate group-hover/item:text-cyan-100 transition-colors">{{ $a->titulo }}</p>
                                            <div class="flex items-center gap-3 mt-2">
                                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-slate-700/50 border border-slate-600/50 rounded-md">
                                                    <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></div>
                                                    <span class="text-slate-300 text-xs">{{ ucfirst($a->status) }}</span>
                                                </span>
                                                <span class="text-slate-500 text-xs">{{ optional($a->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-3 opacity-0 group-hover/item:opacity-100 transition-opacity">
                                            <span class="material-icons text-cyan-400 text-lg">arrow_forward</span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-8">
                                    <div class="w-16 h-16 bg-slate-700/50 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <span class="material-icons text-slate-500 text-2xl">article</span>
                                    </div>
                                    <p class="text-slate-500 text-sm">Sin artículos recientes</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Cursos Section -->
                <div class="group relative overflow-hidden">
                    <div class="relative backdrop-blur-sm bg-slate-800/60 border border-slate-600/30 rounded-2xl p-6 hover:border-indigo-400/40 transition-all duration-300">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white flex items-center gap-3">
                                <div class="bg-gradient-to-r from-indigo-500/20 to-purple-500/20 p-2 rounded-lg border border-indigo-400/30">
                                    <span class="material-icons text-indigo-300">school</span>
                                </div>
                                <span class="bg-gradient-to-r from-white to-indigo-100 bg-clip-text text-transparent">Últimos Cursos</span>
                            </h2>
                            <div class="flex items-center gap-2 px-3 py-1 bg-indigo-500/10 border border-indigo-400/20 rounded-full">
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></div>
                                <span class="text-indigo-300 text-xs font-medium">{{ $ultimosCursos->count() }} cursos</span>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            @forelse($ultimosCursos as $c)
                                <a href="{{ route('admin.cursos.edit', $c->id) }}"
                                    class="group/item block p-4 rounded-xl border border-slate-600/30 hover:border-indigo-400/40 hover:bg-gradient-to-r hover:from-indigo-500/5 hover:to-purple-500/5 transition-all duration-300">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-slate-200 font-medium text-sm truncate group-hover/item:text-indigo-100 transition-colors">{{ $c->titulo }}</p>
                                            <div class="flex items-center gap-3 mt-2">
                                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-slate-700/50 border border-slate-600/50 rounded-md">
                                                    <div class="w-1.5 h-1.5 {{ $c->activo ? 'bg-emerald-400' : 'bg-red-400' }} rounded-full"></div>
                                                    <span class="text-slate-300 text-xs">{{ $c->activo ? 'Activo' : 'Inactivo' }}</span>
                                                </span>
                                                <span class="text-slate-500 text-xs">{{ optional($c->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-3 opacity-0 group-hover/item:opacity-100 transition-opacity">
                                            <span class="material-icons text-indigo-400 text-lg">arrow_forward</span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-8">
                                    <div class="w-16 h-16 bg-slate-700/50 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <span class="material-icons text-slate-500 text-2xl">school</span>
                                    </div>
                                    <p class="text-slate-500 text-sm">Sin cursos recientes</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Certificados Section -->
            <div class="group relative overflow-hidden mt-6">
                <div class="relative backdrop-blur-sm bg-slate-800/60 border border-slate-600/30 rounded-2xl p-6 hover:border-amber-400/40 transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white flex items-center gap-3">
                            <div class="bg-gradient-to-r from-amber-500/20 to-yellow-500/20 p-2 rounded-lg border border-amber-400/30">
                                <span class="material-icons text-amber-300">verified</span>
                            </div>
                            <span class="bg-gradient-to-r from-white to-amber-100 bg-clip-text text-transparent">Últimos Certificados</span>
                        </h2>
                        <div class="flex items-center gap-2 px-3 py-1 bg-amber-500/10 border border-amber-400/20 rounded-full">
                            <div class="w-2 h-2 bg-amber-400 rounded-full animate-pulse"></div>
                            <span class="text-amber-300 text-xs font-medium">{{ $ultimosCertificados->count() }} certificados</span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @forelse($ultimosCertificados as $cert)
                            <a href="{{ route('certificados.show', $cert->id) }}"
                                class="group/cert block p-5 rounded-xl border border-slate-600/30 hover:border-amber-400/40 hover:bg-gradient-to-br hover:from-amber-500/5 hover:to-yellow-500/5 transition-all duration-300">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-amber-500/20 to-yellow-500/20 rounded-lg flex items-center justify-center border border-amber-400/30">
                                                <span class="material-icons text-amber-300 text-sm">verified</span>
                                            </div>
                                            <div>
                                                <p class="text-slate-200 font-medium text-sm group-hover/cert:text-amber-100 transition-colors">
                                                    Código: <span class="font-mono text-amber-300">{{ $cert->codigo_unico }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="space-y-2">
                                            <div class="flex items-center gap-2">
                                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-slate-700/50 border border-slate-600/50 rounded-md">
                                                    <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></div>
                                                    <span class="text-slate-300 text-xs">{{ ucfirst($cert->status) }}</span>
                                                </span>
                                                <span class="text-slate-500 text-xs">{{ optional($cert->created_at)->diffForHumans() }}</span>
                                            </div>
                                            
                                            @if($cert->curso)
                                                <div class="flex items-center gap-2">
                                                    <span class="material-icons text-slate-500 text-sm">school</span>
                                                    <p class="text-slate-400 text-xs truncate">{{ $cert->curso->titulo }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="ml-3 opacity-0 group-hover/cert:opacity-100 transition-opacity">
                                        <span class="material-icons text-amber-400 text-lg">arrow_forward</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <div class="w-20 h-20 bg-slate-700/50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="material-icons text-slate-500 text-3xl">verified</span>
                                </div>
                                <p class="text-slate-500 text-sm">Sin certificados recientes</p>
                                <p class="text-slate-600 text-xs mt-1">Los certificados obtenidos aparecerán aquí</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection