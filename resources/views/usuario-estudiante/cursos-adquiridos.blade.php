@extends('layouts.app')

@section('title', 'Mis Cursos Adquiridos - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-pink-400/20 to-indigo-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-cyan-400/10 to-blue-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-600/10 via-purple-600/10 to-pink-600/10 dark:from-blue-400/5 dark:via-purple-400/5 dark:to-pink-400/5 border-b border-gray-200/50 dark:border-slate-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <div class="flex items-center space-x-2 text-sm">
                    <a href="{{ route('usuario-estudiante') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-300 flex items-center">
                        <span class="material-icons text-sm mr-1">home</span>
                        Inicio
                    </a>
                    <span class="material-icons text-gray-400 text-sm">chevron_right</span>
                    <span class="text-gray-300">Mis Cursos Adquiridos</span>
                </div>
            </nav>

            <div class="flex items-center space-x-4">
                <!-- Icon -->
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 via-purple-600 to-pink-600 rounded-xl shadow-lg">
                        <span class="material-icons text-white text-2xl">school</span>
                    </div>
                </div>

                <!-- Title and Description -->
                <div class="flex-1 min-w-0">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                        Mis Cursos Adquiridos
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mt-2">
                        Accede a todos los cursos que has comprado y continúa tu aprendizaje
                    </p>
                </div>

                <!-- Stats -->
                <div class="flex-shrink-0 flex items-center space-x-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $cursosAdquiridos->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Cursos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if($cursosAdquiridos->count() > 0)
            <!-- Courses Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($cursosAdquiridos as $inscripcion)
                    @php
                        $curso = $inscripcion->curso;
                    @endphp
                    <div class="group bg-white/90 dark:bg-slate-800/90 backdrop-blur-2xl rounded-2xl border border-gray-200/60 dark:border-slate-700/60 shadow-xl shadow-blue-500/10 hover:shadow-blue-500/20 transition-all duration-500 hover:scale-105 hover:-translate-y-2 overflow-hidden">
                        <!-- Course Image -->
                        <div class="relative aspect-video bg-gradient-to-br from-gray-200 to-gray-300 dark:from-slate-700 dark:to-slate-600 overflow-hidden">
                            @if($curso->url_imagen)
                                <img src="{{ Storage::url($curso->url_imagen) }}"
                                     alt="{{ $curso->titulo }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="material-icons text-gray-400 text-4xl">school</span>
                                </div>
                            @endif

                            <!-- Status Badge -->
                            <div class="absolute top-3 right-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    <span class="material-icons text-xs mr-1">check_circle</span>
                                    Adquirido
                                </span>
                            </div>

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center shadow-lg">
                                    <span class="material-icons text-blue-600 text-2xl">play_arrow</span>
                                </div>
                            </div>
                        </div>

                        <!-- Course Info -->
                        <div class="p-6">
                            <!-- Category -->
                            @if($curso->categoria)
                                <div class="mb-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ $curso->categoria->nombre }}
                                    </span>
                                </div>
                            @endif

                            <!-- Title -->
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
                                {{ $curso->titulo }}
                            </h3>

                            <!-- Description -->
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">
                                {{ $curso->descripcion }}
                            </p>

                            <!-- Course Details -->
                            <div class="space-y-2 mb-4">
                                @if($curso->nivel_dificultad)
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">Nivel:</span>
                                        <span class="font-semibold text-gray-900 dark:text-white">{{ ucfirst($curso->nivel_dificultad) }}</span>
                                    </div>
                                @endif

                                @if($curso->duracion_horas)
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">Duración:</span>
                                        <span class="font-semibold text-gray-900 dark:text-white">{{ $curso->duracion_horas }}h</span>
                                    </div>
                                @endif

                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600 dark:text-gray-400">Comprado:</span>
                                    <span class="font-semibold text-green-600 dark:text-green-400">{{ $inscripcion->fecha_inscripcion->format('d/m/Y') }}</span>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="pt-4 border-t border-gray-200/60 dark:border-slate-600/60">
                                <a href="{{ route('usuario.cursos.show', $curso) }}"
                                   class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-400/30 flex items-center justify-center">
                                    <span class="material-icons text-sm mr-2">play_circle</span>
                                    Acceder al Curso
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 rounded-3xl mb-6">
                    <span class="material-icons text-4xl text-gray-400">shopping_cart</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Aún no tienes cursos adquiridos</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
                    Explora nuestro catálogo de cursos y encuentra el contenido perfecto para tu aprendizaje.
                </p>
                <a href="{{ route('usuario.cursos.catalogo') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-semibold rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-400/30">
                    <span class="material-icons text-sm mr-2">explore</span>
                    Explorar Cursos
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
