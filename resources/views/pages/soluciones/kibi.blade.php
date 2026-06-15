@extends('layouts.app')

@section('title', 'KIBI - Solución de Inteligencia de Negocios - SoftLinkIA')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="min-height: calc(100vh - 80px); padding-top: 2rem;">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-10">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71" alt="Business Intelligence" class="w-full h-full object-cover opacity-50">
        </div>

        <!-- Overlay gradients -->
        <div class="absolute inset-0 z-20 bg-gradient-to-br from-cyan-900/80 via-blue-900/70 to-indigo-900/80"></div>
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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 flex flex-col justify-center" style="min-height: calc(100vh - 120px);">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black mb-16 unified-glow-effect leading-tight" data-aos="fade-up">
                    <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                        KIBI
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Business Intelligence
                    </span>
                </h1>

                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-cyan-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>
                        <div class="absolute top-1/2 right-3 w-1 h-1 bg-indigo-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.5s"></div>

                        <!-- Icono y texto -->
                        <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.515"/>
                        </svg>
                        <span class="relative z-10">WhatsApp</span>
                    </a>

                    <a href="#caracteristicas"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-indigo-400 text-indigo-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center hover:bg-indigo-400 hover:text-white shadow-2xl hover:shadow-indigo-400/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400/20 to-cyan-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-indigo-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

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
                        <div class="text-4xl md:text-5xl font-black text-cyan-400 mb-2">15+</div>
                        <div class="text-slate-300 font-medium">Años de Desarrollo</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-blue-400 mb-2">100%</div>
                        <div class="text-slate-300 font-medium">Datos en Tiempo Real</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-indigo-400 mb-2">∞</div>
                        <div class="text-slate-300 font-medium">Fuentes de Datos</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Descripción de KIBI -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                        <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent">
                            Transformamos tus
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent">
                            Datos en Decisiones
                        </span>
                    </h2>
                    <p class="text-lg text-slate-300 mb-6 leading-relaxed">
                        Nuestro equipo de <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">expertos en Business Intelligence</span> implementa las últimas tecnologías y
                        <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent font-semibold">arquitecturas de datos</span> para crear soluciones de inteligencia empresarial de clase mundial.
                    </p>
                    <p class="text-lg text-slate-300 mb-8 leading-relaxed">
                        Desde el <span class="bg-gradient-to-r from-indigo-400 to-cyan-400 bg-clip-text text-transparent font-semibold">análisis de datos</span> hasta la implementación de
                        <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">dashboards interactivos</span>,
                        garantizamos soluciones de BI que escalan con tu crecimiento empresarial.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="https://wa.me/5215522614633" target="_blank"
                           class="group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center shadow-2xl hover:shadow-cyan-500/50">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">chat</span>
                            <span>WhatsApp</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-cyan-400/50 group-hover:border-cyan-300 group-hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] transition-all duration-500"></div>
                        </a>
                        <a href="#caracteristicas"
                           class="group relative overflow-hidden border-2 border-indigo-400 text-indigo-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">arrow_downward</span>
                            <span>Ver Características</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-indigo-400 group-hover:border-indigo-300 group-hover:shadow-[0_0_25px_rgba(99,102,241,0.8)] transition-all duration-500"></div>
                        </a>
                    </div>
                </div>
                <div class="service-card-modern service-card-cyan group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-left">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>
                    <div class="absolute top-1/2 right-8 w-1.5 h-1.5 bg-indigo-400 rounded-full opacity-50 animate-bounce"></div>

                    <div class="relative z-10 space-y-6">
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M3 3v5h5"></path>
                                        <path d="M6 17a9 9 0 0 1 0-10"></path>
                                        <path d="M21 21v-5h-5"></path>
                                        <path d="M18 7a9 9 0 0 1 0 10"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">Tiempo Real</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Datos actualizados instantáneamente</p>
                            </div>
                        </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500">Visualización</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Dashboards interactivos y dinámicos</p>
                            </div>
                        </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-indigo-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-cyan-300 transition-all duration-500">Integración</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Conecta múltiples fuentes de datos</p>
                            </div>
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
                    Funcionalidades diseñadas para potenciar la toma de decisiones basada en datos
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Análisis Avanzado -->
                <div class="service-card-modern service-card-cyan group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
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
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500 mb-4">Análisis Avanzado</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Algoritmos de machine learning y análisis predictivo para descubrir patrones ocultos en tus datos empresariales.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#caracteristicas"
                                class="group/link relative overflow-hidden bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-cyan-400 hover:to-blue-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/25 w-full text-center">
                                <span class="relative z-10">Explorar</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Dashboards Personalizables -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
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
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-4">Dashboards Interactivos</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Crea dashboards personalizados con interfaz drag & drop que se adapten a las necesidades específicas de cada usuario.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#caracteristicas"
                                class="group/link relative overflow-hidden bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-blue-400 hover:to-indigo-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-blue-500/25 w-full text-center">
                                <span class="relative z-10">Explorar</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Integración Multi-Fuente -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-cyan-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-indigo-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-indigo-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <circle cx="8" cy="21" r="1"></circle>
                                            <circle cx="19" cy="21" r="1"></circle>
                                            <path d="m2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-cyan-300 transition-all duration-500 mb-4">Integración Total</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Conecta y consolida datos de múltiples fuentes en una plataforma unificada con conectores nativos y APIs.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#caracteristicas"
                                class="group/link relative overflow-hidden bg-gradient-to-r from-indigo-500 to-cyan-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-indigo-400 hover:to-cyan-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/25 w-full text-center">
                                <span class="relative z-10">Explorar</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Reportes Automatizados -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
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
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14,2 14,8 20,8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10,9 9,9 8,9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 mb-4">Reportes Inteligentes</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Genera y distribuye reportes automáticamente con programación flexible y criterios personalizados avanzados.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#caracteristicas"
                                class="group/link relative overflow-hidden bg-gradient-to-r from-purple-500 to-violet-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-purple-400 hover:to-violet-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-purple-500/25 w-full text-center">
                                <span class="relative z-10">Explorar</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Seguridad y Gobernanza -->
                <div class="service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-rose-500/10 to-pink-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-rose-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-red-500 to-rose-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-red-500 to-rose-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-red-200 bg-clip-text text-transparent group-hover:from-red-300 group-hover:to-rose-300 transition-all duration-500 mb-4">Seguridad Avanzada</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Control de acceso granular y auditoría completa con encriptación de datos para máxima seguridad empresarial.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#caracteristicas"
                                class="group/link relative overflow-hidden bg-gradient-to-r from-red-500 to-rose-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-red-400 hover:to-rose-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/25 w-full text-center">
                                <span class="relative z-10">Explorar</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Movilidad -->
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
                                            <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                            <line x1="12" y1="18" x2="12.01" y2="18"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-amber-300 transition-all duration-500 mb-4">Acceso Móvil</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Accede a dashboards y reportes desde cualquier dispositivo con aplicación nativa y acceso offline completo.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#caracteristicas"
                                class="group/link relative overflow-hidden bg-gradient-to-r from-orange-500 to-amber-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-orange-400 hover:to-amber-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-orange-500/25 w-full text-center">
                                <span class="relative z-10">Explorar</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Beneficios -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Beneficios de KIBI Business Intelligence
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Ventajas competitivas que obtienes al elegir nuestra plataforma de inteligencia empresarial
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Análisis Inteligente -->
                <div class="service-card-modern service-card-cyan group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M3 3v5h5"></path>
                                        <path d="M6 17a9 9 0 0 1 0-10"></path>
                                        <path d="M21 21v-5h-5"></path>
                                        <path d="M18 7a9 9 0 0 1 0 10"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500 mb-4">Análisis Inteligente</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Machine learning y análisis predictivo avanzado
                        </p>
                    </div>
                </div>

                <!-- Tiempo Real -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-cyan-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M12 2v10l4.5-4.5"></path>
                                        <path d="M12 12v10"></path>
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-4">Tiempo Real</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Datos actualizados instantáneamente
                        </p>
                    </div>
                </div>

                <!-- Escalabilidad -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-purple-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-indigo-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-purple-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-purple-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-purple-300 transition-all duration-500 mb-4">Escalabilidad</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Crecimiento automático según demanda
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
            <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Casos de Éxito en Business Intelligence
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Organizaciones que han transformado su negocio con KIBI Business Intelligence
                </p>
            </div>

            <!-- Carrusel Container -->
            <div class="relative" data-aos="fade-up" data-aos-delay="200">
                <div class="overflow-hidden rounded-2xl mx-4 sm:mx-8 md:mx-16 lg:mx-24">
                    <div id="kibi-success-carousel" class="flex transition-transform duration-700 ease-in-out">
                        <!-- Caso 1: Empresa Retail -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <!-- Efectos de fondo animados -->
                                <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <!-- Partículas flotantes -->
                                <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <!-- Tags -->
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-cyan-500/20 text-cyan-300 rounded-full text-sm font-medium border border-cyan-500/30">Retail</span>
                                            <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm font-medium border border-blue-500/30">Inventario</span>
                                            <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-sm font-medium border border-indigo-500/30">Analytics</span>
                                        </div>

                                        <!-- Título -->
                                        <h3 class="text-lg sm:text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500 mb-3">
                                            Optimización de Inventario para Empresa Retail
                                        </h3>

                                        <!-- Descripción -->
                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Implementación de KIBI que resultó en una reducción del 30% en costos de inventario y mejora del 25% en la rotación de productos con análisis predictivo.
                                        </p>

                                        <!-- Enlace -->
                                        <a href="#" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/20 to-blue-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Retail Analytics"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 2: Banco Nacional -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-cyan-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-sm font-medium border border-blue-500/30">Fintech</span>
                                            <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-sm font-medium border border-indigo-500/30">Riesgo</span>
                                            <span class="px-3 py-1 bg-cyan-500/20 text-cyan-300 rounded-full text-sm font-medium border border-cyan-500/30">ML</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-3">
                                            Análisis de Riesgo para Banco Nacional
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Sistema de análisis de riesgo en tiempo real que mejoró la precisión de las decisiones crediticias en un 40% usando machine learning.
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
                                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Banking Analytics"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 3: Cadena Hotelera -->
                        <div class="w-full flex-shrink-0">
                            <div class="success-story-card group relative overflow-hidden rounded-2xl p-4 sm:p-6 md:p-8 cursor-pointer transform transition-all duration-700 hover:scale-105 bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-sm border border-slate-700/50 min-h-[320px] sm:min-h-[380px]">
                                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-purple-500/10 to-cyan-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                <div class="absolute top-4 right-4 w-2 h-2 bg-indigo-400 rounded-full opacity-60 animate-pulse"></div>
                                <div class="absolute bottom-8 left-6 w-1 h-1 bg-purple-400 rounded-full opacity-40 animate-ping"></div>

                                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-4 lg:gap-6 h-full mx-4 sm:mx-6 lg:mx-8">
                                    <!-- Contenido izquierdo -->
                                    <div class="flex-1 flex flex-col justify-center w-full lg:max-w-md text-center lg:text-left">
                                        <div class="flex flex-wrap gap-2 mb-5">
                                            <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-sm font-medium border border-indigo-500/30">Hospitality</span>
                                            <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm font-medium border border-purple-500/30">Revenue</span>
                                            <span class="px-3 py-1 bg-cyan-500/20 text-cyan-300 rounded-full text-sm font-medium border border-cyan-500/30">Forecasting</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-purple-300 transition-all duration-500 mb-3">
                                            Revenue Management para Cadena Hotelera
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Dashboard de revenue management que aumentó la ocupación hotelera en un 35% y optimizó precios dinámicos con análisis predictivo.
                                        </p>

                                        <a href="#" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-colors duration-300 font-medium text-sm">
                                            Leer más
                                            <span class="material-icons ml-1 text-sm">arrow_forward</span>
                                        </a>
                                    </div>

                                    <!-- Línea separadora vertical -->
                                    <div class="hidden lg:block w-px h-56 bg-gradient-to-b from-transparent via-slate-600/50 to-transparent flex-shrink-0"></div>

                                    <!-- Imagen derecha -->
                                    <div class="w-full sm:w-64 lg:w-48 h-48 sm:h-56 flex-shrink-0 relative overflow-hidden rounded-xl group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 rounded-xl"></div>
                                        <img src="https://images.unsplash.com/photo-1566075798-4825dfaaf498?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Hotel Analytics"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Caso 4: Empresa Logística -->
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
                                            <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm font-medium border border-purple-500/30">Logística</span>
                                            <span class="px-3 py-1 bg-violet-500/20 text-violet-300 rounded-full text-sm font-medium border border-violet-500/30">Supply Chain</span>
                                            <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-sm font-medium border border-indigo-500/30">IoT</span>
                                        </div>

                                        <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 mb-3">
                                            Optimización de Supply Chain para Empresa Logística
                                        </h3>

                                        <p class="text-slate-300 mb-5 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed text-sm">
                                            Sistema de análisis de cadena de suministro que redujo costos operativos en un 45% y mejoró la eficiencia de entregas en un 60%.
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
                                        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                             alt="Logistics Analytics"
                                             class="w-full h-full object-cover rounded-xl opacity-90 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controles de navegación -->
                <button id="prev-kibi-story" class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-slate-800/80 hover:bg-slate-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 z-20">
                    <span class="material-icons text-cyan-400 text-lg sm:text-xl">chevron_left</span>
                </button>
                <button id="next-kibi-story" class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-slate-800/80 hover:bg-slate-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 z-20">
                    <span class="material-icons text-cyan-400 text-lg sm:text-xl">chevron_right</span>
                </button>

                <!-- Indicadores -->
                <div class="flex justify-center space-x-2 mt-8">
                    <button class="kibi-story-dot w-3 h-3 rounded-full bg-cyan-400 transition-all duration-300 hover:scale-125" data-index="0"></button>
                    <button class="kibi-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 hover:scale-125" data-index="1"></button>
                    <button class="kibi-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 hover:scale-125" data-index="2"></button>
                    <button class="kibi-story-dot w-3 h-3 rounded-full bg-slate-600 hover:bg-cyan-400 transition-all duration-300 hover:scale-125" data-index="3"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Mejorado -->
    <section class="relative py-24 overflow-hidden">
        <!-- Fondo con gradiente complejo -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-cyan-900 to-blue-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-900/30 via-transparent to-cyan-500/20"></div>

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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Contenido principal -->
            <div class="text-center">
                <!-- Badge superior -->
                <div class="inline-block mb-8" data-aos="fade-up">
                    <div class="px-6 py-3 bg-cyan-500/20 border border-cyan-400/30 rounded-full backdrop-blur-sm">
                        <span class="text-cyan-300 font-semibold text-lg">📊 KIBI Business Intelligence</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Transformar tus Datos?
                    </span>
                </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">expertos en Business Intelligence</span> están listos para
                    <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent font-semibold">revolucionar tu análisis de datos</span> con KIBI
                </p>


                <!-- Botones mejorados -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="600">
                    <!-- Botón WhatsApp Premium -->
                    <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-cyan-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">chat</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Consulta Gratuita</div>
                                <div class="text-sm opacity-90">WhatsApp 24/7</div>
                            </div>
                        </div>

                        <!-- Borde de neón -->
                        <div class="absolute inset-0 rounded-xl border-2 border-cyan-400/50 group-hover:border-cyan-300 group-hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] transition-all duration-500"></div>
                    </a>

                    <!-- Botón Llamada Premium -->
                    <a href="tel:+525512345678"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-blue-400 text-blue-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-blue-500/20 hover:to-cyan-500/20">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/10 via-cyan-400/10 to-blue-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-blue-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">phone</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Llamar Ahora</div>
                                <div class="text-sm opacity-90">Asesoría Inmediata</div>
                            </div>
                        </div>

                        <!-- Borde de neón animado -->
                        <div class="absolute inset-0 rounded-xl border-2 border-blue-400 group-hover:border-blue-300 group-hover:shadow-[0_0_25px_rgba(59,130,246,0.8)] transition-all duration-500"></div>
                        <div class="absolute inset-0 rounded-xl border border-blue-300/30 group-hover:border-blue-200/50 group-hover:shadow-[inset_0_0_15px_rgba(59,130,246,0.3)] transition-all duration-500"></div>
                    </a>

                    <!-- Botón de Inicio de Sesión KIBI -->
                    <a href="{{ route('kibi.login') }}"
                       class="neon-button-kibi group relative overflow-hidden bg-gradient-to-r from-emerald-500 via-teal-600 to-cyan-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-emerald-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 via-teal-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-emerald-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-teal-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">login</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Iniciar Sesión</div>
                                <div class="text-sm opacity-90">Panel KIBI</div>
                            </div>
                        </div>

                        <!-- Borde de neón -->
                        <div class="absolute inset-0 rounded-xl border-2 border-emerald-400/50 group-hover:border-emerald-300 group-hover:shadow-[0_0_20px_rgba(16,185,129,0.6)] transition-all duration-500"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript para el carrusel de casos de éxito de KIBI y botón oculto -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Variables para el carrusel
        const carousel = document.getElementById('kibi-success-carousel');
        const prevBtn = document.getElementById('prev-kibi-story');
        const nextBtn = document.getElementById('next-kibi-story');
        const dots = document.querySelectorAll('.kibi-story-dot');

        let currentIndex = 0;
        const totalSlides = 4;
        let autoSlideInterval;


        // Funciones del carrusel
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

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 5000); // Cambiar cada 5 segundos
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Event listeners del carrusel
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

    <!-- CSS para la animación del botón -->
    <style>
    @keyframes fadeInScale {
        0% {
            opacity: 0;
            transform: scale(0.8) translateY(20px);
        }
        50% {
            opacity: 0.8;
            transform: scale(1.05) translateY(-5px);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .neon-button-kibi {
        transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .neon-button-kibi:hover {
        box-shadow: 0 0 30px rgba(16, 185, 129, 0.6), 0 0 60px rgba(16, 185, 129, 0.3);
    }
    </style>
@endsection