<!-- Modal para Eliminar Caso de Éxito -->
<div id="deleteModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-[999999] transition-all duration-500 ease-out">
    <div class="relative top-8 mx-auto p-0 border-0 w-11/12 max-w-md shadow-2xl rounded-3xl bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl transform transition-all duration-500 ease-out scale-90 opacity-0 overflow-hidden border border-white/20 dark:border-slate-700/50"
        id="deleteModalContent">
        <!-- Header con gradiente -->
        <div class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800 p-6 text-white overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-red-600/90 via-red-700/90 to-red-800/90"></div>
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 w-20 h-20 bg-white/10 rounded-full blur-2xl"></div>
            <div class="relative flex items-center justify-center">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-sm border border-white/30">
                        <span class="material-icons text-2xl">warning</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Confirmar Eliminación</h3>
                        <p class="text-red-100 text-sm">Esta acción no se puede deshacer</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="p-8 text-center">
            <div class="mb-6">
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-2">
                            ¿Estás seguro de que quieres eliminar el caso de éxito?
                        </p>
                <p class="text-sm font-medium text-gray-900 dark:text-white mb-4">
                    "<span id="deleteCasoExitoTitle" class="text-red-600 dark:text-red-400"></span>"
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Todos los datos asociados a este caso de éxito serán eliminados permanentemente.
                </p>
            </div>

            <div class="flex items-center justify-center space-x-4">
                <button onclick="closeDeleteModal()"
                    class="px-8 py-3 border-2 border-gray-300/50 dark:border-gray-600/50 text-gray-700 dark:text-gray-300 font-semibold rounded-2xl hover:bg-gray-50/80 dark:hover:bg-slate-700/80 backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:border-gray-400 dark:hover:border-gray-500">
                    <span class="material-icons mr-2 text-sm">close</span>
                    Cancelar
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteFormAction" name="form_action" value="">
                    <button type="submit"
                        class="group relative px-8 py-3 bg-gradient-to-r from-red-600 via-red-700 to-red-800 text-white font-semibold rounded-2xl hover:from-red-500 hover:via-red-600 hover:to-red-700 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-red-500/30 transform hover:-translate-y-1">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-red-600 via-red-700 to-red-800 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity">
                        </div>
                        <span class="material-icons mr-2 text-sm relative z-10">delete</span>
                        <span class="relative z-10">Eliminar Caso de Éxito</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
