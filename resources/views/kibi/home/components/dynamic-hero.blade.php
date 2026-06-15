<!-- Hero con Carrusel Dinámico -->
<section class="relative bg-gradient-to-br from-slate-50 to-gray-100 overflow-hidden">
    
    <!-- Estilos CSS para optimización móvil -->
    <style>
        /* Optimización de imágenes de fondo para móvil */
        #hero-carousel img {
            /* Asegurar que las imágenes se vean bien en móvil */
            min-height: 100vh;
            min-width: 100vw;
        }
        
        /* Media queries para diferentes dispositivos */
        @media (max-width: 639px) {
            #hero-carousel img {
                object-position: center 30% !important;
                object-fit: cover !important;
            }
            
            /* Ajustar altura mínima en móvil */
            .hero-section {
                min-height: 100vh;
            }
        }
        
        @media (min-width: 640px) and (max-width: 1023px) {
            #hero-carousel img {
                object-position: center 25% !important;
                object-fit: cover !important;
            }
        }
        
        @media (min-width: 1024px) {
            #hero-carousel img {
                object-position: center center !important;
                object-fit: cover !important;
            }
        }
        
        /* Mejorar la transición entre imágenes */
        #hero-carousel img {
            transition: opacity 1s ease-in-out, transform 0.3s ease-in-out;
        }
        
        /* Optimización para pantallas de alta densidad */
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            #hero-carousel img {
                image-rendering: -webkit-optimize-contrast;
                image-rendering: crisp-edges;
            }
        }
    </style>
    <!-- Carrusel de imágenes de fondo -->
    <div class="absolute inset-0">
        <div id="hero-carousel" class="relative w-full h-full hidden md:block">
            <!-- Las imágenes se cargarán dinámicamente -->
        </div>
        <!-- Fondo alternativo para móvil -->
        <div class="md:hidden absolute inset-0 bg-gradient-to-br from-[#018BB0] via-[#70a241] to-[#F4C336]"></div>
        <!-- Overlay responsivo para mejorar legibilidad del texto -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-black/30 to-black/40"></div>
    </div>

    <!-- Contenido principal -->
    <div class="hero-section relative max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-12 sm:py-16 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center min-h-[400px] sm:min-h-[500px] lg:min-h-[600px]">
            <!-- Contenido de texto -->
            <div class="space-y-6 sm:space-y-8 text-white order-2 lg:order-1">
                <!-- Badge -->
                <div class="inline-flex items-center space-x-2 px-3 sm:px-4 py-1.5 sm:py-2 bg-gradient-to-r from-kibi-primary to-kibi-secondary rounded-full text-xs sm:text-sm font-medium">
                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span>Nueva versión disponible</span>
                </div>

                <!-- Título principal -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold leading-tight">
                    Inteligencia de Negocios
                    <span class="bg-gradient-to-r from-kibi-highlight to-kibi-secondary bg-clip-text text-transparent">que transforma</span>
                    tus datos en decisiones
                </h1>

                <!-- Subtítulo -->
                <p class="text-base sm:text-lg lg:text-xl text-gray-200 max-w-lg">
                    Descubre el poder de KIBI: la plataforma más avanzada para análisis de datos empresariales.
                    Más de 500 empresas confían en nosotros para tomar decisiones inteligentes.
                </p>

                <!-- Botones CTA -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <button class="inline-flex items-center justify-center space-x-2 sm:space-x-3 px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-kibi-primary to-kibi-secondary text-white rounded-lg hover:from-kibi-secondary hover:to-kibi-highlight transition-all text-base sm:text-lg font-medium shadow-lg hover:shadow-xl">
                        <span>Comenzar Gratis</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                    <button class="inline-flex items-center justify-center space-x-2 sm:space-x-3 px-6 sm:px-8 py-3 sm:py-4 border-2 border-white text-white rounded-lg hover:bg-white hover:text-kibi-primary transition-all text-base sm:text-lg font-medium">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293H15M9 10V9a2 2 0 012-2h2a2 2 0 012 2v1M9 10v6a2 2 0 002 2h2a2 2 0 002-2v-6"></path>
                        </svg>
                        <span>Ver Demo</span>
                    </button>
                </div>

                <!-- Indicadores de confianza -->
                <div class="flex items-center justify-center sm:justify-start space-x-6 sm:space-x-8 pt-6 sm:pt-8">
                    <div class="text-center">
                        <div class="text-xl sm:text-2xl font-bold text-kibi-highlight">500+</div>
                        <div class="text-xs sm:text-sm text-gray-300">Empresas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-xl sm:text-2xl font-bold text-kibi-secondary">99.9%</div>
                        <div class="text-xs sm:text-sm text-gray-300">Uptime</div>
                    </div>
                    <div class="text-center">
                        <div class="text-xl sm:text-2xl font-bold text-kibi-primary">4.9★</div>
                        <div class="text-xs sm:text-sm text-gray-300">Rating</div>
                    </div>
                </div>
            </div>

            <!-- Video Comercial de KIBI -->
            <div class="relative order-1 lg:order-2">
                <!-- Contenedor del video -->
                <div class="relative bg-white rounded-xl sm:rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                    <!-- Header del video -->
                    <div class="flex items-center justify-between p-3 sm:p-4 bg-gradient-to-r from-kibi-primary to-kibi-secondary">
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            <div class="w-2 h-2 sm:w-3 sm:h-3 bg-white rounded-full"></div>
                            <div class="w-2 h-2 sm:w-3 sm:h-3 bg-white bg-opacity-60 rounded-full"></div>
                            <div class="w-2 h-2 sm:w-3 sm:h-3 bg-white bg-opacity-40 rounded-full"></div>
                        </div>
                        <div class="text-xs sm:text-sm text-white font-medium">KIBI Comercial Oficial</div>
                    </div>

                    <!-- Video iframe -->
                    <div class="relative">
                        <iframe
                            id="odysee-iframe"
                            style="width:100%; aspect-ratio:16 / 9;"
                            src="https://odysee.com/%24/embed/Comericial-M%3A7?r=7oSRpo2SkJdCqcpDhj6LztP9RKcN3BvX"
                            allowfullscreen
                            class="w-full">
                        </iframe>

                        <!-- Overlay con información del video -->
                        <div class="absolute top-2 sm:top-4 left-2 sm:left-4 bg-black bg-opacity-70 text-white px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium">
                            <span class="text-kibi-highlight">▶</span> Comercial Oficial
                        </div>
                    </div>

                    <!-- Información del video -->
                    <div class="p-4 sm:p-6">
                        <div class="flex items-start justify-between mb-3 sm:mb-4">
                            <div class="flex-1 pr-2">
                                <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-1 sm:mb-2">KIBI - Comercial Oficial</h3>
                                <p class="text-slate-600 text-xs sm:text-sm">
                                    Descubre cómo KIBI revoluciona la inteligencia de negocios con tecnología de vanguardia.
                                </p>
                            </div>

                            <!-- Botones de acción -->
                            <div class="flex space-x-1 sm:space-x-2">
                                <button class="p-1.5 sm:p-2 bg-gradient-to-r from-kibi-primary to-kibi-secondary text-white rounded-lg hover:from-kibi-secondary hover:to-kibi-highlight transition-all">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="p-1.5 sm:p-2 bg-slate-100 text-slate-600 rounded-lg hover:bg-slate-200 transition-colors">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-1 sm:gap-2 mb-3 sm:mb-4">
                            <span class="px-2 py-1 bg-gradient-to-r from-kibi-primary to-kibi-accent text-white text-xs rounded-full">#KIBI</span>
                            <span class="px-2 py-1 bg-gradient-to-r from-kibi-secondary to-kibi-highlight text-white text-xs rounded-full">#BI</span>
                            <span class="px-2 py-1 bg-gradient-to-r from-kibi-accent to-kibi-primary text-white text-xs rounded-full">#SoftLinkIA</span>
                        </div>

                        <!-- Métricas del video -->
                        <div class="grid grid-cols-3 gap-2 sm:gap-4">
                            <div class="text-center p-2 bg-white rounded-lg border-2 border-kibi-primary shadow-sm">
                                <div class="text-xs sm:text-sm font-bold text-kibi-primary">2:30</div>
                                <div class="text-xs text-slate-600">Duración</div>
                            </div>
                            <div class="text-center p-2 bg-white rounded-lg border-2 border-kibi-secondary shadow-sm">
                                <div class="text-xs sm:text-sm font-bold text-kibi-secondary">HD</div>
                                <div class="text-xs text-slate-600">Calidad</div>
                            </div>
                            <div class="text-center p-2 bg-white rounded-lg border-2 border-kibi-highlight shadow-sm">
                                <div class="text-xs sm:text-sm font-bold text-kibi-highlight">1.2K</div>
                                <div class="text-xs text-slate-600">Vistas</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Elementos flotantes -->
                <div class="absolute -top-2 sm:-top-4 -right-2 sm:-right-4 w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-kibi-highlight to-kibi-secondary rounded-full opacity-95 flex items-center justify-center shadow-lg">
                    <span class="text-white text-lg sm:text-xl drop-shadow-md">⭐</span>
                </div>
                <div class="absolute -bottom-2 sm:-bottom-4 -left-2 sm:-left-4 w-8 h-8 sm:w-12 sm:h-12 bg-gradient-to-br from-kibi-accent to-kibi-primary rounded-full opacity-90 flex items-center justify-center shadow-lg">
                    <span class="text-white text-sm sm:text-lg drop-shadow-md">⭐</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para el carrusel de fondo -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lista de imágenes de kibbi-images para el fondo
            const images = [
                'arte-01.png',
                'arte-03.png',
                'arte-05.png',
                'arte-08.png',
                'arte-09.png',
                'arte-12.png',
                'arte-13.png'
            ];

            let currentImageIndex = 0;
            const heroCarousel = document.getElementById('hero-carousel');

            // Solo crear el carrusel en pantallas medianas y grandes (md y superiores)
            if (window.innerWidth >= 768) {
                // Crear imágenes del carrusel de fondo
                images.forEach((imageName, index) => {
                    const img = document.createElement('img');
                    img.src = `/kibbi-images/${imageName}`;
                    img.alt = `KIBI Arte ${index + 1}`;
                    
                    // Clases responsivas para diferentes dispositivos
                    img.className = 'absolute inset-0 w-full h-full transition-opacity duration-1000';
                    img.style.objectFit = 'cover';
                    img.style.objectPosition = 'center center';
                    
                    if (index === 0) img.classList.add('opacity-100');
                    else img.classList.add('opacity-0');
                    heroCarousel.appendChild(img);
                });

                // Función para cambiar imagen de fondo
                function nextSlide() {
                    const heroImages = heroCarousel.querySelectorAll('img');
                    heroImages.forEach((img, i) => {
                        img.classList.toggle('opacity-100', i === currentImageIndex);
                        img.classList.toggle('opacity-0', i !== currentImageIndex);
                    });

                    currentImageIndex = (currentImageIndex + 1) % images.length;
                }

                // Auto-play del carrusel de fondo cada 6 segundos
                setInterval(nextSlide, 6000);

                // Preload de imágenes para mejor rendimiento
                images.forEach(imageName => {
                    const img = new Image();
                    img.src = `/kibbi-images/${imageName}`;
                });
            }
        });
    </script>
</section>

