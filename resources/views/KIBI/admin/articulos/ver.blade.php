@extends('KIBI.layouts.auth')

@section('title', $articulo->titulo . ' - KIBI SoftLinkIA')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">
        <!-- Header Section with Article Image -->
        @include('KIBI.admin.articulos.components.single.articulo-header', ['articulo' => $articulo, 'lecturaMin' => $lecturaMin ?? null])

        <!-- Main Content Area -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3 relative">
                    <!-- Redes Sociales Fijas - Solo en Desktop y fijas al scroll -->
                    @include('KIBI.admin.articulos.components.shared.social-share-fixed')
                    
                    <!-- Article Content -->
                    @include('KIBI.admin.articulos.components.single.articulo-content', ['articulo' => $articulo, 'sections' => $sections ?? []])

                    <!-- Acerca del Autor -->
                    @include('KIBI.admin.articulos.components.single.articulo-author', ['articulo' => $articulo])
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    @include('KIBI.admin.articulos.components.single.articulo-sidebar', ['articulo' => $articulo, 'sections' => $sections ?? []])
                </div>
            </div>
        </div>

        <!-- Artículos Relacionados -->
        <div class="relative mt-20 overflow-hidden">
            <!-- Fondo decorativo con efectos de parallax -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50/30 via-cyan-50/20 to-indigo-50/30"></div>
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-r from-blue-400/10 to-cyan-400/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-gradient-to-r from-indigo-400/10 to-purple-400/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            
            <!-- Contenedor principal -->
            <div class="relative z-10">
                <!-- Título mejorado con efectos avanzados -->
                <div class="text-center mb-16">
                    <div class="inline-block relative">
                        <!-- Efecto de brillo detrás del título -->
                        <div class="absolute -inset-4 bg-gradient-to-r from-blue-500/20 via-cyan-400/20 to-indigo-500/20 rounded-2xl blur-xl opacity-75 animate-pulse"></div>
                        
                        <!-- Título principal -->
                        <h2 class="relative text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-slate-800 via-blue-600 to-indigo-600 text-center mb-6 tracking-tight drop-shadow-lg animate-fadeIn">
                            ✨ Artículos Recomendados
                        </h2>
                        
                        <!-- Subtítulo descriptivo -->
                        <p class="text-lg text-slate-600 font-medium animate-fadeIn" style="animation-delay: 0.3s;">
                            Descubre contenido relacionado que podría interesarte
                        </p>
                    </div>

                    <!-- Línea decorativa mejorada -->
                    <div class="flex justify-center mt-8 mb-4">
                        <div class="relative">
                            <div class="h-2 w-32 bg-gradient-to-r from-blue-500 via-cyan-400 to-indigo-500 rounded-full animate-pulse shadow-lg shadow-blue-500/30"></div>
                            <div class="absolute inset-0 h-2 w-32 bg-gradient-to-r from-blue-500 via-cyan-400 to-indigo-500 rounded-full animate-ping opacity-20"></div>
                        </div>
                    </div>
                    
                    <!-- Elementos decorativos adicionales -->
                    <div class="flex justify-center space-x-2 mt-4">
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-cyan-400 rounded-full animate-bounce" style="animation-delay: 0.1s;"></div>
                        <div class="w-2 h-2 bg-indigo-400 rounded-full animate-bounce" style="animation-delay: 0.2s;"></div>
                    </div>
                </div>

                <!-- Sección de artículos con efectos mejorados -->
                <div class="relative">
                    <!-- Efecto de hover global -->
                    <div class="transition-all duration-700 ease-out hover:scale-[1.005] hover:drop-shadow-2xl">
                        @include('KIBI.admin.articulos.components.shared.articulos-relacionados', [
                            'articulos' => $articulosRelacionados, 
                            'routeName' => 'kibi.articulos.ver'
                        ])
                    </div>
                    
                    <!-- Efectos de borde animado -->
                    <div class="absolute inset-0 rounded-3xl border-2 border-transparent bg-gradient-to-r from-blue-500/20 via-cyan-400/20 to-indigo-500/20 opacity-0 hover:opacity-100 transition-opacity duration-1000 pointer-events-none"></div>
                </div>
            </div>
        </div>
       
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/articulos/ver.js') }}"></script>
    <script src="{{ asset('js/newsletter.js') }}"></script>
@endpush
