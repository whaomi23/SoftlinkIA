<!-- Sección de Características Administrativas -->
<section class="relative py-20 overflow-hidden">
    <style>
        @keyframes tileFloat {
            0%, 100% { transform: translateY(0) rotate(-1deg); }
            50% { transform: translateY(-14px) rotate(1deg); }
        }
        @keyframes tileGlow {
            0%, 100% { box-shadow: 0 18px 50px rgba(0,0,0,0.20); }
            50% { box-shadow: 0 32px 80px rgba(0,0,0,0.30); }
        }
        .feature-hero-card {
            animation: tileFloat 5.5s ease-in-out infinite, tileGlow 5.5s ease-in-out infinite;
            will-change: transform, box-shadow;
            transition: transform .35s ease;
        }
        .feature-hero-card:hover { transform: translateY(-8px) scale(1.03); }
    </style>
    <!-- Fondo sólido -->
    <div class="absolute inset-0 bg-[#70a241]"></div>
    
    <!-- Elementos decorativos de fondo -->
    <div class="absolute inset-0">
        <!-- Estrellas en las esquinas -->
        <div class="absolute top-0 left-0 w-40 h-40 opacity-20">
            <img src="/kibbi-images/estrellas.png" alt="Estrellas" class="w-full h-full object-contain">
        </div>
        <div class="absolute top-0 right-0 w-40 h-40 opacity-20">
            <img src="/kibbi-images/estrellas.png" alt="Estrellas" class="w-full h-full object-contain">
        </div>
        <div class="absolute bottom-0 left-0 w-40 h-40 opacity-20">
            <img src="/kibbi-images/estrellas.png" alt="Estrellas" class="w-full h-full object-contain">
        </div>
        <div class="absolute bottom-0 right-0 w-40 h-40 opacity-20">
            <img src="/kibbi-images/estrellas.png" alt="Estrellas" class="w-full h-full object-contain">
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Título principal con imagen -->
        <div class="text-center mb-16">
            <div class="relative inline-block">
                <!-- Fondo amarillo redondeado -->
                <div class="absolute inset-0 bg-yellow-400 rounded-2xl transform rotate-2"></div>
                
                <!-- Contenedor del contenido -->
                <div class="relative bg-yellow-400 rounded-2xl p-8 transform -rotate-1 feature-hero-card w-80 h-64 md:w-96 md:h-72 mx-auto flex flex-col items-center justify-center">
                    <!-- Imagen de libros con sombrero -->
                    <div class="mb-6">
                        <div class="w-32 h-32 mx-auto">
                            <img src="/kibbi-images/libros2.png" alt="Libros con sombrero de graduación" class="w-full h-full object-contain">
                        </div>
                    </div>
                    
                    <!-- Texto ADMINISTRATIVAS -->
                    <h5 class="text-3xl lg:text-4xl font-bold text-white uppercase text-center" style="font-family: 'Piala', sans-serif; font-style: italic;">
                        ADMINISTRATIVAS
                    </h5>
                </div>
            </div>
        </div>

        <!-- Características administrativas -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Gestión de pagos -->
            <div class="text-center group">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-full h-full text-white group-hover:text-yellow-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h6 class="text-lg font-semibold text-white mb-2" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    Gestión de pagos
                </h6>
            </div>

            <!-- Módulo de comunicación -->
            <div class="text-center group">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-full h-full text-white group-hover:text-yellow-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 9h6m-6 4h6m-6 4h4"></path>
                    </svg>
                </div>
                <h6 class="text-lg font-semibold text-white mb-2" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    Módulo de comunicación
                </h6>
            </div>

            <!-- Gestión académica -->
            <div class="text-center group">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-full h-full text-white group-hover:text-yellow-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zM12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    </svg>
                </div>
                <h6 class="text-lg font-semibold text-white mb-2" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    Gestión académica
                </h6>
            </div>

            <!-- Gestión de indicadores -->
            <div class="text-center group">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-full h-full text-white group-hover:text-yellow-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h6 class="text-lg font-semibold text-white mb-2" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    Gestión de indicadores
                </h6>
            </div>
        </div>
    </div>
</section>
