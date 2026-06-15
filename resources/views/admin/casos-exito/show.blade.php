@extends('layouts.app')

@section('title', $casoExito->titulo . ' - SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-900">
        <!-- Header Section with Success Case Image -->
        @include('admin.casos-exito.components.single.casos-exito-header', ['casoExito' => $casoExito, 'lecturaMin' => $lecturaMin ?? null])

        <!-- Main Content Area -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="relative lg:ml-8">
                <!-- Redes Sociales Fijas - Solo en Desktop y fijas al scroll -->
                @include('admin.casos-exito.components.shared.social-share-fixed')
                
                <!-- Success Case Content -->
                @include('admin.casos-exito.components.single.casos-exito-content', ['casoExito' => $casoExito, 'sections' => $sections ?? []])

                <!-- Acerca del Autor -->
                @include('admin.casos-exito.components.single.casos-exito-author', ['casoExito' => $casoExito])
            </div>
        </div>

        <!-- Casos de Éxito Relacionados -->
        <h2 class="animated-subtitle text-xl font-bold text-white mb-4 text-center">Casos de Éxito Recomendados</h2>
        @include('admin.casos-exito.components.shared.casos-exito-relacionados', ['casosExito' => $casosExitoRelacionados ?? [], 'routeName' => 'admin.casos-exito.show'])

        <!-- Promotional Section -->
        @include('admin.casos-exito.components.single.casos-exito-promotional')
    </div>
    
    @include('admin.casos-exito.components.modals.contact-form-modal')
@endsection

@push('scripts')
    <script src="{{ asset('js/casos-exito/ver.js') }}"></script>
    <script src="{{ asset('js/newsletter.js') }}"></script>
@endpush
