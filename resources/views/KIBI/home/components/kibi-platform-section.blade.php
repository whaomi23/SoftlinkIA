<!-- Sección Plataforma KIBI -->
<section class="relative bg-[#018BB0] overflow-hidden py-20">
    <style>
        @keyframes kibiFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-18px) rotate(3deg); }
        }
        @keyframes kibiGlow {
            0%, 100% { box-shadow: 0 30px 80px rgba(0,0,0,0.18); }
            50% { box-shadow: 0 50px 120px rgba(0,0,0,0.32); }
        }
        .kibi-hero-card {
            animation: kibiFloat 5s ease-in-out infinite, kibiGlow 5s ease-in-out infinite;
            will-change: transform, box-shadow;
            transition: transform .4s ease;
        }
        .kibi-hero-card:hover {
            transform: translateY(-10px) scale(1.04);
        }
    </style>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Imagen KIBI -->
            <div class="relative order-2 lg:order-1">
                <div class="relative">
                    <!-- Imagen principal K.png -->
                    <div class="relative w-full h-96 lg:h-[500px] kibi-hero-card rounded-3xl">
                        <img src="/kibbi-images/K.png" alt="KIBI Platform" class="w-full h-full object-contain">
                    </div>

                    <!-- Elementos decorativos de fondo -->
                    <div class="absolute inset-0">
                        <!-- Forma abstracta blanca detrás de la imagen -->
                        <div class="absolute top-0 left-0 w-full h-full bg-white bg-opacity-10 rounded-3xl transform rotate-3"></div>
                        <div class="absolute top-2 left-2 w-full h-full bg-white bg-opacity-5 rounded-3xl transform rotate-6"></div>
                    </div>
                </div>
            </div>

            <!-- Contenido de texto -->
            <div class="order-1 lg:order-2 space-y-8">
                <!-- Título principal -->
                <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight" style="font-family: 'Piala', sans-serif; font-style: normal;">
                    KIBI es la plataforma que está revolucionando la gestión escolar en instituciones privadas de educación básica.
                </h2>

                <!-- Párrafos descriptivos -->
                <div class="space-y-6 text-lg text-white opacity-90" style="font-family: 'Piala', sans-serif; font-style: italic;">
                    <p>
                        Con un sistema integral, fácil de usar y totalmente digital, KIBI transforma la manera en que las escuelas organizan, enseñan y se comunican.
                    </p>

                    <p>
                        Convierte tu escuela en un entorno más eficiente, conectado y enfocado en lo que realmente importa: el desarrollo de cada estudiante.
                    </p>

                    <p>
                        Con KIBI, tu institución gana control, simplicidad y resultados, fortaleciendo el trabajo de directivos, docentes y la relación con las familias.
                    </p>
                </div>

                <!-- Botón CTA -->
                <div class="pt-6">
                    <button class="inline-flex items-center space-x-3 px-8 py-4 bg-yellow-400 hover:bg-yellow-300 text-white rounded-xl hover:rounded-2xl transition-all text-lg font-bold shadow-2xl hover:shadow-3xl transform hover:scale-105" style="font-family: 'Piala', sans-serif; font-style: italic;">
                        <span>CONOCE MÁS SOBRE KIBI</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Elementos decorativos adicionales -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Formas abstractas flotantes -->
        <div class="absolute top-20 right-20 w-32 h-32 bg-white bg-opacity-5 rounded-full"></div>
        <div class="absolute bottom-20 left-20 w-24 h-24 bg-white bg-opacity-10 rounded-full"></div>
        <div class="absolute top-1/2 right-10 w-16 h-16 bg-white bg-opacity-5 rounded-full"></div>
    </div>
</section>
