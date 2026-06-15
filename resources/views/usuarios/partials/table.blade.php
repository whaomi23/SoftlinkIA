@if($usuarios->count() > 0)
    <div class="overflow-x-auto -mx-4 sm:mx-0">
        <table class="w-full text-white text-xs whitespace-nowrap">
            <thead class="sticky top-0 z-10 backdrop-blur supports-[backdrop-filter]:bg-slate-900/70 bg-slate-900/90">
                <tr class="border-b border-slate-700/60">
                    <th class="text-left py-2 px-2 text-slate-300 font-semibold uppercase text-xs w-16"><i class="fas fa-hashtag mr-1 text-cyan-400"></i>ID</th>
                    <th class="text-left py-2 px-2 text-slate-300 font-semibold uppercase text-xs w-48"><i class="fas fa-user mr-1 text-cyan-400"></i>Usuario</th>
                    <th class="text-left py-2 px-2 text-slate-300 font-semibold uppercase text-xs w-56"><i class="fas fa-envelope mr-1 text-cyan-400"></i>Email</th>
                    <th class="text-left py-2 px-2 text-slate-300 font-semibold uppercase text-xs w-36"><i class="fas fa-user-tag mr-1 text-cyan-400"></i>Tipo</th>
                    <th class="text-left py-2 px-2 text-slate-300 font-semibold uppercase text-xs w-32"><i class="fas fa-toggle-on mr-1 text-cyan-400"></i>Estado</th>
                    <th class="text-left py-2 px-2 text-slate-300 font-semibold uppercase text-xs w-36"><i class="fas fa-check-circle mr-1 text-cyan-400"></i>Verificado</th>
                    <th class="text-left py-2 px-2 text-slate-300 font-semibold uppercase text-xs w-32"><i class="fas fa-calendar-alt mr-1 text-cyan-400"></i>Registro</th>
                    <th class="text-left py-2 px-2 text-slate-300 font-semibold uppercase text-xs w-72"><i class="fas fa-cogs mr-1 text-cyan-400"></i>Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                @foreach($usuarios as $usuario)
                    <tr class="hover:bg-slate-700/50 transition-colors duration-200">
                        <td class="py-2 px-2 text-slate-400 font-mono text-xs"><i class="fas fa-hashtag mr-1 text-cyan-400"></i>{{ $usuario->id }}</td>
                        <td class="py-2 px-2">
                            <div class="flex items-center space-x-2">
                                <div class="w-5 h-5 bg-gradient-to-br from-cyan-500 to-blue-500 rounded flex items-center justify-center text-white font-bold text-xs">
                                    {{ strtoupper(substr($usuario->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="text-white font-semibold text-xs truncate">
                                        {{ $usuario->name }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-2 px-2">
                            <a href="mailto:{{ $usuario->email }}" class="text-cyan-400 hover:text-cyan-300 transition-colors duration-200 text-xs truncate block">
                                {{ $usuario->email }}
                            </a>
                        </td>
                        <td class="py-2 px-2">
                            @if($usuario->tipoUsuario)
                                @if($usuario->isCreador())
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-500/20 text-purple-300 border border-purple-500/30">
                                        <i class="fas fa-user-plus mr-1"></i>
                                        {{ $usuario->tipoUsuario->nombre }}
                                    </span>
                                @elseif($usuario->isAdmin())
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-500/20 text-red-300 border border-red-500/30">
                                        <i class="fas fa-crown mr-1"></i>
                                        {{ $usuario->tipoUsuario->nombre }}
                                    </span>
                                @elseif($usuario->isEstudiante())
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-300 border border-green-500/30">
                                        <i class="fas fa-graduation-cap mr-1"></i>
                                        {{ $usuario->tipoUsuario->nombre }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300 border border-blue-500/30">
                                        <i class="fas fa-user-tag mr-1"></i>
                                        {{ $usuario->tipoUsuario->nombre }}
                                    </span>
                                @endif
                            @else
                                <span class="text-slate-400 text-xs">Sin tipo</span>
                            @endif
                        </td>
                        <td class="py-2 px-2">
                            @if($usuario->status === 'activo')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-300 border border-green-500/30">
                                    <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-1"></div>
                                    Activo
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-500/20 text-red-300 border border-red-500/30">
                                    <div class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1"></div>
                                    Inactivo
                                </span>
                            @endif
                        </td>
                        <td class="py-2 px-2">
                            @if($usuario->verificado)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-300 border border-green-500/30">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Verificado
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-300 border border-yellow-500/30">
                                    <i class="fas fa-clock mr-1"></i>
                                    Pendiente
                                </span>
                            @endif
                        </td>
                        <td class="py-2 px-2">
                            <div class="text-slate-400 text-xs whitespace-nowrap">
                                {{ $usuario->created_at->format('d/m/Y') }}
                            </div>
                        </td>
                        <td class="py-2 px-2">
                            <div class="flex items-center space-x-1">
                                <a href="{{ route('usuarios.show', $usuario) }}"
                                   class="bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-500/30 hover:border-cyan-400/50 text-cyan-300 hover:text-cyan-200 px-2 py-1 rounded text-xs transition-all duration-200 flex items-center"
                                   title="Ver perfil">
                                    <i class="fas fa-eye mr-1"></i>Ver
                                </a>

                                @if(!$usuario->isAdmin())
                                    @if($usuario->isCreador())
                                        <!-- Convertir de creador a usuario normal -->
                                        <button onclick="convertirAUsuario({{ $usuario->id }}, '{{ $usuario->nombreCompleto }}')"
                                                class="bg-orange-500/20 hover:bg-orange-500/30 border border-orange-500/30 hover:border-orange-400/50 text-orange-300 hover:text-orange-200 px-2 py-1 rounded text-xs transition-all duration-200 flex items-center"
                                                title="Convertir a usuario normal">
                                            <i class="fas fa-user-minus mr-1"></i>Usuario
                                        </button>
                                    @else
                                        <!-- Convertir a creador -->
                                        <button onclick="convertirACreador({{ $usuario->id }}, '{{ $usuario->nombreCompleto }}')"
                                                class="bg-purple-500/20 hover:bg-purple-500/30 border border-purple-500/30 hover:border-purple-400/50 text-purple-300 hover:text-purple-200 px-2 py-1 rounded text-xs transition-all duration-200 flex items-center"
                                                title="Convertir a creador de contenido">
                                            <i class="fas fa-user-plus mr-1"></i>Creador
                                        </button>
                                    @endif

                                    <!-- Toggle rápido -->
                                    <button onclick="toggleModoCreador({{ $usuario->id }}, '{{ $usuario->nombreCompleto }}', {{ $usuario->isCreador() ? 'true' : 'false' }})"
                                            class="bg-indigo-500/20 hover:bg-indigo-500/30 border border-indigo-500/30 hover:border-indigo-400/50 text-indigo-300 hover:text-indigo-200 px-2 py-1 rounded text-xs transition-all duration-200 flex items-center"
                                            title="{{ $usuario->isCreador() ? 'Desactivar' : 'Activar' }} modo creador">
                                        <i class="fas fa-toggle-{{ $usuario->isCreador() ? 'on' : 'off' }} mr-1"></i>
                                        {{ $usuario->isCreador() ? 'OFF' : 'ON' }}
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="flex justify-center mt-6 sm:mt-8">
        <div class="bg-slate-800/50 border border-slate-600 rounded-xl sm:rounded-2xl p-3 sm:p-4">
            {{ $usuarios->links() }}
        </div>
    </div>
@else
    <div class="text-center py-12 sm:py-16">
        <div class="w-24 h-24 sm:w-32 sm:h-32 bg-slate-700/50 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 border border-slate-600">
            <i class="fas fa-users text-4xl sm:text-6xl text-slate-400"></i>
        </div>
        <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 sm:mb-4">No hay usuarios registrados</h3>
        <p class="text-slate-400 text-sm sm:text-base lg:text-lg max-w-md mx-auto px-4">
            Aún no se han registrado usuarios en el sistema. Los usuarios aparecerán aquí una vez que se registren.
        </p>
    </div>
@endif

