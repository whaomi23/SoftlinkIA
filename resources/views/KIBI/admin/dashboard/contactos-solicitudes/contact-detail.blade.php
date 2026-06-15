@extends('KIBI.layouts.auth')

@section('title', 'KIBI - Detalle de Contacto')

@push('styles')
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: .5;
        }
    }
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
    }
    .animate-pulse-slow {
        animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    .animate-slideIn {
        animation: slideIn 0.4s ease-out;
    }
    .hover-lift:hover {
        transform: translateY(-2px);
        transition: transform 0.2s ease;
    }
    .metric-card {
        background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(249,250,251,1) 100%);
        transition: all 0.3s ease;
    }
    .metric-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .progress-bar {
        position: relative;
        overflow: hidden;
    }
    .progress-bar::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background-image: linear-gradient(
            -45deg,
            rgba(255, 255, 255, .2) 25%,
            transparent 25%,
            transparent 50%,
            rgba(255, 255, 255, .2) 50%,
            rgba(255, 255, 255, .2) 75%,
            transparent 75%,
            transparent
        );
        background-size: 1rem 1rem;
        animation: progress-bar-stripes 1s linear infinite;
    }
    @keyframes progress-bar-stripes {
        0% {
            background-position: 1rem 0;
        }
        100% {
            background-position: 0 0;
        }
    }
</style>
@endpush

@section('content')
@php
    // Función para obtener el código de bandera según el estado
    function getFlagCode($estado) {
        $estadosFlags = [
            'CDMX' => 'mx',
            'Ciudad de México' => 'mx',
            'México' => 'mx',
            'Jalisco' => 'mx',
            'Nuevo León' => 'mx',
            'Puebla' => 'mx',
            'Veracruz' => 'mx',
            'Guanajuato' => 'mx',
            'Yucatán' => 'mx',
            'Quintana Roo' => 'mx',
            'Chihuahua' => 'mx',
            'Sonora' => 'mx',
            'Coahuila' => 'mx',
            'Tamaulipas' => 'mx',
            'Michoacán' => 'mx',
            'Oaxaca' => 'mx',
            'Chiapas' => 'mx',
            'Tabasco' => 'mx',
            'Campeche' => 'mx',
            'Durango' => 'mx',
            'Sinaloa' => 'mx',
            'Zacatecas' => 'mx',
            'San Luis Potosí' => 'mx',
            'Aguascalientes' => 'mx',
            'Querétaro' => 'mx',
            'Hidalgo' => 'mx',
            'Tlaxcala' => 'mx',
            'Morelos' => 'mx',
            'Guerrero' => 'mx',
            'Colima' => 'mx',
            'Nayarit' => 'mx',
            'Baja California' => 'mx',
            'Baja California Sur' => 'mx',
        ];

        return $estadosFlags[$estado] ?? 'mx';
    }

    // Configuración de status con iconos
    $statusConfig = [
        'nuevo' => [
            'class' => 'bg-green-100 text-green-800 border-green-200',
            'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
            'text' => 'Nuevo',
            'color' => 'green'
        ],
        'contactado' => [
            'class' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
            'text' => 'Contactado',
            'color' => 'yellow'
        ],
        'interesado' => [
            'class' => 'bg-purple-100 text-purple-800 border-purple-200',
            'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
            'text' => 'Interesado',
            'color' => 'purple'
        ],
        'no_interesado' => [
            'class' => 'bg-red-100 text-red-800 border-red-200',
            'icon' => 'M6 18L18 6M6 6l12 12',
            'text' => 'No Interesado',
            'color' => 'red'
        ],
        'convertido' => [
            'class' => 'bg-blue-100 text-blue-800 border-blue-200',
            'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
            'text' => 'Convertido',
            'color' => 'blue'
        ],
    ];
    $currentStatus = $statusConfig[$contacto->status] ?? $statusConfig['nuevo'];
@endphp

<section class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-purple-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Mensajes de Éxito/Error -->
        @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-lg p-4 shadow-lg animate-fadeIn">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-700 font-semibold">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-lg p-4 shadow-lg animate-fadeIn">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-red-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-red-700 font-semibold">{{ session('error') }}</p>
            </div>
        </div>
        @endif

        <!-- Header con Avatar y Info Principal -->
        <div class="bg-gradient-to-br from-white via-blue-50/40 to-purple-50/40 rounded-2xl shadow-2xl p-8 mb-8 border-2 border-blue-100 relative overflow-hidden">
            <!-- Decoración de fondo -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-purple-200/20 rounded-full blur-3xl -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-br from-green-200/20 to-blue-200/20 rounded-full blur-3xl -ml-24 -mb-24"></div>
            
            <div class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between">
                <div class="flex items-center space-x-6 mb-6 lg:mb-0">
                    <!-- Avatar Mejorado -->
                    <div class="relative group">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-500 via-purple-500 to-blue-600 rounded-2xl flex items-center justify-center text-white text-3xl font-bold shadow-xl hover:shadow-2xl transition-all transform hover:scale-105 relative z-10">
                            {{ strtoupper(substr($contacto->nombre, 0, 1) . substr($contacto->apellidos, 0, 1)) }}
                        </div>
                        <!-- Anillo decorativo -->
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-blue-400 to-purple-500 opacity-0 group-hover:opacity-100 blur-xl transition-opacity"></div>
                        <!-- Status Badge Mejorado -->
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 {{ $currentStatus['class'] }} rounded-full border-4 border-white flex items-center justify-center shadow-xl z-20 animate-pulse-slow">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $currentStatus['icon'] }}"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Información Principal -->
                    <div>
                        <div class="flex items-center space-x-3 mb-3">
                            <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">{{ $contacto->nombre_completo }}</h1>
                            <!-- ID Badge -->
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-full border border-gray-300">#{{ $contacto->id }}</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-3 text-gray-600 mb-3">
                            <div class="flex items-center space-x-2 px-3 py-1.5 bg-white/60 backdrop-blur-sm rounded-lg border border-gray-200">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="font-semibold text-gray-800">{{ $contacto->puesto }}</span>
                            </div>
                            <div class="flex items-center space-x-2 px-3 py-1.5 bg-white/60 backdrop-blur-sm rounded-lg border border-gray-200">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="font-semibold text-gray-800">{{ $contacto->institucion }}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2 px-3 py-1.5 bg-white/60 backdrop-blur-sm rounded-lg border border-gray-200">
                                <span class="fi fi-{{ getFlagCode($contacto->estado) }} text-2xl shadow-sm"></span>
                                <span class="text-gray-700 font-semibold">{{ $contacto->ciudad }}, {{ $contacto->estado }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Acciones Rápidas Mejoradas -->
                <div class="flex flex-wrap gap-3 lg:flex-col">
                    <a href="{{ route('kibi.contacts.index') }}"
                       class="flex items-center px-4 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg border border-gray-200 group">
                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium">Volver</span>
                    </a>

                    <a href="{{ route('kibi.contacts.email.show', $contacto) }}"
                       class="flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl font-semibold group">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Enviar Email
                    </a>

                    <a href="{{ route('kibi.contacts.whatsapp.show', $contacto) }}"
                       class="flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl font-semibold group">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                        WhatsApp
                    </a>

                    <a href="tel:{{ $contacto->celular }}"
                       class="flex items-center justify-center px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg border border-gray-200 font-semibold group">
                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                        Llamar
                    </a>
                </div>
            </div>
        </div>

        <!-- Métricas Destacadas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
            @php
                $diasDesdeContacto = $contacto->contactado_at ? $contacto->contactado_at->diffInDays(now()) : null;
            @endphp
            
            <!-- Status Actual -->
            <div class="metric-card bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover-lift">
                <div class="flex items-center justify-between mb-2">
                    <div class="p-2 {{ $currentStatus['class'] }} rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $currentStatus['icon'] }}"></path>
                        </svg>
                    </div>
                    <span class="px-2 py-1 {{ $currentStatus['class'] }} text-xs font-semibold rounded-full">{{ $currentStatus['text'] }}</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1 capitalize">{{ $currentStatus['text'] }}</h3>
                <p class="text-sm text-gray-600">Estado del lead</p>
            </div>

            <!-- Último Contacto -->
            <div class="metric-card bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover-lift">
                <div class="flex items-center justify-between mb-2">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    @if($contacto->contactado_at)
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Activo</span>
                    @else
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">Pendiente</span>
                    @endif
                </div>
                @if($contacto->contactado_at)
                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $diasDesdeContacto ?? 0 }}</h3>
                    <p class="text-sm text-gray-600">Días desde último contacto</p>
                @else
                    <h3 class="text-lg font-bold text-gray-900 mb-1">-</h3>
                    <p class="text-sm text-gray-600">Aún no contactado</p>
                @endif
            </div>

            <!-- Valor Estimado -->
            <div class="metric-card bg-gradient-to-br from-green-50 to-blue-50 rounded-xl shadow-lg p-6 border border-green-200 hover-lift">
                <div class="flex items-center justify-between mb-2">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Estimado</span>
                </div>
                @php
                    $valorAnual = 0;
                    if(str_contains(strtolower($contacto->institucion), 'universidad')) {
                        $valorAnual = 150000;
                    } elseif(str_contains(strtolower($contacto->institucion), 'instituto')) {
                        $valorAnual = 50000;
                    } elseif(str_contains(strtolower($contacto->institucion), 'colegio')) {
                        $valorAnual = 25000;
                    } else {
                        $valorAnual = 15000;
                    }
                @endphp
                <h3 class="text-2xl font-bold text-green-700 mb-1">${{ number_format($valorAnual/1000, 0) }}k</h3>
                <p class="text-sm text-gray-600">Valor anual estimado</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Información Principal -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Información de Contacto -->
                <div class="bg-gradient-to-br from-white via-blue-50/30 to-purple-50/30 rounded-2xl shadow-xl p-8 border-2 border-blue-100 hover-lift">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Información de Contacto</h2>
                                <p class="text-sm text-gray-600">Datos completos del lead</p>
                            </div>
                        </div>
                        <!-- Tags de Información -->
                        <div class="hidden md:flex items-center space-x-2">
                            @if($contacto->whatsapp)
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full border border-green-300 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                                WhatsApp
                            </span>
                            @endif
                            @if($contacto->email_contact)
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full border border-blue-300 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                Email
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Email -->
                        <div class="bg-gradient-to-br from-white to-blue-50/50 rounded-xl p-5 border-2 border-blue-100 hover:border-blue-300 hover:shadow-lg transition-all group">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-md">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </div>
                                    <label class="text-sm font-bold text-gray-800">Email</label>
                                </div>
                                <a href="{{ route('kibi.contacts.email.show', $contacto) }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-full transition-all shadow-md hover:shadow-lg flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Enviar
                                </a>
                            </div>
                            <div class="flex items-center justify-between">
                                <a href="mailto:{{ $contacto->email }}" class="text-gray-900 font-semibold hover:text-blue-600 transition-colors text-base">{{ $contacto->email }}</a>
                                <a href="mailto:{{ $contacto->email }}" class="opacity-0 group-hover:opacity-100 transition-opacity p-2 hover:bg-blue-100 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="bg-gradient-to-br from-white to-green-50/50 rounded-xl p-5 border-2 border-green-100 hover:border-green-300 hover:shadow-lg transition-all group">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-gradient-to-br from-green-400 to-green-600 rounded-lg shadow-md">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                        </svg>
                                    </div>
                                    <label class="text-sm font-bold text-gray-800">Teléfono</label>
                                </div>
                                @if($contacto->whatsapp)
                                <a href="{{ route('kibi.contacts.whatsapp.show', $contacto) }}" class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs font-semibold rounded-full transition-all shadow-md hover:shadow-lg flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                    </svg>
                                    WhatsApp
                                </a>
                                @endif
                            </div>
                            <div class="flex items-center justify-between">
                                <a href="tel:{{ $contacto->celular }}" class="text-gray-900 font-semibold hover:text-green-600 transition-colors text-base">{{ $contacto->celular }}</a>
                                <a href="tel:{{ $contacto->celular }}" class="opacity-0 group-hover:opacity-100 transition-opacity p-2 hover:bg-green-100 rounded-lg">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Institución -->
                        <div class="bg-gradient-to-br from-white to-purple-50/50 rounded-xl p-5 border-2 border-purple-100 hover:border-purple-300 hover:shadow-lg transition-all">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="p-2 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <label class="text-sm font-bold text-gray-800">Institución</label>
                            </div>
                            <p class="text-gray-900 font-bold text-lg">{{ $contacto->institucion }}</p>
                            @if($contacto->sitio_web)
                            <a href="{{ $contacto->sitio_web }}" target="_blank" class="mt-2 inline-flex items-center text-xs text-purple-600 hover:text-purple-800 font-semibold">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Visitar sitio web
                            </a>
                            @endif
                        </div>

                        <!-- Puesto -->
                        <div class="bg-gradient-to-br from-white to-green-50/50 rounded-xl p-5 border-2 border-green-100 hover:border-green-300 hover:shadow-lg transition-all">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="p-2 bg-gradient-to-br from-green-400 to-green-600 rounded-lg shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                    </svg>
                                </div>
                                <label class="text-sm font-bold text-gray-800">Puesto</label>
                            </div>
                            <p class="text-gray-900 font-bold text-lg">{{ $contacto->puesto }}</p>
                        </div>

                        <!-- Ubicación -->
                        <div class="bg-gradient-to-br from-white to-orange-50/50 rounded-xl p-5 border-2 border-orange-100 hover:border-orange-300 hover:shadow-lg transition-all md:col-span-2">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="p-2 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <label class="text-sm font-bold text-gray-800">Ubicación</label>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="fi fi-{{ getFlagCode($contacto->estado) }} text-2xl shadow-sm"></span>
                                <div>
                                    <p class="text-gray-900 font-bold text-lg">{{ $contacto->ciudad }}</p>
                                    <p class="text-gray-600 text-sm">{{ $contacto->estado }}, México</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pipeline de Ventas Educativas -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-xl p-8 border-2 border-blue-100 hover-lift">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="p-3 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Pipeline de Ventas</h2>
                                <p class="text-sm text-gray-600">Progreso del lead educativo</p>
                            </div>
                        </div>
                    </div>

                    <!-- Progreso del Pipeline Mejorado -->
                    <div class="mb-8">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                            <div class="flex flex-col items-center p-4 bg-white rounded-xl border-2 {{ $contacto->status == 'nuevo' || $contacto->status == 'contactado' || $contacto->status == 'interesado' || $contacto->status == 'convertido' ? 'border-green-500' : 'border-gray-200' }} hover:shadow-lg transition-all">
                                <div class="w-4 h-4 bg-green-500 rounded-full mb-2 animate-pulse-slow"></div>
                                <span class="text-xs font-semibold text-center text-gray-700">Lead Calificado</span>
                                <span class="text-xs text-gray-500 mt-1">Completado</span>
                            </div>
                            <div class="flex flex-col items-center p-4 bg-white rounded-xl border-2 {{ $contacto->status == 'contactado' || $contacto->status == 'interesado' || $contacto->status == 'convertido' ? 'border-yellow-500' : 'border-gray-200' }} hover:shadow-lg transition-all">
                                <div class="w-4 h-4 {{ $contacto->status == 'contactado' || $contacto->status == 'interesado' || $contacto->status == 'convertido' ? 'bg-yellow-500 animate-pulse-slow' : 'bg-gray-300' }} rounded-full mb-2"></div>
                                <span class="text-xs font-semibold text-center text-gray-700">Demo Programada</span>
                                <span class="text-xs text-gray-500 mt-1">{{ $contacto->status == 'contactado' || $contacto->status == 'interesado' || $contacto->status == 'convertido' ? 'Completado' : 'Pendiente' }}</span>
                            </div>
                            <div class="flex flex-col items-center p-4 bg-white rounded-xl border-2 {{ $contacto->status == 'interesado' || $contacto->status == 'convertido' ? 'border-purple-500' : 'border-gray-200' }} hover:shadow-lg transition-all">
                                <div class="w-4 h-4 {{ $contacto->status == 'interesado' || $contacto->status == 'convertido' ? 'bg-purple-500 animate-pulse-slow' : 'bg-gray-300' }} rounded-full mb-2"></div>
                                <span class="text-xs font-semibold text-center text-gray-700">Propuesta Enviada</span>
                                <span class="text-xs text-gray-500 mt-1">{{ $contacto->status == 'interesado' || $contacto->status == 'convertido' ? 'Completado' : 'Pendiente' }}</span>
                            </div>
                            <div class="flex flex-col items-center p-4 bg-white rounded-xl border-2 {{ $contacto->status == 'convertido' ? 'border-blue-500' : 'border-gray-200' }} hover:shadow-lg transition-all">
                                <div class="w-4 h-4 {{ $contacto->status == 'convertido' ? 'bg-blue-500 animate-pulse-slow' : 'bg-gray-300' }} rounded-full mb-2"></div>
                                <span class="text-xs font-semibold text-center text-gray-700">Acceso Otorgado</span>
                                <span class="text-xs text-gray-500 mt-1">{{ $contacto->status == 'convertido' ? 'Completado' : 'Pendiente' }}</span>
                            </div>
                        </div>

                        <!-- Barra de Progreso Mejorada -->
                        <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden progress-bar">
                            @php
                                $progress = 25;
                                $progressColor = 'from-blue-500 to-blue-600';
                                if($contacto->status == 'contactado') {
                                    $progress = 50;
                                    $progressColor = 'from-yellow-500 to-yellow-600';
                                } elseif($contacto->status == 'interesado') {
                                    $progress = 75;
                                    $progressColor = 'from-purple-500 to-purple-600';
                                } elseif($contacto->status == 'convertido') {
                                    $progress = 100;
                                    $progressColor = 'from-green-500 to-green-600';
                                }
                            @endphp
                            <div class="bg-gradient-to-r {{ $progressColor }} h-4 rounded-full transition-all duration-1000 ease-out relative" style="width: {{ $progress }}%">
                                <div class="absolute inset-0 bg-white opacity-20 animate-pulse-slow"></div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-3">
                            <p class="text-sm font-semibold text-gray-700">{{ $progress }}% completado</p>
                            <div class="flex items-center space-x-1">
                                @for($i = 1; $i <= 4; $i++)
                                    <div class="w-2 h-2 rounded-full {{ ($i * 25) <= $progress ? 'bg-green-500' : 'bg-gray-300' }} transition-colors"></div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Próximas Acciones Educativas -->
                    <div class="bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 rounded-xl p-6 border-2 border-blue-200">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                                Próximas Acciones
                            </h3>
                        </div>
                        <div class="space-y-3">
                            @if($contacto->status == 'nuevo')
                            <div class="flex items-center justify-between p-4 bg-white rounded-xl border-2 border-blue-200 shadow-md hover:shadow-lg transition-all hover-lift animate-slideIn">
                                <div class="flex items-center space-x-4">
                                    <div class="p-2 bg-blue-100 rounded-lg">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-900 block">Llamada inicial</span>
                                        <span class="text-sm text-gray-600">Calificar necesidades del cliente</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">Hoy</span>
                            </div>
                            @endif

                            @if($contacto->status == 'contactado')
                            <div class="flex items-center justify-between p-4 bg-white rounded-xl border-2 border-yellow-200 shadow-md hover:shadow-lg transition-all hover-lift animate-slideIn">
                                <div class="flex items-center space-x-4">
                                    <div class="p-2 bg-yellow-100 rounded-lg">
                                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-900 block">Programar demo de KIBI</span>
                                        <span class="text-sm text-gray-600">Mostrar funcionalidades de la plataforma</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">Esta semana</span>
                            </div>
                            @endif

                            @if($contacto->status == 'interesado')
                            <div class="flex items-center justify-between p-4 bg-white rounded-xl border-2 border-purple-200 shadow-md hover:shadow-lg transition-all hover-lift animate-slideIn">
                                <div class="flex items-center space-x-4">
                                    <div class="p-2 bg-purple-100 rounded-lg">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-900 block">Enviar propuesta comercial</span>
                                        <span class="text-sm text-gray-600">Incluir precios y condiciones</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-full animate-pulse">Urgente</span>
                            </div>
                            @endif

                            @if($contacto->status == 'convertido')
                            <div class="flex items-center justify-between p-4 bg-white rounded-xl border-2 border-green-200 shadow-md hover:shadow-lg transition-all hover-lift animate-slideIn">
                                <div class="flex items-center space-x-4">
                                    <div class="p-2 bg-green-100 rounded-lg">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-900 block">Configurar acceso a KIBI</span>
                                        <span class="text-sm text-gray-600">Activar cuenta y capacitación</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Completado</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Información Educativa -->
                <div class="bg-gradient-to-br from-white via-green-50/30 to-blue-50/30 rounded-2xl shadow-xl p-8 border-2 border-green-100 hover-lift">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-gradient-to-br from-green-500 to-blue-600 rounded-xl shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Información Educativa</h2>
                                <p class="text-sm text-gray-600">Análisis del potencial educativo</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $tipoInstitucion = 'Institución Educativa';
                            if(str_contains(strtolower($contacto->institucion), 'universidad') || str_contains(strtolower($contacto->institucion), 'university')) {
                                $tipoInstitucion = 'Universidad';
                            } elseif(str_contains(strtolower($contacto->institucion), 'instituto') || str_contains(strtolower($contacto->institucion), 'institute')) {
                                $tipoInstitucion = 'Instituto Tecnológico';
                            } elseif(str_contains(strtolower($contacto->institucion), 'colegio') || str_contains(strtolower($contacto->institucion), 'school')) {
                                $tipoInstitucion = 'Colegio Privado';
                            } elseif(str_contains(strtolower($contacto->institucion), 'escuela')) {
                                $tipoInstitucion = 'Escuela';
                            }

                            $nivelEducativo = 'Por determinar';
                            if(str_contains(strtolower($contacto->puesto), 'director') || str_contains(strtolower($contacto->puesto), 'rector')) {
                                $nivelEducativo = 'Educación Superior';
                            } elseif(str_contains(strtolower($contacto->puesto), 'coordinador')) {
                                $nivelEducativo = 'Educación Media Superior';
                            } elseif(str_contains(strtolower($contacto->puesto), 'profesor') || str_contains(strtolower($contacto->puesto), 'maestro')) {
                                $nivelEducativo = 'Educación Básica';
                            }

                            $estudiantesPotencial = 'Por evaluar';
                            if(str_contains(strtolower($contacto->institucion), 'universidad')) {
                                $estudiantesPotencial = '500-2000+ estudiantes';
                            } elseif(str_contains(strtolower($contacto->institucion), 'instituto')) {
                                $estudiantesPotencial = '200-1000 estudiantes';
                            } elseif(str_contains(strtolower($contacto->institucion), 'colegio')) {
                                $estudiantesPotencial = '100-500 estudiantes';
                            }

                            $presupuestoEstimado = 'Por determinar';
                            if(str_contains(strtolower($contacto->institucion), 'universidad')) {
                                $presupuestoEstimado = '$50,000 - $200,000/año';
                            } elseif(str_contains(strtolower($contacto->institucion), 'instituto')) {
                                $presupuestoEstimado = '$20,000 - $80,000/año';
                            } elseif(str_contains(strtolower($contacto->institucion), 'colegio')) {
                                $presupuestoEstimado = '$10,000 - $40,000/año';
                            }
                        @endphp

                        <!-- Tipo de Institución -->
                        <div class="bg-gradient-to-br from-white to-blue-50/50 rounded-xl p-5 border-2 border-blue-100 hover:border-blue-300 hover:shadow-lg transition-all">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="p-2 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <label class="text-sm font-bold text-gray-800">Tipo de Institución</label>
                            </div>
                            <p class="text-gray-900 font-bold text-lg">{{ $tipoInstitucion }}</p>
                        </div>

                        <!-- Nivel Educativo -->
                        <div class="bg-gradient-to-br from-white to-purple-50/50 rounded-xl p-5 border-2 border-purple-100 hover:border-purple-300 hover:shadow-lg transition-all">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="p-2 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    </svg>
                                </div>
                                <label class="text-sm font-bold text-gray-800">Nivel Educativo</label>
                            </div>
                            <p class="text-gray-900 font-bold text-lg">{{ $nivelEducativo }}</p>
                        </div>

                        <!-- Potencial de Estudiantes -->
                        <div class="bg-gradient-to-br from-white to-orange-50/50 rounded-xl p-5 border-2 border-orange-100 hover:border-orange-300 hover:shadow-lg transition-all">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="p-2 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <label class="text-sm font-bold text-gray-800">Potencial de Estudiantes</label>
                            </div>
                            <p class="text-gray-900 font-bold text-lg">{{ $estudiantesPotencial }}</p>
                        </div>

                        <!-- Presupuesto Estimado -->
                        <div class="bg-gradient-to-br from-white to-green-50/50 rounded-xl p-5 border-2 border-green-100 hover:border-green-300 hover:shadow-lg transition-all">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="p-2 bg-gradient-to-br from-green-400 to-green-600 rounded-lg shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <label class="text-sm font-bold text-gray-800">Presupuesto Estimado</label>
                            </div>
                            <p class="text-gray-900 font-bold text-lg">{{ $presupuestoEstimado }}</p>
                        </div>
                    </div>
                </div>

                <!-- Timeline de Actividades -->
                <div class="bg-gradient-to-br from-white via-purple-50/30 to-blue-50/30 rounded-2xl shadow-xl p-8 border-2 border-purple-100 hover-lift">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-gradient-to-br from-purple-500 to-blue-600 rounded-xl shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Historial de Actividades</h2>
                                <p class="text-sm text-gray-600">Timeline del contacto</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 relative">
                        <!-- Línea vertical del timeline -->
                        <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-300 via-purple-300 to-green-300 hidden md:block"></div>
                        
                        <!-- Actividad: Registro -->
                        <div class="flex items-start space-x-4 p-5 bg-gradient-to-r from-blue-50 to-white rounded-xl border-l-4 border-blue-500 shadow-md hover:shadow-lg transition-all relative z-10 hover-lift">
                            <div class="flex-shrink-0 relative z-10">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg ring-4 ring-white">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <p class="text-base font-bold text-gray-900">Contacto Registrado</p>
                                    <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">Inicio</span>
                                </div>
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $contacto->created_at->format('d/m/Y') }} a las {{ $contacto->created_at->format('H:i') }}
                                </p>
                            </div>
                        </div>

                        <!-- Actividad: Status Cambiado -->
                        <div class="flex items-start space-x-4 p-5 bg-gradient-to-r from-purple-50 to-white rounded-xl border-l-4 {{ $contacto->status == 'nuevo' ? 'border-green-500' : ($contacto->status == 'contactado' ? 'border-yellow-500' : ($contacto->status == 'interesado' ? 'border-purple-500' : ($contacto->status == 'convertido' ? 'border-blue-500' : 'border-red-500'))) }} shadow-md hover:shadow-lg transition-all relative z-10 hover-lift">
                            <div class="flex-shrink-0 relative z-10">
                                <div class="w-12 h-12 {{ $currentStatus['class'] }} rounded-full flex items-center justify-center shadow-lg ring-4 ring-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $currentStatus['icon'] }}"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <p class="text-base font-bold text-gray-900">Status: {{ $currentStatus['text'] }}</p>
                                    <span class="px-2 py-1 {{ $currentStatus['class'] }} text-xs font-bold rounded-full border">Actual</span>
                                </div>
                                <p class="text-sm text-gray-600">Estado actual del lead en el pipeline</p>
                            </div>
                        </div>

                        <!-- Actividad: Último Contacto -->
                        @if($contacto->contactado_at)
                        <div class="flex items-start space-x-4 p-5 bg-gradient-to-r from-green-50 to-white rounded-xl border-l-4 border-green-500 shadow-md hover:shadow-lg transition-all relative z-10 hover-lift">
                            <div class="flex-shrink-0 relative z-10">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center shadow-lg ring-4 ring-white animate-pulse-slow">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <p class="text-base font-bold text-gray-900">Último Contacto</p>
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">{{ $diasDesdeContacto }} {{ $diasDesdeContacto == 1 ? 'día' : 'días' }}</span>
                                </div>
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $contacto->contactado_at->format('d/m/Y') }} a las {{ $contacto->contactado_at->format('H:i') }}
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Notas de Seguimiento -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-yellow-100 rounded-lg">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Notas de Seguimiento</h2>
                        </div>
                    </div>

                    @if($contacto->notas)
                        <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl p-6 border border-gray-200">
                            <div class="prose max-w-none">
                                <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $contacto->notas }}</p>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            <p class="text-gray-500 italic">No hay notas de seguimiento registradas</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Panel Lateral -->
            <div class="space-y-6">
                <!-- Status -->
                <div class="bg-gradient-to-br from-white to-blue-50/30 rounded-2xl shadow-xl p-6 border-2 border-blue-100 hover-lift">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $currentStatus['icon'] }}"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Status Actual</h3>
                            <p class="text-xs text-gray-600">Estado del lead</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="inline-flex items-center space-x-3 px-6 py-4 rounded-xl text-lg font-bold {{ $currentStatus['class'] }} border-2 shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $currentStatus['icon'] }}"></path>
                            </svg>
                            <span>{{ $currentStatus['text'] }}</span>
                        </div>
                    </div>

                    <!-- Cambiar Status -->
                    <form method="POST" action="{{ route('kibi.contacts.update-status', $contacto) }}" class="bg-white rounded-xl p-4 border-2 border-gray-200">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-800 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                    Cambiar Status
                                </label>
                                <select name="status" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white font-semibold shadow-sm hover:border-blue-400 transition-colors">
                                    @foreach($statusConfig as $key => $config)
                                        <option value="{{ $key }}" {{ $contacto->status == $key ? 'selected' : '' }}>
                                            {{ $config['text'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-800 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Agregar Notas
                                </label>
                                <textarea name="notas" rows="4" placeholder="Escribe tus notas de seguimiento aquí..."
                                          class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 resize-none shadow-sm hover:border-purple-400 transition-colors"></textarea>
                            </div>
                            <button type="submit" class="w-full px-6 py-4 bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 hover:from-blue-700 hover:via-purple-700 hover:to-blue-700 text-white rounded-xl transition-all duration-300 font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Actualizar Status
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Valor del Lead Educativo -->
                <div class="bg-gradient-to-br from-white via-green-50/30 to-blue-50/30 rounded-2xl shadow-xl p-6 border-2 border-green-200 hover-lift">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="p-3 bg-gradient-to-br from-green-500 to-blue-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Valor del Lead</h3>
                                <p class="text-xs text-gray-600">Estimación financiera</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @php
                            $valorAnual = 0;
                            $probabilidad = 0;
                            $estudiantes = 0;

                            if(str_contains(strtolower($contacto->institucion), 'universidad')) {
                                $valorAnual = 150000;
                                $probabilidad = 85;
                                $estudiantes = 1500;
                            } elseif(str_contains(strtolower($contacto->institucion), 'instituto')) {
                                $valorAnual = 50000;
                                $probabilidad = 75;
                                $estudiantes = 600;
                            } elseif(str_contains(strtolower($contacto->institucion), 'colegio')) {
                                $valorAnual = 25000;
                                $probabilidad = 70;
                                $estudiantes = 300;
                            } else {
                                $valorAnual = 15000;
                                $probabilidad = 60;
                                $estudiantes = 200;
                            }
                        @endphp

                        <div class="text-center p-6 bg-gradient-to-br from-green-50 via-blue-50 to-purple-50 rounded-xl border-2 border-green-300 shadow-lg hover-lift">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-blue-500 rounded-full mb-3 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <p class="text-4xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-2">${{ number_format($valorAnual) }}</p>
                            <p class="text-sm font-semibold text-gray-700">Valor estimado anual</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl border border-purple-200 hover-lift">
                                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-2 shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <p class="text-2xl font-bold text-purple-700 mb-1">{{ $probabilidad }}%</p>
                                <p class="text-xs font-semibold text-gray-600">Probabilidad</p>
                            </div>
                            <div class="text-center p-4 bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl border border-orange-200 hover-lift">
                                <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-2 shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-2xl font-bold text-orange-700 mb-1">{{ number_format($estudiantes) }}</p>
                                <p class="text-xs font-semibold text-gray-600">Estudiantes</p>
                            </div>
                        </div>

                        <!-- ROI Estimado -->
                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl p-4 border border-blue-300 shadow-lg text-white">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    <span class="text-sm font-semibold">ROI Estimado</span>
                                </div>
                                <span class="text-2xl font-bold">{{ round(($valorAnual * $probabilidad / 100) / 1000) }}x</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preferencias de Contacto -->
                <div class="bg-gradient-to-br from-white to-green-50/30 rounded-2xl shadow-xl p-6 border-2 border-green-100 hover-lift">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="p-3 bg-gradient-to-br from-green-500 to-blue-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Preferencias</h3>
                                <p class="text-xs text-gray-600">Métodos de contacto</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-5 {{ $contacto->whatsapp ? 'bg-gradient-to-r from-green-50 to-green-100/50 border-2 border-green-300' : 'bg-gray-50 border-2 border-gray-200' }} rounded-xl hover:shadow-lg transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 {{ $contacto->whatsapp ? 'bg-gradient-to-br from-green-500 to-green-600' : 'bg-gray-300' }} rounded-xl shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="font-bold {{ $contacto->whatsapp ? 'text-green-800' : 'text-gray-600' }} block">WhatsApp</span>
                                    <span class="text-xs {{ $contacto->whatsapp ? 'text-green-600' : 'text-gray-500' }}">Mensajería instantánea</span>
                                </div>
                            </div>
                            <div class="flex items-center">
                                @if($contacto->whatsapp)
                                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-5 {{ $contacto->email_contact ? 'bg-gradient-to-r from-blue-50 to-blue-100/50 border-2 border-blue-300' : 'bg-gray-50 border-2 border-gray-200' }} rounded-xl hover:shadow-lg transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 {{ $contacto->email_contact ? 'bg-gradient-to-br from-blue-500 to-blue-600' : 'bg-gray-300' }} rounded-xl shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="font-bold {{ $contacto->email_contact ? 'text-blue-800' : 'text-gray-600' }} block">Email</span>
                                    <span class="text-xs {{ $contacto->email_contact ? 'text-blue-600' : 'text-gray-500' }}">Correo electrónico</span>
                                </div>
                            </div>
                            <div class="flex items-center">
                                @if($contacto->email_contact)
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información de Registro -->
                <div class="bg-gradient-to-br from-white to-gray-50/30 rounded-2xl shadow-xl p-6 border-2 border-gray-200 hover-lift">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="p-3 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Información</h3>
                                <p class="text-xs text-gray-600">Metadatos del contacto</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-white rounded-xl border-2 border-blue-100 hover:border-blue-300 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-sm font-bold text-gray-800 block">Registrado</span>
                                </div>
                            </div>
                            <span class="text-sm font-semibold text-gray-700 bg-white px-3 py-1 rounded-lg border border-gray-200">{{ $contacto->created_at->format('d/m/Y') }}</span>
                        </div>

                        @if($contacto->contactado_at)
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-white rounded-xl border-2 border-green-100 hover:border-green-300 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-green-100 rounded-lg">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-sm font-bold text-gray-800 block">Último contacto</span>
                                    <span class="text-xs text-gray-500">{{ $diasDesdeContacto }} {{ $diasDesdeContacto == 1 ? 'día' : 'días' }} atrás</span>
                                </div>
                            </div>
                            <span class="text-sm font-semibold text-gray-700 bg-white px-3 py-1 rounded-lg border border-gray-200">{{ $contacto->contactado_at->format('d/m/Y') }}</span>
                        </div>
                        @endif

                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-white rounded-xl border-2 border-purple-100 hover:border-purple-300 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-sm font-bold text-gray-800 block">ID de Contacto</span>
                                    <span class="text-xs text-gray-500">Identificador único</span>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-gray-900 font-mono bg-white px-3 py-1 rounded-lg border border-gray-200">#{{ $contacto->id }}</span>
                        </div>
                    </div>
                </div>

                <!-- Acciones Peligrosas -->
                <div class="bg-gradient-to-br from-red-50 via-white to-red-50/30 rounded-2xl shadow-xl p-6 border-2 border-red-300 hover-lift">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-red-700">Zona de Peligro</h3>
                            <p class="text-xs text-red-600">Acciones irreversibles</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('kibi.contacts.destroy', $contacto) }}"
                          onsubmit="return confirm('⚠️ ¿Estás seguro de eliminar este contacto?\n\nEsta acción NO se puede deshacer y se perderá toda la información relacionada.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full flex items-center justify-center px-6 py-4 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-xl transition-all duration-300 font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Eliminar Contacto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
