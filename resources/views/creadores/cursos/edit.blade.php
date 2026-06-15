@extends('layouts.app')

@section('title', 'Editar Curso - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-400/20 to-indigo-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-pink-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-purple-400/10 to-indigo-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-600/10 via-indigo-600/10 to-pink-600/10 dark:from-purple-400/5 dark:via-indigo-400/5 dark:to-pink-400/5"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
            <div class="text-center mb-16">
                <!-- Animated Icon -->
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-purple-500 via-indigo-600 to-pink-600 rounded-3xl mb-8 shadow-2xl shadow-purple-500/30 hover:shadow-purple-500/50 transition-all duration-500 hover:scale-110 hover:rotate-3 animate-bounce">
                    <span class="material-icons text-white text-4xl">edit</span>
                </div>

                <!-- Enhanced Title -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-white mb-4 sm:mb-6 leading-tight drop-shadow-2xl">
                    <span class="inline-block hover:scale-105 transition-transform duration-300">Editar</span>
                    <br>
                    <span class="inline-block hover:scale-105 transition-transform duration-300 delay-100">Curso</span>
                </h1>

                <!-- Enhanced Subtitle -->
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-white/90 max-w-2xl sm:max-w-3xl mx-auto leading-relaxed font-medium drop-shadow-lg px-4">
                    <span class="inline-block hover:text-white transition-colors duration-300">Actualiza tu contenido</span>
                    <br>
                    <span class="inline-block hover:text-white transition-colors duration-300 delay-100">y mejora la experiencia de aprendizaje</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-2xl p-6 sm:p-8 lg:p-12">
            <form id="editForm" action="{{ route('creador.cursos.update', $curso->id) }}" method="POST" enctype="multipart/form-data" onsubmit="submitEditForm(event)">
                @csrf
                @method('PUT')

                <!-- Sección de Información Básica -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
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
                                   value="{{ old('titulo', $curso->titulo) }}"
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
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $curso->categoria_id) == $categoria->id ? 'selected' : '' }}>
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
                                   value="{{ old('duracion_horas', $curso->duracion_horas) }}"
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
                                   value="{{ old('precio', $curso->precio) }}"
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
                                <option value="principiante" {{ old('nivel_dificultad', $curso->nivel_dificultad) === 'principiante' ? 'selected' : '' }}>Principiante</option>
                                <option value="intermedio" {{ old('nivel_dificultad', $curso->nivel_dificultad) === 'intermedio' ? 'selected' : '' }}>Intermedio</option>
                                <option value="avanzado" {{ old('nivel_dificultad', $curso->nivel_dificultad) === 'avanzado' ? 'selected' : '' }}>Avanzado</option>
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
                                   value="{{ old('cupo_maximo', $curso->cupo_maximo) }}"
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
                                   value="{{ old('fecha_inicio', $curso->fecha_inicio ? $curso->fecha_inicio->format('Y-m-d') : '') }}"
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
                                   value="{{ old('fecha_fin', $curso->fecha_fin ? $curso->fecha_fin->format('Y-m-d') : '') }}"
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
                                   value="{{ old('slug', $curso->slug) }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="Se genera automáticamente basado en el título">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Se genera automáticamente basado en el título. Puedes editarlo si lo deseas.</p>
                            @error('slug')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección de Descripción -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
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
                                      required>{{ old('descripcion', $curso->descripcion) }}</textarea>
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
                                      placeholder="Lista los objetivos específicos que los estudiantes alcanzarán...">{{ old('objetivos_aprendizaje', $curso->objetivos_aprendizaje) }}</textarea>
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
                                      placeholder="¿Qué conocimientos previos necesitan los estudiantes?">{{ old('requisitos_previos', $curso->requisitos_previos) }}</textarea>
                            @error('requisitos_previos')
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
                                      placeholder="Lista los objetivos específicos que los estudiantes alcanzarán...">{{ old('objetivos_aprendizaje', $curso->objetivos_aprendizaje) }}</textarea>
                            @error('objetivos_aprendizaje')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección de Multimedia -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
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

                            @if($curso->url_imagen)
                                <div class="mb-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Imagen actual:</p>
                                    <img src="{{ Storage::url($curso->url_imagen) }}" alt="Imagen actual del curso" class="w-full h-48 object-cover rounded-2xl border border-gray-200/60 dark:border-slate-600/60">
                                </div>
                            @endif

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
                                   value="{{ old('url_video', $curso->url_video) }}"
                                   class="w-full px-4 py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300"
                                   placeholder="https://www.youtube.com/watch?v=...">
                            @error('url_video')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Información del Creador -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
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
                                   value="{{ old('creador_nombre', $curso->creador_nombre ?? Auth::user()->name) }}"
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
                                   value="{{ old('creador_apellido', $curso->creador_apellido ?? Auth::user()->apellido_paterno) }}"
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
                                   value="{{ old('creador_profesion', $curso->creador_profesion) }}"
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
                                      placeholder="Cuéntanos sobre tu experiencia y especialidades">{{ old('creador_descripcion', $curso->creador_descripcion) }}</textarea>
                            @error('creador_descripcion')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección de Redes Sociales -->
                <div class="mb-10">
                    <div class="flex items-center justify-between mb-8">
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
                                           {{ old('facebook_usuario', $curso->facebook_usuario) ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('facebook', this)">
                                    <span class="material-icons text-blue-600 text-lg mr-2">facebook</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Facebook</span>
                                </label>
                                <input type="text"
                                       name="facebook_usuario"
                                       value="{{ old('facebook_usuario', $curso->facebook_usuario) }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario o usuario"
                                       style="{{ old('facebook_usuario', $curso->facebook_usuario) ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- Twitter -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_twitter"
                                           value="1"
                                           {{ old('twitter_usuario', $curso->twitter_usuario) ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-blue-400 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('twitter', this)">
                                    <span class="material-icons text-blue-400 text-lg mr-2">alternate_email</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Twitter</span>
                                </label>
                                <input type="text"
                                       name="twitter_usuario"
                                       value="{{ old('twitter_usuario', $curso->twitter_usuario) }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="{{ old('twitter_usuario', $curso->twitter_usuario) ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- LinkedIn -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_linkedin"
                                           value="1"
                                           {{ old('linkedin_usuario', $curso->linkedin_usuario) ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-blue-700 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('linkedin', this)">
                                    <span class="material-icons text-blue-700 text-lg mr-2">work</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">LinkedIn</span>
                                </label>
                                <input type="text"
                                       name="linkedin_usuario"
                                       value="{{ old('linkedin_usuario', $curso->linkedin_usuario) }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="usuario o in/usuario"
                                       style="{{ old('linkedin_usuario', $curso->linkedin_usuario) ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- Instagram -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_instagram"
                                           value="1"
                                           {{ old('instagram_usuario', $curso->instagram_usuario) ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-pink-600 focus:ring-pink-500"
                                           onchange="toggleRedSocialField('instagram', this)">
                                    <span class="material-icons text-pink-600 text-lg mr-2">photo_camera</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Instagram</span>
                                </label>
                                <input type="text"
                                       name="instagram_usuario"
                                       value="{{ old('instagram_usuario', $curso->instagram_usuario) }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="{{ old('instagram_usuario', $curso->instagram_usuario) ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- VK -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_vk"
                                           value="1"
                                           {{ old('vk_usuario', $curso->vk_usuario) ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-blue-800 focus:ring-blue-500"
                                           onchange="toggleRedSocialField('vk', this)">
                                    <span class="material-icons text-blue-800 text-lg mr-2">group</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">VK</span>
                                </label>
                                <input type="text"
                                       name="vk_usuario"
                                       value="{{ old('vk_usuario', $curso->vk_usuario) }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="usuario"
                                       style="{{ old('vk_usuario', $curso->vk_usuario) ? 'display: block;' : 'display: none;' }}">
                            </div>

                            <!-- TikTok -->
                            <div class="red-social-item">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox"
                                           name="habilitar_tiktok"
                                           value="1"
                                           {{ old('tiktok_usuario', $curso->tiktok_usuario) ? 'checked' : '' }}
                                           class="mr-3 rounded border-gray-300 text-gray-800 focus:ring-gray-500"
                                           onchange="toggleRedSocialField('tiktok', this)">
                                    <span class="material-icons text-gray-800 text-lg mr-2">music_note</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">TikTok</span>
                                </label>
                                <input type="text"
                                       name="tiktok_usuario"
                                       value="{{ old('tiktok_usuario', $curso->tiktok_usuario) }}"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                       placeholder="@usuario"
                                       style="{{ old('tiktok_usuario', $curso->tiktok_usuario) ? 'display: block;' : 'display: none;' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Niveles -->
                <div class="mb-10">
                    <div class="flex items-center justify-between mb-8">
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
                        @if($curso->niveles && $curso->niveles->count() > 0)
                            @foreach($curso->niveles as $nivelIndex => $nivel)
                                <div class="nivel-item bg-white dark:bg-slate-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 shadow-lg" data-nivel-index="{{ $nivel->numero }}" data-nivel-id="{{ $nivel->id }}">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">
                                                {{ $nivel->numero }}
                                            </div>
                                            <h5 class="text-lg font-semibold text-gray-900 dark:text-white">Nivel {{ $nivel->numero }}</h5>
                                        </div>
                                        <button type="button" onclick="removeNivel({{ $nivel->numero }})" class="text-red-500 hover:text-red-700 transition-colors p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20" title="Eliminar nivel completo">
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
                                            <input type="text" name="niveles[{{ $nivel->numero }}][titulo]"
                                                   value="{{ old('niveles.'.$nivel->numero.'.titulo', $nivel->titulo) }}"
                                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white"
                                                   placeholder="Ej: Fundamentos de Programación" required>
                                        </div>

                                        <!-- Descripción del Nivel -->
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                                <span class="material-icons text-sm mr-1">description</span>
                                                Descripción del Nivel
                                            </label>
                                            <textarea name="niveles[{{ $nivel->numero }}][descripcion]" rows="2"
                                                      class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white"
                                                      placeholder="Describe qué aprenderán en este nivel">{{ old('niveles.'.$nivel->numero.'.descripcion', $nivel->descripcion) }}</textarea>
                                        </div>

                                        <!-- Campo oculto para el número del nivel -->
                                        <input type="hidden" name="niveles[{{ $nivel->numero }}][numero]" value="{{ $nivel->numero }}">
                                        <!-- Campo oculto para el ID del nivel -->
                                        <input type="hidden" name="niveles[{{ $nivel->numero }}][id]" value="{{ $nivel->id }}">
                                    </div>

                                    <!-- Subniveles -->
                                    <div class="mt-4">
                                        <div class="flex items-center justify-between mb-3">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="material-icons text-sm mr-1">layers</span>
                                                Subniveles (máximo 10)
                                            </label>
                                            <button type="button" onclick="addSubnivel({{ $nivel->numero }})"
                                                    class="inline-flex items-center px-3 py-1 text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30">
                                                <span class="material-icons text-sm mr-1">add_circle</span>
                                                Agregar Subnivel
                                            </button>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                                            <div class="space-y-4" id="subniveles_{{ $nivel->numero }}">
                                                @if($nivel->subniveles && $nivel->subniveles->count() > 0)
                                                    @foreach($nivel->subniveles as $subIndex => $subnivel)
                                                        <div class="subnivel-item bg-white dark:bg-slate-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600" data-subnivel-index="{{ $subIndex }}" data-subnivel-id="{{ $subnivel->id }}">
                                                            <div class="flex items-center justify-between mb-3">
                                                                <div class="flex items-center space-x-2">
                                                                    <span class="w-6 h-6 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-xs font-bold">{{ $subnivel->numero }}</span>
                                                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Subnivel {{ $subnivel->numero }}</span>
                                                                </div>
                                                                <button type="button" onclick="removeSubnivel({{ $nivel->numero }}, this)"
                                                                        class="text-red-500 hover:text-red-700 transition-colors p-1 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 group-hover:opacity-100 opacity-70" title="Eliminar subnivel">
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
                                                                    <input type="text" name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][titulo]"
                                                                           value="{{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.titulo', $subnivel->titulo) }}"
                                                                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                                                                           placeholder="Ej: Variables básicas">
                                                                </div>

                                                                <!-- Descripción del Subnivel -->
                                                                <div class="md:col-span-2">
                                                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                                                        <span class="material-icons text-xs mr-1">description</span>
                                                                        Descripción
                                                                    </label>
                                                                    <textarea name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][descripcion]" rows="2"
                                                                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                                                                              placeholder="Describe qué aprenderán en este subnivel">{{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.descripcion', $subnivel->descripcion) }}</textarea>
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
                                                                                   name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][usar_iframe]"
                                                                                   value="1"
                                                                                   {{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.usar_iframe', $subnivel->usar_iframe) ? 'checked' : '' }}
                                                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                                                   onchange="toggleIframeField({{ $nivel->numero }}, {{ $subnivel->numero }}, this)">
                                                                            <span class="material-icons text-xs mr-1">code</span>
                                                                            Usar Iframe (HTML embebido)
                                                                        </label>

                                                                        <!-- Checkbox para usar URL de video -->
                                                                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                                                            <input type="checkbox"
                                                                                   name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][usar_url_video]"
                                                                                   value="1"
                                                                                   {{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.usar_url_video', $subnivel->usar_url_video) ? 'checked' : '' }}
                                                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                                                   onchange="toggleUrlVideoField({{ $nivel->numero }}, {{ $subnivel->numero }}, this)">
                                                                            <span class="material-icons text-xs mr-1">link</span>
                                                                            Usar URL de Video (YouTube, Vimeo, Odysee, etc.)
                                                                        </label>

                                                                        <!-- Checkbox para subir archivo de video -->
                                                                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                                                            <input type="checkbox"
                                                                                   name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][usar_video_archivo]"
                                                                                   value="1"
                                                                                   {{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.usar_video_archivo', $subnivel->usar_video_archivo) ? 'checked' : '' }}
                                                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                                                   onchange="toggleVideoFileField({{ $nivel->numero }}, {{ $subnivel->numero }}, this)">
                                                                            <span class="material-icons text-xs mr-1">video_file</span>
                                                                            Subir Archivo de Video
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <!-- Campo Iframe -->
                                                                <div class="md:col-span-2 iframe-field" style="{{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.usar_iframe', $subnivel->usar_iframe) ? 'display: block;' : 'display: none;' }}">
                                                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                                                        <span class="material-icons text-xs mr-1">code</span>
                                                                        Código Iframe HTML
                                                                    </label>
                                                                    <textarea name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][url_iframe]" rows="3"
                                                                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                                                                              placeholder="<iframe src='https://www.youtube.com/embed/VIDEO_ID' width='100%' height='300'></iframe>">{{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.url_iframe', $subnivel->url_iframe) }}</textarea>
                                                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pega aquí el código iframe completo</p>
                                                                </div>

                                                                <!-- Campo URL de Video -->
                                                                <div class="md:col-span-2 url-video-field" style="{{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.usar_url_video', $subnivel->usar_url_video) ? 'display: block;' : 'display: none;' }}">
                                                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                                                        <span class="material-icons text-xs mr-1">link</span>
                                                                        URL del Video
                                                                    </label>
                                                                    <input type="url" name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][url_video]"
                                                                           value="{{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.url_video', $subnivel->url_video) }}"
                                                                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                                                                           placeholder="https://www.youtube.com/watch?v=VIDEO_ID o https://vimeo.com/VIDEO_ID">
                                                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Soporta: YouTube, Vimeo, Odysee, Twitch, etc.</p>
                                                                </div>

                                                                <!-- Campo Archivo de Video -->
                                                                <div class="md:col-span-2 video-file-field" data-nivel-index="{{ $nivel->numero }}" data-subnivel-index="{{ $subnivel->numero }}" data-subnivel-id="{{ $subnivel->id }}" style="{{ old('niveles.'.$nivel->numero.'.subniveles.'.$subnivel->numero.'.usar_video_archivo', $subnivel->usar_video_archivo) ? 'display: block;' : 'display: none;' }}">
                                                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                                                        <span class="material-icons text-xs mr-1">video_file</span>
                                                                        Archivo de Video
                                                                    </label>

                                                                    @if($subnivel->video_archivo_path)
                                                                        <div class="mb-3">
                                                                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">Video actual:</p>
                                                                            <div class="flex items-center justify-between bg-green-50 dark:bg-green-900/20 rounded-lg p-2 border border-green-200 dark:border-green-700">
                                                                                <div class="flex items-center space-x-2">
                                                                                    <span class="material-icons text-sm text-green-600">video_file</span>
                                                                                    <span class="text-xs text-gray-700 dark:text-gray-300">{{ $subnivel->video_archivo_nombre }}</span>
                                                                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ number_format($subnivel->video_archivo_tamaño / 1024 / 1024, 1) }}MB</span>
                                                                                </div>
                                                                                <button type="button" onclick="removeExistingVideo({{ $nivel->numero }}, {{ $subnivel->numero }})" class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Eliminar video">
                                                                                    <span class="material-icons text-sm">close</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                    <!-- Área de carga por fragmentos -->
                                                                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                                                                        <div class="text-center">
                                                                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                                                                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                                                                                Arrastra tu video aquí o haz clic para seleccionar
                                                                            </p>
                                                                            <button type="button"
                                                                                    class="inline-flex items-center px-3 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200"
                                                                                    onclick="initChunkUpload({{ $nivel->numero }}, {{ $subnivel->numero }}, {{ $curso->id }})">
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
                                                                                    Ya puedes actualizar el curso
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
                                                                    <input type="hidden" name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][video_archivo_path]" value="{{ $subnivel->video_archivo_path }}">
                                                                    <input type="hidden" name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][video_archivo_nombre]" value="{{ $subnivel->video_archivo_nombre }}">
                                                                    <input type="hidden" name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][video_archivo_tipo]" value="{{ $subnivel->video_archivo_tipo }}">
                                                                    <input type="hidden" name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][video_archivo_tamaño]" value="{{ $subnivel->video_archivo_tamaño }}">
                                                                    <!-- Campo oculto para el ID del subnivel -->
                                                                    <input type="hidden" name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][id]" value="{{ $subnivel->id }}">
                                                                </div>

                                                                <!-- Recurso del Subnivel -->
                                                                <div class="md:col-span-2">
                                                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                                                                        <span class="material-icons text-xs mr-1">attach_file</span>
                                                                        Archivos Recurso (Opcional)
                                                                    </label>

                                                                    @php
                                                                        $recursosNombres = is_array($subnivel->recurso_nombre) ? $subnivel->recurso_nombre : json_decode($subnivel->recurso_nombre, true) ?? [];
                                                                        $tieneRecursos = !empty($recursosNombres) && count($recursosNombres) > 0;
                                                                    @endphp
                                                                    @if($tieneRecursos)
                                                                        <!-- Recursos Existentes -->
                                                                        <div class="mb-4">
                                                                            <div class="flex items-center justify-between mb-2">
                                                                                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 flex items-center">
                                                                                    <span class="material-icons text-xs mr-1 text-green-600">folder</span>
                                                                                    Recursos Actuales ({{ count($recursosNombres) }})
                                                                                </span>
                                                                                <span class="text-xs text-gray-500 dark:text-gray-400">Haz clic en ✕ para eliminar</span>
                                                                            </div>

                                                                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-lg p-3 border border-green-200/50 dark:border-green-700/50">
                                                                                @php
                                                                                    $recursosPaths = is_array($subnivel->recurso_path) ? $subnivel->recurso_path : json_decode($subnivel->recurso_path, true) ?? [];
                                                                                    $recursosTipos = is_array($subnivel->recurso_tipo) ? $subnivel->recurso_tipo : json_decode($subnivel->recurso_tipo, true) ?? [];
                                                                                @endphp

                                                                                <div class="space-y-2">
                                                                                    @foreach($recursosNombres as $index => $nombre)
                                                                                        @php
                                                                                            $tipo = $recursosTipos[$index] ?? 'file';
                                                                                            $icono = match($tipo) {
                                                                                                'pdf' => 'picture_as_pdf',
                                                                                                'doc', 'docx' => 'description',
                                                                                                'ppt', 'pptx' => 'slideshow',
                                                                                                'xls', 'xlsx' => 'table_chart',
                                                                                                'zip', 'rar' => 'archive',
                                                                                                'txt' => 'text_snippet',
                                                                                                'jpg', 'jpeg', 'png', 'gif' => 'image',
                                                                                                'mp4', 'avi', 'mov', 'wmv', 'webm' => 'video_file',
                                                                                                'mp3', 'wav', 'ogg' => 'audio_file',
                                                                                                default => 'attach_file'
                                                                                            };
                                                                                            $color = match($tipo) {
                                                                                                'pdf' => 'text-red-600',
                                                                                                'doc', 'docx' => 'text-blue-600',
                                                                                                'ppt', 'pptx' => 'text-orange-600',
                                                                                                'xls', 'xlsx' => 'text-green-600',
                                                                                                'zip', 'rar' => 'text-purple-600',
                                                                                                'txt' => 'text-gray-600',
                                                                                                'jpg', 'jpeg', 'png', 'gif' => 'text-pink-600',
                                                                                                'mp4', 'avi', 'mov', 'wmv', 'webm' => 'text-indigo-600',
                                                                                                'mp3', 'wav', 'ogg' => 'text-yellow-600',
                                                                                                default => 'text-gray-600'
                                                                                            };
                                                                                        @endphp

                                                                                        <div class="flex items-center justify-between bg-white dark:bg-slate-700 rounded-lg p-2 border border-gray-200 dark:border-gray-600 hover:border-red-300 dark:hover:border-red-600 transition-all duration-200 group">
                                                                                            <div class="flex items-center space-x-2 flex-1 min-w-0">
                                                                                                <span class="material-icons text-sm {{ $color }} flex-shrink-0">{{ $icono }}</span>
                                                                                                <span class="text-xs text-gray-700 dark:text-gray-300 truncate" title="{{ $nombre }}">
                                                                                                    {{ $nombre }}
                                                                                                </span>
                                                                                                <span class="text-xs text-gray-500 dark:text-gray-400 uppercase font-mono flex-shrink-0">
                                                                                                    {{ $tipo }}
                                                                                                </span>
                                                                                            </div>

                                                                                            <button type="button"
                                                                                                    onclick="removeExistingResource({{ $nivel->numero }}, {{ $subnivel->numero }}, {{ $index }})"
                                                                                                    class="ml-2 p-1 text-gray-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all duration-200 opacity-70 group-hover:opacity-100"
                                                                                                    title="Eliminar archivo">
                                                                                                <span class="material-icons text-sm">close</span>
                                                                                            </button>

                                                                                            <input type="hidden" name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][eliminar_recursos][]" value="{{ $index }}" style="display: none;">
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                    <!-- Área de Subida de Nuevos Archivos -->
                                                                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                                                                        <div class="text-center">
                                                                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                                                                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                                                                Arrastra archivos aquí o haz clic para seleccionar múltiples archivos
                                                                            </p>

                                                                            <!-- Botón para seleccionar archivos -->
                                                                            <button type="button"
                                                                                    onclick="selectMultipleFiles({{ $nivel->numero }}, {{ $subnivel->numero }})"
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
                                                                                   id="fileInput_{{ $nivel->numero }}_{{ $subnivel->numero }}"
                                                                                   name="niveles[{{ $nivel->numero }}][subniveles][{{ $subnivel->numero }}][recursos][]"
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
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
                    <button type="submit"
                            id="submitBtn"
                            class="flex-1 group relative px-8 py-4 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 text-white font-bold rounded-2xl hover:from-purple-500 hover:via-indigo-500 hover:to-pink-500 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/40 transform hover:-translate-y-1">
                        <!-- Animated Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 rounded-2xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <!-- Sparkle Effects -->
                        <div class="absolute -top-1 -right-1 w-2 h-2 bg-yellow-400 rounded-full animate-ping"></div>
                        <div class="absolute -bottom-1 -left-1 w-1 h-1 bg-cyan-400 rounded-full animate-ping delay-300"></div>

                        <span class="material-icons mr-3 relative z-10 text-xl group-hover:rotate-12 transition-transform duration-300">save</span>
                        <span class="relative z-10">Actualizar Curso</span>
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

<!-- Resumable.js para carga de archivos grandes -->
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script>
let nivelCounter = 0;

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

function submitEditForm(event) {
    event.preventDefault();

    const form = event.target;
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;

    // Deshabilitar botón y mostrar loading
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <div class="flex items-center justify-center">
            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white mr-3"></div>
            <span>Actualizando Curso...</span>
        </div>
    `;

    // Enviar formulario
    form.submit();
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
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                                        <span class="material-icons text-xs mr-1">attach_file</span>
                                        Archivos Recurso (Opcional)
                                    </label>

                                    <!-- Área de Subida de Nuevos Archivos -->
                                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                                        <div class="text-center">
                                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                                                Arrastra archivos aquí o haz clic para seleccionar
                                            </p>
                                            <input type="file" name="niveles[${nivelCounter}][subniveles][1][recursos][]"
                                                   class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                                   multiple
                                                   accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.rar,.txt,.jpg,.jpeg,.png,.gif,.mp4,.avi,.mov,.wmv,.webm,.mp3,.wav,.ogg">
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
        // Confirmar eliminación
        if (confirm('¿Estás seguro de que quieres eliminar este nivel completo? Esta acción eliminará todos los subniveles y contenido asociado. Esta acción no se puede deshacer.')) {
            // Obtener el ID del nivel desde el DOM
            const nivelId = nivelItem.getAttribute('data-nivel-id');

            if (nivelId) {
                // Agregar campo oculto para eliminar nivel
                addHiddenDeleteField('eliminar_niveles', nivelId);
            }

            // Agregar animación de eliminación
            nivelItem.style.transition = 'all 0.3s ease-out';
            nivelItem.style.transform = 'scale(0.8)';
            nivelItem.style.opacity = '0';

            // Eliminar después de la animación
            setTimeout(() => {
                nivelItem.remove();

                // Mostrar mensaje de éxito
                showSuccessMessage('Nivel eliminado exitosamente');
            }, 300);
        }
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
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                        <span class="material-icons text-xs mr-1">attach_file</span>
                        Archivos Recurso (Opcional)
                    </label>

                    <!-- Área de Subida de Nuevos Archivos -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                        <div class="text-center">
                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                                Arrastra archivos aquí o haz clic para seleccionar
                            </p>
                            <input type="file" name="niveles[${nivelIndex}][subniveles][${nextIndex}][recursos][]"
                                   class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                   multiple
                                   accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.rar,.txt,.jpg,.jpeg,.png,.gif,.mp4,.avi,.mov,.wmv,.webm,.mp3,.wav,.ogg">
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

        // Obtener el ID del subnivel desde el DOM
        const subnivelId = subnivelElement.getAttribute('data-subnivel-id');

        if (subnivelId) {
            // Agregar campo oculto para eliminar subnivel
            addHiddenDeleteField('eliminar_subniveles', subnivelId);
        }

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

function removeExistingResource(nivelIndex, subnivelIndex, resourceIndex) {
    if (confirm('¿Estás seguro de que quieres eliminar este archivo?')) {
        // Buscar el elemento del recurso
        const container = document.querySelector(`[data-nivel-index="${nivelIndex}"] [data-subnivel-index="${subnivelIndex}"]`);
        if (!container) return;

        const resourceElement = container.querySelector(`button[onclick*="removeExistingResource(${nivelIndex}, ${subnivelIndex}, ${resourceIndex})"]`).closest('.flex.items-center.justify-between');

        if (resourceElement) {
            // Buscar el campo oculto existente y hacerlo visible
            const hiddenInput = container.querySelector(`input[name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][eliminar_recursos][]"][value="${resourceIndex}"]`);
            if (hiddenInput) {
                hiddenInput.style.display = 'block';
            }

            // Agregar animación de eliminación
            resourceElement.style.transition = 'all 0.3s ease-out';
            resourceElement.style.transform = 'translateX(100%)';
            resourceElement.style.opacity = '0';

            // Eliminar después de la animación
            setTimeout(() => {
                resourceElement.style.display = 'none';

                // Actualizar contador de recursos
                updateResourceCounter(nivelIndex, subnivelIndex);

                // Mostrar contador de eliminaciones
                showDeletionCounter();
            }, 300);
        }
    }
}

function updateResourceCounter(nivelIndex, subnivelIndex) {
    const container = document.querySelector(`[data-nivel-index="${nivelIndex}"] [data-subnivel-index="${subnivelIndex}"]`);
    if (container) {
        // Contar recursos visibles (no ocultos)
        const visibleResources = container.querySelectorAll('.flex.items-center.justify-between:not([style*="display: none"])');
        const counterElement = container.querySelector('.text-xs.font-semibold.text-gray-700');

        if (counterElement && counterElement.textContent.includes('Recursos Actuales')) {
            const count = visibleResources.length;
            counterElement.textContent = `Recursos Actuales (${count})`;
        }
    }
}

// Funcionalidad de drag & drop para archivos
function setupDragAndDrop() {
    const dropZones = document.querySelectorAll('.border-dashed');

    dropZones.forEach(zone => {
        const fileInput = zone.querySelector('input[type="file"]');

        // Prevenir comportamiento por defecto
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            zone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        // Resaltar zona de drop
        ['dragenter', 'dragover'].forEach(eventName => {
            zone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            zone.addEventListener(eventName, unhighlight, false);
        });

        // Manejar archivos soltados
        zone.addEventListener('drop', handleDrop, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight(e) {
            zone.classList.add('border-indigo-500', 'bg-indigo-50', 'dark:bg-indigo-900/20');
            zone.classList.remove('border-gray-300', 'dark:border-gray-600');
        }

        function unhighlight(e) {
            zone.classList.remove('border-indigo-500', 'bg-indigo-50', 'dark:bg-indigo-900/20');
            zone.classList.add('border-gray-300', 'dark:border-gray-600');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (fileInput && files.length > 0) {
                fileInput.files = files;

                // Disparar evento change para mostrar archivos seleccionados
                const event = new Event('change', { bubbles: true });
                fileInput.dispatchEvent(event);
            }
        }
    });
}

// Configurar preview de archivos (solo para inputs visibles)
function setupFilePreview() {
    const fileInputs = document.querySelectorAll('input[type="file"][multiple]:not(.hidden)');

    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const files = Array.from(this.files);
            if (files.length > 0) {
                showSelectedFiles(this, files);
            }
        });
    });
}

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

// Función para obtener archivos ya seleccionados
function getExistingFiles(input) {
    const container = input.closest('.border-dashed');
    const previewContainer = container.querySelector('.file-preview');

    if (!previewContainer) {
        return [];
    }

    const existingFiles = [];
    const fileItems = previewContainer.querySelectorAll('.bg-blue-50');

    fileItems.forEach(item => {
        const fileName = item.querySelector('.text-xs.text-gray-700').textContent;
        const fileSize = item.querySelector('.text-xs.text-gray-500').textContent;

        // Crear un objeto file-like para mantener la información
        const fileInfo = {
            name: fileName,
            size: fileSize,
            existing: true
        };

        existingFiles.push(fileInfo);
    });

    return existingFiles;
}

// Función para actualizar el input con todos los archivos
function updateFileInput(input, allFiles) {
    // Crear un nuevo DataTransfer
    const dt = new DataTransfer();

    // Agregar solo los archivos reales (no los existentes)
    allFiles.forEach(file => {
        if (!file.existing && file instanceof File) {
            dt.items.add(file);
        }
    });

    // Actualizar el input
    input.files = dt.files;
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

        // Variables globales para chunk upload
        let currentResumable = null;
        let currentNivel = null;
        let currentSubnivel = null;
        let currentCursoId = null;
        let selectedFile = null;
        const subnivelFileStores = {}; // key: `${nivel}_${subnivel}` -> DataTransfer

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
    showSuccessMessage(`¡Video "${data.filename}" cargado exitosamente! Ya puedes actualizar el curso.`);

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

// Eliminar video existente
function removeExistingVideo(nivelNumero, subnivelNumero) {
    if (confirm('¿Estás seguro de que quieres eliminar este video? Esta acción no se puede deshacer.')) {
        const container = document.querySelector(`[data-nivel-index="${nivelNumero}"] [data-subnivel-index="${subnivelNumero}"]`);
        if (container) {
            // Obtener el elemento del video
            const videoInfo = container.querySelector('.bg-green-50');

            // Obtener el ID del subnivel desde el DOM
            const subnivelId = container.getAttribute('data-subnivel-id');

            if (subnivelId) {
                // Agregar campo oculto para eliminar video
                addHiddenDeleteField('eliminar_videos', subnivelId);
            }

            if (videoInfo) {
                // Agregar animación de eliminación
                videoInfo.style.transition = 'all 0.3s ease-out';
                videoInfo.style.transform = 'translateX(100%)';
                videoInfo.style.opacity = '0';

                // Eliminar después de la animación
                setTimeout(() => {
                    videoInfo.style.display = 'none';

                    // Limpiar campos ocultos
                    container.querySelector('input[name*="[video_archivo_path]"]').value = '';
                    container.querySelector('input[name*="[video_archivo_nombre]"]').value = '';
                    container.querySelector('input[name*="[video_archivo_tipo]"]').value = '';
                    container.querySelector('input[name*="[video_archivo_tamaño]"]').value = '';

                    // Mostrar mensaje de éxito
                    showSuccessMessage('Video eliminado exitosamente');

                    // Mostrar contador de eliminaciones
                    showDeletionCounter();
                }, 300);
            }
        }
    }
}

// Formatear tamaño de archivo
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Mostrar contador de elementos marcados para eliminación
function showDeletionCounter() {
    // Contar recursos marcados para eliminación
    const recursosEliminar = document.querySelectorAll('input[name*="eliminar_recursos"]:not([style*="display: none"])');
    const videosEliminar = document.querySelectorAll('input[name*="eliminar_videos"]:not([style*="display: none"])');
    const subnivelesEliminar = document.querySelectorAll('input[name*="eliminar_subniveles"]:not([style*="display: none"])');
    const nivelesEliminar = document.querySelectorAll('input[name*="eliminar_niveles"]:not([style*="display: none"])');

    const totalEliminar = recursosEliminar.length + videosEliminar.length + subnivelesEliminar.length + nivelesEliminar.length;

    // Buscar o crear el contador
    let counterElement = document.getElementById('deletionCounter');
    if (!counterElement) {
        counterElement = document.createElement('div');
        counterElement.id = 'deletionCounter';
        counterElement.className = 'fixed bottom-4 right-4 bg-orange-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 flex items-center space-x-2';
        document.body.appendChild(counterElement);
    }

    if (totalEliminar > 0) {
        counterElement.innerHTML = `
            <span class="material-icons text-sm">delete</span>
            <span class="text-sm font-semibold">${totalEliminar} elemento(s) marcado(s) para eliminación</span>
        `;
        counterElement.style.display = 'flex';

        // Auto-ocultar después de 5 segundos
        setTimeout(() => {
            if (counterElement) {
                counterElement.style.display = 'none';
            }
        }, 5000);
    } else {
        counterElement.style.display = 'none';
    }
}

// Agregar campo oculto para eliminación
function addHiddenDeleteField(fieldName, value) {
    // Verificar si ya existe un campo con este valor
    const existingField = document.querySelector(`input[name="${fieldName}[]"][value="${value}"]`);
    if (existingField) {
        return; // Ya existe, no agregar duplicado
    }

    // Crear nuevo campo oculto
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = `${fieldName}[]`;
    hiddenInput.value = value;

    // Agregar al formulario
    const form = document.getElementById('editForm');
    if (form) {
        form.appendChild(hiddenInput);
    }
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

// Restaurar elemento eliminado
function restoreDeletedElement(elementType, nivelIndex, subnivelIndex, resourceIndex = null) {
    if (elementType === 'resource') {
        const hiddenInput = document.querySelector(`input[name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][eliminar_recursos][]"][value="${resourceIndex}"]`);
        if (hiddenInput) {
            hiddenInput.classList.add('hidden');

            // Mostrar el elemento nuevamente
            const resourceElement = hiddenInput.closest('.flex.items-center.justify-between');
            if (resourceElement) {
                resourceElement.style.display = 'flex';
                resourceElement.style.transform = 'translateX(0)';
                resourceElement.style.opacity = '1';
            }

            showSuccessMessage('Archivo restaurado');
            showDeletionCounter();
        }
    } else if (elementType === 'video') {
        const container = document.querySelector(`[data-nivel-index="${nivelIndex}"] [data-subnivel-index="${subnivelIndex}"]`);
        if (container) {
            const videoInfo = container.querySelector('.bg-green-50');
            if (videoInfo) {
                videoInfo.style.display = 'flex';
                videoInfo.style.transform = 'translateX(0)';
                videoInfo.style.opacity = '1';

                showSuccessMessage('Video restaurado');
                showDeletionCounter();
            }
        }
    }
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

    // Configurar drag & drop y preview de archivos
    setupDragAndDrop();
    setupFilePreview();

    // Mostrar contador inicial
    showDeletionCounter();
});

// Funciones auxiliares para obtener índices
function getNivelIndex(input) {
    const name = input.getAttribute('name');
    const match = name.match(/niveles\[(\d+)\]/);
    return match ? match[1] : null;
}

function getSubnivelIndex(input) {
    const name = input.getAttribute('name');
    const match = name.match(/subniveles\[(\d+)\]/);
    return match ? match[1] : null;
}

function getNivelIndexFromVideo(videoElement) {
    const container = videoElement.closest('[data-nivel-index]');
    return container ? container.getAttribute('data-nivel-index') : null;
}

function getSubnivelIndexFromVideo(videoElement) {
    const container = videoElement.closest('[data-subnivel-index]');
    return container ? container.getAttribute('data-subnivel-index') : null;
}
</script>
@endsection
