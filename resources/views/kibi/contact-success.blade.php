@extends('kibi.layouts.auth')

@section('title', 'KIBI - Solicitud Enviada')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-teal-50 flex items-center justify-center px-6 py-16 relative overflow-hidden">
    <!-- Efectos de fondo animados -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute top-1/3 right-1/4 w-96 h-96 bg-teal-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-1/4 left-1/3 w-96 h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <div class="w-full max-w-4xl bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl border border-gray-200/50 overflow-hidden transition-all duration-500 hover:shadow-3xl hover:scale-[1.01] relative z-10 animate-fadeInUp">
        <!-- HEADER -->
        <header class="bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-800 text-white px-8 py-6 flex flex-col sm:flex-row items-center justify-between relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-transparent"></div>
            <div class="flex items-center space-x-3 relative z-10">
                <div class="w-11 h-11 bg-gradient-to-br from-teal-400 to-teal-300 rounded-lg flex items-center justify-center shadow-lg font-bold text-blue-900 text-lg transform hover:rotate-12 transition-transform duration-300">S</div>
                <span class="text-2xl font-bold tracking-wide">SoftLinkIA</span>
            </div>
            <nav class="flex space-x-6 text-sm font-medium mt-4 sm:mt-0 relative z-10">
                <a href="{{ route('home') }}" class="hover:text-teal-300 transition-all duration-300 hover:scale-110 transform relative group">
                    <span>Inicio</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-teal-300 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('soluciones.kibi') }}" class="hover:text-teal-300 transition-all duration-300 hover:scale-110 transform relative group">
                    <span>KIBI</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-teal-300 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#" class="hover:text-teal-300 transition-all duration-300 hover:scale-110 transform relative group">
                    <span>Contacto</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-teal-300 group-hover:w-full transition-all duration-300"></span>
                </a>
            </nav>
        </header>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="p-12 sm:p-14 relative">
            <!-- LOGO -->
            <div class="flex justify-center mb-10 animate-fadeInUp animation-delay-200">
                <div class="relative">
                    <img src="{{ asset('kibbi-images/kibi-logo.webp') }}" alt="KIBI Logo" class="h-32 w-auto object-contain drop-shadow-2xl hover:scale-110 transition-transform duration-300 relative z-10">
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-400/20 to-blue-400/20 blur-2xl -z-0"></div>
                </div>
            </div>

            <!-- ÍCONO DE ÉXITO -->
            <div class="flex justify-center mb-10 animate-fadeInUp animation-delay-400">
                <div class="relative">
                    <!-- Anillos de pulso -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-32 h-32 bg-green-400/30 rounded-full animate-ping-slow"></div>
                        <div class="absolute w-32 h-32 bg-green-400/20 rounded-full animate-ping-slower"></div>
                    </div>
                    <!-- Círculo principal -->
                    <div class="relative w-28 h-28 bg-gradient-to-br from-green-400 via-emerald-500 to-teal-500 rounded-full flex items-center justify-center shadow-2xl transform hover:scale-110 transition-transform duration-300">
                        <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-inner">
                            <svg class="w-16 h-16 text-green-600 animate-checkmark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MENSAJE PRINCIPAL -->
            <div class="text-center mb-14 animate-fadeInUp animation-delay-600">
                <h1 class="text-5xl sm:text-6xl font-extrabold bg-gradient-to-r from-gray-900 via-blue-900 to-indigo-900 bg-clip-text text-transparent mb-5 leading-tight">
                    ¡Tu solicitud fue enviada con éxito!
                </h1>
                <p class="text-xl text-gray-700 leading-relaxed max-w-2xl mx-auto mb-4">
                    Gracias por confiar en <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold shadow-lg transform hover:scale-105 transition-transform duration-300">KIBI</span>. Nuestro equipo revisará tus datos y se comunicará contigo en breve.
                </p>
                <div class="flex items-center justify-center space-x-2 text-gray-600 mt-6">
                    <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-lg font-medium">Recibirás un correo de confirmación con los próximos pasos.</p>
                </div>
            </div>

            <!-- ETAPAS SIGUIENTES -->
            <section class="bg-gradient-to-br from-gray-50 via-blue-50/30 to-teal-50/30 rounded-3xl border-2 border-gray-200/50 p-10 shadow-xl mb-14 relative overflow-hidden animate-fadeInUp animation-delay-800">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-teal-500 via-blue-500 to-indigo-500"></div>
                <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center relative">
                    <span class="relative z-10">¿Qué sigue ahora?</span>
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-gradient-to-r from-teal-500 to-blue-500 rounded-full"></div>
                </h2>
                <div class="space-y-6">
                    @foreach([
                        'Revisaremos tu información institucional cuidadosamente.',
                        'Te contactaremos en las próximas 24 a 48 horas.',
                        'Programaremos una demostración personalizada de KIBI para tu equipo.'
                    ] as $index => $step)
                        <div class="flex items-start space-x-5 group transform hover:scale-[1.02] transition-all duration-300 animate-fadeInUp" style="animation-delay: {{ ($index + 1) * 200 }}ms">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-300 relative z-10">
                                    {{ $index + 1 }}
                                </div>
                                <div class="absolute inset-0 bg-teal-400/30 rounded-full blur-lg group-hover:blur-xl transition-all duration-300"></div>
                            </div>
                            <p class="text-lg text-gray-700 leading-relaxed flex-1 group-hover:text-gray-900 transition-colors duration-300 pt-2">
                                {{ $step }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- BOTONES DE ACCIÓN -->
            <div class="flex flex-col sm:flex-row justify-center gap-5 mb-14 animate-fadeInUp animation-delay-1000">
                <a href="{{ route('soluciones.kibi') }}"
                   class="group relative px-10 py-4 bg-gradient-to-r from-teal-600 to-teal-700 hover:from-teal-700 hover:to-teal-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 text-center overflow-hidden">
                    <span class="relative z-10 flex items-center justify-center space-x-2">
                        <span>Volver a KIBI</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                </a>
                <a href="{{ route('home') }}"
                   class="group relative px-10 py-4 bg-gradient-to-r from-gray-700 to-gray-800 hover:from-gray-800 hover:to-gray-900 text-white font-semibold rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 text-center overflow-hidden">
                    <span class="relative z-10 flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                        </svg>
                        <span>Ir al Inicio</span>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                </a>
            </div>

            <!-- INFORMACIÓN DE CONTACTO -->
            <footer class="pt-10 border-t-2 border-gray-200/50 text-center animate-fadeInUp animation-delay-1200">
                <p class="text-base font-semibold text-gray-700 mb-6">¿Necesitas ayuda o más información?</p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-6 text-base">
                    <a href="mailto:contacto@softlinkia.com" class="group flex items-center space-x-3 px-6 py-3 bg-gradient-to-r from-teal-50 to-blue-50 rounded-xl text-teal-700 hover:text-teal-800 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg border border-teal-200/50">
                        <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center group-hover:bg-teal-200 transition-colors duration-300">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium">contacto@softlinkia.com</span>
                    </a>
                    <a href="tel:+525512345678" class="group flex items-center space-x-3 px-6 py-3 bg-gradient-to-r from-teal-50 to-blue-50 rounded-xl text-teal-700 hover:text-teal-800 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg border border-teal-200/50">
                        <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center group-hover:bg-teal-200 transition-colors duration-300">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <span class="font-medium">+52 55 1234 5678</span>
                    </a>
                </div>
            </footer>

        </main>
    </div>

    <!-- Animaciones CSS -->
    <style>
        @keyframes checkmark {
            0% { 
                stroke-dasharray: 0, 100; 
                opacity: 0;
                transform: scale(0.8);
            }
            50% {
                transform: scale(1.1);
            }
            100% { 
                stroke-dasharray: 100, 0; 
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes blob {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }

        @keyframes ping-slow {
            0%, 100% {
                transform: scale(1);
                opacity: 0.7;
            }
            50% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        @keyframes ping-slower {
            0%, 100% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        .animate-checkmark {
            animation: checkmark 1s ease-out forwards;
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .animate-blob {
            animation: blob 20s infinite;
        }

        .animate-ping-slow {
            animation: ping-slow 3s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        .animate-ping-slower {
            animation: ping-slower 4s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-400 {
            animation-delay: 400ms;
        }

        .animation-delay-600 {
            animation-delay: 600ms;
        }

        .animation-delay-800 {
            animation-delay: 800ms;
        }

        .animation-delay-1000 {
            animation-delay: 1000ms;
        }

        .animation-delay-1200 {
            animation-delay: 1200ms;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</section>
@endsection
