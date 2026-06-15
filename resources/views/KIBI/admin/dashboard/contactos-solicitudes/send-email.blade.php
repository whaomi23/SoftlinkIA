@extends('KIBI.layouts.auth')

@section('title', 'KIBI - Enviar Email')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css">
<style>
    .file-item {
        animation: slideIn 0.3s ease-out;
    }
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    .loading-spinner {
        width: 50px;
        height: 50px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #02AFC9;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .preview-modal {
        display: none;
        position: fixed;
        z-index: 10000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.6);
        backdrop-filter: blur(4px);
    }
    .preview-content {
        background-color: #fefefe;
        margin: 2% auto;
        padding: 0;
        border: none;
        border-radius: 16px;
        width: 90%;
        max-width: 800px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        animation: modalFadeIn 0.3s ease-out;
    }
    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    .note-editor.note-frame {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }
    .note-editor.note-frame .note-editing-area {
        min-height: 300px;
    }
</style>
@endpush

@section('content')
<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="bg-white rounded-2xl p-8 flex flex-col items-center shadow-2xl">
        <div class="loading-spinner mb-4"></div>
        <p class="text-gray-700 font-semibold">Enviando email...</p>
        <p class="text-gray-500 text-sm mt-1">Por favor espere</p>
    </div>
</div>

<!-- Preview Modal -->
<div id="previewModal" class="preview-modal">
    <div class="preview-content">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6 rounded-t-2xl flex items-center justify-between">
            <h2 class="text-2xl font-bold text-white">Vista Previa del Email</h2>
            <button onclick="closePreview()" class="text-white hover:text-gray-200 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 bg-gray-50 border-b border-gray-200">
            <div class="space-y-2">
                <p class="text-sm text-gray-600"><strong>Para:</strong> <span class="text-gray-900">{{ $contacto->email }}</span></p>
                <p class="text-sm text-gray-600"><strong>Asunto:</strong> <span class="text-gray-900" id="previewSubject"></span></p>
                <div id="previewCcBcc" class="text-sm text-gray-600 hidden"></div>
            </div>
        </div>
        <div class="p-6 bg-white max-h-96 overflow-y-auto">
            <div id="previewBody" class="prose max-w-none"></div>
        </div>
        <div class="bg-gray-50 p-6 rounded-b-2xl flex justify-end space-x-4">
            <button onclick="closePreview()" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors font-semibold">
                Cerrar
            </button>
            <button onclick="submitForm()" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-lg transition-all font-semibold shadow-lg">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                Enviar Email
            </button>
        </div>
    </div>
</div>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-purple-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-lg p-4 shadow-lg animate-fadeIn">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-700 font-semibold">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-lg p-4 shadow-lg animate-fadeIn">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-red-700 font-semibold">{{ session('error') }}</p>
            </div>
        </div>
        @endif

        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-6 border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4 md:space-x-6">
                    <!-- Avatar -->
                    <div class="relative">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white text-xl md:text-2xl font-bold shadow-lg">
                            {{ strtoupper(substr($contacto->nombre, 0, 1) . substr($contacto->apellidos, 0, 1)) }}
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 border-2 border-white rounded-full"></div>
                    </div>

                    <!-- Información del Contacto -->
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Enviar Email a {{ $contacto->nombre_completo }}</h1>
                        <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4 text-gray-600 text-sm md:text-base">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="truncate">{{ $contacto->institucion }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                <span class="truncate">{{ $contacto->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón Volver -->
                <a href="{{ route('kibi.contacts.show', $contacto) }}"
                   class="inline-flex items-center justify-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-all duration-200 font-semibold whitespace-nowrap">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="hidden sm:inline">Volver al Contacto</span>
                    <span class="sm:hidden">Volver</span>
                </a>
            </div>
        </div>

        <!-- Formulario de Email -->
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100">
            <div class="flex items-center space-x-3 mb-6 md:mb-8">
                <div class="p-3 bg-gradient-to-br from-blue-100 to-purple-100 rounded-xl">
                    <svg class="w-6 h-6 md:w-8 md:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Componer Email</h2>
                    <p class="text-gray-600 mt-1 text-sm md:text-base">Envía un email profesional a {{ $contacto->nombre_completo }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('kibi.contacts.email.send', $contacto) }}" enctype="multipart/form-data" id="emailForm">
                @csrf

                <div class="space-y-6 md:space-y-8">
                    <!-- Destinatario (solo lectura) -->
                    <div class="bg-gray-50 rounded-xl p-4 md:p-6">
                        <label class="block text-sm md:text-base font-semibold text-gray-800 mb-3">
                            <svg class="w-4 h-4 md:w-5 md:h-5 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Para
                        </label>
                        <div class="flex items-center px-4 py-3 bg-white border-2 border-gray-200 rounded-lg">
                            <span class="text-gray-700 font-medium">{{ $contacto->email }}</span>
                            <span class="ml-2 px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full font-semibold">{{ $contacto->nombre_completo }}</span>
                        </div>
                    </div>

                    <!-- CC y BCC (Opcionales) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <div class="bg-gray-50 rounded-xl p-4 md:p-6">
                            <div class="flex items-center justify-between mb-3">
                                <label class="block text-sm md:text-base font-semibold text-gray-800">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    CC (Opcional)
                                </label>
                                <button type="button" onclick="toggleCcBcc('cc')" class="text-xs text-blue-600 hover:text-blue-800 font-semibold" id="toggleCcBtn">
                                    Mostrar
                                </button>
                            </div>
                            <input type="email" name="cc" id="ccField"
                                   class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent hidden"
                                   placeholder="email1@ejemplo.com, email2@ejemplo.com"
                                   multiple>
                            @error('cc')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 md:p-6">
                            <div class="flex items-center justify-between mb-3">
                                <label class="block text-sm md:text-base font-semibold text-gray-800">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 inline mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    BCC (Opcional)
                                </label>
                                <button type="button" onclick="toggleCcBcc('bcc')" class="text-xs text-purple-600 hover:text-purple-800 font-semibold" id="toggleBccBtn">
                                    Mostrar
                                </button>
                            </div>
                            <input type="email" name="bcc" id="bccField"
                                   class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent hidden"
                                   placeholder="email1@ejemplo.com, email2@ejemplo.com"
                                   multiple>
                            @error('bcc')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Asunto -->
                    <div class="bg-gray-50 rounded-xl p-4 md:p-6">
                        <label class="block text-sm md:text-base font-semibold text-gray-800 mb-3">
                            <svg class="w-4 h-4 md:w-5 md:h-5 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Asunto del Email
                        </label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject', 'Propuesta KIBI - ' . $contacto->institucion) }}"
                               class="w-full px-4 md:px-6 py-3 md:py-4 text-base md:text-lg border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                               placeholder="Ingresa el asunto del email" required>
                        <div class="mt-2 flex justify-end">
                            <span class="text-xs text-gray-500" id="subjectCounter">0 / 255 caracteres</span>
                        </div>
                        @error('subject')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mensaje con Editor Enriquecido -->
                    <div class="bg-gray-50 rounded-xl p-4 md:p-6">
                        <div class="flex items-center justify-between mb-3">
                            <label class="block text-sm md:text-base font-semibold text-gray-800">
                                <svg class="w-4 h-4 md:w-5 md:h-5 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Mensaje
                            </label>
                            <div class="flex items-center space-x-4">
                                <span class="text-xs text-gray-500" id="messageStats">0 palabras</span>
                                <button type="button" onclick="previewEmail()" class="text-xs text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Vista Previa
                                </button>
                            </div>
                        </div>
                        <textarea name="message" id="messageEditor" rows="15"
                                  class="w-full px-4 md:px-6 py-4 text-base md:text-lg border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none hidden">{{ old('message', 'Estimado/a ' . $contacto->nombre . ',

Espero que se encuentre muy bien. Me pongo en contacto con usted para presentarle KIBI, nuestra plataforma educativa innovadora que puede transformar la experiencia de aprendizaje en ' . $contacto->institucion . '.

KIBI ofrece:
• Contenido educativo interactivo y personalizado
• Herramientas de seguimiento del progreso estudiantil
• Plataforma intuitiva y fácil de usar
• Soporte técnico especializado

Me gustaría programar una demostración personalizada para mostrarle cómo KIBI puede beneficiar a su institución.

¿Podríamos agendar una reunión esta semana?

Quedo atento a su respuesta.

Saludos cordiales,
Equipo KIBI') }}</textarea>
                        <div id="editorContainer" class="border-2 border-gray-300 rounded-xl overflow-hidden"></div>
                        @error('message')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Adjuntos -->
                    <div class="bg-gray-50 rounded-xl p-4 md:p-6">
                        <label class="block text-sm md:text-base font-semibold text-gray-800 mb-3">
                            <svg class="w-4 h-4 md:w-5 md:h-5 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                            </svg>
                            Adjuntos (Opcional)
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 md:p-8 text-center hover:border-blue-400 transition-colors bg-white" id="dropZone">
                            <input type="file" name="attachments[]" multiple
                                   class="hidden" id="file-input"
                                   accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.ppt,.pptx">
                            <div class="space-y-3">
                                <svg class="w-12 h-12 md:w-16 md:h-16 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                                <p class="text-base md:text-lg text-gray-600">Arrastra archivos aquí o <button type="button" onclick="document.getElementById('file-input').click()" class="text-blue-600 hover:text-blue-800 font-semibold underline">haz clic para seleccionar</button></p>
                                <p class="text-xs md:text-sm text-gray-500">PDF, DOC, DOCX, JPG, PNG, PPT, PPTX (máx. 10MB por archivo)</p>
                            </div>
                        </div>
                        <div id="fileList" class="mt-4 space-y-2"></div>
                        @error('attachments')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Plantillas Rápidas -->
                    <div class="bg-gray-50 rounded-xl p-4 md:p-6">
                        <label class="block text-sm md:text-base font-semibold text-gray-800 mb-4">
                            <svg class="w-4 h-4 md:w-5 md:h-5 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Plantillas Rápidas
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                            <button type="button" onclick="loadTemplate('demo')"
                                    class="p-4 md:p-6 bg-blue-50 hover:bg-blue-100 border-2 border-blue-200 hover:border-blue-300 rounded-xl transition-all duration-200 text-left group hover:shadow-lg">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-base md:text-lg font-semibold text-blue-800">Solicitar Demo</span>
                                </div>
                                <p class="text-xs md:text-sm text-blue-600">Plantilla para programar demostración personalizada</p>
                            </button>

                            <button type="button" onclick="loadTemplate('proposal')"
                                    class="p-4 md:p-6 bg-green-50 hover:bg-green-100 border-2 border-green-200 hover:border-green-300 rounded-xl transition-all duration-200 text-left group hover:shadow-lg">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="p-2 bg-green-100 rounded-lg group-hover:bg-green-200 transition-colors">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-base md:text-lg font-semibold text-green-800">Enviar Propuesta</span>
                                </div>
                                <p class="text-xs md:text-sm text-green-600">Plantilla para propuesta comercial detallada</p>
                            </button>

                            <button type="button" onclick="loadTemplate('followup')"
                                    class="p-4 md:p-6 bg-purple-50 hover:bg-purple-100 border-2 border-purple-200 hover:border-purple-300 rounded-xl transition-all duration-200 text-left group hover:shadow-lg">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-base md:text-lg font-semibold text-purple-800">Seguimiento</span>
                                </div>
                                <p class="text-xs md:text-sm text-purple-600">Plantilla para seguimiento de propuestas</p>
                            </button>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 pt-6 md:pt-8 border-t-2 border-gray-200">
                        <button type="submit" id="submitBtn"
                                class="flex-1 inline-flex items-center justify-center px-6 md:px-8 py-3 md:py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-xl transition-all duration-200 font-semibold text-base md:text-lg shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 md:w-6 md:h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Enviar Email
                        </button>

                        <button type="button" onclick="previewEmail()"
                                class="flex-1 inline-flex items-center justify-center px-6 md:px-8 py-3 md:py-4 bg-white hover:bg-gray-50 border-2 border-gray-300 text-gray-700 rounded-xl transition-all duration-200 font-semibold text-base md:text-lg">
                            <svg class="w-5 h-5 md:w-6 md:h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Vista Previa
                        </button>

                        <a href="{{ route('kibi.contacts.show', $contacto) }}"
                           class="flex-1 inline-flex items-center justify-center px-6 md:px-8 py-3 md:py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors font-semibold text-base md:text-lg">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
let selectedFiles = [];
let editorInitialized = false;

// Inicializar Summernote
$(document).ready(function() {
    if (!editorInitialized) {
        $('#editorContainer').summernote({
            height: 350,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            placeholder: 'Escribe tu mensaje aquí...',
            callbacks: {
                onChange: function(contents) {
                    $('#messageEditor').val(contents);
                    updateMessageStats(contents);
                },
                onInit: function() {
                    const defaultMessage = $('#messageEditor').val();
                    $('#editorContainer').summernote('code', defaultMessage);
                    updateMessageStats(defaultMessage);
                }
            }
        });
        editorInitialized = true;
    }

    // Contador de caracteres para asunto
    $('#subject').on('input', function() {
        const length = $(this).val().length;
        const maxLength = 255;
        $('#subjectCounter').text(`${length} / ${maxLength} caracteres`);
        if (length > maxLength * 0.9) {
            $('#subjectCounter').addClass('text-orange-500').removeClass('text-gray-500');
        } else {
            $('#subjectCounter').addClass('text-gray-500').removeClass('text-orange-500');
        }
    });
    $('#subject').trigger('input');

    // Manejo de archivos
    const fileInput = document.getElementById('file-input');
    const dropZone = document.getElementById('dropZone');
    const fileList = document.getElementById('fileList');

    // Drag and drop
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('border-blue-500', 'bg-blue-50');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('border-blue-500', 'bg-blue-50');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('border-blue-500', 'bg-blue-50');
        const files = e.dataTransfer.files;
        handleFiles(files);
    });

    fileInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });
});

function handleFiles(files) {
    Array.from(files).forEach(file => {
        if (file.size > 10 * 1024 * 1024) {
            alert(`El archivo ${file.name} excede el límite de 10MB`);
            return;
        }
        if (!selectedFiles.find(f => f.name === file.name && f.size === file.size)) {
            selectedFiles.push(file);
        }
    });
    updateFileList();
}

function updateFileList() {
    const fileList = document.getElementById('fileList');
    if (selectedFiles.length === 0) {
        fileList.innerHTML = '';
        return;
    }

    fileList.innerHTML = selectedFiles.map((file, index) => `
        <div class="file-item bg-white border-2 border-gray-200 rounded-lg p-3 flex items-center justify-between hover:border-blue-400 transition-colors">
            <div class="flex items-center space-x-3 flex-1 min-w-0">
                <svg class="w-8 h-8 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800 truncate">${file.name}</p>
                    <p class="text-xs text-gray-500">${formatFileSize(file.size)}</p>
                </div>
            </div>
            <button type="button" onclick="removeFile(${index})" class="ml-3 text-red-500 hover:text-red-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    `).join('');

    // Actualizar input file
    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    document.getElementById('file-input').files = dataTransfer.files;
}

function removeFile(index) {
    selectedFiles.splice(index, 1);
    updateFileList();
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
}

function toggleCcBcc(type) {
    const field = type === 'cc' ? document.getElementById('ccField') : document.getElementById('bccField');
    const btn = type === 'cc' ? document.getElementById('toggleCcBtn') : document.getElementById('toggleBccBtn');
    
    if (field.classList.contains('hidden')) {
        field.classList.remove('hidden');
        btn.textContent = 'Ocultar';
    } else {
        field.classList.add('hidden');
        btn.textContent = 'Mostrar';
    }
}

function updateMessageStats(html) {
    const text = $(html).text() || html.replace(/<[^>]*>/g, '');
    const words = text.trim().split(/\s+/).filter(word => word.length > 0);
    const wordCount = words.length;
    const charCount = text.length;
    document.getElementById('messageStats').textContent = `${wordCount} palabras • ${charCount} caracteres`;
}

// Plantillas
const templates = {
    demo: {
        subject: 'Demo KIBI - {{ $contacto->institucion }}',
        message: `<p>Estimado/a <strong>{{ $contacto->nombre }}</strong>,</p>
<p>Espero que se encuentre muy bien. Me pongo en contacto con usted para invitarlo/a a una demostración personalizada de KIBI, nuestra plataforma educativa que está revolucionando la forma en que las instituciones educativas gestionan el aprendizaje.</p>
<p>Durante la demo podremos mostrarle:</p>
<ul>
<li>Cómo KIBI puede mejorar el rendimiento académico de sus estudiantes</li>
<li>Las herramientas de seguimiento y análisis disponibles</li>
<li>La facilidad de implementación en {{ $contacto->institucion }}</li>
<li>Casos de éxito de instituciones similares</li>
</ul>
<p>La demostración durará aproximadamente 30 minutos y puede realizarse de forma presencial o virtual, según su preferencia.</p>
<p>¿Podríamos agendar esta demostración para la próxima semana?</p>
<p>Quedo atento a su respuesta.</p>
<p><strong>Saludos cordiales,<br>Equipo KIBI</strong></p>`
    },
    proposal: {
        subject: 'Propuesta Comercial KIBI - {{ $contacto->institucion }}',
        message: `<p>Estimado/a <strong>{{ $contacto->nombre }}</strong>,</p>
<p>Como seguimiento a nuestra conversación anterior, me complace presentarle la propuesta comercial de KIBI para {{ $contacto->institucion }}.</p>
<h3>Nuestra propuesta incluye:</h3>
<h4>📚 ACCESO COMPLETO A KIBI</h4>
<ul>
<li>Plataforma educativa completa</li>
<li>Contenido curricular personalizado</li>
<li>Herramientas de evaluación y seguimiento</li>
</ul>
<h4>👥 CAPACITACIÓN Y SOPORTE</h4>
<ul>
<li>Capacitación inicial para docentes y administradores</li>
<li>Soporte técnico especializado</li>
<li>Recursos de ayuda y documentación</li>
</ul>
<h4>📊 REPORTES Y ANALÍTICAS</h4>
<ul>
<li>Dashboard de rendimiento estudiantil</li>
<li>Reportes de progreso académico</li>
<li>Análisis de datos educativos</li>
</ul>
<h4>💰 INVERSIÓN</h4>
<ul>
<li>Plan anual con descuento especial para instituciones educativas</li>
<li>Opciones de pago flexibles</li>
<li>Garantía de satisfacción</li>
</ul>
<p>Estoy disponible para discutir cualquier aspecto de esta propuesta y responder a sus preguntas.</p>
<p>¿Podríamos programar una llamada para revisar los detalles?</p>
<p><strong>Saludos cordiales,<br>Equipo KIBI</strong></p>`
    },
    followup: {
        subject: 'Seguimiento - Propuesta KIBI',
        message: `<p>Estimado/a <strong>{{ $contacto->nombre }}</strong>,</p>
<p>Espero que se encuentre muy bien. Me pongo en contacto con usted para dar seguimiento a la propuesta de KIBI que enviamos para {{ $contacto->institucion }}.</p>
<p>Entiendo que puede tener preguntas o necesitar más información sobre cómo KIBI puede beneficiar a su institución. Estoy aquí para ayudarle con cualquier consulta que pueda tener.</p>
<p>Algunos puntos que podríamos revisar:</p>
<ul>
<li>Beneficios específicos para {{ $contacto->institucion }}</li>
<li>Proceso de implementación</li>
<li>Capacitación del personal</li>
<li>Casos de éxito similares</li>
</ul>
<p>¿Le gustaría programar una breve llamada para resolver cualquier duda?</p>
<p>Quedo atento a su respuesta.</p>
<p><strong>Saludos cordiales,<br>Equipo KIBI</strong></p>`
    }
};

function loadTemplate(templateName) {
    const template = templates[templateName];
    if (template) {
        $('#subject').val(template.subject).trigger('input');
        $('#editorContainer').summernote('code', template.message);
        updateMessageStats(template.message);
        
        // Animación de feedback
        const buttons = document.querySelectorAll('button[onclick^="loadTemplate"]');
        buttons.forEach(btn => {
            if (btn.textContent.includes(templateName === 'demo' ? 'Demo' : templateName === 'proposal' ? 'Propuesta' : 'Seguimiento')) {
                btn.style.transform = 'scale(0.95)';
                setTimeout(() => btn.style.transform = '', 200);
            }
        });
    }
}

function previewEmail() {
    const subject = $('#subject').val();
    const message = $('#editorContainer').summernote('code');
    const cc = $('#ccField').val();
    const bcc = $('#bccField').val();

    $('#previewSubject').text(subject || '(Sin asunto)');
    $('#previewBody').html(message || '<p class="text-gray-400 italic">Sin contenido</p>');
    
    let ccBccHtml = '';
    if (cc) {
        ccBccHtml += `<p><strong>CC:</strong> <span class="text-gray-900">${cc}</span></p>`;
    }
    if (bcc) {
        ccBccHtml += `<p><strong>BCC:</strong> <span class="text-gray-900">${bcc}</span></p>`;
    }
    
    if (ccBccHtml) {
        $('#previewCcBcc').html(ccBccHtml).removeClass('hidden');
    } else {
        $('#previewCcBcc').addClass('hidden');
    }

    document.getElementById('previewModal').style.display = 'block';
}

function closePreview() {
    document.getElementById('previewModal').style.display = 'none';
}

function submitForm() {
    document.getElementById('emailForm').submit();
    showLoading();
}

function showLoading() {
    document.getElementById('loadingOverlay').style.display = 'flex';
}

// Cerrar modal al hacer clic fuera
window.onclick = function(event) {
    const modal = document.getElementById('previewModal');
    if (event.target === modal) {
        closePreview();
    }
}

// Mostrar loading al enviar
document.getElementById('emailForm').addEventListener('submit', function() {
    showLoading();
});
</script>
@endsection
