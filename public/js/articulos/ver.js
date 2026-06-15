document.addEventListener('DOMContentLoaded', function() {
    // Aplicar estilos forzados a listas dentro del contenido
    (function applyListStyles() {
        const lists = document.querySelectorAll('#article-content ul, #article-content ol, .prose ul, .prose ol');
        lists.forEach(function(list) {
            list.style.listStyleType = list.tagName === 'UL' ? 'disc' : 'decimal';
            list.style.listStylePosition = 'outside';
            list.style.marginLeft = '1.5rem';
            list.style.paddingLeft = '0';
            const listItems = list.querySelectorAll('li');
            listItems.forEach(function(item) {
                item.style.display = 'list-item';
                item.style.listStylePosition = 'outside';
                item.style.marginBottom = '0.5rem';
            });
            if (list.tagName === 'UL') {
                const nestedUL = list.querySelectorAll('ul');
                nestedUL.forEach(function(nested, index) {
                    if (index === 0) nested.style.listStyleType = 'circle';
                    else if (index === 1) nested.style.listStyleType = 'square';
                });
            } else if (list.tagName === 'OL') {
                const nestedOL = list.querySelectorAll('ol');
                nestedOL.forEach(function(nested, index) {
                    if (index === 0) nested.style.listStyleType = 'lower-alpha';
                    else if (index === 1) nested.style.listStyleType = 'lower-roman';
                });
            }
        });
    })();

    // Visibilidad de iconos sociales (selector unificado usado en vistas)
    (function controlSocialIconsVisibility() {
        const socialIcons = document.getElementById('social-icons');
        if (!socialIcons) return;
        function updateIconsVisibility() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;
            
            // Definir zonas donde ocultar los iconos - más amplias para mejor UX
            const headerHeight = 600; // Zona del header donde ocultar (más amplia)
            const footerStart = documentHeight - windowHeight - 400; // Zona del footer donde ocultar (más amplia)
            
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

    // Funcionalidad de colapsar/expandir tabla de contenido
    const tocHeader = document.querySelector('.toc-header');
    const tocContent = document.querySelector('.toc-content');
    const tocIcon = document.querySelector('.toc-icon');
    
    if (tocHeader && tocContent && tocIcon) {
        // Inicializar estado colapsado
        tocContent.style.display = 'none';
        
        tocHeader.addEventListener('click', function() {
            const isCollapsed = tocContent.style.display === 'none';
            
            if (isCollapsed) {
                // Expandir
                tocContent.style.display = 'block';
                tocIcon.style.transform = 'rotate(180deg)';
            } else {
                // Colapsar
                tocContent.style.display = 'none';
                tocIcon.style.transform = 'rotate(0deg)';
            }
        });
    }

    // Funcionalidad de la tabla de contenido
    const tocLinks = document.querySelectorAll('.toc-link');
    
    tocLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('data-target');
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                // Scroll suave hacia la sección con offset para el header fijo
                const headerOffset = 100;
                const elementPosition = targetElement.offsetTop - headerOffset;
                
                window.scrollTo({
                    top: elementPosition,
                    behavior: 'smooth'
                });
                
                // Resaltar la sección temporalmente
                targetElement.style.transition = 'background-color 0.3s ease';
                targetElement.style.backgroundColor = 'rgba(59, 130, 246, 0.1)'; // Azul con transparencia
                
                setTimeout(() => {
                    targetElement.style.backgroundColor = '';
                }, 2000);
                
                // Colapsar la tabla de contenido después del click
                if (tocContent && tocIcon) {
                    tocContent.style.display = 'none';
                    tocIcon.style.transform = 'rotate(0deg)';
                }
            }
        });
    });

    // Actualizar el enlace activo en la tabla de contenido según el scroll
    function updateActiveTocLink() {
        // Buscar tanto las secciones de artículos como los encabezados automáticos
        const articleSections = document.querySelectorAll('article[id]');
        const autoSections = document.querySelectorAll('h2[id], h3[id], h4[id], [id^="auto-section-"]');
        const allSections = [...articleSections, ...autoSections];
        const tocLinks = document.querySelectorAll('.toc-link');
        
        if (allSections.length === 0 || tocLinks.length === 0) return;
        
        let currentSection = '';
        const scrollTop = window.pageYOffset;
        const headerOffset = 150; // Offset para el header
        
        allSections.forEach(section => {
            const sectionTop = section.offsetTop - headerOffset;
            
            if (scrollTop >= sectionTop) {
                currentSection = section.getAttribute('id');
            }
        });
        
        // Actualizar estilos de los enlaces
        tocLinks.forEach(link => {
            const targetId = link.getAttribute('data-target');
            if (targetId === currentSection) {
                link.classList.add('text-blue-600', 'font-semibold', 'bg-blue-50');
                link.classList.remove('text-gray-600');
            } else {
                link.classList.remove('text-blue-600', 'font-semibold', 'bg-blue-50');
                link.classList.add('text-gray-600');
            }
        });
    }
    
    // Agregar IDs automáticamente a los encabezados del contenido
    function addIdsToHeadings() {
        // Buscar encabezados HTML existentes en el contenido del artículo
        const headings = document.querySelectorAll('#article-content h2, #article-content h3, #article-content h4, .prose h2, .prose h3, .prose h4, article h2, article h3, article h4');
        headings.forEach((heading, index) => {
            if (!heading.id) {
                const text = heading.textContent.trim();
                const id = 'auto-section-' + (index + 1);
                heading.id = id;
            }
        });
        
        // También buscar elementos con IDs que empiecen con 'auto-section-'
        const autoSections = document.querySelectorAll('[id^="auto-section-"]');
        autoSections.forEach((section, index) => {
            if (!section.id || section.id === '') {
                section.id = 'auto-section-' + (index + 1);
            }
        });
        
        // Si no encontramos encabezados, buscar elementos que parezcan títulos
        if (headings.length === 0) {
            const contentDiv = document.getElementById('article-content');
            if (contentDiv) {
                const paragraphs = contentDiv.querySelectorAll('p');
                let sectionIndex = 1;
                paragraphs.forEach(p => {
                    const text = p.textContent.trim();
                    // Si el párrafo parece un título (empieza con mayúscula, no termina con punto, etc.)
                    if (text.length > 10 && 
                        text.length < 100 && 
                        /^[A-ZÁÉÍÓÚÑ]/.test(text) && 
                        !text.endsWith('.') && 
                        !text.endsWith('!') && 
                        !text.endsWith('?')) {
                        p.id = 'auto-section-' + sectionIndex;
                        sectionIndex++;
                    }
                });
            }
        }
    }
    
    // Ejecutar al cargar y en cada scroll
    addIdsToHeadings();
    updateActiveTocLink();
    window.addEventListener('scroll', updateActiveTocLink);

    // Scroll automático para artículos relacionados
    function initRelatedArticlesScroll() {
        const scrollContainer = document.getElementById('related-articles-scroll');
        if (!scrollContainer) return;

        let isScrolling = false;
        const scrollSpeed = 1; // píxeles por frame
        const articleWidth = 350; // ancho de cada artículo + espacio

        function autoScroll() {
            if (isScrolling) return;

            const maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;
            const currentScroll = scrollContainer.scrollLeft;

            // Si llegamos al final, volver al inicio inmediatamente
            if (currentScroll >= maxScroll) {
                scrollContainer.scrollLeft = 0;
                return;
            }

            // Continuar el scroll hacia la derecha
            scrollContainer.scrollLeft += scrollSpeed;
        }

        // Iniciar scroll automático
        const scrollInterval = setInterval(autoScroll, 16); // ~60fps

        // Pausar scroll al hacer hover
        scrollContainer.addEventListener('mouseenter', () => {
            isScrolling = true;
        });

        scrollContainer.addEventListener('mouseleave', () => {
            isScrolling = false;
        });

    }

    // Generar tabla de contenido si no hay enlaces aún
    (function generateTableOfContentsIfEmpty() {
        const tocContent = document.querySelector('.toc-content nav');
        if (!tocContent) return;
        if (tocContent.querySelectorAll('.toc-link').length > 0) return;

        const headings = document.querySelectorAll('#article-content h1, #article-content h2, #article-content h3, #article-content h4, .prose h1, .prose h2, .prose h3, .prose h4');
        let sectionsFound = [];
        if (headings.length > 0) {
            headings.forEach((heading, index) => {
                if (!heading.id) heading.id = 'auto-section-' + (index + 1);
                sectionsFound.push({ title: heading.textContent.trim(), id: heading.id });
            });
        } else {
            const contentDiv = document.getElementById('article-content');
            if (contentDiv) {
                const paragraphs = contentDiv.querySelectorAll('p');
                let sectionIndex = 1;
                paragraphs.forEach(p => {
                    const text = p.textContent.trim();
                    if (text.length > 10 && text.length < 100 && /^[A-ZÁÉÍÓÚÑ]/.test(text) && !/[.!?]$/.test(text)) {
                        if (!p.id) p.id = 'auto-section-' + sectionIndex;
                        sectionsFound.push({ title: text, id: p.id });
                        sectionIndex++;
                    }
                });
            }
        }
        if (sectionsFound.length > 0) {
            tocContent.innerHTML = '';
            sectionsFound.forEach(section => {
                const link = document.createElement('a');
                link.href = '#' + section.id;
                link.className = 'block text-sm text-slate-300 hover:text-cyan-400 transition-colors py-2 toc-link';
                link.setAttribute('data-target', section.id);
                link.textContent = section.title;
                tocContent.appendChild(link);
            });
        }
    })();

    // Inicializar scroll automático
    initRelatedArticlesScroll();
});

// Función para copiar enlace
function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        showNotification('Enlace copiado al portapapeles', 'success');
    }).catch(() => {
        // Fallback para navegadores que no soportan clipboard API
        const textArea = document.createElement('textarea');
        textArea.value = window.location.href;
        document.body.appendChild(textArea);
        textArea.select();
        try {
            document.execCommand('copy');
            showNotification('Enlace copiado al portapapeles', 'success');
        } catch (err) {
            showNotification('No se pudo copiar el enlace', 'error');
        }
        document.body.removeChild(textArea);
    });
}

// Función para mostrar notificaciones con SweetAlert2
function showNotification(message, type = 'success') {
    const icon = type === 'success' ? 'success' : 'error';
    const title = type === 'success' ? 'Éxito' : 'Error';
    const confirmButtonColor = type === 'success' ? '#10b981' : '#ef4444';
    
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
