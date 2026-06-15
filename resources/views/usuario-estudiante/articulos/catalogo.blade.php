@extends('layouts.app')

@section('title', 'Blog - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Hero Section -->
        @include('admin.articulos.components.catalog.catalogo-hero')

        <!-- Main Content Area -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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

            <div class="relative z-20 grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content Column (3/4 width) -->
                <div class="lg:col-span-3">
                    @include('admin.articulos.components.catalog.catalogo-articles-grid', ['articulos' => $articulos])
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    @include('admin.articulos.components.catalog.catalogo-sidebar')
                </div>
            </div>
        </div>

    </div>


	@include('admin.articulos.components.modals.contact-form-modal')
    @push('scripts')
        <script src="{{ asset('js/articulos/catalogo.js') }}"></script>
        <script src="{{ asset('js/newsletter.js') }}"></script>
    @endpush
@endsection

