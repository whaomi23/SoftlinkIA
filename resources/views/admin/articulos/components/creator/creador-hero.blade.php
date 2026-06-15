<!-- Hero Section Creadores Premium -->
<div class="relative overflow-hidden min-h-[95vh] flex items-center">
    <!-- Fondo con imagen + overlay animado -->
    <div class="absolute inset-0 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1920&h=1080&fit=crop&crop=center"
            class="w-full h-full object-cover scale-105 animate-slow-zoom" alt="Gestión de artículos">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/90 via-slate-900/70 to-slate-900/95 backdrop-blur-sm"></div>
    </div>

    <!-- Partículas flotantes sutiles -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="animate-float-slow absolute w-2 h-2 bg-indigo-400 rounded-full opacity-30 top-1/4 left-1/3"></div>
        <div class="animate-float-slow absolute w-3 h-3 bg-pink-400 rounded-full opacity-20 top-2/3 left-2/5"></div>
        <div class="animate-float-slow absolute w-1.5 h-1.5 bg-blue-400 rounded-full opacity-25 top-1/2 left-3/4"></div>
    </div>

    <!-- Contenido principal -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 lg:px-10 py-32 text-center">
        <!-- Badge superior -->
        <div data-aos="fade-down" data-aos-duration="900"
            class="inline-flex items-center px-6 py-2 mb-6 bg-white/10 border border-white/20 text-white rounded-full backdrop-blur-md text-xs uppercase tracking-wider shadow-lg">
            Plataforma Creativa para Creadores
        </div>

        <!-- Título Hero con animación de escritura y subrayado -->
        <h1 data-aos="fade-up" data-aos-delay="150"
            class="text-5xl md:text-6xl font-extrabold text-white leading-tight mb-6 relative">
            Crea, Publica y <span class="text-indigo-400 relative">Inspira
            <span class="absolute left-0 bottom-0 w-full h-1 bg-indigo-400 rounded-full animate-pulse"></span>
            </span> con Contenidos Profesionales
        </h1>

        <!-- Descripción -->
        <p data-aos="fade-up" data-aos-delay="250"
           class="text-lg md:text-xl text-white/85 max-w-3xl mx-auto leading-relaxed mb-12">
            Lleva tus ideas al siguiente nivel: organiza, publica y gestiona tus artículos con herramientas avanzadas,
            flujo editorial inteligente y estadísticas en tiempo real. Todo diseñado para creadores que buscan excelencia.
        </p>

        <!-- Rol del usuario -->
        @php
            $user = auth()->user();
            $tipoUsuario = $user->tipoUsuario->nombre ?? 'Creador';
        @endphp
        <div data-aos="fade-up" data-aos-delay="350">
            <span class="inline-flex items-center px-6 py-2 mb-14 bg-indigo-500/10 border border-indigo-400/20 text-indigo-200 rounded-full shadow-lg backdrop-blur-lg hover:bg-indigo-500/20 transition-all">
                <span class="material-icons text-indigo-300 text-sm mr-2">auto_stories</span>
                Modo: <strong class="ml-1">{{ ucfirst($tipoUsuario) }}</strong>
            </span>
        </div>

        <!-- Estadísticas con efecto glass y animación -->
        <div data-aos="fade-up" data-aos-delay="450"
            class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-14">
            <div class="flex items-center px-6 py-4 bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 shadow-2xl hover:scale-105 transition-transform duration-300">
                <span class="material-icons text-blue-400 mr-3 text-lg">library_books</span>
                <span class="text-white text-sm md:text-base font-medium">
                    {{ $articulos->total() }} artículos creados
                </span>
            </div>
            <div class="flex items-center px-6 py-4 bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 shadow-2xl hover:scale-105 transition-transform duration-300">
                <span class="material-icons text-green-400 mr-3 text-lg">verified</span>
                <span class="text-white text-sm md:text-base font-medium">
                    {{ $articulos->where('status', 'publicado')->count() }} artículos publicados
                </span>
            </div>
        </div>

        <!-- Botones principales con efecto 3D y glow -->
        <div data-aos="zoom-in" data-aos-delay="550" class="space-x-4">
            <button onclick="openCreateModal()"
                class="px-12 py-4 bg-gradient-to-r from-indigo-600 via-blue-600 to-purple-600 rounded-2xl font-bold text-white shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-300 relative overflow-hidden group">
                <span class="material-icons align-middle mr-2 transition-transform group-hover:rotate-12">add_circle</span>
                Crear Nuevo Artículo
                <span class="absolute -z-10 inset-0 bg-white/10 opacity-0 group-hover:opacity-20 transition-opacity rounded-2xl"></span>
            </button>
        </div>
    </div>
</div>

<!-- Animaciones suaves para fondo y partículas -->
<style>
    @keyframes slowZoom {
        0% { transform: scale(1.05); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1.05); }
    }
    .animate-slow-zoom { animation: slowZoom 30s ease-in-out infinite; }

    @keyframes floatSlow {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    .animate-float-slow { animation: floatSlow 15s ease-in-out infinite; }
</style>
