<?php
//9
//////
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $fillable = [
        'usuario_id',
        'curso_id',
        'fecha_inscripcion',
        'progreso',
        'status',
        'metodo_pago',
        'monto_pagado',
    ];

    protected $casts = [
        'fecha_inscripcion' => 'datetime',
        'progreso' => 'decimal:2',
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

    /**
     * Scope para inscripciones activas
     */
    public function scopeActivas($query)
    {
        return $query->where('status', 'activo');
    }

    /**
     * Scope para inscripciones completadas
     */
    public function scopeCompletadas($query)
    {
        return $query->where('status', 'completado');
    }

    /**
     * Scope para inscripciones canceladas
     */
    public function scopeCanceladas($query)
    {
        return $query->where('status', 'cancelado');
    }

    /**
     * Calcular progreso basado en lecciones completadas
     */
    public function calcularProgreso()
    {
        $totalLecciones = $this->curso->lecciones()->count();
        if ($totalLecciones === 0) {
            return 0;
        }

        $leccionesCompletadas = ProgresoLeccion::where('usuario_id', $this->usuario_id)
            ->whereIn('leccion_id', $this->curso->lecciones()->pluck('subniveles.id'))
            ->where('completado', true)
            ->count();

        return round(($leccionesCompletadas / $totalLecciones) * 100, 2);
    }

    /**
     * Obtener el número de lecciones completadas
     */
    public function getLeccionesCompletadasAttribute()
    {
        return ProgresoLeccion::where('usuario_id', $this->usuario_id)
            ->whereIn('leccion_id', $this->curso->lecciones()->pluck('subniveles.id'))
            ->where('completado', true)
            ->count();
    }

    /**
     * Obtener el total de lecciones del curso
     */
    public function getTotalLeccionesAttribute()
    {
        return $this->curso->lecciones()->count();
    }

    /**
     * Reactivar una inscripción cancelada o completada
     */
    public function reactivar()
    {
        $this->update([
            'fecha_inscripcion' => now(),
            'progreso' => 0.00,
            'status' => 'activo',
        ]);

        return $this;
    }
}
