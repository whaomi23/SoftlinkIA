@extends('layouts.app')

@section('title', 'Mis Cursos - SoftLinkIA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-400/20 to-indigo-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-pink-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-purple-400/10 to-indigo-600/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-600/10 via-indigo-600/10 to-pink-600/10 dark:from-purple-400/5 dark:via-indigo-400/5 dark:to-pink-400/5"></div>
        <div class="relative max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 pt-8 sm:pt-12 lg:pt-16 pb-8 sm:pb-10 lg:pb-12">
            <div class="text-center mb-8 sm:mb-12 lg:mb-16">
                <!-- Animated Icon - Mobile Optimized -->
                <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-gradient-to-r from-purple-500 via-indigo-600 to-pink-600 rounded-2xl sm:rounded-3xl mb-4 sm:mb-6 lg:mb-8 shadow-2xl shadow-purple-500/30 hover:shadow-purple-500/50 transition-all duration-500 hover:scale-110 hover:rotate-3 animate-bounce">
                    <span class="material-icons text-white text-2xl sm:text-3xl lg:text-4xl">create</span>
                </div>

                <!-- Enhanced Title - Mobile Optimized -->
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black text-white mb-3 sm:mb-4 lg:mb-6 leading-tight drop-shadow-2xl px-2">
                    <span class="inline-block hover:scale-105 transition-transform duration-300">Mis</span>
                    <br>
                    <span class="inline-block hover:scale-105 transition-transform duration-300 delay-100">Cursos</span>
                </h1>

                <!-- Enhanced Subtitle - Mobile Optimized -->
                <p class="text-sm sm:text-base md:text-lg lg:text-xl text-white/90 max-w-xl sm:max-w-2xl lg:max-w-3xl mx-auto leading-relaxed font-medium drop-shadow-lg px-3 sm:px-4">
                    <span class="inline-block hover:text-white transition-colors duration-300">Gestiona y crea</span>
                    <br>
                    <span class="inline-block hover:text-white transition-colors duration-300 delay-100">tus cursos de contenido educativo</span>
                </p>
            </div>

            <!-- Enhanced Action Bar - Mobile Optimized -->
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4 sm:gap-6 lg:gap-8 mb-6 sm:mb-8 lg:mb-10 md:mb-12">
                <!-- Enhanced Stats Cards - Mobile Optimized -->
                <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 lg:gap-4 w-full lg:w-auto">
                    <div class="group flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 lg:px-6 py-3 sm:py-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-xl sm:rounded-2xl border border-gray-200/60 dark:border-slate-700/60 shadow-lg hover:shadow-xl hover:shadow-purple-500/20 transition-all duration-300 hover:scale-105 hover:-translate-y-1 flex-1 min-w-0">
                        <div class="p-1.5 sm:p-2 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg sm:rounded-xl group-hover:rotate-12 transition-transform duration-300">
                            <span class="material-icons text-white text-sm sm:text-lg">school</span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">{{ $cursos->total() }}</div>
                            <div class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400 truncate">Total</div>
                        </div>
                    </div>

                    <div class="group flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 lg:px-6 py-3 sm:py-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-xl sm:rounded-2xl border border-gray-200/60 dark:border-slate-700/60 shadow-lg hover:shadow-xl hover:shadow-green-500/20 transition-all duration-300 hover:scale-105 hover:-translate-y-1 flex-1 min-w-0">
                        <div class="p-1.5 sm:p-2 bg-gradient-to-r from-green-500 to-green-600 rounded-lg sm:rounded-xl group-hover:rotate-12 transition-transform duration-300">
                            <span class="material-icons text-white text-sm sm:text-lg">check_circle</span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">{{ $cursos->where('activo', true)->count() }}</div>
                            <div class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400 truncate">Activos</div>
                        </div>
                    </div>

                    <div class="group flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 lg:px-6 py-3 sm:py-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-xl sm:rounded-2xl border border-gray-200/60 dark:border-slate-700/60 shadow-lg hover:shadow-xl hover:shadow-yellow-500/20 transition-all duration-300 hover:scale-105 hover:-translate-y-1 flex-1 min-w-0">
                        <div class="p-1.5 sm:p-2 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg sm:rounded-xl group-hover:rotate-12 transition-transform duration-300">
                            <span class="material-icons text-white text-sm sm:text-lg">schedule</span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">{{ $cursos->where('activo', false)->count() }}</div>
                            <div class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400 truncate">Pendientes</div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Create Button - Mobile Optimized -->
                <a href="{{ route('creador.cursos.create') }}"
                   class="group relative inline-flex items-center px-6 sm:px-8 lg:px-10 py-3 sm:py-4 lg:py-5 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 text-white font-bold rounded-2xl sm:rounded-3xl shadow-2xl shadow-purple-500/30 hover:shadow-2xl hover:shadow-purple-500/50 transition-all duration-500 hover:scale-110 hover:-translate-y-2 transform w-full sm:w-auto">
                    <!-- Animated Background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 rounded-xl sm:rounded-2xl lg:rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <!-- Sparkle Effect -->
                    <div class="absolute -top-1 -right-1 w-2 h-2 sm:w-3 sm:h-3 bg-yellow-400 rounded-full animate-ping"></div>
                    <div class="absolute -bottom-1 -left-1 w-1.5 h-1.5 sm:w-2 sm:h-2 bg-cyan-400 rounded-full animate-ping delay-300"></div>

                    <span class="material-icons mr-2 sm:mr-3 lg:mr-4 relative z-10 text-lg sm:text-xl lg:text-2xl group-hover:rotate-12 transition-transform duration-300">add_circle</span>
                    <span class="button-text relative z-10 text-sm sm:text-base lg:text-lg">Crear Nuevo Curso</span>

                    <!-- Hover Arrow -->
                    <span class="material-icons ml-1 sm:ml-2 relative z-10 text-xs sm:text-sm lg:text-base group-hover:translate-x-1 transition-transform duration-300">arrow_forward</span>
                </a>
            </div>

            <!-- Filters and Search - Mobile Optimized -->
            <div class="bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-2xl sm:rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8">
                <div class="flex flex-col gap-4 lg:gap-6">
                    <!-- Search - Mobile Optimized -->
                    <div class="flex-1">
                        <form method="GET" action="{{ route('creador.cursos.index') }}" class="relative">
                            <div class="relative">
                                <input type="text"
                                       name="busqueda"
                                       value="{{ request('busqueda') }}"
                                       placeholder="Buscar en mis cursos..."
                                       class="w-full pl-10 sm:pl-12 pr-4 py-2.5 sm:py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-xl sm:rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                                <span class="material-icons absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500 text-lg sm:text-xl">search</span>
                            </div>
                        </form>
                    </div>

                    <!-- Filters - Mobile Optimized -->
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <form method="GET" action="{{ route('creador.cursos.index') }}" class="flex flex-col sm:flex-row gap-3 sm:gap-4 w-full">
                            <select name="estado"
                                    class="w-full sm:w-auto px-3 sm:px-4 py-2.5 sm:py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-xl sm:rounded-2xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                                <option value="">Todos los estados</option>
                                <option value="activo" {{ request('estado') === 'activo' ? 'selected' : '' }}>Activos</option>
                                <option value="inactivo" {{ request('estado') === 'inactivo' ? 'selected' : '' }}>Pendientes</option>
                            </select>

                            <select name="categoria_id"
                                    class="w-full sm:w-auto px-3 sm:px-4 py-2.5 sm:py-3 bg-white/80 dark:bg-slate-700/80 border border-gray-200/60 dark:border-slate-600/60 rounded-xl sm:rounded-2xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                                <option value="">Todas las categorías</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit"
                                    class="w-full sm:w-auto px-4 sm:px-6 py-2.5 sm:py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-xl sm:rounded-2xl hover:from-purple-700 hover:to-indigo-700 transition-all duration-300 hover:scale-105 text-sm sm:text-base">
                                <span class="material-icons mr-1 sm:mr-2 text-sm sm:text-base">filter_list</span>
                                Filtrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Grid - Mobile Optimized -->
    <div class="relative max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 pb-12 sm:pb-16">
        @if($cursos->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach($cursos as $curso)
                    <div class="group bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-2xl sm:rounded-3xl border border-gray-200/60 dark:border-slate-700/60 shadow-xl hover:shadow-2xl hover:shadow-purple-500/20 transition-all duration-500 hover:scale-105 hover:-translate-y-2 overflow-hidden">
                        <!-- Course Image - Mobile Optimized -->
                        <div class="relative h-40 sm:h-48 lg:h-56 overflow-hidden">
                            @if($curso->url_imagen)
                                <img src="{{ Storage::url($curso->url_imagen) }}"
                                     alt="{{ $curso->titulo }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-purple-500 via-indigo-600 to-pink-600 flex items-center justify-center">
                                    <span class="material-icons text-white text-4xl sm:text-5xl lg:text-6xl">school</span>
                                </div>
                            @endif

                            <!-- Status Badge - Mobile Optimized -->
                            <div class="absolute top-3 sm:top-4 right-3 sm:right-4">
                                @if($curso->activo)
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-medium bg-green-500/90 text-white border border-green-400/50">
                                        <span class="material-icons text-xs mr-1">check_circle</span>
                                        <span class="hidden sm:inline">Activo</span>
                                        <span class="sm:hidden">✓</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/90 text-white border border-yellow-400/50">
                                        <span class="material-icons text-xs mr-1">schedule</span>
                                        <span class="hidden sm:inline">Pendiente</span>
                                        <span class="sm:hidden">⏳</span>
                                    </span>
                                @endif
                            </div>

                            <!-- Category Badge - Mobile Optimized -->
                            @if($curso->categoria)
                                <div class="absolute top-3 sm:top-4 left-3 sm:left-4">
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-medium bg-purple-500/90 text-white border border-purple-400/50">
                                        <span class="hidden sm:inline">{{ $curso->categoria->nombre }}</span>
                                        <span class="sm:hidden">{{ Str::limit($curso->categoria->nombre, 8) }}</span>
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Course Content - Mobile Optimized -->
                        <div class="p-4 sm:p-6">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-300 line-clamp-2">
                                {{ $curso->titulo }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm mb-3 sm:mb-4 line-clamp-2 sm:line-clamp-3">
                                {{ Str::limit($curso->descripcion, 100) }}
                            </p>

                            <!-- Course Stats - Mobile Optimized -->
                            <div class="flex items-center justify-between text-xs sm:text-sm text-gray-500 dark:text-gray-400 mb-3 sm:mb-4">
                                <div class="flex items-center">
                                    <span class="material-icons text-xs mr-1">schedule</span>
                                    <span class="hidden sm:inline">{{ $curso->duracion_horas ?? 'N/A' }}h</span>
                                    <span class="sm:hidden">{{ $curso->duracion_horas ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="material-icons text-xs mr-1">school</span>
                                    <span class="hidden sm:inline">{{ $curso->niveles->count() }} niveles</span>
                                    <span class="sm:hidden">{{ $curso->niveles->count() }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="material-icons text-xs mr-1">attach_money</span>
                                    <span class="hidden sm:inline">${{ number_format($curso->precio, 0) }}</span>
                                    <span class="sm:hidden">${{ number_format($curso->precio, 0) }}</span>
                                </div>
                            </div>

                            <!-- Actions - Mobile Optimized -->
                            <div class="flex gap-2 sm:gap-3">
                                <a href="{{ route('creador.cursos.show', $curso) }}"
                                   class="flex-1 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold py-2.5 px-3 sm:px-4 rounded-lg sm:rounded-xl hover:from-purple-700 hover:to-indigo-700 transition-all duration-300 hover:scale-105 text-center text-xs sm:text-sm flex items-center justify-center">
                                    <span class="material-icons text-sm sm:text-base mr-1.5">visibility</span>
                                    <span class="hidden sm:inline">Ver</span>
                                    <span class="sm:hidden">Ver</span>
                                </a>
                                <a href="{{ route('creador.cursos.edit', $curso) }}"
                                   class="flex-1 bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-semibold py-2.5 px-3 sm:px-4 rounded-lg sm:rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 hover:scale-105 text-center text-xs sm:text-sm flex items-center justify-center">
                                    <span class="material-icons text-sm sm:text-base mr-1.5">edit</span>
                                    <span class="hidden sm:inline">Editar</span>
                                    <span class="sm:hidden">Edit</span>
                                </a>
                                <button type="button"
                                        onclick="deleteCurso({{ $curso->id }}, '{{ $curso->titulo }}')"
                                        class="flex-1 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold py-2.5 px-3 sm:px-4 rounded-lg sm:rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300 hover:scale-105 text-center text-xs sm:text-sm flex items-center justify-center">
                                    <span class="material-icons text-sm sm:text-base mr-1.5">delete</span>
                                    <span class="hidden sm:inline">Eliminar</span>
                                    <span class="sm:hidden">Del</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination - Mobile Optimized -->
            <div class="mt-8 sm:mt-12 flex justify-center">
                <div class="bg-white/90 dark:bg-slate-800/90 backdrop-blur-xl rounded-xl sm:rounded-2xl border border-gray-200/60 dark:border-slate-700/60 shadow-lg p-3 sm:p-4">
                    {{ $cursos->links() }}
                </div>
            </div>
        @else
            <!-- Empty State - Mobile Optimized -->
            <div class="text-center py-12 sm:py-16 px-4">
                <div class="inline-flex items-center justify-center w-24 h-24 sm:w-32 sm:h-32 bg-gradient-to-r from-purple-500 via-indigo-600 to-pink-600 rounded-full mb-6 sm:mb-8 shadow-2xl shadow-purple-500/30">
                    <span class="material-icons text-white text-4xl sm:text-6xl">school</span>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-3 sm:mb-4">No tienes cursos creados</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm sm:text-base lg:text-lg max-w-md mx-auto mb-6 sm:mb-8">
                    Comienza creando tu primer curso y comparte tu conocimiento con el mundo.
                </p>
                <a href="{{ route('creador.cursos.create') }}"
                   class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-purple-600 via-indigo-600 to-pink-600 text-white font-bold rounded-xl sm:rounded-2xl shadow-2xl shadow-purple-500/30 hover:shadow-purple-500/50 transition-all duration-500 hover:scale-110 hover:-translate-y-2 text-sm sm:text-base">
                    <span class="material-icons mr-2 sm:mr-3 text-lg sm:text-xl">add_circle</span>
                    Crear Mi Primer Curso
                </a>
            </div>
        @endif
    </div>
</div>

<script>
// Función para eliminar curso
function deleteCurso(cursoId, cursoTitulo) {
    // Confirmar eliminación
    if (confirm(`¿Estás seguro de que quieres eliminar el curso "${cursoTitulo}"?\n\nEsta acción eliminará permanentemente:\n• El curso completo\n• Todos los niveles y subniveles\n• Todos los archivos multimedia\n• Todos los recursos\n• Todas las inscripciones de estudiantes\n\nEsta acción NO se puede deshacer.`)) {

        // Crear formulario para enviar DELETE request
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/creador/cursos/${cursoId}`;

        // Agregar token CSRF
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);

        // Agregar método DELETE
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        form.appendChild(methodField);

        // Agregar al DOM y enviar
        document.body.appendChild(form);
        form.submit();
    }
}

// Función para mostrar mensaje de éxito
function showSuccessMessage(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 flex items-center space-x-2';
    toast.innerHTML = `
        <span class="material-icons text-sm">check_circle</span>
        <span class="text-sm font-semibold">${message}</span>
    `;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Función para mostrar mensaje de error
function showErrorMessage(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 flex items-center space-x-2';
    toast.innerHTML = `
        <span class="material-icons text-sm">error</span>
        <span class="text-sm font-semibold">${message}</span>
    `;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 5000);
}

// Mostrar mensaje de éxito si hay parámetro en la URL
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('deleted') === 'success') {
        showSuccessMessage('¡Curso eliminado exitosamente!');
    }
});
</script>
@endsection
