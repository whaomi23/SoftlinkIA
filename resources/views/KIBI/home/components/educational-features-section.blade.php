<!-- Sección Funcionalidades Educativas -->
<section class="relative overflow-hidden py-20" style="background: #70a241;">
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
    
    <!-- Elementos decorativos de fondo -->
    <div class="absolute inset-0">
        <!-- Estrellas doradas -->
        <div class="absolute top-5 right-10 w-48 h-48 opacity-80">
            <img src="/kibbi-images/estrellas.png" alt="Estrellas" class="w-full h-full object-contain">
        </div>
        
        <div class="absolute bottom-10 left-5 w-44 h-44 opacity-70">
            <img src="/kibbi-images/estrellas.png" alt="Estrellas" class="w-full h-full object-contain">
        </div>
        
        <div class="absolute top-20 left-10 w-40 h-40 opacity-60">
            <img src="/kibbi-images/estrellas.png" alt="Estrellas" class="w-full h-full object-contain">
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Contenido principal -->
        <div class="text-center mb-16">
            <!-- Título principal -->
            <div class="space-y-4 mb-8 max-w-5xl mx-auto">
                <h2 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-white uppercase leading-tight" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    KIBI ES UNA PLATAFORMA MULTIFUNCIONAL
                </h2>
                <p class="text-2xl lg:text-3xl text-white uppercase mt-4" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    CON 2 GRANDES FUNCIONALIDADES:
                </p>
            </div>
        </div>

        <!-- Sección central con libro y bombilla -->
        <div class="flex justify-center mb-16">
            <div class="relative inline-block">
                <!-- Fondo azul redondeado -->
                <div class="absolute inset-0 bg-[#018BB0] rounded-2xl transform rotate-2"></div>
                
                <!-- Contenedor del contenido -->
                <div class="relative bg-[#018BB0] rounded-2xl p-8 transform -rotate-1 feature-hero-card w-80 h-64 md:w-96 md:h-72 flex flex-col items-center justify-center">
                    <!-- Imagen de bombilla -->
                    <div class="mb-6">
                        <div class="w-32 h-32 mx-auto">
                            <img src="/kibbi-images/focos.png" alt="Bombilla educativa" class="w-full h-full object-contain">
                        </div>
                    </div>
                    
                    <!-- Texto EDUCATIVAS -->
                    <h5 class="text-3xl lg:text-4xl font-bold text-white uppercase text-center" style="font-family: 'Piala', sans-serif; font-style: italic;">
                        EDUCATIVAS
                    </h5>
                </div>
            </div>
        </div>

        <!-- Características educativas -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Clases extracurriculares -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors ring-0 group-hover:bg-yellow-400/30 group-hover:ring-2 ring-yellow-300">
                    <svg class="w-10 h-10 text-white transition-colors group-hover:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <p class="text-white text-sm lg:text-base font-medium" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    Clases extracurriculares
                </p>
            </div>

            <!-- Material didáctico -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors ring-0 group-hover:bg-yellow-400/30 group-hover:ring-2 ring-yellow-300">
                    <svg class="w-10 h-10 text-white transition-colors group-hover:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <p class="text-white text-sm lg:text-base font-medium" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    Material didáctico e interactivo
                </p>
            </div>

            <!-- Libros y material digital -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors ring-0 group-hover:bg-yellow-400/30 group-hover:ring-2 ring-yellow-300">
                    <svg class="w-10 h-10 text-white transition-colors group-hover:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <p class="text-white text-sm lg:text-base font-medium" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    Libros y material digital
                </p>
            </div>

            <!-- Juegos educativos -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors ring-0 group-hover:bg-yellow-400/30 group-hover:ring-2 ring-yellow-300">
                    <svg class="w-10 h-10 text-white transition-colors group-hover:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m0 0V1a1 1 0 011-1h2a1 1 0 011 1v18a1 1 0 01-1 1H4a1 1 0 01-1-1V1a1 1 0 011-1h2a1 1 0 011 1v3m0 0h8m-8 0v16h8V4M9 8h2m-2 4h2m-2 4h2"></path>
                    </svg>
                </div>
                <p class="text-white text-sm lg:text-base font-medium" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    Juegos educativos
                </p>
            </div>
        </div>
    </div>
</section>
