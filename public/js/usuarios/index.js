(() => {
  const wrapper = document.getElementById('usuarios-table-wrapper');
  if (!wrapper) return;

  const searchInput = document.querySelector('input[name="q"]');
  const tipoSelect = document.querySelector('select[name="tipo"]');
  const estadoSelect = document.querySelector('select[name="estado"]');
  const filterForm = tipoSelect?.form;

  const buildUrl = (url, params) => {
    const u = new URL(url, window.location.origin);
    Object.entries(params).forEach(([k, v]) => {
      if (v !== undefined && v !== null && String(v).length) {
        u.searchParams.set(k, v);
      } else {
        u.searchParams.delete(k);
      }
    });
    return u.toString();
  };

  let debounceId;
  const debounce = (fn, ms = 400) => {
    clearTimeout(debounceId);
    debounceId = setTimeout(fn, ms);
  };

  const fetchTable = async (params) => {
    const url = buildUrl(window.location.pathname, { ...params, page: params.page || undefined });
    const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
    const html = await res.text();
    wrapper.innerHTML = html;
    attachPaginationHandlers();
  };

  const currentParams = () => ({
    q: searchInput?.value || '',
    tipo: tipoSelect?.value || '',
    estado: estadoSelect?.value || ''
  });

  const onChange = () => debounce(() => fetchTable(currentParams()));

  searchInput?.addEventListener('input', onChange);
  tipoSelect?.addEventListener('change', onChange);
  estadoSelect?.addEventListener('change', onChange);
  filterForm?.addEventListener('submit', (e) => {
    e.preventDefault();
    fetchTable(currentParams());
  });

  function attachPaginationHandlers() {
    wrapper.querySelectorAll('a[href*="page="]').forEach((a) => {
      a.addEventListener('click', (e) => {
        e.preventDefault();
        const url = new URL(a.href);
        const page = url.searchParams.get('page');
        fetchTable({ ...currentParams(), page });
      });
    });
  }

  // Initial bind for existing pagination links
  attachPaginationHandlers();
})();

// Funciones globales para conversión de usuarios
window.convertirACreador = async function(usuarioId, nombreUsuario) {
    if (!confirm(`¿Estás seguro de convertir a "${nombreUsuario}" en creador de contenido?\n\nEsto le dará acceso al panel de creadores para publicar cursos.`)) {
        return;
    }

    try {
        const response = await fetch(`/usuarios/${usuarioId}/convertir-creador`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        });

        const data = await response.json();

        if (data.success) {
            showNotification('success', data.message);
            // Recargar la tabla
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            showNotification('error', data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('error', 'Error al convertir el usuario. Inténtalo de nuevo.');
    }
};

window.convertirAUsuario = async function(usuarioId, nombreUsuario) {
    if (!confirm(`¿Estás seguro de convertir a "${nombreUsuario}" de vuelta a usuario normal?\n\nEsto revocará su acceso al panel de creadores.`)) {
        return;
    }

    try {
        const response = await fetch(`/usuarios/${usuarioId}/convertir-usuario`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        });

        const data = await response.json();

        if (data.success) {
            showNotification('success', data.message);
            // Recargar la tabla
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            showNotification('error', data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('error', 'Error al convertir el usuario. Inténtalo de nuevo.');
    }
};

window.toggleModoCreador = async function(usuarioId, nombreUsuario, esCreador) {
    const accion = esCreador ? 'desactivar' : 'activar';
    const mensaje = esCreador
        ? `¿Estás seguro de desactivar el modo creador para "${nombreUsuario}"?`
        : `¿Estás seguro de activar el modo creador para "${nombreUsuario}"?`;

    if (!confirm(mensaje)) {
        return;
    }

    try {
        const response = await fetch(`/usuarios/${usuarioId}/toggle-creador`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        });

        const data = await response.json();

        if (data.success) {
            showNotification('success', data.message);
            // Recargar la tabla
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            showNotification('error', data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('error', 'Error al cambiar el modo del usuario. Inténtalo de nuevo.');
    }
};

// Función para mostrar notificaciones
function showNotification(type, message) {
    // Crear elemento de notificación
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-md transition-all duration-300 transform translate-x-full`;

    if (type === 'success') {
        notification.className += ' bg-green-500 text-white';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3 text-xl"></i>
                <div>
                    <div class="font-semibold">Éxito</div>
                    <div class="text-sm">${message}</div>
                </div>
            </div>
        `;
    } else if (type === 'error') {
        notification.className += ' bg-red-500 text-white';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                <div>
                    <div class="font-semibold">Error</div>
                    <div class="text-sm">${message}</div>
                </div>
            </div>
        `;
    }

    document.body.appendChild(notification);

    // Animar entrada
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    // Auto-remover después de 5 segundos
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 5000);
}


