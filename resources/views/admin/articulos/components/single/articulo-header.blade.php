@props(['articulo', 'lecturaMin'])

<header class="relative overflow-hidden" style="min-height: 70vh;">
    <!-- Background Image -->
    <div class="absolute inset-0 z-10">
        @php
            $fallbackFirst = null;
            if ($fallbackFirst) {
                $fallbackFirst = asset('storage/' . ltrim($fallbackFirst, '/'));
            }
            $hero = $articulo->url_imagen
                ? asset('storage/' . ltrim($articulo->url_imagen, '/'))
                : ($articulo->url_imagen_banner ?: $fallbackFirst);
        @endphp
        @if($hero)
            <img src="{{ $hero }}" alt="{{ $articulo->titulo }}"
                class="w-full h-full object-contain opacity-30">
        @else
            <div class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 opacity-60"></div>
        @endif
    </div>

    <!-- Dark Overlay -->
    <div class="absolute inset-0 z-20 bg-gradient-to-br from-slate-900/80 via-blue-900/70 to-cyan-900/80"></div>

    <!-- Hero Content -->
    <div class="relative z-30 flex flex-col justify-center h-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
            <!-- Categories -->
            @if($articulo->categoria)
                <div class="mb-6">
                    <div class="flex flex-wrap gap-2 justify-center">
                        @php
                            $categorias = array_filter(array_map('trim', explode(',', $articulo->categoria)));
                            $categorias = array_unique($categorias);
                        @endphp
                        @foreach($categorias as $categoria)
                            @if(!empty($categoria))
                                @include('admin.articulos.components.shared.category-tag', ['categoria' => $categoria, 'size' => 'normal'])
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Main Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                {{ $articulo->titulo }}
            </h1>

            @if($articulo->subtitulo)
                <p class="text-xl text-blue-100 mb-8 leading-relaxed max-w-4xl mx-auto text-center">
                    {{ $articulo->subtitulo }}
                </p>
            @endif

            <!-- Nivel de Dificultad -->
            <div class="mb-6 flex justify-center">
                @include('admin.articulos.components.shared.difficulty-tag', ['nivel' => $articulo->nivel_dificultad, 'size' => 'normal'])
            </div>

            <!-- Author and Metadata -->
            <div class="flex flex-wrap items-center gap-6 text-blue-200 mb-6 justify-center">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-2">
                        <span class="material-icons text-white text-sm">person</span>
                    </div>
                    <span>Por {{ $articulo->autor->name }} {{ $articulo->autor->apellido_paterno }} {{ $articulo->autor->apellido_materno }} | {{ $articulo->created_at->format('d \d\e F \d\e Y') }}</span>
                </div>
                @if(isset($lecturaMin))
                    <div class="flex items-center">
                        <span class="material-icons text-sm mr-1">timer</span>
                        <span>Tiempo de lectura: {{ $lecturaMin }} min</span>
                    </div>
                @endif
            </div>

            <!-- Social Share Buttons - Mobile/Tablet -->
            @include('admin.articulos.components.shared.social-share-mobile', ['articulo' => $articulo])
        </div>
    </div>
</header>
