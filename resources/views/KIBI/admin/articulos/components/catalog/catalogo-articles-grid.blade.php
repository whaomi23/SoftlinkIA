@props(['articulos'])

<link rel="stylesheet" href="{{ asset('css/articles-grid.css') }}">

<!-- Loading Indicator -->
<div id="loading-indicator" style="display: none;" class="flex justify-center items-center mb-8">
  <div class="inline-flex items-center px-6 py-3 bg-white rounded-xl shadow-xl border border-gray-200 backdrop-blur-sm animate-pulse">
    <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-kibi-primary mr-3"></div>
    <span class="text-slate-700 font-medium tracking-wide">Cargando artículos...</span>
  </div>
</div>

<!-- Articles Grid -->
<div class="articles-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8 w-full">
  @forelse($articulos as $articulo)
    <article 
      class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-700 transform hover:scale-105 cursor-pointer h-[520px] flex flex-col">

      <!-- Efectos de fondo animados -->
      <div class="absolute inset-0 bg-gradient-to-br from-kibi-primary/10 via-kibi-secondary/5 to-kibi-highlight/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-transparent via-kibi-primary/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

      <!-- Contenido -->
      <div class="relative z-10 rounded-2xl overflow-hidden bg-white backdrop-blur-sm border border-gray-200 h-full flex flex-col">
        @php
            $cardImg = $articulo->url_imagen
                ? asset('storage/' . ltrim($articulo->url_imagen, '/'))
                : $articulo->url_imagen_banner;
        @endphp

        <!-- Imagen -->
        <div class="relative h-48 overflow-hidden flex-shrink-0 bg-gradient-to-br from-gray-100 to-gray-200">
          @if($cardImg)
            <img src="{{ $cardImg }}" alt="{{ $articulo->titulo }}" class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
          @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-kibi-primary/20 to-kibi-secondary/20 group-hover:from-kibi-primary/30 group-hover:to-kibi-secondary/30 transition-all duration-500">
              <span class="material-icons text-kibi-primary text-5xl opacity-80 group-hover:opacity-100 group-hover:rotate-12 transition-all duration-500">article</span>
            </div>
          @endif
          <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <div class="p-6 flex flex-col flex-grow overflow-hidden">
          <!-- Categorías -->
          @php
            $categorias = $articulo->categoria ? array_unique(array_filter(array_map('trim', explode(',', $articulo->categoria)))) : [];
          @endphp
          @if(count($categorias) > 0)
            <div class="flex flex-wrap gap-2 mb-3 min-h-[32px] break-words overflow-hidden">
              @foreach(array_slice($categorias, 0, 3) as $categoria)
                @include('KIBI.admin.articulos.components.shared.category-tag', ['categoria' => $categoria])
              @endforeach
            </div>
          @else
            <div class="min-h-[32px] mb-3"></div>
          @endif

          <!-- Título -->
          <h3 class="text-xl font-bold text-black mb-3 line-clamp-2 group-hover:text-kibi-primary transition-colors duration-500 min-h-[56px] break-words overflow-hidden">
            {{ $articulo->titulo }}
          </h3>

          <!-- Subtítulo -->
          <p class="text-gray-700 text-sm leading-relaxed line-clamp-3 mb-4 group-hover:text-gray-800 transition-colors duration-500 min-h-[60px] break-words overflow-hidden">
            {{ $articulo->subtitulo ?? 'Sin descripción disponible' }}
          </p>

          <!-- Dificultad -->
          <div class="mb-4 min-h-[32px]">
            @include('KIBI.admin.articulos.components.shared.difficulty-tag', ['nivel' => $articulo->nivel_dificultad])
          </div>

          <!-- Footer -->
          <div class="flex justify-between items-center mt-auto pt-4">
            <span class="text-sm text-gray-600 group-hover:text-gray-700 transition-colors duration-500">{{ $articulo->created_at->format('d M Y') }}</span>
            <div class="relative overflow-hidden bg-gradient-to-r from-kibi-primary to-kibi-secondary text-white px-4 py-2 rounded-xl font-semibold text-sm transition-transform transform hover:scale-105 shadow-lg shadow-kibi-primary/30">
              <span class="flex items-center gap-1">
                <span class="material-icons text-sm">arrow_forward</span> VER
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Enlace invisible -->
      <a href="{{ route('kibi.articulos.ver', $articulo) }}" 
        class="absolute inset-0 z-20"
        title="Ver artículo: {{ $articulo->titulo }}" 
        aria-label="Ver artículo completo: {{ $articulo->titulo }}"></a>

      <!-- Borde de neón -->
      <div class="absolute inset-0 rounded-2xl border-2 border-kibi-primary/30 group-hover:border-kibi-primary group-hover:shadow-[0_0_20px_rgba(2,175,201,0.4)] transition-all duration-500"></div>
    </article>
  @empty
    <div class="col-span-full text-center py-20">
      <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-kibi-primary/20 to-kibi-secondary/20 rounded-3xl mb-6">
        <span class="material-icons text-4xl text-kibi-primary">article</span>
      </div>
      <h3 class="text-2xl font-bold text-black mb-3">No hay artículos KIBI</h3>
      <p class="text-gray-700 max-w-md mx-auto">Comienza creando tu primer artículo KIBI y comparte tu conocimiento con el mundo</p>
    </div>
  @endforelse
</div>

@include('KIBI.admin.articulos.components.shared.pagination', ['paginator' => $articulos])
