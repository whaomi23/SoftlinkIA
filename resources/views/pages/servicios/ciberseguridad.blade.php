@extends('layouts.app')

@section('title', 'Ciberseguridad - SoftLinkIA')

@section('content')
<div class="overflow-x-hidden">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden py-20">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('/images/logos/CBS.jpg');"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-red-900/70 to-green-900/80"></div>
        </div>

        <!-- Efectos de partículas -->
        <div class="unified-particles-container relative z-10">
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
        </div>

        <!-- Efectos de luz -->
        <div class="absolute inset-0 z-10">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-red-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-green-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8 text-center text-white">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black mb-8 sm:mb-12 md:mb-16 unified-glow-effect leading-tight" data-aos="fade-up">
                <span class="bg-gradient-to-r from-white via-red-200 to-green-300 bg-clip-text text-transparent animate-gradient-x">
                    Ciber
                </span>
                <br>
                <span class="bg-gradient-to-r from-red-400 via-orange-500 to-green-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                    seguridad
                </span>
            </h1>

            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center mb-8 sm:mb-12 md:mb-16 px-2 sm:px-4 md:px-0" data-aos="fade-up" data-aos-delay="200">
                <a href="https://wa.me/5215522614633" target="_blank"
                   class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-red-500 via-orange-600 to-green-600 text-white px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-red-500/50 w-full sm:w-auto">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-r from-red-400 via-orange-500 to-green-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                    <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                    <!-- Partículas de neón -->
                    <div class="absolute top-2 left-4 w-1 h-1 bg-red-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                    <div class="absolute bottom-3 right-6 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

                    <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">chat</span>
                    <div class="relative z-10">
                        <div class="text-left">
                            <div class="font-bold">Consulta Gratuita</div>
                            <div class="text-sm opacity-90">WhatsApp 24/7</div>
                        </div>
                    </div>

                    <!-- Borde de neón -->
                    <div class="absolute inset-0 rounded-xl border-2 border-red-400/50 group-hover:border-red-300 group-hover:shadow-[0_0_20px_rgba(239,68,68,0.6)] transition-all duration-500"></div>
                </a>

                <!-- Botón Llamada Premium -->
                <a href="tel:+525512345678"
                   class="neon-button-secondary group relative overflow-hidden border-2 border-green-400 text-green-400 px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-green-500/20 hover:to-red-500/20 w-full sm:w-auto">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-r from-green-400/10 via-red-400/10 to-green-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                    <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-green-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                    <!-- Partículas de neón -->
                    <div class="absolute top-2 left-4 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                    <div class="absolute bottom-3 right-6 w-1 h-1 bg-red-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                    <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">phone</span>
                    <div class="relative z-10">
                        <div class="text-left">
                            <div class="font-bold">Llamada Directa</div>
                            <div class="text-sm opacity-90">Asesoría Inmediata</div>
                        </div>
                    </div>

                    <!-- Borde de neón animado -->
                    <div class="absolute inset-0 rounded-xl border-2 border-green-400 group-hover:border-green-300 group-hover:shadow-[0_0_25px_rgba(34,197,94,0.8)] transition-all duration-500"></div>
                    <div class="absolute inset-0 rounded-xl border border-green-300/30 group-hover:border-green-200/50 group-hover:shadow-[inset_0_0_15px_rgba(34,197,94,0.3)] transition-all duration-500"></div>
                </a>
            </div>

            <!-- Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-red-400 mb-2">99.9%</div>
                    <div class="text-slate-300 font-medium">Protección Efectiva</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-orange-400 mb-2">24/7</div>
                    <div class="text-slate-300 font-medium">Monitoreo Continuo</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-green-400 mb-2">0</div>
                    <div class="text-slate-300 font-medium">Brechas de Seguridad</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Descripción del Servicio -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                        <span class="bg-gradient-to-r from-white via-red-200 to-green-300 bg-clip-text text-transparent">
                            Protegemos tu
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-red-400 via-orange-500 to-green-600 bg-clip-text text-transparent">
                            Activos Digitales
                        </span>
                    </h2>
                    <p class="text-lg text-slate-300 mb-6 leading-relaxed">
                        Nuestro equipo de <span class="bg-gradient-to-r from-red-400 to-orange-400 bg-clip-text text-transparent font-semibold">expertos en ciberseguridad</span> implementa las últimas tecnologías y
                        <span class="bg-gradient-to-r from-orange-400 to-green-400 bg-clip-text text-transparent font-semibold">mejores prácticas</span> para proteger tu organización de amenazas cibernéticas.
                    </p>
                    <p class="text-lg text-slate-300 mb-8 leading-relaxed">
                        Desde la <span class="bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent font-semibold">evaluación de vulnerabilidades</span> hasta la implementación de
                        <span class="bg-gradient-to-r from-red-400 to-pink-400 bg-clip-text text-transparent font-semibold">sistemas de defensa avanzados</span>,
                        garantizamos la seguridad integral de tu infraestructura digital.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="https://wa.me/5215522614633" target="_blank"
                           class="group relative overflow-hidden bg-gradient-to-r from-red-500 via-orange-600 to-green-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center shadow-2xl hover:shadow-red-500/50">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">chat</span>
                            <span>WhatsApp</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-red-400/50 group-hover:border-red-300 group-hover:shadow-[0_0_20px_rgba(239,68,68,0.6)] transition-all duration-500"></div>
                        </a>
                        <a href="#servicios"
                           class="group relative overflow-hidden border-2 border-green-400 text-green-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">arrow_downward</span>
                            <span>Ver Servicios</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-green-400 group-hover:border-green-300 group-hover:shadow-[0_0_25px_rgba(34,197,94,0.8)] transition-all duration-500"></div>
                        </a>
                    </div>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div class="service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-orange-500/10 to-green-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-green-400 rounded-full opacity-40 animate-ping"></div>

                        <div class="relative z-10 space-y-8">
                            <!-- Detección de Amenazas -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-red-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-red-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover/item:from-red-300 group-hover/item:to-orange-300 transition-all duration-500">Detección de Amenazas</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Monitoreo proactivo 24/7</p>
                                </div>
                            </div>

                            <!-- Protección Avanzada -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                            <circle cx="12" cy="16" r="1"></circle>
                                            <path d="m7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover/item:from-green-300 group-hover/item:to-emerald-300 transition-all duration-500">Protección Avanzada</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Defensa multicapa</p>
                                </div>
                            </div>

                            <!-- Respuesta a Incidentes -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-orange-500 to-yellow-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-orange-500 to-yellow-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12,6 12,12 16,14"></polyline>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover/item:from-orange-300 group-hover/item:to-yellow-300 transition-all duration-500">Respuesta a Incidentes</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Acción inmediata especializada</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios de Ciberseguridad -->
    <section id="servicios" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestros Servicios de Ciberseguridad
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Protección integral contra amenazas digitales avanzadas
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Auditoría de Seguridad -->
                <div class="service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
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
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500">Auditoría de Seguridad</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Evaluación exhaustiva de vulnerabilidades y vectores de ataque en tu infraestructura.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-orange-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monitoreo SOC -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <!-- Icono arriba en móvil, al lado en desktop -->
                            <div class="flex flex-col md:flex-row md:items-center mb-4">
                                <!-- Icono centrado en móvil -->
                                <div class="flex justify-center mb-4 md:mb-0 md:mr-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-16 h-16 md:w-14 md:h-14 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                                <line x1="12" y1="17" x2="12" y2="21"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Título centrado en móvil -->
                                <h3 class="text-xl md:text-2xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500 text-center md:text-left">Monitoreo SOC 24/7</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center md:text-left">Centro de operaciones de seguridad con monitoreo continuo y respuesta inmediata.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                            <div class="flex justify-center md:justify-end space-x-1">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-teal-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gestión de Vulnerabilidades -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-yellow-500/10 to-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-yellow-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <!-- Icono arriba en móvil, al lado en desktop -->
                            <div class="flex flex-col md:flex-row md:items-center mb-4">
                                <!-- Icono centrado en móvil -->
                                <div class="flex justify-center mb-4 md:mb-0 md:mr-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-yellow-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-16 h-16 md:w-14 md:h-14 bg-gradient-to-br from-orange-500 to-yellow-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Título centrado en móvil -->
                                <h3 class="text-xl md:text-2xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-yellow-300 transition-all duration-500 text-center md:text-left">Gestión de Vulnerabilidades</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center md:text-left">Identificación, evaluación y mitigación proactiva de vulnerabilidades críticas.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                            <div class="flex justify-center md:justify-end space-x-1">
                                <div class="w-2 h-2 bg-orange-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Protección de Endpoints -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-violet-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-violet-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <!-- Icono arriba en móvil, al lado en desktop -->
                            <div class="flex flex-col md:flex-row md:items-center mb-4">
                                <!-- Icono centrado en móvil -->
                                <div class="flex justify-center mb-4 md:mb-0 md:mr-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-16 h-16 md:w-14 md:h-14 bg-gradient-to-br from-purple-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                                <rect x="9" y="9" width="6" height="6"></rect>
                                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                                <line x1="1" y1="14" x2="4" y2="14"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Título centrado en móvil -->
                                <h3 class="text-xl md:text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 text-center md:text-left">Protección de Endpoints</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center md:text-left">Seguridad avanzada para dispositivos y puntos de acceso a la red corporativa.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                            <div class="flex justify-center md:justify-end space-x-1">
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-violet-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Capacitación en Seguridad -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <!-- Icono arriba en móvil, al lado en desktop -->
                            <div class="flex flex-col md:flex-row md:items-center mb-4">
                                <!-- Icono centrado en móvil -->
                                <div class="flex justify-center mb-4 md:mb-0 md:mr-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-16 h-16 md:w-14 md:h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Título centrado en móvil -->
                                <h3 class="text-xl md:text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-cyan-300 transition-all duration-500 text-center md:text-left">Capacitación en Seguridad</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center md:text-left">Formación especializada para crear una cultura de seguridad en tu organización.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                            <div class="flex justify-center md:justify-end space-x-1">
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                                <!-- Compliance y Cumplimiento -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-blue-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-indigo-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <!-- Icono arriba en móvil, al lado en desktop -->
                            <div class="flex flex-col md:flex-row md:items-center mb-4">
                                <!-- Icono centrado en móvil -->
                                <div class="flex justify-center mb-4 md:mb-0 md:mr-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-16 h-16 md:w-14 md:h-14 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M9 11l3 3L22 4"></path>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Título centrado en móvil -->
                                <h3 class="text-xl md:text-2xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-blue-300 transition-all duration-500 text-center md:text-left">Compliance y Cumplimiento</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center md:text-left">Implementación de marcos normativos y estándares de seguridad internacionales.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                            <div class="flex justify-center md:justify-end space-x-1">
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metodología de Ciberseguridad -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestra Metodología de Protección
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Enfoque integral y multicapa para la defensa de tus activos digitales
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 services-grid">
                <!-- Evaluación -->
                <div class="service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-orange-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-orange-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-red-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-red-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.35-4.35"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-red-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500 mb-4">Evaluación</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Análisis exhaustivo de vulnerabilidades y vectores de ataque existentes.
                        </p>
                    </div>
                </div>

                <!-- Implementación -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <circle cx="12" cy="16" r="1"></circle>
                                        <path d="m7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500 mb-4">Implementación</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Despliegue de soluciones de seguridad multicapa y controles avanzados.
                        </p>
                    </div>
                </div>

                <!-- Monitoreo -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-yellow-500/10 to-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-yellow-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-yellow-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-orange-500 to-yellow-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                        <line x1="8" y1="21" x2="16" y2="21"></line>
                                        <line x1="12" y1="17" x2="12" y2="21"></line>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-yellow-300 transition-all duration-500 mb-4">Monitoreo</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Vigilancia continua 24/7 con detección temprana de amenazas.
                        </p>
                    </div>
                </div>

                <!-- Respuesta -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12,6 12,12 16,14"></polyline>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">4</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-cyan-300 transition-all duration-500 mb-4">Respuesta</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Acción inmediata ante incidentes con protocolos de contención y recuperación.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Casos de Éxito - Carrusel Dinámico -->
    <section class="py-16 bg-slate-900 relative overflow-hidden">
        <!-- Efectos de fondo -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-20 left-10 w-72 h-72 bg-red-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-green-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Casos de Éxito en Ciberseguridad
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Organizaciones que han fortalecido su seguridad digital con nuestras soluciones
                </p>
            </div>

            <!-- Carrusel Container -->
            <div class="relative" data-aos="fade-up" data-aos-delay="200">
                <div class="overflow-hidden rounded-2xl mx-4 sm:mx-8 md:mx-16 lg:mx-24">
                    <div id="cybersecurity-success-carousel" class="flex transition-transform duration-700 ease-in-out">
                        <!-- Caso 1: Banco Financiero -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <!-- Efectos de fondo animados -->
                                <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-orange-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <!-- Partículas flotantes -->
                                <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-orange-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <!-- Tags -->
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-sm font-medium border border-red-500/30">Fintech</span>
                                            <span class="px-3 py-1 bg-orange-500/20 text-orange-300 rounded-full text-sm font-medium border border-orange-500/30">SOC</span>
                                            <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-sm font-medium border border-yellow-500/30">PCI DSS</span>
                                        </div>

                                        <!-- Título -->
                                        <h3 class="text-lg sm:text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500 mb-3">
                                            Protección Integral para Banco Financiero
                                        </h3>

                                        <!-- Descripción -->
                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Implementación de sistema de seguridad multicapa que previene el 99.9% de amenazas y cumple con regulaciones bancarias internacionales como PCI DSS y Basel III.
                                        </p>

                                        <!-- Enlace -->
                                        <a href="#" class="inline-flex items-center text-red-400 hover:text-red-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-red-500/20 to-orange-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Protección Bancaria"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 2: Empresa de Salud -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-sm font-medium border border-green-500/30">HealthTech</span>
                                            <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 rounded-full text-sm font-medium border border-emerald-500/30">HIPAA</span>
                                            <span class="px-3 py-1 bg-teal-500/20 text-teal-300 rounded-full text-sm font-medium border border-teal-500/30">Compliance</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500 mb-3">
                                            Cumplimiento HIPAA para Empresa de Salud
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Auditoría y fortalecimiento de seguridad que garantiza el cumplimiento con HIPAA y protección de datos médicos sensibles con encriptación end-to-end.
                                        </p>

                                        <a href="#" class="inline-flex items-center text-green-400 hover:text-green-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-emerald-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Seguridad en Salud"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 3: E-commerce -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm font-medium border border-blue-500/30">E-commerce</span>
                                            <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-sm font-medium border border-indigo-500/30">WAF</span>
                                            <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm font-medium border border-purple-500/30">DDoS</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-3">
                                            Protección Anti-DDoS para E-commerce
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Implementación de WAF y protección DDoS que mantiene la disponibilidad del sitio durante ataques masivos, garantizando 99.9% de uptime.
                                        </p>

                                        <a href="#" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-indigo-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Protección E-commerce"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 4: Gobierno -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-violet-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-violet-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm font-medium border border-purple-500/30">Gobierno</span>
                                            <span class="px-3 py-1 bg-violet-500/20 text-violet-300 rounded-full text-sm font-medium border border-violet-500/30">ISO 27001</span>
                                            <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-sm font-medium border border-indigo-500/30">Zero Trust</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 mb-3">
                                            Arquitectura Zero Trust para Institución Gubernamental
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Implementación de arquitectura Zero Trust con certificación ISO 27001 que protege infraestructura crítica gubernamental contra amenazas avanzadas.
                                        </p>

                                        <a href="#" class="inline-flex items-center text-purple-400 hover:text-purple-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-indigo-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1556075798-4825dfaaf498?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Seguridad Gubernamental"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controles de navegación -->
                <button id="prev-cybersecurity-story" class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-slate-800/80 hover:bg-slate-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 z-20">
                    <span class="material-icons text-red-400 text-lg sm:text-xl">chevron_left</span>
                </button>
                <button id="next-cybersecurity-story" class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-slate-800/80 hover:bg-slate-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 z-20">
                    <span class="material-icons text-red-400 text-lg sm:text-xl">chevron_right</span>
                </button>

                <!-- Indicadores -->
                <div class="flex justify-center space-x-2 mt-8">
                    <button class="cybersecurity-story-dot w-3 h-3 rounded-full bg-red-400 transition-all duration-300 hover:scale-125" data-index="0"></button>
                    <button class="cybersecurity-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-red-400 transition-all duration-300 hover:scale-125" data-index="1"></button>
                    <button class="cybersecurity-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-red-400 transition-all duration-300 hover:scale-125" data-index="2"></button>
                    <button class="cybersecurity-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-red-400 transition-all duration-300 hover:scale-125" data-index="3"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Mejorado -->
    <section class="relative py-24 overflow-hidden">
        <!-- Fondo con gradiente complejo -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-red-900 to-green-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-orange-900/30 via-transparent to-red-500/20"></div>

        <!-- Efectos de partículas -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="particles-container">
                <div class="particle particle-1"></div>
                <div class="particle particle-2"></div>
                <div class="particle particle-3"></div>
                <div class="particle particle-4"></div>
                <div class="particle particle-5"></div>
                <div class="particle particle-6"></div>
            </div>
        </div>

        <!-- Efectos de luz -->
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-red-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-green-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Contenido principal -->
            <div class="text-center">
                <!-- Badge superior -->
                <div class="inline-block mb-8" data-aos="fade-up">
                    <div class="px-6 py-3 bg-red-500/20 border border-red-400/30 rounded-full backdrop-blur-sm">
                        <span class="text-red-300 font-semibold text-lg">🛡️ Protección Total</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-red-200 to-green-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-red-400 via-orange-500 to-green-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Proteger tu Negocio?
                    </span>
            </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span class="bg-gradient-to-r from-red-400 to-orange-400 bg-clip-text text-transparent font-semibold">expertos en ciberseguridad</span> están listos para
                    <span class="bg-gradient-to-r from-orange-400 to-green-400 bg-clip-text text-transparent font-semibold">blindar tu infraestructura</span> contra amenazas digitales
                </p>

                <!-- Botones mejorados -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="600">
                    <!-- Botón WhatsApp Premium -->
                <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-red-500 via-orange-600 to-green-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-red-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-red-400 via-orange-500 to-green-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-red-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">chat</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Consulta Gratuita</div>
                                <div class="text-sm opacity-90">WhatsApp 24/7</div>
                            </div>
                        </div>

                        <!-- Borde de neón -->
                        <div class="absolute inset-0 rounded-xl border-2 border-red-400/50 group-hover:border-red-300 group-hover:shadow-[0_0_20px_rgba(239,68,68,0.6)] transition-all duration-500"></div>
                    </a>

                    <!-- Botón Llamada Premium -->
                <a href="tel:+525512345678"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-green-400 text-green-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-green-500/20 hover:to-red-500/20">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400/10 via-red-400/10 to-green-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-green-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-red-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">phone</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Llamada Directa</div>
                                <div class="text-sm opacity-90">Asesoría Inmediata</div>
                            </div>
                        </div>

                        <!-- Borde de neón animado -->
                        <div class="absolute inset-0 rounded-xl border-2 border-green-400 group-hover:border-green-300 group-hover:shadow-[0_0_25px_rgba(34,197,94,0.8)] transition-all duration-500"></div>
                        <div class="absolute inset-0 rounded-xl border border-green-300/30 group-hover:border-green-200/50 group-hover:shadow-[inset_0_0_15px_rgba(34,197,94,0.3)] transition-all duration-500"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript para el carrusel de casos de éxito de ciberseguridad -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('cybersecurity-success-carousel');
        const prevBtn = document.getElementById('prev-cybersecurity-story');
        const nextBtn = document.getElementById('next-cybersecurity-story');
        const dots = document.querySelectorAll('.cybersecurity-story-dot');

        let currentIndex = 0;
        const totalSlides = 4;
        let autoSlideInterval;

        function updateCarousel() {
            const translateX = -currentIndex * 100;
            carousel.style.transform = `translateX(${translateX}%)`;

            // Actualizar indicadores
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.remove('bg-slate-600');
                    dot.classList.add('bg-red-400');
                } else {
                    dot.classList.remove('bg-red-400');
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

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 5000); // Cambiar cada 5 segundos
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                stopAutoSlide();
                nextSlide();
                startAutoSlide();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                stopAutoSlide();
                prevSlide();
                startAutoSlide();
            });
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopAutoSlide();
                goToSlide(index);
                startAutoSlide();
            });
        });

        // Pausar auto-slide al hacer hover
        if (carousel) {
            carousel.addEventListener('mouseenter', stopAutoSlide);
            carousel.addEventListener('mouseleave', startAutoSlide);
        }

        // Iniciar auto-slide
        startAutoSlide();
    });
    </script>
</div>
@endsection
