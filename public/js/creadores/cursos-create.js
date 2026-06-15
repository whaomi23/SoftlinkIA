let nivelCounter = 0;
let currentTab = 1;

// Función para cambiar de tab
function switchTab(tabNumber) {
    // Ocultar todos los tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });

    // Remover clase active de todos los botones y resetear estilos
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('active');
        button.classList.remove('border-purple-500', 'border-cyan-400', 'border-emerald-400', 'border-pink-400', 'border-blue-400', 'border-indigo-400');
        button.classList.remove('bg-slate-800/50');
        button.classList.add('text-slate-400');
        button.classList.remove('text-slate-200', 'text-white');
    });

    // Mostrar el tab seleccionado
    const selectedTab = document.getElementById(`tab-${tabNumber}`);
    if (selectedTab) {
        selectedTab.classList.remove('hidden');
    }

    // Agregar clase active y estilos al botón seleccionado
    const selectedButton = document.querySelectorAll('.tab-button')[tabNumber - 1];
    if (selectedButton) {
        selectedButton.classList.add('active');
        // Colores específicos por tab
        const colors = ['border-purple-500', 'border-cyan-400', 'border-emerald-400', 'border-pink-400', 'border-blue-400', 'border-indigo-400'];
        selectedButton.classList.add(colors[tabNumber - 1]);
        selectedButton.classList.add('bg-slate-800/50');
        selectedButton.classList.remove('text-slate-400');
        selectedButton.classList.add('text-slate-200');
    }

    currentTab = tabNumber;

    // Scroll suave al inicio del formulario
    const formContainer = document.querySelector('.bg-slate-900\\/95');
    if (formContainer) {
        formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Inicializar el primer tab al cargar
document.addEventListener('DOMContentLoaded', function() {
    switchTab(1);
});

function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}

function submitCreateForm(event) {
    event.preventDefault();

    const form = event.target;
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;

    // Deshabilitar botón y mostrar loading
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <div class="flex items-center justify-center">
            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white mr-3"></div>
            <span>Creando Curso...</span>
        </div>
    `;

    // Crear FormData
    const formData = new FormData(form);

    // Enviar formulario con AJAX
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || formData.get('_token')
        },
        redirect: 'follow'
    })
    .then(async response => {
        // Si la respuesta es exitosa (200-299) o redirección
        if (response.ok || response.status === 302) {
            // Intentar parsear como JSON primero
            try {
                const data = await response.json();
                if (data.success) {
                    showSuccessModal();
                    if (data.redirect) {
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 2000);
                    }
                    return;
                }
            } catch (e) {
                // Si no es JSON, asumir éxito y mostrar modal
                // El controlador probablemente redirigió
                showSuccessModal();
                // Marcar para mostrar modal después de recargar
                sessionStorage.setItem('curso_creado', 'true');
                // Recargar después de un momento para ver el modal
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            }
        } else {
            // Si hay errores de validación, Laravel devuelve 422
            if (response.status === 422) {
                const data = await response.json();
                // Mostrar errores de validación
                alert('Por favor, corrige los errores en el formulario');
                // Recargar para mostrar errores
                window.location.reload();
            } else {
                throw new Error('Error al crear el curso');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Si hay error de red, enviar el formulario de forma tradicional
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        form.submit();
    });
}

// Sistema de partículas para el modal
let particlesAnimation = null;

function initParticles() {
    const canvas = document.getElementById('particlesCanvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const particles = [];
    const particleCount = 50;

    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 3 + 1;
            this.speedX = Math.random() * 2 - 1;
            this.speedY = Math.random() * 2 - 1;
            this.color = ['#10b981', '#06b6d4', '#a855f7', '#ec4899'][Math.floor(Math.random() * 4)];
            this.opacity = Math.random() * 0.5 + 0.3;
        }

        update() {
            this.x += this.speedX;
            this.y += this.speedY;

            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
            if (this.y > canvas.height) this.y = 0;
            if (this.y < 0) this.y = canvas.height;
        }

        draw() {
            ctx.fillStyle = this.color;
            ctx.globalAlpha = this.opacity;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.globalAlpha = 1;
        }
    }

    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });

        particlesAnimation = requestAnimationFrame(animate);
    }

    animate();
}

function stopParticles() {
    if (particlesAnimation) {
        cancelAnimationFrame(particlesAnimation);
        particlesAnimation = null;
    }
    const canvas = document.getElementById('particlesCanvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
}

// Función para mostrar el modal de éxito
function showSuccessModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevenir scroll

        // Inicializar partículas
        setTimeout(() => {
            initParticles();
        }, 100);

        // Ajustar canvas al redimensionar
        window.addEventListener('resize', function resizeHandler() {
            const canvas = document.getElementById('particlesCanvas');
            if (canvas) {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
        });
    }
}

// Función para cerrar el modal de éxito
function closeSuccessModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Restaurar scroll

        // Detener partículas
        stopParticles();
    }
}

// Cerrar modal al hacer clic fuera de él
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeSuccessModal();
            }
        });

        // Cerrar con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeSuccessModal();
            }
        });
    }

    // Verificar si hay un mensaje de éxito en la URL (después de redirección)
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1' || window.location.hash === '#success') {
        showSuccessModal();
    }

    // Verificar sessionStorage para mostrar modal después de crear curso
    if (sessionStorage.getItem('curso_creado') === 'true') {
        showSuccessModal();
        sessionStorage.removeItem('curso_creado'); // Limpiar después de mostrar
    }
});

// Función para manejar los campos de redes sociales
function toggleRedSocialField(redSocial, checkbox) {
    const redSocialItem = checkbox.closest('.red-social-item');
    const inputField = redSocialItem.querySelector(`input[name="${redSocial}_usuario"]`);

    if (checkbox.checked) {
        inputField.style.display = 'block';
        inputField.focus();
    } else {
        inputField.style.display = 'none';
        inputField.value = ''; // Limpiar el campo cuando se desmarca
    }
}

function addNivel() {
    nivelCounter++;
    const container = document.getElementById('niveles-container');

    const nivelHtml = `
        <div class="nivel-item bg-white dark:bg-slate-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 shadow-lg" data-nivel-index="${nivelCounter}">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">
                        ${nivelCounter}
                    </div>
                    <h5 class="text-lg font-semibold text-gray-900 dark:text-white">Nivel ${nivelCounter}</h5>
                </div>
                <button type="button" onclick="removeNivel(${nivelCounter})" class="text-red-500 hover:text-red-700 transition-colors">
                    <span class="material-icons">delete</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <!-- Título del Nivel -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <span class="material-icons text-sm mr-1">title</span>
                        Título del Nivel *
                    </label>
                    <input type="text" name="niveles[${nivelCounter}][titulo]"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white"
                           placeholder="Ej: Fundamentos de Programación" required>
                </div>

                <!-- Descripción del Nivel -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <span class="material-icons text-sm mr-1">description</span>
                        Descripción del Nivel
                    </label>
                    <textarea name="niveles[${nivelCounter}][descripcion]" rows="2"
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-700 dark:text-white"
                              placeholder="Describe qué aprenderán en este nivel"></textarea>
                </div>

                <!-- Campo oculto para el número del nivel -->
                <input type="hidden" name="niveles[${nivelCounter}][numero]" value="${nivelCounter}">
            </div>

            <!-- Subniveles -->
            <div class="mt-4">
                <div class="flex items-center justify-between mb-3">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                        <span class="material-icons text-sm mr-1">layers</span>
                        Subniveles (máximo 10)
                    </label>
                    <button type="button" onclick="addSubnivel(${nivelCounter})"
                            class="inline-flex items-center px-3 py-1 text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30">
                        <span class="material-icons text-sm mr-1">add_circle</span>
                        Agregar Subnivel
                    </button>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                    <div class="space-y-4" id="subniveles_${nivelCounter}">
                        <div class="subnivel-item bg-white dark:bg-slate-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600" data-subnivel-index="1">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-2">
                                    <span class="w-6 h-6 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Subnivel 1</span>
                                </div>
                                <button type="button" onclick="removeSubnivel(${nivelCounter}, this)"
                                        class="text-red-500 hover:text-red-700 transition-colors opacity-0 group-hover:opacity-100">
                                    <span class="material-icons text-sm">remove_circle</span>
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <!-- Numeración Personalizada -->
                                <div class="md:col-span-2">
                                    <label class="flex items-center text-xs text-gray-600 dark:text-gray-400 mb-2">
                                        <input type="checkbox"
                                               name="niveles[${nivelCounter}][subniveles][1][numeracion_personalizada]"
                                               value="1"
                                               class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                               onchange="toggleCustomNumbering(this)">
                                        <span class="material-icons text-xs mr-1">edit</span>
                                        Numeración personalizada (opcional)
                                    </label>

                                    <!-- Campo de número personalizado (oculto por defecto) -->
                                    <div class="custom-number-field" style="display: none;">
                                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                            <span class="material-icons text-xs mr-1">numbers</span>
                                            Número del Subnivel
                                        </label>
                                        <input type="number" name="niveles[${nivelCounter}][subniveles][1][numero_personalizado]"
                                               value="1"
                                               min="1"
                                               max="999"
                                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                                               placeholder="Ej: 1, 5, 10, etc.">
                                    </div>

                                    <!-- Campo oculto para número automático -->
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][numero]" value="1">
                                </div>

                                <!-- Título del Subnivel -->
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">title</span>
                                        Título del Subnivel
                                    </label>
                                    <input type="text" name="niveles[${nivelCounter}][subniveles][1][titulo]"
                                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                                           placeholder="Ej: Variables básicas">
                                </div>

                                <!-- Descripción del Subnivel -->
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">description</span>
                                        Descripción
                                    </label>
                                    <textarea name="niveles[${nivelCounter}][subniveles][1][descripcion]" rows="2"
                                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                                              placeholder="Describe qué aprenderán en este subnivel"></textarea>
                                </div>

                                <!-- Tipo de Contenido Multimedia -->
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">
                                        <span class="material-icons text-xs mr-1">video_library</span>
                                        Tipo de Contenido Multimedia
                                    </label>
                                    <div class="space-y-2">
                                        <!-- Checkbox para usar iframe -->
                                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                            <input type="checkbox"
                                                   name="niveles[${nivelCounter}][subniveles][1][usar_iframe]"
                                                   value="1"
                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                   onchange="toggleIframeField(${nivelCounter}, 1, this)">
                                            <span class="material-icons text-xs mr-1">code</span>
                                            Usar Iframe (HTML embebido)
                                        </label>

                                        <!-- Checkbox para usar URL de video -->
                                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                            <input type="checkbox"
                                                   name="niveles[${nivelCounter}][subniveles][1][usar_url_video]"
                                                   value="1"
                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                   onchange="toggleUrlVideoField(${nivelCounter}, 1, this)">
                                            <span class="material-icons text-xs mr-1">link</span>
                                            Usar URL de Video (YouTube, Vimeo, Odysee, etc.)
                                        </label>

                                        <!-- Checkbox para subir archivo de video -->
                                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                            <input type="checkbox"
                                                   name="niveles[${nivelCounter}][subniveles][1][usar_video_archivo]"
                                                   value="1"
                                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                   onchange="toggleVideoFileField(${nivelCounter}, 1, this)">
                                            <span class="material-icons text-xs mr-1">video_file</span>
                                            Subir Archivo de Video
                                        </label>
                                    </div>
                                </div>

                                <!-- Campo Iframe (oculto por defecto) -->
                                <div class="md:col-span-2 iframe-field" style="display: none;">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">code</span>
                                        Código Iframe HTML
                                    </label>
                                    <textarea name="niveles[${nivelCounter}][subniveles][1][url_iframe]" rows="3"
                                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                                              placeholder="<iframe src='https://www.youtube.com/embed/VIDEO_ID' width='100%' height='300'></iframe>"></textarea>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pega aquí el código iframe completo</p>
                                </div>

                                <!-- Campo URL de Video (oculto por defecto) -->
                                <div class="md:col-span-2 url-video-field" style="display: none;">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">link</span>
                                        URL del Video
                                    </label>
                                    <input type="url" name="niveles[${nivelCounter}][subniveles][1][url_video]"
                                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                                           placeholder="https://www.youtube.com/watch?v=VIDEO_ID o https://vimeo.com/VIDEO_ID">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Soporta: YouTube, Vimeo, Odysee, Twitch, etc.</p>
                                </div>

                                <!-- Campo Archivo de Video (oculto por defecto) -->
                                <div class="md:col-span-2 video-file-field" data-nivel-index="${nivelCounter}" data-subnivel-index="1" style="display: none;">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                                        <span class="material-icons text-xs mr-1">video_file</span>
                                        Archivo de Video
                                    </label>

                                    <!-- Área de carga por fragmentos -->
                                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                                        <div class="text-center">
                                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                                                Arrastra tu video aquí o haz clic para seleccionar
                                            </p>
                                            <button type="button"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200"
                                                    onclick="initChunkUpload(${nivelCounter}, 1, null)">
                                                <span class="material-icons text-sm mr-1">upload</span>
                                                Seleccionar Video
                                            </button>
                                </div>

                                        <!-- Información del archivo seleccionado -->
                                        <div class="mt-3 file-info" style="display: none;">
                                            <div class="flex items-center justify-between bg-blue-50 dark:bg-blue-900/20 rounded-lg p-3 border border-blue-200 dark:border-blue-700">
                                                <div class="flex items-center space-x-2">
                                                    <span class="material-icons text-sm text-blue-600">video_file</span>
                                                    <div>
                                                        <div class="text-xs text-gray-700 dark:text-gray-300 file-name font-semibold"></div>
                                                        <div class="text-xs text-gray-500 dark:text-gray-400 file-size"></div>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="cancelChunkUpload()" class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Cancelar selección">
                                                    <span class="material-icons text-sm">close</span>
                                                </button>
                                            </div>

                                            <!-- Botón de confirmación para iniciar carga -->
                                            <div class="mt-3 text-center">
                                                <button type="button"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200 confirm-upload-btn"
                                                        onclick="startChunkUpload()">
                                                    <span class="material-icons text-sm mr-2">play_arrow</span>
                                                    Confirmar y Subir Video
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Barra de progreso -->
                                        <div class="mt-3 progress-container" style="display: none;">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-xs text-gray-600 dark:text-gray-400 font-semibold">Subiendo video...</span>
                                                <span class="text-xs text-gray-600 dark:text-gray-400 progress-percentage font-bold">0%</span>
                                            </div>
                                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                                <div class="bg-gradient-to-r from-green-500 to-blue-600 h-3 rounded-full progress-bar transition-all duration-300" style="width: 0%"></div>
                                            </div>
                                            <div class="mt-2 text-center">
                                                <span class="text-xs text-gray-500 dark:text-gray-400 progress-status">Preparando carga...</span>
                                            </div>
                                        </div>

                                        <!-- Mensaje de éxito -->
                                        <div class="mt-3 success-message" style="display: none;">
                                            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg p-3">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <span class="material-icons text-green-600 text-lg">check_circle</span>
                                                    <span class="text-sm text-green-700 dark:text-green-300 font-semibold">¡Video cargado exitosamente!</span>
                                            </div>
                                                <p class="text-xs text-green-600 dark:text-green-400 mt-1 text-center">
                                                    Ya puedes crear el curso
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mt-3 text-center">
                                            <div class="flex flex-wrap justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP4</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">AVI</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MOV</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">WMV</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">WebM</span>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                                <span class="font-semibold">Límites:</span> Hasta 10GB • Formatos de video estándar
                                            </p>
                                        </div>
                                        </div>

                                    <!-- Campos ocultos para el video -->
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][video_archivo_path]" value="">
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][video_archivo_nombre]" value="">
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][video_archivo_tipo]" value="">
                                    <input type="hidden" name="niveles[${nivelCounter}][subniveles][1][video_archivo_tamaño]" value="">
                                </div>

                                <!-- Recurso del Subnivel -->
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                                        <span class="material-icons text-xs mr-1">attach_file</span>
                                        Archivos Recurso (Opcional)
                                    </label>

                                    <!-- Área de Subida de Nuevos Archivos -->
                                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                                        <div class="text-center">
                                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                                Arrastra archivos aquí o haz clic para seleccionar múltiples archivos
                                            </p>

                                            <!-- Botón para seleccionar archivos -->
                                            <button type="button"
                                                    onclick="selectMultipleFiles(${nivelCounter}, 1)"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200 mb-3">
                                                <span class="material-icons text-sm mr-2">add</span>
                                                Seleccionar Archivos
                                            </button>

                                            <!-- Contador de archivos seleccionados -->
                                            <div class="file-counter text-xs text-gray-500 dark:text-gray-400 mb-2" style="display: none;">
                                                <span class="material-icons text-xs mr-1">folder</span>
                                                <span class="counter-text">0 archivos seleccionados</span>
                                            </div>

                                            <!-- Input file oculto -->
                                        <input type="file"
                                                   id="fileInput_${nivelCounter}_1"
                                               name="niveles[${nivelCounter}][subniveles][1][recursos][]"
                                               class="hidden"
                                               multiple
                                               accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.rar,.txt,.jpg,.jpeg,.png,.gif,.mp4,.avi,.mov,.wmv,.webm,.mp3,.wav,.ogg"
                                                   onchange="handleFileSelection(this)">
                                        </div>

                                        <div class="mt-3 text-center">
                                            <div class="flex flex-wrap justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">PDF</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">DOC</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">PPT</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">XLS</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">ZIP</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">TXT</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">JPG</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP4</span>
                                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP3</span>
                                        </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                                <span class="font-semibold">Límites:</span> Máximo 10 archivos • 50MB por archivo
                                    </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección de Cuestionario (Opcional) -->
                                <div class="md:col-span-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                                    <label class="flex items-center text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                                        <input type="checkbox"
                                               name="niveles[${nivelCounter}][subniveles][1][requiere_cuestionario]"
                                               value="1"
                                               class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                               onchange="toggleCuestionario(${nivelCounter}, 1, this)">
                                        <span class="material-icons text-xs mr-1">quiz</span>
                                        Requiere Cuestionario (Opcional - 10 preguntas de opción múltiple)
                                    </label>

                                    <div class="cuestionario-container mt-3" style="display: none;">
                                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-lg p-3 mb-3">
                                            <p class="text-xs text-yellow-800 dark:text-yellow-200">
                                                <span class="material-icons text-xs mr-1">info</span>
                                                El estudiante deberá aprobar este cuestionario para desbloquear el siguiente subnivel o nivel.
                                            </p>
                                        </div>
                                        <div id="preguntas_${nivelCounter}_1" class="space-y-4">
                                            <!-- Las 10 preguntas se generarán aquí -->
                                        </div>
                                        <button type="button"
                                                onclick="agregarPregunta(${nivelCounter}, 1)"
                                                class="mt-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors">
                                            <span class="material-icons text-xs mr-1">add</span>
                                            Agregar Pregunta
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', nivelHtml);
    // Inicializar primera pregunta si se habilita el cuestionario
    setTimeout(() => {
        const checkbox = document.querySelector(`input[name="niveles[${nivelCounter}][subniveles][1][requiere_cuestionario]"]`);
        if (checkbox && checkbox.checked) {
            toggleCuestionario(nivelCounter, 1, checkbox);
        }
    }, 100);
}

// Variable global para almacenar el nivel a eliminar
let nivelToDelete = null;

function removeNivel(nivelIndex) {
    const nivelItem = document.querySelector(`[data-nivel-index="${nivelIndex}"]`);
    if (nivelItem) {
        // Guardar referencia del nivel a eliminar
        nivelToDelete = nivelIndex;

        // Obtener el título del nivel si existe
        const nivelTitulo = nivelItem.querySelector('input[name*="[titulo]"]')?.value || `Nivel ${nivelIndex}`;

        // Actualizar el nombre en el modal
        const nombreElement = document.getElementById('deleteNivelNombre');
        if (nombreElement) {
            nombreElement.textContent = nivelTitulo || `Nivel ${nivelIndex}`;
        }

        // Mostrar modal de confirmación
        showDeleteNivelModal();
    }
}

// Función para mostrar el modal de eliminación
function showDeleteNivelModal() {
    const modal = document.getElementById('deleteNivelModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevenir scroll
    }
}

// Función para cerrar el modal de eliminación
function cancelDeleteNivel() {
    const modal = document.getElementById('deleteNivelModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Restaurar scroll
        nivelToDelete = null; // Limpiar referencia
    }
}

// Función para confirmar la eliminación
function confirmDeleteNivel() {
    if (nivelToDelete === null) return;

    const nivelItem = document.querySelector(`[data-nivel-index="${nivelToDelete}"]`);
    if (nivelItem) {
        // Cerrar modal
        cancelDeleteNivel();

        // Agregar animación de eliminación
        nivelItem.style.transition = 'all 0.3s ease-out';
        nivelItem.style.transform = 'scale(0.8)';
        nivelItem.style.opacity = '0';

        // Eliminar después de la animación
        setTimeout(() => {
            nivelItem.remove();

            // Mostrar mensaje de éxito
            showSuccessMessage('Nivel eliminado exitosamente');

            // Limpiar referencia
            nivelToDelete = null;
        }, 300);
    }
}

// Cerrar modal al hacer clic fuera de él
document.addEventListener('DOMContentLoaded', function() {
    const deleteModal = document.getElementById('deleteNivelModal');
    if (deleteModal) {
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                cancelDeleteNivel();
            }
        });

        // Cerrar con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !deleteModal.classList.contains('hidden')) {
                cancelDeleteNivel();
            }
        });
    }
});

function addSubnivel(nivelIndex) {
    const container = document.getElementById(`subniveles_${nivelIndex}`);
    const existingSubniveles = container.querySelectorAll('.subnivel-item');

    // Verificar que no exceda el máximo de 10 subniveles
    if (existingSubniveles.length >= 10) {
        alert('Máximo 10 subniveles por nivel');
        return;
    }

    const nextIndex = existingSubniveles.length + 1;

    const subnivelHtml = `
        <div class="subnivel-item bg-white dark:bg-slate-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600 group" data-subnivel-index="${nextIndex}">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-2">
                    <span class="w-6 h-6 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center text-xs font-bold">${nextIndex}</span>
                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Subnivel ${nextIndex}</span>
                </div>
                <button type="button" onclick="removeSubnivel(${nivelIndex}, this)"
                        class="text-red-500 hover:text-red-700 transition-colors opacity-0 group-hover:opacity-100">
                    <span class="material-icons text-sm">remove_circle</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <!-- Numeración Personalizada -->
                <div class="md:col-span-2">
                    <label class="flex items-center text-xs text-gray-600 dark:text-gray-400 mb-2">
                        <input type="checkbox"
                               name="niveles[${nivelIndex}][subniveles][${nextIndex}][numeracion_personalizada]"
                               value="1"
                               class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                               onchange="toggleCustomNumbering(this)">
                        <span class="material-icons text-xs mr-1">edit</span>
                        Numeración personalizada (opcional)
                    </label>

                    <!-- Campo de número personalizado (oculto por defecto) -->
                    <div class="custom-number-field" style="display: none;">
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                            <span class="material-icons text-xs mr-1">numbers</span>
                            Número del Subnivel
                        </label>
                        <input type="number" name="niveles[${nivelIndex}][subniveles][${nextIndex}][numero_personalizado]"
                               value="${nextIndex}"
                               min="1"
                               max="999"
                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                               placeholder="Ej: 1, 5, 10, etc.">
                    </div>

                    <!-- Campo oculto para número automático -->
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][numero]" value="${nextIndex}">
                </div>

                <!-- Título del Subnivel -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">title</span>
                        Título del Subnivel
                    </label>
                    <input type="text" name="niveles[${nivelIndex}][subniveles][${nextIndex}][titulo]"
                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                           placeholder="Ej: Variables básicas">
                </div>

                <!-- Descripción del Subnivel -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">description</span>
                        Descripción
                    </label>
                    <textarea name="niveles[${nivelIndex}][subniveles][${nextIndex}][descripcion]" rows="2"
                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                              placeholder="Describe qué aprenderán en este subnivel"></textarea>
                </div>

                <!-- Tipo de Contenido Multimedia -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">
                        <span class="material-icons text-xs mr-1">video_library</span>
                        Tipo de Contenido Multimedia
                    </label>
                    <div class="space-y-2">
                        <!-- Checkbox para usar iframe -->
                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                            <input type="checkbox"
                                   name="niveles[${nivelIndex}][subniveles][${nextIndex}][usar_iframe]"
                                   value="1"
                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                   onchange="toggleIframeField(${nivelIndex}, ${nextIndex}, this)">
                            <span class="material-icons text-xs mr-1">code</span>
                            Usar Iframe (HTML embebido)
                        </label>

                        <!-- Checkbox para usar URL de video -->
                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                            <input type="checkbox"
                                   name="niveles[${nivelIndex}][subniveles][${nextIndex}][usar_url_video]"
                                   value="1"
                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                   onchange="toggleUrlVideoField(${nivelIndex}, ${nextIndex}, this)">
                            <span class="material-icons text-xs mr-1">link</span>
                            Usar URL de Video (YouTube, Vimeo, Odysee, etc.)
                        </label>

                        <!-- Checkbox para subir archivo de video -->
                        <label class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                            <input type="checkbox"
                                   name="niveles[${nivelIndex}][subniveles][${nextIndex}][usar_video_archivo]"
                                   value="1"
                                   class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                   onchange="toggleVideoFileField(${nivelIndex}, ${nextIndex}, this)">
                            <span class="material-icons text-xs mr-1">video_file</span>
                            Subir Archivo de Video
                        </label>
                    </div>
                </div>

                <!-- Campo Iframe (oculto por defecto) -->
                <div class="md:col-span-2 iframe-field" style="display: none;">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">code</span>
                        Código Iframe HTML
                    </label>
                    <textarea name="niveles[${nivelIndex}][subniveles][${nextIndex}][url_iframe]" rows="3"
                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                              placeholder="<iframe src='https://www.youtube.com/embed/VIDEO_ID' width='100%' height='300'></iframe>"></textarea>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pega aquí el código iframe completo</p>
                </div>

                <!-- Campo URL de Video (oculto por defecto) -->
                <div class="md:col-span-2 url-video-field" style="display: none;">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">link</span>
                        URL del Video
                    </label>
                    <input type="url" name="niveles[${nivelIndex}][subniveles][${nextIndex}][url_video]"
                           class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                           placeholder="https://www.youtube.com/watch?v=VIDEO_ID o https://vimeo.com/VIDEO_ID">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Soporta: YouTube, Vimeo, Odysee, Twitch, etc.</p>
                </div>

                <!-- Campo Archivo de Video (oculto por defecto) -->
                <div class="md:col-span-2 video-file-field" data-nivel-index="${nivelIndex}" data-subnivel-index="${nextIndex}" style="display: none;">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">video_file</span>
                        Archivo de Video
                    </label>

                    <!-- Área de carga por fragmentos -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                        <div class="text-center">
                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                                Arrastra tu video aquí o haz clic para seleccionar
                            </p>
                            <button type="button"
                                    class="inline-flex items-center px-3 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200"
                                    onclick="initChunkUpload(${nivelIndex}, ${nextIndex}, null)">
                                <span class="material-icons text-sm mr-1">upload</span>
                                Seleccionar Video
                            </button>
                        </div>

                        <!-- Información del archivo seleccionado -->
                        <div class="mt-3 file-info" style="display: none;">
                            <div class="flex items-center justify-between bg-blue-50 dark:bg-blue-900/20 rounded-lg p-3 border border-blue-200 dark:border-blue-700">
                                <div class="flex items-center space-x-2">
                                    <span class="material-icons text-sm text-blue-600">video_file</span>
                                    <div>
                                        <div class="text-xs text-gray-700 dark:text-gray-300 file-name font-semibold"></div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 file-size"></div>
                                    </div>
                                </div>
                                <button type="button" onclick="cancelChunkUpload()" class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Cancelar selección">
                                    <span class="material-icons text-sm">close</span>
                                </button>
                            </div>

                            <!-- Botón de confirmación para iniciar carga -->
                            <div class="mt-3 text-center">
                                <button type="button"
                                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200 confirm-upload-btn"
                                        onclick="startChunkUpload()">
                                    <span class="material-icons text-sm mr-2">play_arrow</span>
                                    Confirmar y Subir Video
                                </button>
                            </div>
                        </div>

                        <!-- Barra de progreso -->
                        <div class="mt-3 progress-container" style="display: none;">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-gray-600 dark:text-gray-400 font-semibold">Subiendo video...</span>
                                <span class="text-xs text-gray-600 dark:text-gray-400 progress-percentage font-bold">0%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-green-500 to-blue-600 h-3 rounded-full progress-bar transition-all duration-300" style="width: 0%"></div>
                            </div>
                            <div class="mt-2 text-center">
                                <span class="text-xs text-gray-500 dark:text-gray-400 progress-status">Preparando carga...</span>
                            </div>
                        </div>

                        <!-- Mensaje de éxito -->
                        <div class="mt-3 success-message" style="display: none;">
                            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg p-3">
                                <div class="flex items-center justify-center space-x-2">
                                    <span class="material-icons text-green-600 text-lg">check_circle</span>
                                    <span class="text-sm text-green-700 dark:text-green-300 font-semibold">¡Video cargado exitosamente!</span>
                                </div>
                                <p class="text-xs text-green-600 dark:text-green-400 mt-1 text-center">
                                    Ya puedes crear el curso
                                </p>
                            </div>
                        </div>

                        <div class="mt-3 text-center">
                            <div class="flex flex-wrap justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP4</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">AVI</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MOV</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">WMV</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">WebM</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                <span class="font-semibold">Límites:</span> Hasta 10GB • Formatos de video estándar
                            </p>
                        </div>
                    </div>

                    <!-- Campos ocultos para el video -->
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo_path]" value="">
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo_nombre]" value="">
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo_tipo]" value="">
                    <input type="hidden" name="niveles[${nivelIndex}][subniveles][${nextIndex}][video_archivo_tamaño]" value="">
                </div>

                <!-- Recurso del Subnivel -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                        <span class="material-icons text-xs mr-1">attach_file</span>
                        Archivos Recurso (Opcional)
                    </label>

                    <!-- Área de Subida de Nuevos Archivos -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 bg-gray-50/50 dark:bg-gray-800/50">
                        <div class="text-center">
                            <span class="material-icons text-2xl text-gray-400 dark:text-gray-500 mb-2">cloud_upload</span>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                Arrastra archivos aquí o haz clic para seleccionar múltiples archivos
                            </p>

                            <!-- Botón para seleccionar archivos -->
                            <button type="button"
                                    onclick="selectMultipleFiles(${nivelIndex}, ${nextIndex})"
                                    class="inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200 mb-3">
                                <span class="material-icons text-sm mr-2">add</span>
                                Seleccionar Archivos
                            </button>

                            <!-- Contador de archivos seleccionados -->
                            <div class="file-counter text-xs text-gray-500 dark:text-gray-400 mb-2" style="display: none;">
                                <span class="material-icons text-xs mr-1">folder</span>
                                <span class="counter-text">0 archivos seleccionados</span>
                            </div>

                            <!-- Input file oculto -->
                        <input type="file"
                                   id="fileInput_${nivelIndex}_${nextIndex}"
                               name="niveles[${nivelIndex}][subniveles][${nextIndex}][recursos][]"
                               class="hidden"
                               multiple
                               accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.rar,.txt,.jpg,.jpeg,.png,.gif,.mp4,.avi,.mov,.wmv,.webm,.mp3,.wav,.ogg"
                                   onchange="handleFileSelection(this)">
                        </div>

                        <div class="mt-3 text-center">
                            <div class="flex flex-wrap justify-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">PDF</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">DOC</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">PPT</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">XLS</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">ZIP</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">TXT</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">JPG</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP4</span>
                                <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">MP3</span>
                        </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                <span class="font-semibold">Límites:</span> Máximo 10 archivos • 50MB por archivo
                    </p>
                        </div>
                    </div>
                </div>

                <!-- Sección de Cuestionario (Opcional) -->
                <div class="md:col-span-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                    <label class="flex items-center text-xs font-semibold text-gray-600 dark:text-gray-400 mb-3">
                        <input type="checkbox"
                               name="niveles[${nivelIndex}][subniveles][${nextIndex}][requiere_cuestionario]"
                               value="1"
                               class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                               onchange="toggleCuestionario(${nivelIndex}, ${nextIndex}, this)">
                        <span class="material-icons text-xs mr-1">quiz</span>
                        Requiere Cuestionario (Opcional - 10 preguntas de opción múltiple)
                    </label>

                    <div class="cuestionario-container mt-3" style="display: none;">
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-lg p-3 mb-3">
                            <p class="text-xs text-yellow-800 dark:text-yellow-200">
                                <span class="material-icons text-xs mr-1">info</span>
                                El estudiante deberá aprobar este cuestionario para desbloquear el siguiente subnivel o nivel.
                            </p>
                        </div>
                        <div id="preguntas_${nivelIndex}_${nextIndex}" class="space-y-4">
                            <!-- Las 10 preguntas se generarán aquí -->
                        </div>
                        <button type="button"
                                onclick="agregarPregunta(${nivelIndex}, ${nextIndex})"
                                class="mt-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors">
                            <span class="material-icons text-xs mr-1">add</span>
                            Agregar Pregunta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', subnivelHtml);
}

function removeSubnivel(nivelIndex, button) {
    const container = document.getElementById(`subniveles_${nivelIndex}`);
    const existingSubniveles = container.querySelectorAll('.subnivel-item');

    // No permitir eliminar si solo queda uno
    if (existingSubniveles.length <= 1) {
        showErrorMessage('Debe haber al menos un subnivel por nivel');
        return;
    }

    // Confirmar eliminación
    if (confirm('¿Estás seguro de que quieres eliminar este subnivel? Esta acción no se puede deshacer.')) {
        // Obtener el elemento del subnivel
        const subnivelElement = button.closest('.subnivel-item');

        // Agregar animación de eliminación
        subnivelElement.style.transition = 'all 0.3s ease-out';
        subnivelElement.style.transform = 'scale(0.8)';
        subnivelElement.style.opacity = '0';

        // Eliminar después de la animación
        setTimeout(() => {
            subnivelElement.remove();

    // Renumerar los subniveles restantes
    renumberSubniveles(nivelIndex);

            // Mostrar mensaje de éxito
            showSuccessMessage('Subnivel eliminado exitosamente');
        }, 300);
    }
}

function renumberSubniveles(nivelIndex) {
    const container = document.getElementById(`subniveles_${nivelIndex}`);
    const subniveles = container.querySelectorAll('.subnivel-item');

    subniveles.forEach((subnivel, index) => {
        const newIndex = index + 1;

        // Actualizar el número visual
        const numberSpan = subnivel.querySelector('.w-6.h-6');
        if (numberSpan) {
        numberSpan.textContent = newIndex;
        }

        // Actualizar el texto del título
        const titleSpan = subnivel.querySelector('.text-sm.font-semibold');
        if (titleSpan) {
        titleSpan.textContent = `Subnivel ${newIndex}`;
        }

        // Actualizar los nombres de los campos
        const inputs = subnivel.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                const newName = name.replace(/\[subniveles\]\[\d+\]/, `[subniveles][${newIndex}]`);
                input.setAttribute('name', newName);
            }
        });

        // Actualizar el data attribute
        subnivel.setAttribute('data-subnivel-index', newIndex);
    });
}

// Funciones para manejar los campos de multimedia
function toggleIframeField(nivelIndex, subnivelIndex, checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const iframeField = subnivelContainer.querySelector('.iframe-field');
    const urlVideoField = subnivelContainer.querySelector('.url-video-field');
    const videoFileField = subnivelContainer.querySelector('.video-file-field');

    if (checkbox.checked) {
        // Ocultar otros campos
        urlVideoField.style.display = 'none';
        videoFileField.style.display = 'none';
        // Desmarcar otros checkboxes
        subnivelContainer.querySelector('input[name*="[usar_url_video]"]').checked = false;
        subnivelContainer.querySelector('input[name*="[usar_video_archivo]"]').checked = false;
        // Mostrar campo iframe
        iframeField.style.display = 'block';
    } else {
        iframeField.style.display = 'none';
    }
}

function toggleUrlVideoField(nivelIndex, subnivelIndex, checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const iframeField = subnivelContainer.querySelector('.iframe-field');
    const urlVideoField = subnivelContainer.querySelector('.url-video-field');
    const videoFileField = subnivelContainer.querySelector('.video-file-field');

    if (checkbox.checked) {
        // Ocultar otros campos
        iframeField.style.display = 'none';
        videoFileField.style.display = 'none';
        // Desmarcar otros checkboxes
        subnivelContainer.querySelector('input[name*="[usar_iframe]"]').checked = false;
        subnivelContainer.querySelector('input[name*="[usar_video_archivo]"]').checked = false;
        // Mostrar campo URL video
        urlVideoField.style.display = 'block';
    } else {
        urlVideoField.style.display = 'none';
    }
}

function toggleVideoFileField(nivelIndex, subnivelIndex, checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const iframeField = subnivelContainer.querySelector('.iframe-field');
    const urlVideoField = subnivelContainer.querySelector('.url-video-field');
    const videoFileField = subnivelContainer.querySelector('.video-file-field');

    if (checkbox.checked) {
        // Ocultar otros campos
        iframeField.style.display = 'none';
        urlVideoField.style.display = 'none';
        // Desmarcar otros checkboxes
        subnivelContainer.querySelector('input[name*="[usar_iframe]"]').checked = false;
        subnivelContainer.querySelector('input[name*="[usar_url_video]"]').checked = false;
        // Mostrar campo archivo video
        videoFileField.style.display = 'block';
    } else {
        videoFileField.style.display = 'none';
    }
}

// Mostrar mensaje de éxito
function showSuccessMessage(message) {
    // Crear toast de éxito
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Mostrar mensaje de error
function showErrorMessage(message) {
    // Crear toast de error
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Variables globales para chunk upload
let currentResumable = null;
let currentNivel = null;
let currentSubnivel = null;
let currentCursoId = null;
let selectedFile = null;
const subnivelFileStores = {}; // key: `${nivel}_${subnivel}` -> DataTransfer

// Función para seleccionar múltiples archivos
function selectMultipleFiles(nivelIndex, subnivelIndex) {
    const fileInput = document.getElementById(`fileInput_${nivelIndex}_${subnivelIndex}`);
    if (fileInput) {
        fileInput.click();
    }
}

// Función para manejar la selección de archivos (mantiene archivos existentes)
function handleFileSelection(input) {
    const files = Array.from(input.files);
    if (files.length === 0) return;

    const container = input.closest('.border-dashed');
    const wrapper = input.closest('[data-subnivel-index]');
    const nivelIndex = wrapper ? wrapper.getAttribute('data-nivel-index') || wrapper.closest('[data-nivel-index]')?.getAttribute('data-nivel-index') : null;
    const subnivelIndex = wrapper ? wrapper.getAttribute('data-subnivel-index') : null;
    const storeKey = `${nivelIndex}_${subnivelIndex}`;

    // Crear/obtener DataTransfer persistente por subnivel
    if (!subnivelFileStores[storeKey]) {
        subnivelFileStores[storeKey] = new DataTransfer();
    }
    const dt = subnivelFileStores[storeKey];

    // Agregar nuevos archivos al store (evitar duplicados por nombre+size)
    const existingSignature = new Set(Array.from(dt.files).map(f => `${f.name}:${f.size}`));
    files.forEach(file => {
        const sig = `${file.name}:${file.size}`;
        if (!existingSignature.has(sig)) {
            dt.items.add(file);
            existingSignature.add(sig);
        }
    });

    // Reflejar en el input real para que el submit incluya todos
    input.files = dt.files;

    // Renderizar preview desde el store
    renderFilesFromStore(container, dt.files);
}

function renderFilesFromStore(container, fileList) {
    let previewContainer = container.querySelector('.file-preview');
    if (!previewContainer) {
        previewContainer = document.createElement('div');
        previewContainer.className = 'file-preview mt-3';
        container.appendChild(previewContainer);
    }
    // Render completo desde el store
    previewContainer.innerHTML = '';
    Array.from(fileList).forEach((file, idx) => {
        const fileItem = document.createElement('div');
        fileItem.className = 'flex items-center justify-between bg-blue-50 dark:bg-blue-900/20 rounded-lg p-2 mb-2 border border-blue-200 dark:border-blue-700';
        const fileIcon = getFileIcon(file.type);
        const fileSize = formatFileSize(file.size);
        fileItem.innerHTML = `
            <div class="flex items-center space-x-2">
                <span class="material-icons text-sm text-blue-600">${fileIcon}</span>
                <span class="text-xs text-gray-700 dark:text-gray-300 truncate" title="${file.name}">${file.name}</span>
                <span class="text-xs text-gray-500 dark:text-gray-400">${fileSize}</span>
            </div>
            <button type="button" onclick="removeSelectedFile(this, ${idx})" class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Eliminar archivo">
                <span class="material-icons text-sm">close</span>
            </button>
        `;
        previewContainer.appendChild(fileItem);
    });
    updateFileCounter(container);
}

// Función para actualizar el contador de archivos
function updateFileCounter(container) {
    const previewContainer = container.querySelector('.file-preview');
    const counterElement = container.querySelector('.file-counter');
    const counterText = container.querySelector('.counter-text');

    if (!previewContainer || !counterElement || !counterText) return;

    const fileItems = previewContainer.querySelectorAll('.bg-blue-50');
    const count = fileItems.length;

    if (count > 0) {
        counterElement.style.display = 'block';
        counterText.textContent = `${count} archivo${count > 1 ? 's' : ''} seleccionado${count > 1 ? 's' : ''}`;
    } else {
        counterElement.style.display = 'none';
    }
}

function getFileIcon(mimeType) {
    if (mimeType.includes('pdf')) return 'picture_as_pdf';
    if (mimeType.includes('word') || mimeType.includes('document')) return 'description';
    if (mimeType.includes('powerpoint') || mimeType.includes('presentation')) return 'slideshow';
    if (mimeType.includes('excel') || mimeType.includes('spreadsheet')) return 'table_chart';
    if (mimeType.includes('zip') || mimeType.includes('rar')) return 'archive';
    if (mimeType.includes('text')) return 'text_snippet';
    if (mimeType.includes('image')) return 'image';
    if (mimeType.includes('video')) return 'video_file';
    if (mimeType.includes('audio')) return 'audio_file';
    return 'attach_file';
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

function removeSelectedFile(button, index) {
    if (confirm('¿Estás seguro de que quieres eliminar este archivo de la selección?')) {
        const fileItem = button.closest('.bg-blue-50');

        // Agregar animación de eliminación
        fileItem.style.transition = 'all 0.3s ease-out';
        fileItem.style.transform = 'translateX(100%)';
        fileItem.style.opacity = '0';

        // Eliminar después de la animación
        setTimeout(() => {
            fileItem.remove();

            // Actualizar el store e input
            updateFileInputAfterRemoval(button, index);

            // Actualizar contador
            const container = button.closest('.border-dashed');
            updateFileCounter(container);

            // Mostrar mensaje de éxito
            showSuccessMessage('Archivo eliminado de la selección');
        }, 300);
    }
}

// Función para actualizar el input después de eliminar un archivo
function updateFileInputAfterRemoval(button, index) {
    const container = button.closest('.border-dashed');
    const input = container.querySelector('input[type="file"]');
    const wrapper = input.closest('[data-subnivel-index]');
    const nivelIndex = wrapper ? wrapper.getAttribute('data-nivel-index') || wrapper.closest('[data-nivel-index]')?.getAttribute('data-nivel-index') : null;
    const subnivelIndex = wrapper ? wrapper.getAttribute('data-subnivel-index') : null;
    const storeKey = `${nivelIndex}_${subnivelIndex}`;
    if (!input || !subnivelFileStores[storeKey]) return;

    const dt = subnivelFileStores[storeKey];
    // Reconstruir DataTransfer sin el índice eliminado
    const newDT = new DataTransfer();
    Array.from(dt.files).forEach((file, i) => {
        if (i !== index) newDT.items.add(file);
    });
    subnivelFileStores[storeKey] = newDT;
    input.files = newDT.files;
    // Re-render desde store
    renderFilesFromStore(container, newDT.files);
}

// Inicializar chunk upload para un subnivel específico
function initChunkUpload(nivelNumero, subnivelNumero, cursoId) {
    currentNivel = nivelNumero;
    currentSubnivel = subnivelNumero;
    currentCursoId = cursoId;

    // Crear input file oculto
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'video/*';
    fileInput.style.display = 'none';

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validar tamaño del archivo (máximo 10GB)
            const maxSize = 10 * 1024 * 1024 * 1024; // 10GB
            if (file.size > maxSize) {
                showErrorMessage('El archivo es demasiado grande. Máximo permitido: 10GB');
                return;
            }

            // Guardar referencia del archivo
            selectedFile = file;

            // Mostrar información del archivo y botón de confirmación
            showFileInfo(file);
        }
    });

    // Agregar al DOM y hacer clic
    document.body.appendChild(fileInput);
    fileInput.click();
    document.body.removeChild(fileInput);
}

// Iniciar la carga por fragmentos (llamada desde el botón de confirmación)
function startChunkUpload() {
    // Verificar que hay un archivo seleccionado
    if (!selectedFile) {
        showErrorMessage('No hay archivo seleccionado');
        return;
    }

    // Validar tamaño del archivo (máximo 10GB)
    const maxSize = 10 * 1024 * 1024 * 1024; // 10GB
    if (selectedFile.size > maxSize) {
        showErrorMessage('El archivo es demasiado grande. Máximo permitido: 10GB');
            return;
        }

    // Ocultar información del archivo y mostrar progreso
    hideFileInfo();
    showProgress();

    // Configurar Resumable.js
    currentResumable = new Resumable({
        target: '{{ route("creador.chunk-upload") }}',
        query: {
            _token: '{{ csrf_token() }}',
            curso_id: currentCursoId,
            nivel_numero: currentNivel,
            subnivel_numero: currentSubnivel
        },
        fileType: ['mp4', 'avi', 'mov', 'wmv', 'webm'],
        chunkSize: 10 * 1024 * 1024, // 10MB por fragmento
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    // Eventos de Resumable.js
    currentResumable.on('fileAdded', function(file) {
        showProgress();
        currentResumable.upload();
    });

    currentResumable.on('fileProgress', function(file) {
        updateProgress(Math.floor(file.progress() * 100));
    });

    currentResumable.on('fileSuccess', function(file, response) {
        console.log('fileSuccess triggered');
        console.log('Response:', response);
        try {
            const data = JSON.parse(response);
            console.log('Parsed data:', data);
            if (data.success) {
                handleUploadSuccess(data);
            } else {
                handleUploadError(data.error || 'Error desconocido');
            }
        } catch (e) {
            console.error('Error parsing response:', e);
            console.error('Raw response:', response);
            handleUploadError('Error al procesar la respuesta del servidor');
        }
    });

    currentResumable.on('fileError', function(file, response) {
        console.error('fileError triggered');
        console.error('Error response:', response);
        handleUploadError('Error en la carga del archivo: ' + response);
    });

    // Agregar archivo
    currentResumable.addFile(selectedFile);
}

// Mostrar información del archivo seleccionado
function showFileInfo(file) {
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .file-info`);
    if (container) {
        container.querySelector('.file-name').textContent = file.name;
        container.querySelector('.file-size').textContent = formatFileSize(file.size);
        container.style.display = 'block';
    }
}

// Ocultar información del archivo
function hideFileInfo() {
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .file-info`);
    if (container) {
        container.style.display = 'none';
    }
}

// Mostrar barra de progreso
function showProgress() {
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .progress-container`);
    if (container) {
        container.style.display = 'block';
    }
}

// Actualizar progreso
function updateProgress(percentage) {
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .progress-container`);
    if (container) {
        const progressBar = container.querySelector('.progress-bar');
        const progressPercentage = container.querySelector('.progress-percentage');

        progressBar.style.width = `${percentage}%`;
        progressPercentage.textContent = `${percentage}%`;
    }
}

// Manejar éxito de carga
function handleUploadSuccess(data) {
    // Ocultar progreso
    const progressContainer = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .progress-container`);
    if (progressContainer) {
        progressContainer.style.display = 'none';
    }

    // Mostrar mensaje de éxito
    const successMessage = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .success-message`);
    if (successMessage) {
        successMessage.style.display = 'block';
    }

    // Actualizar campos ocultos
    const subnivelContainer = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"]`);
    if (subnivelContainer) {
        subnivelContainer.querySelector('input[name*="[video_archivo_path]"]').value = data.path;
        subnivelContainer.querySelector('input[name*="[video_archivo_nombre]"]').value = data.filename;
        subnivelContainer.querySelector('input[name*="[video_archivo_tipo]"]').value = data.mime_type;
        subnivelContainer.querySelector('input[name*="[video_archivo_tamaño]"]').value = data.size;
    }

    // Mostrar toast de éxito
    showSuccessMessage(`¡Video "${data.filename}" cargado exitosamente! Ya puedes crear el curso.`);

    // Limpiar variables
    currentResumable = null;
    currentNivel = null;
    currentSubnivel = null;
    currentCursoId = null;
    selectedFile = null;
}

// Manejar error de carga
function handleUploadError(error) {
    // Ocultar progreso
    const progressContainer = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"] .progress-container`);
    if (progressContainer) {
        progressContainer.style.display = 'none';
    }

    // Mostrar mensaje de error
    showErrorMessage(`Error en la carga: ${error}`);

    // Limpiar variables
    currentResumable = null;
    currentNivel = null;
    currentSubnivel = null;
    currentCursoId = null;
    selectedFile = null;
}

// Cancelar carga
function cancelChunkUpload() {
    if (currentResumable) {
        currentResumable.cancel();
    }

    // Ocultar elementos
    const container = document.querySelector(`[data-nivel-index="${currentNivel}"] [data-subnivel-index="${currentSubnivel}"]`);
    if (container) {
        container.querySelector('.progress-container').style.display = 'none';
        container.querySelector('.file-info').style.display = 'none';
    }

    // Limpiar variables
    currentResumable = null;
    currentNivel = null;
    currentSubnivel = null;
    currentCursoId = null;
    selectedFile = null;
}

// Auto-generar slug basado en el título (solo si el campo slug está vacío)
document.addEventListener('DOMContentLoaded', function() {
    const tituloField = document.getElementById('titulo');
    const slugField = document.getElementById('slug');

    if (tituloField && slugField) {
        tituloField.addEventListener('input', function() {
            const titulo = this.value;

            // Solo generar slug si el campo está vacío
            if (!slugField.value.trim()) {
                const slug = titulo.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');

                slugField.value = slug;
            }
        });
    }

    // Configurar actualización de números de subniveles
    setupSubnivelNumberUpdates();
});

// Función para configurar la actualización de números de subniveles
function setupSubnivelNumberUpdates() {
    // Delegar eventos para elementos dinámicos
    document.addEventListener('input', function(e) {
        if (e.target.name && e.target.name.includes('[numero_personalizado]') && e.target.type === 'number') {
            updateSubnivelVisualNumber(e.target);
        }
    });
}

// ===== FUNCIONES PARA CUESTIONARIOS =====

let preguntaCounter = {};

// Función para mostrar/ocultar el cuestionario
function toggleCuestionario(nivelIndex, subnivelIndex, checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const cuestionarioContainer = subnivelContainer.querySelector('.cuestionario-container');

    if (checkbox.checked) {
        cuestionarioContainer.style.display = 'block';
        // Agregar primera pregunta automáticamente
        const preguntasContainer = cuestionarioContainer.querySelector(`#preguntas_${nivelIndex}_${subnivelIndex}`);
        if (preguntasContainer && preguntasContainer.children.length === 0) {
            agregarPregunta(nivelIndex, subnivelIndex);
        }
    } else {
        cuestionarioContainer.style.display = 'none';
    }
}

// Función para agregar una pregunta al cuestionario
function agregarPregunta(nivelIndex, subnivelIndex) {
    const key = `${nivelIndex}_${subnivelIndex}`;
    if (!preguntaCounter[key]) {
        preguntaCounter[key] = 0;
    }
    preguntaCounter[key]++;

    const preguntaNumero = preguntaCounter[key];

    // Verificar que no exceda 10 preguntas
    if (preguntaNumero > 10) {
        alert('Máximo 10 preguntas por cuestionario');
        preguntaCounter[key]--;
        return;
    }

    const preguntasContainer = document.getElementById(`preguntas_${nivelIndex}_${subnivelIndex}`);
    if (!preguntasContainer) return;

    const preguntaHtml = `
        <div class="pregunta-item bg-white dark:bg-slate-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600" data-pregunta-numero="${preguntaNumero}">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-2">
                    <span class="w-6 h-6 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-full flex items-center justify-center text-xs font-bold">${preguntaNumero}</span>
                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Pregunta ${preguntaNumero}</span>
                </div>
                <button type="button" onclick="eliminarPregunta(${nivelIndex}, ${subnivelIndex}, ${preguntaNumero}, this)"
                        class="text-red-500 hover:text-red-700 transition-colors">
                    <span class="material-icons text-sm">delete</span>
                </button>
            </div>

            <div class="space-y-3">
                <!-- Texto de la pregunta -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">help</span>
                        Texto de la Pregunta *
                    </label>
                    <textarea name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][pregunta_texto]"
                              rows="2"
                              class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white resize-none"
                              placeholder="¿Cuál es la pregunta?"
                              required></textarea>
                </div>

                <!-- Opciones de respuesta -->
                <div class="grid grid-cols-1 gap-2">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                            Opción 1 *
                        </label>
                        <input type="text"
                               name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][opcion_1]"
                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                               placeholder="Primera opción de respuesta"
                               required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                            Opción 2 *
                        </label>
                        <input type="text"
                               name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][opcion_2]"
                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                               placeholder="Segunda opción de respuesta"
                               required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                            Opción 3 *
                        </label>
                        <input type="text"
                               name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][opcion_3]"
                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                               placeholder="Tercera opción de respuesta"
                               required>
                    </div>
                </div>

                <!-- Respuesta correcta -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1">
                        <span class="material-icons text-xs mr-1">check_circle</span>
                        Respuesta Correcta *
                    </label>
                    <select name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][respuesta_correcta]"
                            class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-slate-600 dark:text-white"
                            required>
                        <option value="">Selecciona la respuesta correcta</option>
                        <option value="1">Opción 1</option>
                        <option value="2">Opción 2</option>
                        <option value="3">Opción 3</option>
                    </select>
                </div>

                <!-- Campo oculto para número de pregunta -->
                <input type="hidden" name="niveles[${nivelIndex}][subniveles][${subnivelIndex}][preguntas][${preguntaNumero}][numero_pregunta]" value="${preguntaNumero}">
            </div>
        </div>
    `;

    preguntasContainer.insertAdjacentHTML('beforeend', preguntaHtml);
}

// Función para eliminar una pregunta
function eliminarPregunta(nivelIndex, subnivelIndex, preguntaNumero, button) {
    if (confirm('¿Estás seguro de que quieres eliminar esta pregunta?')) {
        const preguntaItem = button.closest('.pregunta-item');
        if (preguntaItem) {
            preguntaItem.style.transition = 'all 0.3s ease-out';
            preguntaItem.style.transform = 'scale(0.8)';
            preguntaItem.style.opacity = '0';

            setTimeout(() => {
                preguntaItem.remove();
                // Renumerar preguntas restantes
                renumerarPreguntas(nivelIndex, subnivelIndex);
            }, 300);
        }
    }
}

// Función para renumerar preguntas después de eliminar
function renumerarPreguntas(nivelIndex, subnivelIndex) {
    const preguntasContainer = document.getElementById(`preguntas_${nivelIndex}_${subnivelIndex}`);
    if (!preguntasContainer) return;

    const preguntas = preguntasContainer.querySelectorAll('.pregunta-item');
    preguntas.forEach((pregunta, index) => {
        const nuevoNumero = index + 1;

        // Actualizar número visual
        const numeroSpan = pregunta.querySelector('.w-6.h-6');
        if (numeroSpan) {
            numeroSpan.textContent = nuevoNumero;
        }

        const tituloSpan = pregunta.querySelector('.text-sm.font-semibold');
        if (tituloSpan) {
            tituloSpan.textContent = `Pregunta ${nuevoNumero}`;
        }

        // Actualizar nombres de campos
        const inputs = pregunta.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                // Extraer el número actual de pregunta
                const match = name.match(/\[preguntas\]\[(\d+)\]/);
                if (match) {
                    const numeroActual = match[1];
                    const nuevoName = name.replace(`[preguntas][${numeroActual}]`, `[preguntas][${nuevoNumero}]`);
                    input.setAttribute('name', nuevoName);
                }
            }
        });

        // Actualizar data attribute
        pregunta.setAttribute('data-pregunta-numero', nuevoNumero);
    });

    // Actualizar contador
    const key = `${nivelIndex}_${subnivelIndex}`;
    preguntaCounter[key] = preguntas.length;
}

// Función para alternar la numeración personalizada
function toggleCustomNumbering(checkbox) {
    const subnivelContainer = checkbox.closest('.subnivel-item');
    const customNumberField = subnivelContainer.querySelector('.custom-number-field');
    const hiddenNumberField = subnivelContainer.querySelector('input[name*="[numero]"]');
    const customNumberInput = subnivelContainer.querySelector('input[name*="[numero_personalizado]"]');

    if (checkbox.checked) {
        // Mostrar campo de número personalizado
        customNumberField.style.display = 'block';

        // Usar el número personalizado
        if (customNumberInput) {
            const customNumber = customNumberInput.value || '1';
            hiddenNumberField.value = customNumber;
            updateSubnivelVisualNumber(customNumberInput);
        }
    } else {
        // Ocultar campo de número personalizado
        customNumberField.style.display = 'none';

        // Restaurar numeración automática
        const autoNumber = getAutoNumber(subnivelContainer);
        hiddenNumberField.value = autoNumber;

        // Actualizar visualmente
        const numberSpan = subnivelContainer.querySelector('.w-6.h-6');
        const titleSpan = subnivelContainer.querySelector('.text-sm.font-semibold');

        if (numberSpan) {
            numberSpan.textContent = autoNumber;
        }
        if (titleSpan) {
            titleSpan.textContent = `Subnivel ${autoNumber}`;
        }
    }
}

// Función para obtener el número automático del subnivel
function getAutoNumber(subnivelContainer) {
    const nivelContainer = subnivelContainer.closest('[data-nivel-index]');
    const nivelIndex = nivelContainer.getAttribute('data-nivel-index');
    const subnivelesContainer = document.getElementById(`subniveles_${nivelIndex}`);

    if (subnivelesContainer) {
        const subniveles = subnivelesContainer.querySelectorAll('.subnivel-item');
        return Array.from(subniveles).indexOf(subnivelContainer) + 1;
    }

    return 1;
}

// Función para actualizar el número visual del subnivel
function updateSubnivelVisualNumber(numberInput) {
    const subnivelContainer = numberInput.closest('.subnivel-item');
    if (!subnivelContainer) return;

    const newNumber = numberInput.value || '1';
    const hiddenNumberField = subnivelContainer.querySelector('input[name*="[numero]"]');

    // Actualizar el campo oculto
    if (hiddenNumberField) {
        hiddenNumberField.value = newNumber;
    }

    // Actualizar el número en el círculo visual
    const numberSpan = subnivelContainer.querySelector('.w-6.h-6');
    if (numberSpan) {
        numberSpan.textContent = newNumber;
    }

    // Actualizar el texto del título
    const titleSpan = subnivelContainer.querySelector('.text-sm.font-semibold');
    if (titleSpan) {
        titleSpan.textContent = `Subnivel ${newNumber}`;
    }
}

