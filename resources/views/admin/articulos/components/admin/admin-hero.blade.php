<!-- Hero Section Premium con Animación AOS -->
<div class="relative overflow-hidden min-h-[88vh] flex items-center">
    <!-- Background -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1920&h=1080&fit=crop&crop=center"
             alt="Gestión de Artículos" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/85 via-slate-900/70 to-slate-900/95"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-6 lg:px-8 py-32 text-center">
        <!-- Título -->
        <h1 data-aos="fade-down" data-aos-duration="900"
            class="text-5xl md:text-6xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg">
            Gestión de Artículos - Administrador
        </h1>

        <!-- Descripción -->
        <p data-aos="fade-down" data-aos-delay="150"
           class="text-xl text-white/85 max-w-3xl mx-auto mb-8 leading-relaxed">
            Administra todos los artículos del sistema con control total, organiza contenidos y mantén tu plataforma actualizada.
        </p>

        <!-- Rol -->
        @php
            $user = auth()->user();
            $tipoUsuario = $user->tipoUsuario->nombre ?? 'Administrador';
        @endphp
        <div data-aos="fade-up" data-aos-delay="250" class="mb-14">
            <span class="inline-flex items-center px-6 py-2 bg-white/10 backdrop-blur-lg border border-white/20 rounded-full text-white shadow-lg">
                <span class="material-icons text-white text-sm mr-2">admin_panel_settings</span>
                {{ ucfirst($tipoUsuario) }} – Panel Administrativo
            </span>
        </div>

        <!-- Stats -->
        <div class="flex flex-col sm:flex-row justify-center gap-6 mb-16" data-aos="fade-up" data-aos-delay="350">
            <div class="px-6 py-4 bg-white/95 rounded-xl shadow-lg flex items-center gap-2">
                <span class="material-icons text-blue-700">analytics</span>
                <span class="font-medium text-gray-800">{{ $articulos->total() }} Artículos</span>
            </div>
            <div class="px-6 py-4 bg-white/95 rounded-xl shadow-lg flex items-center gap-2">
                <span class="material-icons text-green-700">visibility</span>
                <span class="font-medium text-gray-800">{{ $articulos->where('status', 'publicado')->count() }} Publicados</span>
            </div>
        </div>

        <!-- Botón -->
        <div data-aos="zoom-in" data-aos-delay="450">
            <button onclick="openCreateModal()"
                    class="group relative inline-flex items-center px-12 py-5 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:scale-[1.05] transition duration-300">
                <span class="material-icons mr-2">add_circle_outline</span>
                Nuevo Artículo
            </button>
        </div>
    </div>
</div>
