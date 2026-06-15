<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KIBI - Solución de Inteligencia de Negocios - SoftLinkIA</title>
    <meta name="description" content="Transforma tus datos en decisiones inteligentes con KIBI Business Intelligence. La plataforma más avanzada para análisis de datos empresariales.">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/kibbi-images/kibi-icono.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/kibbi-images/kibi-icono.ico">
    <link rel="apple-touch-icon" href="/kibbi-images/kibi-icono.ico">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Atropos.js para efectos 3D parallax -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/atropos@1.0.2/atropos.css">
    <script src="https://cdn.jsdelivr.net/npm/atropos@1.0.2/atropos.min.js"></script>
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
        @include('KIBI.home.components.styles.piala-fonts')

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
    </style>
</head>
<body class="bg-white text-gray-900">
    <!-- Loader Component -->
    @include('kibi.home.components.loader')

    <!-- Header Moderno -->
    @include('kibi.home.components.modern-header')

    <!-- Modal de Formulario de Contacto -->
    @include('kibi.home.components.contact-form-modal')

    <!-- Hero Section Moderno -->
    @include('KIBI.home.components.modern-hero')

    <!-- Sección Plataforma KIBI -->
    @include('KIBI.home.components.kibi-platform-section')

    <!-- Multimedia -->
    @include('kibi.home.components.multimedia-section')

    <!-- Funcionalidades Educativas -->
    @include('KIBI.home.components.educational-features-section')

    <!-- Funcionalidades Administrativas -->
    @include('KIBI.home.components.administrative-features-section')

    <!-- Experiencia KIBI VR -->
    @include('KIBI.home.components.kibi-vr-experience-section')

    <!-- Planes de Precios -->
    @include('KIBI.home.components.pricing-plans-section')

    <!-- Sección de Contacto -->
    @include('KIBI.home.components.contact-section')

    <!-- Footer Moderno -->
    @include('kibi.home.components.modern-footer')

    <!-- Botón flotante de WhatsApp -->
    @include('KIBI.home.components.whatsapp-float')

           <!-- Scripts específicos de KIBI -->
           @include('KIBI.home.components.styles.scripts')

           <!-- Lluvia de Emojis -->
           <div id="emoji-rain-container" class="fixed inset-0 pointer-events-none z-10 overflow-hidden"></div>

           <script>
               // Lluvia de Emojis
               document.addEventListener('DOMContentLoaded', function() {
                   const emojis = ['😊', '😊', '🙂', '🎓', '🎓'];
                   const container = document.getElementById('emoji-rain-container');
                   let animationId;

                   function createEmoji() {
                       const emoji = document.createElement('div');
                       emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
                       emoji.style.position = 'absolute';
                       emoji.style.left = Math.random() * window.innerWidth + 'px';
                       emoji.style.top = '-50px';
                       emoji.style.fontSize = (Math.random() * 20 + 15) + 'px';
                       emoji.style.opacity = Math.random() * 0.8 + 0.2;
                       emoji.style.zIndex = '1000';
                       emoji.style.pointerEvents = 'none';
                       emoji.style.userSelect = 'none';

                       // Animación de caída
                       emoji.style.animation = `fall ${Math.random() * 3 + 2}s linear forwards`;

                       container.appendChild(emoji);

                       // Remover emoji después de la animación
                       setTimeout(() => {
                           if (emoji.parentNode) {
                               emoji.parentNode.removeChild(emoji);
                           }
                       }, 5000);
                   }

                   function startEmojiRain() {
                       createEmoji();
                       setTimeout(startEmojiRain, Math.random() * 1000 + 500);
                   }

                   // CSS para la animación de caída
                   const style = document.createElement('style');
                   style.textContent = `
                       @keyframes fall {
                           to {
                               transform: translateY(${window.innerHeight + 100}px) rotate(360deg);
                               opacity: 0;
                           }
                       }
                   `;
                   document.head.appendChild(style);

                   // Iniciar lluvia después de 2 segundos
                   setTimeout(startEmojiRain, 2000);

                   // Pausar lluvia cuando el usuario no está interactuando
                   let isUserActive = true;
                   let inactivityTimer;

                   function resetInactivityTimer() {
                       isUserActive = true;
                       clearTimeout(inactivityTimer);
                       inactivityTimer = setTimeout(() => {
                           isUserActive = false;
                       }, 10000); // 10 segundos de inactividad
                   }

                   // Detectar actividad del usuario
                   ['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart'].forEach(event => {
                       document.addEventListener(event, resetInactivityTimer, true);
                   });

                   // Controlar la lluvia basado en la actividad
                   function controlledEmojiRain() {
                       if (isUserActive) {
                           createEmoji();
                       }
                       setTimeout(controlledEmojiRain, Math.random() * 2000 + 1000);
                   }

                   // Iniciar lluvia controlada después de 5 segundos
                   setTimeout(controlledEmojiRain, 5000);
               });
           </script>
       </body>
       </html>
