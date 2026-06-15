@extends('KIBI.layouts.auth')

@section('title', 'Catálogo KIBI - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-white">
        <!-- Hero Section -->
        @include('KIBI.admin.articulos.components.catalog.catalogo-hero')

        <!-- Main Content Area -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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

            <div class="relative z-20">
                <!-- Main Content Column (full width) -->
                <div class="w-full">
                    @include('KIBI.admin.articulos.components.catalog.catalogo-articles-grid', ['articulos' => $articulos])
                </div>
            </div>
        </div>

    </div>

    @include('KIBI.admin.articulos.components.modals.contact-form-modal')
    @push('scripts')
        <script src="{{ asset('js/articulos/catalogo.js') }}"></script>
        <script src="{{ asset('js/newsletter.js') }}"></script>
    @endpush
@endsection
