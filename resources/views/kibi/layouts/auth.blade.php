<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KIBI Educación - SoftLinkIA')</title>
    <meta name="description" content="@yield('description', 'Accede a tu cuenta de KIBI Educación. Plataforma de aprendizaje empresarial.')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/kibbi-images/kibi-icono.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/kibbi-images/kibi-icono.ico">
    <link rel="apple-touch-icon" href="/kibbi-images/kibi-icono.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">


    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flag Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kibi': {
                            'primary': '#02AFC9',      // Azul turquesa
                            'secondary': '#6D9F3E',    // Verde natural
                            'accent': '#0087AD',        // Azul profundo
                            'highlight': '#F5C234'      // Amarillo dorado
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
    
        <!-- Estilos para resolver conflictos de Summernote con Tailwind -->
        <style>
        /* Fix para modales de Summernote */
        .note-modal {
            z-index: 9999 !important;
        }
        
        .note-modal-backdrop {
            z-index: 9998 !important;
        }
        
        /* Asegurar que los modales de Summernote estén por encima de todo */
        .note-editor .note-modal {
            z-index: 10000 !important;
        }
        
        /* Fix para el modal de insertar imagen */
        .note-image-dialog {
            z-index: 10001 !important;
        }
        
        .note-image-dialog .modal-dialog {
            z-index: 10002 !important;
        }
        
        /* Asegurar que los botones del modal funcionen */
        .note-image-dialog button {
            cursor: pointer !important;
        }
        
        /* Fix para el backdrop del modal */
        .note-image-dialog .modal-backdrop {
            z-index: 10000 !important;
        }
        
        /* Estilos específicos para el modal de imagen */
        .note-image-dialog .modal-content {
            background: white !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2) !important;
        }
        
        .note-image-dialog .modal-header {
            background: #f8f9fa !important;
            border-bottom: 1px solid #dee2e6 !important;
        }
        
        .note-image-dialog .modal-body {
            padding: 20px !important;
        }
        
        .note-image-dialog .modal-footer {
            background: #f8f9fa !important;
            border-top: 1px solid #dee2e6 !important;
        }
        
        /* Fix para botones del modal */
        .note-image-dialog .btn {
            padding: 8px 16px !important;
            border-radius: 4px !important;
            border: 1px solid #ccc !important;
            background: #fff !important;
            color: #333 !important;
            cursor: pointer !important;
        }
        
        .note-image-dialog .btn-primary {
            background: #007bff !important;
            border-color: #007bff !important;
            color: white !important;
        }
        
        .note-image-dialog .btn-primary:hover {
            background: #0056b3 !important;
            border-color: #0056b3 !important;
        }
        
        /* Fix para inputs del modal */
        .note-image-dialog input[type="text"],
        .note-image-dialog input[type="file"] {
            width: 100% !important;
            padding: 8px 12px !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
            font-size: 14px !important;
        }
        
        /* Fix para labels del modal */
        .note-image-dialog label {
            display: block !important;
            margin-bottom: 5px !important;
            font-weight: 500 !important;
            color: #333 !important;
        }
        
        /* Asegurar que el modal sea clickeable */
        .note-image-dialog * {
            pointer-events: auto !important;
        }
        
        /* Fix para el botón de cerrar */
        .note-image-dialog .close {
            background: none !important;
            border: none !important;
            font-size: 24px !important;
            font-weight: bold !important;
            color: #aaa !important;
            cursor: pointer !important;
        }
        
        .note-image-dialog .close:hover {
            color: #000 !important;
        }
    </style>
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
            font-family: 'Piala Outline';
            src: url('/kibbi-fonts/Piala/Web-PS/Piala-Outline.woff2') format('woff2'),
                 url('/kibbi-fonts/Piala/Web-TT/Piala-Outline.woff') format('woff'),
                 url('/kibbi-fonts/Piala/OpenType-PS/Piala-Outline.otf') format('opentype'),
                 url('/kibbi-fonts/Piala/OpenType-TT/Piala-Outline.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Piala Outline';
            src: url('/kibbi-fonts/Piala/Web-PS/Piala-OutlineItalic.woff2') format('woff2'),
                 url('/kibbi-fonts/Piala/Web-TT/Piala-OutlineItalic.woff') format('woff'),
                 url('/kibbi-fonts/Piala/OpenType-PS/Piala-OutlineItalic.otf') format('opentype'),
                 url('/kibbi-fonts/Piala/OpenType-TT/Piala-OutlineItalic.ttf') format('truetype');
            font-weight: 400;
            font-style: italic;
            font-display: swap;
        }
    </style>

    <!-- Styles -->
    <style>
        /* Estilos modernos inspirados en Edifice */
        body {
            font-family: 'Piala', 'Inter', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Piala', 'Poppins', sans-serif;
            font-weight: 600;
        }

        /* Títulos principales con fuente outline para mayor impacto */
        .hero-title, .section-title {
            font-family: 'Piala Outline', 'Piala', sans-serif;
            font-weight: 400;
        }

        /* Textos especiales con cursiva */
        .accent-text, .highlight-text {
            font-family: 'Piala', sans-serif;
            font-style: italic;
        }

        /* Clases utilitarias para fuentes Piala */
        .font-piala {
            font-family: 'Piala', sans-serif;
        }

        .font-piala-italic {
            font-family: 'Piala', sans-serif;
            font-style: italic;
        }

        .font-piala-outline {
            font-family: 'Piala Outline', sans-serif;
        }

        .font-piala-outline-italic {
            font-family: 'Piala Outline', sans-serif;
            font-style: italic;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Animaciones suaves */
        * {
            transition: all 0.3s ease;
        }

        /* Efectos hover mejorados */
        .hover-lift:hover {
            transform: translateY(-2px);
        }

        /* Gradientes modernos */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Sombras modernas */
        .shadow-modern {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Botones modernos */
        .btn-modern {
            position: relative;
            overflow: hidden;
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-modern:hover::before {
            left: 100%;
        }

        /* Estilos específicos para auth */
        .auth-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        .auth-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>

    @stack('styles')
</head>
<body class="auth-container">
    <!-- Header simplificado para auth -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('soluciones.kibi') }}" class="flex items-center space-x-3">
                        <img src="/kibbi-images/kibi-logo.webp" alt="KIBI Logo" class="h-8 w-auto">
                        <span class="text-xl font-bold text-slate-800">KIBI Educación</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                    <div class="relative group">
                        <button id="kibi-auth-profile-trigger" class="flex items-center space-x-3 p-2 rounded-xl hover:bg-slate-100 transition-all duration-300 group">
                            <div class="relative">
                                <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                    {{ strtoupper(substr(auth('kibi')->user()->name, 0, 1)) }}{{ strtoupper(substr(auth('kibi')->user()->apellido_paterno ?? '', 0, 1)) }}
                                </div>
                                <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div class="text-left hidden sm:block">
                                <p class="text-sm font-semibold text-slate-800 group-hover:text-cyan-700 transition-colors">{{ auth('kibi')->user()->name }} {{ auth('kibi')->user()->apellido_paterno ?? '' }}</p>
                                <p class="text-xs text-slate-500">{{ optional(auth('kibi')->user()->tipoUsuario)->nombre ?? 'Usuario' }}</p>
                            </div>
                            <span class="material-icons text-slate-500 text-sm transition-transform group-hover:rotate-180">expand_more</span>
                        </button>

                        <div id="kibi-auth-profile-panel" class="absolute right-0 top-14 mt-2 w-72 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[1000] pointer-events-auto">
                            <div class="bg-white border border-slate-200 rounded-2xl shadow-2xl overflow-hidden">
                                <div class="p-5 border-b border-slate-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-base">
                                            {{ strtoupper(substr(auth('kibi')->user()->name, 0, 1)) }}{{ strtoupper(substr(auth('kibi')->user()->apellido_paterno ?? '', 0, 1)) }}
                                        </div>
                                        <div>
                                            <h3 class="text-sm font-bold text-slate-900">{{ auth('kibi')->user()->name }} {{ auth('kibi')->user()->apellido_paterno ?? '' }}</h3>
                                            <p class="text-xs text-slate-500">{{ auth('kibi')->user()->email }}</p>
                                            <p class="text-xs font-medium text-cyan-600 mt-0.5">{{ optional(auth('kibi')->user()->tipoUsuario)->nombre ?? 'Usuario' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <a href="{{ route('kibi.profile.show') }}" class="flex items-center p-3 rounded-xl hover:bg-slate-50 transition-all duration-300">
                                        <span class="material-icons text-cyan-500 mr-3 text-lg">person</span>
                                        <div>
                                            <span class="text-slate-900 font-medium text-sm">Mi Perfil</span>
                                            <p class="text-slate-500 text-xs">Ver y editar perfil</p>
                                        </div>
                                        <span class="ml-auto material-icons text-slate-400 text-sm">arrow_forward_ios</span>
                                    </a>
                                    <a href="{{ route('kibi.dashboard') }}" class="flex items-center p-3 rounded-xl hover:bg-slate-50 transition-all duration-300 mt-1">
                                        <span class="material-icons text-blue-500 mr-3 text-lg">dashboard</span>
                                        <div>
                                            <span class="text-slate-900 font-medium text-sm">Dashboard</span>
                                            <p class="text-slate-500 text-xs">Panel de KIBI</p>
                                        </div>
                                        <span class="ml-auto material-icons text-slate-400 text-sm">arrow_forward_ios</span>
                                    </a>
                                </div>

                                <div class="p-2 border-t border-slate-200">
                                    <form method="POST" action="{{ route('kibi.logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center p-3 text-sm text-red-600 hover:bg-red-50 rounded-xl transition-all duration-300">
                                            <span class="material-icons mr-3 text-xl">logout</span>
                                            <span class="font-semibold">Cerrar Sesión</span>
                                            <span class="ml-auto material-icons text-slate-400 text-sm">arrow_forward_ios</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer simplificado -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} SoftLinkIA. Todos los derechos reservados.</p>
                <div class="mt-2 space-x-4">
                    <a href="#" class="hover:text-gray-700">Términos</a>
                    <a href="#" class="hover:text-gray-700">Privacidad</a>
                    <a href="#" class="hover:text-gray-700">Contacto</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

</body>
</html>
