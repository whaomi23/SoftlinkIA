@extends('layouts.app')

@section('content')
    <!-- Hero de Privacidad -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden py-16">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-purple-900 to-fuchsia-900"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/10 via-transparent to-pink-500/10"></div>
        <div class="absolute top-10 left-10 w-72 h-72 bg-indigo-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-pink-500/20 rounded-full blur-3xl animate-pulse"
            style="animation-delay: .8s"></div>

        <div class="relative z-30 max-w-5xl text-center px-4">
            <div class="inline-flex items-center px-5 py-2 rounded-full bg-white/10 border border-white/20 text-indigo-200 backdrop-blur-sm mb-6"
                data-aos="fade-up">
                <span class="mr-2">🔒</span>
                <span class="font-semibold">Transparencia y control de tus datos</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-4 leading-tight" data-aos="fade-up"
                data-aos-delay="100">
                <span class="bg-gradient-to-r from-white via-indigo-200 to-pink-200 bg-clip-text text-transparent">Política
                    de Privacidad</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-200 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Explicamos de forma clara cómo recopilamos, usamos y protegemos tu información.
            </p>
        </div>
    </section>
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-5xl mx-auto">


            <!-- Contenedor principal con efecto de vidrio -->
            <div class="glass-effect rounded-xl p-6 md:p-8 shadow-xl border-gradient-primary opacity-0" data-aos="zoom-in"
                data-aos-duration="1000" id="main-container">
                <div class="space-y-8">
                    <!-- Resumen Clave -->
                    <section
                        class="relative rounded-2xl p-6 md:p-8 bg-gradient-to-br from-slate-900/60 to-slate-900/30 border border-white/10 backdrop-blur-md"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div
                                class="rounded-xl px-4 py-5 bg-white/5 border border-white/10 hover:border-indigo-400/60 transition-all">
                                <div class="text-sm text-slate-400 mb-1">Principio</div>
                                <div class="text-white font-semibold">Minimización de datos</div>
                            </div>
                            <div
                                class="rounded-xl px-4 py-5 bg-white/5 border border-white/10 hover:border-purple-400/60 transition-all">
                                <div class="text-sm text-slate-400 mb-1">Transparencia</div>
                                <div class="text-white font-semibold">Uso claro y legítimo</div>
                            </div>
                            <div
                                class="rounded-xl px-4 py-5 bg-white/5 border border-white/10 hover:border-pink-400/60 transition-all">
                                <div class="text-sm text-slate-400 mb-1">Control</div>
                                <div class="text-white font-semibold">Derechos del usuario</div>
                            </div>
                            <div
                                class="rounded-xl px-4 py-5 bg-white/5 border border-white/10 hover:border-cyan-400/60 transition-all">
                                <div class="text-sm text-slate-400 mb-1">Seguridad</div>
                                <div class="text-white font-semibold">Cifrado y acceso limitado</div>
                            </div>
                        </div>
                    </section>
                    <!-- Introducción -->
                    <section
                        class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="200">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors duration-300">
                                    Introducción</h2>
                            </div>
                            <p class="text-slate-300 leading-relaxed ml-0">En SoftlinkIA, valoramos y respetamos su
                                privacidad. Esta política describe cómo recopilamos, utilizamos y protegemos su información
                                personal cuando utiliza nuestros servicios y sitio web.</p>
                        </div>
                    </section>

                    <!-- Información que recopilamos -->
                    <section
                        class="service-card-modern service-card-purple group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="300">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-purple-600/20 via-indigo-500/10 to-pink-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-purple-400 rounded-full opacity-60 animate-pulse">
                        </div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-indigo-400 rounded-full opacity-40 animate-ping">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-purple-500 to-indigo-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-purple-300 transition-colors duration-300">
                                    Información que Recopilamos</h2>
                            </div>

                            <div class="space-y-6 ml-0">
                                <div
                                    class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-4 rounded-lg border border-gray-700 hover:border-purple-500 transition-all duration-300">
                                    <div class="flex items-center mb-2">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-tr from-purple-500 to-indigo-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-8 h-8 bg-gradient-to-br from-purple-500 to-indigo-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002 2v8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-lg font-semibold text-white">Información Personal</h3>
                                    </div>
                                    <p class="text-slate-300 text-sm ml-0">Nombre, dirección de correo electrónico, número
                                        de teléfono y otra información de contacto cuando se registra o utiliza nuestros
                                        servicios.</p>
                                </div>

                                <div
                                    class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-4 rounded-lg border border-gray-700 hover:border-blue-500 transition-all duration-300">
                                    <div class="flex items-center mb-2">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-8 h-8 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-lg font-semibold text-white">Información Técnica</h3>
                                    </div>
                                    <p class="text-slate-300 text-sm ml-0">Dirección IP, tipo de navegador, proveedor de
                                        servicios de Internet, páginas de referencia/salida, sistema operativo, fecha/hora y
                                        datos de navegación.</p>
                                </div>

                                <div
                                    class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-4 rounded-lg border border-gray-700 hover:border-pink-500 transition-all duration-300">
                                    <div class="flex items-center mb-2">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-tr from-pink-500 to-purple-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-8 h-8 bg-gradient-to-br from-pink-500 to-purple-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-lg font-semibold text-white">Cookies y Tecnologías Similares</h3>
                                    </div>
                                    <p class="text-slate-300 text-sm ml-0">Utilizamos cookies y tecnologías similares para
                                        mejorar su experiencia, analizar el tráfico y personalizar el contenido.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Cómo utilizamos su información -->
                    <section
                        class="service-card-modern service-card-green group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="400">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-emerald-500/10 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-green-400 rounded-full opacity-60 animate-pulse">
                        </div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-emerald-400 rounded-full opacity-40 animate-ping">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-green-300 transition-colors duration-300">
                                    Cómo Utilizamos su Información</h2>
                            </div>

                            <ul class="space-y-3 text-slate-300 list-disc pl-5 ml-0">
                                <li class="flex items-start">
                                    <div class="relative mr-3 mt-1">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                        <div
                                            class="relative w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="ml-2">Proporcionar, mantener y mejorar nuestros servicios</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="relative mr-3 mt-1">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                        <div
                                            class="relative w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="ml-2">Procesar transacciones y enviar notificaciones relacionadas</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="relative mr-3 mt-1">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                        <div
                                            class="relative w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="ml-2">Enviar comunicaciones técnicas, actualizaciones, alertas de seguridad
                                        y mensajes de soporte</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="relative mr-3 mt-1">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                        <div
                                            class="relative w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="ml-2">Responder a sus comentarios, preguntas y solicitudes</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="relative mr-3 mt-1">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                        <div
                                            class="relative w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="ml-2">Monitorear y analizar tendencias, uso y actividades</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="relative mr-3 mt-1">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                        </div>
                                        <div
                                            class="relative w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="ml-2">Personalizar y mejorar su experiencia</span>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <!-- Compartir información -->
                    <section
                        class="service-card-modern service-card-red group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="500">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-red-600/20 via-orange-500/10 to-pink-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-orange-400 rounded-full opacity-40 animate-ping">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-red-500 to-orange-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-red-500 to-orange-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-red-300 transition-colors duration-300">
                                    Compartir Información</h2>
                            </div>

                            <p class="text-slate-300 leading-relaxed mb-4 ml-0">No vendemos ni alquilamos su información
                                personal a terceros. Podemos compartir su información en las siguientes circunstancias:</p>

                            <div class="grid md:grid-cols-2 gap-4 ml-0">
                                <div
                                    class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-4 rounded-lg border border-gray-700 hover:border-red-500 transition-all duration-300">
                                    <div class="flex items-center mb-2">
                                        <div class="relative mr-3">
                                            <div
                                                class="absolute -inset-1 bg-gradient-to-tr from-red-500 to-orange-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                            </div>
                                            <div
                                                class="relative w-8 h-8 bg-gradient-to-br from-red-500 to-orange-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <h3 class="text-lg font-semibold text-white">Proveedores de Servicios</h3>
                                    </div>

                                    <div
                                        class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 p-4 rounded-lg border border-gray-700 hover:border-orange-500 transition-all duration-300">
                                        <div class="flex items-center mb-2">
                                            <div class="relative mr-3">
                                                <div
                                                    class="absolute -inset-1 bg-gradient-to-tr from-red-500 to-orange-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                </div>
                                                <div
                                                    class="relative w-8 h-8 bg-gradient-to-br from-red-500 to-orange-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <h3 class="text-lg font-semibold text-white">Requisitos Legales</h3>
                                        </div>
                                        <p class="text-slate-300 text-sm ml-0">Cuando creemos de buena fe que la divulgación
                                            es necesaria para cumplir con la ley o proteger nuestros derechos.</p>
                                    </div>
                                </div>
                            </div>
                    </section>

                    <!-- Seguridad -->
                    <section
                        class="service-card-modern service-card-indigo group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="600">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 via-blue-500/10 to-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-indigo-400 rounded-full opacity-60 animate-pulse">
                        </div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-violet-400 rounded-full opacity-40 animate-ping">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-indigo-300 transition-colors duration-300">
                                    Seguridad</h2>
                            </div>

                            <div class="ml-0">
                                <div class="relative">
                                    <div
                                        class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-violet-600 rounded-lg blur opacity-25">
                                    </div>
                                    <div class="relative bg-gray-900 p-5 rounded-lg">
                                        <p class="text-slate-300 leading-relaxed">Implementamos medidas de seguridad
                                            diseñadas para proteger su información personal, incluyendo:</p>
                                        <div class="mt-4 grid grid-cols-2 gap-3">
                                            <div class="flex items-center">
                                                <div class="relative mr-2">
                                                    <div
                                                        class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                    <div
                                                        class="relative w-8 h-8 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <span class="text-slate-300">Encriptación SSL</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="relative mr-2">
                                                    <div
                                                        class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                    <div
                                                        class="relative w-8 h-8 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <span class="text-slate-300">Acceso restringido</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="relative mr-2">
                                                    <div
                                                        class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                    <div
                                                        class="relative w-8 h-8 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <span class="text-slate-300">Anonimización de datos</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="relative mr-2">
                                                    <div
                                                        class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-violet-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                    <div
                                                        class="relative w-8 h-8 bg-gradient-to-br from-indigo-500 to-violet-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <span class="text-slate-300">Actualizaciones regulares</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Sus derechos -->
                    <section
                        class="service-card-modern service-card-orange group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="700">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-orange-600/20 via-amber-500/10 to-yellow-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-orange-400 rounded-full opacity-60 animate-pulse">
                        </div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-amber-400 rounded-full opacity-40 animate-ping">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-orange-500 to-amber-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-orange-300 transition-colors duration-300">
                                    Sus Derechos</h2>
                            </div>

                            <div class="ml-0">
                                <div
                                    class="bg-gradient-to-br from-gray-800/30 to-gray-900/30 p-6 rounded-lg border-l-4 border-indigo-500">
                                    <p class="text-slate-300 leading-relaxed mb-4">Dependiendo de su ubicación, puede tener
                                        ciertos derechos con respecto a su información personal, incluyendo:</p>

                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div
                                            class="bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/80 transition-all duration-300 hover:border-orange-500 border border-transparent">
                                            <div class="flex items-center mb-1">
                                                <div class="relative mr-2">
                                                    <div
                                                        class="absolute -inset-1 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                    <div
                                                        class="relative w-8 h-8 bg-gradient-to-br from-orange-500 to-amber-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <h3 class="text-lg font-semibold text-white">Acceso</h3>
                                            </div>
                                            <p class="text-slate-300 text-sm ml-10">Derecho a solicitar acceso a su
                                                información personal.</p>
                                        </div>

                                        <div
                                            class="bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/80 transition-all duration-300 hover:border-orange-500 border border-transparent">
                                            <div class="flex items-center mb-1">
                                                <div class="relative mr-2">
                                                    <div
                                                        class="absolute -inset-1 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                    <div
                                                        class="relative w-8 h-8 bg-gradient-to-br from-orange-500 to-amber-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <h3 class="text-lg font-semibold text-white">Rectificación</h3>
                                            </div>
                                            <p class="text-slate-300 text-sm ml-10">Derecho a solicitar que corrijamos
                                                información inexacta.</p>
                                        </div>

                                        <div
                                            class="bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/80 transition-all duration-300 hover:border-orange-500 border border-transparent">
                                            <div class="flex items-center mb-1">
                                                <div class="relative mr-2">
                                                    <div
                                                        class="absolute -inset-1 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                    <div
                                                        class="relative w-8 h-8 bg-gradient-to-br from-orange-500 to-amber-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <h3 class="text-lg font-semibold text-white">Eliminación</h3>
                                            </div>
                                            <p class="text-slate-300 text-sm ml-10">Derecho a solicitar que eliminemos su
                                                información.</p>
                                        </div>

                                        <div
                                            class="bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/80 transition-all duration-300 hover:border-orange-500 border border-transparent">
                                            <div class="flex items-center mb-1">
                                                <div class="relative mr-2">
                                                    <div
                                                        class="absolute -inset-1 bg-gradient-to-tr from-orange-500 to-amber-400 rounded-lg opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                                    </div>
                                                    <div
                                                        class="relative w-8 h-8 bg-gradient-to-br from-orange-500 to-amber-400 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <h3 class="text-lg font-semibold text-white">Restricción</h3>
                                            </div>
                                            <p class="text-slate-300 text-sm ml-10">Derecho a solicitar que restrinjamos el
                                                procesamiento.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Cambios a esta política -->
                    <section
                        class="service-card-modern service-card-blue group relative overflow-hidden rounded-2xl p-8 cursor-pointer transform transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="800">
                        <!-- Efectos de fondo animados -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-cyan-500/10 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                        </div>

                        <!-- Partículas flotantes -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center mb-4 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <h2
                                    class="text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors duration-300">
                                    Cambios a esta Política</h2>
                            </div>

                            <p class="text-slate-300 leading-relaxed ml-0">Podemos actualizar esta política de privacidad
                                periódicamente. Le notificaremos cualquier cambio publicando la nueva política de privacidad
                                en esta página y, si los cambios son significativos, le proporcionaremos un aviso más
                                destacado.</p>
                        </div>
                    </section>

                    <!-- Preguntas Frecuentes -->
                    <section id="faq"
                        class="group relative overflow-hidden rounded-2xl p-8 bg-slate-900/50 border border-white/10 backdrop-blur-md"
                        data-aos="fade-up" data-aos-delay="850">
                        <div class="relative z-10">
                            <div class="flex items-center mb-6 select-none">
                                <div class="relative mr-4">
                                    <div
                                        class="absolute -inset-2 bg-gradient-to-tr from-indigo-500 to-pink-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 bg-gradient-to-br from-indigo-500 to-pink-400 rounded-xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m2 5H7a2 2 0 01-2-2V7a2 2 0 012-2h5l2 2h5a2 2 0 012 2v10a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <h2 class="text-2xl font-bold text-white">Preguntas Frecuentes</h2>
                            </div>

                            <div class="space-y-4">
                                <details
                                    class="group rounded-xl bg-white/5 border border-white/10 open:border-indigo-400/60 transition-all">
                                    <summary
                                        class="cursor-pointer px-5 py-4 text-white font-semibold flex items-center justify-between">
                                        ¿Qué datos personales recopilamos?
                                        <span
                                            class="ml-3 text-slate-300 group-open:rotate-180 transition-transform">⌄</span>
                                    </summary>
                                    <div class="px-5 pb-5 text-slate-300">
                                        Recopilamos datos de contacto, información técnica (IP, navegador, dispositivo) y
                                        datos de interacción con nuestros servicios. Puedes ver el detalle en “Información
                                        que Recopilamos”.
                                    </div>
                                </details>

                                <details
                                    class="group rounded-xl bg-white/5 border border-white/10 open:border-purple-400/60 transition-all">
                                    <summary
                                        class="cursor-pointer px-5 py-4 text-white font-semibold flex items-center justify-between">
                                        ¿Cómo puedes ejercer tus derechos?
                                        <span
                                            class="ml-3 text-slate-300 group-open:rotate-180 transition-transform">⌄</span>
                                    </summary>
                                    <div class="px-5 pb-5 text-slate-300">
                                        Puedes solicitarnos acceso, rectificación, eliminación o restricción del
                                        tratamiento. Contáctanos y responderemos con instrucciones y tiempos de respuesta.
                                    </div>
                                </details>

                                <details
                                    class="group rounded-xl bg-white/5 border border-white/10 open:border-pink-400/60 transition-all">
                                    <summary
                                        class="cursor-pointer px-5 py-4 text-white font-semibold flex items-center justify-between">
                                        ¿Compartimos información con terceros?
                                        <span
                                            class="ml-3 text-slate-300 group-open:rotate-180 transition-transform">⌄</span>
                                    </summary>
                                    <div class="px-5 pb-5 text-slate-300">
                                        No vendemos tu información. Solo compartimos con proveedores que nos ayudan a
                                        prestar el servicio y bajo acuerdos de confidencialidad, o cuando la ley lo
                                        requiere.
                                    </div>
                                </details>

                                <details
                                    class="group rounded-xl bg-white/5 border border-white/10 open:border-cyan-400/60 transition-all">
                                    <summary
                                        class="cursor-pointer px-5 py-4 text-white font-semibold flex items-center justify-between">
                                        ¿Por cuánto tiempo conservamos tus datos?
                                        <span
                                            class="ml-3 text-slate-300 group-open:rotate-180 transition-transform">⌄</span>
                                    </summary>
                                    <div class="px-5 pb-5 text-slate-300">
                                        Conservamos los datos solo el tiempo necesario para los fines descritos y para
                                        cumplir obligaciones legales. Luego los anonimamos o eliminamos de forma segura.
                                    </div>
                                </details>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- CTA Privacidad -->
            <section class="relative mt-12 rounded-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/30 via-purple-600/25 to-pink-600/30"></div>
                <div
                    class="relative z-10 px-6 py-10 md:px-10 md:py-12 flex flex-col md:flex-row items-center justify-between gap-6 border border-white/10 backdrop-blur-md rounded-2xl">
                    <div class="text-center md:text-left">
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-2">¿Tienes dudas sobre tu privacidad?</h3>
                        <p class="text-slate-200">Estamos aquí para ayudarte a ejercer tus derechos y resolver cualquier
                            inquietud.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://wa.me/5215522614633" target="_blank"
                            class="group relative overflow-hidden bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold transition-all hover:scale-105 inline-flex items-center justify-center">
                            <span class="material-icons mr-2 text-xl group-hover:rotate-12 transition-transform">chat</span>
                            Contacto por WhatsApp
                        </a>
                        <a href="{{ route('contacto') }}"
                            class="group relative overflow-hidden border-2 border-indigo-300/70 text-indigo-200 px-6 py-3 rounded-xl font-semibold transition-all hover:scale-105 inline-flex items-center justify-center backdrop-blur-sm">
                            <span class="material-icons mr-2 text-xl group-hover:rotate-12 transition-transform">mail</span>
                            Escríbenos
                        </a>
                    </div>
                </div>
            </section>

            <!-- Botón de regreso con efecto hover -->
            <div class="mt-12 text-center opacity-0" data-aos="fade-up" id="back-button">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium transition-all duration-300 hover:scale-105 hover:shadow-lg hover:from-indigo-500 hover:to-purple-500 hover:rotate-1">
                    <div class="service-icon-container h-6 w-6 mr-2 animate-bounce-subtle">
                        <div class="service-icon-box bg-white/10 h-6 w-6">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </div>
                    </div>
                    Volver al Inicio
                </a>
            </div>
        </div>
    </div>

    <!-- Añadir estilos y scripts para animaciones -->
    <style>
        /* Animación de gradiente de texto */
        .animate-text-gradient {
            background: linear-gradient(to right, #4f46e5, #8b5cf6, #ec4899, #4f46e5);
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: textGradient 5s linear infinite;
        }

        /* Animación de pulso lento */
        .animate-pulse-slow {
            animation: pulseSlow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Animación de rebote sutil */
        .animate-bounce-subtle {
            animation: bounceSoft 2s infinite;
        }

        /* Animación para secciones al hacer scroll */
        .service-card-modern {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .service-card-modern.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        /* Animación para iconos al hacer hover */
        .service-card-modern:hover .relative.mr-4 .relative.w-14.h-14 {
            animation: pulseAndRotate 1.5s infinite alternate;
        }

        /* Definición de animaciones */
        @keyframes textGradient {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }

        @keyframes pulseSlow {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.7;
                transform: scale(1.05);
            }
        }

        @keyframes bounceSoft {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes pulseAndRotate {
            0% {
                transform: rotate(0deg) scale(1);
            }

            100% {
                transform: rotate(12deg) scale(1.1);
            }
        }

        /* Efecto de aparición para partículas flotantes */
        .service-card-modern .absolute.rounded-full {
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .service-card-modern.animate-in .absolute.rounded-full {
            opacity: 0.6;
        }

        /* Efecto de desplazamiento para gradientes de fondo */
        .service-card-modern.animate-in .absolute.bg-gradient-to-br {
            animation: gradientShift 8s infinite alternate;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Animación inicial para elementos principales con comprobaciones
            const headerEl = document.getElementById('header-section');
            if (headerEl) {
                setTimeout(() => {
                    headerEl.classList.remove('opacity-0', 'translate-y-10');
                }, 300);
            }

            const mainEl = document.getElementById('main-container');
            if (mainEl) {
                setTimeout(() => {
                    mainEl.classList.remove('opacity-0');
                }, 600);
            }

            const backBtn = document.getElementById('back-button');
            if (backBtn) {
                setTimeout(() => {
                    backBtn.classList.remove('opacity-0');
                }, 900);
            }

            // Configurar observador de intersección para animaciones al hacer scroll
            const sections = document.querySelectorAll('.service-card-modern');

            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15
            };

            const sectionObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        // Añadir un pequeño retraso para los elementos internos
                        setTimeout(() => {
                            const childElements = entry.target.querySelectorAll('.bg-gradient-to-br, .flex, .grid');
                            childElements.forEach((el, index) => {
                                setTimeout(() => {
                                    el.classList.add('animate-in');
                                }, index * 150);
                            });
                        }, 300);
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                sectionObserver.observe(section);
            });

            // Efecto de parallax suave al hacer scroll
            window.addEventListener('scroll', function () {
                const scrollPosition = window.scrollY;
                const parallaxElements = document.querySelectorAll('.absolute.inset-0');

                parallaxElements.forEach(element => {
                    const section = element.closest('.service-card-modern');
                    const sectionTop = section.getBoundingClientRect().top;
                    const speed = 0.05;

                    if (sectionTop < window.innerHeight && sectionTop > -section.offsetHeight) {
                        const yPos = (sectionTop * speed);
                        element.style.transform = `translateY(${yPos}px)`;
                    }
                });
            });

            // Añadir interactividad a las tarjetas
            sections.forEach(section => {
                section.addEventListener('mouseenter', function () {
                    this.querySelectorAll('.absolute.rounded-full').forEach(particle => {
                        particle.style.animationDuration = Math.random() * 3 + 2 + 's';
                    });
                });
            });
        });
    </script>
@endsection