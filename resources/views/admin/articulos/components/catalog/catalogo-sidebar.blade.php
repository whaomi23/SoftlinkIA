<div class="sticky top-24 mt-8">
    <!-- AI Development Promotion -->
    <div class="relative rounded-2xl shadow-lg overflow-hidden floating-card group mb-6" style="height: 200px;">
        <!-- Background Image -->
        <img src="{{ asset('images/unnamed.png') }}" alt="Experto en IA"
            class="absolute inset-0 w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">

        <!-- Dark Overlay -->
        <div
            class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-blue-900/50 group-hover:from-black/50 group-hover:via-black/30 group-hover:to-blue-900/60 transition-all duration-500">
        </div>

        <!-- Content Overlay -->
        <div class="relative h-full flex flex-col justify-between p-6">
            <!-- Title -->
            <div class="text-center">
                <h3 class="text-lg font-bold text-white mb-2 group-hover:text-cyan-300 transition-colors duration-500">
                    Facilitamos el desarrollo de IA</h3>
            </div>

            <!-- Button -->
            <div class="mt-auto">
                <button type="button" data-bs-toggle="modal" data-bs-target="#contactFormModal"
                    onclick="openContactForm()"
                    class="group/btn relative overflow-hidden w-full bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-3 px-4 rounded-xl font-semibold hover:from-blue-500 hover:to-cyan-500 transition-all duration-500 transform hover:scale-105 shadow-lg hover:shadow-blue-500/25">
                    <span class="relative z-10">Contrata a un experto</span>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300">
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Facebook Page Promotion -->
    <div
        class="glass-effect-enhanced rounded-2xl shadow-lg p-6 floating-card group bg-slate-800/30 backdrop-blur-sm border border-slate-700/50 mb-6">
        <div class="flex items-center mb-4">
            <a href="https://www.facebook.com/share/16pwSCfawU/" target="_blank"
                class="group transition-all transform hover:scale-110 duration-500">
                <div class="relative mr-4">
                    <div
                        class="absolute -inset-2 bg-gradient-to-tr from-blue-500 to-blue-600 rounded-xl opacity-70 blur-sm group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div
                        class="relative w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 text-white">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </div>
                </div>
            </a>
            <h3 class="text-lg font-semibold text-white group-hover:text-cyan-300 transition-colors duration-500">Visita
                nuestra página de Facebook</h3>
        </div>
        <p class="text-slate-300 text-sm group-hover:text-slate-200 transition-colors duration-500">Síguenos para
            contenido exclusivo sobre IA y desarrollo de software.</p>
    </div>

    <!-- Newsletter Subscription -->
    <div class="relative rounded-2xl shadow-lg overflow-hidden floating-card group mb-6" style="height: 200px;">
        <!-- Background Image -->
        <img src="{{ asset('images/article.png') }}" alt="Newsletter"
            class="absolute inset-0 w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700">

        <!-- Dark Overlay -->
        <div
            class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-blue-900/50 group-hover:from-black/50 group-hover:via-black/30 group-hover:to-blue-900/60 transition-all duration-500">
        </div>

        <!-- Content Overlay -->
        <div class="relative h-full flex flex-col justify-center p-6">
            <!-- Title -->
            <div class="text-center">
                <h3 class="text-lg font-bold text-white mb-2 group-hover:text-cyan-300 transition-colors duration-500">
                    Suscríbete a nuestro boletín</h3>
                <p class="text-white text-sm group-hover:text-cyan-200 transition-colors duration-500">Recibe las
                    últimas noticias y artículos directamente en tu correo.</p>
            </div>
        </div>
    </div>

    <!-- Email Subscription Component -->
    <div
        class="glass-effect-enhanced rounded-2xl shadow-lg p-3 floating-card bg-slate-800/30 backdrop-blur-sm border border-slate-700/50 mb-6">
        <form id="newsletter-form" class="flex">
            @csrf
            <!-- Input Field -->
            <input type="email" id="newsletter-email" name="email" required
                class="flex-1 px-3 py-2 bg-gray-100 rounded-l-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 transition-all duration-300 hover:shadow-md border-0 outline-none text-sm"
                placeholder="Tu correo electrónico">
            <!-- Submit Button -->
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-r-xl transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-blue-500/25 flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </form>
        <!-- Success/Error Messages -->
        <div id="newsletter-message" class="mt-2 text-sm hidden"></div>
    </div>
</div>