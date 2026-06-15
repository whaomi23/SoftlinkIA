<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Recuperar contraseña - SoftLinkIA</title>
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
                <div class="w-full max-w-5xl mx-auto">
                    <!-- Forgot Password Card -->
                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-700/60 rounded-3xl shadow-2xl overflow-hidden"
                        data-aos="fade-up">
                        <div class="grid lg:grid-cols-2 min-h-[600px]">

                            <!-- Left Side - Content -->
                            <div class="p-8 lg:p-12 flex flex-col justify-center relative overflow-hidden"
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
                                            ¿Olvidaste tu contraseña?
                                        </h1>
                                        <p class="text-white text-xl font-semibold drop-shadow-lg">No te preocupes, te ayudamos a recuperarla</p>
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
                                            <span class="text-lg font-semibold drop-shadow-md">Proceso 100% seguro</span>
                                        </div>
                                        <div class="flex items-center gap-4 text-white">
                                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <span class="text-lg font-semibold drop-shadow-md">Enlace enviado a tu email</span>
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
                                            <span class="text-lg font-semibold drop-shadow-md">Restablecimiento rápido</span>
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

                            <!-- Right Side - Form -->
                            <div class="p-8 lg:p-12 flex flex-col justify-center bg-slate-800/50 backdrop-blur-sm">
                                <!-- Form Header -->
                                <div class="text-center mb-8">
                                    <div
                                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl mb-4 shadow-lg shadow-cyan-500/25">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h2 class="text-2xl font-bold text-white mb-2">Recuperar Contraseña</h2>
                                    <p class="text-slate-400 text-sm">Ingresa tu email para recibir el enlace de recuperación</p>
                                </div>

                                <!-- Mensajes de estado -->
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
                                            <span class="font-medium">Error</span>
                                        </div>
                                        <ul class="mt-2 list-disc list-inside space-y-1 text-sm">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span>Enviar enlace de recuperación</span>
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

                                <!-- Login Link -->
                                <div class="text-center">
                                    <p class="text-slate-400 text-sm">
                                        ¿Recordaste tu contraseña?
                                        <a href="{{ route('login') }}"
                                            class="ml-1 text-cyan-400 hover:text-cyan-300 font-semibold transition-colors">Inicia
                                            sesión</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add focus effects to input fields
            const inputs = document.querySelectorAll('input[type="email"]');
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
                                <span>Enviando...</span>
                            </div>
                        `;
                });
            }
        });
    </script>
</body>
</html>
