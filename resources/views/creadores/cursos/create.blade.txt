@extends('layouts.app')

@section('title', 'Crear Curso - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 relative overflow-hidden">
    <!-- Animated Background Elements - Darker -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-500/10 to-indigo-600/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-pink-500/10 to-purple-600/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-cyan-500/5 to-indigo-600/5 rounded-full blur-3xl animate-pulse delay-500"></div>
        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 opacity-5" style="background-image: linear-gradient(rgba(147, 51, 234, 0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(147, 51, 234, 0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
    </div>

    <!-- Hero Section - Darker Enhanced -->
    <div class="relative overflow-hidden hero-section">
        <!-- Gradiente animado de fondo -->
        <div class="absolute inset-0 bg-gradient-to-r from-purple-600/5 via-indigo-600/5 to-pink-600/5 animate-gradient-shift"></div>

        <!-- Efectos de luz flotantes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="floating-light light-1"></div>
            <div class="floating-light light-2"></div>
            <div class="floating-light light-3"></div>
            <div class="floating-light light-4"></div>
        </div>

        <!-- Ondas decorativas -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-wave wave-1"></div>
            <div class="hero-wave wave-2"></div>
            <div class="hero-wave wave-3"></div>
        </div>

        <!-- Partículas decorativas -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-particle particle-1"></div>
            <div class="hero-particle particle-2"></div>
            <div class="hero-particle particle-3"></div>
            <div class="hero-particle particle-4"></div>
            <div class="hero-particle particle-5"></div>
            <div class="hero-particle particle-6"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12 z-10">
            <div class="text-center mb-12 hero-content">
                <!-- Animated Icon - Enhanced -->
                <div class="inline-flex items-center justify-center mb-6 relative hero-icon-container">
                    <!-- Círculos concéntricos animados -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="hero-ring ring-1"></div>
                        <div class="hero-ring ring-2"></div>
                        <div class="hero-ring ring-3"></div>
                    </div>

                    <!-- Icono principal con múltiples efectos -->
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 rounded-2xl shadow-2xl shadow-purple-500/40 hover:shadow-purple-500/60 transition-all duration-500 hover:scale-110 hover:rotate-3 relative z-10 hero-icon">
                        <!-- Efecto de brillo rotativo -->
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-transparent via-white/30 to-transparent animate-icon-shine"></div>
                        <!-- Glow al hover -->
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-purple-500 via-indigo-500 to-pink-500 opacity-0 hover:opacity-100 blur-xl transition-opacity duration-500"></div>
                        <!-- Partículas alrededor -->
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <div class="icon-particle ip-1"></div>
                            <div class="icon-particle ip-2"></div>
                            <div class="icon-particle ip-3"></div>
                            <div class="icon-particle ip-4"></div>
                        </div>
                        <span class="material-icons text-white text-3xl relative z-10 icon-add">add</span>
                    </div>
                </div>

                <!-- Enhanced Title - Con efectos mejorados -->
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-black text-white mb-3 sm:mb-4 leading-tight drop-shadow-2xl relative hero-title">
                    <span class="inline-block hover:scale-105 transition-transform duration-300 relative title-word-1" style="text-shadow: 0 0 20px rgba(147, 51, 234, 0.5), 0 0 40px rgba(99, 102, 241, 0.3), 0 0 60px rgba(168, 85, 247, 0.2);">
                        <span class="title-glow"></span>
                        Crear
                    </span>
                    <span class="inline-block mx-2 title-separator">✨</span>
                    <span class="inline-block hover:scale-105 transition-transform duration-300 delay-100 relative title-word-2" style="text-shadow: 0 0 20px rgba(147, 51, 234, 0.5), 0 0 40px rgba(99, 102, 241, 0.3), 0 0 60px rgba(168, 85, 247, 0.2);">
                        <span class="title-glow"></span>
                        Curso
                    </span>
                </h1>

                <!-- Línea decorativa animada -->
                <div class="flex items-center justify-center mb-4 hero-divider">
                    <div class="h-px w-20 bg-gradient-to-r from-transparent via-purple-500/50 to-transparent divider-line-1"></div>
                    <div class="w-2 h-2 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 mx-3 animate-pulse divider-dot"></div>
                    <div class="h-px w-20 bg-gradient-to-r from-transparent via-indigo-500/50 to-transparent divider-line-2"></div>
                </div>

                <!-- Enhanced Subtitle - Con animación -->
                <p class="text-sm sm:text-base md:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed font-medium drop-shadow-lg px-4 hero-subtitle">
                    <span class="inline-block hover:text-white transition-colors duration-300 subtitle-part-1">Crea contenido educativo</span>
                    <span class="inline-block mx-1 text-slate-400 subtitle-connector">y</span>
                    <span class="inline-block hover:text-white transition-colors duration-300 delay-100 subtitle-part-2">comparte tu conocimiento</span>
                </p>

                <!-- Elementos decorativos adicionales -->
                <div class="absolute top-1/2 left-1/4 w-2 h-2 bg-purple-500/30 rounded-full blur-sm animate-twinkle"></div>
                <div class="absolute top-1/3 right-1/4 w-1.5 h-1.5 bg-indigo-500/30 rounded-full blur-sm animate-twinkle delay-500"></div>
                <div class="absolute bottom-1/4 left-1/3 w-1 h-1 bg-pink-500/30 rounded-full blur-sm animate-twinkle delay-1000"></div>
            </div>
        </div>
    </div>

    <!-- Form Section - Darker -->
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="bg-slate-900/95 dark:bg-slate-900/95 backdrop-blur-xl rounded-3xl border border-slate-700/80 dark:border-slate-700/80 shadow-2xl overflow-hidden relative" style="box-shadow: 0 0 30px rgba(147, 51, 234, 0.1), 0 0 60px rgba(99, 102, 241, 0.05);">
            <!-- Glow effect on hover -->
            <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-purple-500/0 via-indigo-500/0 to-pink-500/0 opacity-0 hover:opacity-5 transition-opacity duration-500 pointer-events-none"></div>

            <form id="createForm" action="{{ route('creador.cursos.store') }}" method="POST" enctype="multipart/form-data" onsubmit="submitCreateForm(event)">
                @csrf

                <!-- Tabs Navigation - Darker -->
                <div class="bg-gradient-to-r from-slate-800/90 to-slate-800/90 dark:from-slate-800 dark:to-slate-800 border-b border-slate-700/80 dark:border-slate-700/80 relative">
                    <!-- Subtle glow line at bottom -->
                    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-purple-500/30 to-transparent"></div>
                    <div class="flex flex-wrap overflow-x-auto scrollbar-hide">
                        <button type="button"
                                onclick="switchTab(1)"
                                class="tab-button active flex items-center px-6 py-4 text-sm font-semibold text-slate-200 dark:text-slate-200 hover:text-white dark:hover:text-white transition-all duration-300 border-b-2 border-purple-500 dark:border-purple-400 bg-slate-800/50 dark:bg-slate-800/50 whitespace-nowrap relative group">
                            <span class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-indigo-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="material-icons text-lg mr-2 relative z-10">info</span>
                            <span class="relative z-10">Información Básica</span>
                        </button>
                        <button type="button"
                                onclick="switchTab(2)"
                                class="tab-button flex items-center px-6 py-4 text-sm font-semibold text-slate-400 dark:text-slate-400 hover:text-slate-200 dark:hover:text-slate-200 transition-all duration-300 border-b-2 border-transparent hover:border-cyan-400 whitespace-nowrap relative group">
                            <span class="absolute inset-0 bg-gradient-to-r from-cyan-500/5 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="material-icons text-lg mr-2 relative z-10">description</span>
                            <span class="relative z-10">Descripción</span>
                        </button>
                        <button type="button"
                                onclick="switchTab(3)"
                                class="tab-button flex items-center px-6 py-4 text-sm font-semibold text-slate-400 dark:text-slate-400 hover:text-slate-200 dark:hover:text-slate-200 transition-all duration-300 border-b-2 border-transparent hover:border-emerald-400 whitespace-nowrap relative group">
                            <span class="absolute inset-0 bg-gradient-to-r from-emerald-500/5 to-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="material-icons text-lg mr-2 relative z-10">image</span>
                            <span class="relative z-10">Multimedia</span>
                        </button>
                        <button type="button"
                                onclick="switchTab(4)"
                                class="tab-button flex items-center px-6 py-4 text-sm font-semibold text-slate-400 dark:text-slate-400 hover:text-slate-200 dark:hover:text-slate-200 transition-all duration-300 border-b-2 border-transparent hover:border-pink-400 whitespace-nowrap relative group">
                            <span class="absolute inset-0 bg-gradient-to-r from-pink-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="material-icons text-lg mr-2 relative z-10">person</span>
                            <span class="relative z-10">Creador</span>
                        </button>
                        <button type="button"
                                onclick="switchTab(5)"
                                class="tab-button flex items-center px-6 py-4 text-sm font-semibold text-slate-400 dark:text-slate-400 hover:text-slate-200 dark:hover:text-slate-200 transition-all duration-300 border-b-2 border-transparent hover:border-blue-400 whitespace-nowrap relative group">
                            <span class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="material-icons text-lg mr-2 relative z-10">share</span>
                            <span class="relative z-10">Redes Sociales</span>
                        </button>
                        <button type="button"
                                onclick="switchTab(6)"
                                class="tab-button flex items-center px-6 py-4 text-sm font-semibold text-slate-400 dark:text-slate-400 hover:text-slate-200 dark:hover:text-slate-200 transition-all duration-300 border-b-2 border-transparent hover:border-indigo-400 whitespace-nowrap relative group">
                            <span class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="material-icons text-lg mr-2 relative z-10">layers</span>
                            <span class="relative z-10">Niveles</span>
                        </button>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="p-6 sm:p-8 lg:p-12">
                    <!-- Tab 1: Información Básica -->
                    <div id="tab-1" class="tab-content">
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-gradient-to-r from-purple-100 to-indigo-100 dark:from-purple-900/30 dark:to-indigo-900/30 rounded-2xl mr-4">
                                    <span class="material-icons text-purple-600 dark:text-purple-400">info</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">Información Básica</h4>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Título -->
                        <div class="lg:col-span-2">
                            <label for="titulo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">title</span>
                                Título del Curso *
                            </label>
                            <input type="text"
                                   id="titulo"
                                   name="titulo"
                                   value="{{ old('titulo') }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Ej: Introducción a Laravel para Principiantes"
                                   required>
                            @error('titulo')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label for="categoria_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">category</span>
                                Categoría *
                            </label>
                            <select id="categoria_id"
                                    name="categoria_id"
                                    class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                    required>
                                <option value="">Selecciona una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Duración -->
                        <div>
                            <label for="duracion_horas" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">schedule</span>
                                Duración (horas)
                            </label>
                            <input type="number"
                                   id="duracion_horas"
                                   name="duracion_horas"
                                   value="{{ old('duracion_horas') }}"
                                   min="1"
                                   max="1000"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Ej: 20">
                            @error('duracion_horas')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">attach_money</span>
                                Precio (USD)
                            </label>
                            <input type="number"
                                   id="precio"
                                   name="precio"
                                   value="{{ old('precio') }}"
                                   min="0"
                                   step="0.01"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Ej: 99.99">
                            @error('precio')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nivel de Dificultad -->
                        <div>
                            <label for="nivel_dificultad" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">trending_up</span>
                                Nivel de Dificultad
                            </label>
                            <select id="nivel_dificultad"
                                    name="nivel_dificultad"
                                    class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300">
                                <option value="principiante" {{ old('nivel_dificultad') === 'principiante' ? 'selected' : '' }}>Principiante</option>
                                <option value="intermedio" {{ old('nivel_dificultad') === 'intermedio' ? 'selected' : '' }}>Intermedio</option>
                                <option value="avanzado" {{ old('nivel_dificultad') === 'avanzado' ? 'selected' : '' }}>Avanzado</option>
                            </select>
                            @error('nivel_dificultad')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cupo Máximo -->
                        <div>
                            <label for="cupo_maximo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">group</span>
                                Cupo Máximo
                            </label>
                            <input type="number"
                                   id="cupo_maximo"
                                   name="cupo_maximo"
                                   value="{{ old('cupo_maximo') }}"
                                   min="1"
                                   max="10000"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Ej: 50 (dejar vacío para sin límite)">
                            @error('cupo_maximo')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Inicio -->
                        <div>
                            <label for="fecha_inicio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">event</span>
                                Fecha de Inicio
                            </label>
                            <input type="date"
                                   id="fecha_inicio"
                                   name="fecha_inicio"
                                   value="{{ old('fecha_inicio') }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300">
                            @error('fecha_inicio')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Fin -->
                        <div>
                            <label for="fecha_fin" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">event_available</span>
                                Fecha de Fin
                            </label>
                            <input type="date"
                                   id="fecha_fin"
                                   name="fecha_fin"
                                   value="{{ old('fecha_fin') }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300">
                            @error('fecha_fin')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="lg:col-span-2">
                            <label for="slug" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">link</span>
                                Slug (URL amigable)
                            </label>
                            <input type="text"
                                   id="slug"
                                   name="slug"
                                   value="{{ old('slug') }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Se genera automáticamente basado en el título">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Se genera automáticamente basado en el título. Puedes editarlo si lo deseas.</p>
                            @error('slug')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                    </div>

                    <!-- Tab 2: Descripción y Contenido -->
                    <div id="tab-2" class="tab-content hidden">
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-gradient-to-r from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-2xl mr-4">
                                    <span class="material-icons text-blue-600 dark:text-blue-400">description</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">Descripción y Contenido</h4>
                            </div>

                    <div class="space-y-6">
                        <!-- Descripción -->
                        <div>
                            <label for="descripcion" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">description</span>
                                Descripción del Curso *
                            </label>
                            <textarea id="descripcion"
                                      name="descripcion"
                                      rows="6"
                                      class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 resize-none"
                                      placeholder="Describe detalladamente qué aprenderán los estudiantes en tu curso..."
                                      required>{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Objetivos de Aprendizaje -->
                        <div>
                            <label for="objetivos_aprendizaje" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">flag</span>
                                Objetivos de Aprendizaje
                            </label>
                            <textarea id="objetivos_aprendizaje"
                                      name="objetivos_aprendizaje"
                                      rows="4"
                                      class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 resize-none"
                                      placeholder="Lista los objetivos específicos que los estudiantes alcanzarán...">{{ old('objetivos_aprendizaje') }}</textarea>
                            @error('objetivos_aprendizaje')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Requisitos Previos -->
                        <div>
                            <label for="requisitos_previos" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">checklist</span>
                                Requisitos Previos
                            </label>
                            <textarea id="requisitos_previos"
                                      name="requisitos_previos"
                                      rows="3"
                                      class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 resize-none"
                                      placeholder="¿Qué conocimientos previos necesitan los estudiantes?">{{ old('requisitos_previos') }}</textarea>
                            @error('requisitos_previos')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                    </div>

                    <!-- Tab 3: Multimedia -->
                    <div id="tab-3" class="tab-content hidden">
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-gradient-to-r from-green-100 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/30 rounded-2xl mr-4">
                                    <span class="material-icons text-green-600 dark:text-green-400">image</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">Multimedia</h4>
                            </div>

                    <div class="space-y-6">
                        <!-- Imagen del Curso -->
                        <div>
                            <label for="url_imagen" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">image</span>
                                Imagen del Curso
                            </label>

                            <div class="relative">
                                <input type="file"
                                       id="url_imagen"
                                       name="url_imagen"
                                       accept="image/*"
                                       class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                       onchange="previewImage(this)">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="material-icons text-gray-400">cloud_upload</span>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Formatos recomendados: JPG, PNG. Tamaño máximo: 5MB</p>
                            @error('url_imagen')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror

                            <!-- Preview de imagen -->
                            <div id="imagePreview" class="mt-4 hidden">
                                <img id="previewImg" src="" alt="Preview" class="w-full h-48 object-cover rounded-2xl border border-gray-200/60 dark:border-slate-600/60">
                            </div>
                        </div>

                        <!-- Video de Presentación -->
                        <div>
                            <label for="url_video" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">video_library</span>
                                Video de Presentación (URL)
                            </label>
                            <input type="url"
                                   id="url_video"
                                   name="url_video"
                                   value="{{ old('url_video') }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="https://www.youtube.com/watch?v=...">
                            @error('url_video')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                    </div>

                    <!-- Tab 4: Información del Creador -->
                    <div id="tab-4" class="tab-content hidden">
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-gradient-to-r from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-2xl mr-4">
                                    <span class="material-icons text-purple-600 dark:text-purple-400">person</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">Información del Creador</h4>
                            </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Nombre del Creador -->
                        <div>
                            <label for="creador_nombre" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">person</span>
                                Nombre del Creador *
                            </label>
                            <input type="text"
                                   id="creador_nombre"
                                   name="creador_nombre"
                                   value="{{ old('creador_nombre', Auth::user()->name) }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Ej: Juan"
                                   required>
                            @error('creador_nombre')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellido del Creador -->
                        <div>
                            <label for="creador_apellido" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">person_outline</span>
                                Apellido del Creador *
                            </label>
                            <input type="text"
                                   id="creador_apellido"
                                   name="creador_apellido"
                                   value="{{ old('creador_apellido', Auth::user()->apellido_paterno) }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Ej: Pérez"
                                   required>
                            @error('creador_apellido')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Profesión del Creador -->
                        <div>
                            <label for="creador_profesion" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">work</span>
                                Profesión
                            </label>
                            <input type="text"
                                   id="creador_profesion"
                                   name="creador_profesion"
                                   value="{{ old('creador_profesion') }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Ej: Desarrollador Full Stack">
                            @error('creador_profesion')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción del Creador -->
                        <div>
                            <label for="creador_descripcion" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="material-icons text-sm mr-1">description</span>
                                Descripción del Creador
                            </label>
                            <textarea id="creador_descripcion"
                                      name="creador_descripcion"
                                      rows="3"
                                      class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 resize-none"
                                      placeholder="Cuéntanos sobre tu experiencia y especialidades">{{ old('creador_descripcion') }}</textarea>
                            @error('creador_descripcion')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                    </div>

                    <!-- Tab 5: Redes Sociales -->
                    <div id="tab-5" class="tab-content hidden">
                        <div class="mb-8">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center">
                                    <div class="p-3 bg-gradient-to-r from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-2xl mr-4">
                                        <span class="material-icons text-blue-600 dark:text-blue-400">share</span>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white">Redes Sociales del Creador</h4>
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
                                           {{ old('facebook_usuario') ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('facebook', this)">
                                    <span class="material-icons text-blue-600 text-lg mr-2">facebook</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Facebook</span>
                                </label>
                                <input type="text"
                                       name="facebook_usuario"
                                       value="{{ old('facebook_usuario') }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario o usuario"
                                       style="{{ old('facebook_usuario') ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- Twitter -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_twitter"
                                           value="1"
                                           {{ old('twitter_usuario') ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-blue-400 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('twitter', this)">
                                    <span class="material-icons text-blue-400 text-lg mr-2">alternate_email</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Twitter</span>
                                </label>
                                <input type="text"
                                       name="twitter_usuario"
                                       value="{{ old('twitter_usuario') }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="{{ old('twitter_usuario') ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- LinkedIn -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_linkedin"
                                           value="1"
                                           {{ old('linkedin_usuario') ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-blue-700 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('linkedin', this)">
                                    <span class="material-icons text-blue-700 text-lg mr-2">work</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">LinkedIn</span>
                                </label>
                                <input type="text"
                                       name="linkedin_usuario"
                                       value="{{ old('linkedin_usuario') }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="usuario o in/usuario"
                                       style="{{ old('linkedin_usuario') ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- Instagram -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_instagram"
                                           value="1"
                                           {{ old('instagram_usuario') ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-pink-600 focus:ring-pink-500"
                                           onchange="toggleRedSocialField('instagram', this)">
                                    <span class="material-icons text-pink-600 text-lg mr-2">photo_camera</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Instagram</span>
                                </label>
                                <input type="text"
                                       name="instagram_usuario"
                                       value="{{ old('instagram_usuario') }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="{{ old('instagram_usuario') ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- VK -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_vk"
                                           value="1"
                                           {{ old('vk_usuario') ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-blue-800 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('vk', this)">
                                    <span class="material-icons text-blue-800 text-lg mr-2">group</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">VK</span>
                                </label>
                                <input type="text"
                                       name="vk_usuario"
                                       value="{{ old('vk_usuario') }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="usuario"
                                       style="{{ old('vk_usuario') ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- TikTok -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_tiktok"
                                           value="1"
                                           {{ old('tiktok_usuario') ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-gray-800 focus:ring-gray-500"
                                           onchange="toggleRedSocialField('tiktok', this)">
                                    <span class="material-icons text-gray-800 text-lg mr-2">music_note</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">TikTok</span>
                                </label>
                                <input type="text"
                                       name="tiktok_usuario"
                                       value="{{ old('tiktok_usuario') }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="{{ old('tiktok_usuario') ? 'display: block;' : 'display: none;' }}">
                            </div>
                        </div>
                    </div>
                </div>
                    </div>

                    <!-- Tab 6: Niveles del Curso -->
                    <div id="tab-6" class="tab-content hidden">
                        <div class="mb-8">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center">
                                    <div class="p-3 bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-2xl mr-4">
                                        <span class="material-icons text-indigo-600 dark:text-indigo-400">layers</span>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white">Niveles del Curso</h4>
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
                    </div>
                </div>

                <!-- Botones de Acción - Darker -->
                <div class="px-6 sm:px-8 lg:px-12 pb-6 sm:pb-8 lg:pb-12 border-t border-slate-700/80 dark:border-slate-700/80 bg-gradient-to-r from-slate-900/80 to-slate-900/80 dark:from-slate-900/80 dark:to-slate-900/80 relative">
                    <!-- Subtle glow line at top -->
                    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-purple-500/20 to-transparent"></div>
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
                    <button type="submit"
                            id="submitBtn"
                            class="flex-1 group relative px-8 py-4 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 text-white font-bold rounded-2xl hover:from-purple-500 hover:via-indigo-500 hover:to-pink-500 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/40 transform hover:-translate-y-1">
                        <!-- Animated Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 rounded-2xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <!-- Sparkle Effects -->
                        <div class="absolute -top-1 -right-1 w-2 h-2 bg-yellow-400 rounded-full animate-ping"></div>
                        <div class="absolute -bottom-1 -left-1 w-1 h-1 bg-cyan-400 rounded-full animate-ping delay-300"></div>

                        <span class="material-icons mr-3 relative z-10 text-xl group-hover:rotate-12 transition-transform duration-300">add</span>
                        <span class="relative z-10">Crear Curso</span>
                    </button>

                    <a href="{{ route('creador.cursos.index') }}"
                       class="flex-1 group relative px-8 py-4 bg-gradient-to-r from-gray-600 to-slate-600 text-white font-bold rounded-2xl hover:from-gray-500 hover:to-slate-500 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-gray-500/40 transform hover:-translate-y-1 text-center">
                        <span class="material-icons mr-3 relative z-10 text-xl group-hover:rotate-12 transition-transform duration-300">arrow_back</span>
                        <span class="relative z-10">Cancelar</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Éxito -->
<div id="successModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-md">
    <!-- Partículas de fondo -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <canvas id="particlesCanvas" class="absolute inset-0 w-full h-full"></canvas>
    </div>

    <!-- Efectos de ondas -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="wave-effect absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 rounded-full border-2 border-green-500/20"></div>
        <div class="wave-effect-2 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 rounded-full border-2 border-emerald-500/20"></div>
        <div class="wave-effect-3 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 rounded-full border-2 border-cyan-500/20"></div>
    </div>

    <div class="relative w-full max-w-md mx-4 z-10">
        <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 rounded-3xl border border-slate-700/80 shadow-2xl overflow-hidden relative modal-container" style="box-shadow: 0 0 40px rgba(168, 85, 247, 0.3), 0 0 80px rgba(99, 102, 241, 0.2), 0 0 120px rgba(16, 185, 129, 0.1);">
            <!-- Borde animado brillante -->
            <div class="absolute inset-0 rounded-3xl border-2 border-transparent">
                <div class="absolute inset-0 rounded-3xl border-2 border-gradient-to-r from-green-500 via-emerald-500 to-cyan-500 animate-border-glow"></div>
            </div>

            <!-- Glow effect animado -->
            <div class="absolute inset-0 bg-gradient-to-r from-green-500/10 via-emerald-500/10 to-cyan-500/10 opacity-50 animate-glow-pulse"></div>

            <!-- Efectos de luz en las esquinas -->
            <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-green-500/20 to-transparent rounded-br-full blur-2xl animate-corner-glow"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-emerald-500/20 to-transparent rounded-bl-full blur-2xl animate-corner-glow delay-500"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-cyan-500/20 to-transparent rounded-tr-full blur-2xl animate-corner-glow delay-1000"></div>
            <div class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-tl from-green-500/20 to-transparent rounded-tl-full blur-2xl animate-corner-glow delay-1500"></div>

            <!-- Confeti flotante -->
            <div class="confetti-container absolute inset-0 overflow-hidden pointer-events-none">
                <div class="confetti confetti-1"></div>
                <div class="confetti confetti-2"></div>
                <div class="confetti confetti-3"></div>
                <div class="confetti confetti-4"></div>
                <div class="confetti confetti-5"></div>
                <div class="confetti confetti-6"></div>
                <div class="confetti confetti-7"></div>
                <div class="confetti confetti-8"></div>
            </div>

            <div class="relative p-8 text-center z-10">
                <!-- Icono de éxito animado con múltiples efectos -->
                <div class="inline-flex items-center justify-center mb-6 relative">
                    <!-- Círculos concéntricos animados -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="ring-1 ring-green-500/30 rounded-full w-24 h-24 animate-ring-pulse"></div>
                        <div class="ring-1 ring-emerald-500/30 rounded-full w-32 h-32 animate-ring-pulse delay-300"></div>
                        <div class="ring-1 ring-cyan-500/30 rounded-full w-40 h-40 animate-ring-pulse delay-600"></div>
                    </div>

                    <!-- Icono principal -->
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-green-500 via-emerald-500 to-cyan-500 rounded-full shadow-2xl shadow-green-500/50 relative z-10 success-icon">
                        <span class="material-icons text-white text-5xl icon-check">check_circle</span>
                        <!-- Efecto de brillo rotativo -->
                        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shine"></div>
                    </div>

                    <!-- Partículas alrededor del icono -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="particle particle-1"></div>
                        <div class="particle particle-2"></div>
                        <div class="particle particle-3"></div>
                        <div class="particle particle-4"></div>
                        <div class="particle particle-5"></div>
                        <div class="particle particle-6"></div>
                    </div>
                </div>

                <!-- Título con efecto de escritura -->
                <h3 class="text-2xl font-black text-white mb-3 title-text" style="text-shadow: 0 0 20px rgba(16, 185, 129, 0.5), 0 0 40px rgba(16, 185, 129, 0.3);">
                    ¡Curso Creado con Éxito! 🎉
                </h3>

                <!-- Línea decorativa -->
                <div class="flex items-center justify-center mb-4">
                    <div class="h-px w-16 bg-gradient-to-r from-transparent via-green-500 to-transparent"></div>
                    <div class="w-2 h-2 rounded-full bg-green-500 mx-2 animate-pulse"></div>
                    <div class="h-px w-16 bg-gradient-to-r from-transparent via-emerald-500 to-transparent"></div>
                </div>

                <!-- Mensaje -->
                <p class="text-slate-300 mb-6 leading-relaxed message-text">
                    Tu curso ha sido creado exitosamente y está listo para ser publicado.
                </p>

                <!-- Botones con efectos mejorados -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('creador.cursos.index') }}"
                       class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 text-white font-bold rounded-xl hover:from-purple-500 hover:via-indigo-500 hover:to-pink-500 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-purple-500/40 transform relative overflow-hidden group button-primary">
                        <!-- Efecto de brillo en hover -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        <span class="material-icons text-sm mr-2 align-middle relative z-10">list</span>
                        <span class="relative z-10">Ver Mis Cursos</span>
                    </a>
                    <button onclick="closeSuccessModal()"
                            class="flex-1 px-6 py-3 bg-slate-700 text-slate-200 font-semibold rounded-xl hover:bg-slate-600 transition-all duration-300 hover:scale-105 relative overflow-hidden group button-secondary">
                        <!-- Efecto de brillo en hover -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        <span class="relative z-10">Cerrar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmación para Eliminar Nivel -->
<div id="deleteNivelModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/70 backdrop-blur-md">
    <!-- Partículas de fondo -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="delete-particle dp-1"></div>
        <div class="delete-particle dp-2"></div>
        <div class="delete-particle dp-3"></div>
    </div>

    <div class="relative w-full max-w-md mx-4 z-10">
        <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 rounded-3xl border border-red-700/80 shadow-2xl overflow-hidden relative delete-modal-container" style="box-shadow: 0 0 40px rgba(239, 68, 68, 0.3), 0 0 80px rgba(220, 38, 38, 0.2);">
            <!-- Borde animado rojo -->
            <div class="absolute inset-0 rounded-3xl border-2 border-red-500/50 animate-delete-border-glow"></div>

            <!-- Glow effect rojo -->
            <div class="absolute inset-0 bg-gradient-to-r from-red-500/10 via-orange-500/10 to-red-500/10 opacity-50 animate-delete-glow-pulse"></div>

            <!-- Efectos de luz en las esquinas -->
            <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-red-500/20 to-transparent rounded-br-full blur-2xl animate-delete-corner-glow"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-orange-500/20 to-transparent rounded-bl-full blur-2xl animate-delete-corner-glow delay-500"></div>

            <div class="relative p-8 text-center z-10">
                <!-- Icono de advertencia animado -->
                <div class="inline-flex items-center justify-center mb-6 relative">
                    <!-- Círculos concéntricos animados -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="delete-ring dr-1"></div>
                        <div class="delete-ring dr-2"></div>
                    </div>

                    <!-- Icono principal -->
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-red-600 via-orange-600 to-red-600 rounded-full shadow-2xl shadow-red-500/50 relative z-10 delete-icon">
                        <span class="material-icons text-white text-5xl icon-warning">warning</span>
                        <!-- Efecto de brillo rotativo -->
                        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-transparent via-white/30 to-transparent animate-delete-shine"></div>
                    </div>
                </div>

                <!-- Título -->
                <h3 class="text-2xl font-black text-white mb-3 delete-title" style="text-shadow: 0 0 20px rgba(239, 68, 68, 0.5), 0 0 40px rgba(220, 38, 38, 0.3);">
                    ¿Eliminar Nivel?
                </h3>

                <!-- Línea decorativa -->
                <div class="flex items-center justify-center mb-4">
                    <div class="h-px w-16 bg-gradient-to-r from-transparent via-red-500/50 to-transparent"></div>
                    <div class="w-2 h-2 rounded-full bg-red-500 mx-2 animate-pulse"></div>
                    <div class="h-px w-16 bg-gradient-to-r from-transparent via-orange-500/50 to-transparent"></div>
                </div>

                <!-- Mensaje -->
                <p class="text-slate-300 mb-2 delete-message">
                    Esta acción eliminará el nivel completo junto con todos sus subniveles y contenido asociado.
                </p>
                <p class="text-red-400 font-semibold mb-6 delete-warning">
                    ⚠️ Esta acción no se puede deshacer
                </p>

                <!-- Información del nivel a eliminar -->
                <div id="deleteNivelInfo" class="bg-slate-800/50 rounded-xl p-4 mb-6 border border-red-500/30">
                    <p class="text-sm text-slate-400 mb-1">Nivel a eliminar:</p>
                    <p id="deleteNivelNombre" class="text-white font-semibold"></p>
                </div>

                <!-- Botones -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button onclick="confirmDeleteNivel()"
                            class="flex-1 px-6 py-3 bg-gradient-to-r from-red-600 via-red-500 to-orange-600 text-white font-bold rounded-xl hover:from-red-500 hover:via-red-400 hover:to-orange-500 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-red-500/40 transform relative overflow-hidden group delete-confirm-btn">
                        <!-- Efecto de brillo en hover -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        <span class="material-icons text-sm mr-2 align-middle relative z-10">delete</span>
                        <span class="relative z-10">Eliminar Nivel</span>
                    </button>
                    <button onclick="cancelDeleteNivel()"
                            class="flex-1 px-6 py-3 bg-slate-700 text-slate-200 font-semibold rounded-xl hover:bg-slate-600 transition-all duration-300 hover:scale-105 relative overflow-hidden group delete-cancel-btn">
                        <!-- Efecto de brillo en hover -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        <span class="relative z-10">Cancelar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos para Tabs -->
<style>
    /* Scrollbar hide para tabs */
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* Animación de transición para tabs */
    .tab-content {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Estilos para botones de tab activos - Darker */
    .tab-button.active {
        border-bottom-color: rgb(168 85 247) !important;
        background-color: rgba(30, 41, 59, 0.5) !important;
        color: rgb(226 232 240) !important;
        box-shadow: 0 4px 6px -1px rgba(168, 85, 247, 0.1), 0 2px 4px -1px rgba(168, 85, 247, 0.06);
    }

    .dark .tab-button.active {
        border-bottom-color: rgb(196 181 253) !important;
        background-color: rgba(30, 41, 59, 0.5) !important;
        color: rgb(226 232 240) !important;
        box-shadow: 0 4px 6px -1px rgba(168, 85, 247, 0.1), 0 2px 4px -1px rgba(168, 85, 247, 0.06);
    }

    /* Hover effect mejorado para tabs - Darker */
    .tab-button:hover {
        transform: translateY(-1px);
        background-color: rgba(30, 41, 59, 0.3);
    }

    .tab-button {
        transition: all 0.3s ease;
    }

    /* Tab content background - Darker */
    .tab-content {
        background-color: transparent;
    }

    /* Form inputs - Darker */
    .tab-content input[type="text"],
    .tab-content input[type="number"],
    .tab-content input[type="date"],
    .tab-content input[type="url"],
    .tab-content input[type="file"],
    .tab-content textarea,
    .tab-content select {
        background-color: rgba(15, 23, 42, 0.8) !important;
        border-color: rgba(51, 65, 85, 0.8) !important;
        color: rgb(226, 232, 240) !important;
    }

    .tab-content input[type="text"]:focus,
    .tab-content input[type="number"]:focus,
    .tab-content input[type="date"]:focus,
    .tab-content input[type="url"]:focus,
    .tab-content textarea:focus,
    .tab-content select:focus {
        border-color: rgba(168, 85, 247, 0.6) !important;
        box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.1) !important;
    }

    .tab-content input[type="text"]::placeholder,
    .tab-content input[type="number"]::placeholder,
    .tab-content input[type="date"]::placeholder,
    .tab-content input[type="url"]::placeholder,
    .tab-content textarea::placeholder {
        color: rgba(148, 163, 184, 0.6) !important;
    }

    /* Labels - Darker */
    .tab-content label {
        color: rgb(203, 213, 225) !important;
    }

    /* Modal de Éxito */
    #successModal {
        display: flex !important;
        animation: fadeIn 0.3s ease-in-out;
    }

    #successModal.hidden {
        display: none !important;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(-20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    #successModal > div > div {
        animation: modalSlideIn 0.4s ease-out;
    }

    /* Animación del icono de éxito */
    @keyframes successPulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
        }
    }

    #successModal .animate-bounce {
        animation: successPulse 2s ease-in-out infinite;
    }

    /* Efectos de ondas */
    @keyframes waveExpand {
        0% {
            transform: translate(-50%, -50%) scale(0.8);
            opacity: 1;
        }
        100% {
            transform: translate(-50%, -50%) scale(1.5);
            opacity: 0;
        }
    }

    .wave-effect {
        animation: waveExpand 3s ease-out infinite;
    }

    .wave-effect-2 {
        animation: waveExpand 3s ease-out infinite 0.5s;
    }

    .wave-effect-3 {
        animation: waveExpand 3s ease-out infinite 1s;
    }

    /* Borde animado brillante */
    @keyframes borderGlow {
        0%, 100% {
            border-color: rgba(16, 185, 129, 0.5);
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.3);
        }
        25% {
            border-color: rgba(5, 150, 105, 0.7);
            box-shadow: 0 0 20px rgba(5, 150, 105, 0.5);
        }
        50% {
            border-color: rgba(6, 182, 212, 0.7);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.5);
        }
        75% {
            border-color: rgba(16, 185, 129, 0.7);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
        }
    }

    .animate-border-glow {
        animation: borderGlow 3s ease-in-out infinite;
        background: linear-gradient(90deg, #10b981, #06b6d4, #10b981);
        background-size: 200% 100%;
        animation: borderGlow 3s linear infinite;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
    }

    /* Glow pulse */
    @keyframes glowPulse {
        0%, 100% {
            opacity: 0.3;
        }
        50% {
            opacity: 0.6;
        }
    }

    .animate-glow-pulse {
        animation: glowPulse 2s ease-in-out infinite;
    }

    /* Corner glow */
    @keyframes cornerGlow {
        0%, 100% {
            opacity: 0.2;
            transform: scale(1);
        }
        50% {
            opacity: 0.4;
            transform: scale(1.1);
        }
    }

    .animate-corner-glow {
        animation: cornerGlow 3s ease-in-out infinite;
    }

    .delay-500 {
        animation-delay: 0.5s;
    }

    .delay-1000 {
        animation-delay: 1s;
    }

    .delay-1500 {
        animation-delay: 1.5s;
    }

    /* Confeti */
    .confetti {
        position: absolute;
        width: 10px;
        height: 10px;
        background: linear-gradient(45deg, #10b981, #06b6d4, #a855f7, #ec4899);
        border-radius: 2px;
        opacity: 0.8;
    }

    .confetti-1 {
        top: 10%;
        left: 20%;
        animation: confettiFall 3s ease-in-out infinite;
        background: #10b981;
    }

    .confetti-2 {
        top: 20%;
        left: 80%;
        animation: confettiFall 3.5s ease-in-out infinite 0.3s;
        background: #06b6d4;
    }

    .confetti-3 {
        top: 60%;
        left: 10%;
        animation: confettiFall 2.8s ease-in-out infinite 0.6s;
        background: #a855f7;
    }

    .confetti-4 {
        top: 70%;
        left: 90%;
        animation: confettiFall 3.2s ease-in-out infinite 0.9s;
        background: #ec4899;
    }

    .confetti-5 {
        top: 30%;
        left: 50%;
        animation: confettiFall 2.5s ease-in-out infinite 1.2s;
        background: #10b981;
    }

    .confetti-6 {
        top: 50%;
        left: 30%;
        animation: confettiFall 3.3s ease-in-out infinite 1.5s;
        background: #06b6d4;
    }

    .confetti-7 {
        top: 40%;
        left: 70%;
        animation: confettiFall 2.9s ease-in-out infinite 1.8s;
        background: #a855f7;
    }

    .confetti-8 {
        top: 80%;
        left: 60%;
        animation: confettiFall 3.1s ease-in-out infinite 2.1s;
        background: #ec4899;
    }

    @keyframes confettiFall {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
        100% {
            transform: translateY(100px) rotate(360deg);
            opacity: 0;
        }
    }

    /* Anillos concéntricos */
    @keyframes ringPulse {
        0% {
            transform: scale(0.8);
            opacity: 0.8;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.3;
        }
        100% {
            transform: scale(0.8);
            opacity: 0.8;
        }
    }

    .animate-ring-pulse {
        animation: ringPulse 2s ease-in-out infinite;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }

    .delay-600 {
        animation-delay: 0.6s;
    }

    /* Brillo rotativo */
    @keyframes shine {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .animate-shine {
        animation: shine 3s linear infinite;
    }

    /* Partículas alrededor del icono */
    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: #10b981;
        border-radius: 50%;
        opacity: 0;
    }

    .particle-1 {
        top: -20px;
        left: 50%;
        animation: particleFloat 2s ease-in-out infinite;
    }

    .particle-2 {
        top: 50%;
        right: -20px;
        animation: particleFloat 2s ease-in-out infinite 0.3s;
    }

    .particle-3 {
        bottom: -20px;
        left: 50%;
        animation: particleFloat 2s ease-in-out infinite 0.6s;
    }

    .particle-4 {
        top: 50%;
        left: -20px;
        animation: particleFloat 2s ease-in-out infinite 0.9s;
    }

    .particle-5 {
        top: -15px;
        right: -15px;
        animation: particleFloat 2s ease-in-out infinite 1.2s;
    }

    .particle-6 {
        bottom: -15px;
        left: -15px;
        animation: particleFloat 2s ease-in-out infinite 1.5s;
    }

    @keyframes particleFloat {
        0%, 100% {
            transform: translate(0, 0) scale(0);
            opacity: 0;
        }
        50% {
            transform: translate(15px, -15px) scale(1);
            opacity: 1;
        }
    }

    /* Animación del icono de check */
    .icon-check {
        animation: checkMark 0.6s ease-out;
    }

    @keyframes checkMark {
        0% {
            transform: scale(0) rotate(-45deg);
            opacity: 0;
        }
        50% {
            transform: scale(1.2) rotate(5deg);
        }
        100% {
            transform: scale(1) rotate(0deg);
            opacity: 1;
        }
    }

    /* Animación del título */
    .title-text {
        animation: titleFadeIn 0.8s ease-out 0.3s both;
    }

    @keyframes titleFadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animación del mensaje */
    .message-text {
        animation: messageFadeIn 0.8s ease-out 0.6s both;
    }

    @keyframes messageFadeIn {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animación de los botones */
    .button-primary,
    .button-secondary {
        animation: buttonFadeIn 0.8s ease-out 0.9s both;
    }

    @keyframes buttonFadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Efecto de entrada del modal */
    .modal-container {
        animation: modalEntrance 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    @keyframes modalEntrance {
        0% {
            opacity: 0;
            transform: scale(0.7) translateY(-50px);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    /* Responsive tabs */
    @media (max-width: 640px) {
        .tab-button {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
        }

        .tab-button .material-icons {
            font-size: 1rem;
            margin-right: 0.5rem;
        }
    }

    /* ===== ESTILOS PARA HERO SECTION ===== */

    /* Gradiente animado */
    @keyframes gradientShift {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }

    .animate-gradient-shift {
        background-size: 200% 200%;
        animation: gradientShift 8s ease infinite;
    }

    /* Luces flotantes */
    .floating-light {
        position: absolute;
        border-radius: 50%;
        filter: blur(40px);
        opacity: 0.3;
        animation: floatLight 15s ease-in-out infinite;
    }

    .light-1 {
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(147, 51, 234, 0.4), transparent);
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .light-2 {
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.4), transparent);
        top: 60%;
        right: 15%;
        animation-delay: 3s;
    }

    .light-3 {
        width: 180px;
        height: 180px;
        background: radial-gradient(circle, rgba(236, 72, 153, 0.4), transparent);
        bottom: 20%;
        left: 20%;
        animation-delay: 6s;
    }

    .light-4 {
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, rgba(168, 85, 247, 0.4), transparent);
        top: 30%;
        right: 30%;
        animation-delay: 9s;
    }

    @keyframes floatLight {
        0%, 100% {
            transform: translate(0, 0) scale(1);
        }
        33% {
            transform: translate(30px, -30px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
    }

    /* Ondas decorativas */
    .hero-wave {
        position: absolute;
        border: 1px solid;
        border-radius: 50%;
        opacity: 0.1;
        animation: waveExpand 8s ease-out infinite;
    }

    .wave-1 {
        width: 300px;
        height: 300px;
        border-color: rgba(147, 51, 234, 0.3);
        top: 20%;
        left: 5%;
        animation-delay: 0s;
    }

    .wave-2 {
        width: 400px;
        height: 400px;
        border-color: rgba(99, 102, 241, 0.3);
        bottom: 15%;
        right: 8%;
        animation-delay: 2s;
    }

    .wave-3 {
        width: 250px;
        height: 250px;
        border-color: rgba(236, 72, 153, 0.3);
        top: 50%;
        right: 20%;
        animation-delay: 4s;
    }

    @keyframes waveExpand {
        0% {
            transform: scale(0.8);
            opacity: 0.1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.05;
        }
        100% {
            transform: scale(0.8);
            opacity: 0.1;
        }
    }

    /* Partículas decorativas */
    .hero-particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(147, 51, 234, 0.6);
        border-radius: 50%;
        animation: particleFloat 6s ease-in-out infinite;
    }

    .particle-1 {
        top: 15%;
        left: 15%;
        animation-delay: 0s;
        background: rgba(147, 51, 234, 0.6);
    }

    .particle-2 {
        top: 25%;
        right: 20%;
        animation-delay: 1s;
        background: rgba(99, 102, 241, 0.6);
    }

    .particle-3 {
        bottom: 30%;
        left: 25%;
        animation-delay: 2s;
        background: rgba(236, 72, 153, 0.6);
    }

    .particle-4 {
        top: 40%;
        right: 15%;
        animation-delay: 3s;
        background: rgba(168, 85, 247, 0.6);
    }

    .particle-5 {
        bottom: 20%;
        right: 30%;
        animation-delay: 4s;
        background: rgba(147, 51, 234, 0.6);
    }

    .particle-6 {
        top: 60%;
        left: 10%;
        animation-delay: 5s;
        background: rgba(99, 102, 241, 0.6);
    }

    @keyframes particleFloat {
        0%, 100% {
            transform: translate(0, 0) scale(1);
            opacity: 0.6;
        }
        50% {
            transform: translate(20px, -30px) scale(1.5);
            opacity: 1;
        }
    }

    /* Anillos concéntricos del icono */
    .hero-ring {
        position: absolute;
        border: 2px solid;
        border-radius: 50%;
        opacity: 0.3;
        animation: ringPulse 3s ease-in-out infinite;
    }

    .ring-1 {
        width: 100px;
        height: 100px;
        border-color: rgba(147, 51, 234, 0.4);
        animation-delay: 0s;
    }

    .ring-2 {
        width: 130px;
        height: 130px;
        border-color: rgba(99, 102, 241, 0.3);
        animation-delay: 0.5s;
    }

    .ring-3 {
        width: 160px;
        height: 160px;
        border-color: rgba(236, 72, 153, 0.2);
        animation-delay: 1s;
    }

    @keyframes ringPulse {
        0%, 100% {
            transform: scale(0.9);
            opacity: 0.3;
        }
        50% {
            transform: scale(1.1);
            opacity: 0.1;
        }
    }

    /* Brillo rotativo del icono */
    @keyframes iconShine {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .animate-icon-shine {
        animation: iconShine 4s linear infinite;
    }

    /* Partículas alrededor del icono */
    .icon-particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        animation: iconParticleFloat 3s ease-in-out infinite;
    }

    .ip-1 {
        top: -15px;
        left: 50%;
        animation-delay: 0s;
    }

    .ip-2 {
        top: 50%;
        right: -15px;
        animation-delay: 0.75s;
    }

    .ip-3 {
        bottom: -15px;
        left: 50%;
        animation-delay: 1.5s;
    }

    .ip-4 {
        top: 50%;
        left: -15px;
        animation-delay: 2.25s;
    }

    @keyframes iconParticleFloat {
        0%, 100% {
            transform: translate(0, 0) scale(0);
            opacity: 0;
        }
        50% {
            transform: translate(10px, -10px) scale(1);
            opacity: 1;
        }
    }

    /* Animación del icono add */
    .icon-add {
        animation: iconAddEntrance 0.8s ease-out;
    }

    @keyframes iconAddEntrance {
        0% {
            transform: scale(0) rotate(-180deg);
            opacity: 0;
        }
        50% {
            transform: scale(1.2) rotate(10deg);
        }
        100% {
            transform: scale(1) rotate(0deg);
            opacity: 1;
        }
    }

    /* Efecto glow en el título */
    .title-glow {
        position: absolute;
        inset: -5px;
        background: radial-gradient(circle, rgba(147, 51, 234, 0.3), transparent);
        border-radius: 10px;
        opacity: 0;
        animation: titleGlow 3s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes titleGlow {
        0%, 100% {
            opacity: 0;
        }
        50% {
            opacity: 0.5;
        }
    }

    /* Separador del título */
    .title-separator {
        animation: separatorTwinkle 2s ease-in-out infinite;
        filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.5));
    }

    @keyframes separatorTwinkle {
        0%, 100% {
            transform: scale(1) rotate(0deg);
            opacity: 0.8;
        }
        50% {
            transform: scale(1.2) rotate(180deg);
            opacity: 1;
        }
    }

    /* Animación de entrada del título */
    .title-word-1 {
        animation: titleWord1Entrance 1s ease-out 0.2s both;
    }

    .title-word-2 {
        animation: titleWord2Entrance 1s ease-out 0.4s both;
    }

    @keyframes titleWord1Entrance {
        0% {
            opacity: 0;
            transform: translateX(-30px) scale(0.8);
        }
        100% {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    @keyframes titleWord2Entrance {
        0% {
            opacity: 0;
            transform: translateX(30px) scale(0.8);
        }
        100% {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    /* Línea divisoria */
    .divider-line-1,
    .divider-line-2 {
        animation: dividerLineExpand 2s ease-in-out infinite;
    }

    .divider-line-1 {
        animation-delay: 0s;
    }

    .divider-line-2 {
        animation-delay: 1s;
    }

    @keyframes dividerLineExpand {
        0%, 100% {
            width: 20px;
            opacity: 0.5;
        }
        50% {
            width: 40px;
            opacity: 1;
        }
    }

    /* Animación del subtítulo */
    .subtitle-part-1 {
        animation: subtitlePart1Entrance 1s ease-out 0.6s both;
    }

    .subtitle-connector {
        animation: subtitleConnectorEntrance 0.5s ease-out 0.8s both;
    }

    .subtitle-part-2 {
        animation: subtitlePart2Entrance 1s ease-out 1s both;
    }

    @keyframes subtitlePart1Entrance {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes subtitleConnectorEntrance {
        0% {
            opacity: 0;
            transform: scale(0);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes subtitlePart2Entrance {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Estrellas centelleantes */
    @keyframes twinkle {
        0%, 100% {
            opacity: 0.3;
            transform: scale(1);
        }
        50% {
            opacity: 1;
            transform: scale(1.5);
        }
    }

    .animate-twinkle {
        animation: twinkle 3s ease-in-out infinite;
    }

    /* Animación general del contenido del hero */
    .hero-content {
        animation: heroContentEntrance 1.2s ease-out;
    }

    @keyframes heroContentEntrance {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== ESTILOS PARA MODAL DE ELIMINACIÓN ===== */

    /* Modal de eliminación */
    #deleteNivelModal {
        display: flex !important;
        animation: fadeIn 0.3s ease-in-out;
    }

    #deleteNivelModal.hidden {
        display: none !important;
    }

    .delete-modal-container {
        animation: deleteModalEntrance 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    @keyframes deleteModalEntrance {
        0% {
            opacity: 0;
            transform: scale(0.7) translateY(-50px);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    /* Borde animado rojo */
    @keyframes deleteBorderGlow {
        0%, 100% {
            border-color: rgba(239, 68, 68, 0.5);
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.3);
        }
        50% {
            border-color: rgba(220, 38, 38, 0.7);
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.5);
        }
    }

    .animate-delete-border-glow {
        animation: deleteBorderGlow 2s ease-in-out infinite;
    }

    /* Glow pulse rojo */
    @keyframes deleteGlowPulse {
        0%, 100% {
            opacity: 0.3;
        }
        50% {
            opacity: 0.6;
        }
    }

    .animate-delete-glow-pulse {
        animation: deleteGlowPulse 2s ease-in-out infinite;
    }

    /* Corner glow rojo */
    @keyframes deleteCornerGlow {
        0%, 100% {
            opacity: 0.2;
            transform: scale(1);
        }
        50% {
            opacity: 0.4;
            transform: scale(1.1);
        }
    }

    .animate-delete-corner-glow {
        animation: deleteCornerGlow 3s ease-in-out infinite;
    }

    /* Partículas de eliminación */
    .delete-particle {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(239, 68, 68, 0.6);
        border-radius: 50%;
        animation: deleteParticleFloat 4s ease-in-out infinite;
    }

    .dp-1 {
        top: 20%;
        left: 20%;
        animation-delay: 0s;
        background: rgba(239, 68, 68, 0.6);
    }

    .dp-2 {
        top: 60%;
        right: 25%;
        animation-delay: 1.3s;
        background: rgba(249, 115, 22, 0.6);
    }

    .dp-3 {
        bottom: 30%;
        left: 30%;
        animation-delay: 2.6s;
        background: rgba(220, 38, 38, 0.6);
    }

    @keyframes deleteParticleFloat {
        0%, 100% {
            transform: translate(0, 0) scale(1);
            opacity: 0.6;
        }
        50% {
            transform: translate(25px, -35px) scale(1.5);
            opacity: 1;
        }
    }

    /* Anillos del icono de advertencia */
    .delete-ring {
        position: absolute;
        border: 2px solid;
        border-radius: 50%;
        opacity: 0.3;
        animation: deleteRingPulse 2.5s ease-in-out infinite;
    }

    .dr-1 {
        width: 100px;
        height: 100px;
        border-color: rgba(239, 68, 68, 0.4);
        animation-delay: 0s;
    }

    .dr-2 {
        width: 130px;
        height: 130px;
        border-color: rgba(249, 115, 22, 0.3);
        animation-delay: 0.5s;
    }

    @keyframes deleteRingPulse {
        0%, 100% {
            transform: scale(0.9);
            opacity: 0.3;
        }
        50% {
            transform: scale(1.1);
            opacity: 0.1;
        }
    }

    /* Brillo rotativo del icono */
    @keyframes deleteShine {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .animate-delete-shine {
        animation: deleteShine 3s linear infinite;
    }

    /* Animación del icono de advertencia */
    .icon-warning {
        animation: warningShake 0.6s ease-out;
    }

    @keyframes warningShake {
        0%, 100% {
            transform: rotate(0deg);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: rotate(-5deg);
        }
        20%, 40%, 60%, 80% {
            transform: rotate(5deg);
        }
    }

    /* Animación del título */
    .delete-title {
        animation: deleteTitleEntrance 0.8s ease-out 0.2s both;
    }

    @keyframes deleteTitleEntrance {
        0% {
            opacity: 0;
            transform: translateY(-20px) scale(0.9);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Animación del mensaje */
    .delete-message {
        animation: deleteMessageEntrance 0.8s ease-out 0.4s both;
    }

    .delete-warning {
        animation: deleteWarningEntrance 0.8s ease-out 0.6s both;
    }

    @keyframes deleteMessageEntrance {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes deleteWarningEntrance {
        0% {
            opacity: 0;
            transform: scale(0.8);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Animación de los botones */
    .delete-confirm-btn,
    .delete-cancel-btn {
        animation: deleteButtonEntrance 0.8s ease-out 0.8s both;
    }

    @keyframes deleteButtonEntrance {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Efecto de vibración en el botón de confirmar */
    .delete-confirm-btn:hover {
        animation: deleteButtonShake 0.5s ease-in-out;
    }

    @keyframes deleteButtonShake {
        0%, 100% {
            transform: translateX(0);
        }
        25% {
            transform: translateX(-3px);
        }
        75% {
            transform: translateX(3px);
        }
    }
</style>

<!-- Resumable.js para carga de archivos grandes -->
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script>
let nivelCounter = 0;
let currentTab = 1;

// Función para cambiar de tab
function switchTab(tabNumber) {
    // Ocultar todos los tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });

    // Remover clase active de todos los botones y resetear estilos
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('active');
        button.classList.remove('border-purple-500', 'border-cyan-400', 'border-emerald-400', 'border-pink-400', 'border-blue-400', 'border-indigo-400');
        button.classList.remove('bg-slate-800/50');
        button.classList.add('text-slate-400');
        button.classList.remove('text-slate-200', 'text-white');
    });

    // Mostrar el tab seleccionado
    const selectedTab = document.getElementById(`tab-${tabNumber}`);
    if (selectedTab) {
        selectedTab.classList.remove('hidden');
    }

    // Agregar clase active y estilos al botón seleccionado
    const selectedButton = document.querySelectorAll('.tab-button')[tabNumber - 1];
    if (selectedButton) {
        selectedButton.classList.add('active');
        // Colores específicos por tab
        const colors = ['border-purple-500', 'border-cyan-400', 'border-emerald-400', 'border-pink-400', 'border-blue-400', 'border-indigo-400'];
        selectedButton.classList.add(colors[tabNumber - 1]);
        selectedButton.classList.add('bg-slate-800/50');
        selectedButton.classList.remove('text-slate-400');
        selectedButton.classList.add('text-slate-200');
    }

    currentTab = tabNumber;

    // Scroll suave al inicio del formulario
    const formContainer = document.querySelector('.bg-slate-900\\/95');
    if (formContainer) {
        formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Inicializar el primer tab al cargar
document.addEventListener('DOMContentLoaded', function() {
    switchTab(1);
});

function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}

function submitCreateForm(event) {
    event.preventDefault();

    const form = event.target;
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;

    // Deshabilitar botón y mostrar loading
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <div class="flex items-center justify-center">
            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white mr-3"></div>
            <span>Creando Curso...</span>
        </div>
    `;

    // Crear FormData
    const formData = new FormData(form);

    // Enviar formulario con AJAX
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || formData.get('_token')
        },
        redirect: 'follow'
    })
    .then(async response => {
        // Si la respuesta es exitosa (200-299) o redirección
        if (response.ok || response.status === 302) {
            // Intentar parsear como JSON primero
            try {
                const data = await response.json();
                if (data.success) {
                    showSuccessModal();
                    if (data.redirect) {
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 2000);
                    }
                    return;
                }
            } catch (e) {
                // Si no es JSON, asumir éxito y mostrar modal
                // El controlador probablemente redirigió
                showSuccessModal();
                // Marcar para mostrar modal después de recargar
                sessionStorage.setItem('curso_creado', 'true');
                // Recargar después de un momento para ver el modal
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            }
        } else {
            // Si hay errores de validación, Laravel devuelve 422
            if (response.status === 422) {
                const data = await response.json();
                // Mostrar errores de validación
                alert('Por favor, corrige los errores en el formulario');
                // Recargar para mostrar errores
                window.location.reload();
            } else {
                throw new Error('Error al crear el curso');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Si hay error de red, enviar el formulario de forma tradicional
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        form.submit();
    });
}

// Sistema de partículas para el modal
let particlesAnimation = null;

function initParticles() {
    const canvas = document.getElementById('particlesCanvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const particles = [];
    const particleCount = 50;

    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 3 + 1;
            this.speedX = Math.random() * 2 - 1;
            this.speedY = Math.random() * 2 - 1;
            this.color = ['#10b981', '#06b6d4', '#a855f7', '#ec4899'][Math.floor(Math.random() * 4)];
            this.opacity = Math.random() * 0.5 + 0.3;
        }

        update() {
            this.x += this.speedX;
            this.y += this.speedY;

            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
            if (this.y > canvas.height) this.y = 0;
            if (this.y < 0) this.y = canvas.height;
        }

        draw() {
            ctx.fillStyle = this.color;
            ctx.globalAlpha = this.opacity;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.globalAlpha = 1;
        }
    }

    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });

        particlesAnimation = requestAnimationFrame(animate);
    }

    animate();
}

function stopParticles() {
    if (particlesAnimation) {
        cancelAnimationFrame(particlesAnimation);
        particlesAnimation = null;
    }
    const canvas = document.getElementById('particlesCanvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
}

// Función para mostrar el modal de éxito
function showSuccessModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevenir scroll

        // Inicializar partículas
        setTimeout(() => {
            initParticles();
        }, 100);

        // Ajustar canvas al redimensionar
        window.addEventListener('resize', function resizeHandler() {
            const canvas = document.getElementById('particlesCanvas');
            if (canvas) {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
        });
    }
}

// Función para cerrar el modal de éxito
function closeSuccessModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Restaurar scroll

        // Detener partículas
        stopParticles();
    }
}

// Cerrar modal al hacer clic fuera de él
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeSuccessModal();
            }
        });

        // Cerrar con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeSuccessModal();
            }
        });
    }

    // Verificar si hay un mensaje de éxito en la URL (después de redirección)
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1' || window.location.hash === '#success') {
        showSuccessModal();
    }

    // Verificar sessionStorage para mostrar modal después de crear curso
    if (sessionStorage.getItem('curso_creado') === 'true') {
        showSuccessModal();
        sessionStorage.removeItem('curso_creado'); // Limpiar después de mostrar
    }
});

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
                                <!-- Numeración Personalizada -->
                                <div class="md:col-span-2">
                                    <label class="flex items-center text-xs text-gray-600 dark:text-gray-400 mb-2">
                                        <input type="checkbox"
                                               name="niveles[${nivelCounter}][subniveles][1][numeracion_personalizada]"
                                               value="1"
                                               class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                               onchange="toggleCustomNumbering(this)">
                                        <span class="material-icons text-xs mr-1">edit</span>
                                        Numeración personalizada (opcional)
                                    </label>

                                    <!-- Campo de número personalizado (oculto por defecto) -->
                                    <div class="custom-number-field" style="display: none;">
                                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                            <span class="material-icons text-xs mr-1">numbers</span>
                                            Número del Subnivel
                                        </label>
                                        <input type="number" name="niveles[${nivelCounter}][subniveles][1][numero_personalizado]"
                                               value="1"
                                               min="1"
                                               max="999"
                                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                                               placeholder="Ej: 1, 5, 10, etc.">
                                    </div>

                                    <!-- Campo oculto para número automático -->
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][numero]" value="1">
                                </div>

                                <!-- Título del Subnivel -->
                                <div>
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
                                <div class="md:col-span-2 video-file-field" data-nivel-index="${nivelCounter}" data-subnivel-index="1" style="display: none;">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">video_file</span>
                                        Archivo de Video
                                    </label>

                                    <!-- Área de carga por fragmentos -->
                                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                                        <div class="text-center">
                                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                                                Arrastra tu video aquí o haz clic para seleccionar
                                            </p>
                                            <button type="button"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200"
                                                    onclick="initChunkUpload(${nivelCounter}, 1, null)">
                                                <span class="material-icons text-sm mr-1">upload</span>
                                                Seleccionar Video
                                            </button>
                                </div>

                                        <!-- Información del archivo seleccionado -->
                                        <div class="mt-3 file-info" style="display: none;">
                                            <div class="flex items-center justify-between bg-blue-50 dark:bg-blue-900/20 rounded-lg p-3 border border-blue-200 dark:border-blue-700">
                                                <div class="flex items-center space-x-2">
                                                    <span class="material-icons text-sm text-blue-600">video_file</span>
                                                    <div>
                                                        <div class="text-xs text-gray-700 dark:text-gray-300 file-name font-semibold"></div>
                                                        <div class="text-xs text-gray-500 dark:text-gray-400 file-size"></div>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="cancelChunkUpload()" class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Cancelar selección">
                                                    <span class="material-icons text-sm">close</span>
                                                </button>
                                            </div>

                                            <!-- Botón de confirmación para iniciar carga -->
                                            <div class="mt-3 text-center">
                                                <button type="button"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200 confirm-upload-btn"
                                                        onclick="startChunkUpload()">
                                                    <span class="material-icons text-sm mr-2">play_arrow</span>
                                                    Confirmar y Subir Video
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Barra de progreso -->
                                        <div class="mt-3 progress-container" style="display: none;">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-xs text-gray-600 dark:text-gray-400 font-semibold">Subiendo video...</span>
                                                <span class="text-xs text-gray-600 dark:text-gray-400 progress-percentage font-bold">0%</span>
                                            </div>
                                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                                <div class="bg-gradient-to-r from-green-500 to-blue-600 h-3 rounded-full progress-bar transition-all duration-300" style="width: 0%"></div>
                                            </div>
                                            <div class="mt-2 text-center">
                                                <span class="text-xs text-gray-500 dark:text-gray-400 progress-status">Preparando carga...</span>
                                            </div>
                                        </div>

                                        <!-- Mensaje de éxito -->
                                        <div class="mt-3 success-message" style="display: none;">
                                            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg p-3">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <span class="material-icons text-green-600 text-lg">check_circle</span>
                                                    <span class="text-sm text-green-700 dark:text-green-300 font-semibold">¡Video cargado exitosamente!</span>
                                            </div>
                                                <p class="text-xs text-green-600 dark:text-green-400 mt-1 text-center">
                                                    Ya puedes crear el curso
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mt-3 text-center">
                                            <div class="flex flex-wrap justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP4</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">AVI</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MOV</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">WMV</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">WebM</span>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                                <span class="font-semibold">Límites:</span> Hasta 10GB • Formatos de video estándar
                                            </p>
                                        </div>
                                        </div>

                                    <!-- Campos ocultos para el video -->
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][video_archivo_path]" value="">
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][video_archivo_nombre]" value="">
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][video_archivo_tipo]" value="">
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][video_archivo_tamaño]" value="">
                                </div>

                                <!-- Recurso del Subnivel -->
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                                        <span class="material-icons text-xs mr-1">attach_file</span>
                                        Archivos Recurso (Opcional)
                                    </label>

                                    <!-- Área de Subida de Nuevos Archivos -->
                                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                                        <div class="text-center">
                                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                                Arrastra archivos aquí o haz clic para seleccionar múltiples archivos
                                            </p>

                                            <!-- Botón para seleccionar archivos -->
                                            <button type="button"
                                                    onclick="selectMultipleFiles(${nivelCounter}, 1)"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200 mb-3">
                                                <span class="material-icons text-sm mr-2">add</span>
                                                Seleccionar Archivos
                                            </button>

                                            <!-- Contador de archivos seleccionados -->
                                            <div class="file-counter text-xs text-gray-500 dark:text-gray-400 mb-2" style="display: none;">
                                                <span class="material-icons text-xs mr-1">folder</span>
                                                <span class="counter-text">0 archivos seleccionados</span>
                                            </div>

                                            <!-- Input file oculto -->
                                        <input type="file"
                                                   id="fileInput_${nivelCounter}_1"
                                               name="niveles[${nivelCounter}][subniveles][1][recursos][]"
                                               class="hidden"
                                               multiple
                                               accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.rar,.txt,.jpg,.jpeg,.png,.gif,.mp4,.avi,.mov,.wmv,.webm,.mp3,.wav,.ogg"
                                                   onchange="handleFileSelection(this)">
                                        </div>

                                        <div class="mt-3 text-center">
                                            <div class="flex flex-wrap justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">PDF</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">DOC</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">PPT</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">XLS</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">ZIP</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">TXT</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">JPG</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP4</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP3</span>
                                        </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                                <span class="font-semibold">Límites:</span> Máximo 10 archivos • 50MB por archivo
                                    </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección de Cuestionario (Opcional) -->
                                <div class="md:col-span-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                                    <label class="flex items-center text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                                        <input type="checkbox"
                                               name="niveles[${nivelCounter}][subniveles][1][requiere_cuestionario]"
                                               value="1"
                                               class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                               onchange="toggleCuestionario(${nivelCounter}, 1, this)">
                                        <span class="material-icons text-xs mr-1">quiz</span>
                                        Requiere Cuestionario (Opcional - 10 preguntas de opción múltiple)
                                    </label>

                                    <div class="cuestionario-container mt-3" style="display: none;">
                                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-lg p-3 mb-3">
                                            <p class="text-xs text-yellow-800 dark:text-yellow-200">
                                                <span class="material-icons text-xs mr-1">info</span>
                                                El estudiante deberá aprobar este cuestionario para desbloquear el siguiente subnivel o nivel.
                                            </p>
                                        </div>
                                        <div id="preguntas_${nivelCounter}_1" class="space-y-4">
                                            <!-- Las 10 preguntas se generarán aquí -->
                                        </div>
                                        <button type="button"
                                                onclick="agregarPregunta(${nivelCounter}, 1)"
                                                class="mt-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors">
                                            <span class="material-icons text-xs mr-1">add</span>
                                            Agregar Pregunta
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', nivelHtml);
    // Inicializar primera pregunta si se habilita el cuestionario
    setTimeout(() => {
        const checkbox = document.querySelector(`input[name="niveles[${nivelCounter}][subniveles][1][requiere_cuestionario]"]`);
        if (checkbox && checkbox.checked) {
            toggleCuestionario(nivelCounter, 1, checkbox);
        }
    }, 100);
}

// Variable global para almacenar el nivel a eliminar
let nivelToDelete = null;

function removeNivel(nivelIndex) {
    const nivelItem = document.querySelector(`[data-nivel-index="${nivelIndex}"]`);
    if (nivelItem) {
        // Guardar referencia del nivel a eliminar
        nivelToDelete = nivelIndex;

        // Obtener el título del nivel si existe
        const nivelTitulo = nivelItem.querySelector('input[name*="[titulo]"]')?.value || `Nivel ${nivelIndex}`;

        // Actualizar el nombre en el modal
        const nombreElement = document.getElementById('deleteNivelNombre');
        if (nombreElement) {
            nombreElement.textContent = nivelTitulo || `Nivel ${nivelIndex}`;
        }

        // Mostrar modal de confirmación
        showDeleteNivelModal();
    }
}

// Función para mostrar el modal de eliminación
function showDeleteNivelModal() {
    const modal = document.getElementById('deleteNivelModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevenir scroll
    }
}

// Función para cerrar el modal de eliminación
function cancelDeleteNivel() {
    const modal = document.getElementById('deleteNivelModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Restaurar scroll
        nivelToDelete = null; // Limpiar referencia
    }
}

// Función para confirmar la eliminación
function confirmDeleteNivel() {
    if (nivelToDelete === null) return;

    const nivelItem = document.querySelector(`[data-nivel-index="${nivelToDelete}"]`);
    if (nivelItem) {
        // Cerrar modal
        cancelDeleteNivel();

        // Agregar animación de eliminación
        nivelItem.style.transition = 'all 0.3s ease-out';
        nivelItem.style.transform = 'scale(0.8)';
        nivelItem.style.opacity = '0';

        // Eliminar después de la animación
        setTimeout(() => {
            nivelItem.remove();

            // Mostrar mensaje de éxito
            showSuccessMessage('Nivel eliminado exitosamente');

            // Limpiar referencia
            nivelToDelete = null;
        }, 300);
    }
}

// Cerrar modal al hacer clic fuera de él
document.addEventListener('DOMContentLoaded', function() {
    const deleteModal = document.getElementById('deleteNivelModal');
    if (deleteModal) {
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                cancelDeleteNivel();
            }
        });

        // Cerrar con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !deleteModal.classList.contains('hidden')) {
                cancelDeleteNivel();
            }
        });
    }
});

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
                <!-- Numeración Personalizada -->
                <div class="md:col-span-2">
                    <label class="flex items-center text-xs text-gray-600 dark:text-gray-400 mb-2">
                        <input type="checkbox"
                               name="niveles[${nivelIndex}][subniveles][${nextIndex}][numeracion_personalizada]"
                               value="1"
                               class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                               onchange="toggleCustomNumbering(this)">
                        <span class="material-icons text-xs mr-1">edit</span>
                        Numeración personalizada (opcional)
                    </label>

                    <!-- Campo de número personalizado (oculto por defecto) -->
                    <div class="custom-number-field" style="display: none;">
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                            <span class="material-icons text-xs mr-1">numbers</span>
                            Número del Subnivel
                        </label>
                        <input type="number" name="niveles[${nivelIndex}][subniveles][${nextIndex}][numero_personalizado]"
                               value="${nextIndex}"
                               min="1"
                               max="999"
                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                               placeholder="Ej: 1, 5, 10, etc.">
                    </div>

                    <!-- Campo oculto para número automático -->
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][numero]" value="${nextIndex}">
                </div>

                <!-- Título del Subnivel -->
                <div>
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
                <div class="md:col-span-2 video-file-field" data-nivel-index="${nivelIndex}" data-subnivel-index="${nextIndex}" style="display: none;">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">video_file</span>
                        Archivo de Video
                    </label>

                    <!-- Área de carga por fragmentos -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                        <div class="text-center">
                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                                Arrastra tu video aquí o haz clic para seleccionar
                            </p>
                            <button type="button"
                                    class="inline-flex items-center px-3 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200"
                                    onclick="initChunkUpload(${nivelIndex}, ${nextIndex}, null)">
                                <span class="material-icons text-sm mr-1">upload</span>
                                Seleccionar Video
                            </button>
                        </div>

                        <!-- Información del archivo seleccionado -->
                        <div class="mt-3 file-info" style="display: none;">
                            <div class="flex items-center justify-between bg-blue-50 dark:bg-blue-900/20 rounded-lg p-3 border border-blue-200 dark:border-blue-700">
                                <div class="flex items-center space-x-2">
                                    <span class="material-icons text-sm text-blue-600">video_file</span>
                                    <div>
                                        <div class="text-xs text-gray-700 dark:text-gray-300 file-name font-semibold"></div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 file-size"></div>
                                    </div>
                                </div>
                                <button type="button" onclick="cancelChunkUpload()" class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Cancelar selección">
                                    <span class="material-icons text-sm">close</span>
                                </button>
                            </div>

                            <!-- Botón de confirmación para iniciar carga -->
                            <div class="mt-3 text-center">
                                <button type="button"
                                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200 confirm-upload-btn"
                                        onclick="startChunkUpload()">
                                    <span class="material-icons text-sm mr-2">play_arrow</span>
                                    Confirmar y Subir Video
                                </button>
                            </div>
                        </div>

                        <!-- Barra de progreso -->
                        <div class="mt-3 progress-container" style="display: none;">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-gray-600 dark:text-gray-400 font-semibold">Subiendo video...</span>
                                <span class="text-xs text-gray-600 dark:text-gray-400 progress-percentage font-bold">0%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-green-500 to-blue-600 h-3 rounded-full progress-bar transition-all duration-300" style="width: 0%"></div>
                            </div>
                            <div class="mt-2 text-center">
                                <span class="text-xs text-gray-500 dark:text-gray-400 progress-status">Preparando carga...</span>
                            </div>
                        </div>

                        <!-- Mensaje de éxito -->
                        <div class="mt-3 success-message" style="display: none;">
                            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg p-3">
                                <div class="flex items-center justify-center space-x-2">
                                    <span class="material-icons text-green-600 text-lg">check_circle</span>
                                    <span class="text-sm text-green-700 dark:text-green-300 font-semibold">¡Video cargado exitosamente!</span>
                                </div>
                                <p class="text-xs text-green-600 dark:text-green-400 mt-1 text-center">
                                    Ya puedes crear el curso
                                </p>
                            </div>
                        </div>

                        <div class="mt-3 text-center">
                            <div class="flex flex-wrap justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP4</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">AVI</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MOV</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">WMV</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">WebM</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                <span class="font-semibold">Límites:</span> Hasta 10GB • Formatos de video estándar
                            </p>
                        </div>
                    </div>

                    <!-- Campos ocultos para el video -->
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo_path]" value="">
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo_nombre]" value="">
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo_tipo]" value="">
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo_tamaño]" value="">
                </div>

                <!-- Recurso del Subnivel -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                        <span class="material-icons text-xs mr-1">attach_file</span>
                        Archivos Recurso (Opcional)
                    </label>

                    <!-- Área de Subida de Nuevos Archivos -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                        <div class="text-center">
                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                Arrastra archivos aquí o haz clic para seleccionar múltiples archivos
                            </p>

                            <!-- Botón para seleccionar archivos -->
                            <button type="button"
                                    onclick="selectMultipleFiles(${nivelIndex}, ${nextIndex})"
                                    class="inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200 mb-3">
                                <span class="material-icons text-sm mr-2">add</span>
                                Seleccionar Archivos
                            </button>

                            <!-- Contador de archivos seleccionados -->
                            <div class="file-counter text-xs text-gray-500 dark:text-gray-400 mb-2" style="display: none;">
                                <span class="material-icons text-xs mr-1">folder</span>
                                <span class="counter-text">0 archivos seleccionados</span>
                            </div>

                            <!-- Input file oculto -->
                        <input type="file"
                                   id="fileInput_${nivelIndex}_${nextIndex}"
                               name="niveles[${nivelIndex}][subniveles][${nextIndex}][recursos][]"
                               class="hidden"
                               multiple
                               accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.rar,.txt,.jpg,.jpeg,.png,.gif,.mp4,.avi,.mov,.wmv,.webm,.mp3,.wav,.ogg"
                                   onchange="handleFileSelection(this)">
                        </div>

                        <div class="mt-3 text-center">
                            <div class="flex flex-wrap justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">PDF</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">DOC</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">PPT</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">XLS</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">ZIP</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">TXT</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">JPG</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP4</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP3</span>
                        </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                <span class="font-semibold">Límites:</span> Máximo 10 archivos • 50MB por archivo
                    </p>
                        </div>
                    </div>
                </div>

                <!-- Sección de Cuestionario (Opcional) -->
                <div class="md:col-span-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                    <label class="flex items-center text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                        <input type="checkbox"
                               name="niveles[${nivelIndex}][subniveles][${nextIndex}][requiere_cuestionario]"
                               value="1"
                               class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                               onchange="toggleCuestionario(${nivelIndex}, ${nextIndex}, this)">
                        <span class="material-icons text-xs mr-1">quiz</span>
                        Requiere Cuestionario (Opcional - 10 preguntas de opción múltiple)
                    </label>

                    <div class="cuestionario-container mt-3" style="display: none;">
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-lg p-3 mb-3">
                            <p class="text-xs text-yellow-800 dark:text-yellow-200">
                                <span class="material-icons text-xs mr-1">info</span>
                                El estudiante deberá aprobar este cuestionario para desbloquear el siguiente subnivel o nivel.
                            </p>
                        </div>
                        <div id="preguntas_${nivelIndex}_${nextIndex}" class="space-y-4">
                            <!-- Las 10 preguntas se generarán aquí -->
                        </div>
                        <button type="button"
                                onclick="agregarPregunta(${nivelIndex}, ${nextIndex})"
                                class="mt-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors">
                            <span class="material-icons text-xs mr-1">add</span>
                            Agregar Pregunta
                        </button>
                    </div>
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
        showErrorMessage('Debe haber al menos un subnivel por nivel');
        return;
    }

    // Confirmar eliminación
    if (confirm('¿Estás seguro de que quieres eliminar este subnivel? Esta acción no se puede deshacer.')) {
        // Obtener el elemento del subnivel
        const subnivelElement = button.closest('.subnivel-item');

        // Agregar animación de eliminación
        subnivelElement.style.transition = 'all 0.3s ease-out';
        subnivelElement.style.transform = 'scale(0.8)';
        subnivelElement.style.opacity = '0';

        // Eliminar después de la animación
        setTimeout(() => {
            subnivelElement.remove();

    // Renumerar los subniveles restantes
    renumberSubniveles(nivelIndex);

            // Mostrar mensaje de éxito
            showSuccessMessage('Subnivel eliminado exitosamente');
        }, 300);
    }
}

function renumberSubniveles(nivelIndex) {
    const container = document.getElementById(`subniveles_${nivelIndex}`);
    const subniveles = container.querySelectorAll('.subnivel-item');

    subniveles.forEach((subnivel, index) => {
        const newIndex = index + 1;

        // Actualizar el número visual
        const numberSpan = subnivel.querySelector('.w-6.h-6');
        if (numberSpan) {
        numberSpan.textContent = newIndex;
        }

        // Actualizar el texto del título
        const titleSpan = subnivel.querySelector('.text-sm.font-semibold');
        if (titleSpan) {
        titleSpan.textContent = `Subnivel ${newIndex}`;
        }

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

// Mostrar mensaje de éxito
function showSuccessMessage(message) {
    // Crear toast de éxito
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Mostrar mensaje de error
function showErrorMessage(message) {
    // Crear toast de error
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Variables globales para chunk upload
let currentResumable = null;
let currentNivel = null;
let currentSubnivel = null;
let currentCursoId = null;
let selectedFile = null;
const subnivelFileStores = {}; // key: `${nivel}_${subnivel}` -> DataTransfer

// Función para seleccionar múltiples archivos
function selectMultipleFiles(nivelIndex, subnivelIndex) {
    const fileInput = document.getElementById(`fileInput_${nivelIndex}_${subnivelIndex}`);
    if (fileInput) {
        fileInput.click();
    }
}

// Función para manejar la selección de archivos (mantiene archivos existentes)
function handleFileSelection(input) {
    const files = Array.from(input.files);
    if (files.length === 0) return;

    const container = input.closest('.border-dashed');
    const wrapper = input.closest('[data-subnivel-index]');
    const nivelIndex = wrapper ? wrapper.getAttribute('data-nivel-index') || wrapper.closest('[data-nivel-index]')?.getAttribute('data-nivel-index') : null;
    const subnivelIndex = wrapper ? wrapper.getAttribute('data-subnivel-index') : null;
    const storeKey = `${nivelIndex}_${subnivelIndex}`;

    // Crear/obtener DataTransfer persistente por subnivel
    if (!subnivelFileStores[storeKey]) {
        subnivelFileStores[storeKey] = new DataTransfer();
    }
    const dt = subnivelFileStores[storeKey];

    // Agregar nuevos archivos al store (evitar duplicados por nombre+size)
    const existingSignature = new Set(Array.from(dt.files).map(f => `${f.name}:${f.size}`));
    files.forEach(file => {
        const sig = `${file.name}:${file.size}`;
        if (!existingSignature.has(sig)) {
            dt.items.add(file);
            existingSignature.add(sig);
        }
    });

    // Reflejar en el input real para que el submit incluya todos
    input.files = dt.files;

    // Renderizar preview desde el store
    renderFilesFromStore(container, dt.files);
}

function renderFilesFromStore(container, fileList) {
    let previewContainer = container.querySelector('.file-preview');
    if (!previewContainer) {
        previewContainer = document.createElement('div');
        previewContainer.className = 'file-preview mt-3';
        container.appendChild(previewContainer);
    }
    // Render completo desde el store
    previewContainer.innerHTML = '';
    Array.from(fileList).forEach((file, idx) => {
        const fileItem = document.createElement('div');
        fileItem.className = 'flex items-center justify-between bg-blue-50 dark:bg-blue-900/20 rounded-lg p-2 mb-2 border border-blue-200 dark:border-blue-700';
        const fileIcon = getFileIcon(file.type);
        const fileSize = formatFileSize(file.size);
        fileItem.innerHTML = `
            <div class="flex items-center space-x-2">
                <span class="material-icons text-sm text-blue-600">${fileIcon}</span>
                <span class="text-xs text-gray-700 dark:text-gray-300 truncate" title="${file.name}">${file.name}</span>
                <span class="text-xs text-gray-500 dark:text-gray-400">${fileSize}</span>
            </div>
            <button type="button" onclick="removeSelectedFile(this, ${idx})" class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Eliminar archivo">
                <span class="material-icons text-sm">close</span>
            </button>
        `;
        previewContainer.appendChild(fileItem);
    });
    updateFileCounter(container);
}

// Función para actualizar el contador de archivos
function updateFileCounter(container) {
    const previewContainer = container.querySelector('.file-preview');
    const counterElement = container.querySelector('.file-counter');
    const counterText = container.querySelector('.counter-text');

    if (!previewContainer || !counterElement || !counterText) return;

    const fileItems = previewContainer.querySelectorAll('.bg-blue-50');
    const count = fileItems.length;

    if (count > 0) {
        counterElement.style.display = 'block';
        counterText.textContent = `${count} archivo${count > 1 ? 's' : ''} seleccionado${count > 1 ? 's' : ''}`;
    } else {
        counterElement.style.display = 'none';
    }
}

function getFileIcon(mimeType) {
    if (mimeType.includes('pdf')) return 'picture_as_pdf';
    if (mimeType.includes('word') || mimeType.includes('document')) return 'description';
    if (mimeType.includes('powerpoint') || mimeType.includes('presentation')) return 'slideshow';
    if (mimeType.includes('excel') || mimeType.includes('spreadsheet')) return 'table_chart';
    if (mimeType.includes('zip') || mimeType.includes('rar')) return 'archive';
    if (mimeType.includes('text')) return 'text_snippet';
    if (mimeType.includes('image')) return 'image';
    if (mimeType.includes('video')) return 'video_file';
    if (mimeType.includes('audio')) return 'audio_file';
    return 'attach_file';
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

function removeSelectedFile(button, index) {
    if (confirm('¿Estás seguro de que quieres eliminar este archivo de la selección?')) {
        const fileItem = button.closest('.bg-blue-50');

        // Agregar animación de eliminación
        fileItem.style.transition = 'all 0.3s ease-out';
        fileItem.style.transform = 'translateX(100%)';
        fileItem.style.opacity = '0';

        // Eliminar después de la animación
        setTimeout(() => {
            fileItem.remove();

            // Actualizar el store e input
            updateFileInputAfterRemoval(button, index);

            // Actualizar contador
            const container = button.closest('.border-dashed');
            updateFileCounter(container);

            // Mostrar mensaje de éxito
            showSuccessMessage('Archivo eliminado de la selección');
        }, 300);
    }
}

// Función para actualizar el input después de eliminar un archivo
function updateFileInputAfterRemoval(button, index) {
    const container = button.closest('.border-dashed');
    const input = container.querySelector('input[type="file"]');
    const wrapper = input.closest('[data-subnivel-index]');
    const nivelIndex = wrapper ? wrapper.getAttribute('data-nivel-index') || wrapper.closest('[data-nivel-index]')?.getAttribute('data-nivel-index') : null;
    const subnivelIndex = wrapper ? wrapper.getAttribute('data-subnivel-index') : null;
    const storeKey = `${nivelIndex}_${subnivelIndex}`;
    if (!input || !subnivelFileStores[storeKey]) return;

    const dt = subnivelFileStores[storeKey];
    // Reconstruir DataTransfer sin el índice eliminado
    const newDT = new DataTransfer();
    Array.from(dt.files).forEach((file, i) => {
        if (i !== index) newDT.items.add(file);
    });
    subnivelFileStores[storeKey] = newDT;
    input.files = newDT.files;
    // Re-render desde store
    renderFilesFromStore(container, newDT.files);
}

// Inicializar chunk upload para un subnivel específico
function initChunkUpload(nivelNumero, subnivelNumero, cursoId) {
    currentNivel = nivelNumero;
    currentSubnivel = subnivelNumero;
    currentCursoId = cursoId;

    // Crear input file oculto
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'video/*';
    fileInput.style.display = 'none';

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validar tamaño del archivo (máximo 10GB)
            const maxSize = 10 * 1024 * 1024 * 1024; // 10GB
            if (file.size > maxSize) {
                showErrorMessage('El archivo es demasiado grande. Máximo permitido: 10GB');
                return;
            }

            // Guardar referencia del archivo
            selectedFile = file;

            // Mostrar información del archivo y botón de confirmación
            showFileInfo(file);
        }
    });

    // Agregar al DOM y hacer clic
    document.body.appendChild(fileInput);
    fileInput.click();
    document.body.removeChild(fileInput);
}

// Iniciar la carga por fragmentos (llamada desde el botón de confirmación)
function startChunkUpload() {
    // Verificar que hay un archivo seleccionado
    if (!selectedFile) {
        showErrorMessage('No hay archivo seleccionado');
        return;
    }

    // Validar tamaño del archivo (máximo 10GB)
    const maxSize = 10 * 1024 * 1024 * 1024; // 10GB
    if (selectedFile.size > maxSize) {
        showErrorMessage('El archivo es demasiado grande. Máximo permitido: 10GB');
            return;
        }

    // Ocultar información del archivo y mostrar progreso
    hideFileInfo();
    showProgress();

    // Configurar Resumable.js
    currentResumable = new Resumable({
        target: '{{ route("creador.chunk-upload") }}',
        query: {
            _token: '{{ csrf_token() }}',
            curso_id: currentCursoId,
            nivel_numero: currentNivel,
            subnivel_numero: currentSubnivel
        },
        fileType: ['mp4', 'avi', 'mov', 'wmv', 'webm'],
        chunkSize: 10 * 1024 * 1024, // 10MB por fragmento
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    // Eventos de Resumable.js
    currentResumable.on('fileAdded', function(file) {
        showProgress();
        currentResumable.upload();
    });

    currentResumable.on('fileProgress', function(file) {
        updateProgress(Math.floor(file.progress() * 100));
    });

    currentResumable.on('fileSuccess', function(file, response) {
        console.log('fileSuccess triggered');
        console.log('Response:', response);
        try {
            const data = JSON.parse(response);
            console.log('Parsed data:', data);
            if (data.success) {
                handleUploadSuccess(data);
            } else {
                handleUploadError(data.error || 'Error desconocido');
            }
        } catch (e) {
            console.error('Error parsing response:', e);
            console.error('Raw response:', response);
            handleUploadError('Error al procesar la respuesta del servidor');
        }
    });

    currentResumable.on('fileError', function(file, response) {
        console.error('fileError triggered');
        console.error('Error response:', response);
        handleUploadError('Error en la carga del archivo: ' + response);
    });

    // Agregar archivo
    currentResumable.addFile(selectedFile);
}

// Mostrar información del archivo seleccionado
function showFileInfo(file) {
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .file-info`);
    if (container) {
        container.querySelector('.file-name').textContent = file.name;
        container.querySelector('.file-size').textContent = formatFileSize(file.size);
        container.style.display = 'block';
    }
}

// Ocultar información del archivo
function hideFileInfo() {
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .file-info`);
    if (container) {
        container.style.display = 'none';
    }
}

// Mostrar barra de progreso
function showProgress() {
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .progress-container`);
    if (container) {
        container.style.display = 'block';
    }
}

// Actualizar progreso
function updateProgress(percentage) {
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .progress-container`);
    if (container) {
        const progressBar = container.querySelector('.progress-bar');
        const progressPercentage = container.querySelector('.progress-percentage');

        progressBar.style.width = `${percentage}%`;
        progressPercentage.textContent = `${percentage}%`;
    }
}

// Manejar éxito de carga
function handleUploadSuccess(data) {
    // Ocultar progreso
    const progressContainer = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .progress-container`);
    if (progressContainer) {
        progressContainer.style.display = 'none';
    }

    // Mostrar mensaje de éxito
    const successMessage = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .success-message`);
    if (successMessage) {
        successMessage.style.display = 'block';
    }

    // Actualizar campos ocultos
    const subnivelContainer = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"]`);
    if (subnivelContainer) {
        subnivelContainer.querySelector('input[name*="[video_archivo_path]"]').value = data.path;
        subnivelContainer.querySelector('input[name*="[video_archivo_nombre]"]').value = data.filename;
        subnivelContainer.querySelector('input[name*="[video_archivo_tipo]"]').value = data.mime_type;
        subnivelContainer.querySelector('input[name*="[video_archivo_tamaño]"]').value = data.size;
    }

    // Mostrar toast de éxito
    showSuccessMessage(`¡Video "${data.filename}" cargado exitosamente! Ya puedes crear el curso.`);

    // Limpiar variables
    currentResumable = null;
    currentNivel = null;
    currentSubnivel = null;
    currentCursoId = null;
    selectedFile = null;
}

// Manejar error de carga
function handleUploadError(error) {
    // Ocultar progreso
    const progressContainer = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .progress-container`);
    if (progressContainer) {
        progressContainer.style.display = 'none';
    }

    // Mostrar mensaje de error
    showErrorMessage(`Error en la carga: ${error}`);

    // Limpiar variables
    currentResumable = null;
    currentNivel = null;
    currentSubnivel = null;
    currentCursoId = null;
    selectedFile = null;
}

// Cancelar carga
function cancelChunkUpload() {
    if (currentResumable) {
        currentResumable.cancel();
    }

    // Ocultar elementos
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"]`);
    if (container) {
        container.querySelector('.progress-container').style.display = 'none';
        container.querySelector('.file-info').style.display = 'none';
    }

    // Limpiar variables
    currentResumable = null;
    currentNivel = null;
    currentSubnivel = null;
    currentCursoId = null;
    selectedFile = null;
}

// Auto-generar slug basado en el título (solo si el campo slug está vacío)
document.addEventListener('DOMContentLoaded', function() {
    const tituloField = document.getElementById('titulo');
    const slugField = document.getElementById('slug');

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

    // Configurar actualización de números de subniveles
    setupSubnivelNumberUpdates();
});

// Función para configurar la actualización de números de subniveles
function setupSubnivelNumberUpdates() {
    // Delegar eventos para elementos dinámicos
    document.addEventListener('input', function(e) {
        if (e.target.name && e.target.name.includes('[numero_personalizado]') && e.target.type === 'number') {
            updateSubnivelVisualNumber(e.target);
        }
    });
}

// ===== FUNCIONES PARA CUESTIONARIOS =====

let preguntaCounter = {};

// Función para mostrar/ocultar el cuestionario
function toggleCuestionario(nivelIndex, subnivelIndex, checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const cuestionarioContainer = subnivelContainer.querySelector('.cuestionario-container');

    if (checkbox.checked) {
        cuestionarioContainer.style.display = 'block';
        // Agregar primera pregunta automáticamente
        const preguntasContainer = cuestionarioContainer.querySelector(`#preguntas_${nivelIndex}_${subnivelIndex}`);
        if (preguntasContainer && preguntasContainer.children.length === 0) {
            agregarPregunta(nivelIndex, subnivelIndex);
        }
    } else {
        cuestionarioContainer.style.display = 'none';
    }
}

// Función para agregar una pregunta al cuestionario
function agregarPregunta(nivelIndex, subnivelIndex) {
    const key = `${nivelIndex}_${subnivelIndex}`;
    if (!preguntaCounter[key]) {
        preguntaCounter[key] = 0;
    }
    preguntaCounter[key]++;

    const preguntaNumero = preguntaCounter[key];

    // Verificar que no exceda 10 preguntas
    if (preguntaNumero > 10) {
        alert('Máximo 10 preguntas por cuestionario');
        preguntaCounter[key]--;
        return;
    }

    const preguntasContainer = document.getElementById(`preguntas_${nivelIndex}_${subnivelIndex}`);
    if (!preguntasContainer) return;

    const preguntaHtml = `
        <div class="pregunta-item bg-white dark:bg-slate-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600" data-pregunta-numero="${preguntaNumero}">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-2">
                    <span class="w-6 h-6 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-full flex items-center justify-center text-xs font-bold">${preguntaNumero}</span>
                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Pregunta ${preguntaNumero}</span>
                </div>
                <button type="button" onclick="eliminarPregunta(${nivelIndex}, ${subnivelIndex}, ${preguntaNumero}, this)"
                        class="text-red-500 hover:text-red-700 transition-colors">
                    <span class="material-icons text-sm">delete</span>
                </button>
            </div>

            <div class="space-y-3">
                <!-- Texto de la pregunta -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">help</span>
                        Texto de la Pregunta *
                    </label>
                    <textarea name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][pregunta_texto]"
                              rows="2"
                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                              placeholder="¿Cuál es la pregunta?"
                              required></textarea>
                </div>

                <!-- Opciones de respuesta -->
                <div class="grid grid-cols-1 gap-2">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                            Opción 1 *
                        </label>
                        <input type="text"
                               name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][opcion_1]"
                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                               placeholder="Primera opción de respuesta"
                               required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                            Opción 2 *
                        </label>
                        <input type="text"
                               name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][opcion_2]"
                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                               placeholder="Segunda opción de respuesta"
                               required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                            Opción 3 *
                        </label>
                        <input type="text"
                               name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][opcion_3]"
                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                               placeholder="Tercera opción de respuesta"
                               required>
                    </div>
                </div>

                <!-- Respuesta correcta -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">check_circle</span>
                        Respuesta Correcta *
                    </label>
                    <select name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][respuesta_correcta]"
                            class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                            required>
                        <option value="">Selecciona la respuesta correcta</option>
                        <option value="1">Opción 1</option>
                        <option value="2">Opción 2</option>
                        <option value="3">Opción 3</option>
                    </select>
                </div>

                <!-- Campo oculto para número de pregunta -->
                <input type="hidden" name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][numero_pregunta]" value="${preguntaNumero}">
            </div>
        </div>
    `;

    preguntasContainer.insertAdjacentHTML('beforeend', preguntaHtml);
}

// Función para eliminar una pregunta
function eliminarPregunta(nivelIndex, subnivelIndex, preguntaNumero, button) {
    if (confirm('¿Estás seguro de que quieres eliminar esta pregunta?')) {
        const preguntaItem = button.closest('.pregunta-item');
        if (preguntaItem) {
            preguntaItem.style.transition = 'all 0.3s ease-out';
            preguntaItem.style.transform = 'scale(0.8)';
            preguntaItem.style.opacity = '0';

            setTimeout(() => {
                preguntaItem.remove();
                // Renumerar preguntas restantes
                renumerarPreguntas(nivelIndex, subnivelIndex);
            }, 300);
        }
    }
}

// Función para renumerar preguntas después de eliminar
function renumerarPreguntas(nivelIndex, subnivelIndex) {
    const preguntasContainer = document.getElementById(`preguntas_${nivelIndex}_${subnivelIndex}`);
    if (!preguntasContainer) return;

    const preguntas = preguntasContainer.querySelectorAll('.pregunta-item');
    preguntas.forEach((pregunta, index) => {
        const nuevoNumero = index + 1;

        // Actualizar número visual
        const numeroSpan = pregunta.querySelector('.w-6.h-6');
        if (numeroSpan) {
            numeroSpan.textContent = nuevoNumero;
        }

        const tituloSpan = pregunta.querySelector('.text-sm.font-semibold');
        if (tituloSpan) {
            tituloSpan.textContent = `Pregunta ${nuevoNumero}`;
        }

        // Actualizar nombres de campos
        const inputs = pregunta.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                // Extraer el número actual de pregunta
                const match = name.match(/\[preguntas\]\[(\d+)\]/);
                if (match) {
                    const numeroActual = match[1];
                    const nuevoName = name.replace(`[preguntas][${numeroActual}]`, `[preguntas][${nuevoNumero}]`);
                    input.setAttribute('name', nuevoName);
                }
            }
        });

        // Actualizar data attribute
        pregunta.setAttribute('data-pregunta-numero', nuevoNumero);
    });

    // Actualizar contador
    const key = `${nivelIndex}_${subnivelIndex}`;
    preguntaCounter[key] = preguntas.length;
}

// Función para alternar la numeración personalizada
function toggleCustomNumbering(checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const customNumberField = subnivelContainer.querySelector('.custom-number-field');
    const hiddenNumberField = subnivelContainer.querySelector('input[name*="[numero]"]');
    const customNumberInput = subnivelContainer.querySelector('input[name*="[numero_personalizado]"]');

    if (checkbox.checked) {
        // Mostrar campo de número personalizado
        customNumberField.style.display = 'block';

        // Usar el número personalizado
        if (customNumberInput) {
            const customNumber = customNumberInput.value || '1';
            hiddenNumberField.value = customNumber;
            updateSubnivelVisualNumber(customNumberInput);
        }
    } else {
        // Ocultar campo de número personalizado
        customNumberField.style.display = 'none';

        // Restaurar numeración automática
        const autoNumber = getAutoNumber(subnivelContainer);
        hiddenNumberField.value = autoNumber;

        // Actualizar visualmente
        const numberSpan = subnivelContainer.querySelector('.w-6.h-6');
        const titleSpan = subnivelContainer.querySelector('.text-sm.font-semibold');

        if (numberSpan) {
            numberSpan.textContent = autoNumber;
        }
        if (titleSpan) {
            titleSpan.textContent = `Subnivel ${autoNumber}`;
        }
    }
}

// Función para obtener el número automático del subnivel
function getAutoNumber(subnivelContainer) {
    const nivelContainer = subnivelContainer.closest('[data-nivel-index]');
    const nivelIndex = nivelContainer.getAttribute('data-nivel-index');
    const subnivelesContainer = document.getElementById(`subniveles_${nivelIndex}`);

    if (subnivelesContainer) {
        const subniveles = subnivelesContainer.querySelectorAll('.subnivel-item');
        return Array.from(subniveles).indexOf(subnivelContainer) + 1;
    }

    return 1;
}

// Función para actualizar el número visual del subnivel
function updateSubnivelVisualNumber(numberInput) {
    const subnivelContainer = numberInput.closest('.subnivel-item');
    if (!subnivelContainer) return;

    const newNumber = numberInput.value || '1';
    const hiddenNumberField = subnivelContainer.querySelector('input[name*="[numero]"]');

    // Actualizar el campo oculto
    if (hiddenNumberField) {
        hiddenNumberField.value = newNumber;
    }

    // Actualizar el número en el círculo visual
    const numberSpan = subnivelContainer.querySelector('.w-6.h-6');
    if (numberSpan) {
        numberSpan.textContent = newNumber;
    }

    // Actualizar el texto del título
    const titleSpan = subnivelContainer.querySelector('.text-sm.font-semibold');
    if (titleSpan) {
        titleSpan.textContent = `Subnivel ${newNumber}`;
    }
}
</script>
@endsection
