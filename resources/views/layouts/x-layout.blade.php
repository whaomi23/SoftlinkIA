<!-- Modal de Términos y Condiciones -->
<div id="terms-modal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
    <!-- Backdrop con efectos -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-500 opacity-0"
        id="terms-backdrop"></div>

    <!-- Efectos de partículas de fondo -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-cyan-500/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-24 h-24 bg-purple-500/10 rounded-full blur-xl animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-40 h-40 bg-blue-500/10 rounded-full blur-xl animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <!-- Modal Container -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-4xl transform transition-all duration-500 scale-95 opacity-0"
            id="terms-content">
            <!-- Glass Effect Card -->
            <div class="glass-effect-enhanced rounded-3xl shadow-2xl border border-cyan-500/30 overflow-hidden">
                <!-- Header con gradiente -->
                <div
                    class="relative bg-gradient-to-r from-slate-900 via-blue-900/50 to-cyan-900/50 px-8 py-6 border-b border-cyan-500/20">
                    <!-- Efectos de luz en el header -->
                    <div
                        class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-cyan-500/10 via-blue-500/10 to-purple-500/10 animate-pulse">
                    </div>

                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <!-- Icono con efectos de neón -->
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-cyan-500 to-blue-400 rounded-xl opacity-70 blur-sm animate-pulse">
                                </div>
                                <div
                                    class="relative w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-400 rounded-xl flex items-center justify-center">
                                    <span class="material-icons text-white text-2xl">gavel</span>
                                </div>
                            </div>
                            <div>
                                <h2
                                    class="text-2xl font-bold bg-gradient-to-r from-white via-cyan-200 to-blue-300 bg-clip-text text-transparent">
                                    Términos y Condiciones
                                </h2>
                                <p class="text-slate-300 text-sm">SoftLinkIA - Condiciones de Uso</p>
                            </div>
                        </div>

                        <!-- Botón cerrar con efectos -->
                        <button id="close-terms"
                            class="group relative w-10 h-10 bg-slate-800/80 hover:bg-red-500/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 hover:border-red-400">
                            <span
                                class="material-icons text-slate-400 group-hover:text-red-400 transition-colors">close</span>
                            <div
                                class="absolute inset-0 rounded-full border border-red-400/50 opacity-0 group-hover:opacity-100 group-hover:animate-ping">
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Contenido del modal -->
                <div
                    class="bg-gradient-to-br from-slate-900/95 to-slate-800/95 p-8 max-h-96 overflow-y-auto custom-scrollbar">
                    <div class="prose prose-invert max-w-none">
                        <div class="text-slate-300 leading-relaxed space-y-4">
                            <p class="text-lg font-medium text-cyan-300 mb-6">Al utilizar nuestros servicios, aceptas
                                los siguientes términos:</p>

                            <div class="space-y-6">
                                <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700/50">
                                    <h3 class="text-xl font-semibold text-white mb-3 flex items-center">
                                        <span class="material-icons text-cyan-400 mr-2">security</span>
                                        Uso de Servicios
                                    </h3>
                                    <p class="text-slate-300">Nuestros servicios están diseñados para proporcionar
                                        soluciones tecnológicas de alta calidad. El uso indebido o no autorizado está
                                        prohibido.</p>
                                </div>

                                <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700/50">
                                    <h3 class="text-xl font-semibold text-white mb-3 flex items-center">
                                        <span class="material-icons text-blue-400 mr-2">privacy_tip</span>
                                        Privacidad y Datos
                                    </h3>
                                    <p class="text-slate-300">Protegemos tu información personal de acuerdo con nuestra
                                        política de privacidad y las mejores prácticas de seguridad.</p>
                                </div>

                                <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700/50">
                                    <h3 class="text-xl font-semibold text-white mb-3 flex items-center">
                                        <span class="material-icons text-purple-400 mr-2">support</span>
                                        Soporte y Responsabilidad
                                    </h3>
                                    <p class="text-slate-300">Ofrecemos soporte técnico profesional y nos
                                        responsabilizamos por la calidad de nuestros servicios según los acuerdos
                                        establecidos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer con botones -->
                <div
                    class="bg-gradient-to-r from-slate-900 via-blue-900/30 to-slate-900 px-8 py-6 border-t border-cyan-500/20">
                    <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">
                        <div class="flex items-center space-x-2 text-sm text-slate-400">
                            <span class="material-icons text-cyan-400">info</span>
                            <span>Última actualización: Enero 2024</span>
                        </div>

                        <div class="flex gap-4">
                            <button id="decline-terms"
                                class="px-6 py-3 bg-slate-700 hover:bg-red-600 text-white rounded-xl font-medium transition-all duration-300 hover:scale-105 border border-slate-600 hover:border-red-500">
                                Rechazar
                            </button>
                            <button id="accept-terms"
                                class="px-8 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-white rounded-xl font-medium transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-cyan-500/50">
                                Aceptar Términos
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Cookies -->
<div id="cookies-modal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
    <!-- Backdrop con efectos -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-500 opacity-0"
        id="cookies-backdrop"></div>

    <!-- Efectos de partículas de fondo -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/3 right-1/4 w-28 h-28 bg-green-500/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-1/3 left-1/4 w-36 h-36 bg-yellow-500/10 rounded-full blur-xl animate-pulse"
            style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Modal Container -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-3xl transform transition-all duration-500 scale-95 opacity-0"
            id="cookies-content">
            <!-- Glass Effect Card -->
            <div class="glass-effect-enhanced rounded-3xl shadow-2xl border border-green-500/30 overflow-hidden">
                <!-- Header con gradiente -->
                <div
                    class="relative bg-gradient-to-r from-slate-900 via-green-900/50 to-emerald-900/50 px-8 py-6 border-b border-green-500/20">
                    <!-- Efectos de luz en el header -->
                    <div
                        class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-green-500/10 via-emerald-500/10 to-teal-500/10 animate-pulse">
                    </div>

                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <!-- Icono con efectos de neón -->
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-tr from-green-500 to-emerald-400 rounded-xl opacity-70 blur-sm animate-pulse">
                                </div>
                                <div
                                    class="relative w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center">
                                    <span class="material-icons text-white text-2xl">cookie</span>
                                </div>
                            </div>
                            <div>
                                <h2
                                    class="text-2xl font-bold bg-gradient-to-r from-white via-green-200 to-emerald-300 bg-clip-text text-transparent">
                                    Política de Cookies
                                </h2>
                                <p class="text-slate-300 text-sm">Gestión de Cookies y Privacidad</p>
                            </div>
                        </div>

                        <!-- Botón cerrar con efectos -->
                        <button id="close-cookies"
                            class="group relative w-10 h-10 bg-slate-800/80 hover:bg-red-500/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 border border-slate-600 hover:border-red-400">
                            <span
                                class="material-icons text-slate-400 group-hover:text-red-400 transition-colors">close</span>
                            <div
                                class="absolute inset-0 rounded-full border border-red-400/50 opacity-0 group-hover:opacity-100 group-hover:animate-ping">
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Contenido del modal -->
                <div class="bg-gradient-to-br from-slate-900/95 to-slate-800/95 p-8">
                    <div class="text-slate-300 leading-relaxed space-y-6">
                        <p class="text-lg font-medium text-green-300 mb-6">Utilizamos cookies para mejorar tu
                            experiencia en nuestro sitio web:</p>

                        <div class="grid gap-4">
                            <!-- Cookies Esenciales -->
                            <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700/50">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-lg font-semibold text-white flex items-center">
                                        <span class="material-icons text-green-400 mr-2">security</span>
                                        Cookies Esenciales
                                    </h3>
                                    <span
                                        class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-sm border border-green-500/30">Requeridas</span>
                                </div>
                                <p class="text-slate-300 text-sm">Necesarias para el funcionamiento básico del sitio web
                                    y la seguridad.</p>
                            </div>

                            <!-- Cookies de Rendimiento -->
                            <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700/50">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-lg font-semibold text-white flex items-center">
                                        <span class="material-icons text-blue-400 mr-2">analytics</span>
                                        Cookies de Rendimiento
                                    </h3>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="performance-cookies" class="sr-only peer" checked>
                                        <div
                                            class="w-11 h-6 bg-slate-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500">
                                        </div>
                                    </label>
                                </div>
                                <p class="text-slate-300 text-sm">Nos ayudan a entender cómo interactúas con nuestro
                                    sitio para mejorarlo.</p>
                            </div>

                            <!-- Cookies de Marketing -->
                            <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700/50">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-lg font-semibold text-white flex items-center">
                                        <span class="material-icons text-purple-400 mr-2">campaign</span>
                                        Cookies de Marketing
                                    </h3>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="marketing-cookies" class="sr-only peer">
                                        <div
                                            class="w-11 h-6 bg-slate-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-500">
                                        </div>
                                    </label>
                                </div>
                                <p class="text-slate-300 text-sm">Para mostrarte contenido y anuncios relevantes en
                                    otros sitios web.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer con botones -->
                <div
                    class="bg-gradient-to-r from-slate-900 via-green-900/30 to-slate-900 px-8 py-6 border-t border-green-500/20">
                    <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">

                        <a href="{{ route('politica-cookies') }}"
                            class="text-green-400 hover:text-green-300 text-sm flex items-center transition-colors">
                            <span class="material-icons text-sm mr-1">open_in_new</span>
                            Ver política completa
                        </a>

                        <div class="flex gap-4">
                            <button id="reject-cookies"
                                class="px-6 py-3 bg-slate-700 hover:bg-red-600 text-white rounded-xl font-medium transition-all duration-300 hover:scale-105 border border-slate-600 hover:border-red-500">
                                Rechazar Todo
                            </button>
                            <button id="accept-selected-cookies"
                                class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-400 hover:to-emerald-500 text-white rounded-xl font-medium transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-green-500/50">
                                Aceptar Selección
                            </button>
                            <button id="accept-all-cookies"
                                class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-400 hover:to-emerald-500 text-white rounded-xl font-medium transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-green-500/50">
                                Aceptar Todo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner de Cookies (versión centrada) -->
<div id="cookie-banner"
    class="fixed inset-0 z-[9998] flex items-center justify-center p-4 transform scale-0 opacity-0 transition-all duration-500">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div
        class="relative bg-gradient-to-br from-slate-900/95 via-slate-800/95 to-slate-900/95 backdrop-blur-xl border border-green-500/30 shadow-2xl rounded-2xl max-w-lg w-full mx-4">
        <div class="p-6">
            <div class="flex flex-col items-center text-center space-y-4">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-400 rounded-xl flex items-center justify-center">
                    <span class="material-icons text-white text-2xl">cookie</span>
                </div>

                <div class="space-y-2">
                    <h3 class="text-white font-bold text-xl">🍪 Utilizamos cookies</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Para mejorar tu experiencia y personalizar el contenido, utilizamos cookies técnicas y de
                        análisis.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 w-full">
                    <button id="customize-cookies"
                        class="flex-1 px-4 py-3 bg-slate-700 hover:bg-slate-600 text-white rounded-xl font-medium transition-all duration-300 border border-slate-600 hover:border-slate-500">
                        Personalizar
                    </button>
                    <button id="accept-banner-cookies"
                        class="flex-1 px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-400 hover:to-emerald-500 text-white rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-green-500/50">
                        Aceptar Todo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS personalizados -->
<style>
    .glass-effect-enhanced {
        background: rgba(15, 23, 42, 0.85);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: rgba(59, 130, 246, 0.5) rgba(30, 41, 59, 0.5);
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(30, 41, 59, 0.5);
        border-radius: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.5);
        border-radius: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.7);
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(20px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    @keyframes modalSlideOut {
        from {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        to {
            opacity: 0;
            transform: scale(0.95) translateY(20px);
        }
    }

    .modal-enter {
        animation: modalSlideIn 0.5s ease-out forwards;
    }

    .modal-exit {
        animation: modalSlideOut 0.3s ease-in forwards;
    }
</style>

<!-- JavaScript para funcionalidad de modales -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Verificar si es la primera visita
        const hasAcceptedTerms = localStorage.getItem('termsAccepted');
        const hasAcceptedCookies = localStorage.getItem('cookiesAccepted');

        // Mostrar modales si es primera visita
        if (!hasAcceptedTerms) {
            setTimeout(() => showTermsModal(), 1000);
        } else if (!hasAcceptedCookies) {
            setTimeout(() => showCookieBanner(), 1500);
        }

        // Funciones para mostrar modales
        function showTermsModal() {
            const modal = document.getElementById('terms-modal');
            const backdrop = document.getElementById('terms-backdrop');
            const content = document.getElementById('terms-content');

            modal.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('modal-enter');
            }, 10);
        }

        function hideTermsModal() {
            const modal = document.getElementById('terms-modal');
            const backdrop = document.getElementById('terms-backdrop');
            const content = document.getElementById('terms-content');

            content.classList.add('modal-exit');
            backdrop.classList.add('opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                content.classList.remove('modal-enter', 'modal-exit');
                content.classList.add('scale-95', 'opacity-0');
            }, 300);
        }

        function showCookiesModal() {
            const modal = document.getElementById('cookies-modal');
            const backdrop = document.getElementById('cookies-backdrop');
            const content = document.getElementById('cookies-content');

            modal.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('modal-enter');
            }, 10);
        }

        function hideCookiesModal() {
            const modal = document.getElementById('cookies-modal');
            const backdrop = document.getElementById('cookies-backdrop');
            const content = document.getElementById('cookies-content');

            content.classList.add('modal-exit');
            backdrop.classList.add('opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                content.classList.remove('modal-enter', 'modal-exit');
                content.classList.add('scale-95', 'opacity-0');
            }, 300);
        }

        function showCookieBanner() {
            const banner = document.getElementById('cookie-banner');
            banner.classList.remove('scale-0', 'opacity-0');
            banner.classList.add('scale-100', 'opacity-100');
        }

        function hideCookieBanner() {
            const banner = document.getElementById('cookie-banner');
            banner.classList.remove('scale-100', 'opacity-100');
            banner.classList.add('scale-0', 'opacity-0');
        }

        // Event listeners para términos
        document.getElementById('accept-terms').addEventListener('click', function () {
            localStorage.setItem('termsAccepted', 'true');
            hideTermsModal();

            // Mostrar cookies después de aceptar términos
            if (!localStorage.getItem('cookiesAccepted')) {
                setTimeout(() => showCookieBanner(), 500);
            }
        });

        document.getElementById('decline-terms').addEventListener('click', function () {
            hideTermsModal();
            // Opcional: redirigir o mostrar mensaje
            alert('Para continuar usando nuestros servicios, debes aceptar los términos y condiciones.');
            setTimeout(() => showTermsModal(), 1000);
        });

        document.getElementById('close-terms').addEventListener('click', hideTermsModal);

        // Event listeners para cookies
        document.getElementById('accept-all-cookies').addEventListener('click', function () {
            localStorage.setItem('cookiesAccepted', 'all');
            localStorage.setItem('performanceCookies', 'true');
            localStorage.setItem('marketingCookies', 'true');
            hideCookiesModal();
            hideCookieBanner();
        });

        document.getElementById('accept-selected-cookies').addEventListener('click', function () {
            const performance = document.getElementById('performance-cookies').checked;
            const marketing = document.getElementById('marketing-cookies').checked;

            localStorage.setItem('cookiesAccepted', 'selected');
            localStorage.setItem('performanceCookies', performance.toString());
            localStorage.setItem('marketingCookies', marketing.toString());
            hideCookiesModal();
            hideCookieBanner();
        });

        document.getElementById('reject-cookies').addEventListener('click', function () {
            localStorage.setItem('cookiesAccepted', 'essential');
            localStorage.setItem('performanceCookies', 'false');
            localStorage.setItem('marketingCookies', 'false');
            hideCookiesModal();
            hideCookieBanner();
        });

        document.getElementById('close-cookies').addEventListener('click', hideCookiesModal);

        // Event listeners para banner
        document.getElementById('accept-banner-cookies').addEventListener('click', function () {
            localStorage.setItem('cookiesAccepted', 'all');
            localStorage.setItem('performanceCookies', 'true');
            localStorage.setItem('marketingCookies', 'true');
            hideCookieBanner();
        });

        document.getElementById('customize-cookies').addEventListener('click', function () {
            hideCookieBanner();
            showCookiesModal();
        });
//
        // Cerrar modales al hacer clic en el backdrop
        document.getElementById('terms-backdrop').addEventListener('click', hideTermsModal);
        document.getElementById('cookies-backdrop').addEventListener('click', hideCookiesModal);
    });
</script>
