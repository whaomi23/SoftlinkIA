@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Términos de Servicio</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300">Última actualización: {{ date('d/m/Y') }}</p>
        </div>

        <div
            class="max-w-4xl mx-auto bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-xl shadow-lg p-8 mb-12 border border-gray-200 dark:border-gray-700">
            <p class="text-gray-700 dark:text-gray-300 mb-8 leading-relaxed">
                Bienvenido a SoftlinkIA. Al acceder o utilizar nuestros servicios, usted acepta estar sujeto a estos
                términos de servicio. Por favor, léalos cuidadosamente.
            </p>

            <div class="grid md:grid-cols-2 gap-8 mt-8" data-aos="fade-up" data-aos-delay="100">
                <!-- Tarjeta 1: Cuenta de Usuario -->
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
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Cuenta de Usuario</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Usted es responsable de mantener la confidencialidad de su cuenta y contraseña, y de restringir el
                        acceso a su computadora.
                    </p>
                </div>

                <!-- Tarjeta 2: Conducta Prohibida -->
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
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12" y2="16"></line>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Conducta Prohibida</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        No debe utilizar nuestros servicios para actividades ilegales o transmitir contenido dañino o
                        abusivo.
                    </p>
                </div>

                <!-- Tarjeta 3: Propiedad Intelectual -->
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
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Propiedad Intelectual</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Todo el contenido y servicios proporcionados están protegidos por derechos de autor, marcas
                        comerciales y otras leyes.
                    </p>
                </div>

                <!-- Tarjeta 4: Limitación de Responsabilidad -->
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
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Limitación de Responsabilidad</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        No seremos responsables por daños indirectos, incidentales, especiales o consecuentes que resulten
                        del uso de nuestros servicios.
                    </p>
                </div>

                <!-- Tarjeta 5: Modificaciones -->
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
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Modificaciones</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Nos reservamos el derecho de modificar estos términos en cualquier momento. Las modificaciones
                        entrarán en vigor inmediatamente después de su publicación.
                    </p>
                </div>

                <!-- Tarjeta 6: Ley Aplicable -->
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
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500">
                            Ley Aplicable</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Estos términos se regirán e interpretarán de acuerdo con las leyes del país donde operamos, sin
                        tener en cuenta sus disposiciones sobre conflictos de leyes.
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
                    Si tiene preguntas sobre estos Términos de Servicio, por favor contáctenos en:
                </p>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2 text-blue-500">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <a href="mailto:legal@softlinkia.com" class="text-blue-500 hover:underline">legal@softlinkia.com</a>
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