/*
 * CREADOR CATEGORY CAROUSEL - CASOS DE ÉXITO
 * 
 * Manejo del carrusel de categorías para casos de éxito con desplazamiento automático
 */

// Configuración del carrusel de categorías
const categoryCarouselConfig = {
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,
    arrows: true,
    dots: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
};

// Variables para el desplazamiento automático
let carouselInterval;
const scrollAmount = 200;
const autoScrollDelay = 3000;

// Inicializar carrusel de categorías con desplazamiento automático
function initializeCategoryCarousel() {
    const carousel = document.querySelector('.category-carousel');
    if (carousel && typeof $ !== 'undefined' && $.fn.slick) {
        $(carousel).slick(categoryCarouselConfig);
    }
    
    // Inicializar desplazamiento automático para carruseles nativos
    initNativeCarousel();
}

// Inicializar carrusel nativo con desplazamiento automático
function initNativeCarousel() {
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

// Función para manejar la selección de categorías
function handleCategorySelection(categoryElement) {
    const isSelected = categoryElement.classList.contains('selected');
    
    if (isSelected) {
        categoryElement.classList.remove('selected', 'bg-blue-500', 'text-white');
        categoryElement.classList.add('bg-gray-200', 'text-gray-700', 'dark:bg-gray-700', 'dark:text-gray-300');
    } else {
        categoryElement.classList.add('selected', 'bg-blue-500', 'text-white');
        categoryElement.classList.remove('bg-gray-200', 'text-gray-700', 'dark:bg-gray-700', 'dark:text-gray-300');
    }
    
    // Actualizar contador de categorías seleccionadas
    updateSelectedCategoriesCount();
}

// Actualizar contador de categorías seleccionadas
function updateSelectedCategoriesCount() {
    const selectedCategories = document.querySelectorAll('.category-item.selected');
    const counter = document.querySelector('.selected-count');
    
    if (counter) {
        counter.textContent = selectedCategories.length;
    }
}

// Obtener categorías seleccionadas
function getSelectedCategories() {
    const selectedCategories = document.querySelectorAll('.category-item.selected');
    return Array.from(selectedCategories).map(category => ({
        id: category.dataset.categoryId,
        name: category.dataset.categoryName
    }));
}

// Establecer categorías seleccionadas
function setSelectedCategories(categories) {
    // Limpiar selecciones anteriores
    document.querySelectorAll('.category-item.selected').forEach(item => {
        item.classList.remove('selected', 'bg-blue-500', 'text-white');
        item.classList.add('bg-gray-200', 'text-gray-700', 'dark:bg-gray-700', 'dark:text-gray-300');
    });
    
    // Seleccionar nuevas categorías
    categories.forEach(category => {
        const categoryElement = document.querySelector(`[data-category-id="${category.id}"]`);
        if (categoryElement) {
            categoryElement.classList.add('selected', 'bg-blue-500', 'text-white');
            categoryElement.classList.remove('bg-gray-200', 'text-gray-700', 'dark:bg-gray-700', 'dark:text-gray-300');
        }
    });
    
    updateSelectedCategoriesCount();
}

// Función para filtrar casos de éxito por categoría
function filterByCategory(categoryId) {
    const casosExito = document.querySelectorAll('.caso-exito-card');
    
    casosExito.forEach(caso => {
        const casoCategories = caso.dataset.categories ? caso.dataset.categories.split(',') : [];
        
        if (categoryId === 'all' || casoCategories.includes(categoryId)) {
            caso.style.display = 'block';
            caso.classList.add('animate-fade-in');
        } else {
            caso.style.display = 'none';
            caso.classList.remove('animate-fade-in');
        }
    });
    
    // Actualizar estado del botón de filtro
    updateFilterButtonState(categoryId);
}

// Actualizar estado del botón de filtro activo
function updateFilterButtonState(activeCategoryId) {
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
        
        const isActive = (activeCategoryId === buttonCategoria) || (!activeCategoryId && !buttonCategoria);
        
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

// Función para buscar casos de éxito
function searchCasosExito(searchTerm) {
    const casosExito = document.querySelectorAll('.caso-exito-card');
    const term = searchTerm.toLowerCase();
    
    casosExito.forEach(caso => {
        const title = caso.querySelector('.caso-exito-title')?.textContent.toLowerCase() || '';
        const subtitle = caso.querySelector('.caso-exito-subtitle')?.textContent.toLowerCase() || '';
        const content = caso.querySelector('.caso-exito-content')?.textContent.toLowerCase() || '';
        
        if (title.includes(term) || subtitle.includes(term) || content.includes(term)) {
            caso.style.display = 'block';
            caso.classList.add('animate-fade-in');
        } else {
            caso.style.display = 'none';
            caso.classList.remove('animate-fade-in');
        }
    });
}

// Función para ordenar casos de éxito
function sortCasosExito(sortBy) {
    const container = document.querySelector('#casosExitoGrid');
    const casosExito = Array.from(container.querySelectorAll('.caso-exito-card'));
    
    casosExito.sort((a, b) => {
        switch (sortBy) {
            case 'title':
                return a.querySelector('.caso-exito-title')?.textContent.localeCompare(
                    b.querySelector('.caso-exito-title')?.textContent
                ) || 0;
            case 'date':
                const dateA = new Date(a.dataset.createdAt || 0);
                const dateB = new Date(b.dataset.createdAt || 0);
                return dateB - dateA; // Más recientes primero
            case 'difficulty':
                const difficultyOrder = { 'principiante': 1, 'intermedio': 2, 'avanzado': 3 };
                const diffA = difficultyOrder[a.dataset.difficulty] || 0;
                const diffB = difficultyOrder[b.dataset.difficulty] || 0;
                return diffA - diffB;
            default:
                return 0;
        }
    });
    
    // Reorganizar elementos en el DOM
    casosExito.forEach(caso => {
        container.appendChild(caso);
    });
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar carrusel
    initializeCategoryCarousel();
    
    // Inicializar carrusel nativo con desplazamiento automático
    initNativeCarousel();
    
    // Agregar event listeners a los botones de filtro
    document.querySelectorAll('.filter-button').forEach(button => {
        button.addEventListener('click', function() {
            const categoryId = this.dataset.categoryId;
            filterByCategory(categoryId);
        });
    });
    
    // Agregar event listener al campo de búsqueda
    const searchInput = document.querySelector('#searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            searchCasosExito(this.value);
        });
    }
    
    // Agregar event listener al selector de ordenamiento
    const sortSelect = document.querySelector('#sortSelect');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            sortCasosExito(this.value);
        });
    }
    
    // Agregar event listeners a las categorías seleccionables
    document.querySelectorAll('.category-item').forEach(category => {
        category.addEventListener('click', function() {
            handleCategorySelection(this);
        });
    });
});

// Función para actualizar botones de filtro (compatibilidad con catalogo.js)
window.updateFilterButtons = function(categoria) {
    updateFilterButtonState(categoria);
};

// Exportar funciones globales
window.initializeCategoryCarousel = initializeCategoryCarousel;
window.initNativeCarousel = initNativeCarousel;
window.startAutoScroll = startAutoScroll;
window.stopAutoScroll = stopAutoScroll;
window.updateArrowVisibility = updateArrowVisibility;
window.handleCategorySelection = handleCategorySelection;
window.getSelectedCategories = getSelectedCategories;
window.setSelectedCategories = setSelectedCategories;
window.filterByCategory = filterByCategory;
window.searchCasosExito = searchCasosExito;
window.sortCasosExito = sortCasosExito;
