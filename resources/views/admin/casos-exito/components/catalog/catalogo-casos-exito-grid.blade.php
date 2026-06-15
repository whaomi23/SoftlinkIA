@props(['casosExito'])

<link rel="stylesheet" href="{{ asset('css/articles-grid.css') }}">

<!-- Loading Indicator -->
<div id="loading-indicator" style="display: none;" class="flex justify-center items-center mb-8">
    <div class="inline-flex items-center px-6 py-3 bg-white rounded-lg shadow-md border">
        <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-500 mr-3"></div>
        <span class="text-gray-700 font-medium">Cargando casos de éxito...</span>
    </div>
</div>

<!-- Success Cases Grid -->
<div class="casos-exito-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-full">
    @forelse($casosExito as $casoExito)
        <article
            class="service-card-modern group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-700 transform hover:scale-105 cursor-pointer h-[450px] flex flex-col">
            
            <!-- Efectos de fondo animados -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-cyan-500/5 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

            <!-- Partículas flotantes -->
            <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
            <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

            <!-- Enlace que envuelve toda la tarjeta -->
            <a href="{{ route('casos-exito.ver', $casoExito) }}" class="block h-full">
                <div class="relative z-10 glass-effect-enhanced rounded-2xl overflow-hidden shadow-xl bg-slate-800/30 backdrop-blur-sm border border-slate-700/50 h-full flex flex-col">
                    <!-- Article Image -->
                    @php
                        $cardImg = $casoExito->url_imagen
                            ? asset('storage/' . ltrim($casoExito->url_imagen, '/'))
                            : $casoExito->url_imagen_banner;
                    @endphp
                    <div class="relative h-40 overflow-hidden bg-gradient-to-br from-slate-800/50 via-slate-700/30 to-slate-900/50 flex-shrink-0">
                        @if($cardImg)
                            <img src="{{ $cardImg }}" alt="{{ $casoExito->titulo }}"
                                    class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-700/80 to-slate-800/80 flex items-center justify-center group-hover:from-slate-600/80 group-hover:to-slate-700/80 transition-all duration-500">
                                <span class="material-icons text-cyan-300 text-4xl opacity-80 group-hover:opacity-100 group-hover:rotate-12 transition-all duration-500">emoji_events</span>
                            </div>
                        @endif
                        
                        <!-- Overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>

                    <!-- Article Content -->
                    <div class="p-6 flex flex-col flex-grow">
                        <!-- Category Tags -->
                        <div class="mb-3 flex-shrink-0">
                            @php
                                $categorias = $casoExito->categoria ? array_unique(array_filter(array_map('trim', explode(',', $casoExito->categoria)))) : [];
                            @endphp
                            @if(count($categorias) > 0)
                                <div class="flex flex-wrap gap-2 break-words overflow-hidden">
                                    @foreach(array_slice($categorias, 0, 3) as $categoria)
                                        @include('admin.casos-exito.components.shared.category-casos-exito-tag', ['categoria' => $categoria, 'size' => 'normal'])
                                    @endforeach
                                    @if(count($categorias) > 3)
                                        <div class="relative group/more">
                                            <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-gradient-to-r from-gray-500/20 to-gray-600/20 rounded-full border border-gray-400/30 cursor-pointer hover:from-gray-400/30 hover:to-gray-500/30 transition-all duration-300">
                                                +{{ count($categorias) - 3 }}
                                            </span>
                                            <!-- Tooltip con categorías adicionales -->
                                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm border border-slate-600/50 rounded-lg shadow-lg opacity-0 invisible group-hover/more:opacity-100 group-hover/more:visible transition-all duration-300 z-50 min-w-max">
                                                <div class="flex flex-col gap-1">
                                                    @foreach(array_slice($categorias, 3) as $categoriaAdicional)
                                                        @include('admin.casos-exito.components.shared.category-casos-exito-tag', ['categoria' => $categoriaAdicional, 'size' => 'small'])
                                                    @endforeach
                                                </div>
                                                <!-- Flecha del tooltip -->
                                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-b-4 border-transparent border-b-slate-600/50"></div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <!-- Espacio reservado para mantener altura consistente -->
                                <div class="h-6"></div>
                            @endif
                        </div>

                        <!-- Title -->
                        <h3 class="text-lg font-bold text-white mb-3 line-clamp-2 group-hover:text-cyan-300 transition-colors duration-500 flex-shrink-0 break-words overflow-hidden">
                            {{ $casoExito->titulo }}
                        </h3>

                        <!-- Subtitle -->
                        <div class="flex-grow mb-4">
                            @if($casoExito->subtitulo)
                                <p class="text-slate-300 line-clamp-3 text-sm leading-relaxed group-hover:text-slate-200 transition-colors duration-500 break-words overflow-hidden">
                                    {{ $casoExito->subtitulo }}
                                </p>
                            @else
                                <!-- Espacio reservado para mantener altura consistente -->
                                <div class="h-12"></div>
                            @endif
                        </div>

                        <!-- Nivel de Dificultad -->
                        <div class="mb-4 flex-shrink-0">
                            @include('admin.casos-exito.components.shared.difficulty-casos-exito-tag', ['nivel' => $casoExito->nivel_dificultad, 'size' => 'normal'])
                        </div>

                        <!-- Footer con fecha -->
                        <div class="flex justify-between items-center flex-shrink-0">
                            <!-- Date -->
                            <div class="text-sm text-slate-400 group-hover:text-slate-300 transition-colors duration-500">
                                {{ $casoExito->created_at->format('d \d\e F \d\e Y') }}
                            </div>

                            <!-- Icono de flecha -->
                            <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-x-2 group-hover:translate-x-0">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-full flex items-center justify-center border border-blue-400/30">
                                    <span class="material-icons text-blue-400 text-sm">arrow_forward</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Borde de neón -->
            <div class="absolute inset-0 rounded-2xl border-2 border-blue-400/30 group-hover:border-blue-300 group-hover:shadow-[0_0_20px_rgba(59,130,246,0.4)] transition-all duration-500"></div>
        </article>
    @empty
        <div class="col-span-full">
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-2xl mb-6 glass-effect-enhanced bg-slate-800/40 backdrop-blur-sm border border-slate-700/60 shadow-lg shadow-slate-900/30">
                    <span class="material-icons text-4xl text-cyan-300">emoji_events</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">No hay casos de éxito</h3>
                <p class="text-slate-300 mb-8 max-w-md mx-auto">Comienza creando tu primer caso de éxito y comparte
                    tu conocimiento con el mundo</p>
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
@include('admin.casos-exito.components.shared.pagination', ['paginator' => $casosExito])
