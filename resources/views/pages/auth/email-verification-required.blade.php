<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verificación de Email Requerida - SoftLinkIA</title>
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
                <div class="w-full max-w-4xl mx-auto">
                    <!-- Email Verification Required Card -->
                    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-700/60 rounded-3xl shadow-2xl overflow-hidden"
                        data-aos="fade-up">
                        <div class="p-8 lg:p-12 text-center">
                            <!-- Icon -->
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl mb-6 shadow-lg shadow-yellow-500/25">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>

                            <!-- Title -->
                            <h1 class="text-4xl lg:text-5xl font-black text-white mb-6">
                                Verificación de Email Requerida
                            </h1>

                            <!-- Description -->
                            <p class="text-xl text-slate-300 mb-8 max-w-2xl mx-auto">
                                Para acceder a todas las funcionalidades de SoftLinkIA, necesitas verificar tu dirección de email.
                            </p>

                            <!-- Current Email -->
                            <div class="bg-slate-800/50 border border-slate-600/50 rounded-xl p-4 mb-8 max-w-md mx-auto">
                                <p class="text-slate-400 text-sm mb-2">Email registrado:</p>
                                <p class="text-white font-semibold">{{ auth()->user()->email }}</p>
                            </div>

                            <!-- Instructions -->
                            <div class="bg-blue-900/30 border border-blue-500/30 rounded-xl p-6 mb-8 max-w-2xl mx-auto">
                                <h3 class="text-lg font-semibold text-blue-200 mb-4">Instrucciones:</h3>
                                <ol class="text-left text-blue-100 space-y-2">
                                    <li class="flex items-start gap-3">
                                        <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold flex-shrink-0">1</span>
                                        <span>Revisa tu bandeja de entrada (y carpeta de spam)</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold flex-shrink-0">2</span>
                                        <span>Busca el email de "Verifica tu cuenta en SoftLinkIA"</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold flex-shrink-0">3</span>
                                        <span>Haz clic en el enlace de verificación</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold flex-shrink-0">4</span>
                                        <span>¡Listo! Ya puedes acceder a todos los servicios</span>
                                    </li>
                                </ol>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                                <!-- Resend Email Button -->
                                <form method="POST" action="{{ route('email.resend') }}" class="inline">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                    <button type="submit" class="group relative px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg hover:shadow-cyan-500/25 overflow-hidden">
                                        <div class="relative flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                            <span>Reenviar Email de Verificación</span>
                                        </div>
                                    </button>
                                </form>

                                <!-- Logout Button -->
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-xl transition-all duration-300">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </div>

                            <!-- Help Text -->
                            <div class="mt-8 text-center">
                                <p class="text-slate-400 text-sm">
                                    ¿No recibiste el email?
                                    <span class="text-cyan-400">Revisa tu carpeta de spam</span> o
                                    <span class="text-cyan-400">contacta con soporte</span>
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
            // Add loading state to resend button
            const resendForm = document.querySelector('form[action="{{ route('email.resend') }}"]');
            const resendButton = resendForm.querySelector('button[type="submit"]');

            if (resendForm && resendButton) {
                resendForm.addEventListener('submit', function () {
                    resendButton.disabled = true;
                    resendButton.innerHTML = `
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <span>Reenviando...</span>
                        </div>
                    `;
                });
            }
        });
    </script>
</body>
</html>
