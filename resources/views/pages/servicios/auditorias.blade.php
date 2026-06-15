@extends('layouts.app')

@section('title', 'Auditorías - SoftLinkIA')

@section('content')
<div class="overflow-x-hidden">
    <!-- Hero Section -->
    <section class="unified-section-hero hero-gradient-complex relative overflow-hidden" style="min-height: calc(100vh - 80px); padding-top: 2rem;">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                  alt="Technology Audit Dashboard"
                  class="w-full h-full object-cover opacity-50">
            <!-- Overlay gradients -->
            <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-emerald-800/85 to-teal-900/90"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
        </div>

        <!-- Efectos de partículas -->
        <div class="unified-particles-container">
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
        </div>

        <!-- Efectos de luz -->
        <div class="absolute inset-0 z-10">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-green-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-emerald-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8 text-center text-white flex flex-col justify-center" style="min-height: calc(100vh - 120px);">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black mb-8 sm:mb-12 md:mb-16 unified-glow-effect leading-tight" data-aos="fade-up">
                <span class="bg-gradient-to-r from-white via-green-200 to-teal-300 bg-clip-text text-transparent animate-gradient-x">
                    Auditorías
                </span>
                <br>
                <span class="bg-gradient-to-r from-green-400 via-emerald-500 to-teal-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                    Tecnológicas
                </span>
            </h1>

            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center mb-8 sm:mb-12 md:mb-16 px-2 sm:px-4 md:px-0" data-aos="fade-up" data-aos-delay="200">
                <a href="https://wa.me/5215522614633" target="_blank"
                   class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600 text-white px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-green-500/50 w-full sm:w-auto">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                    <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                    <!-- Partículas de neón -->
                    <div class="absolute top-2 left-4 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                    <div class="absolute bottom-3 right-6 w-1 h-1 bg-teal-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>
                    <div class="absolute top-1/2 right-3 w-1 h-1 bg-emerald-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.5s"></div>

                    <!-- Icono y texto -->
                    <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.515"/>
                    </svg>
                    <span class="relative z-10">WhatsApp</span>
                </a>

                <a href="#servicios"
                   class="neon-button-secondary group relative overflow-hidden border-2 border-teal-400 text-teal-400 px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center hover:bg-teal-400 hover:text-white shadow-2xl hover:shadow-teal-400/50 w-full sm:w-auto">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-400/20 to-emerald-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                    <!-- Partículas de neón -->
                    <div class="absolute top-2 left-4 w-1 h-1 bg-teal-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                    <div class="absolute bottom-3 right-6 w-1 h-1 bg-emerald-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                    <!-- Icono y texto -->
                    <svg class="w-6 h-6 mr-3 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="relative z-10">Ver Servicios</span>
                </a>
            </div>

            <!-- Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-green-400 mb-2">99.9%</div>
                    <div class="text-slate-300 font-medium">Eficiencia Optimizada</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-teal-400 mb-2">24/7</div>
                    <div class="text-slate-300 font-medium">Monitoreo Continuo</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-emerald-400 mb-2">100%</div>
                    <div class="text-slate-300 font-medium">Cumplimiento Normativo</div>
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
                        <span class="bg-gradient-to-r from-white via-green-200 to-blue-300 bg-clip-text text-transparent">
                            Optimizamos tu
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-green-400 via-teal-500 to-blue-600 bg-clip-text text-transparent">
                            Infraestructura Tecnológica
                        </span>
                    </h2>
                    <p class="text-lg text-slate-300 mb-6 leading-relaxed">
                        Nuestro equipo de <span class="bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent font-semibold">expertos en auditorías tecnológicas</span> implementa las mejores metodologías y
                        <span class="bg-gradient-to-r from-teal-400 to-blue-400 bg-clip-text text-transparent font-semibold">herramientas avanzadas</span> para evaluar tu infraestructura digital.
                    </p>
                    <p class="text-lg text-slate-300 mb-8 leading-relaxed">
                        Desde la <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent font-semibold">evaluación de sistemas</span> hasta la implementación de
                        <span class="bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent font-semibold">estrategias de optimización</span>,
                        garantizamos el máximo rendimiento de tu tecnología.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="https://wa.me/5215522614633" target="_blank"
                           class="group relative overflow-hidden bg-gradient-to-r from-green-500 via-teal-600 to-blue-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center shadow-2xl hover:shadow-green-500/50">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">chat</span>
                            <span>WhatsApp</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-green-400/50 group-hover:border-green-300 group-hover:shadow-[0_0_20px_rgba(34,197,94,0.6)] transition-all duration-500"></div>
                        </a>
                        <a href="#servicios"
                           class="group relative overflow-hidden border-2 border-blue-400 text-blue-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">arrow_downward</span>
                            <span>Ver Servicios</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-blue-400 group-hover:border-blue-300 group-hover:shadow-[0_0_25px_rgba(59,130,246,0.8)] transition-all duration-500"></div>
                        </a>
                    </div>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-teal-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                        <div class="relative z-10 space-y-8">
                            <!-- Evaluación Completa -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-teal-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-green-500 to-teal-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <path d="M3 3v5h5"></path>
                                            <path d="M21 21v-5h-5"></path>
                                            <path d="M21 3v5h-5"></path>
                                            <path d="M3 21v-5h5"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover/item:from-green-300 group-hover/item:to-teal-300 transition-all duration-500">Evaluación Completa</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Análisis exhaustivo de sistemas</p>
                                </div>
                            </div>

                            <!-- Mejora Continua -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-teal-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-teal-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <polyline points="22,12 18,12 15,21 9,3 6,12 2,12"></polyline>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-teal-200 bg-clip-text text-transparent group-hover/item:from-teal-300 group-hover/item:to-blue-300 transition-all duration-500">Mejora Continua</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Optimización de procesos</p>
                                </div>
                            </div>

                            <!-- Cumplimiento -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <polyline points="9,11 12,14 22,4"></polyline>
                                            <path d="m21,4-6.5,6.5L11,7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover/item:from-blue-300 group-hover/item:to-cyan-300 transition-all duration-500">Cumplimiento</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Estándares y regulaciones</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios de Auditoría -->
    <section id="servicios" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Tipos de Auditorías
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Evaluaciones especializadas para diferentes aspectos de tu infraestructura tecnológica
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Auditoría de Infraestructura -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                            <line x1="8" y1="21" x2="16" y2="21"></line>
                                            <line x1="12" y1="17" x2="12" y2="21"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-cyan-300 transition-all duration-500 mb-4">Auditoría de Infraestructura</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Evaluación completa de servidores, redes, almacenamiento y sistemas de respaldo para optimizar rendimiento y confiabilidad.</p>
                        </div>
                    </div>
                </div>

                <!-- Auditoría de Seguridad -->
                <div class="service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-orange-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-orange-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-red-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-red-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500 mb-4">Auditoría de Seguridad</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Análisis exhaustivo de vulnerabilidades, políticas de seguridad y cumplimiento de estándares de protección de datos.</p>
                        </div>
                    </div>
                </div>

                <!-- Auditoría de Aplicaciones -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-indigo-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <rect x="9" y="9" width="6" height="6"></rect>
                                            <path d="M9 1v6"></path>
                                            <path d="M15 1v6"></path>
                                            <path d="M9 17v6"></path>
                                            <path d="M15 17v6"></path>
                                            <path d="M1 9h6"></path>
                                            <path d="M1 15h6"></path>
                                            <path d="M17 9h6"></path>
                                            <path d="M17 15h6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-indigo-300 transition-all duration-500 mb-4">Auditoría de Aplicaciones</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Evaluación de aplicaciones empresariales para identificar problemas de rendimiento, seguridad y usabilidad.</p>
                        </div>
                    </div>
                </div>

                <!-- Auditoría de Procesos -->
                <div class="service-card-modern service-card-teal group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-600/20 via-cyan-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-teal-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-teal-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M3 3v18h18"></path>
                                            <path d="M7 12l3 3 7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-teal-200 bg-clip-text text-transparent group-hover:from-teal-300 group-hover:to-cyan-300 transition-all duration-500 mb-4">Auditoría de Procesos</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Análisis de flujos de trabajo y procesos tecnológicos para identificar ineficiencias y oportunidades de automatización.</p>
                        </div>
                    </div>
                </div>

                <!-- Auditoría de Cumplimiento -->
                <div class="service-card-modern service-card-amber group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-600/20 via-yellow-500/10 to-orange-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-amber-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-yellow-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-amber-500 to-yellow-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-amber-500 to-yellow-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M9 12l2 2 4-4"></path>
                                            <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"></path>
                                            <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"></path>
                                            <path d="M12 3c0 1-1 3-3 3s-3-2-3-3 1-3 3-3 3 2 3 3"></path>
                                            <path d="M12 21c0-1 1-3 3-3s3 2 3 3-1 3-3 3-3-2-3-3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-amber-200 bg-clip-text text-transparent group-hover:from-amber-300 group-hover:to-yellow-300 transition-all duration-500 mb-4">Auditoría de Cumplimiento</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Verificación del cumplimiento de regulaciones y estándares específicos de tu industria y jurisdicción.</p>
                        </div>
                    </div>
                </div>

                <!-- Auditoría de Datos -->
                <div class="service-card-modern service-card-emerald group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 via-green-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-emerald-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-green-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-emerald-500 to-green-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent group-hover:from-emerald-300 group-hover:to-green-300 transition-all duration-500 mb-4">Auditoría de Datos</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Evaluación de la calidad, integridad y gestión de datos para asegurar confiabilidad y cumplimiento normativo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metodología de Auditorías -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestra Metodología de Auditoría
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Enfoque integral y estructurado para la evaluación de tus sistemas y procesos
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 services-grid">
                <!-- Planificación -->
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
                                        <path d="M9 11l3 3L22 4"></path>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-red-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500 mb-4">Planificación</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Definición del alcance, objetivos y metodología específica para tu auditoría.
                        </p>
                    </div>
                </div>

                <!-- Ejecución -->
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
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500 mb-4">Ejecución</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Recopilación de datos, análisis técnico y evaluación de controles.
                        </p>
                    </div>
                </div>

                <!-- Análisis -->
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
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-yellow-300 transition-all duration-500 mb-4">Análisis</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Evaluación de hallazgos, identificación de riesgos y oportunidades de mejora.
                        </p>
                    </div>
                </div>

                <!-- Reporte -->
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
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14,2 14,8 20,8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10,9 9,9 8,9"></polyline>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">4</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-cyan-300 transition-all duration-500 mb-4">Reporte</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Documentación detallada con hallazgos, recomendaciones y plan de acción.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Mejorado -->
    <section class="relative py-24 overflow-hidden">
        <!-- Fondo con gradiente complejo -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-green-900 to-blue-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-teal-900/30 via-transparent to-green-500/20"></div>

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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-green-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Contenido principal -->
            <div class="text-center">
                <!-- Badge superior -->
                <div class="inline-block mb-8" data-aos="fade-up">
                    <div class="px-6 py-3 bg-green-500/20 border border-green-400/30 rounded-full backdrop-blur-sm">
                        <span class="text-green-300 font-semibold text-lg">🔍 Auditoría Profesional</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-4xl md:text-6xl lg:text-7xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-green-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-green-400 via-teal-500 to-blue-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Optimizar tu Tecnología?
                    </span>
            </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span class="bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent font-semibold">expertos en auditorías</span> están listos para
                    <span class="bg-gradient-to-r from-teal-400 to-blue-400 bg-clip-text text-transparent font-semibold">mejorar la eficiencia y rendimiento</span> de tu infraestructura
                </p>

                <!-- Botones mejorados -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="600">
                    <!-- Botón WhatsApp Premium -->
                <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-green-500 via-teal-600 to-blue-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-green-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 via-teal-500 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">chat</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Consulta Gratuita</div>
                                <div class="text-sm opacity-90">WhatsApp 24/7</div>
                            </div>
                        </div>

                        <!-- Borde de neón -->
                        <div class="absolute inset-0 rounded-xl border-2 border-green-400/50 group-hover:border-green-300 group-hover:shadow-[0_0_20px_rgba(34,197,94,0.6)] transition-all duration-500"></div>
                    </a>

                    <!-- Botón Llamada Premium -->
                <a href="tel:+525512345678"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-blue-400 text-blue-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-blue-500/20 hover:to-green-500/20">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/10 via-green-400/10 to-blue-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-blue-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">phone</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Llamada Directa</div>
                                <div class="text-sm opacity-90">Asesoría Inmediata</div>
                            </div>
                        </div>

                        <!-- Borde de neón animado -->
                        <div class="absolute inset-0 rounded-xl border-2 border-blue-400 group-hover:border-blue-300 group-hover:shadow-[0_0_25px_rgba(59,130,246,0.8)] transition-all duration-500"></div>
                        <div class="absolute inset-0 rounded-xl border border-blue-300/30 group-hover:border-blue-200/50 group-hover:shadow-[inset_0_0_15px_rgba(59,130,246,0.3)] transition-all duration-500"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
