@extends('layouts.app')

@section('title', 'Dashboard - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-6 xl:px-8 py-6 sm:py-8">
        <!-- Breadcrumb - Diseño mejorado -->
        <nav class="mb-6 sm:mb-8">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-xl blur-sm"></div>
                <div class="relative bg-slate-800/60 backdrop-blur-sm border border-slate-700/50 rounded-xl px-4 sm:px-6 py-3 sm:py-4 shadow-lg">
                    <ol class="flex items-center space-x-2 sm:space-x-3 text-sm">
                        <li>
                            <a href="{{ route('home') }}" class="group flex items-center text-cyan-400 hover:text-cyan-300 transition-all duration-300 font-medium">
                                <div class="relative">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-lg blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <span class="material-icons text-sm sm:text-base relative mr-1 sm:mr-2">home</span>
                                </div>
                                <span class="relative">Inicio</span>
                            </a>
                        </li>
                        <li class="flex items-center">
                            <div class="relative">
                                <div class="absolute -inset-1 bg-gradient-to-r from-slate-500/20 to-slate-400/20 rounded-full blur opacity-50"></div>
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-slate-400 relative" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <div class="relative">
                                <div class="absolute -inset-1 bg-gradient-to-r from-slate-500/20 to-slate-400/20 rounded-lg blur opacity-50"></div>
                                <div class="relative flex items-center text-slate-300 font-medium">
                                    <span class="material-icons text-sm sm:text-base mr-1 sm:mr-2">dashboard</span>
                                    <span class="relative">Dashboard</span>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </nav>

        <!-- Mensajes de sesión -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-900/40 border border-green-500/50 rounded-xl text-green-200 flex items-center">
                <span class="material-icons text-green-400 mr-3">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-900/40 border border-red-500/50 rounded-xl text-red-200 flex items-center">
                <span class="material-icons text-red-400 mr-3">error</span>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if (session('warning'))
            <div class="mb-6 p-4 bg-yellow-900/40 border border-yellow-500/50 rounded-xl text-yellow-200 flex items-center">
                <span class="material-icons text-yellow-400 mr-3">warning</span>
                <span>{{ session('warning') }}</span>
            </div>
        @endif

        @if (session('info'))
            <div class="mb-6 p-4 bg-blue-900/40 border border-blue-500/50 rounded-xl text-blue-200 flex items-center">
                <span class="material-icons text-blue-400 mr-3">info</span>
                <span>{{ session('info') }}</span>
            </div>
        @endif

        <!-- Toolbar v4.0: búsqueda mejorada y rango de tiempo - Optimizado para móvil -->
        <div class="mb-6 sm:mb-8 space-y-4 sm:space-y-0 sm:grid sm:grid-cols-1 lg:grid-cols-3 sm:gap-4 lg:gap-6">
            <!-- Búsqueda - Ocupa todo el ancho en móvil -->
            <div class="lg:col-span-2">
                <div class="relative group">
                    <div class="flex items-center gap-2 sm:gap-3 bg-slate-800/80 backdrop-blur-sm border border-slate-700/50 rounded-xl sm:rounded-2xl px-3 sm:px-6 py-3 sm:py-4 shadow-lg hover:shadow-xl transition-all duration-300 hover:border-cyan-500/50">
                        <span class="material-icons text-cyan-400 group-hover:text-cyan-300 transition-colors text-lg sm:text-xl flex-shrink-0">search</span>
                        <input id="dashboard-search" type="text" placeholder="Buscar usuarios, cursos o artículos..." class="w-full bg-transparent text-white placeholder-slate-400 focus:outline-none text-sm sm:text-base font-medium"/>
                    </div>
                    <!-- Sugerencias de búsqueda mejoradas -->
                    <div id="search-suggestions" class="hidden absolute z-20 mt-2 sm:mt-3 w-full bg-slate-900/95 backdrop-blur-md border border-slate-700/50 rounded-xl sm:rounded-2xl overflow-hidden shadow-2xl">
                        <div class="px-3 sm:px-4 py-2 sm:py-3 text-xs uppercase tracking-wider text-slate-400 bg-slate-800/50 border-b border-slate-700/50">Resultados de búsqueda</div>
                        <ul id="suggestions-list" class="max-h-48 sm:max-h-60 lg:max-h-80 overflow-auto">
                            <!-- Items por JS -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Botones de rango - Mejorados para móvil -->
            <div class="grid grid-cols-3 gap-2 sm:gap-3">
                <button id="btn-range-today" data-range="today" class="px-2 sm:px-4 py-2.5 sm:py-3 bg-slate-800/80 backdrop-blur-sm border border-slate-700/50 rounded-lg sm:rounded-xl text-slate-300 hover:text-cyan-300 hover:border-cyan-500/50 hover:bg-slate-700/80 transition-all duration-300 font-medium text-xs sm:text-sm">Hoy</button>
                <button id="btn-range-7d" data-range="7d" class="px-2 sm:px-4 py-2.5 sm:py-3 bg-slate-800/80 backdrop-blur-sm border border-slate-700/50 rounded-lg sm:rounded-xl text-slate-300 hover:text-cyan-300 hover:border-cyan-500/50 hover:bg-slate-700/80 transition-all duration-300 font-medium text-xs sm:text-sm">7 días</button>
                <button id="btn-range-30d" data-range="30d" class="px-2 sm:px-4 py-2.5 sm:py-3 bg-slate-800/80 backdrop-blur-sm border border-slate-700/50 rounded-lg sm:rounded-xl text-slate-300 hover:text-cyan-300 hover:border-cyan-500/50 hover:bg-slate-700/80 transition-all duration-300 font-medium text-xs sm:text-sm">30 días</button>
            </div>
        </div>


        <!-- Welcome Card v4.0 mejorada - Optimizada para móvil -->
        <div class="relative bg-gradient-to-r from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8 shadow-2xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/5 to-blue-500/5"></div>
            <div class="relative flex flex-col items-center text-center sm:text-left sm:flex-row sm:justify-between">
                <div class="flex flex-col items-center sm:flex-row sm:items-center mb-4 sm:mb-6 lg:mb-0">
                    <div class="relative mb-3 sm:mb-0 sm:mr-6">
                        <div class="absolute -inset-1 sm:-inset-2 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-lg sm:rounded-xl lg:rounded-2xl blur-lg"></div>
                        <div class="relative bg-gradient-to-r from-cyan-500/20 to-blue-500/20 p-3 sm:p-4 rounded-lg sm:rounded-xl lg:rounded-2xl border border-cyan-400/30">
                            <span class="material-icons text-cyan-400 text-2xl sm:text-3xl lg:text-4xl">dashboard</span>
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h1 class="text-xl sm:text-2xl lg:text-3xl xl:text-4xl font-bold text-white mb-2 leading-tight">¡Bienvenido, {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}</h1>
                        <p class="text-slate-300 text-sm sm:text-base lg:text-lg mb-3 sm:mb-0">Gestiona tu plataforma y explora todas las herramientas disponibles</p>
                        <div class="flex items-center justify-center sm:justify-start text-xs sm:text-sm text-white">
                            <span class="material-icons text-green-400 mr-1 sm:mr-2 text-sm sm:text-base">verified</span>
                            <span>Último acceso:</span>
                            @php
                                // Obtener el último acceso anterior desde la sesión (guardado antes de actualizar)
                                $previousLastLogin = session('previous_last_login');
                                $timezone = config('app.timezone', 'UTC');
                                
                                if ($previousLastLogin) {
                                    $lastLogin = \Carbon\Carbon::parse($previousLastLogin);
                                } else {
                                    // Si no hay en sesión, usar el valor de la BD (puede ser null si es primera vez)
                                    $lastLogin = Auth::user()->last_login;
                                }
                            @endphp
                            @if($lastLogin)
                                <span class="ml-2">
                                    <span class="text-white">UTC:</span> 
                                    <span class="text-white">{{ $lastLogin->setTimezone('UTC')->format('d/m/Y H:i:s') }} UTC</span>
                                    <span class="mx-2 text-white/60">|</span>
                                    <span class="text-white">{{ $timezone }}:</span> 
                                    <span class="text-white">{{ $lastLogin->setTimezone($timezone)->format('d/m/Y H:i:s') }} {{ $timezone }}</span>
                                </span>
                            @else
                                <span class="ml-2 text-white/80 italic">Primera vez que accedes al sistema</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $user = Auth::user();
            $isAdmin = $user->isAdmin();
            $isCreador = $user->isCreador();
            $isEstudiante = $user->isEstudiante();
        @endphp

        @if($isAdmin)
        <!-- Stats Grid v4.0 mejorada - Optimizada para móvil -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-6 sm:mb-8">
            <!-- Usuarios Stat Card -->
            <div class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-blue-500/50 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex-1 mb-2 sm:mb-0">
                        <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Usuarios Totales</p>
                        <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">{{ $totalUsuarios ?? '0' }}</p>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400 border border-green-500/30">
                                <span class="material-icons text-xs mr-1">trending_up</span>
                                <span class="hidden sm:inline">+{{ $nuevosUsuarios ?? '0' }} este mes</span>
                                <span class="sm:hidden">+{{ $nuevosUsuarios ?? '0' }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="relative self-end sm:self-auto">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg sm:rounded-xl blur"></div>
                        <div class="relative bg-gradient-to-r from-blue-500/20 to-cyan-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-blue-400/30">
                            <span class="material-icons text-blue-400 text-lg sm:text-xl lg:text-2xl">people</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Artículos Stat Card -->
            <div class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-green-500/50 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex-1 mb-2 sm:mb-0">
                        <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Artículos</p>
                        <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">{{ $totalArticulos ?? '0' }}</p>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400 border border-green-500/30">
                                <span class="material-icons text-xs mr-1">trending_up</span>
                                <span class="hidden sm:inline">+{{ $nuevosArticulos ?? '0' }} este mes</span>
                                <span class="sm:hidden">+{{ $nuevosArticulos ?? '0' }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="relative self-end sm:self-auto">
                        <div class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg sm:rounded-xl blur"></div>
                        <div class="relative bg-gradient-to-r from-green-500/20 to-emerald-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-green-400/30">
                            <span class="material-icons text-green-400 text-lg sm:text-xl lg:text-2xl">article</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cursos Stat Card -->
            <div class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-purple-500/50 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex-1 mb-2 sm:mb-0">
                        <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Cursos Activos</p>
                        <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">{{ $totalCursos ?? '0' }}</p>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400 border border-green-500/30">
                                <span class="material-icons text-xs mr-1">trending_up</span>
                                <span class="hidden sm:inline">+{{ $nuevosCursos ?? '0' }} este mes</span>
                                <span class="sm:hidden">+{{ $nuevosCursos ?? '0' }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="relative self-end sm:self-auto">
                        <div class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur"></div>
                        <div class="relative bg-gradient-to-r from-purple-500/20 to-indigo-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-purple-400/30">
                            <span class="material-icons text-purple-400 text-lg sm:text-xl lg:text-2xl">school</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificados Stat Card -->
            <div class="group relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-2xl hover:border-amber-500/50 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-yellow-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex-1 mb-2 sm:mb-0">
                        <p class="text-slate-400 text-xs sm:text-sm font-medium mb-1">Certificados</p>
                        <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-1 sm:mb-2">{{ $totalCertificados ?? '0' }}</p>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400 border border-green-500/30">
                                <span class="material-icons text-xs mr-1">trending_up</span>
                                <span class="hidden sm:inline">+{{ $nuevosCertificados ?? '0' }} este mes</span>
                                <span class="sm:hidden">+{{ $nuevosCertificados ?? '0' }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="relative self-end sm:self-auto">
                        <div class="absolute -inset-1 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 rounded-lg sm:rounded-xl blur"></div>
                        <div class="relative bg-gradient-to-r from-amber-500/20 to-yellow-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-amber-400/30">
                            <span class="material-icons text-amber-400 text-lg sm:text-xl lg:text-2xl">verified</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($isAdmin)
        <!-- Notificaciones de Solicitudes de Creador -->
        @php
            $solicitudesPendientes = \App\Models\User::where('solicitud_creador', 'pendiente')->count();
        @endphp
        @if($solicitudesPendientes > 0)
        <div class="relative bg-gradient-to-r from-yellow-600/20 to-orange-600/20 backdrop-blur-sm border border-yellow-500/50 rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8 shadow-2xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/5 to-orange-500/5"></div>
            <div class="relative">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="relative mr-4">
                            <div class="absolute -inset-1 bg-gradient-to-r from-yellow-500/20 to-orange-500/20 rounded-lg blur-lg"></div>
                            <span class="material-icons text-yellow-400 text-2xl sm:text-3xl lg:text-4xl relative">notifications_active</span>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-white mb-1">Solicitudes de Creador Pendientes</h3>
                            <p class="text-yellow-200 text-sm sm:text-base">{{ $solicitudesPendientes }} {{ $solicitudesPendientes === 1 ? 'solicitud' : 'solicitudes' }} esperando tu aprobación</p>
                        </div>
                    </div>
                    <button onclick="mostrarSolicitudes()" class="bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-400 hover:to-orange-400 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 hover:scale-105 flex items-center">
                        <span class="material-icons text-sm mr-2">visibility</span>
                        Ver Solicitudes
                    </button>
                </div>
            </div>
        </div>
        @endif

        <!-- Acciones rápidas (Admin) v4.0 - Optimizada para móvil -->
        <div class="relative bg-gradient-to-r from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8 shadow-2xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-amber-500/5 to-orange-500/5"></div>
            <div class="relative">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-center text-white mb-4 sm:mb-6 lg:mb-8 flex items-center justify-center gap-2 sm:gap-3">
                    <div class="relative">
                        <div class="absolute -inset-1 sm:-inset-2 bg-gradient-to-r from-amber-500/20 to-orange-500/20 rounded-lg sm:rounded-xl blur-lg"></div>
                        <span class="material-icons text-amber-400 text-2xl sm:text-3xl lg:text-4xl relative">bolt</span>
                    </div>
                    <span class="hidden sm:inline">Acciones Rápidas</span>
                    <span class="sm:hidden">Acciones</span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-2 sm:gap-3 lg:gap-4 xl:gap-6">
                    <a href="{{ route('usuarios.index') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-cyan-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-cyan-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">people</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Usuarios</span>
                        <span class="text-xs text-slate-400 relative">+ Convertir a Creadores</span>
                    </a>

                    <a href="{{ route('admin.articulos.index') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-green-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-green-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">article</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Artículos</span>
                    </a>

                    <a href="{{ route('admin.casos-exito.index') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-orange-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-amber-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-orange-500/20 to-amber-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-orange-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">star</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Casos de Éxito</span>
                    </a>

                    <a href="{{ route('admin.cursos.index') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-purple-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-purple-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">school</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Cursos</span>
                    </a>

                    <a href="{{ route('certificados.index') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-amber-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-yellow-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-amber-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">verified</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Certificados</span>
                    </a>
                </div>
            </div>
        </div>
        @elseif($isCreador)
        <!-- Acciones rápidas (Creador) v4.0 - Optimizada para móvil -->
        <div class="relative bg-gradient-to-r from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8 shadow-2xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-indigo-500/5"></div>
            <div class="relative">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-center text-white mb-4 sm:mb-6 lg:mb-8 flex items-center justify-center gap-2 sm:gap-3">
                    <div class="relative">
                        <div class="absolute -inset-1 sm:-inset-2 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur-lg"></div>
                        <span class="material-icons text-purple-400 text-2xl sm:text-3xl lg:text-4xl relative">create</span>
                    </div>
                    <span class="hidden sm:inline">Panel de Creador</span>
                    <span class="sm:hidden">Creador</span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 sm:gap-3 lg:gap-4 xl:gap-6">
                    <a href="{{ route('creador.dashboard') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-purple-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-purple-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">dashboard</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Mi Dashboard</span>
                    </a>

                    <a href="{{ route('creador.cursos.index') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-blue-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-blue-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">school</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Mis Cursos</span>
                    </a>

                    <a href="{{ route('creador.cursos.create') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-green-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-green-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">add_circle</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Crear Curso</span>
                    </a>

                    <a href="{{ route('cursos.catalogo') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-amber-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-yellow-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-amber-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">library_books</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Explorar</span>
                    </a>
                </div>
            </div>
        </div>
        @elseif($isEstudiante)
        <!-- Acciones rápidas (Estudiante) v4.0 - Optimizada para móvil -->
        <div class="relative bg-gradient-to-r from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8 shadow-2xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/5 to-blue-500/5"></div>
            <div class="relative">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-center text-white mb-4 sm:mb-6 lg:mb-8 flex items-center justify-center gap-2 sm:gap-3">
                    <div class="relative">
                        <div class="absolute -inset-1 sm:-inset-2 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-lg sm:rounded-xl blur-lg"></div>
                        <span class="material-icons text-cyan-400 text-2xl sm:text-3xl lg:text-4xl relative">school</span>
                    </div>
                    <span class="hidden sm:inline">Panel de Estudiante</span>
                    <span class="sm:hidden">Estudiante</span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 sm:gap-3 lg:gap-4 xl:gap-6">
                    <a href="{{ route('cursos.catalogo') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-blue-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-blue-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">library_books</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Explorar Cursos</span>
                    </a>

                    <a href="{{ route('profile.show') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-green-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-green-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">person</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Mi Perfil</span>
                    </a>

                    <a href="{{ route('articulos.catalogo') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-purple-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-purple-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">article</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Blog</span>
                    </a>

                    <a href="{{ route('home') }}"
                    class="group relative px-2 sm:px-3 lg:px-4 xl:px-6 py-3 sm:py-4 lg:py-5 xl:py-6 rounded-lg sm:rounded-xl lg:rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 hover:border-amber-500/50 text-slate-200 flex flex-col items-center justify-center gap-1.5 sm:gap-2 lg:gap-3 text-center transition-all duration-500 hover:scale-105 hover:shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-yellow-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 rounded-lg sm:rounded-xl blur"></div>
                            <span class="material-icons text-amber-400 text-xl sm:text-2xl lg:text-3xl relative group-hover:animate-bounce">home</span>
                        </div>
                        <span class="text-xs sm:text-sm font-semibold relative">Inicio</span>
                    </a>
                </div>
            </div>
        </div>
        @endif

        <!-- Two Columns v4.0 - Optimizado para móvil -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 mb-6 sm:mb-8">
            <!-- Recent Activity -->
            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-blue-500/5"></div>
                <div class="relative">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-white mb-3 sm:mb-4 lg:mb-6 flex items-center">
                        <div class="relative mr-2 sm:mr-3">
                            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-lg blur"></div>
                            <span class="material-icons text-cyan-400 text-lg sm:text-xl lg:text-2xl relative">history</span>
                        </div>
                        <span class="hidden sm:inline">Actividad Reciente</span>
                        <span class="sm:hidden">Actividad</span>
                    </h2>
                    <div class="space-y-2 sm:space-y-3 lg:space-y-4 max-h-48 sm:max-h-60 lg:max-h-80 overflow-y-auto">
                        @if(isset($actividades) && count($actividades) > 0)
                            @foreach($actividades as $actividad)
                            <div class="flex items-start space-x-2 sm:space-x-3 lg:space-x-4 p-2 sm:p-3 rounded-lg sm:rounded-xl hover:bg-white/5 transition-colors duration-300">
                                <div class="relative flex-shrink-0">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-{{ $actividad['color'] }}-500/20 to-{{ $actividad['color'] }}-400/20 rounded-lg blur"></div>
                                    <div class="relative bg-gradient-to-r from-{{ $actividad['color'] }}-500/20 to-{{ $actividad['color'] }}-400/20 p-1.5 sm:p-2 lg:p-3 rounded-lg border border-{{ $actividad['color'] }}-400/30">
                                        <span class="material-icons text-{{ $actividad['color'] }}-400 text-sm sm:text-base lg:text-lg">{{ $actividad['icono'] }}</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-white text-xs sm:text-sm font-medium truncate">{{ $actividad['descripcion'] }}</p>
                                    <p class="text-slate-400 text-xs mt-1">{{ $actividad['fecha'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        @else
                            @for($i = 0; $i < 3; $i++)
                            <div class="flex items-start space-x-2 sm:space-x-3 lg:space-x-4 p-2 sm:p-3 rounded-lg sm:rounded-xl hover:bg-white/5 transition-colors duration-300">
                                <div class="relative flex-shrink-0">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-lg blur"></div>
                                    <div class="relative bg-gradient-to-r from-cyan-500/20 to-blue-500/20 p-1.5 sm:p-2 lg:p-3 rounded-lg border border-cyan-400/30">
                                        <span class="material-icons text-cyan-400 text-sm sm:text-base lg:text-lg">notifications</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-white text-xs sm:text-sm font-medium">Nuevo proyecto creado</p>
                                    <p class="text-slate-400 text-xs mt-1">Hace 2 horas</p>
                                </div>
                            </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </div>

            <!-- Gráfica de tendencias -->
            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/5"></div>
                <div class="relative">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-white mb-3 sm:mb-4 lg:mb-6 flex items-center">
                        <div class="relative mr-2 sm:mr-3">
                            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-lg blur"></div>
                            <span class="material-icons text-indigo-400 text-lg sm:text-xl lg:text-2xl relative">bar_chart</span>
                        </div>
                        Tendencias
                    </h2>
                    <div class="h-48 sm:h-64 lg:h-80 bg-slate-900/50 rounded-lg sm:rounded-xl p-2 sm:p-3 lg:p-4 border border-slate-600/30">
                        <canvas id="dashboard-bar-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Section for Social Media v4.0 - Optimizada para móvil -->
        <div class="relative bg-gradient-to-r from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-xl sm:rounded-2xl lg:rounded-3xl p-3 sm:p-4 lg:p-6 xl:p-8 mb-6 sm:mb-8 shadow-2xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/5 to-blue-500/5"></div>
            <div class="relative">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-4 sm:mb-6 lg:mb-8 flex items-center">
                    <div class="relative mr-2 sm:mr-3 lg:mr-4">
                        <div class="absolute -inset-1 sm:-inset-2 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-lg sm:rounded-xl blur-lg"></div>
                        <span class="material-icons text-cyan-400 text-2xl sm:text-3xl lg:text-4xl relative">analytics</span>
                    </div>
                    <span class="hidden sm:inline">Estadísticas de Redes Sociales</span>
                    <span class="sm:hidden">Redes Sociales</span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
                    <div class="group relative bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 flex items-center transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-xl hover:border-blue-500/50 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative flex items-center w-full">
                            <div class="relative mr-3 sm:mr-4 lg:mr-6">
                                <div class="absolute -inset-1 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-lg sm:rounded-xl blur"></div>
                                <div class="relative bg-gradient-to-r from-blue-500/20 to-cyan-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-blue-400/30">
                                    <span class="material-icons text-blue-400 text-lg sm:text-xl lg:text-2xl">thumb_up</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-semibold text-xs sm:text-sm lg:text-lg">Interacciones</p>
                                <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-cyan-400 mt-1">{{ $totalInteracciones ?? '1.2K' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="group relative bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 flex items-center transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-xl hover:border-green-500/50 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative flex items-center w-full">
                            <div class="relative mr-3 sm:mr-4 lg:mr-6">
                                <div class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg sm:rounded-xl blur"></div>
                                <div class="relative bg-gradient-to-r from-green-500/20 to-emerald-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-green-400/30">
                                    <span class="material-icons text-green-400 text-lg sm:text-xl lg:text-2xl">trending_up</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-semibold text-xs sm:text-sm lg:text-lg">Crecimiento</p>
                                <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-cyan-400 mt-1">+{{ $crecimientoRedes ?? '18' }}%</p>
                            </div>
                        </div>
                    </div>
                    <div class="group relative bg-gradient-to-br from-slate-700/80 to-slate-600/80 backdrop-blur-sm border border-slate-500/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 flex items-center transition-all duration-500 hover:transform hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-xl hover:border-purple-500/50 overflow-hidden sm:col-span-2 lg:col-span-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative flex items-center w-full">
                            <div class="relative mr-3 sm:mr-4 lg:mr-6">
                                <div class="absolute -inset-1 bg-gradient-to-r from-purple-500/20 to-indigo-500/20 rounded-lg sm:rounded-xl blur"></div>
                                <div class="relative bg-gradient-to-r from-purple-500/20 to-indigo-500/20 p-2 sm:p-3 lg:p-4 rounded-lg sm:rounded-xl border border-purple-400/30">
                                    <span class="material-icons text-purple-400 text-lg sm:text-xl lg:text-2xl">link</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-semibold text-xs sm:text-sm lg:text-lg">Enlaces Publicados</p>
                                <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-cyan-400 mt-1">{{ $totalEnlaces ?? '24' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if((isset($articulosMasLeidos) && count($articulosMasLeidos) > 0) || (isset($articulosMenosLeidos) && count($articulosMenosLeidos) > 0))
        <!-- Artículos más y menos leídos v4.0 - Optimizada para móvil -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 mb-6 sm:mb-8">
            @if(isset($articulosMasLeidos) && count($articulosMasLeidos) > 0)
            <!-- Artículos más leídos -->
            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5"></div>
                <div class="relative">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-white mb-3 sm:mb-4 lg:mb-6 flex items-center">
                        <div class="relative mr-2 sm:mr-3">
                            <div class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg blur"></div>
                            <span class="material-icons text-green-400 text-lg sm:text-xl lg:text-2xl relative">trending_up</span>
                        </div>
                        <span class="hidden sm:inline">Artículos Más Leídos</span>
                        <span class="sm:hidden">Más Leídos</span>
                    </h2>
                    <div class="space-y-2 sm:space-y-3 lg:space-y-4 max-h-48 sm:max-h-60 lg:max-h-80 overflow-y-auto">
                        @foreach($articulosMasLeidos as $articulo)
                        <div class="flex items-start space-x-2 sm:space-x-3 lg:space-x-4 p-2 sm:p-3 rounded-lg sm:rounded-xl hover:bg-white/5 transition-colors duration-300">
                            <div class="relative flex-shrink-0">
                                <div class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg blur"></div>
                                <div class="relative bg-gradient-to-r from-green-500/20 to-emerald-500/20 p-1.5 sm:p-2 lg:p-3 rounded-lg border border-green-400/30">
                                    <span class="material-icons text-green-400 text-sm sm:text-base lg:text-lg">article</span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-white text-xs sm:text-sm font-medium truncate">{{ $articulo->titulo }}</p>
                                <div class="flex items-center justify-between mt-1">
                                    <p class="text-slate-400 text-xs">{{ $articulo->vistas ?? 0 }} vistas</p>
                                    <a href="{{ route('articulos.ver', $articulo->slug ?? $articulo->id) }}" class="text-green-400 hover:text-green-300 text-xs font-medium transition-colors">
                                        Ver artículo
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if(isset($articulosMenosLeidos) && count($articulosMenosLeidos) > 0)
            <!-- Artículos menos leídos -->
            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-red-500/5"></div>
                <div class="relative">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-white mb-3 sm:mb-4 lg:mb-6 flex items-center">
                        <div class="relative mr-2 sm:mr-3">
                            <div class="absolute -inset-1 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-lg blur"></div>
                            <span class="material-icons text-orange-400 text-lg sm:text-xl lg:text-2xl relative">trending_down</span>
                        </div>
                        <span class="hidden sm:inline">Artículos Menos Leídos</span>
                        <span class="sm:hidden">Menos Leídos</span>
                    </h2>
                    <div class="space-y-2 sm:space-y-3 lg:space-y-4 max-h-48 sm:max-h-60 lg:max-h-80 overflow-y-auto">
                        @foreach($articulosMenosLeidos as $articulo)
                        <div class="flex items-start space-x-2 sm:space-x-3 lg:space-x-4 p-2 sm:p-3 rounded-lg sm:rounded-xl hover:bg-white/5 transition-colors duration-300">
                            <div class="relative flex-shrink-0">
                                <div class="absolute -inset-1 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-lg blur"></div>
                                <div class="relative bg-gradient-to-r from-orange-500/20 to-red-500/20 p-1.5 sm:p-2 lg:p-3 rounded-lg border border-orange-400/30">
                                    <span class="material-icons text-orange-400 text-sm sm:text-base lg:text-lg">article</span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-white text-xs sm:text-sm font-medium truncate">{{ $articulo->titulo }}</p>
                                <div class="flex items-center justify-between mt-1">
                                    <p class="text-slate-400 text-xs">{{ $articulo->vistas ?? 0 }} vistas</p>
                                    <a href="{{ route('articulos.ver', $articulo->slug ?? $articulo->id) }}" class="text-orange-400 hover:text-orange-300 text-xs font-medium transition-colors">
                                        Ver artículo
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endif

        <!-- Donut charts row v4.0 - Optimizado para móvil -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-blue-500/5"></div>
                <div class="relative">
                    <h3 class="text-white font-bold text-sm sm:text-base lg:text-lg mb-3 sm:mb-4 lg:mb-6 flex items-center">
                        <div class="relative mr-2 sm:mr-3">
                            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-lg blur"></div>
                            <span class="material-icons text-cyan-400 text-base sm:text-lg lg:text-xl relative">inventory_2</span>
                        </div>
                        <span class="hidden sm:inline">Cursos por Estado</span>
                        <span class="sm:hidden">Cursos</span>
                    </h3>
                    <div class="h-40 sm:h-48 lg:h-64 bg-slate-900/50 rounded-lg sm:rounded-xl p-2 sm:p-3 lg:p-4 border border-slate-600/30">
                        <canvas id="donut-cursos"></canvas>
                    </div>
                </div>
            </div>
            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5"></div>
                <div class="relative">
                    <h3 class="text-white font-bold text-sm sm:text-base lg:text-lg mb-3 sm:mb-4 lg:mb-6 flex items-center">
                        <div class="relative mr-2 sm:mr-3">
                            <div class="absolute -inset-1 bg-gradient-to-r from-green-500/20 to-emerald-500/20 rounded-lg blur"></div>
                            <span class="material-icons text-green-400 text-base sm:text-lg lg:text-xl relative">article</span>
                        </div>
                        <span class="hidden sm:inline">Artículos por Estado</span>
                        <span class="sm:hidden">Artículos</span>
                    </h3>
                    <div class="h-40 sm:h-48 lg:h-64 bg-slate-900/50 rounded-lg sm:rounded-xl p-2 sm:p-3 lg:p-4 border border-slate-600/30">
                        <canvas id="donut-articulos"></canvas>
                    </div>
                </div>
            </div>
            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-700/90 backdrop-blur-sm border border-slate-600/50 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6 shadow-xl overflow-hidden sm:col-span-2 lg:col-span-1">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-yellow-500/5"></div>
                <div class="relative">
                    <h3 class="text-white font-bold text-sm sm:text-base lg:text-lg mb-3 sm:mb-4 lg:mb-6 flex items-center">
                        <div class="relative mr-2 sm:mr-3">
                            <div class="absolute -inset-1 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 rounded-lg blur"></div>
                            <span class="material-icons text-amber-400 text-base sm:text-lg lg:text-xl relative">verified</span>
                        </div>
                        <span class="hidden sm:inline">Certificados por Estado</span>
                        <span class="sm:hidden">Certificados</span>
                    </h3>
                    <div class="h-40 sm:h-48 lg:h-64 bg-slate-900/50 rounded-lg sm:rounded-xl p-2 sm:p-3 lg:p-4 border border-slate-600/30">
                        <canvas id="donut-certificados"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Helpers
    const ACTIVE_RANGE = "{{ $activeRange ?? '30d' }}";
    const CHART_DATA = @json($chartData ?? null);

    function setActiveRangeButtons() {
        const map = {
            'today': document.getElementById('btn-range-today'),
            '7d': document.getElementById('btn-range-7d'),
            '30d': document.getElementById('btn-range-30d')
        };
        Object.keys(map).forEach(key => {
            const btn = map[key];
            if (!btn) return;
            const isActive = key === ACTIVE_RANGE;
            btn.classList.toggle('border-cyan-400', isActive);
            btn.classList.toggle('text-cyan-300', isActive);
            btn.classList.toggle('bg-slate-700', isActive);
        });
    }

    function wireRangeButtons() {
        document.querySelectorAll('[data-range]')?.forEach(btn => {
            btn.addEventListener('click', () => {
                const r = btn.getAttribute('data-range');
                const url = new URL(window.location.href);
                url.searchParams.set('range', r);
                window.location.href = url.toString();
            });
        });
    }

    function initChart() {
        if (!window.Chart || !CHART_DATA) return;
        const ctx = document.getElementById('dashboard-bar-chart');
        if (!ctx) return;
        const bar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: CHART_DATA.labels || [],
                datasets: (CHART_DATA.datasets || []).map(ds => ({
                    ...ds,
                    backgroundColor: ds.backgroundColor || 'rgba(34, 211, 238, 0.2)',
                    borderColor: ds.borderColor || '#22d3ee',
                    borderWidth: 1.5,
                    categoryPercentage: 0.7,
                    barPercentage: 0.9,
                }))
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { labels: { color: '#cbd5e1' } },
                    tooltip: { mode: 'index', intersect: false }
                },
                scales: {
                    x: { ticks: { color: '#94a3b8' }, grid: { color: 'rgba(148,163,184,0.15)' } },
                    y: { ticks: { color: '#94a3b8' }, grid: { color: 'rgba(148,163,384,0.15)' } },
                }
            }
        });
    }

    function initDonuts() {
        if (!window.Chart) return;
        const donutConfigs = [
            {
                el: 'donut-cursos',
                data: {
                    labels: ['Activos', 'Inactivos'],
                    values: [{{ $distCursos['activo'] ?? 0 }}, {{ $distCursos['inactivo'] ?? 0 }}],
                    colors: ['#22c55e', '#64748b']
                }
            },
            {
                el: 'donut-articulos',
                data: {
                    labels: ['Publicado', 'Borrador', 'Archivado'],
                    values: [{{ $distArticulos['publicado'] ?? 0 }}, {{ $distArticulos['borrador'] ?? 0 }}, {{ $distArticulos['archivado'] ?? 0 }}],
                    colors: ['#34d399', '#f59e0b', '#64748b']
                }
            },
            {
                el: 'donut-certificados',
                data: {
                    labels: ['Válido', 'Revocado', 'Expirado'],
                    values: [{{ $distCertificados['valido'] ?? 0 }}, {{ $distCertificados['revocado'] ?? 0 }}, {{ $distCertificados['expirado'] ?? 0 }}],
                    colors: ['#06b6d4', '#ef4444', '#f59e0b']
                }
            },
        ];

        donutConfigs.forEach(cfg => {
            const el = document.getElementById(cfg.el);
            if (!el) return;
            new Chart(el, {
                type: 'doughnut',
                data: {
                    labels: cfg.data.labels,
                    datasets: [{ data: cfg.data.values, backgroundColor: cfg.data.colors, borderWidth: 1 }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { labels: { color: '#cbd5e1' }, position: 'bottom' }
                    },
                    cutout: '68%'
                }
            });
        });
    }

    // Búsqueda con sugerencias
    function debounce(fn, ms) { let t; return (...args) => { clearTimeout(t); t = setTimeout(() => fn.apply(this, args), ms); }; }

    function renderSuggestions(items) {
        const list = document.getElementById('suggestions-list');
        const box = document.getElementById('search-suggestions');
        if (!list || !box) return;
        list.innerHTML = '';

        const groups = [
            { key: 'usuarios', title: 'Usuarios', icon: 'person', color: 'cyan' },
            { key: 'cursos', title: 'Cursos', icon: 'school', color: 'purple' },
            { key: 'articulos', title: 'Artículos', icon: 'article', color: 'green' },
        ];

        let count = 0;
        groups.forEach(g => {
            const arr = items[g.key] || [];
            if (arr.length === 0) return;

            const header = document.createElement('li');
            header.className = 'px-4 py-3 text-xs uppercase tracking-wider text-slate-400 bg-slate-800/50 border-b border-slate-700/50 font-semibold';
            header.innerHTML = `
                <div class="flex items-center gap-2">
                    <span class="material-icons text-${g.color}-400 text-sm">${g.icon}</span>
                    ${g.title}
                </div>
            `;
            list.appendChild(header);

            arr.forEach(it => {
                count++;
                const li = document.createElement('li');
                li.className = 'px-4 py-3 hover:bg-slate-800/50 cursor-pointer flex items-center justify-between transition-colors duration-200 group';
                li.innerHTML = `
                    <div class="flex items-center gap-3 flex-1">
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-${g.color}-500/20 to-${g.color}-400/20 rounded-lg blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="material-icons text-${g.color}-400 text-lg relative">${g.icon}</span>
                        </div>
                        <span class="text-slate-200 text-sm font-medium group-hover:text-white transition-colors">${it.label}</span>
                    </div>
                    ${it.adminUrl ? '<span class="text-xs text-slate-500 bg-slate-700/50 px-2 py-1 rounded-full">Shift+Click: Admin</span>' : ''}
                `;
                li.addEventListener('click', (e) => {
                    const isShift = e.shiftKey;
                    if (isShift && it.adminUrl) {
                        window.location.href = it.adminUrl;
                    } else if (it.url) {
                        window.location.href = it.url;
                    }
                });
                list.appendChild(li);
            });
        });

        box.classList.toggle('hidden', count === 0);
    }

    const doSearch = debounce(async function() {
        const input = document.getElementById('dashboard-search');
        const q = (input?.value || '').trim();
        const box = document.getElementById('search-suggestions');
        if (!q) { if (box) box.classList.add('hidden'); return; }

        // Mostrar loading
        const list = document.getElementById('suggestions-list');
        if (list) {
            list.innerHTML = '<li class="px-4 py-8 text-center text-slate-400"><span class="material-icons animate-spin mr-2">refresh</span>Buscando...</li>';
            box.classList.remove('hidden');
        }

        try {
            const url = new URL("{{ route('dashboard.search') }}", window.location.origin);
            url.searchParams.set('q', q);
            const res = await fetch(url.toString(), {
                headers: { 'Accept': 'application/json' },
                method: 'GET'
            });
            if (!res.ok) throw new Error('Error de búsqueda');
            const data = await res.json();
            renderSuggestions(data || {});
        } catch (e) {
            console.error('Error en búsqueda:', e);
            renderSuggestions({ usuarios: [], cursos: [], articulos: [] });
        }
    }, 300);

    function wireSearch() {
        const input = document.getElementById('dashboard-search');
        const listBox = document.getElementById('search-suggestions');
        if (!input) return;

        input.addEventListener('input', doSearch);
        input.addEventListener('focus', () => {
            if ((input.value || '').trim()) doSearch();
        });

        // Cerrar al hacer click fuera
        document.addEventListener('click', (e) => {
            if (!listBox || !input) return;
            if (!listBox.contains(e.target) && e.target !== input) {
                listBox.classList.add('hidden');
            }
        });

        // Navegación con teclado
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                const firstItem = document.querySelector('#suggestions-list li.px-4.py-3:not(.px-4.py-3.text-xs)');
                if (firstItem) firstItem.click();
            } else if (e.key === 'Escape') {
                listBox.classList.add('hidden');
                input.blur();
            }
        });

        // Mejorar la experiencia de búsqueda
        input.addEventListener('blur', (e) => {
            // Delay para permitir clicks en sugerencias
            setTimeout(() => {
                if (listBox && !listBox.contains(document.activeElement)) {
                    listBox.classList.add('hidden');
                }
            }, 150);
        });
    }

    // Funciones para manejar solicitudes de creador
    async function mostrarSolicitudes() {
        try {
            const response = await fetch('{{ route("admin.solicitudes-creador") }}', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            const data = await response.json();

            if (data.success && data.solicitudes.length > 0) {
                mostrarModalSolicitudes(data.solicitudes);
            } else {
                Swal.fire({
                    title: 'Sin solicitudes',
                    text: 'No hay solicitudes pendientes en este momento.',
                    icon: 'info',
                    background: '#0f172a',
                    color: '#e2e8f0',
                    confirmButtonColor: '#8b5cf6'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al cargar las solicitudes.',
                icon: 'error',
                background: '#0f172a',
                color: '#e2e8f0',
                confirmButtonColor: '#ef4444'
            });
        }
    }

    function chip(label, icon, color) {
        return `<span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-${color}-500/15 text-${color}-300 border border-${color}-500/30 mr-1">
            <span class="material-icons text-[12px] mr-1">${icon}</span>${label}
        </span>`;
    }

    function cardSolicitud(s) {
        const nombre = `${s.name ?? ''} ${s.apellido_paterno ?? ''} ${s.apellido_materno ?? ''}`.trim();
        const fecha = new Date(s.updated_at).toLocaleString();
        const extras = [];
        if (s.motivo_solicitud) extras.push(chip('Motivo', 'info', 'cyan'));
        if (s.experiencia_solicitud) extras.push(chip('Experiencia', 'badge', 'purple'));
        return `
        <div class="p-4 rounded-xl border border-slate-700/60 bg-slate-800/60 hover:bg-slate-800 transition-colors">
            <div class="flex items-start justify-between">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center text-white font-bold">${(s.name||'?')[0]?.toUpperCase()||'?'}</div>
                    <div>
                        <div class="text-sm font-semibold text-slate-100">${nombre || s.email}</div>
                        <div class="text-[11px] text-slate-400">${s.email}</div>
                        <div class="mt-1">${extras.join('')}</div>
                    </div>
                </div>
                <div class="text-[11px] text-slate-400">${fecha}</div>
            </div>
            <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                ${s.motivo_solicitud ? `<div class="col-span-1 md:col-span-2">
                    <div class="text-[11px] font-semibold text-slate-300 mb-1"><span class="material-icons text-[12px] align-[-2px] mr-1 text-cyan-300">info</span>Motivo</div>
                    <div class="text-[12px] text-slate-200 whitespace-pre-wrap">${s.motivo_solicitud}</div>
                </div>` : ''}
                ${s.experiencia_solicitud ? `<div class="col-span-1 md:col-span-2">
                    <div class="text-[11px] font-semibold text-slate-300 mb-1"><span class="material-icons text-[12px] align-[-2px] mr-1 text-purple-300">badge</span>Experiencia</div>
                    <div class="text-[12px] text-slate-200 whitespace-pre-wrap">${s.experiencia_solicitud}</div>
                </div>` : ''}
            </div>
            <div class="mt-4 flex items-center gap-2">
                <button onclick="aprobarSolicitud(${s.id})" class="px-3 py-2 rounded-lg bg-green-500/15 border border-green-500/30 text-green-300 hover:bg-green-500/25 text-[12px] inline-flex items-center">
                    <span class="material-icons text-[14px] mr-1">check</span>Aprobar
                </button>
                <button onclick="rechazarSolicitud(${s.id})" class="px-3 py-2 rounded-lg bg-red-500/15 border border-red-500/30 text-red-300 hover:bg-red-500/25 text-[12px] inline-flex items-center">
                    <span class="material-icons text-[14px] mr-1">close</span>Rechazar
                </button>
            </div>
        </div>`;
    }

    function mostrarModalSolicitudes(solicitudes) {
        const total = solicitudes.length;
        let html = `
            <div class="text-left text-[12.5px]">
                <div class="mb-3 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="material-icons text-[16px] text-yellow-300">notifications_active</span>
                        <h4 class="text-slate-100 font-semibold">Solicitudes de Creador Pendientes</h4>
                    </div>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-yellow-500/15 text-yellow-300 border border-yellow-500/30">${total} ${total===1?'solicitud':'solicitudes'}</span>
                </div>
                <div class="space-y-3 max-h-[28rem] overflow-y-auto pr-1">`;
        solicitudes.forEach(s => { html += cardSolicitud(s); });
        html += `</div></div>`;

        Swal.fire({
            html,
            width: 920,
            background: '#0f172a',
            color: '#e2e8f0',
            showConfirmButton: false,
            showCloseButton: true,
            customClass: {
                popup: 'border border-slate-700 rounded-2xl',
                closeButton: 'text-slate-400 hover:text-slate-200'
            }
        });
    }

    async function aprobarSolicitud(usuarioId) {
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
                const response = await fetch(`{{ url('admin/solicitudes-creador') }}/${usuarioId}/aprobar`, {
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
                        text: 'El usuario ahora es creador de contenido.',
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
                    text: 'Hubo un problema de conexión.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        }
    }

    async function rechazarSolicitud(usuarioId) {
        const { value: motivo } = await Swal.fire({
            title: 'Rechazar Solicitud',
            input: 'textarea',
            inputLabel: 'Motivo del rechazo',
            inputPlaceholder: 'Explica por qué rechazas esta solicitud...',
            inputAttributes: {
                'aria-label': 'Motivo del rechazo'
            },
            showCancelButton: true,
            confirmButtonText: 'Rechazar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            inputValidator: (value) => {
                if (!value.trim()) {
                    return 'El motivo del rechazo es requerido';
                }
            }
        });

        if (motivo) {
            try {
                const response = await fetch(`{{ url('admin/solicitudes-creador') }}/${usuarioId}/rechazar`, {
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
                        title: 'Solicitud Rechazada',
                        text: 'La solicitud ha sido rechazada.',
                        icon: 'info',
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
                    text: 'Hubo un problema de conexión.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            }
        }
    }

    // Init
    setActiveRangeButtons();
    wireRangeButtons();
    wireSearch();
    initChart();
    initDonuts();
</script>
@endpush
@endsection
