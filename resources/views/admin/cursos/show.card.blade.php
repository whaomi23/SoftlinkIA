@extends('layouts.app')

@section('title', 'Catálogo de Cursos - SoftLinkIA')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 overflow-x-hidden">
    <!-- Hero Section -->
    <div class="relative overflow-hidden min-h-[70vh]">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1920&h=1080&fit=crop&crop=center" 
                 alt="Catálogo de Cursos" 
                 class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-900/50 via-blue-900/40 to-cyan-900/50"></div>
                <div class="absolute inset-0 bg-gradient-to-tr from-purple-900/20 via-transparent to-cyan-500/15"></div>
                <div class="absolute inset-0 bg-black/5"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white mb-6 sm:mb-8 drop-shadow-2xl">
                    Catálogo de Cursos
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl lg:text-3xl text-white/90 max-w-5xl mx-auto leading-relaxed px-4 drop-shadow-lg">
                    Descubre nuestros programas de formación especializada y comienza tu camino hacia el éxito profesional.
                    <span class="font-semibold text-white">Aprende las habilidades que te destacarán en el mercado laboral.</span>
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8 pb-16">
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-400/30 rounded-2xl p-6 mb-8">
                <div class="flex items-center">
                    <span class="material-icons text-green-400 mr-3">check_circle</span>
                    <span class="text-green-300">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Enhanced Filter Chips -->
        @php
            $selectedNivel = request('nivel');
            $selectedOrden = request('orden');
        @endphp

        <div class="mb-12">
            <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Filtrar por Nivel</h3>
                <p class="text-gray-600 dark:text-gray-400">Selecciona el nivel de dificultad que te interesa</p>
            </div>

        <div class="flex flex-wrap items-center justify-center gap-1 sm:gap-2 md:gap-3 mb-8 sm:mb-12 px-2">
            <a href="{{ route('cursos.catalogo') }}"
               class="group relative inline-flex items-center px-2 sm:px-4 md:px-6 py-1.5 sm:py-2 md:py-3 rounded-lg sm:rounded-xl md:rounded-2xl font-medium text-xs sm:text-sm transition-all duration-300 {{ !$selectedNivel && !$selectedOrden ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'bg-white/80 dark:bg-slate-800/80 text-gray-700 dark:text-gray-300 border border-gray-200/50 dark:border-slate-700/50 hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 hover:text-white hover:shadow-lg hover:shadow-blue-500/25' }}">
                <span class="material-icons text-sm mr-2">apps</span>
                Todos los cursos
            </a>

            <a href="{{ route('cursos.catalogo', ['nivel' => 'principiante']) }}"
               class="group relative inline-flex items-center px-2 sm:px-4 md:px-6 py-1.5 sm:py-2 md:py-3 rounded-lg sm:rounded-xl md:rounded-2xl font-medium text-xs sm:text-sm transition-all duration-300 {{ $selectedNivel === 'principiante' ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'bg-white/80 dark:bg-slate-800/80 text-gray-700 dark:text-gray-300 border border-gray-200/50 dark:border-slate-700/50 hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 hover:text-white hover:shadow-lg hover:shadow-blue-500/25' }}">
                <span class="material-icons text-sm mr-2">trending_up</span>
                Principiante
            </a>

            <a href="{{ route('cursos.catalogo', ['nivel' => 'intermedio']) }}"
               class="group relative inline-flex items-center px-2 sm:px-4 md:px-6 py-1.5 sm:py-2 md:py-3 rounded-lg sm:rounded-xl md:rounded-2xl font-medium text-xs sm:text-sm transition-all duration-300 {{ $selectedNivel === 'intermedio' ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'bg-white/80 dark:bg-slate-800/80 text-gray-700 dark:text-gray-300 border border-gray-200/50 dark:border-slate-700/50 hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 hover:text-white hover:shadow-lg hover:shadow-blue-500/25' }}">
                <span class="material-icons text-sm mr-2">trending_flat</span>
                Intermedio
            </a>

            <a href="{{ route('cursos.catalogo', ['nivel' => 'avanzado']) }}"
               class="group relative inline-flex items-center px-2 sm:px-4 md:px-6 py-1.5 sm:py-2 md:py-3 rounded-lg sm:rounded-xl md:rounded-2xl font-medium text-xs sm:text-sm transition-all duration-300 {{ $selectedNivel === 'avanzado' ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'bg-white/80 dark:bg-slate-800/80 text-gray-700 dark:text-gray-300 border border-gray-200/50 dark:border-slate-700/50 hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 hover:text-white hover:shadow-lg hover:shadow-blue-500/25' }}">
                <span class="material-icons text-sm mr-2">trending_down</span>
                Avanzado
            </a>
        </div>

        <!-- Search and Sort Bar -->
        <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-2xl p-3 sm:p-4 md:p-6 mb-6 sm:mb-8 shadow-lg border border-gray-200/50 dark:border-slate-700/50">
            <form method="GET" action="{{ route('cursos.catalogo') }}" class="flex flex-col md:flex-row gap-3 sm:gap-4">
                <div class="flex-1">
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-blue-500 transition-colors">
                            <span class="material-icons text-lg">search</span>
                        </span>
                        <input type="text" name="q"

                               class="w-full pl-10 pr-4 py-2 sm:py-3 bg-white/50 dark:bg-slate-700/50 border border-gray-200/50 dark:border-slate-600/50 rounded-xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300 text-sm sm:text-base"
                               value="{{ request('q') }}"
                               placeholder="Buscar cursos por título, descripción o instructor...">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 md:gap-4">
                    <select name="precio_max" class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2 md:py-3 bg-white/50 dark:bg-slate-700/50 border border-gray-200/50 dark:border-slate-600/50 rounded-lg sm:rounded-xl text-gray-900 dark:text-white focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300 text-xs sm:text-sm">
                        <option value="">Precio máximo</option>
                        <option value="50" {{ request('precio_max') == '50' ? 'selected' : '' }}>Hasta $50</option>
                        <option value="100" {{ request('precio_max') == '100' ? 'selected' : '' }}>Hasta $100</option>
                        <option value="200" {{ request('precio_max') == '200' ? 'selected' : '' }}>Hasta $200</option>
                        <option value="500" {{ request('precio_max') == '500' ? 'selected' : '' }}>Hasta $500</option>
                    </select>
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <span class="material-icons">keyboard_arrow_down</span>
                        </span>
                    </div>


                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors">
                            <span class="material-icons text-lg">sort</span>
                        </span>

                    <select name="orden" class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2 md:py-3 bg-white/50 dark:bg-slate-700/50 border border-gray-200/50 dark:border-slate-600/50 rounded-lg sm:rounded-xl text-gray-900 dark:text-white focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300 text-xs sm:text-sm">

                        <option value="recientes" {{ request('orden') == 'recientes' ? 'selected' : '' }}>Más recientes</option>
                        <option value="antiguos" {{ request('orden') == 'antiguos' ? 'selected' : '' }}>Más antiguos</option>
                        <option value="precio_asc" {{ request('orden') == 'precio_asc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                        <option value="precio_desc" {{ request('orden') == 'precio_desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                        <option value="duracion_asc" {{ request('orden') == 'duracion_asc' ? 'selected' : '' }}>Duración: Menor a Mayor</option>
                        <option value="duracion_desc" {{ request('orden') == 'duracion_desc' ? 'selected' : '' }}>Duración: Mayor a Menor</option>
                    </select>
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <span class="material-icons">keyboard_arrow_down</span>
                        </span>
                    </div>
                </div>
            </form>
        </div>


        <!-- Courses Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
            @forelse($cursos as $curso)
                <article class="group relative bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-2xl sm:rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-200/50 dark:border-slate-700/50 hover:border-blue-300/50 dark:hover:border-blue-600/50 hover:-translate-y-1 sm:hover:-translate-y-2">

                    <!-- Course Image -->
                    <div class="relative h-48 sm:h-56 bg-gray-50 dark:bg-gray-800 flex items-center justify-center overflow-hidden">

                        @if($curso->url_imagen)
                            <img src="{{ asset('storage/' . $curso->url_imagen) }}" alt="{{ $curso->titulo }}" class="max-w-full max-h-full object-contain transition-all duration-700 group-hover:scale-110 group-hover:rotate-2">
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

                        <!-- Enhanced Level Badge -->
                        <div class="absolute top-4 right-4">
                            @php
                                $nivelGradients = [
                                    'principiante' => 'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-green-500/30',
                                    'intermedio' => 'bg-gradient-to-r from-yellow-500 to-orange-600 text-white shadow-yellow-500/30',
                                    'avanzado' => 'bg-gradient-to-r from-purple-500 to-indigo-600 text-white shadow-purple-500/30'
                                ];
                                $nivelGradient = $nivelGradients[$curso->nivel] ?? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-blue-500/30';
                            @endphp
                            <span class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-2xl backdrop-blur-xl shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:rotate-3 {{ $nivelGradient }}">
                                <span class="material-icons text-sm mr-2">
                                    @if($curso->nivel === 'principiante') trending_up
                                    @elseif($curso->nivel === 'intermedio') trending_flat
                                    @else trending_down
                                    @endif
                                </span>
                                {{ ucfirst($curso->nivel) }}
                            </span>
                        </div>
                    </div>


                    <!-- Course Content -->
                    <div class="p-4 sm:p-6">
                        <!-- Level and Date -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 text-blue-700 dark:text-blue-300">
                                <span class="material-icons text-xs mr-1">school</span>
                                Curso
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                <span class="material-icons text-sm mr-1">schedule</span>
                                {{ $curso->created_at->format('d/m/Y') }}
                            </span>
                        </div>

                        <!-- Title and Description -->
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            {{ $curso->titulo }}
                        </h3>

                        <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mb-4 line-clamp-2 leading-relaxed">
                            {{ Str::limit($curso->descripcion, 100) }}
                        </p>

                        <!-- Enhanced Course Details -->
                        <div class="flex items-center justify-between text-sm mb-6">
                            <div class="flex items-center px-3 py-2 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl border border-blue-200/50 dark:border-blue-700/50">
                                <span class="material-icons text-blue-600 dark:text-blue-400 text-sm mr-2">person</span>
                                <span class="font-semibold text-blue-700 dark:text-blue-300">{{ $curso->creador->name }}</span>
                            </div>
                            @if($curso->duracion_horas)
                                <div class="flex items-center px-3 py-2 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl border border-purple-200/50 dark:border-purple-700/50">
                                    <span class="material-icons text-purple-600 dark:text-purple-400 text-sm mr-2">access_time</span>
                                    <span class="font-semibold text-purple-700 dark:text-purple-300">{{ $curso->duracion_horas }}h</span>
                                </div>
                            @endif
                        </div>

                        <!-- Lecciones del Curso -->
                        @if($curso->lecciones && $curso->lecciones->count() > 0)
                            <div class="mb-6">
                                <div class="flex items-center mb-3">
                                    <span class="material-icons text-indigo-600 dark:text-indigo-400 text-sm mr-2">playlist_play</span>
                                    <span class="font-semibold text-indigo-700 dark:text-indigo-300 text-sm">Lecciones del Curso</span>
                                </div>

                                <div class="space-y-2 max-h-32 overflow-y-auto">
                                    @foreach($curso->lecciones->take(3) as $leccion)
                                        <div class="flex items-center justify-between p-2 bg-gradient-to-r from-gray-50 to-slate-50 dark:from-gray-800/50 dark:to-slate-800/50 rounded-lg border border-gray-200/50 dark:border-gray-700/50">
                                            <div class="flex items-center flex-1">
                                                <div class="flex flex-col items-center mr-3">
                                                    <div class="flex items-center justify-center w-6 h-6 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-bold rounded-full">
                                                        {{ $leccion->orden }}
                                                    </div>
                                                    @if($leccion->nivel)
                                                        <span class="text-xs text-gray-500 dark:text-gray-400 mt-1">N{{ $leccion->nivel }}</span>
                                                    @endif
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h4 class="text-xs font-semibold text-gray-900 dark:text-white truncate">
                                                        {{ $leccion->titulo }}
                                                    </h4>
                                                    @if($leccion->descripcion)
                                                        <p class="text-xs text-gray-600 dark:text-gray-400 truncate">
                                                            {{ Str::limit($leccion->descripcion, 30) }}
                                                        </p>
                                                    @elseif($leccion->contenido)
                                                        <p class="text-xs text-gray-600 dark:text-gray-400 truncate">
                                                            {{ Str::limit($leccion->contenido, 30) }}
                                                        </p>
                                                    @endif
                                                    @if($leccion->duracion_minutos)
                                                        <span class="text-xs text-purple-600 dark:text-purple-400">
                                                            {{ $leccion->duracion_formateada }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex flex-col items-center space-y-1">
                                                @if($leccion->tipo === 'video')
                                                    <span class="material-icons text-red-500 text-sm">play_circle</span>
                                                @elseif($leccion->tipo === 'documento')
                                                    <span class="material-icons text-blue-500 text-sm">description</span>
                                                @elseif($leccion->tipo === 'quiz')
                                                    <span class="material-icons text-green-500 text-sm">quiz</span>
                                                @else
                                                    <span class="material-icons text-gray-500 text-sm">article</span>
                                                @endif

                                                @if($leccion->url_recurso)
                                                    <span class="material-icons text-orange-500 text-xs">{{ $leccion->icono_tipo_recurso }}</span>
                                                @endif

                                                @if($leccion->es_gratuita)
                                                    <span class="text-xs text-green-600 dark:text-green-400 font-bold">GRATIS</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                    @if($curso->lecciones->count() > 3)
                                        <div class="text-center">
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                +{{ $curso->lecciones->count() - 3 }} lecciones más
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Enhanced Price and Capacity -->
                        <div class="flex items-center justify-between mb-8">
                            @if($curso->cupo_maximo)
                                <div class="flex items-center px-3 py-2 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl border border-green-200/50 dark:border-green-700/50">
                                    <span class="material-icons text-green-600 dark:text-green-400 text-sm mr-2">group</span>
                                    <span class="font-semibold text-green-700 dark:text-green-300">{{ $curso->cupo_maximo }} cupos</span>
                                </div>
                            @endif
                            <div class="group/price relative">
                                <span class="inline-flex items-center px-4 py-2 text-lg font-bold rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-500/30 group-hover/price:scale-110 group-hover/price:rotate-3 transition-all duration-300">
                                    <span class="material-icons text-sm mr-2">attach_money</span>
                                    ${{ number_format($curso->precio, 2) }}
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl blur opacity-0 group-hover/price:opacity-50 transition-opacity duration-300"></div>
                            </div>
                        </div>

                        <!-- Enhanced Actions -->
                        <div class="flex items-center justify-center pt-8 border-t border-gradient-to-r from-gray-200/40 via-gray-300/60 to-gray-200/40 dark:from-slate-700/40 dark:via-slate-600/60 dark:to-slate-700/40">
                            <a href="{{ route('cursos.ver', $curso->slug ?? $curso->id) }}"

                               class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg sm:rounded-xl hover:from-blue-500 hover:to-purple-500 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/30 text-sm sm:text-base">
                                <span class="material-icons text-sm mr-2">play_arrow</span>
                                Ver Curso

                            </a>
                        </div>

                    </div>
                </article>
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
                            ¡No hay cursos disponibles!
                        </h3>
                        <p class="text-xl text-gray-600 dark:text-gray-400 mb-12 max-w-lg mx-auto leading-relaxed">
                            Pronto agregaremos nuevos cursos a nuestro catálogo.
                            <span class="font-semibold text-blue-600 dark:text-blue-400">¡Mantente atento!</span>
                        </p>

                        <div class="flex items-center justify-center space-x-4">
                            <a href="{{ route('cursos.catalogo') }}"
                               class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-bold rounded-3xl shadow-2xl shadow-blue-500/30 hover:shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 hover:scale-110 hover:-translate-y-2 transform">
                                <!-- Animated Background -->
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <!-- Sparkle Effects -->
                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                                <div class="absolute -bottom-1 -left-1 w-2 h-2 bg-cyan-400 rounded-full animate-ping delay-300"></div>

                                <span class="material-icons mr-3 relative z-10 text-lg group-hover:rotate-12 transition-transform duration-300">refresh</span>
                                <span class="relative z-10 text-lg">Recargar</span>
                            </a>
                        </div>
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
@endsection

@push('scripts')
<script src="{{ asset('js/cursos/catalogo.js') }}"></script>
@endpush
