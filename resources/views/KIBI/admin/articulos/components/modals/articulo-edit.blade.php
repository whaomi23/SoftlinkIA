<!-- Modal para Editar Artículo KIBI -->
<div id="editModal"
    class="fixed inset-0 bg-black bg-opacity-60 overflow-y-auto h-full w-full hidden z-[999999] transition-all duration-300 ease-in-out backdrop-blur-sm">
    <div class="relative top-10 mx-auto p-0 border-0 w-11/12 max-w-5xl shadow-2xl rounded-2xl bg-white transform transition-all duration-300 ease-in-out scale-95 opacity-0 overflow-hidden"
        id="editModalContent">
        <!-- Header con gradiente -->
        <div class="bg-gradient-to-r from-kibi-primary via-kibi-accent to-kibi-secondary p-6 text-white relative">
            <div class="absolute inset-0 bg-black bg-opacity-10"></div>
            <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-white bg-opacity-20 rounded-xl backdrop-blur-sm">
                        <span class="material-icons text-2xl">edit</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">Editar Artículo KIBI</h3>
                        <p class="text-white/80 text-sm">Modifica la información de tu artículo KIBI</p>
                    </div>
                </div>
                <button onclick="closeEditModal()"
                    class="p-3 text-white hover:bg-white hover:bg-opacity-20 rounded-xl transition-all duration-200 hover:scale-110 backdrop-blur-sm">
                    <span class="material-icons text-2xl">close</span>
                </button>
            </div>
        </div>

        <!-- Contenido del formulario -->
        <div class="p-8">

            <form id="editForm" method="POST" enctype="multipart/form-data" onsubmit="submitEditForm(event)" action="">
                @csrf
                @method('PUT')
                <input type="hidden" id="editFormAction" name="form_action" value="">

                <!-- Sección de Información Básica -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-kibi-primary/20 rounded-lg mr-3">
                            <span class="material-icons text-kibi-primary">info</span>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-800">Información Básica</h4>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Título -->
                        <div class="lg:col-span-2">
                            <label for="edit_titulo"
                                class="flex items-center text-sm font-semibold text-slate-700 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-kibi-primary w-5 h-5 flex items-center justify-center">title</span>
                                <span class="flex-1">Título del Artículo KIBI *</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="edit_titulo" name="titulo"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-kibi-primary focus:border-kibi-primary bg-white text-slate-700 transition-all duration-200 hover:border-gray-300"
                                    placeholder="Escribe un título atractivo para tu artículo KIBI" required>
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">edit</span>
                            </div>
                        </div>

                        <!-- Subtítulo -->
                        <div class="lg:col-span-2">
                            <label for="edit_subtitulo"
                                class="flex items-center text-sm font-semibold text-slate-700 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-kibi-primary w-5 h-5 flex items-center justify-center">subtitles</span>
                                <span>Subtítulo (Opcional)</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="edit_subtitulo" name="subtitulo"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-kibi-primary focus:border-kibi-primary bg-white text-slate-700 transition-all duration-200 hover:border-gray-300"
                                    placeholder="Añade un subtítulo descriptivo">
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">description</span>
                            </div>
                        </div>

                        <!-- Nivel de Dificultad -->
                        <div>
                            <label for="edit_nivel_dificultad"
                                class="flex items-center text-sm font-semibold text-slate-700 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-kibi-highlight w-5 h-5 flex items-center justify-center">trending_up</span>
                                <span class="flex-1">Nivel de Dificultad *</span>
                            </label>
                            <div class="relative">
                                <select id="edit_nivel_dificultad" name="nivel_dificultad"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-kibi-highlight focus:border-kibi-highlight bg-white text-slate-700 transition-all duration-200 hover:border-gray-300 appearance-none cursor-pointer"
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
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">trending_up</span>
                            </div>
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="edit_status"
                                class="flex items-center text-sm font-semibold text-slate-700 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-kibi-secondary w-5 h-5 flex items-center justify-center">visibility</span>
                                <span class="flex-1">Estado *</span>
                            </label>
                            <div class="relative">
                                <select id="edit_status" name="status"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-kibi-secondary focus:border-kibi-secondary bg-white text-slate-700 transition-all duration-200 hover:border-gray-300 appearance-none cursor-pointer"
                                    required>
                                    <option value="">Selecciona el estado</option>
                                    <option value="borrador">📝 Borrador</option>
                                    <option value="publicado">🌐 Publicado</option>
                                    <option value="archivado">📦 Archivado</option>
                                </select>
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">visibility</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Categorías -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-kibi-secondary/20 rounded-lg mr-3">
                            <span class="material-icons text-kibi-secondary">folder</span>
                                    </div>
                        <h4 class="text-lg font-semibold text-slate-800">Categorías</h4>
                                </div>

                    <div class="space-y-6">
                        <!-- Label -->
                        <div class="flex items-center">
                                <span
                                class="material-icons text-base mr-3 text-kibi-secondary w-6 h-6 flex items-center justify-center bg-kibi-secondary/10 rounded-lg">category</span>
                            <label class="text-sm font-semibold text-slate-700">Categorías del Artículo *</label>
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
                                           id="edit_cat_{{ $loop->index }}"
                                           class="absolute opacity-0 pointer-events-none">
                                    <label for="edit_cat_{{ $loop->index }}" 
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
                        <div id="edit_selected_categories" class="hidden">
                            <div class="flex items-center mb-2">
                                <span class="material-icons text-sm mr-2 text-kibi-secondary">check_circle</span>
                                <span class="text-sm font-semibold text-slate-700">Seleccionadas:</span>
                            </div>
                            <div id="edit_selected_tags" class="flex flex-wrap gap-2"></div>
                        </div>
                                </div>
                            </div>

                <!-- Sección de Imágenes -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-kibi-secondary/20 rounded-lg mr-3">
                            <span class="material-icons text-kibi-secondary">image</span>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-800">Imágenes</h4>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Imagen Principal -->
                        <div>
                            <label for="edit_url_imagen"
                                class="flex items-center text-sm font-semibold text-slate-700 mb-3">
                                <span
                                    class="material-icons text-base mr-2 text-kibi-secondary">image</span>
                                <span>Nueva Imagen Principal</span>
                            </label>
                            <div class="relative">
                                <input type="file" id="edit_url_imagen" name="url_imagen" accept="image/*"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-kibi-secondary focus:border-kibi-secondary bg-white text-slate-700 transition-all duration-200 hover:border-gray-300"
                                    onchange="previewImage(this, 'edit_banner_preview')">
                            </div>
                            
                            <!-- Preview de imagen -->
                            <div id="edit_banner_preview" class="mt-4 hidden">
                                <div class="relative">
                                    <img src="" alt="Preview" class="w-full h-48 object-cover rounded-xl border-2 border-gray-200">
                                    <button type="button" onclick="removeBannerPreview('edit_banner_preview', 'edit_url_imagen')"
                                        class="absolute top-2 right-2 p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors">
                                        <span class="material-icons text-sm">close</span>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Opción para eliminar imagen existente -->
                            <div id="edit_remove_banner_option" class="mt-4 hidden">
                                <label class="flex items-center p-3 bg-red-50 border-2 border-red-200 rounded-xl cursor-pointer hover:bg-red-100 transition-colors">
                                    <input type="checkbox" name="remove_banner" value="1" class="sr-only">
                                    <div class="flex items-center w-full">
                                        <div class="w-5 h-5 border-2 border-red-300 rounded mr-3 flex items-center justify-center transition-all duration-300">
                                            <span class="material-icons text-red-600 text-sm opacity-0 transition-opacity duration-300">check</span>
                                        </div>
                                        <span class="text-sm font-medium text-red-700">
                                            Eliminar imagen banner actual
                                        </span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- URL Banner -->
                        <div>
                            <label for="edit_url_imagen_banner"
                                class="flex items-center text-sm font-semibold text-slate-700 mb-3">
                                <span
                                    class="material-icons text-base mr-2 text-kibi-accent">link</span>
                                <span>URL Banner (Opcional)</span>
                            </label>
                            <div class="relative">
                                <input type="url" id="edit_url_imagen_banner" name="url_imagen_banner"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-kibi-accent focus:border-kibi-accent bg-white text-slate-700 transition-all duration-200 hover:border-gray-300"
                                    placeholder="https://ejemplo.com/imagen.jpg">
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">link</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Contenido -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-kibi-primary/20 rounded-lg mr-3">
                            <span class="material-icons text-kibi-primary">article</span>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-800">Contenido del Artículo</h4>
                    </div>

                    <div class="relative">
                        <!-- Label -->
                        <label for="edit_contenido"
                            class="flex items-center text-sm font-semibold text-slate-700 mb-3">
                            <span
                                class="material-icons text-base mr-2 text-kibi-primary flex items-center">edit_note</span>
                            <span>Contenido Principal</span>
                        </label>

                        <!-- Editor Summernote -->
                        <div class="relative">
                            <div id="edit_contenido"
                                class="w-full min-h-[300px] border-2 border-gray-200 rounded-xl focus-within:ring-2 focus-within:ring-kibi-primary focus-within:border-kibi-primary bg-white text-slate-700 transition-all duration-200 hover:border-gray-300">
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="mt-2 text-xs text-slate-500 flex items-center">
                            <span class="material-icons text-sm mr-1">info</span>
                            Editor de texto enriquecido con formato completo
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <div class="flex items-center text-sm text-slate-500">
                        <span class="material-icons text-sm mr-2">info</span>
                        Los campos marcados con * son obligatorios
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="button" onclick="closeEditModal()"
                            class="px-8 py-3 border-2 border-gray-300 text-slate-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200 hover:scale-105 hover:border-gray-400">
                            <span class="material-icons mr-2 text-sm">close</span>
                            Cancelar
                        </button>
                        <button type="submit" id="editSubmitBtn"
                            class="group relative px-8 py-3 bg-gradient-to-r from-kibi-primary via-kibi-accent to-kibi-secondary text-white font-semibold rounded-xl hover:from-kibi-primary/90 hover:via-kibi-accent/90 hover:to-kibi-secondary/90 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-kibi-primary/30 transform hover:-translate-y-1">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-kibi-primary via-kibi-accent to-kibi-secondary rounded-xl blur opacity-75 group-hover:opacity-100 transition-opacity">
                            </div>
                            <span class="material-icons mr-2 text-sm relative z-10">save</span>
                            <span class="relative z-10">Actualizar Artículo KIBI</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
