# Funcionalidades CRUD de Artículos en KIBI

## Descripción
Se ha implementado un sistema completo de gestión de artículos en KIBI con funcionalidades de crear, editar y eliminar artículos usando modales, similar a la implementación de casos de éxito.

## Archivos Creados/Modificados

### 1. Controlador (`app/Http/Controllers/MarketingController.php`)
- **Métodos agregados:**
  - `adminIndex()` - Muestra la página de administración de artículos
  - `store()` - Crea un nuevo artículo
  - `edit()` - Obtiene datos de un artículo para edición
  - `update()` - Actualiza un artículo existente
  - `destroy()` - Elimina un artículo

### 2. Vistas
- **`resources/views/KIBI/admin/articulos/index.blade.php`** - Página principal de administración
- **`resources/views/KIBI/admin/articulos/components/admin/admin-articulos-grid.blade.php`** - Grid con botones de acción
- **`resources/views/KIBI/admin/articulos/components/modals/articulos-create.blade.php`** - Modal para crear artículos
- **`resources/views/KIBI/admin/articulos/components/modals/articulos-edit.blade.php`** - Modal para editar artículos
- **`resources/views/KIBI/admin/articulos/components/modals/articulos-delete.blade.php`** - Modal para eliminar artículos

### 3. JavaScript (`public/js/articulos/kibi-articulos-admin.js`)
- Manejo completo de modales
- Funciones para crear, editar y eliminar artículos
- Preview de imágenes
- Validaciones del lado del cliente
- Alertas y notificaciones

### 4. Summernote (`public/js/articulos/summernote-articulos-config.js`)
- Editor de texto enriquecido completo
- Soporte para imágenes, listas, tablas y enlaces
- Subida automática de imágenes al servidor
- Eliminación automática de imágenes no utilizadas
- Configuración específica para artículos de KIBI

### 5. Rutas (`routes/web.php`)
```php
// Rutas de administración de artículos de KIBI
Route::get('articulos-admin', [MarketingController::class, 'adminIndex'])->name('articulos.admin');
Route::post('articulos', [MarketingController::class, 'store'])->name('articulos.store');
Route::get('articulos/{articulo}/edit', [MarketingController::class, 'edit'])->name('articulos.edit');
Route::put('articulos/{articulo}', [MarketingController::class, 'update'])->name('articulos.update');
Route::delete('articulos/{articulo}', [MarketingController::class, 'destroy'])->name('articulos.destroy');
Route::post('articulos/upload-image', [MarketingController::class, 'uploadImage'])->name('articulos.uploadImage');
Route::post('articulos/delete-image', [MarketingController::class, 'deleteImage'])->name('articulos.deleteImage');
```

## Características Implementadas

### ✅ Crear Artículo
- Modal con formulario completo
- **Editor Summernote** con texto enriquecido
- Campos: título, subtítulo, categorías, nivel de dificultad, estado, contenido, imagen
- Validación de categorías (mínimo 1)
- Preview de imagen
- Subida de archivos
- **Subida automática de imágenes** desde Summernote

### ✅ Editar Artículo
- Modal que carga datos existentes
- **Editor Summernote** con contenido pre-cargado
- Pre-selección de categorías
- Preview de imagen actual
- Validaciones completas
- Actualización de imagen opcional
- **Gestión automática de imágenes** en Summernote

### ✅ Eliminar Artículo
- Modal de confirmación
- Eliminación de imagen asociada
- Confirmación con nombre del artículo

### ✅ Seguridad
- Middleware de autenticación
- Verificación de autoría (solo el autor puede editar/eliminar)
- Validación CSRF
- Sanitización de datos

### ✅ UX/UI
- Diseño consistente con casos de éxito
- Animaciones suaves
- Alertas de éxito/error
- Loading states
- Responsive design

## Uso

### Acceder a la Administración
```
GET /kibi/articulos-admin
```

### Crear Artículo
1. Hacer clic en "Nuevo Artículo"
2. Llenar el formulario en el modal
3. Seleccionar al menos una categoría
4. Subir imagen (opcional)
5. Hacer clic en "Crear Artículo"

### Editar Artículo
1. Hacer clic en el ícono de editar en cualquier artículo
2. Modificar los campos necesarios
3. Hacer clic en "Actualizar Artículo"

### Eliminar Artículo
1. Hacer clic en el ícono de eliminar en cualquier artículo
2. Confirmar la eliminación en el modal
3. Hacer clic en "Eliminar Artículo"

## Permisos
- Solo usuarios autenticados pueden acceder
- Solo el autor del artículo puede editarlo o eliminarlo
- Las rutas públicas (`catalogo` y `ver`) no requieren autenticación

## Notas Técnicas
- Los artículos se almacenan con `autor_id` del usuario autenticado
- Las imágenes se guardan en `storage/app/public/articulos/`
- Las categorías se almacenan como string separado por comas
- Soporte completo para AJAX con respuestas JSON
- Fallback a redirecciones tradicionales si no es AJAX
- **Summernote integrado** con subida automática de imágenes
- **Gestión inteligente de imágenes** con eliminación automática
- **Editor de texto enriquecido** con soporte completo para HTML
