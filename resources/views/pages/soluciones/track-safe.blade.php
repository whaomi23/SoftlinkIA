@extends('layouts.app')

@section('title', 'Track Safe - Solución de Seguridad y Monitoreo - SoftLinkIA')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="min-height: calc(100vh - 80px); padding-top: 2rem;">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-10">
            <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31" alt="Security and Monitoring" class="w-full h-full object-cover opacity-50">
        </div>

        <!-- Overlay gradients -->
        <div class="absolute inset-0 z-20 bg-gradient-to-br from-green-900/80 via-teal-900/70 to-emerald-900/80"></div>
        <div class="absolute inset-0 z-20 bg-gradient-to-t from-slate-900/90 via-transparent to-slate-900/60"></div>

        <!-- Efectos de partículas -->
        <div class="unified-particles-container z-30">
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
        </div>

        <!-- Efectos de luz -->
        <div class="absolute inset-0 z-25">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-green-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-teal-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 flex flex-col justify-center" style="min-height: calc(100vh - 120px);">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black mb-16 unified-glow-effect leading-tight" data-aos="fade-up">
                    <span class="bg-gradient-to-r from-white via-green-200 to-teal-300 bg-clip-text text-transparent animate-gradient-x">
                        Track Safe
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-green-400 via-teal-500 to-emerald-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Security & Monitoring
                    </span>
                </h1>

                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-green-500 via-teal-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-green-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 via-teal-500 to-emerald-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
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

                    <a href="#caracteristicas"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-emerald-400 text-emerald-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center hover:bg-emerald-400 hover:text-white shadow-2xl hover:shadow-emerald-400/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-green-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-emerald-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <!-- Icono y texto -->
                        <svg class="w-6 h-6 mr-3 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="relative z-10">Ver Características</span>
                    </a>
                </div>

                <!-- Estadísticas -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-green-400 mb-2">24/7</div>
                        <div class="text-slate-300 font-medium">Monitoreo Continuo</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-teal-400 mb-2">99.9%</div>
                        <div class="text-slate-300 font-medium">Disponibilidad</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-emerald-400 mb-2">∞</div>
                        <div class="text-slate-300 font-medium">Dispositivos Conectados</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Descripción de Track Safe -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                        <span class="bg-gradient-to-r from-white via-green-200 to-teal-300 bg-clip-text text-transparent">
                            Transformamos tu
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-green-400 via-teal-500 to-emerald-600 bg-clip-text text-transparent">
                            Seguridad en Inteligencia
                        </span>
                    </h2>
                    <p class="text-lg text-slate-300 mb-6 leading-relaxed">
                        Nuestro equipo de <span class="bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent font-semibold">expertos en seguridad</span> implementa las últimas tecnologías y
                        <span class="bg-gradient-to-r from-teal-400 to-emerald-400 bg-clip-text text-transparent font-semibold">sistemas de monitoreo</span> para crear soluciones de seguridad inteligente de clase mundial.
                    </p>
                    <p class="text-lg text-slate-300 mb-8 leading-relaxed">
                        Desde el <span class="bg-gradient-to-r from-emerald-400 to-green-400 bg-clip-text text-transparent font-semibold">rastreo en tiempo real</span> hasta la implementación de
                        <span class="bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent font-semibold">sistemas de alerta inteligentes</span>,
                        garantizamos soluciones de seguridad que escalan con tu crecimiento empresarial.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="https://wa.me/5215522614633" target="_blank"
                           class="group relative overflow-hidden bg-gradient-to-r from-green-500 via-teal-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center shadow-2xl hover:shadow-green-500/50">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">chat</span>
                            <span>WhatsApp</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-green-400/50 group-hover:border-green-300 group-hover:shadow-[0_0_20px_rgba(34,197,94,0.6)] transition-all duration-500"></div>
                        </a>
                        <a href="#caracteristicas"
                           class="group relative overflow-hidden border-2 border-emerald-400 text-emerald-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">arrow_downward</span>
                            <span>Ver Características</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-emerald-400 group-hover:border-emerald-300 group-hover:shadow-[0_0_25px_rgba(16,185,129,0.8)] transition-all duration-500"></div>
                        </a>
                    </div>
                </div>
                <div class="service-card-modern service-card-cyan group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-left">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-teal-500/10 to-emerald-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-teal-400 rounded-full opacity-40 animate-ping"></div>
                    <div class="absolute top-1/2 right-8 w-1.5 h-1.5 bg-emerald-400 rounded-full opacity-50 animate-bounce"></div>

                    <div class="relative z-10 space-y-6">
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-teal-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-green-500 to-teal-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-teal-300 transition-all duration-500">Tiempo Real</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Monitoreo continuo 24/7</p>
                            </div>
                        </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-teal-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-teal-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <circle cx="12" cy="16" r="1"></circle>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-teal-200 bg-clip-text text-transparent group-hover:from-teal-300 group-hover:to-emerald-300 transition-all duration-500">Seguridad</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Protección avanzada de activos</p>
                            </div>
                        </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-emerald-500 to-green-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M9 11H1l6-6 6 6"></path>
                                        <path d="M9 17l3 3 3-3"></path>
                                        <path d="M22 18.5c-.5 1.5-2 2.5-4 2.5s-3.5-1-4-2.5c-.5-1.5 0-3 1.5-3.5 1.5-.5 3.5 0 4 1.5.5 1.5 2 2.5 2.5 2"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent group-hover:from-emerald-300 group-hover:to-green-300 transition-all duration-500">Inteligencia</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Análisis predictivo con IA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Características Principales -->
    <section id="caracteristicas" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Características Principales
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Funcionalidades diseñadas para maximizar la seguridad y eficiencia operativa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Rastreo GPS en Tiempo Real -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-teal-500/10 to-emerald-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-teal-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-teal-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-green-500 to-teal-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-teal-300 transition-all duration-500 mb-4">Rastreo GPS</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Localización precisa de activos con actualizaciones en tiempo real y historial de rutas detallado con precisión de hasta 3 metros.</p>
                        </div>
                    </div>
                </div>

                <!-- Monitoreo de Sensores -->
                <div class="service-card-modern service-card-teal group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-600/20 via-emerald-500/10 to-green-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-teal-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-teal-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-teal-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path d="M12 1v6m0 6v6"></path>
                                            <path d="m21 12-6-3-6 3-6-3-6 3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-teal-200 bg-clip-text text-transparent group-hover:from-teal-300 group-hover:to-emerald-300 transition-all duration-500 mb-4">Sensores Inteligentes</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Sensores avanzados que monitorean temperatura, humedad, vibración y otros parámetros críticos en tiempo real.</p>
                        </div>
                    </div>
                </div>

                <!-- Alertas Inteligentes -->
                <div class="service-card-modern service-card-emerald group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 via-green-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-emerald-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-green-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-emerald-500 to-green-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent group-hover:from-emerald-300 group-hover:to-green-300 transition-all duration-500 mb-4">Alertas Inteligentes</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Sistema de alertas configurable que notifica eventos importantes a través de múltiples canales con IA predictiva.</p>
                        </div>
                    </div>
                </div>

                <!-- Análisis Predictivo -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-cyan-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M3 3v5h5"></path>
                                            <path d="M6 17a9 9 0 0 1 0-10"></path>
                                            <path d="M21 21v-5h-5"></path>
                                            <path d="M18 7a9 9 0 0 1 0 10"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-4">Análisis Predictivo</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">IA y machine learning para predecir eventos, optimizar rutas y operaciones con análisis de patrones avanzados.</p>
                        </div>
                    </div>
                </div>

                <!-- Seguridad Avanzada -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-violet-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-violet-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 mb-4">Seguridad Avanzada</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Protección integral con encriptación AES-256, autenticación multifactor y cumplimiento de estándares internacionales.</p>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Interactivo -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-amber-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-amber-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-orange-500 to-amber-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="9" y1="9" x2="15" y2="9"></line>
                                            <line x1="9" y1="15" x2="15" y2="15"></line>
                                            <line x1="9" y1="12" x2="15" y2="12"></line>
                                            <circle cx="6" cy="9" r="1"></circle>
                                            <circle cx="6" cy="12" r="1"></circle>
                                            <circle cx="6" cy="15" r="1"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-amber-300 transition-all duration-500 mb-4">Dashboard Interactivo</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Interfaz intuitiva con visualizaciones en tiempo real, reportes personalizables y acceso móvil completo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Beneficios de Track Safe -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Beneficios de Track Safe Security & Monitoring
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Ventajas competitivas que obtienes al elegir nuestra plataforma de seguridad y monitoreo
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Monitoreo Inteligente -->
                <div class="service-card-modern service-card-cyan group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-teal-500/10 to-emerald-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-teal-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-teal-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-green-500 to-teal-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-teal-300 transition-all duration-500 mb-4">Monitoreo Inteligente</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            IA avanzada y análisis predictivo de seguridad
                        </p>
                    </div>
                </div>

                <!-- Tiempo Real -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-600/20 via-emerald-500/10 to-green-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-teal-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-teal-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-teal-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M12 2v10l4.5-4.5"></path>
                                        <path d="M12 12v10"></path>
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-teal-200 bg-clip-text text-transparent group-hover:from-teal-300 group-hover:to-emerald-300 transition-all duration-500 mb-4">Tiempo Real</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Alertas y datos actualizados instantáneamente
                        </p>
                    </div>
                </div>

                <!-- Escalabilidad -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 via-green-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-emerald-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-green-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-emerald-500 to-green-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent group-hover:from-emerald-300 group-hover:to-green-300 transition-all duration-500 mb-4">Escalabilidad</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Crecimiento automático según tus necesidades
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
            <div class="absolute top-20 left-10 w-72 h-72 bg-green-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Casos de Éxito en Seguridad y Monitoreo
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Organizaciones que han transformado su seguridad con Track Safe Security & Monitoring
                </p>
            </div>

            <!-- Carrusel Container -->
            <div class="relative" data-aos="fade-up" data-aos-delay="200">
                <div class="overflow-hidden rounded-2xl mx-4 sm:mx-8 md:mx-16 lg:mx-24">
                    <div id="track-safe-success-carousel" class="flex transition-transform duration-700 ease-in-out">
                        <!-- Caso 1: Empresa Logística -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <!-- Efectos de fondo animados -->
                                <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-teal-500/10 to-emerald-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <!-- Partículas flotantes -->
                                <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-teal-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <!-- Tags -->
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-sm font-medium border border-green-500/30">Logística</span>
                                            <span class="px-3 py-1 bg-teal-500/20 text-teal-300 rounded-full text-sm font-medium border border-teal-500/30">Flota</span>
                                            <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 rounded-full text-sm font-medium border border-emerald-500/30">GPS</span>
                                        </div>

                                        <!-- Título -->
                                        <h3 class="text-lg sm:text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-teal-300 transition-all duration-500 mb-3">
                                            Seguridad de Flota para Empresa Logística
                                        </h3>

                                        <!-- Descripción -->
                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Implementación de Track Safe que resultó en una reducción del 45% en robos de vehículos y mejora del 60% en tiempos de respuesta con monitoreo 24/7.
                                        </p>

                                        <!-- Enlace -->
                                        <a href="#" class="inline-flex items-center text-green-400 hover:text-green-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-teal-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Fleet Security"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 2: Centro Comercial -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <div class="absolute inset-0 bg-gradient-to-br from-teal-600/20 via-emerald-500/10 to-green-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <div class="absolute top-4 right-4 w-2 h-2 bg-teal-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-teal-500/20 text-teal-300 rounded-full text-sm font-medium border border-teal-500/30">Retail</span>
                                            <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 rounded-full text-sm font-medium border border-emerald-500/30">Monitoreo</span>
                                            <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-sm font-medium border border-green-500/30">CCTV</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-teal-200 bg-clip-text text-transparent group-hover:from-teal-300 group-hover:to-emerald-300 transition-all duration-500 mb-3">
                                            Monitoreo Integral para Centro Comercial
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Sistema de monitoreo integral que mejoró la seguridad del centro comercial en un 70% y redujo incidentes en un 50% con IA predictiva.
                                        </p>

                                        <a href="#" class="inline-flex items-center text-teal-400 hover:text-teal-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/20 to-emerald-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Shopping Center Security"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 3: Empresa Minera -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 via-green-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <div class="absolute top-4 right-4 w-2 h-2 bg-emerald-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-green-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 rounded-full text-sm font-medium border border-emerald-500/30">Minería</span>
                                            <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-sm font-medium border border-green-500/30">Activos</span>
                                            <span class="px-3 py-1 bg-teal-500/20 text-teal-300 rounded-full text-sm font-medium border border-teal-500/30">Sensores</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent group-hover:from-emerald-300 group-hover:to-green-300 transition-all duration-500 mb-3">
                                            Protección de Activos para Empresa Minera
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Sistema de monitoreo de activos mineros que redujo pérdidas por robo en un 80% y mejoró la seguridad operativa con sensores IoT.
                                        </p>

                                        <a href="#" class="inline-flex items-center text-emerald-400 hover:text-emerald-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/20 to-green-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Mining Security"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 4: Empresa de Construcción -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm font-medium border border-blue-500/30">Construcción</span>
                                            <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-sm font-medium border border-indigo-500/30">Obras</span>
                                            <span class="px-3 py-1 bg-teal-500/20 text-teal-300 rounded-full text-sm font-medium border border-teal-500/30">Maquinaria</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-3">
                                            Seguridad de Obras para Empresa de Construcción
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Monitoreo de maquinaria pesada y equipos de construcción que redujo robos en un 65% y mejoró la seguridad del personal en obras.
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
                                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Construction Security"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controles de navegación -->
                <button id="prev-track-safe-story" class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-slate-800/80 hover:bg-slate-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 z-20">
                    <span class="material-icons text-green-400 text-lg sm:text-xl">chevron_left</span>
                </button>
                <button id="next-track-safe-story" class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-slate-800/80 hover:bg-slate-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 z-20">
                    <span class="material-icons text-green-400 text-lg sm:text-xl">chevron_right</span>
                </button>

                <!-- Indicadores -->
                <div class="flex justify-center space-x-2 mt-8">
                    <button class="track-safe-story-dot w-3 h-3 rounded-full bg-green-400 transition-all duration-300 hover:scale-125" data-index="0"></button>
                    <button class="track-safe-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-green-400 transition-all duration-300 hover:scale-125" data-index="1"></button>
                    <button class="track-safe-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-green-400 transition-all duration-300 hover:scale-125" data-index="2"></button>
                    <button class="track-safe-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-green-400 transition-all duration-300 hover:scale-125" data-index="3"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Mejorado -->
    <section class="relative py-24 overflow-hidden">
        <!-- Fondo con gradiente complejo -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-green-900 to-teal-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-emerald-900/30 via-transparent to-green-500/20"></div>

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
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-teal-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Contenido principal -->
            <div class="text-center">
                <!-- Badge superior -->
                <div class="inline-block mb-8" data-aos="fade-up">
                    <div class="px-6 py-3 bg-green-500/20 border border-green-400/30 rounded-full backdrop-blur-sm">
                        <span class="text-green-300 font-semibold text-lg">🛡️ Track Safe Security & Monitoring</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-green-200 to-teal-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-green-400 via-teal-500 to-emerald-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Proteger tus Activos?
                    </span>
                </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span class="bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent font-semibold">expertos en seguridad</span> están listos para
                    <span class="bg-gradient-to-r from-teal-400 to-emerald-400 bg-clip-text text-transparent font-semibold">revolucionar tu sistema de monitoreo</span> con Track Safe
                </p>

                <!-- Botones mejorados -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="600">
                    <!-- Botón WhatsApp Premium -->
                    <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-green-500 via-teal-600 to-emerald-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-green-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 via-teal-500 to-emerald-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-teal-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

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
                       class="neon-button-secondary group relative overflow-hidden border-2 border-teal-400 text-teal-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-teal-500/20 hover:to-green-500/20">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-400/10 via-green-400/10 to-teal-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-teal-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-teal-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">phone</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Llamar Ahora</div>
                                <div class="text-sm opacity-90">Asesoría Inmediata</div>
                            </div>
                        </div>

                        <!-- Borde de neón animado -->
                        <div class="absolute inset-0 rounded-xl border-2 border-teal-400 group-hover:border-teal-300 group-hover:shadow-[0_0_25px_rgba(20,184,166,0.8)] transition-all duration-500"></div>
                        <div class="absolute inset-0 rounded-xl border border-teal-300/30 group-hover:border-teal-200/50 group-hover:shadow-[inset_0_0_15px_rgba(20,184,166,0.3)] transition-all duration-500"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript para el carrusel de casos de éxito de Track Safe -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('track-safe-success-carousel');
        const prevBtn = document.getElementById('prev-track-safe-story');
        const nextBtn = document.getElementById('next-track-safe-story');
        const dots = document.querySelectorAll('.track-safe-story-dot');

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
                    dot.classList.add('bg-green-400');
                } else {
                    dot.classList.remove('bg-green-400');
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
@endsection