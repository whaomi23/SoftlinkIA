<!-- Hero Section Premium con Animación AOS -->
<div class="relative overflow-hidden min-h-[60vh] flex items-center bg-gradient-to-br from-kibi-primary/5 via-white to-kibi-secondary/5">
    <!-- Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-b from-white/95 via-white/90 to-white/95"></div>
        <!-- Decorative elements -->
        <div class="absolute top-20 left-20 w-32 h-32 bg-kibi-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-40 h-40 bg-kibi-secondary/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-kibi-highlight/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-6 lg:px-8 py-32 text-center">
        <!-- Título -->
        <h1 data-aos="fade-down" data-aos-duration="900"
            class="text-5xl md:text-6xl font-extrabold text-slate-800 leading-tight mb-6">
            Gestión de Artículos - KIBI
        </h1>

        <!-- Descripción -->
        <p data-aos="fade-down" data-aos-delay="150"
           class="text-xl text-slate-600 max-w-3xl mx-auto mb-8 leading-relaxed">
            Administra todos tus artículos de KIBI con control total, organiza contenidos y mantén tu plataforma actualizada.
        </p>

        <!-- Rol -->
        @php
            $user = auth()->user();
            $tipoUsuario = $user->tipoUsuario->nombre ?? 'Usuario';
        @endphp
        <div data-aos="fade-up" data-aos-delay="250" class="mb-14">
            <span class="inline-flex items-center px-6 py-2 bg-kibi-primary/10 backdrop-blur-lg border border-kibi-primary/20 rounded-full text-kibi-primary shadow-lg">
                <span class="material-icons text-kibi-primary text-sm mr-2">admin_panel_settings</span>
                {{ ucfirst($tipoUsuario) }} – Panel KIBI
            </span>
        </div>

        <!-- Stats -->
        <div class="flex flex-col sm:flex-row justify-center gap-6 mb-16" data-aos="fade-up" data-aos-delay="350">
            <div class="px-6 py-4 bg-white rounded-xl shadow-lg border border-kibi-primary/20 flex items-center gap-2">
                <span class="material-icons text-kibi-primary">analytics</span>
                <span class="font-medium text-slate-700">{{ $articulos->total() }} Artículos</span>
            </div>
            <div class="px-6 py-4 bg-white rounded-xl shadow-lg border border-kibi-secondary/20 flex items-center gap-2">
                <span class="material-icons text-kibi-secondary">visibility</span>
                <span class="font-medium text-slate-700">{{ $articulos->where('status', 'publicado')->count() }} Publicados</span>
            </div>
        </div>

        <!-- Botón -->
        <div data-aos="zoom-in" data-aos-delay="450">
            <button onclick="openCreateModal()"
                    class="group relative inline-flex items-center px-12 py-5 bg-gradient-to-r from-kibi-primary via-kibi-accent to-kibi-secondary text-white font-bold rounded-xl shadow-lg hover:scale-[1.05] transition duration-300">
                <span class="material-icons mr-2">add_circle_outline</span>
                Nuevo Artículo KIBI
            </button>
        </div>
    </div>
</div>
