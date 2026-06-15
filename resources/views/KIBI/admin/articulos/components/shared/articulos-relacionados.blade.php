@props(['articulos', 'routeName'])

@if($articulos && $articulos->count() > 0)
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Efectos de fondo adicionales -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 via-transparent to-indigo-500/5 rounded-3xl"></div>

        <div class="relative">
            <div class="overflow-x-auto scrollbar-hide" id="related-articles-scroll-kibi" style="scrollbar-width: none; -ms-overflow-style: none;">
                <div class="flex space-x-6 pb-4" style="width: max-content; height: 440px;">
            @foreach($articulos as $index => $articulo)
                <article class="group glass-effect-enhanced rounded-3xl shadow-2xl border border-slate-200/60 overflow-hidden hover:shadow-blue-500/30 transition-all duration-700 transform hover:scale-[1.03] flex-shrink-0 bg-white relative" style="width: 320px; height: 420px;">
                    
                    <!-- Efectos de fondo mejorados -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/8 via-cyan-400/12 to-purple-600/8 opacity-0 group-hover:opacity-100 transition-all duration-700 z-0"></div>
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/20 to-cyan-400/20 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-indigo-400/20 to-purple-400/20 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

                    <!-- Contenido principal -->
                    <div class="relative z-10 h-full flex flex-col">
                        @php
                            $cardImg = $articulo->url_imagen
                                ? asset('storage/' . ltrim($articulo->url_imagen, '/'))
                                : $articulo->url_imagen_banner;
                        @endphp

                        <!-- Imagen con proporción 16:9 y sin recortar (object-contain) -->
                        <div class="relative w-full overflow-hidden bg-white">
                            <div class="pt-[56.25%]"></div>
                            @if($cardImg)
                                <img src="{{ $cardImg }}" 
                                     alt="{{ $articulo->titulo }}" 
                                     class="absolute inset-0 w-full h-full object-contain object-center bg-white">
                            @else
                                <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 flex items-center justify-center">
                                    <span class="material-icons text-cyan-300 text-5xl opacity-70">article</span>
                                </div>
                            @endif
                        </div>

                        <div class="p-5 flex flex-col flex-grow">
                            <!-- Categorías con efectos mejorados -->
                            @php
                                $categorias = $articulo->categoria ? array_unique(array_filter(array_map('trim', explode(',', $articulo->categoria)))) : [];
                            @endphp
                            @if(count($categorias) > 0)
                                <div class="flex flex-wrap gap-2 mb-3 items-center">
                                    @php
                                        $first = $categorias[0];
                                        $rest = array_slice($categorias, 1);
                                        $extraCount = count($rest);
                                    @endphp

                                    @include('KIBI.admin.articulos.components.shared.category-tag', ['categoria' => $first, 'size' => 'small'])

                                    @if($extraCount > 0)
                                        <div class="relative inline-block group/category">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-700 border border-slate-200 cursor-default">+{{ $extraCount }}</span>
                                            <!-- Popover con categorías restantes -->
                                            <div class="absolute left-0 mt-2 w-56 p-3 bg-white border border-slate-200 rounded-xl shadow-lg opacity-0 invisible group-hover/category:opacity-100 group-hover/category:visible transition-opacity duration-200 z-20">
                                                <div class="text-[11px] uppercase tracking-wide text-slate-500 mb-2">Categorías</div>
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach($rest as $categoria)
                                                        @include('KIBI.admin.articulos.components.shared.category-tag', ['categoria' => $categoria, 'size' => 'small'])
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Título con efectos mejorados -->
                            <h3 class="text-lg font-semibold text-slate-800 mb-3 line-clamp-2 group-hover:text-blue-600 transition-all duration-500 group-hover:tracking-wide">
                                {{ $articulo->titulo }}
                            </h3>

                            <!-- Subtítulo mejorado -->
                            <p class="text-slate-600 text-sm leading-relaxed line-clamp-2 mb-4 group-hover:text-slate-700 transition-colors duration-500">
                                {{ $articulo->subtitulo ?? 'Sin descripción disponible' }}
                            </p>

                            <!-- Footer: solo fecha -->
                            <div class="flex items-center mt-auto pt-2">
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs text-slate-500 font-medium">{{ $articulo->created_at->format('d M Y') }}</span>
                                    <div class="w-1 h-1 bg-slate-400 rounded-full"></div>
                                    <span class="text-xs text-slate-500">{{ $articulo->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enlace invisible para toda la tarjeta -->
                    <a href="{{ route($routeName, $articulo) }}" 
                       class="absolute inset-0 z-20"
                       title="Ver artículo: {{ $articulo->titulo }}" 
                       aria-label="Ver artículo completo: {{ $articulo->titulo }}"></a>
                       
                    <!-- Efecto de borde animado -->
                    <div class="absolute inset-0 rounded-3xl border-2 border-transparent bg-gradient-to-r from-blue-500/30 via-cyan-400/30 to-indigo-500/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                </article>
            @endforeach
                </div>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll automático para artículos relacionados (estilo SoftlinkIA)
            const scrollContainer = document.getElementById('related-articles-scroll-kibi');
            if (!scrollContainer) return;

            let isScrolling = false;
            const scrollSpeed = 1; // píxeles por frame

            function autoScroll() {
                if (isScrolling) return;

                const maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;
                const currentScroll = scrollContainer.scrollLeft;

                if (currentScroll >= maxScroll) {
                    scrollContainer.scrollLeft = 0;
                    return;
                }

                scrollContainer.scrollLeft += scrollSpeed;
            }

            const scrollInterval = setInterval(autoScroll, 16); // ~60fps

            scrollContainer.addEventListener('mouseenter', () => {
                isScrolling = true;
            });

            scrollContainer.addEventListener('mouseleave', () => {
                isScrolling = false;
            });
        });
        </script>

        <!-- Efectos decorativos adicionales -->
        <div class="absolute top-1/2 left-0 w-64 h-64 bg-gradient-to-r from-blue-400/10 to-cyan-400/10 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 right-0 w-48 h-48 bg-gradient-to-r from-indigo-400/10 to-purple-400/10 rounded-full blur-3xl opacity-50"></div>
    </div>
@endif
