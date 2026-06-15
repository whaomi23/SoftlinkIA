// Funciones para el catálogo de artículos asíncrono
document.addEventListener('DOMContentLoaded', function() {
    // Obtener elementos del DOM
    const articlesGrid = document.querySelector('.articles-grid');
    const paginationContainer = document.querySelector('.pagination-container');
    
    // Buscar botones de filtro (compatibilidad con ambos formatos)
    let filterButtons = document.querySelectorAll('button[onclick*="filterByCategory"], button[data-categoria], .filter-category');

    function showLoading() {
        // Solo mostrar loading si hay una búsqueda activa
        const loadingIndicator = document.getElementById('loading-indicator');
        if (loadingIndicator) {
            loadingIndicator.style.display = 'flex';
        }
        
        if (articlesGrid) {
            articlesGrid.style.opacity = '0.5';
            articlesGrid.style.pointerEvents = 'none';
        }
    }

    function hideLoading() {
        const loadingIndicator = document.getElementById('loading-indicator');
        if (loadingIndicator) {
            loadingIndicator.style.display = 'none';
        }
        
        if (articlesGrid) {
            articlesGrid.style.opacity = '1';
            articlesGrid.style.pointerEvents = 'auto';
        }
    }

    function updateURL(categoria, busqueda) {
        const url = new URL(window.location);
        if (categoria) {
            url.searchParams.set('categoria', categoria);
        } else {
            url.searchParams.delete('categoria');
        }
        if (busqueda) {
            url.searchParams.set('busqueda', busqueda);
        } else {
            url.searchParams.delete('busqueda');
        }
        window.history.pushState({}, '', url);
    }

    function performSearch(categoria = null, busqueda = null) {
        showLoading();
        updateURL(categoria, busqueda);
        
        const searchUrl = new URL(window.location.pathname, window.location.origin);
        if (categoria) {
            searchUrl.searchParams.set('categoria', categoria);
        }
        if (busqueda) {
            searchUrl.searchParams.set('busqueda', busqueda);
        }

        fetch(searchUrl.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
        .then(response => response.text())
        .then(html => {
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;
            const newGrid = tempDiv.querySelector('.articles-grid');
            if (newGrid && articlesGrid) articlesGrid.innerHTML = newGrid.innerHTML;
            const newPagination = tempDiv.querySelector('.pagination-container');
            if (paginationContainer && newPagination) {
                paginationContainer.innerHTML = newPagination.innerHTML;
                paginationContainer.style.display = 'block';
                attachPaginationListeners();
            } else if (paginationContainer) {
                paginationContainer.style.display = 'none';
            }
            hideLoading();
        })
        .catch(() => {
            hideLoading();
            showError();
        });
    }

    function showError() {
        if (articlesGrid) {
            articlesGrid.innerHTML = `
                <div class="col-span-full">
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-red-100 to-red-200 dark:from-red-900/30 dark:to-red-800/30 rounded-3xl mb-6">
                            <span class="material-icons text-4xl text-red-500">error</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Error al cargar</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Hubo un problema al cargar los artículos. Intenta recargar la página.</p>
                        <button onclick="window.location.reload()" class="inline-flex items-center px-6 py-3 text-white rounded-xl font-medium transition-all duration-300" style="background: linear-gradient(135deg, #02AFC9 0%, #6D9F3E 100%);">
                            <span class="material-icons text-sm mr-2">refresh</span>
                            Recargar página
                        </button>
                    </div>
                </div>
            `;
        }
    }

    function updateFilterButtons(categoria) {
        // Obtener todos los botones de filtro (tanto los nuevos como los antiguos)
        const allFilterButtons = document.querySelectorAll('button[onclick*="filterByCategory"], button[data-categoria], .filter-category');
        
        allFilterButtons.forEach(button => {
            let buttonCategoria = '';
            
            // Obtener la categoría del botón según el formato usado
            if (button.onclick && button.onclick.toString().includes('filterByCategory')) {
                // Extraer la categoría del onclick="filterByCategory('categoria')"
                const match = button.onclick.toString().match(/filterByCategory\('([^']*)'\)/);
                buttonCategoria = match ? match[1] : '';
            } else if (button.dataset.categoria !== undefined) {
                buttonCategoria = button.dataset.categoria;
            }
            
            const isActive = (categoria === buttonCategoria) || (!categoria && !buttonCategoria);
            
            // Verificar si el botón está dentro del contenedor KIBI
            const isKIBIButton = button.closest('.kibi-category-filters') || button.closest('[class*="KIBI"]');
            
            if (isKIBIButton) {
                // Para botones KIBI: usar colores KIBI
                if (isActive) {
                    // Estado activo: gradiente KIBI
                    button.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200', 'hover:bg-gray-50');
                    button.classList.add('text-white', 'shadow-lg');
                    button.style.background = 'linear-gradient(135deg, #02AFC9 0%, #6D9F3E 100%)';
                    button.style.border = 'none';
                } else {
                    // Estado inactivo: fondo blanco
                    button.classList.remove('text-white', 'shadow-lg');
                    button.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200', 'hover:bg-gray-50');
                    button.style.background = '';
                    button.style.border = '';
                }
            } else {
                // Para botones no-KIBI: usar colores originales azul-púrpura
                if (isActive) {
                    // Estado activo: gradiente azul-púrpura original
                    button.classList.remove('bg-white/80', 'dark:bg-slate-800/80', 'text-gray-700', 'dark:text-gray-300', 'border', 'border-gray-200/50', 'dark:border-slate-700/50');
                    button.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-purple-600', 'text-white', 'shadow-lg', 'shadow-blue-500/25');
                } else {
                    // Estado inactivo: fondo blanco/gris original
                    button.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-purple-600', 'text-white', 'shadow-lg', 'shadow-blue-500/25');
                    button.classList.add('bg-white/80', 'dark:bg-slate-800/80', 'text-gray-700', 'dark:text-gray-300', 'border', 'border-gray-200/50', 'dark:border-slate-700/50');
                }
            }
        });
    }

    function attachPaginationListeners() {
        const paginationLinks = document.querySelectorAll('.pagination-container a');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = new URL(this.href);
                const categoria = url.searchParams.get('categoria');
                const busqueda = url.searchParams.get('busqueda');
                performSearch(categoria, busqueda);
            });
        });
    }

    // Agregar event listeners a los botones de filtro
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            let categoria = '';
            
            // Obtener la categoría según el formato del botón
            if (this.onclick && this.onclick.toString().includes('filterByCategory')) {
                // Para botones con onclick="filterByCategory('categoria')"
                const match = this.onclick.toString().match(/filterByCategory\('([^']*)'\)/);
                categoria = match ? match[1] : '';
            } else if (this.dataset.categoria !== undefined) {
                // Para botones con data-categoria
                categoria = this.dataset.categoria;
            }
            
            updateFilterButtons(categoria);
            performSearch(categoria);
        });
    });

    attachPaginationListeners();

    // Inicializar filtros (buscador y select)
    initializeFilters();

    window.addEventListener('popstate', function() {
        const url = new URL(window.location);
        const categoria = url.searchParams.get('categoria');
        const busqueda = url.searchParams.get('busqueda');
        updateFilterButtons(categoria);
        performSearch(categoria, busqueda);
    });

    // Función global para compatibilidad con el admin
    window.filterByCategory = function(categoria) {
        const searchInput = document.getElementById('searchInput');
        const busqueda = searchInput ? searchInput.value.trim() : '';
        // Actualizar estados visuales de los botones
        updateFilterButtons(categoria);
        // Actualizar icono
        updateCategoryIcon(categoria);
        // Realizar búsqueda
        performSearch(categoria, busqueda);
    };

    // Función para inicializar los filtros (buscador y select de categorías)
    function initializeFilters() {
        const searchInput = document.getElementById('searchInput');
        const categorySelect = document.getElementById('categorySelect');
        
        let searchTimeout;
        
        // Event listener para el buscador
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                clearTimeout(searchTimeout);
                const busqueda = e.target.value.trim();
                
                // Debounce: esperar 500ms después de que el usuario deje de escribir
                searchTimeout = setTimeout(() => {
                    const categoria = categorySelect ? categorySelect.value : '';
                    performSearch(categoria, busqueda);
                }, 500);
            });
            
            // Permitir búsqueda con Enter
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    clearTimeout(searchTimeout);
                    const busqueda = e.target.value.trim();
                    const categoria = categorySelect ? categorySelect.value : '';
                    performSearch(categoria, busqueda);
                }
            });
        }
        
        // Event listener para el select de categorías
        if (categorySelect) {
            categorySelect.addEventListener('change', function(e) {
                const categoria = e.target.value;
                const busqueda = searchInput ? searchInput.value.trim() : '';
                updateCategoryIcon(categoria);
                performSearch(categoria, busqueda);
            });
            
            // Actualizar icono inicial
            updateCategoryIcon(categorySelect.value);
        }
    }

    // Función para actualizar el icono de la categoría seleccionada
    function updateCategoryIcon(categoria) {
        const categoryIcon = document.getElementById('categoryIcon');
        const categorySelect = document.getElementById('categorySelect');
        
        if (categoryIcon && categorySelect) {
            let iconName = 'apps'; // Icono por defecto para "Todas las categorías"
            
            if (categoria) {
                const selectedOption = categorySelect.querySelector(`option[value="${categoria}"]`);
                if (selectedOption && selectedOption.dataset.icon) {
                    iconName = selectedOption.dataset.icon;
                } else {
                    // Intentar obtener del data-icons del select
                    try {
                        const iconsData = JSON.parse(categorySelect.dataset.icons || '{}');
                        if (iconsData[categoria] && iconsData[categoria].icon) {
                            iconName = iconsData[categoria].icon;
                        }
                    } catch (e) {
                        console.warn('No se pudo parsear los iconos de categorías');
                    }
                }
            }
            
            // Determinar si hay una categoría seleccionada para aplicar el estilo correcto
            if (categoria) {
                categoryIcon.innerHTML = `
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-lg blur-sm"></div>
                        <span class="material-icons relative text-purple-400 transition-all duration-300">${iconName}</span>
                    </div>
                `;
            } else {
                categoryIcon.innerHTML = `<span class="material-icons text-slate-400 transition-all duration-300">${iconName}</span>`;
            }
        }
    }

    // Función para limpiar la búsqueda
    window.clearSearch = function() {
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.value = '';
            const categorySelect = document.getElementById('categorySelect');
            const categoria = categorySelect ? categorySelect.value : '';
            performSearch(categoria, '');
        }
    };
    
    // Función para limpiar todos los filtros
    window.clearAllFilters = function() {
        const searchInput = document.getElementById('searchInput');
        const categorySelect = document.getElementById('categorySelect');
        
        if (searchInput) searchInput.value = '';
        if (categorySelect) {
            categorySelect.value = '';
            updateCategoryIcon('');
        }
        
        performSearch('', '');
    };
    
    window.updateCategoryIcon = updateCategoryIcon;

    // ===== CAROUSEL FUNCTIONALITY =====
    let carouselInterval;
    const scrollAmount = 200;
    const autoScrollDelay = 3000;

    function initCarousel() {
        const carousel = document.getElementById('categoryCarousel');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        
        if (!carousel || !prevBtn || !nextBtn) return;

        updateArrowVisibility();

        prevBtn.addEventListener('click', () => {
            stopAutoScroll();
            const scrollLeft = carousel.scrollLeft;
            if (scrollLeft <= 0) {
                // Si está al principio, ir al final
                carousel.scrollTo({
                    left: carousel.scrollWidth,
                    behavior: 'smooth'
                });
            } else {
                carousel.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            }
            startAutoScroll();
        });

        nextBtn.addEventListener('click', () => {
            stopAutoScroll();
            const containerWidth = carousel.clientWidth;
            const scrollWidth = carousel.scrollWidth;
            const scrollLeft = carousel.scrollLeft;
            
            if (scrollLeft >= (scrollWidth - containerWidth - 10)) {
                // Si está al final, ir al principio
                carousel.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
            } else {
                carousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
            startAutoScroll();
        });

        carousel.addEventListener('mouseenter', stopAutoScroll);
        carousel.addEventListener('mouseleave', startAutoScroll);

        startAutoScroll();
        window.addEventListener('resize', updateArrowVisibility);
    }

    function updateArrowVisibility() {
        const carousel = document.getElementById('categoryCarousel');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        
        if (!carousel || !prevBtn || !nextBtn) return;

        const containerWidth = carousel.clientWidth;
        const scrollWidth = carousel.scrollWidth;
        
        if (scrollWidth <= containerWidth) {
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'none';
            stopAutoScroll();
        } else {
            prevBtn.style.display = 'flex';
            nextBtn.style.display = 'flex';
            
            // En un carousel infinito, las flechas siempre están activas
            prevBtn.style.opacity = '1';
            nextBtn.style.opacity = '1';
        }
    }

    function startAutoScroll() {
        stopAutoScroll();
        
        carouselInterval = setInterval(() => {
            const carousel = document.getElementById('categoryCarousel');
            if (!carousel) return;

            const containerWidth = carousel.clientWidth;
            const scrollWidth = carousel.scrollWidth;
            const scrollLeft = carousel.scrollLeft;
            
            if (scrollLeft >= (scrollWidth - containerWidth - 10)) {
                // Cuando llega al final, regresa al principio suavemente
                carousel.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
            } else {
                carousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
            
            setTimeout(updateArrowVisibility, 500);
        }, autoScrollDelay);
    }

    function stopAutoScroll() {
        if (carouselInterval) {
            clearInterval(carouselInterval);
            carouselInterval = null;
        }
    }

    initCarousel();

    // ===== COUNTER ANIMATION FUNCTIONALITY =====
    // Función de easing para animación suave (cúbica hacia afuera)
    function easeOutCubic(t) {
        return 1 - Math.pow(1 - t, 3);
    }

    // Función principal para animar contadores con easing suave
    function animateCounter(element, target, suffix = '', duration = 2500) {
        const start = 0;
        const startTime = performance.now();
        
        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Aplicar easing para una animación más suave
            const easedProgress = easeOutCubic(progress);
            const current = Math.floor(start + (target - start) * easedProgress);
            
            element.textContent = current + suffix;
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                // Asegurar que termine exactamente en el valor objetivo
                element.textContent = target + suffix;
            }
        }
        
        requestAnimationFrame(updateCounter);
    }

    // Inicializar animaciones de contadores con Intersection Observer
    function initCounterAnimations() {
        const counters = document.querySelectorAll('[id$="-counter"]');
        let hasAnimated = false;
        
        counters.forEach((counter) => {
            const target = parseInt(counter.getAttribute('data-target')) || 0;
            const suffix = counter.getAttribute('data-suffix') || '';
            
            // Reset counter to 0 initially
            counter.textContent = '0' + suffix;
            
            // Animate when element comes into view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !hasAnimated) {
                        hasAnimated = true;
                        
                        // Animar todos los contadores al mismo tiempo
                        counters.forEach(counter => {
                            const target = parseInt(counter.getAttribute('data-target')) || 0;
                            const suffix = counter.getAttribute('data-suffix') || '';
                            
                            // Agregar efecto visual durante la animación
                            counter.style.transform = 'scale(1.1)';
                            counter.style.transition = 'transform 0.3s ease-out';
                            
                            animateCounter(counter, target, suffix);
                            
                            // Remover efecto visual después de la animación
                            setTimeout(() => {
                                counter.style.transform = 'scale(1)';
                            }, 2500);
                        });
                        
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.3,
                rootMargin: '0px 0px -50px 0px'
            });
            
            observer.observe(counter);
        });
    }

    // Initialize counter animations
    initCounterAnimations();
});