@extends('layouts.app')

@section('title', 'Política de Privacidad - SoftLinkIA')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('/background-images-pages/home-background.jpg');"></div>
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Fondo con gradiente -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-blue-900/50 to-cyan-900/60"></div>
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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <!-- Contenido principal -->
        <div class="relative z-40 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- Header -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                        Política de
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent animate-gradient-x">
                        Privacidad
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-slate-200 max-w-3xl mx-auto leading-relaxed">
                    Tu privacidad es importante para nosotros. Conoce cómo protegemos y manejamos tu información personal.
                </p>
            </div>

            <!-- Contenido con scrollbar personalizado -->
            <div class="glass-effect-enhanced rounded-3xl p-8 md:p-12 mx-auto floating-card" data-aos="fade-up" data-aos-delay="200">
                <div class="custom-scrollbar max-h-[70vh] overflow-y-auto pr-4">
                    <div class="space-y-8 text-slate-200">
                        <!-- Sección 1 -->
                        <div class="border-l-4 border-cyan-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                                1. Información que Recopilamos
                            </h2>
                            <p class="leading-relaxed mb-4">
                                En SoftLinkIA, recopilamos información que nos proporcionas directamente cuando utilizas nuestros servicios, incluyendo:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>Información de contacto (nombre, email, teléfono)</li>
                                <li>Información de la empresa y proyecto</li>
                                <li>Datos de navegación y uso del sitio web</li>
                                <li>Información técnica del dispositivo y navegador</li>
                            </ul>
                        </div>

                        <!-- Sección 2 -->
                        <div class="border-l-4 border-purple-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                                2. Cómo Utilizamos tu Información
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Utilizamos la información recopilada para los siguientes propósitos:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>Proporcionar y mejorar nuestros servicios</li>
                                <li>Comunicarnos contigo sobre proyectos y servicios</li>
                                <li>Personalizar tu experiencia en nuestro sitio web</li>
                                <li>Cumplir con obligaciones legales y contractuales</li>
                                <li>Realizar análisis y mejoras de nuestros servicios</li>
                            </ul>
                        </div>

                        <!-- Sección 3 -->
                        <div class="border-l-4 border-green-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent">
                                3. Protección de Datos
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Implementamos medidas de seguridad técnicas y organizativas para proteger tu información personal:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>Cifrado SSL/TLS para todas las transmisiones de datos</li>
                                <li>Acceso restringido a información personal</li>
                                <li>Auditorías regulares de seguridad</li>
                                <li>Cumplimiento con estándares internacionales de seguridad</li>
                            </ul>
                        </div>

                        <!-- Sección 4 -->
                        <div class="border-l-4 border-yellow-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent">
                                4. Compartir Información
                            </h2>
                            <p class="leading-relaxed mb-4">
                                No vendemos, alquilamos ni compartimos tu información personal con terceros, excepto en los siguientes casos:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>Con tu consentimiento explícito</li>
                                <li>Para cumplir con obligaciones legales</li>
                                <li>Con proveedores de servicios que nos ayudan a operar nuestro negocio</li>
                                <li>En caso de fusión, adquisición o venta de activos</li>
                            </ul>
                        </div>

                        <!-- Sección 5 -->
                        <div class="border-l-4 border-red-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-red-400 to-pink-400 bg-clip-text text-transparent">
                                5. Tus Derechos
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Tienes los siguientes derechos respecto a tu información personal:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>Acceso: Solicitar una copia de tu información personal</li>
                                <li>Rectificación: Corregir información inexacta o incompleta</li>
                                <li>Eliminación: Solicitar la eliminación de tu información</li>
                                <li>Portabilidad: Recibir tu información en un formato estructurado</li>
                                <li>Oposición: Oponerte al procesamiento de tu información</li>
                            </ul>
                        </div>

                        <!-- Sección 6 -->
                        <div class="border-l-4 border-indigo-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                                6. Cookies y Tecnologías Similares
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Utilizamos cookies y tecnologías similares para mejorar tu experiencia en nuestro sitio web. Puedes gestionar tus preferencias de cookies en cualquier momento a través de la configuración de tu navegador.
                            </p>
                        </div>

                        <!-- Sección 7 -->
                        <div class="border-l-4 border-teal-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-teal-400 to-cyan-400 bg-clip-text text-transparent">
                                7. Contacto
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Si tienes preguntas sobre esta Política de Privacidad o deseas ejercer tus derechos, puedes contactarnos:
                            </p>
                            <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700">
                                <p class="mb-2"><strong class="text-cyan-400">Email:</strong> privacidad@softlinkia.com</p>
                                <p class="mb-2"><strong class="text-cyan-400">Teléfono:</strong> +52 55 2261 4633</p>
                                <p><strong class="text-cyan-400">Dirección:</strong> Ciudad de México, México</p>
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
                   class="neon-button-secondary group relative overflow-hidden border-3 border-cyan-400 text-cyan-400 px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-cyan-500/20 hover:to-blue-500/20">
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
            background: linear-gradient(45deg, #06b6d4, #3b82f6);
            border-radius: 10px;
            border: 2px solid rgba(51, 65, 85, 0.3);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #0891b2, #2563eb);
        }

        /* Firefox */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #06b6d4 rgba(51, 65, 85, 0.3);
        }
    </style>
@endsection