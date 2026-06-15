<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KIBI Educación - Recuperar contraseña</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji"; } </style>
</head>
<body class="bg-white">
    <section class="relative overflow-hidden" style="min-height: calc(100vh - 80px); padding: 2rem 0 4rem;">
        <div class="absolute inset-0 bg-white"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="min-h-[80vh] flex items-center justify-center">
                <div class="w-full max-w-5xl mx-auto">
                    <div class="bg-white border border-slate-200 rounded-3xl shadow-2xl overflow-hidden">
                        <div class="grid lg:grid-cols-2 min-h-[600px]">
                            <div class="p-8 lg:p-12 flex flex-col justify-center relative overflow-hidden"
                                style="background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                <!-- Background Pattern -->
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-10 left-10 w-32 h-32 bg-cyan-500/20 rounded-full blur-2xl"></div>
                                    <div class="absolute bottom-10 right-10 w-40 h-40 bg-blue-500/20 rounded-full blur-2xl"></div>
                                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-purple-500/20 rounded-full blur-xl"></div>
                                </div>

                                <div class="relative z-10 text-white space-y-6">
                                    <h1 class="text-5xl lg:text-6xl font-black">¿Olvidaste tu contraseña?</h1>
                                    <p class="text-xl font-semibold text-slate-300">Te enviaremos un enlace de recuperación</p>
                                </div>
                            </div>
                            <div class="p-8 lg:p-12 flex flex-col justify-center bg-white">
                                @include('KIBI.auth.components.header', [
                                    'title' => 'Recuperar Contraseña',
                                    'subtitle' => 'Ingresa tu email para recibir el enlace'
                                ])

                                @include('KIBI.auth.components.ui.errors')

                                @if (session('status'))
                                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-700">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('kibi.password.email') }}" class="space-y-6">
                                    @csrf
                                    <input type="hidden" name="kibi" value="1">
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-slate-700" for="email">Correo electrónico</label>
                                        <div class="relative group">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                                            </div>
                                            <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="tu@email.com" class="w-full pl-12 pr-4 py-3 bg-white border border-slate-300 rounded-xl focus:ring-2 focus:ring-sky-200 focus:border-sky-400 text-slate-900 placeholder-slate-400 transition-all" />
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <button type="submit" class="w-full group relative px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-semibold rounded-xl transition-all">
                                            <div class="relative flex items-center justify-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                                <span>Enviar enlace de recuperación</span>
                                            </div>
                                        </button>
                                    </div>
                                </form>

                                <div class="mt-8 text-center">
                                    <p class="text-slate-600 text-sm">¿Recordaste tu contraseña?
                                        <a href="{{ route('kibi.login') }}" class="ml-1 text-sky-700 hover:text-sky-800 font-semibold">Inicia sesión</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>


