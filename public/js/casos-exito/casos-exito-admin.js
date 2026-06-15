/*
 * CASOS DE ÉXITO ADMIN - FUNCIONALIDADES PRINCIPALES
 * 
 * Este archivo maneja las funcionalidades principales de administración de casos de éxito
 * sin incluir la configuración de Summernote, que se encuentra en summernote-config.js
 */

// Funciones para el modal de crear
function openCreateModal() {
    const modal = document.getElementById('createModal');
    const modalContent = document.getElementById('createModalContent');
    
    // Prevenir múltiples aperturas
    if (!modal.classList.contains('hidden')) return;
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Animar entrada
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
        
        // Inicializar Summernote después de que el modal esté visible
        setTimeout(() => {
            if (window.SummernoteManager) {
                window.SummernoteManager.initializeCreateEditor();
                // Configurar sincronización automática del editor con el campo hidden
                setupEditorSync('create');
            } else {
                console.error('SummernoteManager no está disponible');
            }
        }, 200);
    }, 10);
}

function closeCreateModal() {
    const modal = document.getElementById('createModal');
    const modalContent = document.getElementById('createModalContent');
    
    // Animar salida
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        document.getElementById('createForm').reset();
        
        // Limpiar Summernote
        if (window.SummernoteManager) {
            window.SummernoteManager.destroyCreateEditor();
        }
        
        // Limpiar previsualizaciones
        document.getElementById('create_banner_preview').classList.add('hidden');
    }, 300);
}

// Funciones para el modal de editar
function openEditModal(casoExitoId) {
    const modal = document.getElementById('editModal');
    const modalContent = document.getElementById('editModalContent');
    
    // Prevenir múltiples aperturas
    if (!modal.classList.contains('hidden')) return;
    
    // Mostrar loading en el botón
    const button = event.target.closest('button');
    if (button) {
        setButtonLoading(button, true, 'Cargando...');
    }
    
    // Obtener datos del caso de éxito
    const isAdmin = window.location.pathname.includes('/admin/');
    const baseUrl = isAdmin ? '/admin/casos-exito' : '/creador/casos-exito';
    
    fetch(`${baseUrl}/${casoExitoId}/edit`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            // Llenar el formulario con los datos
            document.getElementById('edit_titulo').value = data.titulo || '';
            document.getElementById('edit_subtitulo').value = data.subtitulo || '';
            document.getElementById('edit_nivel_dificultad').value = data.nivel_dificultad || '';
            document.getElementById('edit_status').value = data.status || '';
            document.getElementById('edit_url_imagen_banner').value = data.url_imagen_banner || '';
            
            // Mostrar imagen banner existente si la hay
            if (data.url_imagen) {
                const preview = document.getElementById('edit_banner_preview');
                const img = preview.querySelector('img');
                img.src = `/storage/${data.url_imagen}`;
                preview.classList.remove('hidden');
            } else {
                document.getElementById('edit_banner_preview').classList.add('hidden');
            }
            
            // Configurar el formulario
            const editForm = document.getElementById('editForm');
            editForm.action = `${baseUrl}/${casoExitoId}`;

            // Crear/actualizar input hidden con el contenido
            try {
                let hidden = document.getElementById('edit_contenido_hidden');
                if (!hidden) {
                    hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'contenido';
                    hidden.id = 'edit_contenido_hidden';
                    editForm.appendChild(hidden);
                }
                hidden.value = data.contenido || '';
                console.log('Contenido establecido en hidden field:', hidden.value);
            } catch (e) {
                console.warn('No fue posible prellenar input hidden de contenido:', e);
            }
            
            // Mostrar el modal con animación
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
                
                // Asegurar que los checkboxes estén creados antes de establecer categorías
                setTimeout(() => {
                    // Limpiar completamente el estado antes de establecer nuevas categorías
                    const editTagsContainer = document.getElementById('edit_categoria_tags_inline');
                    const editPlaceholder = document.getElementById('edit_categoria_placeholder');
                    
                    if (editTagsContainer) {
                        editTagsContainer.innerHTML = '';
                    }
                    if (editPlaceholder) {
                        editPlaceholder.textContent = 'Selecciona las categorías';
                        editPlaceholder.className = 'text-gray-500 dark:text-gray-400';
                    }
                    
                    // Re-crear checkboxes para asegurar que estén disponibles
                    const editCheckboxesContainer = document.getElementById('edit_categoria_checkboxes');
                    if (editCheckboxesContainer && editCheckboxesContainer.children.length === 0) {
                        if (window.initializeCategorySelector) {
                            // Re-inicializar solo el selector de editar
                            initializeCategorySelector('edit');
                        }
                    }

                    // Establecer categorías después de asegurar que los checkboxes estén listos
                    // Usar reintentos por si el DOM o listeners aún no están listos
                    const trySetCategories = (retries = 10) => {
                        if (window.setSelectedCategories_edit) {
                            try {
                                window.setSelectedCategories_edit(data.categoria || []);
                                return;
                            } catch (err) {
                                console.warn('Error al setSelectedCategories_edit, reintentando...', err);
                            }
                        }
                        if (retries > 0) {
                            setTimeout(() => trySetCategories(retries - 1), 120);
                        } else {
                            console.warn('No se pudo establecer categorías automáticamente');
                        }
                    };
                    trySetCategories(8);
                }, 100);
                
                // Inicializar Summernote después de que el modal esté visible
                setTimeout(() => {
                    if (window.SummernoteManager) {
                        console.log('Inicializando editor de edición con contenido:', data.contenido);
                        // Inicializar editor con el contenido del caso de éxito
                        window.SummernoteManager.initializeEditEditor(data.contenido || '');
                        
                        // Verificar que el contenido se cargó correctamente
                        setTimeout(() => {
                            try {
                                const editorContent = window.SummernoteManager.getEditEditorContent();
                                console.log('Contenido del editor después de inicializar:', editorContent);
                                
                                // Sincronizar con el campo hidden
                                const hidden = document.getElementById('edit_contenido_hidden');
                                if (hidden) {
                                    hidden.value = editorContent || data.contenido || '';
                                    console.log('Campo hidden sincronizado con editor:', hidden.value);
                                }
                                
                                // Configurar sincronización automática del editor con el campo hidden
                                setupEditorSync('edit');
                            } catch (e) {
                                console.warn('Error al verificar contenido del editor:', e);
                            }
                        }, 500);
                    } else {
                        console.error('SummernoteManager no está disponible');
                    }
                }, 200);
            }, 10);
        })
        .catch(error => {
            console.error('Error al cargar datos del caso de éxito:', error);
            showNotification('Error al cargar los datos del caso de éxito', 'error');
        })
        .finally(() => {
            // Restaurar botón
            if (button) {
                setButtonLoading(button, false, 'Editar');
            }
        });
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    const modalContent = document.getElementById('editModalContent');
    
    // Animar salida
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        document.getElementById('editForm').reset();
        
        // Limpiar Summernote
        if (window.SummernoteManager) {
            window.SummernoteManager.destroyEditEditor();
        }
        
        // Limpiar previsualizaciones
        document.getElementById('edit_banner_preview').classList.add('hidden');
        
        // Ocultar opción de eliminar imagen banner
        document.getElementById('edit_remove_banner_option').classList.add('hidden');
        
        // Limpiar categorías seleccionadas
        if (window.setSelectedCategories_edit) {
            window.setSelectedCategories_edit([]);
        }
        
        // Limpiar también el contenedor de tags directamente
        const editTagsContainer = document.getElementById('edit_categoria_tags_inline');
        if (editTagsContainer) {
            editTagsContainer.innerHTML = '';
        }
        
        // Restaurar placeholder
        const editPlaceholder = document.getElementById('edit_categoria_placeholder');
        if (editPlaceholder) {
            editPlaceholder.textContent = 'Selecciona las categorías';
            editPlaceholder.className = 'text-gray-500 dark:text-gray-400';
        }
    }, 300);
}

// Funciones para el modal de eliminar
function openDeleteModal(casoExitoId, titulo) {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('deleteModalContent');
    
    // Prevenir múltiples aperturas
    if (!modal.classList.contains('hidden')) return;
    
    // Actualizar el contenido del modal
    document.getElementById('deleteCasoExitoTitle').textContent = titulo;
    // Determinar base según si estamos en admin o en creador
    const isAdmin = window.location.pathname.includes('/admin/');
    const baseUrl = isAdmin ? '/admin/casos-exito' : '/creador/casos-exito';
    const deleteForm = document.getElementById('deleteForm');
    if (deleteForm) {
        deleteForm.action = `${baseUrl}/${casoExitoId}`;
    }
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Animar entrada
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('deleteModalContent');
    
    // Animar salida
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 300);
}

// Función para manejar el estado de carga de botones
function setButtonLoading(button, isLoading, originalText = null) {
    if (!button) return;
    
    const buttonText = button.querySelector('.button-text') || button.querySelector('span:not(.material-icons)');
    const icon = button.querySelector('.material-icons');
    
    if (isLoading) {
        button.disabled = true;
        button.dataset.loading = 'true';
        
        if (buttonText) {
            button.dataset.originalText = buttonText.textContent;
            buttonText.textContent = 'Cargando...';
        }
        
        if (icon) {
            icon.textContent = 'hourglass_empty';
        }
        
        button.classList.add('opacity-75', 'cursor-not-allowed');
    } else {
        button.disabled = false;
        button.dataset.loading = 'false';
        
        if (buttonText && button.dataset.originalText) {
            buttonText.textContent = originalText || button.dataset.originalText;
        }
        
        if (icon) {
            icon.textContent = icon.dataset.originalIcon || 'edit';
        }
        
        button.classList.remove('opacity-75', 'cursor-not-allowed');
    }
}

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

// Función para manejar la subida de imágenes
function handleImageUpload(input, previewId) {
    const file = input.files[0];
    if (!file) return;
    
    // Validar tipo de archivo
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    if (!allowedTypes.includes(file.type)) {
        showNotification('Por favor selecciona una imagen válida (JPG, PNG, GIF, WebP)', 'error');
        input.value = '';
        return;
    }
    
    // Validar tamaño (máximo 5MB)
    const maxSize = 5 * 1024 * 1024; // 5MB
    if (file.size > maxSize) {
        showNotification('La imagen es demasiado grande. Máximo 5MB', 'error');
        input.value = '';
        return;
    }
    
    // Mostrar previsualización
    const reader = new FileReader();
    reader.onload = function(e) {
        const preview = document.getElementById(previewId);
        if (preview) {
            const img = preview.querySelector('img');
            if (img) {
                img.src = e.target.result;
            }
            preview.classList.remove('hidden');
        }
    };
    reader.readAsDataURL(file);
}

// Función para eliminar imagen banner
function removeBannerImage() {
    const preview = document.getElementById('edit_banner_preview');
    const fileInput = document.getElementById('edit_url_imagen');
    const removeOption = document.getElementById('edit_remove_banner_option');
    
    if (preview) {
        preview.classList.add('hidden');
    }
    
    if (fileInput) {
        fileInput.value = '';
    }
    
    if (removeOption) {
        removeOption.classList.add('hidden');
    }
    
    // Agregar campo oculto para indicar que se debe eliminar la imagen
    const form = document.getElementById('editForm');
    let removeInput = form.querySelector('input[name="remove_banner"]');
    if (!removeInput) {
        removeInput = document.createElement('input');
        removeInput.type = 'hidden';
        removeInput.name = 'remove_banner';
        removeInput.value = '1';
        form.appendChild(removeInput);
    }
}

// Función para filtrar casos de éxito por categoría y/o búsqueda de forma asíncrona
function filterByCategory(categoria) {
    performFilter(categoria, null);
}

// Función para realizar el filtrado con búsqueda y categoría
function performFilter(categoria, busqueda) {
    // Mostrar loading en el grid
    const casosExitoGrid = document.getElementById('casosExitoGrid');
    if (casosExitoGrid) {
        // Forzar limpieza total de tarjetas previas
        while (casosExitoGrid.firstChild) casosExitoGrid.removeChild(casosExitoGrid.firstChild);

        // Insertar solo el loader centrado
        const loaderWrapper = document.createElement('div');
        loaderWrapper.className = 'col-span-full flex justify-center items-center py-20 w-full';
        loaderWrapper.innerHTML = `
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-cyan-100 to-indigo-100 dark:from-cyan-900/30 dark:to-indigo-900/30 rounded-2xl mb-4">
                    <svg class="animate-spin h-8 w-8 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <p class="text-gray-600 dark:text-gray-400">Cargando casos de éxito...</p>
            </div>`;
        casosExitoGrid.appendChild(loaderWrapper);
    }

    // Actualizar estado del select de categoría
    const categorySelect = document.getElementById('categorySelect');
    if (categorySelect) {
        categorySelect.value = categoria || '';
        updateCategoryIcon(categoria);
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
        
        // Extraer el grid de casos de éxito
        const newGrid = tempDiv.querySelector('#casosExitoGrid');
        if (newGrid && casosExitoGrid) {
            casosExitoGrid.innerHTML = newGrid.innerHTML;
        }
        
        // Actualizar contadores
        updateCounters(tempDiv);
        
        // Actualizar paginación si existe e interceptar enlaces
        const paginationContainer = document.querySelector('.pagination-container');
        const newPagination = tempDiv.querySelector('.pagination-container');
        if (paginationContainer && newPagination) {
            paginationContainer.innerHTML = newPagination.innerHTML;
            attachAdminPaginationListeners();
        } else if (paginationContainer) {
            paginationContainer.style.display = 'none';
        }
        
        // Actualizar URL sin recargar
        window.history.pushState({}, '', url.toString());
    })
    .catch(error => {
        console.error('Error al filtrar casos de éxito:', error);
        showNotification('Error al cargar los casos de éxito', 'error');
        
        // Restaurar contenido original en caso de error
        if (casosExitoGrid) {
            casosExitoGrid.innerHTML = `
                <div class="col-span-full">
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-3xl mb-6">
                            <span class="material-icons text-4xl text-gray-400 dark:text-gray-600">emoji_events</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Error al cargar</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Hubo un problema al cargar los casos de éxito. Intenta recargar la página.</p>
                    </div>
                </div>
            `;
        }
    });
}

// Función para actualizar el estado de los botones de filtro
function updateFilterButtons(selectedCategoria) {
    const filterButtons = document.querySelectorAll('[onclick^="filterByCategory"]');
    
    filterButtons.forEach(button => {
        const onclick = button.getAttribute('onclick');
        const categoria = onclick.match(/filterByCategory\('([^']*)'\)/)?.[1] || '';
        
        const isActive = categoria === selectedCategoria;
        const activeClasses = 'bg-gradient-to-r from-cyan-500 to-indigo-600 text-white shadow-lg shadow-cyan-500/25';
        const inactiveClasses = 'bg-white/80 dark:bg-slate-800/80 text-gray-700 dark:text-gray-300 border border-gray-200/50 dark:border-slate-700/50';

        if (isActive) {
            if (!button.className.includes('bg-gradient-to-r')) {
                button.className = button.className
                    .replace(/bg-white\/80|dark:bg-slate-800\/80|text-gray-700|dark:text-gray-300|border-gray-200\/50|dark:border-slate-700\/50|border/g, '')
                    .replace(/\s+/g, ' ').trim();
                button.className += ` ${activeClasses}`;
            }
        } else {
            button.className = button.className
                .replace(/bg-gradient-to-r.*?shadow-cyan-500\/25/g, '')
                .replace(/\s+/g, ' ').trim();
            if (!button.className.includes('bg-white/80')) {
                button.className += ` ${inactiveClasses}`;
            }
        }
    });
}

// Interceptar paginación para admin (AJAX)
function attachAdminPaginationListeners() {
    const paginationLinks = document.querySelectorAll('.pagination-container a');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const url = new URL(this.href);
            // Mantener filtro de categoría si existe
            const categoria = url.searchParams.get('categoria');
            filterByCategory(categoria || '');
        }, { once: true });
    });
}

// Función para actualizar contadores
function updateCounters(tempDiv) {
    // Actualizar contador de casos de éxito totales
    const totalCount = tempDiv.querySelector('[class*="analytics"]')?.nextElementSibling;
    if (totalCount) {
        const currentTotal = document.querySelector('[class*="analytics"]')?.nextElementSibling;
        if (currentTotal) {
            currentTotal.textContent = totalCount.textContent;
        }
    }
    
    // Actualizar contador de casos de éxito publicados
    const publishedCount = tempDiv.querySelector('[class*="visibility"]')?.nextElementSibling;
    if (publishedCount) {
        const currentPublished = document.querySelector('[class*="visibility"]')?.nextElementSibling;
        if (currentPublished) {
            currentPublished.textContent = publishedCount.textContent;
        }
    }
}

// Función para actualizar el grid de casos de éxito dinámicamente
function updateCasosExitoGrid() {
    const casosExitoGrid = document.getElementById('casosExitoGrid');
    if (!casosExitoGrid) {
        console.warn('No se encontró el elemento #casosExitoGrid');
        return;
    }
    
    // Mostrar loading
    casosExitoGrid.innerHTML = `
        <div class="col-span-full flex justify-center items-center py-20">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-2xl mb-4">
                    <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <p class="text-gray-600 dark:text-gray-400">Actualizando casos de éxito...</p>
            </div>
        </div>
    `;
    
    // Obtener la URL actual para mantener filtros
    const currentUrl = window.location.pathname + window.location.search;
    
    // Realizar petición AJAX para obtener el grid actualizado
    fetch(currentUrl, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'text/html',
            'Cache-Control': 'no-cache'
        }
    })
    .then(response => response.text())
    .then(html => {
        // Crear un elemento temporal para parsear el HTML
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;
        
        // Extraer el grid de casos de éxito
        const newGrid = tempDiv.querySelector('#casosExitoGrid');
        if (newGrid) {
            casosExitoGrid.innerHTML = newGrid.innerHTML;
        } else {
            console.warn('No se encontró el grid en la respuesta del servidor');
            casosExitoGrid.innerHTML = `
                <div class="col-span-full">
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-3xl mb-6">
                            <span class="material-icons text-4xl text-gray-400 dark:text-gray-600">emoji_events</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">No hay casos de éxito</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Comienza creando tu primer caso de éxito</p>
                    </div>
                </div>
            `;
        }
        
        // Actualizar contadores
        updateCounters(tempDiv);
        
        // Actualizar paginación si existe
        const paginationContainer = document.querySelector('.mt-12.flex.justify-center');
        const newPagination = tempDiv.querySelector('.mt-12.flex.justify-center');
        if (paginationContainer && newPagination) {
            paginationContainer.innerHTML = newPagination.innerHTML;
        } else if (paginationContainer) {
            paginationContainer.style.display = 'none';
        }
        
        // Re-inicializar event listeners para los nuevos elementos
        initializeNewGridElements();
        
        // Mostrar animación de éxito
        showSuccessAnimation();
        
    })
    .catch(error => {
        console.error('Error al actualizar el grid:', error);
        showNotification('Error al actualizar la lista de casos de éxito', 'error');
        
        // Restaurar contenido original en caso de error
        casosExitoGrid.innerHTML = `
            <div class="col-span-full">
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-3xl mb-6">
                        <span class="material-icons text-4xl text-gray-400 dark:text-gray-600">emoji_events</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Error al cargar</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Hubo un problema al cargar los casos de éxito. Intenta recargar la página.</p>
                    <button onclick="updateCasosExitoGrid()"
                        class="group relative inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <span class="material-icons mr-2">refresh</span>
                        Reintentar
                    </button>
                </div>
            </div>
        `;
    });
}

// Función para inicializar event listeners en elementos nuevos del grid
function initializeNewGridElements() {
    // Re-inicializar event listeners para botones de editar
    const editButtons = document.querySelectorAll('button[onclick^="openEditModal"]');
    editButtons.forEach(button => {
        // Remover listeners existentes para evitar duplicados
        button.removeEventListener('click', handleEditClick);
        // Agregar nuevo listener
        button.addEventListener('click', handleEditClick);
    });
    
    // Re-inicializar event listeners para botones de eliminar
    const deleteButtons = document.querySelectorAll('button[onclick^="openDeleteModal"]');
    deleteButtons.forEach(button => {
        // Remover listeners existentes para evitar duplicados
        button.removeEventListener('click', handleDeleteClick);
        // Agregar nuevo listener
        button.addEventListener('click', handleDeleteClick);
    });
}

// Handlers para los botones del grid
function handleEditClick(event) {
    const onclick = event.target.closest('button').getAttribute('onclick');
    const match = onclick.match(/openEditModal\('([^']+)'\)/);
    if (match) {
        openEditModal(match[1]);
    }
}

function handleDeleteClick(event) {
    const onclick = event.target.closest('button').getAttribute('onclick');
    const match = onclick.match(/openDeleteModal\('([^']+)',\s*'([^']+)'\)/);
    if (match) {
        openDeleteModal(match[1], match[2]);
    }
}

// Función para mostrar animación de éxito
function showSuccessAnimation() {
    const casosExitoGrid = document.getElementById('casosExitoGrid');
    if (!casosExitoGrid) return;
    
    // Agregar clase de animación de éxito
    casosExitoGrid.classList.add('animate-pulse');
    
    // Remover la animación después de un tiempo
    setTimeout(() => {
        casosExitoGrid.classList.remove('animate-pulse');
    }, 1000);
}

// Función para manejar el envío de formularios
function handleFormSubmit(formId, action) {
    const form = document.getElementById(formId);
    if (!form) return;
    
    const submitButton = form.querySelector('button[type="submit"]');
    if (submitButton) {
        setButtonLoading(submitButton, true, 'Guardando...');
    }
    
    // Crear FormData
    const formData = new FormData(form);
    
    // Obtener contenido del editor Summernote
    let content = '';
    console.log('SummernoteManager disponible:', !!window.SummernoteManager);
    console.log('Acción:', action);
    
    if (window.SummernoteManager) {
        if (action === 'create') {
            content = window.SummernoteManager.getCreateEditorContent();
            console.log('Contenido del editor de crear:', content);
        } else if (action === 'edit') {
            content = window.SummernoteManager.getEditEditorContent();
            console.log('Contenido del editor de editar:', content);
        }
    } else {
        console.warn('SummernoteManager no está disponible');
        // Intentar obtener contenido directamente del DOM como fallback
        if (action === 'create') {
            const createEditor = document.getElementById('create_contenido');
            if (createEditor) {
                content = createEditor.innerHTML;
                console.log('Contenido obtenido del DOM (crear):', content);
            }
        } else if (action === 'edit') {
            const editEditor = document.getElementById('edit_contenido');
            if (editEditor) {
                content = editEditor.innerHTML;
                console.log('Contenido obtenido del DOM (editar):', content);
            }
        }
    }
    
    // Establecer el contenido en el FormData
    formData.set('contenido', content);
    
    // También sincronizar con el campo hidden como respaldo
    const hiddenField = document.getElementById(`${action}_contenido_hidden`);
    if (hiddenField) {
        hiddenField.value = content;
        console.log('Campo hidden sincronizado:', hiddenField.value);
    }
    
    // Agregar token CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (csrfToken) {
        formData.append('_token', csrfToken.getAttribute('content'));
    }
    
    // Asegurar que las categorías seleccionadas se incluyan en el FormData
    const selectedCategories = window[`getSelectedCategories_${action}`] ? window[`getSelectedCategories_${action}`]() : [];
    if (selectedCategories.length > 0) {
        // Limpiar categorías existentes del FormData
        formData.delete('categorias[]');
        // Agregar las categorías seleccionadas
        selectedCategories.forEach(categoria => {
            formData.append('categorias[]', categoria);
        });
    }
    
    // Determinar método HTTP
    const method = action === 'edit' ? 'PUT' : 'POST';
    if (method === 'PUT') {
        formData.append('_method', 'PUT');
    }
    
    // Enviar petición
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        // Intentar obtener el mensaje de error del servidor
        return response.json().then(errorData => {
            throw new Error(errorData.message || 'Error en la respuesta del servidor');
        }).catch(() => {
            throw new Error(`Error ${response.status}: ${response.statusText}`);
        });
    })
    .then(data => {
        if (data.success) {
            showNotification(data.message || 'Operación realizada con éxito', 'success');
            
            // Cerrar modal correspondiente
            if (action === 'create') {
                closeCreateModal();
            } else if (action === 'edit') {
                closeEditModal();
            } else if (action === 'delete') {
                closeDeleteModal();
            }
            
            // Actualizar grid dinámicamente en lugar de recargar página
            setTimeout(() => {
                updateCasosExitoGrid();
            }, 800);
        } else {
            throw new Error(data.message || 'Error en la operación');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification(error.message || 'Error al procesar la solicitud', 'error');
    })
    .finally(() => {
        if (submitButton) {
            setButtonLoading(submitButton, false);
        }
    });
}

    // Event listeners para formularios
    document.addEventListener('DOMContentLoaded', function() {
        // Verificar que SummernoteManager esté disponible
        if (window.SummernoteManager) {
            console.log('✅ SummernoteManager disponible para casos de éxito');
        } else {
            console.warn('⚠️ SummernoteManager no está disponible - los editores pueden no funcionar');
        }
        
        // Formulario de crear
        const createForm = document.getElementById('createForm');
        if (createForm) {
            createForm.addEventListener('submit', function(e) {
                e.preventDefault();
                handleFormSubmit('createForm', 'create');
            });
        }
        
        // Formulario de editar
        const editForm = document.getElementById('editForm');
        if (editForm) {
            editForm.addEventListener('submit', function(e) {
                e.preventDefault();
                handleFormSubmit('editForm', 'edit');
            });
        }
        
        // Formulario de eliminar
        const deleteForm = document.getElementById('deleteForm');
        if (deleteForm) {
            deleteForm.addEventListener('submit', function(e) {
                e.preventDefault();
                handleFormSubmit('deleteForm', 'delete');
            });
        }
        
        // Inicializar filtros de búsqueda y categoría
        initializeFilters();
    
    // Event listeners para subida de imágenes
    const createImageInput = document.getElementById('create_url_imagen');
    if (createImageInput) {
        createImageInput.addEventListener('change', function() {
            handleImageUpload(this, 'create_banner_preview');
        });
    }
    
    const editImageInput = document.getElementById('edit_url_imagen');
    if (editImageInput) {
        editImageInput.addEventListener('change', function() {
            handleImageUpload(this, 'edit_banner_preview');
            // Mostrar opción de eliminar imagen existente
            const removeOption = document.getElementById('edit_remove_banner_option');
            if (removeOption) {
                removeOption.classList.remove('hidden');
            }
        });
    }
    
    // Event listener para eliminar imagen banner
    const removeBannerBtn = document.getElementById('remove_banner_btn');
    if (removeBannerBtn) {
        removeBannerBtn.addEventListener('click', removeBannerImage);
    }
    
    // Event listeners para cerrar modales con Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const openModals = document.querySelectorAll('.modal:not(.hidden)');
            openModals.forEach(modal => {
                if (modal.id === 'createModal') {
                    closeCreateModal();
                } else if (modal.id === 'editModal') {
                    closeEditModal();
                } else if (modal.id === 'deleteModal') {
                    closeDeleteModal();
                }
            });
        }
    });
    
    // Event listeners para cerrar modales haciendo clic fuera
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal')) {
            if (e.target.id === 'createModal') {
                closeCreateModal();
            } else if (e.target.id === 'editModal') {
                closeEditModal();
            } else if (e.target.id === 'deleteModal') {
                closeDeleteModal();
            }
        }
    });
    
    // Inicializar selectores de categorías
    initializeCategorySelectors();
    
    // Inicializar elementos del grid
    initializeNewGridElements();

    // Sincronizar estado inicial de filtros según URL
    try {
        const url = new URL(window.location.href);
        const initialCategoria = url.searchParams.get('categoria') || '';
        if (typeof updateFilterButtons === 'function') {
            updateFilterButtons(initialCategoria);
        }
        // Interceptar paginación inicial
        attachAdminPaginationListeners();
    } catch (_) {}
});

// Función para configurar sincronización automática del editor con el campo hidden
function setupEditorSync(action) {
    try {
        const editorElement = document.getElementById(`${action}_contenido`);
        const hiddenField = document.getElementById(`${action}_contenido_hidden`);
        
        if (!editorElement || !hiddenField) {
            console.warn(`No se encontraron elementos para sincronización (${action})`);
            return;
        }
        
        // Configurar sincronización cada vez que cambie el contenido
        const syncContent = () => {
            try {
                if (window.SummernoteManager) {
                    let content = '';
                    if (action === 'create') {
                        content = window.SummernoteManager.getCreateEditorContent();
                    } else if (action === 'edit') {
                        content = window.SummernoteManager.getEditEditorContent();
                    }
                    hiddenField.value = content;
                    console.log(`Contenido sincronizado (${action}):`, content.substring(0, 100) + '...');
                }
            } catch (e) {
                console.warn(`Error en sincronización (${action}):`, e);
            }
        };
        
        // Sincronizar cada 2 segundos mientras el editor esté activo
        const syncInterval = setInterval(syncContent, 2000);
        
        // Limpiar intervalo cuando se cierre el modal
        const modal = document.getElementById(`${action}Modal`);
        if (modal) {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        const target = mutation.target;
                        if (target.classList.contains('hidden')) {
                            clearInterval(syncInterval);
                            observer.disconnect();
                        }
                    }
                });
            });
            observer.observe(modal, { attributes: true });
        }
        
        console.log(`Sincronización configurada para editor ${action}`);
    } catch (e) {
        console.warn(`Error al configurar sincronización (${action}):`, e);
    }
}

// Funciones de utilidad para categorías
function initializeCategorySelectors() {
    // Selector de crear
    initializeCategorySelector('create');
    // Selector de editar
    initializeCategorySelector('edit');
}

// Función para inicializar un selector de categorías específico
function initializeCategorySelector(prefix) {
    const dropdown = document.getElementById(`${prefix}_categoria_dropdown`);
    const options = document.getElementById(`${prefix}_categoria_options`);
    const placeholder = document.getElementById(`${prefix}_categoria_placeholder`);
    const arrow = document.getElementById(`${prefix}_categoria_arrow`);
    const tagsContainer = document.getElementById(`${prefix}_categoria_tags_inline`);
    const checkboxesContainer = document.getElementById(`${prefix}_categoria_checkboxes`);
    
    if (!dropdown || !options || !placeholder || !arrow || !tagsContainer) return;
    
    let isOpen = false;
    let selectedCategories = [];
    
    // Categorías disponibles
    const categoriasDisponibles = [
        { value: 'Desarrollo Web', icon: 'web', color: 'blue' },
        { value: 'Inteligencia Artificial', icon: 'psychology', color: 'purple' },
        { value: 'Ciberseguridad', icon: 'security', color: 'red' },
        { value: 'Cloud Computing', icon: 'cloud', color: 'cyan' },
        { value: 'DevOps', icon: 'settings', color: 'green' },
        { value: 'Mobile Development', icon: 'phone_android', color: 'orange' },
        { value: 'Data Science', icon: 'analytics', color: 'indigo' },
        { value: 'Blockchain', icon: 'account_balance', color: 'yellow' },
        { value: 'IoT', icon: 'devices', color: 'teal' },
        { value: 'UI/UX Design', icon: 'design_services', color: 'pink' },
        { value: 'Gaming', icon: 'sports_esports', color: 'lime' },
        { value: 'Redes', icon: 'router', color: 'amber' }
    ];
    
    // Función para crear los checkboxes dinámicamente (solo si no existen)
    function createCheckboxes() {
        if (!checkboxesContainer) return;
        
        // Solo crear checkboxes si el contenedor está vacío
        if (checkboxesContainer.children.length === 0) {
            checkboxesContainer.innerHTML = categoriasDisponibles.map(categoria => `
                <label class="flex items-center p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-600 cursor-pointer transition-colors duration-200">
                    <input type="checkbox" name="categorias[]" value="${categoria.value}"
                        class="mr-3 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <span class="material-icons text-${categoria.color}-500 mr-2 text-sm">${categoria.icon}</span>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">${categoria.value}</span>
                </label>
            `).join('');
        }
        
        // Re-attach event listeners to the checkboxes
        attachCheckboxListeners();
    }
    
    // Función para adjuntar listeners a los checkboxes
    function attachCheckboxListeners() {
        const checkboxes = checkboxesContainer ? checkboxesContainer.querySelectorAll('input[type="checkbox"]') : [];
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const value = this.value;
                if (this.checked) {
                    // Solo agregar si no está ya en la lista
                    if (!selectedCategories.includes(value)) {
                        selectedCategories.push(value);
                    }
                } else {
                    // Remover de la lista
                    selectedCategories = selectedCategories.filter(cat => cat !== value);
                }
                updateDisplay();
            });
        });
    }
    
    // Crear los checkboxes inicialmente (solo si no existen)
    createCheckboxes();
    
    // Siempre adjuntar listeners a los checkboxes existentes
    attachCheckboxListeners();
    
    // Para el modal de editar, asegurar que se adjunten los listeners cuando se abra el modal
    if (prefix === 'edit') {
        // Adjuntar listeners cuando se abra el modal de editar
        const editModal = document.getElementById('editModal');
        if (editModal) {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        const target = mutation.target;
                        if (!target.classList.contains('hidden')) {
                            // Modal se abrió, adjuntar listeners a los checkboxes existentes
                            setTimeout(() => {
                                attachCheckboxListeners();
                            }, 50);
                        }
                    }
                });
            });
            observer.observe(editModal, { attributes: true });
        }
    }
    
    // Función para actualizar el placeholder y tags
    function updateDisplay() {
        // Limpiar completamente el contenedor de tags primero
        if (tagsContainer) {
            tagsContainer.innerHTML = '';
        }
        
        if (selectedCategories.length === 0) {
            if (placeholder) {
                placeholder.textContent = 'Selecciona las categorías';
                placeholder.className = 'text-gray-500 dark:text-gray-400';
            }
        } else {
            if (placeholder) {
                placeholder.textContent = '';
                placeholder.className = 'text-gray-700 dark:text-gray-300 font-medium';
            }
            
            // Crear tags únicos (sin duplicación)
            const uniqueCategories = [...new Set(selectedCategories)];
            
            // Actualizar tags solo con categorías únicas
            if (tagsContainer) {
                tagsContainer.innerHTML = uniqueCategories.map(category => {
                    const iconMap = {
                        'Desarrollo Web': 'web',
                        'Inteligencia Artificial': 'psychology',
                        'Ciberseguridad': 'security',
                        'Cloud Computing': 'cloud',
                        'DevOps': 'build',
                        'Mobile Development': 'phone_android',
                        'Data Science': 'analytics',
                        'Blockchain': 'account_balance',
                        'IoT': 'sensors',
                        'UI/UX Design': 'palette',
                        'Gaming': 'sports_esports',
                        'Redes': 'router',
                        'Base de Datos': 'storage',
                        'Testing': 'bug_report',
                        'Microservicios': 'account_tree',
                        'API Development': 'api'
                    };
                    const colorMap = {
                        'Desarrollo Web': 'blue',
                        'Inteligencia Artificial': 'purple',
                        'Ciberseguridad': 'red',
                        'Cloud Computing': 'cyan',
                        'DevOps': 'green',
                        'Mobile Development': 'indigo',
                        'Data Science': 'orange',
                        'Blockchain': 'yellow',
                        'IoT': 'teal',
                        'UI/UX Design': 'pink',
                        'Gaming': 'red',
                        'Redes': 'blue',
                        'Base de Datos': 'green',
                        'Testing': 'purple',
                        'Microservicios': 'indigo',
                        'API Development': 'orange'
                    };
                    
                    return `
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-${colorMap[category]}-100 text-${colorMap[category]}-800 dark:bg-${colorMap[category]}-900/30 dark:text-${colorMap[category]}-300 border border-${colorMap[category]}-200 dark:border-${colorMap[category]}-700">
                            <span class="material-icons text-xs mr-1">${iconMap[category]}</span>
                            ${category}
                            <button type="button" onclick="removeCategory('${prefix}', '${category}')" class="ml-1 hover:bg-${colorMap[category]}-200 dark:hover:bg-${colorMap[category]}-800 rounded-full p-0.5 transition-colors">
                                <span class="material-icons text-xs">close</span>
                            </button>
                        </span>
                    `;
                }).join('');
            }
        }
    }
    
    // Función para abrir/cerrar el dropdown
    function toggleDropdown() {
        isOpen = !isOpen;
        if (isOpen) {
            options.classList.remove('hidden');
            arrow.style.transform = 'rotate(180deg)';
            dropdown.classList.add('ring-2', 'ring-cyan-500', 'border-cyan-500');
        } else {
            options.classList.add('hidden');
            arrow.style.transform = 'rotate(0deg)';
            dropdown.classList.remove('ring-2', 'ring-cyan-500', 'border-cyan-500');
        }
    }
    
    // Event listeners
    dropdown.addEventListener('click', toggleDropdown);
    
    // Cerrar dropdown al hacer click fuera
    document.addEventListener('click', function(event) {
        if (!dropdown.contains(event.target) && !options.contains(event.target)) {
            if (isOpen) {
                toggleDropdown();
            }
        }
    });
    
    // Función para remover una categoría (llamada desde los tags)
    window[`removeCategory_${prefix}`] = function(category) {
        const checkbox = checkboxesContainer ? checkboxesContainer.querySelector(`input[value="${category}"]`) : null;
        if (checkbox) {
            checkbox.checked = false;
            selectedCategories = selectedCategories.filter(cat => cat !== category);
            updateDisplay();
        }
    };
    
    // Función para obtener las categorías seleccionadas
    window[`getSelectedCategories_${prefix}`] = function() {
        // Primero intentar obtener de la variable selectedCategories
        if (selectedCategories.length > 0) {
            return [...selectedCategories]; // Retornar una copia para evitar mutaciones
        }
        
        // Si no hay categorías en la variable, intentar obtener de los checkboxes marcados
        const checkboxes = checkboxesContainer ? checkboxesContainer.querySelectorAll('input[type="checkbox"]:checked') : [];
        if (checkboxes.length > 0) {
            return Array.from(checkboxes).map(cb => cb.value);
        }
        
        return [];
    };
    
    // Función para establecer categorías seleccionadas (para editar)
    window[`setSelectedCategories_${prefix}`] = function(categories) {
        // Limpiar completamente el estado
        selectedCategories = [];
        
        // Limpiar tags inmediatamente
        if (tagsContainer) {
            tagsContainer.innerHTML = '';
        }
        
        // Restaurar placeholder inmediatamente
        if (placeholder) {
            placeholder.textContent = 'Selecciona las categorías';
            placeholder.className = 'text-gray-500 dark:text-gray-400';
        }
        
        // Establecer nuevas categorías
        selectedCategories = Array.isArray(categories) ? categories : [categories].filter(Boolean);
        
        // Si no hay categorías, no hacer nada más
        if (selectedCategories.length === 0) {
            return;
        }
        
        // Función para establecer las categorías
        const trySetCategories = () => {
            const checkboxes = checkboxesContainer ? checkboxesContainer.querySelectorAll('input[type="checkbox"]') : [];
            
            if (checkboxes.length === 0) {
                // Si no hay checkboxes, esperar un poco y reintentar
                setTimeout(trySetCategories, 50);
                return;
            }
            
            // Limpiar todos los checkboxes primero
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
            
            // Luego marcar solo las categorías seleccionadas
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectedCategories.includes(checkbox.value);
            });
            
            // Actualizar la variable selectedCategories con las categorías que realmente están marcadas
            selectedCategories = Array.from(checkboxes).filter(cb => cb.checked).map(cb => cb.value);
            
            // Actualizar display solo una vez
            updateDisplay();
        };
        
        // Intentar establecer las categorías inmediatamente
        trySetCategories();
    };
}

// Función para remover una categoría (función global)
function removeCategory(prefix, category) {
    if (window[`removeCategory_${prefix}`]) {
        window[`removeCategory_${prefix}`](category);
    }
}

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
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 via-indigo-500/20 to-cyan-500/20 rounded-lg blur-sm"></div>
                    <span class="material-icons relative text-blue-400 transition-all duration-300">${iconName}</span>
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

// Exportar funciones globales
window.openCreateModal = openCreateModal;
window.closeCreateModal = closeCreateModal;
window.openEditModal = openEditModal;
window.closeEditModal = closeEditModal;
window.openDeleteModal = openDeleteModal;
window.closeDeleteModal = closeDeleteModal;
window.setButtonLoading = setButtonLoading;
window.showNotification = showNotification;
window.handleImageUpload = handleImageUpload;
window.removeBannerImage = removeBannerImage;
window.handleFormSubmit = handleFormSubmit;
window.initializeCategorySelector = initializeCategorySelector;
window.initializeCategorySelectors = initializeCategorySelectors;
window.setSelectedCategories_edit = setSelectedCategories_edit;
window.removeCategory = removeCategory;
window.filterByCategory = filterByCategory;
window.performFilter = performFilter;
window.clearSearch = clearSearch;
window.clearAllFilters = clearAllFilters;
window.updateCategoryIcon = updateCategoryIcon;
window.updateFilterButtons = updateFilterButtons;
window.updateCounters = updateCounters;
window.updateCasosExitoGrid = updateCasosExitoGrid;
window.initializeNewGridElements = initializeNewGridElements;
window.handleEditClick = handleEditClick;
window.handleDeleteClick = handleDeleteClick;
window.showSuccessAnimation = showSuccessAnimation;
window.setupEditorSync = setupEditorSync;

// Manejar navegación del historial para mantener filtro
window.addEventListener('popstate', function() {
    const url = new URL(window.location.href);
    const categoria = url.searchParams.get('categoria') || '';
    updateFilterButtons(categoria);
    // Reutilizar lógica de filtrado asíncrono
    filterByCategory(categoria);
});
