@extends('layouts.app')

@section('title', 'Cursos - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-pink-400/20 to-indigo-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-cyan-400/10 to-blue-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 via-purple-600/10 to-pink-600/10 dark:from-blue-400/5 dark:via-purple-400/5 dark:to-pink-400/5"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
            <div class="text-center mb-16">
                <!-- Animated Icon -->
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-blue-500 via-purple-600 to-pink-600 rounded-3xl mb-8 shadow-2xl shadow-blue-500/30 hover:shadow-blue-500/50 transition-all duration-500 hover:scale-110 hover:rotate-3 animate-bounce">
                    <span class="material-icons text-white text-4xl">school</span>
                </div>

                <!-- Enhanced Title -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-white mb-4 sm:mb-6 leading-tight drop-shadow-2xl">
                    <span class="inline-block hover:scale-105 transition-transform duration-300">Gestión de</span>
                    <br>
                    <span class="inline-block hover:scale-105 transition-transform duration-300 delay-100">Cursos</span>
                </h1>

                <!-- Enhanced Subtitle -->
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-white/90 max-w-2xl sm:max-w-3xl mx-auto leading-relaxed font-medium drop-shadow-lg px-4">
                    <span class="inline-block hover:text-white transition-colors duration-300">Crea, edita y administra</span>
                    <br>
                    <span class="inline-block hover:text-white transition-colors duration-300 delay-100">tus cursos con herramientas profesionales</span>
                </p>
            </div>

            <!-- Enhanced Action Bar -->
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4 sm:gap-6 lg:gap-8 mb-8 sm:mb-10 md:mb-12">
                <!-- Enhanced Stats Cards -->
                <div class="grid grid-cols-2 lg:flex lg:flex-wrap items-center justify-center gap-3 sm:gap-4 w-full lg:w-auto">
                    <div class="group flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 lg:px-6 py-3 sm:py-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-xl sm:rounded-2xl border border-gray-200/60 dark:border-slate-700/60 shadow-lg hover:shadow-xl hover:shadow-blue-500/20 transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                        <div class="p-1 sm:p-2 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg sm:rounded-xl group-hover:rotate-12 transition-transform duration-300">
                            <span class="material-icons text-white text-sm sm:text-lg">analytics</span>
                        </div>
                        <div>
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">{{ $cursos->total() }}</div>
                            <div class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Total Cursos</div>
                        </div>
                    </div>

                    <div class="group flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 lg:px-6 py-3 sm:py-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-xl sm:rounded-2xl border border-gray-200/60 dark:border-slate-700/60 shadow-lg hover:shadow-xl hover:shadow-green-500/20 transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                        <div class="p-1 sm:p-2 bg-gradient-to-r from-green-500 to-green-600 rounded-lg sm:rounded-xl group-hover:rotate-12 transition-transform duration-300">
                            <span class="material-icons text-white text-sm sm:text-lg">visibility</span>
                        </div>
                        <div>
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">{{ $cursos->where('activo', true)->count() }}</div>
                            <div class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Cursos Activos</div>
                        </div>
                    </div>

                    <div class="group flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 lg:px-6 py-3 sm:py-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-xl sm:rounded-2xl border border-gray-200/60 dark:border-slate-700/60 shadow-lg hover:shadow-xl hover:shadow-purple-500/20 transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                        <div class="p-1 sm:p-2 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg sm:rounded-xl group-hover:rotate-12 transition-transform duration-300">
                            <span class="material-icons text-white text-sm sm:text-lg">school</span>
                        </div>
                        <div>
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">{{ $cursos->where('activo', false)->count() }}</div>
                            <div class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Cursos Inactivos</div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Create Button -->
                <button onclick="openCreateModal()"
                        class="group relative inline-flex items-center justify-center w-full sm:w-auto px-6 sm:px-8 lg:px-10 py-4 sm:py-5 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-bold rounded-2xl sm:rounded-3xl shadow-xl sm:shadow-2xl shadow-blue-500/30 hover:shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 hover:scale-105 sm:hover:scale-110 hover:-translate-y-1 sm:hover:-translate-y-2 transform"
                        data-loading="false">
                    <!-- Animated Background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-xl sm:rounded-2xl lg:rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <!-- Sparkle Effect -->
                    <div class="absolute -top-1 -right-1 w-2 h-2 sm:w-3 sm:h-3 bg-yellow-400 rounded-full animate-ping"></div>
                    <div class="absolute -bottom-1 -left-1 w-1 h-1 sm:w-2 sm:h-2 bg-cyan-400 rounded-full animate-ping delay-300"></div>

                    <span class="material-icons mr-2 sm:mr-4 relative z-10 text-lg sm:text-2xl group-hover:rotate-12 transition-transform duration-300">add_circle</span>
                    <span class="button-text relative z-10 text-sm sm:text-lg">Crear Nuevo Curso</span>

                    <!-- Hover Arrow -->
                    <span class="material-icons ml-1 sm:ml-2 relative z-10 text-sm sm:text-base md:text-lg group-hover:translate-x-1 transition-transform duration-300">arrow_forward</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <!-- Enhanced Level Filters -->
        <div class="mb-6 sm:mb-8 md:mb-10 lg:mb-12">
            <div class="text-center mb-3 sm:mb-4 md:mb-6">
                <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-900 dark:text-white mb-1 sm:mb-2">Filtrar por Nivel</h3>
                <p class="text-xs sm:text-sm md:text-base text-gray-600 dark:text-gray-400">Selecciona el nivel de dificultad</p>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <button onclick="filterByLevel('')"
                        class="group relative inline-flex items-center px-8 py-4 rounded-3xl font-semibold text-base transition-all duration-500 hover:scale-105 hover:-translate-y-1 {{ !request('nivel') ? 'bg-gradient-to-r from-blue-500 via-purple-600 to-pink-600 text-white shadow-2xl shadow-blue-500/30' : 'bg-white/90 dark:bg-slate-800/90 text-gray-700 dark:text-gray-300 border border-gray-200/60 dark:border-slate-700/60 hover:bg-gradient-to-r hover:from-blue-500 hover:via-purple-600 hover:to-pink-600 hover:text-white hover:shadow-2xl hover:shadow-blue-500/30' }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-600 to-pink-600 rounded-3xl blur opacity-0 group-hover:opacity-75 transition-opacity duration-500"></div>
                    <span class="material-icons text-lg mr-3 relative z-10 group-hover:rotate-12 transition-transform duration-300">apps</span>
                    <span class="relative z-10">Todos los niveles</span>
                </button>
                <button onclick="filterByLevel('principiante')"
                        class="group relative inline-flex items-center px-8 py-4 rounded-3xl font-semibold text-base transition-all duration-500 hover:scale-105 hover:-translate-y-1 {{ request('nivel') === 'principiante' ? 'bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600 text-white shadow-2xl shadow-green-500/30' : 'bg-white/90 dark:bg-slate-800/90 text-gray-700 dark:text-gray-300 border border-gray-200/60 dark:border-slate-700/60 hover:bg-gradient-to-r hover:from-green-500 hover:via-emerald-600 hover:to-teal-600 hover:text-white hover:shadow-2xl hover:shadow-green-500/30' }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600 rounded-3xl blur opacity-0 group-hover:opacity-75 transition-opacity duration-500"></div>
                    <span class="material-icons text-lg mr-3 relative z-10 group-hover:rotate-12 transition-transform duration-300">trending_up</span>
                    <span class="relative z-10">Principiante</span>
                </button>
                <button onclick="filterByLevel('intermedio')"
                        class="group relative inline-flex items-center px-8 py-4 rounded-3xl font-semibold text-base transition-all duration-500 hover:scale-105 hover:-translate-y-1 {{ request('nivel') === 'intermedio' ? 'bg-gradient-to-r from-yellow-500 via-orange-600 to-red-600 text-white shadow-2xl shadow-yellow-500/30' : 'bg-white/90 dark:bg-slate-800/90 text-gray-700 dark:text-gray-300 border border-gray-200/60 dark:border-slate-700/60 hover:bg-gradient-to-r hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 hover:text-white hover:shadow-2xl hover:shadow-yellow-500/30' }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-500 via-orange-600 to-red-600 rounded-3xl blur opacity-0 group-hover:opacity-75 transition-opacity duration-500"></div>
                    <span class="material-icons text-lg mr-3 relative z-10 group-hover:rotate-12 transition-transform duration-300">trending_flat</span>
                    <span class="relative z-10">Intermedio</span>
                </button>
                <button onclick="filterByLevel('avanzado')"
                        class="group relative inline-flex items-center px-8 py-4 rounded-3xl font-semibold text-base transition-all duration-500 hover:scale-105 hover:-translate-y-1 {{ request('nivel') === 'avanzado' ? 'bg-gradient-to-r from-purple-500 via-indigo-600 to-blue-600 text-white shadow-2xl shadow-purple-500/30' : 'bg-white/90 dark:bg-slate-800/90 text-gray-700 dark:text-gray-300 border border-gray-200/60 dark:border-slate-700/60 hover:bg-gradient-to-r hover:from-purple-500 hover:via-indigo-600 hover:to-blue-600 hover:text-white hover:shadow-2xl hover:shadow-purple-500/30' }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-indigo-600 to-blue-600 rounded-3xl blur opacity-0 group-hover:opacity-75 transition-opacity duration-500"></div>
                    <span class="material-icons text-lg mr-3 relative z-10 group-hover:rotate-12 transition-transform duration-300">trending_down</span>
                    <span class="relative z-10">Avanzado</span>
                </button>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-8 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800 rounded-2xl">
                <div class="flex items-center">
                    <span class="material-icons text-green-600 dark:text-green-400 mr-3">check_circle</span>
                    <p class="text-green-800 dark:text-green-200 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Enhanced Courses Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-16 sm:gap-x-16 sm:gap-y-20 md:gap-x-20 md:gap-y-24 lg:gap-x-24 lg:gap-y-32">
            @forelse($cursos as $curso)
                <div class="group relative bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden border-2 border-gray-200/80 dark:border-slate-700/80 hover:border-blue-400/80 dark:hover:border-blue-500/80 hover:-translate-y-1 sm:hover:-translate-y-2 hover:scale-[1.02] transform p-2">
                    <!-- Enhanced Course Image -->
                    <div class="relative h-40 sm:h-48 md:h-56 lg:h-64 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 flex items-center justify-center overflow-hidden">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}" alt="{{ $curso->titulo }}" class="max-w-full max-h-full object-contain transition-all duration-700 group-hover:scale-110 group-hover:rotate-2">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 flex items-center justify-center group-hover:from-blue-400 group-hover:via-purple-500 group-hover:to-pink-500 transition-all duration-500">
                                <span class="material-icons text-white text-7xl opacity-90 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">school</span>
                            </div>
                        @endif

                        <!-- Enhanced Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Floating Elements -->
                        <div class="absolute top-2 right-2 w-2 h-2 bg-yellow-400 rounded-full animate-ping opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute bottom-2 left-2 w-1 h-1 bg-cyan-400 rounded-full animate-ping delay-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Enhanced Status Badge -->
                        <div class="absolute top-2 right-2 sm:top-4 sm:right-4">
                            <span class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-2 text-xs sm:text-sm font-bold rounded-lg sm:rounded-xl backdrop-blur-xl shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:rotate-3
                                @if($curso->activo) bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-green-500/30
                                @else bg-gradient-to-r from-gray-500 to-gray-600 text-white shadow-gray-500/30
                                @endif">
                                <span class="material-icons text-xs sm:text-sm mr-1 sm:mr-2">
                                    @if($curso->activo) visibility
                                    @else archive
                                    @endif
                                </span>
                                <span class="hidden sm:inline">{{ $curso->activo ? 'Activo' : 'Inactivo' }}</span>
                            </span>
                        </div>

                        <!-- Enhanced Level Badge -->
                        <div class="absolute top-2 left-2 sm:top-4 sm:left-4">
                            <span class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-2 text-xs sm:text-sm font-bold rounded-lg sm:rounded-xl backdrop-blur-xl shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:-rotate-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-blue-500/30">
                                <span class="material-icons text-xs sm:text-sm mr-1 sm:mr-2">
                                    @if($curso->nivel === 'principiante') trending_up
                                    @elseif($curso->nivel === 'intermedio') trending_flat
                                    @else trending_down
                                    @endif
                                </span>
                                <span class="hidden sm:inline">{{ ucfirst($curso->nivel) }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Enhanced Course Content -->
                    <div class="p-4 sm:p-4 md:p-6 lg:p-8">
                        <!-- Enhanced Price and Duration -->
                        <div class="flex items-center justify-between mb-3 sm:mb-4 md:mb-6">
                            <div class="group/price relative">
                                <span class="inline-flex items-center px-2 sm:px-3 md:px-4 py-1 sm:py-2 text-xs sm:text-sm font-bold rounded-lg sm:rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-500/30 group-hover/price:scale-110 group-hover/price:rotate-3 transition-all duration-300">
                                    <span class="material-icons text-xs sm:text-sm mr-1">attach_money</span>
                                ${{ number_format($curso->precio, 2) }}
                            </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg sm:rounded-xl blur opacity-0 group-hover/price:opacity-50 transition-opacity duration-300"></div>
                            </div>
                            @if($curso->duracion_horas)
                                <div class="flex items-center px-2 sm:px-3 py-1 sm:py-2 bg-gradient-to-r from-orange-100 to-red-100 dark:from-orange-900/30 dark:to-red-900/30 rounded-md sm:rounded-lg border border-orange-200/50 dark:border-orange-700/50">
                                    <span class="material-icons text-orange-600 dark:text-orange-400 text-xs sm:text-sm mr-1">schedule</span>
                                    <span class="text-xs sm:text-sm font-semibold text-orange-700 dark:text-orange-300">{{ $curso->duracion_horas }}h</span>
                                </div>
                            @endif
                        </div>

                        <!-- Enhanced Title and Description -->
                        <h3 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white mb-2 sm:mb-3 md:mb-4 line-clamp-2 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 group-hover:bg-clip-text transition-all duration-500 leading-tight">
                            {{ $curso->titulo }}
                        </h3>

                        @if($curso->descripcion)
                            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mb-3 sm:mb-4 md:mb-6 line-clamp-2 sm:line-clamp-3 leading-relaxed group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                                {{ Str::limit($curso->descripcion, 80) }}
                            </p>
                        @endif

                        <!-- Enhanced Creator and Capacity Info -->
                        <div class="flex flex-col gap-2 mb-4 sm:mb-4 md:mb-6 lg:mb-8">
                            <div class="flex items-center px-2 sm:px-3 py-1 sm:py-2 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-md sm:rounded-lg border border-blue-200/50 dark:border-blue-700/50">
                                <span class="material-icons text-blue-600 dark:text-blue-400 text-sm mr-2">person</span>
                                <span class="text-sm font-semibold text-blue-700 dark:text-blue-300 truncate">{{ $curso->creador->name }} {{ $curso->creador->apellido_paterno }}</span>
                            </div>
                            @if($curso->cupo_maximo)
                                <div class="flex items-center px-2 sm:px-3 py-1 sm:py-2 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-md sm:rounded-lg border border-purple-200/50 dark:border-purple-700/50">
                                    <span class="material-icons text-purple-600 dark:text-purple-400 text-sm mr-2">group</span>
                                    <span class="text-sm font-semibold text-purple-700 dark:text-purple-300">{{ $curso->cupo_maximo }} cupos</span>
                                </div>
                            @endif
                        </div>

                        <!-- Enhanced Actions -->
                        <div class="pt-4 sm:pt-6 border-t border-gray-200/40 dark:border-slate-700/40">
                            <!-- Mobile Layout: Stacked buttons -->
                            <div class="flex flex-col sm:hidden space-y-2">
                                <a href="{{ route('cursos.ver', $curso->id) }}"
                                   class="group/preview relative inline-flex items-center justify-center w-full py-3 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold hover:from-blue-600 hover:to-indigo-700 hover:scale-105 transition-all duration-300"
                                   title="Vista Previa">
                                    <span class="material-icons text-sm mr-2">visibility</span>
                                    Ver Curso
                                </a>
                                <div class="flex space-x-2">
                                    <button onclick="openEditModal({{ $curso->id }})"
                                            class="group/edit relative inline-flex items-center justify-center flex-1 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-pink-600 text-white font-semibold hover:from-purple-600 hover:to-pink-700 hover:scale-105 transition-all duration-300"
                                            title="Editar Curso">
                                        <span class="material-icons text-sm mr-2">edit</span>
                                        Editar
                                    </button>
                                    <button onclick="openDeleteModal({{ $curso->id }}, '{{ $curso->titulo }}')"
                                            class="group/delete relative inline-flex items-center justify-center flex-1 py-3 rounded-xl bg-gradient-to-r from-red-500 to-pink-600 text-white font-semibold hover:from-red-600 hover:to-pink-700 hover:scale-105 transition-all duration-300"
                                            title="Eliminar Curso">
                                        <span class="material-icons text-sm mr-2">delete</span>
                                        Eliminar
                                    </button>
                                </div>
                            </div>

                            <!-- Desktop Layout: Horizontal buttons -->
                            <div class="hidden sm:flex items-center justify-between">
                                <div class="flex space-x-3">
                                    <!-- Vista Previa -->
                                    <a href="{{ route('cursos.ver', $curso->id) }}"
                                    class="group/preview relative inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 backdrop-blur-xl border border-blue-300/50 dark:border-blue-600/50 hover:border-blue-500 dark:hover:border-blue-400 hover:bg-gradient-to-br hover:from-blue-500 hover:to-indigo-600 text-blue-600 dark:text-blue-400 hover:text-white hover:scale-110 hover:-translate-y-1 hover:shadow-2xl hover:shadow-blue-500/40 transition-all duration-500 ease-out"
                                    title="Vista Previa">
                                        <span class="material-icons text-sm transform group-hover/preview:scale-125 group-hover/preview:-rotate-6 transition-all duration-500">visibility</span>
                                        <div class="absolute inset-0 rounded-lg bg-gradient-to-br from-blue-500/20 to-indigo-600/20 opacity-0 group-hover/preview:opacity-100 transition-opacity duration-500"></div>
                                    </a>

                                    <!-- Editar -->
                                    <button onclick="openEditModal({{ $curso->id }})"
                                            class="group/edit relative inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 backdrop-blur-xl border border-purple-300/50 dark:border-purple-600/50 hover:border-purple-500 dark:hover:border-purple-400 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-600 text-purple-600 dark:text-purple-400 hover:text-white hover:scale-110 hover:-translate-y-1 hover:shadow-2xl hover:shadow-purple-500/40 transition-all duration-500 ease-out"
                                            title="Editar Curso">
                                        <span class="material-icons text-sm transform group-hover/edit:scale-125 group-hover/edit:-rotate-6 transition-all duration-500">edit</span>
                                        <div class="absolute inset-0 rounded-lg bg-gradient-to-br from-purple-500/20 to-pink-600/20 opacity-0 group-hover/edit:opacity-100 transition-opacity duration-500"></div>
                                    </button>
                                </div>

                                <!-- Eliminar -->
                                <button onclick="openDeleteModal({{ $curso->id }}, '{{ $curso->titulo }}')"
                                        class="group/delete relative inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 backdrop-blur-xl border border-red-300/50 dark:border-red-600/50 hover:border-red-500 dark:hover:border-red-400 hover:bg-gradient-to-br hover:from-red-500 hover:to-pink-600 text-red-600 dark:text-red-400 hover:text-white hover:scale-110 hover:translate-y-1 hover:rotate-6 hover:shadow-2xl hover:shadow-red-500/40 transition-all duration-500 ease-out"
                                        title="Eliminar Curso">
                                    <span class="material-icons text-sm transform group-hover/delete:scale-125 group-hover/delete:rotate-12 transition-all duration-500">delete</span>
                                    <div class="absolute inset-0 rounded-lg bg-gradient-to-br from-red-500/20 to-pink-600/20 opacity-0 group-hover/delete:opacity-100 transition-opacity duration-500"></div>
                                </button>
                            </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="text-center py-24">
                        <!-- Enhanced Empty State -->
                        <div class="relative mb-12">
                            <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-gray-100 via-blue-50 to-purple-50 dark:from-gray-800 dark:via-blue-900/20 dark:to-purple-900/20 rounded-4xl mb-8 shadow-2xl border border-gray-200/50 dark:border-gray-700/50 animate-pulse">
                                <span class="material-icons text-6xl text-gray-400 dark:text-gray-600 animate-bounce">school</span>
                        </div>
                            <!-- Floating Elements -->
                            <div class="absolute -top-4 -right-4 w-4 h-4 bg-blue-400 rounded-full animate-ping"></div>
                            <div class="absolute -bottom-4 -left-4 w-3 h-3 bg-purple-400 rounded-full animate-ping delay-500"></div>
                            <div class="absolute top-1/2 -right-8 w-2 h-2 bg-pink-400 rounded-full animate-ping delay-1000"></div>
                        </div>

                        <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-4 bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 dark:from-white dark:via-blue-100 dark:to-purple-100 bg-clip-text text-transparent">
                            ¡No hay cursos aún!
                        </h3>
                        <p class="text-xl text-gray-600 dark:text-gray-400 mb-12 max-w-lg mx-auto leading-relaxed">
                            Comienza creando tu primer curso y comparte tu conocimiento con el mundo.
                            <span class="font-semibold text-blue-600 dark:text-blue-400">¡Es más fácil de lo que piensas!</span>
                        </p>

                        <button onclick="openCreateModal()"
                                class="group relative inline-flex items-center px-12 py-6 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-bold rounded-3xl shadow-2xl shadow-blue-500/30 hover:shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 hover:scale-110 hover:-translate-y-2 transform">
                            <!-- Animated Background -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <!-- Sparkle Effects -->
                            <div class="absolute -top-2 -right-2 w-4 h-4 bg-yellow-400 rounded-full animate-ping"></div>
                            <div class="absolute -bottom-2 -left-2 w-3 h-3 bg-cyan-400 rounded-full animate-ping delay-300"></div>
                            <div class="absolute top-1/2 -right-6 w-2 h-2 bg-pink-400 rounded-full animate-ping delay-700"></div>

                            <span class="material-icons mr-4 relative z-10 text-3xl group-hover:rotate-12 transition-transform duration-300">add_circle</span>
                            <span class="relative z-10 text-xl">Crear mi primer curso</span>

                            <!-- Hover Arrow -->
                            <span class="material-icons ml-4 relative z-10 text-xl group-hover:translate-x-2 transition-transform duration-300">arrow_forward</span>
                        </button>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Enhanced Pagination -->
        @if($cursos->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-3xl p-6 shadow-2xl border border-gray-200/60 dark:border-slate-700/60 hover:shadow-3xl transition-all duration-300">
                    {{ $cursos->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Enhanced Modal para Crear Curso -->
<div id="createModal" class="fixed inset-0 bg-black/80 backdrop-blur-xl overflow-y-auto h-full w-full hidden z-50 transition-all duration-700 ease-out">
    <div class="relative top-4 mx-auto p-0 border-0 w-11/12 max-w-7xl shadow-3xl rounded-4xl bg-white/98 dark:bg-slate-800/98 backdrop-blur-2xl transform transition-all duration-700 ease-out scale-95 opacity-0 overflow-hidden border border-white/30 dark:border-slate-600/50" id="createModalContent">
        <!-- Enhanced Header con gradiente -->
        <div class="relative bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 p-10 text-white overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/95 via-purple-600/95 to-pink-600/95"></div>
            <div class="absolute -top-32 -right-32 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-32 -left-32 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-white/5 rounded-full blur-2xl animate-pulse delay-500"></div>

            <!-- Floating Sparkles -->
            <div class="absolute top-8 right-16 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
            <div class="absolute bottom-8 left-16 w-2 h-2 bg-cyan-400 rounded-full animate-ping delay-300"></div>
            <div class="absolute top-1/2 right-8 w-1 h-1 bg-pink-400 rounded-full animate-ping delay-700"></div>

            <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="p-4 bg-white/20 rounded-2xl backdrop-blur-sm border border-white/30">
                        <span class="material-icons text-3xl">add_circle</span>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold mb-2">Crear Nuevo Curso</h3>
                        <p class="text-blue-100 text-base">Completa la información para crear tu curso profesional</p>
                    </div>
                </div>
                <button onclick="closeCreateModal()" class="p-4 text-white hover:bg-white/20 rounded-2xl transition-all duration-300 hover:scale-110 backdrop-blur-sm border border-white/30 hover:border-white/50">
                    <span class="material-icons text-2xl">close</span>
                </button>
            </div>
        </div>

        <!-- Contenido del formulario -->
        <div class="p-10">
            <form id="createForm" action="{{ route('admin.cursos.store') }}" method="POST" enctype="multipart/form-data" onsubmit="submitCreateForm(event)">
                @csrf

                <!-- Sección de Información Básica -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
                        <div class="p-3 bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-2xl mr-4">
                            <span class="material-icons text-blue-600 dark:text-blue-400">info</span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white">Información Básica</h4>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Título -->
                        <div class="lg:col-span-2">
                            <label for="create_titulo" class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-300 mb-4">
                                <span class="material-icons text-base mr-3 text-blue-600 dark:text-blue-400">title</span>
                                <span class="flex-1">Título del Curso *</span>
                            </label>
                            <div class="relative group">
                                <input type="text"
                                       id="create_titulo"
                                       name="titulo"
                                       class="w-full px-6 py-4 pl-14 bg-white/80 dark:bg-slate-700/80 backdrop-blur-sm border-2 border-gray-200/50 dark:border-gray-600/50 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 dark:text-white transition-all duration-300 hover:border-gray-300 dark:hover:border-gray-500 placeholder-gray-400 dark:placeholder-gray-500"
                                       placeholder="Escribe un título atractivo para tu curso"
                                       required>
                                <span class="absolute left-5 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 group-focus-within:text-blue-500 transition-colors">edit</span>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="lg:col-span-2">
                            <label for="create_descripcion" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <span class="material-icons text-base mr-2 text-cyan-600 dark:text-cyan-400 flex items-center justify-center">description</span>
                                <span>Descripción del Curso *</span>
                            </label>
                            <div class="relative">
                                <textarea id="create_descripcion"
                                    name="descripcion"
                                    rows="4"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 resize-none"
                                    placeholder="Describe qué aprenderán los estudiantes en este curso"
                                    required></textarea>
                                <span class="absolute left-4 top-4 material-icons text-gray-400">description</span>
                            </div>
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="create_precio" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-green-600 dark:text-green-400 w-5 h-5 flex items-center justify-center">attach_money</span>
                                <span class="flex-1">Precio *</span>
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="create_precio"
                                       name="precio"
                                       step="0.01"
                                       min="0"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                       placeholder="0.00"
                                       required>
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">attach_money</span>
                            </div>
                        </div>

                        <!-- Duración -->
                        <div>
                            <label for="create_duracion_horas" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-orange-600 dark:text-orange-400 w-5 h-5 flex items-center justify-center">schedule</span>
                                <span class="flex-1">Duración (horas)</span>
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="create_duracion_horas"
                                       name="duracion_horas"
                                       min="1"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                       placeholder="Ej: 40">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">schedule</span>
                            </div>
                        </div>

                        <!-- Nivel -->
                        <div>
                            <label for="create_nivel" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-purple-600 dark:text-purple-400 w-5 h-5 flex items-center justify-center">trending_up</span>
                                <span class="flex-1">Nivel *</span>
                            </label>
                            <div class="relative">
                                <select id="create_nivel"
                                        name="nivel"
                                        class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 appearance-none cursor-pointer"
                                        required>
                                    <option value="">Selecciona un nivel</option>
                                    <option value="principiante">📈 Principiante</option>
                                    <option value="intermedio">📊 Intermedio</option>
                                    <option value="avanzado">📉 Avanzado</option>
                                </select>
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">trending_up</span>
                                <span class="absolute right-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 pointer-events-none">keyboard_arrow_down</span>
                            </div>
                        </div>

                        <!-- Cupo Máximo -->
                        <div>
                            <label for="create_cupo_maximo" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-indigo-600 dark:text-indigo-400 w-5 h-5 flex items-center justify-center">group</span>
                                <span class="flex-1">Cupo Máximo</span>
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="create_cupo_maximo"
                                       name="cupo_maximo"
                                       min="1"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                       placeholder="Ej: 30">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">group</span>
                            </div>
                        </div>

                        <!-- Fecha de Inicio -->
                        <div>
                            <label for="create_fecha_inicio" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-pink-600 dark:text-pink-400 w-5 h-5 flex items-center justify-center">event</span>
                                <span class="flex-1">Fecha de Inicio</span>
                            </label>
                            <div class="relative">
                                <input type="date"
                                       id="create_fecha_inicio"
                                       name="fecha_inicio"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">event</span>
                            </div>
                        </div>

                        <!-- Fecha de Fin -->
                        <div>
                            <label for="create_fecha_fin" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-red-600 dark:text-red-400 w-5 h-5 flex items-center justify-center">event_available</span>
                                <span class="flex-1">Fecha de Fin</span>
                            </label>
                            <div class="relative">
                                <input type="date"
                                       id="create_fecha_fin"
                                       name="fecha_fin"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">event_available</span>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="lg:col-span-2">
                            <label for="create_slug" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-gray-600 dark:text-gray-400 w-5 h-5 flex items-center justify-center">link</span>
                                <span class="flex-1">URL Personalizada (Slug)</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">(Opcional)</span>
                            </label>
                            <div class="relative">
                                <input type="text"
                                       id="create_slug"
                                       name="slug"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                       placeholder="mi-curso-personalizado">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">link</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                Si no especificas una URL, se generará automáticamente basada en el título del curso
                            </p>
                        </div>

                        <!-- Requisitos -->
                        <div class="lg:col-span-2">
                            <label for="create_requisitos" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-yellow-600 dark:text-yellow-400 w-5 h-5 flex items-center justify-center">checklist</span>
                                <span class="flex-1">Requisitos Previos</span>
                            </label>
                            <div class="relative">
                                <textarea id="create_requisitos"
                                    name="requisitos"
                                    rows="3"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 resize-none"
                                    placeholder="Lista los conocimientos o requisitos previos necesarios para tomar este curso"></textarea>
                                <span class="absolute left-4 top-4 material-icons text-gray-400">checklist</span>
                            </div>
                        </div>

                        <!-- Información del Creador -->
                        <div class="lg:col-span-2">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-gradient-to-r from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-2xl mr-4">
                                    <span class="material-icons text-purple-600 dark:text-purple-400">person</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">Información del Creador</h4>
                            </div>
                        </div>

                        <!-- Nombre del Creador -->
                        <div>
                            <label for="create_creador_nombre" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-purple-600 dark:text-purple-400 w-5 h-5 flex items-center justify-center">person</span>
                                <span class="flex-1">Nombre del Creador *</span>
                            </label>
                            <div class="relative">
                                <input type="text"
                                       id="create_creador_nombre"
                                       name="creador_nombre"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                       placeholder="Ej: Juan"
                                       required>
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">person</span>
                            </div>
                        </div>

                        <!-- Apellido del Creador -->
                        <div>
                            <label for="create_creador_apellido" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-purple-600 dark:text-purple-400 w-5 h-5 flex items-center justify-center">person_outline</span>
                                <span class="flex-1">Apellido del Creador *</span>
                            </label>
                            <div class="relative">
                                <input type="text"
                                       id="create_creador_apellido"
                                       name="creador_apellido"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                       placeholder="Ej: Pérez"
                                       required>
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">person_outline</span>
                            </div>
                        </div>

                        <!-- Profesión del Creador -->
                        <div>
                            <label for="create_creador_profesion" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-purple-600 dark:text-purple-400 w-5 h-5 flex items-center justify-center">work</span>
                                <span class="flex-1">Profesión</span>
                            </label>
                            <div class="relative">
                                <input type="text"
                                       id="create_creador_profesion"
                                       name="creador_profesion"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                       placeholder="Ej: Desarrollador Full Stack">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">work</span>
                            </div>
                        </div>

                        <!-- Descripción del Creador -->
                        <div>
                            <label for="create_creador_descripcion" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span class="material-icons text-base mr-2 text-purple-600 dark:text-purple-400 w-5 h-5 flex items-center justify-center">description</span>
                                <span class="flex-1">Descripción del Creador</span>
                            </label>
                            <div class="relative">
                                <textarea id="create_creador_descripcion"
                                    name="creador_descripcion"
                                    rows="3"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 resize-none"
                                    placeholder="Cuéntanos sobre tu experiencia y especialidades"></textarea>
                                <span class="absolute left-4 top-4 material-icons text-gray-400">description</span>
                            </div>
                        </div>

                        <!-- Estado Activo -->
                        <div class="lg:col-span-2">
                            <label class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <span class="material-icons text-base mr-2 text-green-600 dark:text-green-400">visibility</span>
                                <span>Estado del Curso</span>
                            </label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center">
                                    <input type="checkbox"
                                           name="activo"
                                           value="1"
                                           checked
                                           class="mr-3 rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Curso activo (visible para estudiantes)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Imagen -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-purple-100 dark:bg-purple-900/30 rounded-lg mr-3">
                            <span class="material-icons text-purple-600 dark:text-purple-400">image</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Imagen del Curso</h4>
                    </div>

                    <div>
                        <label for="create_url_imagen" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                            <span class="material-icons text-base mr-2 text-purple-600 dark:text-purple-400 w-5 h-5 flex items-center justify-center">cloud_upload</span>
                            <span class="flex-1">Subir Imagen del Curso</span>
                        </label>
                        <div class="relative">
                            <input type="file"
                                   id="create_url_imagen"
                                   name="url_imagen"
                                   accept="image/*"
                                   onchange="previewImage(this, 'create_image_preview')"
                                   class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">upload</span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Recomendado: 800x600px o similar</p>
                        <div id="create_image_preview" class="mt-3 hidden">
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-1 border border-gray-200 dark:border-gray-600 relative group inline-block">
                                <div class="w-20 h-20 flex items-center justify-center bg-white dark:bg-gray-700 rounded overflow-hidden">
                                    <img class="max-w-full max-h-full object-contain" alt="Preview">
                                </div>
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded"></div>
                                <button type="button"
                                        onclick="removeImagePreview('create_image_preview', 'create_url_imagen')"
                                        class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center text-xs cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                                    ×
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Redes Sociales -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="p-2 bg-gradient-to-r from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-lg mr-3">
                                <span class="material-icons text-blue-600 dark:text-blue-400">share</span>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Redes Sociales del Creador</h4>
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">(Opcional)</span>
                    </div>

                    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-xl p-6 border border-blue-200/50 dark:border-blue-700/50">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Selecciona las redes sociales que quieres habilitar y proporciona tu usuario para cada una:
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Facebook -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_facebook"
                                           value="1"
                                           class="mr-3 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('facebook', this)">
                                    <span class="material-icons text-blue-600 text-lg mr-2">facebook</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Facebook</span>
                                </label>
                                <input type="text"
                                       name="facebook_usuario"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario o usuario"
                                       style="display: none;">
                            </div>

                            <!-- Twitter -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_twitter"
                                           value="1"
                                           class="mr-3 rounded border-gray-300 text-blue-400 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('twitter', this)">
                                    <span class="material-icons text-blue-400 text-lg mr-2">alternate_email</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Twitter</span>
                                </label>
                                <input type="text"
                                       name="twitter_usuario"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="display: none;">
                            </div>

                            <!-- LinkedIn -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_linkedin"
                                           value="1"
                                           class="mr-3 rounded border-gray-300 text-blue-700 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('linkedin', this)">
                                    <span class="material-icons text-blue-700 text-lg mr-2">work</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">LinkedIn</span>
                                </label>
                                <input type="text"
                                       name="linkedin_usuario"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="usuario o in/usuario"
                                       style="display: none;">
                            </div>

                            <!-- Instagram -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_instagram"
                                           value="1"
                                           class="mr-3 rounded border-gray-300 text-pink-600 focus:ring-pink-500"
                                           onchange="toggleRedSocialField('instagram', this)">
                                    <span class="material-icons text-pink-600 text-lg mr-2">photo_camera</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Instagram</span>
                                </label>
                                <input type="text"
                                       name="instagram_usuario"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="display: none;">
                            </div>

                            <!-- VK -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_vk"
                                           value="1"
                                           class="mr-3 rounded border-gray-300 text-blue-800 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('vk', this)">
                                    <span class="material-icons text-blue-800 text-lg mr-2">group</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">VK</span>
                                </label>
                                <input type="text"
                                       name="vk_usuario"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="usuario"
                                       style="display: none;">
                            </div>

                            <!-- TikTok -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_tiktok"
                                           value="1"
                                           class="mr-3 rounded border-gray-300 text-gray-800 focus:ring-gray-500"
                                           onchange="toggleRedSocialField('tiktok', this)">
                                    <span class="material-icons text-gray-800 text-lg mr-2">music_note</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">TikTok</span>
                                </label>
                                <input type="text"
                                       name="tiktok_usuario"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Niveles -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="p-2 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg mr-3">
                                <span class="material-icons text-indigo-600 dark:text-indigo-400">layers</span>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Niveles del Curso</h4>
                        </div>
                        <button type="button" onclick="addNivel()" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-lg hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 hover:scale-105">
                            <span class="material-icons text-sm mr-2">add</span>
                            Agregar Nivel
                        </button>
                    </div>

                    <div id="niveles-container" class="space-y-4">
                        <!-- Los niveles se agregarán dinámicamente aquí -->
                    </div>
                </div>

                <!-- Enhanced Botones de Acción -->
                <div class="flex items-center justify-between pt-12 border-t border-gradient-to-r from-gray-200/60 via-gray-300/80 to-gray-200/60 dark:from-slate-700/60 dark:via-slate-600/80 dark:to-slate-700/60">
                    <div class="flex items-center px-6 py-3 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-2xl border border-blue-200/50 dark:border-blue-700/50">
                        <span class="material-icons text-blue-600 dark:text-blue-400 text-lg mr-3">info</span>
                        <span class="text-sm font-semibold text-blue-700 dark:text-blue-300">Los campos marcados con * son obligatorios</span>
                    </div>
                    <div class="flex items-center space-x-6">
                        <button type="button"
                                onclick="closeCreateModal()"
                                class="group relative px-10 py-5 border-2 border-gray-300/60 dark:border-gray-600/60 text-gray-700 dark:text-gray-300 font-bold rounded-3xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-slate-700 dark:hover:to-slate-600 backdrop-blur-xl transition-all duration-500 hover:scale-110 hover:-translate-y-1 hover:border-gray-400 dark:hover:border-gray-500 hover:shadow-xl">
                            <span class="material-icons mr-3 text-lg group-hover:-rotate-12 transition-transform duration-300">close</span>
                            <span>Cancelar</span>
                        </button>
                        <button type="submit"
                                class="group relative px-12 py-5 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-bold rounded-3xl hover:from-blue-500 hover:via-purple-500 hover:to-pink-500 transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-blue-500/40 transform hover:-translate-y-2">
                            <!-- Animated Background -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <!-- Sparkle Effects -->
                            <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                            <div class="absolute -bottom-1 -left-1 w-2 h-2 bg-cyan-400 rounded-full animate-ping delay-300"></div>

                            <span class="material-icons mr-3 text-lg relative z-10 group-hover:rotate-12 transition-transform duration-300">add_circle</span>
                            <span class="relative z-10 text-lg">Crear Curso</span>

                            <!-- Hover Arrow -->
                            <span class="material-icons ml-3 text-lg relative z-10 group-hover:translate-x-1 transition-transform duration-300">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Enhanced Modal para Editar Curso -->
<div id="editModal" class="fixed inset-0 bg-black/80 backdrop-blur-xl overflow-y-auto h-full w-full hidden z-50 transition-all duration-700 ease-out">
    <div class="relative top-2 sm:top-6 mx-auto p-0 border-0 w-full sm:w-11/12 max-w-4xl lg:max-w-6xl shadow-3xl rounded-2xl sm:rounded-4xl bg-white/98 dark:bg-slate-800/98 backdrop-blur-2xl transform transition-all duration-700 ease-out scale-95 opacity-0 overflow-hidden border border-white/30 dark:border-slate-600/50" id="editModalContent">
        <!-- Enhanced Header con gradiente -->
        <div class="relative bg-gradient-to-r from-blue-500 via-purple-500 to-pink-600 p-4 sm:p-6 lg:p-8 text-white overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/95 via-purple-500/95 to-pink-600/95"></div>
            <div class="absolute -top-12 sm:-top-24 -right-12 sm:-right-24 w-24 h-24 sm:w-48 sm:h-48 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-12 sm:-bottom-24 -left-12 sm:-left-24 w-24 h-24 sm:w-48 sm:h-48 bg-white/10 rounded-full blur-3xl animate-pulse delay-1000"></div>

            <!-- Floating Sparkles -->
            <div class="absolute top-3 sm:top-6 right-6 sm:right-12 w-1 h-1 sm:w-2 sm:h-2 bg-yellow-400 rounded-full animate-ping"></div>
            <div class="absolute bottom-3 sm:bottom-6 left-6 sm:left-12 w-1 h-1 sm:w-1 sm:h-1 bg-cyan-400 rounded-full animate-ping delay-300"></div>

            <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="p-2 sm:p-3 bg-white bg-opacity-20 rounded-lg sm:rounded-xl backdrop-blur-sm">
                        <span class="material-icons text-lg sm:text-2xl">edit</span>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold">Editar Curso</h3>
                        <p class="text-blue-100 text-xs sm:text-sm">Modifica la información de tu curso</p>
                    </div>
                </div>
                <button onclick="closeEditModal()" class="p-2 sm:p-3 text-white hover:bg-white hover:bg-opacity-20 rounded-lg sm:rounded-xl transition-all duration-200 hover:scale-110 backdrop-blur-sm">
                    <span class="material-icons text-lg sm:text-2xl">close</span>
                </button>
            </div>
        </div>

        <!-- Contenido del formulario -->
        <div class="p-4 sm:p-6 lg:p-8">
            <form id="editForm" method="POST" enctype="multipart/form-data" onsubmit="submitEditForm(event)">
                @csrf
                @method('PUT')

                <!-- Sección de Información Básica -->
                <div class="mb-6 sm:mb-8">
                    <div class="flex items-center mb-4 sm:mb-6">
                        <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg mr-3">
                            <span class="material-icons text-blue-600 dark:text-blue-400 text-sm sm:text-base">info</span>
                        </div>
                        <h4 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Información Básica</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <!-- Título -->
                        <div class="sm:col-span-2">
                            <label for="edit_titulo" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-blue-600 dark:text-blue-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">title</span>
                                <span class="flex-1">Título del Curso *</span>
                            </label>
                            <div class="relative">
                                <input type="text"
                                       id="edit_titulo"
                                       name="titulo"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 text-sm sm:text-base"
                                       placeholder="Escribe un título atractivo para tu curso"
                                       required>
                                <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">edit</span>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="sm:col-span-2">
                            <label for="edit_descripcion" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-blue-600 dark:text-blue-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">description</span>
                                <span class="flex-1">Descripción del Curso *</span>
                            </label>
                            <div class="relative">
                                <textarea id="edit_descripcion"
                                    name="descripcion"
                                    rows="3"
                                    class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 resize-none text-sm sm:text-base"
                                    placeholder="Describe qué aprenderán los estudiantes en este curso"
                                    required></textarea>
                                <span class="absolute left-3 sm:left-4 top-3 sm:top-4 material-icons text-gray-400 text-sm sm:text-base">description</span>
                            </div>
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="edit_precio" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-green-600 dark:text-green-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">attach_money</span>
                                <span class="flex-1">Precio *</span>
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="edit_precio"
                                       name="precio"
                                       step="0.01"
                                       min="0"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 text-sm sm:text-base"
                                       placeholder="0.00"
                                       required>
                                <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">attach_money</span>
                            </div>
                        </div>

                        <!-- Duración -->
                        <div>
                            <label for="edit_duracion_horas" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-orange-600 dark:text-orange-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">schedule</span>
                                <span class="flex-1">Duración (horas)</span>
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="edit_duracion_horas"
                                       name="duracion_horas"
                                       min="1"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 text-sm sm:text-base"
                                       placeholder="Ej: 40">
                                <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">schedule</span>
                            </div>
                        </div>

                        <!-- Nivel -->
                        <div>
                            <label for="edit_nivel" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-purple-600 dark:text-purple-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">trending_up</span>
                                <span class="flex-1">Nivel *</span>
                            </label>
                            <div class="relative">
                                <select id="edit_nivel"
                                        name="nivel"
                                        class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 appearance-none cursor-pointer text-sm sm:text-base"
                                        required>
                                    <option value="">Selecciona un nivel</option>
                                    <option value="principiante">📈 Principiante</option>
                                    <option value="intermedio">📊 Intermedio</option>
                                    <option value="avanzado">📉 Avanzado</option>
                                </select>
                                <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">trending_up</span>
                                <span class="absolute right-3 sm:right-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 pointer-events-none text-sm sm:text-base">keyboard_arrow_down</span>
                            </div>
                        </div>

                        <!-- Cupo Máximo -->
                        <div>
                            <label for="edit_cupo_maximo" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-indigo-600 dark:text-indigo-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">group</span>
                                <span class="flex-1">Cupo Máximo</span>
                            </label>
                            <div class="relative">
                                <input type="number"
                                       id="edit_cupo_maximo"
                                       name="cupo_maximo"
                                       min="1"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 text-sm sm:text-base"
                                       placeholder="Ej: 30">
                                <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">group</span>
                            </div>
                        </div>

                        <!-- Fecha de Inicio -->
                        <div>
                            <label for="edit_fecha_inicio" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-pink-600 dark:text-pink-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">event</span>
                                <span class="flex-1">Fecha de Inicio</span>
                            </label>
                            <div class="relative">
                                <input type="date"
                                       id="edit_fecha_inicio"
                                       name="fecha_inicio"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 text-sm sm:text-base">
                                <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">event</span>
                            </div>
                        </div>

                        <!-- Fecha de Fin -->
                        <div>
                            <label for="edit_fecha_fin" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-red-600 dark:text-red-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">event_available</span>
                                <span class="flex-1">Fecha de Fin</span>
                            </label>
                            <div class="relative">
                                <input type="date"
                                       id="edit_fecha_fin"
                                       name="fecha_fin"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 text-sm sm:text-base">
                                <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">event_available</span>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="sm:col-span-2">
                            <label for="edit_slug" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-gray-600 dark:text-gray-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">link</span>
                                <span class="flex-1">URL Personalizada (Slug)</span>
                            </label>
                            <div class="relative">
                                <input type="text"
                                       id="edit_slug"
                                       name="slug"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 text-sm sm:text-base"
                                       placeholder="mi-curso-personalizado">
                                <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">link</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 sm:mt-2">Opcional: URL personalizada para tu curso</p>
                        </div>

                        <!-- Requisitos -->
                        <div class="sm:col-span-2">
                            <label for="edit_requisitos" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                                <span class="material-icons text-sm sm:text-base mr-2 text-yellow-600 dark:text-yellow-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">checklist</span>
                                <span class="flex-1">Requisitos Previos</span>
                            </label>
                            <div class="relative">
                                <textarea id="edit_requisitos"
                                    name="requisitos"
                                    rows="2"
                                    class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 resize-none text-sm sm:text-base"
                                    placeholder="Lista los conocimientos o requisitos previos necesarios para tomar este curso"></textarea>
                                <span class="absolute left-3 sm:left-4 top-2 sm:top-3 sm:top-4 material-icons text-gray-400 text-sm sm:text-base">checklist</span>
                            </div>
                        </div>

                        <!-- Estado Activo -->
                        <div class="sm:col-span-2">
                            <label class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3">
                                <span class="material-icons text-sm sm:text-base mr-2 text-green-600 dark:text-green-400">visibility</span>
                                <span>Estado del Curso</span>
                            </label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center">
                                    <input type="checkbox"
                                           name="activo"
                                           value="1"
                                           id="edit_activo"
                                           class="mr-2 sm:mr-3 rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="text-xs sm:text-sm text-gray-700 dark:text-gray-300">Curso activo (visible para estudiantes)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Imagen -->
                <div class="mb-6 sm:mb-8">
                    <div class="flex items-center mb-4 sm:mb-6">
                        <div class="p-2 bg-pink-100 dark:bg-pink-900/30 rounded-lg mr-3">
                            <span class="material-icons text-pink-600 dark:text-pink-400 text-sm sm:text-base">image</span>
                        </div>
                        <h4 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Imagen del Curso</h4>
                    </div>

                    <div>
                        <label for="edit_url_imagen" class="flex items-center text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 sm:mb-3 h-5 sm:h-6">
                            <span class="material-icons text-sm sm:text-base mr-2 text-pink-600 dark:text-pink-400 w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center">cloud_upload</span>
                            <span class="flex-1">Subir Nueva Imagen</span>
                        </label>
                        <div class="relative">
                            <input type="file"
                                   id="edit_url_imagen"
                                   name="url_imagen"
                                   accept="image/*"
                                   onchange="previewImage(this, 'edit_image_preview')"
                                   class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-10 sm:pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 file:mr-2 sm:file:mr-4 file:py-1 sm:file:py-2 file:px-2 sm:file:px-4 file:rounded-md sm:file:rounded-lg file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 text-sm sm:text-base">
                            <span class="absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 text-sm sm:text-base">upload</span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 sm:mt-2">Recomendado: 800x600px o similar</p>
                        <div id="edit_image_preview" class="mt-2 sm:mt-3 hidden">
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-1 border border-gray-200 dark:border-gray-600 relative group inline-block">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 flex items-center justify-center bg-white dark:bg-gray-700 rounded overflow-hidden">
                                    <img class="max-w-full max-h-full object-contain" alt="Preview">
                                </div>
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded"></div>
                                <button type="button"
                                        onclick="removeImagePreview('edit_image_preview', 'edit_url_imagen')"
                                        class="absolute -top-1 -right-1 w-3 h-3 sm:w-4 sm:h-4 bg-red-500 text-white rounded-full flex items-center justify-center text-xs cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                                    ×
                                </button>
                            </div>
                        </div>
                        <!-- Checkbox para eliminar imagen existente -->
                        <div id="edit_remove_image_option" class="mt-2 hidden">
                            <label class="flex items-center text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                       name="eliminar_imagen"
                                       value="1"
                                       class="mr-2 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span class="material-icons text-xs sm:text-sm mr-1 text-red-500">delete</span>
                                Eliminar imagen actual
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Botones de Acción -->
                <div class="flex flex-col sm:flex-row items-center justify-between pt-6 sm:pt-10 border-t border-gradient-to-r from-gray-200/60 via-gray-300/80 to-gray-200/60 dark:from-slate-700/60 dark:via-slate-600/80 dark:to-slate-700/60 gap-4 sm:gap-0">
                    <div class="flex items-center px-3 sm:px-5 py-2 sm:py-3 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-xl sm:rounded-2xl border border-blue-200/50 dark:border-blue-700/50">
                        <span class="material-icons text-blue-600 dark:text-blue-400 text-sm sm:text-lg mr-2 sm:mr-3">info</span>
                        <span class="text-xs sm:text-sm font-semibold text-blue-700 dark:text-blue-300">Los campos marcados con * son obligatorios</span>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-5 w-full sm:w-auto">
                        <button type="button"
                                onclick="closeEditModal()"
                                class="group relative w-full sm:w-auto px-6 sm:px-9 py-3 sm:py-4 border-2 border-gray-300/60 dark:border-gray-600/60 text-gray-700 dark:text-gray-300 font-bold rounded-xl sm:rounded-2xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-slate-700 dark:hover:to-slate-600 backdrop-blur-xl transition-all duration-500 hover:scale-105 sm:hover:scale-110 hover:-translate-y-1 hover:border-gray-400 dark:hover:border-gray-500 hover:shadow-xl">
                            <span class="material-icons mr-2 sm:mr-3 text-base sm:text-lg group-hover:-rotate-12 transition-transform duration-300">close</span>
                            <span class="text-sm sm:text-base">Cancelar</span>
                        </button>
                        <button type="submit"
                                class="group relative w-full sm:w-auto px-8 sm:px-10 py-3 sm:py-4 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-600 text-white font-bold rounded-xl sm:rounded-2xl hover:from-blue-400 hover:via-purple-400 hover:to-pink-500 transition-all duration-500 hover:scale-105 sm:hover:scale-110 hover:shadow-2xl hover:shadow-blue-400/40 transform hover:-translate-y-1">
                            <!-- Animated Background -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-600 rounded-xl sm:rounded-2xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <!-- Sparkle Effects -->
                            <div class="absolute -top-1 -right-1 w-1 h-1 sm:w-2 sm:h-2 bg-yellow-400 rounded-full animate-ping"></div>
                            <div class="absolute -bottom-1 -left-1 w-1 h-1 sm:w-1 sm:h-1 bg-cyan-400 rounded-full animate-ping delay-300"></div>

                            <span class="material-icons mr-2 sm:mr-3 text-base sm:text-lg relative z-10 group-hover:rotate-12 transition-transform duration-300">save</span>
                            <span class="relative z-10 text-sm sm:text-base">Actualizar Curso</span>

                            <!-- Hover Arrow -->
                            <span class="material-icons ml-2 sm:ml-3 text-base sm:text-lg relative z-10 group-hover:translate-x-1 transition-transform duration-300">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Eliminar Curso -->
<div id="deleteModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-[999999] transition-all duration-500 ease-out">
    <div class="relative top-8 mx-auto p-0 border-0 w-11/12 max-w-md shadow-2xl rounded-3xl bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl transform transition-all duration-500 ease-out scale-90 opacity-0 overflow-hidden border border-white/20 dark:border-slate-700/50" id="deleteModalContent">
        <!-- Header con gradiente -->
        <div class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800 p-6 text-white overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-red-600/90 via-red-700/90 to-red-800/90"></div>
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 w-20 h-20 bg-white/10 rounded-full blur-2xl"></div>
            <div class="relative flex items-center justify-center">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-sm border border-white/30">
                        <span class="material-icons text-2xl">warning</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Confirmar Eliminación</h3>
                        <p class="text-red-100 text-sm">Esta acción no se puede deshacer</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="p-8 text-center">
            <!-- Enhanced Warning Icon -->
            <div class="relative mb-8">
                <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-gradient-to-r from-red-100 to-pink-100 dark:from-red-900/30 dark:to-pink-900/30 mb-6 shadow-xl border border-red-200/50 dark:border-red-700/50">
                    <span class="material-icons text-red-600 dark:text-red-400 text-4xl animate-bounce">warning</span>
            </div>
                <!-- Floating Elements -->
                <div class="absolute -top-2 -right-2 w-3 h-3 bg-red-400 rounded-full animate-ping"></div>
                <div class="absolute -bottom-2 -left-2 w-2 h-2 bg-pink-400 rounded-full animate-ping delay-300"></div>
            </div>

            <!-- Enhanced Title -->
            <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-4 bg-gradient-to-r from-gray-900 via-red-900 to-pink-900 dark:from-white dark:via-red-100 dark:to-pink-100 bg-clip-text text-transparent">
                Confirmar Eliminación
            </h3>

            <!-- Enhanced Content -->
            <div class="px-4 py-6 bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/10 dark:to-pink-900/10 rounded-2xl border border-red-200/50 dark:border-red-700/50 mb-8">
                <p class="text-base text-gray-700 dark:text-gray-300 mb-3 font-medium">
                    ¿Estás seguro de que quieres eliminar el curso
                </p>
                <p class="text-sm font-medium text-gray-900 dark:text-white mb-4">
                    "<span id="deleteCourseTitle" class="text-red-600 dark:text-red-400"></span>"
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Todos los datos asociados a este curso serán eliminados permanentemente.
                </p>
            </div>
            </div>

            <!-- Enhanced Buttons -->
            <div class="flex items-center justify-center space-x-4">
                <button onclick="closeDeleteModal()"
                        class="group relative px-8 py-4 border-2 border-gray-300/60 dark:border-gray-600/60 text-gray-700 dark:text-gray-300 font-bold rounded-2xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 dark:hover:from-slate-700 dark:hover:to-slate-600 backdrop-blur-xl transition-all duration-500 hover:scale-110 hover:-translate-y-1 hover:border-gray-400 dark:hover:border-gray-500 hover:shadow-xl">
                    <span class="material-icons mr-2 text-lg group-hover:-rotate-12 transition-transform duration-300">close</span>
                    <span>Cancelar</span>
                </button>

                <form id="deleteForm" method="POST" class="inline" onsubmit="submitDeleteForm(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="group relative px-8 py-4 bg-gradient-to-r from-red-600 to-pink-600 text-white font-bold rounded-2xl hover:from-red-500 hover:to-pink-500 transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-red-500/40 transform hover:-translate-y-1">
                        <!-- Animated Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-pink-600 rounded-2xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <!-- Sparkle Effects -->
                        <div class="absolute -top-1 -right-1 w-2 h-2 bg-yellow-400 rounded-full animate-ping"></div>
                        <div class="absolute -bottom-1 -left-1 w-1 h-1 bg-orange-400 rounded-full animate-ping delay-300"></div>

                        <span class="material-icons mr-2 text-lg relative z-10 group-hover:rotate-12 transition-transform duration-300">delete</span>
                        <span class="relative z-10">Eliminar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection

@push('scripts')
<script src="{{ asset('js/cursos/admin.js') }}"></script>
<script src="{{ asset('js/cursos/admin-curso-create.js') }}"></script>
<script>
let nivelCounter = 0;

function addNivel() {
    nivelCounter++;
    const container = document.getElementById('niveles-container');

    const nivelHtml = `
        <div class="nivel-item bg-white dark:bg-slate-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 shadow-lg" data-nivel-index="${nivelCounter}">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">
                        ${nivelCounter}
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 dark:text-white">Nivel ${nivelCounter}</h5>
                </div>
                <button type="button" onclick="removeNivel(${nivelCounter})" class="text-red-500 hover:text-red-700 transition-colors">
                    <span class="material-icons">delete</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <!-- Título del Nivel -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <span class="material-icons text-sm mr-1">title</span>
                        Título del Nivel *
                    </label>
                    <input type="text" name="niveles[${nivelCounter}][titulo]"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white"
                           placeholder="Ej: Fundamentos de Programación" required>
                </div>

                <!-- Descripción del Nivel -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <span class="material-icons text-sm mr-1">description</span>
                        Descripción del Nivel
                    </label>
                    <textarea name="niveles[${nivelCounter}][descripcion]" rows="2"
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white"
                              placeholder="Describe qué aprenderán en este nivel"></textarea>
                </div>

                <!-- Campo oculto para el número del nivel -->
                <input type="hidden" name="niveles[${nivelCounter}][numero]" value="${nivelCounter}">
                </div>

                <!-- Subniveles -->
            <div class="mt-4">
                <div class="flex items-center justify-between mb-3">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                        <span class="material-icons text-sm mr-1">layers</span>
                        Subniveles (máximo 10)
                    </label>
                    <button type="button" onclick="addSubnivel(${nivelCounter})"
                            class="inline-flex items-center px-3 py-1 text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30">
                        <span class="material-icons text-sm mr-1">add_circle</span>
                        Agregar Subnivel
                    </button>
                </div>
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                    <div class="space-y-4" id="subniveles_${nivelCounter}">
                            <div class="subnivel-item bg-white dark:bg-slate-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600" data-subnivel-index="1">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-6 h-6 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Subnivel 1</span>
                                    </div>
                                <button type="button" onclick="removeSubnivel(${nivelCounter}, this)"
                                            class="text-red-500 hover:text-red-700 transition-colors opacity-0 group-hover:opacity-100">
                                        <span class="material-icons text-sm">remove_circle</span>
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <!-- Título del Subnivel -->
                                    <div class="md:col-span-2">
                                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                            <span class="material-icons text-xs mr-1">title</span>
                                            Título del Subnivel
                                        </label>
                                    <input type="text" name="niveles[${nivelCounter}][subniveles][1][titulo]"
                                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                                               placeholder="Ej: Variables básicas">
                                    </div>

                                    <!-- Descripción del Subnivel -->
                                    <div class="md:col-span-2">
                                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                            <span class="material-icons text-xs mr-1">description</span>
                                            Descripción
                                        </label>
                                    <textarea name="niveles[${nivelCounter}][subniveles][1][descripcion]" rows="2"
                                                  class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                                                  placeholder="Describe qué aprenderán en este subnivel"></textarea>
                                    </div>

                                <!-- Tipo de Contenido Multimedia -->
                                    <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">
                                        <span class="material-icons text-xs mr-1">video_library</span>
                                        Tipo de Contenido Multimedia
                                    </label>
                                    <div class="space-y-2">
                                        <!-- Checkbox para usar iframe -->
                                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                            <input type="checkbox"
                                                   name="niveles[${nivelCounter}][subniveles][1][usar_iframe]"
                                                   value="1"
                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                   onchange="toggleIframeField(${nivelCounter}, 1, this)">
                                            <span class="material-icons text-xs mr-1">code</span>
                                            Usar Iframe (HTML embebido)
                                        </label>

                                        <!-- Checkbox para usar URL de video -->
                                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                            <input type="checkbox"
                                                   name="niveles[${nivelCounter}][subniveles][1][usar_url_video]"
                                                   value="1"
                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                   onchange="toggleUrlVideoField(${nivelCounter}, 1, this)">
                                            <span class="material-icons text-xs mr-1">link</span>
                                            Usar URL de Video (YouTube, Vimeo, Odysee, etc.)
                                        </label>

                                        <!-- Checkbox para subir archivo de video -->
                                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                            <input type="checkbox"
                                                   name="niveles[${nivelCounter}][subniveles][1][usar_video_archivo]"
                                                   value="1"
                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                   onchange="toggleVideoFileField(${nivelCounter}, 1, this)">
                                            <span class="material-icons text-xs mr-1">video_file</span>
                                            Subir Archivo de Video
                    </label>
                </div>
                </div>

                                <!-- Campo Iframe (oculto por defecto) -->
                                <div class="md:col-span-2 iframe-field" style="display: none;">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">code</span>
                                        Código Iframe HTML
                    </label>
                                    <textarea name="niveles[${nivelCounter}][subniveles][1][url_iframe]" rows="3"
                                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                                              placeholder="<iframe src='https://www.youtube.com/embed/VIDEO_ID' width='100%' height='300'></iframe>"></textarea>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pega aquí el código iframe completo</p>
                </div>

                                <!-- Campo URL de Video (oculto por defecto) -->
                                <div class="md:col-span-2 url-video-field" style="display: none;">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">link</span>
                                        URL del Video
                    </label>
                                    <input type="url" name="niveles[${nivelCounter}][subniveles][1][url_video]"
                                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                                           placeholder="https://www.youtube.com/watch?v=VIDEO_ID o https://vimeo.com/VIDEO_ID">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Soporta: YouTube, Vimeo, Odysee, Twitch, etc.</p>
                </div>

                                <!-- Campo Archivo de Video (oculto por defecto) -->
                                <div class="md:col-span-2 video-file-field" style="display: none;">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">video_file</span>
                                        Archivo de Video
                        </label>
                                    <input type="file" name="niveles[${nivelCounter}][subniveles][1][video_archivo]"
                                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                           accept="video/*">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Máximo 500MB - Formatos: MP4, AVI, MOV, WMV, WebM</p>
                </div>

                                <!-- Recurso del Subnivel -->
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">attach_file</span>
                                        Archivo Recurso (Opcional)
                    </label>
                                    <input type="file" name="niveles[${nivelCounter}][subniveles][1][recurso]"
                                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                           accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.rar">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Máximo 50MB - Formatos: PDF, DOC, PPT, XLS, ZIP, RAR</p>
                </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', nivelHtml);
}

function removeNivel(nivelIndex) {
    const nivelItem = document.querySelector(`[data-nivel-index="${nivelIndex}"]`);
    if (nivelItem) {
        nivelItem.remove();
    }
}

function addSubnivel(nivelIndex) {
    const container = document.getElementById(`subniveles_${nivelIndex}`);
    const existingSubniveles = container.querySelectorAll('.subnivel-item');

    // Verificar que no exceda el máximo de 10 subniveles
    if (existingSubniveles.length >= 10) {
        alert('Máximo 10 subniveles por nivel');
        return;
    }

    const nextIndex = existingSubniveles.length + 1;

    const subnivelHtml = `
        <div class="subnivel-item bg-white dark:bg-slate-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600 group" data-subnivel-index="${nextIndex}">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-2">
                    <span class="w-6 h-6 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-xs font-bold">${nextIndex}</span>
                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Subnivel ${nextIndex}</span>
                </div>
                <button type="button" onclick="removeSubnivel(${nivelIndex}, this)"
                        class="text-red-500 hover:text-red-700 transition-colors opacity-0 group-hover:opacity-100">
                    <span class="material-icons text-sm">remove_circle</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <!-- Título del Subnivel -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">title</span>
                        Título del Subnivel
                    </label>
                    <input type="text" name="niveles[${nivelIndex}][subniveles][${nextIndex}][titulo]"
                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                           placeholder="Ej: Variables básicas">
                </div>

                <!-- Descripción del Subnivel -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">description</span>
                        Descripción
                    </label>
                    <textarea name="niveles[${nivelIndex}][subniveles][${nextIndex}][descripcion]" rows="2"
                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                              placeholder="Describe qué aprenderán en este subnivel"></textarea>
                </div>

                <!-- Tipo de Contenido Multimedia -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">
                        <span class="material-icons text-xs mr-1">video_library</span>
                        Tipo de Contenido Multimedia
                    </label>
                    <div class="space-y-2">
                        <!-- Checkbox para usar iframe -->
                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                            <input type="checkbox"
                                   name="niveles[${nivelIndex}][subniveles][${nextIndex}][usar_iframe]"
                                   value="1"
                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                   onchange="toggleIframeField(${nivelIndex}, ${nextIndex}, this)">
                            <span class="material-icons text-xs mr-1">code</span>
                            Usar Iframe (HTML embebido)
                        </label>

                        <!-- Checkbox para usar URL de video -->
                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                            <input type="checkbox"
                                   name="niveles[${nivelIndex}][subniveles][${nextIndex}][usar_url_video]"
                                   value="1"
                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                   onchange="toggleUrlVideoField(${nivelIndex}, ${nextIndex}, this)">
                            <span class="material-icons text-xs mr-1">link</span>
                            Usar URL de Video (YouTube, Vimeo, Odysee, etc.)
                        </label>

                        <!-- Checkbox para subir archivo de video -->
                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                            <input type="checkbox"
                                   name="niveles[${nivelIndex}][subniveles][${nextIndex}][usar_video_archivo]"
                                   value="1"
                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                   onchange="toggleVideoFileField(${nivelIndex}, ${nextIndex}, this)">
                            <span class="material-icons text-xs mr-1">video_file</span>
                            Subir Archivo de Video
                        </label>
                    </div>
                </div>

                <!-- Campo Iframe (oculto por defecto) -->
                <div class="md:col-span-2 iframe-field" style="display: none;">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">code</span>
                        Código Iframe HTML
                    </label>
                    <textarea name="niveles[${nivelIndex}][subniveles][${nextIndex}][url_iframe]" rows="3"
                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                              placeholder="<iframe src='https://www.youtube.com/embed/VIDEO_ID' width='100%' height='300'></iframe>"></textarea>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pega aquí el código iframe completo</p>
                </div>

                <!-- Campo URL de Video (oculto por defecto) -->
                <div class="md:col-span-2 url-video-field" style="display: none;">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">link</span>
                        URL del Video
                    </label>
                    <input type="url" name="niveles[${nivelIndex}][subniveles][${nextIndex}][url_video]"
                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                           placeholder="https://www.youtube.com/watch?v=VIDEO_ID o https://vimeo.com/VIDEO_ID">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Soporta: YouTube, Vimeo, Odysee, Twitch, etc.</p>
                </div>

                <!-- Campo Archivo de Video (oculto por defecto) -->
                <div class="md:col-span-2 video-file-field" style="display: none;">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">video_file</span>
                        Archivo de Video
                    </label>
                    <input type="file" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo]"
                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                           accept="video/*">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Máximo 500MB - Formatos: MP4, AVI, MOV, WMV, WebM</p>
                </div>

                <!-- Recurso del Subnivel -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">attach_file</span>
                        Archivo Recurso (Opcional)
                    </label>
                    <input type="file" name="niveles[${nivelIndex}][subniveles][${nextIndex}][recurso]"
                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                           accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.rar">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Máximo 50MB - Formatos: PDF, DOC, PPT, XLS, ZIP, RAR</p>
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', subnivelHtml);
}

function removeSubnivel(nivelIndex, button) {
    const container = document.getElementById(`subniveles_${nivelIndex}`);
    const existingSubniveles = container.querySelectorAll('.subnivel-item');

    // No permitir eliminar si solo queda uno
    if (existingSubniveles.length <= 1) {
        alert('Debe haber al menos un subnivel por nivel');
        return;
    }

    // Eliminar el contenedor del subnivel
    button.closest('.subnivel-item').remove();

    // Renumerar los subniveles restantes
    renumberSubniveles(nivelIndex);
}

function renumberSubniveles(nivelIndex) {
    const container = document.getElementById(`subniveles_${nivelIndex}`);
    const subniveles = container.querySelectorAll('.subnivel-item');

    subniveles.forEach((subnivel, index) => {
        const newIndex = index + 1;

        // Actualizar el número visual
        const numberSpan = subnivel.querySelector('.w-6.h-6');
        numberSpan.textContent = newIndex;

        // Actualizar el texto del título
        const titleSpan = subnivel.querySelector('.text-sm.font-semibold');
        titleSpan.textContent = `Subnivel ${newIndex}`;

        // Actualizar los nombres de los campos
        const inputs = subnivel.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                const newName = name.replace(/\[subniveles\]\[\d+\]/, `[subniveles][${newIndex}]`);
                input.setAttribute('name', newName);
            }
        });

        // Actualizar el data attribute
        subnivel.setAttribute('data-subnivel-index', newIndex);
    });
}

// Función para manejar los campos de redes sociales
function toggleRedSocialField(redSocial, checkbox) {
    const redSocialItem = checkbox.closest('.red-social-item');
    const inputField = redSocialItem.querySelector(`input[name="${redSocial}_usuario"]`);

    if (checkbox.checked) {
        inputField.style.display = 'block';
        inputField.focus();
    } else {
        inputField.style.display = 'none';
        inputField.value = ''; // Limpiar el campo cuando se desmarca
    }
}

// Funciones para manejar los campos de multimedia
function toggleIframeField(nivelIndex, subnivelIndex, checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const iframeField = subnivelContainer.querySelector('.iframe-field');
    const urlVideoField = subnivelContainer.querySelector('.url-video-field');
    const videoFileField = subnivelContainer.querySelector('.video-file-field');

    if (checkbox.checked) {
        // Ocultar otros campos
        urlVideoField.style.display = 'none';
        videoFileField.style.display = 'none';
        // Desmarcar otros checkboxes
        subnivelContainer.querySelector('input[name*="[usar_url_video]"]').checked = false;
        subnivelContainer.querySelector('input[name*="[usar_video_archivo]"]').checked = false;
        // Mostrar campo iframe
        iframeField.style.display = 'block';
    } else {
        iframeField.style.display = 'none';
    }
}

function toggleUrlVideoField(nivelIndex, subnivelIndex, checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const iframeField = subnivelContainer.querySelector('.iframe-field');
    const urlVideoField = subnivelContainer.querySelector('.url-video-field');
    const videoFileField = subnivelContainer.querySelector('.video-file-field');

    if (checkbox.checked) {
        // Ocultar otros campos
        iframeField.style.display = 'none';
        videoFileField.style.display = 'none';
        // Desmarcar otros checkboxes
        subnivelContainer.querySelector('input[name*="[usar_iframe]"]').checked = false;
        subnivelContainer.querySelector('input[name*="[usar_video_archivo]"]').checked = false;
        // Mostrar campo URL video
        urlVideoField.style.display = 'block';
    } else {
        urlVideoField.style.display = 'none';
    }
}

function toggleVideoFileField(nivelIndex, subnivelIndex, checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const iframeField = subnivelContainer.querySelector('.iframe-field');
    const urlVideoField = subnivelContainer.querySelector('.url-video-field');
    const videoFileField = subnivelContainer.querySelector('.video-file-field');

    if (checkbox.checked) {
        // Ocultar otros campos
        iframeField.style.display = 'none';
        urlVideoField.style.display = 'none';
        // Desmarcar otros checkboxes
        subnivelContainer.querySelector('input[name*="[usar_iframe]"]').checked = false;
        subnivelContainer.querySelector('input[name*="[usar_url_video]"]').checked = false;
        // Mostrar campo archivo video
        videoFileField.style.display = 'block';
    } else {
        videoFileField.style.display = 'none';
    }
}

// Auto-generar slug basado en el título (solo si el campo slug está vacío)
document.addEventListener('DOMContentLoaded', function() {
    const tituloField = document.getElementById('create_titulo');
    const slugField = document.getElementById('create_slug');

    if (tituloField && slugField) {
        tituloField.addEventListener('input', function() {
            const titulo = this.value;

            // Solo generar slug si el campo está vacío
            if (!slugField.value.trim()) {
                const slug = titulo.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');

                slugField.value = slug;
            }
        });
    }
});
</script>
@endpush



