@extends('layouts.app')

@section('title', 'Consultoría TI - SoftLinkIA')

@section('content')
<div class="overflow-x-hidden">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden py-20">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('/images/logos/CTI.jpg');"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-blue-900/70 to-cyan-900/80"></div>
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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

                <div class="relative z-30 max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8 text-center text-white">

            <!-- Icono arriba del título para móvil -->
            <div class="flex justify-center mb-8 md:hidden" data-aos="fade-down">
                <div class="relative">
                    <div class="absolute -inset-3 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-3xl opacity-80 blur-lg animate-pulse"></div>
                    <div class="relative w-24 h-24 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-3xl flex items-center justify-center shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 text-white">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl font-black mb-8 sm:mb-12 md:mb-16 unified-glow-effect leading-tight text-center" data-aos="fade-up">
                <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                    Consultoría
                </span>
                <br>
                <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                    TI
                </span>
            </h1>

            <div class="flex flex-col gap-4 sm:gap-6 sm:flex-row justify-center mb-8 sm:mb-12 md:mb-16 px-2 sm:px-4 md:px-0" data-aos="fade-up" data-aos-delay="200">
                <a href="https://wa.me/5215522614633" target="_blank"
                   class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 text-white px-4 sm:px-6 md:px-8 lg:px-10 py-4 sm:py-5 rounded-xl sm:rounded-2xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-cyan-500/50 w-full sm:w-auto min-h-[50px] sm:min-h-auto">
                    <span class="material-icons mr-4 text-2xl sm:text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10">chat</span>
                    <span class="relative z-10 text-center font-bold">Consulta Gratuita</span>
                </a>

                <a href="#servicios"
                   class="group relative overflow-hidden border-2 border-blue-400 text-blue-400 px-4 sm:px-6 md:px-8 lg:px-10 py-4 sm:py-5 rounded-xl sm:rounded-2xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-blue-500/20 hover:to-purple-500/20 w-full sm:w-auto min-h-[50px] sm:min-h-auto">
                    <span class="material-icons mr-4 text-2xl sm:text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10">arrow_downward</span>
                    <span class="relative z-10 text-center font-bold">Ver Servicios</span>
                </a>
            </div>

            <!-- Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-cyan-400 mb-2">5</div>
                    <div class="text-slate-300 font-medium">Años de Experiencia</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-blue-400 mb-2">500+</div>
                    <div class="text-slate-300 font-medium">Proyectos Completados</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-black text-purple-400 mb-2">95%</div>
                    <div class="text-slate-300 font-medium">Satisfacción del Cliente</div>
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
                        <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent">
                            Transformamos tu
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent">
                            Infraestructura Tecnológica
                        </span>
                    </h2>
                    <p class="text-lg text-slate-300 mb-6 leading-relaxed">
                        Nuestro equipo de <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">expertos en consultoría TI</span> te ayuda a alinear la tecnología con tus objetivos de negocio,
                        <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent font-semibold">optimizando procesos</span> y maximizando la eficiencia operativa.
                    </p>
                    <p class="text-lg text-slate-300 mb-8 leading-relaxed">
                        Desde la <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent font-semibold">planificación estratégica</span> hasta la implementación, te acompañamos en cada paso de tu
                        <span class="bg-gradient-to-r from-cyan-400 to-emerald-400 bg-clip-text text-transparent font-semibold">transformación digital</span>
                        con soluciones personalizadas y probadas en el mercado.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="https://wa.me/5215522614633" target="_blank"
                           class="group relative overflow-hidden bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center shadow-2xl hover:shadow-green-500/50">
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
                    <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                        <div class="relative z-10 space-y-8">
                            <!-- Análisis Estratégico -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover/item:from-cyan-300 group-hover/item:to-blue-300 transition-all duration-500">Análisis Estratégico</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Evaluación completa de tu infraestructura</p>
                                </div>
                            </div>

                            <!-- Optimización -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <polyline points="22,12 18,12 15,21 9,3 6,12 2,12"></polyline>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover/item:from-green-300 group-hover/item:to-emerald-300 transition-all duration-500">Optimización</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Mejora continua de procesos</p>
                                </div>
                            </div>

                            <!-- Soporte Especializado -->
                            <div class="flex items-center group/item">
                                <div class="relative mr-4">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-purple-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-white">
                                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                            <path d="M2 17l10 5 10-5"></path>
                                            <path d="M2 12l10 5 10-5"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover/item:from-purple-300 group-hover/item:to-violet-300 transition-all duration-500">Soporte Especializado</h3>
                                    <p class="text-slate-300 group-hover/item:text-slate-200 transition-colors duration-500">Acompañamiento personalizado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios de Consultoría -->
    <section id="servicios" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestros Servicios de Consultoría
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Soluciones especializadas para cada aspecto de tu infraestructura tecnológica
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Auditoría Tecnológica -->
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
                                                <path d="M9 11l3 3L22 4"></path>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">Auditoría Tecnológica</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Evaluación exhaustiva de tu infraestructura tecnológica para identificar oportunidades de mejora y optimización.</p>
                        </div>
                    </div>
                </div>

                <!-- Estrategia Digital -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
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
                                                <polyline points="22,12 18,12 15,21 9,3 6,12 2,12"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500">Estrategia Digital</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Desarrollo de estrategias digitales alineadas con los objetivos de negocio y las mejores prácticas del mercado.</p>
                        </div>
                    </div>
                </div>

                <!-- Transformación Digital -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
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
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500">Transformación Digital</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Acompañamiento integral en tu proceso de transformación digital con metodologías ágiles y tecnologías emergentes.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-violet-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Optimización de Procesos -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
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
                                                <polyline points="16 18 22 12 16 6"></polyline>
                                                <polyline points="8 6 2 12 8 18"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-red-300 transition-all duration-500">Optimización de Procesos</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Análisis y mejora de procesos tecnológicos para aumentar la eficiencia operativa y reducir costos.</p>
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

                <!-- Gestión de Proyectos TI -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
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
                                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-blue-300 transition-all duration-500">Gestión de Proyectos TI</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Dirección y supervisión de proyectos tecnológicos con metodologías ágiles y enfoque en resultados.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Capacitación y Soporte -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-600/20 via-green-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-teal-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-green-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <div class="mb-4 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-tr from-teal-500 to-green-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                        <div class="relative w-14 h-14 bg-gradient-to-br from-teal-500 to-green-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                                <circle cx="12" cy="12" r="3"></circle>
                                                <path d="m19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-teal-200 bg-clip-text text-transparent group-hover:from-teal-300 group-hover:to-green-300 transition-all duration-500">Capacitación y Soporte</h3>
                            </div>
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500">Formación especializada y soporte técnico continuo para maximizar el aprovechamiento de las tecnologías implementadas.</p>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                            <div class="flex space-x-1 justify-center md:justify-end">
                                <div class="w-2 h-2 bg-teal-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metodología de Trabajo -->
    <section class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestra Metodología
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Un enfoque estructurado y probado para garantizar el éxito de tu transformación tecnológica
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 services-grid">
                <!-- Diagnóstico -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <path d="M9 12l2 2 4-4"></path>
                                        <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"></path>
                                        <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"></path>
                                        <path d="M12 3c0 1-1 3-3 3s-3-2-3-3 1-3 3-3 3 2 3 3"></path>
                                        <path d="M12 21c0-1 1-3 3-3s3 2 3 3-1 3-3 3-3-2-3-3"></path>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-cyan-300 transition-all duration-500 mb-4">Diagnóstico</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Evaluación completa de tu infraestructura actual, identificación de oportunidades y definición de objetivos.
                        </p>
                    </div>
                </div>

                <!-- Planificación -->
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
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500 mb-4">Planificación</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Diseño de la estrategia tecnológica, definición de roadmap y asignación de recursos.
                        </p>
                    </div>
                </div>

                <!-- Implementación -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-violet-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-violet-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="m19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    </svg>
                    </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">3</span>
            </div>
        </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 mb-4">Implementación</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Ejecución del plan con metodologías ágiles, supervisión continua y ajustes en tiempo real.
                        </p>
                    </div>
                </div>

                <!-- Optimización -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
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
                                        <polyline points="22,12 18,12 15,21 9,3 6,12 2,12"></polyline>
                                    </svg>
                                </div>
                                <!-- Número de paso -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">4</span>
                                </div>
                        </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-red-300 transition-all duration-500 mb-4">Optimización</h3>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            Monitoreo post-implementación, optimización continua y soporte especializado.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- CTA Mejorado -->
    <section class="relative py-24 overflow-hidden">
        <!-- Fondo con gradiente complejo -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-purple-900/30 via-transparent to-cyan-500/20"></div>

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
                        <span class="text-cyan-300 font-semibold text-lg">🚀 Transformación Digital</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-4xl md:text-6xl lg:text-7xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Optimizar tu TI?
                    </span>
            </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">expertos en consultoría TI</span> están listos para
                    <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent font-semibold">transformar tu tecnología</span> en una ventaja competitiva
                </p>

                <!-- Botones mejorados -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16" data-aos="fade-up" data-aos-delay="600">
                                        <!-- Botón WhatsApp Premium -->
                <a href="https://wa.me/5215522614633" target="_blank"
                       class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-green-500/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 via-emerald-500 to-teal-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-green-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-emerald-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.3s"></div>

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
                       class="neon-button-secondary group relative overflow-hidden border-2 border-blue-400 text-blue-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-blue-500/20 hover:to-purple-500/20">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/10 via-purple-400/10 to-blue-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-blue-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-purple-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

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
