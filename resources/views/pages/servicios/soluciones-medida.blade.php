@extends('layouts.app')

@section('title', 'Soluciones a Medida - SoftLinkIA')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="min-height: calc(100vh - 80px); padding-top: 2rem;">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-10">
            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c" alt="Custom Solutions Technology" class="w-full h-full object-cover opacity-50">
        </div>

        <!-- Overlay gradients -->
        <div class="absolute inset-0 z-20 bg-gradient-to-br from-indigo-900/80 via-purple-900/70 to-blue-900/80"></div>
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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-purple-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 flex flex-col justify-center" style="min-height: calc(100vh - 120px);">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-16 unified-glow-effect leading-tight" data-aos="fade-up">
                    <span class="bg-gradient-to-r from-white via-indigo-200 to-purple-300 bg-clip-text text-transparent animate-gradient-x">
                        Soluciones
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-indigo-400 via-purple-500 to-blue-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        a Medida
                    </span>
            </h1>

                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-indigo-500 via-purple-600 to-blue-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-indigo-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 via-purple-500 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-indigo-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-purple-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>
                        <div class="absolute top-1/2 right-3 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.5s"></div>

                        <!-- Icono y texto -->
                        <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.515"/>
                        </svg>
                        <span class="relative z-10">WhatsApp</span>
                    </a>

                    <a href="#servicios"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-blue-400 text-blue-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center hover:bg-blue-400 hover:text-white shadow-2xl hover:shadow-blue-400/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-indigo-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-indigo-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

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
                        <div class="text-4xl md:text-5xl font-black text-indigo-400 mb-2">100%</div>
                        <div class="text-slate-300 font-medium">Personalización</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-purple-400 mb-2">24/7</div>
                        <div class="text-slate-300 font-medium">Soporte Técnico</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-blue-400 mb-2">∞</div>
                        <div class="text-slate-300 font-medium">Escalabilidad</div>
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
                        <span class="bg-gradient-to-r from-white via-blue-200 to-indigo-300 bg-clip-text text-transparent">
                            Software Hecho
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-600 bg-clip-text text-transparent">
                            a tu Medida
                        </span>
                    </h2>
                    <p class="text-lg text-slate-300 mb-6 leading-relaxed">
                        Nuestro equipo de <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent font-semibold">expertos en desarrollo</span> crea soluciones de software
                        <span class="bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent font-semibold">completamente personalizadas</span> que se adaptan a los procesos específicos de tu negocio.
                    </p>
                    <p class="text-lg text-slate-300 mb-8 leading-relaxed">
                        Desde <span class="bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent font-semibold">aplicaciones web modernas</span> hasta la implementación de
                        <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent font-semibold">sistemas empresariales complejos</span>,
                        creamos software que evoluciona junto con tu organización y maximiza la eficiencia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="https://wa.me/5215522614633" target="_blank"
                           class="group relative overflow-hidden bg-gradient-to-r from-blue-500 via-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center shadow-2xl hover:shadow-blue-500/50">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">chat</span>
                            <span>WhatsApp</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-blue-400/50 group-hover:border-blue-300 group-hover:shadow-[0_0_20px_rgba(59,130,246,0.6)] transition-all duration-500"></div>
                        </a>
                        <a href="#servicios"
                           class="group relative overflow-hidden border-2 border-purple-400 text-purple-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">arrow_downward</span>
                            <span>Ver Servicios</span>
                            <div class="absolute inset-0 rounded-xl border-2 border-purple-400 group-hover:border-purple-300 group-hover:shadow-[0_0_25px_rgba(168,85,247,0.8)] transition-all duration-500"></div>
                        </a>
                    </div>
                </div>
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-left">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>
                    <div class="absolute top-1/2 right-8 w-1.5 h-1.5 bg-purple-400 rounded-full opacity-50 animate-bounce"></div>

                    <div class="relative z-10 space-y-6">
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14,2 14,8 20,8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10,9 9,9 8,9"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500">Desarrollo Personalizado</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Adaptado a tus necesidades específicas</p>
                            </div>
                                </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-purple-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M4 7v10c0 2.21 1.79 4 4 4h8c2.21 0 4-1.79 4-4V7"></path>
                                        <path d="M4 7c0-2.21 1.79-4 4-4h8c2.21 0 4 1.79 4 4"></path>
                                        <path d="M9 11h6"></path>
                                        <path d="M9 15h6"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-purple-300 transition-all duration-500">Integración Completa</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Con sistemas existentes</p>
                            </div>
                                </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-12 h-12 bg-gradient-to-br from-purple-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M9 12l2 2 4-4"></path>
                                        <path d="M21 12c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z"></path>
                                        <path d="M3 12c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z"></path>
                                        <path d="M12 21c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z"></path>
                                        <path d="M12 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z"></path>
                                        <path d="M18.364 18.364c.39.39 1.024.39 1.414 0s.39-1.024 0-1.414-.024-.39-1.414 0-.39 1.024 0 1.414z"></path>
                                        <path d="M4.222 4.222c.39.39 1.024.39 1.414 0s.39-1.024 0-1.414-1.024-.39-1.414 0-.39 1.024 0 1.414z"></path>
                                        <path d="M18.364 4.222c.39-.39.39-1.024 0-1.414s-1.024-.39-1.414 0-.39 1.024 0 1.414 1.024.39 1.414 0z"></path>
                                        <path d="M4.222 18.364c.39-.39.39-1.024 0-1.414s-1.024-.39-1.414 0-.39 1.024 0 1.414 1.024.39 1.414 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-blue-300 transition-all duration-500">Soporte Continuo</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">Mantenimiento y actualizaciones</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios de Desarrollo -->
    <section id="servicios" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestros Servicios de Desarrollo
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Soluciones tecnológicas personalizadas para diferentes tipos de aplicaciones
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Aplicaciones Web -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-purple-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-indigo-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-purple-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-purple-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                                <line x1="12" y1="17" x2="12" y2="21"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-purple-300 transition-all duration-500">Aplicaciones Web</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Desarrollo de aplicaciones web modernas y responsivas con tecnologías de vanguardia y experiencia de usuario excepcional.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Aplicaciones Móviles -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-purple-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                                <line x1="12" y1="18" x2="12.01" y2="18"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-blue-300 transition-all duration-500">Aplicaciones Móviles</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Desarrollo de apps nativas e híbridas para iOS y Android con funcionalidades avanzadas y rendimiento optimizado.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sistemas Empresariales -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9,22 9,12 15,12 15,22"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500">Sistemas Empresariales</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Desarrollo de sistemas complejos para gestión empresarial con módulos integrados y funcionalidades avanzadas.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- APIs y Microservicios -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-blue-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
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
                                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                                <polyline points="3.27,6.96 12,12.01 20.73,6.96"></polyline>
                                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-blue-300 transition-all duration-500">APIs y Microservicios</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Desarrollo de APIs RESTful y arquitecturas de microservicios para sistemas escalables y mantenibles.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Automatización -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-indigo-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                                <path d="M2 17l10 5 10-5"></path>
                                                <path d="M2 12l10 5 10-5"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-indigo-300 transition-all duration-500">Automatización</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Desarrollo de sistemas de automatización para optimizar procesos empresariales y reducir tareas manuales.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inteligencia Artificial -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-purple-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-purple-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-purple-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <path d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 1.98-3A2.5 2.5 0 0 1 9.5 2Z"></path>
                                                <path d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-1.98-3A2.5 2.5 0 0 0 14.5 2Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-purple-300 transition-all duration-500">Inteligencia Artificial</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Implementación de soluciones de IA para análisis de datos, automatización inteligente y toma de decisiones.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metodología de Desarrollo -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestra Metodología de Desarrollo
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Proceso ágil y colaborativo que garantiza software de alta calidad a medida
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 services-grid">
                <!-- Análisis -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
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
                                        <path d="M9 11H1v3h8v3l3-4-3-4v2z"></path>
                                        <path d="M22 12h-7"></path>
                                        <path d="M18 15l3-3-3-3"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-4">Análisis</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Comprensión profunda de tus necesidades y objetivos
                        </p>
                    </div>
                </div>

                <!-- Diseño -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
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
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <path d="M21 15l-5-5L5 21"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-purple-300 transition-all duration-500 mb-4">Diseño</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Arquitectura técnica y diseño de interfaces
                        </p>
                    </div>
                </div>

                <!-- Desarrollo -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-purple-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <polyline points="16 18 22 12 16 6"></polyline>
                                        <polyline points="8 6 2 12 8 18"></polyline>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-blue-300 transition-all duration-500 mb-4">Desarrollo</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Programación iterativa con entregas incrementales
                        </p>
                    </div>
                </div>

                <!-- Entrega -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-blue-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-green-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22,4 12,14.01 9,11.01"></polyline>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">4</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-blue-300 transition-all duration-500 mb-4">Entrega</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Implementación y soporte continuo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Mejorado -->
    <section class="relative py-24 overflow-hidden">
        <!-- Fondo con gradiente complejo -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-900/30 via-transparent to-blue-500/20"></div>

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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Contenido principal -->
            <div class="text-center">
                <!-- Badge superior -->
                <div class="inline-block mb-8" data-aos="fade-up">
                    <div class="px-6 py-3 bg-blue-500/20 border border-blue-400/30 rounded-full backdrop-blur-sm">
                        <span class="text-blue-300 font-semibold text-lg">💻 Soluciones a Medida</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-4xl md:text-6xl lg:text-7xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-blue-200 to-indigo-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para tu
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Software Personalizado?
                    </span>
            </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent font-semibold">expertos en desarrollo</span> están listos para
                    <span class="bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent font-semibold">transformar tus ideas</span> en software que impulse tu negocio
                </p>

                <!-- Botones mejorados -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="600">
                    <!-- Botón WhatsApp Premium -->
                <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-blue-500 via-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-blue-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-indigo-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">chat</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Consulta Gratuita</div>
                                <div class="text-sm opacity-90">WhatsApp 24/7</div>
                            </div>
                        </div>

                        <!-- Borde de neón -->
                        <div class="absolute inset-0 rounded-xl border-2 border-blue-400/50 group-hover:border-blue-300 group-hover:shadow-[0_0_20px_rgba(59,130,246,0.6)] transition-all duration-500"></div>
                    </a>

                    <!-- Botón Llamada Premium -->
                <a href="tel:+525512345678"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-indigo-400 text-indigo-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-indigo-500/20 hover:to-blue-500/20">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400/10 via-blue-400/10 to-indigo-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-indigo-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-indigo-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">phone</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Llamar Ahora</div>
                                <div class="text-sm opacity-90">Asesoría Inmediata</div>
                            </div>
                        </div>

                        <!-- Borde de neón animado -->
                        <div class="absolute inset-0 rounded-xl border-2 border-indigo-400 group-hover:border-indigo-300 group-hover:shadow-[0_0_25px_rgba(99,102,241,0.8)] transition-all duration-500"></div>
                        <div class="absolute inset-0 rounded-xl border border-indigo-300/30 group-hover:border-indigo-200/50 group-hover:shadow-[inset_0_0_15px_rgba(99,102,241,0.3)] transition-all duration-500"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection