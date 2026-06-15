@extends('KIBI.layouts.auth')

@section('title', 'Artículos KIBI - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-white">
        <!-- Hero Section -->
        @include('KIBI.admin.articulos.components.admin.admin-hero', ['articulos' => $articulos])

        <!-- Content Section -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <!-- Espaciado adicional para acercar el filtro al contenido -->
            <div class="relative z-20 mb-8"></div>
            <!-- Elementos de parallax -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="parallax-element" data-speed="0.3" style="top: 10%; left: 10%;">
                    <div class="w-32 h-32 bg-kibi-primary/10 rounded-full blur-xl animate-pulse"></div>
                </div>
                <div class="parallax-element" data-speed="0.7" style="top: 60%; right: 15%;">
                    <div class="w-24 h-24 bg-kibi-secondary/10 rounded-full blur-xl animate-pulse" style="animation-delay: 1s;"></div>
                </div>
                <div class="parallax-element" data-speed="0.4" style="bottom: 20%; left: 20%;">
                    <div class="w-40 h-40 bg-kibi-highlight/10 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
                </div>
            </div>

            <!-- Category Filters Carousel -->
            @include('KIBI.admin.articulos.components.catalog.category-filters', ['categorias' => $categorias ?? []])

            <!-- Success Message -->
            @if(session('success'))
                <div
                    class="mb-8 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl">
                    <div class="flex items-center">
                        <span class="material-icons text-green-600 mr-3">check_circle</span>
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Articles Grid -->
            @include('KIBI.admin.articulos.components.admin.admin-articles-grid', ['articulos' => $articulos])

            <!-- Pagination -->
            @include('KIBI.admin.articulos.components.shared.pagination', ['paginator' => $articulos, 'class' => 'mt-12'])
        </div>
    </div>

    <!-- Incluir modales como componentes -->
    @include('KIBI.admin.articulos.components.modals.articulo-create')
    @include('KIBI.admin.articulos.components.modals.articulo-edit')
    @include('KIBI.admin.articulos.components.modals.articulo-delete')

@endsection
<!-- Scripts -->
@push('scripts')
    <script src="{{ asset('js/kibi/summernote-config.js') }}"></script>
    <script src="{{ asset('js/kibi/articulos-admin.js') }}"></script>
    <script src="{{ asset('js/articulos/creador-category-carousel.js') }}"></script>
@endpush
