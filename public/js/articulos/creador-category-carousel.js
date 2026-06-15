// Funcionalidad de filtros para creadores (buscador y select de categorías)
document.addEventListener('DOMContentLoaded', function() {
    initializeFilters();
});

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
                performFilter(categoria, busqueda);
            }, 500);
        });
        
        // Permitir búsqueda con Enter
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                clearTimeout(searchTimeout);
                const busqueda = e.target.value.trim();
                const categoria = categorySelect ? categorySelect.value : '';
                performFilter(categoria, busqueda);
            }
        });
    }
    
    // Event listener para el select de categorías
    if (categorySelect) {
        categorySelect.addEventListener('change', function(e) {
            const categoria = e.target.value;
            const busqueda = searchInput ? searchInput.value.trim() : '';
            updateCategoryIcon(categoria);
            performFilter(categoria, busqueda);
        });
        
        // Actualizar icono inicial
        updateCategoryIcon(categorySelect.value);
    }
}

// Función para realizar el filtrado con búsqueda y categoría
function performFilter(categoria, busqueda) {
    // Mostrar loading en el grid
    const articlesGrid = document.getElementById('articlesGrid');
    if (articlesGrid) {
        articlesGrid.innerHTML = `
            <div class="col-span-full flex justify-center items-center py-20">
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-2xl mb-4">
                        <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">Cargando artículos...</p>
                </div>
            </div>
        `;
    }

    // Construir URL con parámetros
    const url = new URL(window.location.pathname, window.location.origin);
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

    fetch(url.toString(), {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'text/html'
        }
    })
    .then(response => response.text())
    .then(html => {
        // Crear un elemento temporal para parsear el HTML
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;
        
        // Extraer el grid de artículos
        const newGrid = tempDiv.querySelector('#articlesGrid');
        if (newGrid && articlesGrid) {
            articlesGrid.innerHTML = newGrid.innerHTML;
        }
        
        // Actualizar paginación si existe
        const paginationContainer = document.querySelector('.mt-12.flex.justify-center, .pagination-container');
        const newPagination = tempDiv.querySelector('.mt-12.flex.justify-center, .pagination-container');
        if (paginationContainer && newPagination) {
            paginationContainer.innerHTML = newPagination.innerHTML;
        } else if (paginationContainer && !newPagination) {
            paginationContainer.style.display = 'none';
        }
        
        // Actualizar URL sin recargar
        window.history.pushState({}, '', url.toString());
    })
    .catch(error => {
        console.error('Error al filtrar artículos:', error);
        
        // Restaurar contenido original en caso de error
        if (articlesGrid) {
            articlesGrid.innerHTML = `
                <div class="col-span-full">
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-3xl mb-6">
                            <span class="material-icons text-4xl text-gray-400 dark:text-gray-600">article</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Error al cargar</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Hubo un problema al cargar los artículos. Intenta recargar la página.</p>
                    </div>
                </div>
            `;
        }
    });
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
function clearSearch() {
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.value = '';
        const categorySelect = document.getElementById('categorySelect');
        const categoria = categorySelect ? categorySelect.value : '';
        performFilter(categoria, '');
    }
}

// Función para limpiar todos los filtros
function clearAllFilters() {
    const searchInput = document.getElementById('searchInput');
    const categorySelect = document.getElementById('categorySelect');
    
    if (searchInput) searchInput.value = '';
    if (categorySelect) {
        categorySelect.value = '';
        updateCategoryIcon('');
    }
    
    performFilter('', '');
}

// Función global para compatibilidad
window.filterByCategory = function(categoria) {
    const searchInput = document.getElementById('searchInput');
    const busqueda = searchInput ? searchInput.value.trim() : '';
    updateCategoryIcon(categoria);
    performFilter(categoria, busqueda);
};

window.performFilter = performFilter;
window.clearSearch = clearSearch;
window.clearAllFilters = clearAllFilters;
window.updateCategoryIcon = updateCategoryIcon;
