@extends('layouts.app')

@section('title', 'Términos de Servicio - SoftLinkIA')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('/background-images-pages/home-background.jpg');"></div>
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Fondo con gradiente -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/70 via-purple-900/50 to-blue-900/60"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-900/30 via-transparent to-purple-500/20"></div>

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
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <!-- Contenido principal -->
        <div class="relative z-40 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- Header -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-white via-purple-200 to-blue-300 bg-clip-text text-transparent animate-gradient-x">
                        Términos de
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-purple-400 via-blue-500 to-cyan-600 bg-clip-text text-transparent animate-gradient-x">
                        Servicio
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-slate-200 max-w-3xl mx-auto leading-relaxed">
                    Conoce los términos y condiciones que rigen el uso de nuestros servicios y plataforma.
                </p>
            </div>

            <!-- Contenido con scrollbar personalizado -->
            <div class="glass-effect-enhanced rounded-3xl p-8 md:p-12 mx-auto floating-card" data-aos="fade-up" data-aos-delay="200">
                <div class="custom-scrollbar max-h-[70vh] overflow-y-auto pr-4">
                    <div class="space-y-8 text-slate-200">
                        <!-- Sección 1 -->
                        <div class="border-l-4 border-purple-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                                1. Aceptación de los Términos
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Al acceder y utilizar los servicios de SoftLinkIA, aceptas estar sujeto a estos Términos de Servicio y todas las leyes y regulaciones aplicables. Si no estás de acuerdo con alguno de estos términos, no debes utilizar nuestros servicios.
                            </p>
                        </div>

                        <!-- Sección 2 -->
                        <div class="border-l-4 border-blue-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                                2. Descripción de Servicios
                            </h2>
                            <p class="leading-relaxed mb-4">
                                SoftLinkIA proporciona servicios de desarrollo de software, consultoría en tecnología, inteligencia artificial y soluciones digitales. Nuestros servicios incluyen pero no se limitan a:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>Desarrollo de aplicaciones web y móviles</li>
                                <li>Consultoría en transformación digital</li>
                                <li>Implementación de soluciones de IA</li>
                                <li>Servicios de ciberseguridad</li>
                                <li>Migración a la nube</li>
                            </ul>
                        </div>

                        <!-- Sección 3 -->
                        <div class="border-l-4 border-cyan-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-cyan-400 to-teal-400 bg-clip-text text-transparent">
                                3. Responsabilidades del Usuario
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Como usuario de nuestros servicios, te comprometes a:
                            </p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>Proporcionar información precisa y actualizada</li>
                                <li>Mantener la confidencialidad de tus credenciales de acceso</li>
                                <li>No utilizar nuestros servicios para actividades ilegales</li>
                                <li>Respetar los derechos de propiedad intelectual</li>
                                <li>Cumplir con todas las leyes y regulaciones aplicables</li>
                            </ul>
                        </div>

                        <!-- Sección 4 -->
                        <div class="border-l-4 border-green-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent">
                                4. Propiedad Intelectual
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Todos los derechos de propiedad intelectual relacionados con nuestros servicios, incluyendo pero no limitado a software, diseños, contenido y marcas comerciales, son propiedad de SoftLinkIA o sus licenciantes.
                            </p>
                            <p class="leading-relaxed">
                                Los desarrollos personalizados realizados para clientes específicos seguirán los términos acordados en el contrato correspondiente.
                            </p>
                        </div>

                        <!-- Sección 5 -->
                        <div class="border-l-4 border-yellow-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent">
                                5. Limitación de Responsabilidad
                            </h2>
                            <p class="leading-relaxed mb-4">
                                SoftLinkIA no será responsable por daños indirectos, incidentales, especiales o consecuentes que resulten del uso o la imposibilidad de usar nuestros servicios, incluso si hemos sido advertidos de la posibilidad de tales daños.
                            </p>
                        </div>

                        <!-- Sección 6 -->
                        <div class="border-l-4 border-red-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-red-400 to-pink-400 bg-clip-text text-transparent">
                                6. Terminación
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Podemos terminar o suspender tu acceso a nuestros servicios inmediatamente, sin previo aviso, por cualquier motivo, incluyendo pero no limitado al incumplimiento de estos Términos de Servicio.
                            </p>
                        </div>

                        <!-- Sección 7 -->
                        <div class="border-l-4 border-indigo-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                                7. Modificaciones
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Nos reservamos el derecho de modificar estos términos en cualquier momento. Las modificaciones entrarán en vigor inmediatamente después de su publicación en nuestro sitio web.
                            </p>
                        </div>

                        <!-- Sección 8 -->
                        <div class="border-l-4 border-teal-400 pl-6">
                            <h2 class="text-2xl font-bold text-white mb-4 bg-gradient-to-r from-teal-400 to-cyan-400 bg-clip-text text-transparent">
                                8. Contacto
                            </h2>
                            <p class="leading-relaxed mb-4">
                                Si tienes preguntas sobre estos Términos de Servicio, puedes contactarnos:
                            </p>
                            <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700">
                                <p class="mb-2"><strong class="text-purple-400">Email:</strong> legal@softlinkia.com</p>
                                <p class="mb-2"><strong class="text-purple-400">Teléfono:</strong> +52 55 2261 4633</p>
                                <p><strong class="text-purple-400">Dirección:</strong> Ciudad de México, México</p>
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
                   class="neon-button-secondary group relative overflow-hidden border-3 border-purple-400 text-purple-400 px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-700 transform hover:scale-110 inline-flex items-center justify-center backdrop-blur-sm bg-slate-900/30 hover:bg-gradient-to-r hover:from-purple-500/20 hover:to-blue-500/20">
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
            background: linear-gradient(45deg, #8b5cf6, #3b82f6);
            border-radius: 10px;
            border: 2px solid rgba(51, 65, 85, 0.3);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #7c3aed, #2563eb);
        }

        /* Firefox */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #8b5cf6 rgba(51, 65, 85, 0.3);
        }
    </style>
@endsection