@props(['articulos', 'routeName' => 'articulos.ver', 'titulo' => null])

@if(isset($articulos) && $articulos->count() > 0)
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($titulo)
            <h2 class="text-3xl font-bold text-white mb-8 text-center">{{ $titulo }}</h2>
        @endif
        
        <!-- Contenedor con scroll horizontal -->
        <div class="relative">
            <div class="overflow-x-auto scrollbar-hide" id="related-articles-scroll" style="scrollbar-width: none; -ms-overflow-style: none;">
                <div class="flex space-x-6 pb-4" style="width: max-content;">
                    @foreach($articulos as $articuloRelacionado)
                        <article class="group glass-effect-enhanced rounded-lg shadow-lg border border-slate-700/50 overflow-hidden hover:shadow-xl transition-all duration-500 transform hover:scale-105 flex-shrink-0 bg-slate-800/30 backdrop-blur-sm relative" style="width: 320px;">
                            <!-- Efectos de fondo animados -->
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-cyan-500/5 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 rounded-lg"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 rounded-lg"></div>

                            <!-- Partículas flotantes -->
                            <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
                            <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

                            <a href="{{ route($routeName, $articuloRelacionado->id) }}" class="block relative z-10">
                                <!-- Imagen del artículo (16:9 y completa sin recortar) -->
                                <div class="relative w-full overflow-hidden bg-slate-700/50">
                                    <div class="pt-[56.25%]"></div>
                                    @php
                                        // Usar la misma lógica que el catálogo
                                        $cardImg = $articuloRelacionado->url_imagen
                                            ? Storage::url($articuloRelacionado->url_imagen)
                                            : $articuloRelacionado->url_imagen_banner;
                                    @endphp
                                    
                                    @if($cardImg)
                                        <img src="{{ $cardImg }}" alt="{{ $articuloRelacionado->titulo }}"
                                            class="absolute inset-0 w-full h-full object-contain object-center bg-white">
                                    @else
                                        <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-slate-700/80 to-slate-800/80 flex items-center justify-center">
                                            <span class="material-icons text-cyan-300 text-4xl opacity-80">article</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Contenido del artículo -->
                                <div class="p-6">
                                    <!-- Categorías como tags -->
                                    @if($articuloRelacionado->categoria)
                                        <div class="flex flex-wrap gap-2 mb-3 group">
                                            @php
                                                $categorias = is_string($articuloRelacionado->categoria) 
                                                    ? array_unique(array_filter(array_map('trim', explode(',', $articuloRelacionado->categoria))))
                                                    : [$articuloRelacionado->categoria];
                                            @endphp
                                            @if(count($categorias) > 0)
                                                @include('admin.articulos.components.shared.category-tag', ['categoria' => $categorias[0], 'size' => 'small'])
                                                @if(count($categorias) > 1)
                                                    <div class="relative group/more">
                                                        <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium text-white bg-gradient-to-r from-gray-500/20 to-gray-600/20 rounded-full border border-gray-400/30 cursor-pointer hover:from-gray-400/30 hover:to-gray-500/30 transition-all duration-300">
                                                            +{{ count($categorias) - 1 }}
                                                        </span>
                                                        <!-- Tooltip con categorías adicionales -->
                                                        <div class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm border border-slate-600/50 rounded-lg shadow-lg opacity-0 invisible group-hover/more:opacity-100 group-hover/more:visible transition-all duration-300 z-50 min-w-max">
                                                            <div class="flex flex-col gap-1">
                                                                @foreach(array_slice($categorias, 1) as $categoriaAdicional)
                                                                    @include('admin.articulos.components.shared.category-tag', ['categoria' => $categoriaAdicional, 'size' => 'small'])
                                                                @endforeach
                                                            </div>
                                                            <!-- Flecha del tooltip -->
                                                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-b-4 border-transparent border-b-slate-600/50"></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    @endif

                                    <h3 class="text-lg font-semibold text-white mb-2 line-clamp-2">
                                        {{ $articuloRelacionado->titulo }}
                                    </h3>
                                    
                                    @if($articuloRelacionado->subtitulo)
                                        <p class="text-slate-300 text-sm mb-4 line-clamp-2">
                                            {{ Str::limit($articuloRelacionado->subtitulo, 100) }}
                                        </p>
                                    @endif
                                    
                                    <!-- Nivel de dificultad -->
                                    @if($articuloRelacionado->nivel_dificultad)
                                        <div class="mb-3">
                                            @include('admin.articulos.components.shared.difficulty-tag', ['nivel' => $articuloRelacionado->nivel_dificultad, 'size' => 'small'])
                                        </div>
                                    @endif
                                    
                                    <!-- Metadata -->
                                    <div class="flex items-center justify-between text-xs text-slate-400">
                                        <div class="flex items-center">
                                            <span class="material-icons text-xs mr-1">schedule</span>
                                            <span>{{ $articuloRelacionado->created_at->format('d/m/Y') }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="material-icons text-xs mr-1">visibility</span>
                                            <span>{{ ucfirst($articuloRelacionado->status) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- Borde de neón -->
                            <div class="absolute inset-0 rounded-lg border-2 border-blue-400/30 group-hover:border-blue-300 group-hover:shadow-[0_0_20px_rgba(59,130,246,0.4)] transition-all duration-500"></div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll automático para artículos relacionados
    function initRelatedArticlesScroll() {
        const scrollContainer = document.getElementById('related-articles-scroll');
        if (!scrollContainer) return;

        let isScrolling = false;
        const scrollSpeed = 1; // píxeles por frame
        const articleWidth = 350; // ancho de cada artículo + espacio

        function autoScroll() {
            if (isScrolling) return;

            const maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;
            const currentScroll = scrollContainer.scrollLeft;

            // Si llegamos al final, volver al inicio inmediatamente
            if (currentScroll >= maxScroll) {
                scrollContainer.scrollLeft = 0;
                return;
            }

            // Continuar el scroll hacia la derecha
            scrollContainer.scrollLeft += scrollSpeed;
        }

        // Iniciar scroll automático
        const scrollInterval = setInterval(autoScroll, 16); // ~60fps

        // Pausar scroll al hacer hover
        scrollContainer.addEventListener('mouseenter', () => {
            isScrolling = true;
        });

        scrollContainer.addEventListener('mouseleave', () => {
            isScrolling = false;
        });
    }

    // Inicializar scroll automático
    initRelatedArticlesScroll();
});

// CSS personalizado para tooltips específicos
const style = document.createElement('style');
style.textContent = `
    .hover-tooltip-trigger:hover + .hover-tooltip {
        opacity: 1 !important;
        visibility: visible !important;
    }
`;
document.head.appendChild(style);
</script>
@endif
