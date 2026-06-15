@extends('layouts.app')

@section('title', 'Reingeniería - SoftLinkIA')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="min-height: calc(100vh - 80px); padding-top: 2rem;">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-10">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa" alt="Reingeniería Technology" class="w-full h-full object-cover opacity-50">
        </div>

        <!-- Overlay gradients -->
        <div class="absolute inset-0 z-20 bg-gradient-to-br from-orange-900/80 via-red-900/70 to-yellow-900/80"></div>
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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-orange-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-red-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 flex flex-col justify-center" style="min-height: calc(100vh - 120px);">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-16 unified-glow-effect leading-tight" data-aos="fade-up">
                    <span class="bg-gradient-to-r from-white via-orange-200 to-red-300 bg-clip-text text-transparent animate-gradient-x">
                        Reingeniería
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-orange-400 via-red-500 to-yellow-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        de Sistemas
                    </span>
            </h1>

                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-orange-500 via-red-600 to-yellow-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-orange-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-400 via-red-500 to-yellow-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-orange-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-red-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>
                        <div class="absolute top-1/2 right-3 w-1 h-1 bg-yellow-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.5s"></div>

                        <!-- Icono y texto -->
                        <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.515"/>
                        </svg>
                        <span class="relative z-10">WhatsApp</span>
                    </a>

                    <a href="#servicios"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-yellow-400 text-yellow-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center hover:bg-yellow-400 hover:text-white shadow-2xl hover:shadow-yellow-400/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-orange-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-yellow-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-orange-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

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
                        <div class="text-4xl md:text-5xl font-black text-orange-400 mb-2">300%</div>
                        <div class="text-slate-300 font-medium">Mejora de Rendimiento</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-red-400 mb-2">95%</div>
                        <div class="text-slate-300 font-medium">Reducción de Costos</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-yellow-400 mb-2">100%</div>
                        <div class="text-slate-300 font-medium">Compatibilidad Legacy</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Descripción del Servicio -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                        <span class="bg-gradient-to-r from-white via-orange-200 to-yellow-300 bg-clip-text text-transparent">
                            Moderniza tus
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-orange-400 via-red-500 to-yellow-600 bg-clip-text text-transparent">
                            Sistemas Legacy
                        </span>
                    </h2>
                    <p class="text-lg text-slate-300 mb-6 leading-relaxed">
                        Nuestro equipo de <span class="bg-gradient-to-r from-orange-400 to-red-400 bg-clip-text text-transparent font-semibold">expertos en reingeniería</span> transforma sistemas obsoletos en
                        <span class="bg-gradient-to-r from-red-400 to-yellow-400 bg-clip-text text-transparent font-semibold">aplicaciones modernas y escalables</span> que mantienen la funcionalidad existente.
                    </p>
                    <p class="text-lg text-slate-300 mb-8 leading-relaxed">
                        Desde el <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent font-semibold">análisis de arquitectura</span> hasta la implementación de
                        <span class="bg-gradient-to-r from-orange-400 to-red-400 bg-clip-text text-transparent font-semibold">tecnologías de vanguardia</span>,
                        preservamos la lógica de negocio crítica mientras mejoramos significativamente el rendimiento.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="https://wa.me/5215522614633" target="_blank"
                           class="group relative overflow-hidden bg-gradient-to-r from-orange-500 via-red-600 to-yellow-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center shadow-2xl hover:shadow-orange-500/50">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">chat</span>
                            <span>WhatsApp</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-orange-400/50 group-hover:border-orange-300 group-hover:shadow-[0_0_20px_rgba(251,146,60,0.6)] transition-all duration-500"></div>
                        </a>
                        <a href="#servicios"
                           class="group relative overflow-hidden border-2 border-yellow-400 text-yellow-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">arrow_downward</span>
                            <span>Ver Servicios</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-yellow-400 group-hover:border-yellow-300 group-hover:shadow-[0_0_25px_rgba(250,204,21,0.8)] transition-all duration-500"></div>
                        </a>
                    </div>
                </div>
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-left">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-red-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-red-400 rounded-full opacity-40 animate-ping"></div>
                    <div class="absolute top-1/2 right-8 w-1.5 h-1.5 bg-yellow-400 rounded-full opacity-50 animate-bounce"></div>

                    <div class="relative z-10 space-y-6">
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-red-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-orange-500 to-red-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-red-300 transition-all duration-500">Mejora de Rendimiento</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Hasta 300% más rápido</p>
                            </div>
                                </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-red-500 to-yellow-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-red-500 to-yellow-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-yellow-300 transition-all duration-500">Seguridad Moderna</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Protección avanzada</p>
                            </div>
                                </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-yellow-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M3 3v5h5"></path>
                                        <path d="M3 8l7-7 13 13v3h-3L7 4l-4 4"></path>
                                        <path d="M14 15h5l-5 5v-5z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-yellow-200 bg-clip-text text-transparent group-hover:from-yellow-300 group-hover:to-orange-300 transition-all duration-500">Escalabilidad</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Crecimiento sin límites</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios de Reingeniería -->
    <section id="servicios" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Servicios de Reingeniería
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Soluciones integrales para modernizar y optimizar sistemas legacy
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Análisis de Sistemas -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-red-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-red-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-red-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-orange-500 to-red-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M3 3v18h18"></path>
                                                <path d="m19 9-5 5-4-4-3 3"></path>
                                                <circle cx="9" cy="9" r="1"></circle>
                                                <circle cx="15" cy="15" r="1"></circle>
                                                <circle cx="12" cy="12" r="1"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-red-300 transition-all duration-500">Análisis de Sistemas</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Evaluación exhaustiva de sistemas legacy para identificar oportunidades de mejora y definir la estrategia de modernización.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-orange-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Migración de Datos -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
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
                                                <path d="M12 2v20"></path>
                                                <path d="m15 19-3 3-3-3"></path>
                                                <path d="m19 9 3 3-3 3"></path>
                                                <path d="m5 9-3 3 3 3"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500">Migración de Datos</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Transferencia segura y eficiente de datos desde sistemas legacy hacia nuevas plataformas modernas.</p>
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

                <!-- Refactoring de Código -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-600/20 via-orange-500/10 to-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-yellow-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-orange-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-yellow-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <polyline points="16 18 22 12 16 6"></polyline>
                                                <polyline points="8 6 2 12 8 18"></polyline>
                                                <line x1="12" y1="2" x2="12" y2="22"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-yellow-200 bg-clip-text text-transparent group-hover:from-yellow-300 group-hover:to-orange-300 transition-all duration-500">Refactoring de Código</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Reestructuración y optimización del código existente para mejorar mantenibilidad y rendimiento.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-orange-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modernización de Arquitectura -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-yellow-500/10 to-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-yellow-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-yellow-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-orange-500 to-yellow-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                                <line x1="12" y1="17" x2="12" y2="21"></line>
                                                <path d="M7 7h10v6H7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-yellow-300 transition-all duration-500">Modernización de Arquitectura</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Rediseño de la arquitectura del sistema para aprovechar tecnologías modernas y patrones de diseño actuales.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-orange-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actualización de Tecnologías -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
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
                                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                                <polyline points="3.27,6.96 12,12.01 20.73,6.96"></polyline>
                                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500">Actualización de Tecnologías</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Migración a tecnologías modernas y frameworks actualizados para mejorar rendimiento y seguridad.</p>
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

                <!-- Testing y QA -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
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
                                                <path d="m8 2 1.88 1.88"></path>
                                                <path d="M14.12 3.88 16 2"></path>
                                                <path d="M9 7.13v-1a3.003 3.003 0 1 1 6 0v1"></path>
                                                <path d="M12 20c-3.3 0-6-2.7-6-6v-3a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v3c0 3.3-2.7 6-6 6"></path>
                                                <path d="M12 20v-9"></path>
                                                <path d="M6.53 9C4.6 8.8 3 7.1 3 5"></path>
                                                <path d="M6 13H2"></path>
                                                <path d="M3 21c0-2.1 1.7-3.9 3.8-4"></path>
                                                <path d="M20.97 5c0 2.1-1.6 3.8-3.5 4"></path>
                                                <path d="M22 13h-4"></path>
                                                <path d="M17.2 17c2.1.1 3.8 1.9 3.8 4"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500">Testing y QA</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Implementación de pruebas automatizadas y procesos de calidad para garantizar la estabilidad del sistema.</p>
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
            </div>
        </div>
    </section>

    <!-- Proceso de Reingeniería -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestro Proceso de Reingeniería
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Metodología probada para modernizar sistemas legacy de manera segura y eficiente
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 services-grid">
                <!-- Análisis -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
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
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500 mb-4">Análisis</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Evaluación completa del sistema actual
                        </p>
                    </div>
                </div>

                <!-- Planificación -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-red-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-red-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-red-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-orange-500 to-red-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M9 12l2 2 4-4"></path>
                                        <path d="M21 12c.552 0 1-.448 1-1V8a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v3c0 .552.448 1 1 1"></path>
                                        <path d="M21 6V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"></path>
                                        <path d="M3 13v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-red-300 transition-all duration-500 mb-4">Planificación</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Diseño de estrategia de reingeniería
                        </p>
                    </div>
                </div>

                <!-- Ejecución -->
                <div class="service-card-modern service-card-yellow group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-600/20 via-orange-500/10 to-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-yellow-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-orange-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-yellow-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-yellow-200 bg-clip-text text-transparent group-hover:from-yellow-300 group-hover:to-orange-300 transition-all duration-500 mb-4">Ejecución</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Implementación gradual de mejoras
                        </p>
                    </div>
                </div>

                <!-- Validación -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
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
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-red-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">4</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-orange-300 transition-all duration-500 mb-4">Validación</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Pruebas exhaustivas y optimización
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Mejorado -->
    <section class="relative py-24 overflow-hidden">
        <!-- Fondo con gradiente complejo -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-orange-900 to-red-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-yellow-900/30 via-transparent to-orange-500/20"></div>

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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-orange-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-red-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Contenido principal -->
            <div class="text-center">
                <!-- Badge superior -->
                <div class="inline-block mb-8" data-aos="fade-up">
                    <div class="px-6 py-3 bg-orange-500/20 border border-orange-400/30 rounded-full backdrop-blur-sm">
                        <span class="text-orange-300 font-semibold text-lg">⚡ Reingeniería de Sistemas</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-4xl md:text-6xl lg:text-7xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-orange-200 to-yellow-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-orange-400 via-red-500 to-yellow-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Modernizar tu Sistema?
                    </span>
            </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span class="bg-gradient-to-r from-orange-400 to-red-400 bg-clip-text text-transparent font-semibold">expertos en reingeniería</span> están listos para
                    <span class="bg-gradient-to-r from-red-400 to-yellow-400 bg-clip-text text-transparent font-semibold">transformar tu sistema legacy</span> en una aplicación moderna
                </p>

                <!-- Botones mejorados -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="600">
                    <!-- Botón WhatsApp Premium -->
                <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-orange-500 via-red-600 to-yellow-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-orange-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-400 via-red-500 to-yellow-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-orange-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-red-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">chat</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Consulta Gratuita</div>
                                <div class="text-sm opacity-90">WhatsApp 24/7</div>
                            </div>
                        </div>

                        <!-- Borde de neón -->
                        <div class="absolute inset-0 rounded-xl border-2 border-orange-400/50 group-hover:border-orange-300 group-hover:shadow-[0_0_20px_rgba(251,146,60,0.6)] transition-all duration-500"></div>
                    </a>

                    <!-- Botón Llamada Premium -->
                <a href="tel:+525512345678"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-yellow-400 text-yellow-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-yellow-500/20 hover:to-orange-500/20">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/10 via-orange-400/10 to-yellow-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-yellow-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-yellow-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-orange-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">phone</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Llamar Ahora</div>
                                <div class="text-sm opacity-90">Asesoría Inmediata</div>
                            </div>
                        </div>

                        <!-- Borde de neón animado -->
                        <div class="absolute inset-0 rounded-xl border-2 border-yellow-400 group-hover:border-yellow-300 group-hover:shadow-[0_0_25px_rgba(250,204,21,0.8)] transition-all duration-500"></div>
                        <div class="absolute inset-0 rounded-xl border border-yellow-300/30 group-hover:border-yellow-200/50 group-hover:shadow-[inset_0_0_15px_rgba(250,204,21,0.3)] transition-all duration-500"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection