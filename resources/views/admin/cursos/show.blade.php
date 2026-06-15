@extends('layouts.app')

@section('title', $curso->titulo . ' - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-pink-400/20 to-indigo-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-cyan-400/10 to-blue-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Compact Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-600/10 via-purple-600/10 to-pink-600/10 dark:from-blue-400/5 dark:via-purple-400/5 dark:to-pink-400/5 border-b border-gray-200/50 dark:border-slate-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center space-x-4">
                <!-- Compact Icon -->
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-r from-blue-500 via-purple-600 to-pink-600 rounded-xl shadow-lg">
                        <span class="material-icons text-white text-xl">school</span>
                    </div>
                </div>

                <!-- Title and Description -->
                <div class="flex-1 min-w-0">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white truncate">
                        {{ $curso->titulo }}
                </h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 line-clamp-2">
                        {{ $curso->descripcion }}
                    </p>
                    <!-- Typing welcome text -->
                    <div class="mt-2 text-sm md:text-base font-semibold text-gray-800 dark:text-gray-200 flex items-center space-x-2">
                        <span id="typingWelcome" class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600"></span>
                        <span id="typingCursor" class="w-2 h-5 bg-gradient-to-r from-blue-600 to-purple-600 inline-block animate-pulse rounded-sm"></span>
                    </div>
                </div>

                <!-- Course Info Badges -->
                <div class="flex-shrink-0 flex items-center space-x-3">
                    <!-- Progress Trophy Icon -->
                    <div class="relative w-12 h-12 hidden md:block">
                        <!-- Base ring -->
                        <div class="absolute inset-0 rounded-full border-2 border-gray-400/20 dark:border-slate-500/20"></div>
                        <!-- Animated progress ring -->
                        <div class="absolute inset-0 rounded-full border-2 border-transparent border-t-purple-400 border-r-blue-400 animate-spin"></div>
                        <!-- Inner circle with trophy -->
                        <div class="absolute inset-1 rounded-full bg-white/70 dark:bg-slate-900/70 backdrop-blur flex items-center justify-center shadow-md">
                            <span class="material-icons text-gray-700 dark:text-slate-200 text-lg">emoji_events</span>
                        </div>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {{ ucfirst($curso->nivel) }}
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                        ${{ number_format($curso->precio, 0) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <!-- Separación adicional entre hero y contenido -->
        <div class="py-8"></div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Enhanced Panel principal (70%) -->
            <div class="lg:col-span-2">
                <!-- Enhanced Video Player con Efectos Espectaculares -->
                <div class="relative bg-white/90 dark:bg-slate-800/90 backdrop-blur-2xl rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-2xl shadow-blue-500/20 mb-8 overflow-hidden animate__animated animate__fadeInLeft hover:shadow-blue-500/30 transition-all duration-700 hover:scale-[1.02] hover:-translate-y-2">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-purple-500/10 to-pink-500/10 dark:from-blue-400/5 dark:via-purple-400/5 dark:to-pink-400/5"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute inset-0 overflow-hidden pointer-events-none">
                        <div class="absolute top-4 left-4 w-2 h-2 bg-blue-400 rounded-full animate-pulse opacity-60"></div>
                        <div class="absolute top-8 right-8 w-1 h-1 bg-purple-400 rounded-full animate-ping opacity-40"></div>
                        <div class="absolute bottom-6 left-8 w-1.5 h-1.5 bg-pink-400 rounded-full animate-bounce opacity-50"></div>
                        <div class="absolute bottom-4 right-4 w-1 h-1 bg-cyan-400 rounded-full animate-pulse opacity-60"></div>
                    </div>

                    <!-- Header del Video Player con efectos -->
                    <div class="relative p-6 border-b border-gray-200/50 dark:border-slate-700/50 bg-gradient-to-r from-transparent via-white/5 to-transparent dark:via-slate-700/5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <!-- Icono animado -->
                                <div class="relative">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30 animate-pulse">
                                        <span class="material-icons text-white text-xl animate-bounce">play_circle</span>
                                    </div>
                                    <!-- Destello -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-purple-500 rounded-2xl blur-sm opacity-30 animate-ping"></div>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black text-gray-900 dark:text-white bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 dark:from-white dark:via-blue-100 dark:to-purple-100 bg-clip-text text-transparent animate-pulse" id="videoPlayerTitulo">Contenido del Curso</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 font-medium" id="videoPlayerDescripcion">Selecciona un subnivel para ver su contenido</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all duration-300 hover:scale-105 animate-pulse" id="videoPlayerBadge">
                                    <span class="material-icons text-sm mr-2 animate-spin">play_circle</span>
                                    Video
                                </span>
                                <button onclick="resetearVideoPlayer()" class="p-3 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-2xl transition-all duration-300 hover:scale-110 hover:rotate-180 hover:shadow-lg" title="Resetear Video Player">
                                    <span class="material-icons text-gray-500 dark:text-gray-400 text-lg">refresh</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido del Video Player con efectos espectaculares -->
                    <div class="relative aspect-video bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-3xl overflow-hidden group hover:shadow-2xl hover:shadow-blue-500/20 transition-all duration-700">
                        <!-- Efectos de borde animado -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 via-purple-500/20 to-pink-500/20 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

                        <!-- Partículas de fondo -->
                        <div class="absolute inset-0 overflow-hidden">
                            <div class="absolute top-1/4 left-1/4 w-3 h-3 bg-blue-400/30 rounded-full animate-ping"></div>
                            <div class="absolute top-3/4 right-1/4 w-2 h-2 bg-purple-400/40 rounded-full animate-pulse"></div>
                            <div class="absolute bottom-1/4 left-1/3 w-1 h-1 bg-pink-400/50 rounded-full animate-bounce"></div>
                        </div>

                        <div class="relative w-full h-full" id="videoPlayerContent">
                            <div class="flex flex-col items-center justify-center h-full text-center text-white">
                                <!-- Loader giratorio con efectos - Perfectamente centrado -->
                                <div class="relative mb-8 flex flex-col items-center">
                                    <!-- Loader principal que gira 360 grados -->
                                    <div class="w-24 h-24 relative flex items-center justify-center">
                                        <!-- Círculo exterior giratorio -->
                                        <div class="absolute inset-0 border-4 border-transparent border-t-blue-500 border-r-purple-500 border-b-pink-500 border-l-cyan-500 rounded-full animate-spin"></div>
                                        <!-- Círculo interior giratorio (sentido contrario) -->
                                        <div class="absolute inset-2 border-3 border-transparent border-t-purple-400 border-r-pink-400 border-b-cyan-400 border-l-blue-400 rounded-full animate-spin" style="animation-direction: reverse; animation-duration: 1.5s;"></div>
                                        <!-- Círculo central con gradiente -->
                                        <div class="absolute inset-4 bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 rounded-full flex items-center justify-center shadow-2xl shadow-blue-500/50">
                                            <span class="material-icons text-white text-2xl animate-pulse">play_circle</span>
                                        </div>
                                    </div>
                                    <!-- Anillos concéntricos de fondo -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full blur-lg opacity-20 animate-ping"></div>
                                    <div class="absolute inset-2 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full blur-md opacity-15 animate-pulse"></div>
                                </div>

                                <!-- Texto centrado -->
                                <div class="space-y-2">
                                    <p class="text-xl font-bold opacity-90 animate-pulse">Selecciona un subnivel para comenzar</p>
                                    <p class="text-sm opacity-70 animate-bounce">Haz click en un botón "Video" en el panel lateral</p>
                                </div>

                                <!-- Efectos de destello -->
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -skew-x-12 animate-pulse"></div>
                            </div>
                        </div>

                        <!-- Efectos de esquina -->
                        <div class="absolute top-0 left-0 w-8 h-8 bg-gradient-to-br from-blue-500 to-transparent rounded-br-3xl opacity-60"></div>
                        <div class="absolute top-0 right-0 w-8 h-8 bg-gradient-to-bl from-purple-500 to-transparent rounded-bl-3xl opacity-60"></div>
                        <div class="absolute bottom-0 left-0 w-8 h-8 bg-gradient-to-tr from-pink-500 to-transparent rounded-tr-3xl opacity-60"></div>
                        <div class="absolute bottom-0 right-0 w-8 h-8 bg-gradient-to-tl from-cyan-500 to-transparent rounded-tl-3xl opacity-60"></div>
                    </div>
                </div>

                <!-- Sección: Autor del Curso -->
                <div class="relative bg-white/90 dark:bg-slate-800/90 backdrop-blur-2xl rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-xl shadow-emerald-500/10 mb-8 overflow-hidden animate__animated animate__fadeInLeft">
                    <!-- Fondo sutil -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 via-teal-500/5 to-cyan-500/5"></div>
                    <div class="relative p-6">
                        <div class="flex items-start space-x-4">
                            <!-- Avatar con iniciales -->
                            @php
                                $iniNombre = isset($curso->creador_nombre) ? mb_substr($curso->creador_nombre,0,1,'UTF-8') : '';
                                $iniApellido = isset($curso->creador_apellido) ? mb_substr($curso->creador_apellido,0,1,'UTF-8') : '';
                                $iniciales = trim($iniNombre.$iniApellido) ?: 'SL';
                            @endphp
                            <div class="relative shrink-0 w-16 h-16 rounded-full bg-gradient-to-br from-emerald-500 to-cyan-600 text-white flex items-center justify-center text-xl font-bold shadow-lg">
                                {{ $iniciales }}
                                <div class="absolute -inset-[2px] rounded-full ring-2 ring-white/40 dark:ring-slate-900/40"></div>
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h3 class="text-lg md:text-xl font-bold text-gray-900 dark:text-white">
                                        {{ trim(($curso->creador_nombre ?? '') . ' ' . ($curso->creador_apellido ?? '')) ?: 'Autor del curso' }}
                                    </h3>
                                    @if(!empty($curso->creador_profesion))
                                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-900/60 dark:text-emerald-200">
                                            {{ $curso->creador_profesion }}
                                        </span>
                                    @endif
                                </div>

                                @if(!empty($curso->creador_descripcion))
                                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                                        {{ $curso->creador_descripcion }}
                                    </p>
                                @endif

                                <!-- Redes sociales -->
                                <div class="mt-4 flex flex-wrap items-center gap-2">
                                    @if(!empty($curso->facebook_usuario))
                                        <a href="https://facebook.com/{{ $curso->facebook_usuario }}" target="_blank" rel="noopener" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-600/10 text-blue-700 dark:text-blue-300 hover:bg-blue-600/20 transition">
                                            <span class="material-icons text-xs mr-1">public</span> Facebook
                                        </a>
                                    @endif
                                    @if(!empty($curso->twitter_usuario))
                                        <a href="https://twitter.com/{{ $curso->twitter_usuario }}" target="_blank" rel="noopener" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-sky-500/10 text-sky-700 dark:text-sky-300 hover:bg-sky-500/20 transition">
                                            <span class="material-icons text-xs mr-1">public</span> Twitter
                                        </a>
                                    @endif
                                    @if(!empty($curso->linkedin_usuario))
                                        <a href="https://www.linkedin.com/in/{{ $curso->linkedin_usuario }}" target="_blank" rel="noopener" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-600/10 text-indigo-700 dark:text-indigo-300 hover:bg-indigo-600/20 transition">
                                            <span class="material-icons text-xs mr-1">public</span> LinkedIn
                                        </a>
                                    @endif
                                    @if(!empty($curso->instagram_usuario))
                                        <a href="https://instagram.com/{{ $curso->instagram_usuario }}" target="_blank" rel="noopener" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-pink-600/10 text-pink-700 dark:text-pink-300 hover:bg-pink-600/20 transition">
                                            <span class="material-icons text-xs mr-1">public</span> Instagram
                                        </a>
                                    @endif
                                    @if(!empty($curso->vk_usuario))
                                        <a href="https://vk.com/{{ $curso->vk_usuario }}" target="_blank" rel="noopener" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-600/10 text-purple-700 dark:text-purple-300 hover:bg-purple-600/20 transition">
                                            <span class="material-icons text-xs mr-1">public</span> VK
                                        </a>
                                    @endif
                                    @if(!empty($curso->tiktok_usuario))
                                        <a href="https://www.tiktok.com/@{{ $curso->tiktok_usuario }}" target="_blank" rel="noopener" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-600/10 text-gray-800 dark:text-gray-200 hover:bg-gray-600/20 transition">
                                            <span class="material-icons text-xs mr-1">public</span> TikTok
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Course Information -->
                <div class="relative bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-2xl border border-gray-200/50 dark:border-slate-700/50 shadow-lg shadow-blue-500/5 overflow-hidden animate__animated animate__fadeInLeft">
                    <!-- Gradient background -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 via-emerald-500/5 to-teal-500/5"></div>

                    <div class="relative p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <span class="material-icons text-green-600 dark:text-green-400 mr-2">info</span>
                            Información del Curso
                        </h3>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Nivel:</span>
                                <span class="px-3 py-1 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-xs font-semibold rounded-full">
                                    {{ ucfirst($curso->nivel) }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Duración:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $curso->duracion_horas ?? 'No especificada' }} horas
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Precio:</span>
                                <span class="text-lg font-bold text-green-600 dark:text-green-400">
                                    ${{ number_format($curso->precio, 2) }}
                                </span>
                            </div>

                            @if($curso->cupo_maximo)
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Cupo:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $curso->cupo_maximo }} estudiantes
                                </span>
                            </div>
                            @endif

                            @if($curso->niveles && $curso->niveles->count() > 0)
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Niveles:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $curso->niveles->count() }} niveles
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Subniveles:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $curso->niveles->sum(function($nivel) { return $nivel->subniveles->count(); }) }} subniveles
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Panel lateral (30%) -->
            <div class="lg:col-span-1">
                <!-- Enhanced Pestañas del panel lateral -->
                <div class="relative bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-2xl border border-gray-200/50 dark:border-slate-700/50 shadow-lg shadow-blue-500/5 mb-6 overflow-hidden animate__animated animate__fadeInRight">
                    <!-- Gradient background -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-pink-500/5"></div>

                    <div class="relative flex border-b border-gray-200/50 dark:border-slate-700/50">
                        <button class="group relative flex-1 px-6 py-4 text-sm font-semibold text-blue-600 dark:text-blue-400 bg-blue-50/50 dark:bg-blue-900/20 border-b-2 border-blue-500 transition-all duration-300 hover:scale-105">
                            <span class="relative z-10 flex items-center justify-center space-x-2">
                                <span class="material-icons text-sm group-hover:rotate-12 transition-transform duration-300">playlist_play</span>
                                <span>Contenido del curso</span>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10"></div>
                        </button>
                        <button class="group relative flex-1 px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-white/50 dark:hover:bg-slate-700/50 transition-all duration-300 hover:scale-105">
                            <span class="relative z-10 flex items-center justify-center space-x-2">
                                <span class="material-icons text-sm group-hover:rotate-12 transition-transform duration-300">psychology</span>
                                <span>AI Assistant</span>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-pink-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                    </div>
                </div>

                <!-- Lista de contenido del curso -->
                <div class="space-y-2">
                    @if($curso->niveles && $curso->niveles->count() > 0)
                        @foreach($curso->niveles as $nivel)
                            <div class="relative bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-2xl border border-gray-200/50 dark:border-slate-700/50 shadow-lg shadow-blue-500/5 overflow-hidden mb-4">
                                <!-- Gradient background -->
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-pink-500/5"></div>

                                <div class="relative">
                                    <!-- Nivel Header (Clickable) -->
                                    <button onclick="toggleNivel({{ $nivel->numero }})" class="w-full p-4 border-b border-gray-200/50 dark:border-slate-700/50 hover:bg-gray-50/50 dark:hover:bg-slate-700/50 transition-all duration-200">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full text-white text-sm font-bold">
                                                    {{ $nivel->numero }}
                                                </div>
                                                <div class="text-left">
                                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">{{ $nivel->titulo }}</h4>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $nivel->descripcion }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $nivel->subniveles->count() }} subniveles</span>
                                                <span class="material-icons text-gray-400 transition-transform duration-200" id="icon-{{ $nivel->numero }}">expand_more</span>
                                            </div>
                                        </div>
                                    </button>

                                    <!-- Subniveles (Collapsible) -->
                                    <div class="hidden" id="subniveles-{{ $nivel->numero }}">
                                        @if($nivel->subniveles && $nivel->subniveles->count() > 0)
                                            <div class="p-4 space-y-2">
                                                @foreach($nivel->subniveles as $subnivel)
                                                    <div class="p-3 bg-gray-50/60 dark:bg-slate-700/60 rounded-xl hover:bg-gray-100/60 dark:hover:bg-slate-600/60 transition-all duration-200" data-subnivel-id="{{ $subnivel->id }}">
                                                        <div class="flex items-center justify-between mb-3">
                                                            <div class="inline-flex items-center px-2 py-1 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200">
                                                                <span class="material-icons text-[14px] mr-1">layers</span>
                                                                Subnivel {{ $subnivel->numero }}
                                                            </div>
                                                        </div>

                                                        @php
                                                            $tieneVideo = ($subnivel->usar_iframe && $subnivel->url_iframe)
                                                                || ($subnivel->usar_url_video && $subnivel->url_video)
                                                                || ($subnivel->usar_video_archivo && $subnivel->video_archivo_path);
                                                            $tipoContenido = $subnivel->usar_iframe ? 'iframe' : ($subnivel->usar_url_video ? 'url_video' : ($subnivel->usar_video_archivo ? 'video_archivo' : ''));
                                                            $contenidoValor = $subnivel->usar_iframe ? $subnivel->url_iframe : ($subnivel->usar_url_video ? $subnivel->url_video : ($subnivel->usar_video_archivo ? $subnivel->video_archivo_path : ''));
                                                        @endphp

                                                        <div class="grid grid-cols-12 gap-3">
                                                            <div class="col-span-12 sm:col-span-4">
                                                                @if($tieneVideo)
                                                                    <div class="relative w-full aspect-video rounded-lg overflow-hidden shadow-md cursor-pointer group hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200"
                                                                         title="Vista previa"
                                                                         onclick="mostrarVideo({{ $subnivel->id }}, '{{ addslashes($contenidoValor) }}', '{{ $tipoContenido }}')"
                                                                         data-tipo="{{ $tipoContenido }}"
                                                                         @if($subnivel->usar_url_video && $subnivel->url_video)
                                                                             data-url="{{ $subnivel->url_video }}"
                                                                         @endif
                                                                         @if($subnivel->usar_video_archivo && $subnivel->video_archivo_path)
                                                                             data-path="{{ $subnivel->video_archivo_path }}"
                                                                         @endif>
                                                                        <div class="absolute inset-0 mini-thumb bg-gradient-to-br from-gray-200 to-gray-300 dark:from-slate-700 dark:to-slate-600 bg-center bg-cover"></div>
                                                                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-colors duration-200"></div>
                                                                        <div class="absolute inset-0 flex items-center justify-center">
                                                                            <span class="material-icons text-white text-2xl drop-shadow">play_circle</span>
                                                                        </div>
                                                                        <!-- Duración (se rellena por JS si es posible) -->
                                                                        <div class="mini-duration absolute bottom-1 right-1 bg-black/70 text-white text-[10px] px-1.5 py-0.5 rounded hidden">00:00</div>
                                                                        <div class="pointer-events-none absolute -inset-px rounded-lg ring-1 ring-white/10 group-hover:ring-white/20 transition"></div>
                                                                    </div>
                                                                @else
                                                                    <div class="w-full aspect-video rounded-lg bg-gradient-to-br from-slate-200 to-slate-300 dark:from-slate-700 dark:to-slate-600 flex items-center justify-center text-[11px] text-slate-600 dark:text-slate-300">Sin video</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-8 flex flex-col justify-center">
                                                                <h5 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $subnivel->titulo }}</h5>
                                                                <p class="text-xs text-gray-600 dark:text-gray-400">{{ $subnivel->descripcion }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3 pt-3 border-t border-gray-200/60 dark:border-slate-600/60">
                                                            <div class="flex items-center flex-wrap gap-1">
                                                                @if($subnivel->usar_iframe && $subnivel->url_iframe)
                                                                    <button onclick="mostrarVideo({{ $subnivel->id }}, '{{ addslashes($subnivel->url_iframe) }}', 'iframe')" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 hover:bg-blue-200 dark:hover:bg-blue-800 transition-colors duration-200 cursor-pointer"><span class="material-icons text-xs mr-1">code</span>Iframe</button>
                                                                @endif
                                                                @if($subnivel->usar_url_video && $subnivel->url_video)
                                                                    <button onclick="mostrarVideo({{ $subnivel->id }}, '{{ addslashes($subnivel->url_video) }}', 'url_video')" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200 hover:bg-purple-200 dark:hover:bg-purple-800 transition-colors duration-200 cursor-pointer"><span class="material-icons text-xs mr-1">play_circle</span>Video</button>
                                                                @endif
                                                                @if($subnivel->usar_video_archivo && $subnivel->video_archivo_path)
                                                                    <button onclick="mostrarVideo({{ $subnivel->id }}, '{{ $subnivel->video_archivo_path }}', 'video_archivo')" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 hover:bg-red-200 dark:hover:bg-red-800 transition-colors duration-200 cursor-pointer"><span class="material-icons text-xs mr-1">video_file</span>Video File</button>
                                                                @endif
                                                                @if($subnivel->recurso_nombre)
                                                                    <button onclick="mostrarRecurso({{ $subnivel->id }}, '{{ $subnivel->recurso_nombre }}', '{{ $subnivel->recurso_path }}')" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 hover:bg-green-200 dark:hover:bg-green-800 transition-colors duration-200 cursor-pointer"><span class="material-icons text-xs mr-1">description</span>PDF</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="text-center py-12">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 rounded-2xl mb-4">
                            <span class="material-icons text-3xl text-gray-400">school</span>
                        </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Sin contenido disponible</h3>
                            <p class="text-gray-600 dark:text-gray-400">Este curso aún no tiene niveles configurados.</p>
                    </div>
                    @endif
                </div>

                <!-- Enhanced Course Information -->
                <div class="relative bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-2xl border border-gray-200/50 dark:border-slate-700/50 shadow-lg shadow-blue-500/5 overflow-hidden animate__animated animate__fadeInRight">
                    <!-- Gradient background -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 via-emerald-500/5 to-teal-500/5"></div>

                    <div class="relative p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <span class="material-icons text-green-600 dark:text-green-400 mr-2">info</span>
                            Información del Curso
                        </h3>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Nivel:</span>
                                <span class="px-3 py-1 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-xs font-semibold rounded-full">
                                    {{ ucfirst($curso->nivel) }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Duración:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $curso->duracion_horas ?? 'No especificada' }} horas
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Precio:</span>
                                <span class="text-lg font-bold text-green-600 dark:text-green-400">
                                    ${{ number_format($curso->precio, 2) }}
                                </span>
                            </div>

                            @if($curso->cupo_maximo)
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Cupo:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $curso->cupo_maximo }} estudiantes
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para mostrar contenido -->
<div id="contenidoModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <!-- Header del Modal -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-slate-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white" id="modalTitulo">Contenido del Subnivel</h3>
                <button onclick="cerrarModal()" class="p-2 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-full transition-colors duration-200">
                    <span class="material-icons text-gray-500 dark:text-gray-400">close</span>
                </button>
            </div>

            <!-- Contenido del Modal -->
            <div class="p-6 overflow-y-auto max-h-[calc(90vh-120px)]">
                <div id="modalContenido">
                    <!-- El contenido se carga aquí dinámicamente -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleNivel(nivelNumero) {
    const subnivelesDiv = document.getElementById(`subniveles-${nivelNumero}`);
    const icon = document.getElementById(`icon-${nivelNumero}`);

    if (subnivelesDiv.classList.contains('hidden')) {
        // Mostrar subniveles
        subnivelesDiv.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
        icon.textContent = 'expand_less';
    } else {
        // Ocultar subniveles
        subnivelesDiv.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
        icon.textContent = 'expand_more';
    }
}

// Función para mostrar video en el Enhanced Video Player
function mostrarVideo(subnivelId, content, tipo = 'iframe') {
    // Obtener elementos del Video Player
    const titulo = document.getElementById('videoPlayerTitulo');
    const descripcion = document.getElementById('videoPlayerDescripcion');
    const badge = document.getElementById('videoPlayerBadge');
    const contenido = document.getElementById('videoPlayerContent');

    // Obtener información del subnivel desde el DOM (nuevo layout)
    let subnivelTitulo = '';
    let subnivelDescripcion = '';
    const subnivelWrapper = document.querySelector(`[data-subnivel-id="${subnivelId}"]`);
    if (subnivelWrapper) {
        const t = subnivelWrapper.querySelector('h5');
        const d = subnivelWrapper.querySelector('p');
        subnivelTitulo = t ? t.textContent : '';
        subnivelDescripcion = d ? d.textContent : '';
    } else {
        // Fallback al selector previo si no se encuentra el nuevo contenedor
        const legacyBtn = document.querySelector(`[onclick*="mostrarVideo(${subnivelId}"]`);
        const legacyContainer = legacyBtn ? legacyBtn.closest('.flex.items-center.space-x-3') : null;
        if (legacyContainer) {
            const t = legacyContainer.querySelector('h5');
            const d = legacyContainer.querySelector('p');
            subnivelTitulo = t ? t.textContent : '';
            subnivelDescripcion = d ? d.textContent : '';
        }
    }

    // Actualizar header del Video Player
    titulo.textContent = subnivelTitulo;
    descripcion.textContent = subnivelDescripcion;

    let embedContent = '';
    let badgeText = '';
    let badgeIcon = '';

    switch(tipo) {
        case 'iframe':
            // Si es iframe, usar el contenido directamente
            embedContent = content;
            badgeText = 'Iframe Activo';
            badgeIcon = 'code';
            break;

        case 'url_video':
            // Convertir URL de video a formato embebido
            let embedUrl = content;
            if (content.includes('youtube.com/watch')) {
                const videoId = content.split('v=')[1]?.split('&')[0];
                if (videoId) {
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
            } else if (content.includes('youtu.be/')) {
                const videoId = content.split('youtu.be/')[1]?.split('?')[0];
                if (videoId) {
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
            } else if (content.includes('vimeo.com/')) {
                const videoId = content.match(/vimeo.com\/(\d+)/)?.[1];
                if (videoId) {
                    embedUrl = `https://player.vimeo.com/video/${videoId}`;
                }
            }

            embedContent = `
                <iframe
                    src="${embedUrl}"
                    width="100%"
                    height="100%"
                    frameborder="0"
                    allowfullscreen
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    class="w-full h-full rounded-3xl">
                </iframe>
            `;
            badgeText = 'Video Activo';
            badgeIcon = 'play_circle';
            break;

        case 'video_archivo':
            // Para archivos de video subidos
            embedContent = `
                <video
                    src="/storage/${content}"
                    width="100%"
                    height="100%"
                    controls
                    class="w-full h-full rounded-3xl">
                    Tu navegador no soporta el elemento video.
                </video>
            `;
            badgeText = 'Video File Activo';
            badgeIcon = 'video_file';
            break;

        default:
            embedContent = content;
            badgeText = 'Contenido Activo';
            badgeIcon = 'play_circle';
    }

    // Actualizar badge
    badge.innerHTML = `<span class="material-icons text-xs mr-1">${badgeIcon}</span>${badgeText}`;

    // Actualizar contenido del Video Player con efectos espectaculares
    contenido.innerHTML = `
        <div class="w-full h-full bg-gradient-to-br from-gray-100 via-blue-50 to-purple-50 dark:from-slate-600 dark:via-slate-500 dark:to-slate-400 rounded-3xl overflow-hidden relative">
            <!-- Efectos de carga -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 via-purple-500/20 to-pink-500/20 rounded-3xl animate-pulse"></div>

            <!-- Partículas animadas -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-2 left-2 w-2 h-2 bg-blue-400 rounded-full animate-ping opacity-60"></div>
                <div class="absolute top-4 right-4 w-1 h-1 bg-purple-400 rounded-full animate-bounce opacity-40"></div>
                <div class="absolute bottom-2 left-4 w-1.5 h-1.5 bg-pink-400 rounded-full animate-pulse opacity-50"></div>
                <div class="absolute bottom-4 right-2 w-1 h-1 bg-cyan-400 rounded-full animate-ping opacity-60"></div>
            </div>

            <!-- Contenido multimedia con efectos -->
            <div class="relative w-full h-full rounded-3xl overflow-hidden shadow-2xl shadow-blue-500/30 hover:shadow-blue-500/50 transition-all duration-500">
                ${embedContent}
            </div>

            <!-- Efectos de esquina mejorados -->
            <div class="absolute top-0 left-0 w-6 h-6 bg-gradient-to-br from-blue-500 to-transparent rounded-br-3xl opacity-80"></div>
            <div class="absolute top-0 right-0 w-6 h-6 bg-gradient-to-bl from-purple-500 to-transparent rounded-bl-3xl opacity-80"></div>
            <div class="absolute bottom-0 left-0 w-6 h-6 bg-gradient-to-tr from-pink-500 to-transparent rounded-tr-3xl opacity-80"></div>
            <div class="absolute bottom-0 right-0 w-6 h-6 bg-gradient-to-tl from-cyan-500 to-transparent rounded-tl-3xl opacity-80"></div>
        </div>
    `;

    // Scroll suave al Video Player
    document.querySelector('.lg\\:col-span-2').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });

    // Mostrar notificación
    mostrarNotificacion(`Reproduciendo: ${subnivelTitulo}`, 'success');
}

// Función para resetear el Video Player
function resetearVideoPlayer() {
    const titulo = document.getElementById('videoPlayerTitulo');
    const descripcion = document.getElementById('videoPlayerDescripcion');
    const badge = document.getElementById('videoPlayerBadge');
    const contenido = document.getElementById('videoPlayerContent');

    // Restaurar estado inicial
    titulo.textContent = 'Contenido del Curso';
    descripcion.textContent = 'Selecciona un subnivel para ver su contenido';
    badge.innerHTML = '<span class="material-icons text-xs mr-1">play_circle</span>Video';

    // Restaurar contenido inicial con efectos espectaculares
    contenido.innerHTML = `
        <div class="flex flex-col items-center justify-center h-full text-center text-white">
            <!-- Loader giratorio con efectos - Perfectamente centrado -->
            <div class="relative mb-8 flex flex-col items-center">
                <!-- Loader principal que gira 360 grados -->
                <div class="w-24 h-24 relative flex items-center justify-center">
                    <!-- Círculo exterior giratorio -->
                    <div class="absolute inset-0 border-4 border-transparent border-t-blue-500 border-r-purple-500 border-b-pink-500 border-l-cyan-500 rounded-full animate-spin"></div>
                    <!-- Círculo interior giratorio (sentido contrario) -->
                    <div class="absolute inset-2 border-3 border-transparent border-t-purple-400 border-r-pink-400 border-b-cyan-400 border-l-blue-400 rounded-full animate-spin" style="animation-direction: reverse; animation-duration: 1.5s;"></div>
                    <!-- Círculo central con gradiente -->
                    <div class="absolute inset-4 bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 rounded-full flex items-center justify-center shadow-2xl shadow-blue-500/50">
                        <span class="material-icons text-white text-2xl animate-pulse">play_circle</span>
                    </div>
                </div>
                <!-- Anillos concéntricos de fondo -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full blur-lg opacity-20 animate-ping"></div>
                <div class="absolute inset-2 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full blur-md opacity-15 animate-pulse"></div>
            </div>

            <!-- Texto centrado -->
            <div class="space-y-2">
                <p class="text-xl font-bold opacity-90 animate-pulse">Selecciona un subnivel para comenzar</p>
                <p class="text-sm opacity-70 animate-bounce">Haz click en un botón "Video" en el panel lateral</p>
            </div>

            <!-- Efectos de destello -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -skew-x-12 animate-pulse"></div>
        </div>
    `;
}

// Función para mostrar recurso
function mostrarRecurso(subnivelId, nombreRecurso, pathRecurso) {
    const modal = document.getElementById('contenidoModal');
    const titulo = document.getElementById('modalTitulo');
    const contenido = document.getElementById('modalContenido');

    titulo.textContent = 'Recurso del Subnivel';
    contenido.innerHTML = `
        <div class="space-y-4">
            <div class="bg-gray-50 dark:bg-slate-700 rounded-xl p-4">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Recurso PDF</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Archivo: <span class="font-medium">${nombreRecurso}</span></p>
            </div>
            <div class="bg-white dark:bg-slate-800 border-2 border-dashed border-gray-300 dark:border-slate-600 rounded-xl p-8 text-center">
                <div class="flex flex-col items-center space-y-4">
                    <div class="w-16 h-16 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center">
                        <span class="material-icons text-red-600 dark:text-red-400 text-3xl">description</span>
                    </div>
                    <div>
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white">${nombreRecurso}</h5>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Archivo PDF disponible para descarga</p>
                    </div>
                    <div class="flex space-x-3">
                        <button onclick="descargarRecurso('${pathRecurso}', '${nombreRecurso}')" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 flex items-center space-x-2">
                            <span class="material-icons text-sm">download</span>
                            <span>Descargar PDF</span>
                        </button>
                        <button onclick="verRecurso('${pathRecurso}')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center space-x-2">
                            <span class="material-icons text-sm">visibility</span>
                            <span>Ver PDF</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <button onclick="cerrarModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Cerrar
                </button>
            </div>
        </div>
    `;

    modal.classList.remove('hidden');
}

// Función para cerrar modal
function cerrarModal() {
    const modal = document.getElementById('contenidoModal');
    modal.classList.add('hidden');
}

// Función para descargar recurso
function descargarRecurso(pathRecurso, nombreRecurso) {
    // Crear enlace de descarga usando el path real del archivo
    const link = document.createElement('a');
    link.href = `/storage/${pathRecurso}`;
    link.download = nombreRecurso;
    link.click();

    // Mostrar notificación
    mostrarNotificacion(`Descargando ${nombreRecurso}...`, 'success');
}

// Función para ver recurso
function verRecurso(pathRecurso) {
    // Abrir PDF en nueva ventana usando el path real del archivo
    window.open(`/storage/${pathRecurso}`, '_blank');
}

// Función para mostrar notificaciones
function mostrarNotificacion(mensaje, tipo = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
        tipo === 'success' ? 'bg-green-500 text-white' :
        tipo === 'error' ? 'bg-red-500 text-white' :
        'bg-blue-500 text-white'
    }`;
    notification.innerHTML = `
        <div class="flex items-center">
            <span class="material-icons mr-2">${tipo === 'success' ? 'check_circle' : tipo === 'error' ? 'error' : 'info'}</span>
            ${mensaje}
        </div>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Cerrar modal al hacer click fuera
document.addEventListener('click', function(event) {
    const modal = document.getElementById('contenidoModal');
    if (event.target === modal) {
        cerrarModal();
    }
});

// Opcional: Expandir el primer nivel por defecto
document.addEventListener('DOMContentLoaded', function() {
    // Mantener todos los niveles cerrados por defecto.
    // Generar thumbnails para mini players (YouTube) y fallback genérico
    const minis = document.querySelectorAll('.mini-thumb');
    minis.forEach(async function(mini){
        const parent = mini.parentElement;
        const tipo = parent.getAttribute('data-tipo');
        const url = parent.getAttribute('data-url');
        const durBadge = parent.querySelector('.mini-duration');
        let thumb = null;
        // Thumbnails: YouTube, Vimeo (intento básico) y fallback
        if (tipo === 'url_video' && url) {
            if (url.includes('youtube.com/watch')) {
                const vid = (url.split('v=')[1] || '').split('&')[0];
                if (vid) thumb = `https://img.youtube.com/vi/${vid}/hqdefault.jpg`;
            } else if (url.includes('youtu.be/')) {
                const vid = (url.split('youtu.be/')[1] || '').split('?')[0];
                if (vid) thumb = `https://img.youtube.com/vi/${vid}/hqdefault.jpg`;
            } else if (url.includes('vimeo.com/')) {
                const m = url.match(/vimeo.com\/(\d+)/);
                if (m && m[1]) {
                    // Nota: Vimeo thumbnails requieren API; usar placeholder elegante
                    thumb = null;
                }
            }
        }
        if (thumb) {
            mini.style.backgroundImage = `url('${thumb}')`;
        }
        // Duración: para videos locales, tratar de leer metadatos cargando un elemento video oculto
        if (tipo === 'video_archivo') {
            try {
                const videoPath = parent.getAttribute('data-path');
                if (videoPath) {
                    const v = document.createElement('video');
                    v.src = `/storage/${videoPath}`;
                    v.preload = 'metadata';
                    v.addEventListener('loadedmetadata', () => {
                        const d = Math.floor(v.duration || 0);
                        if (d && durBadge) {
                            const mm = String(Math.floor(d / 60)).padStart(2, '0');
                            const ss = String(d % 60).padStart(2, '0');
                            durBadge.textContent = `${mm}:${ss}`;
                            durBadge.classList.remove('hidden');
                        }
                    });
                }
            } catch (e) {}
        }
    });

    // Efecto de escritura en el hero
    const typingEl = document.getElementById('typingWelcome');
    const cursorEl = document.getElementById('typingCursor');
    if (typingEl) {
        const fullText = 'Bienvenido a la sección de SoftlinkIA / Academy';
        let idx = 0;
        const speed = 45; // ms por carácter
        const type = () => {
            if (idx <= fullText.length) {
                typingEl.textContent = fullText.slice(0, idx);
                idx++;
                setTimeout(type, speed);
            } else {
                // Parpadeo del cursor sostenido
                if (cursorEl) cursorEl.classList.add('animate-pulse');
            }
        };
        setTimeout(type, 400);
    }
});
</script>
@endsection
