// Funciones para el modal de crear
function openCreateModal() {
    const modal = document.getElementById('createModal');
    const modalContent = document.getElementById('createModalContent');

    // Prevenir múltiples aperturas
    if (!modal.classList.contains('hidden')) return;

    // Calcular el ancho de la scrollbar para evitar el salto
    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

    modal.classList.remove('hidden');

    // Bloquear scroll y compensar scrollbar
    document.body.style.overflow = 'hidden';
    document.body.style.paddingRight = scrollbarWidth + 'px';

    // Animar entrada
    setTimeout(() => {
        if (modalContent) {
            modalContent.classList.remove('scale-90', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }
    }, 10);
}

function closeCreateModal() {
    const modal = document.getElementById('createModal');
    const modalContent = document.getElementById('createModalContent');

    // Animar salida
    if (modalContent) {
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-90', 'opacity-0');
    }

    setTimeout(() => {
        modal.classList.add('hidden');
        // CRÍTICO: Restaurar scroll del body completamente
        document.body.style.overflow = 'auto';
        document.body.style.paddingRight = '';

        // Resetear formulario
        const form = document.getElementById('createForm');
        if (form) {
            form.reset();
        }

        // Limpiar previsualizaciones
        const preview = document.getElementById('create_image_preview');
        if (preview) {
            preview.classList.add('hidden');
        }
    }, 300);
}

// Funciones para el modal de editar
function openEditModal(courseId) {
    const modal = document.getElementById('editModal');
    const modalContent = document.getElementById('editModalContent');

    // Prevenir múltiples aperturas
    if (!modal.classList.contains('hidden')) return;

    // Mostrar loading en el botón
    const button = event.target.closest('button');
    if (button) {
        setButtonLoading(button, true, 'Cargando...');
    }

    // Obtener datos del curso
    fetch(`/admin/cursos/${courseId}/edit`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            // Llenar el formulario con los datos
            document.getElementById('edit_titulo').value = data.titulo || '';
            document.getElementById('edit_descripcion').value = data.descripcion || '';
            document.getElementById('edit_precio').value = data.precio || '';
            document.getElementById('edit_duracion_horas').value = data.duracion_horas || '';
            document.getElementById('edit_nivel').value = data.nivel || '';
            document.getElementById('edit_cupo_maximo').value = data.cupo_maximo || '';
            document.getElementById('edit_fecha_inicio').value = data.fecha_inicio || '';
            document.getElementById('edit_fecha_fin').value = data.fecha_fin || '';
            document.getElementById('edit_slug').value = data.slug || '';
            document.getElementById('edit_requisitos').value = data.requisitos || '';
            document.getElementById('edit_activo').checked = data.activo || false;

            // Configurar el formulario
            document.getElementById('editForm').action = `/admin/cursos/${courseId}`;

            // Mostrar el modal con animación
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        })
        .catch(error => {
            console.error('Error al cargar datos del curso:', error);
            showNotification('Error al cargar los datos del curso', 'error');
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

        // Limpiar previsualizaciones
        document.getElementById('edit_image_preview').classList.add('hidden');

        // Ocultar opción de eliminar imagen
        document.getElementById('edit_remove_image_option').classList.add('hidden');
    }, 300);
}

// Funciones para el modal de eliminar
function openDeleteModal(courseId, courseTitle) {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('deleteModalContent');

    // Prevenir múltiples aperturas
    if (!modal.classList.contains('hidden')) return;

    document.getElementById('deleteCourseTitle').textContent = courseTitle;
    document.getElementById('deleteForm').action = `/admin/cursos/${courseId}`;

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
    modalContent.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 500);
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

// Función para previsualizar una imagen
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

// Función para eliminar previsualización de imagen
function removeImagePreview(previewId, inputId) {
    const preview = document.getElementById(previewId);
    const input = document.getElementById(inputId);

    // Ocultar la previsualización
    preview.classList.add('hidden');

    // Limpiar el input de archivo
    input.value = '';

    // Si es el modal de editar, mostrar la opción de eliminar imagen existente
    if (previewId === 'edit_image_preview') {
        const removeOption = document.getElementById('edit_remove_image_option');
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

// Función para mostrar notificaciones
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transition-all duration-300 max-w-md ${
        type === 'success'
            ? 'bg-green-500 text-white'
            : 'bg-red-500 text-white'
    }`;

    // Si el mensaje contiene saltos de línea, usar innerHTML
    if (message.includes('\n')) {
        notification.innerHTML = message.replace(/\n/g, '<br>');
    } else {
        notification.textContent = message;
    }

    document.body.appendChild(notification);

    // Animar entrada
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
        notification.style.opacity = '1';
    }, 100);

    // Remover después de 5 segundos para errores de validación
    const duration = type === 'error' ? 5000 : 3000;
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        notification.style.opacity = '0';
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, duration);
}

// Función para crear el HTML de una tarjeta de curso
function createCourseCard(course) {
    const cardImg = course.url_imagen ? `/storage/${course.url_imagen}` : null;

    const statusClass = course.activo
        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
        : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200';

    const levelIcon = course.nivel === 'principiante' ? 'trending_up' :
                     course.nivel === 'intermedio' ? 'trending_flat' : 'trending_down';

    const creatorName = `${course.creador.name} ${course.creador.apellido_paterno} ${course.creador.apellido_materno}`;
    const createdDate = new Date(course.created_at).toLocaleDateString('es-ES');

    return `
        <div class="group relative bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-200/50 dark:border-slate-700/50 hover:border-blue-300/50 dark:hover:border-blue-600/50 hover:-translate-y-2">
            <div class="relative h-56 bg-gray-50 dark:bg-gray-800 flex items-center justify-center overflow-hidden">
                ${cardImg
                    ? `<img src="${cardImg}" alt="${course.titulo}" class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105">`
                    : `<div class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 flex items-center justify-center">
                        <span class="material-icons text-white text-6xl opacity-80">school</span>
                    </div>`
                }
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                <!-- Status Badge -->
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-2xl backdrop-blur-xl shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:rotate-3
                        ${course.activo ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-green-500/30' : 'bg-gradient-to-r from-gray-500 to-gray-600 text-white shadow-gray-500/30'}">
                        <span class="material-icons text-sm mr-2">
                            ${course.activo ? 'visibility' : 'archive'}
                        </span>
                        ${course.activo ? 'Activo' : 'Inactivo'}
                    </span>
                </div>

                <!-- Enhanced Level Badge -->
                <div class="absolute top-4 left-4">
                    <span class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-2xl backdrop-blur-xl shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:-rotate-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-blue-500/30">
                        <span class="material-icons text-sm mr-2">${levelIcon}</span>
                        ${course.nivel.charAt(0).toUpperCase() + course.nivel.slice(1)}
                    </span>
                </div>
            </div>

            <!-- Enhanced Course Content -->
            <div class="p-8">
                <!-- Enhanced Price and Duration -->
                <div class="flex items-center justify-between mb-6">
                    <div class="group/price relative">
                        <span class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-500/30 group-hover/price:scale-110 group-hover/price:rotate-3 transition-all duration-300">
                            <span class="material-icons text-sm mr-2">attach_money</span>
                            $${parseFloat(course.precio).toFixed(2)} MXN
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl blur opacity-0 group-hover/price:opacity-50 transition-opacity duration-300"></div>
                    </div>
                    ${course.duracion_horas ? `<div class="flex items-center px-3 py-2 bg-gradient-to-r from-orange-100 to-red-100 dark:from-orange-900/30 dark:to-red-900/30 rounded-xl border border-orange-200/50 dark:border-orange-700/50">
                        <span class="material-icons text-orange-600 dark:text-orange-400 text-sm mr-2">schedule</span>
                        <span class="text-sm font-semibold text-orange-700 dark:text-orange-300">${course.duracion_horas}h</span>
                    </div>` : ''}
                </div>

                <!-- Enhanced Title and Description -->
                <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-4 line-clamp-2 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 group-hover:bg-clip-text transition-all duration-500 leading-tight">
                    ${course.titulo}
                </h3>

                ${course.descripcion ? `<p class="text-gray-600 dark:text-gray-400 mb-6 line-clamp-3 leading-relaxed text-base group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                    ${course.descripcion.length > 150 ? course.descripcion.substring(0, 150) + '...' : course.descripcion}
                </p>` : ''}

                <!-- Enhanced Creator and Capacity Info -->
                <div class="flex items-center justify-between text-sm mb-8">
                    <div class="flex items-center px-3 py-2 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl border border-blue-200/50 dark:border-blue-700/50">
                        <span class="material-icons text-blue-600 dark:text-blue-400 text-sm mr-2">person</span>
                        <span class="font-semibold text-blue-700 dark:text-blue-300">${creatorName}</span>
                    </div>
                    ${course.cupo_maximo ? `<div class="flex items-center px-3 py-2 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl border border-purple-200/50 dark:border-purple-700/50">
                        <span class="material-icons text-purple-600 dark:text-purple-400 text-sm mr-2">group</span>
                        <span class="font-semibold text-purple-700 dark:text-purple-300">${course.cupo_maximo} cupos</span>
                    </div>` : ''}
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-200/50 dark:border-slate-700/50">
                    <div class="flex space-x-2">
                        <a href="/cursos/${course.id}"
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-all duration-200">
                            <span class="material-icons text-sm mr-2">visibility</span>
                            Ver
                        </a>
                        <button onclick="openEditModal(${course.id})"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300 hover:bg-purple-50 dark:hover:bg-purple-900/20 rounded-xl transition-all duration-200">
                            <span class="material-icons text-sm mr-2">edit</span>
                            Editar
                        </button>
                    </div>
                    <button onclick="openDeleteModal(${course.id}, '${course.titulo}')"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-all duration-200">
                        <span class="material-icons text-sm mr-2">delete</span>
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    `;
}

// Función para manejar el envío del formulario de crear
function submitCreateForm(event) {
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
        Creando...
    `;

    url_imagen
    // Debug: Log form data
    console.log('FormData contents:');
    for (let [key, value] of formData.entries()) {
        console.log(key, value);
    }


    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            // Si hay errores de validación, intentar parsear como JSON
            if (response.status === 422) {
                return response.json().then(errors => {
                    throw new Error(JSON.stringify(errors));
                });
            }
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Agregar la nueva tarjeta al inicio de la lista
            const coursesGrid = document.querySelector('.grid.grid-cols-1.md\\:grid-cols-2.xl\\:grid-cols-3');
            if (coursesGrid) {
                // Si el grid está vacío (no hay cursos), reemplazar el contenido
                const isEmpty = coursesGrid.querySelector('.col-span-full');
                if (isEmpty) {
                    coursesGrid.innerHTML = '';
                }

                const newCard = document.createElement('div');
                newCard.innerHTML = createCourseCard(data.curso);
                coursesGrid.insertBefore(newCard.firstElementChild, coursesGrid.firstElementChild);
            }

            // Actualizar contadores
            updateCourseCountersAfterCreate();

            // Cerrar modal y mostrar notificación
            closeCreateModal();
            showNotification(data.message, 'success');
        } else {
            showNotification('Error al crear el curso', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);

        // Intentar parsear errores de validación
        try {
            const validationErrors = JSON.parse(error.message);
            let errorMessage = 'Error de validación:\n';
            for (const field in validationErrors.errors) {
                errorMessage += `• ${validationErrors.errors[field].join(', ')}\n`;
            }
            showNotification(errorMessage, 'error');
        } catch (e) {
            showNotification('Error al crear el curso', 'error');
        }
    })
    .finally(() => {
        // Restaurar botón
        submitButton.disabled = false;
        submitButton.innerHTML = `
            <span class="material-icons mr-2">add_circle</span>
            <span class="button-text">Crear Curso</span>
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
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            // Si hay errores de validación, intentar parsear como JSON
            if (response.status === 422) {
                return response.json().then(errors => {
                    throw new Error(JSON.stringify(errors));
                });
            }
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);
        if (data.success) {
            // Actualizar la tarjeta existente en lugar de recargar la página
            const courseId = form.action.split('/').pop();
            console.log('Buscando curso con ID:', courseId);

            // Buscar la tarjeta de múltiples formas
            let courseCard = document.querySelector(`[onclick*="openEditModal(${courseId})"]`)?.closest('.group');

            if (!courseCard) {
                // Intentar con un selector más específico
                courseCard = document.querySelector(`button[onclick*="openEditModal(${courseId})"]`)?.closest('.group');
            }

            if (!courseCard) {
                // Buscar por el ID en el atributo data o en el contenido
                const allCards = document.querySelectorAll('.group');
                for (let card of allCards) {
                    if (card.innerHTML.includes(`openEditModal(${courseId})`)) {
                        courseCard = card;
                        break;
                    }
                }
            }

            console.log('Tarjeta encontrada:', courseCard);
            if (courseCard) {
                const newCard = document.createElement('div');
                newCard.innerHTML = createCourseCard(data.curso);
                courseCard.parentNode.replaceChild(newCard.firstElementChild, courseCard);
                console.log('Tarjeta actualizada exitosamente');
            } else {
                console.log('No se encontró la tarjeta del curso, recargando página...');
                // Si no se encuentra la tarjeta, recargar la página como fallback
                window.location.reload();
                return;
            }

            // Cerrar modal y mostrar notificación
            closeEditModal();
            showNotification(data.message, 'success');
        } else {
            showNotification('Error al actualizar el curso', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);

        // Intentar parsear errores de validación
        try {
            const validationErrors = JSON.parse(error.message);
            let errorMessage = 'Error de validación:\n';
            for (const field in validationErrors.errors) {
                errorMessage += `• ${validationErrors.errors[field].join(', ')}\n`;
            }
            showNotification(errorMessage, 'error');
        } catch (e) {
            showNotification('Error al actualizar el curso', 'error');
        }
    })
    .finally(() => {
        // Restaurar botón
        submitButton.disabled = false;
        submitButton.innerHTML = `
            <span class="material-icons mr-2">save</span>
            <span class="button-text">Actualizar Curso</span>
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
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Encontrar y remover la tarjeta del curso eliminado
            const courseId = form.action.split('/').pop();
            const courseCard = document.querySelector(`[onclick*="openEditModal(${courseId})"]`)?.closest('.group');
            if (courseCard) {
                // Animar la eliminación
                courseCard.style.transition = 'all 0.3s ease-in-out';
                courseCard.style.transform = 'scale(0.8)';
                courseCard.style.opacity = '0';
                setTimeout(() => {
                    courseCard.remove();
                }, 300);
            }

            // Cerrar modal y mostrar notificación
            closeDeleteModal();
            showNotification(data.message, 'success');
        } else {
            showNotification('Error al eliminar el curso', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error al eliminar el curso', 'error');
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

// Función para filtrar cursos por nivel de forma asíncrona
function filterByLevel(nivel) {
    // Mostrar loading en el grid
    const coursesGrid = document.querySelector('.grid.grid-cols-1.md\\:grid-cols-2.xl\\:grid-cols-3');
    if (coursesGrid) {
        coursesGrid.innerHTML = `
            <div class="col-span-full flex justify-center items-center py-20">
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-2xl mb-4">
                        <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">Cargando cursos...</p>
                </div>
            </div>
        `;
    }

    // Actualizar estado de los botones de filtro
    updateLevelFilterButtons(nivel);

    // Realizar petición AJAX
    const url = nivel ?
        `${window.location.pathname}?nivel=${encodeURIComponent(nivel)}` :
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

        // Extraer el grid de cursos
        const newGrid = tempDiv.querySelector('.grid.grid-cols-1.md\\:grid-cols-2.xl\\:grid-cols-3');
        if (newGrid && coursesGrid) {
            coursesGrid.innerHTML = newGrid.innerHTML;
        }

        // Actualizar contadores
        updateCourseCounters(tempDiv);

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
        console.error('Error al filtrar cursos:', error);
        showNotification('Error al cargar los cursos', 'error');

        // Restaurar contenido original en caso de error
        if (coursesGrid) {
            coursesGrid.innerHTML = `
                <div class="col-span-full">
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-3xl mb-6">
                            <span class="material-icons text-4xl text-gray-400 dark:text-gray-600">school</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Error al cargar</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Hubo un problema al cargar los cursos. Intenta recargar la página.</p>
                    </div>
                </div>
            `;
        }
    });
}

// Función para actualizar el estado de los botones de filtro de nivel
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

// Función para actualizar contadores de cursos
function updateCourseCounters(tempDiv) {
    // Actualizar contador de cursos totales
    const totalCount = tempDiv.querySelector('[class*="analytics"]')?.nextElementSibling;
    if (totalCount) {
        const currentTotal = document.querySelector('[class*="analytics"]')?.nextElementSibling;
        if (currentTotal) {
            currentTotal.textContent = totalCount.textContent;
        }
    }

    // Actualizar contador de cursos activos
    const activeCount = tempDiv.querySelector('[class*="visibility"]')?.nextElementSibling;
    if (activeCount) {
        const currentActive = document.querySelector('[class*="visibility"]')?.nextElementSibling;
        if (currentActive) {
            currentActive.textContent = activeCount.textContent;
        }
    }
}

// Función para actualizar contadores después de crear un curso
function updateCourseCountersAfterCreate() {
    // Incrementar contador de cursos totales
    const totalCountElement = document.querySelector('[class*="analytics"]')?.nextElementSibling;
    if (totalCountElement) {
        const currentCount = parseInt(totalCountElement.textContent) || 0;
        totalCountElement.textContent = currentCount + 1;
    }

    // Incrementar contador de cursos activos si el curso creado está activo
    const activeCountElement = document.querySelector('[class*="visibility"]')?.nextElementSibling;
    if (activeCountElement) {
        const currentActiveCount = parseInt(activeCountElement.textContent) || 0;
        activeCountElement.textContent = currentActiveCount + 1;
    }
}












// Debug específico para creación de cursos con niveles
console.log('🔧 Admin Curso Create Debug - Cargado');

// Función para debuggear el formulario de creación
function debugCreateForm() {
    console.log('🔍 Debuggeando formulario de creación...');

    const form = document.getElementById('createForm');
    if (!form) {
        console.error('❌ No se encontró el formulario createForm');
        return;
    }

    console.log('✅ Formulario encontrado:', form);

    // Debuggear campos básicos
    const camposBasicos = [
        'titulo', 'descripcion', 'precio', 'duracion_horas',
        'nivel', 'cupo_maximo', 'fecha_inicio', 'fecha_fin',
        'slug', 'requisitos', 'activo'
    ];

    console.log('📝 Campos básicos:');
    camposBasicos.forEach(campo => {
        const input = form.querySelector(`[name="${campo}"]`);
        if (input) {
            console.log(`  ${campo}:`, input.value, input.type);
        } else {
            console.log(`  ${campo}: NO ENCONTRADO`);
        }
    });

    // Debuggear imagen
    const imagen = form.querySelector('[name="url_imagen"]');
    if (imagen && imagen.files.length > 0) {
        console.log('🖼️ Imagen:', imagen.files[0].name, imagen.files[0].size);
    } else {
        console.log('🖼️ Imagen: No seleccionada');
    }

    // Debuggear niveles
    debugNiveles(form);
}

// Función para debuggear niveles
function debugNiveles(form) {
    console.log('🏗️ Debuggeando niveles...');

    const nivelesContainer = document.getElementById('niveles-container');
    if (!nivelesContainer) {
        console.log('❌ No se encontró el contenedor de niveles');
        return;
    }

    const niveles = nivelesContainer.querySelectorAll('.nivel-item');
    console.log(`📊 Niveles encontrados: ${niveles.length}`);

    niveles.forEach((nivel, index) => {
        console.log(`\n🎯 Nivel ${index + 1}:`);

        // Título del nivel
        const titulo = nivel.querySelector(`[name*="[titulo]"]`);
        console.log(`  Título:`, titulo ? titulo.value : 'NO ENCONTRADO');

        // Descripción del nivel
        const descripcion = nivel.querySelector(`[name*="[descripcion]"]`);
        console.log(`  Descripción:`, descripcion ? descripcion.value : 'NO ENCONTRADO');

        // Número del nivel
        const numero = nivel.querySelector(`[name*="[numero]"]`);
        console.log(`  Número:`, numero ? numero.value : 'NO ENCONTRADO');

        // Debuggear subniveles
        debugSubniveles(nivel, index + 1);
    });
}

// Función para debuggear subniveles
function debugSubniveles(nivel, nivelIndex) {
    const subnivelesContainer = nivel.querySelector(`#subniveles_${nivelIndex}`);
    if (!subnivelesContainer) {
        console.log(`  ❌ No se encontró contenedor de subniveles para nivel ${nivelIndex}`);
        return;
    }

    const subniveles = subnivelesContainer.querySelectorAll('.subnivel-item');
    console.log(`  📋 Subniveles encontrados: ${subniveles.length}`);

    subniveles.forEach((subnivel, index) => {
        console.log(`\n    🎯 Subnivel ${index + 1}:`);

        // Título del subnivel
        const titulo = subnivel.querySelector(`[name*="[titulo]"]`);
        console.log(`      Título:`, titulo ? titulo.value : 'NO ENCONTRADO');

        // Descripción del subnivel
        const descripcion = subnivel.querySelector(`[name*="[descripcion]"]`);
        console.log(`      Descripción:`, descripcion ? descripcion.value : 'NO ENCONTRADO');

        // URL Iframe
        const iframe = subnivel.querySelector(`[name*="[url_iframe]"]`);
        console.log(`      Iframe:`, iframe ? iframe.value : 'NO ENCONTRADO');

        // Recurso
        const recurso = subnivel.querySelector(`[name*="[recurso]"]`);
        if (recurso && recurso.files.length > 0) {
            console.log(`      Recurso:`, recurso.files[0].name, recurso.files[0].size);
        } else {
            console.log(`      Recurso: No seleccionado`);
        }
    });
}

// Función para crear FormData y debuggearlo
function debugFormData(form) {
    console.log('📦 Creando FormData...');

    const formData = new FormData(form);

    console.log('📋 Contenido del FormData:');
    for (let [key, value] of formData.entries()) {
        if (value instanceof File) {
            console.log(`  ${key}: [FILE] ${value.name} (${value.size} bytes)`);
        } else {
            console.log(`  ${key}: ${value}`);
        }
    }

    return formData;
}

// Función para debuggear la respuesta del servidor
function debugServerResponse(response) {
    console.log('🌐 Respuesta del servidor:');
    console.log('  Status:', response.status);
    console.log('  Status Text:', response.statusText);
    console.log('  Headers:', [...response.headers.entries()]);

    return response.text().then(text => {
        console.log('  Body (raw):', text);

        try {
            const json = JSON.parse(text);
            console.log('  Body (parsed):', json);
            return json;
        } catch (e) {
            console.log('  Body: No es JSON válido');
            return text;
        }
    });
}

// Función mejorada para enviar el formulario con debug
function submitCreateFormWithDebug(event) {
    event.preventDefault();
    console.log('🚀 Iniciando envío del formulario con debug...');

    const form = document.getElementById('createForm');
    if (!form) {
        console.error('❌ No se encontró el formulario');
        return;
    }

    // Debuggear formulario antes de enviar
    debugCreateForm();

    // Crear FormData
    const formData = debugFormData(form);

    // Mostrar loading
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<span class="material-icons animate-spin">refresh</span> Creando...';
    submitBtn.disabled = true;

    // Enviar petición
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        console.log('📡 Respuesta recibida del servidor');
        return debugServerResponse(response);
    })
    .then(data => {
        console.log('✅ Datos procesados:', data);

        if (data.success) {
            console.log('🎉 Curso creado exitosamente:', data.curso);

            // Actualizar interfaz
            updateUIAfterCreate(data.curso);

            // Cerrar modal
            closeCreateModal();

            // Mostrar notificación
            showNotification('Curso creado exitosamente! 🎉', 'success');

        } else {
            console.error('❌ Error en la creación:', data);
            showNotification('Error al crear el curso: ' + (data.message || 'Error desconocido'), 'error');
        }
    })
    .catch(error => {
        console.error('💥 Error en la petición:', error);
        showNotification('Error de conexión: ' + error.message, 'error');
    })
    .finally(() => {
        // Restaurar botón
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
}

// Función para actualizar la UI después de crear
function updateUIAfterCreate(curso) {
    console.log('🔄 Actualizando interfaz...');

    // Actualizar grid de cursos
    const coursesGrid = document.querySelector('.grid.grid-cols-1.md\\:grid-cols-2.xl\\:grid-cols-3');
    if (coursesGrid) {
        // Si está vacío, limpiar mensaje de "no hay cursos"
        const isEmpty = coursesGrid.querySelector('.col-span-full');
        if (isEmpty) {
            coursesGrid.innerHTML = '';
        }

        // Agregar nueva tarjeta
        const newCard = document.createElement('div');
        newCard.innerHTML = createCourseCard(curso);
        coursesGrid.insertBefore(newCard.firstElementChild, coursesGrid.firstElementChild);
    }

    // Actualizar contadores
    updateCourseCountersAfterCreate();
}

// Función para crear tarjeta de curso (simplificada para debug)
function createCourseCard(curso) {
    return `
        <div class="group relative bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-700 overflow-hidden border border-gray-200/60 dark:border-slate-700/60 hover:border-blue-400/60 dark:hover:border-blue-500/60 hover:-translate-y-3 hover:scale-105 transform">
            <div class="relative h-64 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 flex items-center justify-center overflow-hidden">
                <div class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 flex items-center justify-center group-hover:from-blue-400 group-hover:via-purple-500 group-hover:to-pink-500 transition-all duration-500">
                    <span class="material-icons text-white text-7xl opacity-90 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">school</span>
                </div>
            </div>
            <div class="p-8">
                <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-4 line-clamp-2">${curso.titulo}</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6 line-clamp-3">${curso.descripcion}</p>
                <div class="flex items-center justify-between pt-8 border-t border-gray-200/40">
                    <div class="flex space-x-4">
                        <a href="/admin/cursos/${curso.id}/edit" class="inline-flex items-center justify-center w-14 h-14 rounded-3xl bg-gradient-to-br from-purple-50 to-pink-50 hover:from-purple-500 hover:to-pink-600 text-purple-600 hover:text-white transition-all duration-500">
                            <span class="material-icons text-xl">edit</span>
                        </a>
                    </div>
                    <button onclick="openDeleteModal(${curso.id}, '${curso.titulo}')" class="inline-flex items-center justify-center w-14 h-14 rounded-3xl bg-gradient-to-br from-red-50 to-pink-50 hover:from-red-500 hover:to-pink-600 text-red-600 hover:text-white transition-all duration-500">
                        <span class="material-icons text-xl">delete</span>
                    </button>
                </div>
            </div>
        </div>
    `;
}

// Función para actualizar contadores
function updateCourseCountersAfterCreate() {
    console.log('📊 Actualizando contadores...');

    // Aquí puedes agregar lógica para actualizar los contadores
    // Por ejemplo, incrementar el número de cursos totales
}

// Función para mostrar notificaciones
function showNotification(message, type = 'success') {
    console.log(`🔔 Notificación [${type}]:`, message);

    // Crear notificación visual
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;
    notification.innerHTML = `
        <div class="flex items-center">
            <span class="material-icons mr-2">${type === 'success' ? 'check_circle' : 'error'}</span>
            ${message}
        </div>
    `;

    document.body.appendChild(notification);

    // Remover después de 5 segundos
    setTimeout(() => {
        notification.remove();
    }, 5000);
}

// Función para cerrar modal (versión mejorada)
function closeCreateModal() {
    console.log('🚪 Cerrando modal...');
    const modal = document.getElementById('createModal');
    const modalContent = document.getElementById('createModalContent');

    if (modal) {
        // Animar salida
        if (modalContent) {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-90', 'opacity-0');
        }

        setTimeout(() => {
            modal.classList.add('hidden');
            // CRÍTICO: Restaurar scroll del body
            document.body.style.overflow = 'auto';
            document.body.style.paddingRight = '';

            // Resetear formulario
            const form = document.getElementById('createForm');
            if (form) {
                form.reset();
            }

            // Limpiar previsualizaciones
            const preview = document.getElementById('create_image_preview');
            if (preview) {
                preview.classList.add('hidden');
            }
        }, 300);
    }
}

// Auto-ejecutar cuando se carga la página
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎯 DOM cargado, configurando debug...');

    // Función de limpieza de emergencia para restaurar scroll
    function emergencyScrollRestore() {
        document.body.style.overflow = 'auto';
        document.body.style.paddingRight = '';
        console.log('🚨 Scroll restaurado de emergencia');
    }

    // Event listener para cerrar modal con Escape
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const createModal = document.getElementById('createModal');
            const editModal = document.getElementById('editModal');
            const deleteModal = document.getElementById('deleteModal');

            if (createModal && !createModal.classList.contains('hidden')) {
                closeCreateModal();
            } else if (editModal && !editModal.classList.contains('hidden')) {
                closeEditModal();
            } else if (deleteModal && !deleteModal.classList.contains('hidden')) {
                closeDeleteModal();
            }
        }
    });

    // Limpieza de emergencia al hacer scroll (por si acaso)
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            // Si hay scroll pero el body está bloqueado, restaurar
            if (document.body.style.overflow === 'hidden' && window.scrollY > 0) {
                emergencyScrollRestore();
            }
        }, 100);
    });

    // Reemplazar la función original de envío
    const form = document.getElementById('createForm');
    if (form) {
        form.onsubmit = submitCreateFormWithDebug;
        console.log('✅ Formulario configurado para debug');
    } else {
        console.log('⚠️ Formulario no encontrado, se configurará cuando esté disponible');
    }

    // Agregar botón de debug manual
    const debugBtn = document.createElement('button');
    debugBtn.type = 'button';
    debugBtn.className = 'fixed bottom-4 left-4 bg-blue-500 text-white p-3 rounded-full shadow-lg z-50';
    debugBtn.innerHTML = '<span class="material-icons">bug_report</span>';
    debugBtn.title = 'Debug Formulario';
    debugBtn.onclick = () => {
        const form = document.getElementById('createForm');
        if (form) {
            debugCreateForm();
        } else {
            console.log('❌ Formulario no disponible para debug');
        }
    };
    document.body.appendChild(debugBtn);
});

console.log('🎉 Admin Curso Create Debug - Listo para usar!');












