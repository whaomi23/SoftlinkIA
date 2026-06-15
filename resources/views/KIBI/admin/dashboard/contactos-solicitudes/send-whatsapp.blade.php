@extends('KIBI.layouts.auth')

@section('title', 'KIBI - Enviar WhatsApp')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <!-- Avatar -->
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center text-white text-xl font-bold shadow-lg">
                            {{ strtoupper(substr($contacto->nombre, 0, 1) . substr($contacto->apellidos, 0, 1)) }}
                        </div>
                    </div>

                    <!-- Información del Contacto -->
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Enviar WhatsApp a {{ $contacto->nombre_completo }}</h1>
                        <div class="flex items-center space-x-4 text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span>{{ $contacto->institucion }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-2.462-.96-4.779-2.705-6.52-1.746-1.746-4.059-2.707-6.521-2.705-5.451 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.743-.982zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>{{ $contacto->celular }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón Volver -->
                <a href="{{ route('kibi.contacts.show', $contacto) }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Volver al Contacto
                </a>
            </div>
        </div>

        <!-- Formulario de WhatsApp -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <div class="flex items-center space-x-3 mb-8">
                <div class="p-3 bg-green-100 rounded-xl">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-2.462-.96-4.779-2.705-6.52-1.746-1.746-4.059-2.707-6.521-2.705-5.451 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.743-.982zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Componer Mensaje WhatsApp</h2>
                    <p class="text-gray-600 mt-1">Envía un mensaje directo a {{ $contacto->nombre_completo }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('kibi.contacts.whatsapp.send', $contacto) }}">
                @csrf

                <div class="space-y-8">
                    <!-- Mensaje -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <label class="block text-lg font-semibold text-gray-800 mb-3">
                            <svg class="w-5 h-5 inline mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Mensaje
                        </label>
                        <textarea name="message" rows="12"
                                  class="w-full px-6 py-4 text-lg border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none"
                                  placeholder="Escribe tu mensaje aquí..." required>{{ old('message', '¡Hola ' . $contacto->nombre . '! 👋

Soy del equipo de KIBI, la plataforma educativa innovadora. Me gustaría agendar una demostración personalizada para ' . $contacto->institucion . '.

¿Tendrías 15 minutos esta semana para mostrarte cómo KIBI puede transformar la experiencia educativa?

¡Gracias! 🚀') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror

                        <!-- Contador de caracteres -->
                        <div class="mt-2 text-right">
                            <span class="text-sm text-gray-500" id="char-count">0</span>
                            <span class="text-sm text-gray-500">/ 1000 caracteres</span>
                        </div>
                    </div>

                    <!-- Plantillas Rápidas -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <label class="block text-lg font-semibold text-gray-800 mb-4">
                            <svg class="w-5 h-5 inline mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Plantillas Rápidas
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <button type="button" onclick="loadTemplate('demo')"
                                    class="p-6 bg-green-50 hover:bg-green-100 border-2 border-green-200 hover:border-green-300 rounded-xl transition-all duration-200 text-left group">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="p-2 bg-green-100 rounded-lg group-hover:bg-green-200 transition-colors">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-lg font-semibold text-green-800">Solicitar Demo</span>
                                </div>
                                <p class="text-sm text-green-600">Plantilla para programar demostración personalizada</p>
                            </button>

                            <button type="button" onclick="loadTemplate('proposal')"
                                    class="p-6 bg-blue-50 hover:bg-blue-100 border-2 border-blue-200 hover:border-blue-300 rounded-xl transition-all duration-200 text-left group">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-lg font-semibold text-blue-800">Enviar Propuesta</span>
                                </div>
                                <p class="text-sm text-blue-600">Plantilla para propuesta comercial detallada</p>
                            </button>

                            <button type="button" onclick="loadTemplate('followup')"
                                    class="p-6 bg-purple-50 hover:bg-purple-100 border-2 border-purple-200 hover:border-purple-300 rounded-xl transition-all duration-200 text-left group">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-lg font-semibold text-purple-800">Seguimiento</span>
                                </div>
                                <p class="text-sm text-purple-600">Plantilla para seguimiento de propuestas</p>
                            </button>
                        </div>
                    </div>

                    <!-- Información del Envío -->
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex items-start space-x-3">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-800 mb-2">Información del Envío</h3>
                                <div class="space-y-2 text-green-700">
                                    <p><strong>Destinatario:</strong> {{ $contacto->nombre_completo }}</p>
                                    <p><strong>Teléfono:</strong> {{ $contacto->celular }}</p>
                                    <p><strong>Institución:</strong> {{ $contacto->institucion }}</p>
                                    <p class="text-sm text-green-600 mt-3">
                                        <strong>Nota:</strong> El mensaje se enviará directamente a WhatsApp sin necesidad de abrir la aplicación.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 pt-8 border-t-2 border-gray-200">
                        <button type="submit"
                                class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-xl transition-all duration-200 font-semibold text-lg">
                            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-2.462-.96-4.779-2.705-6.52-1.746-1.746-4.059-2.707-6.521-2.705-5.451 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.743-.982zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            Enviar WhatsApp
                        </button>

                        <a href="{{ route('kibi.contacts.show', $contacto) }}"
                           class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors font-semibold text-lg">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Plantillas de WhatsApp
const templates = {
    demo: `¡Hola @{{nombre}}! 👋

Soy del equipo de KIBI, la plataforma educativa innovadora. Me gustaría agendar una demostración personalizada para @{{institucion}}.

¿Tendrías 15 minutos esta semana para mostrarte cómo KIBI puede transformar la experiencia educativa?

¡Gracias! 🚀`,

    proposal: `¡Hola @{{nombre}}! 👋

Te envío la propuesta comercial de KIBI para @{{institucion}}.

KIBI incluye:
✅ Contenido educativo interactivo
✅ Seguimiento del progreso estudiantil
✅ Plataforma intuitiva y fácil de usar
✅ Soporte técnico especializado

¿Podríamos agendar una llamada para resolver cualquier duda?

¡Saludos! 📚`,

    followup: `¡Hola @{{nombre}}! 👋

Espero que hayas podido revisar la información de KIBI que te envié.

¿Tienes alguna pregunta sobre cómo KIBI puede beneficiar a @{{institucion}}?

Estoy aquí para ayudarte con cualquier consulta.

¡Gracias! 🤝`
};

// Función para cargar plantillas
function loadTemplate(templateType) {
    const textarea = document.querySelector('textarea[name="message"]');
    let message = templates[templateType];

    // Reemplazar variables con los valores reales del contacto
    message = message.replace(/@\{\{nombre\}\}/g, '{{ $contacto->nombre }}');
    message = message.replace(/@\{\{institucion\}\}/g, '{{ $contacto->institucion }}');
    message = message.replace(/@\{\{puesto\}\}/g, '{{ $contacto->puesto }}');

    textarea.value = message;
    updateCharCount();
}

// Contador de caracteres
function updateCharCount() {
    const textarea = document.querySelector('textarea[name="message"]');
    const charCount = document.getElementById('char-count');
    const count = textarea.value.length;

    charCount.textContent = count;

    if (count > 1000) {
        charCount.classList.add('text-red-500');
        charCount.classList.remove('text-gray-500');
    } else {
        charCount.classList.add('text-gray-500');
        charCount.classList.remove('text-red-500');
    }
}

// Inicializar contador
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.querySelector('textarea[name="message"]');
    textarea.addEventListener('input', updateCharCount);
    updateCharCount();
});
</script>
@endsection
