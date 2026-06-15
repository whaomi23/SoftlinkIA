<!-- Header Moderno inspirado en Edifice -->
<header id="main-header" class="bg-[#018BB0] border-b border-[#018BB0] sticky top-0 z-40 backdrop-blur-sm transition-transform duration-300 ease-in-out">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex items-center justify-between h-14 sm:h-16">
            <!-- Logo KIBI -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('soluciones.kibi') }}" class="block transition-transform hover:scale-105">
                        <img src="/kibbi-images/kibi logo blanco prueba.png" alt="KIBI Logo" class="h-6 sm:h-8 lg:h-10 w-auto">
                    </a>
                </div>
            </div>

            <!-- Navegación Principal -->
            @unless(request()->is('kibi/login') || request()->is('kibi/register') || request()->is('kibi/forgot-password'))
            <nav class="hidden lg:flex items-center space-x-16 xl:space-x-20">
                <a href="#multimedia" class="text-white hover:text-white font-medium transition-colors duration-300 text-xs xl:text-sm nav-link-piala relative group no-underline">
                    CONOCE KIBI
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#" onclick="openContactModal(); return false;" class="text-white hover:text-white font-medium transition-colors duration-300 text-xs xl:text-sm nav-link-piala relative group no-underline">
                    DEMO
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#planes" class="text-white hover:text-white font-medium transition-colors duration-300 text-xs xl:text-sm nav-link-piala relative group no-underline">
                    PLANES
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#blog" class="text-white hover:text-white font-medium transition-colors duration-300 text-xs xl:text-sm nav-link-piala relative group no-underline">
                    BLOG Y DESCARGABLES
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </nav>
            @endunless

            <!-- Botones de Acción -->
            @unless(request()->is('kibi/login') || request()->is('kibi/register') || request()->is('kibi/forgot-password'))
            <div class="hidden sm:flex items-center space-x-6 lg:space-x-8">
                <!-- Botón Contacto -->
                <a href="{{ route('kibi.contact.form') }}" class="flex items-center space-x-1 lg:space-x-2 px-2 lg:px-4 py-1.5 lg:py-2 border border-white rounded-lg text-white hover:border-[#018BB0] hover:text-[#018BB0] hover:bg-white transition-colors">
                    <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-xs lg:text-sm font-medium hidden lg:inline">Contáctanos</span>
                </a>
            </div>
            @endunless

            <!-- Botón Menú Hamburguesa -->
            @unless(request()->is('kibi/login') || request()->is('kibi/register') || request()->is('kibi/forgot-password'))
            <div class="sm:hidden">
                <button onclick="toggleMobileMenu()" class="text-white hover:text-[#018BB0] hover:bg-white p-1 transition-colors">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            @endunless
        </div>
    </div>

    <!-- Menú Móvil Desplegable -->
    @unless(request()->is('kibi/login'))
    <div id="mobile-menu" class="sm:hidden hidden bg-[#018BB0] border-t border-[#018BB0] shadow-lg">
        <div class="px-4 py-8 space-y-6">
            <!-- Enlaces de Navegación -->
            <nav class="space-y-4">
                <a href="#multimedia" class="mobile-menu-link flex items-center space-x-3 px-3 py-3 text-white hover:text-[#018BB0] hover:bg-white hover:bg-opacity-10 rounded-lg transition-all">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">CONOCE KIBI</span>
                </a>

                <a href="#" onclick="openContactModal(); return false;" class="mobile-menu-link flex items-center space-x-3 px-3 py-3 text-white hover:text-[#018BB0] hover:bg-white hover:bg-opacity-10 rounded-lg transition-all">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">DEMO</span>
                </a>

                <a href="#planes" class="mobile-menu-link flex items-center space-x-3 px-3 py-3 text-white hover:text-[#018BB0] hover:bg-white hover:bg-opacity-10 rounded-lg transition-all">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <span class="font-medium">PLANES</span>
                </a>

                <a href="#blog" class="mobile-menu-link flex items-center space-x-3 px-3 py-3 text-white hover:text-[#018BB0] hover:bg-white hover:bg-opacity-10 rounded-lg transition-all">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">BLOG</span>
                </a>

                <a href="#descargables" class="mobile-menu-link flex items-center space-x-3 px-3 py-3 text-white hover:text-[#018BB0] hover:bg-white hover:bg-opacity-10 rounded-lg transition-all">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">DESCARGABLES</span>
                </a>

                <a href="#contacto" class="mobile-menu-link flex items-center space-x-3 px-3 py-3 text-white hover:text-[#018BB0] hover:bg-white hover:bg-opacity-10 rounded-lg transition-all">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">CONTACTANOS</span>
                </a>
            </nav>

            <!-- Divider -->
            <div class="border-t border-white border-opacity-30 my-4"></div>

            <!-- Botones de Acción Móviles -->
            <div class="space-y-3">
                <a href="{{ route('kibi.contact.form') }}" class="w-full flex items-center justify-center space-x-2 px-4 py-3 border border-white rounded-lg text-white hover:border-[#018BB0] hover:text-[#018BB0] hover:bg-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-medium">Contáctanos</span>
                </a>
            </div>
        </div>
    </div>
    @endunless
</header>

<!-- Estilos adicionales para el comportamiento de scroll -->
<style>
/* Transición suave para el header */
#main-header {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Sombra cuando el header está visible */
#main-header:not(.header-hidden) {
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
}

/* Sombra más pronunciada cuando se hace scroll */
#main-header.scrolled {
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
}

/* Mejorar el backdrop blur */
#main-header {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

/* Asegurar que el header siempre esté en la parte superior */
#main-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
}

/* Ajustar el body para compensar el header fijo */
body {
    padding-top: 0;
}

/* Transición suave para el menú móvil */
#mobile-menu {
    transition: all 0.3s ease-in-out;
}

/* Mejorar la visibilidad del botón hamburguesa */
button[onclick="toggleMobileMenu()"] {
    transition: all 0.2s ease-in-out;
}

button[onclick="toggleMobileMenu()"]:hover {
    transform: scale(1.1);
}
</style>

<!-- JavaScript para el Menú Móvil -->
<script>
// Función global para alternar el menú móvil
function toggleMobileMenu() {
    console.log('toggleMobileMenu called');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    console.log('Elements found:', { mobileMenu, menuIcon, closeIcon });

    if (!mobileMenu || !menuIcon || !closeIcon) {
        console.log('Some elements not found');
        return;
    }

    const isHidden = mobileMenu.classList.contains('hidden');
    console.log('Menu is hidden:', isHidden);

    if (isHidden) {
        // Mostrar menú
        mobileMenu.classList.remove('hidden');
        menuIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        console.log('Menu opened');
    } else {
        // Ocultar menú
        mobileMenu.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        document.body.style.overflow = '';
        console.log('Menu closed');
    }
}

// Función para cerrar el menú
function closeMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    if (mobileMenu && menuIcon && closeIcon) {
        mobileMenu.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

// Función para navegar a una sección
function navigateToSection(sectionId) {
    closeMobileMenu();

    setTimeout(() => {
        const targetElement = document.getElementById(sectionId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }, 200);
}

// Variables para el comportamiento de scroll
let lastScrollTop = 0;
let isScrolling = false;
let scrollTimeout;

// Función para manejar el scroll del header
function handleHeaderScroll() {
    const header = document.getElementById('main-header');
    if (!header) return;

    const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollDifference = Math.abs(currentScrollTop - lastScrollTop);

    // Solo aplicar cambios si hay un scroll significativo
    if (scrollDifference < 5) return;

    // Agregar/quitar clase de scroll
    if (currentScrollTop > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }

    if (currentScrollTop > lastScrollTop && currentScrollTop > 100) {
        // Scrolling hacia abajo - ocultar header
        header.style.transform = 'translateY(-100%)';
        header.classList.add('header-hidden');
    } else if (currentScrollTop < lastScrollTop) {
        // Scrolling hacia arriba - mostrar header
        header.style.transform = 'translateY(0)';
        header.classList.remove('header-hidden');
    }

    lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
}

// Función optimizada para scroll con throttling
function throttledScroll() {
    if (!isScrolling) {
        requestAnimationFrame(() => {
            handleHeaderScroll();
            isScrolling = false;
        });
        isScrolling = true;
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing mobile menu and scroll behavior');

    // Event listeners para los enlaces del menú
    const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');
    console.log('Found mobile menu links:', mobileMenuLinks.length);

    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            if (href && href.startsWith('#')) {
                const targetId = href.substring(1);
                navigateToSection(targetId);
            }

            // Cerrar modal de contacto si está abierto
            if (typeof closeContactModal === 'function') {
                closeContactModal();
            }
        });
    });

    // Cerrar menú al hacer clic fuera de él
    document.addEventListener('click', function(e) {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu && !mobileMenu.contains(e.target) && !e.target.closest('button[onclick="toggleMobileMenu()"]')) {
            if (!mobileMenu.classList.contains('hidden')) {
                closeMobileMenu();
            }
        }
    });

    // Cerrar menú al redimensionar la ventana
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 640) {
            closeMobileMenu();
        }
    });

    // Cerrar menú con tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeMobileMenu();
        }
    });

    // Event listener para el scroll del header
    window.addEventListener('scroll', throttledScroll, { passive: true });

    // Inicializar posición del scroll
    lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;

    console.log('Mobile menu and scroll behavior initialized');
});
</script>

