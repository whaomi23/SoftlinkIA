@extends('layouts.app')

@section('title', 'SoftLinkIA - Software, AI and Digital Solutions')

@section('content')
    <!-- Incluir el layout de modales -->
    @include('layouts.x-layout')

    <!-- Hero Banner -->
    <section class="relative min-h-[70vh] md:h-screen flex items-center justify-center overflow-hidden">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('/background-images-pages/home-background.jpg');"></div>
        <div class="absolute inset-0 bg-black/20"></div>

        <!-- Fondo con gradiente más suave -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/50 via-blue-900/40 to-cyan-900/50"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-purple-900/20 via-transparent to-cyan-500/15"></div>
        <div class="absolute inset-0 bg-black/5"></div>

        <!-- Efectos de partículas -->
        <div class="absolute inset-0 overflow-hidden hidden sm:block">
            <div class="particles-container">
                <div class="particle particle-1"></div>
                <div class="particle particle-2"></div>
                <div class="particle particle-3"></div>
                <div class="particle particle-4"></div>
                <div class="particle particle-5"></div>
                <div class="particle particle-6"></div>
                <div class="particle particle-7"></div>
                <div class="particle particle-8"></div>
            </div>
        </div>

        <!-- Efectos de luz -->
        <div class="absolute inset-0 hidden sm:block">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/15 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-500/15 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-40 text-center text-white px-4 max-w-5xl mx-auto" data-aos="fade-up">
            <div class="mb-8">
                <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight">
                    <span id="typewriter-1" class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">

                    </span>
                    <br>
                    <span id="typewriter-2" class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">

                    </span>
                    <br>
                    <span id="typewriter-3" class="text-3xl md:text-4xl bg-gradient-to-r from-purple-400 via-pink-500 to-cyan-400 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 1s;">

                    </span>
                </h1>
            </div>

            <p class="text-lg md:text-xl mb-12 text-slate-200 max-w-4xl mx-auto leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                <span class="font-semibold text-cyan-300">+5 años</span> de experiencia creando
                <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">experiencias digitales excepcionales</span>
                que impulsan el futuro de tu negocio
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center" data-aos="fade-up" data-aos-delay="600">
                <!-- Botón Nuestros Servicios con efectos de neón -->
                <a href="{{ route('servicios.consultoria-ti') }}"
                   class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 text-white px-8 py-4 sm:px-10 sm:py-5 rounded-2xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-cyan-500/50">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                    <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                    <!-- Partículas de neón -->
                    <div class="absolute top-2 left-4 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                    <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>
                    <div class="absolute top-1/2 right-4 w-1 h-1 bg-purple-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.5s"></div>

                    <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">rocket_launch</span>
                    <span class="relative z-10 bg-gradient-to-r from-white to-cyan-100 bg-clip-text text-transparent group-hover:from-yellow-200 group-hover:to-white transition-all duration-500">Nuestros Servicios</span>

                    <!-- Borde de neón -->
                    <div class="absolute inset-0 rounded-2xl border-2 border-cyan-400/50 group-hover:border-cyan-300 group-hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] transition-all duration-500"></div>
                </a>

                <!-- Botón WhatsApp con efectos de neón -->
                <a href="https://wa.me/5215522614633" target="_blank"
                   class="neon-button-secondary group relative overflow-hidden border-3 border-green-400 text-green-400 px-8 py-4 sm:px-10 sm:py-5 rounded-2xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-green-500/20 hover:to-emerald-500/20">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-r from-green-400/10 via-emerald-400/10 to-green-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                    <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-green-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                    <!-- Partículas de neón -->
                    <div class="absolute top-2 left-4 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                    <div class="absolute bottom-3 right-6 w-1 h-1 bg-emerald-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>
                    <div class="absolute top-1/2 left-6 w-1 h-1 bg-green-200 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.6s"></div>

                    <!-- Icono SVG de WhatsApp -->
                    <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                    </svg>
                    <span class="relative z-10 bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent group-hover:from-yellow-300 group-hover:to-green-200 transition-all duration-500">WhatsApp</span>

                    <!-- Borde de neón animado -->
                    <div class="absolute inset-0 rounded-2xl border-2 border-green-400 group-hover:border-green-300 group-hover:shadow-[0_0_25px_rgba(34,197,94,0.8)] transition-all duration-500"></div>
                    <div class="absolute inset-0 rounded-2xl border border-green-300/30 group-hover:border-green-200/50 group-hover:shadow-[inset_0_0_15px_rgba(34,197,94,0.3)] transition-all duration-500"></div>
                </a>
            </div>
        </div>
    </section>

    <!-- Confían en Nosotros -->
    <section class="py-16 relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">

        <!-- Elementos de parallax -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="parallax-element" data-speed="0.3" style="top: 10%; left: 10%;">
                <div class="w-32 h-32 bg-cyan-500/10 rounded-full blur-xl animate-pulse"></div>
            </div>
            <div class="parallax-element" data-speed="0.7" style="top: 60%; right: 15%;">
                <div class="w-24 h-24 bg-purple-500/10 rounded-full blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            </div>
            <div class="parallax-element" data-speed="0.4" style="bottom: 20%; left: 20%;">
                <div class="w-40 h-40 bg-blue-500/10 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="text-center mb-16 slide-up-animation" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 text-glow">
                    Confían en <span class="text-cyan-400 gradient-text">Nosotros</span>
                </h2>
                <p class="text-xl text-slate-300 max-w-3xl mx-auto">
                    Organizaciones líderes confían en nuestra experiencia y soluciones tecnológicas
                </p>
            </div>

            <!-- Carrusel de logos de clientes -->
            <div class="glass-effect-enhanced rounded-3xl p-4 sm:p-8 md:p-12 mx-auto max-w-5xl mb-8 floating-card" data-aos="fade-up" data-aos-delay="200">
                <!-- Carrusel rotativo de logos -->
                <div class="mb-8" data-aos="fade-up">
                    <div class="relative overflow-hidden">
                        <!-- Contenedor del carrusel -->
                        <div id="carousel-container" class="flex transition-transform duration-700 ease-in-out" style="transform: translateX(0%)">
                            <!-- Logo 1 - SEDENA -->
                            <div class="carousel-item flex-shrink-0 w-full flex justify-center items-center" data-client="0">
                                <div class="client-logo-main cursor-pointer transform transition-all duration-500 hover:scale-110">
                                    <img src="/images/logos/Sedena.png" alt="SEDENA" class="h-20 sm:h-24 md:h-28 w-auto object-contain filter hover:drop-shadow-2xl">
                                </div>
                            </div>
                            <!-- Logo 2 - Telmex -->
                            <div class="carousel-item flex-shrink-0 w-full flex justify-center items-center" data-client="1">
                                <div class="client-logo-main cursor-pointer transform transition-all duration-500 hover:scale-110">
                                    <img src="/images/logos/telmex.svg" alt="Telmex" class="h-16 sm:h-20 md:h-24 w-auto object-contain filter hover:drop-shadow-2xl">
                                </div>
                            </div>
                            <!-- Logo 3 - TCF -->
                            <div class="carousel-item flex-shrink-0 w-full flex justify-center items-center" data-client="2">
                                <div class="client-logo-main cursor-pointer transform transition-all duration-500 hover:scale-110">
                                    <img src="/images/logos/TCF.png" alt="TCF" class="h-20 sm:h-24 md:h-28 w-auto object-contain filter hover:drop-shadow-2xl">
                                </div>
                            </div>
                            <!-- Logo 4 - SAT -->
                            <div class="carousel-item flex-shrink-0 w-full flex justify-center items-center" data-client="3">
                                <div class="client-logo-main cursor-pointer transform transition-all duration-500 hover:scale-110">
                                    <img src="/images/logos/SAT.png" alt="SAT" class="h-16 sm:h-20 md:h-24 w-auto object-contain filter hover:drop-shadow-2xl">
                                </div>
                            </div>
                            <!-- Logo 5 - Banco Bienestar -->
                            <div class="carousel-item flex-shrink-0 w-full flex justify-center items-center" data-client="4">
                                <div class="client-logo-main cursor-pointer transform transition-all duration-500 hover:scale-110">
                                    <img src="/images/logos/banco-bienestar.svg" alt="Banco Bienestar" class="h-16 sm:h-20 md:h-24 w-auto object-contain filter hover:drop-shadow-2xl">
                                </div>
                            </div>
                            <!-- Logo 6 - INFONAVIT -->
                            <div class="carousel-item flex-shrink-0 w-full flex justify-center items-center" data-client="5">
                                <div class="client-logo-main cursor-pointer transform transition-all duration-500 hover:scale-110">
                                    <img src="/images/logos/infonavit.jpg" alt="INFONAVIT" class="h-16 sm:h-20 md:h-24 w-auto object-contain filter hover:drop-shadow-2xl">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Línea divisoria -->
                <div class="border-t border-slate-700 my-6"></div>

                <!-- Testimonial destacado -->
                <div id="testimonial-card" class="relative overflow-hidden">
                    <div class="flex flex-col items-center text-center px-8 sm:px-12 md:px-16 lg:px-20">
                        <div class="max-w-4xl">
                            <p id="client-testimonial" class="text-slate-300 text-lg sm:text-xl md:text-2xl italic leading-relaxed mb-6 sm:mb-8">"FerTech ha sido fundamental en la modernización de nuestros sistemas de seguridad, proporcionando soluciones robustas y confiables que cumplen con los más altos estándares de calidad."</p>
                            <div class="mb-6 sm:mb-8">
                                <h3 id="client-name" class="text-xl sm:text-2xl md:text-3xl font-semibold text-white mb-2">SEDENA</h3>
                                <p id="client-position" class="text-cyan-400 text-base sm:text-lg md:text-xl">Secretaría de la Defensa Nacional</p>
                            </div>
                        </div>

                        <!-- Indicadores de testimonios -->
                        <div class="flex justify-center space-x-3 mt-6">
                            <button class="w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 client-dot active hover:scale-125" data-index="0"></button>
                            <button class="w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 client-dot hover:scale-125" data-index="1"></button>
                            <button class="w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 client-dot hover:scale-125" data-index="2"></button>
                            <button class="w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 client-dot hover:scale-125" data-index="3"></button>
                            <button class="w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 client-dot hover:scale-125" data-index="4"></button>
                            <button class="w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 client-dot hover:scale-125" data-index="5"></button>
                        </div>

                        <!-- Botones de navegación - Solo visible en escritorio -->
                        <button id="prev-btn" class="hidden sm:flex absolute left-2 md:left-4 lg:left-8 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-slate-800/90 hover:bg-slate-700 rounded-full items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 shadow-lg z-10">
                            <span class="material-icons text-cyan-400 text-xl">chevron_left</span>
                        </button>
                        <button id="next-btn" class="hidden sm:flex absolute right-2 md:right-4 lg:right-8 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-slate-800/90 hover:bg-slate-700 rounded-full items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 shadow-lg z-10">
                            <span class="material-icons text-cyan-400 text-xl">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section class="py-16 bg-[#0F172A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-12" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3 sm:mb-4">
                    Nuestros Servicios
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-slate-300 max-w-2xl mx-auto">
                    Soluciones integrales para transformar tu negocio digital
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Consultoría TI -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">Consultoría TI</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Asesoramiento estratégico para optimizar tus procesos tecnológicos y maximizar el ROI de tus inversiones en TI.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <a href="{{ route('servicios.consultoria-ti') }}" class="group/link relative overflow-hidden bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-8 py-4 md:px-6 md:py-3 rounded-xl font-semibold text-lg md:text-base hover:from-blue-400 hover:to-cyan-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-blue-500/25 w-full md:w-auto text-center md:text-left">
                                <span class="relative z-10">Explorar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-blue-300 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ciberseguridad -->
                <div class="service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-orange-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-orange-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-red-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-red-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500">Ciberseguridad</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Protección integral de tus activos digitales con las últimas tecnologías y mejores prácticas de seguridad.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <a href="{{ route('servicios.ciberseguridad') }}" class="group/link relative overflow-hidden bg-gradient-to-r from-red-500 to-orange-500 text-white px-8 py-4 md:px-6 md:py-3 rounded-xl font-semibold text-lg md:text-base hover:from-red-400 hover:to-orange-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/25 w-full md:w-auto text-center md:text-left">
                                <span class="relative z-10">Explorar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-orange-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Auditorías -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M9 11l3 3L22 4"></path>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500">Auditorías</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Evaluación exhaustiva de tus sistemas y procesos para identificar oportunidades de mejora y optimización.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <a href="{{ route('servicios.auditorias') }}" class="group/link relative overflow-hidden bg-gradient-to-r from-green-500 to-emerald-500 text-white px-8 py-4 md:px-6 md:py-3 rounded-xl font-semibold text-lg md:text-base hover:from-green-400 hover:to-emerald-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-green-500/25 w-full md:w-auto text-center md:text-left">
                                <span class="relative z-10">Explorar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-teal-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Soluciones SaaS -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-violet-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-violet-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500">Soluciones SaaS</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Desarrollo de aplicaciones en la nube escalables y rentables que se adaptan a las necesidades de tu negocio.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <a href="{{ route('servicios.soluciones-saas') }}" class="group/link relative overflow-hidden bg-gradient-to-r from-purple-500 to-violet-500 text-white px-8 py-4 md:px-6 md:py-3 rounded-xl font-semibold text-lg md:text-base hover:from-purple-400 hover:to-violet-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-purple-500/25 w-full md:w-auto text-center md:text-left">
                                <span class="relative z-10">Explorar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-violet-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reingeniería -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-600/20 via-amber-500/10 to-orange-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-yellow-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-amber-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-yellow-500 to-amber-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-yellow-500 to-amber-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <circle cx="12" cy="12" r="7"></circle>
                                                <circle cx="12" cy="12" r="3"></circle>
                                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-yellow-200 bg-clip-text text-transparent group-hover:from-yellow-300 group-hover:to-amber-300 transition-all duration-500">Reingeniería</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Modernización y optimización de sistemas legacy para mejorar rendimiento, seguridad y mantenibilidad.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <a href="{{ route('servicios.reingenieria') }}" class="group/link relative overflow-hidden bg-gradient-to-r from-yellow-500 to-amber-500 text-white px-8 py-4 md:px-6 md:py-3 rounded-xl font-semibold text-lg md:text-base hover:from-yellow-400 hover:to-amber-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-yellow-500/25 w-full md:w-auto text-center md:text-left">
                                <span class="relative z-10">Explorar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-amber-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-orange-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Soluciones a Medida -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-blue-500/10 to-cyan-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-indigo-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <polyline points="16 18 22 12 16 6"></polyline>
                                                <polyline points="8 6 2 12 8 18"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-blue-300 transition-all duration-500">Soluciones a Medida</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Desarrollo de software personalizado que se adapta perfectamente a los procesos únicos de tu organización.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <a href="{{ route('servicios.soluciones-medida') }}" class="group/link relative overflow-hidden bg-gradient-to-r from-indigo-500 to-blue-500 text-white px-8 py-4 md:px-6 md:py-3 rounded-xl font-semibold text-lg md:text-base hover:from-indigo-400 hover:to-blue-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/25 w-full md:w-auto text-center md:text-left">
                                <span class="relative z-10">Explorar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top-notch Technologies We Master -->
    <section class="py-16 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative overflow-hidden">
        <!-- Efectos de fondo -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Tecnologías de <span class="text-cyan-400 gradient-text">Vanguardia</span> que Dominamos
                </h2>
                <p class="text-xl text-slate-300 max-w-3xl mx-auto">
                    Nuestros ingenieros cuentan con experiencia completa para implementar, gestionar y dar soporte a cualquier servicio de desarrollo de software usando estas tecnologías
                </p>
            </div>

            <!-- Filtros de categorías -->
            <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="200">
                <button class="tech-filter-btn px-6 py-3 rounded-full bg-slate-700/50 text-slate-300 font-semibold transition-all duration-300 hover:bg-slate-600/50 hover:text-white hover:scale-105" data-category="all">
                    Todas
                </button>
                <button class="tech-filter-btn px-6 py-3 rounded-full bg-slate-700/50 text-slate-300 font-semibold transition-all duration-300 hover:bg-slate-600/50 hover:text-white hover:scale-105" data-category="ai-ml">
                    IA & ML
                </button>
                <button class="tech-filter-btn px-6 py-3 rounded-full bg-slate-700/50 text-slate-300 font-semibold transition-all duration-300 hover:bg-slate-600/50 hover:text-white hover:scale-105" data-category="development">
                    Desarrollo
                </button>
                <button class="tech-filter-btn px-6 py-3 rounded-full bg-slate-700/50 text-slate-300 font-semibold transition-all duration-300 hover:bg-slate-600/50 hover:text-white hover:scale-105" data-category="frameworks">
                    Frameworks
                </button>
                <button class="tech-filter-btn px-6 py-3 rounded-full bg-slate-700/50 text-slate-300 font-semibold transition-all duration-300 hover:bg-slate-600/50 hover:text-white hover:scale-105" data-category="security">
                    Seguridad & Testing
                </button>
                <button class="tech-filter-btn px-6 py-3 rounded-full bg-slate-700/50 text-slate-300 font-semibold transition-all duration-300 hover:bg-slate-600/50 hover:text-white hover:scale-105" data-category="mobile">
                    Mobile
                </button>
            </div>

            <!-- Grid de tecnologías -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6" data-aos="fade-up" data-aos-delay="400">
                <!-- ========== IA & ML ========== -->
                <!-- GPT -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-green-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="ai-ml">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 via-emerald-500/5 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-lg">GPT</span>
                            </div>
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-green-300 transition-colors duration-500">GPT</h3>
                    </div>
                </div>

                <!-- TensorFlow -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-orange-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="ai-ml">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 via-red-500/5 to-orange-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg" alt="TensorFlow" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-orange-300 transition-colors duration-500">TensorFlow</h3>
                    </div>
                </div>

                <!-- PyTorch -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-red-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="ai-ml">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 via-orange-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/pytorch/pytorch-original.svg" alt="PyTorch" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-red-300 transition-colors duration-500">PyTorch</h3>
                    </div>
                </div>

                <!-- Microsoft Azure ML -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-blue-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="ai-ml">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-cyan-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/microsoft/microsoft-original.svg" alt="Azure ML" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-blue-300 transition-colors duration-500">Azure ML</h3>
                    </div>
                </div>

                <!-- ========== DESARROLLO ========== -->
                <!-- JavaScript -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-yellow-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="development">
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 via-orange-500/5 to-yellow-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JavaScript" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-yellow-300 transition-colors duration-500">JavaScript</h3>
                    </div>
                </div>

                <!-- C# -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-purple-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="development">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 via-indigo-500/5 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg" alt="C#" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-purple-300 transition-colors duration-500">C#</h3>
                    </div>
                </div>

                <!-- Arduino -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-teal-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="development">
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 via-cyan-500/5 to-teal-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/arduino/arduino-original.svg" alt="Arduino" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-teal-300 transition-colors duration-500">Arduino</h3>
                    </div>
                </div>

                <!-- PHP -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-purple-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="development">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 via-indigo-500/5 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-purple-300 transition-colors duration-500">PHP</h3>
                    </div>
                </div>

                <!-- TypeScript -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-blue-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="development">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-cyan-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg" alt="TypeScript" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-blue-300 transition-colors duration-500">TypeScript</h3>
                    </div>
                </div>

                <!-- Python -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-green-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="development">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 via-emerald-500/5 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-green-300 transition-colors duration-500">Python</h3>
                    </div>
                </div>

                <!-- Node.js -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-green-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="development">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 via-emerald-500/5 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg" alt="Node.js" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-green-300 transition-colors duration-500">Node.js</h3>
                    </div>
                </div>

                <!-- Laragon -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-red-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="development">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 via-orange-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-orange-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-xs">LARAGON</span>
                            </div>
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-red-300 transition-colors duration-500">Laragon</h3>
                    </div>
                </div>

                <!-- ========== FRAMEWORKS ========== -->
                <!-- Vue.js -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-green-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="frameworks">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 via-emerald-500/5 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg" alt="Vue.js" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-green-300 transition-colors duration-500">Vue.js</h3>
                    </div>
                </div>

                <!-- React -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-blue-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="frameworks">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-cyan-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-blue-300 transition-colors duration-500">React</h3>
                    </div>
                </div>

                <!-- Laravel -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-red-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="frameworks">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 via-orange-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-red-300 transition-colors duration-500">Laravel</h3>
                    </div>
                </div>

                <!-- Django -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-green-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="frameworks">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 via-emerald-500/5 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/django/django-plain.svg" alt="Django" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-green-300 transition-colors duration-500">Django</h3>
                    </div>
                </div>

                <!-- FastAPI -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-teal-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="frameworks">
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 via-cyan-500/5 to-teal-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-xs">FAST</span>
                            </div>
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-teal-300 transition-colors duration-500">FastAPI</h3>
                    </div>
                </div>

                <!-- Next.js -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-gray-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="frameworks">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-500/10 via-slate-500/5 to-gray-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nextjs/nextjs-original.svg" alt="Next.js" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-gray-300 transition-colors duration-500">Next.js</h3>
                    </div>
                </div>

                <!-- Express.js -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-green-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="frameworks">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 via-emerald-500/5 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/express/express-original.svg" alt="Express.js" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-green-300 transition-colors duration-500">Express.js</h3>
                    </div>
                </div>

                <!-- .NET Core -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-purple-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="frameworks">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 via-indigo-500/5 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dotnetcore/dotnetcore-original.svg" alt=".NET Core" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-purple-300 transition-colors duration-500">.NET Core</h3>
                    </div>
                </div>

                <!-- ========== SEGURIDAD & TESTING ========== -->
                <!-- OWASP ZAP -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-red-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="security">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 via-orange-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('tecnologies-home/security-icons/owaszap.png') }}" alt="OWASP ZAP" class="w-10 h-10 transition-transform duration-500 group-hover:rotate-12">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-red-300 transition-colors duration-500">OWASP ZAP</h3>
                    </div>
                </div>

                <!-- Burp Suite -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-red-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="security">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 via-orange-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('tecnologies-home/security-icons/burpsuite.png') }}" alt="Burp Suite" class="w-10 h-10 transition-transform duration-500 group-hover:rotate-12">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-red-300 transition-colors duration-500">Burp Suite</h3>
                    </div>
                </div>

                <!-- SonarQube -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-blue-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="security">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-cyan-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('tecnologies-home/security-icons/sonarcube.png') }}" alt="SonarQube" class="w-10 h-10 transition-transform duration-500 group-hover:rotate-12">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-blue-300 transition-colors duration-500">SonarQube</h3>
                    </div>
                </div>

                <!-- Trivy -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-green-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="security">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 via-emerald-500/5 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('tecnologies-home/security-icons/tryvi.png') }}" alt="Trivy" class="w-10 h-10 transition-transform duration-500 group-hover:rotate-12">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-green-300 transition-colors duration-500">Trivy</h3>
                    </div>
                </div>

                <!-- Cloudflare -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-orange-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="security">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 via-red-500/5 to-orange-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('tecnologies-home/security-icons/cloud.png') }}" alt="Cloudflare" class="w-10 h-10 transition-transform duration-500 group-hover:rotate-12">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-orange-300 transition-colors duration-500">Cloudflare</h3>
                    </div>
                </div>

                <!-- Metasploit -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-red-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="security">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 via-orange-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('tecnologies-home/security-icons/metasploit.png') }}" alt="Metasploit" class="w-10 h-10 transition-transform duration-500 group-hover:rotate-12">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-red-300 transition-colors duration-500">Metasploit</h3>
                    </div>
                </div>

                <!-- ========== MOBILE ========== -->
                <!-- MAUI -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-blue-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="mobile">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-cyan-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/microsoft/microsoft-original.svg" alt="MAUI" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-blue-300 transition-colors duration-500">MAUI</h3>
                    </div>
                </div>

                <!-- React Native -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-blue-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="mobile">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-cyan-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React Native" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-blue-300 transition-colors duration-500">React Native</h3>
                    </div>
                </div>

                <!-- Kotlin -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-purple-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="mobile">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 via-indigo-500/5 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kotlin/kotlin-original.svg" alt="Kotlin" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-purple-300 transition-colors duration-500">Kotlin</h3>
                    </div>
                </div>

                <!-- Swift -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-orange-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="mobile">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 via-red-500/5 to-orange-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/swift/swift-original.svg" alt="Swift" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-orange-300 transition-colors duration-500">Swift</h3>
                    </div>
                </div>

                <!-- Java -->
                <div class="tech-card group relative overflow-hidden rounded-2xl p-6 cursor-pointer transform transition-all duration-700 hover:scale-110 hover:shadow-xl hover:shadow-red-500/25 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50" data-category="mobile">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 via-orange-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-16 h-16 mb-4 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Java" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-red-300 transition-colors duration-500">Java</h3>
                    </div>
                </div>
            </div>

            <!-- Botón Ver más / Ver menos tecnologías (controlado por filtro) -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="600">
                <button id="tech-toggle-btn" class="hidden group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl hover:shadow-cyan-500/25 transition-all duration-500 transform hover:scale-105 inline-flex items-center">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                    <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                    <!-- Partículas de neón -->
                    <div class="absolute top-2 left-4 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                    <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>
                    <div class="absolute top-1/2 right-4 w-1 h-1 bg-purple-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.5s"></div>

                    <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">visibility</span>
                    <span id="tech-toggle-text" class="relative z-10 bg-gradient-to-r from-white to-cyan-100 bg-clip-text text-transparent group-hover:from-yellow-200 group-hover:to-white transition-all duration-500">Ver más</span>

                    <!-- Borde de neón -->
                    <div class="absolute inset-0 rounded-xl border-2 border-cyan-400/50 group-hover:border-cyan-300 group-hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] transition-all duration-500"></div>
                </button>
            </div>
        </div>
    </section>

    <!-- Casos de Éxito - Carrusel Dinámico con Datos Reales -->
    @include('pages.components.casos-exito-carousel', ['casosExito' => $casosExito ?? []])

    <!-- FAQ -->
    <section class="py-16 bg-[#0F172A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-12" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3 sm:mb-4">
                    FAQ
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-slate-300 max-w-2xl mx-auto">
                    Resolvemos las dudas más comunes sobre nuestros servicios
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="200">
                <!-- FAQ 1 -->
                <div class="faq-item service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300" data-faq="1">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10">
                        <div class="faq-header flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <span class="material-icons text-white text-2xl">schedule</span>
                                    </div>
                                </div>
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500 flex-1">
                                Tiempo de Respuesta
                            </h3>
                            <span class="faq-icon material-icons text-cyan-400 transform transition-all duration-300 ease-in-out">
                                expand_more
                            </span>
                                </div>
                        <div class="faq-content overflow-hidden transition-all duration-400 ease-in-out" style="max-height: 0; opacity: 0; padding-top: 0;">
                            <div class="pb-2">
                                <p class="text-slate-300 leading-relaxed">
                                    Respondemos todas las consultas dentro de las primeras 24 horas hábiles.
                                    Para casos urgentes, contamos con soporte prioritario disponible.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300" data-faq="2">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-orange-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-orange-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10">
                        <div class="faq-header flex items-center mb-4 select-none">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-red-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-14 h-14 bg-gradient-to-br from-red-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <span class="material-icons text-white text-2xl">support_agent</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500 flex-1">
                                Soporte 24/7
                            </h3>
                            <span class="faq-icon material-icons text-red-400 transform transition-all duration-300 ease-in-out">
                                expand_more
                            </span>
                        </div>
                        <div class="faq-content overflow-hidden transition-all duration-400 ease-in-out" style="max-height: 0; opacity: 0; padding-top: 0;">
                            <div class="pb-2">
                                <p class="text-slate-300 leading-relaxed">
                                    Sí, contamos con soporte técnico disponible las 24 horas del día,
                                    los 7 días de la semana para clientes con planes premium.
                            </p>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300" data-faq="3">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10">
                        <div class="faq-header flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <span class="material-icons text-white text-2xl">business</span>
                                    </div>
                                </div>
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500 flex-1">
                                Tamaño de Empresas
                            </h3>
                            <span class="faq-icon material-icons text-green-400 transform transition-all duration-300 ease-in-out">
                                expand_more
                            </span>
                                </div>
                        <div class="faq-content overflow-hidden transition-all duration-400 ease-in-out" style="max-height: 0; opacity: 0; padding-top: 0;">
                            <div class="pb-2">
                                <p class="text-slate-300 leading-relaxed">
                                    Absolutamente. Nuestras soluciones se adaptan a empresas de todos los tamaños,
                                    desde startups hasta grandes corporaciones multinacionales.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300" data-faq="4">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-violet-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-violet-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10">
                        <div class="faq-header flex items-center mb-4 select-none">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <span class="material-icons text-white text-2xl">engineering</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 flex-1">
                                Personalización
                            </h3>
                            <span class="faq-icon material-icons text-purple-400 transform transition-all duration-300 ease-in-out">
                                expand_more
                            </span>
                        </div>
                        <div class="faq-content overflow-hidden transition-all duration-400 ease-in-out" style="max-height: 0; opacity: 0; padding-top: 0;">
                            <div class="pb-2">
                                <p class="text-slate-300 leading-relaxed">
                                    Todas nuestras soluciones son completamente personalizables
                                    para adaptarse a las necesidades específicas de tu empresa.
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulario de Contacto -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Formulario de Contacto Premium -->
            <div class="w-full max-w-4xl mx-auto" data-aos="fade-up">
                    <div class="relative overflow-hidden rounded-2xl p-8 bg-gradient-to-br from-slate-800/90 via-slate-900/95 to-slate-800/90 backdrop-blur-sm border border-slate-700/50 shadow-2xl">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/10 via-blue-500/5 to-purple-600/10 opacity-50"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full animate-pulse" style="animation-duration: 3s;"></div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-6 right-6 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute bottom-8 left-8 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>
                        <div class="absolute top-1/3 right-1/4 w-1.5 h-1.5 bg-purple-400 rounded-full opacity-50 animate-pulse" style="animation-delay: 1s;"></div>

                        <div class="relative z-10">
                            <div class="text-center mb-8">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl mb-4 shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-white via-cyan-100 to-blue-100 bg-clip-text text-transparent mb-3">
                                    Envíanos un Mensaje
                </h2>
                                <p class="text-slate-300 text-lg">
                                    Estamos aquí para ayudarte con tu proyecto
                </p>
            </div>

                            <form id="contactForm" class="space-y-6" novalidate>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                                    <div class="form-group">
                                        <label for="nombre" class="block text-sm font-semibold text-slate-200 mb-3">
                                            <span class="flex items-center">
                                                <span class="material-icons text-cyan-400 mr-2">person</span>
                                                Nombre completo <span class="text-red-400 ml-1">*</span>
                                            </span>
                                        </label>
                                        <div class="relative group">
                            <input type="text" id="nombre" name="nombre" required
                                                   class="w-full px-4 py-4 bg-slate-800/80 border border-slate-600/50 rounded-xl focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 transition-all duration-300 text-white placeholder-slate-400 hover:bg-slate-700/80 group-hover:border-slate-500"
                                                   placeholder="Tu nombre completo">
                                            <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-cyan-500/10 to-blue-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                                        <div class="invalid-feedback hidden text-red-400 text-sm mt-1"></div>
                                        <div class="valid-feedback hidden text-green-400 text-sm mt-1">
                                            <span class="material-icons text-xs">check_circle</span> Nombre válido
                                        </div>
                                    </div>
                        </div>
                        <div>
                                    <label for="empresa" class="block text-sm font-semibold text-slate-200 mb-3">
                                <span class="flex items-center">
                                    <span class="material-icons text-cyan-400 mr-2">business</span>
                                    Empresa
                                </span>
                            </label>
                                    <div class="relative">
                            <input type="text" id="empresa" name="empresa"
                                               class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300 text-white placeholder-slate-400"
                                               placeholder="Nombre de tu empresa (opcional)">
                                    </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                                    <label for="email" class="block text-sm font-semibold text-slate-200 mb-3">
                                <span class="flex items-center">
                                    <span class="material-icons text-cyan-400 mr-2">email</span>
                                    Correo electrónico <span class="text-red-400 ml-1">*</span>
                                </span>
                            </label>
                                    <div class="relative">
                            <input type="email" id="email" name="email" required
                                               class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300 text-white placeholder-slate-400 peer"
                                               placeholder="tu@email.com">
                                        <div class="invalid-feedback hidden text-red-400 text-sm mt-1"></div>
                                        <div class="valid-feedback hidden text-green-400 text-sm mt-1">
                                            <span class="material-icons text-xs">check_circle</span> Email válido
                                        </div>
                                    </div>
                        </div>
                        <div>
                                    <label for="telefono" class="block text-sm font-semibold text-slate-200 mb-3">
                                <span class="flex items-center">
                                    <span class="material-icons text-cyan-400 mr-2">phone</span>
                                    Teléfono
                                </span>
                            </label>
                                    <div class="relative">
                            <input type="tel" id="telefono" name="telefono"
                                               class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300 text-white placeholder-slate-400"
                                               placeholder="+52 55 1234 5678">
                                        <div class="valid-feedback hidden text-green-400 text-sm mt-1">
                                            <span class="material-icons text-xs">check_circle</span> Teléfono válido
                                        </div>
                                    </div>
                        </div>
                    </div>

                    <div>
                                <label for="asunto" class="block text-sm font-semibold text-slate-200 mb-3">
                            <span class="flex items-center">
                                <span class="material-icons text-cyan-400 mr-2">subject</span>
                                Asunto <span class="text-red-400 ml-1">*</span>
                            </span>
                        </label>
                                <div class="relative">
                                    <select id="asunto" name="asunto" required
                                            class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300 text-white hover:bg-slate-700 cursor-pointer">
                                        <option value="">Selecciona un asunto</option>
                                        <option value="consulta-general">Consulta General</option>
                                        <option value="cotizacion">Cotización de Servicios</option>
                                        <option value="soporte-tecnico">Soporte Técnico</option>
                                        <option value="colaboracion">Propuesta de Colaboración</option>
                                        <option value="trabajo">Oportunidad de Trabajo</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                    <div class="invalid-feedback hidden text-red-400 text-sm mt-1"></div>
                                    <div class="valid-feedback hidden text-green-400 text-sm mt-1">
                                        <span class="material-icons text-xs">check_circle</span> Asunto válido
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="servicio" class="block text-sm font-semibold text-slate-200 mb-3">
                            <span class="flex items-center">
                                <span class="material-icons text-cyan-400 mr-2">build</span>
                                Servicio de interés
                            </span>
                        </label>
                                <div class="relative">
                        <select id="servicio" name="servicio"
                                            class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300 text-white hover:bg-slate-700 cursor-pointer">
                                        <option value="">Selecciona un servicio (opcional)</option>
                            <option value="consultoria-ti">Consultoría TI</option>
                            <option value="ciberseguridad">Ciberseguridad</option>
                            <option value="auditorias">Auditorías</option>
                            <option value="soluciones-saas">Soluciones SaaS</option>
                            <option value="reingenieria">Reingeniería</option>
                            <option value="soluciones-medida">Soluciones a Medida</option>
                        </select>
                                    <div class="valid-feedback hidden text-green-400 text-sm mt-1">
                                        <span class="material-icons text-xs">check_circle</span> Servicio seleccionado
                                    </div>
                                </div>
                    </div>

                    <div>
                                <label for="mensaje" class="block text-sm font-semibold text-slate-200 mb-3">
                            <span class="flex items-center">
                                <span class="material-icons text-cyan-400 mr-2">message</span>
                                Mensaje <span class="text-red-400 ml-1">*</span>
                            </span>
                        </label>
                                <div class="relative">
                                    <textarea id="mensaje" name="mensaje" rows="6" required
                                              class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300 text-white placeholder-slate-400 resize-none peer"
                                              placeholder="Cuéntanos más detalles sobre tu proyecto o necesidades..."></textarea>
                                    <div class="character-count text-slate-400 text-xs mt-1 text-right">0 / 500 caracteres</div>
                                    <div class="invalid-feedback hidden text-red-400 text-sm mt-1"></div>
                                    <div class="valid-feedback hidden text-green-400 text-sm mt-1">
                                        <span class="material-icons text-xs">check_circle</span> Mensaje válido
                                    </div>
                                </div>
                    </div>

                            <div class="flex items-start">
                                <div class="relative">
                                    <input type="checkbox" id="privacidad" name="privacidad" required
                                           class="mt-1 h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-slate-600 rounded bg-slate-800 transition-all duration-300">
                                    <div class="invalid-feedback hidden text-red-400 text-sm mt-1">Debes aceptar la política de privacidad</div>
                                </div>
                                <label for="privacidad" class="ml-3 text-sm text-slate-300 leading-relaxed">
                                    Acepto la <a href="#" class="text-cyan-400 hover:text-cyan-300 underline transition-colors duration-300">política de privacidad</a>
                                    y el tratamiento de mis datos personales <span class="text-red-400">*</span>
                                </label>
                            </div>

                            <div class="text-center pt-4">
                                    <button type="submit" id="submitBtn" class="group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl hover:shadow-cyan-500/25 transition-all duration-500 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none min-w-[200px]">
                            <span class="flex items-center justify-center">
                                <span id="submitText" class="flex items-center">
                                    <span class="material-icons mr-2">send</span>
                                    Enviar Mensaje
                                </span>
                                <span id="loadingText" class="hidden flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Enviando...
                                </span>
                                <span id="successText" class="hidden flex items-center">
                                    <span class="material-icons mr-2">check_circle</span>
                                    ¡Enviado!
                                </span>
                            </span>
                        </button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mapa -->
    <section class="py-16 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Mapa
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Visítanos en nuestras oficinas en Texcoco, Estado de México
                </p>
            </div>

            <div class="unified-card overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="map-container">
                    <div id="map" class="h-72 sm:h-80 md:h-96 w-full"></div>
                </div>
                <div class="p-6 bg-slate-800/50 border-t border-slate-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="material-icons text-cyan-400 mr-3">location_on</span>
                            <div>
                                <p class="text-white font-medium">02 de Marzo, número 807</p>
                                <p class="text-slate-300 text-sm">Colonia Centro, Texcoco, Estado de México, C.P. 56100</p>
                            </div>
                        </div>
                        <a href="https://maps.google.com/?q=02+de+Marzo+807+Texcoco+Estado+de+México+México" target="_blank"
                           class="group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/25 inline-flex items-center">
                            <!-- Efectos de fondo animados -->
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                            <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                            <!-- Partículas de neón -->
                            <div class="absolute top-2 left-4 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                            <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

                            <span class="material-icons mr-2 text-xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">directions</span>
                            <span class="relative z-10">Cómo llegar</span>

                            <!-- Borde de neón -->
                            <div class="absolute inset-0 rounded-xl border-2 border-cyan-400/50 group-hover:border-cyan-300 group-hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] transition-all duration-500"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    .map-container {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
    }

    .map-container::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, rgba(6, 182, 212, 0.1), rgba(59, 130, 246, 0.1));
        pointer-events: none;
        z-index: 10;
    }

    .leaflet-container {
        background: #1a1b1e !important;
    }

    .custom-popup {
        background: rgba(15, 23, 42, 0.95);
        border: 1px solid rgba(6, 182, 212, 0.3);
        border-radius: 0.5rem;
        padding: 1rem;
        color: white;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(6, 182, 212, 0.2);
    }

    .custom-popup b {
        color: #22d3ee;
        font-size: 1.1em;
        margin-bottom: 0.5rem;
        display: block;
    }

    .leaflet-popup-content-wrapper {
        background: transparent;
        box-shadow: none;
    }

    .leaflet-popup-tip {
        background: rgba(15, 23, 42, 0.95);
        border: 1px solid rgba(6, 182, 212, 0.3);
    }

        .tech-gradient {
            background: linear-gradient(135deg, #1e293b 0%, #334155 25%, #0f172a 50%, #1e40af 75%, #0891b2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .service-card {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(6, 182, 212, 0.5);
            box-shadow: 0 20px 40px rgba(6, 182, 212, 0.2);
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .zoom-card {
            transition: all 0.3s;
            transform-origin: center;
            will-change: transform;
        }

        .zoom-card:hover {
            transform: scale(1.1);
            z-index: 10;
        }

        .services-grid {
            overflow: visible;
        }

        .services-grid .zoom-card {
            position: relative;
        }

        /* Estilos para tarjetas de servicios modernas */
        .service-card-modern {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .service-card-modern:hover {
            border-color: rgba(6, 182, 212, 0.3);
            box-shadow: 0 20px 60px rgba(6, 182, 212, 0.2), 0 0 40px rgba(6, 182, 212, 0.1);
        }

        .service-card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: inherit;
            pointer-events: none;
        }

        /* Nuevos estilos para el hero potente */
        @keyframes gradient-x {
            0%, 100% {
                background-size: 200% 200%;
                background-position: left center;
            }
            50% {
                background-size: 200% 200%;
                background-position: right center;
            }
        }

        .animate-gradient-x {
            animation: gradient-x 4s ease infinite;
        }

        /* Partículas animadas */
        .particles-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .particle {
            position: absolute;
            background: rgba(6, 182, 212, 0.6);
            border-radius: 50%;
            pointer-events: none;
        }

        .particle-1 {
            width: 4px;
            height: 4px;
            top: 20%;
            left: 10%;
            animation: float-particle 8s infinite ease-in-out;
        }

        .particle-2 {
            width: 6px;
            height: 6px;
            top: 60%;
            left: 80%;
            background: rgba(147, 51, 234, 0.6);
            animation: float-particle 10s infinite ease-in-out reverse;
        }

        .particle-3 {
            width: 3px;
            height: 3px;
            top: 80%;
            left: 20%;
            background: rgba(59, 130, 246, 0.6);
            animation: float-particle 12s infinite ease-in-out;
            animation-delay: -2s;
        }

        .particle-4 {
            width: 5px;
            height: 5px;
            top: 30%;
            left: 70%;
            background: rgba(236, 72, 153, 0.6);
            animation: float-particle 9s infinite ease-in-out;
            animation-delay: -4s;
        }

        .particle-5 {
            width: 2px;
            height: 2px;
            top: 50%;
            left: 5%;
            animation: float-particle 15s infinite ease-in-out;
            animation-delay: -1s;
        }

        .particle-6 {
            width: 4px;
            height: 4px;
            top: 10%;
            left: 60%;
            background: rgba(34, 197, 94, 0.6);
            animation: float-particle 11s infinite ease-in-out reverse;
            animation-delay: -3s;
        }

        .particle-7 {
            width: 3px;
            height: 3px;
            top: 70%;
            left: 90%;
            background: rgba(251, 191, 36, 0.6);
            animation: float-particle 13s infinite ease-in-out;
            animation-delay: -5s;
        }

        .particle-8 {
            width: 5px;
            height: 5px;
            top: 40%;
            left: 40%;
            background: rgba(168, 85, 247, 0.6);
            animation: float-particle 7s infinite ease-in-out;
            animation-delay: -2.5s;
        }

        @keyframes float-particle {
            0%, 100% {
                transform: translateY(0px) translateX(0px) scale(1);
                opacity: 0.7;
            }
            25% {
                transform: translateY(-30px) translateX(10px) scale(1.2);
                opacity: 1;
            }
            50% {
                transform: translateY(-60px) translateX(-5px) scale(0.8);
                opacity: 0.5;
            }
            75% {
                transform: translateY(-30px) translateX(-10px) scale(1.1);
                opacity: 0.8;
            }
        }

        /* Efectos de hover mejorados para botones */
        .btn-glow:hover {
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.6), 0 0 60px rgba(6, 182, 212, 0.4);
        }

        /* Animación de entrada para el hero */
        @keyframes hero-entrance {
            0% {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .hero-animate {
             animation: hero-entrance 1.5s ease-out;
         }

         /* Efectos de parallax */
         .parallax-section {
             transform-style: preserve-3d;
         }

         .parallax-element {
             position: absolute;
             will-change: transform;
         }

         .parallax-bg {
             will-change: transform;
         }

         /* Glassmorphism mejorado */
         .glass-effect-enhanced {
             background: rgba(255, 255, 255, 0.08);
             backdrop-filter: blur(20px);
             border: 1px solid rgba(255, 255, 255, 0.15);
             box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25), inset 0 1px 0 rgba(255, 255, 255, 0.1);
             transition: all 0.5s ease;
         }

         .glass-effect-enhanced:hover {
             background: rgba(255, 255, 255, 0.12);
             border-color: rgba(6, 182, 212, 0.3);
             box-shadow: 0 35px 70px rgba(6, 182, 212, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.2);
         }

         /* Animaciones dinámicas */
         .slide-up-animation {
             animation: slideUpFade 1s ease-out;
         }

         @keyframes slideUpFade {
             0% {
                 opacity: 0;
                 transform: translateY(60px);
             }
             100% {
                 opacity: 1;
                 transform: translateY(0);
             }
         }

         .floating-card {
             animation: floatingCard 6s ease-in-out infinite;
         }

         @keyframes floatingCard {
             0%, 100% {
                 transform: translateY(0px) rotateX(0deg);
             }
             50% {
                 transform: translateY(-10px) rotateX(1deg);
             }
         }

         .hover-lift {
             transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
         }

         .hover-lift:hover {
             transform: translateY(-8px) scale(1.02);
         }

         /* Efectos de texto */
         .text-glow {
             text-shadow: 0 0 20px rgba(6, 182, 212, 0.5), 0 0 40px rgba(6, 182, 212, 0.3);
         }

         .gradient-text {
             background: linear-gradient(45deg, #06b6d4, #3b82f6, #8b5cf6);
             background-size: 200% 200%;
             -webkit-background-clip: text;
             background-clip: text;
             -webkit-text-fill-color: transparent;
             animation: gradient-shift 3s ease infinite;
         }

         @keyframes gradient-shift {
             0%, 100% {
                 background-position: 0% 50%;
             }
             50% {
                 background-position: 100% 50%;
             }
         }

         /* Contador animado */
         .counter-animation {
             opacity: 0;
             transform: translateY(30px);
             transition: all 0.8s ease;
         }

         .counter-animation.animate {
             opacity: 1;
             transform: translateY(0);
         }

         .counter-number {
             font-family: 'Inter', sans-serif;
             font-weight: 900;
             letter-spacing: -0.02em;
         }

         /* Efectos de hover mejorados */
         .hover-glow:hover {
             box-shadow: 0 0 30px rgba(6, 182, 212, 0.4), 0 0 60px rgba(6, 182, 212, 0.2);
             transform: translateY(-2px);
         }

         /* Animación de entrada escalonada */
         .stagger-animation {
             animation: staggerFade 0.8s ease-out forwards;
             opacity: 0;
             transform: translateY(30px);
         }

         @keyframes staggerFade {
             to {
                 opacity: 1;
                 transform: translateY(0);
             }
         }

         /* Responsive parallax */
         @media (max-width: 768px) {
             .parallax-element {
                 display: none;
             }
         }

         /* Estilos para mejorar la experiencia táctil del carrusel */
         #success-stories-carousel {
             touch-action: pan-y pinch-zoom;
             -webkit-overflow-scrolling: touch;
         }

         #success-stories-carousel.dragging {
             transition: none !important;
         }

         /* Mejorar la respuesta táctil en dispositivos móviles */
         @media (max-width: 768px) {
             #success-stories-carousel {
                 cursor: grab;
             }
             
             #success-stories-carousel:active {
                 cursor: grabbing;
             }
             
             .success-story-card {
                 user-select: none;
                 -webkit-user-select: none;
                 -moz-user-select: none;
                 -ms-user-select: none;
             }
         }

         /* Mejoras adicionales de responsividad para el carrusel */
         @media (max-width: 640px) {
             .success-story-card {
                 min-height: 600px !important;
             }
             
             .success-story-card .flex {
                 gap: 1rem !important;
             }
         }

         @media (min-width: 641px) and (max-width: 768px) {
             .success-story-card {
                 min-height: 500px !important;
             }
         }
 </style>
 @endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    function initMap() {
        const map = L.map('map', {
            zoomControl: false,
            scrollWheelZoom: false
        }).setView([19.5120, -98.8832], 15);

        // Estilo oscuro personalizado para el mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            maxZoom: 19
        }).addTo(map);

        // Marcador personalizado con efecto de pulso
        const pulsingIcon = L.divIcon({
            className: 'custom-marker',
            html: `
                <div class="relative">
                    <div class="absolute inset-0 bg-cyan-400 rounded-full animate-ping opacity-75"></div>
                    <div class="relative bg-cyan-500 rounded-full p-2 shadow-lg shadow-cyan-500/50">
                        <span class="material-icons text-white text-xl">location_on</span>
                    </div>
                </div>
            `,
            iconSize: [40, 40]
        });

        const marker = L.marker([19.5120, -98.8832], { icon: pulsingIcon }).addTo(map);

        // Popup personalizado con estilo moderno


        const popupContent = `
    <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700">
        <!-- Efectos de fondo animados -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

        <!-- Partículas flotantes -->
        <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
        <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

        <div class="relative z-10 flex flex-col items-center text-center">
            <div class="bg-white rounded-full p-3 shadow-md mb-4">
                <img src="{{ asset('images/logos/SoftLinkIA.png') }}" class="w-24 h-24">
            </div>
            <div class="text-slate-300">
                02 de Marzo, número 807<br>
                Colonia Centro, Texcoco<br>
                Estado de México, C.P. 56100
            </div>
        </div>
    </div>
`;


        marker.bindPopup(popupContent, {
            className: 'custom-popup-wrapper',
            closeButton: false,
            maxWidth: 300
        }).openPopup();

        // Controles personalizados con estilo moderno
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);

        // Efecto de hover en el contenedor del mapa
        const mapContainer = document.querySelector('.map-container');
        if (mapContainer) {
            mapContainer.addEventListener('mouseenter', () => {
                map.scrollWheelZoom.enable();
            });
            mapContainer.addEventListener('mouseleave', () => {
                map.scrollWheelZoom.disable();
            });
        }
    }

    window.addEventListener('load', initMap);

    // Datos de clientes para el carrusel
    const clientsData = [
        {
            name: 'SEDENA',
            position: 'Secretaría de la Defensa Nacional',
            logo: '/images/logos/sedena.svg',
            testimonial: '"FerTech ha sido fundamental en la modernización de nuestros sistemas de seguridad, proporcionando soluciones robustas y confiables que cumplen con los más altos estándares de calidad."'
        },
        {
            name: 'Telmex',
            position: 'Telecomunicaciones de México',
            logo: '/images/logos/telmex.svg',
            testimonial: '"La implementación de las soluciones de FerTech ha mejorado significativamente nuestra eficiencia operativa y la experiencia de nuestros clientes."'
        },
        {
            name: 'TCF',
            position: 'Tecnología y Consultoría Financiera',
            logo: '/images/logos/TCF.png',
            testimonial: '"FerTech ha demostrado un profundo conocimiento en el sector financiero, entregando soluciones que superan nuestras expectativas de seguridad y rendimiento."'
        },
        {
            name: 'SAT',
            position: 'Servicio de Administración Tributaria',
            logo: '/images/logos/SAT.png',
            testimonial: '"La colaboración con FerTech ha sido clave para modernizar nuestros procesos digitales y mejorar la experiencia de los contribuyentes."'
        },
        {
            name: 'Banco Bienestar',
            position: 'Banco del Bienestar',
            logo: '/images/logos/banco-bienestar.svg',
            testimonial: '"FerTech ha sido un socio estratégico en el desarrollo de nuestras plataformas digitales, garantizando accesibilidad y seguridad para todos nuestros usuarios."'
        },
        {
            name: 'INFONAVIT',
            position: 'Instituto del Fondo Nacional de la Vivienda para los Trabajadores',
            logo: '/images/logos/infonavit.jpg',
            testimonial: '"FerTech ha transformado nuestros procesos digitales, proporcionando soluciones innovadoras que mejoran la experiencia de nuestros afiliados en el acceso a la vivienda."'
        }
    ];

    // Elementos DOM
    const carouselContainer = document.getElementById('carousel-container');
    const clientName = document.getElementById('client-name');
    const clientPosition = document.getElementById('client-position');
    const clientTestimonial = document.getElementById('client-testimonial');
    const clientDots = document.querySelectorAll('.client-dot');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const carouselItems = document.querySelectorAll('.carousel-item');

    let currentIndex = 0;

    // Función para actualizar el carrusel y testimonial
    function updateCarousel(index) {
        // Mover el carrusel al logo seleccionado
        const translateX = -index * 100;
        carouselContainer.style.transform = `translateX(${translateX}%)`;

        // Añadir clase de transición para animación del testimonial
        const card = document.getElementById('testimonial-card');
        card.classList.add('opacity-0');

        setTimeout(() => {
            // Actualizar contenido del testimonial
            clientName.textContent = clientsData[index].name;
            clientPosition.textContent = clientsData[index].position;
            clientTestimonial.textContent = clientsData[index].testimonial;

            // Actualizar dots activos
            clientDots.forEach(dot => dot.classList.remove('active', 'bg-cyan-400'));
            clientDots[index].classList.add('active', 'bg-cyan-400');

            // Mostrar tarjeta con animación
            card.classList.remove('opacity-0');
        }, 300);
    }

    // Función para ir al siguiente slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % clientsData.length;
        updateCarousel(currentIndex);
    }

    // Función para ir al slide anterior
    function prevSlide() {
        currentIndex = (currentIndex - 1 + clientsData.length) % clientsData.length;
        updateCarousel(currentIndex);
    }

    // Inicializar con el primer cliente
    updateCarousel(0);

    // Event listeners para los botones de navegación
    if (nextBtn) nextBtn.addEventListener('click', nextSlide);
    if (prevBtn) prevBtn.addEventListener('click', prevSlide);

    // Event listeners para los dots
    clientDots.forEach(dot => {
        dot.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            currentIndex = index;
            updateCarousel(index);
        });
    });

    // Event listeners para los logos del carrusel
    carouselItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel(index);
        });
    });

    // Cambio automático deshabilitado - solo navegación manual

    // Efectos de parallax solo para elementos decorativos
    function initParallax() {
        const parallaxElements = document.querySelectorAll('.parallax-element');

        function updateParallax() {
            const scrollTop = window.pageYOffset;

            // Solo aplicar parallax a elementos decorativos, no a secciones completas
            parallaxElements.forEach(element => {
                const speed = parseFloat(element.dataset.speed) || 0.3;
                const rect = element.getBoundingClientRect();
                const yPos = -(scrollTop * speed * 0.5); // Reducir el efecto
                element.style.transform = `translateY(${yPos}px)`;
            });
        }

        let ticking = false;
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(() => {
                    updateParallax();
                    ticking = false;
                });
                ticking = true;
            }
        }

        window.addEventListener('scroll', requestTick);
        updateParallax();
    }

    // Contador animado
    function initCounters() {
        const counters = document.querySelectorAll('.counter-animation');
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.dataset.target);
                    const numberElement = counter.querySelector('.counter-number');

                    counter.classList.add('animate');

                    let current = 0;
                    const increment = target / 100;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }

                        if (target === 100) {
                            numberElement.textContent = Math.floor(current) + '%';
                        } else {
                            numberElement.textContent = Math.floor(current) + '+';
                        }
                    }, 20);

                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            observer.observe(counter);
        });
    }

    // Animaciones escalonadas
    function initStaggerAnimations() {
        const elements = document.querySelectorAll('.hover-lift');
        elements.forEach((element, index) => {
            element.style.animationDelay = `${index * 0.1}s`;
            element.classList.add('stagger-animation');
        });
    }

    // Smooth scroll mejorado
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Efecto de escritura animada
    document.addEventListener('DOMContentLoaded', function() {
        const texts = [
            { element: 'typewriter-1', text: 'Soluciones', delay: 0 },
            { element: 'typewriter-2', text: 'Tecnológicas', delay: 1500 },
            { element: 'typewriter-3', text: 'que Transforman', delay: 3000 }
        ];

        function typeWriter(elementId, text, delay = 0) {
            setTimeout(() => {
                const element = document.getElementById(elementId);
                let i = 0;

                function type() {
                    if (i < text.length) {
                        element.innerHTML += text.charAt(i);
                        i++;
                        setTimeout(type, 100); // Velocidad de escritura
                    }
                }

                type();
            }, delay);
        }

        // Iniciar animaciones de escritura
        texts.forEach(item => {
            typeWriter(item.element, item.text, item.delay);
        });
    });

    // JavaScript para el carrusel de casos de éxito
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('success-stories-carousel');
        const prevBtn = document.getElementById('prev-success-story');
        const nextBtn = document.getElementById('next-success-story');
        const dots = document.querySelectorAll('.success-story-dot');

        if (!carousel || !dots.length) return; // Si no hay carousel o dots, salir

        let currentIndex = 0;
        const totalSlides = dots.length; // Usar el número dinámico de casos de éxito
        
        // Variables para detección de swipe
        let touchStartX = 0;
        let touchEndX = 0;
        let isDragging = false;
        let startTransform = 0;

        function updateCarousel() {
            const translateX = -currentIndex * 100;
            carousel.style.transform = `translateX(${translateX}%)`;

            // Actualizar indicadores
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.remove('bg-slate-600');
                    dot.classList.add('bg-cyan-400');
                } else {
                    dot.classList.remove('bg-cyan-400');
                    dot.classList.add('bg-slate-600');
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateCarousel();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateCarousel();
        }

        function goToSlide(index) {
            currentIndex = index;
            updateCarousel();
        }


        // Funciones para detección de swipe
        function handleTouchStart(e) {
            touchStartX = e.touches[0].clientX;
            isDragging = true;
            
            // Agregar clase dragging para deshabilitar transiciones
            carousel.classList.add('dragging');
            
            // Obtener la transformación actual
            const currentTransform = carousel.style.transform;
            const match = currentTransform.match(/translateX\(([^)]+)\)/);
            startTransform = match ? parseFloat(match[1]) : 0;
        }

        function handleTouchMove(e) {
            if (!isDragging) return;
            
            e.preventDefault(); // Prevenir scroll vertical
            touchEndX = e.touches[0].clientX;
            
            const diffX = touchEndX - touchStartX;
            const currentTranslateX = startTransform + (diffX / carousel.offsetWidth) * 100;
            
            // Aplicar transformación en tiempo real
            carousel.style.transform = `translateX(${currentTranslateX}%)`;
        }

        function handleTouchEnd(e) {
            if (!isDragging) return;
            
            isDragging = false;
            touchEndX = e.changedTouches[0].clientX;
            
            // Remover clase dragging para habilitar transiciones
            carousel.classList.remove('dragging');
            
            const diffX = touchEndX - touchStartX;
            const threshold = 50; // Mínimo de píxeles para considerar un swipe
            
            if (Math.abs(diffX) > threshold) {
                if (diffX > 0) {
                    // Swipe hacia la derecha - slide anterior
                    prevSlide();
                } else {
                    // Swipe hacia la izquierda - slide siguiente
                    nextSlide();
                }
            } else {
                // Si no se alcanza el threshold, volver a la posición original
                updateCarousel();
            }
        }

        // Event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
            });
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
            });
        });

        // Event listeners para touch/swipe (solo en dispositivos móviles)
        if (carousel) {
            carousel.addEventListener('touchstart', handleTouchStart, { passive: false });
            carousel.addEventListener('touchmove', handleTouchMove, { passive: false });
            carousel.addEventListener('touchend', handleTouchEnd, { passive: false });
        }
    });

    // JavaScript Optimizado para FAQ
    (function() {
        'use strict';

        let isAnimating = false;
        let currentOpenFaq = null;

        function initFAQ() {
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const header = item.querySelector('.faq-header');
                const content = item.querySelector('.faq-content');
                const icon = item.querySelector('.faq-icon');
                const faqId = item.getAttribute('data-faq');

                // Usar mousedown para respuesta más rápida
                header.addEventListener('mousedown', function(e) {
                    e.preventDefault();
                    toggleFAQ(item, content, icon, faqId);
                });

                // Fallback para touch devices
                header.addEventListener('touchstart', function(e) {
                    e.preventDefault();
                    toggleFAQ(item, content, icon, faqId);
                }, { passive: false });
            });
        }

        function toggleFAQ(item, content, icon, faqId) {
            if (isAnimating) return;

            isAnimating = true;
            const isCurrentlyOpen = currentOpenFaq === faqId;

            // Cerrar FAQ actualmente abierta
            if (currentOpenFaq && currentOpenFaq !== faqId) {
                closeFAQ(currentOpenFaq);
            }

            if (isCurrentlyOpen) {
                // Cerrar la FAQ actual
                closeFAQItem(item, content, icon);
                currentOpenFaq = null;
            } else {
                // Abrir nueva FAQ
                openFAQItem(item, content, icon);
                currentOpenFaq = faqId;
            }

            // Reset animation flag
            setTimeout(() => {
                isAnimating = false;
            }, 400);
        }

        function closeFAQ(faqId) {
            const item = document.querySelector(`[data-faq="${faqId}"]`);
            if (item) {
                const content = item.querySelector('.faq-content');
                const icon = item.querySelector('.faq-icon');
                closeFAQItem(item, content, icon);
            }
        }

        function closeFAQItem(item, content, icon) {
            content.style.maxHeight = '0px';
            content.style.opacity = '0';
            content.style.paddingTop = '0px';
            icon.style.transform = 'rotate(0deg)';
            item.classList.remove('scale-105');
            item.style.boxShadow = '';
        }

        function openFAQItem(item, content, icon) {
            const scrollHeight = content.scrollHeight;
            content.style.maxHeight = (scrollHeight + 20) + 'px';
            content.style.opacity = '1';
            content.style.paddingTop = '16px';
            icon.style.transform = 'rotate(180deg)';
            item.classList.add('scale-105');

            // Agregar sombra específica según el color
            if (item.classList.contains('service-card-blue')) {
                item.style.boxShadow = '0 25px 50px -12px rgba(59, 130, 246, 0.25)';
            } else if (item.classList.contains('service-card-red')) {
                item.style.boxShadow = '0 25px 50px -12px rgba(239, 68, 68, 0.25)';
            } else if (item.classList.contains('service-card-green')) {
                item.style.boxShadow = '0 25px 50px -12px rgba(34, 197, 94, 0.25)';
            } else if (item.classList.contains('service-card-purple')) {
                item.style.boxShadow = '0 25px 50px -12px rgba(147, 51, 234, 0.25)';
            }
        }

        // Inicializar cuando el DOM esté listo
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFAQ);
        } else {
            initFAQ();
        }
    })();

    // JavaScript para filtros de tecnologías - SIMPLE
    function initTechFilters() {
        const filterButtons = document.querySelectorAll('.tech-filter-btn');
        const techCards = Array.from(document.querySelectorAll('.tech-card'));
        const toggleBtn = document.getElementById('tech-toggle-btn');
        const toggleText = document.getElementById('tech-toggle-text');
        let currentCategory = null; // Estado: sin filtro al inicio
        let showingAll = false; // Control del botón "Ver más"

        // Mostrar tecnologías inicialmente con límite según viewport
        function showInitialCards() {
            const isMobile = window.matchMedia('(max-width: 767px)').matches;
            const baseLimit = isMobile ? 6 : 12;
            let shown = 0;

            techCards.forEach(card => {
                if (shown < baseLimit) {
                    card.style.display = 'block';
                    shown++;
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Ocultar todas las tecnologías
        function hideAllCards() {
            techCards.forEach(card => {
                card.style.display = 'none';
            });
        }

        // Mostrar tarjetas por categoría con límite según viewport
        function applyFilter(category) {
            const isMobile = window.matchMedia('(max-width: 767px)').matches;
            const baseLimit = isMobile ? 6 : 12;
            const limit = showingAll ? Number.POSITIVE_INFINITY : baseLimit;
            let shown = 0; // contador para animación cuando no es "ver más"
            let totalMatches = 0;
            let matchIndex = 0; // índice absoluto de coincidencias para cascada al expandir

            techCards.forEach(card => {
                const matches = category === 'all' || card.getAttribute('data-category') === category;
                if (matches) totalMatches++;
                if (matches) {
                    matchIndex++;
                    if (shown < limit) {
                        card.style.display = 'block';

                        // Si estamos expandiendo (showingAll), sólo animar las NUEVAS tarjetas
                        if (showingAll && matchIndex <= baseLimit) {
                            // primeros baseLimit elementos ya estaban visibles: no reanimar
                        } else {
                            // animación con cascada
                            card.classList.remove('entering');
                            void card.offsetWidth; // reiniciar animación
                            const delayBaseIndex = showingAll ? Math.max(matchIndex - baseLimit - 1, 0) : shown;
                            const delayMs = Math.min(delayBaseIndex, 12) * 100;
                            card.style.animationDelay = `${delayMs}ms`;
                            card.classList.add('entering');
                            const borderFlashDurationMs = 2600;
                            setTimeout(() => {
                                card.classList.remove('entering');
                                card.style.animationDelay = '';
                            }, delayMs + borderFlashDurationMs + 150);
                        }

                        shown++;
                    } else {
                        card.style.display = 'none';
                    }
                } else {
                    card.style.display = 'none';
                }
            });

            // Mostrar/ocultar botón Ver más en función de resultados
            if (totalMatches > baseLimit) {
                toggleBtn.classList.remove('hidden');
                toggleText.textContent = showingAll ? 'Ver menos' : 'Ver más';
            } else {
                toggleBtn.classList.add('hidden');
            }
        }

        // Actualizar estilos de botones activos/inactivos
        function setActiveButton(button) {
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-gradient-to-r', 'from-cyan-500', 'to-blue-600', 'text-white');
                btn.classList.add('bg-slate-700/50', 'text-slate-300');
            });
            if (button) {
                button.classList.add('active', 'bg-gradient-to-r', 'from-cyan-500', 'to-blue-600', 'text-white');
                button.classList.remove('bg-slate-700/50', 'text-slate-300');
            }
        }

        // Estado inicial: oculto todo sin botón activo
        hideAllCards();
        setActiveButton(null);
        if (toggleBtn) toggleBtn.classList.add('hidden');

        // Reaplicar límite al redimensionar
        window.addEventListener('resize', () => {
            if (currentCategory) applyFilter(currentCategory);
        });

        // Listeners de filtros con toggle y animación
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');

                // animación de clic del botón
                this.classList.add('filter-burst');
                setTimeout(() => this.classList.remove('filter-burst'), 600);

                if (currentCategory === category) {
                    // Si clic en el mismo filtro: volver al estado inicial
                    currentCategory = null;
                    showInitialCards();
                    setActiveButton(null);
                    showingAll = false;
                    if (toggleBtn) toggleBtn.classList.add('hidden');
                    return;
                }

                // Activar nuevo filtro
                currentCategory = category;
                showingAll = false; // reiniciar al cambiar de filtro
                setActiveButton(this);
                applyFilter(category);
            });
        });

        // Toggle Ver más / Ver menos
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                if (!currentCategory) return;
                showingAll = !showingAll;
                applyFilter(currentCategory);
                // pequeño efecto
                this.classList.add('animate-bounce');
                setTimeout(() => this.classList.remove('animate-bounce'), 600);
            });
        }

        // Mostrar tecnologías inicialmente
        showInitialCards();
    }

    // Inicializar todas las funciones dinámicas
    initParallax();
    initCounters();
    initStaggerAnimations();
    initSmoothScroll();
    initTechFilters();

    // Añadir estilos CSS para la transición y efectos de neón
    const style = document.createElement('style');
    style.textContent = `
        #testimonial-card {
            transition: opacity 0.3s ease-in-out;
        }

        /* Animaciones de neón y efectos especiales */
        @keyframes shimmer {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(200%) rotate(45deg); }
        }

        .animate-shimmer {
            animation: shimmer 2s infinite;
        }

        /* Efectos de gradiente animado para botones de neón */
        .neon-button-primary:hover {
            animation: neon-glow-primary 1.5s ease-in-out infinite alternate;
        }

        .neon-button-secondary:hover {
            animation: neon-glow-secondary 1.5s ease-in-out infinite alternate;
        }

        .neon-button-submit:hover {
            animation: neon-glow-submit 1.5s ease-in-out infinite alternate;
        }

        .neon-button-map:hover {
            animation: neon-glow-map 1.5s ease-in-out infinite alternate;
        }

        @keyframes neon-glow-primary {
            from {
                box-shadow: 0 0 20px rgba(34, 211, 238, 0.6), 0 0 40px rgba(34, 211, 238, 0.4), 0 0 60px rgba(34, 211, 238, 0.2);
            }
            to {
                box-shadow: 0 0 30px rgba(34, 211, 238, 0.8), 0 0 60px rgba(34, 211, 238, 0.6), 0 0 90px rgba(34, 211, 238, 0.4);
            }
        }

        @keyframes neon-glow-secondary {
            from {
                box-shadow: 0 0 25px rgba(34, 211, 238, 0.8), inset 0 0 15px rgba(34, 211, 238, 0.3);
            }
            to {
                box-shadow: 0 0 35px rgba(34, 211, 238, 1), inset 0 0 25px rgba(34, 211, 238, 0.5);
            }
        }

        @keyframes neon-glow-submit {
            from {
                box-shadow: 0 0 20px rgba(34, 211, 238, 0.6), 0 0 40px rgba(147, 51, 234, 0.4);
            }
            to {
                box-shadow: 0 0 30px rgba(34, 211, 238, 0.8), 0 0 60px rgba(147, 51, 234, 0.6);
            }
        }

        @keyframes neon-glow-map {
            from {
                box-shadow: 0 0 20px rgba(34, 197, 94, 0.6), 0 0 40px rgba(20, 184, 166, 0.4);
            }
            to {
                box-shadow: 0 0 30px rgba(34, 197, 94, 0.8), 0 0 60px rgba(20, 184, 166, 0.6);
            }
        }

        /* Efectos de partículas mejorados */
        .animate-ping {
            animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes ping {
            75%, 100% {
                transform: scale(2);
                opacity: 0;
            }
        }
        .client-dot.active {
            background-color: rgb(34 211 238); /* bg-cyan-400 */
        }
        .zoom-card {
            transition: all 0.3s;
            transform-origin: center;
            will-change: transform;
        }
        .zoom-card:hover {
            transform: scale(1.1);
            z-index: 10;
        }
        .services-grid {
            overflow: visible;
        }
        .services-grid .zoom-card {
            position: relative;
        }

        /* Animaciones avanzadas para partículas y efectos */
        @keyframes particleFloat {
            0% {
                opacity: 1;
                transform: translateY(0px) scale(1) rotate(0deg);
            }
            25% {
                opacity: 0.8;
                transform: translateY(-30px) scale(1.2) rotate(90deg);
            }
            50% {
                opacity: 0.6;
                transform: translateY(-60px) scale(1.4) rotate(180deg);
            }
            75% {
                opacity: 0.4;
                transform: translateY(-90px) scale(1.1) rotate(270deg);
            }
            100% {
                opacity: 0;
                transform: translateY(-120px) scale(0.3) rotate(360deg);
            }
        }

        @keyframes energyPulse {
            0% {
                width: 0;
                height: 0;
                opacity: 0.8;
            }
            25% {
                width: 100px;
                height: 100px;
                opacity: 0.6;
            }
            50% {
                width: 200px;
                height: 200px;
                opacity: 0.4;
            }
            75% {
                width: 300px;
                height: 300px;
                opacity: 0.2;
            }
            100% {
                width: 400px;
                height: 400px;
                opacity: 0;
            }
        }

        @keyframes techCardRise {
            0% {
                opacity: 0;
                transform: translateY(28px) scale(0.98);
                filter: blur(1px);
            }
            70% {
                opacity: 1;
                transform: translateY(-3px) scale(1.01);
                filter: blur(0);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: blur(0);
            }
        }

        @keyframes techCardFade {
            from {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
            to {
                opacity: 0;
                transform: translateY(10px) scale(0.98);
            }
        }

        @keyframes techCardBorderFlash {
            0% {
                box-shadow: 0 0 0 0 rgba(34, 211, 238, 0);
                border-color: rgba(34, 211, 238, 0.0);
            }
            40% {
                box-shadow: 0 0 24px 6px rgba(34, 211, 238, 0.35);
                border-color: rgba(34, 211, 238, 0.6);
            }
            80% {
                box-shadow: 0 0 14px 3px rgba(34, 211, 238, 0.20);
                border-color: rgba(34, 211, 238, 0.35);
            }
            100% {
                box-shadow: 0 8px 24px rgba(14, 165, 233, 0.15);
                border-color: rgba(255, 255, 255, 0.1);
            }
        }

        /* Efectos específicos por categoría */
        .tech-card-ai-ml {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.15) 0%, rgba(255, 193, 7, 0.15) 50%, rgba(255, 107, 107, 0.1) 100%);
            border-color: rgba(255, 107, 107, 0.4);
            box-shadow: 0 8px 32px rgba(255, 107, 107, 0.2);
        }

        .tech-card-ai-ml:hover {
            box-shadow: 0 20px 60px rgba(255, 107, 107, 0.4), 0 0 40px rgba(255, 107, 107, 0.3);
            border-color: rgba(255, 107, 107, 0.6);
        }

        .tech-card-development {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(147, 51, 234, 0.15) 50%, rgba(59, 130, 246, 0.1) 100%);
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.2);
        }

        .tech-card-development:hover {
            box-shadow: 0 20px 60px rgba(59, 130, 246, 0.4), 0 0 40px rgba(59, 130, 246, 0.3);
            border-color: rgba(59, 130, 246, 0.6);
        }

        .tech-card-frameworks {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(6, 182, 212, 0.15) 50%, rgba(34, 197, 94, 0.1) 100%);
            border-color: rgba(34, 197, 94, 0.4);
            box-shadow: 0 8px 32px rgba(34, 197, 94, 0.2);
        }

        .tech-card-frameworks:hover {
            box-shadow: 0 20px 60px rgba(34, 197, 94, 0.4), 0 0 40px rgba(34, 197, 94, 0.3);
            border-color: rgba(34, 197, 94, 0.6);
        }

        .tech-card-security {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.15) 0%, rgba(251, 146, 60, 0.15) 50%, rgba(239, 68, 68, 0.1) 100%);
            border-color: rgba(239, 68, 68, 0.4);
            box-shadow: 0 8px 32px rgba(239, 68, 68, 0.2);
        }

        .tech-card-security:hover {
            box-shadow: 0 20px 60px rgba(239, 68, 68, 0.4), 0 0 40px rgba(239, 68, 68, 0.3);
            border-color: rgba(239, 68, 68, 0.6);
        }

        .tech-card-mobile {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.15) 0%, rgba(236, 72, 153, 0.15) 50%, rgba(168, 85, 247, 0.1) 100%);
            border-color: rgba(168, 85, 247, 0.4);
            box-shadow: 0 8px 32px rgba(168, 85, 247, 0.2);
        }

        .tech-card-mobile:hover {
            box-shadow: 0 20px 60px rgba(168, 85, 247, 0.4), 0 0 40px rgba(168, 85, 247, 0.3);
            border-color: rgba(168, 85, 247, 0.6);
        }

        /* Efectos de ondas de energía */
        .energy-wave {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 10;
        }

        /* Efectos de rotación 3D mejorados */
        .tech-card {
            transform-style: preserve-3d;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            perspective: 1000px;
        }

        .tech-card:hover {
            transform: perspective(1000px) rotateX(5deg) rotateY(5deg) scale(1.05) translateZ(10px);
        }

        /* Efectos de partículas flotantes */
        .tech-particle {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            z-index: 1000;
        }

        /* Animación de entrada desde abajo + destello azul */
        .tech-card.entering {
            animation: techCardRise 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards,
                       techCardBorderFlash 2.6s ease-out forwards;
            filter: drop-shadow(0 8px 24px rgba(14, 165, 233, 0.15));
        }

        .tech-card.exiting {
            animation: techCardFade 0.4s ease forwards;
        }

        /* Efectos de hover con ondas de energía */
        .tech-card:hover .tech-icon {
            animation: techIconFloat 2s ease-in-out infinite;
        }

        @keyframes techIconFloat {
            0%, 100% {
                transform: translateY(0px) rotate(0deg) scale(1);
            }
            25% {
                transform: translateY(-5px) rotate(2deg) scale(1.05);
            }
            50% {
                transform: translateY(-10px) rotate(5deg) scale(1.1);
            }
            75% {
                transform: translateY(-5px) rotate(2deg) scale(1.05);
            }
        }

        /* Efectos de brillo dinámico */
        .tech-card::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, transparent, rgba(6, 182, 212, 0.5), transparent, rgba(147, 51, 234, 0.5), transparent);
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .tech-card:hover::after {
            opacity: 1;
            animation: borderGlow 3s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% {
                background: linear-gradient(45deg, transparent, rgba(6, 182, 212, 0.5), transparent);
            }
            25% {
                background: linear-gradient(45deg, transparent, rgba(147, 51, 234, 0.5), transparent);
            }
            50% {
                background: linear-gradient(45deg, transparent, rgba(236, 72, 153, 0.5), transparent);
            }
            75% {
                background: linear-gradient(45deg, transparent, rgba(34, 197, 94, 0.5), transparent);
            }
        }

        /* Efectos de botones de filtro mejorados */
        .tech-filter-btn {
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
        }

        .tech-filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .tech-filter-btn:hover::before {
            left: 100%;
        }

        .tech-filter-btn.active {
            position: relative;
            overflow: hidden;
        }

        .tech-filter-btn.active::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #06b6d4, #3b82f6, #8b5cf6, #ec4899, #06b6d4);
            background-size: 400% 400%;
            border-radius: inherit;
            opacity: 0.8;
            z-index: -1;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            25% {
                background-position: 50% 0%;
            }
            50% {
                background-position: 100% 50%;
            }
            75% {
                background-position: 50% 100%;
            }
        }

        /* Efectos de hover mejorados para tarjetas de tecnología */
        .tech-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: inherit;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .tech-card:hover::before {
            opacity: 1;
        }

        /* Responsive para la sección de tecnologías */
        @media (max-width: 768px) {
            .tech-card {
                padding: 1rem;
            }

            .tech-card .w-16 {
                width: 3rem;
                height: 3rem;
            }

            .tech-card img {
                width: 1.5rem;
                height: 1.5rem;
            }

            /* Reducir efectos en móvil para mejor rendimiento */
            .tech-card:hover {
                transform: scale(1.05);
            }

            .tech-particle {
                display: none; /* Ocultar partículas en móvil */
            }

            .energy-wave {
                display: none; /* Ocultar ondas de energía en móvil */
            }

            /* Simplificar animaciones en móvil */
            @keyframes particleFloat {
                0% {
                    opacity: 1;
                    transform: translateY(0px) scale(1);
                }
                100% {
                    opacity: 0;
                    transform: translateY(-50px) scale(0.5);
                }
            }

            @keyframes energyPulse {
                0% {
                    width: 0;
                    height: 0;
                    opacity: 0.6;
                }
                100% {
                    width: 200px;
                    height: 200px;
                    opacity: 0;
                }
            }
        }

        /* Estilos específicos para botones de navegación escritorio en testimonial */
        #prev-btn, #next-btn {
            -webkit-tap-highlight-color: transparent;
            touch-action: manipulation;
            user-select: none;
        }

        #prev-btn:active {
            transform: translateY(-50%) scale(0.95);
            background-color: rgba(51, 65, 85, 0.95);
        }

        #next-btn:active {
            transform: translateY(-50%) scale(0.95);
            background-color: rgba(51, 65, 85, 0.95);
        }

        /* Mejoras de accesibilidad para escritorio */
        @media (min-width: 640px) {
            #prev-btn, #next-btn {
                min-width: 48px;
                min-height: 48px;
            }
            
            #prev-btn:hover {
                background-color: rgba(51, 65, 85, 0.9);
                transform: translateY(-50%) scale(1.05);
            }

            #next-btn:hover {
                background-color: rgba(51, 65, 85, 0.9);
                transform: translateY(-50%) scale(1.05);
            }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection
