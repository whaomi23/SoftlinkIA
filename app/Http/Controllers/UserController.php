<?php
//13
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EmailVerification;
use App\Rules\SecurePassword;
use App\Http\Controllers\CorreoServiceAccountsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLoginForm(Request $request)
    {
        // Detectar si viene de KIBI
        if ($request->has('kibi') || $request->is('kibi/login')) {
            return view('KIBI.auth.login');
        }
        
        return view('pages.auth.login');
    }

    /**
     * Procesar login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->filled('remember');
        $isKibi = $request->has('kibi') || $request->is('kibi/login');

        // Log del intento de login
        Log::info($isKibi ? 'KIBI intento de login' : 'Intento de login', [
            'email' => $credentials['email'],
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now(),
            'source' => $isKibi ? 'KIBI' : 'MAIN'
        ]);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Log de login exitoso
            Log::info($isKibi ? 'KIBI login exitoso' : 'Login exitoso', [
                'user_id' => Auth::id(),
                'email' => $credentials['email'],
                'ip' => $request->ip(),
                'timestamp' => now(),
                'source' => $isKibi ? 'KIBI' : 'MAIN'
            ]);

            // Si el usuario marcó "recuérdame", configurar cookie persistente
            if ($remember) {
                $request->session()->put('remember_me', true);
            }

            $user = Auth::user();

            // Si es KIBI, redirigir al dashboard de KIBI
            if ($isKibi) {
                return redirect()->intended(route('kibi.dashboard'))
                    ->with('success', 'Bienvenido a KIBI Educación');
            }

            // Redirigir según el tipo de usuario (flujo normal)
            if ($user->isAdmin()) {
                return redirect()->intended(route('dashboard'))->with('success', 'Bienvenido al panel de administración');
            } elseif ($user->isCreador()) {
                return redirect()->route('creador.dashboard')->with('success', 'Bienvenido al panel de creador');
            } else {
                // Usuario normal/estudiante: exigir verificación de email antes de acceder a su panel
                if (!$user->isEmailVerified()) {
                    return redirect()->route('email.verification.required')->with('info', 'Por favor verifica tu correo para continuar.');
                }
                return redirect()->intended(route('usuario-estudiante'))->with('success', 'Bienvenido a SoftLinkIA');
            }
        }

        // Log de login fallido
        Log::warning($isKibi ? 'KIBI login fallido' : 'Login fallido', [
            'email' => $credentials['email'],
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now(),
            'source' => $isKibi ? 'KIBI' : 'MAIN'
        ]);

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput($request->only('email', 'remember'));
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        $isKibi = $request->is('kibi/logout');
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($isKibi) {
            return redirect()->route('kibi.login')->with('success', 'Sesión cerrada correctamente');
        }

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }

    /**
     * Mostrar formulario de registro
     */
    public function showRegisterForm(Request $request)
    {
        // Detectar si viene de KIBI
        if ($request->has('kibi') || $request->is('kibi/register')) {
            return view('KIBI.auth.register');
        }
        
        return view('pages.auth.register');
    }

    /**
     * Procesar registro
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:100',
            'apellido_paterno'  => 'required|string|max:100',
            'apellido_materno'  => 'required|string|max:100',
            'email'             => 'required|email|unique:users,email',
            'password'          => ['required', 'string', new SecurePassword(), 'confirmed'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['verificado'] = 0;
        $validated['status'] = 'activo';

        // Todos los usuarios nuevos son estudiantes por defecto (buscar id por nombre)
        $validated['tipo_usuario_id'] = (int) DB::table('tipos_usuarios')->where('nombre', 'estudiante')->value('id');

        $user = User::create($validated);

        // Enviar email de verificación usando CorreoServiceAccounts
        $correoService = new CorreoServiceAccountsController();
        $emailSent = $correoService->enviarEmailVerificacionNuevoUsuario($user);

        // Log del resultado del envío de email
        if ($emailSent) {
            Log::info('Email de verificación enviado exitosamente durante registro', [
                'user_id' => $user->id,
                'email' => $user->email,
                'timestamp' => now()
            ]);
        } else {
            Log::error('Error al enviar email de verificación durante registro', [
                'user_id' => $user->id,
                'email' => $user->email,
                'timestamp' => now()
            ]);
        }

        // Iniciar sesión automáticamente
        Auth::attempt([
            'email' => $validated['email'],
            'password' => $request->password
        ]);

        // Redirigir por rol (exigir verificación para estudiantes)
        $user = Auth::user();
        $isKibi = $request->has('kibi') || $request->is('kibi/register');

        if ($user->isAdmin()) {
            $redirectRoute = $isKibi ? 'kibi.dashboard' : 'dashboard';
            return redirect()->route($redirectRoute)->with('success', 'Cuenta creada exitosamente. Revisa tu email para verificar tu cuenta.');
        } elseif ($user->isCreador()) {
            $redirectRoute = $isKibi ? 'kibi.dashboard' : 'creador.dashboard';
            return redirect()->route($redirectRoute)->with('success', 'Cuenta creada exitosamente. Revisa tu email para verificar tu cuenta.');
        } else {
            // Usuario normal/estudiante: exigir verificación de email antes de acceder a su panel
            if (!$user->isEmailVerified()) {
                $verificationRoute = $isKibi ? 'kibi.email.verification.required' : 'email.verification.required';
                $message = $emailSent 
                    ? 'Hemos enviado un email de verificación. Verifica tu correo para continuar.'
                    : 'Cuenta creada exitosamente. Por favor contacta al administrador para verificar tu email.';
                return redirect()->route($verificationRoute)->with('info', $message);
            }
            $redirectRoute = $isKibi ? 'kibi.dashboard' : 'usuario-estudiante';
            return redirect()->route($redirectRoute)->with('success', 'Cuenta creada exitosamente.');
        }
    }

    /**
     * Mostrar lista de usuarios (solo para administradores)
     */
    public function index(Request $request)
    {
        $query = User::with('tipoUsuario')->latest();

        if ($request->filled('q')) {
            $q = trim($request->string('q'));
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('apellido_paterno', 'like', "%{$q}%")
                    ->orWhere('apellido_materno', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        if ($request->filled('tipo')) {
            $tipoId = (int) $request->input('tipo');
            $query->where('tipo_usuario_id', $tipoId);
        }

        if ($request->filled('estado')) {
            $estado = $request->input('estado');
            $query->where('status', $estado);
        }

        $usuarios = $query->paginate(15)->appends($request->query());

        if ($request->ajax()) {
            return view('usuarios.partials.table', compact('usuarios'))->render();
        }

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Mostrar formulario para crear nuevo usuario
     */
    public function create()
    {
        $tiposUsuarios = \App\Models\TipoUsuario::all();
        return view('usuarios.create', compact('tiposUsuarios'));
    }

    /**
     * Almacenar nuevo usuario
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:100',
            'apellido_paterno'  => 'required|string|max:100',
            'apellido_materno'  => 'required|string|max:100',
            'email'             => 'required|email|unique:users,email',
            'password'          => ['required', 'string', new SecurePassword(), 'confirmed'],
            'tipo_usuario_id'   => 'required|exists:tipos_usuarios,id',
            'status'            => 'required|in:activo,inactivo',
            'verificado'        => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['verificado'] = $request->has('verificado') ? 1 : 0;

        User::create($validated);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Mostrar perfil de usuario (ruta: usuarios.show)
     */
    public function show(User $usuario)
    {
        $usuario->load('tipoUsuario')
                ->loadCount(['articulos', 'cursos', 'certificados']);

        $ultimosArticulos = $usuario->articulos()
            ->latest()
            ->limit(5)
            ->get(['id','titulo','status','created_at']);

        $ultimosCursos = $usuario->cursos()
            ->latest()
            ->limit(5)
            ->get(['id','titulo','slug','activo','created_at']);

        $ultimosCertificados = $usuario->certificados()
            ->with('curso:id,titulo')
            ->latest()
            ->limit(5)
            ->get(['id','curso_id','codigo_unico','status','created_at']);

        return view('usuarios.show', compact(
            'usuario', 'ultimosArticulos', 'ultimosCursos', 'ultimosCertificados'
        ));
    }

    /**
     * Mostrar formulario para editar usuario
     */
    public function edit(User $usuario)
    {
        $tiposUsuarios = \App\Models\TipoUsuario::all();
        return view('usuarios.edit', compact('usuario', 'tiposUsuarios'));
    }

    /**
     * Actualizar usuario
     */
    public function update(Request $request, User $usuario)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:100',
            'apellido_paterno'  => 'required|string|max:100',
            'apellido_materno'  => 'required|string|max:100',
            'email'             => 'required|email|unique:users,email,' . $usuario->id,
            'password'          => ['nullable', 'string', new SecurePassword(), 'confirmed'],
            'tipo_usuario_id'   => 'required|exists:tipos_usuarios,id',
            'status'            => 'required|in:activo,inactivo',
            'verificado'        => 'boolean',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['verificado'] = $request->has('verificado') ? 1 : 0;

        $usuario->update($validated);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Eliminar usuario
     */
    public function destroy(User $usuario)
    {
        // No permitir eliminar el usuario actual
        if ($usuario->id === Auth::id()) {
            return redirect()->route('usuarios.index')
                ->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }

    /**
     * Convertir usuario a creador de contenido
     */
    public function convertirACreador(User $usuario)
    {
        // Verificar que no sea admin
        if ($usuario->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede convertir un administrador a creador.'
            ], 400);
        }

        // Buscar el tipo de usuario "creador"
        $tipoCreador = \App\Models\TipoUsuario::where('nombre', 'creador')->first();

        if (!$tipoCreador) {
            return response()->json([
                'success' => false,
                'message' => 'El tipo de usuario "creador" no existe en el sistema.'
            ], 400);
        }

        $usuario->update(['tipo_usuario_id' => $tipoCreador->id]);

        return response()->json([
            'success' => true,
            'message' => "Usuario {$usuario->nombreCompleto} convertido a creador de contenido exitosamente.",
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombreCompleto,
                'email' => $usuario->email,
                'tipo' => $tipoCreador->nombre,
                'fecha_conversion' => now()->format('d/m/Y H:i')
            ]
        ]);
    }

    /**
     * Convertir creador de vuelta a usuario normal
     */
    public function convertirAUsuario(User $usuario)
    {
        // Verificar que sea creador
        if (!$usuario->isCreador()) {
            return response()->json([
                'success' => false,
                'message' => 'Este usuario no es un creador de contenido.'
            ], 400);
        }

        // Buscar el tipo de usuario "estudiante" o "user"
        $tipoUsuario = \App\Models\TipoUsuario::whereIn('nombre', ['estudiante', 'user'])->first();

        if (!$tipoUsuario) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró un tipo de usuario válido para la conversión.'
            ], 400);
        }

        $usuario->update(['tipo_usuario_id' => $tipoUsuario->id]);

        return response()->json([
            'success' => true,
            'message' => "Creador {$usuario->nombreCompleto} convertido a usuario normal exitosamente.",
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombreCompleto,
                'email' => $usuario->email,
                'tipo' => $tipoUsuario->nombre,
                'fecha_conversion' => now()->format('d/m/Y H:i')
            ]
        ]);
    }

    /**
     * Activar/Desactivar modo creador (toggle)
     */
    public function toggleModoCreador(User $usuario)
    {
        // Verificar que no sea admin
        if ($usuario->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede modificar el tipo de un administrador.'
            ], 400);
        }

        $tipoCreador = \App\Models\TipoUsuario::where('nombre', 'creador')->first();
        $tipoUsuario = \App\Models\TipoUsuario::whereIn('nombre', ['estudiante', 'user'])->first();

        if (!$tipoCreador || !$tipoUsuario) {
            return response()->json([
                'success' => false,
                'message' => 'Tipos de usuario necesarios no encontrados.'
            ], 400);
        }

        $esCreador = $usuario->isCreador();
        $nuevoTipo = $esCreador ? $tipoUsuario : $tipoCreador;
        $accion = $esCreador ? 'desactivado' : 'activado';

        $usuario->update(['tipo_usuario_id' => $nuevoTipo->id]);

        return response()->json([
            'success' => true,
            'message' => "Modo creador {$accion} para {$usuario->nombreCompleto}.",
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombreCompleto,
                'email' => $usuario->email,
                'tipo' => $nuevoTipo->nombre,
                'es_creador' => !$esCreador,
                'fecha_cambio' => now()->format('d/m/Y H:i')
            ]
        ]);
    }

    /**
     * Obtener estadísticas de usuarios por tipo
     */
    public function estadisticas()
    {
        $estadisticas = \App\Models\TipoUsuario::withCount('usuarios')->get()->map(function ($tipo) {
            return [
                'tipo' => $tipo->nombre,
                'descripcion' => $tipo->descripcion,
                'total' => $tipo->usuarios_count,
                'activos' => $tipo->usuarios()->where('status', 'activo')->count(),
                'inactivos' => $tipo->usuarios()->where('status', 'inactivo')->count(),
            ];
        });

        return response()->json([
            'success' => true,
            'estadisticas' => $estadisticas
        ]);
    }

    /**
     * Obtener solicitudes de creador pendientes
     */
    public function solicitudesCreador()
    {
        $solicitudes = User::where('solicitud_creador', 'pendiente')
            ->select(['id', 'name', 'apellido_paterno', 'apellido_materno', 'email', 'motivo_solicitud', 'experiencia_solicitud', 'updated_at'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'solicitudes' => $solicitudes
        ]);
    }

    /**
     * Aprobar solicitud de creador
     */
    public function aprobarSolicitudCreador(Request $request, User $usuario)
    {
        if ($usuario->solicitud_creador !== 'pendiente') {
            return response()->json([
                'success' => false,
                'message' => 'Esta solicitud no está pendiente.'
            ], 400);
        }

        $tipoCreador = \App\Models\TipoUsuario::where('nombre', 'creador')->first();
        if (!$tipoCreador) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el tipo de usuario creador.'
            ], 500);
        }

        $usuario->update([
            'tipo_usuario_id' => $tipoCreador->id,
            'solicitud_creador' => 'aprobada',
            'comentario_aprobacion' => $request->comentario ?? null,
            'fecha_aprobacion' => now(),
            'aprobado_por' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Solicitud aprobada correctamente.'
        ]);
    }

    /**
     * Rechazar solicitud de creador
     */
    public function rechazarSolicitudCreador(Request $request, User $usuario)
    {
        if ($usuario->solicitud_creador !== 'pendiente') {
            return response()->json([
                'success' => false,
                'message' => 'Esta solicitud no está pendiente.'
            ], 400);
        }

        $request->validate([
            'motivo' => 'required|string|max:1000'
        ]);

        $usuario->update([
            'solicitud_creador' => 'rechazada',
            'motivo_rechazo' => $request->motivo,
            'fecha_rechazo' => now(),
            'rechazado_por' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Solicitud rechazada correctamente.'
        ]);
    }

    /**
     * Solicitar cualquier rol de KIBI (editor_contenido, gestor_usuarios, gestor_contactos, etc.)
     */
    public function solicitarRol(Request $request)
    {
        try {
            $user = auth('kibi')->user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'No autenticado.'
                ], 401);
            }

            // Verificar que no sea admin
            if ($user->isAdmin()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Los administradores no necesitan solicitar roles adicionales.'
                ], 400);
            }

            // Validar los datos
            $validated = $request->validate([
                'rol_solicitado' => 'required|string|in:marketing,empleado,administrador',
                'motivo_solicitud_rol' => 'required|string|max:1000',
                'experiencia_solicitud_rol' => 'required|string|max:2000'
            ]);

            // Verificar que el rol solicitado existe
            $rolExiste = \App\Models\TipoUsuario::where('nombre', $validated['rol_solicitado'])->exists();
            if (!$rolExiste) {
                return response()->json([
                    'success' => false,
                    'message' => 'El rol solicitado no existe.'
                ], 400);
            }

            // Verificar que el usuario no tenga ya ese rol
            if ($user->tipoUsuario && $user->tipoUsuario->nombre === $validated['rol_solicitado']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ya tienes ese rol asignado.'
                ], 400);
            }

            // Verificar que no tenga una solicitud pendiente (ya sea de marketing o de rol genérico)
            if ($user->solicitud_marketing === 'pendiente' || $user->solicitud_rol === 'pendiente') {
                return response()->json([
                    'success' => false,
                    'message' => 'Ya tienes una solicitud pendiente. Espera a que sea revisada.'
                ], 400);
            }

            // Actualizar el usuario
            $user->update([
                'solicitud_rol' => 'pendiente',
                'rol_solicitado' => $validated['rol_solicitado'],
                'motivo_solicitud_rol' => $validated['motivo_solicitud_rol'],
                'experiencia_solicitud_rol' => $validated['experiencia_solicitud_rol'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Solicitud enviada correctamente. Será revisada por el equipo de marketing.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error al solicitar rol: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar la solicitud. Por favor intenta de nuevo.'
            ], 500);
        }
    }

    /**
     * Mostrar formulario de solicitud de recuperación de contraseña
     */
    public function showForgotPasswordForm(Request $request)
    {
        // Detectar si viene de KIBI
        if ($request->has('kibi') || $request->is('kibi/forgot-password')) {
            return view('KIBI.auth.forgot-password');
        }
        
        return view('pages.auth.forgot-password');
    }

    /**
     * Enviar enlace de recuperación de contraseña
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            Log::info('Enlace de recuperación enviado', [
                'email' => $request->email,
                'ip' => $request->ip(),
                'timestamp' => now()
            ]);

            return back()->with('status', 'Hemos enviado un enlace de recuperación a tu correo electrónico.');
        }

        Log::warning('Error al enviar enlace de recuperación', [
            'email' => $request->email,
            'ip' => $request->ip(),
            'status' => $status,
            'timestamp' => now()
        ]);

        return back()->withErrors(['email' => 'No pudimos enviar el enlace de recuperación.']);
    }

    /**
     * Mostrar formulario de restablecimiento de contraseña
     */
    public function showResetPasswordForm(Request $request, $token)
    {
        // Detectar si viene de KIBI
        if ($request->has('kibi') || $request->is('kibi/reset-password/*')) {
            return view('KIBI.auth.reset-password', [
                'token' => $token,
                'email' => $request->email
            ]);
        }
        
        return view('pages.auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Restablecer contraseña
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => ['required', 'string', new SecurePassword(), 'confirmed'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            Log::info('Contraseña restablecida exitosamente', [
                'email' => $request->email,
                'ip' => $request->ip(),
                'timestamp' => now()
            ]);

            // Detectar si viene de KIBI para redirigir apropiadamente
            $isKibi = $request->has('kibi') || $request->is('kibi/reset-password');
            $redirectRoute = $isKibi ? 'kibi.login' : 'login';
            
            return redirect()->route($redirectRoute)->with('success', 'Tu contraseña ha sido restablecida exitosamente.');
        }

        Log::warning('Error al restablecer contraseña', [
            'email' => $request->email,
            'ip' => $request->ip(),
            'status' => $status,
            'timestamp' => now()
        ]);

        return back()->withErrors(['email' => 'No pudimos restablecer tu contraseña.']);
    }

    /**
     * Enviar email de verificación
     */
    private function sendVerificationEmail(User $user, string $token): void
    {
        try {
            Mail::send('emails.email-verification', [
                'user' => $user,
                'token' => $token,
                'verificationUrl' => route('email.verify', ['token' => $token])
            ], function ($message) use ($user) {
                $message->to($user->email, $user->nombreCompleto)
                        ->subject('Verifica tu cuenta en SoftLinkIA');
            });

            Log::info('Email de verificación enviado', [
                'user_id' => $user->id,
                'email' => $user->email,
                'timestamp' => now()
            ]);
        } catch (\Exception $e) {
            Log::error('Error al enviar email de verificación', [
                'user_id' => $user->id,
                'email' => $user->email,
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);
        }
    }

    /**
     * Verificar email con token
     */
    public function verifyEmail(Request $request, string $token)
    {
        // Usar CorreoServiceAccounts para verificar email
        $correoService = new CorreoServiceAccountsController();
        return $correoService->verificarEmailConToken($request, $token);
    }

    /**
     * Reenviar email de verificación
     */
    public function resendVerificationEmail(Request $request)
    {
        // Usar CorreoServiceAccounts para reenviar email
        $correoService = new CorreoServiceAccountsController();
        return $correoService->reenviarEmailVerificacion($request);
    }
}
