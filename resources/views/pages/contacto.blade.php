@extends('layouts.app')

@section('title', 'Contacto - SoftLinkIA')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="min-height: calc(100vh - 80px); padding-top: 2rem;">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-10">
            <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a" alt="Contact Us" class="w-full h-full object-cover opacity-50">
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
                        Contáctanos
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Estamos Aquí para Ti
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
                        <span class="relative z-10">WhatsApp Premium</span>
                    </a>

                    <a href="#contacto-info"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-blue-400 text-blue-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center hover:bg-blue-400 hover:text-white shadow-2xl hover:shadow-blue-400/50">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <!-- Icono y texto -->
                        <svg class="w-6 h-6 mr-3 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="relative z-10">Ver Información</span>
                    </a>
                </div>

                <!-- Estadísticas -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-cyan-400 mb-2">24/7</div>
                        <div class="text-slate-300 font-medium">Soporte Disponible</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-blue-400 mb-2">100%</div>
                        <div class="text-slate-300 font-medium">Respuesta Garantizada</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-black text-indigo-400 mb-2">∞</div>
                        <div class="text-slate-300 font-medium">Canales de Comunicación</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Información de Contacto -->
    <section id="contacto-info" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Información de Contacto
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Múltiples canales de comunicación para brindarte el mejor servicio y soporte
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Dirección -->
                <div class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-indigo-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-cyan-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-cyan-300 transition-all duration-500 mb-4">Dirección</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">
                                02 de Marzo, número 807<br>
                                Colonia Centro<br>
                                Texcoco, Estado de México<br>
                                México, C.P. 56100
                            </p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="https://maps.google.com/?q=02+de+Marzo+807+Texcoco" target="_blank" class="group/link relative overflow-hidden bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-blue-400 hover:to-cyan-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-blue-500/25 w-full text-center">
                                <span class="relative z-10">Ver Mapa</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Teléfono -->
                <div class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="text-center">
                            <!-- Icono centrado arriba del título -->
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-emerald-300 transition-all duration-500 mb-4">Teléfono</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">
                                <a href="tel:+525512345678" class="hover:text-green-400 transition-colors block mb-2">
                                    +52 55 2261 4633
                                </a>
                            </p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="tel:+525512345678" class="group/link relative overflow-hidden bg-gradient-to-r from-green-500 to-emerald-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-green-400 hover:to-emerald-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-green-500/25 w-full text-center">
                                <span class="relative z-10">Llamar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
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
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 mb-4">Correo Electrónico</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">
                                <a href="mailto:info@softlinkia.com" class="hover:text-purple-400 transition-colors block mb-2">
                                    contact@softlinkia.com
                                </a>
                            </p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="mailto:info@softlinkia.com" class="group/link relative overflow-hidden bg-gradient-to-r from-purple-500 to-violet-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-purple-400 hover:to-violet-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-purple-500/25 w-full text-center">
                                <span class="relative z-10">Escribir</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Horarios y Redes Sociales -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-12">
                <!-- Horarios -->
                <div class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-right" data-aos-delay="400">
                    <!-- Efectos de fondo animados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-amber-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

                    <!-- Partículas flotantes -->
                    <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-8 left-6 w-1 h-1 bg-amber-400 rounded-full opacity-40 animate-ping"></div>

                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="relative mr-4">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="relative w-14 h-14 bg-gradient-to-br from-orange-500 to-amber-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12,6 12,12 16,14"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-amber-300 transition-all duration-500">Horarios de Atención</h3>
                        </div>
                        <div class="space-y-3 text-slate-300 group-hover:text-slate-200 transition-colors duration-500">
                            <p class="flex items-center">
                                <span class="w-2 h-2 bg-orange-400 rounded-full mr-3 animate-pulse"></span>
                                Lunes - Viernes: 9:00 AM - 6:00 PM
                            </p>
                            <p class="flex items-center">
                                <span class="w-2 h-2 bg-amber-400 rounded-full mr-3 animate-pulse" style="animation-delay: 0.2s"></span>
                                Sábados: 9:00 AM - 2:00 PM
                            </p>
                            <p class="flex items-center">
                                <span class="w-2 h-2 bg-yellow-400 rounded-full mr-3 animate-pulse" style="animation-delay: 0.4s"></span>
                                Soporte 24/7 disponible
                            </p>
                        </div>
                    </div>
                </div>

        <!-- Redes Sociales -->
        <div class="service-card-modern service-card-pink group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-700 hover:scale-105" data-aos="fade-left" data-aos-delay="500">
            <!-- Efectos de fondo animados -->
            <div class="absolute inset-0 bg-gradient-to-br from-pink-600/20 via-rose-500/10 to-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

            <!-- Partículas flotantes -->
            <div class="absolute top-4 right-4 w-2 h-2 bg-pink-400 rounded-full opacity-60 animate-pulse"></div>
            <div class="absolute bottom-8 left-6 w-1 h-1 bg-rose-400 rounded-full opacity-40 animate-ping"></div>

            <div class="relative z-10">
                <div class="flex items-center mb-6">
                    <div class="relative mr-4">
                        <div class="absolute -inset-2 bg-gradient-to-tr from-pink-500 to-rose-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative w-14 h-14 bg-gradient-to-br from-pink-500 to-rose-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                            <!-- Icono de personas/contactos -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-8 h-8 text-white" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-pink-200 bg-clip-text text-transparent group-hover:from-pink-300 group-hover:to-rose-300 transition-all duration-500">
                        Redes Sociales
                    </h3>
                </div>

                <div class="grid grid-cols-5 gap-4">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/share/16pwSCfawU/" title="Facebook" target="_blank" class="group/social relative w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/25">
                        <svg class="w-6 h-6 text-white group-hover/social:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <div class="absolute inset-0 rounded-xl border border-blue-400/50 group-hover/social:border-blue-300 group-hover/social:shadow-[0_0_15px_rgba(59,130,246,0.5)] transition-all duration-300"></div>
                    </a>

                    <!-- Instagram Icon Moderno -->
                    <a href="https://www.instagram.com/softlinkia/" title="Instagram" target="_blank" class="group/social relative w-12 h-12 rounded-xl flex items-center justify-center hover:scale-110 transition-all duration-300 hover:shadow-lg hover:shadow-pink-600/25 overflow-hidden">
                        <!-- Fondo con gradiente de Instagram -->
                        <div class="absolute inset-0 bg-gradient-to-br from-pink-500 via-purple-600 to-orange-500 group-hover/social:from-pink-400 group-hover/social:via-purple-500 group-hover/social:to-orange-400 transition-all duration-300"></div>

                        <!-- Efecto de brillo -->
                        <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-0 group-hover/social:opacity-100 transition-opacity duration-300"></div>

                        <svg class="w-6 h-6 relative z-10 text-white group-hover/social:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="currentColor">
                            <!-- Cámara de Instagram -->
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>

                        <!-- Borde con efecto de brillo -->
                        <div class="absolute inset-0 rounded-xl border border-white/30 group-hover/social:border-white/50 group-hover/social:shadow-[0_0_20px_rgba(236,72,153,0.6)] transition-all duration-300"></div>
                    </a>

                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@softlinkia" title="TikTok" target="_blank" class="group/social relative w-12 h-12 bg-gradient-to-br from-gray-800 to-black rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 hover:shadow-lg hover:shadow-neutral-700/25">
                        <svg class="w-6 h-6 text-white group-hover/social:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                        </svg>
                        <div class="absolute inset-0 rounded-xl border border-neutral-500/50 group-hover/social:border-white/30 group-hover/social:shadow-[0_0_15px_rgba(255,255,255,0.25)] transition-all duration-300"></div>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/company/106776373/admin/dashboard/" title="LinkedIn" target="_blank" class="group/social relative w-12 h-12 bg-gradient-to-br from-blue-700 to-blue-800 rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 hover:shadow-lg hover:shadow-blue-700/25">
                        <svg class="w-6 h-6 text-white group-hover/social:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        <div class="absolute inset-0 rounded-xl border border-blue-600/50 group-hover/social:border-blue-500 group-hover/social:shadow-[0_0_15px_rgba(29,78,216,0.5)] transition-all duration-300"></div>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/5215522614633" title="WhatsApp" target="_blank" class="group/social relative w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 hover:shadow-lg hover:shadow-green-500/25">
                        <svg class="w-6 h-6 text-white group-hover/social:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                        </svg>
                        <div class="absolute inset-0 rounded-xl border border-green-400/50 group-hover/social:border-green-300 group-hover/social:shadow-[0_0_15px_rgba(34,197,94,0.5)] transition-all duration-300"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Características de Nuestro Servicio -->
    <section id="caracteristicas" class="py-16 unified-section-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Características de Nuestro Servicio
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Funcionalidades diseñadas para brindarte la mejor experiencia de contacto y soporte
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-grid">
                <!-- Respuesta Rápida -->
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
                                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-green-200 bg-clip-text text-transparent group-hover:from-green-300 group-hover:to-teal-300 transition-all duration-500 mb-4">Respuesta Rápida</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Tiempo de respuesta garantizado en menos de 2 horas durante horario laboral y soporte 24/7 para emergencias.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#contacto-info" class="group/link relative overflow-hidden bg-gradient-to-r from-green-500 to-teal-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-green-400 hover:to-teal-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-green-500/25 w-full text-center">
                                <span class="relative z-10">Contactar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Múltiples Canales -->
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
                                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-teal-200 bg-clip-text text-transparent group-hover:from-teal-300 group-hover:to-emerald-300 transition-all duration-500 mb-4">Múltiples Canales</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">WhatsApp, email, teléfono, redes sociales y formulario web. Elige el canal que más te convenga para contactarnos.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#contacto-info" class="group/link relative overflow-hidden bg-gradient-to-r from-teal-500 to-emerald-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-teal-400 hover:to-emerald-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-teal-500/25 w-full text-center">
                                <span class="relative z-10">Ver Canales</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Soporte Especializado -->
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
                                            <path d="M9 12l2 2 4-4"></path>
                                            <path d="M21 12c.552 0 1-.448 1-1V5c0-.552-.448-1-1-1H3c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1h9l4 4-1-4z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-emerald-200 bg-clip-text text-transparent group-hover:from-emerald-300 group-hover:to-green-300 transition-all duration-500 mb-4">Soporte Especializado</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Equipo de expertos especializados en cada área de nuestros servicios para brindarte la mejor asesoría técnica.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#contacto-info" class="group/link relative overflow-hidden bg-gradient-to-r from-emerald-500 to-green-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-emerald-400 hover:to-green-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-emerald-500/25 w-full text-center">
                                <span class="relative z-10">Consultar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Seguimiento Personalizado -->
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
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-indigo-300 transition-all duration-500 mb-4">Seguimiento Personalizado</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Seguimiento detallado de tu consulta con actualizaciones en tiempo real y historial completo de comunicaciones.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#contacto-info" class="group/link relative overflow-hidden bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-blue-400 hover:to-indigo-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-blue-500/25 w-full text-center">
                                <span class="relative z-10">Rastrear</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Seguridad y Privacidad -->
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
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent group-hover:from-purple-300 group-hover:to-violet-300 transition-all duration-500 mb-4">Seguridad y Privacidad</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Protección total de tus datos con encriptación avanzada y cumplimiento de estándares internacionales de privacidad.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#contacto-info" class="group/link relative overflow-hidden bg-gradient-to-r from-purple-500 to-violet-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-purple-400 hover:to-violet-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-purple-500/25 w-full text-center">
                                <span class="relative z-10">Conocer Más</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Disponibilidad Global -->
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
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Título centrado -->
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-orange-200 bg-clip-text text-transparent group-hover:from-orange-300 group-hover:to-amber-300 transition-all duration-500 mb-4">Disponibilidad Global</h3>
                            <!-- Descripción centrada -->
                            <p class="text-slate-300 mb-6 group-hover:text-slate-200 transition-colors duration-500 text-center">Acceso desde cualquier parte del mundo con infraestructura distribuida y soporte en múltiples zonas horarias.</p>
                        </div>
                        <!-- Botón más grande y centrado -->
                        <div class="flex justify-center">
                            <a href="#contacto-info" class="group/link relative overflow-hidden bg-gradient-to-r from-orange-500 to-amber-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-orange-400 hover:to-amber-400 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-orange-500/25 w-full text-center">
                                <span class="relative z-10">Conectar</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300"></div>
                            </a>
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
                                <span class="material-icons mr-2">send</span>
                                Enviar Mensaje
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

            <div class="bg-black rounded-2xl overflow-hidden shadow-2xl border border-slate-600" data-aos="fade-up" data-aos-delay="200">
                <div id="map" class="h-96 w-full"></div>
                <div class="p-6 bg-black border-t border-slate-600">
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
                        <span class="text-cyan-300 font-semibold text-lg">💬 Contacto Premium</span>
                    </div>
                </div>

                <!-- Título principal -->
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black mb-8 text-white leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                        ¿Listo para
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent animate-gradient-x" style="animation-delay: 0.5s;">
                        Empezar tu Proyecto?
                    </span>
                </h2>

                <!-- Descripción mejorada -->
                <p class="text-xl md:text-2xl text-slate-200 max-w-4xl mx-auto mb-12 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                    Nuestros <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-semibold">expertos en desarrollo</span> están listos para
                    <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent font-semibold">transformar tu visión en realidad</span>
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

                    <!-- Botón Email Premium -->
                    <a href="mailto:info@softlinkia.com"
                       class="neon-button-secondary group relative overflow-hidden border-2 border-blue-400 text-blue-400 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-blue-500/20 hover:to-cyan-500/20">
                        <!-- Efectos de fondo animados -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/10 via-cyan-400/10 to-blue-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 animate-pulse"></div>
                        <div class="absolute inset-0 bg-gradient-to-45 from-transparent via-blue-300/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-shimmer"></div>

                        <!-- Partículas de neón -->
                        <div class="absolute top-2 left-4 w-1 h-1 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.2s"></div>
                        <div class="absolute bottom-3 right-6 w-1 h-1 bg-cyan-300 rounded-full opacity-0 group-hover:opacity-100 animate-ping" style="animation-delay: 0.4s"></div>

                        <span class="material-icons mr-3 text-2xl group-hover:rotate-12 transition-transform duration-500 relative z-10 group-hover:text-yellow-300">email</span>
                        <div class="relative z-10">
                            <div class="text-left">
                                <div class="font-bold">Enviar Email</div>
                                <div class="text-sm opacity-90">Respuesta Rápida</div>
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
</style>
@endsection

<script>
// Define FAQ function immediately in global scope
function toggleFAQ() {
    const faqContent = document.getElementById('faqContent');
    const faqChevron = document.getElementById('faqChevron');

    if (faqContent && faqChevron) {
        const isHidden = faqContent.classList.contains('hidden');

        if (isHidden) {
            // Show FAQ content
            faqContent.classList.remove('hidden');
            faqChevron.style.transform = 'rotate(180deg)';

            // Animate FAQ items
            setTimeout(() => {
                const faqItems = faqContent.querySelectorAll('.border-l-4');
                faqItems.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateX(-20px)';

                    setTimeout(() => {
                        item.style.transition = 'all 0.4s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'translateX(0)';
                    }, index * 50);
                });
            }, 100);

        } else {
            // Hide FAQ content
            faqContent.classList.add('hidden');
            faqChevron.style.transform = 'rotate(0deg)';
        }
    } else {
        console.error('FAQ elements not found');
    }
}
</script>

@push('scripts')
<script>

document.addEventListener('DOMContentLoaded', function() {
    // Also add event listener as backup
    const faqMenuBtn = document.getElementById('faqMenuBtn');
    if (faqMenuBtn) {
        faqMenuBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.toggleFAQ();
        });
    }

    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = submitBtn.querySelector('.submit-text');
    const loadingText = submitBtn.querySelector('.loading-text');
    const successText = submitBtn.querySelector('.success-text');

    // Validación en tiempo real
    const validators = {
        nombre: {
            validate: (value) => value.trim().length >= 2,
            message: 'El nombre debe tener al menos 2 caracteres'
        },
        email: {
            validate: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
            message: 'Ingresa un email válido'
        },
        telefono: {
            validate: (value) => value === '' || /^[\+]?[0-9\s\-\(\)]{10,}$/.test(value),
            message: 'Formato de teléfono inválido'
        },
        asunto: {
            validate: (value) => value !== '',
            message: 'Selecciona un asunto'
        },
        mensaje: {
            validate: (value) => value.trim().length >= 10 && value.trim().length <= 500,
            message: 'El mensaje debe tener entre 10 y 500 caracteres'
        },
        privacidad: {
            validate: (checked) => checked,
            message: 'Debes aceptar la política de privacidad'
        }
    };

    // Función para validar campo
    function validateField(field) {
        const fieldName = field.name;
        const validator = validators[fieldName];
        if (!validator) return true;

        const value = field.type === 'checkbox' ? field.checked : field.value;
        const isValid = validator.validate(value);
        const container = field.closest('.relative') || field.parentElement;
        const invalidFeedback = container.querySelector('.invalid-feedback');
        const validFeedback = container.querySelector('.valid-feedback');

        // Remover clases anteriores
        field.classList.remove('border-red-500', 'border-green-500');

        if (isValid) {
            field.classList.add('border-green-500');
            if (invalidFeedback) {
                invalidFeedback.classList.add('hidden');
            }
            if (validFeedback) {
                validFeedback.classList.remove('hidden');
            }
        } else {
            field.classList.add('border-red-500');
            if (invalidFeedback) {
                invalidFeedback.textContent = validator.message;
                invalidFeedback.classList.remove('hidden');
            }
            if (validFeedback) {
                validFeedback.classList.add('hidden');
            }
        }

        return isValid;
    }

    // Contador de caracteres para mensaje
    const mensajeField = document.getElementById('mensaje');
    const characterCount = mensajeField.parentElement.querySelector('.character-count');

    mensajeField.addEventListener('input', function() {
        const length = this.value.length;
        characterCount.textContent = `${length} / 500 caracteres`;

        if (length > 500) {
            characterCount.classList.add('text-red-400');
            characterCount.classList.remove('text-slate-400');
        } else {
            characterCount.classList.remove('text-red-400');
            characterCount.classList.add('text-slate-400');
        }

        validateField(this);
    });

    // Validación en tiempo real para todos los campos
    ['nombre', 'email', 'telefono', 'asunto', 'mensaje', 'privacidad'].forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (field) {
            const eventType = field.type === 'checkbox' ? 'change' : 'blur';
            field.addEventListener(eventType, () => validateField(field));

            // Validación mientras escribe para campos de texto
            if (field.type === 'text' || field.type === 'email' || field.tagName === 'TEXTAREA') {
                field.addEventListener('input', () => {
                    // Debounce para evitar validación excesiva
                    clearTimeout(field.validationTimeout);
                    field.validationTimeout = setTimeout(() => validateField(field), 500);
                });
            }
        }
    });

    // Animaciones de entrada
    const formElements = form.querySelectorAll('input, select, textarea, button');
    formElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';

        setTimeout(() => {
            element.style.transition = 'all 0.6s ease';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Placeholders dinámicos
    const placeholders = {
        nombre: ['Tu nombre completo', 'Ej: Juan Pérez', 'Ingresa tu nombre'],
        empresa: ['Nombre de tu empresa', 'Ej: TechCorp S.A.', 'Tu empresa (opcional)'],
        email: ['tu@email.com', 'correo@empresa.com', 'Tu email'],
        telefono: ['+52 55 1234 5678', '+1 555 123 4567', 'Tu teléfono'],
        mensaje: [
            'Cuéntanos sobre tu proyecto...',
            'Describe tus necesidades...',
            'Comparte los detalles de tu consulta...'
        ]
    };

    Object.keys(placeholders).forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (field && field.tagName !== 'SELECT') {
            let currentIndex = 0;
            const texts = placeholders[fieldName];

            setInterval(() => {
                if (!field.matches(':focus') && field.value === '') {
                    field.placeholder = texts[currentIndex];
                    currentIndex = (currentIndex + 1) % texts.length;
                }
            }, 3000);
        }
    });

    // Envío del formulario
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Validar todos los campos
        let isFormValid = true;
        ['nombre', 'email', 'asunto', 'mensaje', 'privacidad'].forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (field && !validateField(field)) {
                isFormValid = false;
            }
        });

        if (!isFormValid) {
            // Scroll al primer error
            const firstError = form.querySelector('.border-red-500');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
            return;
        }

        // Simular envío
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        loadingText.classList.remove('hidden');

        setTimeout(() => {
            loadingText.classList.add('hidden');
            successText.classList.remove('hidden');

            setTimeout(() => {
                // Resetear formulario
                form.reset();
                submitBtn.disabled = false;
                successText.classList.add('hidden');
                submitText.classList.remove('hidden');

                // Limpiar validaciones
                form.querySelectorAll('.border-green-500, .border-red-500').forEach(field => {
                    field.classList.remove('border-green-500', 'border-red-500');
                });
                form.querySelectorAll('.invalid-feedback, .valid-feedback').forEach(feedback => {
                    feedback.classList.add('hidden');
                });

                // Resetear contador
                characterCount.textContent = '0 / 500 caracteres';
            }, 2000);
        }, 2000);
    });

    // FAQ functionality is handled by the global toggleFAQ() function
});
</script>
@endpush

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
    <div class="bg-slate-800 rounded-2xl p-6 border border-slate-600 shadow-2xl">
        <div class="flex flex-col items-center text-center">
            <div class="bg-white rounded-full p-3 shadow-md mb-4">
                <img src="{{ asset('images/logos/SoftLinkIA.png') }}" class="w-20 h-20">
            </div>
            <div class="text-white font-medium mb-2">SoftLinkIA</div>
            <div class="text-slate-300 text-sm">
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
        mapContainer.addEventListener('mouseenter', () => {
            map.scrollWheelZoom.enable();
        });
        mapContainer.addEventListener('mouseleave', () => {
            map.scrollWheelZoom.disable();
        });
    }

    window.addEventListener('load', initMap);
</script>
@endsection