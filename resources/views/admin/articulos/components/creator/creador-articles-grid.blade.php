<link rel="stylesheet" href="{{ asset('css/articles-grid.css') }}">

<!-- Articles Grid -->
<div id="articlesGrid" class="relative z-20 grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-full">
    @forelse($articulos as $articulo)
        <div
            class="service-card-modern group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-700 transform hover:scale-105 cursor-pointer h-[600px] flex flex-col">
            <!-- Efectos de fondo animados -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-cyan-500/5 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

            <!-- Partículas flotantes -->
            <div class="absolute top-4 right-4 w-2 h-2 bg-cyan-400 rounded-full opacity-60 animate-pulse"></div>
            <div class="absolute bottom-8 left-6 w-1 h-1 bg-blue-400 rounded-full opacity-40 animate-ping"></div>

            <div class="relative z-10 glass-effect-enhanced rounded-2xl overflow-hidden shadow-xl bg-slate-800/30 backdrop-blur-sm border border-slate-700/50 h-full flex flex-col">
            <!-- Article Image -->
            @php
                $cardImg = $articulo->url_imagen
                    ? Storage::url($articulo->url_imagen)
                    : $articulo->url_imagen_banner;
            @endphp
                <div class="relative h-48 bg-gradient-to-br from-slate-800/50 via-slate-700/30 to-slate-900/50 flex items-center justify-center overflow-hidden flex-shrink-0">
                    @if($cardImg)
                        <img src="{{ $cardImg }}" alt="{{ $articulo->titulo }}"
                            class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-slate-700/80 to-slate-800/80 flex items-center justify-center group-hover:from-slate-600/80 group-hover:to-slate-700/80 transition-all duration-500">
                            <span class="material-icons text-cyan-300 text-6xl opacity-80 group-hover:opacity-100 group-hover:rotate-12 transition-all duration-500">article</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                <!-- Status Badge -->
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full backdrop-blur-sm
                            @if($articulo->status === 'publicado') bg-green-500/90 text-white
                            @elseif($articulo->status === 'borrador') bg-yellow-500/90 text-white
                            @else bg-gray-500/90 text-white
                            @endif">
                        <span class="material-icons text-xs mr-1">
                            @if($articulo->status === 'publicado') visibility
                            @elseif($articulo->status === 'borrador') edit
                            @else archive
                            @endif
                        </span>
                        {{ ucfirst($articulo->status) }}
                    </span>
                </div>
            </div>

                <!-- Article Content -->
                    <div class="p-6 flex flex-col flex-grow overflow-hidden">
                    <!-- Category and Date -->
                    <div class="flex flex-col gap-3 mb-4 flex-shrink-0">
                        <div class="flex items-center flex-wrap gap-1 min-h-[2rem] break-words">
                            @php
                                $categorias = $articulo->categoria ? array_unique(array_filter(array_map('trim', explode(',', $articulo->categoria)))) : [];
                            @endphp
                            @foreach(array_slice($categorias, 0, 3) as $categoria)
                                @include('admin.articulos.components.shared.category-tag', ['categoria' => $categoria, 'size' => 'small'])
                            @endforeach
                            @if(count($categorias) > 3)
                                <div class="relative group/more">
                                    <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium text-white bg-gradient-to-r from-gray-500/20 to-gray-600/20 rounded-full border border-gray-400/30 cursor-pointer hover:from-gray-400/30 hover:to-gray-500/30 transition-all duration-300">
                                        +{{ count($categorias) - 3 }}
                                    </span>
                                    <!-- Tooltip con categorías adicionales -->
                                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 px-3 py-2 bg-slate-800/95 backdrop-blur-sm border border-slate-600/50 rounded-lg shadow-lg opacity-0 invisible group-hover/more:opacity-100 group-hover/more:visible transition-all duration-300 z-50 min-w-max">
                                        <div class="flex flex-col gap-1">
                                            @foreach(array_slice($categorias, 3) as $categoriaAdicional)
                                                @include('admin.articulos.components.shared.category-tag', ['categoria' => $categoriaAdicional, 'size' => 'small'])
                                            @endforeach
                                        </div>
                                        <!-- Flecha del tooltip -->
                                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-b-4 border-transparent border-b-slate-600/50"></div>
                                    </div>
                                </div>
                            @endif
                            <!-- Espaciador para tarjetas con menos categorías -->
                            @if(count($categorias) < 3)
                                <div class="flex-grow"></div>
                            @endif
                        </div>
                    </div>

                    <!-- Title and Subtitle -->
                    <div class="flex-shrink-0 mb-4">
                    <h3 class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-cyan-300 transition-colors duration-500 min-h-[3rem] break-words overflow-hidden">
                        {{ $articulo->titulo }}
                    </h3>

                    @if($articulo->subtitulo)
                        <p class="text-slate-300 group-hover:text-slate-200 line-clamp-2 leading-relaxed transition-colors duration-500 min-h-[3rem] break-words overflow-hidden">
                            {{ $articulo->subtitulo }}
                        </p>
                        @else
                            <!-- Espaciador para tarjetas sin subtítulo -->
                            <div class="min-h-[3rem]"></div>
                        @endif
                        
                    </div>

                    <!-- Author and Images Info -->
                    <div class="flex items-center justify-between text-sm text-slate-400 group-hover:text-slate-300 mb-6 transition-colors duration-500 flex-shrink-0">
                        <span class="flex items-center">
                            <span class="material-icons text-sm mr-2 text-blue-500">person</span>
                            {{ $articulo->autor->name }} {{ $articulo->autor->apellido_paterno }}
                            {{ $articulo->autor->apellido_materno }}
                        </span>
                    </div>

                    <!-- Nivel de Dificultad y Fecha -->
                    <div class="flex items-center justify-between mb-6">
                        @include('admin.articulos.components.shared.difficulty-tag', ['nivel' => $articulo->nivel_dificultad, 'size' => 'small'])
                        <span class="text-sm text-slate-400 group-hover:text-slate-300 transition-colors duration-500 flex items-center">
                            <span class="material-icons text-sm mr-1">schedule</span>
                            {{ $articulo->created_at->format('d/m/Y') }}
                        </span>
                    </div>

                    <!-- Espaciador flexible para empujar los botones hacia abajo -->
                    <div class="flex-grow"></div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-slate-700/50 flex-shrink-0">
                        <!-- Botones de la izquierda: Ver y Editar -->
                        <div class="flex space-x-3">
                            <a href="{{ route('creador.articulos.show', $articulo) }}"
                                class="group/link relative overflow-hidden bg-gradient-to-br from-cyan-500 to-blue-500 text-white w-12 h-12 rounded-2xl transition-all duration-500 transform hover:scale-110 hover:shadow-lg hover:shadow-cyan-500/30 flex items-center justify-center"
                                title="Ver artículo">
                                <span class="material-icons text-xl">visibility</span>
                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                            </a>
                            <button onclick="openEditModal('{{ $articulo->slug }}')"
                                class="group/link relative overflow-hidden bg-gradient-to-br from-purple-500 to-pink-500 text-white w-12 h-12 rounded-2xl transition-all duration-500 transform hover:scale-110 hover:shadow-lg hover:shadow-purple-500/30 flex items-center justify-center"
                                title="Editar artículo"
                                data-loading="false">
                                <span class="material-icons text-xl">edit</span>
                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                            </button>
                        </div>
                        
                        <!-- Botón de la derecha: Eliminar -->
                        <button onclick="openDeleteModal('{{ $articulo->slug }}', '{{ $articulo->titulo }}')"
                            class="group/link relative overflow-hidden bg-gradient-to-br from-red-500 to-red-600 text-white w-12 h-12 rounded-2xl transition-all duration-500 transform hover:scale-110 hover:shadow-lg hover:shadow-red-500/30 flex items-center justify-center"
                            title="Eliminar artículo"
                            data-loading="false">
                            <span class="material-icons text-xl">delete</span>
                            <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent opacity-0 group-hover/link:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Borde de neón -->
            <div class="absolute inset-0 rounded-2xl border-2 border-blue-400/30 group-hover:border-blue-300 group-hover:shadow-[0_0_20px_rgba(59,130,246,0.4)] transition-all duration-500"></div>
        </div>
    @empty
        <div class="col-span-full">
            <div class="text-center py-20">
                <div
                    class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-3xl mb-6">
                    <span class="material-icons text-4xl text-gray-400 dark:text-gray-600">article</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">No tienes artículos aún</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Comienza creando tu primer
                    artículo y comparte tu conocimiento con el mundo</p>
                <button onclick="openCreateModal()"
                    class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-semibold rounded-2xl shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/40 transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity">
                    </div>
                    <span class="material-icons mr-3 relative z-10">add_circle</span>
                    <span class="relative z-10">Crear mi primer artículo</span>
                </button>
            </div>
        </div>
    @endforelse
</div>
