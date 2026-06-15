@extends('layouts.app')

@section('title', $articulo->titulo . ' - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Header Section with Article Image -->
        @include('admin.articulos.components.single.articulo-header', ['articulo' => $articulo, 'lecturaMin' => $lecturaMin ?? null])

        <!-- Main Content Area -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3 relative">
                    <!-- Redes Sociales Fijas - Solo en Desktop y fijas al scroll -->
                    @include('admin.articulos.components.shared.social-share-fixed')
                    
                    <!-- Article Content -->
                    @include('admin.articulos.components.single.articulo-content', ['articulo' => $articulo, 'sections' => $sections ?? []])

                    <!-- Acerca del Autor -->
                    @include('admin.articulos.components.single.articulo-author', ['articulo' => $articulo])
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    @include('admin.articulos.components.single.articulo-sidebar', ['articulo' => $articulo, 'sections' => $sections ?? []])
                </div>
            </div>
        </div>

        <!-- Artículos Relacionados -->
        <h2 class="animated-subtitle text-xl font-bold text-white mb-4 text-center">Articulos Recomendados</h2>
        @include('admin.articulos.components.shared.articulos-relacionados', ['articulos' => $articulosRelacionados, 'routeName' => 'articulos.ver'])

        <!-- Promotional Section -->
        @include('admin.articulos.components.single.articulo-promotional')
    </div>
    
    @include('admin.articulos.components.modals.contact-form-modal')
@endsection

@push('scripts')
    <script src="{{ asset('js/articulos/ver.js') }}"></script>
    <script src="{{ asset('js/newsletter.js') }}"></script>
@endpush
