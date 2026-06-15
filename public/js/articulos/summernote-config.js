// Variables globales para Summernote
let createEditor = null;
let editEditor = null;

/*
 * CONFIGURACIÓN DE SUMMERNOTE PARA ARTÍCULOS
 * 
 * Esta configuración incluye soporte completo para:
 * - Viñetas (bullet points) con diferentes niveles de anidación
 * - Numeración (ordered lists) con diferentes estilos
 * - Formato de texto enriquecido
 * - Imágenes y enlaces
 * 
 * Los botones de lista están disponibles en la barra de herramientas:
 * - ul: Lista con viñetas (bullet points)
 * - ol: Lista numerada (ordered list)
 * - paragraph: Párrafo normal
 */

// Configuración de Summernote
const summernoteConfig = {
    height: 300,
    lang: 'es-ES',
    placeholder: 'Escribe el contenido de tu artículo aquí...',
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ],
    // Configuración adicional para mejorar la experiencia con listas
    disableDragAndDrop: false,
    shortcuts: false,
    tabDisable: false,
    // Configuración específica para listas
    popover: {
        image: [
            ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']]
        ],
        link: [
            ['link', ['linkDialogShow', 'unlink']]
        ],
        table: [
            ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
            ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ],
        air: [
            ['color', ['color']],
            ['font', ['bold', 'underline', 'clear']]
        ]
    },
    fontNames: [
        'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
        'Helvetica', 'Impact', 'Lucida Grande', 'Tahoma',
        'Times New Roman', 'Verdana', 'Georgia', 'Palatino',
        'Garamond', 'Bookman', 'Trebuchet MS', 'Arial Narrow',
        'Franklin Gothic Medium', 'Calibri', 'Candara', 'Segoe UI',
        'Roboto', 'Open Sans', 'Lato', 'Montserrat', 'Source Sans Pro'
    ],
    fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
    fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '26', '28', '36', '48', '72'],
    colors: [
        ['#000000', '#434343', '#666666', '#999999', '#b7b7b7', '#cccccc', '#d9d9d9', '#efefef', '#f3f3f3', '#ffffff'],
        ['#980000', '#ff0000', '#ff9900', '#ffff00', '#00ff00', '#00ffff', '#4a86e8', '#0000ff', '#9900ff', '#ff00ff'],
        ['#e6b8af', '#f4cccc', '#fce5cd', '#fff2cc', '#d9ead3', '#d0e0e3', '#c9daf8', '#cfe2f3', '#d9d2e9', '#ead1dc'],
        ['#dd7e6b', '#ea9999', '#f9cb9c', '#ffe599', '#b6d7a8', '#a2c4c9', '#a4c2f4', '#a4c2f4', '#b4a7d6', '#d5a6bd'],
        ['#cc4125', '#e06666', '#f6b26b', '#ffd966', '#93c47d', '#76a5af', '#6d9eeb', '#6fa8dc', '#8e7cc3', '#c27ba0'],
        ['#a61c00', '#cc0000', '#e69138', '#f1c232', '#6aa84f', '#45818e', '#3c78d8', '#3d85c6', '#674ea7', '#a64d79'],
        ['#85200c', '#990000', '#b45f06', '#bf9000', '#38761d', '#134f5c', '#1155cc', '#0b5394', '#351c75', '#741b47'],
        ['#5b0f00', '#660000', '#783f04', '#7f6000', '#274e13', '#0c343d', '#0c5394', '#073763', '#20124d', '#4c1130']
    ],
    styleTags: ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
    // Configuración para subida de imágenes personalizada
    callbacks: {
        onImageUpload: function(files) {
            uploadImageToServer(files[0], this);
        },
        onMediaDelete: function(target, editor, editable) {
            // Eliminar imagen física cuando se quita del editor
            deleteImageFromServer(target[0].src);
        },
        // Deshabilitar el modal de imagen por defecto
        onImageLinkInsert: function(url) {
            // Usar nuestra función personalizada
            return false;
        },
        onInit: function() {
            console.log('Summernote initialized');
            
            // Fix para modales de Summernote
            setTimeout(() => {
                // Asegurar que los modales tengan el z-index correcto
                $('.note-modal').css('z-index', '10000');
                $('.note-modal-backdrop').css('z-index', '9999');
                
                // Fix para el modal de imagen específicamente
                $(document).on('click', '.note-image-dialog .close', function() {
                    $('.note-image-dialog').remove();
                    $('.note-modal-backdrop').remove();
                });
                
                // Asegurar que el backdrop sea clickeable para cerrar
                $(document).on('click', '.note-modal-backdrop', function() {
                    $('.note-image-dialog').remove();
                    $('.note-modal-backdrop').remove();
                });
            }, 100);
            
            // Cambiar el color de fondo del área de contenido
            setTimeout(() => {
                $('.note-editable').css('background-color', 'white');
                $('.note-editable').css('color', 'black');
                
                // Añadir estilos CSS personalizados para listas e imágenes
                $('<style>')
                    .prop('type', 'text/css')
                    .html(`
                        .note-editable ul {
                            list-style-type: disc;
                            margin-left: 20px;
                            margin-bottom: 10px;
                        }
                        .note-editable ol {
                            list-style-type: decimal;
                            margin-left: 20px;
                            margin-bottom: 10px;
                        }
                        .note-editable li {
                            margin-bottom: 5px;
                            line-height: 1.5;
                        }
                        .note-editable ul ul {
                            list-style-type: circle;
                        }
                        .note-editable ul ul ul {
                            list-style-type: square;
                        }
                        .note-editable ol ol {
                            list-style-type: lower-alpha;
                        }
                        .note-editable ol ol ol {
                            list-style-type: lower-roman;
                        }
                        /* Estilos para imágenes centradas */
                        .note-editable img {
                            display: block !important;
                            margin: 15px auto !important;
                            max-width: 100% !important;
                            height: auto !important;
                            border-radius: 8px !important;
                            box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
                            text-align: center !important;
                        }
                        /* Asegurar que las imágenes se vean correctamente */
                        .note-editable img[src] {
                            visibility: visible !important;
                            opacity: 1 !important;
                            display: block !important;
                        }
                        /* Estilos para imágenes con diferentes tamaños */
                        .note-editable img[style*="width"] {
                            margin-left: auto !important;
                            margin-right: auto !important;
                            display: block !important;
                        }
                        /* Contenedor de imágenes para centrado */
                        .note-editable p:has(img) {
                            text-align: center !important;
                        }
                        /* Estilos adicionales para mejorar la visualización */
                        .note-editable img {
                            border: 1px solid #e5e7eb !important;
                            transition: transform 0.2s ease !important;
                        }
                        .note-editable img:hover {
                            transform: scale(1.02) !important;
                        }
                    `)
                    .appendTo('head');
            }, 100);
        },
        onEnter: function() {
            // Permitir crear listas con Enter
            return true;
        }
    }
};

// Función para eliminar imágenes del servidor desde Summernote
function deleteImageFromServer(imageUrl) {
    console.log('deleteImageFromServer called with URL:', imageUrl);
    
    // Determinar la URL correcta según el contexto
    const isAdmin = window.location.pathname.includes('/admin/');
    const deleteUrl = isAdmin ? '/admin/articulos/delete-image' : '/creador/articulos/delete-image';
    
    console.log('Delete URL:', deleteUrl);
    console.log('Is Admin:', isAdmin);
    
    // Intentar obtener el ID del artículo si estamos editando
    let articuloId = null;
    
    // Para el modal de editar, obtener el ID del artículo
    const editForm = document.getElementById('editForm');
    if (editForm && editForm.action) {
        const actionMatch = editForm.action.match(/\/(\d+)$/);
        if (actionMatch) {
            articuloId = actionMatch[1];
            console.log('Article ID found for deletion:', articuloId);
        }
    }
    
    const formData = new FormData();
    formData.append('image_url', imageUrl);
    if (articuloId) {
        formData.append('articulo_id', articuloId);
    }
    
    console.log('FormData contents for deletion:');
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    
    fetch(deleteUrl, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        console.log('Delete response status:', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Delete response data:', data);
        if (data.success) {
            console.log('Imagen eliminada del servidor exitosamente:', imageUrl);
        } else {
            console.warn('No se pudo eliminar la imagen del servidor:', data.error || 'Error desconocido');
        }
    })
    .catch(error => {
        console.error('Error al eliminar imagen del servidor:', error);
    });
}

// Función para subir imágenes al servidor desde Summernote
function uploadImageToServer(file, editor) {
    const formData = new FormData();
    formData.append('image', file);
    
    // Determinar la URL correcta según el contexto
    const isAdmin = window.location.pathname.includes('/admin/');
    const uploadUrl = isAdmin ? '/admin/articulos/upload-image' : '/creador/articulos/upload-image';
    
    // Intentar obtener el ID del artículo si estamos editando
    let articuloId = null;
    
    // Para el modal de editar, obtener el ID del artículo
    const editForm = document.getElementById('editForm');
    if (editForm && editForm.action) {
        const actionMatch = editForm.action.match(/\/(\d+)$/);
        if (actionMatch) {
            articuloId = actionMatch[1];
            formData.append('articulo_id', articuloId);
        }
    }
    
    // Para artículos nuevos o cuando se necesita obtener categoría y título del formulario
    if (!articuloId) {
        // Buscar en el modal de crear
        const createForm = document.getElementById('createForm');
        let categoriaCheckboxes = null;
        let tituloInput = null;
        
        if (createForm) {
            categoriaCheckboxes = createForm.querySelectorAll('input[name="categorias[]"]:checked');
            tituloInput = createForm.querySelector('input[name="titulo"]');
        }
        
        // Si no se encuentra en crear, buscar en el modal de editar
        if (!categoriaCheckboxes || categoriaCheckboxes.length === 0) {
            const editForm = document.getElementById('editForm');
            if (editForm) {
                categoriaCheckboxes = editForm.querySelectorAll('input[name="categorias[]"]:checked');
                tituloInput = editForm.querySelector('input[name="titulo"]');
            }
        }
        
        console.log('Found categoriaCheckboxes:', categoriaCheckboxes ? categoriaCheckboxes.length : 0);
        console.log('Found tituloInput:', tituloInput);
        
        if (categoriaCheckboxes && categoriaCheckboxes.length > 0 && tituloInput) {
            // Tomar la primera categoría seleccionada
            const categoria = categoriaCheckboxes[0].value;
            const titulo = tituloInput.value || 'articulo';
            
            console.log('Selected categoria:', categoria);
            console.log('Input titulo:', titulo);
            
            formData.append('categoria', categoria);
            formData.append('titulo', titulo);
            console.log('Using form data - categoria:', categoria, 'titulo:', titulo);
        } else {
            console.warn('Could not find selected categorias or titulo input');
            // Usar valores por defecto si no se encuentran los campos
            formData.append('categoria', 'general');
            formData.append('titulo', 'articulo');
        }
    }
    
    fetch(uploadUrl, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.url) {
            // Insertar la imagen en el editor
            $(editor).summernote('insertImage', data.url);
        } else {
            console.error('Error al subir imagen:', data);
            showNotification('Error al subir la imagen', 'error');
        }
    })
    .catch(error => {
        console.error('Error al subir imagen:', error);
        showNotification('Error al subir la imagen', 'error');
    });
}

// Funciones para inicializar Summernote
function initializeCreateEditor() {
    console.log('Iniciando editor de crear...');
    
    // Verificar dependencias de manera más robusta
    if (!window.jQuery || !window.jQuery.fn.summernote) {
        console.error('jQuery o Summernote no están disponibles');
        setTimeout(initializeCreateEditor, 1000);
        return;
    }
    
    // Limpiar editor anterior si existe
    if (createEditor) {
        try {
            createEditor.summernote('destroy');
        } catch (e) {
            console.log('Error al destruir editor anterior:', e);
        }
        createEditor = null;
    }
    
    // Verificar que el contenedor existe
    const container = document.getElementById('create_contenido');
    if (!container) {
        console.error('Contenedor create_contenido no encontrado');
        return;
    }
    
    // Limpiar el contenedor completamente
    container.innerHTML = '';
    
    // Esperar a que el modal esté completamente visible y estable
    setTimeout(() => {
        try {
            // Verificar que el elemento está visible y tiene dimensiones
            if (container.offsetParent === null || container.offsetWidth === 0) {
                console.log('Contenedor no visible o sin dimensiones, reintentando...');
                setTimeout(initializeCreateEditor, 300);
                return;
            }
            
            console.log('Inicializando Summernote en contenedor:', container);
            debugEditorState('create_contenido');
            
            // Crear el editor Summernote usando la función simple
            createEditor = initSummernoteSimple(container, 'createEditor');
            
            if (!createEditor) {
                throw new Error('No se pudo crear el editor Summernote');
            }
            
            // Crear un input hidden para el formulario
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'contenido';
            hiddenInput.id = 'create_contenido_hidden';
            document.getElementById('createForm').appendChild(hiddenInput);
            
            // Sincronizar contenido con el input hidden
            createEditor.on('summernote.change', function() {
                const content = createEditor.summernote('code');
                const hiddenInput = document.getElementById('create_contenido_hidden');
                if (hiddenInput) {
                    hiddenInput.value = content;
                }
            });
            
            console.log('Editor de crear inicializado correctamente');
        } catch (error) {
            console.error('Error al inicializar editor de crear:', error);
            // Fallback: crear un textarea simple
            createFallbackEditor(container, 'create');
        }
    }, 800);
}

function initializeEditEditor(content = '') {
    console.log('Iniciando editor de editar...');
    
    // Verificar dependencias de manera más robusta
    if (!window.jQuery || !window.jQuery.fn.summernote) {
        console.error('jQuery o Summernote no están disponibles');
        setTimeout(() => initializeEditEditor(content), 1000);
        return;
    }
    
    // Limpiar editor anterior si existe
    if (editEditor) {
        try {
            editEditor.summernote('destroy');
        } catch (e) {
            console.log('Error al destruir editor anterior:', e);
        }
        editEditor = null;
    }
    
    // Verificar que el contenedor existe
    const container = document.getElementById('edit_contenido');
    if (!container) {
        console.error('Contenedor edit_contenido no encontrado');
        return;
    }
    
    // Limpiar el contenedor completamente
    container.innerHTML = '';
    
    // Esperar a que el modal esté completamente visible y estable
    setTimeout(() => {
        try {
            // Verificar que el elemento está visible y tiene dimensiones
            if (container.offsetParent === null || container.offsetWidth === 0) {
                console.log('Contenedor no visible o sin dimensiones, reintentando...');
                setTimeout(() => initializeEditEditor(content), 300);
                return;
            }
            
            console.log('Inicializando Summernote en contenedor de editar:', container);
            debugEditorState('edit_contenido');
            
            // Crear el editor Summernote usando la función simple
            editEditor = initSummernoteSimple(container, 'editEditor');
            
            if (!editEditor) {
                throw new Error('No se pudo crear el editor Summernote');
            }
            
            // Establecer contenido inicial
            if (content) {
                editEditor.summernote('code', content);
            }
            
            // Crear un input hidden para el formulario
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'contenido';
            hiddenInput.id = 'edit_contenido_hidden';
            document.getElementById('editForm').appendChild(hiddenInput);
            
            // Sincronizar contenido con el input hidden
            editEditor.on('summernote.change', function() {
                const content = editEditor.summernote('code');
                const hiddenInput = document.getElementById('edit_contenido_hidden');
                if (hiddenInput) {
                    hiddenInput.value = content;
                }
            });
            
            console.log('Editor de editar inicializado correctamente');
        } catch (error) {
            console.error('Error al inicializar editor de editar:', error);
            // Fallback: crear un textarea simple
            createFallbackEditor(container, 'edit', content);
        }
    }, 800);
}

// Función para verificar que todo esté listo
function checkDependencies() {
    console.log('Verificando dependencias...');
    
    // Verificar jQuery
    if (typeof $ === 'undefined') {
        console.error('jQuery no está disponible');
        return false;
    }
    
    if (typeof $.fn.summernote === 'undefined') {
        console.error('Summernote no está disponible');
        return false;
    }
    
    // Verificar que jQuery esté completamente cargado
    if (!$ || !$.fn) {
        console.error('jQuery no está completamente cargado');
        return false;
    }
    
    // Verificar que Summernote esté completamente cargado
    if (!$.fn.summernote) {
        console.error('Summernote no está completamente cargado');
        return false;
    }
    
    console.log('Todas las dependencias están disponibles');
    return true;
}

// Función de debug para verificar el estado del editor
function debugEditorState(containerId) {
    const container = document.getElementById(containerId);
    console.log(`=== DEBUG EDITOR ${containerId} ===`);
    console.log('Container existe:', !!container);
    console.log('Container visible:', container ? container.offsetParent !== null : false);
    console.log('Container dimensions:', container ? `${container.offsetWidth}x${container.offsetHeight}` : 'N/A');
    console.log('jQuery disponible:', typeof $ !== 'undefined');
    console.log('Summernote disponible:', typeof $ !== 'undefined' && typeof $.fn.summernote !== 'undefined');
    console.log('Contenido del container:', container ? container.innerHTML : 'N/A');
    console.log('================================');
}

// Función simple para inicializar Summernote
function initSummernoteSimple(container, editorVar) {
    console.log('Inicializando Summernote de forma simple...');
    
    try {
        const editor = $(container).summernote(summernoteConfig);
        
        console.log('Summernote inicializado exitosamente');
        return editor;
    } catch (error) {
        console.error('Error al inicializar Summernote:', error);
        return null;
    }
}

// Función de fallback para crear un editor simple si Summernote falla
function createFallbackEditor(container, type, content = '') {
    console.log(`Creando editor de fallback para ${type}`);
    
    const textarea = document.createElement('textarea');
    textarea.id = `${type}_contenido_textarea`;
    textarea.name = 'contenido';
    textarea.className = 'w-full min-h-[300px] px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700 dark:text-white transition-all duration-200 resize-vertical';
    textarea.placeholder = 'Escribe el contenido de tu artículo aquí...';
    textarea.value = content;
    
    container.appendChild(textarea);
    
    // Crear un input hidden para el formulario
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'contenido';
    hiddenInput.id = `${type}_contenido_hidden`;
    document.getElementById(`${type}Form`).appendChild(hiddenInput);
    
    // Sincronizar contenido con el input hidden
    textarea.addEventListener('input', function() {
        const hiddenInput = document.getElementById(`${type}_contenido_hidden`);
        if (hiddenInput) {
            hiddenInput.value = this.value;
        }
    });
    
    // Establecer contenido inicial
    if (content) {
        textarea.value = content;
        hiddenInput.value = content;
    }
    
    console.log(`Editor de fallback creado para ${type}`);
}

// Función para inicializar el sistema cuando esté listo
function initializeSummernoteSystem() {
    console.log('Inicializando sistema de Summernote...');
    
    if (checkDependencies()) {
        console.log('Sistema de editores Summernote listo');
        return true;
    } else {
        console.error('Faltan dependencias para los editores Summernote');
        return false;
    }
}

// Función para obtener el contenido del editor de crear
function getCreateEditorContent() {
    if (createEditor && typeof $ !== 'undefined') {
        try {
            return createEditor.summernote('code');
        } catch (error) {
            console.error('Error al obtener contenido del editor Summernote:', error);
            // Intentar obtener del textarea de fallback
            const fallbackTextarea = document.getElementById('create_contenido_textarea');
            if (fallbackTextarea) {
                return fallbackTextarea.value;
            }
        }
    } else {
        // Intentar obtener del textarea de fallback
        const fallbackTextarea = document.getElementById('create_contenido_textarea');
        if (fallbackTextarea) {
            return fallbackTextarea.value;
        }
    }
    return '';
}

// Función para obtener el contenido del editor de editar
function getEditEditorContent() {
    if (editEditor && typeof $ !== 'undefined') {
        try {
            return editEditor.summernote('code');
        } catch (error) {
            console.error('Error al obtener contenido del editor Summernote:', error);
            // Intentar obtener del textarea de fallback
            const fallbackTextarea = document.getElementById('edit_contenido_textarea');
            if (fallbackTextarea) {
                return fallbackTextarea.value;
            }
        }
    } else {
        // Intentar obtener del textarea de fallback
        const fallbackTextarea = document.getElementById('edit_contenido_textarea');
        if (fallbackTextarea) {
            return fallbackTextarea.value;
        }
    }
    return '';
}

// Función para limpiar el editor de crear
function destroyCreateEditor() {
    if (createEditor && typeof $ !== 'undefined') {
        try {
            createEditor.summernote('destroy');
        } catch (e) {
            console.log('Error al destruir editor de crear:', e);
        }
        createEditor = null;
    }
    
    // Limpiar editor de fallback si existe
    const fallbackTextarea = document.getElementById('create_contenido_textarea');
    if (fallbackTextarea) {
        fallbackTextarea.remove();
    }
    
    // Limpiar input hidden si existe
    const hiddenInput = document.getElementById('create_contenido_hidden');
    if (hiddenInput) {
        hiddenInput.remove();
    }
}

// Función para limpiar el editor de editar
function destroyEditEditor() {
    if (editEditor && typeof $ !== 'undefined') {
        try {
            editEditor.summernote('destroy');
        } catch (e) {
            console.log('Error al destruir editor de editar:', e);
        }
        editEditor = null;
    }
    
    // Limpiar editor de fallback si existe
    const fallbackTextarea = document.getElementById('edit_contenido_textarea');
    if (fallbackTextarea) {
        fallbackTextarea.remove();
    }
    
    // Limpiar input hidden si existe
    const hiddenInput = document.getElementById('edit_contenido_hidden');
    if (hiddenInput) {
        hiddenInput.remove();
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado, verificando dependencias de Summernote...');
    
    // Esperar más tiempo para asegurar que todas las dependencias estén cargadas
    setTimeout(() => {
        if (!initializeSummernoteSystem()) {
            console.error('Faltan dependencias para los editores Summernote, reintentando...');
            // Reintentar después de un tiempo
            setTimeout(() => {
                if (!initializeSummernoteSystem()) {
                    console.error('Las dependencias de Summernote siguen faltando después del reintento');
                }
            }, 1000);
        }
    }, 1000);
});

// Respaldo: inicializar cuando la ventana esté completamente cargada
window.addEventListener('load', function() {
    console.log('Ventana completamente cargada, verificando sistema de Summernote...');
    setTimeout(() => {
        if (!initializeSummernoteSystem()) {
            console.error('Sistema de Summernote no inicializado después de carga completa');
        }
    }, 500);
});

// Exportar funciones para uso externo
window.SummernoteManager = {
    initializeCreateEditor,
    initializeEditEditor,
    getCreateEditorContent,
    getEditEditorContent,
    destroyCreateEditor,
    destroyEditEditor,
    checkDependencies,
    initializeSummernoteSystem
};

// Función global para cerrar modales de Summernote
window.closeSummernoteModals = function() {
    $('.note-image-dialog').remove();
    $('.note-modal-backdrop').remove();
    $('.note-modal').remove();
    console.log('Modales de Summernote cerrados');
};

// Función para prevenir que los modales se bloqueen
window.preventSummernoteModalBlock = function() {
    // Interceptar clicks en el botón de imagen
    $(document).on('click', '.note-btn-image', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        // Crear un input de archivo temporal
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.style.display = 'none';
        
        input.onchange = function(event) {
            const file = event.target.files[0];
            if (file) {
                // Usar nuestra función de subida personalizada
                uploadImageToServer(file, $('.note-editable').summernote('editor'));
            }
            document.body.removeChild(input);
        };
        
        document.body.appendChild(input);
        input.click();
    });
};

// Verificar que el módulo se cargó correctamente
console.log('✅ SummernoteManager cargado correctamente');
console.log('SummernoteManager disponible:', !!window.SummernoteManager);

// Inicializar prevención de bloqueo de modales
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        window.preventSummernoteModalBlock();
    }, 1000);
});
