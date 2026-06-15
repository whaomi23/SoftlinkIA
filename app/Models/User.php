<?php
//14
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'google_id',
        'password',
        'tipo_usuario_id',
        'verificado',
        'status',
        'last_login',
        'solicitud_creador',
        'motivo_solicitud',
        'experiencia_solicitud',
        'comentario_aprobacion',
        'fecha_aprobacion',
        'aprobado_por',
        'motivo_rechazo',
        'fecha_rechazo',
        'rechazado_por',
        'solicitud_marketing',
        'motivo_solicitud_marketing',
        'experiencia_solicitud_marketing',
        'comentario_aprobacion_marketing',
        'fecha_aprobacion_marketing',
        'aprobado_por_marketing',
        'motivo_rechazo_marketing',
        'fecha_rechazo_marketing',
        'rechazado_por_marketing',
        'solicitud_rol',
        'rol_solicitado',
        'motivo_solicitud_rol',
        'experiencia_solicitud_rol',
        'comentario_aprobacion_rol',
        'fecha_aprobacion_rol',
        'aprobado_por_rol',
        'motivo_rechazo_rol',
        'fecha_rechazo_rol',
        'rechazado_por_rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login' => 'datetime',
            'password' => 'hashed',
            'verificado' => 'boolean',
        ];
    }

    // =====================
    // Relaciones
    // =====================

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'autor_id');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'creador_id');
    }

    public function redesSociales()
    {
        return $this->hasMany(RedesSociales::class, 'usuario_id');
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class, 'usuario_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'usuario_id');
    }

    // public function progresoLecciones()
    // {
    //     return $this->hasMany(ProgresoLeccion::class, 'usuario_id');
    // }

    public function emailVerifications()
    {
        return $this->hasMany(EmailVerification::class);
    }

    /**
     * Cursos en los que el usuario está inscrito
     */
    public function cursosInscritos()
    {
        return $this->belongsToMany(Curso::class, 'inscripciones', 'usuario_id', 'curso_id')
            ->withPivot(['fecha_inscripcion', 'progreso', 'status'])
            ->withTimestamps();
    }

    /**
     * Verificar si el usuario es administrador
     */
    public function isAdmin()
    {
        // Priorizar el rol almacenado en BD
        if ($this->tipoUsuario && $this->tipoUsuario->isAdmin()) {
            return true;
        }

        // Fallback para cuentas seed antiguas que dependían solo del correo
        $legacyAdminEmails = [
            'neritpa@gmail.com',
            'admin@softlinkia.test',
            'sofia@softlinkia.test',
        ];

        return in_array($this->email, $legacyAdminEmails);
    }

    /**
     * Verificar si el usuario es creador
     */
    public function isCreador()
    {
        return $this->tipoUsuario && $this->tipoUsuario->isCreador();
    }

    /**
     * Verificar si el usuario es estudiante
     */
    public function isEstudiante()
    {
        return $this->tipoUsuario && $this->tipoUsuario->isEstudiante();
    }

    /**
     * Verificar si el usuario es instructor (alias para creador)
     */
    public function isInstructor()
    {
        return $this->isCreador();
    }

    /**
     * Verificar si el usuario es de marketing
     */
    public function isMarketing()
    {
        return $this->tipoUsuario && $this->tipoUsuario->isMarketing();
    }

    /**
     * Verificar si el usuario puede crear artículos
     */
    public function canCreateArticulos()
    {
        return $this->isAdmin() || $this->isCreador();
    }

    /**
     * Verificar si el usuario puede editar un artículo específico
     */
    public function canEditArticulo($articulo)
    {
        if ($this->isAdmin()) {
            return true;
        }

        if ($this->isCreador()) {
            return $articulo->autor_id === $this->id;
        }

        return false;
    }

    /**
     * Verificar si el usuario puede eliminar un artículo específico
     */
    public function canDeleteArticulo($articulo)
    {
        if ($this->isAdmin()) {
            return true;
        }

        if ($this->isCreador()) {
            return $articulo->autor_id === $this->id;
        }

        return false;
    }

    /**
     * Verificar si el usuario puede ver artículos
     */
    public function canViewArticulos()
    {
        return true; // Todos los usuarios autenticados pueden ver artículos
    }

    /**
     * Obtener el nombre completo del usuario
     */
    public function getNombreCompletoAttribute()
    {
        return trim($this->name . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno);
    }

    /**
     * Obtener las iniciales del usuario
     */
    public function getInicialesAttribute()
    {
        $iniciales = '';
        if ($this->name) $iniciales .= mb_substr($this->name, 0, 1, 'UTF-8');
        if ($this->apellido_paterno) $iniciales .= mb_substr($this->apellido_paterno, 0, 1, 'UTF-8');
        return strtoupper($iniciales);
    }

    /**
     * Verificar si el email del usuario está verificado
     */
    public function isEmailVerified(): bool
    {
        return $this->verificado == 1;
    }

    /**
     * Marcar email como verificado
     */
    public function markEmailAsVerified(): void
    {
        $this->update(['verificado' => 1]);
    }

    /**
     * Generar token de verificación de email
     */
    public function generateEmailVerificationToken(): string
    {
        // Eliminar tokens anteriores
        $this->emailVerifications()->delete();

        // Generar nuevo token
        $token = \Illuminate\Support\Str::random(64);

        $this->emailVerifications()->create([
            'email' => $this->email,
            'token' => $token,
            'expires_at' => now()->addHours(24), // Token válido por 24 horas
        ]);

        return $token;
    }

    /**
     * Verificar token de email
     */
    public function verifyEmailToken(string $token): bool
    {
        $verification = $this->emailVerifications()
            ->valid()
            ->where('token', $token)
            ->first();

        if ($verification) {
            $verification->markAsVerified();
            $this->markEmailAsVerified();
            return true;
        }

        return false;
    }
}
