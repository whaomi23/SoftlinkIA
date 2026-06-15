<!-- Sección Multimedia -->
<section id="multimedia" class="relative overflow-hidden py-20" style="background: linear-gradient(to bottom, #018BB0 0%, #3f9872 50%, #70a241 100%);">
    <!-- Elementos decorativos de fondo -->
    <div class="absolute inset-0">
        <!-- Libro abierto -->
        <div class="absolute top-20 left-20 w-24 h-24 opacity-60">
            <img src="/kibbi-images/libro.png" alt="Libro" class="w-full h-full object-contain">
        </div>
        
        <!-- Lápiz -->
        <div class="absolute top-32 right-32 w-20 h-20 opacity-50 transform rotate-45">
            <img src="/kibbi-images/lapiz.png" alt="Lápiz" class="w-full h-full object-contain">
        </div>
        
        <!-- Mochila -->
        <div class="absolute bottom-20 left-32 w-28 h-28 opacity-70">
            <img src="/kibbi-images/mochila.png" alt="Mochila" class="w-full h-full object-contain">
        </div>
        
        <!-- Libros -->
        <div class="absolute bottom-32 right-20 w-22 h-22 opacity-60 transform -rotate-12">
            <img src="/kibbi-images/libros2.png" alt="Libros" class="w-full h-full object-contain">
        </div>
        
        <!-- Estrellas -->
        <div class="absolute top-1/3 right-1/4 w-16 h-16 opacity-40">
            <img src="/kibbi-images/estrellas.png" alt="Estrellas" class="w-full h-full object-contain">
        </div>
        
        <!-- Flecha hacia abajo -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 opacity-70">
            <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header de la sección -->
        <div class="text-center mb-16">
            <h2 class="text-5xl lg:text-6xl font-bold text-white mb-6" style="font-family: 'Piala', sans-serif; font-style: italic;">
                CONOCE KIBI
            </h2>
        </div>

        <!-- Contenedor del video -->
        <div class="relative">
            <!-- Contenedor principal del video -->
            <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl mx-auto">
                <!-- Navegación del carrusel -->
                <div class="flex border-b border-gray-200 bg-gradient-to-r from-slate-50 to-gray-50">
                    <button class="video-tab active flex-1 px-6 py-4 text-center font-medium text-slate-700 bg-white border-b-2 border-[#018BB0] transition-all hover:bg-gradient-to-r hover:from-[#018BB0] hover:to-[#006B8A] hover:text-white group" data-video="comercial">
                        <span class="flex items-center justify-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-[#018BB0] to-[#006B8A] rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="font-semibold text-base">Comercial Oficial</span>
                        </span>
                    </button>
                    <button class="video-tab flex-1 px-6 py-4 text-center font-medium text-slate-500 hover:text-slate-700 transition-all hover:bg-gradient-to-r hover:from-[#018BB0] hover:to-[#006B8A] hover:text-white group" data-video="accion">
                        <span class="flex items-center justify-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-[#018BB0] to-[#006B8A] rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <span class="font-semibold text-base">KIBI en Acción</span>
                        </span>
                    </button>
                    <button class="video-tab flex-1 px-6 py-4 text-center font-medium text-slate-500 hover:text-slate-700 transition-all hover:bg-gradient-to-r hover:from-[#018BB0] hover:to-[#006B8A] hover:text-white group" data-video="tutorial">
                        <span class="flex items-center justify-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-[#018BB0] to-[#006B8A] rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span class="font-semibold text-base">Tutorial</span>
                        </span>
                    </button>
                </div>

                <!-- Contenido de videos -->
                <div class="video-content">
                    <!-- Video 1: Comercial Oficial -->
                    <div class="video-panel active" id="comercial">
                        <div class="relative aspect-video bg-black rounded-lg overflow-hidden shadow-lg m-6">
                            <iframe
                                width="100%"
                                height="100%"
                                src="https://www.youtube.com/embed/CGoQiJ1hIeM?si=a9rN1C38541VWYXW&amp;start=1"
                                title="KIBI - Comercial Oficial"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-slate-800 mb-2" style="font-family: 'Piala', sans-serif; font-style: italic;">KIBI - Comercial Oficial</h3>
                            <p class="text-base text-slate-600 mb-4">
                                Descubre cómo KIBI revoluciona la inteligencia de negocios con tecnología de vanguardia.
                                Ve testimonios reales de nuestros clientes y conoce las capacidades de nuestra plataforma.
                            </p>
                        </div>
                    </div>

                    <!-- Video 2: KIBI en Acción -->
                    <div class="video-panel hidden" id="accion">
                        <div class="relative aspect-video bg-black rounded-lg overflow-hidden shadow-lg m-6">
                            <video
                                class="w-full h-full object-contain"
                                controls
                                preload="metadata"
                                poster="">
                                <source src="/video/KIBI en acción.mp4" type="video/mp4">
                                Tu navegador no soporta la reproducción de videos.
                            </video>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-slate-800 mb-2" style="font-family: 'Piala', sans-serif; font-style: italic;">KIBI en Acción</h3>
                            <p class="text-base text-slate-600 mb-4">
                                Ve cómo KIBI transforma la forma en que las empresas analizan sus datos y toman decisiones estratégicas.
                            </p>
                        </div>
                    </div>

                    <!-- Video 3: Tutorial -->
                    <div class="video-panel hidden" id="tutorial">
                        <div class="relative aspect-video bg-gradient-to-br from-[#018BB0] via-[#006B8A] to-[#018BB0] rounded-lg overflow-hidden shadow-lg m-6">
                            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                            <div class="relative h-full flex items-center justify-center">
                                <div class="text-center text-white">
                                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold mb-3" style="font-family: 'Piala', sans-serif; font-style: italic;">Tutorial Próximamente</h3>
                                    <p class="text-blue-100 mb-4 max-w-md mx-auto">Estamos preparando un tutorial completo y detallado para que puedas aprovechar al máximo todas las funcionalidades de KIBI</p>
                                    <div class="flex items-center justify-center space-x-2 text-sm">
                                        <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                                        <span>En desarrollo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-slate-800 mb-2" style="font-family: 'Piala', sans-serif; font-style: italic;">Tutorial: Primeros Pasos</h3>
                            <p class="text-base text-slate-600 mb-4">
                                Aprende a configurar tu primera dashboard en KIBI. Este tutorial te guiará paso a paso.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript para el carrusel -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = document.querySelectorAll('.video-tab');
                const panels = document.querySelectorAll('.video-panel');

                tabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        const targetVideo = this.getAttribute('data-video');

                        // Remover clases activas
                        tabs.forEach(t => {
                            t.classList.remove('active', 'border-[#018BB0]', 'text-slate-700');
                            t.classList.add('text-slate-500');
                        });

                        panels.forEach(p => {
                            p.classList.add('hidden');
                            p.classList.remove('active');
                        });

                        // Activar tab y panel seleccionados
                        this.classList.add('active', 'border-[#018BB0]', 'text-slate-700');
                        this.classList.remove('text-slate-500');

                        const targetPanel = document.getElementById(targetVideo);
                        if (targetPanel) {
                            targetPanel.classList.remove('hidden');
                            targetPanel.classList.add('active');
                        }
                    });
                });
            });
        </script>
    </div>
</section>
