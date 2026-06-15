@extends('layouts.app')

@section('title', $curso->titulo . ' - SoftLinkIA')

@php
    // Obtener el primer subnivel con video para mostrar por defecto
    $primerSubnivelConVideo = null;
    if($curso->niveles && $curso->niveles->count() > 0) {
        foreach($curso->niveles as $nivel) {
            if($nivel->subniveles && $nivel->subniveles->count() > 0) {
                foreach($nivel->subniveles as $subnivel) {
                    $tieneVideo = ($subnivel->usar_iframe && $subnivel->url_iframe)
                        || ($subnivel->usar_url_video && $subnivel->url_video)
                        || ($subnivel->usar_video_archivo && $subnivel->video_archivo_path);
                    if($tieneVideo) {
                        $primerSubnivelConVideo = $subnivel;
                        break 2;
                    }
                }
            }
        }
    }
@endphp

@section('content')
<!-- Video.js CSS -->
<link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet">

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
            <!-- Breadcrumb -->
            <nav class="mb-4">
                <div class="flex items-center space-x-2 text-sm">
                    <a href="{{ route('usuario-estudiante') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-300 flex items-center">
                        <span class="material-icons text-sm mr-1">home</span>
                        Inicio
                    </a>
                    <span class="material-icons text-gray-400 text-sm">chevron_right</span>
                    <a href="{{ route('usuario.cursos.adquiridos') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-300 flex items-center">
                        <span class="material-icons text-sm mr-1">school</span>
                        Mis Cursos
                    </a>
                    <span class="material-icons text-gray-400 text-sm">chevron_right</span>
                    <span class="text-gray-300">{{ $curso->titulo }}</span>
                </div>
            </nav>

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
                    @if($curso->nivel_dificultad)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            {{ ucfirst($curso->nivel_dificultad) }}
                        </span>
                    @endif
                    @if($curso->precio)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                            ${{ number_format($curso->precio, 0) }}
                        </span>
                    @endif
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                            <span class="material-icons text-xs mr-1">check_circle</span>
                        Adquirido
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
                <div class="relative bg-white/90 dark:bg-slate-800/90 backdrop-blur-2xl rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-2xl shadow-blue-500/20 mb-8 overflow-hidden">
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
                                    <h3 class="text-xl font-black text-gray-900 dark:text-white bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 dark:from-white dark:via-blue-100 dark:to-purple-100 bg-clip-text text-transparent animate-pulse" id="videoPlayerTitulo">
                                        @if($primerSubnivelConVideo)
                                            {{ $primerSubnivelConVideo->titulo }}
                                        @else
                                            Contenido del Curso
                                        @endif
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 font-medium" id="videoPlayerDescripcion">
                                        @if($primerSubnivelConVideo)
                                            {{ $primerSubnivelConVideo->descripcion }}
                                        @else
                                            Selecciona un subnivel para ver su contenido
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all duration-300 hover:scale-105 animate-pulse" id="videoPlayerBadge">
                                    @if($primerSubnivelConVideo)
                                        @if($primerSubnivelConVideo->usar_iframe)
                                            <span class="material-icons text-sm mr-2 animate-spin">code</span>Iframe Activo
                                        @elseif($primerSubnivelConVideo->usar_url_video)
                                            <span class="material-icons text-sm mr-2 animate-spin">play_circle</span>Video Activo
                                        @elseif($primerSubnivelConVideo->usar_video_archivo)
                                            <span class="material-icons text-sm mr-2 animate-spin">video_file</span>Video File Activo
                                        @else
                                            <span class="material-icons text-sm mr-2 animate-spin">play_circle</span>Video
                                        @endif
                                    @else
                                        <span class="material-icons text-sm mr-2 animate-spin">play_circle</span>Video
                                    @endif
                                </span>
                                <button onclick="resetearVideoPlayer()" class="p-3 hover:bg-gray-100 dark:hover:bg-slate-700 rounded-2xl transition-all duration-300 hover:scale-110 hover:rotate-180 hover:shadow-lg" title="Resetear Video Player">
                                    <span class="material-icons text-gray-500 dark:text-gray-400 text-lg">refresh</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido del Video Player con efectos espectaculares -->
                    <div class="relative aspect-video bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-3xl overflow-hidden group">

                        <!-- Partículas de fondo -->
                        <div class="absolute inset-0 overflow-hidden">
                            <div class="absolute top-1/4 left-1/4 w-3 h-3 bg-blue-400/30 rounded-full animate-ping"></div>
                            <div class="absolute top-3/4 right-1/4 w-2 h-2 bg-purple-400/40 rounded-full animate-pulse"></div>
                            <div class="absolute bottom-1/4 left-1/3 w-1 h-1 bg-pink-400/50 rounded-full animate-bounce"></div>
                        </div>

                        <div class="relative w-full h-full" id="videoPlayerContent">
                            @if($primerSubnivelConVideo)
                                @php
                                    $tipoContenido = $primerSubnivelConVideo->usar_iframe ? 'iframe' : ($primerSubnivelConVideo->usar_url_video ? 'url_video' : ($primerSubnivelConVideo->usar_video_archivo ? 'video_archivo' : ''));
                                    $contenidoValor = $primerSubnivelConVideo->usar_iframe ? $primerSubnivelConVideo->url_iframe : ($primerSubnivelConVideo->usar_url_video ? $primerSubnivelConVideo->url_video : ($primerSubnivelConVideo->usar_video_archivo ? $primerSubnivelConVideo->video_archivo_path : ''));
                                @endphp

                                <!-- Video cargado desde backend -->
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
                                    <div class="relative w-full h-full rounded-3xl overflow-hidden shadow-2xl shadow-blue-500/30">
                                        @if($tipoContenido === 'iframe')
                                            {!! $contenidoValor !!}
                                        @elseif($tipoContenido === 'url_video')
                                            @php
                                                $embedUrl = $contenidoValor;
                                                if (strpos($contenidoValor, 'youtube.com/watch') !== false) {
                                                    $videoId = explode('v=', $contenidoValor)[1] ?? '';
                                                    $videoId = explode('&', $videoId)[0];
                                                    if($videoId) {
                                                        $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                                                    }
                                                } elseif (strpos($contenidoValor, 'youtu.be/') !== false) {
                                                    $videoId = explode('youtu.be/', $contenidoValor)[1] ?? '';
                                                    $videoId = explode('?', $videoId)[0];
                                                    if($videoId) {
                                                        $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                                                    }
                                                } elseif (strpos($contenidoValor, 'vimeo.com/') !== false) {
                                                    preg_match('/vimeo.com\/(\d+)/', $contenidoValor, $matches);
                                                    if(isset($matches[1])) {
                                                        $embedUrl = "https://player.vimeo.com/video/{$matches[1]}";
                                                    }
                                                }
                                            @endphp
                                            <iframe
                                                src="{{ $embedUrl }}"
                                                width="100%"
                                                height="100%"
                                                frameborder="0"
                                                allowfullscreen
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                class="w-full h-full rounded-3xl">
                                            </iframe>
                                        @elseif($tipoContenido === 'video_archivo')
                                            @php
                                                $videoExt = strtolower(pathinfo($contenidoValor, PATHINFO_EXTENSION));
                                                $videoType = 'video/mp4'; // default
                                                if ($videoExt === 'webm') $videoType = 'video/webm';
                                                elseif ($videoExt === 'ogg' || $videoExt === 'ogv') $videoType = 'video/ogg';
                                                elseif ($videoExt === 'mov') $videoType = 'video/quicktime';
                                                elseif ($videoExt === 'avi') $videoType = 'video/x-msvideo';
                                            @endphp
                                            <div
                                                id="initial-video-player-container"
                                                class="w-full h-full"
                                                oncontextmenu="return false;"
                                                onselectstart="return false;"
                                                ondragstart="return false;"
                                                style="user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;">
                                                <video
                                                    id="initial-video-player"
                                                    class="video-js vjs-default-skin w-full h-full"
                                                    controls
                                                    preload="auto"
                                                    playsinline
                                                    webkit-playsinline
                                                    controlsList="nodownload"
                                                    disablePictureInPicture
                                                    data-setup="{}"
                                                    oncontextmenu="return false;"
                                                    style="pointer-events: auto;">
                                                    <source src="/video/{{ $contenidoValor }}" type="{{ $videoType }}">
                                                    Tu navegador no soporta el elemento video.
                                                </video>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Efectos de esquina mejorados -->
                                    <div class="absolute top-0 left-0 w-6 h-6 bg-gradient-to-br from-blue-500 to-transparent rounded-br-3xl opacity-80"></div>
                                    <div class="absolute top-0 right-0 w-6 h-6 bg-gradient-to-bl from-purple-500 to-transparent rounded-bl-3xl opacity-80"></div>
                                    <div class="absolute bottom-0 left-0 w-6 h-6 bg-gradient-to-tr from-pink-500 to-transparent rounded-tr-3xl opacity-80"></div>
                                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-gradient-to-tl from-cyan-500 to-transparent rounded-tl-3xl opacity-80"></div>
                                </div>
                            @else
                                <!-- Estado inicial cuando no hay videos -->
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
                                        <p class="text-xl font-bold opacity-90 animate-pulse">No hay videos disponibles</p>
                                        <p class="text-sm opacity-70 animate-bounce">Este curso aún no tiene contenido multimedia</p>
                                    </div>

                                    <!-- Efectos de destello -->
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -skew-x-12 animate-pulse"></div>
                                </div>
                            @endif
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
                        <div class="flex items-start space-x-4" id="creadorCursoAvatar">
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
                                    {{ ucfirst($curso->nivel_dificultad ?? 'No especificado') }}
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
                                                                @if(!empty($subnivel->recurso_nombre))
                                                                    @php
                                                                        $nombres = is_array($subnivel->recurso_nombre) ? $subnivel->recurso_nombre : json_decode($subnivel->recurso_nombre, true);
                                                                        $paths = is_array($subnivel->recurso_path) ? $subnivel->recurso_path : json_decode($subnivel->recurso_path, true);
                                                                    @endphp
                                                                    @if(is_array($nombres) && is_array($paths) && count($nombres) > 1)
                                                                        <button onclick='mostrarRecursosMultiples({{ $subnivel->id }}, @json($nombres), @json($paths))' class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 hover:bg-green-200 dark:hover:bg-green-800 transition-colors duration-200 cursor-pointer">
                                                                            <span class="material-icons text-xs mr-1">inventory_2</span>Varios recursos ({{ count($nombres) }})
                                                                        </button>
                                                                    @else
                                                                        @php
                                                                            $nombreUnico = is_array($nombres) ? ($nombres[0] ?? null) : (is_string($nombres) ? $nombres : null);
                                                                            $pathUnico = is_array($paths) ? ($paths[0] ?? null) : (is_string($paths) ? $paths : null);
                                                                            $extUnica = $nombreUnico ? strtoupper(pathinfo($nombreUnico, PATHINFO_EXTENSION)) : 'Archivo';
                                                                        @endphp
                                                                        @if($nombreUnico && $pathUnico)
                                                                            <button onclick="mostrarRecurso({{ $subnivel->id }}, '{{ addslashes($nombreUnico) }}', '{{ addslashes($pathUnico) }}')" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 hover:bg-green-200 dark:hover:bg-green-800 transition-colors duration-200 cursor-pointer">
                                                                                <span class="material-icons text-xs mr-1">attach_file</span>{{ $extUnica }}
                                                                            </button>
                                                                        @endif
                                                                    @endif
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
                                    {{ ucfirst($curso->nivel_dificultad ?? 'No especificado') }}
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

    <!-- Sección de Estadísticas de Alumnos -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="relative bg-white/90 dark:bg-slate-800/90 backdrop-blur-2xl rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-xl shadow-emerald-500/10 mb-8 overflow-hidden animate__animated animate__fadeInLeft">
            <!-- Fondo sutil -->
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 via-teal-500/5 to-cyan-500/5"></div>

            <div class="relative p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="material-icons text-white text-xl">school</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Estadísticas de Alumnos</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Información detallada de inscripciones</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200">
                            <span class="material-icons text-xs mr-1">people</span>
                            {{ $estadisticasAlumnos['total_inscritos'] }} alumnos
                        </span>
                    </div>
                </div>

                <!-- Tarjetas de estadísticas principales -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <!-- Total Inscritos -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-xl p-4 border border-blue-200/50 dark:border-blue-700/50">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total Inscritos</p>
                                <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">{{ $estadisticasAlumnos['total_inscritos'] }}</p>
                            </div>
                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                <span class="material-icons text-white text-lg">people</span>
                            </div>
                        </div>
                    </div>

                    <!-- Activos -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-xl p-4 border border-green-200/50 dark:border-green-700/50">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-green-600 dark:text-green-400">Activos</p>
                                <p class="text-2xl font-bold text-green-900 dark:text-green-100">{{ $estadisticasAlumnos['inscripciones_activas'] }}</p>
                            </div>
                            <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                <span class="material-icons text-white text-lg">play_circle</span>
                            </div>
                        </div>
                    </div>

                    <!-- Completados -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-xl p-4 border border-purple-200/50 dark:border-purple-700/50">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Completados</p>
                                <p class="text-2xl font-bold text-purple-900 dark:text-purple-100">{{ $estadisticasAlumnos['inscripciones_completadas'] }}</p>
                            </div>
                            <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                <span class="material-icons text-white text-lg">check_circle</span>
                            </div>
                        </div>
                    </div>

                    <!-- Progreso Promedio -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-xl p-4 border border-orange-200/50 dark:border-orange-700/50">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-orange-600 dark:text-orange-400">Progreso Promedio</p>
                                <p class="text-2xl font-bold text-orange-900 dark:text-orange-100">{{ $estadisticasAlumnos['progreso_promedio'] }}%</p>
                            </div>
                            <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                                <span class="material-icons text-white text-lg">trending_up</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Alumnos y Estadísticas Adicionales -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Top 5 Alumnos -->
                    <div class="bg-gray-50/60 dark:bg-slate-700/60 rounded-xl p-4">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <span class="material-icons text-yellow-600 text-lg mr-2">emoji_events</span>
                            Top 5 Alumnos
                        </h4>
                        @if($estadisticasAlumnos['top_alumnos']->count() > 0)
                            <div class="space-y-3">
                                @foreach($estadisticasAlumnos['top_alumnos'] as $index => $inscripcion)
                                    <div class="flex items-center justify-between p-3 bg-white dark:bg-slate-800 rounded-lg border border-gray-200 dark:border-slate-600">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                                {{ $index + 1 }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                                    {{ $inscripcion->usuario->name ?? $inscripcion->usuario->nombre ?? 'Usuario' }}
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    {{ $inscripcion->fecha_inscripcion->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $inscripcion->progreso }}%</p>
                                            <div class="w-16 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                                <div class="bg-gradient-to-r from-yellow-500 to-orange-600 h-2 rounded-full" style="width: {{ $inscripcion->progreso }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                <span class="material-icons text-4xl mb-2">school</span>
                                <p>No hay alumnos inscritos aún</p>
                            </div>
                        @endif
                    </div>

                    <!-- Estadísticas Adicionales -->
                    <div class="bg-gray-50/60 dark:bg-slate-700/60 rounded-xl p-4">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <span class="material-icons text-blue-600 text-lg mr-2">analytics</span>
                            Estadísticas Adicionales
                        </h4>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-white dark:bg-slate-800 rounded-lg">
                                <div class="flex items-center space-x-2">
                                    <span class="material-icons text-green-600 text-sm">schedule</span>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Últimos 30 días</span>
                                </div>
                                <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $estadisticasAlumnos['inscripciones_recientes'] }}</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-white dark:bg-slate-800 rounded-lg">
                                <div class="flex items-center space-x-2">
                                    <span class="material-icons text-red-600 text-sm">cancel</span>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Cancelados</span>
                                </div>
                                <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $estadisticasAlumnos['inscripciones_canceladas'] }}</span>
                            </div>

                            @if($estadisticasAlumnos['total_inscritos'] > 0)
                                <div class="flex items-center justify-between p-3 bg-white dark:bg-slate-800 rounded-lg">
                                    <div class="flex items-center space-x-2">
                                        <span class="material-icons text-purple-600 text-sm">check_circle</span>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Tasa de Completado</span>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">
                                        {{ round(($estadisticasAlumnos['inscripciones_completadas'] / $estadisticasAlumnos['total_inscritos']) * 100, 1) }}%
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Lista completa de alumnos (expandible) -->
                @if($estadisticasAlumnos['todas_inscripciones']->count() > 0)
                    <div class="mt-6">
                        <button onclick="toggleListaAlumnos()" class="w-full flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-slate-700 dark:to-slate-600 rounded-xl hover:from-gray-100 hover:to-gray-200 dark:hover:from-slate-600 dark:hover:to-slate-500 transition-all duration-200">
                            <div class="flex items-center space-x-3">
                                <span class="material-icons text-gray-600 dark:text-gray-400">list</span>
                                <span class="text-lg font-semibold text-gray-900 dark:text-white">Ver Lista Completa de Alumnos</span>
                            </div>
                            <span class="material-icons text-gray-600 dark:text-gray-400 transition-transform duration-200" id="iconListaAlumnos">expand_more</span>
                        </button>

                        <div class="hidden mt-4" id="listaAlumnos">
                            <div class="bg-white dark:bg-slate-800 rounded-xl border border-gray-200 dark:border-slate-600 overflow-hidden">
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <thead class="bg-gray-50 dark:bg-slate-700">
                                            <tr>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Alumno</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fecha Inscripción</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Progreso</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-slate-600">
                                            @foreach($estadisticasAlumnos['todas_inscripciones'] as $inscripcion)
                                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors duration-150">
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center space-x-3">
                                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                                                {{ mb_strtoupper(mb_substr($inscripcion->usuario->name ?? $inscripcion->usuario->nombre ?? 'U', 0, 1)) }}
                                                            </div>
                                                            <div>
                                                                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                                                    {{ $inscripcion->usuario->name ?? $inscripcion->usuario->nombre ?? 'Usuario' }}
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    {{ $inscripcion->usuario->email ?? 'Sin email' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                                        {{ $inscripcion->fecha_inscripcion->format('d M Y, H:i') }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center space-x-2">
                                                            <div class="w-20 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2 rounded-full" style="width: {{ $inscripcion->progreso }}%"></div>
                                                            </div>
                                                            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $inscripcion->progreso }}%</span>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        @php
                                                            $statusColors = [
                                                                'activo' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                                                'completado' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200',
                                                                'cancelado' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'
                                                            ];
                                                            $statusTexts = [
                                                                'activo' => 'Activo',
                                                                'completado' => 'Completado',
                                                                'cancelado' => 'Cancelado'
                                                            ];
                                                        @endphp
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$inscripcion->status] ?? 'bg-gray-100 text-gray-800' }}">
                                                            {{ $statusTexts[$inscripcion->status] ?? ucfirst($inscripcion->status) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sección de Certificado -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="relative bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-3xl border border-emerald-200/60 dark:border-emerald-700/60 shadow-2xl shadow-emerald-500/10 overflow-hidden animate__animated animate__fadeInUp">
            <div class="p-8 text-center">
                <div id="certificadoSection">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="material-icons text-white text-2xl">workspace_premium</span>
                        </div>
                        <div>
                            <h4 class="text-2xl font-bold text-gray-900 dark:text-white">Certificado de Finalización</h4>
                            <p class="text-sm text-emerald-600 dark:text-emerald-400">Valida tus conocimientos</p>
                        </div>
                    </div>

                    <!-- Estado del Progreso -->
                    <div id="progresoInfo" class="mb-4">
                        <div class="flex items-center justify-center space-x-2 mb-2">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Progreso del Curso:</span>
                            <span id="progresoPorcentaje" class="text-sm font-bold text-gray-900 dark:text-white">0%</span>
                        </div>
                        <div class="w-full max-w-md mx-auto bg-gray-200 dark:bg-gray-700 rounded-full h-3 mb-2">
                            <div id="progresoBarra" class="bg-gradient-to-r from-emerald-500 to-teal-600 h-3 rounded-full transition-all duration-500" style="width: 0%"></div>
                        </div>
                    </div>

                    <!-- Mensaje Dinámico -->
                    <p id="mensajeCertificado" class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                        Verificando elegibilidad para generar certificado...
                    </p>

                    <!-- Botón Dinámico -->
                    <div id="botonCertificado">
                        <button id="btnGenerarCertificado"
                                onclick="verificarElegibilidad()"
                                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold rounded-2xl shadow-xl shadow-emerald-500/30 hover:shadow-2xl hover:shadow-emerald-500/50 transition-all duration-500 hover:scale-105 hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                            <span class="material-icons mr-3 text-lg">refresh</span>
                            <span id="textoBoton">Verificar Elegibilidad</span>
                        </button>
                    </div>

                    <!-- Información Adicional -->
                    <div class="mt-4 text-xs text-gray-500 dark:text-gray-400 space-y-1">
                        <p>• Requisito mínimo: 80% de progreso completado</p>
                        <p>• Certificado válido y verificable</p>
                        <p>• Código único de autenticación</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Comentarios y Preguntas -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="relative bg-gray-900 dark:bg-slate-900 rounded-2xl border border-gray-700/50 dark:border-slate-700/50 shadow-lg shadow-blue-500/5 overflow-hidden animate__animated animate__fadeInUp">
            <!-- Header estilo YouTube -->
            <div class="relative p-6 border-b border-gray-700/50 dark:border-slate-700/50">
                @php
                    $iniNombre = isset($curso->creador_nombre) ? mb_substr($curso->creador_nombre,0,1,'UTF-8') : '';
                    $iniApellido = isset($curso->creador_apellido) ? mb_substr($curso->creador_apellido,0,1,'UTF-8') : '';
                    $creadorIniciales = trim($iniNombre.$iniApellido) ?: 'SL';
                    $creadorNombreCompleto = trim(($curso->creador_nombre ?? '') . ' ' . ($curso->creador_apellido ?? '')) ?: 'Creador del curso';
                @endphp
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center">
                            <span class="material-icons text-white text-sm">forum</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">Preguntas y Comentarios</h3>
                            <p class="text-sm text-gray-400">¿Tienes alguna duda sobre el curso?</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="hidden md:flex items-center space-x-2 text-xs">
                            <span class="px-2 py-0.5 rounded-full bg-gray-700 text-gray-300">Total: <span id="statTotal" class="font-semibold">0</span></span>
                            <span class="px-2 py-0.5 rounded-full bg-orange-600 text-white">Sin respuesta: <span id="statSinResp" class="font-semibold">0</span></span>
                            <span class="px-2 py-0.5 rounded-full bg-red-600 text-white">No leídos: <span id="statNoLeidos" class="font-semibold">0</span></span>
                        </div>
                        <button id="btnMarcarLeidos" class="hidden sm:inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-700 hover:bg-gray-600 text-white transition">
                            <span class="material-icons text-[14px] mr-1">done_all</span>
                            Marcar como leídos
                        </button>
                        <span class="text-sm text-gray-400" id="totalComentariosCount">0 comentarios</span>
                        <!-- Avatar con iniciales del creador -->
                        <div class="hidden sm:flex items-center space-x-2" title="{{ $creadorNombreCompleto }}">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-cyan-600 text-white flex items-center justify-center text-xs font-bold">
                                {{ $creadorIniciales }}
                        </div>
                            <span class="text-xs text-gray-400 max-w-[140px] truncate">{{ $creadorNombreCompleto }}</span>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Lista de comentarios (SSR inicial) -->
            <div id="comentariosContainer" class="p-6 space-y-6">
                @php
                    $comentarios = \App\Models\ComentarioCurso::with([
                        'usuario',
                        'nivel',
                        'children' => function($q){ $q->with(['usuario','nivel'])->orderBy('created_at','asc'); }
                    ])
                    ->where('curso_id', $curso->id)
                    ->whereNull('parent_id')
                    ->orderBy('created_at','desc')
                    ->get();
                @endphp

                @if($comentarios->isEmpty())
                <div class="text-center py-12 text-gray-400">
                    <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-icons text-gray-500 text-2xl">forum</span>
                    </div>
                        <p class="text-lg font-medium">No hay comentarios aún</p>
                        <p class="text-sm">¡Sé el primero en hacer una pregunta!</p>
                    </div>
                @else
                    @foreach($comentarios as $c)
                        @php
                            $usuarioNombre = ($c->usuario->name ?? $c->usuario->nombre ?? 'Estudiante');
                            $fecha = \Carbon\Carbon::parse($c->created_at)->locale('es')->isoFormat('D MMM YYYY, HH:mm');
                            $iniUser = mb_strtoupper(mb_substr($usuarioNombre,0,1,'UTF-8'));
                        @endphp
                        <div class="comment-thread">
                            <!-- Comentario principal -->
                            <div class="flex items-start space-x-3 mb-4">
                                <!-- Avatar del estudiante -->
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">{{ $iniUser }}</div>
                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <h4 class="text-sm font-semibold text-white">{{ $usuarioNombre }}</h4>
                                        <span class="text-xs text-gray-400">{{ $fecha }}</span>
                                        @if($c->nivel && $c->nivel->titulo)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-300">
                                                <span class="material-icons text-xs mr-1">layers</span>
                                                {{ $c->nivel->titulo }}
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-300 mb-3 leading-relaxed">{{ $c->comentario }}</p>
                                    <div class="flex items-center space-x-4">
                                        <button class="text-gray-400 hover:text-white transition-colors text-xs" data-action="student-reply" data-id="{{ $c->id }}" data-nivel-id="{{ $c->nivel_id ?? '' }}" data-usuario="{{ $usuarioNombre }}">
                                            <span class="material-icons text-xs mr-1">reply</span>Responder
                                        </button>
                                        @if(auth()->id() === $c->usuario_id)
                                            <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="edit" data-id="{{ $c->id }}">
                                                <span class="material-icons text-xs mr-1">edit</span>Editar
                                            </button>
                                            <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-rose-500 to-red-600 text-white shadow hover:scale-105 transition" data-action="delete" data-id="{{ $c->id }}">
                                                <span class="material-icons text-xs mr-1">delete</span>Eliminar
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Hilo: respuestas (estudiante/creador) -->
                            @if($c->children && $c->children->count())
                                @foreach($c->children as $ch)
                                    @php
                                        $chNombre = ($ch->usuario->name ?? $ch->usuario->nombre ?? 'Usuario');
                                        $chIni = mb_strtoupper(mb_substr($chNombre,0,1,'UTF-8'));
                                        $chFecha = \Carbon\Carbon::parse($ch->created_at)->locale('es')->isoFormat('D MMM YYYY, HH:mm');
                                        $esCreador = (int)($ch->usuario_id) === (int)($curso->creador_id);
                                    @endphp
                                    <div class="ml-13 pl-4 mt-3 border-l-2 {{ $esCreador ? 'border-emerald-500' : 'border-gray-700' }}">
                                        <div class="flex items-start space-x-3">
                                            <div class="flex-shrink-0">
                                                @if($esCreador)
                                                    @if(!empty($curso->creador_avatar_url))
                                                        <div class="relative shrink-0 w-8 h-8 rounded-full overflow-hidden shadow-lg">
                                                            <img src="{{ $curso->creador_avatar_url }}" alt="Creador" class="w-8 h-8 rounded-full object-cover"/>
                                                            <div class="absolute -inset-[1px] rounded-full ring-2 ring-white/40 dark:ring-slate-900/40"></div>
                                                        </div>
                                                    @else
                                                        <div class="relative shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-cyan-600 text-white flex items-center justify-center text-[10px] font-bold shadow-lg">
                                                            {{ $iniciales }}
                                                            <div class="absolute -inset-[1px] rounded-full ring-2 ring-white/40 dark:ring-slate-900/40"></div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs">{{ $chIni }}</div>
                                                @endif
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex items-center justify-between mb-1">
                                                    <div class="flex items-center space-x-2">
                                                        <h6 class="text-xs font-semibold text-white flex items-center">
                                                            @if($esCreador)
                                                                <span class="material-icons text-[10px] mr-1 text-emerald-500">verified</span>
                                                                Creador del Curso
                                                            @else
                                                                {{ $chNombre }}
                                                            @endif
                                                        </h6>
                                                        <span class="text-xs text-gray-400">{{ $chFecha }}</span>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        @if(auth()->id() === $ch->usuario_id)
                                                            <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="edit" data-id="{{ $ch->id }}"><span class="material-icons text-[10px] mr-1">edit</span>Editar</button>
                                                            <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-rose-500 to-red-600 text-white shadow hover:scale-105 transition" data-action="delete" data-id="{{ $ch->id }}"><span class="material-icons text-[10px] mr-1">delete</span>Eliminar</button>
                                                        @endif
                                                        <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="student-reply" data-id="{{ $c->id }}" data-nivel-id="{{ $c->nivel_id ?? '' }}" data-usuario="{{ $esCreador ? 'Creador del Curso' : $chNombre }}">
                                                            <span class="material-icons text-[10px] mr-1">reply</span>Responder
                                                        </button>
                                                    </div>
                                                </div>
                                                <p class="text-sm text-gray-300 mb-2">{{ $ch->comentario }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                @endif
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

<!-- Video.js JS -->
<script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>

<script>
// Protección global contra descarga de videos
document.addEventListener('contextmenu', function(e) {
    // Prevenir clic derecho en elementos video
    if (e.target.tagName === 'VIDEO' || e.target.closest('video') || e.target.closest('.video-js')) {
        e.preventDefault();
        return false;
    }
});

document.addEventListener('dragstart', function(e) {
    // Prevenir arrastrar elementos video
    if (e.target.tagName === 'VIDEO' || e.target.closest('video') || e.target.closest('.video-js')) {
        e.preventDefault();
        return false;
    }
});

// Prevenir atajos de teclado para guardar
document.addEventListener('keydown', function(e) {
    // Prevenir Ctrl+S, Ctrl+Shift+S, Ctrl+U
    if (e.ctrlKey && (e.key === 's' || e.key === 'S' || e.key === 'u' || e.key === 'U')) {
        if (e.target.tagName === 'VIDEO' || e.target.closest('video') || e.target.closest('.video-js')) {
            e.preventDefault();
            return false;
        }
    }
    // Prevenir F12 (inspeccionar elemento) - solo en videos
    if (e.key === 'F12') {
        if (e.target.tagName === 'VIDEO' || e.target.closest('video') || e.target.closest('.video-js')) {
            e.preventDefault();
            return false;
        }
    }
});

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
    let videoId = null;

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
            // Para archivos de video subidos - usar Video.js
            const videoId = `video-player-${Date.now()}`;
            // Detectar tipo de video basado en extensión
            const videoExt = content.split('.').pop().toLowerCase();
            let videoType = 'video/mp4'; // default
            if (videoExt === 'webm') videoType = 'video/webm';
            else if (videoExt === 'ogg' || videoExt === 'ogv') videoType = 'video/ogg';
            else if (videoExt === 'mov') videoType = 'video/quicktime';
            else if (videoExt === 'avi') videoType = 'video/x-msvideo';

            embedContent = `
                <div
                    id="${videoId}-container"
                    class="w-full h-full"
                    oncontextmenu="return false;"
                    onselectstart="return false;"
                    ondragstart="return false;"
                    style="user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;">
                    <video
                        id="${videoId}"
                        class="video-js vjs-default-skin w-full h-full"
                        controls
                        preload="auto"
                        playsinline
                        webkit-playsinline
                        controlsList="nodownload"
                        disablePictureInPicture
                        data-setup="{}"
                        oncontextmenu="return false;"
                        style="pointer-events: auto;">
                        <source src="/video/${content}" type="${videoType}">
                        Tu navegador no soporta el elemento video.
                    </video>
                </div>
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

    // Destruir reproductor anterior si existe
    if (window.currentVideoPlayer) {
        try {
            window.currentVideoPlayer.dispose();
        } catch (e) {
            console.warn('Error al destruir reproductor anterior:', e);
        }
        window.currentVideoPlayer = null;
    }

    // Actualizar contenido del Video Player
        contenido.innerHTML = `
        <div class="w-full h-full bg-black rounded-3xl overflow-hidden">
            ${embedContent}
            </div>
        `;

    // Inicializar Video.js si es un video_archivo
    if (tipo === 'video_archivo' && videoId) {
        setTimeout(() => {
            const videoElement = document.getElementById(videoId);
            if (videoElement && typeof videojs !== 'undefined') {
                // Destruir instancia anterior si existe
                if (window.currentVideoPlayer) {
                    try {
                        window.currentVideoPlayer.dispose();
                    } catch (e) {
                        console.warn('Error al destruir reproductor anterior:', e);
                    }
                }

                window.currentVideoPlayer = videojs(videoId, {
                    fluid: true,
                    responsive: true,
                    controls: true,
                    playbackRates: [0.5, 1, 1.25, 1.5, 2],
                    techOrder: ['html5'],
                    html5: {
                        vhs: {
                            overrideNative: true
                        },
                        nativeVideoTracks: false,
                        nativeAudioTracks: false,
                        nativeTextTracks: false
                    }
                });

                // Protección contra descarga
                const videoContainer = document.getElementById(`${videoId}-container`);
                if (videoContainer) {
                    // Prevenir clic derecho
                    videoContainer.addEventListener('contextmenu', function(e) {
                        e.preventDefault();
                        return false;
                    });

                    // Prevenir arrastrar
                    videoContainer.addEventListener('dragstart', function(e) {
                        e.preventDefault();
                        return false;
                    });

                    // Prevenir selección
                    videoContainer.addEventListener('selectstart', function(e) {
                        e.preventDefault();
                        return false;
                    });
                }

                // Protección en el elemento video
                if (videoElement) {
                    videoElement.addEventListener('contextmenu', function(e) {
                        e.preventDefault();
                        return false;
                    });

                    videoElement.addEventListener('dragstart', function(e) {
                        e.preventDefault();
                        return false;
                    });

                    // Prevenir guardar con Ctrl+S
                    videoElement.addEventListener('keydown', function(e) {
                        if (e.ctrlKey && (e.key === 's' || e.key === 'S')) {
                            e.preventDefault();
                            return false;
                        }
                    });
                }

                // Asegurar que el botón de pantalla completa funcione
                window.currentVideoPlayer.ready(function() {
                    console.log('Video.js inicializado con controles completos, incluyendo pantalla completa');
                });
            }
        }, 100);
    }

    // Scroll suave al Video Player
    document.querySelector('.lg\\:col-span-2').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });

    // Mostrar notificación
    mostrarNotificacion(`Reproduciendo: ${subnivelTitulo}`, 'success');
}

// Función para mostrar/ocultar lista de alumnos
function toggleListaAlumnos() {
    const lista = document.getElementById('listaAlumnos');
    const icon = document.getElementById('iconListaAlumnos');

    if (lista.classList.contains('hidden')) {
        // Mostrar lista
        lista.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
        icon.textContent = 'expand_less';
    } else {
        // Ocultar lista
        lista.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
        icon.textContent = 'expand_more';
    }
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

// Mapear extensión a icono y color
function iconoPorExtension(extUpper) {
    const ext = (extUpper || '').toLowerCase();
    const map = {
        pdf: { icon: 'picture_as_pdf', color: 'text-red-600 dark:text-red-400' },
        doc: { icon: 'description', color: 'text-blue-600 dark:text-blue-400' },
        docx:{ icon: 'description', color: 'text-blue-600 dark:text-blue-400' },
        ppt: { icon: 'slideshow', color: 'text-orange-600 dark:text-orange-400' },
        pptx:{ icon: 'slideshow', color: 'text-orange-600 dark:text-orange-400' },
        xls: { icon: 'table_chart', color: 'text-green-600 dark:text-green-400' },
        xlsx:{ icon: 'table_chart', color: 'text-green-600 dark:text-green-400' },
        zip: { icon: 'folder_zip', color: 'text-purple-600 dark:text-purple-300' },
        rar: { icon: 'folder_zip', color: 'text-purple-600 dark:text-purple-300' },
        txt: { icon: 'text_snippet', color: 'text-gray-600 dark:text-gray-300' },
        jpg: { icon: 'image', color: 'text-pink-600 dark:text-pink-400' },
        jpeg:{ icon: 'image', color: 'text-pink-600 dark:text-pink-400' },
        png: { icon: 'image', color: 'text-pink-600 dark:text-pink-400' },
        gif: { icon: 'image', color: 'text-pink-600 dark:text-pink-400' },
        mp4: { icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        avi: { icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        mov: { icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        wmv: { icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        webm:{ icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        mp3: { icon: 'audio_file', color: 'text-teal-600 dark:text-teal-400' },
        wav: { icon: 'audio_file', color: 'text-teal-600 dark:text-teal-400' },
        ogg: { icon: 'audio_file', color: 'text-teal-600 dark:text-teal-400' },
    };
    return map[ext] || { icon: 'insert_drive_file', color: 'text-gray-600 dark:text-gray-300' };
}

// Mostrar varios recursos en un modal con listado descargable
function mostrarRecursosMultiples(subnivelId, nombres, paths) {
    const modal = document.getElementById('contenidoModal');
    const titulo = document.getElementById('modalTitulo');
    const contenido = document.getElementById('modalContenido');

    titulo.textContent = 'Recursos del Subnivel';

    let items = '';
    try {
        for (let i = 0; i < nombres.length; i++) {
            const nombre = nombres[i];
            const path = paths[i];
            if (!nombre || !path) continue;
            const ext = (nombre.split('.').pop() || '').toUpperCase();
            const meta = iconoPorExtension(ext);
            items += `
                <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-slate-700 mb-2">
                    <div class="flex items-center space-x-3">
                        <span class="material-icons text-sm ${meta.color}">${meta.icon}</span>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">${nombre}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-300">${ext}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="verRecurso('${path}')" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-xs">Ver</button>
                        <button onclick="descargarRecurso('${path}', '${nombre}')" class="px-3 py-1.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-xs">Descargar</button>
                    </div>
                </div>`;
        }
    } catch (e) { /* noop */ }

    contenido.innerHTML = `
        <div>
            <div class="mb-4 p-3 bg-emerald-50 dark:bg-emerald-900/30 rounded-xl text-emerald-800 dark:text-emerald-200 text-sm font-semibold">
                Se encontraron ${nombres?.length || 0} recursos adjuntos.
            </div>
            ${items || '<p class="text-sm text-gray-600 dark:text-gray-300">No hay recursos disponibles.</p>'}
            <div class="flex justify-end mt-4">
                <button onclick="cerrarModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">Cerrar</button>
            </div>
        </div>`;

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

// ==============================
// Comentarios (Estudiante)
// ==============================
async function cargarComentarios() {
    const container = document.getElementById('comentariosContainer');
    if (!container) return;
    try {
        const res = await fetch(`/api/comentarios-curso/{{ $curso->id }}`);
        const data = await res.json();
        if (!data.success) throw new Error(data.message || 'Error');

        const comentarios = Array.isArray(data.data) ? data.data : [];
        document.getElementById('totalComentariosCount').textContent = `${comentarios.length} comentario${comentarios.length === 1 ? '' : 's'}`;

        if (comentarios.length === 0) {
        container.innerHTML = `
            <div class="text-center py-12 text-gray-400">
                <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-icons text-gray-500 text-2xl">forum</span>
                </div>
                    <p class="text-lg font-medium">No hay comentarios aún</p>
                    <p class="text-sm">¡Sé el primero en hacer una pregunta!</p>
            </div>
        `;
        return;
    }

        container.innerHTML = comentarios.map(renderComentarioPrincipal).join('');
        wireEventosComentarios(container);
    } catch (e) {
        mostrarNotificacion('No se pudieron cargar los comentarios', 'error');
    }
}

function renderComentarioPrincipal(c) {
    const usuarioNombre = (c.usuario?.name || c.usuario?.nombre || 'Estudiante');
    const iniUser = (usuarioNombre || 'E').toString().trim().charAt(0).toUpperCase();
    const fecha = new Date(c.created_at).toLocaleString('es-MX', { hour12: false });
    const nivelChip = c.nivel?.titulo ? `
        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-300">
            <span class="material-icons text-xs mr-1">layers</span>
            ${escapeHtml(c.nivel.titulo)}
        </span>` : '';
    const esAutor = Number(window.currentUserId) === Number(c.usuario_id);
    const acciones = `
        <div class="flex items-center space-x-4">
            ${!esAutor ? `
            <button class="text-gray-400 hover:text-white transition-colors text-xs" data-action="student-reply" data-id="${c.id}" data-nivel-id="${c.nivel_id || ''}" data-usuario="${escapeHtml(usuarioNombre)}">
                <span class="material-icons text-xs mr-1">reply</span>Responder
            </button>` : ''}
            ${esAutor ? `
                <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="edit" data-id="${c.id}">
                    <span class="material-icons text-xs mr-1">edit</span>Editar
                </button>
                <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-rose-500 to-red-600 text-white shadow hover:scale-105 transition" data-action="delete" data-id="${c.id}">
                    <span class="material-icons text-xs mr-1">delete</span>Eliminar
                </button>` : ''}
        </div>`;

    const hijos = Array.isArray(c.children) && c.children.length
        ? c.children.map(ch => renderComentarioHijo(ch, c, usuarioNombre)).join('')
        : '';

    return `
    <div class="comment-thread" data-comentario-id="${c.id}">
                <div class="flex items-start space-x-3 mb-4">
                    <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">${escapeHtml(iniUser)}</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center space-x-2 mb-2">
                    <h4 class="text-sm font-semibold text-white">${escapeHtml(usuarioNombre)}</h4>
                    <span class="text-xs text-gray-400">${escapeHtml(fecha)}</span>
                    ${nivelChip}
                        </div>
                <p class="text-sm text-gray-300 mb-3 leading-relaxed" data-role="texto">${escapeHtml(c.comentario)}</p>
                ${acciones}
                        </div>
                    </div>
        ${hijos}
    </div>`;
}

function renderComentarioHijo(ch, padre, usuarioPadreNombre) {
    const chNombre = (ch.usuario?.name || ch.usuario?.nombre || 'Usuario');
    const chIni = (chNombre || 'U').toString().trim().charAt(0).toUpperCase();
    const esCreador = Number(ch.usuario_id) === Number({{ $curso->creador_id ?? 'null' }});
    const chFecha = new Date(ch.created_at).toLocaleString('es-MX', { hour12: false });
    const esAutor = Number(window.currentUserId) === Number(ch.usuario_id);
    return `
    <div class="ml-13 pl-4 mt-3 border-l-2 ${esCreador ? 'border-emerald-500' : 'border-gray-700'}" data-comentario-id="${ch.id}">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                ${esCreador
                    ? (window.creadorAvatarUrl
                        ? `<div class="relative shrink-0 w-8 h-8 rounded-full overflow-hidden shadow-lg"><img src="${window.creadorAvatarUrl}" alt="Creador" class="w-8 h-8 rounded-full object-cover"/><div class="absolute -inset-[1px] rounded-full ring-2 ring-white/40 dark:ring-slate-900/40"></div></div>`
                        : `<div class="relative shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-cyan-600 text-white flex items-center justify-center text-[10px] font-bold shadow-lg">${escapeHtml(window.creadorIniciales || 'SL')}<div class="absolute -inset-[1px] rounded-full ring-2 ring-white/40 dark:ring-slate-900/40"></div></div>`)
                    : `<div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs">${escapeHtml(chIni)}</div>`}
                                </div>
            <div class="flex-1">
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center space-x-2">
                        <h6 class="text-xs font-semibold text-white flex items-center">${esCreador ? '<span class="material-icons text-[10px] mr-1 text-emerald-500">verified</span>Creador del Curso' : escapeHtml(chNombre)}</h6>
                        <span class="text-xs text-gray-400">${escapeHtml(chFecha)}</span>
                            </div>
                    <div class="flex items-center gap-2">
                        ${esAutor ? `
                        <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="edit" data-id="${ch.id}"><span class="material-icons text-[10px] mr-1">edit</span>Editar</button>
                        <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-rose-500 to-red-600 text-white shadow hover:scale-105 transition" data-action="delete" data-id="${ch.id}"><span class="material-icons text-[10px] mr-1">delete</span>Eliminar</button>` : ''}
                        ${!esAutor ? `
                        <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="student-reply" data-id="${padre.id}" data-nivel-id="${padre.nivel_id || ''}" data-usuario="${esCreador ? 'Creador del Curso' : escapeHtml(chNombre)}">
                            <span class="material-icons text-[10px] mr-1">reply</span>Responder
                        </button>` : ''}
                                </div>
                                </div>
                <p class="text-sm text-gray-300 mb-2" data-role="texto">${escapeHtml(ch.comentario)}</p>
                            </div>
                        </div>
    </div>`;
}

function wireEventosComentarios(rootEl) {
    // Delegación de eventos
    rootEl.addEventListener('click', async (e) => {
        const btn = e.target.closest('[data-action]');
        if (!btn) return;
        const action = btn.getAttribute('data-action');
        const id = btn.getAttribute('data-id');

        if (action === 'student-reply') {
            e.preventDefault();
            const thread = btn.closest('.comment-thread');
            if (!thread) return;
            // Si ya existe formulario, alternar
            let form = thread.querySelector('.inline-reply-form-student');
            if (form) { form.remove(); return; }
            const nivelId = btn.getAttribute('data-nivel-id') || '';
            const usuario = btn.getAttribute('data-usuario') || '';
            form = document.createElement('div');
            form.className = 'inline-reply-form-student ml-13 pl-4 mt-3 border-l-2 border-gray-700';
            form.innerHTML = `
                <div class="bg-gray-800 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs">${(window.currentUserName || 'E').toString().trim().charAt(0).toUpperCase()}</div>
                            </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <h6 class="text-xs font-semibold text-white">Responder a ${escapeHtml(usuario)}</h6>
                                    </div>
                            <textarea class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none" rows="3" placeholder="Escribe tu respuesta aquí..."></textarea>
                            <div class="mt-2 flex items-center gap-2">
                                <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium transition" data-save-student-reply data-parent-id="${id}" data-nivel-id="${nivelId}">
                                    <span class="material-icons text-xs mr-1">send</span>
                                    Enviar
                                        </button>
                                <button class="px-3 py-1 bg-gray-600 text-white rounded text-xs font-medium hover:bg-gray-700 transition" data-cancel-student-reply>
                                    Cancelar
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </div>`;
            thread.insertAdjacentElement('beforeend', form);
        }

        if (action === 'edit') {
            e.preventDefault();
            const block = btn.closest('[data-comentario-id]');
            if (!block) return;
            const p = block.querySelector('p[data-role="texto"]');
            const original = (p?.textContent || '').trim();
            const editor = document.createElement('div');
            editor.innerHTML = `
                <div class="mt-3">
                    <textarea class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">${escapeHtml(original)}</textarea>
                    <div class="mt-2 flex items-center gap-2">
                        <button class="px-3 py-1 bg-blue-600 text-white rounded" data-save-edit>Guardar</button>
                        <button class="px-3 py-1 bg-gray-700 text-white rounded" data-cancel-edit>Cancelar</button>
                    </div>
                </div>`;
            p.replaceWith(editor);
            editor.querySelector('[data-cancel-edit]').addEventListener('click', () => cargarComentarios());
            editor.querySelector('[data-save-edit]').addEventListener('click', async () => {
                const nuevo = editor.querySelector('textarea').value.trim();
                if (nuevo.length < 3) { mostrarNotificacion('Mínimo 3 caracteres', 'error'); return; }
                try {
                    const res = await fetch(`/api/comentarios-curso/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ comentario: nuevo })
                    });
                    if (res.ok) { mostrarNotificacion('Comentario actualizado', 'success'); cargarComentarios(); }
                    else { const err = await res.json(); mostrarNotificacion(err.message || 'No se pudo actualizar', 'error'); }
                } catch { mostrarNotificacion('Error de conexión', 'error'); }
            });
        }

        if (action === 'delete') {
            e.preventDefault();
            if (!confirm('¿Eliminar este comentario?')) return;
            try {
                const res = await fetch(`/api/comentarios-curso/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
                });
                if (res.ok) { mostrarNotificacion('Comentario eliminado', 'success'); cargarComentarios(); }
                else { const err = await res.json(); mostrarNotificacion(err.message || 'No se pudo eliminar', 'error'); }
            } catch { mostrarNotificacion('Error de conexión', 'error'); }
        }
    });

    // Envío de respuesta del estudiante
    rootEl.addEventListener('click', async (e) => {
        const sendBtn = e.target.closest('[data-save-student-reply]');
        if (!sendBtn) return;
        const wrapper = sendBtn.closest('.inline-reply-form-student');
        const textarea = wrapper?.querySelector('textarea');
        const parentId = sendBtn.getAttribute('data-parent-id');
        const nivelId = sendBtn.getAttribute('data-nivel-id') || '';
        const texto = (textarea?.value || '').trim();
        if (texto.length < 3) { mostrarNotificacion('Mínimo 3 caracteres', 'error'); return; }
        try {
            const formData = new FormData();
            formData.append('curso_id', '{{ $curso->id }}');
            if (nivelId) formData.append('nivel_id', nivelId);
            formData.append('comentario', texto);
            formData.append('parent_id', parentId);
            const res = await fetch('/api/comentarios-curso', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                body: formData
            });
            if (res.ok) { mostrarNotificacion('Respuesta publicada', 'success'); cargarComentarios(); }
            else { const err = await res.json(); mostrarNotificacion(err.message || 'No se pudo responder', 'error'); }
        } catch { mostrarNotificacion('Error de conexión', 'error'); }
    });

    // Cancelar respuesta inline
    rootEl.addEventListener('click', (e) => {
        const cancelBtn = e.target.closest('[data-cancel-student-reply]');
        if (!cancelBtn) return;
        cancelBtn.closest('.inline-reply-form-student')?.remove();
    });
}

function escapeHtml(str) {
    return (str ?? '').toString()
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

// Estadísticas para creadores
async function cargarEstadisticasComentarios() {
    const cursoId = {{ $curso->id }};
    try {
        const response = await fetch(`/api/comentarios-curso/${cursoId}/estadisticas`);
        if (!response.ok) return;
        const { data } = await response.json();
        const total = data?.total_comentarios ?? 0;
        const sinResp = data?.sin_respuesta ?? 0;
        const noLeidos = data?.no_leidos ?? 0;
        const elTotal = document.getElementById('statTotal');
        const elSin = document.getElementById('statSinResp');
        const elNo = document.getElementById('statNoLeidos');
        if (elTotal) elTotal.textContent = total;
        if (elSin) elSin.textContent = sinResp;
        if (elNo) elNo.textContent = noLeidos;
        const totalComentariosCount = document.getElementById('totalComentariosCount');
        if (totalComentariosCount) {
            totalComentariosCount.textContent = `${total} comentario${total === 1 ? '' : 's'}`;
        }
    } catch {}
}

// Función para verificar elegibilidad de certificado
async function verificarElegibilidad() {
    const btn = document.getElementById('btnGenerarCertificado');
    const textoBoton = document.getElementById('textoBoton');
    const mensaje = document.getElementById('mensajeCertificado');
    const progresoPorcentaje = document.getElementById('progresoPorcentaje');
    const progresoBarra = document.getElementById('progresoBarra');

    // Mostrar estado de carga
    btn.disabled = true;
    textoBoton.textContent = 'Verificando...';
    mensaje.textContent = 'Verificando elegibilidad para generar certificado...';

    try {
        const response = await fetch(`/certificados/{{ $curso->id }}/verificar-elegibilidad`);
        const data = await response.json();

        // Actualizar progreso
        progresoPorcentaje.textContent = `${data.progreso}%`;
        progresoBarra.style.width = `${data.progreso}%`;

        if (data.elegible) {
            if (data.ya_tiene_certificado) {
                // Ya tiene certificado
                mensaje.textContent = data.mensaje;
                btn.innerHTML = `
                    <span class="material-icons mr-3 text-lg">visibility</span>
                    <span>Ver Certificado</span>
                `;
                btn.onclick = () => window.location.href = `/certificados/${data.certificado_id}`;
                btn.className = btn.className.replace('from-emerald-600 to-teal-600', 'from-blue-600 to-purple-600');
            } else {
                // Puede generar certificado
                mensaje.textContent = data.mensaje;
                btn.innerHTML = `
                    <span class="material-icons mr-3 text-lg">workspace_premium</span>
                    <span>Generar Certificado</span>
                `;
                btn.onclick = () => window.location.href = `{{ route('certificados.generar', $curso) }}`;
            }
        } else {
            // No es elegible
            mensaje.textContent = data.mensaje;
            btn.innerHTML = `
                <span class="material-icons mr-3 text-lg">lock</span>
                <span>Progreso Insuficiente</span>
            `;
            btn.className = btn.className.replace('from-emerald-600 to-teal-600', 'from-gray-500 to-gray-600');
            btn.disabled = true;
        }

        // Actualizar colores de la barra de progreso según el estado
        if (data.progreso >= 80) {
            progresoBarra.className = 'bg-gradient-to-r from-emerald-500 to-teal-600 h-2 rounded-full transition-all duration-500';
        } else if (data.progreso >= 50) {
            progresoBarra.className = 'bg-gradient-to-r from-yellow-500 to-orange-600 h-2 rounded-full transition-all duration-500';
        } else {
            progresoBarra.className = 'bg-gradient-to-r from-red-500 to-pink-600 h-2 rounded-full transition-all duration-500';
        }

    } catch (error) {
        console.error('Error verificando elegibilidad:', error);
        mensaje.textContent = 'Error al verificar elegibilidad. Inténtalo nuevamente.';
        btn.innerHTML = `
            <span class="material-icons mr-3 text-lg">error</span>
            <span>Error</span>
        `;
        btn.className = btn.className.replace('from-emerald-600 to-teal-600', 'from-red-500 to-pink-600');
    } finally {
        btn.disabled = false;
    }
}

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

    // Manejar formulario de nueva pregunta
    const preguntaForm = document.getElementById('nuevaPreguntaForm');
    if (preguntaForm) {
        preguntaForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    // Mostrar estado de carga
            submitBtn.innerHTML = '<span class="material-icons text-sm mr-2 animate-spin">refresh</span>Publicando...';
    submitBtn.disabled = true;

    try {
                const response = await fetch('/api/comentarios-curso', {
            method: 'POST',
                    body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
        });

        if (response.ok) {
            const result = await response.json();

                    // Limpiar formulario
                    this.reset();
                    document.getElementById('parentIdInput').value = '';

                    // Mostrar notificación de éxito
                    mostrarNotificacion('¡Pregunta publicada exitosamente!', 'success');

                    // Recargar comentarios
                    cargarComentarios();
        } else {
            const error = await response.json();
                    mostrarNotificacion(error.message || 'Error al publicar la pregunta', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        mostrarNotificacion('Error de conexión. Inténtalo de nuevo.', 'error');
    } finally {
        // Restaurar botón
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
        });
    }

    // Cargar comentarios existentes
    window.currentUserId = {{ auth()->id() }};
    window.currentUserName = @json(Auth::user()->name ?? Auth::user()->nombre ?? 'Estudiante');
    window.creadorAvatarUrl = @json($curso->creador_avatar_url ?? null);
    window.creadorIniciales = @json($creadorIniciales ?? 'SL');
    cargarComentarios();
    cargarEstadisticasComentarios();

    // Verificar elegibilidad de certificado automáticamente
    setTimeout(() => {
        verificarElegibilidad();
    }, 1000);

    const btnMarcarLeidos = document.getElementById('btnMarcarLeidos');
    if (btnMarcarLeidos) {
        btnMarcarLeidos.addEventListener('click', async () => {
            try {
                const res = await fetch('/api/comentarios-curso/marcar-leidos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
                    body: JSON.stringify({ curso_id: {{ $curso->id }} })
                });
                if (res.ok) { mostrarNotificacion('Marcados como leídos', 'success'); cargarEstadisticasComentarios(); }
            } catch {}
        });
    }

    // Inicializar Video.js para el video inicial si existe
    const initialVideo = document.getElementById('initial-video-player');
    if (initialVideo && typeof videojs !== 'undefined') {
        window.currentVideoPlayer = videojs('initial-video-player', {
            fluid: true,
            responsive: true,
            controls: true,
            playbackRates: [0.5, 1, 1.25, 1.5, 2],
            techOrder: ['html5'],
            html5: {
                vhs: {
                    overrideNative: true
                },
                nativeVideoTracks: false,
                nativeAudioTracks: false,
                nativeTextTracks: false
            }
        });

        // Protección contra descarga para video inicial
        const initialVideoContainer = document.getElementById('initial-video-player-container');
        if (initialVideoContainer) {
            // Prevenir clic derecho
            initialVideoContainer.addEventListener('contextmenu', function(e) {
                e.preventDefault();
                return false;
            });

            // Prevenir arrastrar
            initialVideoContainer.addEventListener('dragstart', function(e) {
                e.preventDefault();
                return false;
            });

            // Prevenir selección
            initialVideoContainer.addEventListener('selectstart', function(e) {
                e.preventDefault();
                return false;
            });
        }

        // Protección en el elemento video
        if (initialVideo) {
            initialVideo.addEventListener('contextmenu', function(e) {
                e.preventDefault();
                return false;
            });

            initialVideo.addEventListener('dragstart', function(e) {
                e.preventDefault();
                return false;
            });

            // Prevenir guardar con Ctrl+S
            initialVideo.addEventListener('keydown', function(e) {
                if (e.ctrlKey && (e.key === 's' || e.key === 'S')) {
                    e.preventDefault();
                    return false;
                }
            });
        }

        // Asegurar que el botón de pantalla completa funcione
        window.currentVideoPlayer.ready(function() {
            console.log('Video inicial inicializado con controles completos, incluyendo pantalla completa');
            });
        }

});
</script>
@endsection
