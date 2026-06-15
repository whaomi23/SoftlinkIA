@props(['categorias'])

@php
    $selected = request('categoria');
    $busqueda = request('busqueda');
    
    // Mapeo de iconos para categorías (usando los mismos del controlador)
    $categoriasConIconos = [
        'Desarrollo Web' => ['icon' => 'language', 'color' => 'blue'],
        'Inteligencia Artificial' => ['icon' => 'smart_toy', 'color' => 'purple'],
        'Ciberseguridad' => ['icon' => 'shield', 'color' => 'red'],
        'Cloud Computing' => ['icon' => 'cloud_queue', 'color' => 'cyan'],
        'DevOps' => ['icon' => 'build', 'color' => 'green'],
        'Mobile Development' => ['icon' => 'smartphone', 'color' => 'orange'],
        'Data Science' => ['icon' => 'bar_chart', 'color' => 'indigo'],
        'Blockchain' => ['icon' => 'account_balance_wallet', 'color' => 'yellow'],
        'IoT' => ['icon' => 'sensors', 'color' => 'teal'],
        'UI/UX Design' => ['icon' => 'palette', 'color' => 'pink'],
        'Gaming' => ['icon' => 'videogame_asset', 'color' => 'lime'],
        'Redes' => ['icon' => 'hub', 'color' => 'amber'],
        'Base de Datos' => ['icon' => 'storage', 'color' => 'brown'],
        'Testing' => ['icon' => 'bug_report', 'color' => 'deep-orange'],
        'Microservicios' => ['icon' => 'view_module', 'color' => 'grey'],
        'API Development' => ['icon' => 'api', 'color' => 'light-blue'],
    ];
@endphp

@isset($categorias)
    <div class="relative z-20 mb-10">
        <!-- Contenedor principal con efecto glassmorphism -->
        <div class="relative group">
            <!-- Fondo con gradiente animado -->
            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 via-purple-600 to-cyan-600 rounded-3xl opacity-20 group-hover:opacity-30 blur-xl transition-opacity duration-500 animate-pulse"></div>
            
            <!-- Contenedor interno -->
            <div class="relative bg-gradient-to-br from-slate-900/95 via-slate-800/95 to-slate-900/95 backdrop-blur-xl border border-slate-700/50 rounded-3xl p-6 shadow-2xl">
                <!-- Título decorativo -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg blur-md opacity-50"></div>
                            <div class="relative bg-gradient-to-br from-blue-500 to-purple-600 p-2 rounded-lg">
                                <span class="material-icons text-white text-xl">tune</span>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-lg tracking-tight">Filtros de Búsqueda</h3>
                            <p class="text-slate-400 text-xs">Encuentra exactamente lo que necesitas</p>
                        </div>
                    </div>
                    <div class="hidden md:flex items-center space-x-2 px-4 py-2 bg-slate-800/50 rounded-xl border border-slate-700/50">
                        <span class="material-icons text-purple-400 text-sm">auto_awesome</span>
                        <span class="text-slate-300 text-xs font-medium">Búsqueda Inteligente</span>
                    </div>
                </div>

                <!-- Contenedor de filtros -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <!-- Buscador mejorado -->
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-slate-300 mb-2 ml-1">
                            <span class="flex items-center space-x-2">
                                <span class="material-icons text-sm text-blue-400">search</span>
                                <span>Buscar Artículos</span>
                            </span>
                        </label>
                        <div class="relative group/search">
                            <!-- Efecto de brillo en hover -->
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500/0 via-blue-500/50 to-purple-500/0 rounded-2xl opacity-0 group-hover/search:opacity-100 blur-sm transition-opacity duration-500"></div>
                            
                            <div class="relative bg-slate-800/80 border border-slate-700/60 rounded-2xl overflow-hidden transition-all duration-300 group-hover/search:border-blue-500/50 group-hover/search:shadow-lg group-hover/search:shadow-blue-500/10">
                                <!-- Icono de búsqueda animado -->
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <div class="relative">
                                        <span class="material-icons text-slate-400 group-hover/search:text-blue-400 transition-all duration-300 group-hover/search:scale-110">search</span>
                                    </div>
                                </div>
                                
                                <input 
                                    type="text" 
                                    id="searchInput"
                                    name="busqueda"
                                    value="{{ $busqueda }}"
                                    placeholder="Buscar por título, contenido o categoría..."
                                    class="w-full pl-12 pr-12 py-4 bg-transparent text-white placeholder-slate-500 focus:outline-none focus:ring-0 transition-all duration-300"
                                />
                                
                                <!-- Botón de limpiar con animación -->
                                @if($busqueda)
                                    <button 
                                        onclick="clearSearch()"
                                        class="absolute inset-y-0 right-0 pr-4 flex items-center z-10 group/clear"
                                    >
                                        <div class="relative">
                                            <div class="absolute inset-0 bg-red-500/20 rounded-full blur-md opacity-0 group-hover/clear:opacity-100 transition-opacity duration-300"></div>
                                            <span class="material-icons text-slate-400 group-hover/clear:text-red-400 transition-all duration-300 group-hover/clear:scale-110 group-hover/clear:rotate-90">close</span>
                                        </div>
                                    </button>
                                @else
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="material-icons text-slate-600 text-sm">search</span>
                                    </div>
                                @endif
                                
                                <!-- Línea de acento inferior animada -->
                                <div class="absolute bottom-0 left-0 h-0.5 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-full transform scale-x-0 group-hover/search:scale-x-100 transition-transform duration-500 origin-left"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Select de Categorías mejorado -->
                    <div class="lg:w-80">
                        <label class="block text-sm font-semibold text-slate-300 mb-2 ml-1">
                            <span class="flex items-center space-x-2">
                                <span class="material-icons text-sm text-purple-400">category</span>
                                <span>Categoría</span>
                            </span>
                        </label>
                        <div class="relative group/select">
                            <!-- Efecto de brillo en hover -->
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500/0 via-purple-500/50 to-pink-500/0 rounded-2xl opacity-0 group-hover/select:opacity-100 blur-sm transition-opacity duration-500"></div>
                            
                            <div class="relative bg-slate-800/80 border border-slate-700/60 rounded-2xl overflow-hidden transition-all duration-300 group-hover/select:border-purple-500/50 group-hover/select:shadow-lg group-hover/select:shadow-purple-500/10">
                                <!-- Icono de categoría dinámico -->
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10" id="categoryIcon">
                                    <div class="relative">
                                        @if($selected && isset($categoriasConIconos[$selected]))
                                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-lg blur-sm"></div>
                                            <span class="material-icons relative text-purple-400 group-hover/select:text-purple-300 transition-all duration-300 group-hover/select:scale-110 group-hover/select:rotate-12">{{ $categoriasConIconos[$selected]['icon'] }}</span>
                                        @else
                                            <span class="material-icons text-slate-400 group-hover/select:text-purple-400 transition-all duration-300 group-hover/select:scale-110">apps</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <select 
                                    id="categorySelect"
                                    name="categoria"
                                    data-icons='@json($categoriasConIconos)'
                                    class="w-full pl-12 pr-12 py-4 bg-transparent text-white appearance-none focus:outline-none focus:ring-0 cursor-pointer transition-all duration-300"
                                >
                                    <option value="" class="bg-slate-800 text-white">Todas las categorías</option>
                        @foreach($categorias as $categoria)
                                        @php
                                            $icono = $categoriasConIconos[$categoria]['icon'] ?? 'folder';
                                        @endphp
                                        <option value="{{ $categoria }}" data-icon="{{ $icono }}" class="bg-slate-800 text-white" {{ $selected === $categoria ? 'selected' : '' }}>
                                            {{ $categoria }}
                                        </option>
                                    @endforeach
                                </select>
                                
                                <!-- Flecha de dropdown animada -->
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none z-10">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-purple-500/20 rounded-full blur-md opacity-0 group-hover/select:opacity-100 transition-opacity duration-300"></div>
                                        <span class="material-icons relative text-slate-400 group-hover/select:text-purple-400 transition-all duration-300 group-hover/select:scale-110 group-hover/select:-rotate-180">arrow_drop_down</span>
                                    </div>
                                </div>
                                
                                <!-- Línea de acento inferior animada -->
                                <div class="absolute bottom-0 left-0 h-0.5 bg-gradient-to-r from-purple-500 via-pink-500 to-rose-500 rounded-full transform scale-x-0 group-hover/select:scale-x-100 transition-transform duration-500 origin-left"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset
