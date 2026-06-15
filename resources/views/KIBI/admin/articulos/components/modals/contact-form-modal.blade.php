<!-- Modal de Contacto -->
<div id="contactFormModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-[9999999] transition-all duration-500 ease-out">
    <div class="relative top-8 mx-auto p-0 border-0 w-11/12 max-w-2xl shadow-2xl rounded-3xl bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl transform transition-all duration-500 ease-out scale-90 opacity-0 overflow-hidden border border-white/20 dark:border-slate-700/50"
        id="contactFormModalContent">
        <!-- Header con gradiente -->
        <div class="relative bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 p-6 text-white overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/90 via-purple-600/90 to-pink-600/90"></div>
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 w-20 h-20 bg-white/10 rounded-full blur-2xl"></div>
            <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-sm border border-white/30">
                        <span class="material-icons text-2xl">contact_mail</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Contáctanos</h3>
                        <p class="text-blue-100 text-sm">Estamos aquí para ayudarte</p>
                    </div>
                </div>
                <button onclick="closeContactForm()"
                    class="p-3 text-white hover:bg-white/20 rounded-2xl transition-all duration-300 hover:scale-110 backdrop-blur-sm border border-white/30 hover:border-white/50">
                    <span class="material-icons text-xl">close</span>
                </button>
            </div>
        </div>

        <!-- Contenido del formulario -->
        <div class="p-8">
            <form id="contactForm" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombre -->
                    <div>
                        <label for="contact_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Nombre *
                        </label>
                        <input type="text" id="contact_name" name="name" required
                            class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                            placeholder="Tu nombre completo">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="contact_email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Email *
                        </label>
                        <input type="email" id="contact_email" name="email" required
                            class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                            placeholder="tu@email.com">
                    </div>
                </div>

                <!-- Asunto -->
                <div>
                    <label for="contact_subject" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Asunto *
                    </label>
                    <input type="text" id="contact_subject" name="subject" required
                        class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                        placeholder="¿En qué podemos ayudarte?">
                </div>

                <!-- Mensaje -->
                <div>
                    <label for="contact_message" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Mensaje *
                    </label>
                    <textarea id="contact_message" name="message" rows="5" required
                        class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-500"
                        placeholder="Cuéntanos más detalles..."></textarea>
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <button type="button" onclick="closeContactForm()"
                        class="px-6 py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-50 dark:hover:bg-slate-700 transition-all duration-200 hover:scale-105">
                        Cancelar
                    </button>
                    <button type="submit" id="contactSubmitBtn"
                        class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-400 hover:to-purple-500 transition-all duration-200 hover:scale-105 hover:shadow-lg">
                        Enviar Mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
