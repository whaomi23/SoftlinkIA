<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar sesión - SoftLinkIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji"; } </style>
</head>
<body class="bg-slate-950">
    <section class="relative overflow-hidden unified-section-secondary" style="min-height: 100vh; padding: 2rem 0 4rem;">
        <!-- Fondo -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900/60 to-cyan-900/60"></div>
            <div class="absolute top-10 left-10 w-72 h-72 bg-cyan-500/15 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-500/15 rounded-full blur-3xl"></div>
        </div>

        <!-- Partículas -->
        <div class="unified-particles-container">
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
            <div class="unified-particle"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Main Card Container -->
            <div class="min-h-[80vh] flex items-center justify-center">
                <div class="w-full max-w-lg lg:max-w-5xl mx-auto">
                    <!-- Login Card -->
                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-700/60 rounded-3xl shadow-2xl overflow-hidden"
                        data-aos="fade-up">
                        <div class="grid lg:grid-cols-2 min-h-[600px]">

                            <!-- Left Side - Content (Hidden on mobile) -->
                            <div class="hidden lg:block p-8 lg:p-12 flex flex-col justify-center relative overflow-hidden"
                                style="background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), url('{{ asset('login-images/Registrer-bg.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                <!-- Background Pattern -->
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-10 left-10 w-32 h-32 bg-cyan-500/20 rounded-full blur-2xl">
                                    </div>
                                    <div class="absolute bottom-10 right-10 w-40 h-40 bg-blue-500/20 rounded-full blur-2xl">
                                    </div>
                                    <div
                                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-purple-500/20 rounded-full blur-xl">
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="relative z-10 text-white space-y-8">
                                    <!-- Title -->
                                    <div class="space-y-6">
                                        <h1 class="text-5xl lg:text-6xl font-black text-white drop-shadow-2xl">
                                            Bienvenido de vuelta
                                        </h1>
                                        <p class="text-white text-xl font-semibold drop-shadow-lg">Accede a tu cuenta para
                                            continuar</p>
                                    </div>

                                    <!-- Features -->
                                    <div class="space-y-6">
                                        <div class="flex items-center gap-4 text-white">
                                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-lg font-semibold drop-shadow-md">Acceso seguro y
                                                protegido</span>
                                        </div>
                                        <div class="flex items-center gap-4 text-white">
                                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-lg font-semibold drop-shadow-md">Navegación rápida y
                                                eficiente</span>
                                        </div>
                                        <div class="flex items-center gap-4 text-white">
                                            <div
                                                class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <span class="text-lg font-semibold drop-shadow-md">Datos encriptados y
                                                privados</span>
                                        </div>
                                    </div>

                                    <!-- Decorative Line -->
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-1 bg-gradient-to-r from-transparent to-white/60"></div>
                                        <div class="w-3 h-3 bg-white/80 rounded-full animate-pulse"></div>
                                        <div class="w-16 h-1 bg-gradient-to-l from-transparent to-white/60"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side - Login Form -->
                            <div class="p-6 sm:p-8 lg:p-12 flex flex-col justify-center bg-slate-800/50 backdrop-blur-sm">
                                <!-- Form Header -->
                                <div class="text-center mb-8">
                                    <div
                                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl mb-4 shadow-lg shadow-cyan-500/25">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h2 class="text-2xl font-bold text-white mb-2">Iniciar Sesión</h2>
                                    <p class="text-slate-400 text-sm">Accede a tu cuenta SoftLinkIA</p>
                                </div>

                                <!-- Mensajes de error -->
                                @if ($errors->any())
                                    <div
                                        class="mb-6 p-4 bg-red-900/30 border border-red-500/30 rounded-xl text-red-200 backdrop-blur-sm">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-red-400 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="font-medium">Error de autenticación</span>
                                        </div>
                                        <ul class="mt-2 list-disc list-inside space-y-1 text-sm">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('status'))
                                    <div
                                        class="mb-6 p-4 bg-green-900/30 border border-green-500/30 rounded-xl text-green-200 backdrop-blur-sm">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="font-medium">Éxito</span>
                                        </div>
                                        <p class="mt-1 text-sm">{{ session('status') }}</p>
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="mb-6 p-4 bg-green-900/40 border border-green-500/50 rounded-xl text-green-200">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                                    @csrf

                                    <!-- Email Field -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-slate-300" for="email">
                                            Correo electrónico
                                        </label>
                                        <div class="relative group">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-cyan-400 transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                                placeholder="tu@email.com"
                                                class="w-full pl-12 pr-4 py-3 bg-slate-800/50 border border-slate-600/50 rounded-xl focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 text-white placeholder-slate-400 transition-all duration-300 backdrop-blur-sm" />
                                        </div>
                                        @error('email')
                                            <p class="text-red-400 text-sm flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <!-- Password Field -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-slate-300" for="password">
                                            Contraseña
                                        </label>
                                        <div class="relative group">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-cyan-400 transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input id="password" name="password" type="password" required
                                                placeholder="••••••••"
                                                class="w-full pl-12 pr-12 py-3 bg-slate-800/50 border border-slate-600/50 rounded-xl focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 text-white placeholder-slate-400 transition-all duration-300 backdrop-blur-sm" />
                                            <button type="button" id="togglePassword"
                                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-200 transition-colors">
                                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('password')
                                            <p class="text-red-400 text-sm flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="flex items-center justify-between text-sm pt-1">
                                        <label class="flex items-center text-slate-300">
                                            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}
                                                class="mr-2 rounded border-slate-600 bg-slate-800 text-cyan-500 focus:ring-cyan-500">
                                            Recuérdame
                                        </label>
                                        <a href="{{ route('password.request') }}"
                                            class="text-cyan-400 hover:text-cyan-300 transition-colors font-medium">¿Olvidaste
                                            tu contraseña?</a>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="pt-4">
                                        <button type="submit"
                                            class="w-full group relative px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-cyan-500/25 overflow-hidden">
                                            <!-- Button Background Animation -->
                                            <div
                                                class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            </div>

                                            <!-- Button Content -->
                                            <div class="relative flex items-center justify-center gap-2">
                                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                                <span>Iniciar sesión</span>
                                            </div>
                                        </button>
                                    </div>
                                </form>

                                <!-- Divider -->
                                <div class="mt-8 mb-6">
                                    <div class="relative">
                                        <div class="absolute inset-0 flex items-center">
                                            <div class="w-full border-t border-slate-600/50"></div>
                                        </div>
                                        <div class="relative flex justify-center text-sm">
                                            <span class="px-4 bg-slate-900/60 text-slate-400">o</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Google Login Button -->
                                <div class="mb-6">
                                    <a href="{{ route('auth.google') }}"
                                       class="w-full group relative px-6 py-3 bg-white hover:bg-gray-50 text-gray-800 font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg border border-gray-300 flex items-center justify-center gap-3">
                                        <!-- Google Icon -->
                                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                        </svg>
                                        <span>Continuar con Google</span>
                                    </a>
                                </div>

                                <!-- Register Link -->
                                <div class="text-center">
                                    <p class="text-slate-400 text-sm">
                                        ¿No tienes cuenta?
                                        <a href="{{ route('register') }}"
                                            class="ml-1 text-cyan-400 hover:text-cyan-300 font-semibold transition-colors">Crear
                                            cuenta</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Password toggle functionality
            const toggleBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (toggleBtn && passwordInput && eyeIcon) {
                toggleBtn.addEventListener('click', function () {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';

                    // Update SVG icon
                    if (isPassword) {
                        // Password is hidden, show open eye (click to show)
                        eyeIcon.innerHTML = `
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            `;
                    } else {
                        // Password is visible, show closed eye (click to hide)
                        eyeIcon.innerHTML = `
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                            `;
                    }
                });
            }

            // Custom checkbox functionality
            const checkbox = document.querySelector('input[name="remember"]');
            const checkboxBg = document.querySelector('.checkbox-bg');
            const checkboxCheck = document.querySelector('.checkbox-check');

            if (checkbox && checkboxBg && checkboxCheck) {
                // Handle click on the label
                const label = checkbox.closest('label');
                if (label) {
                    label.addEventListener('click', function (e) {
                        e.preventDefault();
                        checkbox.checked = !checkbox.checked;
                        updateCheckboxState();
                    });
                }

                // Handle direct checkbox change
                checkbox.addEventListener('change', updateCheckboxState);

                function updateCheckboxState() {
                    if (checkbox.checked) {
                        checkboxBg.classList.add('bg-cyan-500', 'border-cyan-400');
                        checkboxBg.classList.remove('bg-slate-700', 'border-slate-600');
                        checkboxCheck.classList.remove('opacity-0');
                        checkboxCheck.classList.add('opacity-100');
                    } else {
                        checkboxBg.classList.remove('bg-cyan-500', 'border-cyan-400');
                        checkboxBg.classList.add('bg-slate-700', 'border-slate-600');
                        checkboxCheck.classList.remove('opacity-100');
                        checkboxCheck.classList.add('opacity-0');
                    }
                }

                // Initialize checkbox state
                updateCheckboxState();
            }

            // Add focus effects to input fields
            const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
            inputs.forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentElement.classList.add('ring-2', 'ring-cyan-500/50');
                });

                input.addEventListener('blur', function () {
                    this.parentElement.classList.remove('ring-2', 'ring-cyan-500/50');
                });
            });

            // Add loading state to submit button
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('button[type="submit"]');

            if (form && submitBtn) {
                form.addEventListener('submit', function () {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                <span>Iniciando sesión...</span>
                            </div>
                        `;
                });
            }
        });
    </script>
</body>
</html>
