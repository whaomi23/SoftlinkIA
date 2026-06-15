@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Política de Cookies</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300">Última actualización: {{ date('d/m/Y') }}</p>
        </div>

        <div
            class="max-w-4xl mx-auto bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-xl shadow-lg p-8 mb-12 border border-gray-200 dark:border-gray-700">
            <p class="text-gray-700 dark:text-gray-300 mb-8 leading-relaxed">
                Esta Política de Cookies explica cómo SoftlinkIA utiliza cookies y tecnologías similares para reconocerlo
                cuando visita nuestro sitio web. Explica qué son estas tecnologías y por qué las usamos, así como sus
                derechos para controlarlas.
            </p>

            <div class="grid md:grid-cols-2 gap-8 mt-8" data-aos="fade-up" data-aos-delay="100">
                <!-- Tarjeta 1: Cookies Esenciales -->
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
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line>
                                    <line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line>
                                    <line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line>
                                    <line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line>
                                    <line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Cookies Esenciales</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Estas cookies son necesarias para el funcionamiento del sitio web y no pueden ser desactivadas en
                        nuestros sistemas.
                    </p>
                </div>

                <!-- Tarjeta 2: Cookies Analíticas -->
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
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Cookies Analíticas</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Nos permiten contar visitas y fuentes de tráfico para medir y mejorar el rendimiento de nuestro
                        sitio.
                    </p>
                </div>

                <!-- Tarjeta 3: Cookies de Funcionalidad -->
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
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                    <path d="M2 17l10 5 10-5"></path>
                                    <path d="M2 12l10 5 10-5"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Cookies de Funcionalidad</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Permiten que el sitio proporcione una funcionalidad y personalización mejoradas recordando sus
                        preferencias.
                    </p>
                </div>

                <!-- Tarjeta 4: Cookies de Publicidad -->
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
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Cookies de Publicidad</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Pueden ser establecidas por nosotros o nuestros socios publicitarios para crear un perfil de sus
                        intereses y mostrarle anuncios relevantes.
                    </p>
                </div>

                <!-- Tarjeta 5: Gestión de Cookies -->
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
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Gestión de Cookies</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Puede configurar su navegador para rechazar todas las cookies o para indicar cuándo se está enviando
                        una cookie.
                    </p>
                </div>

                <!-- Tarjeta 6: Actualizaciones -->
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
                                    <path
                                        d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                    </path>
                                    <circle cx="12" cy="13" r="4"></circle>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Actualizaciones</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Podemos actualizar esta Política de Cookies periódicamente para reflejar cambios en nuestras
                        prácticas o por otras razones operativas, legales o regulatorias.
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
                    Si tiene preguntas sobre nuestra Política de Cookies, por favor contáctenos en:
                </p>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2 text-blue-500">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <a href="mailto:cookies@softlinkia.com" class="text-blue-500 hover:underline">cookies@softlinkia.com</a>
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