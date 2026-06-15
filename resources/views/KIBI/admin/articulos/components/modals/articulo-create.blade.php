<!-- Modal para Crear Artículo KIBI -->
<div id="createModal"
    class="fixed inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/70 to-slate-900/80 overflow-y-auto h-full w-full hidden z-[999999] transition-all duration-500 ease-out backdrop-blur-md">
    <div class="relative top-8 mx-auto p-0 border-0 w-11/12 max-w-6xl shadow-2xl rounded-3xl bg-white/95 backdrop-blur-xl transform transition-all duration-500 ease-out scale-90 opacity-0 overflow-hidden border border-white/20"
        id="createModalContent">
        
        <!-- Header con gradiente mejorado -->
        <div class="relative bg-gradient-to-br from-kibi-primary via-kibi-accent to-kibi-secondary p-8 text-white overflow-hidden">
            <!-- Patrón de fondo -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full -translate-y-48 translate-x-48"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full translate-y-32 -translate-x-32"></div>
            
            <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="relative p-4 bg-white/20 rounded-2xl backdrop-blur-sm border border-white/30 shadow-lg">
                        <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent rounded-2xl"></div>
                        <span class="material-icons text-3xl relative z-10">add_circle</span>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold mb-2 tracking-tight">Crear Nuevo Artículo KIBI</h3>
                        <p class="text-white/90 text-base font-medium">Completa la información para publicar tu artículo KIBI</p>
                    </div>
                </div>
                <button onclick="closeCreateModal()"
                    class="group relative p-4 text-white hover:bg-white/20 rounded-2xl transition-all duration-300 hover:scale-110 backdrop-blur-sm border border-white/20 hover:border-white/40">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <span class="material-icons text-2xl relative z-10">close</span>
                </button>
            </div>
        </div>

        <!-- Contenido del formulario -->
        <div class="p-10 bg-gradient-to-br from-slate-50/50 to-white/80 backdrop-blur-sm">
            <form id="createForm" action="{{ route('kibi.articulos.store') }}" method="POST"
                enctype="multipart/form-data" onsubmit="submitCreateForm(event)">
                @csrf

                <!-- Sección de Información Básica -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
                        <div class="relative p-3 bg-gradient-to-br from-kibi-primary/20 to-kibi-primary/10 rounded-xl mr-4 shadow-lg border border-kibi-primary/20">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent rounded-xl"></div>
                            <span class="material-icons text-kibi-primary text-xl relative z-10">info</span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 tracking-tight">Información Básica</h4>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Título -->
                        <div class="lg:col-span-2">
                            <label for="create_titulo"
                                class="flex items-center text-sm font-bold text-slate-700 mb-4 h-6">
                                <span
                                    class="material-icons text-base mr-3 text-kibi-primary w-6 h-6 flex items-center justify-center bg-kibi-primary/10 rounded-lg">title</span>
                                <span class="flex-1">Título del Artículo KIBI *</span>
                            </label>
                            <div class="relative group">
                                <input type="text" id="create_titulo" name="titulo"
                                    class="w-full px-5 py-4 pl-14 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-kibi-primary/20 focus:border-kibi-primary bg-white/80 backdrop-blur-sm text-slate-700 transition-all duration-300 hover:border-gray-300 hover:bg-white hover:shadow-lg group-hover:shadow-md"
                                    placeholder="Escribe un título atractivo para tu artículo KIBI" required>
                                <span
                                    class="absolute left-5 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 group-hover:text-kibi-primary transition-colors duration-300">edit</span>
                            </div>
                        </div>

                        <!-- Subtítulo -->
                        <div class="lg:col-span-2">
                            <label for="create_subtitulo"
                                class="flex items-center text-sm font-bold text-slate-700 mb-4 h-6">
                                <span
                                    class="material-icons text-base mr-3 text-kibi-accent w-6 h-6 flex items-center justify-center bg-kibi-accent/10 rounded-lg">subtitles</span>
                                <span>Subtítulo (Opcional)</span>
                            </label>
                            <div class="relative group">
                                <input type="text" id="create_subtitulo" name="subtitulo"
                                    class="w-full px-5 py-4 pl-14 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-kibi-accent/20 focus:border-kibi-accent bg-white/80 backdrop-blur-sm text-slate-700 transition-all duration-300 hover:border-gray-300 hover:bg-white hover:shadow-lg group-hover:shadow-md"
                                    placeholder="Añade un subtítulo descriptivo">
                                <span
                                    class="absolute left-5 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 group-hover:text-kibi-accent transition-colors duration-300">description</span>
                            </div>
                        </div>

                        <!-- Nivel de Dificultad -->
                        <div>
                            <label for="create_nivel_dificultad"
                                class="flex items-center text-sm font-bold text-slate-700 mb-4 h-6">
                                <span
                                    class="material-icons text-base mr-3 text-kibi-highlight w-6 h-6 flex items-center justify-center bg-kibi-highlight/10 rounded-lg">trending_up</span>
                                <span class="flex-1">Nivel de Dificultad *</span>
                            </label>
                            <div class="relative group">
                                <select id="create_nivel_dificultad" name="nivel_dificultad"
                                    class="w-full px-5 py-4 pl-14 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-kibi-highlight/20 focus:border-kibi-highlight bg-white/80 backdrop-blur-sm text-slate-700 transition-all duration-300 hover:border-gray-300 hover:bg-white hover:shadow-lg group-hover:shadow-md appearance-none cursor-pointer"
                                    required>
                                    <option value="">Selecciona el nivel de dificultad</option>
                                    <option value="Básico / Introductorio">🟢 Básico / Introductorio</option>
                                    <option value="Fácil">🟡 Fácil</option>
                                    <option value="Intermedio bajo">🟠 Intermedio bajo</option>
                                    <option value="Intermedio">🔵 Intermedio</option>
                                    <option value="Intermedio alto">🟣 Intermedio alto</option>
                                    <option value="Avanzado">🟤 Avanzado</option>
                                    <option value="Experto">🔴 Experto</option>
                                    <option value="Investigación / Académico">📚 Investigación / Académico</option>
                                    <option value="Crítico / Analítico">🔍 Crítico / Analítico</option>
                                    <option value="Práctico / Aplicado">⚙️ Práctico / Aplicado</option>
                                </select>
                                <span
                                    class="absolute left-5 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 group-hover:text-kibi-highlight transition-colors duration-300">trending_up</span>
                            </div>
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="create_status"
                                class="flex items-center text-sm font-bold text-slate-700 mb-4 h-6">
                                <span
                                    class="material-icons text-base mr-3 text-kibi-secondary w-6 h-6 flex items-center justify-center bg-kibi-secondary/10 rounded-lg">visibility</span>
                                <span class="flex-1">Estado *</span>
                            </label>
                            <div class="relative group">
                                <select id="create_status" name="status"
                                    class="w-full px-5 py-4 pl-14 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-kibi-secondary/20 focus:border-kibi-secondary bg-white/80 backdrop-blur-sm text-slate-700 transition-all duration-300 hover:border-gray-300 hover:bg-white hover:shadow-lg group-hover:shadow-md appearance-none cursor-pointer"
                                    required>
                                    <option value="">Selecciona el estado</option>
                                    <option value="borrador">📝 Borrador</option>
                                    <option value="publicado">🌐 Publicado</option>
                                    <option value="archivado">📦 Archivado</option>
                                </select>
                                <span
                                    class="absolute left-5 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 group-hover:text-kibi-secondary transition-colors duration-300">visibility</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Categorías -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
                        <div class="relative p-3 bg-gradient-to-br from-kibi-secondary/20 to-kibi-secondary/10 rounded-xl mr-4 shadow-lg border border-kibi-secondary/20">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent rounded-xl"></div>
                            <span class="material-icons text-kibi-secondary text-xl relative z-10">folder</span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 tracking-tight">Categorías</h4>
                    </div>

                    <div class="space-y-6">
                        <!-- Label -->
                        <div class="flex items-center">
                            <span
                                class="material-icons text-base mr-3 text-kibi-secondary w-6 h-6 flex items-center justify-center bg-kibi-secondary/10 rounded-lg">category</span>
                            <label class="text-sm font-bold text-slate-700">Categorías del Artículo *</label>
                        </div>
                        
                        <!-- Grid de categorías compacto -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3 max-h-72 overflow-y-auto overflow-x-hidden scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent">
                                    @php
                                        $categoriasDisponibles = $categoriasDisponibles ?? [
                                            ['value' => 'Desarrollo Web', 'icon' => 'web', 'color' => 'blue'],
                                            ['value' => 'Inteligencia Artificial', 'icon' => 'psychology', 'color' => 'purple'],
                                            ['value' => 'Ciberseguridad', 'icon' => 'security', 'color' => 'red'],
                                            ['value' => 'Cloud Computing', 'icon' => 'cloud', 'color' => 'cyan'],
                                            ['value' => 'DevOps', 'icon' => 'settings', 'color' => 'green'],
                                            ['value' => 'Mobile Development', 'icon' => 'phone_android', 'color' => 'orange'],
                                            ['value' => 'Data Science', 'icon' => 'analytics', 'color' => 'indigo'],
                                            ['value' => 'Blockchain', 'icon' => 'account_balance', 'color' => 'yellow'],
                                            ['value' => 'IoT', 'icon' => 'devices', 'color' => 'teal'],
                                            ['value' => 'UI/UX Design', 'icon' => 'design_services', 'color' => 'pink'],
                                            ['value' => 'Gaming', 'icon' => 'sports_esports', 'color' => 'lime'],
                                            ['value' => 'Redes', 'icon' => 'router', 'color' => 'amber'],
                                        ];
                                    @endphp
                                    @foreach($categoriasDisponibles as $categoria)
                                <div class="category-chip group relative" data-category="{{ $categoria['value'] }}">
                                            <input type="checkbox" name="categorias[]"
                                                value="{{ $categoria['value'] }}"
                                           id="create_cat_{{ $loop->index }}"
                                           class="absolute opacity-0 pointer-events-none">
                                    <label for="create_cat_{{ $loop->index }}" 
                                           class="flex flex-col items-center justify-between p-3 rounded-xl border-2 border-gray-200 bg-white/80 backdrop-blur-sm cursor-pointer transition-all duration-300 hover:border-{{ $categoria['color'] }}-300 hover:bg-{{ $categoria['color'] }}-50 hover:shadow-md hover:scale-105 group-hover:shadow-sm h-24">
                                        <!-- Icono compacto -->
                                        <div class="p-2 bg-{{ $categoria['color'] }}-100 rounded-lg group-hover:bg-{{ $categoria['color'] }}-200 transition-colors duration-300">
                                            <span class="material-icons text-{{ $categoria['color'] }}-600 text-lg">{{ $categoria['icon'] }}</span>
                                        </div>
                                        <!-- Título compacto -->
                                        <h4 class="text-xs font-bold text-slate-700 text-center leading-tight group-hover:text-{{ $categoria['color'] }}-700 transition-colors duration-300 flex-1 flex items-center justify-center px-1 overflow-hidden">
                                            <span class="truncate">{{ $categoria['value'] }}</span>
                                        </h4>
                                        <!-- Indicador de selección compacto -->
                                        <div class="absolute top-1 right-1 w-5 h-5 bg-{{ $categoria['color'] }}-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform scale-75 group-hover:scale-100">
                                            <span class="material-icons text-white text-xs">check</span>
                                        </div>
                                        </label>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Categorías seleccionadas compactas -->
                        <div id="create_selected_categories" class="hidden">
                            <div class="flex items-center mb-2">
                                <span class="material-icons text-sm mr-2 text-kibi-secondary">check_circle</span>
                                <span class="text-sm font-semibold text-slate-700">Seleccionadas:</span>
                            </div>
                            <div id="create_selected_tags" class="flex flex-wrap gap-2"></div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Imágenes -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
                        <div class="relative p-3 bg-gradient-to-br from-kibi-accent/20 to-kibi-accent/10 rounded-xl mr-4 shadow-lg border border-kibi-accent/20">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent rounded-xl"></div>
                            <span class="material-icons text-kibi-accent text-xl relative z-10">image</span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 tracking-tight">Imágenes</h4>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Imagen Principal -->
                        <div>
                            <label for="create_url_imagen"
                                class="flex items-center text-sm font-bold text-slate-700 mb-4">
                                <span
                                    class="material-icons text-base mr-3 text-kibi-accent w-6 h-6 flex items-center justify-center bg-kibi-accent/10 rounded-lg">image</span>
                                <span>Imagen Principal</span>
                            </label>
                            <div class="relative group">
                                <input type="file" id="create_url_imagen" name="url_imagen" accept="image/*"
                                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-kibi-accent/20 focus:border-kibi-accent bg-white/80 backdrop-blur-sm text-slate-700 transition-all duration-300 hover:border-gray-300 hover:bg-white hover:shadow-lg group-hover:shadow-md">
                            </div>
                        </div>

                        <!-- URL Banner -->
                        <div>
                            <label for="create_url_imagen_banner"
                                class="flex items-center text-sm font-bold text-slate-700 mb-4">
                                <span
                                    class="material-icons text-base mr-3 text-kibi-primary w-6 h-6 flex items-center justify-center bg-kibi-primary/10 rounded-lg">link</span>
                                <span>URL Banner (Opcional)</span>
                            </label>
                            <div class="relative group">
                                <input type="url" id="create_url_imagen_banner" name="url_imagen_banner"
                                    class="w-full px-5 py-4 pl-14 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-kibi-primary/20 focus:border-kibi-primary bg-white/80 backdrop-blur-sm text-slate-700 transition-all duration-300 hover:border-gray-300 hover:bg-white hover:shadow-lg group-hover:shadow-md"
                                    placeholder="https://ejemplo.com/imagen.jpg">
                                <span
                                    class="absolute left-5 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 group-hover:text-kibi-primary transition-colors duration-300">link</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Contenido -->
                <div class="mb-10">
                    <div class="flex items-center mb-8">
                        <div class="relative p-3 bg-gradient-to-br from-kibi-primary/20 to-kibi-primary/10 rounded-xl mr-4 shadow-lg border border-kibi-primary/20">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent rounded-xl"></div>
                            <span class="material-icons text-kibi-primary text-xl relative z-10">article</span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 tracking-tight">Contenido del Artículo</h4>
                    </div>
                    <div class="relative group">
                        <!-- Label -->
                        <label for="create_contenido"
                            class="flex items-center text-sm font-bold text-slate-700 mb-4 h-6">
                            <span
                                class="material-icons text-base mr-3 text-kibi-primary w-6 h-6 flex items-center justify-center bg-kibi-primary/10 rounded-lg">edit_note</span>
                            <span>Contenido del artículo</span>
                        </label>
                        <!-- Editor Summernote -->
                        <div class="relative">
                            <div id="create_contenido"
                                class="w-full min-h-[350px] border-2 border-gray-200 rounded-2xl focus-within:ring-4 focus-within:ring-kibi-primary/20 focus-within:border-kibi-primary bg-white/80 backdrop-blur-sm text-slate-700 transition-all duration-300 hover:border-gray-300 hover:bg-white hover:shadow-lg group-hover:shadow-md">
                            </div>
                        </div>
                        <!-- Info -->
                        <div class="mt-3 text-sm text-slate-500 flex items-center">
                            <span class="material-icons text-base mr-2 text-kibi-primary">info</span>
                            Editor de texto enriquecido con formato completo
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex items-center justify-between pt-8 border-t-2 border-gradient-to-r from-gray-200 via-gray-300 to-gray-200">
                    <div class="flex items-center text-sm text-slate-600 font-medium">
                        <div class="p-2 bg-slate-100 rounded-lg mr-3">
                            <span class="material-icons text-slate-500 text-base">info</span>
                        </div>
                        Los campos marcados con * son obligatorios
                    </div>
                    <div class="flex items-center space-x-6">
                        <button type="button" onclick="closeCreateModal()"
                            class="group relative px-10 py-4 border-2 border-gray-300 text-slate-700 font-bold rounded-2xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 transition-all duration-300 hover:scale-105 hover:border-gray-400 hover:shadow-lg backdrop-blur-sm">
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-50/50 to-gray-100/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <span class="material-icons mr-3 text-lg relative z-10">close</span>
                            <span class="relative z-10">Cancelar</span>
                        </button>
                        <button type="submit" id="createSubmitBtn"
                            class="group relative px-10 py-4 bg-gradient-to-r from-kibi-primary via-kibi-accent to-kibi-secondary text-white font-bold rounded-2xl hover:from-kibi-primary/90 hover:via-kibi-accent/90 hover:to-kibi-secondary/90 transition-all duration-500 hover:scale-110 hover:shadow-2xl hover:shadow-kibi-primary/40 transform hover:-translate-y-2 overflow-hidden">
                            <!-- Efecto de brillo animado -->
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                            <!-- Sombra de fondo -->
                            <div class="absolute inset-0 bg-gradient-to-r from-kibi-primary via-kibi-accent to-kibi-secondary rounded-2xl blur-lg opacity-60 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="material-icons mr-3 text-lg relative z-10">add_circle</span>
                            <span class="relative z-10">Crear Artículo KIBI</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
