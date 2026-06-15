@extends('layouts.app')

@section('title', 'Sobre Nosotros - SoftLinkIA')

@section('content')
<div class="overflow-x-hidden">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>


        .logos-carousel {
            position: relative;
            overflow: hidden;
            padding: 20px 0;
        }

        .logos-slide {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .logos-slide.active {
            display: block;
            opacity: 1;
        }

        .indicator {
            transition: all 0.3s ease;
        }

        .indicator.active {
            transform: scale(1.2);
        }

        /* Animación de desplazamiento automático */
        @keyframes slideRight {
            0% { transform: translateX(-100%); opacity: 0; }
            10% { transform: translateX(0); opacity: 1; }
            90% { transform: translateX(0); opacity: 1; }
            100% { transform: translateX(100%); opacity: 0; }
        }

        @keyframes slideLeft {
            0% { transform: translateX(100%); opacity: 0; }
            10% { transform: translateX(0); opacity: 1; }
            90% { transform: translateX(0); opacity: 1; }
            100% { transform: translateX(-100%); opacity: 0; }
        }

        .logo-img {
    width: 150%;
    height: 150%;
    object-fit: contain;
    padding: 12px;
    transition: all 0.3s ease;
    z-index: 10;
    position: relative;
}

.logo-item:hover .logo-img {
    transform: scale(1.1);
}

/* Sombras específicas según el color del borde */
.border-cyan-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(6, 182, 212, 0.7));
}

.border-blue-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.7));
}

.border-indigo-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(99, 102, 241, 0.7));
}

.border-purple-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(168, 85, 247, 0.7));
}

.border-pink-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(236, 72, 153, 0.7));
}

.border-amber-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(245, 158, 11, 0.7));
}

.border-teal-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(20, 184, 166, 0.7));
}

.border-lime-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(132, 204, 22, 0.7));
}

.border-sky-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(14, 165, 233, 0.7));
}

.border-violet-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(139, 92, 246, 0.7));
}

.border-fuchsia-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(217, 70, 239, 0.7));
}

.border-orange-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(249, 115, 22, 0.7));
}

.border-red-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(239, 68, 68, 0.7));
}

.border-emerald-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(16, 185, 129, 0.7));
}

.border-yellow-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(234, 179, 8, 0.7));
}

.border-green-500\/30:hover .logo-img {
    filter: drop-shadow(0 0 10px rgba(34, 197, 94, 0.7));
}

        .gradient-border {
            position: relative;
        }

        .gradient-border::before {
            content: "";
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #0ea5e9, #3b82f6, #6366f1);
            border-radius: 16px;
            z-index: -1;
            opacity: 0.5;
        }
    </style>
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="min-height: calc(100vh - 80px); padding-top: 2rem;">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-10">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c" alt="About Us - Team"
                class="w-full h-full object-cover opacity-50">
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
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="relative z-30 flex flex-col justify-center" style="min-height: calc(100vh - 120px);">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8 text-center text-white">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black mb-8 sm:mb-12 md:mb-16 unified-glow-effect leading-tight" data-aos="fade-up">
                    <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                        Sobre Nosotros
                    </span>
                    <br>
                    <span
                        class="bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent animate-gradient-x"
                        style="animation-delay: 0.5s;">
                        Innovación & Excelencia
                    </span>
                </h1>

                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center mb-8 sm:mb-12 md:mb-16 px-2 sm:px-4 md:px-0" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://wa.me/5215522614633" target="_blank"
                        class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-600 text-white px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-cyan-500/50 w-full sm:w-auto">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer">
                        </div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.3s"></div>
                        <div class="absolute top-1/2 right-3 w-1 h-1 bg-indigo-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.5s"></div>

                        <!-- Icono y texto -->
                        <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.515" />
                        </svg>
                        <span class="relative z-10">WhatsApp</span>
                    </a>

                    <a href="#historia"
                        class="neon-button-secondary group relative overflow-hidden border-2 border-indigo-400 text-indigo-400 px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center hover:bg-indigo-400 hover:text-white shadow-2xl hover:shadow-indigo-400/50 w-full sm:w-auto">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-indigo-400/20 to-cyan-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer">
                        </div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-indigo-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.4s"></div>

                        <!-- Icono y texto -->
                        <svg class="w-6 h-6 mr-3 group-hover:animate-spin" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                        <span class="relative z-10">Conocer Más</span>
                    </a>
                </div>

                <!-- Estadísticas -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8 max-w-4xl mx-auto px-2 sm:px-4 md:px-0" data-aos="fade-up"
                    data-aos-delay="800">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-cyan-400 mb-2">5</div>
                        <div class="text-slate-300 font-medium">Años de Experiencia</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-blue-400 mb-2">500+</div>
                        <div class="text-slate-300 font-medium">Proyectos Completados</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-indigo-400 mb-2">50+</div>
                        <div class="text-slate-300 font-medium">Clientes Satisfechos</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Historia -->
    <section id="historia" class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right" class="text-center lg:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                        <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent">
                            Transformamos la
                        </span>
                        <br>
                        <span
                            class="bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent">
                            Visión en Realidad
                        </span>
                    </h2>
                    <p class="text-lg text-slate-300 mb-6 leading-relaxed">
                        Nuestro equipo de <span
                            class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">expertos
                            en tecnología</span> implementa las últimas innovaciones y
                        <span
                            class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent font-semibold">metodologías
                            de desarrollo</span> para crear soluciones digitales de clase mundial.
                    </p>
                    <p class="text-lg text-slate-300 mb-12 leading-relaxed">
                        Desde el <span class="bg-gradient-to-r from-indigo-400 to-cyan-400 bg-clip-text text-transparent font-semibold">desarrollo frontend avanzado</span> hasta la implementación de
                        <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">arquitecturas multiplataforma</span>,
                        garantizamos soluciones que escalan con tu crecimiento empresarial.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center lg:justify-start">
                        <a href="https://wa.me/5215522614633" target="_blank"
                            class="group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-600 text-white px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center shadow-2xl hover:shadow-cyan-500/50 w-full sm:w-auto">
                            <span
                                class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">chat</span>
                            <span>WhatsApp</span>
                            <div
                                class="absolute inset-0 rounded-xl border-2 border-cyan-400/50 group-hover:border-cyan-300 group-hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] transition-all duration-500">
                            </div>
                        </a>
                        <a href="#mision"
                           class="group relative overflow-hidden border-2 border-indigo-400 text-indigo-400 px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-105 inline-flex items-center justify-center  bg-slate-900/30 w-full sm:w-auto">
                            <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500">arrow_downward</span>
                            <span>Conocer Más</span>
                            <div
                                class="absolute inset-0 rounded-xl border-2 border-indigo-400 group-hover:border-indigo-300 group-hover:shadow-[0_0_25px_rgba(99,102,241,0.8)] transition-all duration-500">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="service-card-modern service-card-cyan group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-left">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>
                    <div class="absolute top-1/2 right-8 w-1.5 h-1.5 bg-indigo-400 rounded-full opacity-50 animate-bounce">
                    </div>

                    <div class="relative z-10 space-y-6">
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">Experiencia</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">5 años de innovación</p>
                            </div>
                        </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <circle cx="12" cy="16" r="1"></circle>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3
                                    class="text-lg font-semibold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500">
                                    Proyectos</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">500+
                                    soluciones entregadas</p>
                            </div>
                        </div>
                        <div class="flex items-center group/item">
                            <div class="relative mr-4">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover/item:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-12 h-12 bg-gradient-to-br from-indigo-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover/item:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-6 h-6 text-white">
                                        <path d="M9 11H1l6-6 6 6"></path>
                                        <path d="M9 17l3 3 3-3"></path>
                                        <path
                                            d="M22 18.5c-.5 1.5-2 2.5-4 2.5s-3.5-1-4-2.5c-.5-1.5 0-3 1.5-3.5 1.5-.5 3.5 0 4 1.5.5 1.5 2 2.5 2.5 2">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3
                                    class="text-lg font-semibold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-cyan-300 transition-all duration-500">
                                    Clientes</h3>
                                <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500">50+
                                    empresas satisfechas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Misión -->
    <section id="mision" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestra Misión
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Comprometidos con la excelencia tecnológica y la innovación continua
                </p>
            </div>


        </div>
    </section>

    <!-- Misión, Visión y Valores -->
    <section class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 services-grid">
                <!-- Misión -->
                <div class="service-card-modern service-card-cyan group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center lg:text-left">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center lg:justify-start mb-6">
                                <div class="relative">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="w-10 h-10 text-white">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h3
                                class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500 mb-6">
                                Nuestra Misión</h3>
                            <p class="text-slate-300 mb-8 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed">
                                Transformar organizaciones a través de soluciones tecnológicas innovadoras, proporcionando
                                experiencias digitales excepcionales que impulsen el crecimiento empresarial.</p>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.2s">
                                </div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.4s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visión -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-cyan-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center lg:text-left">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center lg:justify-start mb-6">
                                <div class="relative">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="w-10 h-10 text-white">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path d="M12 1v6m0 6v6"></path>
                                            <path d="m21 12-6-3-6 3-6-3-6 3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h3
                                class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-6">
                                Nuestra Visión</h3>
                            <p class="text-slate-300 mb-8 group-hover:text-slate-200 transition-colors duration-500 leading-relaxed">Ser
                                reconocidos como el socio tecnológico preferido en Latinoamérica, líder en innovación
                                digital y referente en experiencias de usuario excepcionales.</p>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 0.2s">
                                </div>
                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.4s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Valores -->
                <div class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-cyan-500/10 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-indigo-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full text-center lg:text-left">
                        <div>
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center lg:justify-start mb-6">
                                <div class="relative">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-16 h-16 bg-gradient-to-br from-indigo-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="w-10 h-10 text-white">
                                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <h3
                                class="text-2xl font-bold bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent group-hover:from-indigo-300 group-hover:to-cyan-300 transition-all duration-500 mb-6">
                                Nuestros Valores</h3>
                            <div
                                class="text-slate-300 mb-8 group-hover:text-slate-200 transition-colors duration-500 space-y-3">
                                <div class="flex items-center justify-center lg:justify-start">
                                    <span class="material-icons text-indigo-400 mr-3 text-lg">check_circle</span>
                                    <span>Innovación constante</span>
                                </div>
                                <div class="flex items-center justify-center lg:justify-start">
                                    <span class="material-icons text-cyan-400 mr-3 text-lg">check_circle</span>
                                    <span>Excelencia técnica</span>
                                </div>
                                <div class="flex items-center justify-center lg:justify-start">
                                     <span class="material-icons text-blue-400 mr-3 text-lg">check_circle</span>
                                     <span>Compromiso con el cliente</span>
                                 </div>
                                 <div class="flex items-center justify-center lg:justify-start">
                                     <span class="material-icons text-indigo-400 mr-3 text-lg">check_circle</span>
                                     <span>Transparencia total</span>
                                 </div>
                             </div>
                         </div>
                        <div class="flex justify-center items-center">
                             <div class="flex space-x-1">
                                 <div class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></div>
                                 <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                 <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
        </div>
    </section>
    <!-- Equipo -->
    <section id="equipo" class="py-16 unified-section-primary">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Nuestro Equipo Experto
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Profesionales apasionados por la tecnología y comprometidos con la excelencia en cada proyecto
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 services-grid">
                <!-- Fernando Mejía - CEO & Fundador -->
                <div class="service-card-modern service-card-cyan group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 via-blue-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-20 h-20 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-10 h-10 text-white">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <!-- Badge de liderazgo -->
                                <div
                                    class="absolute -top-2 -right-2 w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-sm">CEO</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500 mb-2">Fernando Mejía</h3>
                        <p class="text-cyan-400 font-medium mb-4 group-hover:text-cyan-300 transition-colors duration-500">CEO & Fundador</p>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500 text-sm leading-relaxed">
                            Más de 5 años de experiencia en desarrollo frontend y liderazgo tecnológico. Visionario apasionado por crear experiencias digitales excepcionales.                        </p>
                    </div>
                </div>
                <!-- Marcos Sandoval - CFO & Cofundador -->
                <div class="service-card-modern service-card-emerald group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 via-green-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-emerald-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-green-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-emerald-500 to-green-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-20 h-20 bg-gradient-to-br from-emerald-500 to-green-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-10 h-10 text-white">
                                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                        <line x1="8" y1="21" x2="16" y2="21"></line>
                                        <line x1="12" y1="17" x2="12" y2="21"></line>
                                        <path d="M7 7h10v6H7z"></path>
                                    </svg>
                                </div>
                                <!-- Badge técnico -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-xs">CFO                                   </span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent group-hover:from-emerald-300 group-hover:to-green-300 transition-all duration-500 mb-2">Marcos Sandoval</h3>
                        <p class="text-emerald-400 font-medium mb-4 group-hover:text-emerald-300 transition-colors duration-500">CFO & Cofundador</p>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500 text-sm leading-relaxed">
                            Especialista en sistemas de financiación y optimización de ventas. Líder en la implementación de las mejores prácticas de ventas.                        </p>
                    </div>
                </div>

                <!-- Eduardo Mendez - COO & Cofundador -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="300">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-violet-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-violet-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-20 h-20 bg-gradient-to-br from-purple-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-10 h-10 text-white">
                                        <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                                        <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                                        <path d="M2 2l7.586 7.586"></path>
                                        <circle cx="11" cy="11" r="2"></circle>
                                    </svg>
                                </div>
                                <!-- Badge de diseño -->
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-xs">COO</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 mb-2">Eduardo Mendez</h3>
                        <p class="text-purple-400 font-medium mb-4 group-hover:text-purple-300 transition-colors duration-500">COO & Cofundador</p>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500 text-sm leading-relaxed">
                            Experto en diseño de experiencias de usuario e interfaces intuitivas. Comprometido con crear productos que los usuarios aman usar.
                        </p>
                    </div>
                </div>

                <!-- Miguel Mendez - Director de Proyectos -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-amber-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-amber-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-20 h-20 bg-gradient-to-br from-orange-500 to-amber-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-10 h-10 text-white">
                                        <path d="M9 12l2 2 4-4"></path>
                                        <path
                                            d="M21 12c.552 0 1-.448 1-1V8a2 2 0 0 0-2-2h-1l-1-2h-3l-1 2H9L8 4H5a2 2 0 0 0-2 2v3c0 .552.448 1 1 1">
                                        </path>
                                        <path d="M3 12v7a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    </svg>
                                </div>
                                <!-- Badge de gestión -->
                                <div
                                    class="absolute -top-2 -right-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-xs">PM</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-amber-300 transition-all duration-500 mb-2">Miguel Mendez</h3>
                        <p class="text-orange-400 font-medium mb-4 group-hover:text-orange-300 transition-colors duration-500">Director de Proyectos</p>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500 text-sm leading-relaxed">
                            Especialista en gestión ágil de proyectos y metodologías de desarrollo. Asegura la entrega exitosa de cada proyecto en tiempo y presupuesto.
                        </p>
                    </div>
                </div>

                <!-- Fernando Manuel - Senior Developer -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="500">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-indigo-500/10 to-cyan-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-10 h-10 text-white">
                                        <polyline points="16,18 22,12 16,6"></polyline>
                                        <polyline points="8,6 2,12 8,18"></polyline>
                                    </svg>
                                </div>
                                <!-- Badge de desarrollo -->
                                <div
                                    class="absolute -top-2 -right-2 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-xs">DEV</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-2">Fernando Manuel</h3>
                        <p class="text-blue-400 font-medium mb-4 group-hover:text-blue-300 transition-colors duration-500">Senior Developer</p>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500 text-sm leading-relaxed">
                            Desarrollador full-stack con experiencia en tecnologías modernas. Especialista en crear soluciones escalables y eficientes.
                        </p>
                    </div>
                </div>

                <!-- Gabriela Menendez - Marketing -->
                <div class="service-card-modern service-card-pink group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="600">
                    <!-- Efectos de fondo animados -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-pink-600/20 via-rose-500/10 to-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                    </div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-pink-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-rose-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 text-center">
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-pink-500 to-rose-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <div
                                    class="relative w-20 h-20 bg-gradient-to-br from-pink-500 to-rose-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-10 h-10 text-white">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </div>
                                <!-- Badge de marketing -->
                                <div
                                    class="absolute -top-2 -right-2 w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-xs">MKT</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-white to-pink-200 bg-clip-text text-transparent group-hover:from-pink-300 group-hover:to-rose-300 transition-all duration-500 mb-2">Gabriela Menendez</h3>
                        <p class="text-pink-400 font-medium mb-4 group-hover:text-pink-300 transition-colors duration-500">Directora de Marketing</p>
                        <p class="text-slate-300 group-hover:text-slate-200 transition-colors duration-500 text-sm leading-relaxed">
                            Estratega digital con enfoque en growth marketing y experiencia del cliente. Experta en posicionamiento de marca y conversión.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Certificaciones y Reconocimientos -->

    <section class="py-16 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8 sm:gap-10 md:gap-12 items-center">
                <!-- Contenido de texto (lado izquierdo) -->
                <div class="w-full lg:w-1/3" data-aos="fade-right">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6 leading-tight">
                        ¿Por qué SoftLinkIA es el mejor socio de desarrollo?
                </h2>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 leading-relaxed">
                        Ofrecemos los mejores <strong>servicios de desarrollo de software de IA</strong>, respaldados por certificaciones líderes en la industria. Nuestros ingenieros expertos en Latinoamérica combinan profundos conocimientos técnicos con habilidades interpersonales para crear soluciones escalables que alcancen los objetivos de su negocio.
                </p>
                    <a href="#contacto" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-semibold text-lg transition-colors duration-300">
                        Conozca más sobre nosotros »
                    </a>
            </div>
                <!-- Badges circulares de métricas EN MEDIO -->
                <div class="w-full lg:w-1/3 flex justify-center" data-aos="fade-up">
                    <div class="flex flex-row lg:flex-col gap-2 sm:gap-4 md:gap-6 lg:gap-8 items-center justify-center">
                        <!-- Badge 1 -->
                        <div class="group relative w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 cursor-pointer transform transition-all duration-300 hover:scale-105">
                            <!-- Efecto de brillo suave -->
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-cyan-400/5 to-indigo-500/10 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <!-- Badge principal -->
                            <div class="relative w-full h-full bg-gradient-to-br from-white/95 to-blue-50/95 dark:from-slate-800/95 dark:to-blue-900/95 rounded-full flex flex-col items-center justify-center shadow-lg group-hover:shadow-xl group-hover:shadow-blue-500/20 transition-all duration-300 backdrop-blur-sm">
                                <!-- Borde animado -->
                                <div class="absolute inset-0 rounded-full border-2 border-blue-200/60 dark:border-blue-700/60 group-hover:border-blue-400 dark:group-hover:border-blue-300 transition-colors duration-300"></div>

                                <!-- Contenido -->
                                <div class="text-center z-10">
                                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">50+</div>
                                    <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-medium group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">Tecnologías dominadas</div>
                                </div>

                                <!-- Icono flotante -->
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Badge 2 -->
                        <div class="group relative w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 cursor-pointer transform transition-all duration-300 hover:scale-105">
                            <!-- Efecto de brillo suave -->
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 via-green-400/5 to-teal-500/10 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <!-- Badge principal -->
                            <div class="relative w-full h-full bg-gradient-to-br from-white/95 to-emerald-50/95 dark:from-slate-800/95 dark:to-emerald-900/95 rounded-full flex flex-col items-center justify-center shadow-lg group-hover:shadow-xl group-hover:shadow-emerald-500/20 transition-all duration-300 backdrop-blur-sm">
                                <!-- Borde animado -->
                                <div class="absolute inset-0 rounded-full border-2 border-emerald-200/60 dark:border-emerald-700/60 group-hover:border-emerald-400 dark:group-hover:border-emerald-300 transition-colors duration-300"></div>

                                <!-- Contenido -->
                                <div class="text-center z-10">
                                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors duration-300">90%</div>
                                    <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-medium group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">Certificado</div>
                                </div>

                                <!-- Icono flotante -->
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-emerald-500 to-green-400 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                                    </div>
                                </div>

                <!-- Carrusel de certificaciones (lado derecho) -->
                <div class="w-full lg:w-1/3" data-aos="fade-left">
                    <div class="flex flex-col items-end">

                        <!-- Carrusel de certificaciones -->
                        <div class="w-full max-w-md">
                            <!-- Fila superior -->
                            <div class="relative mb-6">
                                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-2 bg-white hover:bg-gray-50 text-gray-600 p-2 rounded-full shadow-md transition-all duration-300 z-10" data-row="0" data-direction="prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                                <button class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-2 bg-white hover:bg-gray-50 text-gray-600 p-2 rounded-full shadow-md transition-all duration-300 z-10" data-row="0" data-direction="next">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                                <div class="grid grid-cols-2 gap-2 sm:gap-3 md:gap-4">
                                    <!-- Certificación 1 -->
                                    <div class="group relative overflow-hidden bg-white rounded-lg p-4 shadow-md cursor-pointer transform transition-all duration-700 hover:scale-105 hover:shadow-xl">
                                        <!-- Efectos de fondo animados -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-cyan-500/5 to-indigo-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-blue-500/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                        <!-- Partículas flotantes -->
                                        <div class="absolute top-2 right-2 w-1.5 h-1.5 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                                        <div class="absolute bottom-3 left-3 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                                        <div class="relative z-10">
                                            <div class="flex items-center justify-center h-24">
                                                <img src="/certificates-logo/iso-9001.png" alt="ISO 9001" class="h-16 w-auto object-contain transform group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                            <div class="text-center mt-2">
                                                <div class="text-sm font-semibold text-gray-800 group-hover:text-blue-700 transition-colors duration-500">ISO 9001</div>
                                                <div class="text-xs text-gray-600 group-hover:text-gray-700 transition-colors duration-500">Quality Management</div>
                                    </div>
                                </div>
                            </div>

                                    <!-- Certificación 2 -->
                                    <div class="group relative overflow-hidden bg-white rounded-lg p-4 shadow-md cursor-pointer transform transition-all duration-700 hover:scale-105 hover:shadow-xl">
                                        <!-- Efectos de fondo animados -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/10 via-purple-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-indigo-500/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                        <!-- Partículas flotantes -->
                                        <div class="absolute top-2 right-2 w-1.5 h-1.5 bg-indigo-400 rounded-full opacity-60 animate-pulse"></div>
                                        <div class="absolute bottom-3 left-3 w-1 h-1 bg-purple-400 rounded-full opacity-40 animate-ping"></div>

                                        <div class="relative z-10">
                                            <div class="flex items-center justify-center h-24">
                                                <img src="/certificates-logo/microsoft-partner.png" alt="Microsoft Partner" class="h-16 w-auto object-contain transform group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                            <div class="text-center mt-2">
                                                <div class="text-sm font-semibold text-gray-800 group-hover:text-indigo-700 transition-colors duration-500">Microsoft</div>
                                                <div class="text-xs text-gray-600 group-hover:text-gray-700 transition-colors duration-500">Certified Partner</div>
                                    </div>
                                </div>
                                    </div>
                                    </div>
                                </div>

                            <!-- Fila inferior -->
                            <div class="relative mb-6">
                                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-2 bg-white hover:bg-gray-50 text-gray-600 p-2 rounded-full shadow-md transition-all duration-300 z-10" data-row="1" data-direction="prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-2 bg-white hover:bg-gray-50 text-gray-600 p-2 rounded-full shadow-md transition-all duration-300 z-10" data-row="1" data-direction="next">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                <div class="grid grid-cols-2 gap-2 sm:gap-3 md:gap-4">
                                    <!-- Certificación 3 -->
                                    <div class="group relative overflow-hidden bg-white rounded-lg p-4 shadow-md cursor-pointer transform transition-all duration-700 hover:scale-105 hover:shadow-xl">
                                        <!-- Efectos de fondo animados -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-orange-600/10 via-yellow-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-orange-500/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                        <!-- Partículas flotantes -->
                                        <div class="absolute top-2 right-2 w-1.5 h-1.5 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                                        <div class="absolute bottom-3 left-3 w-1 h-1 bg-yellow-400 rounded-full opacity-40 animate-ping"></div>

                                        <div class="relative z-10">
                                            <div class="flex items-center justify-center h-24">
                                                <img src="/certificates-logo/aws-partner.png" alt="AWS Partner" class="h-16 w-auto object-contain transform group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                            <div class="text-center mt-2">
                                                <div class="text-sm font-semibold text-gray-800 group-hover:text-orange-700 transition-colors duration-500">AWS</div>
                                                <div class="text-xs text-gray-600 group-hover:text-gray-700 transition-colors duration-500">Solutions Architect</div>
                                    </div>
                                </div>
                            </div>

                                    <!-- Certificación 4 -->
                                    <div class="group relative overflow-hidden bg-white rounded-lg p-4 shadow-md cursor-pointer transform transition-all duration-700 hover:scale-105 hover:shadow-xl">
                                        <!-- Efectos de fondo animados -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-600/10 via-teal-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-green-500/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                        <!-- Partículas flotantes -->
                                        <div class="absolute top-2 right-2 w-1.5 h-1.5 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                                        <div class="absolute bottom-3 left-3 w-1 h-1 bg-teal-400 rounded-full opacity-40 animate-ping"></div>

                                        <div class="relative z-10">
                                            <div class="flex items-center justify-center h-24">
                                                <img src="/certificates-logo/google-cloud.png" alt="Google Cloud" class="h-16 w-auto object-contain transform group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                            <div class="text-center mt-2">
                                                <div class="text-sm font-semibold text-gray-800 group-hover:text-green-700 transition-colors duration-500">Google Cloud</div>
                                                <div class="text-xs text-gray-600 group-hover:text-gray-700 transition-colors duration-500">Machine Learning</div>
                                    </div>
                                </div>
                                    </div>
                                    </div>
                                </div>

                            <!-- Fila tercera -->
                            <div class="relative">
                                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-2 bg-white hover:bg-gray-50 text-gray-600 p-2 rounded-full shadow-md transition-all duration-300 z-10" data-row="2" data-direction="prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-2 bg-white hover:bg-gray-50 text-gray-600 p-2 rounded-full shadow-md transition-all duration-300 z-10" data-row="2" data-direction="next">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                <div class="grid grid-cols-2 gap-2 sm:gap-3 md:gap-4">
                                    <!-- Certificación 5 -->
                                    <div class="group relative overflow-hidden bg-white rounded-lg p-4 shadow-md cursor-pointer transform transition-all duration-700 hover:scale-105 hover:shadow-xl">
                                        <!-- Efectos de fondo animados -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-purple-600/10 via-pink-500/5 to-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-purple-500/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                        <!-- Partículas flotantes -->
                                        <div class="absolute top-2 right-2 w-1.5 h-1.5 bg-purple-400 rounded-full opacity-60 animate-pulse"></div>
                                        <div class="absolute bottom-3 left-3 w-1 h-1 bg-pink-400 rounded-full opacity-40 animate-ping"></div>

                                        <div class="relative z-10">
                                            <div class="flex items-center justify-center h-24">
                                                <img src="/certificates-logo/iso-27001.png" alt="ISO 27001" class="h-16 w-auto object-contain transform group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                            <div class="text-center mt-2">
                                                <div class="text-sm font-semibold text-gray-800 group-hover:text-purple-700 transition-colors duration-500">ISO 27001</div>
                                                <div class="text-xs text-gray-600 group-hover:text-gray-700 transition-colors duration-500">Information Security</div>
                                </div>
                            </div>
                        </div>

                                    <!-- Certificación 6 -->
                                    <div class="group relative overflow-hidden bg-white rounded-lg p-4 shadow-md cursor-pointer transform transition-all duration-700 hover:scale-105 hover:shadow-xl">
                                        <!-- Efectos de fondo animados -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-teal-600/10 via-cyan-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-teal-500/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                                        <!-- Partículas flotantes -->
                                        <div class="absolute top-2 right-2 w-1.5 h-1.5 bg-teal-400 rounded-full opacity-60 animate-pulse"></div>
                                        <div class="absolute bottom-3 left-3 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                                        <div class="relative z-10">
                                            <div class="flex items-center justify-center h-24">
                                                <img src="https://cdn-icons-png.flaticon.com/512/5968/5968242.png" alt="MongoDB" class="h-16 w-auto object-contain transform group-hover:scale-110 transition-transform duration-500">
                            </div>
                                            <div class="text-center mt-2">
                                                <div class="text-sm font-semibold text-gray-800 group-hover:text-teal-700 transition-colors duration-500">MongoDB</div>
                                                <div class="text-xs text-gray-600 group-hover:text-gray-700 transition-colors duration-500">Database Expert</div>
                        </div>
                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
    </section>

                    <script>
        // Inicializar AOS (Animate On Scroll)
                        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                once: true,
                easing: 'ease-in-out'
            });
        });
    </script>

    <!-- Script para controlar el carrusel de certificaciones -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Datos de certificaciones para cada fila
            const certificationsData = {
                0: { // Fila superior
                    certifications: [
                        { name: 'ISO 27001', subtitle: 'Information Security', logo: '/certificates-logo/iso-27001.png' },
                        { name: 'ISO 9001', subtitle: 'Quality Management', logo: '/certificates-logo/iso-9001.png' },
                        { name: 'ISO 45000', subtitle: 'Occupational Health', logo: '/certificates-logo/iso-45000.png' },
                        { name: 'OSCP+', subtitle: 'Offensive Security', logo: '/certificates-logo/oscp.png' },
                        { name: 'CISA', subtitle: 'Information Systems', logo: '/certificates-logo/cisa.png' },
                        { name: 'ISO 20000', subtitle: 'IT Service Management', logo: '/certificates-logo/iso-20000.png' }
                    ],
                    currentIndex: 0
                },
                1: { // Fila media
                    certifications: [
                        { name: 'CMMI', subtitle: 'Capability Maturity', logo: '/certificates-logo/cmmi.png' },
                        { name: 'SOC 2', subtitle: 'Security & Availability', logo: '/certificates-logo/soc2.png' },
                        { name: 'ISO 22301', subtitle: 'Business Continuity', logo: '/certificates-logo/iso-22301.png' },
                        { name: 'RVOE', subtitle: 'Educational Recognition', logo: '/certificates-logo/rvoe.png' },
                        { name: 'Cisco Partner', subtitle: 'Network Solutions', logo: '/certificates-logo/cisco-partner.png' },
                        { name: 'Google Cloud Partner', subtitle: 'Cloud Solutions', logo: '/certificates-logo/google-cloud.png' }
                    ],
                    currentIndex: 0
                },
                2: { // Fila inferior
                    certifications: [
                        { name: 'ISO 27001', subtitle: 'Information Security', logo: '/certificates-logo/iso-27001.png' },
                        { name: 'ISO 9001', subtitle: 'Quality Management', logo: '/certificates-logo/iso-9001.png' },
                        { name: 'CISA', subtitle: 'Information Systems', logo: '/certificates-logo/cisa.png' },
                        { name: 'SOC 2', subtitle: 'Security & Availability', logo: '/certificates-logo/soc2.png' },
                        { name: 'CMMI', subtitle: 'Capability Maturity', logo: '/certificates-logo/cmmi.png' },
                        { name: 'Google Cloud Partner', subtitle: 'Cloud Solutions', logo: '/certificates-logo/google-cloud.png' }
                    ],
                    currentIndex: 0
                }
            };

            // Función para actualizar las certificaciones de una fila
            function updateRowCertifications(rowIndex) {
                const row = document.querySelector(`[data-row="${rowIndex}"]`).parentElement;
                const certificationCards = row.querySelectorAll('.bg-white.rounded-lg');
                const currentData = certificationsData[rowIndex];

                certificationCards.forEach((card, cardIndex) => {
                    const certIndex = (currentData.currentIndex + cardIndex) % currentData.certifications.length;
                    const certification = currentData.certifications[certIndex];

                    const img = card.querySelector('img');
                    const nameElement = card.querySelector('.text-sm.font-semibold');
                    const subtitleElement = card.querySelector('.text-xs');

                    img.src = certification.logo;
                    img.alt = certification.name;
                    nameElement.textContent = certification.name;
                    subtitleElement.textContent = certification.subtitle;
                });
            }

            // Función para navegar por filas
            function navigateRow(rowIndex, direction) {
                const currentData = certificationsData[rowIndex];

                if (direction === 'next') {
                    currentData.currentIndex = (currentData.currentIndex + 1) % currentData.certifications.length;
                                    } else {
                    currentData.currentIndex = (currentData.currentIndex - 1 + currentData.certifications.length) % currentData.certifications.length;
                }

                updateRowCertifications(rowIndex);
            }

            // Configurar eventos de flechas
            document.querySelectorAll('[data-row]').forEach(button => {
                button.addEventListener('click', (e) => {
                    const rowIndex = parseInt(e.target.closest('button').dataset.row);
                    const direction = e.target.closest('button').dataset.direction;
                    navigateRow(rowIndex, direction);
                });
            });

            // Inicializar las filas
            updateRowCertifications(0);
            updateRowCertifications(1);
            updateRowCertifications(2);
        });
    </script>

    <!-- CTA Mejorado -->
    <section class="relative py-24 overflow-hidden">
        <!-- Fondo complejo con múltiples capas -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-cyan-900/30 via-transparent to-blue-800/40"></div>
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-600/20 via-transparent to-transparent">
        </div>

        <!-- Efectos de partículas y luces -->
        <div class="absolute top-10 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-48 h-48 bg-indigo-500/10 rounded-full blur-2xl animate-pulse"
            style="animation-delay: 2s;"></div>

        <!-- Líneas de luz animadas -->
        <div class="absolute inset-0 opacity-30">
            <div
                class="absolute top-0 left-1/4 w-px h-full bg-gradient-to-b from-transparent via-blue-400 to-transparent animate-pulse">
            </div>
            <div class="absolute top-0 right-1/3 w-px h-full bg-gradient-to-b from-transparent via-cyan-400 to-transparent animate-pulse"
                style="animation-delay: 1s;"></div>
            <div class="absolute top-1/3 left-0 w-full h-px bg-gradient-to-r from-transparent via-blue-400 to-transparent animate-pulse"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Contenido principal -->
            <div class="text-center">
                <!-- Badge superior -->
                <div class="inline-block mb-12" data-aos="fade-up">
                    <div class="px-6 py-3 bg-blue-500/20 border border-blue-400/30 rounded-full ">
                        <span class="text-blue-300 font-semibold text-lg">🚀 SoftLink IA - Innovación Tecnológica</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-4xl md:text-6xl lg:text-7xl font-black mb-12 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-blue-200 to-cyan-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para
                    </span>
                    <br>
                    <span
                        class="bg-gradient-to-r from-blue-400 via-cyan-500 to-indigo-600 bg-clip-text text-transparent animate-gradient-x"
                        style="animation-delay: 0.5s;">
                        Trabajar con Nosotros?
                    </span>
                </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light"
                    data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span
                        class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent font-semibold">expertos
                        en tecnología</span> están listos para
                    <span
                        class="bg-gradient-to-r from-cyan-400 to-indigo-400 bg-clip-text text-transparent font-semibold">transformar
                        tu visión en realidad</span> con soluciones innovadoras
                </p>

                <!-- Botones mejorados -->
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center mb-8 sm:mb-12 md:mb-16 px-2 sm:px-4 md:px-0" data-aos="fade-up" data-aos-delay="600">
                    <!-- Botón WhatsApp Premium -->
                    <a href="https://wa.me/5215522614633" target="_blank"
                        class="neon-button-primary group relative overflow-hidden bg-gradient-to-r from-blue-500 via-cyan-600 to-indigo-600 text-white px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center shadow-2xl hover:shadow-blue-500/50 w-full sm:w-auto">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-400 via-cyan-500 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer">
                        </div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.1s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.3s"></div>

                        <span
                            class="w-6 h-6 mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">💬</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Consulta Gratuita</div>
                                <div class="text-sm opacity-90">WhatsApp 24/7</div>
                            </div>
                        </div>

                        <!-- Borde de neón -->
                        <div
                            class="absolute inset-0 rounded-xl border-2 border-blue-400/50 group-hover:border-blue-300 group-hover:shadow-[0_0_20px_rgba(59,130,246,0.6)] transition-all duration-500">
                        </div>
                    </a>

                    <!-- Botón Servicios Premium -->
                    <a href="{{ route('servicios.consultoria-ti') }}"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-cyan-400 text-cyan-400 px-4 sm:px-6 md:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center  bg-slate-900/30 hover:bg-gradient-to-r hover:from-cyan-500/20 hover:to-blue-500/20 w-full sm:w-auto">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-cyan-400/10 via-blue-400/10 to-cyan-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-45 from-transparent via-cyan-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer">
                        </div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping"
                            style="animation-delay: 0.4s"></div>

                        <span
                            class="w-6 h-6 mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">🚀</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Nuestros Servicios</div>
                                <div class="text-sm opacity-90">Soluciones Completas</div>
                            </div>
                        </div>

                        <!-- Borde de neón animado -->
                        <div
                            class="absolute inset-0 rounded-xl border-2 border-cyan-400 group-hover:border-cyan-300 group-hover:shadow-[0_0_25px_rgba(34,211,238,0.8)] transition-all duration-500">
                        </div>
                        <div
                            class="absolute inset-0 rounded-xl border border-cyan-300/30 group-hover:border-cyan-200/50 group-hover:shadow-[inset_0_0_15px_rgba(34,211,238,0.3)] transition-all duration-500">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Elementos del DOM
            const filterButtons = document.querySelectorAll('.filter-btn');
            const certificationCards = document.querySelectorAll('.certification-card');

            // Función para filtrar las certificaciones
            function filterCertifications(category) {
                certificationCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 400);
                    }
                });

                // Actualizar botón activo
                filterButtons.forEach(btn => {
                    btn.classList.remove('active-tab');
                    if (btn.getAttribute('data-filter') === category) {
                        btn.classList.add('active-tab');
                    }
                });
            }

            // Añadir event listeners a los botones de filtro
            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const filterValue = this.getAttribute('data-filter');
                    filterCertifications(filterValue);
                });
            });

            // Inicializar con el filtro "all" activo
            filterCertifications('all');
        });
    </script>
@endsection