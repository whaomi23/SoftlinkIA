<!-- Full Screen Image Slide Loader -->
<div id="kibi-loader" class="fixed inset-0 z-50 bg-black overflow-hidden">
    <!-- Contenedor principal de imágenes -->
    <div class="fullscreen-slider" id="fullscreen-slider">
        <!-- Las imágenes se cargarán dinámicamente -->
    </div>

    <!-- Indicador de carga automática -->
    <div class="auto-loading-indicator">
        <div class="loading-spinner"></div>
        <span>Cargando KIBI...</span>
    </div>
</div>

<style>
/* Full Screen Slider Styles */
.fullscreen-slider {
    position: relative;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
}

.slide-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.slide-image.active {
    opacity: 1;
}

/* Animaciones de slide */
.slide-right {
    transform: translateX(100%);
    animation: slideInRight 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

.slide-left {
    transform: translateX(-100%);
    animation: slideInLeft 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

.slide-up {
    transform: translateY(-100%);
    animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

.slide-down {
    transform: translateY(100%);
    animation: slideInDown 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

/* Keyframes para las animaciones */
@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInUp {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideInDown {
    from {
        transform: translateY(100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Indicador de carga automática */
.auto-loading-indicator {
    position: fixed;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 15px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 15px 25px;
    border-radius: 30px;
    font-size: 16px;
    font-weight: 500;
    z-index: 10;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.loading-spinner {
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Animación de entrada para el loader */
#kibi-loader {
    animation: loaderFadeIn 0.5s ease-out;
}

@keyframes loaderFadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Responsive */
@media (max-width: 768px) {
    /* Ocultar completamente el loader en móvil */
    #kibi-loader {
        display: none !important;
    }

    .navigation-indicators {
        right: 15px;
        gap: 10px;
    }

    .nav-dot {
        width: 10px;
        height: 10px;
    }

    .keyboard-hint {
        bottom: 20px;
        font-size: 12px;
        padding: 8px 16px;
    }
}

/* Ocultar scrollbars */
.fullscreen-slider::-webkit-scrollbar {
    display: none;
}

.fullscreen-slider {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loader = document.getElementById('kibi-loader');
    const slider = document.getElementById('fullscreen-slider');

    // Lista de imágenes de kibbi-images
    const images = [
        'arte-01.png',
        'arte-03.png',
        'arte-05.png',
        'arte-08.png',
        'arte-09.png',
        'arte-12.png',
        'arte-13.png'
    ];

    const slideDuration = 800; // Duración de 0.8 segundos

    // Crear solo la primera imagen (solo en pantallas medianas y grandes)
    if (window.innerWidth >= 768) {
        const img = document.createElement('img');
        img.src = `/kibbi-images/${images[0]}`;
        img.alt = 'KIBI Arte';
        img.className = 'slide-image active';
        slider.appendChild(img);
    }

    // Función para ocultar el loader y mostrar la página
    function hideLoader() {
        loader.style.opacity = '0';
        loader.style.transition = 'opacity 0.8s ease-out';

        setTimeout(() => {
            loader.style.display = 'none';
            // La página principal ya está cargada detrás
        }, 800);
    }

    // Preload de la primera imagen para mejor rendimiento (solo en pantallas medianas y grandes)
    if (window.innerWidth >= 768) {
        const preloadImg = new Image();
        preloadImg.src = `/kibbi-images/${images[0]}`;
    }

    // Ocultar loader después de 0.8 segundos
    setTimeout(() => {
        hideLoader();
    }, slideDuration);
});
</script>
