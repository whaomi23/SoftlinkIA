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



// Auto-ejecutar cuando se carga la página
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎯 DOM cargado, configurando debug...');

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
