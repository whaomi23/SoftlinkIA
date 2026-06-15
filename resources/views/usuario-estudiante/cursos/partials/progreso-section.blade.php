<!-- Progress by Level Section -->
<div class="relative bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-2xl border border-gray-200/50 dark:border-slate-700/50 shadow-lg shadow-blue-500/5 overflow-hidden animate__animated animate__fadeInLeft mt-6">
    <!-- Gradient background -->
    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 via-indigo-500/5 to-blue-500/5"></div>

    <div class="relative p-6">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
            <span class="material-icons text-purple-600 dark:text-purple-400 mr-2">trending_up</span>
            Progreso por Nivel
        </h3>

        @if($curso->niveles && $curso->niveles->count() > 0)
            <div class="space-y-4">
                @foreach($curso->niveles as $index => $nivel)
                    @php
                        $subnivelesCount = $nivel->subniveles->count();
                        // Obtener subniveles completados por el usuario actual
                        $subnivelesCompletados = \App\Models\ProgresoLeccion::where('usuario_id', auth()->id())
                            ->where('curso_id', $curso->id)
                            ->whereIn('leccion_id', $nivel->subniveles->pluck('id'))
                            ->where('completado', true)
                            ->count();
                        $progresoPorcentaje = $subnivelesCount > 0 ? ($subnivelesCompletados / $subnivelesCount) * 100 : 0;
                    @endphp

                    <div class="bg-gray-50 dark:bg-slate-700/50 rounded-lg p-4 border border-gray-200/50 dark:border-slate-600/50">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                    {{ $index + 1 }}
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $nivel->titulo }}</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $subnivelesCompletados }} de {{ $subnivelesCount }} subniveles completados
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-bold text-purple-600 dark:text-purple-400">
                                    {{ number_format($progresoPorcentaje, 1) }}%
                                </span>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 dark:bg-slate-600 rounded-full h-2.5 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-purple-500 to-indigo-600 rounded-full transition-all duration-500 ease-out relative overflow-hidden"
                                 style="width: {{ $progresoPorcentaje }}%">
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent animate-pulse"></div>
                            </div>
                        </div>

                        <!-- Subniveles breakdown -->
                        @if($subnivelesCount > 0)
                            @php
                                // Obtener IDs de subniveles completados para este nivel
                                $subnivelesCompletadosIds = \App\Models\ProgresoLeccion::where('usuario_id', auth()->id())
                                    ->where('curso_id', $curso->id)
                                    ->whereIn('leccion_id', $nivel->subniveles->pluck('id'))
                                    ->where('completado', true)
                                    ->pluck('leccion_id')
                                    ->toArray();
                            @endphp
                            <div class="mt-3 flex flex-wrap gap-1">
                                @foreach($nivel->subniveles->take(10) as $subnivel)
                                    @php
                                        $estaCompletado = in_array($subnivel->id, $subnivelesCompletadosIds);
                                    @endphp
                                    <div class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold transition-all duration-200
                                        {{ $estaCompletado
                                            ? 'bg-green-500 text-white shadow-lg shadow-green-500/30'
                                            : 'bg-gray-300 dark:bg-slate-600 text-gray-600 dark:text-gray-400' }}">
                                        {{ $subnivel->numero }}
                                    </div>
                                @endforeach
                                @if($subnivelesCount > 10)
                                    <div class="w-6 h-6 rounded-full bg-gray-300 dark:bg-slate-600 text-gray-600 dark:text-gray-400 flex items-center justify-center text-xs font-bold">
                                        +
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach

                <!-- Overall Progress Summary -->
                @php
                    $totalSubniveles = $curso->niveles->sum(function($nivel) { return $nivel->subniveles->count(); });
                    // Obtener total de subniveles completados por el usuario actual
                    $totalCompletados = \App\Models\ProgresoLeccion::where('usuario_id', auth()->id())
                        ->where('curso_id', $curso->id)
                        ->whereIn('leccion_id', $curso->getAllSubniveles()->pluck('id'))
                        ->where('completado', true)
                        ->count();
                    $progresoGeneral = $totalSubniveles > 0 ? ($totalCompletados / $totalSubniveles) * 100 : 0;
                @endphp

                <div class="bg-gradient-to-r from-purple-500/10 to-indigo-500/10 dark:from-purple-500/5 dark:to-indigo-500/5 rounded-lg p-4 border border-purple-200/50 dark:border-purple-700/50">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white flex items-center">
                            <span class="material-icons text-purple-600 dark:text-purple-400 mr-2 text-sm">assessment</span>
                            Progreso General del Curso
                        </h4>
                        <span class="text-lg font-bold text-purple-600 dark:text-purple-400">
                            {{ number_format($progresoGeneral, 1) }}%
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-slate-600 rounded-full h-3 overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-purple-500 to-indigo-600 rounded-full transition-all duration-700 ease-out relative overflow-hidden"
                             style="width: {{ $progresoGeneral }}%">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-pulse"></div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                        {{ $totalCompletados }} de {{ $totalSubniveles }} subniveles completados en total
                    </p>
                </div>
            </div>
        @else
            <div class="text-center py-8">
                <span class="material-icons text-gray-400 text-4xl mb-2">school</span>
                <p class="text-gray-500 dark:text-gray-400">No hay niveles disponibles para mostrar progreso</p>
            </div>
        @endif
    </div>
</div>
