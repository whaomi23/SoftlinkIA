<!-- Casos de Éxito - Carrusel Ultra Premium -->
<section class="py-36 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 relative overflow-hidden">
    <!-- Fondos decorativos con animaciones avanzadas -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Orbes de luz animados -->
        <div class="absolute -top-40 -left-40 w-[750px] h-[750px] bg-gradient-to-br from-cyan-500/20 via-blue-600/10 to-cyan-400/5 rounded-full blur-3xl animate-[pulse_10s_ease-in-out_infinite]"></div>
        <div class="absolute bottom-0 right-0 w-[850px] h-[850px] bg-gradient-to-tl from-purple-600/15 via-pink-500/10 to-purple-400/5 rounded-full blur-3xl animate-[pulse_12s_ease-in-out_infinite]"></div>
        <!-- Gradiente radial central -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[950px] h-[950px] bg-gradient-radial from-indigo-500/10 to-transparent blur-3xl animate-[spin_60s_linear_infinite]"></div>
        <!-- Rayos de luz y líneas diagonales sutiles -->
        <div class="absolute inset-0 bg-[conic-gradient(from_0deg_at_50%_50%,transparent_0deg,rgba(59,130,246,0.05)_45deg,transparent_90deg,rgba(147,51,234,0.05)_135deg,transparent_180deg,rgba(59,130,246,0.05)_225deg,transparent_270deg,rgba(147,51,234,0.05)_315deg,transparent_360deg)] opacity-50"></div>
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.03)_1px,transparent_1px)] bg-[size:6rem_6rem] [mask-image:radial-gradient(ellipse_80%_50%_at_50%_0%,#000_60%,transparent_100%)]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Encabezado -->
        <div class="text-center mb-32">
            <h2 class="text-5xl sm:text-6xl font-extrabold text-white mb-5 relative inline-block">
                <span class="bg-gradient-to-r from-white via-cyan-50 to-white bg-clip-text text-transparent">Casos de Éxito</span>
                <span class="absolute inset-0 bg-gradient-to-r from-white via-cyan-50 to-white opacity-20 blur-4xl -z-10"></span>
            </h2>
            <div class="flex items-center justify-center gap-3 mb-5">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent via-slate-600 to-slate-600"></div>
                <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-slate-600 via-cyan-500 to-slate-600"></div>
                <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent via-slate-600 to-slate-600"></div>
            </div>
            <p class="text-slate-300 text-xl max-w-3xl mx-auto leading-relaxed font-light">
                Proyectos que han transformado organizaciones y generado valor real
            </p>
        </div>

        @if(isset($casosExito) && $casosExito->count() > 0)
        <!-- Carrusel Horizontal -->
        <div class="relative group overflow-visible">
            <!-- Botones de navegación AL BORDE -->
            <button id="prev-caso" class="hidden md:flex absolute left-0 -translate-x-1/2 w-12 h-12 rounded-full bg-gradient-to-br from-slate-800/95 to-slate-900/95 hover:from-cyan-950/40 hover:via-slate-800/95 hover:to-slate-900/95 backdrop-blur-2xl border-2 border-slate-700/90 hover:border-cyan-400/70 shadow-xl hover:shadow-cyan-500/40 transition-all duration-500 hover:scale-110 group/btn z-20 flex items-center justify-center focus:outline-none" style="top: 50%; transform: translate(-50%, -50%);">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/20 to-transparent rounded-full opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                <span class="material-icons text-xl relative z-10">chevron_left</span>
            </button>

            <button id="next-caso" class="hidden md:flex absolute right-0 translate-x-1/2 w-12 h-12 rounded-full bg-gradient-to-br from-slate-800/95 to-slate-900/95 hover:from-cyan-950/40 hover:via-slate-800/95 hover:to-slate-900/95 backdrop-blur-2xl border-2 border-slate-700/90 hover:border-cyan-400/70 shadow-xl hover:shadow-cyan-500/40 transition-all duration-500 hover:scale-110 group/btn z-20 flex items-center justify-center focus:outline-none" style="top: 50%; transform: translate(50%, -50%);">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/20 to-transparent rounded-full opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                <span class="material-icons text-xl relative z-10">chevron_right</span>
            </button>

            <div id="casos-carousel" class="flex overflow-hidden snap-x snap-mandatory scroll-smooth pb-12 scrollbar-none">
                @foreach($casosExito as $index => $caso)
                    @php
                        $colorClasses = [
                            'from-cyan-500/20 via-blue-400/10 to-purple-600/20',
                            'from-green-500/20 via-emerald-400/10 to-teal-600/20',
                            'from-pink-500/20 via-rose-400/10 to-red-600/20',
                            'from-amber-500/20 via-yellow-400/10 to-orange-600/20',
                            'from-purple-500/20 via-violet-400/10 to-indigo-600/20',
                        ];
                        $color = $colorClasses[$index % count($colorClasses)];
                    @endphp

                    <!-- TARJETA CLICKEABLE -->
                    <a href="{{ route('casos-exito.catalogo') }}" class="snap-center flex-shrink-0 w-full min-w-full bg-gradient-to-br from-slate-800/80 via-slate-900/70 to-slate-950/80 rounded-3xl p-8 md:p-12 backdrop-blur-3xl border-2 border-slate-700/70 shadow-2xl hover:shadow-cyan-500/50 flex flex-col md:flex-row gap-6 md:gap-8 cursor-pointer transition-all duration-700 hover:scale-[1.01] hover:border-cyan-500/60 group/card relative overflow-hidden no-underline mx-4">
                        <!-- Brillo animado -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-cyan-500/20 to-transparent -skew-x-12 opacity-0 group-hover/card:opacity-100 group-hover/card:animate-[shimmer_2s_linear_infinite] transition-opacity duration-700"></div>
                        <!-- Esquinas glow -->
                        <div class="absolute top-0 right-0 w-44 h-44 bg-gradient-to-bl from-cyan-500/30 via-blue-500/20 to-transparent rounded-3xl blur-sm animate-pulse"></div>
                        <div class="absolute bottom-0 left-0 w-44 h-44 bg-gradient-to-tr from-purple-500/30 via-pink-500/20 to-transparent rounded-3xl blur-sm animate-pulse delay-500"></div>
                        <!-- Partículas dinámicas -->
                        <div class="absolute inset-0 opacity-0 group-hover/card:opacity-100 transition-opacity duration-1000">
                            <div class="absolute top-12 left-12 w-2 h-2 bg-cyan-400 rounded-full animate-pulse shadow-lg shadow-cyan-400/50"></div>
                            <div class="absolute bottom-24 right-24 w-2 h-2 bg-purple-400 rounded-full animate-pulse delay-500 shadow-lg shadow-purple-400/50"></div>
                            <div class="absolute top-1/2 left-6 w-1.5 h-1.5 bg-blue-400 rounded-full animate-pulse delay-700"></div>
                            <div class="absolute top-6 right-1/3 w-1 h-1 bg-pink-400 rounded-full animate-pulse delay-300"></div>
                        </div>

                        <!-- Texto -->
                        <div class="flex-1 flex flex-col justify-center gap-6 relative z-10">
                            @if($caso->categoria)
                                @php
                                    $categoriasArray = array_filter(array_map('trim', explode(',', $caso->categoria)));
                                    $categoriasArray = array_unique($categoriasArray);
                                @endphp
                                <div class="flex flex-wrap gap-2 mb-2">
                                    @foreach(array_slice($categoriasArray, 0, 3) as $cat)
                                        @include('admin.casos-exito.components.shared.category-casos-exito-tag', ['categoria' => $cat, 'size' => 'small'])
                                    @endforeach
                                </div>
                            @endif

                            <h3 class="text-3xl md:text-4xl font-bold text-white mb-4 line-clamp-2 leading-tight group-hover/card:text-cyan-50 transition-colors duration-300 tracking-tight">
                                {{ $caso->titulo }}
                            </h3>

                            <p class="text-slate-400 text-base mb-6 line-clamp-4 leading-relaxed">
                                {{ Str::limit($caso->subtitulo ?? $caso->contenido ?? 'Explora cómo este proyecto ha transformado procesos y generado resultados tangibles.', 250) }}
                            </p>

                            @if($caso->nivel_dificultad)
                                <div class="mb-6">
                                    @include('admin.casos-exito.components.shared.difficulty-casos-exito-tag', ['nivel' => $caso->nivel_dificultad, 'size' => 'small'])
                                </div>
                            @endif
                        </div>

                        <!-- Imagen -->
                        @if($caso->imagen_url || $caso->url_imagen_banner)
                            <img 
                                src="{{ $caso->imagen_url ?? $caso->url_imagen_banner }}" 
                                alt="{{ $caso->titulo }}" 
                                class="relative z-10 w-full md:w-[400px] h-[300px] md:h-[400px] object-contain rounded-xl drop-shadow-2xl"
                            >
                        @else
                            <div class="w-full md:w-[400px] h-[300px] md:h-[400px] bg-gradient-to-br from-slate-700/90 to-slate-800/90 border-2 border-slate-600/40 flex items-center justify-center text-slate-500 rounded-xl backdrop-blur-sm shadow-inner">
                                <span class="material-icons text-5xl md:text-7xl opacity-30">business_center</span>
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>
            
            <!-- Indicadores (dots) -->
            <div class="flex justify-center gap-2 mt-8">
                @foreach($casosExito as $index => $caso)
                    <button class="carousel-dot w-2 h-2 rounded-full bg-slate-600 transition-all duration-300 {{ $index === 0 ? 'bg-cyan-400 w-8' : '' }}" data-index="{{ $index }}" aria-label="Ir a caso {{ $index + 1 }}"></button>
                @endforeach
            </div>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const carousel = document.getElementById('casos-carousel');
                const prevBtn = document.getElementById('prev-caso');
                const nextBtn = document.getElementById('next-caso');
                const dots = document.querySelectorAll('.carousel-dot');
                const cards = carousel.querySelectorAll('a');
                let currentIndex = 0;
                let isScrolling = false;

                function updateCarousel() {
                    const cardWidth = carousel.offsetWidth; // Ancho completo del contenedor
                    const scrollPosition = currentIndex * cardWidth;
                    
                    carousel.scrollTo({
                        left: scrollPosition,
                        behavior: 'smooth'
                    });
                    
                    // Update dots
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.remove('bg-slate-600', 'w-2');
                            dot.classList.add('bg-cyan-400', 'w-8');
                        } else {
                            dot.classList.remove('bg-cyan-400', 'w-8');
                            dot.classList.add('bg-slate-600', 'w-2');
                        }
                    });
                }

                function nextSlide() {
                    if (isScrolling) return;
                    isScrolling = true;
                    currentIndex = (currentIndex + 1) % cards.length;
                    updateCarousel();
                    setTimeout(() => isScrolling = false, 500);
                }

                function prevSlide() {
                    if (isScrolling) return;
                    isScrolling = true;
                    currentIndex = (currentIndex - 1 + cards.length) % cards.length;
                    updateCarousel();
                    setTimeout(() => isScrolling = false, 500);
                }

                function goToSlide(index) {
                    if (isScrolling || currentIndex === index) return;
                    isScrolling = true;
                    currentIndex = index;
                    updateCarousel();
                    setTimeout(() => isScrolling = false, 500);
                }

                // Event listeners
                if (nextBtn) nextBtn.addEventListener('click', nextSlide);
                if (prevBtn) prevBtn.addEventListener('click', prevSlide);

                dots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        const index = parseInt(dot.getAttribute('data-index'));
                        goToSlide(index);
                    });
                });

                // Touch/swipe support
                let touchStartX = 0;
                let touchEndX = 0;

                carousel.addEventListener('touchstart', e => {
                    touchStartX = e.changedTouches[0].screenX;
                });

                carousel.addEventListener('touchend', e => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                });

                function handleSwipe() {
                    const swipeThreshold = 50;
                    const diff = touchStartX - touchEndX;

                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0) {
                            nextSlide(); // Swipe left = next
                        } else {
                            prevSlide(); // Swipe right = prev
                        }
                    }
                }

                // Keyboard navigation
                carousel.setAttribute('tabindex', '0');
                carousel.addEventListener('keydown', e => {
                    if (e.key === 'ArrowRight') nextSlide();
                    if (e.key === 'ArrowLeft') prevSlide();
                });
            });
        </script>
        @else
        <!-- Estado vacío -->
        <div class="text-center py-32 px-6">
            <div class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-slate-800/70 to-slate-900/70 border-2 border-slate-700/60 mb-8 backdrop-blur-xl shadow-2xl relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-purple-500/5"></div>
                <span class="material-icons text-slate-400 text-6xl relative z-10">business_center</span>
            </div>
            <h3 class="text-2xl font-bold text-white mb-3">No hay casos disponibles</h3>
            <p class="text-slate-400 text-lg max-w-md mx-auto leading-relaxed">
                No hay casos de éxito disponibles en este momento. Vuelve pronto para ver nuevas historias.
            </p>
        </div>
        @endif
    </div>
</section>
