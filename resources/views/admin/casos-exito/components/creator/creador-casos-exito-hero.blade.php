<!-- Hero Section -->
<div class="relative overflow-hidden min-h-[70vh]">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1920&h=1080&fit=crop&crop=center"
            alt="Mis Casos de Éxito" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/50 via-blue-900/40 to-cyan-900/50"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-purple-900/20 via-transparent to-cyan-500/15"></div>
        <div class="absolute inset-0 bg-black/5"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-white mb-4 drop-shadow-2xl">
                Mis Casos de Éxito
            </h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto leading-relaxed drop-shadow-lg">
                Gestiona y comparte tu conocimiento a través de casos de éxito profesionales
            </p>
            @php
                $user = auth()->user();
                $tipoUsuario = $user->tipoUsuario->nombre ?? 'usuario';
            @endphp
            <div class="mt-4">
                <span class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full border border-white/30">
                    <span class="material-icons text-white text-sm mr-2">edit</span>
                    <span class="text-white font-medium text-sm">
                        {{ ucfirst($tipoUsuario) }} - Puede crear y gestionar sus casos de éxito
                    </span>
                </span>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-6 mb-8">
            <div class="flex items-center space-x-4">
                <div
                    class="flex items-center space-x-2 px-4 py-2 bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-xl border border-gray-200/50 dark:border-slate-700/50">
                    <span class="material-icons text-blue-500">analytics</span>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $casosExito->total() }}
                        casos de éxito</span>
                </div>
                <div
                    class="flex items-center space-x-2 px-4 py-2 bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-xl border border-gray-200/50 dark:border-slate-700/50">
                    <span class="material-icons text-green-500">visibility</span>
                    <span
                        class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $casosExito->where('status', 'publicado')->count() }}
                        publicados</span>
                </div>
            </div>

            <button onclick="openCreateModal()"
                class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-semibold rounded-2xl shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/40 transition-all duration-300 hover:scale-105 hover:-translate-y-1"
                data-loading="false">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity">
                </div>
                <span class="material-icons mr-3 relative z-10">add_circle</span>
                <span class="button-text relative z-10">Crear Nuevo Caso de Éxito</span>
            </button>
        </div>
    </div>
</div>
