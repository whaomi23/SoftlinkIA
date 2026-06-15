@extends('layouts.app')

@section('title', 'Catálogo de Cursos - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-purple-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute top-40 left-40 w-80 h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Main Content -->
    <main class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-300 flex items-center">
                    <span class="material-icons text-sm mr-1">home</span>
                    Inicio
                </a>
                <span class="material-icons text-gray-400 text-sm">chevron_right</span>
                <span class="text-gray-300">Catálogo de Cursos</span>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Catálogo de <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-blue-600">Cursos</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                Descubre una amplia variedad de cursos diseñados para impulsar tu conocimiento y habilidades profesionales.
            </p>
        </div>

        <!-- Filters -->
        <div class="bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl border border-gray-200/30 dark:border-slate-600/30 rounded-3xl p-8 mb-8 shadow-2xl hover:shadow-purple-500/20 transition-all duration-700 relative overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 via-blue-500/5 to-indigo-500/5 opacity-0 hover:opacity-100 transition-opacity duration-700"></div>

            <!-- Floating Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="filter-particle filter-particle-1"></div>
                <div class="filter-particle filter-particle-2"></div>
                <div class="filter-particle filter-particle-3"></div>
            </div>

            <!-- Header -->
            <div class="relative z-10 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 flex items-center">
                    <span class="material-icons text-purple-600 dark:text-purple-400 mr-3 text-3xl">tune</span>
                    Filtros Avanzados
                </h2>
                <p class="text-gray-600 dark:text-gray-400">Encuentra el curso perfecto para ti</p>
            </div>

            <form method="GET" class="relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Search -->
                    <div class="lg:col-span-2">
                        <label for="q" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <span class="material-icons text-purple-600 dark:text-purple-400 mr-2 animate-pulse">search</span>
                            Buscar cursos
                        </label>
                        <div class="relative">
                            <input type="text"
                                   id="q"
                                   name="q"
                                   value="{{ request('q') }}"
                                   placeholder="Buscar por título o descripción..."
                                   class="filter-input w-full px-5 py-4 bg-white/90 dark:bg-slate-700/90 border border-gray-200/50 dark:border-slate-600/50 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-purple-400/50 transition-all duration-500 hover:scale-105 hover:shadow-lg">
                            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-purple-500/10 to-blue-500/10 opacity-0 hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="categoria_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <span class="material-icons text-green-600 dark:text-green-400 mr-2 animate-bounce">category</span>
                            Categoría
                        </label>
                        <div class="relative">
                            <select id="categoria_id"
                                    name="categoria_id"
                                    class="filter-select w-full px-5 py-4 bg-white/90 dark:bg-slate-700/90 border border-gray-200/50 dark:border-slate-600/50 rounded-2xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500/50 focus:border-green-400/50 transition-all duration-500 hover:scale-105 hover:shadow-lg appearance-none cursor-pointer">
                                <option value="">Todas las categorías</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                <span class="material-icons text-gray-500 dark:text-gray-400">keyboard_arrow_down</span>
                            </div>
                            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-green-500/10 to-emerald-500/10 opacity-0 hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="precio_max" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <span class="material-icons text-orange-600 dark:text-orange-400 mr-2 animate-pulse">attach_money</span>
                            Precio máximo
                        </label>
                        <div class="relative">
                            <select id="precio_max"
                                    name="precio_max"
                                    class="filter-select w-full px-5 py-4 bg-white/90 dark:bg-slate-700/90 border border-gray-200/50 dark:border-slate-600/50 rounded-2xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-400/50 transition-all duration-500 hover:scale-105 hover:shadow-lg appearance-none cursor-pointer">
                                <option value="">Sin límite</option>
                                <option value="50" {{ request('precio_max') == '50' ? 'selected' : '' }}>$50</option>
                                <option value="100" {{ request('precio_max') == '100' ? 'selected' : '' }}>$100</option>
                                <option value="200" {{ request('precio_max') == '200' ? 'selected' : '' }}>$200</option>
                                <option value="500" {{ request('precio_max') == '500' ? 'selected' : '' }}>$500</option>
                            </select>
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                <span class="material-icons text-gray-500 dark:text-gray-400">keyboard_arrow_down</span>
                            </div>
                            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-orange-500/10 to-red-500/10 opacity-0 hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <button type="submit"
                            class="filter-btn bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 hover:from-purple-500 hover:via-blue-500 hover:to-indigo-500 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-purple-500/40 flex items-center group relative overflow-hidden">
                        <span class="material-icons text-lg mr-3 group-hover:scale-125 group-hover:rotate-12 transition-all duration-500">filter_list</span>
                        <span class="relative z-10">Filtrar Cursos</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </button>

                    <a href="{{ route('cursos.catalogo') }}"
                       class="filter-btn bg-gradient-to-r from-gray-600 to-slate-600 hover:from-gray-500 hover:to-slate-500 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-gray-500/40 flex items-center group relative overflow-hidden">
                        <span class="material-icons text-lg mr-3 group-hover:scale-125 group-hover:rotate-12 transition-all duration-500">refresh</span>
                        <span class="relative z-10">Limpiar Filtros</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </a>
                </div>
            </form>
        </div>

        <!-- Results Count -->
        <div class="mb-6">
            <p class="text-gray-600 dark:text-gray-400">
                Mostrando {{ $cursos->count() }} de {{ $cursos->total() }} cursos
            </p>
        </div>

        <!-- Courses Grid -->
        @if($cursos->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @foreach($cursos as $curso)
                    <div class="group bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl border border-gray-200/30 dark:border-slate-600/30 rounded-3xl overflow-hidden shadow-2xl hover:shadow-purple-500/20 hover:shadow-3xl transition-all duration-1000 hover:scale-[1.05] hover:-translate-y-6 hover:rotate-x-2 relative card-premium card-3d">
                        <!-- Animated Background Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 via-blue-500/10 to-indigo-500/10 opacity-0 group-hover:opacity-100 transition-all duration-700"></div>

                        <!-- Floating Particles Effect -->
                        <div class="absolute inset-0 overflow-hidden pointer-events-none">
                            <div class="particle particle-1"></div>
                            <div class="particle particle-2"></div>
                            <div class="particle particle-3"></div>
                            <div class="particle particle-4"></div>
                        </div>

                        <!-- Shimmer Effect -->
                        <div class="absolute inset-0 shimmer-effect opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

                        <!-- Course Image -->
                        <div class="relative h-64 bg-gradient-to-br from-purple-500 via-blue-500 to-indigo-600 overflow-hidden image-container image-3d">
                            @if($curso->url_imagen)
                                <img src="{{ Storage::url($curso->url_imagen) }}"
                                     alt="{{ $curso->titulo }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-all duration-1000 filter group-hover:brightness-110 group-hover:contrast-110 group-hover:rotate-y-5">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-purple-500 via-blue-500 to-indigo-600 relative">
                                    <div class="text-center z-10">
                                        <div class="icon-container">
                                            <span class="material-icons text-white text-8xl opacity-90 mb-3 animate-float">school</span>
                                        </div>
                                        <p class="text-white/90 text-lg font-semibold">Curso Educativo</p>
                                        <div class="w-16 h-1 bg-white/50 rounded-full mx-auto mt-2"></div>
                                    </div>
                                    <!-- Animated background pattern -->
                                    <div class="absolute inset-0 opacity-20">
                                        <div class="pattern-dots"></div>
                                    </div>
                                </div>
                            @endif

                            <!-- Multi-layer Overlays -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 via-transparent to-blue-500/20 opacity-0 group-hover:opacity-100 transition-all duration-700"></div>

                            <!-- Glow Effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-400/30 via-blue-400/30 to-indigo-400/30 opacity-0 group-hover:opacity-100 transition-all duration-700 blur-sm"></div>

                            <!-- Category Badge -->
                            <div class="absolute top-6 left-6 z-20">
                                <span class="badge-premium badge-3d bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl text-gray-800 dark:text-white px-5 py-2.5 rounded-2xl text-sm font-bold shadow-2xl border border-white/30 hover:scale-110 hover:rotate-y-12 hover:-translate-z-2 transition-all duration-500">
                                    <span class="material-icons text-sm mr-1.5 align-middle animate-pulse">category</span>
                                    {{ $curso->categoria->nombre }}
                                </span>
                            </div>

                            <!-- Price Badge -->
                            @if($curso->precio > 0)
                                <div class="absolute top-6 right-6 z-20">
                                    <span class="badge-premium badge-3d bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 text-white px-5 py-2.5 rounded-2xl text-sm font-bold shadow-2xl border border-green-400/40 hover:scale-110 hover:rotate-y-12 hover:-translate-z-2 transition-all duration-500 price-glow">
                                        <span class="material-icons text-sm mr-1.5 align-middle animate-bounce">attach_money</span>
                                        ${{ number_format($curso->precio, 0) }}
                                    </span>
                                </div>
                            @else
                                <div class="absolute top-6 right-6 z-20">
                                    <span class="badge-premium badge-3d bg-gradient-to-r from-blue-500 via-cyan-500 to-sky-500 text-white px-5 py-2.5 rounded-2xl text-sm font-bold shadow-2xl border border-blue-400/40 hover:scale-110 hover:rotate-y-12 hover:-translate-z-2 transition-all duration-500 free-glow">
                                        <span class="material-icons text-sm mr-1.5 align-middle animate-bounce">gift</span>
                                        Gratis
                                    </span>
                                </div>
                            @endif

                            <!-- Difficulty Badge -->
                            @if($curso->nivel_dificultad)
                                <div class="absolute bottom-6 left-6 z-20">
                                    @php
                                        $difficultyColors = [
                                            'principiante' => 'from-green-500 via-emerald-500 to-teal-500',
                                            'intermedio' => 'from-yellow-500 via-orange-500 to-red-500',
                                            'avanzado' => 'from-red-500 via-pink-500 to-purple-500'
                                        ];
                                        $color = $difficultyColors[$curso->nivel_dificultad] ?? 'from-gray-500 to-slate-500';
                                    @endphp
                                    <span class="badge-premium badge-3d bg-gradient-to-r {{ $color }} text-white px-4 py-2 rounded-xl text-xs font-bold shadow-xl border border-white/20 hover:scale-110 hover:rotate-y-12 hover:-translate-z-2 transition-all duration-500 difficulty-glow">
                                        <span class="material-icons text-xs mr-1 align-middle animate-pulse">trending_up</span>
                                        {{ ucfirst($curso->nivel_dificultad) }}
                                    </span>
                                </div>
                            @endif

                            <!-- Duration Badge -->
                            @if($curso->duracion_horas)
                                <div class="absolute bottom-6 right-6 z-20">
                                    <span class="badge-premium badge-3d bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl text-gray-800 dark:text-white px-4 py-2 rounded-xl text-xs font-bold shadow-xl border border-white/30 hover:scale-110 hover:rotate-y-12 hover:-translate-z-2 transition-all duration-500">
                                        <span class="material-icons text-xs mr-1 align-middle animate-spin-slow">schedule</span>
                                        {{ $curso->duracion_horas }}h
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Course Content -->
                        <div class="p-8 relative z-10">
                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 line-clamp-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-all duration-500 hover:scale-105 transform-gpu">
                                {{ $curso->titulo }}
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 dark:text-gray-400 mb-6 line-clamp-3 text-sm leading-relaxed group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-500">
                                {{ $curso->descripcion }}
                            </p>

                            <!-- Creator Info -->
                            @if($curso->creador)
                                <div class="flex items-center mb-7 p-4 bg-gradient-to-r from-gray-50/90 to-slate-50/90 dark:from-slate-700/70 dark:to-slate-600/70 rounded-3xl border border-gray-200/60 dark:border-slate-600/60 backdrop-blur-sm hover:scale-105 transition-all duration-300 shadow-lg">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 via-blue-500 to-indigo-500 rounded-3xl flex items-center justify-center mr-4 shadow-xl relative overflow-hidden">
                                        <span class="text-white text-lg font-bold z-10">{{ strtoupper(substr($curso->creador->name, 0, 1)) }}</span>
                                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-blue-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-gray-900 dark:text-white mb-1">
                                            {{ $curso->creador->name }} {{ $curso->creador->apellido_paterno }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 flex items-center">
                                            <span class="material-icons text-xs mr-1 animate-pulse">verified</span>
                                            <span class="bg-gradient-to-r from-green-500 to-emerald-500 bg-clip-text text-transparent font-semibold">Creador Certificado</span>
                                        </p>
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="flex items-center justify-center space-x-4">
                                <!-- Ver Curso Button -->
                                <a href="{{ route('cursos.ver', $curso->slug ?? $curso->id) }}"
                                   class="btn-circular btn-premium btn-3d bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 hover:from-purple-500 hover:via-blue-500 hover:to-indigo-500 text-white font-bold w-14 h-14 rounded-full transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-purple-500/40 hover:rotate-x-5 hover:-translate-z-4 flex items-center justify-center group/btn relative overflow-hidden"
                                   title="Ver Detalles">
                                    <span class="material-icons text-lg group-hover/btn:scale-125 group-hover/btn:rotate-12 group-hover/btn:rotate-y-15 transition-all duration-500">visibility</span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                                </a>

                                <!-- Comprar Curso Button -->
                                @if($curso->precio > 0)
                                    <button onclick="comprarCurso({{ $curso->id }})"
                                            class="btn-circular btn-premium btn-3d bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 hover:from-green-500 hover:via-emerald-500 hover:to-teal-500 text-white font-bold w-14 h-14 rounded-full transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-green-500/40 hover:rotate-x-5 hover:-translate-z-4 flex items-center justify-center group/btn relative overflow-hidden"
                                            title="Comprar - ${{ number_format($curso->precio, 0) }}">
                                        <span class="material-icons text-lg group-hover/btn:scale-125 group-hover/btn:bounce group-hover/btn:rotate-y-15 transition-all duration-500">shopping_cart</span>
                                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                                    </button>
                                @else
                                    <button onclick="inscribirCurso({{ $curso->id }})"
                                            class="btn-circular btn-premium btn-3d bg-gradient-to-r from-blue-600 via-cyan-600 to-sky-600 hover:from-blue-500 hover:via-cyan-500 hover:to-sky-500 text-white font-bold w-14 h-14 rounded-full transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-blue-500/40 hover:rotate-x-5 hover:-translate-z-4 flex items-center justify-center group/btn relative overflow-hidden"
                                            title="Inscribirse Gratis">
                                        <span class="material-icons text-lg group-hover/btn:scale-125 group-hover/btn:rotate-12 group-hover/btn:rotate-y-15 transition-all duration-500">add_circle</span>
                                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                                    </button>
                                @endif

                                <!-- Agregar al Carrito Button -->
                                @if(in_array(auth()->user()->tipo_usuario_id ?? 0, [3, 4]))
                                    <button onclick="agregarAlCarrito({{ $curso->id }})"
                                            class="btn-circular btn-premium btn-3d bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 hover:from-orange-500 hover:via-red-500 hover:to-pink-500 text-white font-bold w-14 h-14 rounded-full transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-orange-500/40 hover:rotate-x-5 hover:-translate-z-4 flex items-center justify-center group/btn relative overflow-hidden"
                                            title="Agregar al Carrito">
                                        <span class="material-icons text-lg group-hover/btn:scale-125 group-hover/btn:bounce group-hover/btn:rotate-y-15 transition-all duration-500">add_shopping_cart</span>
                                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                                    </button>
                                @endif
                            </div>

                            <!-- Multi-layer Hover Effects -->
                            <div class="absolute inset-0 rounded-3xl border-2 border-transparent group-hover:border-purple-400/40 transition-all duration-700 pointer-events-none"></div>
                            <div class="absolute inset-0 rounded-3xl border border-transparent group-hover:border-blue-400/20 transition-all duration-700 pointer-events-none"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $cursos->appends(request()->query())->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-200 dark:bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="material-icons text-gray-400 text-4xl">school</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No se encontraron cursos</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    No hay cursos que coincidan con tus criterios de búsqueda.
                </p>
                <a href="{{ route('cursos.catalogo') }}"
                   class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-500 hover:to-blue-500 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-purple-400/30 inline-flex items-center">
                    <span class="material-icons text-sm mr-2">refresh</span>
                    Ver Todos los Cursos
                </a>
            </div>
        @endif
    </main>
</div>

@push('styles')
<style>
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }

    /* Animaciones personalizadas para el modal */
    @keyframes bounce-gentle {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    @keyframes pulse-glow {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.05); }
    }

    @keyframes truck-drive {
        0% { transform: translateX(-10px); }
        50% { transform: translateX(10px); }
        100% { transform: translateX(-10px); }
    }

    .animate-bounce-gentle { animation: bounce-gentle 2s infinite; }
    .animate-pulse-glow { animation: pulse-glow 2s infinite; }
    .animate-truck-drive { animation: truck-drive 3s infinite; }

    /* Mejoras adicionales para las cards */
    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }

    .group:hover .group-hover\:text-purple-600 {
        color: rgb(147 51 234);
    }

    .dark .group:hover .group-hover\:text-purple-400 {
        color: rgb(196 181 253);
    }

    /* Animación de shimmer para las cards */
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .shimmer {
        position: relative;
        overflow: hidden;
    }

    .shimmer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        animation: shimmer 2s infinite;
    }

    /* Mejoras para los badges */
    .badge-glow {
        box-shadow: 0 0 20px rgba(147, 51, 234, 0.3);
    }

    .group:hover .badge-glow {
        box-shadow: 0 0 30px rgba(147, 51, 234, 0.5);
    }

    /* Animación de pulso para los botones */
    @keyframes button-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .group/btn:hover .group-hover\/btn\:scale-110 {
        animation: button-pulse 0.6s ease-in-out;
    }

    /* Efecto de glassmorphism mejorado */
    .glass-effect {
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .dark .glass-effect {
        background: rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Efectos avanzados para cards premium */
    .card-premium {
        position: relative;
        overflow: hidden;
    }

    .card-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        transition: left 0.5s;
    }

    .card-premium:hover::before {
        left: 100%;
    }

    /* Partículas flotantes */
    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(147, 51, 234, 0.6);
        border-radius: 50%;
        animation: float-particle 6s infinite ease-in-out;
    }

    .particle-1 {
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .particle-2 {
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }

    .particle-3 {
        bottom: 30%;
        left: 20%;
        animation-delay: 4s;
    }

    .particle-4 {
        top: 40%;
        right: 30%;
        animation-delay: 1s;
    }

    @keyframes float-particle {
        0%, 100% { transform: translateY(0px) scale(1); opacity: 0.6; }
        50% { transform: translateY(-20px) scale(1.2); opacity: 1; }
    }

    /* Efecto shimmer mejorado */
    .shimmer-effect {
        background: linear-gradient(45deg,
            transparent 30%,
            rgba(255,255,255,0.1) 50%,
            transparent 70%);
        background-size: 200% 200%;
        animation: shimmer-move 2s infinite;
    }

    @keyframes shimmer-move {
        0% { background-position: -200% -200%; }
        100% { background-position: 200% 200%; }
    }

    /* Animaciones para iconos */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .animate-float { animation: float 3s infinite ease-in-out; }

    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .animate-spin-slow { animation: spin-slow 8s linear infinite; }

    /* Patrón de puntos */
    .pattern-dots {
        background-image: radial-gradient(circle, rgba(255,255,255,0.3) 1px, transparent 1px);
        background-size: 20px 20px;
        animation: pattern-move 20s linear infinite;
    }

    @keyframes pattern-move {
        0% { background-position: 0 0; }
        100% { background-position: 20px 20px; }
    }

    /* Efectos de glow para badges */
    .price-glow {
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.4);
    }

    .free-glow {
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
    }

    .difficulty-glow {
        box-shadow: 0 0 15px rgba(147, 51, 234, 0.3);
    }

    /* Botones premium */
    .btn-premium {
        position: relative;
        overflow: hidden;
        transform: translateZ(0);
    }

    .btn-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .btn-premium:hover::before {
        left: 100%;
    }

    /* Efectos de imagen */
    .image-container {
        position: relative;
        overflow: hidden;
    }

    .image-container::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg,
            rgba(147, 51, 234, 0.1) 0%,
            transparent 50%,
            rgba(59, 130, 246, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.5s;
    }

    .group:hover .image-container::after {
        opacity: 1;
    }

    /* Mejoras de rendimiento */
    .transform-gpu {
        transform: translateZ(0);
        will-change: transform;
    }

    /* Efectos de hover mejorados */
    .group:hover .badge-premium {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    /* Animación de bounce personalizada */
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    .group-hover\/btn\:bounce:hover {
        animation: bounce 0.6s;
    }

    /* Rotación de iconos */
    .group-hover\/btn\:rotate-12:hover {
        transform: rotate(12deg);
    }

    /* Efectos 3D avanzados */
    .card-3d {
        transform-style: preserve-3d;
        perspective: 1000px;
    }

    .card-3d:hover {
        transform: perspective(1000px) rotateX(2deg) rotateY(2deg) scale(1.05) translateZ(20px);
    }

    /* Rotaciones 3D personalizadas */
    .hover\:rotate-x-2:hover {
        transform: rotateX(2deg);
    }

    .hover\:rotate-x-5:hover {
        transform: rotateX(5deg);
    }

    .hover\:rotate-y-5:hover {
        transform: rotateY(5deg);
    }

    .hover\:rotate-y-12:hover {
        transform: rotateY(12deg);
    }

    .hover\:rotate-y-15:hover {
        transform: rotateY(15deg);
    }

    .hover\:-translate-z-2:hover {
        transform: translateZ(-2px);
    }

    .hover\:-translate-z-4:hover {
        transform: translateZ(-4px);
    }

    /* Badges 3D */
    .badge-3d {
        transform-style: preserve-3d;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .badge-3d:hover {
        transform: perspective(500px) rotateY(12deg) translateZ(10px);
        box-shadow:
            0 10px 25px rgba(0,0,0,0.15),
            0 0 30px rgba(147, 51, 234, 0.3);
    }

    /* Botones 3D */
    .btn-3d {
        transform-style: preserve-3d;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .btn-3d:hover {
        transform: perspective(500px) rotateX(5deg) translateZ(15px);
        box-shadow:
            0 15px 35px rgba(0,0,0,0.2),
            0 0 40px rgba(147, 51, 234, 0.4);
    }

    /* Imagen 3D */
    .image-3d {
        transform-style: preserve-3d;
        perspective: 800px;
    }

    .image-3d:hover img {
        transform: perspective(800px) rotateY(5deg) translateZ(10px);
    }

    /* Efectos de profundidad */
    .group:hover .card-3d {
        transform: perspective(1000px) rotateX(2deg) rotateY(2deg) scale(1.05) translateZ(20px);
    }

    /* Sombras 3D dinámicas */
    .card-3d::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg,
            rgba(255,255,255,0.1) 0%,
            transparent 50%,
            rgba(0,0,0,0.1) 100%);
        opacity: 0;
        transition: opacity 0.5s;
        pointer-events: none;
    }

    .card-3d:hover::before {
        opacity: 1;
    }

    /* Efectos de iluminación 3D */
    .card-3d::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle,
            rgba(147, 51, 234, 0.1) 0%,
            transparent 70%);
        opacity: 0;
        transition: opacity 0.5s;
        pointer-events: none;
    }

    .card-3d:hover::after {
        opacity: 1;
    }

    /* Animaciones 3D para iconos */
    .group-hover\/btn\:rotate-y-15:hover {
        transform: rotateY(15deg) scale(1.1);
    }

    /* Efectos de parallax 3D */
    .particle {
        transform-style: preserve-3d;
    }

    .particle-1:hover {
        transform: translateZ(20px) rotateY(45deg);
    }

    .particle-2:hover {
        transform: translateZ(15px) rotateX(30deg);
    }

    .particle-3:hover {
        transform: translateZ(25px) rotateZ(60deg);
    }

    .particle-4:hover {
        transform: translateZ(10px) rotateY(-30deg);
    }

    /* Mejoras de rendimiento 3D */
    .card-3d,
    .badge-3d,
    .btn-3d,
    .image-3d {
        will-change: transform;
        backface-visibility: hidden;
    }

    /* Botones circulares 3D */
    .btn-circular {
        position: relative;
        transform-style: preserve-3d;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .btn-circular::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg,
            rgba(255,255,255,0.3) 0%,
            transparent 50%,
            rgba(0,0,0,0.1) 100%);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.5s;
        z-index: -1;
    }

    .btn-circular:hover::before {
        opacity: 1;
    }

    .btn-circular::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle,
            rgba(255,255,255,0.4) 0%,
            transparent 70%);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.5s ease;
        z-index: -1;
    }

    .btn-circular:hover::after {
        width: 120%;
        height: 120%;
    }

    /* Efectos de pulsación circular */
    @keyframes pulse-circular {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(147, 51, 234, 0.4);
        }
        70% {
            transform: scale(1.05);
            box-shadow: 0 0 0 10px rgba(147, 51, 234, 0);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(147, 51, 234, 0);
        }
    }

    .btn-circular:hover {
        animation: pulse-circular 1.5s infinite;
    }

    /* Efectos de rotación circular */
    .btn-circular:hover .material-icons {
        animation: rotate-icon 0.8s ease-in-out;
    }

    @keyframes rotate-icon {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(180deg) scale(1.2); }
        100% { transform: rotate(360deg) scale(1); }
    }

    /* Sombras circulares dinámicas */
    .btn-circular {
        box-shadow:
            0 4px 15px rgba(0,0,0,0.1),
            0 0 0 1px rgba(255,255,255,0.1);
    }

    .btn-circular:hover {
        box-shadow:
            0 8px 25px rgba(0,0,0,0.2),
            0 0 0 2px rgba(255,255,255,0.2),
            0 0 30px rgba(147, 51, 234, 0.3);
    }

    /* Efectos de profundidad circular */
    .btn-circular {
        transform: perspective(500px) translateZ(0);
    }

    .btn-circular:hover {
        transform: perspective(500px) translateZ(20px) rotateX(5deg);
    }

    /* Tooltip circular */
    .btn-circular[title]:hover::after {
        content: attr(title);
        position: absolute;
        bottom: -40px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 12px;
        white-space: nowrap;
        z-index: 50;
        pointer-events: none;
        animation: tooltip-fade 0.3s ease;
    }

    .btn-circular[title]:hover::before {
        content: '';
        position: absolute;
        bottom: -30px;
        left: 50%;
        transform: translateX(-50%);
        border: 6px solid transparent;
        border-bottom-color: rgba(0, 0, 0, 0.8);
        z-index: 50;
        pointer-events: none;
    }

    @keyframes tooltip-fade {
        0% { opacity: 0; transform: translateX(-50%) translateY(10px); }
        100% { opacity: 1; transform: translateX(-50%) translateY(0); }
    }

    /* Estilos para filtros avanzados */
    .filter-particle {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(147, 51, 234, 0.4);
        border-radius: 50%;
        animation: filter-float 8s infinite ease-in-out;
    }

    .filter-particle-1 {
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .filter-particle-2 {
        top: 60%;
        right: 15%;
        animation-delay: 3s;
    }

    .filter-particle-3 {
        bottom: 30%;
        left: 20%;
        animation-delay: 6s;
    }

    @keyframes filter-float {
        0%, 100% { transform: translateY(0px) scale(1); opacity: 0.4; }
        50% { transform: translateY(-30px) scale(1.3); opacity: 0.8; }
    }

    /* Estilos para inputs de filtro */
    .filter-input {
        position: relative;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .filter-input:focus {
        transform: translateY(-2px);
        box-shadow:
            0 10px 25px rgba(147, 51, 234, 0.15),
            0 0 0 3px rgba(147, 51, 234, 0.1);
    }

    .filter-input:hover {
        transform: translateY(-1px);
    }

    /* Estilos para selects de filtro */
    .filter-select {
        position: relative;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .filter-select:focus {
        transform: translateY(-2px);
        box-shadow:
            0 10px 25px rgba(34, 197, 94, 0.15),
            0 0 0 3px rgba(34, 197, 94, 0.1);
    }

    .filter-select:hover {
        transform: translateY(-1px);
    }

    /* Estilos para botones de filtro */
    .filter-btn {
        position: relative;
        transform-style: preserve-3d;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .filter-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .filter-btn:hover::before {
        left: 100%;
    }

    .filter-btn:hover {
        transform: perspective(500px) rotateX(5deg) translateZ(10px);
        box-shadow:
            0 15px 35px rgba(0,0,0,0.2),
            0 0 40px rgba(147, 51, 234, 0.4);
    }

    /* Efectos de shimmer para filtros */
    .filter-input::after,
    .filter-select::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        transition: left 0.5s;
        border-radius: 2xl;
    }

    .filter-input:hover::after,
    .filter-select:hover::after {
        left: 100%;
    }

    /* Animaciones para iconos de filtro */
    .filter-input:focus + .material-icons,
    .filter-select:focus + .material-icons {
        animation: icon-pulse 0.6s ease-in-out;
    }

    @keyframes icon-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.2); }
    }

    /* Efectos de profundidad para filtros */
    .filter-input,
    .filter-select {
        transform-style: preserve-3d;
    }

    .filter-input:focus,
    .filter-select:focus {
        transform: perspective(500px) translateZ(5px);
    }

    /* Mejoras de accesibilidad */
    .filter-input:focus-visible,
    .filter-select:focus-visible {
        outline: 2px solid rgba(147, 51, 234, 0.5);
        outline-offset: 2px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .filter-input,
        .filter-select {
            padding: 1rem;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
// Función para comprar curso directamente
function comprarCurso(cursoId) {
    if (confirm('¿Estás seguro de que quieres comprar este curso?')) {
        // Crear formulario para procesar la compra
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("cursos.inscribir", ":id") }}'.replace(':id', cursoId);

        // Agregar token CSRF
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);

        // Agregar método
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'POST';
        form.appendChild(methodField);

        document.body.appendChild(form);
        form.submit();
    }
}

// Función para inscribirse en curso gratuito
function inscribirCurso(cursoId) {
    if (confirm('¿Te quieres inscribir en este curso gratuito?')) {
        // Crear formulario para procesar la inscripción
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("cursos.inscribir", ":id") }}'.replace(':id', cursoId);

        // Agregar token CSRF
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);

        // Agregar método
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'POST';
        form.appendChild(methodField);

        document.body.appendChild(form);
        form.submit();
    }
}

// Función para agregar curso al carrito
function agregarAlCarrito(cursoId) {
    // Verificar si el usuario tiene acceso al carrito
    const userTipo = {{ auth()->user()->tipo_usuario_id ?? 0 }};
    if (![3, 4].includes(userTipo)) {
        showNotification('El carrito solo está disponible para estudiantes. Contacta al administrador.', 'error');
        return;
    }

    // Mostrar loading
    const button = event.target;
    const originalText = button.innerHTML;
    button.innerHTML = '<span class="material-icons text-sm mr-2 animate-spin">refresh</span>Agregando...';
    button.disabled = true;

    // Crear FormData para enviar como form normal (no JSON)
    const formData = new FormData();
    formData.append('curso_id', cursoId);
    formData.append('quantity', 1);
    formData.append('_token', '{{ csrf_token() }}');

    // Hacer petición AJAX
    fetch('{{ route("carrito.add") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => {
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers);

        if (response.status === 403) {
            throw new Error('No tienes permisos para usar el carrito. Solo estudiantes pueden agregar cursos al carrito.');
        }

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        return response.text();
    })
    .then(data => {
        console.log('Response data:', data);

        // Si la respuesta es HTML (redirect), significa que fue exitoso
        if (data.includes('<!DOCTYPE html>') || data.includes('<html')) {
            showCartSuccessModal();
            updateCartCounter();
        } else {
            // Intentar parsear como JSON si no es HTML
            try {
                const jsonData = JSON.parse(data);
                if (jsonData.success) {
                    showCartSuccessModal();
                    updateCartCounter();
                } else {
                    showNotification(jsonData.message || 'Error al agregar el curso al carrito', 'error');
                }
            } catch (e) {
                // Si no se puede parsear como JSON, asumir que fue exitoso
                showCartSuccessModal();
                updateCartCounter();
            }
        }
    })
    .catch(error => {
        console.error('Error completo:', error);

        if (error.message.includes('403')) {
            showNotification('No tienes permisos para usar el carrito. Solo estudiantes pueden agregar cursos al carrito.', 'error');
        } else if (error.message.includes('500')) {
            showNotification('Error del servidor. Intenta nuevamente más tarde.', 'error');
        } else {
            showNotification('Error al agregar el curso al carrito: ' + error.message, 'error');
        }
    })
    .finally(() => {
        // Restaurar botón
        button.innerHTML = originalText;
        button.disabled = false;
    });
}

// Función para mostrar modal de éxito del carrito
function showCartSuccessModal() {
    // Crear modal
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4';
    modal.innerHTML = `
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 max-w-lg w-full mx-4 transform transition-all duration-500 scale-95 opacity-0" id="cart-success-modal">
            <!-- Imágenes lado a lado -->
            <div class="flex items-center justify-center space-x-8 mb-6">
                <!-- Robot -->
                <div class="text-center">
                    <img src="{{ asset('wallpaper-media/softlinkia-friend-buy-course.png') }}"
                         alt="SoftLinkIA Friend"
                         class="w-24 h-24 mx-auto animate-bounce-gentle">
                </div>

                <!-- Truck -->
                <div class="text-center">
                    <img src="{{ asset('wallpaper-media/truck-buys.png') }}"
                         alt="Delivery Truck"
                         class="w-20 h-16 mx-auto animate-truck-drive">
                </div>
            </div>

            <!-- Mensaje simple -->
            <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                    ¡Curso Agregado al Carrito!
                </h3>
            </div>

            <!-- Botón de cerrar -->
            <div class="text-center">
                <button onclick="cerrarModal()"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    Cerrar
                </button>
            </div>

            <!-- Close button -->
            <button onclick="cerrarModal()"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200">
                <span class="material-icons">close</span>
            </button>
        </div>
    `;

    document.body.appendChild(modal);

    // Animar entrada del modal
    setTimeout(() => {
        const modalContent = document.getElementById('cart-success-modal');
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 100);

    // Auto-cerrar después de 5 segundos
    setTimeout(() => {
        if (document.body.contains(modal)) {
            cerrarModal();
        }
    }, 5000);
}


// Función para cerrar modal
function cerrarModal() {
    const modal = document.querySelector('.fixed.inset-0');
    if (modal) {
        const modalContent = document.getElementById('cart-success-modal');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.remove();
        }, 300);
    }
}

// Función para mostrar notificaciones
function showNotification(message, type = 'info') {
    // Crear elemento de notificación
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;

    // Colores según el tipo
    if (type === 'success') {
        notification.className += ' bg-green-500 text-white';
    } else if (type === 'error') {
        notification.className += ' bg-red-500 text-white';
    } else {
        notification.className += ' bg-blue-500 text-white';
    }

    notification.innerHTML = `
        <div class="flex items-center">
            <span class="material-icons text-sm mr-2">${type === 'success' ? 'check_circle' : type === 'error' ? 'error' : 'info'}</span>
            <span>${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                <span class="material-icons text-sm">close</span>
            </button>
        </div>
    `;

    document.body.appendChild(notification);

    // Animar entrada
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    // Auto-remover después de 5 segundos
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 300);
    }, 5000);
}

// Función para actualizar contador del carrito
function updateCartCounter() {
    // Hacer petición para obtener el número de items en el carrito
    fetch('{{ route("carrito.index") }}', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Actualizar contador en el header si existe
        const cartCounter = document.querySelector('.cart-counter');
        if (cartCounter && data.count !== undefined) {
            cartCounter.textContent = data.count;
            cartCounter.style.display = data.count > 0 ? 'block' : 'none';
        }
    })
    .catch(error => {
        console.error('Error updating cart counter:', error);
    });
}
</script>
@endpush
@endsection
