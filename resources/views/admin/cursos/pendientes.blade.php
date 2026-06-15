@extends('layouts.app')

@section('title', 'Cursos Pendientes - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-pink-400/20 to-indigo-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-cyan-400/10 to-blue-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-yellow-600/10 via-orange-600/10 to-red-600/10 dark:from-yellow-400/5 dark:via-orange-400/5 dark:to-red-400/5"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
            <div class="text-center mb-16">
                <!-- Animated Icon -->
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-yellow-500 via-orange-600 to-red-600 rounded-3xl mb-8 shadow-2xl shadow-yellow-500/30 hover:shadow-yellow-500/50 transition-all duration-500 hover:scale-110 hover:rotate-3 animate-bounce">
                    <span class="material-icons text-white text-4xl">pending_actions</span>
                </div>

                <!-- Enhanced Title -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-white mb-4 sm:mb-6 leading-tight drop-shadow-2xl">
                    <span class="inline-block hover:scale-105 transition-transform duration-300">Cursos</span>
                    <br>
                    <span class="inline-block hover:scale-105 transition-transform duration-300 delay-100">Pendientes</span>
                </h1>

                <!-- Enhanced Subtitle -->
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-white/90 max-w-2xl sm:max-w-3xl mx-auto leading-relaxed font-medium drop-shadow-lg px-4">
                    <span class="inline-block hover:text-white transition-colors duration-300">Revisa y aprueba</span>
                    <br>
                    <span class="inline-block hover:text-white transition-colors duration-300 delay-100">los cursos creados por los creadores de contenido</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-8 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800 rounded-2xl">
                <div class="flex items-center">
                    <span class="material-icons text-green-600 dark:text-green-400 mr-3">check_circle</span>
                    <p class="text-green-800 dark:text-green-200 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Enhanced Courses Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($cursos as $curso)
                <div class="group relative bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-2xl sm:rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-700 overflow-hidden border border-gray-200/60 dark:border-slate-700/60 hover:border-yellow-400/60 dark:hover:border-yellow-500/60 hover:-translate-y-2 sm:hover:-translate-y-3 hover:scale-105 transform">
                    <!-- Enhanced Course Image -->
                    <div class="relative h-48 sm:h-56 md:h-64 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 flex items-center justify-center overflow-hidden">
                        @if($curso->url_imagen)
                            <img src="{{ Storage::url($curso->url_imagen) }}" alt="{{ $curso->titulo }}" class="max-w-full max-h-full object-contain transition-all duration-700 group-hover:scale-110 group-hover:rotate-2">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-yellow-500 via-orange-600 to-red-600 flex items-center justify-center group-hover:from-yellow-400 group-hover:via-orange-500 group-hover:to-red-500 transition-all duration-500">
                                <span class="material-icons text-white text-7xl opacity-90 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">pending_actions</span>
                            </div>
                        @endif

                        <!-- Enhanced Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Floating Elements -->
                        <div class="absolute top-2 right-2 w-2 h-2 bg-yellow-400 rounded-full animate-ping opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute bottom-2 left-2 w-1 h-1 bg-orange-400 rounded-full animate-ping delay-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Enhanced Status Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-2xl backdrop-blur-xl shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:rotate-3 bg-gradient-to-r from-yellow-500 to-orange-600 text-white shadow-yellow-500/30">
                                <span class="material-icons text-sm mr-2">schedule</span>
                                Pendiente
                            </span>
                        </div>

                        <!-- Enhanced Level Badge -->
                        <div class="absolute top-4 left-4 hidden sm:block">
                            <span class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-2xl backdrop-blur-xl shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:-rotate-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-blue-500/30">
                                <span class="material-icons text-sm mr-2">
                                    @if($curso->nivel === 'principiante') trending_up
                                    @elseif($curso->nivel === 'intermedio') trending_flat
                                    @else trending_down
                                    @endif
                                </span>
                                {{ ucfirst($curso->nivel) }}
                            </span>
                        </div>
                    </div>

                    <!-- Enhanced Course Content -->
                    <div class="p-3 sm:p-4 md:p-6 lg:p-8">
                        <!-- Enhanced Price and Duration -->
                        <div class="flex items-center justify-between mb-3 sm:mb-4 md:mb-6">
                            <div class="group/price relative">
                                <span class="inline-flex items-center px-1 sm:px-2 md:px-3 lg:px-4 py-1 sm:py-2 text-xs font-bold rounded-lg sm:rounded-xl md:rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-500/30 group-hover/price:scale-110 group-hover/price:rotate-3 transition-all duration-300">
                                    <span class="material-icons text-xs mr-1">attach_money</span>
                                ${{ number_format($curso->precio, 2) }}
                            </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg sm:rounded-xl md:rounded-2xl blur opacity-0 group-hover/price:opacity-50 transition-opacity duration-300"></div>
                            </div>
                            @if($curso->duracion_horas)
                                <div class="flex items-center px-1 sm:px-2 md:px-3 py-1 sm:py-2 bg-gradient-to-r from-orange-100 to-red-100 dark:from-orange-900/30 dark:to-red-900/30 rounded-md sm:rounded-lg md:rounded-xl border border-orange-200/50 dark:border-orange-700/50">
                                    <span class="material-icons text-orange-600 dark:text-orange-400 text-xs mr-1">schedule</span>
                                    <span class="text-xs font-semibold text-orange-700 dark:text-orange-300">{{ $curso->duracion_horas }}h</span>
                                </div>
                            @endif
                        </div>

                        <!-- Enhanced Title and Description -->
                        <h3 class="text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl font-black text-gray-900 dark:text-white mb-3 sm:mb-3 md:mb-4 line-clamp-2 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-yellow-600 group-hover:to-orange-600 group-hover:bg-clip-text transition-all duration-500 leading-tight">
                            {{ $curso->titulo }}
                        </h3>

                        @if($curso->descripcion)
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 dark:text-gray-400 mb-3 sm:mb-4 md:mb-6 line-clamp-2 sm:line-clamp-3 leading-relaxed group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                                {{ Str::limit($curso->descripcion, 100) }}
                            </p>
                        @endif

                        <!-- Enhanced Creator Info -->
                        <div class="flex items-center px-1 sm:px-2 md:px-3 py-1 sm:py-2 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-md sm:rounded-lg md:rounded-xl border border-blue-200/50 dark:border-blue-700/50 mb-4 sm:mb-4 md:mb-6 lg:mb-8">
                            <span class="material-icons text-blue-600 dark:text-blue-400 text-xs mr-1">person</span>
                            <span class="font-semibold text-blue-700 dark:text-blue-300 truncate">{{ $curso->creador->name }} {{ $curso->creador->apellido_paterno }}</span>
                        </div>

                        <!-- Enhanced Actions -->
                        <div class="flex items-center justify-between pt-8 border-t border-gradient-to-r from-gray-200/40 via-gray-300/60 to-gray-200/40 dark:from-slate-700/40 dark:via-slate-600/60 dark:to-slate-700/40">
                            <div class="flex space-x-4">
                                <!-- Aprobar -->
                                <form method="POST" action="{{ route('admin.cursos.aprobar', $curso) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="group/approve relative inline-flex items-center justify-center w-14 h-14 rounded-3xl bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 backdrop-blur-xl border border-green-300/50 dark:border-green-600/50 hover:border-green-500 dark:hover:border-green-400 hover:bg-gradient-to-br hover:from-green-500 hover:to-emerald-600 text-green-600 dark:text-green-400 hover:text-white hover:scale-110 hover:-translate-y-1 hover:shadow-2xl hover:shadow-green-500/40 transition-all duration-500 ease-out" title="Aprobar Curso">
                                        <span class="material-icons text-xs transform group-hover/approve:scale-125 group-hover/approve:-rotate-6 transition-all duration-500">check_circle</span>
                                        <div class="absolute inset-0 rounded-lg bg-gradient-to-br from-green-500/20 to-emerald-600/20 opacity-0 group-hover/approve:opacity-100 transition-opacity duration-500"></div>
                                    </button>
                                </form>

                                <!-- Rechazar -->
                                <button onclick="openRejectModal({{ $curso->id }}, '{{ $curso->titulo }}')" class="group/reject relative inline-flex items-center justify-center w-14 h-14 rounded-3xl bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 backdrop-blur-xl border border-red-300/50 dark:border-red-600/50 hover:border-red-500 dark:hover:border-red-400 hover:bg-gradient-to-br hover:from-red-500 hover:to-pink-600 text-red-600 dark:text-red-400 hover:text-white hover:scale-110 hover:-translate-y-1 hover:shadow-2xl hover:shadow-red-500/40 transition-all duration-500 ease-out" title="Rechazar Curso">
                                    <span class="material-icons text-xs transform group-hover/reject:scale-125 group-hover/reject:-rotate-6 transition-all duration-500">cancel</span>
                                    <div class="absolute inset-0 rounded-lg bg-gradient-to-br from-red-500/20 to-pink-600/20 opacity-0 group-hover/reject:opacity-100 transition-opacity duration-500"></div>
                                </button>

                                <!-- Ver Detalles -->
                                <a href="{{ route('admin.cursos.show', $curso) }}" class="group/view relative inline-flex items-center justify-center w-14 h-14 rounded-3xl bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 backdrop-blur-xl border border-blue-300/50 dark:border-blue-600/50 hover:border-blue-500 dark:hover:border-blue-400 hover:bg-gradient-to-br hover:from-blue-500 hover:to-indigo-600 text-blue-600 dark:text-blue-400 hover:text-white hover:scale-110 hover:-translate-y-1 hover:shadow-2xl hover:shadow-blue-500/40 transition-all duration-500 ease-out" title="Ver Detalles">
                                    <span class="material-icons text-xs transform group-hover/view:scale-125 group-hover/view:-rotate-6 transition-all duration-500">visibility</span>
                                    <div class="absolute inset-0 rounded-lg bg-gradient-to-br from-blue-500/20 to-indigo-600/20 opacity-0 group-hover/view:opacity-100 transition-opacity duration-500"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="text-center py-24">
                        <!-- Enhanced Empty State -->
                        <div class="relative mb-12">
                            <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-gray-100 via-yellow-50 to-orange-50 dark:from-gray-800 dark:via-yellow-900/20 dark:to-orange-900/20 rounded-4xl mb-8 shadow-2xl border border-gray-200/50 dark:border-gray-700/50 animate-pulse">
                                <span class="material-icons text-6xl text-gray-400 dark:text-gray-600 animate-bounce">pending_actions</span>
                        </div>
                            <!-- Floating Elements -->
                            <div class="absolute -top-4 -right-4 w-4 h-4 bg-yellow-400 rounded-full animate-ping"></div>
                            <div class="absolute -bottom-4 -left-4 w-3 h-3 bg-orange-400 rounded-full animate-ping delay-500"></div>
                            <div class="absolute top-1/2 -right-8 w-2 h-2 bg-red-400 rounded-full animate-ping delay-1000"></div>
                        </div>

                        <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-4 bg-gradient-to-r from-gray-900 via-yellow-900 to-orange-900 dark:from-white dark:via-yellow-100 dark:to-orange-100 bg-clip-text text-transparent">
                            ¡No hay cursos pendientes!
                        </h3>
                        <p class="text-xl text-gray-600 dark:text-gray-400 mb-12 max-w-lg mx-auto leading-relaxed">
                            Todos los cursos han sido revisados y aprobados.
                            <span class="font-semibold text-yellow-600 dark:text-yellow-400">¡Excelente trabajo!</span>
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Enhanced Pagination -->
        @if($cursos->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-3xl p-6 shadow-2xl border border-gray-200/60 dark:border-slate-700/60 hover:shadow-3xl transition-all duration-300">
                    {{ $cursos->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Modal para Rechazar Curso -->
<div id="rejectModal" class="fixed inset-0 bg-black/80 backdrop-blur-xl overflow-y-auto h-full w-full hidden z-[999999] transition-all duration-500 ease-out">
    <div class="relative top-10 mx-auto p-0 w-11/12 max-w-2xl rounded-[28px] shadow-[0_20px_80px_rgba(0,0,0,0.45)] bg-gradient-to-br from-slate-900/92 to-slate-800/92 border border-white/10 ring-1 ring-white/10 backdrop-blur-2xl transform transition-all duration-500 ease-out scale-95 opacity-0" id="rejectModalContent">
        <!-- Header -->
        <div class="relative px-6 py-5 border-b border-white/10">
            <div class="absolute inset-0 rounded-t-[28px] bg-gradient-to-r from-red-500/10 via-pink-500/10 to-purple-500/10"></div>
            <div class="relative flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-2xl bg-gradient-to-br from-red-500 to-pink-600 text-white shadow-lg shadow-red-500/25">
                        <span class="material-icons text-xl">cancel</span>
                    </div>
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-white tracking-tight">Rechazar Curso</h3>
                        <p class="text-[11px] text-slate-300/80">Envía un motivo claro. Se notificará al creador.</p>
                    </div>
                </div>
                <button type="button" onclick="closeRejectModal()" class="group relative inline-flex items-center justify-center w-9 h-9 rounded-xl border border-white/10 bg-white/5 hover:bg-white/10 text-slate-200 hover:text-white transition-all duration-200">
                    <span class="material-icons text-base">close</span>
                    <span class="absolute -top-7 text-[10px] px-2 py-0.5 rounded-md bg-white/10 border border-white/10 text-slate-200 opacity-0 group-hover:opacity-100 transition-opacity">Cerrar</span>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="px-6 py-5 space-y-5">
            <!-- Curso resumen -->
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <div class="flex items-center gap-2 text-[11px] font-semibold text-slate-200 mb-1">
                    <span class="material-icons text-[13px] text-amber-300">school</span>
                    Curso a rechazar
                </div>
                <div id="rejectCourseTitle" class="text-sm text-slate-100 font-medium">—</div>
                <div class="mt-2 flex items-center gap-2 text-[10.5px]">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-red-500/15 text-red-300 border border-red-500/25">
                        <span class="material-icons text-[12px] mr-1">report</span> Acción crítica
                    </span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-slate-500/15 text-slate-300 border border-slate-500/25">
                        <span class="material-icons text-[12px] mr-1">history</span> Registro de auditoría
                    </span>
                </div>
            </div>

            <!-- Formulario -->
            <form id="rejectForm" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="motivo_rechazo" class="block text-[11px] font-semibold text-slate-200 mb-2">Motivo del rechazo <span class="text-red-400">*</span></label>
                    <div class="relative group">
                        <span class="material-icons text-slate-400/70 text-[16px] absolute left-3 top-2.5">edit</span>
                        <textarea id="motivo_rechazo" name="motivo_rechazo" rows="4" required
                            class="w-full pl-10 pr-3 py-2.5 text-[13px] leading-5 rounded-xl border border-white/10 bg-white/5 text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-red-500/40 focus:border-red-400/40 transition-shadow"
                            placeholder="Explica por qué se rechaza este curso... (mínimo 10 palabras)"></textarea>
                    </div>
                    <div class="mt-2 text-[10.5px] text-slate-400">Este motivo quedará registrado y será visible para el creador.</div>
                </div>

                <div class="pt-3 flex items-center justify-between">
                    <div class="hidden sm:flex items-center gap-2 text-[10.5px] text-slate-400">
                        <span class="material-icons text-[12px]">info</span>
                        La acción es reversible si cambias de decisión.
                    </div>
                    <div class="flex gap-2">
                        <button type="button" onclick="closeRejectModal()" class="px-4 py-2.5 rounded-xl border border-white/10 bg-white/5 text-slate-200 hover:bg-white/10 transition-colors text-[12.5px] inline-flex items-center">
                            <span class="material-icons text-[14px] mr-1">close</span>
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-red-600 to-pink-600 text-white hover:from-red-500 hover:to-pink-500 border border-white/10 shadow-lg shadow-red-600/20 transition-colors text-[12.5px] inline-flex items-center">
                            <span class="material-icons text-[14px] mr-1">send</span>
                            Rechazar Curso
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer decor -->
        <div class="h-[10px] rounded-b-[28px] bg-gradient-to-r from-red-500/20 via-pink-500/20 to-purple-500/20 border-t border-white/10"></div>
    </div>
</div>

<script>
function openRejectModal(cursoId, cursoTitulo) {
    const modal = document.getElementById('rejectModal');
    const form = document.getElementById('rejectForm');
    const content = document.getElementById('rejectModalContent');
    const titleEl = document.getElementById('rejectCourseTitle');

    form.action = `/admin/cursos/${cursoId}/rechazar`;
    if (titleEl) titleEl.textContent = cursoTitulo || 'Curso sin título';

    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
        content.style.transform = 'scale(1)';
        content.style.opacity = '1';
    });
}

function closeRejectModal() {
    const modal = document.getElementById('rejectModal');
    const content = document.getElementById('rejectModalContent');
    content.style.transform = 'scale(0.95)';
    content.style.opacity = '0';
    setTimeout(() => modal.classList.add('hidden'), 220);
}

// Cerrar con click fuera y tecla ESC
document.addEventListener('click', function(e) {
    const modal = document.getElementById('rejectModal');
    if (e.target === modal) closeRejectModal();
});
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('rejectModal');
    if (!modal.classList.contains('hidden') && e.key === 'Escape') closeRejectModal();
});
</script>
@endsection

