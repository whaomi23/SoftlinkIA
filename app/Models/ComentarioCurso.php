<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComentarioCurso extends Model
{
    protected $table = 'comentarios_curso';

    protected $fillable = [
        'curso_id',
        'usuario_id',
        'nivel_id',
        'comentario',
        'respuesta',
        'respuesta_fecha',
        'leido_por_creador',
        'parent_id',
    ];

    protected $casts = [
        'respuesta_fecha' => 'datetime',
        'leido_por_creador' => 'boolean',
    ];

    /**
     * Relación con el curso
     */
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    /**
     * Relación con el usuario que hizo el comentario
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el nivel relacionado
     */
    public function nivel(): BelongsTo
    {
        return $this->belongsTo(Nivel::class);
    }

    /**
     * Scope para comentarios sin respuesta
     */
    public function scopeSinRespuesta($query)
    {
        return $query->whereNull('respuesta');
    }

    /**
     * Scope para comentarios con respuesta
     */
    public function scopeConRespuesta($query)
    {
        return $query->whereNotNull('respuesta');
    }

    /**
     * Scope para comentarios no leídos por el creador
     */
    public function scopeNoLeidos($query)
    {
        return $query->where('leido_por_creador', false);
    }

    // Relaciones para hilos
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ComentarioCurso::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ComentarioCurso::class, 'parent_id');
    }
}
