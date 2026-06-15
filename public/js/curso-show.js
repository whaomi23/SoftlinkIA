function toggleNivel(nivelNumero) {
    const subnivelesDiv = document.getElementById(`subniveles-${nivelNumero}`);
    const icon = document.getElementById(`icon-${nivelNumero}`);

    if (subnivelesDiv.classList.contains('hidden')) {
        // Mostrar subniveles
        subnivelesDiv.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
        icon.textContent = 'expand_less';
    } else {
        // Ocultar subniveles
        subnivelesDiv.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
        icon.textContent = 'expand_more';
    }
}

// Función para mostrar video en el Enhanced Video Player
async function mostrarVideo(subnivelId, content, tipo = 'iframe') {
    // Verificar desbloqueo primero
    try {
        const desbloqueoResponse = await fetch(`/api/subnivel/${subnivelId}/verificar-desbloqueo`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const desbloqueoData = await desbloqueoResponse.json();

        if (desbloqueoData.success && !desbloqueoData.data.desbloqueado) {
            mostrarNotificacion(desbloqueoData.data.razon_bloqueo || 'Este contenido está bloqueado. Debes completar el contenido anterior.', 'error');
            return;
        }
    } catch (error) {
        console.error('Error verificando desbloqueo:', error);
        // Continuar si hay error, pero registrar
    }

    // Obtener elementos del Video Player
    const titulo = document.getElementById('videoPlayerTitulo');
    const descripcion = document.getElementById('videoPlayerDescripcion');
    const badge = document.getElementById('videoPlayerBadge');
    const contenido = document.getElementById('videoPlayerContent');

    // Obtener información del subnivel desde el DOM (nuevo layout)
    let subnivelTitulo = '';
    let subnivelDescripcion = '';
    const subnivelWrapper = document.querySelector(`[data-subnivel-id="${subnivelId}"]`);
    if (subnivelWrapper) {
        const t = subnivelWrapper.querySelector('h5');
        const d = subnivelWrapper.querySelector('p');
        subnivelTitulo = t ? t.textContent : '';
        subnivelDescripcion = d ? d.textContent : '';
    } else {
        // Fallback al selector previo si no se encuentra el nuevo contenedor
        const legacyBtn = document.querySelector(`[onclick*="mostrarVideo(${subnivelId}"]`);
        const legacyContainer = legacyBtn ? legacyBtn.closest('.flex.items-center.space-x-3') : null;
        if (legacyContainer) {
            const t = legacyContainer.querySelector('h5');
            const d = legacyContainer.querySelector('p');
            subnivelTitulo = t ? t.textContent : '';
            subnivelDescripcion = d ? d.textContent : '';
        }
    }

    // Actualizar header del Video Player
    titulo.textContent = subnivelTitulo;
    descripcion.textContent = subnivelDescripcion;

    let embedContent = '';
    let badgeText = '';
    let badgeIcon = '';

    switch(tipo) {
        case 'iframe':
            // Si es iframe, usar el contenido directamente
            embedContent = content;
            badgeText = 'Iframe Activo';
            badgeIcon = 'code';
            break;

        case 'url_video':
            // Convertir URL de video a formato embebido
            let embedUrl = content;
            if (content.includes('youtube.com/watch')) {
                const videoId = content.split('v=')[1]?.split('&')[0];
                if (videoId) {
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
            } else if (content.includes('youtu.be/')) {
                const videoId = content.split('youtu.be/')[1]?.split('?')[0];
                if (videoId) {
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                }
            } else if (content.includes('vimeo.com/')) {
                const videoId = content.match(/vimeo.com\/(\d+)/)?.[1];
                if (videoId) {
                    embedUrl = `https://player.vimeo.com/video/${videoId}`;
                }
            }

            embedContent = `
                <iframe
                    src="${embedUrl}"
                    width="100%"
                    height="100%"
                    frameborder="0"
                    allowfullscreen
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    class="w-full h-full rounded-3xl">
                </iframe>
            `;
            badgeText = 'Video Activo';
            badgeIcon = 'play_circle';
            break;

        case 'video_archivo':
            // Para archivos de video subidos - usar Video.js
            const videoId = `video-player-${Date.now()}`;
            const videoExt = content.split('.').pop().toLowerCase();
            let videoType = 'video/mp4'; // default
            if (videoExt === 'webm') videoType = 'video/webm';
            else if (videoExt === 'ogg' || videoExt === 'ogv') videoType = 'video/ogg';
            else if (videoExt === 'mov') videoType = 'video/quicktime';
            else if (videoExt === 'avi') videoType = 'video/x-msvideo';

            embedContent = `
                <div
                    id="${videoId}-container"
                    class="w-full h-full relative"
                    oncontextmenu="return false;"
                    onselectstart="return false;"
                    ondragstart="return false;"
                    style="user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;">
                    <!-- Indicador de carga -->
                    <div id="${videoId}-loading" class="absolute inset-0 bg-gray-900 dark:bg-slate-800 flex items-center justify-center z-10">
                        <div class="text-center">
                            <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-white mb-4"></div>
                            <p class="text-white text-sm">Cargando video...</p>
                        </div>
                    </div>
                    <video
                        id="${videoId}"
                        class="video-js vjs-big-play-centered vjs-default-skin w-full h-full"
                        controls
                        preload="auto"
                        playsinline
                        webkit-playsinline
                        controlsList="nodownload"
                        disablePictureInPicture
                        data-setup="{}"
                        oncontextmenu="return false;"
                        style="pointer-events: auto;">
                        <source src="/video/${content}" type="${videoType}">
                        <p class="vjs-no-js">
                            Para ver este video, por favor habilita JavaScript y considera actualizar a un navegador que
                            <a href="https://videojs.com/html5-video-support/" target="_blank">soporte video HTML5</a>.
                        </p>
                    </video>
                </div>
            `;
            badgeText = 'Video File Activo';
            badgeIcon = 'video_file';

            // Guardar videoId para inicialización posterior
            window.pendingVideoId = videoId;
            break;

        default:
            embedContent = content;
            badgeText = 'Contenido Activo';
            badgeIcon = 'play_circle';
    }

    // Actualizar badge
    badge.innerHTML = `<span class="material-icons text-xs mr-1">${badgeIcon}</span>${badgeText}`;

    // Actualizar contenido del Video Player
    contenido.innerHTML = `
        <div class="w-full h-full bg-gray-900 dark:bg-slate-800 rounded-3xl overflow-hidden">
            ${embedContent}
        </div>
    `;

    // Inicializar Video.js si es un video_archivo
    if (tipo === 'video_archivo' && window.pendingVideoId) {
        // Destruir reproductor anterior si existe
        if (window.currentVideoPlayer) {
            try {
                window.currentVideoPlayer.dispose();
            } catch (e) {
                console.warn('Error al destruir reproductor anterior:', e);
            }
            window.currentVideoPlayer = null;
        }

        // Inicializar nuevo reproductor
        setTimeout(() => {
            const videoElement = document.getElementById(window.pendingVideoId);
            const loadingIndicator = document.getElementById(`${window.pendingVideoId}-loading`);

            if (videoElement && typeof videojs !== 'undefined') {
                window.currentVideoPlayer = videojs(window.pendingVideoId, {
                    fluid: true,
                    responsive: true,
                    controls: true,
                    autoplay: false,
                    preload: 'auto',
                    playbackRates: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2],
                    techOrder: ['html5'],
                    html5: {
                        vhs: {
                            overrideNative: true
                        },
                        nativeVideoTracks: false,
                        nativeAudioTracks: false,
                        nativeTextTracks: false
                    },
                    poster: '', // Puedes agregar una imagen de portada aquí
                    language: 'es',
                    aspectRatio: '16:9',
                    fill: false,
                    muted: false,
                    volume: 0.8
                });

                // Protección contra descarga
                const videoContainer = document.getElementById(`${window.pendingVideoId}-container`);
                if (videoContainer) {
                    videoContainer.addEventListener('contextmenu', function(e) { e.preventDefault(); return false; });
                    videoContainer.addEventListener('dragstart', function(e) { e.preventDefault(); return false; });
                    videoContainer.addEventListener('selectstart', function(e) { e.preventDefault(); return false; });
                }
                if (videoElement) {
                    videoElement.addEventListener('contextmenu', function(e) { e.preventDefault(); return false; });
                    videoElement.addEventListener('dragstart', function(e) { e.preventDefault(); return false; });
                    videoElement.addEventListener('keydown', function(e) {
                        if (e.ctrlKey && (e.key === 's' || e.key === 'S')) { e.preventDefault(); return false; }
                    });
                }

                // Eventos del reproductor
                window.currentVideoPlayer.ready(function() {
                    console.log('Video.js inicializado correctamente');

                    // Ocultar indicador de carga
                    if (loadingIndicator) {
                        loadingIndicator.style.display = 'none';
                    }

                    // Personalizar controles
                    const player = this;

                    // Agregar clase personalizada para mejor estilo
                    player.addClass('vjs-custom-player');

                    // Inicializar sistema de miniaturas (filmstrip)
                    initFilmstripThumbnails(player);
                });

                // Manejo de errores
                window.currentVideoPlayer.on('error', function() {
                    const error = this.error();
                    if (error) {
                        console.error('Error en el video:', error);
                        if (loadingIndicator) {
                            loadingIndicator.innerHTML = `
                                <div class="text-center text-white">
                                    <span class="material-icons text-4xl mb-2">error_outline</span>
                                    <p class="text-sm">Error al cargar el video</p>
                                    <p class="text-xs opacity-75 mt-1">Código: ${error.code}</p>
                                </div>
                            `;
                        }
                        mostrarNotificacion('Error al cargar el video. Por favor, intenta de nuevo.', 'error');
                    }
                });

                // Mostrar indicador de carga mientras se carga el video
                window.currentVideoPlayer.on('loadstart', function() {
                    if (loadingIndicator) {
                        loadingIndicator.style.display = 'flex';
                    }
                });

                // Ocultar indicador cuando el video está listo
                window.currentVideoPlayer.on('canplay', function() {
                    if (loadingIndicator) {
                        loadingIndicator.style.display = 'none';
                    }
                });

                // Ocultar indicador cuando hay suficiente buffer
                window.currentVideoPlayer.on('canplaythrough', function() {
                    if (loadingIndicator) {
                        loadingIndicator.style.display = 'none';
                    }
                });

                // Mostrar indicador cuando está cargando
                window.currentVideoPlayer.on('waiting', function() {
                    if (loadingIndicator) {
                        loadingIndicator.style.display = 'flex';
                        loadingIndicator.querySelector('p').textContent = 'Buffering...';
                    }
                });

                // Atajos de teclado mejorados
                window.currentVideoPlayer.on('keydown', function(event) {
                    const player = this;

                    // Espacio: Play/Pause
                    if (event.code === 'Space' && event.target === player.el()) {
                        event.preventDefault();
                        if (player.paused()) {
                            player.play();
                        } else {
                            player.pause();
                        }
                    }

                    // Flecha izquierda: Retroceder 10 segundos
                    if (event.code === 'ArrowLeft') {
                        event.preventDefault();
                        player.currentTime(Math.max(0, player.currentTime() - 10));
                    }

                    // Flecha derecha: Adelantar 10 segundos
                    if (event.code === 'ArrowRight') {
                        event.preventDefault();
                        player.currentTime(Math.min(player.duration(), player.currentTime() + 10));
                    }

                    // Flecha arriba: Subir volumen
                    if (event.code === 'ArrowUp') {
                        event.preventDefault();
                        player.volume(Math.min(1, player.volume() + 0.1));
                    }

                    // Flecha abajo: Bajar volumen
                    if (event.code === 'ArrowDown') {
                        event.preventDefault();
                        player.volume(Math.max(0, player.volume() - 0.1));
                    }

                    // M: Silenciar/Desilenciar
                    if (event.code === 'KeyM') {
                        event.preventDefault();
                        player.muted(!player.muted());
                    }

                    // F: Pantalla completa
                    if (event.code === 'KeyF') {
                        event.preventDefault();
                        if (player.isFullscreen()) {
                            player.exitFullscreen();
                        } else {
                            player.requestFullscreen();
                        }
                    }
                });
            } else {
                // Si Video.js no está disponible, ocultar indicador de carga
                if (loadingIndicator) {
                    loadingIndicator.style.display = 'none';
                }
            }
            window.pendingVideoId = null;
        }, 100);
    }

    // Scroll suave al Video Player
    document.querySelector('.lg\\:col-span-2').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });

    // Mostrar notificación
    mostrarNotificacion(`Reproduciendo: ${subnivelTitulo}`, 'success');
}

// Función para inicializar miniaturas tipo filmstrip en la barra de progreso
function initFilmstripThumbnails(player) {
    if (!player || !player.el()) return;

    const progressControl = player.el().querySelector('.vjs-progress-control');
    if (!progressControl) return;

    const progressBar = progressControl.querySelector('.vjs-progress-holder');
    if (!progressBar) return;

    // Crear contenedor para la miniatura
    const thumbnailContainer = document.createElement('div');
    thumbnailContainer.className = 'vjs-filmstrip-thumbnail';
    thumbnailContainer.style.display = 'none';
    progressControl.appendChild(thumbnailContainer);

    // Crear canvas para generar miniaturas
    const canvas = document.createElement('canvas');
    canvas.width = 160;
    canvas.height = 90;
    const ctx = canvas.getContext('2d');

    // Cache de miniaturas generadas
    const thumbnailCache = {};
    const thumbnailInterval = 10; // Generar miniatura cada 10 segundos

    // Función para generar miniatura desde el video
    function generateThumbnail(time) {
        if (thumbnailCache[time]) {
            return thumbnailCache[time];
        }

        // Marcar como en proceso para evitar múltiples generaciones
        if (thumbnailCache[time + '_loading']) {
            return null;
        }
        thumbnailCache[time + '_loading'] = true;

        try {
            const video = player.el().querySelector('video');
            if (!video || video.readyState < 2) {
                delete thumbnailCache[time + '_loading'];
                return null;
            }

            // Guardar estado actual
            const currentTime = video.currentTime;
            const wasPaused = video.paused;
            const wasPlaying = !wasPaused;

            // Pausar si está reproduciendo
            if (wasPlaying) {
                video.pause();
            }

            // Ir al tiempo deseado
            video.currentTime = time;

            // Esperar a que el frame se cargue
            const promise = new Promise((resolve) => {
                let resolved = false;
                const seekedHandler = () => {
                    if (resolved) return;
                    resolved = true;
                    video.removeEventListener('seeked', seekedHandler);
                    video.removeEventListener('error', errorHandler);
                    resolve();
                };
                const errorHandler = () => {
                    if (resolved) return;
                    resolved = true;
                    video.removeEventListener('seeked', seekedHandler);
                    video.removeEventListener('error', errorHandler);
                    resolve();
                };

                video.addEventListener('seeked', seekedHandler, { once: true });
                video.addEventListener('error', errorHandler, { once: true });

                // Timeout de seguridad
                setTimeout(() => {
                    if (!resolved) {
                        resolved = true;
                        video.removeEventListener('seeked', seekedHandler);
                        video.removeEventListener('error', errorHandler);
                        resolve();
                    }
                }, 1000);
            });

            promise.then(() => {
                try {
                    // Esperar un frame más para asegurar que el frame esté renderizado
                    requestAnimationFrame(() => {
                        requestAnimationFrame(() => {
                            try {
                                // Dibujar frame en canvas
                                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                                // Convertir a imagen
                                const thumbnail = canvas.toDataURL('image/jpeg', 0.8);
                                thumbnailCache[time] = thumbnail;
                                delete thumbnailCache[time + '_loading'];

                                // Actualizar miniatura si está visible
                                if (thumbnailContainer.style.display !== 'none') {
                                    const currentTimeStr = thumbnailContainer.querySelector('.thumbnail-time')?.textContent;
                                    if (currentTimeStr) {
                                        const displayedTime = parseTime(currentTimeStr);
                                        if (Math.abs(displayedTime - time) < 5) {
                                            thumbnailContainer.querySelector('.thumbnail-image').style.backgroundImage = `url('${thumbnail}')`;
                                            thumbnailContainer.querySelector('.thumbnail-image').classList.remove('thumbnail-loading');
                                        }
                                    }
                                }
                            } catch (e) {
                                console.warn('Error dibujando miniatura:', e);
                                delete thumbnailCache[time + '_loading'];
                            }

                            // Restaurar tiempo original solo si no está reproduciendo
                            if (wasPlaying) {
                                video.currentTime = currentTime;
                                video.play().catch(() => {});
                            } else {
                                video.currentTime = currentTime;
                            }
                        });
                    });
                } catch (e) {
                    console.warn('Error en requestAnimationFrame:', e);
                    delete thumbnailCache[time + '_loading'];
                    if (wasPlaying) {
                        video.currentTime = currentTime;
                        video.play().catch(() => {});
                    } else {
                        video.currentTime = currentTime;
                    }
                }
            });

            return null; // Retornar null mientras se genera
        } catch (e) {
            console.warn('Error generando miniatura:', e);
            delete thumbnailCache[time + '_loading'];
            return null;
        }
    }

    // Función auxiliar para parsear tiempo
    function parseTime(timeStr) {
        const parts = timeStr.split(':').map(Number);
        if (parts.length === 3) {
            return parts[0] * 3600 + parts[1] * 60 + parts[2];
        } else if (parts.length === 2) {
            return parts[0] * 60 + parts[1];
        }
        return 0;
    }

    // Función para obtener miniatura (usando cache o generando)
    function getThumbnail(time) {
        // Redondear al intervalo más cercano
        const roundedTime = Math.floor(time / thumbnailInterval) * thumbnailInterval;

        if (thumbnailCache[roundedTime]) {
            return thumbnailCache[roundedTime];
        }

        // Generar nueva miniatura
        generateThumbnail(roundedTime);
        return null;
    }

    // Mostrar miniatura al pasar el mouse sobre la barra de progreso
    progressBar.addEventListener('mousemove', function(e) {
        if (!player.duration()) return;

        const rect = progressBar.getBoundingClientRect();
        const percent = (e.clientX - rect.left) / rect.width;
        const time = percent * player.duration();

        // Posicionar miniatura
        const thumbnailLeft = e.clientX - rect.left - 80; // Centrar (160px / 2)
        thumbnailContainer.style.left = Math.max(0, Math.min(thumbnailLeft, rect.width - 160)) + 'px';
        thumbnailContainer.style.bottom = '40px';

        // Obtener miniatura
        const thumbnail = getThumbnail(time);
        if (thumbnail) {
            thumbnailContainer.innerHTML = `
                <div class="thumbnail-image" style="background-image: url('${thumbnail}');"></div>
                <div class="thumbnail-time">${formatTime(time)}</div>
            `;
            thumbnailContainer.style.display = 'block';
        } else {
            // Mostrar placeholder mientras se genera
            thumbnailContainer.innerHTML = `
                <div class="thumbnail-image thumbnail-loading">
                    <div class="spinner"></div>
                </div>
                <div class="thumbnail-time">${formatTime(time)}</div>
            `;
            thumbnailContainer.style.display = 'block';
        }
    });

    // Ocultar miniatura al salir del mouse
    progressBar.addEventListener('mouseleave', function() {
        thumbnailContainer.style.display = 'none';
    });

    // Ocultar miniatura al hacer click
    progressBar.addEventListener('click', function() {
        setTimeout(() => {
            thumbnailContainer.style.display = 'none';
        }, 200);
    });

    // Función para formatear tiempo
    function formatTime(seconds) {
        if (!isFinite(seconds)) return '0:00';
        const h = Math.floor(seconds / 3600);
        const m = Math.floor((seconds % 3600) / 60);
        const s = Math.floor(seconds % 60);

        if (h > 0) {
            return `${h}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
        }
        return `${m}:${s.toString().padStart(2, '0')}`;
    }

    // Pre-generar algunas miniaturas cuando el video esté listo
    player.on('loadedmetadata', function() {
        const duration = player.duration();
        if (!duration) return;

        // Generar miniaturas en puntos clave (cada 30 segundos)
        const keyPoints = [];
        for (let i = 0; i < duration; i += 30) {
            keyPoints.push(i);
        }

        // Generar miniaturas en segundo plano
        setTimeout(() => {
            keyPoints.forEach(time => {
                generateThumbnail(time);
            });
        }, 1000);
    });
}

// Función para resetear el Video Player
function resetearVideoPlayer() {
    // Destruir reproductor Video.js si existe
    if (window.currentVideoPlayer) {
        try {
            window.currentVideoPlayer.dispose();
        } catch (e) {
            console.warn('Error al destruir reproductor:', e);
        }
        window.currentVideoPlayer = null;
    }

    const titulo = document.getElementById('videoPlayerTitulo');
    const descripcion = document.getElementById('videoPlayerDescripcion');
    const badge = document.getElementById('videoPlayerBadge');
    const contenido = document.getElementById('videoPlayerContent');

    // Restaurar estado inicial
    titulo.textContent = 'Contenido del Curso';
    descripcion.textContent = 'Selecciona un subnivel para ver su contenido';
    badge.innerHTML = '<span class="material-icons text-xs mr-1">play_circle</span>Video';

    // Restaurar contenido inicial
    contenido.innerHTML = `
        <div class="flex flex-col items-center justify-center h-full text-center text-white">
            <div class="mb-8">
                <span class="material-icons text-white text-6xl">play_circle</span>
            </div>
            <div class="space-y-2">
                <p class="text-xl font-bold">Selecciona un subnivel para comenzar</p>
                <p class="text-sm opacity-70">Haz click en un botón "Video" en el panel lateral</p>
            </div>
        </div>
    `;
}

// Función para mostrar recurso
function mostrarRecurso(subnivelId, nombreRecurso, pathRecurso) {
    const modal = document.getElementById('contenidoModal');
    const titulo = document.getElementById('modalTitulo');
    const contenido = document.getElementById('modalContenido');

    titulo.textContent = 'Recurso del Subnivel';
    contenido.innerHTML = `
        <div class="space-y-4">
            <div class="bg-gray-50 dark:bg-slate-700 rounded-xl p-4">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Recurso PDF</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Archivo: <span class="font-medium">${nombreRecurso}</span></p>
            </div>
            <div class="bg-white dark:bg-slate-800 border-2 border-dashed border-gray-300 dark:border-slate-600 rounded-xl p-8 text-center">
                <div class="flex flex-col items-center space-y-4">
                    <div class="w-16 h-16 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center">
                        <span class="material-icons text-red-600 dark:text-red-400 text-3xl">description</span>
                    </div>
                    <div>
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white">${nombreRecurso}</h5>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Archivo PDF disponible para descarga</p>
                    </div>
                    <div class="flex space-x-3">
                        <button onclick="descargarRecurso('${pathRecurso}', '${nombreRecurso}')" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 flex items-center space-x-2">
                            <span class="material-icons text-sm">download</span>
                            <span>Descargar PDF</span>
                        </button>
                        <button onclick="verRecurso('${pathRecurso}')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center space-x-2">
                            <span class="material-icons text-sm">visibility</span>
                            <span>Ver PDF</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <button onclick="cerrarModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Cerrar
                </button>
            </div>
        </div>
    `;

    modal.classList.remove('hidden');
}

// Mapear extensión a icono y color
function iconoPorExtension(extUpper) {
    const ext = (extUpper || '').toLowerCase();
    const map = {
        pdf: { icon: 'picture_as_pdf', color: 'text-red-600 dark:text-red-400' },
        doc: { icon: 'description', color: 'text-blue-600 dark:text-blue-400' },
        docx:{ icon: 'description', color: 'text-blue-600 dark:text-blue-400' },
        ppt: { icon: 'slideshow', color: 'text-orange-600 dark:text-orange-400' },
        pptx:{ icon: 'slideshow', color: 'text-orange-600 dark:text-orange-400' },
        xls: { icon: 'table_chart', color: 'text-green-600 dark:text-green-400' },
        xlsx:{ icon: 'table_chart', color: 'text-green-600 dark:text-green-400' },
        zip: { icon: 'folder_zip', color: 'text-purple-600 dark:text-purple-300' },
        rar: { icon: 'folder_zip', color: 'text-purple-600 dark:text-purple-300' },
        txt: { icon: 'text_snippet', color: 'text-gray-600 dark:text-gray-300' },
        jpg: { icon: 'image', color: 'text-pink-600 dark:text-pink-400' },
        jpeg:{ icon: 'image', color: 'text-pink-600 dark:text-pink-400' },
        png: { icon: 'image', color: 'text-pink-600 dark:text-pink-400' },
        gif: { icon: 'image', color: 'text-pink-600 dark:text-pink-400' },
        mp4: { icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        avi: { icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        mov: { icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        wmv: { icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        webm:{ icon: 'video_file', color: 'text-indigo-600 dark:text-indigo-400' },
        mp3: { icon: 'audio_file', color: 'text-teal-600 dark:text-teal-400' },
        wav: { icon: 'audio_file', color: 'text-teal-600 dark:text-teal-400' },
        ogg: { icon: 'audio_file', color: 'text-teal-600 dark:text-teal-400' },
    };
    return map[ext] || { icon: 'insert_drive_file', color: 'text-gray-600 dark:text-gray-300' };
}

// Mostrar varios recursos en un modal con listado descargable
function mostrarRecursosMultiples(subnivelId, nombres, paths) {
    const modal = document.getElementById('contenidoModal');
    const titulo = document.getElementById('modalTitulo');
    const contenido = document.getElementById('modalContenido');

    titulo.textContent = 'Recursos del Subnivel';

    let items = '';
    try {
        for (let i = 0; i < nombres.length; i++) {
            const nombre = nombres[i];
            const path = paths[i];
            if (!nombre || !path) continue;
            const ext = (nombre.split('.').pop() || '').toUpperCase();
            const meta = iconoPorExtension(ext);
            items += `
                <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-slate-700 mb-2">
                    <div class="flex items-center space-x-3">
                        <span class="material-icons text-sm ${meta.color}">${meta.icon}</span>
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">${nombre}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-300">${ext}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="verRecurso('${path}')" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-xs">Ver</button>
                        <button onclick="descargarRecurso('${path}', '${nombre}')" class="px-3 py-1.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-xs">Descargar</button>
                    </div>
                </div>`;
        }
    } catch (e) { /* noop */ }

    contenido.innerHTML = `
        <div>
            <div class="mb-4 p-3 bg-emerald-50 dark:bg-emerald-900/30 rounded-xl text-emerald-800 dark:text-emerald-200 text-sm font-semibold">
                Se encontraron ${nombres?.length || 0} recursos adjuntos.
            </div>
            ${items || '<p class="text-sm text-gray-600 dark:text-gray-300">No hay recursos disponibles.</p>'}
            <div class="flex justify-end mt-4">
                <button onclick="cerrarModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">Cerrar</button>
            </div>
        </div>`;

    modal.classList.remove('hidden');
}

// Función para cerrar modal
function cerrarModal() {
    const modal = document.getElementById('contenidoModal');
    modal.classList.add('hidden');
}

// Función para descargar recurso
function descargarRecurso(pathRecurso, nombreRecurso) {
    // Crear enlace de descarga usando el path real del archivo
    const link = document.createElement('a');
    link.href = `/storage/${pathRecurso}`;
    link.download = nombreRecurso;
    link.click();

    // Mostrar notificación
    mostrarNotificacion(`Descargando ${nombreRecurso}...`, 'success');
}

// Función para ver recurso
function verRecurso(pathRecurso) {
    // Abrir PDF en nueva ventana usando el path real del archivo
    window.open(`/storage/${pathRecurso}`, '_blank');
}

// Función para mostrar notificaciones
function mostrarNotificacion(mensaje, tipo = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
        tipo === 'success' ? 'bg-green-500 text-white' :
        tipo === 'error' ? 'bg-red-500 text-white' :
        'bg-blue-500 text-white'
    }`;
    notification.innerHTML = `
        <div class="flex items-center">
            <span class="material-icons mr-2">${tipo === 'success' ? 'check_circle' : tipo === 'error' ? 'error' : 'info'}</span>
            ${mensaje}
        </div>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Cerrar modal al hacer click fuera
document.addEventListener('click', function(event) {
    const modal = document.getElementById('contenidoModal');
    if (event.target === modal) {
        cerrarModal();
    }
});

// ==============================
// Comentarios (Estudiante)
// ==============================
async function cargarComentarios() {
    const container = document.getElementById('comentariosContainer');
    if (!container) return;
    try {
        const res = await fetch(`/api/comentarios-curso/{{ $curso->id }}`);
        const data = await res.json();
        if (!data.success) throw new Error(data.message || 'Error');

        const comentarios = Array.isArray(data.data) ? data.data : [];
        // Construir set de niveles donde el usuario ya tiene hilo propio
        window.__nivelesConHilo = new Set(
            comentarios
                .filter(c => Number(window.currentUserId) === Number(c.usuario_id) && c.nivel_id)
                .map(c => String(c.nivel_id))
        );
        aplicarReglasPorNivelSeleccionado();
        document.getElementById('totalComentariosCount').textContent = `${comentarios.length} comentario${comentarios.length === 1 ? '' : 's'}`;

        if (comentarios.length === 0) {
            container.innerHTML = `
                <div class="text-center py-12 text-gray-400">
                    <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-icons text-gray-500 text-2xl">forum</span>
                    </div>
                    <p class="text-lg font-medium">No hay comentarios aún</p>
                    <p class="text-sm">¡Sé el primero en hacer una pregunta!</p>
                </div>
            `;
            return;
        }

        // Filtrado por tabs
        window.__allComentarios = comentarios;
        inicializarTabsComentarios();
        const nivelSeleccionado = (document.querySelector('#comentariosTabs button.active')?.getAttribute('data-nivel-id')) || '';
        const filtrados = nivelSeleccionado
            ? comentarios.filter(c => String(c.nivel_id || '') === String(nivelSeleccionado))
            : comentarios;
        container.innerHTML = filtrados.map(renderComentarioPrincipal).join('');
        actualizarContadoresTabs(comentarios);

        // Actualizar barra de herramientas de selección múltiple
        if (typeof inicializarSeleccionMultiple === 'function') {
            inicializarSeleccionMultiple();
        }
    } catch (e) {
        mostrarNotificacion('No se pudieron cargar los comentarios', 'error');
    }
}

function inicializarTabsComentarios() {
    const tabs = document.getElementById('comentariosTabs');
    if (!tabs || tabs.dataset.wired === '1') return;
    tabs.dataset.wired = '1';
    // Marcar "Todos" activo por defecto
    const first = tabs.querySelector('button[data-nivel-id=""]');
    if (first) first.classList.add('active', 'bg-gray-700', 'text-white');
    tabs.addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-nivel-id]');
        if (!btn) return;
        tabs.querySelectorAll('button[data-nivel-id]').forEach(b => b.classList.remove('active', 'bg-gray-700', 'text-white'));
        btn.classList.add('active', 'bg-gray-700', 'text-white');
        renderComentariosFiltradosPorTab();
        aplicarReglasPorNivelSeleccionado();
    });
}

function renderComentariosFiltradosPorTab() {
    const container = document.getElementById('comentariosContainer');
    const tabs = document.getElementById('comentariosTabs');
    if (!container || !tabs) return;
    const nivelId = tabs.querySelector('button.active')?.getAttribute('data-nivel-id') || '';
    const lista = Array.isArray(window.__allComentarios) ? window.__allComentarios : [];
    const filtrados = nivelId ? lista.filter(c => String(c.nivel_id || '') === String(nivelId)) : lista;
    container.innerHTML = filtrados.map(renderComentarioPrincipal).join('');

    // Actualizar barra de herramientas de selección múltiple
    if (typeof inicializarSeleccionMultiple === 'function') {
        inicializarSeleccionMultiple();
    }
}

function actualizarContadoresTabs(comentarios) {
    const tabs = document.getElementById('comentariosTabs');
    if (!tabs) return;
    const totalBtn = tabs.querySelector('button[data-nivel-id=""] [data-tab-count]');
    if (totalBtn) totalBtn.textContent = comentarios.length;
    const porNivel = {};
    comentarios.forEach(c => {
        const k = String(c.nivel_id || '');
        porNivel[k] = (porNivel[k] || 0) + 1;
    });
    tabs.querySelectorAll('button[data-nivel-id]').forEach(b => {
        const id = b.getAttribute('data-nivel-id') || '';
        const badge = b.querySelector('[data-tab-count]');
        if (badge) badge.textContent = porNivel[id || ''] || 0;
    });
}

function aplicarReglasPorNivelSeleccionado() {
    const select = document.getElementById('nivelSelect');
    const info = document.getElementById('nivelInfoMsg');
    const campo = document.getElementById('campoPreguntaBlock');
    if (!select || !info || !campo) return;
    const nivelId = select.value || '';
    const tieneHilo = nivelId && window.__nivelesConHilo && window.__nivelesConHilo.has(nivelId);
    if (tieneHilo) {
        // Ocultar campo y mostrar aviso
        campo.classList.add('hidden');
        info.textContent = 'Ya tienes un hilo de chat en este nivel. Puedes responder en tu hilo existente.';
        info.classList.remove('hidden');
    } else {
        info.classList.add('hidden');
        campo.classList.remove('hidden');
    }
}

function renderComentarioPrincipal(c) {
    const usuarioNombre = (c.usuario?.name || c.usuario?.nombre || 'Estudiante');
    const iniUser = (usuarioNombre || 'E').toString().trim().charAt(0).toUpperCase();
    const fecha = new Date(c.created_at).toLocaleString('es-MX', { hour12: false });
    const nivelChip = c.nivel?.titulo ? `
        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-300">
            <span class="material-icons text-xs mr-1">layers</span>
            ${escapeHtml(c.nivel.titulo)}
        </span>` : '';
    const esAutor = Number(window.currentUserId) === Number(c.usuario_id);
    const acciones = `
        <div class="flex items-center space-x-4">
            ${!esAutor ? `
                <button class="text-gray-400 hover:text-white transition-colors text-xs" data-action="student-reply" data-id="${c.id}" data-nivel-id="${c.nivel_id || ''}" data-usuario="${escapeHtml(usuarioNombre)}">
                    <span class="material-icons text-xs mr-1">reply</span>Responder
                </button>` : ''}
            ${esAutor ? `
                <div class="flex items-center space-x-2">
                    <label class="flex items-center space-x-1 cursor-pointer">
                        <input type="checkbox" class="comment-checkbox" data-comment-id="${c.id}">
                        <span class="text-xs text-gray-400">Seleccionar</span>
                    </label>
                    <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="edit" data-id="${c.id}">
                        <span class="material-icons text-xs mr-1">edit</span>Editar
                    </button>
                    <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-rose-500 to-red-600 text-white shadow hover:scale-105 transition" data-action="delete" data-id="${c.id}">
                        <span class="material-icons text-xs mr-1">delete</span>Eliminar
                    </button>
                </div>` : ''}
        </div>`;

    const hijos = Array.isArray(c.children) && c.children.length
        ? c.children.map(ch => renderComentarioHijo(ch, c, usuarioNombre)).join('')
        : '';

    return `
    <div class="comment-thread" data-comentario-id="${c.id}">
        <div class="flex items-start space-x-3 mb-4">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">${escapeHtml(iniUser)}</div>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center space-x-2 mb-2">
                    <h4 class="text-sm font-semibold text-white">${escapeHtml(usuarioNombre)}</h4>
                    <span class="text-xs text-gray-400">${escapeHtml(fecha)}</span>
                    ${nivelChip}
                </div>
                <p class="text-sm text-gray-300 mb-3 leading-relaxed" data-role="texto">${escapeHtml(c.comentario)}</p>
                ${acciones}
            </div>
        </div>
        ${hijos}
    </div>`;
}

function renderComentarioHijo(ch, padre, usuarioPadreNombre) {
    const chNombre = (ch.usuario?.name || ch.usuario?.nombre || 'Usuario');
    const chIni = (chNombre || 'U').toString().trim().charAt(0).toUpperCase();
    const esCreador = Number(ch.usuario_id) === Number({{ $curso->creador_id ?? 'null' }});
    const chFecha = new Date(ch.created_at).toLocaleString('es-MX', { hour12: false });
    const esAutor = Number(window.currentUserId) === Number(ch.usuario_id);
    return `
    <div class="ml-13 pl-4 mt-3 border-l-2 ${esCreador ? 'border-emerald-500' : 'border-gray-700'}" data-comentario-id="${ch.id}">
        <div class="flex items-start space-x-3">
            <div class="flex-shrink-0">
                ${esCreador
                    ? (window.creadorAvatarUrl
                        ? `<div class="relative shrink-0 w-8 h-8 rounded-full overflow-hidden shadow-lg"><img src="${window.creadorAvatarUrl}" alt="Creador" class="w-8 h-8 rounded-full object-cover"/><div class="absolute -inset-[1px] rounded-full ring-2 ring-white/40 dark:ring-slate-900/40"></div></div>`
                        : `<div class="relative shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-cyan-600 text-white flex items-center justify-center text-[10px] font-bold shadow-lg">${escapeHtml(window.creadorIniciales || 'SL')}<div class="absolute -inset-[1px] rounded-full ring-2 ring-white/40 dark:ring-slate-900/40"></div></div>`)
                    : `<div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs">${escapeHtml(chIni)}</div>`}
            </div>
            <div class="flex-1">
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center space-x-2">
                        <h6 class="text-xs font-semibold text-white flex items-center">${esCreador ? '<span class="material-icons text-[10px] mr-1 text-emerald-500">verified</span>Creador del Curso' : escapeHtml(chNombre)}</h6>
                        <span class="text-xs text-gray-400">${escapeHtml(chFecha)}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        ${esAutor ? `
                        <label class="flex items-center space-x-1 cursor-pointer">
                            <input type="checkbox" class="comment-checkbox" data-comment-id="${ch.id}">
                            <span class="text-[10px] text-gray-400">Sel</span>
                        </label>
                        <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="edit" data-id="${ch.id}"><span class="material-icons text-[10px] mr-1">edit</span>Editar</button>
                        <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-rose-500 to-red-600 text-white shadow hover:scale-105 transition" data-action="delete" data-id="${ch.id}"><span class="material-icons text-[10px] mr-1">delete</span>Eliminar</button>` : ''}
                        ${!esAutor ? `
                        <button class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:scale-105 transition" data-action="student-reply" data-id="${padre.id}" data-nivel-id="${padre.nivel_id || ''}" data-usuario="${esCreador ? 'Creador del Curso' : escapeHtml(chNombre)}">
                            <span class="material-icons text-[10px] mr-1">reply</span>Responder
                        </button>` : ''}
                    </div>
                </div>
                <p class="text-sm text-gray-300 mb-2" data-role="texto">${escapeHtml(ch.comentario)}</p>
            </div>
        </div>
    </div>`;
}

function inicializarSeleccionMultiple() {
    const toolbar = document.getElementById('comentariosToolbar');
    const selectAllCheckbox = document.getElementById('selectAllComments');
    const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
    const clearSelectionBtn = document.getElementById('clearSelectionBtn');
    const selectedCountSpan = document.getElementById('selectedCount');

    if (!toolbar || !selectAllCheckbox || !deleteSelectedBtn || !clearSelectionBtn || !selectedCountSpan) return;

    // Mostrar/ocultar toolbar según si hay comentarios del usuario
    function toggleToolbar() {
        const userComments = document.querySelectorAll('.comment-checkbox');
        toolbar.classList.toggle('hidden', userComments.length === 0);
    }

    // Actualizar contador de seleccionados
    function updateSelectedCount() {
        const selected = document.querySelectorAll('.comment-checkbox:checked');
        const count = selected.length;
        selectedCountSpan.textContent = `${count} seleccionados`;
        deleteSelectedBtn.disabled = count === 0;

        // Actualizar estado del checkbox "Seleccionar todo"
        const allCheckboxes = document.querySelectorAll('.comment-checkbox');
        if (count === 0) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = false;
        } else if (count === allCheckboxes.length) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = true;
        } else {
            selectAllCheckbox.indeterminate = true;
        }
    }

    // Seleccionar/deseleccionar todos
    selectAllCheckbox.addEventListener('change', function() {
        const allCheckboxes = document.querySelectorAll('.comment-checkbox');
        allCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    // Limpiar selección
    clearSelectionBtn.addEventListener('click', function() {
        const allCheckboxes = document.querySelectorAll('.comment-checkbox');
        allCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
        updateSelectedCount();
    });

    // Eliminar comentarios seleccionados
    deleteSelectedBtn.addEventListener('click', async function() {
        if (this.disabled) return;

        const selected = document.querySelectorAll('.comment-checkbox:checked');
        if (selected.length === 0) return;

        const count = selected.length;
        if (!confirm(`¿Eliminar ${count} comentario${count > 1 ? 's' : ''} seleccionado${count > 1 ? 's' : ''}?`)) return;

        this.disabled = true;
        this.innerHTML = '<span class="material-icons text-sm mr-2 animate-spin">refresh</span>Eliminando...';

        try {
            const deletePromises = Array.from(selected).map(async (checkbox) => {
                const commentId = checkbox.getAttribute('data-comment-id');
                const res = await fetch(`/api/comentarios-curso/${commentId}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
                });
                return res.ok;
            });

            const results = await Promise.all(deletePromises);
            const successCount = results.filter(Boolean).length;

            if (successCount === count) {
                mostrarNotificacion(`${successCount} comentario${successCount > 1 ? 's' : ''} eliminado${successCount > 1 ? 's' : ''}`, 'success');
                cargarComentarios();
            } else {
                mostrarNotificacion(`Se eliminaron ${successCount} de ${count} comentarios`, 'warning');
                cargarComentarios();
            }
        } catch (error) {
            mostrarNotificacion('Error al eliminar comentarios', 'error');
        } finally {
            this.disabled = false;
            this.innerHTML = '<span class="material-icons text-sm mr-2">delete_sweep</span>Eliminar seleccionados';
        }
    });

    // Escuchar cambios en checkboxes individuales
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('comment-checkbox')) {
            updateSelectedCount();
        }
    });

    // Inicializar estado
    toggleToolbar();
    updateSelectedCount();
}

function wireEventosComentarios() {
    // Solo inicializar una vez
    if (window.__comentariosEventsInit) return;
    window.__comentariosEventsInit = true;

    const rootEl = document.getElementById('comentariosContainer');
    if (!rootEl) return;

    // Inicializar funcionalidad de selección múltiple
    inicializarSeleccionMultiple();

    // Delegación de eventos - todos los clicks en el contenedor
    rootEl.addEventListener('click', async (e) => {
        // Manejar botones de respuesta (enviar/cancelar)
        if (e.target.closest('[data-save-student-reply]')) {
            const sendBtn = e.target.closest('[data-save-student-reply]');
            if (sendBtn.disabled) return;
            const wrapper = sendBtn.closest('.inline-reply-form-student');
            const textarea = wrapper?.querySelector('textarea');
            const parentId = sendBtn.getAttribute('data-parent-id');
            const nivelId = sendBtn.getAttribute('data-nivel-id') || '';
            const texto = (textarea?.value || '').trim();
            if (texto.length < 3) { mostrarNotificacion('Mínimo 3 caracteres', 'error'); return; }
            sendBtn.disabled = true;
            try {
                const formData = new FormData();
                formData.append('curso_id', '{{ $curso->id }}');
                if (nivelId) formData.append('nivel_id', nivelId);
                formData.append('comentario', texto);
                formData.append('parent_id', parentId);
                const res = await fetch('/api/comentarios-curso', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                    body: formData
                });
                if (res.ok) { mostrarNotificacion('Respuesta publicada', 'success'); cargarComentarios(); }
                else { const err = await res.json(); mostrarNotificacion(err.message || 'No se pudo responder', 'error'); sendBtn.disabled = false; }
            } catch { mostrarNotificacion('Error de conexión', 'error'); sendBtn.disabled = false; }
            return;
        }

        if (e.target.closest('[data-cancel-student-reply]')) {
            const cancelBtn = e.target.closest('[data-cancel-student-reply]');
            cancelBtn.closest('.inline-reply-form-student')?.remove();
            return;
        }

        const btn = e.target.closest('[data-action]');
        if (!btn) return;

        const action = btn.getAttribute('data-action');
        const id = btn.getAttribute('data-id');

        if (action === 'student-reply') {
            e.preventDefault();
            const thread = btn.closest('.comment-thread');
            if (!thread) return;
            let form = thread.querySelector('.inline-reply-form-student');
            if (form) { form.remove(); return; }
            const nivelId = btn.getAttribute('data-nivel-id') || '';
            const usuario = btn.getAttribute('data-usuario') || '';
            form = document.createElement('div');
            form.className = 'inline-reply-form-student ml-13 pl-4 mt-3 border-l-2 border-gray-700';
            form.innerHTML = `
                <div class="bg-gray-800 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs">${(window.currentUserName || 'E').toString().trim().charAt(0).toUpperCase()}</div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <h6 class="text-xs font-semibold text-white">Responder a ${escapeHtml(usuario)}</h6>
                            </div>
                            <textarea class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none" rows="3" placeholder="Escribe tu respuesta aquí..."></textarea>
                            <div class="mt-2 flex items-center gap-2">
                                <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium transition" data-save-student-reply data-parent-id="${id}" data-nivel-id="${nivelId}">
                                    <span class="material-icons text-xs mr-1">send</span>
                                    Enviar
                                </button>
                                <button class="px-3 py-1 bg-gray-600 text-white rounded text-xs font-medium hover:bg-gray-700 transition" data-cancel-student-reply>
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>`;
            thread.insertAdjacentElement('beforeend', form);
            return;
        }

        if (action === 'edit') {
            e.preventDefault();
            const block = btn.closest('[data-comentario-id]');
            if (!block) return;
            const p = block.querySelector('p[data-role="texto"]');
            const original = (p?.textContent || '').trim();
            const editor = document.createElement('div');
            editor.innerHTML = `
                <div class="mt-3">
                    <textarea class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">${escapeHtml(original)}</textarea>
                    <div class="mt-2 flex items-center gap-2">
                        <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700" data-save-edit>Guardar</button>
                        <button class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-600" data-cancel-edit>Cancelar</button>
                    </div>
                </div>`;
            p.replaceWith(editor);

            const saveBtn = editor.querySelector('[data-save-edit]');
            const cancelBtn = editor.querySelector('[data-cancel-edit]');

            cancelBtn.addEventListener('click', () => cargarComentarios());
            saveBtn.addEventListener('click', async () => {
                if (saveBtn.disabled) return;
                const nuevo = editor.querySelector('textarea').value.trim();
                if (nuevo.length < 3) { mostrarNotificacion('Mínimo 3 caracteres', 'error'); return; }
                saveBtn.disabled = true;
                try {
                    const res = await fetch(`/api/comentarios-curso/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ comentario: nuevo })
                    });
                    if (res.ok) { mostrarNotificacion('Comentario actualizado', 'success'); cargarComentarios(); }
                    else { const err = await res.json(); mostrarNotificacion(err.message || 'No se pudo actualizar', 'error'); saveBtn.disabled = false; }
                } catch { mostrarNotificacion('Error de conexión', 'error'); saveBtn.disabled = false; }
            });
            return;
        }

        if (action === 'delete') {
            e.preventDefault();
            if (btn.disabled) return;
            if (!confirm('¿Eliminar este comentario?')) return;
            btn.disabled = true;
            try {
                const res = await fetch(`/api/comentarios-curso/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
                });
                if (res.ok) { mostrarNotificacion('Comentario eliminado', 'success'); cargarComentarios(); }
                else { const err = await res.json(); mostrarNotificacion(err.message || 'No se pudo eliminar', 'error'); btn.disabled = false; }
            } catch { mostrarNotificacion('Error de conexión', 'error'); btn.disabled = false; }
            return;
        }
    });
}

function escapeHtml(str) {
    return (str ?? '').toString()
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

// Opcional: Expandir el primer nivel por defecto
document.addEventListener('DOMContentLoaded', function() {
    // Mantener todos los niveles cerrados por defecto.
    // Generar thumbnails para mini players (YouTube) y fallback genérico
    const minis = document.querySelectorAll('.mini-thumb');
    minis.forEach(async function(mini){
        const parent = mini.parentElement;
        const tipo = parent.getAttribute('data-tipo');
        const url = parent.getAttribute('data-url');
        const durBadge = parent.querySelector('.mini-duration');
        let thumb = null;
        // Thumbnails: YouTube, Vimeo (intento básico) y fallback
        if (tipo === 'url_video' && url) {
            if (url.includes('youtube.com/watch')) {
                const vid = (url.split('v=')[1] || '').split('&')[0];
                if (vid) thumb = `https://img.youtube.com/vi/${vid}/hqdefault.jpg`;
            } else if (url.includes('youtu.be/')) {
                const vid = (url.split('youtu.be/')[1] || '').split('?')[0];
                if (vid) thumb = `https://img.youtube.com/vi/${vid}/hqdefault.jpg`;
            } else if (url.includes('vimeo.com/')) {
                const m = url.match(/vimeo.com\/(\d+)/);
                if (m && m[1]) {
                    // Nota: Vimeo thumbnails requieren API; usar placeholder elegante
                    thumb = null;
                }
            }
        }
        if (thumb) {
            mini.style.backgroundImage = `url('${thumb}')`;
        }
        // Duración: para videos locales, tratar de leer metadatos cargando un elemento video oculto
        if (tipo === 'video_archivo') {
            try {
                const videoPath = parent.getAttribute('data-path');
                if (videoPath) {
                    const v = document.createElement('video');
                    v.src = `/video/${videoPath}`;
                    v.preload = 'metadata';
                    v.addEventListener('loadedmetadata', () => {
                        const d = Math.floor(v.duration || 0);
                        if (d && durBadge) {
                            const mm = String(Math.floor(d / 60)).padStart(2, '0');
                            const ss = String(d % 60).padStart(2, '0');
                            durBadge.textContent = `${mm}:${ss}`;
                            durBadge.classList.remove('hidden');
                        }
                    });
                }
            } catch (e) {}
        }
    });

    // Efecto de escritura en el hero
    const typingEl = document.getElementById('typingWelcome');
    const cursorEl = document.getElementById('typingCursor');
    if (typingEl) {
        const fullText = 'Bienvenido a la sección de SoftlinkIA / Academy';
        let idx = 0;
        const speed = 45; // ms por carácter
        const type = () => {
            if (idx <= fullText.length) {
                typingEl.textContent = fullText.slice(0, idx);
                idx++;
                setTimeout(type, speed);
            } else {
                // Parpadeo del cursor sostenido
                if (cursorEl) cursorEl.classList.add('animate-pulse');
            }
        };
        setTimeout(type, 400);
    }

    // Manejar formulario de nueva pregunta
    const preguntaForm = document.getElementById('nuevaPreguntaForm');
    if (preguntaForm) {
        preguntaForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const nivelSelect = this.querySelector('#nivelSelect');
            const nivelVal = nivelSelect ? (nivelSelect.value || '') : '';
            // Bloquear si ya existe un hilo del usuario en ese nivel
            if (nivelVal && window.__nivelesConHilo && window.__nivelesConHilo.has(nivelVal)) {
                mostrarNotificacion('Ya tienes un hilo abierto en este nivel.', 'error');
                return;
            }
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Mostrar estado de carga
            submitBtn.innerHTML = '<span class="material-icons text-sm mr-2 animate-spin">refresh</span>Publicando...';
            submitBtn.disabled = true;

            // Validar nivel obligatorio
            if (!nivelVal) {
                mostrarNotificacion('Selecciona un nivel para tu pregunta.', 'error');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                return;
            }

            try {
                const response = await fetch('/api/comentarios-curso', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                if (response.ok) {
                    const result = await response.json();

                    // Limpiar formulario
                    this.reset();
                    document.getElementById('parentIdInput').value = '';

                    // Mostrar notificación de éxito
                    mostrarNotificacion('¡Pregunta publicada exitosamente!', 'success');

                    // Recargar comentarios
                    cargarComentarios();
                } else {
                    const error = await response.json();
                    mostrarNotificacion(error.message || 'Error al publicar la pregunta', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                mostrarNotificacion('Error de conexión. Inténtalo de nuevo.', 'error');
            } finally {
                // Restaurar botón
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
        // Aplicar regla al cambiar el nivel seleccionado
        const nivelSelectEl = document.getElementById('nivelSelect');
        if (nivelSelectEl) {
            nivelSelectEl.addEventListener('change', aplicarReglasPorNivelSeleccionado);
        }
    }

    // Cargar comentarios existentes
    window.currentUserId = {{ auth()->id() }};
    window.currentUserName = @json(Auth::user()->name ?? Auth::user()->nombre ?? 'Estudiante');
    window.creadorAvatarUrl = @json($curso->creador_avatar_url ?? null);
    window.creadorIniciales = @json($creadorIniciales ?? 'SL');

    // Inicializar event listeners de comentarios (solo una vez)
    wireEventosComentarios();

    cargarComentarios();
});nn// ===== SISTEMA DE PROGRESO DE LECCIONES =====

// Estado global para tracking de progreso
window.progresoLecciones = {
    estados: {}, // Cache de estados de completado
    cargando: new Set() // IDs de subniveles siendo procesados
};

/**
 * Alternar estado de completado de una lección
 */
async function toggleCompletarLeccion(subnivelId) {
    // Prevenir múltiples clicks
    if (window.progresoLecciones.cargando.has(subnivelId)) {
        return;
    }

    // Verificar desbloqueo primero
    try {
        const desbloqueoResponse = await fetch(`/api/subnivel/${subnivelId}/verificar-desbloqueo`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const desbloqueoData = await desbloqueoResponse.json();

        if (desbloqueoData.success && !desbloqueoData.data.desbloqueado) {
            mostrarNotificacion(desbloqueoData.data.razon_bloqueo || 'Este contenido está bloqueado. Debes completar el contenido anterior.', 'error');
            return;
        }
    } catch (error) {
        console.error('Error verificando desbloqueo:', error);
        // Continuar si hay error
    }

    const btn = document.getElementById(`btn-completar-${subnivelId}`);
    const icon = document.getElementById(`icon-completar-${subnivelId}`);
    const text = document.getElementById(`text-completar-${subnivelId}`);

    // Estado actual (asumir no completado si no está en cache)
    const estaCompletado = window.progresoLecciones.estados[subnivelId] || false;

    // Marcar como cargando
    window.progresoLecciones.cargando.add(subnivelId);
    btn.disabled = true;
    btn.classList.add('opacity-50', 'cursor-not-allowed');

    try {
        const endpoint = estaCompletado ? '/api/progreso-leccion/no-completar' : '/api/progreso-leccion/completar';

        const response = await fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                subnivel_id: subnivelId
            })
        });

        const data = await response.json();

        if (data.success) {
            // Actualizar estado en cache
            window.progresoLecciones.estados[subnivelId] = !estaCompletado;

            // Actualizar UI del botón
            actualizarBotonCompletar(subnivelId, !estaCompletado);

            // Actualizar progreso en tiempo real
            actualizarProgresoEnTiempoReal();

            // Mostrar notificación
            mostrarNotificacion(data.message, 'success');

        } else {
            throw new Error(data.message || 'Error al actualizar progreso');
        }

    } catch (error) {
        console.error('Error al actualizar progreso:', error);
        mostrarNotificacion('Error al actualizar progreso: ' + error.message, 'error');
    } finally {
        // Remover estado de cargando
        window.progresoLecciones.cargando.delete(subnivelId);
        btn.disabled = false;
        btn.classList.remove('opacity-50', 'cursor-not-allowed');
    }
}

/**
 * Actualizar la apariencia del botón de completar
 */
function actualizarBotonCompletar(subnivelId, estaCompletado) {
    const btn = document.getElementById(`btn-completar-${subnivelId}`);
    const icon = document.getElementById(`icon-completar-${subnivelId}`);
    const text = document.getElementById(`text-completar-${subnivelId}`);

    if (estaCompletado) {
        // Estado completado
        btn.className = btn.className.replace(/bg-gray-\d+|text-gray-\d+|border-gray-\d+|hover:bg-green-\d+|hover:text-green-\d+|hover:border-green-\d+/g, '');
        btn.classList.add('bg-green-100', 'text-green-700', 'dark:bg-green-900', 'dark:text-green-300', 'border-green-300', 'dark:border-green-600');
        icon.textContent = 'check_circle';
        text.textContent = 'Completado';
    } else {
        // Estado no completado
        btn.className = btn.className.replace(/bg-green-\d+|text-green-\d+|border-green-\d+/g, '');
        btn.classList.add('bg-gray-100', 'text-gray-700', 'dark:bg-gray-700', 'dark:text-gray-300', 'border-gray-300', 'dark:border-gray-600', 'hover:bg-green-100', 'hover:text-green-700', 'dark:hover:bg-green-900', 'dark:hover:text-green-300', 'hover:border-green-300', 'dark:hover:border-green-600');
        icon.textContent = 'radio_button_unchecked';
        text.textContent = 'Completar';
    }
}

/**
 * Cargar estados iniciales de progreso
 */
async function cargarEstadosProgreso() {
    try {
        // Obtener todos los subniveles del curso
        const subniveles = @json($curso->getAllSubniveles()->pluck('id'));

        if (subniveles.length === 0) return;

        // Consultar estados en lote (más eficiente)
        const response = await fetch('/api/progreso-leccion/estados-lote', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                subnivel_ids: subniveles
            })
        });

        if (response.ok) {
            const data = await response.json();
            if (data.success) {
                window.progresoLecciones.estados = data.data.estados;

                // Actualizar UI de todos los botones
                subniveles.forEach(subnivelId => {
                    const estaCompletado = window.progresoLecciones.estados[subnivelId] || false;
                    actualizarBotonCompletar(subnivelId, estaCompletado);
                });
            }
        }
    } catch (error) {
        console.error('Error al cargar estados de progreso:', error);
    }
}

/**
 * Actualizar progreso en tiempo real sin recargar página
 */
async function actualizarProgresoEnTiempoReal() {
    try {
        // Recargar la sección de progreso por nivel
        const progresoSection = document.querySelector('.relative.bg-white\\/80.dark\\:bg-slate-800\\/80.backdrop-blur-xl');
        if (progresoSection) {
            // Hacer una petición para obtener el HTML actualizado
            const response = await fetch(`/cursos/{{ $curso->id }}/progreso-section`, {
                headers: {
                    'Accept': 'text/html',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (response.ok) {
                const html = await response.text();
                progresoSection.outerHTML = html;
            }
        }
    } catch (error) {
        console.error('Error al actualizar progreso:', error);
    }
}

/**
 * Mostrar notificación
 */
function mostrarNotificacion(mensaje, tipo = 'info') {
    // Crear elemento de notificación
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
        tipo === 'success' ? 'bg-green-500 text-white' :
        tipo === 'error' ? 'bg-red-500 text-white' :
        'bg-blue-500 text-white'
    }`;
    notification.textContent = mensaje;

    document.body.appendChild(notification);

    // Animar entrada
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    // Remover después de 3 segundos
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}


// ===== SISTEMA DE CERTIFICADOS =====

/**
 * Verificar elegibilidad para certificado
 */
async function verificarElegibilidad() {
    try {
        const response = await fetch(`/certificados/{{ $curso->id }}/verificar-elegibilidad`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (response.ok) {
            const data = await response.json();
            actualizarUICertificado(data);
        }
    } catch (error) {
        console.error('Error al verificar elegibilidad:', error);
    }
}

/**
 * Actualizar la UI del certificado basado en la respuesta
 */
function actualizarUICertificado(data) {
    const progresoBar = document.getElementById('progresoBar');
    const progresoPorcentaje = document.getElementById('progresoPorcentaje');
    const certificadoMensaje = document.getElementById('certificadoMensaje');
    const certificadoBtn = document.getElementById('certificadoBtn');
    const certificadoIcon = document.getElementById('certificadoIcon');
    const certificadoTexto = document.getElementById('certificadoTexto');

    if (!data) return;

    // Actualizar progreso
    const progreso = Math.round(data.progreso || 0);
    progresoBar.style.width = `${progreso}%`;
    progresoPorcentaje.textContent = `${progreso}%`;

    // Cambiar color de la barra según el progreso
    if (progreso >= 80) {
        progresoBar.className = 'bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full transition-all duration-500';
    } else if (progreso >= 50) {
        progresoBar.className = 'bg-gradient-to-r from-yellow-500 to-orange-600 h-2 rounded-full transition-all duration-500';
    } else {
        progresoBar.className = 'bg-gradient-to-r from-red-500 to-pink-600 h-2 rounded-full transition-all duration-500';
    }

    // Actualizar mensaje y botón según el estado
    if (data.elegible) {
        if (data.ya_tiene_certificado) {
            certificadoMensaje.textContent = '¡Felicitaciones! Ya tienes tu certificado';
            certificadoIcon.textContent = 'workspace_premium';
            certificadoTexto.textContent = 'Ver Certificado';
            certificadoBtn.onclick = () => window.location.href = '/certificados/{{ $certificado->id ?? "" }}';
            certificadoBtn.disabled = false;
        } else {
            certificadoMensaje.textContent = '¡Excelente! Puedes generar tu certificado';
            certificadoIcon.textContent = 'school';
            certificadoTexto.textContent = 'Generar Certificado';
            certificadoBtn.onclick = generarCertificado;
            certificadoBtn.disabled = false;
        }
    } else {
        certificadoMensaje.textContent = data.mensaje || 'Completa más lecciones para obtener tu certificado';
        certificadoIcon.textContent = 'lock';
        certificadoTexto.textContent = 'Progreso Insuficiente';
        certificadoBtn.disabled = true;
    }
}

/**
 * Generar certificado
 */
async function generarCertificado() {
    const btn = document.getElementById('certificadoBtn');
    const originalText = btn.innerHTML;

    btn.disabled = true;
    btn.innerHTML = '<span class="material-icons text-sm mr-2 animate-spin">refresh</span>Generando...';

    try {
        const response = await fetch('/certificados/generar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                curso_id: {{ $curso->id }}
            })
        });

        const data = await response.json();

        if (response.ok) {
            mostrarNotificacion(data.message || 'Certificado generado exitosamente', 'success');
            // Recargar la página para mostrar el certificado
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            mostrarNotificacion(data.message || 'Error al generar el certificado', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        mostrarNotificacion('Error de conexión', 'error');
    } finally {
        btn.disabled = false;
        btn.innerHTML = originalText;
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    cargarEstadosProgreso();

    // Verificar elegibilidad del certificado después de un breve delay
    setTimeout(() => {
        verificarElegibilidad();
    }, 1000);

    // Verificar desbloqueo de subniveles al cargar
    verificarDesbloqueos();
});

// ===== SISTEMA DE CUESTIONARIOS =====

let cuestionarioActual = {
    subnivelId: null,
    preguntas: [],
    respuestas: {}
};

/**
 * Abrir cuestionario de un subnivel
 */
async function abrirCuestionario(subnivelId) {
    cuestionarioActual.subnivelId = subnivelId;
    cuestionarioActual.respuestas = {};

    const modal = document.getElementById('cuestionarioModal');
    const contenido = document.getElementById('cuestionarioContenido');
    const btnEnviar = document.getElementById('btnEnviarCuestionario');

    // Mostrar modal
    modal.classList.remove('hidden');
    btnEnviar.disabled = true;

    // Mostrar loading
    contenido.innerHTML = `
        <div class="text-center py-12">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-yellow-500 mx-auto mb-4"></div>
            <p class="text-gray-600 dark:text-gray-400">Cargando cuestionario...</p>
        </div>
    `;

    try {
        const response = await fetch(`/api/cuestionario/${subnivelId}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();

        if (!data.success) {
            throw new Error(data.message || 'Error al cargar el cuestionario');
        }

        cuestionarioActual.preguntas = data.data.preguntas;

        // Actualizar título
        document.getElementById('cuestionarioModalTitulo').textContent = `Cuestionario: ${data.data.subnivel_titulo}`;
        document.getElementById('cuestionarioModalSubnivel').textContent = `Subnivel ${data.data.subnivel_id}`;
        document.getElementById('cuestionarioProgreso').textContent = `0 / ${data.data.total_preguntas} preguntas respondidas`;

        // Si ya está aprobado, mostrar mensaje
        if (data.data.ya_aprobado) {
            contenido.innerHTML = `
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-icons text-green-600 dark:text-green-400 text-4xl">check_circle</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">¡Cuestionario Aprobado!</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Ya has aprobado este cuestionario en el intento ${data.data.intento_actual}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-500">Puedes verlo nuevamente, pero no afectará tu progreso.</p>
                </div>
            `;
            btnEnviar.disabled = true;
            btnEnviar.textContent = 'Ya Aprobado';
            return;
        }

        // Renderizar preguntas
        renderizarPreguntas(data.data.preguntas);
        btnEnviar.disabled = false;

    } catch (error) {
        console.error('Error:', error);
        contenido.innerHTML = `
            <div class="text-center py-12">
                <div class="w-20 h-20 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-icons text-red-600 dark:text-red-400 text-4xl">error</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Error</h3>
                <p class="text-gray-600 dark:text-gray-400">${error.message}</p>
            </div>
        `;
    }
}

/**
 * Renderizar preguntas del cuestionario
 */
function renderizarPreguntas(preguntas) {
    const contenido = document.getElementById('cuestionarioContenido');
    const totalPreguntas = preguntas.length;

    let html = `
        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-lg p-4 mb-6">
            <div class="flex items-center space-x-2">
                <span class="material-icons text-yellow-600 dark:text-yellow-400">info</span>
                <p class="text-sm text-yellow-800 dark:text-yellow-200">
                    <strong>Instrucciones:</strong> Responde todas las preguntas. Necesitas un mínimo del 70% para aprobar.
                </p>
            </div>
        </div>
        <div class="space-y-6">
    `;

    preguntas.forEach((pregunta, index) => {
        html += `
            <div class="pregunta-item bg-white dark:bg-slate-700 rounded-xl border border-gray-200 dark:border-gray-600 p-6" data-pregunta-id="${pregunta.id}">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold">
                        ${pregunta.numero_pregunta}
                    </div>
                    <div class="flex-1">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">${escapeHtml(pregunta.pregunta_texto)}</h4>
                        <div class="space-y-3">
                            ${[1, 2, 3].map(num => `
                                <label class="flex items-start space-x-3 p-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 hover:border-yellow-400 dark:hover:border-yellow-600 cursor-pointer transition-all duration-200 hover:bg-yellow-50 dark:hover:bg-yellow-900/20">
                                    <input type="radio"
                                           name="pregunta_${pregunta.id}"
                                           value="${num}"
                                           class="mt-1 w-4 h-4 text-yellow-600 focus:ring-yellow-500 border-gray-300"
                                           onchange="seleccionarRespuesta(${pregunta.id}, ${num})">
                                    <span class="flex-1 text-gray-700 dark:text-gray-300">${escapeHtml(pregunta.opciones[num])}</span>
                                </label>
                            `).join('')}
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    html += `</div>`;
    contenido.innerHTML = html;
}

/**
 * Seleccionar respuesta
 */
function seleccionarRespuesta(preguntaId, respuesta) {
    cuestionarioActual.respuestas[preguntaId] = respuesta;

    // Actualizar progreso
    const totalPreguntas = cuestionarioActual.preguntas.length;
    const respondidas = Object.keys(cuestionarioActual.respuestas).length;
    document.getElementById('cuestionarioProgreso').textContent = `${respondidas} / ${totalPreguntas} preguntas respondidas`;

    // Habilitar botón si todas están respondidas
    const btnEnviar = document.getElementById('btnEnviarCuestionario');
    if (respondidas === totalPreguntas) {
        btnEnviar.disabled = false;
    }
}

/**
 * Enviar cuestionario
 */
async function enviarCuestionario() {
    const subnivelId = cuestionarioActual.subnivelId;
    const totalPreguntas = cuestionarioActual.preguntas.length;
    const respondidas = Object.keys(cuestionarioActual.respuestas).length;

    if (respondidas < totalPreguntas) {
        mostrarNotificacion('Por favor responde todas las preguntas antes de enviar', 'error');
        return;
    }

    const btnEnviar = document.getElementById('btnEnviarCuestionario');
    const contenido = document.getElementById('cuestionarioContenido');

    btnEnviar.disabled = true;
    btnEnviar.innerHTML = '<span class="material-icons text-sm mr-2 animate-spin">refresh</span>Enviando...';

    // Preparar respuestas
    const respuestas = cuestionarioActual.preguntas.map(pregunta => ({
        pregunta_id: pregunta.id,
        respuesta_seleccionada: cuestionarioActual.respuestas[pregunta.id]
    }));

    try {
        const response = await fetch(`/api/cuestionario/${subnivelId}/evaluar`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ respuestas })
        });

        const data = await response.json();

        if (!data.success) {
            throw new Error(data.message || 'Error al evaluar el cuestionario');
        }

        // Mostrar resultados
        mostrarResultadosCuestionario(data.data);

    } catch (error) {
        console.error('Error:', error);
        mostrarNotificacion(error.message || 'Error al enviar el cuestionario', 'error');
        btnEnviar.disabled = false;
        btnEnviar.innerHTML = '<span class="material-icons text-sm mr-2">send</span>Enviar Respuestas';
    }
}

/**
 * Mostrar resultados del cuestionario
 */
function mostrarResultadosCuestionario(resultados) {
    const contenido = document.getElementById('cuestionarioContenido');
    const btnEnviar = document.getElementById('btnEnviarCuestionario');

    let html = `
        <div class="text-center mb-6">
            <div class="w-20 h-20 ${resultados.aprobado ? 'bg-green-100 dark:bg-green-900' : 'bg-red-100 dark:bg-red-900'} rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-icons ${resultados.aprobado ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'} text-4xl">
                    ${resultados.aprobado ? 'check_circle' : 'cancel'}
                </span>
            </div>
            <h3 class="text-2xl font-bold ${resultados.aprobado ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'} mb-2">
                ${resultados.aprobado ? '¡Felicitaciones! Has aprobado' : 'No aprobaste el cuestionario'}
            </h3>
            <p class="text-gray-600 dark:text-gray-400 mb-4">
                ${resultados.respuestas_correctas} de ${resultados.total_preguntas} respuestas correctas (${resultados.porcentaje}%)
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-500">
                Intento número: ${resultados.intento_numero}
            </p>
        </div>
        <div class="space-y-4">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Detalle de respuestas:</h4>
    `;

    resultados.respuestas_detalle.forEach(detalle => {
        const pregunta = cuestionarioActual.preguntas.find(p => p.id === detalle.pregunta_id);
        html += `
            <div class="p-4 rounded-lg border-2 ${detalle.es_correcta ? 'border-green-200 bg-green-50 dark:border-green-800 dark:bg-green-900/20' : 'border-red-200 bg-red-50 dark:border-red-800 dark:bg-red-900/20'}">
                <div class="flex items-start space-x-3">
                    <span class="material-icons ${detalle.es_correcta ? 'text-green-600' : 'text-red-600'}">
                        ${detalle.es_correcta ? 'check_circle' : 'cancel'}
                    </span>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 dark:text-white mb-2">Pregunta ${detalle.numero_pregunta}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">${escapeHtml(pregunta.pregunta_texto)}</p>
                        <div class="space-y-1">
                            <p class="text-xs ${detalle.es_correcta ? 'text-green-700 dark:text-green-300' : 'text-red-700 dark:text-red-300'}">
                                <strong>Tu respuesta:</strong> ${pregunta.opciones[detalle.respuesta_seleccionada]}
                            </p>
                            ${!detalle.es_correcta ? `
                                <p class="text-xs text-green-700 dark:text-green-300">
                                    <strong>Respuesta correcta:</strong> ${pregunta.opciones[detalle.respuesta_correcta]}
                                </p>
                            ` : ''}
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    html += `</div>`;

    contenido.innerHTML = html;

    // Ocultar el footer original y mostrar botón de cerrar en el contenido
    const footer = document.getElementById('cuestionarioFooter');
    if (footer) {
        footer.style.display = 'none';
    }

    // Agregar botón de cerrar al contenido
    const botonCerrar = document.createElement('div');
    botonCerrar.className = 'mt-6 pt-6 border-t border-gray-200 dark:border-slate-700 flex justify-end';
    botonCerrar.innerHTML = `
        <button onclick="cerrarCuestionarioModal()" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105 flex items-center">
            <span class="material-icons text-sm mr-2">check_circle</span>
            Cerrar
        </button>
    `;
    contenido.appendChild(botonCerrar);

    if (resultados.aprobado) {
        btnEnviar.innerHTML = '<span class="material-icons text-sm mr-2">check_circle</span>Cuestionario Aprobado';
        btnEnviar.classList.remove('from-yellow-500', 'to-orange-600', 'hover:from-yellow-600', 'hover:to-orange-700');
        btnEnviar.classList.add('from-green-500', 'to-emerald-600', 'hover:from-green-600', 'hover:to-emerald-700');
        btnEnviar.disabled = true;
        btnEnviar.style.display = 'none'; // Ocultar botón de enviar cuando está aprobado

        // Actualizar botón en el listado
        actualizarBotonCuestionario(cuestionarioActual.subnivelId, true);

        // Mostrar mensaje de contenido desbloqueado si existe
        let mensajeDesbloqueo = '¡Cuestionario aprobado! El siguiente contenido ha sido desbloqueado.';
        if (resultados.contenido_desbloqueado && resultados.contenido_desbloqueado.mensaje) {
            mensajeDesbloqueo = resultados.contenido_desbloqueado.mensaje;
        }
        mostrarNotificacion(mensajeDesbloqueo, 'success');

        // Recargar progreso y verificar desbloqueos
        setTimeout(() => {
            cargarEstadosProgreso();
            verificarDesbloqueoSubniveles();
        }, 1000);

        // Cerrar modal automáticamente después de 5 segundos si está aprobado
        setTimeout(() => {
            cerrarCuestionarioModal();
        }, 5000);
    } else {
        btnEnviar.innerHTML = '<span class="material-icons text-sm mr-2">refresh</span>Intentar de Nuevo';
        btnEnviar.onclick = () => {
            abrirCuestionario(cuestionarioActual.subnivelId);
        };
        btnEnviar.style.display = 'inline-flex'; // Mostrar botón de reintentar
        mostrarNotificacion(`No alcanzaste el mínimo requerido (70%). Obtuviste ${resultados.porcentaje}%. Inténtalo de nuevo.`, 'error');
    }

    btnEnviar.disabled = false;
}

/**
 * Cerrar modal de cuestionario
 */
function cerrarCuestionarioModal() {
    const modal = document.getElementById('cuestionarioModal');
    const footer = document.getElementById('cuestionarioFooter');
    const btnEnviar = document.getElementById('btnEnviarCuestionario');

    // Restaurar estado del footer y botón
    if (footer) {
        footer.style.display = 'block';
    }
    if (btnEnviar) {
        btnEnviar.style.display = 'inline-flex';
        btnEnviar.disabled = false;
        btnEnviar.innerHTML = '<span class="material-icons text-sm mr-2 inline-block">send</span>Enviar Respuestas';
        btnEnviar.classList.remove('from-green-500', 'to-emerald-600', 'hover:from-green-600', 'hover:to-emerald-700');
        btnEnviar.classList.add('from-yellow-500', 'to-orange-600', 'hover:from-yellow-600', 'hover:to-orange-700');
        btnEnviar.onclick = enviarCuestionario;
    }

    modal.classList.add('hidden');
    cuestionarioActual = {
        subnivelId: null,
        preguntas: [],
        respuestas: {}
    };
}

/**
 * Actualizar botón de cuestionario
 */
function actualizarBotonCuestionario(subnivelId, aprobado) {
    const btn = document.getElementById(`btn-cuestionario-${subnivelId}`);
    const icon = document.getElementById(`icon-cuestionario-${subnivelId}`);
    const text = document.getElementById(`text-cuestionario-${subnivelId}`);

    if (btn && icon && text) {
        if (aprobado) {
            btn.className = btn.className.replace(/bg-yellow-\d+|text-yellow-\d+|border-yellow-\d+/g, '');
            btn.classList.add('bg-green-100', 'text-green-800', 'dark:bg-green-900', 'dark:text-green-200', 'border-green-300', 'dark:border-green-600');
            icon.textContent = 'check_circle';
            text.textContent = 'Cuestionario Aprobado';
        }
    }
}

/**
 * Verificar desbloqueos de subniveles
 */
async function verificarDesbloqueos() {
    const subniveles = document.querySelectorAll('[data-subnivel-id]');

    for (const subnivelEl of subniveles) {
        const subnivelId = subnivelEl.getAttribute('data-subnivel-id');

        try {
            const response = await fetch(`/api/subnivel/${subnivelId}/verificar-desbloqueo`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const data = await response.json();

            if (data.success && !data.data.desbloqueado) {
                // Bloquear visualmente
                subnivelEl.classList.add('opacity-60', 'cursor-not-allowed');
                subnivelEl.querySelectorAll('button, [onclick]').forEach(btn => {
                    btn.disabled = true;
                    btn.style.pointerEvents = 'none';
                });

                // Agregar mensaje de bloqueo
                const bloqueoMsg = document.createElement('div');
                bloqueoMsg.className = 'mt-2 p-2 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-lg';
                bloqueoMsg.innerHTML = `
                    <div class="flex items-center space-x-2">
                        <span class="material-icons text-red-600 text-sm">lock</span>
                        <span class="text-xs text-red-700 dark:text-red-300">${data.data.razon_bloqueo || 'Este contenido está bloqueado'}</span>
                    </div>
                `;
                subnivelEl.appendChild(bloqueoMsg);
            }
        } catch (error) {
            console.error(`Error verificando desbloqueo para subnivel ${subnivelId}:`, error);
        }
    }
}

// Cerrar modal al hacer click fuera
document.addEventListener('click', function(event) {
    const cuestionarioModal = document.getElementById('cuestionarioModal');
    if (event.target === cuestionarioModal) {
        cerrarCuestionarioModal();
    }
});nndocument.addEventListener('contextmenu', function(e) {
    if (e.target.tagName === 'VIDEO' || e.target.closest('video') || e.target.closest('.video-js')) {
        e.preventDefault();
        return false;
    }
});

document.addEventListener('dragstart', function(e) {
    if (e.target.tagName === 'VIDEO' || e.target.closest('video') || e.target.closest('.video-js')) {
        e.preventDefault();
        return false;
    }
});

// Prevenir atajos de teclado para guardar
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && (e.key === 's' || e.key === 'S' || e.key === 'u' || e.key === 'U')) {
        if (e.target.tagName === 'VIDEO' || e.target.closest('video') || e.target.closest('.video-js')) {
            e.preventDefault();
            return false;
        }
    }
    // Prevenir F12 (inspeccionar elemento) - solo en videos
    if (e.key === 'F12') {
        if (e.target.tagName === 'VIDEO' || e.target.closest('video') || e.target.closest('.video-js')) {
            e.preventDefault();
            return false;
        }
    }
});
