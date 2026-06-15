@extends('KIBI.layouts.auth')

@section('title', 'KIBI Educación - Dashboard')

@section('content')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -200px 0;
        }
        100% {
            background-position: calc(200px + 100%) 0;
        }
    }

    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
        70% {
            transform: scale(0.9);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes slideInFromTop {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes rotateIn {
        from {
            opacity: 0;
            transform: rotate(-180deg) scale(0.5);
        }
        to {
            opacity: 1;
            transform: rotate(0deg) scale(1);
        }
    }

    /* Animation classes */
    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .animate-fadeInLeft {
        animation: fadeInLeft 0.6s ease-out forwards;
    }

    .animate-fadeInRight {
        animation: fadeInRight 0.6s ease-out forwards;
    }

    .animate-pulse-slow {
        animation: pulse 2s ease-in-out infinite;
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .animate-bounceIn {
        animation: bounceIn 0.8s ease-out forwards;
    }

    .animate-slideInFromTop {
        animation: slideInFromTop 0.7s ease-out forwards;
    }

    .animate-rotateIn {
        animation: rotateIn 0.8s ease-out forwards;
    }

    /* Gradient animation */
    .gradient-animated {
        background-size: 200% 200%;
        animation: gradientShift 3s ease infinite;
    }

    /* Shimmer effect for loading states */
    .shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200px 100%;
        animation: shimmer 1.5s infinite;
    }

    /* Staggered animations */
    .animate-delay-100 {
        animation-delay: 0.1s;
    }

    .animate-delay-200 {
        animation-delay: 0.2s;
    }

    .animate-delay-300 {
        animation-delay: 0.3s;
    }

    .animate-delay-400 {
        animation-delay: 0.4s;
    }

    .animate-delay-500 {
        animation-delay: 0.5s;
    }

    /* Hover animations */
    .hover-lift:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }

    .hover-glow:hover {
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        transition: box-shadow 0.3s ease;
    }
</style>
    <!-- Background with gradient -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 gradient-animated">
        <!-- Header Section -->
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/5 to-indigo-600/5"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Welcome Header -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 animate-fadeInUp">
                    <div class="mb-6 lg:mb-0 animate-fadeInLeft animate-delay-100">
                        <div class="flex items-center space-x-3 mb-2">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center animate-bounceIn animate-delay-200">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent animate-slideInFromTop animate-delay-300">
                                    Bienvenido a KIBI Educación
                                </h1>
                                <p class="text-slate-600 mt-1 animate-fadeInUp animate-delay-400">Tu centro de aprendizaje y gestión</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Dashboard Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Cursos Card -->
                    <div class="group relative overflow-hidden bg-white/70 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 animate-fadeInUp animate-delay-100 hover-lift hover-glow">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-indigo-500/5"></div>
                        <div class="relative p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 animate-rotateIn animate-delay-200">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div class="text-right animate-fadeInRight animate-delay-300">
                                    <p class="text-2xl font-bold text-slate-900 animate-pulse-slow">0</p>
                                    <p class="text-xs text-slate-500">Cursos activos</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2 animate-fadeInUp animate-delay-400">Tus Cursos</h3>
                            <p class="text-slate-600 mb-4 animate-fadeInUp animate-delay-500">Accede a tus cursos activos y sigue tu progreso de aprendizaje.</p>
                            <button class="w-full px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-medium transition-all duration-200 transform hover:scale-105 animate-bounceIn animate-delay-600">
                                Ver Mis Cursos
                            </button>
                        </div>
                    </div>

                    <!-- Artículos Card -->
                    <div class="group relative overflow-hidden bg-white/70 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 animate-fadeInUp animate-delay-200 hover-lift hover-glow">
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-500/5"></div>
                        <div class="relative p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 animate-rotateIn animate-delay-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="text-right animate-fadeInRight animate-delay-400">
                                    <p class="text-2xl font-bold text-slate-900 animate-pulse-slow">+</p>
                                    <p class="text-xs text-slate-500">Artículos</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2 animate-fadeInUp animate-delay-500">Artículos</h3>
                            <p class="text-slate-600 mb-4 animate-fadeInUp animate-delay-600">Lee artículos recientes y recursos educativos actualizados.</p>
                            <div class="flex space-x-3">
                        <a href="{{ route('kibi.articulos.catalogo') }}" 
                                   class="flex-1 px-4 py-2 bg-white/80 hover:bg-white border border-emerald-200 hover:border-emerald-300 text-emerald-700 hover:text-emerald-800 rounded-xl transition-all duration-200 font-medium text-sm text-center animate-bounceIn animate-delay-700 hover-lift">
                            Ver Artículos
                        </a>
                        @if(auth('kibi')->check() && (auth('kibi')->user()->isMarketing() || auth('kibi')->user()->isAdmin()))
                        <a href="{{ route('kibi.articulos.admin') }}" 
                                   class="flex-1 px-4 py-2 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white rounded-xl transition-all duration-200 font-medium text-sm text-center transform hover:scale-105 animate-bounceIn animate-delay-800 hover-lift">
                            Administrar
                        </a>
                        @endif
                    </div>
                </div>
                    </div>

                    <!-- Certificados Card -->
                    <div class="group relative overflow-hidden bg-white/70 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 animate-fadeInUp animate-delay-300 hover-lift hover-glow">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5"></div>
                        <div class="relative p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 animate-rotateIn animate-delay-400">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                </div>
                                <div class="text-right animate-fadeInRight animate-delay-500">
                                    <p class="text-2xl font-bold text-slate-900 animate-pulse-slow">0</p>
                                    <p class="text-xs text-slate-500">Certificados</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2 animate-fadeInUp animate-delay-600">Certificados</h3>
                            <p class="text-slate-600 mb-4 animate-fadeInUp animate-delay-700">Descarga y gestiona tus certificados obtenidos.</p>
                            <button class="w-full px-4 py-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white rounded-xl font-medium transition-all duration-200 transform hover:scale-105 animate-bounceIn animate-delay-800 hover-lift">
                                Ver Certificados
                            </button>
                        </div>
                </div>
            </div>


                <!-- Marketing Section -->
                @if(auth('kibi')->check() && auth('kibi')->user()->isMarketing())
                    <!-- Gestión de Usuarios -->
                    <div class="relative animate-fadeInUp animate-delay-400 mt-8">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600/10 to-pink-600/10 rounded-3xl"></div>
                        <div class="relative bg-white/80 backdrop-blur-sm border border-purple-200/50 rounded-3xl shadow-xl p-8 hover-lift hover-glow">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div class="mb-6 lg:mb-0">
                                    <div class="flex items-center space-x-4 mb-4 animate-fadeInLeft animate-delay-500">
                                        <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl flex items-center justify-center animate-bounceIn animate-delay-600">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-purple-900 animate-slideInFromTop animate-delay-700">Gestión de Usuarios</h3>
                                            <p class="text-purple-700 mt-1 animate-fadeInUp animate-delay-800">Administra usuarios y otorga/deniega accesos</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
                                        @php
                                            $totalUsuarios = \App\Models\User::count();
                                            $usuariosActivos = \App\Models\User::where('status', 'activo')->count();
                                            $solicitudesMarketingPend = \App\Models\User::where('solicitud_marketing', 'pendiente')->count();
                                            $solicitudesRolesPend = \App\Models\User::where('solicitud_rol', 'pendiente')->count();
                                            $totalSolicitudesPend = $solicitudesMarketingPend + $solicitudesRolesPend;
                                        @endphp
                                        <div class="text-center p-4 bg-purple-50/50 rounded-xl animate-bounceIn animate-delay-900 hover-lift">
                                            <p class="text-2xl font-bold text-purple-600 animate-pulse-slow">{{ $totalUsuarios }}</p>
                                            <p class="text-sm text-purple-600">Total Usuarios</p>
                                        </div>
                                        <div class="text-center p-4 bg-purple-50/50 rounded-xl animate-bounceIn animate-delay-1000 hover-lift">
                                            <p class="text-2xl font-bold text-purple-600 animate-pulse-slow">{{ $usuariosActivos }}</p>
                                            <p class="text-sm text-purple-600">Usuarios Activos</p>
                                        </div>
                                        <div class="text-center p-4 bg-purple-50/50 rounded-xl animate-bounceIn animate-delay-1100 hover-lift">
                                            <p class="text-2xl font-bold text-purple-600 animate-pulse-slow">{{ $totalSolicitudesPend }}</p>
                                            <p class="text-sm text-purple-600">Solicitudes Pendientes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col space-y-3 animate-fadeInRight animate-delay-500">
                                    <a href="{{ route('kibi.usuarios.index') }}"
                                       class="group px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-2xl transition-all duration-200 font-semibold text-center transform hover:scale-105 shadow-lg hover:shadow-xl animate-bounceIn animate-delay-1200 hover-lift">
                                        <div class="flex items-center justify-center space-x-2">
                                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                            <span>Gestionar Usuarios</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('kibi.historial.solicitudes.vista') }}" class="px-8 py-3 bg-white/80 hover:bg-white border border-purple-200 hover:border-purple-300 text-purple-700 hover:text-purple-800 rounded-2xl transition-all duration-200 font-medium animate-bounceIn animate-delay-1300 hover-lift inline-block text-center">
                                        Ver Historial Completo
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gestión de Contactos -->
                    <div class="relative animate-fadeInUp animate-delay-500 mt-8">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-indigo-600/10 rounded-3xl"></div>
                        <div class="relative bg-white/80 backdrop-blur-sm border border-blue-200/50 rounded-3xl shadow-xl p-8 hover-lift hover-glow">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div class="mb-6 lg:mb-0">
                                    <div class="flex items-center space-x-4 mb-4 animate-fadeInLeft animate-delay-500">
                                        <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center animate-bounceIn animate-delay-600">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                            <div>
                                            <h3 class="text-2xl font-bold text-blue-900 animate-slideInFromTop animate-delay-700">Gestión de Contactos</h3>
                                            <p class="text-blue-700 mt-1 animate-fadeInUp animate-delay-800">Panel administrativo para contactos de KIBI</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
                                        <div class="text-center p-4 bg-blue-50/50 rounded-xl animate-bounceIn animate-delay-900 hover-lift">
                                            <p class="text-2xl font-bold text-blue-600 animate-pulse-slow">0</p>
                                            <p class="text-sm text-blue-600">Total Contactos</p>
                                        </div>
                                        <div class="text-center p-4 bg-blue-50/50 rounded-xl animate-bounceIn animate-delay-1000 hover-lift">
                                            <p class="text-2xl font-bold text-blue-600 animate-pulse-slow">0</p>
                                            <p class="text-sm text-blue-600">Este Mes</p>
                                        </div>
                                        <div class="text-center p-4 bg-blue-50/50 rounded-xl animate-bounceIn animate-delay-1100 hover-lift">
                                            <p class="text-2xl font-bold text-blue-600 animate-pulse-slow">0</p>
                                            <p class="text-sm text-blue-600">Pendientes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col space-y-3 animate-fadeInRight animate-delay-500">
                                    <a href="{{ route('kibi.contacts.index') }}"
                                       class="group px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-2xl transition-all duration-200 font-semibold text-center transform hover:scale-105 shadow-lg hover:shadow-xl animate-bounceIn animate-delay-1200 hover-lift">
                                        <div class="flex items-center justify-center space-x-2">
                                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                            <span>Gestionar Contactos</span>
                                        </div>
                                    </a>
                                    <button class="px-8 py-3 bg-white/80 hover:bg-white border border-blue-200 hover:border-blue-300 text-blue-700 hover:text-blue-800 rounded-2xl transition-all duration-200 font-medium animate-bounceIn animate-delay-1300 hover-lift">
                                        Ver Reportes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                <!-- Quick Stats Section -->
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white/60 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center animate-fadeInUp animate-delay-500 hover-lift hover-glow">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-green-500 rounded-lg mx-auto mb-2 flex items-center justify-center animate-bounceIn animate-delay-600">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-slate-600 animate-fadeInUp animate-delay-700">Progreso Total</p>
                        <p class="text-lg font-bold text-slate-900 animate-pulse-slow">0%</p>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center animate-fadeInUp animate-delay-600 hover-lift hover-glow">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-purple-500 rounded-lg mx-auto mb-2 flex items-center justify-center animate-bounceIn animate-delay-700">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-slate-600 animate-fadeInUp animate-delay-800">Tiempo Estudiado</p>
                        <p class="text-lg font-bold text-slate-900 animate-pulse-slow">0h</p>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center animate-fadeInUp animate-delay-700 hover-lift hover-glow">
                        <div class="w-8 h-8 bg-gradient-to-r from-orange-400 to-orange-500 rounded-lg mx-auto mb-2 flex items-center justify-center animate-bounceIn animate-delay-800">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-slate-600 animate-fadeInUp animate-delay-900">Lecciones Completadas</p>
                        <p class="text-lg font-bold text-slate-900 animate-pulse-slow">0</p>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center animate-fadeInUp animate-delay-800 hover-lift hover-glow">
                        <div class="w-8 h-8 bg-gradient-to-r from-pink-400 to-pink-500 rounded-lg mx-auto mb-2 flex items-center justify-center animate-bounceIn animate-delay-900">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-slate-600 animate-fadeInUp animate-delay-1000">Logros Desbloqueados</p>
                        <p class="text-lg font-bold text-slate-900 animate-pulse-slow">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>
</script>
@endpush
@endsection

