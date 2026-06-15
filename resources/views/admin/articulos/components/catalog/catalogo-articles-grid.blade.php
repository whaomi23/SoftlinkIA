@props(['articulos'])

<style>
@keyframes gradient-x {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}
.animate-gradient-x {
  background-size: 200% 200%;
  animation: gradient-x 4s ease infinite;
}

@keyframes shimmer {
  0% { background-position: -200% 0; }
  100% { background-position: 200% 0; }
}
.btn-shimmer {
  background-image: linear-gradient(110deg, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0.1) 40%, rgba(255,255,255,0) 80%);
  background-size: 200% 100%;
  animation: shimmer 2.5s infinite linear;
}
</style>

<link rel="stylesheet" href="{{ asset('css/articles-grid.css') }}">

<!-- Loading Indicator -->
<div id="loading-indicator" style="display: none;" class="flex justify-center items-center mb-8">
  <div class="inline-flex items-center px-6 py-3 bg-white/90 rounded-xl shadow-xl border border-slate-200/70 backdrop-blur-sm animate-pulse">
    <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-500 mr-3"></div>
    <span class="text-gray-700 font-medium tracking-wide">Cargando artículos...</span>
  </div>
</div>

<!-- Articles Grid -->
<div class="articles-grid grid grid-cols-1 md:grid-cols-2 gap-8">
@forelse($articulos as $articulo)
  <article 
    data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
    class="group relative overflow-hidden rounded-2xl shadow-2xl transition-all duration-700 h-[580px] flex flex-col transform hover:scale-[1.02] hover:translate-y-[-6px] hover:rotate-[1deg] hover:shadow-blue-500/25">

    <!-- Fondo animado -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-cyan-400/10 to-purple-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 z-0"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,212,255,0.25),transparent_70%)] opacity-0 group-hover:opacity-100 transition-opacity duration-700 z-0"></div>

    <!-- Contenido -->
    <div class="relative z-10 rounded-2xl overflow-hidden bg-slate-900/50 backdrop-blur-lg border border-slate-700/50 h-full flex flex-col pointer-events-none">
      @php
          $cardImg = $articulo->url_imagen
              ? asset('storage/' . ltrim($articulo->url_imagen, '/'))
              : $articulo->url_imagen_banner;
      @endphp

        <!-- Imagen -->
        <div class="relative h-56 overflow-hidden flex-shrink-0 bg-gradient-to-br from-slate-800 to-slate-900">
          @if($cardImg)
            <img src="{{ $cardImg }}" alt="{{ $articulo->titulo }}" class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-110">
          @else
          <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900">
            <span class="material-icons text-cyan-300 text-5xl opacity-70 group-hover:opacity-100 transition-opacity duration-500">article</span>
          </div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
      </div>

      <div class="p-6 flex flex-col flex-grow overflow-hidden">
        <!-- Categorías -->
        @php
          $categorias = $articulo->categoria ? array_unique(array_filter(array_map('trim', explode(',', $articulo->categoria)))) : [];
        @endphp
        @if(count($categorias) > 0)
          <div class="flex flex-wrap gap-2 mb-4 h-[32px] overflow-hidden break-words">
            @foreach(array_slice($categorias, 0, 3) as $categoria)
              @include('admin.articulos.components.shared.category-tag', ['categoria' => $categoria])
            @endforeach
          </div>
        @else
          <div class="mb-4 h-[32px]"></div>
        @endif

        <!-- Título -->
        <h3 class="text-xl font-bold text-white mb-4 line-clamp-2 h-[64px] group-hover:text-cyan-300 transition-all duration-500 break-words overflow-hidden">
          {{ $articulo->titulo }}
        </h3>

        <!-- Subtítulo -->
        <p class="text-slate-300 text-sm leading-relaxed line-clamp-3 mb-4 h-[72px] group-hover:text-slate-100 transition-colors duration-500 break-words overflow-hidden">
          {{ $articulo->subtitulo ?? 'Sin descripción disponible' }}
        </p>

        <!-- Dificultad -->
        <div class="mb-6 h-[40px] flex items-center">
          @include('admin.articulos.components.shared.difficulty-tag', ['nivel' => $articulo->nivel_dificultad])
        </div>

        <!-- Footer -->
        <div class="flex justify-between items-center mt-auto h-[48px]">
          <span class="text-sm text-slate-400">{{ $articulo->created_at->format('d M Y') }}</span>
          <div class="relative overflow-hidden bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-4 py-2 rounded-xl font-semibold text-sm transition-transform transform hover:scale-105 shadow-lg shadow-blue-500/30 btn-shimmer">
            <span class="flex items-center gap-1">
              <span class="material-icons text-sm">arrow_forward</span> VER
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Enlace invisible para toda la tarjeta -->
    <a href="{{ route('articulos.ver', $articulo) }}" 
       class="absolute inset-0 z-20"
       title="Ver artículo: {{ $articulo->titulo }}" 
       aria-label="Ver artículo completo: {{ $articulo->titulo }}"></a>

    <!-- Borde animado -->
    <div class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover:border-transparent pointer-events-none">
      <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 opacity-0 group-hover:opacity-100 blur-[2px] animate-gradient-x"></div>
    </div>
  </article>
@empty
  <div class="col-span-full text-center py-20">
    <div class="inline-flex items-center justify-center w-24 h-24 rounded-2xl mb-6 bg-slate-800/50 backdrop-blur-lg border border-slate-700/60 shadow-lg">
      <span class="material-icons text-4xl text-cyan-300">article</span>
    </div>
    <h3 class="text-2xl font-bold text-white mb-3">No hay artículos</h3>
    <p class="text-slate-300 max-w-md mx-auto">Comienza creando tu primer artículo y comparte tu conocimiento con el mundo</p>
  </div>
@endforelse
</div>

@include('admin.articulos.components.shared.pagination', ['paginator' => $articulos])
