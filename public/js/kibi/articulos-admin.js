/*
 * KIBI ARTICULOS ADMIN - FUNCIONALIDADES PRINCIPALES
 * 
 * Este archivo maneja las funcionalidades principales de administración de artículos KIBI
 * sin incluir la configuración de Summernote, que se encuentra en summernote-config.js
 */

// Función para previsualizar una imagen individual
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    const previewImg = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}

// Función para eliminar previsualización de imagen banner
function removeBannerPreview(previewId, inputId) {
    const preview = document.getElementById(previewId);
    const input = document.getElementById(inputId);
    
    // Ocultar la previsualización
    preview.classList.add('hidden');
    
    // Limpiar el input de archivo
    input.value = '';
    
    // Si es el modal de editar, mostrar la opción de eliminar imagen existente
    if (previewId === 'edit_banner_preview') {
        const removeOption = document.getElementById('edit_remove_banner_option');
        if (removeOption) {
            removeOption.classList.remove('hidden');
        }
    }
}

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
        const createBannerPreview = document.getElementById('create_banner_preview');
        if (createBannerPreview) {
            createBannerPreview.classList.add('hidden');
        }
    }, 300);
}

// Funciones para el modal de editar
function openEditModal(articleSlug) {
    const modal = document.getElementById('editModal');
    const modalContent = document.getElementById('editModalContent');
    
    // Prevenir múltiples aperturas
    if (!modal.classList.contains('hidden')) return;
    
    // Mostrar loading en el botón
    const button = event.target.closest('button');
    if (button) {
        setButtonLoading(button, true, 'Cargando...');
    }
    
    // Obtener datos del artículo - RUTAS KIBI
    const baseUrl = '/kibi/articulos';
    const editUrl = `${baseUrl}/${articleSlug}/edit`;
    
    console.log('Solicitando datos del artículo:', editUrl);
    
    fetch(editUrl, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
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
            console.log('Datos recibidos del servidor:', data);
            
            // Verificar si la respuesta tiene la estructura correcta
            const articulo = data.articulo || data;
            
            // Llenar el formulario con los datos
            console.log('Llenando formulario con datos:', articulo);
            
            document.getElementById('edit_titulo').value = articulo.titulo || '';
            document.getElementById('edit_subtitulo').value = articulo.subtitulo || '';
            document.getElementById('edit_nivel_dificultad').value = articulo.nivel_dificultad || '';
            document.getElementById('edit_status').value = articulo.status || '';
            document.getElementById('edit_url_imagen_banner').value = articulo.url_imagen_banner || '';
            
            console.log('Formulario llenado correctamente');
            
            // Mostrar imagen banner existente si la hay
            if (articulo.url_imagen) {
                const preview = document.getElementById('edit_banner_preview');
                if (preview) {
                    const img = preview.querySelector('img');
                    if (img) {
                        img.src = `/storage/${articulo.url_imagen}`;
                        preview.classList.remove('hidden');
                    }
                }
            } else {
                const preview = document.getElementById('edit_banner_preview');
                if (preview) {
                    preview.classList.add('hidden');
                }
            }
            
            // Configurar el formulario
            document.getElementById('editForm').action = `${baseUrl}/${articleSlug}`;
            
            // Mostrar el modal con animación
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
                
                // Establecer categorías usando el nuevo sistema de chips
                setTimeout(() => {
                    const categorias = data.categorias || (articulo.categoria ? articulo.categoria.split(',').map(c => c.trim()) : []);
                    console.log('Categorías a establecer:', categorias);
                    
                    // Usar el nuevo sistema de chips para establecer categorías
                    if (typeof window.setSelectedCategories_edit === 'function') {
                        window.setSelectedCategories_edit(categorias);
                    }
                }, 150);
                
                // Inicializar Summernote después de que el modal esté visible
                setTimeout(() => {
                    if (window.SummernoteManager) {
                        window.SummernoteManager.initializeEditEditor(articulo.contenido || '');
                    } else {
                        console.error('SummernoteManager no está disponible');
                    }
                }, 200);
            }, 10);
        })
        .catch(error => {
            console.error('Error al cargar datos del artículo:', error);
            showNotification(error.message || 'Error al cargar los datos del artículo', 'error');
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
        const editBannerPreview = document.getElementById('edit_banner_preview');
        if (editBannerPreview) {
            editBannerPreview.classList.add('hidden');
        }
        
        // Ocultar opción de eliminar imagen banner
        const editRemoveBannerOption = document.getElementById('edit_remove_banner_option');
        if (editRemoveBannerOption) {
            editRemoveBannerOption.classList.add('hidden');
        }
        
        // Limpiar categorías seleccionadas usando el nuevo sistema
        if (window.setSelectedCategories_edit) {
            window.setSelectedCategories_edit([]);
        }
    }, 300);
}

// Funciones para el modal de eliminar
function openDeleteModal(articleSlug, articleTitle) {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('deleteModalContent');
    
    // Prevenir múltiples aperturas
    if (!modal.classList.contains('hidden')) return;
    
    // RUTAS KIBI
    const baseUrl = '/kibi/articulos';
    
    document.getElementById('deleteArticleTitle').textContent = articleTitle;
    document.getElementById('deleteForm').action = `${baseUrl}/${articleSlug}`;
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Animar entrada
    setTimeout(() => {
        modalContent.classList.remove('scale-90', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('deleteModalContent');
    
    // Animar salida
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-90', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 300);
}

// Cerrar modales al hacer clic fuera de ellos
document.addEventListener('click', function(event) {
    const createModal = document.getElementById('createModal');
    const editModal = document.getElementById('editModal');
    const deleteModal = document.getElementById('deleteModal');
    
    if (event.target === createModal) {
        closeCreateModal();
    }
    if (event.target === editModal) {
        closeEditModal();
    }
    if (event.target === deleteModal) {
        closeDeleteModal();
    }
});

// Cerrar modales con la tecla Escape
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeCreateModal();
        closeEditModal();
        closeDeleteModal();
    }
});

// Función para previsualizar una imagen individual
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    const previewImg = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}


// Función para eliminar previsualización de imagen banner
function removeBannerPreview(previewId, inputId) {
    const preview = document.getElementById(previewId);
    const input = document.getElementById(inputId);
    
    // Ocultar la previsualización
    preview.classList.add('hidden');
    
    // Limpiar el input de archivo
    input.value = '';
    
    // Si es el modal de editar, mostrar la opción de eliminar imagen existente
    if (previewId === 'edit_banner_preview') {
        const removeOption = document.getElementById('edit_remove_banner_option');
        removeOption.classList.remove('hidden');
    }
}


// Función para manejar el estado de loading de botones
function setButtonLoading(button, isLoading, loadingText = 'Cargando...') {
    const buttonText = button.querySelector('.button-text');
    const icon = button.querySelector('.material-icons');
    
    if (isLoading) {
        button.disabled = true;
        button.dataset.loading = 'true';
        if (buttonText) {
            buttonText.textContent = loadingText;
        }
        if (icon) {
            icon.textContent = 'hourglass_empty';
            icon.classList.add('animate-spin');
        }
    } else {
        button.disabled = false;
        button.dataset.loading = 'false';
        if (buttonText) {
            buttonText.textContent = button.dataset.originalText || 'Editar';
        }
        if (icon) {
            icon.textContent = 'edit';
            icon.classList.remove('animate-spin');
        }
    }
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


// Función para crear el HTML de una tarjeta de artículo
function createArticleCard(article) {
    // RUTAS KIBI
    const baseUrl = '/kibi/articulos';
    
    const cardImg = article.url_imagen 
        ? `/storage/${article.url_imagen}`
        : (article.url_imagen_banner || (article.imagenes && article.imagenes.length > 0 ? `/storage/${article.imagenes[0].ruta_imagen}` : null));
    
    const statusClass = article.status === 'publicado' 
        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
        : article.status === 'borrador' 
        ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
        : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200';
    
    const autorName = `${article.autor.name} ${article.autor.apellido_paterno} ${article.autor.apellido_materno}`;
    const imageCount = article.imagenes ? article.imagenes.length : 0;
    const createdDate = new Date(article.created_at).toLocaleDateString('es-ES');
    
    return `
        <div class="group relative bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-200/50 dark:border-slate-700/50 hover:border-blue-300/50 dark:hover:border-blue-600/50 hover:-translate-y-2">
            <div class="relative h-56 bg-gray-50 dark:bg-gray-800 flex items-center justify-center overflow-hidden">
                ${cardImg 
                    ? `<img src="${cardImg}" alt="${article.titulo}" class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105">`
                    : `<div class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 flex items-center justify-center">
                        <span class="material-icons text-white text-6xl opacity-80">article</span>
                    </div>`
                }
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <div class="p-6">
                <!-- Category and Date -->
                <div class="flex items-center justify-between mb-4">
                    <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 text-blue-700 dark:text-blue-300">
                        <span class="material-icons text-xs mr-1">folder</span>
                        ${article.categoria}
                    </span>
                    <span class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                        <span class="material-icons text-sm mr-1">schedule</span>
                        ${createdDate}
                    </span>
                </div>

                <!-- Title and Subtitle -->
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">${article.titulo}</h3>
                ${article.subtitulo ? `<p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-2 leading-relaxed">${article.subtitulo}</p>` : ''}

                <!-- Author and Images Info -->
                <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-6">
                    <span class="flex items-center">
                        <span class="material-icons text-sm mr-2 text-blue-500">person</span>
                        ${autorName}
                    </span>
                    <span class="flex items-center">
                        <span class="material-icons text-sm mr-2 text-purple-500">collections</span>
                        ${imageCount} imágenes
                    </span>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-200/50 dark:border-slate-700/50">
                    <div class="flex space-x-2">
                        <a href="${baseUrl}/${article.slug}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-all duration-200">
                            <span class="material-icons text-sm mr-2">visibility</span>
                            Ver
                        </a>
                        <button onclick="openEditModal('${article.slug}')" 
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300 hover:bg-purple-50 dark:hover:bg-purple-900/20 rounded-xl transition-all duration-200">
                            <span class="material-icons text-sm mr-2">edit</span>
                            Editar
                        </button>
                    </div>
                    <button onclick="openDeleteModal('${article.slug}', '${article.titulo}')" 
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-all duration-200">
                        <span class="material-icons text-sm mr-2">delete</span>
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    `;
}

// Función para actualizar el grid de artículos dinámicamente
function updateArticulosGrid() {
    const articulosGrid = document.getElementById('articlesGrid');
    if (!articulosGrid) {
        console.warn('No se encontró el elemento #articlesGrid');
        return;
    }
    
    // Mostrar loading
    articulosGrid.innerHTML = `
        <div class="col-span-full flex justify-center items-center py-20">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-2xl mb-4">
                    <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <p class="text-gray-600 dark:text-gray-400">Actualizando artículos...</p>
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
        
        // Extraer el grid de artículos
            const newGrid = tempDiv.querySelector('#articlesGrid');
            if (newGrid) {
            articulosGrid.innerHTML = newGrid.innerHTML;
        } else {
            console.warn('No se encontró el grid en la respuesta del servidor');
            articulosGrid.innerHTML = `
                <div class="col-span-full">
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-3xl mb-6">
                            <span class="material-icons text-4xl text-gray-400 dark:text-gray-600">article</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">No hay artículos</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Comienza creando tu primer artículo</p>
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
        showNotification('Error al actualizar la lista de artículos', 'error');
        
        // Restaurar contenido original en caso de error
        articulosGrid.innerHTML = `
            <div class="col-span-full">
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-3xl mb-6">
                        <span class="material-icons text-4xl text-gray-400 dark:text-gray-600">article</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Error al cargar</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Hubo un problema al cargar los artículos. Intenta recargar la página.</p>
                    <button onclick="updateArticulosGrid()"
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
    const articulosGrid = document.getElementById('articlesGrid');
    if (!articulosGrid) return;
    
    // Agregar clase de animación de éxito
    articulosGrid.classList.add('animate-pulse');
    
    // Remover la animación después de un tiempo
    setTimeout(() => {
        articulosGrid.classList.remove('animate-pulse');
    }, 1000);
}

// Función para manejar el envío del formulario de crear
function submitCreateForm(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Prevenir múltiples envíos
    if (submitButton.disabled) return;
    
    // Obtener contenido del editor
    let content = '';
    if (window.SummernoteManager) {
        content = window.SummernoteManager.getCreateEditorContent();
        console.log('Contenido obtenido del editor:', content);
    } else {
        console.warn('SummernoteManager no está disponible');
    }
    
    formData.set('contenido', content);

    
    // Obtener categorías seleccionadas
    const selectedCategories = getSelectedCategories_create();
    
    // Si no hay categorías seleccionadas, intentar obtener las categorías de los checkboxes marcados
    if (selectedCategories.length === 0) {
        // Verificar si hay checkboxes marcados que no se están detectando
        const checkboxes = document.querySelectorAll('.category-chip input[type="checkbox"]:checked');
        if (checkboxes.length > 0) {
            // Si hay checkboxes marcados, usar esos valores
            const checkboxValues = Array.from(checkboxes).map(cb => cb.value);
            selectedCategories.push(...checkboxValues);
        } else {
            // Si realmente no hay categorías seleccionadas, mostrar error
            showNotification('Por favor selecciona al menos una categoría', 'error');
            submitButton.disabled = false;
            submitButton.innerHTML = `
                <span class="material-icons mr-3 text-lg relative z-10">add_circle</span>
                <span class="relative z-10">Crear Artículo KIBI</span>
            `;
            return;
        }
    }
    
    // Agregar categorías al FormData
    selectedCategories.forEach(category => {
        formData.append('categorias[]', category);
    });
    
    // Mostrar loading
    submitButton.disabled = true;
    submitButton.innerHTML = `
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Creando...
    `;
    
    // RUTAS KIBI
    fetch('/kibi/articulos', {
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
            closeCreateModal();
            
            // Actualizar grid dinámicamente en lugar de recargar página
            setTimeout(() => {
                updateArticulosGrid();
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
        // Restaurar botón
        submitButton.disabled = false;
        submitButton.innerHTML = `
            <span class="material-icons mr-2">add</span>
            <span class="button-text">Nuevo Artículo</span>
        `;
    });
}

// Función para manejar el envío del formulario de editar
function submitEditForm(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Prevenir múltiples envíos
    if (submitButton.disabled) return;
    
    // Obtener contenido del editor
    let content = '';
    if (window.SummernoteManager) {
        content = window.SummernoteManager.getEditEditorContent();
        console.log('Contenido obtenido del editor:', content);
    } else {
        console.warn('SummernoteManager no está disponible');
    }
    
    formData.set('contenido', content);

    
    // Obtener categorías seleccionadas
    // Obtener categorías seleccionadas del nuevo sistema de chips
    let selectedCategories = [];
    
    // Intentar obtener del nuevo sistema de chips
    if (typeof getSelectedCategories_edit === 'function') {
        selectedCategories = getSelectedCategories_edit();
    }
    
    // Si no hay categorías seleccionadas, verificar checkboxes marcados
    if (selectedCategories.length === 0) {
        const checkboxes = document.querySelectorAll('.category-chip input[type="checkbox"]:checked');
        if (checkboxes.length > 0) {
            selectedCategories = Array.from(checkboxes).map(cb => cb.value);
        } else {
            // Si realmente no hay categorías seleccionadas, mostrar error
            showNotification('Por favor selecciona al menos una categoría', 'error');
            submitButton.disabled = false;
            submitButton.innerHTML = `
                <span class="material-icons mr-2 text-sm relative z-10">edit</span>
                <span class="relative z-10">Actualizar Artículo</span>
            `;
            return;
        }
    }
    
    // Agregar categorías al FormData
    selectedCategories.forEach(category => {
        formData.append('categorias[]', category);
    });
    
    // Mostrar loading
    submitButton.disabled = true;
    submitButton.innerHTML = `
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Actualizando...
    `;
    
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
        console.log('Respuesta del servidor:', data);
        if (data.success) {
            showNotification(data.message || 'Operación realizada con éxito', 'success');
            
            // Cerrar modal correspondiente
            closeEditModal();
            
            // Actualizar grid dinámicamente en lugar de recargar página
            setTimeout(() => {
                updateArticulosGrid();
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
        // Restaurar botón
        submitButton.disabled = false;
        submitButton.innerHTML = `
            <span class="material-icons mr-2">save</span>
            <span class="button-text">Actualizar Artículo</span>
        `;
    });
}


// Función para manejar el envío del formulario de eliminar
function submitDeleteForm(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Prevenir múltiples envíos
    if (submitButton.disabled) return;
    
    // Mostrar loading
    submitButton.disabled = true;
    submitButton.innerHTML = `
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Eliminando...
    `;
    
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
            closeDeleteModal();
            
            // Actualizar grid dinámicamente en lugar de recargar página
            setTimeout(() => {
                updateArticulosGrid();
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
        // Restaurar botón
        submitButton.disabled = false;
        submitButton.innerHTML = `
            <span class="material-icons mr-2">delete</span>
            <span class="button-text">Eliminar</span>
        `;
    });
}

// Función para filtrar artículos por categoría de forma asíncrona
function filterByCategory(categoria) {
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

    // Actualizar estado de los botones de filtro
    updateFilterButtons(categoria);

    // Realizar petición AJAX
    const url = categoria ? 
        `${window.location.pathname}?categoria=${encodeURIComponent(categoria)}` : 
        window.location.pathname;

    fetch(url, {
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
        
        // Actualizar contadores
        updateCounters(tempDiv);
        
        // Actualizar paginación si existe
        const paginationContainer = document.querySelector('.mt-12.flex.justify-center');
        const newPagination = tempDiv.querySelector('.mt-12.flex.justify-center');
        if (paginationContainer && newPagination) {
            paginationContainer.innerHTML = newPagination.innerHTML;
        } else if (paginationContainer && !newPagination) {
            paginationContainer.style.display = 'none';
        }
    })
    .catch(error => {
        console.error('Error al filtrar artículos:', error);
        showNotification('Error al cargar los artículos', 'error');
        
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

// Función para actualizar el estado de los botones de filtro
function updateFilterButtons(selectedCategoria) {
    const filterButtons = document.querySelectorAll('[onclick^="filterByCategory"]');
    
    filterButtons.forEach(button => {
        const onclick = button.getAttribute('onclick');
        const categoria = onclick.match(/filterByCategory\('([^']*)'\)/)?.[1] || '';
        
        if (categoria === selectedCategoria) {
            // Botón activo
            button.className = button.className.replace(
                /bg-white\/80 dark:bg-slate-800\/80 text-gray-700 dark:text-gray-300 border border-gray-200\/50 dark:border-slate-700\/50/,
                'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg shadow-blue-500/25'
            );
        } else {
            // Botón inactivo
            button.className = button.className.replace(
                /bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg shadow-blue-500\/25/,
                'bg-white/80 dark:bg-slate-800/80 text-gray-700 dark:text-gray-300 border border-gray-200/50 dark:border-slate-700/50'
            );
        }
    });
}

// Función para actualizar contadores
function updateCounters(tempDiv) {
    // Actualizar contador de artículos totales
    const totalCount = tempDiv.querySelector('[class*="analytics"]')?.nextElementSibling;
    if (totalCount) {
        const currentTotal = document.querySelector('[class*="analytics"]')?.nextElementSibling;
        if (currentTotal) {
            currentTotal.textContent = totalCount.textContent;
        }
    }
    
    // Actualizar contador de artículos publicados
    const publishedCount = tempDiv.querySelector('[class*="visibility"]')?.nextElementSibling;
    if (publishedCount) {
        const currentPublished = document.querySelector('[class*="visibility"]')?.nextElementSibling;
        if (currentPublished) {
            currentPublished.textContent = publishedCount.textContent;
        }
    }
}

// Función para actualizar contadores después de crear un artículo
function updateArticleCountersAfterCreate() {
    // Incrementar contador de artículos totales
    const totalCountElement = document.querySelector('[class*="analytics"]')?.nextElementSibling;
    if (totalCountElement) {
        const currentCount = parseInt(totalCountElement.textContent) || 0;
        totalCountElement.textContent = currentCount + 1;
    }
    
    // Incrementar contador de artículos publicados si el artículo creado está publicado
    const publishedCountElement = document.querySelector('[class*="visibility"]')?.nextElementSibling;
    if (publishedCountElement) {
        const currentPublishedCount = parseInt(publishedCountElement.textContent) || 0;
        publishedCountElement.textContent = currentPublishedCount + 1;
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado, inicializando sistema de artículos KIBI...');
    
    // Verificar que SummernoteManager esté disponible
    if (window.SummernoteManager) {
        console.log('✅ SummernoteManager disponible para artículos KIBI');
    } else {
        console.warn('⚠️ SummernoteManager no está disponible - los editores pueden no funcionar');
    }
    
    // Inicializar selectores de categorías múltiples después de un pequeño delay
    setTimeout(() => {
        initializeCategorySelectors();
    }, 100);
    
    // Agregar función de emergencia para cerrar modales bloqueados
    window.closeBlockedModals = function() {
        if (window.closeSummernoteModals) {
            window.closeSummernoteModals();
        }
        console.log('Modales bloqueados cerrados');
    };
    
    // Agregar atajo de teclado para cerrar modales (Ctrl+Shift+M)
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.shiftKey && e.key === 'M') {
            window.closeBlockedModals();
        }
    });
});

// Función para inicializar los selectores de categorías múltiples
function initializeCategorySelectors() {
    // Selector de crear (nuevo sistema de chips)
    initializeCategoryChips('create');
    // Selector de editar (nuevo sistema de chips)
    initializeCategoryChips('edit');
}

// Función para inicializar el sistema de chips de categorías
function initializeCategoryChips(prefix) {
    const chips = document.querySelectorAll(`.category-chip[data-category]`);
    const selectedContainer = document.getElementById(`${prefix}_selected_categories`);
    const selectedTags = document.getElementById(`${prefix}_selected_tags`);
    
    if (!chips.length || !selectedContainer || !selectedTags) return;
    
    let selectedCategories = [];
    
    // Mapeo de colores para los tags
    const colorMap = {
        'Desarrollo Web': 'blue',
        'Inteligencia Artificial': 'purple',
        'Ciberseguridad': 'red',
        'Cloud Computing': 'cyan',
        'DevOps': 'green',
        'Mobile Development': 'orange',
        'Data Science': 'indigo',
        'Blockchain': 'yellow',
        'IoT': 'teal',
        'UI/UX Design': 'pink',
        'Gaming': 'lime',
        'Redes': 'amber'
    };
    
    const iconMap = {
        'Desarrollo Web': 'web',
        'Inteligencia Artificial': 'psychology',
        'Ciberseguridad': 'security',
        'Cloud Computing': 'cloud',
        'DevOps': 'settings',
        'Mobile Development': 'phone_android',
        'Data Science': 'analytics',
        'Blockchain': 'account_balance',
        'IoT': 'devices',
        'UI/UX Design': 'design_services',
        'Gaming': 'sports_esports',
        'Redes': 'router'
    };
    
    // Función para actualizar la visualización
    function updateDisplay() {
        // Actualizar chips
        chips.forEach(chip => {
            const category = chip.dataset.category;
            const checkbox = chip.querySelector('input[type="checkbox"]');
            const label = chip.querySelector('label');
            
            if (selectedCategories.includes(category)) {
                // Categoría seleccionada
                checkbox.checked = true;
                label.classList.add('border-kibi-secondary', 'bg-kibi-secondary/10', 'shadow-lg', 'scale-105');
                label.classList.remove('border-gray-200', 'bg-white/80');
                
                // Mostrar indicador de selección
                const indicator = label.querySelector('.absolute.top-2.right-2');
                if (indicator) {
                    indicator.classList.remove('opacity-0', 'scale-75');
                    indicator.classList.add('opacity-100', 'scale-100');
                }
            } else {
                // Categoría no seleccionada
                checkbox.checked = false;
                label.classList.remove('border-kibi-secondary', 'bg-kibi-secondary/10', 'shadow-lg', 'scale-105');
                label.classList.add('border-gray-200', 'bg-white/80');
                
                // Ocultar indicador de selección
                const indicator = label.querySelector('.absolute.top-2.right-2');
                if (indicator) {
                    indicator.classList.add('opacity-0', 'scale-75');
                    indicator.classList.remove('opacity-100', 'scale-100');
                }
            }
        });
        
        // Actualizar sección de seleccionadas
        if (selectedCategories.length > 0) {
            selectedContainer.classList.remove('hidden');
            
            // Eliminar duplicados antes de mostrar
            const uniqueCategories = [...new Set(selectedCategories)];
            
            selectedTags.innerHTML = uniqueCategories.map(category => `
                <div class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-semibold bg-${colorMap[category]}-100 text-${colorMap[category]}-800 border border-${colorMap[category]}-200 shadow-sm">
                    <span class="material-icons text-xs mr-1">${iconMap[category]}</span>
                    ${category}
                    <button type="button" onclick="removeCategoryChip('${prefix}', '${category}')" 
                            class="ml-1 hover:bg-${colorMap[category]}-200 rounded-full p-0.5 transition-colors">
                        <span class="material-icons text-xs">close</span>
                    </button>
                </div>
            `).join('');
        } else {
            selectedContainer.classList.add('hidden');
        }
    }
    
    // Event listeners para los chips
    chips.forEach(chip => {
        const checkbox = chip.querySelector('input[type="checkbox"]');
        const label = chip.querySelector('label');
        
        // Click en el chip
        label.addEventListener('click', function(e) {
            e.preventDefault();
            const category = chip.dataset.category;
            
            if (selectedCategories.includes(category)) {
                // Deseleccionar
                selectedCategories = selectedCategories.filter(cat => cat !== category);
            } else {
                // Seleccionar (solo si no está ya seleccionada)
                if (!selectedCategories.includes(category)) {
                    selectedCategories.push(category);
                }
            }
            
            // Eliminar duplicados antes de actualizar
            selectedCategories = [...new Set(selectedCategories)];
            updateDisplay();
        });
        
        // Hover effects
        label.addEventListener('mouseenter', function() {
            if (!selectedCategories.includes(chip.dataset.category)) {
                const color = chip.dataset.category;
                // Aplicar efectos hover dinámicos
            }
        });
    });
    
    // Función global para remover categoría
    window[`removeCategoryChip_${prefix}`] = function(category) {
        selectedCategories = selectedCategories.filter(cat => cat !== category);
        // Eliminar duplicados después de remover
        selectedCategories = [...new Set(selectedCategories)];
        updateDisplay();
    };
    
    // Función global para obtener categorías seleccionadas
    window[`getSelectedCategories_${prefix}`] = function() {
        return selectedCategories;
    };
    
    // Función global para establecer categorías seleccionadas
    window[`setSelectedCategories_${prefix}`] = function(categories) {
        selectedCategories = categories || [];
        updateDisplay();
    };
    
    // Inicializar visualización
    updateDisplay();
}

// Hacer la función accesible globalmente
window.initializeCategorySelector = initializeCategorySelector;
window.initializeCategoryChips = initializeCategoryChips;

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
        
        // Establecer nuevas categorías (sin duplicados)
        const newCategories = Array.isArray(categories) ? categories : [categories].filter(Boolean);
        selectedCategories = [...new Set(newCategories)]; // Eliminar duplicados
        
        // Actualizar visualización
        updateDisplay();
    };
}

// Función para remover una categoría (función global)
function removeCategory(prefix, category) {
    if (window[`removeCategory_${prefix}`]) {
        window[`removeCategory_${prefix}`](category);
    }
}

// Exportar funciones globales
window.previewImage = previewImage;
window.removeBannerPreview = removeBannerPreview;
window.openCreateModal = openCreateModal;
window.closeCreateModal = closeCreateModal;
window.openEditModal = openEditModal;
window.closeEditModal = closeEditModal;
window.openDeleteModal = openDeleteModal;
window.closeDeleteModal = closeDeleteModal;
// Función global para remover categoría desde los tags
function removeCategoryChip(prefix, category) {
    if (typeof window[`removeCategoryChip_${prefix}`] === 'function') {
        window[`removeCategoryChip_${prefix}`](category);
    }
}

window.setButtonLoading = setButtonLoading;
window.showNotification = showNotification;
window.handleImageUpload = handleImageUpload;
window.removeBannerImage = removeBannerImage;
window.submitCreateForm = submitCreateForm;
window.submitEditForm = submitEditForm;
window.submitDeleteForm = submitDeleteForm;
window.initializeCategorySelector = initializeCategorySelector;
window.initializeCategorySelectors = initializeCategorySelectors;
window.initializeCategoryChips = initializeCategoryChips;
window.setSelectedCategories_edit = setSelectedCategories_edit;
window.removeCategory = removeCategory;
window.removeCategoryChip = removeCategoryChip;
window.filterByCategory = filterByCategory;
window.updateFilterButtons = updateFilterButtons;
window.updateCounters = updateCounters;
window.updateArticulosGrid = updateArticulosGrid;
window.initializeNewGridElements = initializeNewGridElements;
window.handleEditClick = handleEditClick;
window.handleDeleteClick = handleDeleteClick;
window.showSuccessAnimation = showSuccessAnimation;