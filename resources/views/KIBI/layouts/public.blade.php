<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KIBI - Solución de Inteligencia de Negocios - SoftLinkIA')</title>
    <meta name="description" content="@yield('description', 'Transforma tus datos en decisiones inteligentes con KIBI Business Intelligence. La plataforma más avanzada para análisis de datos empresariales.')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/kibbi-images/kibi-icono.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/kibbi-images/kibi-icono.ico">
    <link rel="apple-touch-icon" href="/kibbi-images/kibi-icono.ico">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Atropos.js para efectos 3D parallax -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/atropos@1.0.2/atropos.css">
    <script src="https://cdn.jsdelivr.net/npm/atropos@1.0.2/atropos.min.js"></script>

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
        @include('KIBI.home.components.styles.kibi-styles')

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

        /* Line clamp utilities */
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-white text-gray-900">
    <!-- Loader Component - Solo en home -->
    @if(request()->is('soluciones/kibi'))
        @include('KIBI.home.components.loader')
    @endif

    <!-- Header Moderno -->
    @include('KIBI.home.components.modern-header')

    @auth
    <!-- Perfil flotante (similar a SoftLinkIA) -->
    <div class="fixed top-4 right-4 z-[1000]">
        <div class="relative group">
            <button id="kibi-public-profile-trigger" class="flex items-center space-x-3 p-2 rounded-xl bg-white/80 backdrop-blur hover:bg-white shadow-sm border border-slate-200 transition">
                <div class="relative">
                    <div class="w-9 h-9 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        {{ strtoupper(substr(auth('kibi')->user()->name, 0, 1)) }}{{ strtoupper(substr(auth('kibi')->user()->apellido_paterno ?? '', 0, 1)) }}
                    </div>
                    <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
                </div>
                <div class="hidden md:block text-left">
                    <p class="text-sm font-semibold text-slate-800">{{ auth('kibi')->user()->name }} {{ auth('kibi')->user()->apellido_paterno ?? '' }}</p>
                    <p class="text-[11px] text-slate-500 leading-none mt-0.5">{{ optional(auth('kibi')->user()->tipoUsuario)->nombre ?? 'Usuario' }}</p>
                </div>
                <span class="material-icons text-slate-500 text-sm">expand_more</span>
            </button>

            <div id="kibi-public-profile-panel" class="absolute right-0 top-12 mt-2 w-72 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 pointer-events-auto">
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
    </div>
    @endauth

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Moderno -->
    @include('KIBI.home.components.modern-footer')

    <!-- Botón flotante de WhatsApp -->
    @include('KIBI.home.components.whatsapp-float')

    <!-- Scripts específicos de KIBI -->
    @include('KIBI.home.components.styles.scripts')

    @stack('scripts')
    
    <!-- Debug script para verificar Material Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Verificar que Material Icons esté cargado
            const testIcon = document.createElement('span');
            testIcon.className = 'material-icons';
            testIcon.textContent = 'check_circle';
            testIcon.style.position = 'absolute';
            testIcon.style.left = '-9999px';
            document.body.appendChild(testIcon);
            
            // Verificar si el icono se renderiza correctamente
            const computedStyle = window.getComputedStyle(testIcon);
            const fontFamily = computedStyle.getPropertyValue('font-family');
            
            if (fontFamily.includes('Material Icons')) {
                console.log('✅ Material Icons cargado correctamente');
            } else {
                console.log('❌ Material Icons no está cargado');
            }
            
            // Limpiar el elemento de prueba
            document.body.removeChild(testIcon);
        });
    </script>
</body>
</html>
