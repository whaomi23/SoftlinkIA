<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgresoLeccion extends Model
{
    protected $table = 'progreso_lecciones';

    protected $fillable = [
        'usuario_id',
        'curso_id',
        'leccion_id', // En nuestro caso será subnivel_id
        'completado',
        'completado_en',
        'tiempo_visto',
        'cuestionario_aprobado',
        'intento_cuestionario',
    ];

    protected $casts = [
        'completado' => 'boolean',
        'completado_en' => 'datetime',
        'tiempo_visto' => 'integer',
        'cuestionario_aprobado' => 'boolean',
        'intento_cuestionario' => 'integer',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function leccion()
    {
        return $this->belongsTo(Subnivel::class, 'leccion_id');
    }

    // Scopes
    public function scopeCompletadas($query)
    {
        return $query->where('completado', true);
    }

    public function scopePorUsuario($query, $usuarioId)
    {
        return $query->where('usuario_id', $usuarioId);
    }

    public function scopePorCurso($query, $cursoId)
    {
        return $query->where('curso_id', $cursoId);
    }
}
