/*
 * VER CASO DE ÉXITO - FUNCIONALIDADES
 * 
 * Este archivo maneja las funcionalidades para visualizar casos de éxito
 */

// Función para mostrar notificaciones con SweetAlert2
function showNotification(message, type = 'info') {
    let icon, title, confirmButtonColor;
    
    switch (type) {
        case 'success':
            icon = 'success';
            title = 'Éxito';
            confirmButtonColor = '#10b981';
            break;
        case 'error':
            icon = 'error';
            title = 'Error';
            confirmButtonColor = '#ef4444';
            break;
        case 'warning':
            icon = 'warning';
            title = 'Advertencia';
            confirmButtonColor = '#f59e0b';
            break;
        default:
            icon = 'info';
            title = 'Información';
            confirmButtonColor = '#3b82f6';
    }
    
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
        confirmButtonText: 'Entendido',
        confirmButtonColor: confirmButtonColor,
        timer: 3000,
        timerProgressBar: true,
        customClass: {
            popup: 'rounded-xl shadow-2xl',
            title: 'text-xl font-bold',
            confirmButton: 'px-6 py-2 rounded-lg font-semibold'
        }
    });
}

// Función para inicializar funcionalidades cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Visibilidad de iconos sociales
    (function controlSocialIconsVisibility() {
        const socialIcons = document.getElementById('social-icons');
        if (!socialIcons) return;
        
        function updateIconsVisibility() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;
            
            // Definir zonas donde ocultar los iconos
            const headerHeight = 600; // Zona del header donde ocultar
            const footerStart = documentHeight - windowHeight - 400; // Zona del footer donde ocultar
            
            // Verificar si estamos en zona de header o footer
            const isInHeader = scrollTop < headerHeight;
            const isInFooter = scrollTop > footerStart;
            
            if (isInHeader || isInFooter) {
                socialIcons.style.opacity = '0';
                socialIcons.style.pointerEvents = 'none';
                socialIcons.style.transform = 'translateX(-20px)';
                socialIcons.style.transition = 'all 0.3s ease-in-out';
            } else {
                socialIcons.style.opacity = '1';
                socialIcons.style.pointerEvents = 'auto';
                socialIcons.style.transform = 'translateX(0)';
                socialIcons.style.transition = 'all 0.3s ease-in-out';
            }
        }
        
        updateIconsVisibility();
        window.addEventListener('scroll', updateIconsVisibility);
        window.addEventListener('resize', updateIconsVisibility);
    })();

    // Inicializar lazy loading para imágenes
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});

// Exportar funciones globales
window.showNotification = showNotification;