@extends('layouts.app')

@section('title', 'Mis Artículos - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Hero Section -->
        @include('admin.articulos.components.creator.creador-hero', ['articulos' => $articulos])

        <!-- Content Section -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <!-- Espaciado adicional para acercar el filtro al contenido -->
            <div class="relative z-20 mb-8"></div>
            <!-- Elementos de parallax -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="parallax-element" data-speed="0.3" style="top: 10%; left: 10%;">
                    <div class="w-32 h-32 bg-cyan-500/10 rounded-full blur-xl animate-pulse"></div>
                </div>
                <div class="parallax-element" data-speed="0.7" style="top: 60%; right: 15%;">
                    <div class="w-24 h-24 bg-purple-500/10 rounded-full blur-xl animate-pulse" style="animation-delay: 1s;"></div>
                </div>
                <div class="parallax-element" data-speed="0.4" style="bottom: 20%; left: 20%;">
                    <div class="w-40 h-40 bg-blue-500/10 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
                </div>
            </div>

            <!-- Category Filters Carousel -->
            @include('admin.articulos.components.catalog.category-filters', ['categorias' => $categorias ?? []])


            <!-- Success Message -->
            @if(session('success'))
                <div
                    class="mb-8 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800 rounded-2xl">
                    <div class="flex items-center">
                        <span class="material-icons text-green-600 dark:text-green-400 mr-3">check_circle</span>
                        <p class="text-green-800 dark:text-green-200 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Articles Grid -->
            @include('admin.articulos.components.creator.creador-articles-grid', ['articulos' => $articulos])

            <!-- Pagination -->
            @include('admin.articulos.components.shared.pagination', ['paginator' => $articulos, 'class' => 'mt-12'])
        </div>
    </div>

    <!-- Incluir modales como componentes -->
    @include('admin.articulos.components.modals.articulo-create')
    @include('admin.articulos.components.modals.articulo-edit')
    @include('admin.articulos.components.modals.articulo-delete')
@endsection

@push('scripts')
    <script src="{{ asset('js/articulos/summernote-config.js') }}"></script>
    <script src="{{ asset('js/articulos/articulos-admin.js') }}"></script>
    <script src="{{ asset('js/articulos/creador-category-carousel.js') }}"></script>
@endpush
