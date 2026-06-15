@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden min-h-[50vh] sm:min-h-[60vh] lg:min-h-[70vh]">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=1920&h=1080&fit=crop&crop=center"
             alt="Gestión de Usuarios"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/50 via-blue-900/40 to-cyan-900/50"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-purple-900/20 via-transparent to-cyan-500/15"></div>
        <div class="absolute inset-0 bg-black/5"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-24 xl:py-32">
        <div class="text-center mb-6 sm:mb-8">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-4 sm:mb-6 lg:mb-8 drop-shadow-2xl">
                Gestión de Usuarios
            </h1>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl text-white/90 max-w-4xl mx-auto leading-relaxed px-4 drop-shadow-lg">
                Administra y supervisa todos los usuarios del sistema de manera eficiente
            </p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <!-- Total de Usuarios -->
            <div class="bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 border border-white/10 rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg ring-1 ring-white/20">
                    <i class="fas fa-users text-4xl text-white drop-shadow"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">{{ $usuarios->total() }}</h3>
                <p class="text-slate-300">Total de Usuarios</p>
            </div>

            <!-- Usuarios Activos -->
            <div class="bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 border border-white/10 rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-400 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg ring-1 ring-white/20">
                    <i class="fas fa-user-circle text-4xl text-white drop-shadow"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">{{ $usuarios->where('status', 'activo')->count() }}</h3>
                <p class="text-slate-300">Usuarios Activos</p>
            </div>

            <!-- Usuarios Verificados -->
            <div class="bg-gradient-to-br from-purple-600/20 via-pink-500/10 to-rose-600/20 border border-white/10 rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-400 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg ring-1 ring-white/20">
                    <i class="fas fa-user-shield text-4xl text-white drop-shadow"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">{{ $usuarios->where('verificado', true)->count() }}</h3>
                <p class="text-slate-300">Usuarios Verificados</p>
            </div>

            <!-- Creadores de Contenido -->
            <div class="bg-gradient-to-br from-indigo-600/20 via-purple-500/10 to-violet-600/20 border border-white/10 rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-400 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg ring-1 ring-white/20">
                    <i class="fas fa-user-tie text-4xl text-white drop-shadow"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">{{ $usuarios->filter(function($u) { return $u->isCreador(); })->count() }}</h3>
                <p class="text-slate-300">Creadores de Contenido</p>
            </div>
        </div>
    </div>
</div>

<!-- Users Table Section -->
<div class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-800 py-8 sm:py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-br from-slate-900/80 via-slate-800/80 to-slate-900/80 border border-white/10 rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-cyan-600/20 via-blue-600/20 to-purple-600/20 border-b border-white/10 p-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-2">
                            <i class="fas fa-users me-3 text-cyan-400"></i>
                            Lista de Usuarios
                        </h2>
                        <p class="text-slate-300">Gestiona todos los usuarios registrados en el sistema</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center bg-cyan-500/10 text-cyan-300 border border-cyan-400/30 px-4 py-2 rounded-xl">
                            <i class="fas fa-database mr-2"></i>{{ $usuarios->total() }} registros
                        </span>
                    </div>
                </div>
            </div>

            <!-- Action Bar: search and filters -->
            <div class="px-4 pt-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                    <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                        <form method="GET" action="{{ route('usuarios.index') }}" class="flex-1 min-w-0">
                            <div class="relative">
                                <input type="text" name="q" value="{{ request('q') }}"
                                    placeholder="Buscar por nombre o correo..."
                                    class="w-full bg-slate-900/60 border border-slate-700/60 text-white placeholder-slate-400 rounded-xl pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 text-sm">
                                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            </div>
                        </form>
                        <form method="GET" action="{{ route('usuarios.index') }}" class="flex gap-2 min-w-0">
                            <select name="tipo"
                                class="bg-slate-900/60 border border-slate-700/60 text-white rounded-xl px-3 py-2 focus:outline-none text-sm min-w-0 flex-shrink">
                                <option value="">Tipo</option>
                                @foreach(\App\Models\TipoUsuario::pluck('nombre', 'id') as $id => $nombre)
                                    <option value="{{ $id }}" @selected(request('tipo') == $id)>{{ $nombre }}</option>
                                @endforeach
                            </select>
                            <select name="estado"
                                class="bg-slate-900/60 border border-slate-700/60 text-white rounded-xl px-3 py-2 focus:outline-none text-sm min-w-0 flex-shrink">
                                <option value="">Estado</option>
                                <option value="activo" @selected(request('estado') == 'activo')>Activo</option>
                                <option value="inactivo" @selected(request('estado') == 'inactivo')>Inactivo</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="px-0 pb-8" id="usuarios-table-wrapper">
                    @include('usuarios.partials.table', ['usuarios' => $usuarios])
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/usuarios/index.js') }}" defer></script>
@endpush
@endsection
