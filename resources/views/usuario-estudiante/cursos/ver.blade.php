@extends('layouts.app')

@section('title', $curso->titulo . ' - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-purple-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute top-40 left-40 w-80 h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Main Content -->
    <main class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-300 flex items-center">
                    <span class="material-icons text-sm mr-1">home</span>
                    Inicio
                </a>
                <span class="material-icons text-gray-400 text-sm">chevron_right</span>
                <a href="{{ route('cursos.catalogo') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-300 flex items-center">
                    <span class="material-icons text-sm mr-1">school</span>
                    Cursos
                </a>
                <span class="material-icons text-gray-400 text-sm">chevron_right</span>
                <span class="text-gray-300">{{ $curso->titulo }}</span>
            </div>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Course Header -->
                <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm border border-gray-200/60 dark:border-slate-600/60 rounded-2xl p-8 mb-8 shadow-lg">
                    <!-- Course Image -->
                    <div class="relative h-64 bg-gradient-to-br from-purple-500 to-blue-500 rounded-xl overflow-hidden mb-6">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}"
                                 alt="{{ $curso->titulo }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-icons text-white text-8xl opacity-50">school</span>
                            </div>
                        @endif
                    </div>

                    <!-- Course Title and Info -->
                    <div class="mb-6">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $curso->titulo }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-4 mb-4">
                            <!-- Category -->
                            <span class="bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $curso->categoria->nombre }}
                            </span>

                            <!-- Level -->
                            @if($curso->nivel_dificultad)
                                <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ ucfirst($curso->nivel_dificultad) }}
                                </span>
                            @endif

                            <!-- Duration -->
                            @if($curso->duracion_horas)
                                <span class="bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 px-3 py-1 rounded-full text-sm font-medium flex items-center">
                                    <span class="material-icons text-sm mr-1">schedule</span>
                                    {{ $curso->duracion_horas }} horas
                                </span>
                            @endif
                        </div>

                        <!-- Price -->
                        <div class="mb-6">
                            @if($curso->precio > 0)
                                <span class="text-3xl font-bold text-green-600 dark:text-green-400">
                                    ${{ number_format($curso->precio, 0) }}
                                </span>
                            @else
                                <span class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                                    Gratis
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Descripción del Curso</h2>
                        <div class="prose prose-gray dark:prose-invert max-w-none">
                            {!! nl2br(e($curso->descripcion)) !!}
                        </div>
                    </div>

                    <!-- Learning Objectives -->
                    @if($curso->objetivos_aprendizaje)
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Objetivos de Aprendizaje</h2>
                            <div class="prose prose-gray dark:prose-invert max-w-none">
                                {!! nl2br(e($curso->objetivos_aprendizaje)) !!}
                            </div>
                        </div>
                    @endif

                    <!-- Prerequisites -->
                    @if($curso->requisitos_previos)
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Requisitos Previos</h2>
                            <div class="prose prose-gray dark:prose-invert max-w-none">
                                {!! nl2br(e($curso->requisitos_previos)) !!}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Course Content -->
                @if($curso->niveles && $curso->niveles->count() > 0)
                    <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm border border-gray-200/60 dark:border-slate-600/60 rounded-2xl p-8 shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Contenido del Curso</h2>

                        <div class="space-y-6">
                            @foreach($curso->niveles as $nivel)
                                <div class="border border-gray-200 dark:border-slate-600 rounded-xl overflow-hidden">
                                    <!-- Level Header -->
                                    <div class="bg-gray-50 dark:bg-slate-700 p-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                            <span class="material-icons text-purple-500 mr-2">play_circle</span>
                                            Nivel {{ $nivel->numero }}: {{ $nivel->titulo }}
                                        </h3>
                                        @if($nivel->descripcion)
                                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $nivel->descripcion }}</p>
                                        @endif
                                    </div>

                                    <!-- Sublevels -->
                                    @if($nivel->subniveles && $nivel->subniveles->count() > 0)
                                        <div class="p-4 space-y-3">
                                            @foreach($nivel->subniveles as $subnivel)
                                                <div class="flex items-center justify-between p-3 bg-white dark:bg-slate-800 rounded-lg border border-gray-200 dark:border-slate-600">
                                                    <div class="flex items-center">
                                                        <span class="material-icons text-gray-400 mr-3">video_library</span>
                                                        <span class="text-gray-900 dark:text-white font-medium">
                                                            {{ $subnivel->titulo ?: 'Subnivel ' . $subnivel->numero }}
                                                        </span>
                                                    </div>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                                        {{ $subnivel->duracion_minutos ?? '5' }} min
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Enrollment Card -->
                <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm border border-gray-200/60 dark:border-slate-600/60 rounded-2xl p-6 shadow-lg mb-6">
                    @if($inscripcion)
                        <!-- Already Enrolled -->
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="material-icons text-green-600 dark:text-green-400 text-2xl">check_circle</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">¡Ya estás inscrito!</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Progreso: {{ $inscripcion->progreso }}%</p>
                            <a href="{{ route('cursos.ver', $curso->slug ?? $curso->id) }}"
                               class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-500 hover:to-emerald-500 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-green-400/30 flex items-center justify-center">
                                <span class="material-icons text-sm mr-2">play_arrow</span>
                                Continuar Curso
                            </a>
                        </div>
                    @else
                        <!-- Not Enrolled -->
                        <div class="text-center">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">¿Listo para aprender?</h3>
                            @if($curso->precio > 0)
                                <div class="mb-4">
                                    <span class="text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($curso->precio, 0) }}</span>
                                </div>
                            @else
                                <div class="mb-4">
                                    <span class="text-2xl font-bold text-green-600 dark:text-green-400">Gratis</span>
                                </div>
                            @endif

                            @auth
                                <form action="{{ route('cursos.inscribir', $curso->id) }}" method="POST" class="mb-4">
                                    @csrf
                                    <button type="submit"
                                            class="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-500 hover:to-blue-500 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-purple-400/30 flex items-center justify-center">
                                        <span class="material-icons text-sm mr-2">add_circle</span>
                                        Inscribirse al Curso
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                   class="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-500 hover:to-blue-500 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-purple-400/30 flex items-center justify-center">
                                    <span class="material-icons text-sm mr-2">login</span>
                                    Iniciar Sesión para Inscribirse
                                </a>
                            @endauth
                        </div>
                    @endif
                </div>

                <!-- Course Info -->
                <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm border border-gray-200/60 dark:border-slate-600/60 rounded-2xl p-6 shadow-lg mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información del Curso</h3>

                    <div class="space-y-4">
                        @if($curso->duracion_horas)
                            <div class="flex items-center">
                                <span class="material-icons text-gray-400 mr-3">schedule</span>
                                <span class="text-gray-600 dark:text-gray-400">{{ $curso->duracion_horas }} horas</span>
                            </div>
                        @endif

                        @if($curso->nivel_dificultad)
                            <div class="flex items-center">
                                <span class="material-icons text-gray-400 mr-3">trending_up</span>
                                <span class="text-gray-600 dark:text-gray-400">{{ ucfirst($curso->nivel_dificultad) }}</span>
                            </div>
                        @endif

                        @if($curso->cupo_maximo)
                            <div class="flex items-center">
                                <span class="material-icons text-gray-400 mr-3">group</span>
                                <span class="text-gray-600 dark:text-gray-400">Máximo {{ $curso->cupo_maximo }} estudiantes</span>
                            </div>
                        @endif

                        @if($curso->niveles)
                            <div class="flex items-center">
                                <span class="material-icons text-gray-400 mr-3">video_library</span>
                                <span class="text-gray-600 dark:text-gray-400">{{ $curso->niveles->count() }} niveles</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Creator Info -->
                @if($curso->creador)
                    <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm border border-gray-200/60 dark:border-slate-600/60 rounded-2xl p-6 shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Creador del Curso</h3>

                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold">
                                    {{ strtoupper(substr($curso->creador->name, 0, 1)) }}
                                </span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">
                                    {{ $curso->creador->name }} {{ $curso->creador->apellido_paterno }}
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Creador de Contenido</p>
                            </div>
                        </div>

                        @if($curso->creador_descripcion)
                            <p class="text-gray-600 dark:text-gray-400 text-sm">
                                {{ $curso->creador_descripcion }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </main>
</div>

@push('styles')
<style>
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }
        33% {
            transform: translate(30px, -50px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }
</style>
@endpush
@endsection
