<!-- Estilos CSS para optimización móvil -->
<style>
/* Contornos azules en campos del formulario del modal */
#contact-modal input[type="text"],
#contact-modal input[type="email"],
#contact-modal input[type="tel"],
#contact-modal input[type="url"],
#contact-modal textarea,
#contact-modal select {
    border-color: #02AFC9 !important; /* azul KIBI */
    border-width: 2px !important;
    color: #000000 !important;
}

#contact-modal input[type="text"]:focus,
#contact-modal input[type="email"]:focus,
#contact-modal input[type="tel"]:focus,
#contact-modal input[type="url"]:focus,
#contact-modal textarea:focus,
#contact-modal select:focus {
    border-color: #0087AD !important; /* azul profundo */
    box-shadow: 0 0 0 3px rgba(2, 175, 201, 0.12) !important;
}

#contact-modal input::placeholder,
#contact-modal textarea::placeholder {
    color: rgba(0, 0, 0, 0.45) !important;
}

#contact-modal input[type="checkbox"] {
    border-color: #02AFC9 !important;
    accent-color: #02AFC9 !important;
}

/* Optimización del modal para móvil */
@media (max-width: 639px) {
    #contact-modal {
        padding: 0.5rem;
    }

    #contact-modal .bg-white {
        margin: 0.5rem;
        max-height: calc(100vh - 1rem);
    }

    /* Mejorar el scroll en móvil */
    #contact-modal .overflow-y-auto {
        -webkit-overflow-scrolling: touch;
    }

    /* Optimizar inputs para móvil */
    #contact-modal input[type="text"],
    #contact-modal input[type="email"],
    #contact-modal input[type="tel"],
    #contact-modal input[type="url"] {
        font-size: 16px; /* Previene zoom en iOS */
        padding: 0.75rem;
    }

    /* Mejorar checkboxes en móvil */
    #contact-modal input[type="checkbox"] {
        transform: scale(1.2);
        margin-top: 0.125rem;
    }

    /* Optimizar botones para touch */
    #contact-modal button {
        min-height: 44px; /* Tamaño mínimo recomendado para touch */
        touch-action: manipulation;
    }

    /* Mejorar labels en móvil */
    #contact-modal label {
        font-size: 0.875rem;
        line-height: 1.25rem;
    }
}

/* Mejorar el modal en pantallas muy pequeñas */
@media (max-width: 375px) {
    #contact-modal .bg-white {
        margin: 0.25rem;
        max-height: calc(100vh - 0.5rem);
    }

    #contact-modal .px-4 {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
}

/* Optimización para landscape en móvil */
@media (max-width: 639px) and (orientation: landscape) {
    #contact-modal .max-h-\[95vh\] {
        max-height: 90vh;
    }

    #contact-modal .space-y-4 {
        gap: 0.75rem;
    }
}
</style>

<!-- Modal de Formulario de Contacto -->
<div id="contact-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-2 sm:p-4">
    <div class="bg-white rounded-xl sm:rounded-2xl shadow-2xl max-w-2xl w-full max-h-[95vh] sm:max-h-[90vh] overflow-y-auto">
        <!-- Header del Modal -->
        <div class="sticky top-0 bg-white border-b border-gray-200 px-4 sm:px-6 py-3 sm:py-4 rounded-t-xl sm:rounded-t-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white border-2 border-gray-200 rounded-lg sm:rounded-xl flex items-center justify-center shadow-lg">
                        <div class="font-bold text-base sm:text-lg" style="font-family: 'Inter', sans-serif;">
                            <span style="color: #02AFC9;">K</span><span style="color: #6D9F3E;">i</span><span style="color: #F5C234;">b</span><span style="color: #6D9F3E;">i</span>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-bold text-slate-800">Formulario de Contacto</h2>
                        <p class="text-xs sm:text-sm text-slate-600 hidden sm:block">Completa tus datos para contactarte contigo</p>
                    </div>
                </div>
                <button onclick="closeContactModal()" class="text-slate-400 hover:text-slate-600 transition-colors p-1">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Formulario -->
        <form id="contact-form" action="{{ route('kibi.contact.store') }}" method="POST" class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            @csrf

            <!-- Mostrar mensaje de éxito -->
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">
                                ¡Mensaje enviado exitosamente!
                            </h3>
                            <div class="mt-2 text-sm text-green-700">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Mostrar errores de validación -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                Por favor corrige los siguientes errores:
                            </h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-slate-700 mb-2">
                    Nombre <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nombre" name="nombre" required
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                       placeholder="Ingresa tu nombre"
                       value="{{ old('nombre') }}">
            </div>

            <!-- Apellidos -->
            <div>
                <label for="apellidos" class="block text-sm font-medium text-slate-700 mb-2">
                    Apellidos <span class="text-red-500">*</span>
                </label>
                <input type="text" id="apellidos" name="apellidos" required
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                       placeholder="Ingresa tus apellidos"
                       value="{{ old('apellidos') }}">
            </div>

            <!-- Celular -->
            <div>
                <label for="celular" class="block text-sm font-medium text-slate-700 mb-2">
                    Celular <span class="text-red-500">*</span>
                </label>
                <input type="tel" id="celular" name="celular" required
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                       placeholder="Número de celular (10 dígitos)"
                       value="{{ old('celular') }}">
            </div>

            <!-- Correo Institucional -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                    Correo Institucional <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="email" required
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                       placeholder="tu.correo@institucion.edu"
                       value="{{ old('email') }}">
            </div>

            <!-- Institución Educativa -->
            <div>
                <label for="institucion" class="block text-sm font-medium text-slate-700 mb-2">
                    Institución Educativa <span class="text-red-500">*</span>
                </label>
                <input type="text" id="institucion" name="institucion" required
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                       placeholder="Nombre de tu institución educativa"
                       value="{{ old('institucion') }}">
            </div>

            <!-- Puesto/Cargo -->
            <div>
                <label for="puesto" class="block text-sm font-medium text-slate-700 mb-2">
                    Puesto/Cargo <span class="text-red-500">*</span>
                </label>
                <input type="text" id="puesto" name="puesto" required
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                       placeholder="Tu puesto o cargo actual"
                       value="{{ old('puesto') }}">
            </div>

            <!-- Ciudad y Estado -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <div>
                    <label for="ciudad" class="block text-sm font-medium text-slate-700 mb-2">
                        Ciudad <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="ciudad" name="ciudad" required
                           class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                           placeholder="Tu ciudad"
                           value="{{ old('ciudad') }}">
                </div>
                <div>
                    <label for="estado" class="block text-sm font-medium text-slate-700 mb-2">
                        Estado <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="estado" name="estado" required
                           class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                           placeholder="Tu estado"
                           value="{{ old('estado') }}">
                </div>
            </div>

            <!-- Sitio Web -->
            <div>
                <label for="sitio_web" class="block text-sm font-medium text-slate-700 mb-2">
                    Sitio Web
                </label>
                <input type="url" id="sitio_web" name="sitio_web"
                       class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent transition-colors text-sm sm:text-base"
                       placeholder="https://tu-sitio-web.com"
                       value="{{ old('sitio_web') }}">
            </div>

            <!-- Checkboxes de Términos y Condiciones -->
            <div class="space-y-3 sm:space-y-4 pt-3 sm:pt-4 border-t border-gray-200">
                <div class="flex items-start space-x-2 sm:space-x-3">
                    <input type="checkbox" id="terminos" name="terminos" value="1" required
                           class="mt-1 w-4 h-4 text-kibi-primary border-gray-300 rounded focus:ring-kibi-primary"
                           {{ old('terminos') ? 'checked' : '' }}>
                    <label for="terminos" class="text-xs sm:text-sm text-slate-700">
                        Acepto los <a href="#" class="text-kibi-primary hover:text-kibi-secondary underline">términos y condiciones</a> <span class="text-red-500">*</span>
                    </label>
                </div>

                <div class="flex items-start space-x-2 sm:space-x-3">
                    <input type="checkbox" id="whatsapp" name="whatsapp" value="1"
                           class="mt-1 w-4 h-4 text-kibi-primary border-gray-300 rounded focus:ring-kibi-primary"
                           {{ old('whatsapp') ? 'checked' : '' }}>
                    <label for="whatsapp" class="text-xs sm:text-sm text-slate-700">
                        Me gustaría que me contacten vía WhatsApp
                    </label>
                </div>

                <div class="flex items-start space-x-2 sm:space-x-3">
                    <input type="checkbox" id="email_contact" name="email_contact" value="1"
                           class="mt-1 w-4 h-4 text-kibi-primary border-gray-300 rounded focus:ring-kibi-primary"
                           {{ old('email_contact') ? 'checked' : '' }}>
                    <label for="email_contact" class="text-xs sm:text-sm text-slate-700">
                        Me gustaría que me contacten por vía email
                    </label>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 sm:pt-6">
                <button type="button" onclick="closeContactModal()"
                        class="flex-1 px-4 sm:px-6 py-2.5 sm:py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm sm:text-base">
                    Cancelar
                </button>
                <button type="submit"
                        class="flex-1 px-4 sm:px-6 py-2.5 sm:py-3 bg-gradient-to-r from-kibi-primary to-kibi-secondary text-white rounded-lg hover:from-kibi-secondary hover:to-kibi-highlight transition-all font-medium shadow-lg hover:shadow-xl text-sm sm:text-base">
                    Enviar Solicitud
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript para el Modal de Contacto -->
<script>
// Función para abrir el modal de contacto
function openContactModal() {
    const modal = document.getElementById('contact-modal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        // Enfocar el primer campo
        setTimeout(() => {
            const firstInput = modal.querySelector('input[required]');
            if (firstInput) {
                firstInput.focus();
            }
        }, 100);
    }
}

// Función para cerrar el modal de contacto
function closeContactModal() {
    const modal = document.getElementById('contact-modal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';

        // Limpiar el formulario
        const form = document.getElementById('contact-form');
        if (form) {
            form.reset();
        }
    }
}

// Función para manejar el envío del formulario
function handleContactFormSubmit(e) {
    e.preventDefault(); // Prevenir el envío normal del formulario

    console.log('Formulario enviándose vía AJAX...', e.target);

    // Mostrar loading en el botón
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Enviando...';
    submitBtn.disabled = true;

    // Recopilar datos del formulario
    const formData = new FormData(e.target);

    // Enviar datos vía AJAX
    fetch(e.target.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        throw new Error('Error en la respuesta del servidor');
    })
    .then(data => {
        if (data.success) {
            // Mostrar mensaje de éxito
            showSuccessMessage(data.message);

            // Limpiar el formulario
            e.target.reset();

            // Restaurar el botón
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;

            // Cerrar modal después de 3 segundos
            setTimeout(() => {
                closeContactModal();
            }, 3000);
        } else {
            // Mostrar mensaje de error
            showErrorMessage(data.message);

            // Restaurar el botón
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);

        // Mostrar mensaje de error
        showErrorMessage('Hubo un error al enviar tu solicitud. Por favor, inténtalo de nuevo.');

        // Restaurar el botón
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
}

// Función para mostrar mensaje de éxito
function showSuccessMessage(message) {
    // Remover mensajes anteriores
    const existingMessages = document.querySelectorAll('.alert-message');
    existingMessages.forEach(msg => msg.remove());

    // Crear mensaje de éxito
    const successDiv = document.createElement('div');
    successDiv.className = 'alert-message bg-green-50 border border-green-200 rounded-lg p-4 mb-4';
    successDiv.innerHTML = `
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-green-800">
                    ¡Mensaje enviado exitosamente!
                </h3>
                <div class="mt-2 text-sm text-green-700">
                    ${message}
                </div>
            </div>
        </div>
    `;

    // Insertar al inicio del formulario
    const form = document.getElementById('contact-form');
    form.insertBefore(successDiv, form.firstChild);
}

// Función para mostrar mensaje de error
function showErrorMessage(message) {
    // Remover mensajes anteriores
    const existingMessages = document.querySelectorAll('.alert-message');
    existingMessages.forEach(msg => msg.remove());

    // Crear mensaje de error
    const errorDiv = document.createElement('div');
    errorDiv.className = 'alert-message bg-red-50 border border-red-200 rounded-lg p-4 mb-4';
    errorDiv.innerHTML = `
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">
                    Error al enviar el formulario
                </h3>
                <div class="mt-2 text-sm text-red-700">
                    ${message}
                </div>
            </div>
        </div>
    `;

    // Insertar al inicio del formulario
    const form = document.getElementById('contact-form');
    form.insertBefore(errorDiv, form.firstChild);
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    if (form) {
        form.addEventListener('submit', handleContactFormSubmit);
    }

    // Cerrar modal al hacer clic fuera de él
    const modal = document.getElementById('contact-modal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeContactModal();
            }
        });
    }

    // Cerrar modal con tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeContactModal();
        }
    });

    // Cerrar modal automáticamente después de 3 segundos si hay mensaje de éxito
    @if (session('success'))
        setTimeout(() => {
            closeContactModal();
        }, 3000);
    @endif
});
</script>
