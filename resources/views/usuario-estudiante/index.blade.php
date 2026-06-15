@extends('layouts.app')

@section('title', 'Bienvenido - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative">
    <!-- Fullscreen Loader -->
    <div id="page-loader" class="fixed inset-0 z-[1000] flex items-center justify-center bg-black">
        <div class="flex flex-col items-center gap-3 sm:gap-4 text-center px-4">
            <div class="relative w-24 h-24 sm:w-32 sm:h-32">
                <div id="loader-progress" class="loader-progress absolute inset-0 rounded-full pointer-events-none"></div>
                <div class="loader-ring neon-cyan absolute inset-0 rounded-full"></div>
                <div class="loader-ring neon-magenta absolute inset-1 rounded-full" style="animation-direction: reverse; animation-duration: 1.6s;"></div>
                <div class="loader-dots absolute inset-0 rounded-full"></div>
                <div class="absolute inset-2 sm:inset-3 rounded-full bg-black flex items-center justify-center overflow-hidden">
                    <div class="absolute inset-0 loader-sheen"></div>
                    <span class="material-icons text-white text-5xl sm:text-6xl drop-shadow-[0_0_8px_rgba(34,211,238,.55)]" style="filter: drop-shadow(0 0 12px rgba(34,211,238,0.6));">school</span>
                </div>
            </div>
            <!-- SoftlinkIA Friend (floating buddy) -->
            <div id="sl-friend" class="absolute right-3 bottom-3 sm:right-6 sm:bottom-6 select-none pointer-events-none z-[1500]">
                <div class="relative w-20 h-20 sm:w-28 sm:h-28">
                    <div id="sl-friend-bubble" class="absolute -top-12 sm:-top-16 right-0 max-w-[180px] sm:max-w-[220px] text-xs sm:text-sm bg-white/95 text-slate-900 rounded-xl px-2.5 sm:px-3 py-1.5 sm:py-2 shadow-md border border-slate-200 hidden"></div>
                    <img src="{{ asset('wallpaper-media/softlinkia-friend.png') }}" alt="SoftlinkIA Friend" class="w-20 h-20 sm:w-28 sm:h-28 object-contain drop-shadow-[0_0_18px_rgba(34,211,238,.55)] sl-float"/>
                </div>
            </div>
            <h2 class="text-white text-sm sm:text-lg font-semibold tracking-wider uppercase font-mono">
                <span id="loader-typing" class="text-gradient-chrome"></span>
                <span class="text-cyan-300" id="loader-cursor">▍</span>
            </h2>

        </div>
    </div>
    <main class="relative max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-6 lg:py-8 bg-slate-900/95 backdrop-blur-sm">
        <!-- Background wallpaper video (disabled by request)
        <video id="bg-video" class="absolute inset-0 w-full h-full object-cover pointer-events-none opacity-25 z-10" autoplay loop muted playsinline>
            <source src="{{ asset('wallpaper-media/238453.mp4') }}" type="video/mp4">
        </video>
        -->
        <!-- Global Matrix Rain background for all sections -->
        <canvas id="matrix-canvas" class="absolute inset-0 w-full h-full pointer-events-none opacity-20 z-0"></canvas>
        <!-- CRT scanlines overlay -->
        <div class="crt-overlay absolute inset-0 pointer-events-none z-0"></div>

        <!-- SoftlinkIA Friend (persistent on page) -->
        <div id="sl-friend-main" class="fixed right-2 bottom-2 sm:right-4 sm:bottom-4 z-[900] select-none">
            <div class="relative w-20 h-20 sm:w-28 sm:h-28 draggable" id="sl-friend-main-avatar">
                <div id="sl-friend-main-bubble" class="absolute -top-20 sm:-top-24 right-0 max-w-[280px] sm:max-w-[360px] text-xs sm:text-sm bg-slate-900/70 backdrop-blur text-white/95 rounded-2xl px-3 sm:px-4 py-2 sm:py-2.5 shadow-lg border border-white/10 hidden">
                    <div class="bubble-dots"><span></span><span></span><span></span></div>
                </div>
                <img src="{{ asset('wallpaper-media/softlinkia-friend.png') }}" alt="SoftlinkIA Friend" class="w-20 h-20 sm:w-28 sm:h-28 object-contain drop-shadow-[0_0_18px_rgba(34,211,238,.55)] sl-float"/>
            </div>
        </div>
        <!-- Hero -->
        <section class="relative overflow-hidden mb-6 sm:mb-8 lg:mb-10 z-20" id="hero-section">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-indigo-500/10"></div>
            <div class="relative rounded-xl sm:rounded-2xl border border-slate-300/10 bg-white/10 backdrop-blur-lg p-4 sm:p-6 lg:p-10 shadow-[0_8px_24px_rgba(2,6,23,0.35)]">
                <!-- Hero Toast (buddy talks here) -->
                <div id="hero-buddy-bubble" class="hidden absolute top-2 right-2 sm:top-4 sm:right-4 max-w-[280px] sm:max-w-[420px] text-xs sm:text-sm bg-slate-900/70 backdrop-blur text-white/95 rounded-xl sm:rounded-2xl px-3 sm:px-4 py-2 sm:py-2.5 shadow-xl border border-white/10">
                    <div id="hero-buddy-text">Hola! Soy tu amigo SoftlinkIA.</div>
                </div>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 sm:gap-6">
                    <div class="flex-1">
                        <h1 class="glitch animated-title text-xl sm:text-2xl md:text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-tight" data-text="¡Hola {{ Auth::user()->name }}! ¿Listo para aprender hoy?">
                            ¡Hola {{ Auth::user()->name }}! ¿Listo para aprender hoy?
                        </h1>
                        <p class="mt-2 text-slate-300 text-sm sm:text-base max-w-2xl">
                            Explora cursos, continúa donde te quedaste y descubre contenido recomendado para ti.
                        </p>
                        <div class="mt-3 sm:mt-4 flex flex-col sm:flex-row gap-2 sm:gap-3">
                            <a href="{{ route('cursos.catalogo') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 sm:py-2 rounded-lg bg-cyan-600 hover:bg-cyan-500 text-white font-semibold transition text-sm sm:text-base">
                                <span class="material-icons text-sm">library_books</span>
                                <span class="hidden xs:inline">Catálogo de cursos</span>
                                <span class="xs:hidden">Cursos</span>
                            </a>
                            <a href="{{ route('articulos.catalogo') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 sm:py-2 rounded-lg bg-slate-700 hover:bg-slate-600 text-white font-semibold transition text-sm sm:text-base">
                                <span class="material-icons text-sm">article</span>
                                <span class="hidden xs:inline">Blog y artículos</span>
                                <span class="xs:hidden">Blog</span>
                            </a>
                        </div>
                    </div>
                    <div class="flex-shrink-0 mt-4 md:mt-0 flex justify-center">
                        <div class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 rounded-xl sm:rounded-2xl bg-gradient-to-tr from-cyan-500/30 to-indigo-500/30 border border-cyan-400/20 flex items-center justify-center">
                            <img src="{{ asset('wallpaper-media/softlinkia-friend.png') }}" alt="SoftlinkIA Friend" class="w-20 h-20 sm:w-28 sm:h-28 md:w-32 md:h-32 object-contain drop-shadow-[0_0_18px_rgba(34,211,238,0.55)]" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hero Carousel: elegante, moderno, interactivo -->
        <section class="relative mb-6 sm:mb-8 lg:mb-10 z-20">
            <!-- Parallax layers -->
            <div class="pointer-events-none absolute inset-0 overflow-hidden rounded-xl sm:rounded-2xl" aria-hidden="true">
                <div class="parallax-layer layer-1"></div>
                <div class="parallax-layer layer-2"></div>
                <div class="parallax-layer layer-3"></div>
            </div>

            <div class="relative overflow-hidden rounded-xl sm:rounded-2xl border border-slate-700/50 bg-slate-800/50" id="hero-carousel" data-tilt-container>
                <!-- Canvas Particles (3D-ish) -->
                <canvas id="hero-particles" class="absolute inset-0 w-full h-full pointer-events-none"></canvas>
                <!-- Slides -->
                <div class="relative">
                    <!-- Slide 1 -->
                    <div class="carousel-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <div class="p-4 sm:p-6 lg:p-12">
                                <div class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-semibold bg-cyan-500/15 text-cyan-300 border border-cyan-400/30 mb-3 sm:mb-4">Recompensa por progreso</div>
                                <h3 class="text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-2 sm:mb-3">Tu progreso debería ser recompensado</h3>
                                <p class="text-slate-300 text-sm sm:text-base mb-4 sm:mb-6 max-w-xl">Ahorra un 25% en un año de aprendizaje con el Plan Personal. Una recompensa especial para estudiantes como tú.</p>
                            <a href="#" class="btn-glitch magnet inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2.5 sm:py-3 rounded-lg sm:rounded-xl bg-cyan-600 hover:bg-cyan-500 text-white font-semibold transition text-sm sm:text-base">
                                    <span class="material-icons text-sm">local_offer</span>
                                    <span class="hidden xs:inline">Recibir oferta</span>
                                    <span class="xs:hidden">Oferta</span>
                                </a>
                            </div>
                            <div class="relative hidden lg:block">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-indigo-500/20"></div>
                                <img src="{{ asset('public/images/logos/hero-study-1.jpg') }}" alt="Aprendizaje" class="w-full h-full object-cover rounded-r-2xl">
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-slide hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <div class="p-4 sm:p-6 lg:p-12">
                                <div class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/15 text-purple-300 border border-purple-400/30 mb-3 sm:mb-4">Ruta guiada</div>
                                <h3 class="text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-2 sm:mb-3">Sigue una ruta y domina nuevas habilidades</h3>
                                <p class="text-slate-300 text-sm sm:text-base mb-4 sm:mb-6 max-w-xl">Completa módulos semanales y recibe certificados al finalizar. Todo curado para tu nivel.</p>
                                <a href="{{ route('usuario.cursos.catalogo') }}" class="btn-glitch magnet inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2.5 sm:py-3 rounded-lg sm:rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-semibold transition text-sm sm:text-base">
                                    <span class="material-icons text-sm">route</span>
                                    <span class="hidden xs:inline">Explorar rutas</span>
                                    <span class="xs:hidden">Rutas</span>
                                </a>
                            </div>
                            <div class="relative hidden lg:block">
                                <div class="absolute inset-0 bg-gradient-to-br from-fuchsia-500/20 to-blue-500/20"></div>
                                <img src="{{ asset('public/images/logos/hero-study-2.jpg') }}" alt="Rutas" class="w-full h-full object-cover rounded-r-2xl">
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-slide hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <div class="p-4 sm:p-6 lg:p-12">
                                <div class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-300 border border-emerald-400/30 mb-3 sm:mb-4">Aprende a tu ritmo</div>
                                <h3 class="text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-2 sm:mb-3">Lecciones cortas, impacto enorme</h3>
                                <p class="text-slate-300 text-sm sm:text-base mb-4 sm:mb-6 max-w-xl">Mira videos cortos en cualquier dispositivo y continúa exactamente donde te quedaste.</p>
                                <a href="{{ route('articulos.catalogo') }}" class="btn-glitch magnet inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2.5 sm:py-3 rounded-lg sm:rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold transition text-sm sm:text-base">
                                    <span class="material-icons text-sm">play_circle</span>
                                    <span class="hidden xs:inline">Ver contenido</span>
                                    <span class="xs:hidden">Contenido</span>
                                </a>
                            </div>
                            <div class="relative hidden lg:block">
                                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/20 to-cyan-500/20"></div>
                                <img src="{{ asset('public/images/logos/hero-study-3.jpg') }}" alt="Videos" class="w-full h-full object-cover rounded-r-2xl">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <button type="button" class="absolute left-2 sm:left-3 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-slate-900/70 hover:bg-slate-900/90 border border-white/10 flex items-center justify-center text-white touch-manipulation" data-carousel-prev>
                    <span class="material-icons text-sm sm:text-base">chevron_left</span>
                </button>
                <button type="button" class="absolute right-2 sm:right-3 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-slate-900/70 hover:bg-slate-900/90 border border-white/10 flex items-center justify-center text-white touch-manipulation" data-carousel-next>
                    <span class="material-icons text-sm sm:text-base">chevron_right</span>
                </button>

                <!-- Indicators -->
                <div class="absolute bottom-2 sm:bottom-3 left-0 right-0 flex items-center justify-center gap-1.5 sm:gap-2">
                    <span class="carousel-dot w-2 h-2 sm:w-2.5 sm:h-2.5 rounded-full bg-white/40"></span>
                    <span class="carousel-dot w-2 h-2 sm:w-2.5 sm:h-2.5 rounded-full bg-white/40"></span>
                    <span class="carousel-dot w-2 h-2 sm:w-2.5 sm:h-2.5 rounded-full bg-white/40"></span>
                </div>
            </div>
        </section>

        <!-- Continuar aprendiendo -->
        @if(isset($enCurso) && $enCurso->count())
        <section class="mb-6 sm:mb-8 lg:mb-10 z-20">
            <div class="flex items-center justify-between mb-3 sm:mb-4">
                <h2 class="animated-subtitle text-lg sm:text-xl font-bold text-white">Continúa aprendiendo</h2>
                <a href="{{ route('cursos.catalogo') }}" class="text-white/80 text-xs sm:text-sm hover:text-white">Ver todos</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4">
                @foreach($enCurso as $curso)
                <a href="{{ route('usuario.cursos.catalogo') }}" class="tilt-card reveal group rounded-xl border border-slate-300/10 bg-white/10 backdrop-blur-lg hover:bg-white/15 transition overflow-hidden shadow-[0_8px_24px_rgba(2,6,23,0.35)]">
                    <div class="aspect-video bg-slate-900/60">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}" alt="{{ $curso->titulo }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="p-3 sm:p-4">
                        <div class="text-slate-300 text-xs sm:text-sm mb-1">{{ $curso->categoria->nombre ?? 'Curso' }}</div>
                        <h3 class="text-white font-semibold line-clamp-2 text-sm sm:text-base">{{ $curso->titulo }}</h3>
                        @if(isset($curso->pivot) && $curso->pivot->progreso !== null)
                        <div class="mt-2 sm:mt-3">
                            <div class="h-1.5 sm:h-2 bg-slate-700 rounded">
                                <div class="h-1.5 sm:h-2 bg-cyan-500 rounded" style="width: {{ (float)$curso->pivot->progreso }}%"></div>
                            </div>
                            <div class="text-xs text-slate-400 mt-1">Progreso: {{ number_format((float)$curso->pivot->progreso, 0) }}%</div>
                        </div>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Recomendados -->
        <section class="mb-8 sm:mb-10 lg:mb-12 z-20">
            <div class="flex items-center justify-between mb-3 sm:mb-4">
                <h2 class="animated-subtitle text-lg sm:text-xl font-bold text-white">Recomendaciones para ti</h2>
                <a href="{{ route('cursos.catalogo') }}" class="text-white/80 text-xs sm:text-sm hover:text-white">Explorar más</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4">
                @forelse($recomendados as $curso)
                <a href="{{ route('usuario.cursos.catalogo') }}" class="tilt-card reveal group rounded-xl border border-slate-300/10 bg-white/10 backdrop-blur-lg hover:bg-white/15 transition overflow-hidden shadow-[0_8px_24px_rgba(2,6,23,0.35)]">
                    <div class="aspect-video bg-slate-900/60">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}" alt="{{ $curso->titulo }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="p-3 sm:p-4">
                        <div class="text-slate-300 text-xs sm:text-sm mb-1">{{ $curso->categoria->nombre ?? 'Curso' }}</div>
                        <h3 class="text-white font-semibold line-clamp-2 text-sm sm:text-base">{{ $curso->titulo }}</h3>
                        <div class="mt-2 text-cyan-300 text-xs sm:text-sm font-semibold">{{ $curso->precio > 0 ? ('$'.number_format($curso->precio,2)) : 'Gratis' }}</div>
                    </div>
                </a>
                @empty
                <div class="text-slate-400 text-sm sm:text-base">No hay recomendaciones por ahora.</div>
                @endforelse
            </div>
        </section>

        <!-- Empecemos a aprender (continuos) -->
        <section class="mb-8 sm:mb-10 lg:mb-12 z-20">
            <div class="flex items-center justify-between mb-3 sm:mb-4">
                <h2 class="animated-subtitle text-lg sm:text-xl font-bold text-white">Empecemos a aprender</h2>
                <a href="{{ route('usuario.cursos.catalogo') }}" class="text-white/80 text-xs sm:text-sm hover:text-white">Mi aprendizaje</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                @foreach(($enCurso ?? collect())->take(4) as $curso)
                <a href="{{ route('usuario.cursos.catalogo') }}" class="flex items-center gap-3 rounded-xl border border-slate-300/10 bg-white/10 backdrop-blur-lg hover:bg-white/15 transition p-3 shadow-[0_8px_24px_rgba(2,6,23,0.35)]">
                    <div class="w-14 h-14 rounded-lg overflow-hidden bg-slate-900/60 flex items-center justify-center">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}" class="w-full h-full object-cover" alt="{{ $curso->titulo }}">
                        @else
                            <span class="material-icons text-slate-400 text-lg sm:text-xl">play_circle</span>
                        @endif
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="text-slate-100 text-xs sm:text-sm font-semibold line-clamp-1">{{ $curso->titulo }}</div>
                        <div class="mt-1 h-1.5 sm:h-2 bg-slate-700 rounded">
                            <div class="h-1.5 sm:h-2 bg-cyan-500 rounded" style="width: {{ number_format((float)($curso->pivot->progreso ?? 0), 0) }}%"></div>
                        </div>
                    </div>
                </a>
                @endforeach
                @if(($enCurso ?? collect())->isEmpty())
                    @for($i=0;$i<4;$i++)
                    <div class="rounded-lg sm:rounded-xl border border-slate-700/50 bg-slate-800/40 p-3 sm:p-4">
                        <div class="flex items-center gap-2 sm:gap-3">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-lg bg-slate-700/60 flex items-center justify-center">
                                <span class="material-icons text-slate-400 text-lg sm:text-xl">play_circle</span>
                            </div>
                            <div class="flex-1">
                                <div class="h-2.5 sm:h-3 bg-slate-700 rounded w-32 sm:w-40 mb-2"></div>
                                <div class="h-1.5 sm:h-2 bg-slate-700 rounded w-20 sm:w-24"></div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>
        </section>

        <!-- Cursos en tendencia -->
        <section class="mb-8 sm:mb-10 lg:mb-12 z-20">
            <div class="flex items-center justify-between mb-3 sm:mb-4">
                <h2 class="animated-subtitle text-lg sm:text-xl font-bold text-white">Cursos en tendencia</h2>
                <a href="{{ route('usuario.cursos.catalogo') }}" class="text-white/80 text-xs sm:text-sm hover:text-white">Ver más</a>
            </div>
            @php($tendencia = ($recomendados ?? collect())->take(8))
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                @foreach($tendencia as $curso)
                <a href="{{ route('usuario.cursos.catalogo') }}" class="tilt-card reveal group rounded-xl border border-slate-300/10 bg-white/10 backdrop-blur-lg hover:bg-white/15 transition overflow-hidden shadow-[0_8px_24px_rgba(2,6,23,0.35)]">
                    <div class="aspect-video bg-slate-900/60">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}" class="w-full h-full object-cover" alt="{{ $curso->titulo }}">
                        @endif
                    </div>
                    <div class="p-2.5 sm:p-4">
                        <div class="text-slate-300 text-xs mb-1 flex items-center">
                            <span class="material-icons text-xs mr-1">trending_up</span>{{ $curso->categoria->nombre ?? 'Curso' }}
                        </div>
                        <h3 class="text-white text-xs sm:text-sm font-semibold line-clamp-2">{{ $curso->titulo }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </section>

        <!-- Recomendaciones según valoraciones (placeholder con mismos datos) -->
        <section class="mb-8 sm:mb-10 lg:mb-12">
            <div class="flex items-center justify-between mb-3 sm:mb-4">
                <h2 class="animated-subtitle text-lg sm:text-xl font-bold text-white">Recomendaciones según valoraciones</h2>
            </div>
            @php($valorados = ($recomendados ?? collect())->take(6))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                @foreach($valorados as $curso)
                <a href="{{ route('usuario.cursos.catalogo') }}" class="tilt-card reveal group rounded-xl border border-slate-300/10 bg-white/10 backdrop-blur-lg hover:bg-white/15 transition overflow-hidden p-4 flex items-center shadow-[0_8px_24px_rgba(2,6,23,0.35)]">
                    <div class="w-24 h-16 rounded-lg overflow-hidden bg-slate-900/60 mr-4">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}" class="w-full h-full object-cover" alt="{{ $curso->titulo }}">
                        @endif
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="text-slate-300 text-xs mb-1">{{ $curso->categoria->nombre ?? 'Curso' }}</div>
                        <h3 class="text-white text-xs sm:text-sm font-semibold line-clamp-2">{{ $curso->titulo }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </section>

        <!-- Cursos destacados -->
        <section class="mb-8 sm:mb-10 lg:mb-12">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3 sm:mb-4 gap-2 sm:gap-0">
                <h2 class="animated-subtitle text-lg sm:text-xl font-bold text-white">Cursos destacados</h2>
                <div class="flex gap-1.5 sm:gap-2 text-xs">
                    <span class="px-2 py-1 rounded-lg border border-slate-700/50 text-slate-300">Más populares</span>
                    <span class="px-2 py-1 rounded-lg border border-slate-700/50 text-slate-300">Nuevo</span>
                    <span class="px-2 py-1 rounded-lg border border-slate-700/50 text-slate-300 hidden sm:inline">Intermedio y avanzado</span>
                </div>
            </div>
            @php($destacados = ($recomendados ?? collect())->take(8))
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                @foreach($destacados as $curso)
                <a href="{{ route('usuario.cursos.catalogo') }}" class="tilt-card reveal group rounded-xl border border-slate-300/10 bg-white/10 backdrop-blur-lg hover:bg-white/15 transition overflow-hidden shadow-[0_8px_24px_rgba(2,6,23,0.35)]">
                    <div class="aspect-video bg-slate-900/60">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}" class="w-full h-full object-cover" alt="{{ $curso->titulo }}">
                        @endif
                    </div>
                    <div class="p-2.5 sm:p-4">
                        <h3 class="text-white text-xs sm:text-sm font-semibold line-clamp-2">{{ $curso->titulo }}</h3>
                        <div class="mt-2 text-cyan-300 text-xs sm:text-sm font-semibold">{{ $curso->precio > 0 ? ('$'.number_format($curso->precio,2)) : 'Gratis' }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </section>

        <!-- Recomendaciones según valoraciones -->
        <section class="mb-12 z-20">
            <h2 class="animated-subtitle text-xl font-bold text-white mb-4">Articulos Recomendados</h2>
            @include('admin.articulos.components.shared.articulos-relacionados', ['articulos' => $articulosRelacionados, 'routeName' => 'articulos.ver'])
        </section>

        <!-- Temas recomendados -->
        <!-- Temas populares -->
        <section class="z-20">
            <h2 class="animated-subtitle text-lg sm:text-xl font-bold text-white mb-3 sm:mb-4">Explora por categorías</h2>
            <div class="flex flex-wrap gap-2 sm:gap-3">
                @foreach($categorias as $cat)
                    <a href="{{ route('cursos.catalogo', ['categoria_id' => $cat->id]) }}" class="chip-glow reveal px-2.5 sm:px-3 py-1.5 sm:py-2 rounded-lg border border-slate-300/10 bg-white/10 backdrop-blur-lg text-white/90 hover:text-white hover:border-cyan-500/60 hover:bg-white/15 transition text-xs sm:text-sm shadow-[0_8px_24px_rgba(2,6,23,0.35)]">
                        <span class="material-icons text-xs sm:text-sm align-[-3px] mr-1">sell</span>{{ $cat->nombre }}
                    </a>
                @endforeach
            </div>
        </section>
    </main>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/usuario-estudiante-index.css') }}">
@endpush

@push('scripts')
<script>
    // Pasar datos de PHP a JavaScript
    window.USER_NAME = @json(Auth::user()->name ?? '');
</script>
<script src="{{ asset('js/usuarios/estudiante-index.js') }}"></script>
@endpush
