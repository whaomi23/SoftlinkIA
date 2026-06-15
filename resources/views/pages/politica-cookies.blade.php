@extends('layouts.app')

@section('title', 'Política de Cookies - SoftLinkIA')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('/background-images-pages/home-background.jpg');"></div>
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Fondo con gradiente -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-green-900/50 to-teal-900/60"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-teal-900/30 via-transparent to-green-500/20"></div>

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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-green-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <!-- Contenido principal -->
        <div class="relative z-40 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- Header -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-white via-green-200 to-teal-300 bg-clip-text text-transparent animate-gradient-x">
                        Política de
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-green-400 via-teal-500 to-cyan-600 bg-clip-text text-transparent animate-gradient-x">
                        Cookies
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-slate-200 max-w-3xl mx-auto leading-relaxed">
                    Información sobre cómo utilizamos las cookies y tecnologías similares en nuestro sitio web.
                </p>
            </div>

            <!-- Contenido con scrollbar personalizado -->
            <div class="glass-effect-enhanced rounded-3xl p-8 md:p-12 mx-auto floating-card" data-aos="fade-up" data-aos-delay="200">
                <div class="custom-scrollbar max-h-[70vh] overflow-y-auto pr-4">
                    <div class="space-y-8 text-slate-200">
                        <!-- Sección 1 -->
                        <div class="border-l-4 border-green-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent">
                                1. ¿Qué son las Cookies?
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas nuestro sitio web. Estas nos ayudan a mejorar tu experiencia de navegación y a proporcionar servicios personalizados.
                            </p>
                        </div>

                        <!-- Sección 2 -->
                        <div class="border-l-4 border-teal-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-teal-400 to-cyan-400 bg-clip-text text-transparent">
                                2. Tipos de Cookies que Utilizamos
                            </h2>
                            <div class="space-y-4">
                                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700">
                                    <h3 class="text-lg font-semibold text-green-400 mb-2">Cookies Esenciales</h3>
                                    <p class="text-sm">Necesarias para el funcionamiento básico del sitio web. No se pueden desactivar.</p>
                                </div>
                                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700">
                                    <h3 class="text-lg font-semibold text-teal-400 mb-2">Cookies de Rendimiento</h3>
                                    <p class="text-sm">Nos ayudan a entender cómo los visitantes interactúan con nuestro sitio web.</p>
                                </div>
                                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700">
                                    <h3 class="text-lg font-semibold text-cyan-400 mb-2">Cookies de Funcionalidad</h3>
                                    <p class="text-sm">Permiten que el sitio web recuerde las elecciones que haces para mejorar tu experiencia.</p>
                                </div>
                                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700">
                                    <h3 class="text-lg font-semibold text-blue-400 mb-2">Cookies de Marketing</h3>
                                    <p class="text-sm">Utilizadas para mostrar anuncios relevantes y medir la efectividad de nuestras campañas.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 3 -->
                        <div class="border-l-4 border-cyan-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                                3. Cookies de Terceros
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Utilizamos servicios de terceros que pueden establecer sus propias cookies:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li><strong>Google Analytics:</strong> Para analizar el tráfico del sitio web</li>
                                <li><strong>Google Fonts:</strong> Para cargar fuentes personalizadas</li>
                                <li><strong>Redes Sociales:</strong> Para integrar contenido de redes sociales</li>
                                <li><strong>Servicios de Chat:</strong> Para proporcionar soporte en línea</li>
                            </ul>
                        </div>

                        <!-- Sección 4 -->
                        <div class="border-l-4 border-blue-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                                4. Gestión de Cookies
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Puedes gestionar tus preferencias de cookies de las siguientes maneras:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>A través de la configuración de tu navegador</li>
                                <li>Utilizando nuestro panel de preferencias de cookies</li>
                                <li>Desactivando cookies específicas en los sitios de terceros</li>
                            </ul>
                            <div class="bg-yellow-900/20 border border-yellow-600/30 rounded-xl p-4 mt-4">
                                <p class="text-yellow-200 text-sm">
                                    <strong>Nota:</strong> Desactivar ciertas cookies puede afectar la funcionalidad del sitio web.
                                </p>
                            </div>
                        </div>

                        <!-- Sección 5 -->
                        <div class="border-l-4 border-purple-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                                5. Configuración del Navegador
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Instrucciones para gestionar cookies en los navegadores más comunes:
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700">
                                    <h3 class="text-lg font-semibold text-purple-400 mb-2">Chrome</h3>
                                    <p class="text-sm">Configuración → Privacidad y seguridad → Cookies</p>
                                </div>
                                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700">
                                    <h3 class="text-lg font-semibold text-blue-400 mb-2">Firefox</h3>
                                    <p class="text-sm">Opciones → Privacidad y seguridad → Cookies</p>
                                </div>
                                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700">
                                    <h3 class="text-lg font-semibold text-green-400 mb-2">Safari</h3>
                                    <p class="text-sm">Preferencias → Privacidad → Cookies</p>
                                </div>
                                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700">
                                    <h3 class="text-lg font-semibold text-cyan-400 mb-2">Edge</h3>
                                    <p class="text-sm">Configuración → Privacidad → Cookies</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 6 -->
                        <div class="border-l-4 border-pink-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-pink-400 to-red-400 bg-clip-text text-transparent">
                                6. Actualizaciones de la Política
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Podemos actualizar esta Política de Cookies ocasionalmente para reflejar cambios en nuestras prácticas o por otros motivos operativos, legales o regulatorios.
                            </p>
                        </div>

                        <!-- Sección 7 -->
                        <div class="border-l-4 border-red-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-red-400 to-orange-400 bg-clip-text text-transparent">
                                7. Contacto
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Si tienes preguntas sobre nuestra Política de Cookies, puedes contactarnos:
                            </p>
                            <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700">
                                <p class="mb-2"><strong class="text-green-400">Email:</strong> cookies@softlinkia.com</p>
                                <p class="mb-2"><strong class="text-green-400">Teléfono:</strong> +52 55 2261 4633</p>
                                <p><strong class="text-green-400">Dirección:</strong> Ciudad de México, México</p>
                            </div>
                        </div>

                        <!-- Fecha de actualización -->
                        <div class="text-center pt-8 border-t border-slate-700">
                            <p class="text-slate-400">
                                <strong>Última actualización:</strong> {{ date('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón de regreso -->
            <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('home') }}"
                   class="neon-button-secondary group relative overflow-hidden border-3 border-green-400 text-green-400 px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-green-500/20 hover:to-teal-500/20">
                    <span class="material-icons mr-2">arrow_back</span>
                    Volver al Inicio
                </a>
            </div>
        </div>
    </section>

    <!-- Estilos personalizados para scrollbar -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(51, 65, 85, 0.3);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #10b981, #06b6d4);
            border-radius: 10px;
            border: 2px solid rgba(51, 65, 85, 0.3);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #059669, #0891b2);
        }

        /* Firefox */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #10b981 rgba(51, 65, 85, 0.3);
        }
    </style>
@endsection