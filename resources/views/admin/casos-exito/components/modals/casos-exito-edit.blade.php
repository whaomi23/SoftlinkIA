<!-- Modal para Editar Caso de Éxito -->
<div id="editModal"
    class="fixed inset-0 bg-black bg-opacity-60 overflow-y-auto h-full w-full hidden z-[999999] transition-all duration-300 ease-in-out backdrop-blur-sm">
    <div class="relative top-10 mx-auto p-0 border-0 w-11/12 max-w-5xl shadow-2xl rounded-2xl bg-white dark:bg-slate-800 transform transition-all duration-300 ease-in-out scale-95 opacity-0 overflow-hidden"
        id="editModalContent">
        <!-- Header con gradiente -->
        <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 p-6 text-white relative">
            <div class="absolute inset-0 bg-black bg-opacity-10"></div>
            <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-white bg-opacity-20 rounded-xl backdrop-blur-sm">
                        <span class="material-icons text-2xl">edit</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">Editar Caso de Éxito</h3>
                        <p class="text-blue-100 text-sm">Modifica la información de tu caso de éxito</p>
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

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="editFormAction" name="form_action" value="">

                <!-- Sección de Información Básica -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-cyan-100 dark:bg-cyan-900/30 rounded-lg mr-3">
                            <span class="material-icons text-cyan-600 dark:text-cyan-400">info</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Información Básica</h4>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Título -->
                        <div class="lg:col-span-2">
                            <label for="edit_titulo"
                                class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-cyan-600 dark:text-cyan-400 w-5 h-5 flex items-center justify-center">title</span>
                                <span class="flex-1">Título del Caso de Éxito *</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="edit_titulo" name="titulo"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                    placeholder="Escribe un título atractivo para tu caso de éxito" required>
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">edit</span>
                            </div>
                        </div>

                        <!-- Subtítulo -->
                        <div class="lg:col-span-2">
                            <label for="edit_subtitulo"
                                class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-cyan-600 dark:text-cyan-400 w-5 h-5 flex items-center justify-center">subtitles</span>
                                <span class="flex-1">Subtítulo (Opcional)</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="edit_subtitulo" name="subtitulo"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                    placeholder="Añade un subtítulo descriptivo">
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">description</span>
                            </div>
                        </div>

                        <!-- Nivel de Dificultad -->
                        <div>
                            <label for="edit_nivel_dificultad"
                                class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-indigo-600 dark:text-indigo-400 w-5 h-5 flex items-center justify-center">trending_up</span>
                                <span class="flex-1">Nivel de Dificultad *</span>
                            </label>
                            <div class="relative">
                                <select id="edit_nivel_dificultad" name="nivel_dificultad"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 appearance-none cursor-pointer"
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
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">school</span>
                                <span
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 pointer-events-none">keyboard_arrow_down</span>
                            </div>
                        </div>

                        <!-- Categorías Múltiples -->
                        <div>
                            <label
                                class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-cyan-600 dark:text-cyan-400 w-5 h-5 flex items-center justify-center">category</span>
                                <span class="flex-1">Categorías *</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">(Selecciona una o más)</span>
                            </label>

                            <!-- Selector de categorías mejorado -->
                            <div class="relative">
                                <div id="edit_categoria_dropdown"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 cursor-pointer bg-white dark:bg-slate-700 min-h-[52px] flex items-center justify-between">
                                    <div class="flex-1 flex flex-wrap items-center gap-2">
                                        <span id="edit_categoria_placeholder"
                                            class="text-gray-500 dark:text-gray-400">Selecciona las categorías</span>
                                        <!-- Tags seleccionados se mostrarán aquí -->
                                        <div id="edit_categoria_tags_inline" class="flex flex-wrap gap-1"></div>
                                    </div>
                                    <span class="material-icons text-gray-400 transition-transform duration-200"
                                        id="edit_categoria_arrow">keyboard_arrow_down</span>
                                </div>
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">folder</span>

                                <!-- Dropdown de categorías -->
                                <div id="edit_categoria_options"
                                    class="absolute top-full left-0 right-0 mt-2 bg-white dark:bg-slate-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-xl z-50 hidden overflow-hidden">
                                    <div
                                        class="p-2 max-h-64 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent">
                                        <div id="edit_categoria_checkboxes" class="space-y-1">
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
                                                <label
                                                    class="flex items-center p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-600 cursor-pointer transition-colors duration-200">
                                                    <input type="checkbox" name="categorias[]"
                                                        value="{{ $categoria['value'] }}"
                                                        class="mr-3 w-4 h-4 text-cyan-600 bg-gray-100 border-gray-300 rounded focus:ring-cyan-500 dark:focus:ring-cyan-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <span
                                                        class="material-icons text-{{ $categoria['color'] }}-500 mr-2 text-sm">{{ $categoria['icon'] }}</span>
                                                    <span
                                                        class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $categoria['value'] }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="edit_status"
                                class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-cyan-600 dark:text-cyan-400 w-5 h-5 flex items-center justify-center">visibility</span>
                                <span class="flex-1">Estado de Publicación *</span>
                            </label>
                            <div class="relative">
                                <select id="edit_status" name="status"
                                    class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 appearance-none cursor-pointer"
                                    required>
                                    <option value="">Selecciona un estado</option>
                                    <option value="borrador">📝 Borrador</option>
                                    <option value="publicado">🌐 Publicado</option>
                                    <option value="archivado">📦 Archivado</option>
                                </select>
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">settings</span>
                                <span
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400 pointer-events-none">keyboard_arrow_down</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Imágenes -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg mr-3">
                            <span class="material-icons text-indigo-600 dark:text-indigo-400">image</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Imágenes del Caso de Éxito</h4>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- URL Imagen Banner -->
                        <div>
                            <label for="edit_url_imagen_banner"
                                class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-pink-600 dark:text-pink-400 w-5 h-5 flex items-center justify-center">link</span>
                                <span class="flex-1">URL de Imagen Banner</span>
                            </label>
                            <div class="relative">
                                <input type="url" id="edit_url_imagen_banner" name="url_imagen_banner"
                                class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                                    placeholder="https://ejemplo.com/imagen.jpg">
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">link</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Opcional: URL de una imagen externa
                            </p>
                            <!-- Espacio para alinear con el campo de subir imagen -->
                            <div class="mt-3 h-12"></div>
                        </div>

                        <!-- Subir Imagen Banner -->
                        <div>
                            <label for="edit_url_imagen"
                                class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 h-6">
                                <span
                                    class="material-icons text-base mr-2 text-pink-600 dark:text-pink-400 w-5 h-5 flex items-center justify-center">cloud_upload</span>
                                <span class="flex-1">Subir Imagen Banner</span>
                            </label>
                            <div class="relative">
                                <input type="file" id="edit_url_imagen" name="url_imagen" accept="image/*"
                                    onchange="previewImage(this, 'edit_banner_preview')"
                                class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 material-icons text-gray-400">upload</span>
                            </div>
                            <div id="edit_banner_preview" class="mt-3 hidden">
                                <div
                                    class="bg-gray-50 dark:bg-gray-800 rounded-lg p-1 border border-gray-200 dark:border-gray-600 relative group inline-block w-full">
                                    <div
                                        class="w-full h-20 flex items-center justify-center bg-white dark:bg-gray-700 rounded overflow-hidden">
                                        <img class="max-w-full max-h-full object-contain" alt="Preview">
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded">
                                    </div>
                                    <button type="button"
                                        onclick="removeBannerPreview('edit_banner_preview', 'edit_url_imagen')"
                                        class="absolute top-1 right-1 w-4 h-4 bg-red-500 text-white rounded-full flex items-center justify-center text-xs cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                                        ×
                                    </button>
                                </div>
                            </div>
                            <!-- Checkbox para eliminar imagen existente -->
                            <div id="edit_remove_banner_option" class="mt-2 hidden">
                                <label class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <input type="checkbox" name="eliminar_imagen_banner" value="1"
                                        class="mr-2 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                    <span class="material-icons text-sm mr-1 text-red-500">delete</span>
                                    Eliminar imagen banner actual
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                                <!-- Sección de Contenido -->
                                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-cyan-100 dark:bg-cyan-900/30 rounded-lg mr-3">
                            <span class="material-icons text-cyan-600 dark:text-cyan-400">article</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Contenido del Caso de Éxito</h4>
                    </div>

                    <div class="relative">
                        <!-- Label -->
                        <label for="edit_contenido"
                            class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span
                                class="material-icons text-base mr-2 text-cyan-600 dark:text-cyan-400 flex items-center">edit_note</span>
                            <span>Contenido Principal</span>
                        </label>

                        <!-- Editor Summernote -->
                        <div class="relative">
                            <div id="edit_contenido"
                                class="w-full min-h-[300px] border-2 border-gray-200 dark:border-gray-600 rounded-xl focus-within:ring-2 focus-within:ring-cyan-500 focus-within:border-cyan-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500">
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="mt-2 text-xs text-gray-400 dark:text-gray-500 flex items-center">
                            <span class="material-icons text-sm mr-1">info</span>
                            Editor de texto enriquecido con formato completo
                        </div>
                    </div>
                </div>
                <!-- Botones de Acción -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <span class="material-icons text-sm mr-2">info</span>
                        Los campos marcados con * son obligatorios
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="button" onclick="closeEditModal()"
                            class="px-8 py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-50 dark:hover:bg-slate-700 transition-all duration-200 hover:scale-105 hover:border-gray-400 dark:hover:border-gray-500">
                            <span class="material-icons mr-2 text-sm">close</span>
                            Cancelar
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 text-white font-semibold rounded-xl hover:from-indigo-500 hover:via-blue-500 hover:to-cyan-500 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-cyan-400/30 transform hover:-translate-y-0.5">
                            <span class="material-icons mr-2 text-sm">save</span>
                            Actualizar Caso de Éxito
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
