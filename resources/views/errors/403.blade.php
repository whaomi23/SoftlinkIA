@extends('layouts.error')

@section('title', 'Acceso denegado - SoftLinkIA')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative overflow-hidden px-4 py-8">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"grid\" width=\"10\" height=\"10\" patternUnits=\"userSpaceOnUse\"><path d=\"M 10 0 L 0 0 0 10\" fill=\"none\" stroke=\"%23ffffff\" stroke-width=\"0.5\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23grid)\"/></svg>');"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-20 w-32 h-32 bg-yellow-500/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-orange-500/10 rounded-full blur-xl animate-pulse delay-1000"></div>
    <div class="absolute top-1/2 left-10 w-24 h-24 bg-red-500/10 rounded-full blur-xl animate-pulse delay-500"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <!-- Error Code -->
        <div class="mb-6 sm:mb-8" data-aos="fade-up" data-aos-delay="200">
            <h1 class="text-6xl sm:text-8xl md:text-9xl lg:text-[12rem] font-bold bg-gradient-to-r from-yellow-400 via-orange-400 to-red-600 bg-clip-text text-transparent leading-none">
                403
            </h1>
        </div>

        <!-- Error Message -->
        <div class="mb-6 sm:mb-8" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3 sm:mb-4">
                Acceso denegado
            </h2>
            <p class="text-base sm:text-lg md:text-xl text-slate-300 mb-4 sm:mb-6 max-w-2xl mx-auto px-4">
                No tienes permisos para acceder a esta página. Si crees que esto es un error, contacta con el administrador.
            </p>
        </div>

        <!-- Illustration -->
        <div class="mb-8 sm:mb-12" data-aos="fade-up" data-aos-delay="600">
            <div class="inline-flex items-center justify-center w-24 h-24 sm:w-32 sm:h-32 bg-gradient-to-r from-yellow-500/20 to-orange-500/20 rounded-full border border-yellow-500/30 backdrop-blur-sm">
                <svg class="w-12 h-12 sm:w-16 sm:h-16 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
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

            @auth
            <a href="{{ route('dashboard') }}" 
               class="group relative w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-slate-700/50 text-white font-semibold rounded-xl border border-slate-600 hover:bg-slate-600/50 hover:border-slate-500 transition-all duration-300 transform hover:scale-105 backdrop-blur-sm">
                <span class="relative z-10 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Dashboard
                </span>
            </a>
            @else
            <a href="{{ route('login') }}" 
               class="group relative w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-slate-700/50 text-white font-semibold rounded-xl border border-slate-600 hover:bg-slate-600/50 hover:border-slate-500 transition-all duration-300 transform hover:scale-105 backdrop-blur-sm">
                <span class="relative z-10 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Iniciar Sesión
                </span>
            </a>
            @endauth
        </div>

        <!-- Additional Help -->
        <div class="mt-12 sm:mt-16" data-aos="fade-up" data-aos-delay="1000">
            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-4 sm:p-6 max-w-2xl mx-auto">
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2 sm:mb-3">¿Necesitas acceso?</h3>
                <p class="text-sm sm:text-base text-slate-300 mb-3 sm:mb-4">
                    Si crees que deberías tener acceso a esta página, puedes:
                </p>
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 justify-center">
                    <a href="{{ route('contacto') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center justify-center gap-1 text-sm sm:text-base">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contactar Administrador
                    </a>
                    @guest
                    <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 transition-colors duration-200 flex items-center justify-center gap-1 text-sm sm:text-base">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Registrarse
                    </a>
                    @endguest
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
