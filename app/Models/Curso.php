<?php
//6
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'url_imagen',
        'creador_id',
        'categoria_id',
        'precio',
        'duracion_horas',
        'nivel_dificultad',
        'activo',
        'cupo_maximo',
        'fecha_inicio',
        'fecha_fin',
        'slug',
        'requisitos_previos',
        'objetivos_aprendizaje',
        'url_video',
        'creador_nombre',
        'creador_apellido',
        'creador_profesion',
        'creador_descripcion',
        'facebook_usuario',
        'twitter_usuario',
        'linkedin_usuario',
        'instagram_usuario',
        'vk_usuario',
        'tiktok_usuario',
        'comentarios_aprobacion',
        'fecha_aprobacion',
        'aprobado_por',
        'motivo_rechazo',
        'fecha_rechazo',
        'rechazado_por',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'duracion_horas' => 'integer',
        'activo' => 'boolean',
        'cupo_maximo' => 'integer',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'fecha_aprobacion' => 'datetime',
        'fecha_rechazo' => 'datetime',
    ];

    // Relaciones
    public function creador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'curso_id');
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class, 'curso_id');
    }

    public function niveles()
    {
        return $this->hasMany(Nivel::class)->orderBy('numero');
    }

    public function aprobadoPor()
    {
        return $this->belongsTo(User::class, 'aprobado_por');
    }

    public function rechazadoPor()
    {
        return $this->belongsTo(User::class, 'rechazado_por');
    }

    /**
     * Scope para cursos activos
     */
    public function scopeActivo($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Scope para filtrar por categoría
     */
    public function scopePorCategoria($query, $categoriaId)
    {
        return $query->where('categoria_id', $categoriaId);
    }

    /**
     * Scope para cursos pendientes de aprobación
     */
    public function scopePendientes($query)
    {
        return $query->where('activo', false)
                    ->whereNull('motivo_rechazo');
    }

    /**
     * Scope para cursos rechazados
     */
    public function scopeRechazados($query)
    {
        return $query->where('activo', false)
                    ->whereNotNull('motivo_rechazo');
    }

    /**
     * Scope para cursos aprobados
     */
    public function scopeAprobados($query)
    {
        return $query->where('activo', true)
                    ->whereNotNull('fecha_aprobacion');
    }

    /**
     * Obtener el número de inscripciones activas
     */
    public function getInscripcionesActivasAttribute()
    {
        return $this->inscripciones()->activas()->count();
    }

    /**
     * Verificar si el curso tiene cupos disponibles
     */
    public function tieneCuposDisponibles()
    {
        if ($this->cupo_maximo === null) {
            return true; // Sin límite de cupos
        }

        return $this->inscripciones_activas < $this->cupo_maximo;
    }

    /**
     * Obtener el progreso promedio del curso
     */
    public function getProgresoPromedioAttribute()
    {
        $inscripciones = $this->inscripciones()->activas()->get();

        if ($inscripciones->isEmpty()) {
            return 0;
        }

        return $inscripciones->avg('progreso');
    }

    /**
     * Obtener el número total de subniveles
     */
    public function getTotalSubnivelesAttribute()
    {
        $total = 0;
        foreach ($this->niveles as $nivel) {
            $total += $nivel->subniveles()->count();
        }
        return $total;
    }

    /**
     * Verificar si el curso tiene niveles configurados
     */
    public function tieneNiveles()
    {
        return $this->niveles()->count() > 0;
    }

    /**
     * Obtener todos los subniveles del curso
     */
    public function getAllSubniveles()
    {
        $subniveles = collect();
        foreach ($this->niveles as $nivel) {
            $subniveles = $subniveles->merge($nivel->subniveles);
        }
        return $subniveles;
    }

    /**
     * Obtener todas las "lecciones" del curso (subniveles)
     * Este método es necesario para compatibilidad con el sistema de progreso
     */
    public function lecciones()
    {
        return $this->hasManyThrough(
            Subnivel::class,
            Nivel::class,
            'curso_id', // Foreign key on niveles table
            'nivel_id', // Foreign key on subniveles table
            'id', // Local key on cursos table
            'id' // Local key on niveles table
        )->select('subniveles.*') // Especificar que queremos todas las columnas de subniveles
         ->orderBy('niveles.numero')
         ->orderBy('subniveles.numero');
    }
}
