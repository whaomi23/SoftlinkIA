@extends('layouts.error')

@section('title', 'Página no encontrada - SoftLinkIA')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative overflow-hidden px-4 py-8">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"grid\" width=\"10\" height=\"10\" patternUnits=\"userSpaceOnUse\"><path d=\"M 10 0 L 0 0 0 10\" fill=\"none\" stroke=\"%23ffffff\" stroke-width=\"0.5\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23grid)\"/></svg>');"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-20 w-32 h-32 bg-blue-500/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-cyan-500/10 rounded-full blur-xl animate-pulse delay-1000"></div>
    <div class="absolute top-1/2 left-10 w-24 h-24 bg-purple-500/10 rounded-full blur-xl animate-pulse delay-500"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <!-- Error Code -->
        <div class="mb-6 sm:mb-8" data-aos="fade-up" data-aos-delay="200">
            <h1 class="text-6xl sm:text-8xl md:text-9xl lg:text-[12rem] font-bold bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-600 bg-clip-text text-transparent leading-none">
                404
            </h1>
        </div>

        <!-- Error Message -->
        <div class="mb-6 sm:mb-8" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3 sm:mb-4">
                ¡Oops! Página no encontrada
            </h2>
            <p class="text-base sm:text-lg md:text-xl text-slate-300 mb-4 sm:mb-6 max-w-2xl mx-auto px-4">
                La página que estás buscando parece haber desaparecido en el ciberespacio.
                No te preocupes, nuestros desarrolladores están trabajando para traerla de vuelta.
            </p>
        </div>

        <!-- Illustration -->
        <div class="mb-8 sm:mb-12" data-aos="fade-up" data-aos-delay="600">
            <div class="inline-flex items-center justify-center w-24 h-24 sm:w-32 sm:h-32 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-full border border-blue-500/30 backdrop-blur-sm">
                <svg class="w-12 h-12 sm:w-16 sm:h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.709M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col gap-3 sm:gap-4 justify-center items-center px-4" data-aos="fade-up" data-aos-delay="800">
            <a href="{{ url('/') }}"
               class="group relative w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/25">
                <span class="relative z-10 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Volver al Inicio
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-xl blur opacity-0 group-hover:opacity-75 transition-opacity duration-300"></div>
            </a>

            <button onclick="history.back()"
                    class="group relative w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-slate-700/50 text-white font-semibold rounded-xl border border-slate-600 hover:bg-slate-600/50 hover:border-slate-500 transition-all duration-300 transform hover:scale-105 backdrop-blur-sm">
                <span class="relative z-10 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Página Anterior
                </span>
            </button>
        </div>

        <!-- Additional Help -->
        <div class="mt-12 sm:mt-16" data-aos="fade-up" data-aos-delay="1000">
            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-4 sm:p-6 max-w-2xl mx-auto">
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2 sm:mb-3">¿Necesitas ayuda?</h3>
                <p class="text-sm sm:text-base text-slate-300 mb-3 sm:mb-4">
                    Si crees que esto es un error, puedes contactarnos o explorar nuestros servicios:
                </p>
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 justify-center">
                    <a href="mailto:support@softlinkia.com" class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center justify-center gap-1 text-sm sm:text-base">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contacto
                    </a>
                    <a href="{{ url('/') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center justify-center gap-1 text-sm sm:text-base">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Servicios
                    </a>
                    <a href="{{ url('/') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center justify-center gap-1 text-sm sm:text-base">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Cursos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Decoration -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-slate-900 to-transparent"></div>
</div>

@section('scripts')
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true
    });
</script>
@endsection
@endsection
