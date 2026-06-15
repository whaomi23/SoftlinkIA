<!-- Hero Section Moderno -->
<section class="relative bg-[#018BB0] overflow-hidden min-h-screen flex items-center">
    <!-- Elementos decorativos de fondo -->
    <div class="absolute inset-0">
        <!-- Pincel en posición superior izquierda (más abajo) -->
        <div class="hidden md:block scroll-ornament" data-direction="right" data-distance="260" style="position: absolute; top: 80px; left: 16px; width: 400px; height: 400px; opacity: 0.9; transform: rotate(12deg); z-index: 0; will-change: transform, opacity;">
            <img src="/kibbi-images/pincel.png" alt="Pincel" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        
        <!-- Sombrero de graduación en posición inferior derecha (más arriba) -->
        <div class="hidden md:block scroll-ornament" data-direction="left" data-distance="260" style="position: absolute; bottom: 80px; right: 16px; width: 400px; height: 400px; opacity: 0.9; transform: rotate(-12deg); z-index: 0; will-change: transform, opacity;">
            <img src="/kibbi-images/sombrero.png" alt="Sombrero de graduación" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center z-10">
        <!-- Contenido Principal -->
        <div class="space-y-8 max-w-6xl mx-auto">
            <!-- Título Principal -->
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight" style="font-family: 'Piala', sans-serif; font-style: normal;">
                La plataforma que moderniza la gestión escolar y transforma el aprendizaje
            </h1>

            <!-- Subtítulo -->
            <div class="text-xl sm:text-2xl text-white space-y-2 opacity-90" style="font-family: 'Piala', sans-serif; font-style: italic;">
                <p>Descubre cómo KIBI revoluciona la educación con tecnología de vanguardia</p>
            </div>

            <!-- Botón CTA Principal -->
            <div class="pt-8">
                <button onclick="openContactModal(); return false;" class="inline-flex items-center space-x-3 px-12 py-6 bg-yellow-400 hover:bg-yellow-300 text-[#3f9872] rounded-xl hover:rounded-2xl transition-all duration-300 text-xl font-bold shadow-2xl hover:shadow-3xl transform hover:scale-105 hover:-translate-y-1 group" style="font-family: 'Piala', sans-serif;">
                    <span class="transition-transform duration-300 group-hover:scale-105 text-white">QUIERO UNA DEMO</span>
                    <svg class="w-6 h-6 transition-transform duration-300 group-hover:translate-x-1 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
