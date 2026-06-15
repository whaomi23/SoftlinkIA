<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIBI Educación - Crear cuenta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <section class="relative overflow-hidden min-h-screen bg-gradient-to-br from-slate-50 via-purple-50 to-indigo-100">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-400/20 to-pink-600/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-indigo-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-pink-400/10 to-purple-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
        </div>

        <div class="relative z-10 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
            <div class="w-full max-w-7xl mx-auto">
                <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl overflow-hidden">
                    <div class="grid lg:grid-cols-2 min-h-[800px]">
                        <!-- Left Side - Hero Section -->
                        <div class="p-8 lg:p-12 flex flex-col justify-center relative overflow-hidden" id="heroSection">
                            <!-- Background Images -->
                            <div class="absolute inset-0 transition-all duration-1000 ease-in-out" id="bgImage1" 
                                style="background: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80'); background-size: cover; background-position: center; background-repeat: no-repeat; opacity: 1;"></div>
                            <div class="absolute inset-0 transition-all duration-1000 ease-in-out" id="bgImage2" 
                                style="background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80'); background-size: cover; background-position: center; background-repeat: no-repeat; opacity: 0;"></div>
                            <div class="absolute inset-0 transition-all duration-1000 ease-in-out" id="bgImage3" 
                                style="background: url('https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80'); background-size: cover; background-position: center; background-repeat: no-repeat; opacity: 0;"></div>
                            
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
                                <div class="absolute bottom-1/4 left-1/3 w-3 h-3 bg-white/30 rounded-full animate-ping delay-300"></div>
                            </div>

                            <div class="relative z-10 text-white">
                                <div class="mb-8 animate-fade-in-up">
                                    <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium mb-4">
                                        <span class="material-icons text-sm mr-2">add_circle</span>
                                        <span id="badgeText">Únete a KIBI</span>
                                    </div>
                                    <h1 class="text-5xl lg:text-6xl font-black mb-2 bg-gradient-to-r from-white to-pink-100 bg-clip-text text-transparent">
                                        <span id="mainTitle">Bienvenido</span>
                                    </h1>
                                    <p class="text-xl font-semibold text-purple-100 leading-relaxed">
                                        <span id="mainSubtitle">Únete a nuestra plataforma educativa y comienza tu viaje de aprendizaje</span>
                                    </p>
                                </div>
                                
                                <div class="space-y-6 animate-fade-in-up delay-300">
                                    <div class="flex items-center gap-4 group">
                                        <div class="w-12 h-12 bg-emerald-500/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-emerald-500/40 transition-all duration-300">
                                            <span class="material-icons text-3xl relative z-10">check_circle</span>
                                        </div>
                                        <div>
                                            <span class="text-lg font-semibold text-white" id="feature1Title">Registro en minutos</span>
                                            <p class="text-sm text-purple-200" id="feature1Desc">Proceso rápido y sencillo</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 group">
                                        <div class="w-12 h-12 bg-sky-500/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-sky-500/40 transition-all duration-300">
                                            <span class="material-icons text-3xl relative z-10">flash_on</span>
                                        </div>
                                        <div>
                                            <span class="text-lg font-semibold text-white" id="feature2Title">Acceso a cursos</span>
                                            <p class="text-sm text-purple-200" id="feature2Desc">Contenido educativo premium</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 group">
                                        <div class="w-12 h-12 bg-indigo-500/30 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-indigo-500/40 transition-all duration-300">
                                            <span class="material-icons text-3xl relative z-10">security</span>
                                        </div>
                                        <div>
                                            <span class="text-lg font-semibold text-white" id="feature3Title">Datos seguros</span>
                                            <p class="text-sm text-purple-200" id="feature3Desc">Privacidad garantizada</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Register Form -->
                        <div class="p-8 lg:p-12 flex flex-col justify-center bg-white/95 backdrop-blur-sm overflow-y-auto">
                            <div class="max-w-md mx-auto w-full">
                                @include('KIBI.auth.components.header', [
                                    'title' => 'Registro de Usuario',
                                    'subtitle' => 'Completa tus datos para comenzar'
                                ])

                                @include('KIBI.auth.components.ui.errors')

                                <form method="POST" action="{{ route('kibi.register.post') }}" class="space-y-6" id="registerForm">
                                    @csrf
                                    <input type="hidden" name="kibi" value="1">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-slate-700" for="name">Nombre</label>
                                            <div class="relative group">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span class="material-icons text-lg text-slate-600">person</span>
                                                </div>
                                                <input id="name" name="name" type="text" value="{{ old('name') }}" required placeholder="Juan" 
                                                    class="w-full pl-12 pr-4 py-4 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 text-slate-900 placeholder-slate-400 transition-all duration-300 hover:bg-white hover:border-slate-300" />
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-slate-700" for="apellido_paterno">Apellido Paterno</label>
                                            <div class="relative group">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span class="material-icons text-lg text-slate-600">person</span>
                                                </div>
                                                <input id="apellido_paterno" name="apellido_paterno" type="text" value="{{ old('apellido_paterno') }}" required placeholder="Pérez" 
                                                    class="w-full pl-12 pr-4 py-4 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 text-slate-900 placeholder-slate-400 transition-all duration-300 hover:bg-white hover:border-slate-300" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-slate-700" for="apellido_materno">Apellido Materno</label>
                                            <div class="relative group">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span class="material-icons text-lg text-slate-600">person</span>
                                                </div>
                                                <input id="apellido_materno" name="apellido_materno" type="text" value="{{ old('apellido_materno') }}" required placeholder="González" 
                                                    class="w-full pl-12 pr-4 py-4 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 text-slate-900 placeholder-slate-400 transition-all duration-300 hover:bg-white hover:border-slate-300" />
                                            </div>
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-slate-700" for="email">Correo electrónico</label>
                                            <div class="relative group">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span class="material-icons text-lg text-slate-600">email</span>
                                                </div>
                                                <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="tu@email.com" 
                                                    class="w-full pl-12 pr-4 py-4 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 text-slate-900 placeholder-slate-400 transition-all duration-300 hover:bg-white hover:border-slate-300" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-slate-700" for="password">Contraseña</label>
                                            <div class="relative group">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span class="material-icons text-lg text-slate-600">lock</span>
                                                </div>
                                                <input id="password" name="password" type="password" required placeholder="••••••••" 
                                                    class="w-full pl-12 pr-12 py-4 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 text-slate-900 placeholder-slate-400 transition-all duration-300 hover:bg-white hover:border-slate-300" />
                                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                                                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-slate-700" for="password_confirmation">Confirmar contraseña</label>
                                            <div class="relative group">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span class="material-icons text-lg text-slate-600">lock</span>
                                                </div>
                                                <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="••••••••" 
                                                    class="w-full pl-12 pr-12 py-4 bg-white/80 backdrop-blur-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 text-slate-900 placeholder-slate-400 transition-all duration-300 hover:bg-white hover:border-slate-300" />
                                                <button type="button" id="togglePasswordConfirmation" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                                                    <svg id="eyeIconConfirmation" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-start space-x-3">
                                        <div class="flex items-center h-5">
                                            <input id="terms" name="terms" type="checkbox" required 
                                                class="w-4 h-4 text-purple-600 bg-white border-slate-300 rounded focus:ring-purple-500 focus:ring-2 transition-all">
                                        </div>
                                        <div class="text-sm">
                                            <label for="terms" class="text-slate-700 cursor-pointer">
                                                Acepto los <a href="#" class="text-purple-600 hover:text-purple-700 underline transition-colors">términos</a> y la <a href="#" class="text-purple-600 hover:text-purple-700 underline transition-colors">privacidad</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="pt-4">
                                        <button type="submit" id="submitBtn" 
                                            class="w-full group relative px-6 py-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                                            <div class="relative flex items-center justify-center gap-3">
                                                <svg id="loadingSpinner" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                <span class="material-icons text-lg">person_add</span>
                                                <span id="buttonText">Crear cuenta</span>
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
                                            <span class="px-4 bg-white/95 text-slate-400 font-medium">o regístrate con</span>
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
                                        <span>Registrarse con Google</span>
                                    </a>
                                </div>

                                <div class="text-center">
                                    <p class="text-slate-600 text-sm">¿Ya tienes cuenta?
                                        <a href="{{ route('kibi.login') }}" 
                                            class="ml-1 text-purple-600 hover:text-purple-700 font-semibold transition-colors hover:underline">
                                            Inicia sesión
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
            // Image carousel data for register page
            const registerContent = [
                {
                    badge: "Únete a KIBI",
                    title: "Bienvenido",
                    subtitle: "Únete a nuestra plataforma educativa y comienza tu viaje de aprendizaje",
                    features: [
                        { title: "Registro en minutos", desc: "Proceso rápido y sencillo" },
                        { title: "Acceso a cursos", desc: "Contenido educativo premium" },
                        { title: "Datos seguros", desc: "Privacidad garantizada" }
                    ]
                },
                {
                    badge: "Comunidad Global",
                    title: "Conecta con el Mundo",
                    subtitle: "Únete a una comunidad internacional de estudiantes y profesionales",
                    features: [
                        { title: "Red global", desc: "Conecta con estudiantes mundialmente" },
                        { title: "Intercambio cultural", desc: "Aprende de diferentes culturas" },
                        { title: "Networking", desc: "Construye tu red profesional" }
                    ]
                },
                {
                    badge: "Innovación Educativa",
                    title: "Futuro del Aprendizaje",
                    subtitle: "Experimenta la educación del mañana con tecnología de vanguardia",
                    features: [
                        { title: "Metodologías modernas", desc: "Aprendizaje basado en proyectos" },
                        { title: "Gamificación", desc: "Aprende jugando" },
                        { title: "Microlearning", desc: "Lecciones cortas y efectivas" }
                    ]
                }
            ];

            let currentSlide = 0;
            const totalSlides = 3;

            // Function to update content
            function updateContent(slideIndex) {
                const content = registerContent[slideIndex];
                
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

            // Password toggle functionality for main password
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

            // Password toggle functionality for confirmation password
            const toggleBtnConfirmation = document.getElementById('togglePasswordConfirmation');
            const passwordConfirmationInput = document.getElementById('password_confirmation');
            const eyeIconConfirmation = document.getElementById('eyeIconConfirmation');

            if (toggleBtnConfirmation && passwordConfirmationInput && eyeIconConfirmation) {
                toggleBtnConfirmation.addEventListener('click', function () {
                    const isPassword = passwordConfirmationInput.type === 'password';
                    passwordConfirmationInput.type = isPassword ? 'text' : 'password';
                    
                    if (isPassword) {
                        eyeIconConfirmation.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>`;
                    } else {
                        eyeIconConfirmation.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
                    }
                });
            }

            // Form submission with loading state
            const form = document.getElementById('registerForm');
            const submitBtn = document.getElementById('submitBtn');
            
            if (form && submitBtn) {
                form.addEventListener('submit', function () {
                    const spinner = document.getElementById('loadingSpinner');
                    const registerIcon = document.getElementById('registerIcon');
                    const buttonText = document.getElementById('buttonText');
                    
                    if (spinner && registerIcon && buttonText) {
                        spinner.classList.remove('hidden');
                        registerIcon.classList.add('hidden');
                        buttonText.textContent = 'Creando cuenta...';
                        submitBtn.disabled = true;
                    }
                });
            }

            // Add focus effects to form inputs
            const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-purple-500/20');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-purple-500/20');
                });
            });

            // Password strength indicator (optional enhancement)
            const passwordField = document.getElementById('password');
            if (passwordField) {
                passwordField.addEventListener('input', function() {
                    const password = this.value;
                    const strength = getPasswordStrength(password);
                    // You can add visual feedback here if needed
                });
            }

            function getPasswordStrength(password) {
                let strength = 0;
                if (password.length >= 8) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;
                return strength;
            }
        });
    </script>
</body>
</html>


