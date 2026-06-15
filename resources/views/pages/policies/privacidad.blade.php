@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Política de Privacidad</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300">Última actualización: {{ date('d/m/Y') }}</p>
        </div>

        <div
            class="max-w-4xl mx-auto bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-xl shadow-lg p-8 mb-12 border border-gray-200 dark:border-gray-700">
            <p class="text-gray-700 dark:text-gray-300 mb-8 leading-relaxed">
                En SoftlinkIA, valoramos y respetamos su privacidad. Esta política describe cómo recopilamos, utilizamos y
                protegemos su información personal cuando utiliza nuestros servicios y sitio web.
            </p>

            <div class="grid md:grid-cols-2 gap-8 mt-8" data-aos="fade-up" data-aos-delay="100">
                <!-- Tarjeta 1: Información que Recopilamos -->
                <div
                    class="group card-hover-effect bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="flex items-center mb-4">
                        <div class="relative mr-4">
                            <div
                                class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-8 h-8 text-white">
                                    <circle cx="12" cy="7" r="4"></circle>
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Información que Recopilamos</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Recopilamos información personal como nombre, correo electrónico, y datos de uso para mejorar su
                        experiencia y nuestros servicios.
                    </p>
                </div>

                <!-- Tarjeta 2: Uso de la Información -->
                <div
                    class="group card-hover-effect bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="flex items-center mb-4">
                        <div class="relative mr-4">
                            <div
                                class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-8 h-8 text-white">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                    <line x1="12" y1="17" x2="12" y2="21"></line>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Uso de la Información</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Utilizamos su información para proporcionar, mantener y mejorar nuestros servicios, así como para
                        comunicarnos con usted.
                    </p>
                </div>

                <!-- Tarjeta 3: Cookies -->
                <div
                    class="group card-hover-effect bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="flex items-center mb-4">
                        <div class="relative mr-4">
                            <div
                                class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-8 h-8 text-white">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <circle cx="8" cy="9" r="1"></circle>
                                    <circle cx="16" cy="9" r="1"></circle>
                                    <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Cookies</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Utilizamos cookies para mejorar su experiencia, analizar el uso del sitio y personalizar el
                        contenido.
                    </p>
                </div>

                <!-- Tarjeta 4: Seguridad -->
                <div
                    class="group card-hover-effect bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="flex items-center mb-4">
                        <div class="relative mr-4">
                            <div
                                class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-8 h-8 text-white">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Seguridad</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Implementamos medidas de seguridad para proteger su información personal contra acceso no
                        autorizado.
                    </p>
                </div>

                <!-- Tarjeta 5: Sus Derechos -->
                <div
                    class="group card-hover-effect bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="flex items-center mb-4">
                        <div class="relative mr-4">
                            <div
                                class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-8 h-8 text-white">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Sus Derechos</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Usted tiene derecho a acceder, corregir, eliminar y limitar el procesamiento de sus datos
                        personales.
                    </p>
                </div>

                <!-- Tarjeta 6: Cambios en la Política -->
                <div
                    class="group card-hover-effect bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="flex items-center mb-4">
                        <div class="relative mr-4">
                            <div
                                class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-8 h-8 text-white">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Cambios en la Política</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Podemos actualizar esta política periódicamente. Le notificaremos sobre cambios significativos.
                    </p>
                </div>
            </div>

            <!-- Sección de Contacto -->
            <div class="mt-12 p-6 bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-600"
                data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-4">
                    <div class="relative mr-4">
                        <div
                            class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <div
                            class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3
                        class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                        Contáctenos</h3>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Si tiene preguntas sobre esta Política de Privacidad, por favor contáctenos en:
                </p>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2 text-blue-500">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <a href="mailto:privacy@softlinkia.com" class="text-blue-500 hover:underline">privacy@softlinkia.com</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-hover-effect {
            transition: all 0.3s ease;
        }

        .card-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
@endsection