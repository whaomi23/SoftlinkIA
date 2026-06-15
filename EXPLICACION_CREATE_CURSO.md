# 📚 Cómo Funciona el Formulario de Creación de Cursos

## 🎯 Visión General

El archivo `create.blade.php` es un formulario complejo que permite a los creadores construir cursos con estructura jerárquica: **Curso → Niveles → Subniveles**.

---

## 📋 Estructura del Formulario

### 1. **Información Básica del Curso**
```php
- Título del Curso
- Categoría (select)
- Duración (horas)
- Precio (USD)
- Nivel de Dificultad (principiante/intermedio/avanzado)
- Cupo Máximo
- Fechas (inicio/fin)
- Slug (URL amigable - se genera automáticamente)
```

### 2. **Descripción y Contenido**
```php
- Descripción del Curso
- Objetivos de Aprendizaje
- Requisitos Previos
```

### 3. **Multimedia**
```php
- Imagen del Curso (upload)
- Video de Presentación (URL)
```

### 4. **Información del Creador**
```php
- Nombre y Apellido
- Profesión
- Descripción del Creador
```

### 5. **Redes Sociales** (opcionales)
```php
- Facebook, Twitter, LinkedIn, Instagram, VK, TikTok
- Cada una tiene checkbox para habilitar + campo de usuario
```

### 6. **Niveles y Subniveles** (La parte más compleja)
```php
Curso
  └── Nivel 1
      ├── Subnivel 1.1
      ├── Subnivel 1.2
      └── Subnivel 1.3
  └── Nivel 2
      ├── Subnivel 2.1
      └── Subnivel 2.2
```

---

## 🔄 Flujo de Funcionamiento

### **Paso 1: Usuario Completa el Formulario**

1. **Información básica**: Título, categoría, precio, etc.
2. **Agrega niveles**: Click en "Agregar Nivel" → Se crea dinámicamente un nivel
3. **Agrega subniveles**: Dentro de cada nivel, click en "Agregar Subnivel"

### **Paso 2: Estructura Dinámica de Niveles**

```javascript
// Cuando click en "Agregar Nivel"
function addNivel() {
    nivelCounter++; // Incrementa contador
    // Inserta HTML del nivel con:
    // - Título y descripción del nivel
    // - Contenedor para subniveles
    // - Botón para agregar subniveles
}
```

**Cada nivel tiene:**
- Título y descripción
- Contenedor de subniveles (`subniveles_${nivelCounter}`)
- Botón para eliminar el nivel completo

### **Paso 3: Estructura Dinámica de Subniveles**

```javascript
// Cuando click en "Agregar Subnivel"
function addSubnivel(nivelIndex) {
    // Verifica máximo 10 subniveles
    // Crea HTML del subnivel con:
    // - Título y descripción
    // - Opciones de contenido multimedia
    // - Campos para recursos
}
```

**Cada subnivel puede tener:**

#### **A) Numeración Personalizada**
- Checkbox para activar numeración personalizada
- Campo numérico para definir el número (ej: 1, 5, 10)
- Si no está activado, usa numeración automática (1, 2, 3...)

#### **B) Tipo de Contenido Multimedia** (3 opciones, solo una activa):

**1. Iframe (HTML embebido)**
```html
<iframe src='https://www.youtube.com/embed/VIDEO_ID' ...></iframe>
```

**2. URL de Video** (YouTube, Vimeo, etc.)
```javascript
// El sistema convierte URLs automáticamente:
// youtube.com/watch?v=XXX → youtube.com/embed/XXX
// vimeo.com/12345 → player.vimeo.com/video/12345
```

**3. Archivo de Video** (subida por chunk upload)
- Usa **Resumable.js** para archivos grandes (hasta 10GB)
- Carga por fragmentos de 10MB
- Muestra barra de progreso

#### **C) Recursos/Archivos** (múltiples archivos)
```javascript
// Permite hasta 10 archivos por subnivel
// Formatos: PDF, DOC, PPT, XLS, ZIP, TXT, JPG, MP4, MP3, etc.
// Máximo 50MB por archivo
```

---

## 🎬 Sistema de Chunk Upload (Videos Grandes)

### **¿Por qué existe?**
- PHP/Laravel tiene límites de tamaño de archivo
- Videos grandes (1GB+) causan timeouts
- **Resumable.js** divide el archivo en fragmentos pequeños

### **Cómo funciona:**

```javascript
1. Usuario selecciona video (hasta 10GB)
2. Resumable.js divide en chunks de 10MB
3. Cada chunk se sube por separado a: /creador/chunk-upload
4. El servidor reensambla los chunks
5. Guarda el video en storage
6. Retorna path del video completo
```

### **Flujo Completo:**

```javascript
initChunkUpload(nivel, subnivel, cursoId)
    ↓
Usuario selecciona archivo
    ↓
showFileInfo(file) // Muestra nombre y tamaño
    ↓
Usuario click en "Confirmar y Subir"
    ↓
startChunkUpload()
    ↓
Resumable.js configura:
- target: '/creador/chunk-upload'
- chunkSize: 10MB
- query: { nivel_numero, subnivel_numero, curso_id }
    ↓
Eventos Resumable:
- fileProgress → updateProgress(percentage)
- fileSuccess → handleUploadSuccess(data)
- fileError → handleUploadError(error)
    ↓
Actualiza campos ocultos:
- video_archivo_path
- video_archivo_nombre
- video_archivo_tipo
- video_archivo_tamaño
```

---

## 📤 Envío del Formulario

### **Estructura de Datos Enviada:**

```php
[
    'titulo' => 'Curso de Laravel',
    'categoria_id' => 1,
    'precio' => 99.99,
    'niveles' => [
        1 => [ // nivelIndex
            'numero' => 1,
            'titulo' => 'Fundamentos',
            'descripcion' => '...',
            'subniveles' => [
                1 => [ // subIndex
                    'numero' => 1,
                    'titulo' => 'Introducción',
                    'descripcion' => '...',
                    'usar_iframe' => 1,
                    'url_iframe' => '<iframe>...</iframe>',
                    // O
                    'usar_url_video' => 1,
                    'url_video' => 'https://youtube.com/...',
                    // O
                    'usar_video_archivo' => 1,
                    'video_archivo_path' => 'creadores/1/videos/video.mp4',
                    'video_archivo_nombre' => 'video.mp4',
                    'recursos' => [
                        0 => File('documento.pdf'),
                        1 => File('imagen.jpg'),
                    ]
                ],
                2 => [...]
            ]
        ],
        2 => [...]
    ]
]
```

---

## 🔧 Procesamiento en el Backend

### **Ruta:** `POST /creador/cursos` → `CreadorController@store`

### **Paso a Paso:**

```php
1. VALIDACIÓN
   - Valida todos los campos del formulario
   - Valida estructura de niveles y subniveles
   - Valida archivos (imágenes, videos, recursos)

2. PROCESAMIENTO DE IMAGEN
   - Si hay imagen, valida y guarda en:
     storage/app/public/creadores/{creador_id}/{categoria}/{curso}/

3. GENERACIÓN DE SLUG
   - Si no hay slug, genera desde título
   - Verifica unicidad (si existe, agrega -1, -2, etc.)

4. CREACIÓN DEL CURSO
   $curso = Curso::create($validated);

5. PROCESAMIENTO DE NIVELES
   foreach ($request->niveles as $nivelIndex => $nivelData) {
       $nivel = Nivel::create([
           'curso_id' => $curso->id,
           'numero' => $nivelData['numero'],
           'titulo' => $nivelData['titulo'],
           'descripcion' => $nivelData['descripcion'],
       ]);

6. PROCESAMIENTO DE SUBNIVELES
       foreach ($nivelData['subniveles'] as $subIndex => $subnivelData) {
           // Verifica si tiene video por chunk upload
           if ($chunkVideoPath) {
               // Ya está subido, solo guarda path
               $subInfo['video_archivo_path'] = $chunkVideoPath;
           } else if ($videoFile) {
               // Sube archivo normal
               $videoPath = $videoFile->store(...);
               $subInfo['video_archivo_path'] = $videoPath;
           }
           
           // Procesa recursos múltiples
           if ($request->hasFile("niveles.$nivelIndex.subniveles.$subIndex.recursos")) {
               $recursos = [];
               foreach ($files as $file) {
                   $path = $file->store(...);
                   $recursos[] = [
                       'nombre' => $file->getClientOriginalName(),
                       'path' => $path,
                       'tipo' => $file->getMimeType(),
                   ];
               }
               // Guarda como JSON en la BD
               $subInfo['recurso_nombre'] = json_encode($nombres);
               $subInfo['recurso_path'] = json_encode($paths);
           }
           
           Subnivel::create($subInfo);
       }
   }
```

---

## 🎨 Funciones JavaScript Clave

### **1. Gestión de Niveles**
```javascript
addNivel()           // Agrega nuevo nivel
removeNivel(index)   // Elimina nivel completo
```

### **2. Gestión de Subniveles**
```javascript
addSubnivel(nivelIndex)        // Agrega subnivel a un nivel
removeSubnivel(nivelIndex, btn) // Elimina subnivel
renumberSubniveles(nivelIndex) // Renumera después de eliminar
```

### **3. Numeración Personalizada**
```javascript
toggleCustomNumbering(checkbox)    // Activa/desactiva numeración personalizada
updateSubnivelVisualNumber(input)  // Actualiza número visual
```

### **4. Multimedia**
```javascript
toggleIframeField(nivel, subnivel, checkbox)    // Muestra/oculta campo iframe
toggleUrlVideoField(nivel, subnivel, checkbox)  // Muestra/oculta campo URL
toggleVideoFileField(nivel, subnivel, checkbox) // Muestra/oculta campo archivo
```

### **5. Chunk Upload**
```javascript
initChunkUpload(nivel, subnivel, cursoId) // Inicializa selección de archivo
startChunkUpload()                          // Inicia carga por fragmentos
updateProgress(percentage)                  // Actualiza barra de progreso
handleUploadSuccess(data)                   // Maneja éxito de carga
cancelChunkUpload()                         // Cancela carga
```

### **6. Recursos Múltiples**
```javascript
selectMultipleFiles(nivel, subnivel)     // Abre selector de archivos
handleFileSelection(input)               // Maneja selección múltiple
removeSelectedFile(button, index)        // Elimina archivo de selección
renderFilesFromStore(container, files)   // Muestra preview de archivos
```

### **7. Redes Sociales**
```javascript
toggleRedSocialField(redSocial, checkbox) // Muestra/oculta campo de red social
```

---

## 💾 Almacenamiento de Archivos

### **Estructura de Carpetas:**
```
storage/app/public/
└── creadores/
    └── {creador_id}/
        └── {categoria_slug}/
            └── {curso_slug}/
                ├── imagen_curso.jpg
                └── niveles/
                    └── nivel_{numero}/
                        └── subnivel_{numero}/
                            ├── videos/
                            │   └── video.mp4
                            └── recursos/
                                ├── documento.pdf
                                ├── imagen.jpg
                                └── ...
```

---

## 🔒 Validaciones

### **Frontend (JavaScript):**
- Máximo 10 subniveles por nivel
- Mínimo 1 subnivel por nivel
- Tamaño máximo de video: 10GB
- Tamaño máximo por recurso: 50MB
- Máximo 10 recursos por subnivel

### **Backend (Laravel):**
- Validación de campos requeridos
- Validación de tipos de archivo
- Validación de tamaños
- Verificación de seguridad de archivos (FileMagicValidator)
- Validación de estructura de niveles/subniveles

---

## 🎯 Características Especiales

### **1. Auto-generación de Slug**
```javascript
// Se genera automáticamente desde el título
// Si el usuario lo edita manualmente, se respeta su valor
titulo: "Curso de Laravel Avanzado"
    ↓
slug: "curso-de-laravel-avanzado"
```

### **2. Gestión de Archivos Múltiples**
```javascript
// Usa DataTransfer API para mantener selección de archivos
const dt = new DataTransfer();
dt.items.add(file1);
dt.items.add(file2);
input.files = dt.files; // Actualiza el input real
```

### **3. Preview de Imagen**
```javascript
// Cuando selecciona imagen, muestra preview antes de enviar
previewImage(input) → muestra imagen en el DOM
```

### **4. Renumeración Automática**
```javascript
// Si eliminas subnivel 2 de [1,2,3,4]
// Se renumeran a [1,2,3]
renumberSubniveles(nivelIndex)
```

---

## 📝 Notas Importantes

1. **Un solo tipo de multimedia activo por subnivel**: Iframe, URL o Archivo
2. **Chunk upload solo funciona ANTES de crear el curso**: Los videos se suben primero
3. **Los recursos se guardan como JSON** en la BD (arrays de nombres y paths)
4. **El formulario es totalmente dinámico**: Puedes agregar/eliminar niveles y subniveles sin límite
5. **Validación en tiempo real**: El JavaScript valida antes de enviar

---

## 🚀 Flujo Completo Resumido

```
1. Usuario llena formulario básico
   ↓
2. Agrega niveles dinámicamente
   ↓
3. Agrega subniveles a cada nivel
   ↓
4. Para cada subnivel:
   - Selecciona tipo de multimedia
   - Si es archivo: sube por chunk upload
   - Selecciona recursos (opcional)
   ↓
5. Click en "Crear Curso"
   ↓
6. Backend procesa:
   - Crea curso
   - Crea niveles
   - Crea subniveles
   - Guarda archivos
   ↓
7. Redirige a lista de cursos
```

---

¿Te ayuda esto a entender cómo funciona? ¿Quieres que profundice en alguna parte específica?

