<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreguntaCuestionario extends Model
{
    use HasFactory;

    protected $table = 'preguntas_cuestionario';

    protected $fillable = [
        'subnivel_id',
        'numero_pregunta',
        'pregunta_texto',
        'opcion_1',
        'opcion_2',
        'opcion_3',
        'respuesta_correcta',
    ];

    protected $casts = [
        'numero_pregunta' => 'integer',
        'respuesta_correcta' => 'integer',
    ];

    // Relaciones
    public function subnivel()
    {
        return $this->belongsTo(Subnivel::class);
    }

    public function respuestasUsuarios()
    {
        return $this->hasMany(RespuestaCuestionarioUsuario::class, 'pregunta_id');
    }

    // Scopes
    public function scopePorSubnivel($query, $subnivelId)
    {
        return $query->where('subnivel_id', $subnivelId);
    }

    public function scopeOrdenadas($query)
    {
        return $query->orderBy('numero_pregunta');
    }

    // Accessors
    public function getOpcionesAttribute()
    {
        return [
            1 => $this->opcion_1,
            2 => $this->opcion_2,
            3 => $this->opcion_3,
        ];
    }

    // Métodos
    public function esCorrecta($respuestaSeleccionada)
    {
        return (int)$respuestaSeleccionada === (int)$this->respuesta_correcta;
    }
}
