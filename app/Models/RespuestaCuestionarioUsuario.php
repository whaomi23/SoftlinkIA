<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RespuestaCuestionarioUsuario extends Model
{
    use HasFactory;

    protected $table = 'respuestas_cuestionario_usuario';

    protected $fillable = [
        'usuario_id',
        'subnivel_id',
        'pregunta_id',
        'respuesta_seleccionada',
        'es_correcta',
        'intento_numero',
    ];

    protected $casts = [
        'respuesta_seleccionada' => 'integer',
        'es_correcta' => 'boolean',
        'intento_numero' => 'integer',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function subnivel()
    {
        return $this->belongsTo(Subnivel::class);
    }

    public function pregunta()
    {
        return $this->belongsTo(PreguntaCuestionario::class, 'pregunta_id');
    }

    // Scopes
    public function scopePorUsuario($query, $usuarioId)
    {
        return $query->where('usuario_id', $usuarioId);
    }

    public function scopePorSubnivel($query, $subnivelId)
    {
        return $query->where('subnivel_id', $subnivelId);
    }

    public function scopePorIntento($query, $intentoNumero)
    {
        return $query->where('intento_numero', $intentoNumero);
    }

    public function scopeCorrectas($query)
    {
        return $query->where('es_correcta', true);
    }
}
