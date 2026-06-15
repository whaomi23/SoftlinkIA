<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIBI Educación - Iniciar sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

        body {
            font-family: 'Piala', 'Inter', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Piala', 'Poppins', sans-serif;
        }
    </style>

</head>
<body>
    <section class="relative overflow-hidden min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-cyan-400/20 to-blue-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-indigo-400/10 to-purple-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
        </div>

        <div class="relative z-10 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
                <div class="w-full max-w-6xl mx-auto">
                <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl overflow-hidden">
                    <div class="grid lg:grid-cols-2 min-h-[700px]">
                        <!-- Left Side - Hero Section -->
                        <div class="p-8 lg:p-12 flex flex-col justify-center relative overflow-hidden" id="heroSection">
                            <!-- Background Images -->
                            <div class="absolute inset-0 transition-all duration-1000 ease-in-out" id="bgImage1" 
                                style="background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80'); background-size: cover; background-position: center; background-repeat: no-repeat; opacity: 1;"></div>
                            <div class="absolute inset-0 transition-all duration-1000 ease-in-out" id="bgImage2" 
                                style="background: url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80'); background-size: cover; background-position: center; background-repeat: no-repeat; opacity: 0;"></div>
                            <div class="absolute inset-0 transition-all duration-1000 ease-in-out" id="bgImage3" 
                                style="background: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80'); background-size: cover; background-position: center; background-repeat: no-repeat; opacity: 0;"></div>
                            
                            <!-- Animated Background Overlay -->
                            <div class="absolute inset-0">
                                <div class="absolute inset-0 bg-black/30"></div>
                                <div class="absolute inset-0 opacity-20">
                                    <div class="absolute top-10 left-10 w-32 h-32 bg-white/20 rounded-full blur-2xl animate-bounce"></div>
                                    <div class="absolute bottom-10 right-10 w-40 h-40 bg-white/20 rounded-full blur-2xl animate-bounce delay-1000"></div>
                                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-white/20 rounded-full blur-xl animate-bounce delay-500"></div>
                                </div>
                                <!-- Floating Elements -->
                                <div class="absolute top-20 right-20 w-4 h-4 bg-white/30 rounded-full animate-ping"></div>
                                <div class="absolute bottom-32 left-16 w-3 h-3 bg-white/40 rounded-full animate-ping delay-700"></div>
                                <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-white/50 rounded-full animate-ping delay-1000"></div>
                            </div>

                            <div class="relative z-10 text-white space-y-8">
                                <div class="space-y-6 animate-fade-in-up">
                                    <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium mb-4">
                                        <span class="material-icons text-sm mr-2">flash_on</span>
                                        <span id="badgeText">Plataforma Educativa</span>
                                    </div>
                                    <h1 class="text-5xl lg:text-6xl font-black bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                                        <span id="mainTitle">Aprende con KIBI</span>
                                    </h1>
                                    <p class="text-xl font-semibold text-blue-100 leading-relaxed">
                                        <span id="mainSubtitle">Accede a tu cuenta educativa y descubre un mundo de conocimiento</span>
                                    </p>
                                </div>
                                
                                <div class="space-y-6 animate-fade-in-up delay-300">
                                    <div class="flex items-center gap-4 group">
                                        <div class="w-12 h-12 bg-emerald-500/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-emerald-500/40 transition-all duration-300">
                                            <span class="material-icons text-3xl relative z-10">security</span>
                                        </div>
                                        <div>
                                            <span class="text-lg font-semibold text-white" id="feature1Title">Entorno seguro</span>
                                            <p class="text-sm text-blue-200" id="feature1Desc">Protección de datos garantizada</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 group">
                                        <div class="w-12 h-12 bg-sky-500/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-sky-500/40 transition-all duration-300">
                                            <span class="material-icons text-3xl relative z-10">speed</span>
                                        </div>
                                        <div>
                                            <span class="text-lg font-semibold text-white" id="feature2Title">Rápido y sencillo</span>
                                            <p class="text-sm text-blue-200" id="feature2Desc">Acceso instantáneo</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 group">
                                        <div class="w-12 h-12 bg-indigo-500/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-indigo-500/40 transition-all duration-300">
                                            <span class="material-icons text-3xl relative z-10">shield</span>
                                        </div>
                                        <div>
                                            <span class="text-lg font-semibold text-white" id="feature3Title">Datos protegidos</span>
                                            <p class="text-sm text-blue-200" id="feature3Desc">Privacidad asegurada</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Login Form -->
                        <div class="p-8 lg:p-12 flex flex-col justify-center bg-white/95 backdrop-blur-sm">
                            <div class="max-w-md mx-auto w-full">
                                @include('KIBI.auth.components.header', [
                                    'title' => 'Iniciar Sesión',
                                    'subtitle' => 'Accede a tu cuenta educativa KIBI'
                                ])

                                @include('KIBI.auth.components.ui.errors')

                                @if (session('status'))
                                    <div class="mb-6 p-4 bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 rounded-xl text-emerald-700 shadow-sm">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        {{ session('status') }}
                                        </div>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('kibi.login.post') }}" class="space-y-6" id="loginForm">
                                    @csrf
                                    <input type="hidden" name="kibi" value="1">

                                    <div class="space-y-2">
                                        <label class="block text-sm font-semibold text-slate-700" for="email">Correo electrónico</label>
                                            <div class="relative group">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span class="material-icons text-lg text-slate-600">email</span>
                                                </div>
                                                <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="tu@email.com"
                                                class="w-full pl-12 pr-4 py-4 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-900 placeholder-slate-400 transition-all duration-300 hover:bg-white hover:border-slate-300" />
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-sm font-semibold text-slate-700" for="password">Contraseña</label>
                                            <div class="relative group">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span class="material-icons text-lg text-slate-600">lock</span>
                                                </div>
                                                <input id="password" name="password" type="password" required placeholder="••••••••"
                                                class="w-full pl-12 pr-12 py-4 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-900 placeholder-slate-400 transition-all duration-300 hover:bg-white hover:border-slate-300" />
                                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between text-sm pt-2">
                                        <label class="flex items-center text-slate-700 cursor-pointer group">
                                            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }} 
                                                class="mr-3 rounded border-slate-300 bg-white text-blue-600 focus:ring-blue-500 focus:ring-2 transition-all">
                                            <span class="group-hover:text-slate-800 transition-colors">Recuérdame</span>
                                        </label>
                                        <a href="{{ route('kibi.password.request') }}" 
                                            class="text-blue-600 hover:text-blue-700 font-medium transition-colors hover:underline">
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                    </div>

                                    <div class="pt-6">
                                        <button type="submit" id="loginBtn" 
                                            class="w-full group relative px-6 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                                            <div class="relative flex items-center justify-center gap-3">
                                                <span class="material-icons text-lg">login</span>
                                                <svg id="loadingSpinner" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                <span id="buttonText">Iniciar sesión</span>
                                            </div>
                                        </button>
                                    </div>
                                </form>

                                <div class="mt-8 mb-6">
                                    <div class="relative">
                                        <div class="absolute inset-0 flex items-center">
                                            <div class="w-full border-t border-slate-200"></div>
                                        </div>
                                        <div class="relative flex justify-center text-sm">
                                            <span class="px-4 bg-white/95 text-slate-400 font-medium">o continúa con</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <a href="{{ route('auth.google') }}" 
                                        class="w-full group relative px-6 py-4 bg-white/80 backdrop-blur-sm hover:bg-white text-slate-800 font-semibold rounded-xl transition-all duration-300 border border-slate-200 hover:border-slate-300 flex items-center justify-center gap-3 transform hover:scale-[1.02] hover:shadow-lg">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                        </svg>
                                        <span>Continuar con Google</span>
                                    </a>
                                </div>

                                <div class="text-center">
                                    <p class="text-slate-600 text-sm">¿No tienes cuenta?
                                        <a href="{{ route('kibi.register') }}" 
                                            class="ml-1 text-blue-600 hover:text-blue-700 font-semibold transition-colors hover:underline">
                                            Crear cuenta
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out forwards;
        }
        
        .delay-300 {
            animation-delay: 0.3s;
        }
        
        .delay-500 {
            animation-delay: 0.5s;
        }
        
        .delay-700 {
            animation-delay: 0.7s;
        }
        
        .delay-1000 {
            animation-delay: 1s;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Image carousel data for login page
            const loginContent = [
                {
                    badge: "Plataforma Educativa",
                    title: "Aprende con KIBI",
                    subtitle: "Accede a tu cuenta educativa y descubre un mundo de conocimiento",
                    features: [
                        { title: "Entorno seguro", desc: "Protección de datos garantizada" },
                        { title: "Rápido y sencillo", desc: "Acceso instantáneo" },
                        { title: "Datos protegidos", desc: "Privacidad asegurada" }
                    ]
                },
                {
                    badge: "Aprendizaje Colaborativo",
                    title: "Estudia en Equipo",
                    subtitle: "Conecta con otros estudiantes y aprende juntos en proyectos colaborativos",
                    features: [
                        { title: "Trabajo en equipo", desc: "Colabora con compañeros" },
                        { title: "Proyectos grupales", desc: "Desarrolla habilidades sociales" },
                        { title: "Mentoría", desc: "Recibe apoyo de expertos" }
                    ]
                },
                {
                    badge: "Tecnología Avanzada",
                    title: "Educación Digital",
                    subtitle: "Utiliza las herramientas más modernas para potenciar tu aprendizaje",
                    features: [
                        { title: "IA integrada", desc: "Asistencia inteligente" },
                        { title: "Realidad virtual", desc: "Experiencias inmersivas" },
                        { title: "Analytics", desc: "Seguimiento de progreso" }
                    ]
                }
            ];

            let currentSlide = 0;
            const totalSlides = 3;

            // Function to update content
            function updateContent(slideIndex) {
                const content = loginContent[slideIndex];
                
                // Update text content with fade effect
                const elements = {
                    badgeText: content.badge,
                    mainTitle: content.title,
                    mainSubtitle: content.subtitle,
                    feature1Title: content.features[0].title,
                    feature1Desc: content.features[0].desc,
                    feature2Title: content.features[1].title,
                    feature2Desc: content.features[1].desc,
                    feature3Title: content.features[2].title,
                    feature3Desc: content.features[2].desc
                };

                // Fade out, update, fade in
                Object.keys(elements).forEach(key => {
                    const element = document.getElementById(key);
                    if (element) {
                        element.style.opacity = '0';
                        setTimeout(() => {
                            element.textContent = elements[key];
                            element.style.opacity = '1';
                        }, 300);
                    }
                });
            }

            // Function to change background image
            function changeBackgroundImage() {
                // Hide current image
                document.getElementById(`bgImage${currentSlide + 1}`).style.opacity = '0';
                
                // Move to next slide
                currentSlide = (currentSlide + 1) % totalSlides;
                
                // Show next image
                setTimeout(() => {
                    document.getElementById(`bgImage${currentSlide + 1}`).style.opacity = '1';
                    updateContent(currentSlide);
                }, 500);
            }

            // Start carousel
            setInterval(changeBackgroundImage, 5000); // Change every 5 seconds

            // Password toggle functionality
            const toggleBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (toggleBtn && passwordInput && eyeIcon) {
                toggleBtn.addEventListener('click', function () {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    
                    if (isPassword) {
                        eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>`;
                    } else {
                        eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
                    }
                });
            }

            // Form submission with loading state
            const form = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            
            if (form && loginBtn) {
                form.addEventListener('submit', function () {
                    const spinner = document.getElementById('loadingSpinner');
                    const loginIcon = document.getElementById('loginIcon');
                    const buttonText = document.getElementById('buttonText');
                    
                    if (spinner && loginIcon && buttonText) {
                        spinner.classList.remove('hidden');
                        loginIcon.classList.add('hidden');
                        buttonText.textContent = 'Iniciando sesión...';
                        loginBtn.disabled = true;
                    }
                });
            }

            // Add focus effects to form inputs
            const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-blue-500/20');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-blue-500/20');
                });
            });
        });
    </script>
</body>
</html>


