@extends('layouts.app')

@section('title', 'Casos de Éxito - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-900">
        <!-- Hero Section -->
        @include('admin.casos-exito.components.admin.admin-casos-exito-hero', ['casosExito' => $casosExito])

        <!-- Content Section -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <!-- Espaciado adicional para acercar el filtro al contenido -->
            <div class="relative z-20 mb-8"></div>
            <!-- Elementos de parallax -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="parallax-element" data-speed="0.3" style="top: 10%; left: 10%;">
                    <div class="w-32 h-32 bg-cyan-400/10 rounded-full blur-xl animate-pulse"></div>
                </div>
                <div class="parallax-element" data-speed="0.7" style="top: 60%; right: 15%;">
                    <div class="w-24 h-24 bg-indigo-500/10 rounded-full blur-xl animate-pulse" style="animation-delay: 1s;"></div>
                </div>
                <div class="parallax-element" data-speed="0.4" style="bottom: 20%; left: 20%;">
                    <div class="w-40 h-40 bg-blue-500/10 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
                </div>
            </div>

            <!-- Category Filters Carousel -->
            @include('admin.casos-exito.components.catalog.category-casos-exito-filters', ['categorias' => $categorias ?? []])

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

            <!-- Success Cases Grid -->
            @include('admin.casos-exito.components.admin.admin-casos-exito-grid', ['casosExito' => $casosExito])

            <!-- Pagination -->
            @include('admin.casos-exito.components.shared.pagination', ['paginator' => $casosExito, 'class' => 'mt-12 pagination-container'])
        </div>
    </div>

    <!-- Incluir modales como componentes -->
    @include('admin.casos-exito.components.modals.casos-exito-create')
    @include('admin.casos-exito.components.modals.casos-exito-edit')
    @include('admin.casos-exito.components.modals.casos-exito-delete')

@endsection
<!-- Scripts -->
@push('scripts')
        <script src="{{ asset('js/casos-exito/summernote-config.js') }}"></script>
        <script src="{{ asset('js/casos-exito/casos-exito-admin.js') }}"></script>
        <script src="{{ asset('js/casos-exito/creador-category-carousel.js') }}"></script>
@endpush

