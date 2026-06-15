<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contacto KIBI - Solución de Inteligencia de Negocios</title>
    <meta name="description" content="Contacta con el equipo de KIBI para conocer cómo podemos transformar tus datos en decisiones inteligentes.">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/kibbi-images/kibi-icono.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/kibbi-images/kibi-icono.ico">
    <link rel="apple-touch-icon" href="/kibbi-images/kibi-icono.ico">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
    <style>
        /* Ajustes para que intl-tel-input combine con el diseño */
        .iti { width: 100%; }
        .iti__flag { box-shadow: none; }
        .iti--allow-dropdown input { padding-left: 58px; }
        /* Asegurar que el campo teléfono se vea consistente */
        .tel-input-custom { box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kibi': {
                            'primary': '#02AFC9',
                            'secondary': '#6D9F3E',
                            'accent': '#0087AD',
                            'highlight': '#F5C234'
                        }
                    }
                }
            }
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Fuente Personalizada Piala -->
    <style>
        @font-face {
            font-family: 'Piala';
            src: url('/kibbi-fonts/Piala/Web-PS/Piala-Regular.woff2') format('woff2'),
                 url('/kibbi-fonts/Piala/Web-TT/Piala-Regular.woff') format('woff'),
                 url('/kibbi-fonts/Piala/OpenType-PS/Piala-Regular.otf') format('opentype'),
                 url('/kibbi-fonts/Piala/OpenType-TT/Piala-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Piala';
            src: url('/kibbi-fonts/Piala/Web-PS/Piala-Italic.woff2') format('woff2'),
                 url('/kibbi-fonts/Piala/Web-TT/Piala-Italic.woff') format('woff'),
                 url('/kibbi-fonts/Piala/OpenType-PS/Piala-Italic.otf') format('opentype'),
                 url('/kibbi-fonts/Piala/OpenType-TT/Piala-Italic.ttf') format('truetype');
            font-weight: 400;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Piala';
            src: url('/kibbi-fonts/Piala/Web-PS/Piala-Italic.woff2') format('woff2'),
                 url('/kibbi-fonts/Piala/Web-TT/Piala-Italic.woff') format('woff'),
                 url('/kibbi-fonts/Piala/OpenType-PS/Piala-Italic.otf') format('opentype'),
                 url('/kibbi-fonts/Piala/OpenType-TT/Piala-Italic.ttf') format('truetype');
            font-weight: 600;
            font-style: italic;
            font-display: swap;
        }

        * {
            font-family: 'Piala', sans-serif !important;
        }

        /* Contornos azules para todos los inputs */
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="url"],
        textarea,
        select {
            border-color: #02AFC9 !important;
            border-width: 2px !important;
            color: #000000 !important;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="url"]:focus,
        textarea:focus,
        select:focus {
            border-color: #0087AD !important;
            box-shadow: 0 0 0 3px rgba(2, 175, 201, 0.1) !important;
        }

        /* Color gris para el placeholder */
        input::placeholder,
        textarea::placeholder {
            color: rgba(0, 0, 0, 0.4) !important;
        }

        /* Color negro para las opciones del select */
        select {
            color: #000000 !important;
        }
        
        select option {
            color: #000000 !important;
        }

        /* Color negro para los labels */
        label {
            color: #000000 !important;
        }

        /* Color negro para todo el texto del formulario */
        form label {
            color: #000000 !important;
        }

        /* Color negro para los textos de los checkboxes (WhatsApp, Email) */
        .bg-gray-50 label span.text-gray-700 {
            color: #000000 !important;
        }

        /* Texto blanco para el botón de envío y todos sus elementos */
        button[type="submit"],
        button[type="submit"] * {
            color: #ffffff !important;
        }

        /* Estilo azul para los checkboxes */
        input[type="checkbox"] {
            border-color: #02AFC9 !important;
            accent-color: #02AFC9 !important;
        }

        /* Forzar texto negro en el header */
        header a {
            color: #000000 !important;
            background-color: transparent !important;
            padding: 0 !important;
            border-radius: 0 !important;
        }

        header a:hover {
            background-color: transparent !important;
            color: #000000 !important;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Animaciones suaves */
        * {
            transition: all 0.3s ease;
        }

        /* Optimización móvil */
        @media (max-width: 639px) {
            input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="url"] {
                font-size: 16px; /* Previene zoom en iOS */
            }

            button {
                min-height: 44px; /* Tamaño mínimo recomendado para touch */
                touch-action: manipulation;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <!-- Header -->
    <header class="bg-kibi-primary shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-start items-center py-4">
                <a href="{{ route('soluciones.kibi') }}" class="inline-flex items-center" aria-label="Ir a KIBI">
                    <img src="/kibbi-images/kibi logo blanco prueba.png" alt="KIBI Logo" class="h-12 w-auto">
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Contact Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                    <!-- Hero Section -->
        <div class="text-center mb-12">
            <div class="mb-6">
                <img src="/kibbi-images/kibi-logo.webp" alt="KIBI Logo" class="h-16 md:h-20 w-auto mx-auto">
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Contacta con nosotros
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Descubre cómo KIBI puede transformar tus datos en decisiones inteligentes para tu organización educativa.
            </p>
        </div>
            <form id="contact-form" method="POST" action="{{ route('kibi.contact.store') }}" class="space-y-6">
                @csrf

                <!-- Información Personal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nombre *
                        </label>
                        <input type="text" id="nombre" name="nombre" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent"
                               placeholder="Tu nombre completo">
                    </div>

                    <div>
                        <label for="apellidos" class="block text-sm font-semibold text-gray-700 mb-2">
                            Apellidos *
                        </label>
                        <input type="text" id="apellidos" name="apellidos" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent"
                               placeholder="Tus apellidos">
                    </div>
                </div>

                <!-- Información de Contacto -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email *
                        </label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent"
                               placeholder="tu@email.com">
                    </div>

                    <div>
                        <label for="celular" class="block text-sm font-semibold text-gray-700 mb-2">
                            Teléfono *
                        </label>
               <input type="tel" id="celular" name="celular" required aria-required="true"
                   class="tel-input-custom w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent"
                   placeholder="Teléfono">
                    </div>
                </div>

                <!-- Información Institucional -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="institucion" class="block text-sm font-semibold text-gray-700 mb-2">
                            Institución *
                        </label>
                        <input type="text" id="institucion" name="institucion" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent"
                               placeholder="Nombre de tu institución">
                    </div>

                    <div>
                        <label for="puesto" class="block text-sm font-semibold text-gray-700 mb-2">
                            Puesto *
                        </label>
                        <input type="text" id="puesto" name="puesto" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent"
                               placeholder="Tu puesto o cargo">
                    </div>
                </div>

                <!-- Ubicación -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="ciudad" class="block text-sm font-semibold text-gray-700 mb-2">
                            Ciudad *
                        </label>
                        <input type="text" id="ciudad" name="ciudad" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent"
                               placeholder="Tu ciudad">
                    </div>

                    <div>
                        <label for="estado" class="block text-sm font-semibold text-gray-700 mb-2">
                            Estado *
                        </label>
                        <select id="estado" name="estado" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent">
                            <option value="">Selecciona tu estado</option>
                            <option value="CDMX">Ciudad de México</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Coahuila">Coahuila</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Durango">Durango</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Zacatecas">Zacatecas</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Colima">Colima</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                        </select>
                    </div>

                    <div>
                        <label for="sitio_web" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sitio Web
                        </label>
                        <input type="url" id="sitio_web" name="sitio_web"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent"
                               placeholder="https://tu-institucion.com">
                    </div>
                </div>

                <!-- Preferencias de Contacto -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Preferencias de Contacto</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="checkbox" name="whatsapp" value="1"
                                   class="w-5 h-5 text-kibi-primary border-gray-300 rounded focus:ring-kibi-primary">
                            <span class="text-gray-700">WhatsApp</span>
                        </label>
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="checkbox" name="email_contact" value="1"
                                   class="w-5 h-5 text-kibi-primary border-gray-300 rounded focus:ring-kibi-primary">
                            <span class="text-gray-700">Email</span>
                        </label>
                    </div>
                </div>

                <!-- Mensaje -->
                <div>
                    <label for="mensaje" class="block text-sm font-semibold text-gray-700 mb-2">
                        Mensaje
                    </label>
                    <textarea id="mensaje" name="mensaje" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kibi-primary focus:border-transparent resize-none"
                              placeholder="Cuéntanos sobre tu proyecto o necesidades específicas..."></textarea>
                </div>

                <!-- Términos y Condiciones -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <label class="flex items-start space-x-3 cursor-pointer">
                        <input type="checkbox" name="terminos" value="1" required
                               class="w-5 h-5 text-kibi-primary border-gray-300 rounded focus:ring-kibi-primary mt-1">
                        <span class="text-gray-700 text-sm">
                            Acepto los <a href="#" class="text-kibi-primary hover:text-kibi-accent underline">términos y condiciones</a> 
                            y la <a href="#" class="text-kibi-primary hover:text-kibi-accent underline">política de privacidad</a> *
                        </span>
                    </label>
                </div>

                <!-- Botón de Envío -->
                <div class="text-center">
                    <button type="submit"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-kibi-primary to-kibi-accent hover:from-kibi-accent hover:to-kibi-primary text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Enviar Solicitud
                    </button>
                </div>
            </form>
        </div>

        <!-- Información Adicional -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-kibi-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Respuesta Rápida</h3>
                <p class="text-gray-600">Te contactaremos en menos de 24 horas</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-kibi-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Consulta Gratuita</h3>
                <p class="text-gray-600">Primera consulta sin costo</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-kibi-highlight rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Demo Personalizada</h3>
                <p class="text-gray-600">Demostración adaptada a tus necesidades</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-transparent text-gray-600 py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} KIBI - SoftLinkIA. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Botón Flotante de Panel de Contactos -->
    <div class="fixed bottom-6 right-6 z-50">
        <button onclick="goToContactsPanel()"
                class="group relative bg-gradient-to-r from-kibi-primary to-kibi-accent hover:from-kibi-accent hover:to-kibi-primary text-white p-4 rounded-full shadow-2xl hover:shadow-kibi-primary/25 transition-all duration-300 transform hover:scale-110">
            <!-- Icono principal -->
            <svg class="w-6 h-6 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>

            <!-- Tooltip -->
            <div class="absolute bottom-full right-0 mb-2 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                Panel de Contactos
                <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
            </div>

            <!-- Efecto de pulso -->
            <div class="absolute inset-0 rounded-full bg-kibi-primary animate-ping opacity-20"></div>
        </button>
    </div>

    <!-- Scripts -->
    <!-- intl-tel-input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

    <script>
        // Inicializar intl-tel-input y manejar su integración con el formulario
        let itiInstance = null;
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('celular');
            if (window.intlTelInput && phoneInput) {
                itiInstance = window.intlTelInput(phoneInput, {
                    initialCountry: 'mx',
                    separateDialCode: true,
                    preferredCountries: ['mx', 'us', 'es', 'co'],
                    utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js'
                });

                // Ajustes visuales: mover el padding-left si separateDialCode está activo
                if (itiInstance.isValidNumber && itiInstance.getSelectedCountryData) {
                    phoneInput.classList.add('iti--allow-dropdown');
                }
            }
        });
        // Función para ir al panel de contactos
        function goToContactsPanel() {
            Swal.fire({
                title: 'Acceder al Panel',
                text: '¿Deseas acceder al panel de gestión de contactos?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#02AFC9',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Ir al Panel',
                cancelButtonText: 'Cancelar',
                background: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl shadow-2xl',
                    title: 'text-2xl font-bold text-gray-800',
                    content: 'text-gray-600',
                    confirmButton: 'px-6 py-3 rounded-lg font-semibold',
                    cancelButton: 'px-6 py-3 rounded-lg font-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mostrar loading
                    Swal.fire({
                        title: 'Redirigiendo...',
                        text: 'Accediendo al panel de contactos',
                        icon: 'info',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        background: '#ffffff',
                        customClass: {
                            popup: 'rounded-2xl shadow-2xl'
                        },
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Redirigir después de 1 segundo
                    setTimeout(() => {
                        window.location.href = '{{ route("kibi.contacts.index") }}';
                    }, 1000);
                }
            });
        }

        // Función para el formulario de contacto
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Si intl-tel-input está inicializado, validar y obtener el número en formato E.164
            let internationalNumber = document.getElementById('celular').value;
            if (typeof itiInstance !== 'undefined' && itiInstance && itiInstance.getNumber) {
                try {
                    if (!itiInstance.isValidNumber()) {
                        throw new Error('Por favor ingresa un número de teléfono válido.');
                    }
                    internationalNumber = itiInstance.getNumber();
                } catch (err) {
                    Swal.fire({
                        title: 'Número inválido',
                        text: err.message || 'Por favor verifica tu número de teléfono.',
                        icon: 'error',
                        confirmButtonColor: '#EF4444'
                    });
                    return;
                }
            }

            const formData = new FormData(this);
            // Asegurarnos de enviar el número en formato internacional esperado por el backend
            formData.set('celular', internationalNumber);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Mostrar estado de carga
            submitBtn.innerHTML = `
                <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Enviando...
            `;
            submitBtn.disabled = true;

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                // Verificar si la respuesta es JSON
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error('El servidor devolvió una respuesta no válida. Por favor, inténtalo de nuevo.');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Mostrar SweetAlert de éxito
                    Swal.fire({
                        title: 'Enviado con Éxito',
                        text: 'Tu mensaje ha sido enviado correctamente. Te contactaremos pronto.',
                        icon: 'success',
                        confirmButtonColor: '#02AFC9',
                        confirmButtonText: 'Perfecto',
                        background: '#ffffff',
                        customClass: {
                            popup: 'rounded-2xl shadow-2xl',
                            title: 'text-2xl font-bold text-gray-800',
                            content: 'text-gray-600',
                            confirmButton: 'px-6 py-3 rounded-lg font-semibold'
                        }
                    }).then(() => {
                        // Redirigir a página de éxito
                        window.location.href = '{{ route("kibi.contact.success") }}';
                    });
                } else {
                    throw new Error(data.message || 'Error al enviar el formulario');
                }
            })
            .catch(error => {
                console.error('Error al enviar formulario:', error);
                
                // Mostrar SweetAlert de error
                Swal.fire({
                    title: 'Error al Enviar',
                    text: error.message || 'Hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo.',
                    icon: 'error',
                    confirmButtonColor: '#EF4444',
                    confirmButtonText: 'Reintentar',
                    background: '#ffffff',
                    customClass: {
                        popup: 'rounded-2xl shadow-2xl',
                        title: 'text-2xl font-bold text-gray-800',
                        content: 'text-gray-600',
                        confirmButton: 'px-6 py-3 rounded-lg font-semibold'
                    }
                });

                // Restaurar botón
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    </script>
</body>
</html>

