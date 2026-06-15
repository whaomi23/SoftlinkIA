<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\FuncionUsuarioController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CasoExitoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\RedSocialController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreadorController;
use App\Http\Controllers\CreadorArticuloController;
use App\Http\Controllers\ChunkUploadController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\KibiAuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\KibiContactController;
use App\Http\Controllers\KibiContactManagementController;
use App\Http\Controllers\KibiEmailController;
use App\Http\Controllers\KibiWhatsAppController;
use App\Http\Controllers\KibiUserManagementController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación
|--------------------------------------------------------------------------
*/
// Login con rate limiting
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])
    ->middleware('throttle:5,1'); // 5 intentos por minuto
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/logout', [UserController::class, 'logout'])->name('logout.get');

// Registro con rate limiting
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])
    ->middleware('throttle:3,1'); // 3 registros por minuto

// Recuperación de contraseña
Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [UserController::class, 'sendResetLink'])
    ->middleware('throttle:3,1')->name('password.email');
Route::get('/reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [UserController::class, 'resetPassword'])
    ->middleware('throttle:3,1')->name('password.update');

// Verificación de email
Route::get('/email/verify/{token}', [UserController::class, 'verifyEmail'])->name('email.verify');
Route::post('/email/resend', [UserController::class, 'resendVerificationEmail'])
    ->middleware('throttle:3,1')->name('email.resend');
Route::get('/email/verification-required', function () {
    return view('pages.auth.email-verification-required');
})->name('email.verification.required');

// Google OAuth
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth', 'remember.me', 'role:administrador']);

// Búsqueda unificada del dashboard (JSON)
Route::get('/dashboard/search', [DashboardController::class, 'search'])
    ->name('dashboard.search')
    ->middleware(['auth', 'remember.me', 'role:administrador']);

/*
|--------------------------------------------------------------------------
| Rutas protegidas por autenticación
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'email.verified'])->group(function () {
    // --- Rutas de Perfil ---
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/profile/solicitar-creador', [ProfileController::class, 'solicitarCreador'])->name('profile.solicitar-creador');
    Route::resource('usuarios', UserController::class);

    // Rutas específicas para conversión de usuarios a creadores
    Route::post('usuarios/{usuario}/convertir-creador', [UserController::class, 'convertirACreador'])->name('usuarios.convertir-creador');
    Route::post('usuarios/{usuario}/convertir-usuario', [UserController::class, 'convertirAUsuario'])->name('usuarios.convertir-usuario');
    Route::post('usuarios/{usuario}/toggle-creador', [UserController::class, 'toggleModoCreador'])->name('usuarios.toggle-creador');
    Route::get('usuarios/estadisticas', [UserController::class, 'estadisticas'])->name('usuarios.estadisticas');

    Route::resource('tipos_usuarios', TipoUsuarioController::class);
    Route::resource('funciones_usuario', FuncionUsuarioController::class);
    Route::resource('redes_sociales', RedSocialController::class);
    Route::resource('certificados', CertificadoController::class);

    // Rutas adicionales para certificados
    Route::post('certificados/generar', [CertificadoController::class, 'generar'])->name('certificados.generar');
    Route::get('certificados/{certificado}/descargar', [CertificadoController::class, 'descargar'])->name('certificados.descargar');
    Route::get('certificados/verificar/{codigo}', [CertificadoController::class, 'verificar'])->name('certificados.verificar');
    Route::post('certificados/regenerar-qr/{codigo}', [CertificadoController::class, 'regenerarQR'])->name('certificados.regenerar-qr');
    Route::get('certificados/descargar-qr/{codigo}', [CertificadoController::class, 'descargarQR'])->name('certificados.descargar-qr');
    Route::get('certificados/diagnostico-gd', function() {
        $gdLoaded = extension_loaded('gd');
        $gdInfo = $gdLoaded ? gd_info() : null;
        $phpIniScanned = function_exists('php_ini_scanned_file') ? php_ini_scanned_file() : 'N/A';

        return response()->json([
            'gd_loaded' => $gdLoaded,
            'gd_info' => $gdInfo,
            'php_version' => PHP_VERSION,
            'sapi' => php_sapi_name(),
            'php_ini_loaded' => php_ini_loaded_file(),
            'php_ini_scanned' => $phpIniScanned,
            'memory_limit' => ini_get('memory_limit'),
            'extension_dir' => ini_get('extension_dir'),
            'loaded_extensions' => get_loaded_extensions(),
            'instrucciones' => [
                '1' => 'Si GD no está cargada, edita el archivo php.ini que se muestra arriba',
                '2' => 'Busca la línea que dice: ;extension=gd o extension=gd',
                '3' => 'Si tiene ; al inicio, quítalo para descomentar: extension=gd',
                '4' => 'Guarda el archivo y reinicia tu servidor web (Apache/Nginx)',
                '5' => 'Si usas PHP-FPM, también reinicia PHP-FPM',
            ]
        ], 200, [], JSON_PRETTY_PRINT);
    })->name('certificados.diagnostico-gd');
    Route::get('certificados/test-qr', function() {
        try {
            $testUrl = 'https://example.com/test';

            $qrCode = new \Endroid\QrCode\QrCode(
                data: $testUrl,
                encoding: new \Endroid\QrCode\Encoding\Encoding('UTF-8'),
                errorCorrectionLevel: \Endroid\QrCode\ErrorCorrectionLevel::High,
                size: 300,
                margin: 10,
                roundBlockSizeMode: \Endroid\QrCode\RoundBlockSizeMode::Margin,
                foregroundColor: new \Endroid\QrCode\Color\Color(0, 0, 0),
                backgroundColor: new \Endroid\QrCode\Color\Color(255, 255, 255)
            );

            $writer = new \Endroid\QrCode\Writer\PngWriter();
            $result = $writer->write($qrCode);
            $qrString = $result->getString();

            return response($qrString)
                ->header('Content-Type', 'image/png')
                ->header('Content-Disposition', 'inline; filename="test-qr.png"');
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'gd_loaded' => extension_loaded('gd'),
                'gd_info' => extension_loaded('gd') ? gd_info() : null
            ], 500);
        }
    })->name('certificados.test-qr');
    Route::get('certificados/{curso}/verificar-elegibilidad', [CertificadoController::class, 'verificarElegibilidad'])->name('certificados.verificar-elegibilidad');

    // --- Rutas de Cursos (Administración) ---
    Route::prefix('admin')
        ->as('admin.')
        ->middleware(['role:administrador'])
        ->group(function () {
            // Rutas de Cursos (Administración)
            Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');
            Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');
            Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
            Route::get('cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');
            Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
            Route::put('cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
            Route::delete('cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
            Route::post('cursos/{curso}/inscribir', [CursoController::class, 'inscribir'])->name('cursos.inscribir');
            Route::get('cursos/search', [CursoController::class, 'search'])->name('cursos.search');
            Route::post('cursos/bulk', [CursoController::class, 'bulk'])->name('cursos.bulk');

            // Aprobación de cursos
            Route::get('cursos/pendientes', [CursoController::class, 'pendientes'])->name('cursos.pendientes');
            Route::post('cursos/{curso}/aprobar', [CursoController::class, 'aprobar'])->name('cursos.aprobar');
            Route::post('cursos/{curso}/rechazar', [CursoController::class, 'rechazar'])->name('cursos.rechazar');

            // Solicitudes de creador
            Route::get('solicitudes-creador', [UserController::class, 'solicitudesCreador'])->name('solicitudes-creador');
            Route::post('solicitudes-creador/{usuario}/aprobar', [UserController::class, 'aprobarSolicitudCreador'])->name('solicitudes-creador.aprobar');
            Route::post('solicitudes-creador/{usuario}/rechazar', [UserController::class, 'rechazarSolicitudCreador'])->name('solicitudes-creador.rechazar');

            // --- Rutas de Artículos (Administración) ---
            Route::get('articulos', [ArticuloController::class, 'index'])->name('articulos.index');
            Route::get('articulos/create', [ArticuloController::class, 'create'])->name('articulos.create');
            Route::post('articulos', [ArticuloController::class, 'store'])->name('articulos.store');
            Route::get('articulos/{articulo:slug}', [ArticuloController::class, 'show'])->name('articulos.show');
            Route::get('articulos/{articulo:slug}/edit', [ArticuloController::class, 'edit'])->name('articulos.edit');
            Route::put('articulos/{articulo:slug}', [ArticuloController::class, 'update'])->name('articulos.update');
            Route::delete('articulos/{articulo:slug}', [ArticuloController::class, 'destroy'])->name('articulos.destroy');
            Route::post('articulos/upload-image', [ArticuloController::class, 'uploadImage'])->name('articulos.uploadImage');
            Route::post('articulos/delete-image', [ArticuloController::class, 'deleteImage'])->name('articulos.deleteImage');

            // --- Rutas de Casos de Éxito (Administración) ---
            Route::get('casos-exito', [CasoExitoController::class, 'index'])->name('casos-exito.index');
            Route::get('casos-exito/create', [CasoExitoController::class, 'create'])->name('casos-exito.create');
            Route::post('casos-exito', [CasoExitoController::class, 'store'])->name('casos-exito.store');
            Route::get('casos-exito/{casoExito:slug}', [CasoExitoController::class, 'show'])->name('casos-exito.show');
            Route::get('casos-exito/{casoExito:slug}/edit', [CasoExitoController::class, 'edit'])->name('casos-exito.edit');
            Route::put('casos-exito/{casoExito:slug}', [CasoExitoController::class, 'update'])->name('casos-exito.update');
            Route::delete('casos-exito/{casoExito:slug}', [CasoExitoController::class, 'destroy'])->name('casos-exito.destroy');
            Route::post('casos-exito/upload-image', [CasoExitoController::class, 'uploadImage'])->name('casos-exito.uploadImage');
            Route::post('casos-exito/delete-image', [CasoExitoController::class, 'deleteImage'])->name('casos-exito.deleteImage');
        });

    // --- Rutas de Creadores de Contenido ---
    Route::prefix('creador')
        ->as('creador.')
        ->middleware(['solo.creador'])
        ->group(function () {
            // Dashboard del creador
            Route::get('dashboard', [CreadorController::class, 'dashboard'])->name('dashboard');

            // Rutas para carga de archivos grandes por fragmentos
            Route::post('chunk-upload', [ChunkUploadController::class, 'process'])->name('chunk-upload');
            Route::delete('chunk-upload/delete', [ChunkUploadController::class, 'deleteTempVideo'])->name('chunk-upload.delete');

            // Gestión de cursos del creador
            Route::get('cursos', [CreadorController::class, 'index'])->name('cursos.index');
            Route::get('cursos/create', [CreadorController::class, 'create'])->name('cursos.create');
            Route::post('cursos', [CreadorController::class, 'store'])->name('cursos.store');
            Route::get('cursos/{curso}', [CreadorController::class, 'show'])->name('cursos.show')->middleware('course.access');
            Route::get('cursos/{curso}/edit', [CreadorController::class, 'edit'])->name('cursos.edit');
            Route::put('cursos/{curso}', [CreadorController::class, 'update'])->name('cursos.update');
            Route::delete('cursos/{curso}', [CreadorController::class, 'destroy'])->name('cursos.destroy');

            // Rutas para eliminación específica de elementos
            Route::delete('subnivel/{subnivel}/video', [CreadorController::class, 'deleteVideo'])->name('subnivel.deleteVideo');
            Route::delete('subnivel/{subnivel}/recursos', [CreadorController::class, 'deleteResources'])->name('subnivel.deleteResources');
            Route::delete('subnivel/{subnivel}', [CreadorController::class, 'deleteSubnivel'])->name('subnivel.delete');
            Route::delete('nivel/{nivel}', [CreadorController::class, 'deleteNivel'])->name('nivel.delete');

            // Subir recursos adicionales
            Route::post('cursos/{curso}/subnivel/{subnivel}/recurso', [CreadorController::class, 'subirRecurso'])->name('cursos.subirRecurso');

            // --- Rutas de Artículos del Creador ---
            Route::get('articulos', [CreadorArticuloController::class, 'index'])->name('articulos.index');
            Route::get('articulos/create', [CreadorArticuloController::class, 'create'])->name('articulos.create');
            Route::post('articulos', [CreadorArticuloController::class, 'store'])->name('articulos.store');
            Route::get('articulos/{articulo:slug}', [CreadorArticuloController::class, 'show'])->name('articulos.show');
            Route::get('articulos/{articulo:slug}/edit', [CreadorArticuloController::class, 'edit'])->name('articulos.edit');
            Route::put('articulos/{articulo:slug}', [CreadorArticuloController::class, 'update'])->name('articulos.update');
            Route::delete('articulos/{articulo:slug}', [CreadorArticuloController::class, 'destroy'])->name('articulos.destroy');
            Route::post('articulos/upload-image', [CreadorArticuloController::class, 'uploadImage'])->name('articulos.uploadImage');
            Route::post('articulos/delete-image', [CreadorArticuloController::class, 'deleteImage'])->name('articulos.deleteImage');

            // --- Rutas de Casos de Éxito del Creador ---
            Route::get('casos-exito', [CasoExitoController::class, 'index'])->name('casos-exito.index');
            Route::get('casos-exito/create', [CasoExitoController::class, 'create'])->name('casos-exito.create');
            Route::post('casos-exito', [CasoExitoController::class, 'store'])->name('casos-exito.store');
            Route::get('casos-exito/{casoExito:slug}', [CasoExitoController::class, 'show'])->name('casos-exito.show');
            Route::get('casos-exito/{casoExito:slug}/edit', [CasoExitoController::class, 'edit'])->name('casos-exito.edit');
            Route::put('casos-exito/{casoExito:slug}', [CasoExitoController::class, 'update'])->name('casos-exito.update');
            Route::delete('casos-exito/{casoExito:slug}', [CasoExitoController::class, 'destroy'])->name('casos-exito.destroy');
            Route::post('casos-exito/upload-image', [CasoExitoController::class, 'uploadImage'])->name('casos-exito.uploadImage');
            Route::post('casos-exito/delete-image', [CasoExitoController::class, 'deleteImage'])->name('casos-exito.deleteImage');
        });

    // --- Rutas de Marketing (Solo Visualización de Artículos KIBI) ---
    Route::prefix('marketing')
        ->as('marketing.')
        ->middleware(['auth', 'email.verified'])
        ->group(function () {
            // Dashboard del marketing
            Route::get('dashboard', function () {
                $articulosCount = \App\Models\Articulo::where('status', 'publicado')->count();
                $categoriasCount = \App\Models\Categoria::count();
                $articulosRecientes = \App\Models\Articulo::where('status', 'publicado')
                    ->with(['autor', 'categoria'])
                    ->latest()
                    ->take(5)
                    ->get();

                return view('marketing.dashboard', compact('articulosCount', 'categoriasCount', 'articulosRecientes'));
            })->name('dashboard');

            // --- Rutas de Artículos de KIBI (Solo Lectura) ---
            Route::get('articulos', [MarketingController::class, 'catalogo'])->name('articulos.catalogo');
            Route::get('articulos/{articulo:slug}', [MarketingController::class, 'ver'])->name('articulos.ver');
        });
    // --- Carrito (solo tipos 3 y 4) ---
    Route::middleware(['cart.enabled'])->group(function () {
        Route::get('/usuario-estudiante/carrito', [CarritoController::class, 'index'])->name('carrito.index');
        Route::post('/usuario-estudiante/carrito', [CarritoController::class, 'add'])->name('carrito.add');
        Route::put('/usuario-estudiante/carrito/{item}', [CarritoController::class, 'update'])->name('carrito.update');
        Route::delete('/usuario-estudiante/carrito/{item}', [CarritoController::class, 'remove'])->name('carrito.remove');
     });

    // --- Rutas de Usuario Estudiante ---
    Route::get('/usuario-estudiante', function () {
        $categorias = \App\Models\Categoria::orderBy('nombre')->get();
        $recomendados = \App\Models\Curso::where('activo', true)->latest()->take(8)->with('categoria')->get();
        $enCurso = Auth::user()
            ->cursosInscritos()
            ->wherePivotIn('status', ['activo'])
            ->with('categoria')
            ->take(8)
            ->get();

        // Obtener artículos relacionados (artículos publicados más recientes)
        $articulosRelacionados = \App\Models\Articulo::where('status', 'publicado')
            ->with('autor')
            ->latest()
            ->take(6)
            ->get();

        return view('usuario-estudiante.index', compact('categorias', 'recomendados', 'enCurso', 'articulosRelacionados'));
    })->name('usuario-estudiante');

    // --- Rutas de Cursos (Catálogo para usuarios autenticados) ---
    Route::get('/usuario-estudiante/cursos', [CursoController::class, 'catalogo'])->name('usuario.cursos.catalogo');
    // Alias de compatibilidad
    Route::get('/cursos', function () {
        return redirect()->route('usuario.cursos.catalogo');
    })->name('cursos.catalogo');

    Route::get('/curso/{idOrSlug}', [CursoController::class, 'ver'])->name('cursos.ver');
    Route::post('/curso/{curso}/inscribir', [CursoController::class, 'inscribir'])->name('cursos.inscribir');


    // --- Rutas de Artículos (Catálogo para usuarios autenticados) ---
    Route::get('/blog', [ArticuloController::class, 'catalogo'])->name('articulos.catalogo');
    Route::get('/blog/{articulo:slug}', [ArticuloController::class, 'ver'])->name('articulos.ver');

    // --- Rutas específicas para Usuario Estudiante ---
    Route::prefix('usuario-estudiante')
        ->as('usuario-estudiante.')
        ->group(function () {
            // Artículos para usuario estudiante
            Route::get('articulos', [ArticuloController::class, 'catalogo'])->name('articulos.catalogo');
            Route::get('articulos/{articulo:slug}', [ArticuloController::class, 'ver'])->name('articulos.ver');

        });
    });

/*
|--------------------------------------------------------------------------
| Páginas Públicas
|--------------------------------------------------------------------------
*/
// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Servicios
Route::prefix('servicios')->group(function () {
    Route::get('consultoria-ti', function () {
        return view('pages.servicios.consultoria-ti');
    })->name('servicios.consultoria-ti');

    Route::get('ciberseguridad', function () {
        return view('pages.servicios.ciberseguridad');
    })->name('servicios.ciberseguridad');

    Route::get('auditorias', function () {
        return view('pages.servicios.auditorias');
    })->name('servicios.auditorias');

    Route::get('soluciones-saas', function () {
        return view('pages.servicios.soluciones-saas');
    })->name('servicios.soluciones-saas');

    Route::get('reingenieria', function () {
        return view('pages.servicios.reingenieria');
    })->name('servicios.reingenieria');

    Route::get('soluciones-medida', function () {
        return view('pages.servicios.soluciones-medida');
    })->name('servicios.soluciones-medida');
});

// Sobre nosotros
Route::get('/sobre-nosotros', function () {
    return view('pages.sobre-nosotros');
})->name('sobre-nosotros');

// Soluciones
Route::prefix('soluciones')->group(function () {
    Route::get('kibi', function () {
        return view('KIBI.home.home');
    })->name('soluciones.kibi');

    Route::get('track-safe', function () {
        return view('pages.soluciones.track-safe');
    })->name('soluciones.track-safe');
});

// Rutas de KIBI (Sistema Educativo)
Route::prefix('kibi')->as('kibi.')->group(function () {
    // Página "Sobre nosotros" de KIBI
    Route::get('nosotros', function () {
        return view('kibi.nosotros.nosotros');
    })->name('nosotros');

    // Rutas públicas de autenticación - usar middleware para configurar sesión de Kibi
    Route::middleware(['kibi.session'])->group(function () {
        Route::get('login', [KibiAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [KibiAuthController::class, 'login'])->name('login.post');

        Route::get('register', [KibiAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [KibiAuthController::class, 'register'])->name('register.post');

        Route::get('forgot-password', [KibiAuthController::class, 'showForgotPasswordForm'])->name('password.request');
        Route::post('forgot-password', [KibiAuthController::class, 'sendResetLink'])->name('password.email');

        Route::get('reset-password/{token}', [KibiAuthController::class, 'showResetPasswordForm'])->name('password.reset');
        Route::post('reset-password', [KibiAuthController::class, 'resetPassword'])->name('password.update');

        // Verificación de email para Kibi (requiere autenticación)
        Route::middleware(['auth:kibi'])->group(function () {
            Route::get('email/verification-required', [KibiAuthController::class, 'showEmailVerificationRequired'])->name('email.verification.required');
            Route::post('email/resend', [KibiAuthController::class, 'resendVerificationEmail'])->name('email.resend');
        });
    });

    // Perfil - KIBI (requiere verificación de email)
    Route::middleware(['kibi.session', 'auth:kibi', 'email.verified'])->group(function () {
        Route::get('profile', function () {
            return view('KIBI.profile.show');
        })->name('profile.show');

        Route::get('profile/edit', function () {
            return view('KIBI.profile.edit');
        })->name('profile.edit');
    });

    // Página Home de KIBI
    Route::get('/', function () {
        return view('KIBI.home.home');
    })->name('home');

    // Página Nosotros de KIBI
    Route::get('nosotros', function () {
        return view('KIBI.nosotros.nosotros');
    })->name('nosotros');

    // Formulario de contacto KIBI (para usuarios de marketing)
    Route::get('contacto', [KibiContactController::class, 'show'])->name('contact.show');
    Route::post('contacto', [KibiContactController::class, 'store'])->name('contact.store');
    Route::get('contacto/exito', [KibiContactController::class, 'success'])->name('contact.success');

    // Vista independiente de contacto
    Route::get('contacto-formulario', function () {
        return view('kibi.contacto');
    })->name('contact.form');

    // Rutas protegidas de KIBI - usar guardia 'kibi' y middleware de sesión
    Route::middleware(['kibi.session', 'auth:kibi', 'email.verified'])->group(function () {
        Route::get('dashboard', function () {
            return view('KIBI.admin.dashboard');
        })->name('dashboard');

        // Rutas de artículos de KIBI (requieren autenticación - accesibles para todos)
        Route::get('articulos', [MarketingController::class, 'catalogo'])->name('articulos.catalogo');
        Route::get('articulos/{articulo:slug}', [MarketingController::class, 'ver'])->name('articulos.ver');

        // Rutas de administración de artículos de KIBI (solo para marketing - tiene acceso completo)
        Route::middleware(['role:marketing'])->group(function () {
            Route::get('articulos-admin', [MarketingController::class, 'adminIndex'])->name('articulos.admin');
            Route::post('articulos', [MarketingController::class, 'store'])->name('articulos.store');
            Route::get('articulos/{articulo}/edit', [MarketingController::class, 'edit'])->name('articulos.edit');
            Route::put('articulos/{articulo}', [MarketingController::class, 'update'])->name('articulos.update');
            Route::delete('articulos/{articulo}', [MarketingController::class, 'destroy'])->name('articulos.destroy');
            Route::post('articulos/upload-image', [MarketingController::class, 'uploadImage'])->name('articulos.uploadImage');
            Route::post('articulos/delete-image', [MarketingController::class, 'deleteImage'])->name('articulos.deleteImage');
        });

        // Solicitar cualquier rol de KIBI (disponible para empleados)
        Route::post('solicitar-rol', [UserController::class, 'solicitarRol'])->name('solicitar.rol');

        // Gestión de contactos (solo para usuarios de marketing)
        Route::middleware(['role:marketing'])->group(function () {
            Route::get('contactos-solicitudes', [KibiContactManagementController::class, 'index'])->name('contacts.index');
            Route::get('contactos-solicitudes/{contacto}', [KibiContactManagementController::class, 'show'])->name('contacts.show');
            Route::post('contactos-solicitudes/{contacto}/status', [KibiContactManagementController::class, 'updateStatus'])->name('contacts.update-status');
            Route::post('contactos-solicitudes/{contacto}/contacted', [KibiContactManagementController::class, 'markAsContacted'])->name('contacts.mark-contacted');
            Route::delete('contactos-solicitudes/{contacto}', [KibiContactManagementController::class, 'destroy'])->name('contacts.destroy');
            Route::get('contactos-solicitudes/export/csv', [KibiContactManagementController::class, 'export'])->name('contact.export');

            // Envío de emails
            Route::get('contactos-solicitudes/{contacto}/email', [KibiEmailController::class, 'show'])->name('contacts.email.show');
            Route::post('contactos-solicitudes/{contacto}/email', [KibiEmailController::class, 'send'])->name('contacts.email.send');

            // Envío de WhatsApp
            Route::get('contactos-solicitudes/{contacto}/whatsapp', [KibiWhatsAppController::class, 'show'])->name('contacts.whatsapp.show');
            Route::post('contactos-solicitudes/{contacto}/whatsapp', [KibiWhatsAppController::class, 'send'])->name('contacts.whatsapp.send');
        });

        // Gestión de usuarios (solo para marketing)
        Route::middleware(['role:marketing'])->group(function () {
            Route::get('usuarios', [KibiUserManagementController::class, 'index'])->name('usuarios.index');
            Route::get('usuarios/{usuario}', [KibiUserManagementController::class, 'show'])->name('usuarios.show');
            Route::post('usuarios/{usuario}/actualizar-rol', [KibiUserManagementController::class, 'updateRole'])->name('usuarios.update-role');
            Route::post('usuarios/{usuario}/toggle-estado', [KibiUserManagementController::class, 'toggleStatus'])->name('usuarios.toggle-status');
        });

        // Solicitudes de marketing (para marketing y administradores)
        Route::middleware(['role:marketing,administrador'])->group(function () {
            Route::get('solicitudes-marketing', [KibiUserManagementController::class, 'solicitudesMarketing'])->name('solicitudes.marketing');
            Route::post('solicitudes-marketing/{usuario}/aprobar', [KibiUserManagementController::class, 'aprobarSolicitudMarketing'])->name('solicitudes.marketing.aprobar');
            Route::post('solicitudes-marketing/{usuario}/rechazar', [KibiUserManagementController::class, 'rechazarSolicitudMarketing'])->name('solicitudes.marketing.rechazar');
        });

        // Solicitudes de roles (para marketing y administradores)
        Route::middleware(['role:marketing,administrador'])->group(function () {
            Route::get('solicitudes-roles', [KibiUserManagementController::class, 'solicitudesRoles'])->name('solicitudes.roles');
            Route::get('solicitudes-pendientes', [KibiUserManagementController::class, 'todasSolicitudesPendientes'])->name('solicitudes.pendientes');
            Route::get('historial-solicitudes', [KibiUserManagementController::class, 'historialSolicitudes'])->name('historial.solicitudes'); // API JSON
            Route::get('historial-solicitudes/vista', [KibiUserManagementController::class, 'mostrarHistorialSolicitudes'])->name('historial.solicitudes.vista');
            Route::post('solicitudes-roles/{usuario}/aprobar', [KibiUserManagementController::class, 'aprobarSolicitudRol'])->name('solicitudes.roles.aprobar');
            Route::post('solicitudes-roles/{usuario}/rechazar', [KibiUserManagementController::class, 'rechazarSolicitudRol'])->name('solicitudes.roles.rechazar');
        });

        Route::post('logout', [KibiAuthController::class, 'logout'])->name('logout');
    });
});

// Contacto
Route::get('/contacto', function () {
    return view('pages.contacto');
})->name('contacto');

// Redes Sociales (página pública)
Route::get('/redes-sociales', function () {
    $redes = \App\Models\RedesSociales::where('status', 'activo')->latest()->get();
    return view('pages.redes-sociales', compact('redes'));
})->name('redes-sociales');
// Políticas
Route::prefix('politicas')->group(function () {
    Route::get('privacidad', function () {
        return view('pages.politicas.privacidad');
    })->name('politicas.privacidad');

    Route::get('terminos', function () {
        return view('pages.politicas.terminos');
    })->name('politicas.terminos');

    Route::get('cookies', function () {
        return view('pages.politicas.cookies');
    })->name('politicas.cookies');
});

// Servir archivos de creadores directamente
Route::get('/storage/creadores/{path}', function ($path) {
    $filePath = storage_path('app/public/creadores/' . $path);

    if (!file_exists($filePath)) {
        abort(404);
    }

    return response()->file($filePath);
})->where('path', '.*')->name('storage.creadores');

// Servir videos de forma protegida (requiere autenticación y acceso al curso)
Route::middleware(['auth'])->group(function () {
    Route::get('/video/{path}', [App\Http\Controllers\VideoController::class, 'stream'])
        ->where('path', '.*')
        ->name('video.stream');
});

// Alias de compatibilidad con rutas antiguas (301 hacia las nuevas rutas)
Route::get('/politica-privacidad', function () {
    return redirect()->route('politicas.privacidad', [], 301);
})->name('politica-privacidad');

Route::get('/terminos-servicio', function () {
    return redirect()->route('politicas.terminos', [], 301);
})->name('terminos-servicio');

Route::get('/politica-cookies', function () {
    return redirect()->route('politicas.cookies', [], 301);
})->name('politica-cookies');

/*
|--------------------------------------------------------------------------
| Casos de éxito
|--------------------------------------------------------------------------
*/
Route::get('casos-exito', [CasoExitoController::class, 'catalogo'])->name('casos-exito.catalogo');
Route::get('casos-exito/{casoExito:slug}', [CasoExitoController::class, 'ver'])->name('casos-exito.ver');

// Rutas de pago con Stripe
Route::middleware(['auth', 'email.verified'])->group(function () {
    Route::post('/payment/create-link', [App\Http\Controllers\PaymentController::class, 'createPaymentLink'])->name('payment.create-link');
    Route::get('/payment/success', [App\Http\Controllers\PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [App\Http\Controllers\PaymentController::class, 'paymentCancel'])->name('payment.cancel');
});

// Rutas de pago con PayPal
Route::middleware(['auth', 'email.verified'])->group(function () {
    Route::post('/paypal/create-order', [App\Http\Controllers\PayPalController::class, 'createOrder'])->name('paypal.create-order');
    Route::get('/paypal/success', [App\Http\Controllers\PayPalController::class, 'success'])->name('paypal.success');
    Route::get('/paypal/cancel', [App\Http\Controllers\PayPalController::class, 'cancel'])->name('paypal.cancel');
    Route::post('/paypal/capture', [App\Http\Controllers\PayPalController::class, 'captureOrder'])->name('paypal.capture');
});

// Rutas de cursos para estudiantes
Route::middleware(['auth', 'email.verified'])->group(function () {
    Route::get('/usuario-estudiante/cursos-adquiridos', [App\Http\Controllers\UsuarioCursoController::class, 'cursosAdquiridos'])->name('usuario.cursos.adquiridos');
    Route::get('/usuario-estudiante/cursos/{curso}', [App\Http\Controllers\UsuarioCursoController::class, 'show'])->name('usuario.cursos.show')->middleware('course.access');
});

// Webhook de Stripe (sin middleware de autenticación)
Route::post('/stripe/webhook', [App\Http\Controllers\StripeWebhookController::class, 'handleWebhook'])->name('stripe.webhook');

/*
|--------------------------------------------------------------------------
| Formulario de Contacto
|--------------------------------------------------------------------------
*/
Route::post('/contact-form', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Newsletter
|--------------------------------------------------------------------------
*/
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

/*
|--------------------------------------------------------------------------
| API Routes para Comentarios de Cursos y Progreso de Lecciones
|--------------------------------------------------------------------------
*/
Route::prefix('api')->middleware(['auth', 'email.verified'])->group(function () {
    // Rutas para estudiantes
    Route::get('/comentarios-curso/{cursoId}', [App\Http\Controllers\Api\ComentarioCursoController::class, 'index'])->name('api.comentarios.index');
    Route::post('/comentarios-curso', [App\Http\Controllers\Api\ComentarioCursoController::class, 'store'])->name('api.comentarios.store');
    Route::put('/comentarios-curso/{comentarioId}', [App\Http\Controllers\Api\ComentarioCursoController::class, 'update'])->name('api.comentarios.update');
    Route::delete('/comentarios-curso/{comentarioId}', [App\Http\Controllers\Api\ComentarioCursoController::class, 'destroy'])->name('api.comentarios.destroy');

    // Rutas para creadores
    Route::post('/comentarios-curso/{comentarioId}/responder', [App\Http\Controllers\Api\ComentarioCursoController::class, 'responder'])->name('api.comentarios.responder');
    Route::put('/comentarios-curso/{comentarioId}/respuesta', [App\Http\Controllers\Api\ComentarioCursoController::class, 'actualizarRespuesta'])->name('api.comentarios.respuesta.update');
    Route::delete('/comentarios-curso/{comentarioId}/respuesta', [App\Http\Controllers\Api\ComentarioCursoController::class, 'eliminarRespuesta'])->name('api.comentarios.respuesta.destroy');
    Route::post('/comentarios-curso/marcar-leidos', [App\Http\Controllers\Api\ComentarioCursoController::class, 'marcarLeidos'])->name('api.comentarios.marcar-leidos');
    Route::get('/comentarios-curso/{cursoId}/estadisticas', [App\Http\Controllers\Api\ComentarioCursoController::class, 'estadisticas'])->name('api.comentarios.estadisticas');

    // Rutas para progreso de lecciones
    Route::post('/progreso-leccion/completar', [App\Http\Controllers\Api\ProgresoLeccionController::class, 'marcarCompletada'])->name('api.progreso-leccion.completar');
    Route::post('/progreso-leccion/no-completar', [App\Http\Controllers\Api\ProgresoLeccionController::class, 'marcarNoCompletada'])->name('api.progreso-leccion.no-completar');
    Route::post('/progreso-leccion/estado', [App\Http\Controllers\Api\ProgresoLeccionController::class, 'obtenerEstado'])->name('api.progreso-leccion.estado');
    Route::post('/progreso-leccion/estados-lote', [App\Http\Controllers\Api\ProgresoLeccionController::class, 'obtenerEstadosLote'])->name('api.progreso-leccion.estados-lote');

    // Rutas para cuestionarios
    Route::get('/cuestionario/{subnivelId}', [App\Http\Controllers\Api\CuestionarioController::class, 'obtenerCuestionario'])->name('api.cuestionario.obtener');
    Route::post('/cuestionario/{subnivelId}/evaluar', [App\Http\Controllers\Api\CuestionarioController::class, 'evaluarCuestionario'])->name('api.cuestionario.evaluar');
    Route::get('/cuestionario/{subnivelId}/verificar-aprobacion', [App\Http\Controllers\Api\CuestionarioController::class, 'verificarAprobacion'])->name('api.cuestionario.verificar-aprobacion');
    Route::get('/subnivel/{subnivelId}/verificar-desbloqueo', [App\Http\Controllers\Api\CuestionarioController::class, 'verificarDesbloqueo'])->name('api.subnivel.verificar-desbloqueo');
});

