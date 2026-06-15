<!-- Sección de Contacto -->
<section class="relative py-20 overflow-hidden bg-[#F4C336]">
    <style>
        /* Animaciones del formulario */
        @keyframes contactReveal {
            0% { opacity: 0; transform: translateY(40px) scale(0.98); }
            60% { opacity: 1; transform: translateY(-6px) scale(1.01); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes fieldShimmer {
            0% { box-shadow: 0 0 0 0 rgba(1,139,176,0.0); }
            50% { box-shadow: 0 10px 24px rgba(1,139,176,0.18); }
            100% { box-shadow: 0 0 0 0 rgba(1,139,176,0.0); }
        }
        .contact-card {
            opacity: 0;
            transform: translateY(40px) scale(0.98);
            will-change: transform, opacity, box-shadow;
            transition: transform .4s ease, box-shadow .4s ease, opacity .4s ease;
        }
        .contact-card.is-visible {
            animation: contactReveal .9s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }
        .contact-card :is(input, select, textarea) {
            transition: box-shadow .35s ease, transform .25s ease;
        }
        .contact-card :is(input:focus, select:focus, textarea:focus) {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(1,139,176,0.18);
            animation: fieldShimmer 1.6s ease both;
        }
        .contact-submit:hover {
            transform: translateY(-2px) scale(1.02);
        }
    </style>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center mb-16 relative z-20">
            <div class="space-y-6">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white uppercase leading-tight" style="font-family: 'Piala', sans-serif;">
                    ¿LISTO PARA TRANSFORMAR TU ESCUELA?
                </h1>
                <p class="text-xl lg:text-2xl text-white opacity-90 max-w-4xl mx-auto" style="font-family: 'Piala', sans-serif;">
                    Contáctanos y descubre cómo KIBI puede revolucionar el análisis de datos en tu empresa.
                </p>
                <div class="mt-8">
                    <button class="bg-[#018BB0] hover:bg-[#016a8a] text-white font-bold py-4 px-8 rounded-lg text-lg uppercase transition-colors duration-300" style="font-family: 'Piala', sans-serif;">
                        QUIERO UNA DEMO
                    </button>
                </div>
            </div>
        </div>

        <!-- Estrellas decorativas de fondo -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Estrella 1 - Superior izquierda -->
            <div class="absolute top-16 left-20 w-8 h-8 opacity-60 transform rotate-12">
                <img src="/kibbi-images/estrellas.png" alt="Estrella" class="w-full h-full object-contain">
            </div>
            <!-- Estrella 2 - Superior derecha -->
            <div class="absolute top-24 right-32 w-6 h-6 opacity-50 transform -rotate-45">
                <img src="/kibbi-images/estrellas.png" alt="Estrella" class="w-full h-full object-contain">
            </div>
            <!-- Estrella 3 - Centro izquierda -->
            <div class="absolute top-1/2 left-16 w-10 h-10 opacity-70 transform rotate-90">
                <img src="/kibbi-images/estrellas.png" alt="Estrella" class="w-full h-full object-contain">
            </div>
            <!-- Estrella 4 - Centro derecha -->
            <div class="absolute top-1/3 right-20 w-7 h-7 opacity-55 transform -rotate-12">
                <img src="/kibbi-images/estrellas.png" alt="Estrella" class="w-full h-full object-contain">
            </div>
            <!-- Estrella 5 - Inferior izquierda -->
            <div class="absolute bottom-20 left-24 w-9 h-9 opacity-65 transform rotate-45">
                <img src="/kibbi-images/estrellas.png" alt="Estrella" class="w-full h-full object-contain">
            </div>
            <!-- Estrella 6 - Inferior derecha -->
            <div class="absolute bottom-16 right-16 w-5 h-5 opacity-60 transform -rotate-90">
                <img src="/kibbi-images/estrellas.png" alt="Estrella" class="w-full h-full object-contain">
            </div>
            <!-- Estrella 7 - Centro superior -->
            <div class="absolute top-32 left-1/2 transform -translate-x-1/2 w-8 h-8 opacity-50 transform rotate-180">
                <img src="/kibbi-images/estrellas.png" alt="Estrella" class="w-full h-full object-contain">
            </div>
            <!-- Estrella 8 - Centro inferior -->
            <div class="absolute bottom-32 left-1/2 transform -translate-x-1/2 w-6 h-6 opacity-45 transform rotate-30">
                <img src="/kibbi-images/estrellas.png" alt="Estrella" class="w-full h-full object-contain">
            </div>
        </div>

        <!-- Formulario de Contacto -->
        <div class="relative z-20">
            <div class="max-w-7xl mx-auto flex items-center justify-center">
                <!-- Mochila a la izquierda -->
                <div class="hidden lg:block w-80 h-80 opacity-90 transform rotate-12 mr-8 scroll-ornament" data-direction="right" data-distance="240" style="will-change: transform, opacity;">
                    <img src="/kibbi-images/mochila.png" alt="Mochila" class="w-full h-full object-contain">
                </div>
                
                <!-- Formulario central -->
                <div class="max-w-3xl mx-auto">
                    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 contact-card" id="contactCard">
                    <!-- Header del formulario -->
                    <div class="bg-gradient-to-r from-[#018BB0] to-[#016a8a] px-8 py-6">
                        <h2 class="text-2xl font-bold text-white uppercase text-center" style="font-family: 'Piala', sans-serif;">
                            Envíanos un mensaje
                        </h2>
                    </div>
                    
                    <!-- Formulario -->
                    <div class="p-8">
                        <form class="space-y-6">
                            <!-- Primera fila: Nombre y Email -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nombre" class="block text-base font-semibold text-[#018BB0] mb-3" style="font-family: 'Piala', sans-serif;">
                                        Nombre completo
                                    </label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" 
                                           class="w-full px-4 py-3 border-2 border-[#018BB0] rounded-xl focus:ring-2 focus:ring-[#018BB0] focus:border-[#018BB0] transition-all duration-300 bg-gray-50 focus:bg-white text-base">
                                </div>

                                <div>
                                    <label for="email" class="block text-base font-semibold text-[#018BB0] mb-3" style="font-family: 'Piala', sans-serif;">
                                        Email
                                    </label>
                                    <input type="email" id="email" name="email" placeholder="tu@empresa.com" 
                                           class="w-full px-4 py-3 border-2 border-[#018BB0] rounded-xl focus:ring-2 focus:ring-[#018BB0] focus:border-[#018BB0] transition-all duration-300 bg-gray-50 focus:bg-white text-base">
                                </div>
                            </div>

                            <!-- Segunda fila: Empresa y Teléfono -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="empresa" class="block text-base font-semibold text-[#018BB0] mb-3" style="font-family: 'Piala', sans-serif;">
                                        Empresa
                                    </label>
                                    <input type="text" id="empresa" name="empresa" placeholder="Nombre de tu empresa" 
                                           class="w-full px-4 py-3 border-2 border-[#018BB0] rounded-xl focus:ring-2 focus:ring-[#018BB0] focus:border-[#018BB0] transition-all duration-300 bg-gray-50 focus:bg-white text-base">
                                </div>

                                <div>
                                    <label for="telefono" class="block text-base font-semibold text-[#018BB0] mb-3" style="font-family: 'Piala', sans-serif;">
                                        Teléfono
                                    </label>
                                    <input type="tel" id="telefono" name="telefono" placeholder="+1 (555) 123-4557" 
                                           class="w-full px-4 py-3 border-2 border-[#018BB0] rounded-xl focus:ring-2 focus:ring-[#018BB0] focus:border-[#018BB0] transition-all duration-300 bg-gray-50 focus:bg-white text-base">
                                </div>
                            </div>

                            <!-- Asunto -->
                            <div>
                                <label for="asunto" class="block text-base font-semibold text-[#018BB0] mb-3" style="font-family: 'Piala', sans-serif;">
                                    Asunto
                                </label>
                                <div class="relative">
                                    <select id="asunto" name="asunto" 
                                            class="w-full px-4 py-3 border-2 border-[#018BB0] rounded-xl focus:ring-2 focus:ring-[#018BB0] focus:border-[#018BB0] transition-all duration-300 bg-gray-50 focus:bg-white appearance-none cursor-pointer text-base text-[#018BB0] pr-10">
                                        <option value="" class="text-gray-500">Selecciona un asunto</option>
                                        <option value="demo">Solicitar Demo</option>
                                        <option value="precios">Consulta de Precios</option>
                                        <option value="soporte">Soporte Técnico</option>
                                        <option value="general">Consulta General</option>
                                    </select>
                                    <!-- Ícono de flecha personalizado -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-[#018BB0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Mensaje -->
                            <div>
                                <label for="mensaje" class="block text-base font-semibold text-[#018BB0] mb-3" style="font-family: 'Piala', sans-serif;">
                                    Mensaje <span class="text-red-500">*</span>
                                </label>
                                <textarea id="mensaje" name="mensaje" rows="4" placeholder="Cuéntanos más sobre tu proyecto..." 
                                          class="w-full px-4 py-3 border-2 border-[#018BB0] rounded-xl focus:ring-2 focus:ring-[#018BB0] focus:border-[#018BB0] transition-all duration-300 resize-none bg-gray-50 focus:bg-white text-base"></textarea>
                            </div>

                            <!-- Checkbox de términos -->
                            <div class="flex items-center">
                                <input type="checkbox" id="terminos" name="terminos" 
                                       class="h-5 w-5 text-[#018BB0] border-2 border-[#018BB0] rounded focus:ring-[#018BB0] focus:ring-2">
                                <label for="terminos" class="ml-3 text-base text-[#018BB0] leading-relaxed" style="font-family: 'Piala', sans-serif;">
                                    Acepto los términos y condiciones y la política de privacidad
                                </label>
                            </div>

                            <!-- Botón de envío -->
                            <div class="pt-4">
                                <button type="submit" 
                                        class="w-full contact-submit bg-gradient-to-r from-[#018BB0] to-[#016a8a] hover:from-[#016a8a] hover:to-[#018BB0] text-white font-bold py-4 px-8 rounded-xl text-lg uppercase transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl" 
                                        style="font-family: 'Piala', sans-serif;">
                                    ENVIAR MENSAJE
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                
                <!-- Sombrero de graduación a la derecha -->
                <div class="hidden lg:block w-80 h-80 opacity-90 transform -rotate-12 ml-8 scroll-ornament" data-direction="left" data-distance="240" style="will-change: transform, opacity;">
                    <img src="/kibbi-images/sombrero.png" alt="Sombrero" class="w-full h-full object-contain">
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Revela el formulario cuando entra al viewport
    (function() {
        var el = document.getElementById('contactCard');
        if (!el || typeof IntersectionObserver === 'undefined') return;
        var io = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    el.classList.add('is-visible');
                    io.disconnect();
                }
            });
        }, { threshold: 0.25 });
        io.observe(el);
    })();
</script>
