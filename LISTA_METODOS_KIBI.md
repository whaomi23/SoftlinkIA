# Lista de Métodos de Controladores de KIBI

## 📋 Controladores y sus Métodos

---

### 1. **KibiAuthController**
**Ubicación:** `app/Http/Controllers/KibiAuthController.php`

#### Métodos Públicos:
- ✅ `showLoginForm()` - Mostrar formulario de login
- ✅ `login(Request $request)` - Procesar login
- ✅ `showRegisterForm()` - Mostrar formulario de registro
- ✅ `register(Request $request)` - Procesar registro
- ✅ `showForgotPasswordForm()` - Mostrar formulario de recuperación de contraseña
- ✅ `sendResetLink(Request $request)` - Enviar enlace de recuperación
- ✅ `showResetPasswordForm(Request $request, $token)` - Mostrar formulario de restablecimiento
- ✅ `resetPassword(Request $request)` - Procesar restablecimiento de contraseña
- ✅ `showEmailVerificationRequired()` - Mostrar página de verificación requerida
- ✅ `resendVerificationEmail(Request $request)` - Reenviar email de verificación
- ✅ `logout(Request $request)` - Cerrar sesión

**Total: 11 métodos**

---

### 2. **KibiContactController**
**Ubicación:** `app/Http/Controllers/KibiContactController.php`

#### Métodos Públicos:
- ✅ `show()` - Mostrar formulario de contacto
- ✅ `store(Request $request)` - Procesar formulario de contacto
- ✅ `success()` - Mostrar página de éxito

**Total: 3 métodos**

---

### 3. **KibiContactManagementController**
**Ubicación:** `app/Http/Controllers/KibiContactManagementController.php`

#### Métodos Públicos:
- ✅ `index(Request $request)` - Mostrar lista de contactos
- ✅ `show(KibiContact $contacto)` - Mostrar detalles de un contacto
- ✅ `updateStatus(Request $request, KibiContact $contacto)` - Actualizar status de contacto
- ✅ `markAsContacted(Request $request, KibiContact $contacto)` - Marcar como contactado
- ✅ `destroy(KibiContact $contacto)` - Eliminar contacto
- ✅ `export(Request $request)` - Exportar contactos (CSV)

**Total: 6 métodos**

---

### 4. **KibiEmailController**
**Ubicación:** `app/Http/Controllers/KibiEmailController.php`

#### Métodos Públicos:
- ✅ `show(KibiContact $contacto)` - Mostrar formulario de envío de email
- ✅ `send(Request $request, KibiContact $contacto)` - Enviar email al contacto

**Total: 2 métodos**

---

### 5. **KibiWhatsAppController**
**Ubicación:** `app/Http/Controllers/KibiWhatsAppController.php`

#### Métodos Públicos:
- ✅ `show(KibiContact $contacto)` - Mostrar formulario de envío de WhatsApp
- ✅ `send(Request $request, KibiContact $contacto)` - Enviar mensaje de WhatsApp

#### Métodos Privados:
- 🔒 `formatPhoneNumber($phone)` - Formatear número de teléfono
- 🔒 `prepareMessage($message, $contacto, $template)` - Preparar mensaje según plantilla
- 🔒 `getMessageTemplates()` - Obtener plantillas de mensajes
- 🔒 `sendWhatsAppMessage($phoneNumber, $message)` - Enviar mensaje usando WhatsApp Business API

**Total: 2 métodos públicos + 4 métodos privados**

---

### 6. **KibiUserManagementController**
**Ubicación:** `app/Http/Controllers/KibiUserManagementController.php`

#### Métodos Públicos:
- ✅ `index(Request $request)` - Mostrar lista de usuarios para gestión
- ✅ `show(User $usuario)` - Mostrar detalle de usuario
- ✅ `updateRole(Request $request, User $usuario)` - Actualizar rol de usuario
- ✅ `aprobarSolicitudMarketing(Request $request, User $usuario)` - Aprobar solicitud de marketing
- ✅ `rechazarSolicitudMarketing(Request $request, User $usuario)` - Rechazar solicitud de marketing
- ✅ `solicitudesMarketing()` - Obtener solicitudes de marketing pendientes
- ✅ `toggleStatus(User $usuario)` - Activar/Desactivar usuario

**Total: 7 métodos**

---

### 7. **MarketingController** (Usado en KIBI)
**Ubicación:** `app/Http/Controllers/MarketingController.php`

#### Métodos Públicos:
- ✅ `getCategorias()` - Obtener categorías predefinidas
- ✅ `catalogo(Request $request)` - Mostrar catálogo de artículos de KIBI
- ✅ `ver(Articulo $articulo)` - Mostrar un artículo específico
- ✅ `adminIndex(Request $request)` - Mostrar página de administración de artículos
- ✅ `store(Request $request)` - Crear un nuevo artículo
- ✅ `edit(Articulo $articulo)` - Obtener datos de un artículo para edición
- ✅ `update(Request $request, Articulo $articulo)` - Actualizar un artículo
- ✅ `destroy(Articulo $articulo)` - Eliminar un artículo
- ✅ `uploadImage(Request $request)` - Subir imagen desde Summernote
- ✅ `deleteImage(Request $request)` - Eliminar imagen desde Summernote

#### Métodos Privados:
- 🔒 `calcularTiempoLectura($contenido)` - Calcular tiempo de lectura estimado

**Total: 10 métodos públicos + 1 método privado**

---

### 8. **UserController** (Método usado en KIBI)
**Ubicación:** `app/Http/Controllers/UserController.php`

#### Método usado en KIBI:
- ✅ `solicitarRolMarketing(Request $request)` - Solicitar rol de marketing

**Total: 1 método (relacionado con KIBI)**

---

## 📊 Resumen Total

| Controlador | Métodos Públicos | Métodos Privados | Total |
|------------|------------------|------------------|-------|
| KibiAuthController | 11 | 0 | 11 |
| KibiContactController | 3 | 0 | 3 |
| KibiContactManagementController | 6 | 0 | 6 |
| KibiEmailController | 2 | 0 | 2 |
| KibiWhatsAppController | 2 | 4 | 6 |
| KibiUserManagementController | 7 | 0 | 7 |
| MarketingController | 10 | 1 | 11 |
| UserController (método KIBI) | 1 | 0 | 1 |
| **TOTAL** | **42** | **5** | **47** |

---

## 🔗 Rutas Asociadas

### Rutas de Autenticación (KibiAuthController)
- `GET /kibi/login` → `showLoginForm()`
- `POST /kibi/login` → `login()`
- `GET /kibi/register` → `showRegisterForm()`
- `POST /kibi/register` → `register()`
- `GET /kibi/forgot-password` → `showForgotPasswordForm()`
- `POST /kibi/forgot-password` → `sendResetLink()`
- `GET /kibi/reset-password/{token}` → `showResetPasswordForm()`
- `POST /kibi/reset-password` → `resetPassword()`
- `GET /kibi/email/verification-required` → `showEmailVerificationRequired()`
- `POST /kibi/email/resend` → `resendVerificationEmail()`
- `POST /kibi/logout` → `logout()`

### Rutas de Contacto (KibiContactController)
- `GET /kibi/contacto` → `show()`
- `POST /kibi/contacto` → `store()`
- `GET /kibi/contacto/exito` → `success()`

### Rutas de Gestión de Contactos (KibiContactManagementController)
- `GET /kibi/contactos-solicitudes` → `index()`
- `GET /kibi/contactos-solicitudes/{contacto}` → `show()`
- `POST /kibi/contactos-solicitudes/{contacto}/status` → `updateStatus()`
- `POST /kibi/contactos-solicitudes/{contacto}/contacted` → `markAsContacted()`
- `DELETE /kibi/contactos-solicitudes/{contacto}` → `destroy()`
- `GET /kibi/contactos-solicitudes/export/csv` → `export()`

### Rutas de Email (KibiEmailController)
- `GET /kibi/contactos-solicitudes/{contacto}/email` → `show()`
- `POST /kibi/contactos-solicitudes/{contacto}/email` → `send()`

### Rutas de WhatsApp (KibiWhatsAppController)
- `GET /kibi/contactos-solicitudes/{contacto}/whatsapp` → `show()`
- `POST /kibi/contactos-solicitudes/{contacto}/whatsapp` → `send()`

### Rutas de Gestión de Usuarios (KibiUserManagementController)
- `GET /kibi/usuarios` → `index()`
- `GET /kibi/usuarios/{usuario}` → `show()`
- `POST /kibi/usuarios/{usuario}/actualizar-rol` → `updateRole()`
- `POST /kibi/usuarios/{usuario}/toggle-estado` → `toggleStatus()`
- `GET /kibi/solicitudes-marketing` → `solicitudesMarketing()`
- `POST /kibi/solicitudes-marketing/{usuario}/aprobar` → `aprobarSolicitudMarketing()`
- `POST /kibi/solicitudes-marketing/{usuario}/rechazar` → `rechazarSolicitudMarketing()`

### Rutas de Artículos (MarketingController)
- `GET /kibi/articulos` → `catalogo()`
- `GET /kibi/articulos/{articulo:slug}` → `ver()`
- `GET /kibi/articulos-admin` → `adminIndex()`
- `POST /kibi/articulos` → `store()`
- `GET /kibi/articulos/{articulo}/edit` → `edit()`
- `PUT /kibi/articulos/{articulo}` → `update()`
- `DELETE /kibi/articulos/{articulo}` → `destroy()`
- `POST /kibi/articulos/upload-image` → `uploadImage()`
- `POST /kibi/articulos/delete-image` → `deleteImage()`

### Rutas Adicionales (UserController)
- `POST /kibi/solicitar-marketing` → `solicitarRolMarketing()`

---

## 📝 Notas Importantes

1. **Métodos Privados**: Los métodos privados (🔒) no se exponen directamente en rutas, pero son utilizados por los métodos públicos.

2. **Middleware**: La mayoría de las rutas protegidas requieren:
   - `auth:kibi` - Autenticación con guardia KIBI
   - `email.verified` - Verificación de email
   - `role:marketing` - Rol de marketing

3. **Validaciones**: Todos los métodos `store()` y `update()` incluyen validaciones de datos.

4. **Logs**: Los controladores de gestión incluyen logs para auditoría.

5. **AJAX Support**: Varios métodos soportan peticiones AJAX y devuelven JSON.

---

## 🎯 Para Replicar en Otro Proyecto

Si necesitas replicar estos métodos en otro proyecto, asegúrate de:

1. ✅ Crear los modelos correspondientes (`KibiContact`, `User`, `Articulo`, etc.)
2. ✅ Configurar el guardia `kibi` en `config/auth.php`
3. ✅ Crear los middlewares necesarios (`kibi.session`, `email.verified`, `role:marketing`)
4. ✅ Configurar las vistas correspondientes
5. ✅ Configurar las variables de entorno necesarias (WhatsApp API, Mail, etc.)
6. ✅ Crear las migraciones de base de datos (ver sección siguiente)
7. ✅ Implementar los métodos helper en los modelos (ej: `isMarketing()`, `nombreCompleto`, etc.)

---

## 📦 MIGRACIONES NECESARIAS PARA KIBI

A continuación se listan todas las migraciones necesarias para que KIBI funcione correctamente. **Ejecutar en el orden indicado.**

### 1. **Tipos de Usuarios** (Base)
**Archivo:** `2025_09_04_000001_create_tipos_usuarios_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_usuarios');
    }
};
```

**Nota:** Asegúrate de tener tipos de usuario: `empleado`, `marketing`, `administrador`, `creador`, `estudiante`

---

### 2. **Tabla Users** (Base)
**Archivo:** `2025_09_04_000002_create_users_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('apellido_paterno', 100);
            $table->string('apellido_materno', 100);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->foreignId('tipo_usuario_id')->constrained('tipos_usuarios')->onDelete('cascade');
            $table->boolean('verificado')->default(false);
            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
    }
};
```

---

### 3. **Email Verifications** (Para verificación de email)
**Archivo:** `2025_09_28_232041_create_email_verifications_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('email');
            $table->string('token');
            $table->timestamp('expires_at');
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();

            $table->index(['email', 'token']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_verifications');
    }
};
```

---

### 4. **Campos de Solicitud de Creador** (Opcional, pero recomendado)
**Archivo:** `2025_09_25_040322_add_creator_request_fields_to_users_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('solicitud_creador', ['pendiente', 'aprobada', 'rechazada'])->nullable()->after('status');
            $table->text('motivo_solicitud')->nullable()->after('solicitud_creador');
            $table->text('experiencia_solicitud')->nullable()->after('motivo_solicitud');
            $table->text('comentario_aprobacion')->nullable()->after('experiencia_solicitud');
            $table->timestamp('fecha_aprobacion')->nullable()->after('comentario_aprobacion');
            $table->unsignedBigInteger('aprobado_por')->nullable()->after('fecha_aprobacion');
            $table->text('motivo_rechazo')->nullable()->after('aprobado_por');
            $table->timestamp('fecha_rechazo')->nullable()->after('motivo_rechazo');
            $table->unsignedBigInteger('rechazado_por')->nullable()->after('fecha_rechazo');

            $table->foreign('aprobado_por')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rechazado_por')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['aprobado_por']);
            $table->dropForeign(['rechazado_por']);
            $table->dropColumn([
                'solicitud_creador',
                'motivo_solicitud',
                'experiencia_solicitud',
                'comentario_aprobacion',
                'fecha_aprobacion',
                'aprobado_por',
                'motivo_rechazo',
                'fecha_rechazo',
                'rechazado_por'
            ]);
        });
    }
};
```

---

### 5. **Campos de Solicitud de Marketing** (OBLIGATORIO para KIBI)
**Archivo:** `2025_11_02_211913_add_marketing_request_fields_to_users_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Campos para solicitudes de marketing
            $table->enum('solicitud_marketing', ['pendiente', 'aprobada', 'rechazada'])->nullable()->after('rechazado_por');
            $table->text('motivo_solicitud_marketing')->nullable()->after('solicitud_marketing');
            $table->text('experiencia_solicitud_marketing')->nullable()->after('motivo_solicitud_marketing');

            // Campos para aprobación/rechazo de marketing
            $table->text('comentario_aprobacion_marketing')->nullable()->after('experiencia_solicitud_marketing');
            $table->timestamp('fecha_aprobacion_marketing')->nullable()->after('comentario_aprobacion_marketing');
            $table->unsignedBigInteger('aprobado_por_marketing')->nullable()->after('fecha_aprobacion_marketing');
            $table->text('motivo_rechazo_marketing')->nullable()->after('aprobado_por_marketing');
            $table->timestamp('fecha_rechazo_marketing')->nullable()->after('motivo_rechazo_marketing');
            $table->unsignedBigInteger('rechazado_por_marketing')->nullable()->after('fecha_rechazo_marketing');

            // Foreign keys
            $table->foreign('aprobado_por_marketing')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rechazado_por_marketing')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar foreign keys primero
            $table->dropForeign(['aprobado_por_marketing']);
            $table->dropForeign(['rechazado_por_marketing']);

            // Eliminar columnas
            $table->dropColumn([
                'solicitud_marketing',
                'motivo_solicitud_marketing',
                'experiencia_solicitud_marketing',
                'comentario_aprobacion_marketing',
                'fecha_aprobacion_marketing',
                'aprobado_por_marketing',
                'motivo_rechazo_marketing',
                'fecha_rechazo_marketing',
                'rechazado_por_marketing'
            ]);
        });
    }
};
```

---

### 6. **Tabla Kibi Contacts** (OBLIGATORIO para KIBI)
**Archivo:** `2025_10_08_210626_create_kibi_contacts_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kibi_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('celular');
            $table->string('email');
            $table->string('institucion');
            $table->string('puesto');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('sitio_web')->nullable();
            $table->boolean('whatsapp')->default(false);
            $table->boolean('email_contact')->default(false);
            $table->enum('status', ['nuevo', 'contactado', 'interesado', 'no_interesado', 'convertido'])->default('nuevo');
            $table->text('notas')->nullable();
            $table->timestamp('contactado_at')->nullable();
            $table->timestamps();

            // Índices para optimizar consultas
            $table->index(['status', 'created_at']);
            $table->index('email');
            $table->index('institucion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kibi_contacts');
    }
};
```

---

### 7. **Tabla Artículos** (Para MarketingController)
**Archivo:** `2025_09_04_173401_create_articulos_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('subtitulo', 255)->nullable();
            $table->enum('nivel_dificultad', [
                'Básico / Introductorio',
                'Fácil',
                'Intermedio bajo',
                'Intermedio',
                'Intermedio alto',
                'Avanzado',
                'Experto',
                'Investigación / Académico',
                'Crítico / Analítico',
                'Práctico / Aplicado'
            ])->default('Básico / Introductorio');
            $table->text('contenido')->nullable();
            $table->string('url_imagen', 255)->nullable();
            $table->string('url_imagen_banner', 255)->nullable();
            $table->string('slug', 255)->unique();
            $table->enum('status', ['publicado','borrador','archivado'])->default('borrador');
            $table->foreignId('autor_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
```

---

### 8. **Agregar Categoría a Artículos**
**Archivo:** `2025_09_09_000001_add_categoria_to_articulos_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articulos', function (Blueprint $table) {
            $table->text('categoria')->nullable()->after('subtitulo');
        });
    }

    public function down(): void
    {
        Schema::table('articulos', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }
};
```

---

### 9. **Sessions Table** (Para autenticación)
**Archivo:** `2025_09_11_233911_create_sessions_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
```

---

## 📋 Orden de Ejecución de Migraciones

Ejecutar las migraciones en este orden:

```bash
php artisan migrate --path=database/migrations/2025_09_04_000001_create_tipos_usuarios_table.php
php artisan migrate --path=database/migrations/2025_09_04_000002_create_users_table.php
php artisan migrate --path=database/migrations/2025_09_11_233911_create_sessions_table.php
php artisan migrate --path=database/migrations/2025_09_28_232041_create_email_verifications_table.php
php artisan migrate --path=database/migrations/2025_09_25_040322_add_creator_request_fields_to_users_table.php
php artisan migrate --path=database/migrations/2025_11_02_211913_add_marketing_request_fields_to_users_table.php
php artisan migrate --path=database/migrations/2025_10_08_210626_create_kibi_contacts_table.php
php artisan migrate --path=database/migrations/2025_09_04_173401_create_articulos_table.php
php artisan migrate --path=database/migrations/2025_09_09_000001_add_categoria_to_articulos_table.php
```

O ejecutar todas de una vez (si están en la carpeta migrations):

```bash
php artisan migrate
```

---

## ⚙️ Configuración Adicional Requerida

### 1. **Configuración de Auth Guard** (`config/auth.php`)

Asegúrate de tener el guardia `kibi` configurado:

```php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
    'kibi' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
],
```

### 2. **Variables de Entorno** (`.env`)

```env
# WhatsApp Business API (opcional)
WHATSAPP_ACCESS_TOKEN=
WHATSAPP_PHONE_NUMBER_ID=
WHATSAPP_API_VERSION=v18.0

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@kibi.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 3. **Seeders Recomendados**

Crear seeders para:
- Tipos de usuarios (empleado, marketing, administrador, creador, estudiante)
- Usuario administrador inicial
- Usuario de marketing inicial (opcional)

---

## ✅ Checklist de Instalación

- [ ] Migración de `tipos_usuarios` ejecutada
- [ ] Migración de `users` ejecutada
- [ ] Migración de `email_verifications` ejecutada
- [ ] Migración de campos de solicitud de creador (opcional)
- [ ] Migración de campos de solicitud de marketing ejecutada
- [ ] Migración de `kibi_contacts` ejecutada
- [ ] Migración de `articulos` ejecutada
- [ ] Migración de categoría en artículos ejecutada
- [ ] Migración de `sessions` ejecutada
- [ ] Guardia `kibi` configurado en `config/auth.php`
- [ ] Variables de entorno configuradas
- [ ] Seeders ejecutados (tipos de usuario)
- [ ] Modelos creados (`KibiContact`, `User`, `Articulo`, etc.)
- [ ] Middlewares creados (`kibi.session`, `email.verified`, `role:marketing`)

