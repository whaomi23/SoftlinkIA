// Funciones para el catálogo de cursos
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar filtros al cargar la página
    const urlParams = new URLSearchParams(window.location.search);
    const selectedNivel = urlParams.get('nivel') || '';
    updateLevelFilterButtons(selectedNivel);
});

// Función para filtrar por nivel
function filterByLevel(nivel) {
    const url = new URL(window.location);
    
    if (nivel) {
        url.searchParams.set('nivel', nivel);
    } else {
        url.searchParams.delete('nivel');
    }
    
    // Actualizar botones antes de navegar
    updateLevelFilterButtons(nivel);
    
    // Navegar a la nueva URL
    window.location.href = url.toString();
}

// Función para actualizar el estado visual de los botones de filtro
function updateLevelFilterButtons(selectedNivel) {
    const filterButtons = document.querySelectorAll('[onclick^="filterByLevel"]');
    
    filterButtons.forEach(button => {
        const onclick = button.getAttribute('onclick');
        const nivel = onclick.match(/filterByLevel\('([^']*)'\)/)?.[1] || '';
        
        // Definir los gradientes específicos para cada nivel
        const gradients = {
            '': 'bg-gradient-to-r from-blue-500 via-purple-600 to-pink-600 text-white shadow-2xl shadow-blue-500/30',
            'principiante': 'bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600 text-white shadow-2xl shadow-green-500/30',
            'intermedio': 'bg-gradient-to-r from-yellow-500 via-orange-600 to-red-600 text-white shadow-2xl shadow-yellow-500/30',
            'avanzado': 'bg-gradient-to-r from-purple-500 via-indigo-600 to-blue-600 text-white shadow-2xl shadow-purple-500/30'
        };
        
        const inactiveClass = 'bg-white/90 dark:bg-slate-800/90 text-gray-700 dark:text-gray-300 border border-gray-200/60 dark:border-slate-700/60';
        
        if (nivel === selectedNivel) {
            // Botón activo - aplicar el gradiente específico del nivel
            const activeClass = gradients[nivel] || gradients[''];
            
            // Remover todas las clases de gradiente posibles
            button.className = button.className.replace(
                /bg-gradient-to-r from-[^"]*text-white shadow-2xl shadow-[^"]*/g,
                ''
            );
            
            // Remover clases inactivas
                button.className = button.className.replace(
                /bg-white\/90 dark:bg-slate-800\/90 text-gray-700 dark:text-gray-300 border border-gray-200\/60 dark:border-slate-700\/60/g,
                ''
                );
            
            // Agregar la clase activa específica
            button.className = button.className.trim() + ' ' + activeClass;
            } else {
            // Botón inactivo
            // Remover todas las clases de gradiente posibles
                button.className = button.className.replace(
                /bg-gradient-to-r from-[^"]*text-white shadow-2xl shadow-[^"]*/g,
                ''
            );
            
            // Agregar clase inactiva si no existe
            if (!button.className.includes('bg-white/90')) {
                button.className = button.className.trim() + ' ' + inactiveClass;
            }
        }
        
        // Limpiar espacios extra
        button.className = button.className.replace(/\s+/g, ' ').trim();
    });
}

// Función para manejar la búsqueda
function handleSearch() {
    const searchInput = document.querySelector('input[name="q"]');
    const form = document.querySelector('form[method="GET"]');
    
    if (searchInput && form) {
        // Agregar evento de búsqueda en tiempo real (opcional)
        searchInput.addEventListener('input', function() {
            // Aquí podrías implementar búsqueda en tiempo real si lo deseas
        });
    }
}

// Función para manejar filtros de precio y orden
function handleFilters() {
    const selects = document.querySelectorAll('select[name="precio_max"], select[name="orden"]');
    
    selects.forEach(select => {
        select.addEventListener('change', function() {
            const form = this.closest('form');
            if (form) {
                form.submit();
            }
        });
    });
}

// Inicializar todas las funciones
document.addEventListener('DOMContentLoaded', function() {
    handleSearch();
    handleFilters();
});