@extends('layouts.app')

@section('title', 'Verificar Certificado - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-pink-400/20 to-indigo-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-cyan-400/10 to-blue-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-600/10 via-purple-600/10 to-pink-600/10 dark:from-blue-400/5 dark:via-purple-400/5 dark:to-pink-400/5 border-b border-gray-200/50 dark:border-slate-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <!-- Icon -->
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 via-purple-600 to-pink-600 rounded-3xl mb-6 shadow-2xl shadow-blue-500/30">
                    <span class="material-icons text-white text-3xl">verified</span>
                </div>

                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Verificación de Certificado
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Verifica la autenticidad de un certificado de SoftLinkIA
                </p>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Mensajes de éxito/error -->
        @if(session('success'))
        <div class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-4 flex items-center justify-between animate-fade-in">
            <div class="flex items-center">
                <span class="material-icons text-green-600 dark:text-green-400 mr-3">check_circle</span>
                <p class="text-green-800 dark:text-green-200 font-medium">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-200">
                <span class="material-icons text-sm">close</span>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4 flex items-center justify-between animate-fade-in">
            <div class="flex items-center">
                <span class="material-icons text-red-600 dark:text-red-400 mr-3">error</span>
                <p class="text-red-800 dark:text-red-200 font-medium">{{ session('error') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-200">
                <span class="material-icons text-sm">close</span>
            </button>
        </div>
        @endif

        @if($encontrado)
            <!-- Certificate Found -->
            <div class="bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-2xl shadow-green-500/10 overflow-hidden">
                <!-- Success Header -->
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-8 text-white">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 rounded-2xl">
                            <span class="material-icons text-2xl">check_circle</span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">Certificado Válido</h2>
                            <p class="text-green-100">Este certificado ha sido verificado exitosamente</p>
                        </div>
                    </div>
                </div>

                <!-- Certificate Details -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Certificate Info -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Información del Certificado</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Código Único:</span>
                                        <span class="text-sm font-mono font-bold text-gray-900 dark:text-white">{{ $certificado->codigo_unico }}</span>
                                    </div>
                                    <!-- Código QR - Siempre visible si existe -->
                                    <div class="py-4 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Código QR de Verificación:</span>
                                            <form action="{{ route('certificados.regenerar-qr', $certificado->codigo_unico) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit"
                                                        class="inline-flex items-center px-2 py-1 text-xs bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200"
                                                        title="Regenerar código QR">
                                                    <span class="material-icons text-xs mr-1">refresh</span>
                                                    Regenerar
                                                </button>
                                            </form>
                                        </div>
                                        @php
                                            $qrExists = false;
                                            $qrUrl = null;
                                            $qrIsSvg = false;
                                            if ($certificado->qr_code) {
                                                $fullPath = storage_path('app/public/' . $certificado->qr_code);
                                                $qrExists = file_exists($fullPath);
                                                if ($qrExists) {
                                                    // Usar asset directamente que es más confiable
                                                    $qrUrl = asset('storage/' . $certificado->qr_code);
                                                    $qrIsSvg = strtolower(pathinfo($certificado->qr_code, PATHINFO_EXTENSION)) === 'svg';
                                                } else {
                                                    // Si el archivo no existe, intentar regenerar
                                                    \Log::warning("QR file no existe físicamente", [
                                                        'certificado_id' => $certificado->id,
                                                        'qr_path' => $certificado->qr_code,
                                                        'full_path' => $fullPath
                                                    ]);
                                                }
                                            }
                                        @endphp

                                        @if($qrExists && $qrUrl)
                                        <div class="flex flex-col items-center">
                                            <div class="bg-white dark:bg-slate-700 p-4 rounded-2xl shadow-2xl border-2 border-blue-200 dark:border-blue-600 hover:border-blue-500 dark:hover:border-blue-400 transition-all duration-300 hover:shadow-blue-500/20 w-full max-w-xs mx-auto">
                                                @if($qrIsSvg)
                                                <div class="w-full aspect-square flex items-center justify-center overflow-hidden p-2">
                                                    <div class="w-full h-full max-w-[200px] max-h-[200px] flex items-center justify-center">
                                                        <div style="width: 100%; height: 100%; max-width: 200px; max-height: 200px; display: flex; align-items: center; justify-content: center;">
                                                            @php
                                                                $svgContent = '';
                                                                $svgPath = storage_path('app/public/' . $certificado->qr_code);
                                                                if (file_exists($svgPath)) {
                                                                    $svgContent = file_get_contents($svgPath);
                                                                    if ($svgContent) {
                                                                        $svgContent = preg_replace('/<svg([^>]*)>/i', '<svg$1 style="width: 100%; height: 100%; max-width: 100%; max-height: 100%;" preserveAspectRatio="xMidYMid meet">', $svgContent);
                                                                    }
                                                                }
                                                            @endphp
                                                            @if($svgContent)
                                                                {!! $svgContent !!}
                                                            @else
                                                                <div class="text-center text-gray-400">
                                                                    <span class="material-icons text-4xl">error</span>
                                                                    <p class="text-xs mt-2">Error al cargar QR</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                @php
                                                    // Verificar que el archivo existe y generar URL con timestamp para evitar cache
                                                    $qrFileExists = file_exists(storage_path('app/public/' . $certificado->qr_code));
                                                    $qrImageUrl = $qrUrl ? ($qrUrl . '?v=' . time()) : null;
                                                @endphp
                                                @if($qrFileExists && $qrImageUrl)
                                                <img src="{{ $qrImageUrl }}"
                                                     alt="QR Code - {{ $certificado->codigo_unico }}"
                                                     class="w-full h-auto max-w-full max-h-[200px] mx-auto object-contain"
                                                     title="Escanea este código QR para verificar el certificado"
                                                     id="qr-image-{{ $certificado->id }}"
                                                     loading="lazy"
                                                     @if(session('qr_regenerated'))
                                                     onload="this.style.opacity='0'; setTimeout(() => { this.style.transition='opacity 0.5s'; this.style.opacity='1'; }, 100);"
                                                     @endif
                                                     onerror="console.error('Error cargando QR:', this.src); this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='block';">
                                                <div style="display:none;" class="text-center text-gray-400 py-4">
                                                    <span class="material-icons text-4xl">error</span>
                                                    <p class="text-xs mt-2">Error al cargar QR</p>
                                                    <form action="{{ route('certificados.regenerar-qr', $certificado->codigo_unico) }}" method="POST" class="mt-2">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded transition-colors">
                                                            Regenerar QR
                                                        </button>
                                                    </form>
                                                </div>
                                                @else
                                                <div class="text-center text-gray-400 py-4">
                                                    <span class="material-icons text-4xl">qr_code_2</span>
                                                    <p class="text-xs mt-2">QR no disponible</p>
                                                    <form action="{{ route('certificados.regenerar-qr', $certificado->codigo_unico) }}" method="POST" class="mt-2">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded transition-colors">
                                                            Generar QR
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                                @endif
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                                                    <span class="material-icons text-xs align-middle">qr_code_scanner</span>
                                                    Escanea para verificar este certificado
                                                </p>
                                                <p class="text-xs text-gray-400 dark:text-gray-500 font-mono bg-gray-100 dark:bg-slate-700 px-3 py-1 rounded-lg inline-block">
                                                    {{ $certificado->codigo_unico }}
                                                </p>
                                                <div class="flex items-center justify-center gap-3 mt-3">
                                                    <a href="{{ route('certificados.descargar-qr', $certificado->codigo_unico) }}"
                                                       class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                                                        <span class="material-icons text-sm mr-1">download</span>
                                                        Descargar QR
                                                    </a>
                                                    <button onclick="navigator.clipboard.writeText('{{ $certificado->codigo_unico }}').then(() => { alert('Código copiado al portapapeles'); })"
                                                            class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-xs font-semibold rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                                                        <span class="material-icons text-sm mr-1">content_copy</span>
                                                        Copiar Código
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="text-center py-6 bg-gray-50 dark:bg-slate-700/50 rounded-xl">
                                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 dark:bg-slate-700 rounded-2xl mb-3 shadow-inner">
                                                <span class="material-icons text-gray-400 text-4xl animate-pulse">qr_code_2</span>
                                            </div>
                                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">QR Code no disponible</p>
                                            @if($certificado->qr_code)
                                            <p class="text-xs text-gray-400 dark:text-gray-500 font-mono mb-3 break-all px-4">
                                                Ruta: {{ $certificado->qr_code }}
                                            </p>
                                            @endif
                                            <form action="{{ route('certificados.regenerar-qr', $certificado->codigo_unico) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                                                    <span class="material-icons text-sm mr-2">refresh</span>
                                                    Generar QR Ahora
                                                </button>
                                            </form>
                                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-3">
                                                El QR se generará automáticamente al recargar la página
                                            </p>
                                            <div class="mt-3 p-3 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                                                <p class="text-xs text-yellow-800 dark:text-yellow-200 font-semibold mb-1">
                                                    <span class="material-icons text-xs align-middle">info</span>
                                                    ¿Problemas con GD?
                                                </p>
                                                <p class="text-xs text-yellow-700 dark:text-yellow-300">
                                                    Visita <a href="{{ route('certificados.diagnostico-gd') }}" target="_blank" class="underline font-semibold">el diagnóstico del sistema</a> para ver información detallada.
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Estado:</span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            {{ $certificado->status === 'valido' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                            {{ ucfirst($certificado->status) }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Fecha de Emisión:</span>
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $certificado->fecha_emision ? $certificado->fecha_emision->format('d/m/Y') : 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Student & Course Info -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Información del Estudiante</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Nombre:</span>
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $certificado->usuario->name }} {{ $certificado->usuario->apellido_paterno }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Email:</span>
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $certificado->usuario->email }}</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Información del Curso</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Curso:</span>
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $certificado->curso->titulo }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Nivel:</span>
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ ucfirst($certificado->curso->nivel_dificultad ?? 'N/A') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-slate-600/50">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Duración:</span>
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $certificado->curso->duracion_horas ?? 'N/A' }} horas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-200/50 dark:border-slate-600/50">
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ route('certificados.show', $certificado) }}"
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-semibold rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-400/30">
                                <span class="material-icons text-sm mr-2">visibility</span>
                                Ver Certificado Completo
                            </a>
                            <a href="{{ route('certificados.descargar', $certificado) }}"
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-500 hover:to-emerald-500 text-white font-semibold rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-green-400/30">
                                <span class="material-icons text-sm mr-2">download</span>
                                Descargar PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Certificate Not Found -->
            <div class="bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-2xl shadow-red-500/10 overflow-hidden">
                <!-- Error Header -->
                <div class="bg-gradient-to-r from-red-500 to-pink-600 p-8 text-white">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 rounded-2xl">
                            <span class="material-icons text-2xl">error</span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">Certificado No Encontrado</h2>
                            <p class="text-red-100">El código proporcionado no corresponde a ningún certificado válido</p>
                        </div>
                    </div>
                </div>

                <!-- Error Content -->
                <div class="p-8 text-center">
                    <div class="max-w-md mx-auto">
                        <!-- Warning Icon -->
                        <div class="relative mb-8">
                            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-gradient-to-r from-red-100 to-pink-100 dark:from-red-900/30 dark:to-pink-900/30 mb-6 shadow-xl border border-red-200/50 dark:border-red-700/50">
                                <span class="material-icons text-red-600 dark:text-red-400 text-4xl animate-bounce">warning</span>
                            </div>
                            <!-- Floating Elements -->
                            <div class="absolute -top-2 -right-2 w-3 h-3 bg-red-400 rounded-full animate-ping"></div>
                            <div class="absolute -bottom-2 -left-2 w-2 h-2 bg-pink-400 rounded-full animate-ping delay-300"></div>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-4 bg-gradient-to-r from-gray-900 via-red-900 to-pink-900 dark:from-white dark:via-red-100 dark:to-pink-100 bg-clip-text text-transparent">
                            Código Inválido
                        </h3>

                        <p class="text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">
                            El código de certificado que has proporcionado no existe en nuestro sistema o puede haber sido revocado.
                        </p>

                        <!-- Suggestions -->
                        <div class="bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/10 dark:to-pink-900/10 rounded-2xl border border-red-200/50 dark:border-red-700/50 p-6 mb-8">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">¿Qué puedes hacer?</h4>
                            <ul class="text-left space-y-2 text-sm text-gray-700 dark:text-gray-300">
                                <li class="flex items-center">
                                    <span class="material-icons text-red-500 mr-2 text-sm">check_circle</span>
                                    Verifica que el código esté escrito correctamente
                                </li>
                                <li class="flex items-center">
                                    <span class="material-icons text-red-500 mr-2 text-sm">check_circle</span>
                                    Asegúrate de que no haya espacios adicionales
                                </li>
                                <li class="flex items-center">
                                    <span class="material-icons text-red-500 mr-2 text-sm">check_circle</span>
                                    Contacta al soporte si crees que es un error
                                </li>
                            </ul>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            <button onclick="window.history.back()"
                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-600 to-slate-600 hover:from-gray-500 hover:to-slate-500 text-white font-semibold rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-gray-400/30">
                                <span class="material-icons text-sm mr-2">arrow_back</span>
                                Volver Atrás
                            </button>
                            <a href="{{ route('contacto') }}"
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-semibold rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-400/30">
                                <span class="material-icons text-sm mr-2">contact_support</span>
                                Contactar Soporte
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Verification Form (always visible) -->
        <div class="mt-12 bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-2xl shadow-blue-500/10 overflow-hidden">
            <div class="p-8">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Verificar Otro Certificado</h3>
                    <p class="text-gray-600 dark:text-gray-400">Ingresa el código único del certificado que deseas verificar</p>
                </div>

                <form id="verificarForm" action="#" method="GET" class="max-w-md mx-auto" onsubmit="event.preventDefault();(function(){var i=document.querySelector('#verificarForm input[name=codigo]'); if(!i||!i.value) return; var base='{{ url('certificados/verificar') }}'; window.location.href= base + '/' + encodeURIComponent(i.value.trim());})();">
                    <div class="relative">
                        <input type="text"
                               name="codigo"
                               placeholder="Ej: CERT-ABC12345-2024"
                               class="w-full px-6 py-4 pl-14 bg-white/80 dark:bg-slate-700/80 backdrop-blur-sm border-2 border-gray-200/50 dark:border-gray-600/50 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 dark:focus:border-blue-400 dark:text-white transition-all duration-300 hover:border-gray-300 dark:hover:border-gray-500 placeholder-gray-400 dark:placeholder-gray-500 text-center font-mono text-lg"
                               required>
                        <span class="absolute left-5 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">verified</span>
                    </div>

                    <button type="submit"
                            class="w-full mt-6 px-8 py-4 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-bold rounded-2xl shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 hover:scale-105 hover:-translate-y-1">
                        <span class="material-icons mr-3 text-lg">search</span>
                        Verificar Certificado
                    </button>
                </form>

                <!-- Help Text -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Los códigos de certificado tienen el formato: <code class="bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded text-xs">CERT-XXXXXXXX-YYYY</code>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/certificados-verificar.css') }}">
@endpush

@push('scripts')
<script>
    // Pasar datos de PHP a JavaScript
    window.QR_REGENERATED = @json(session('qr_regenerated', false));
    window.CERTIFICADO_ID = @json($certificado->id ?? null);
</script>
<script src="{{ asset('js/certificados/verificar.js') }}"></script>
@endpush
@endsection
