<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KibiContact extends Model
{
    use HasFactory;

    protected $table = 'kibi_contacts';

    protected $fillable = [
        'nombre',
        'apellidos',
        'celular',
        'email',
        'institucion',
        'puesto',
        'ciudad',
        'estado',
        'sitio_web',
        'whatsapp',
        'email_contact',
        'status',
        'notas',
        'contactado_at',
    ];

    protected $casts = [
        'whatsapp' => 'boolean',
        'email_contact' => 'boolean',
        'contactado_at' => 'datetime',
    ];

    // Scopes para filtros comunes
    public function scopeNuevos($query)
    {
        return $query->where('status', 'nuevo');
    }

    public function scopeContactados($query)
    {
        return $query->where('status', 'contactado');
    }

    public function scopeInteresados($query)
    {
        return $query->where('status', 'interesado');
    }

    public function scopeConvertidos($query)
    {
        return $query->where('status', 'convertido');
    }

    // Accessor para nombre completo
    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellidos;
    }

    // Método para marcar como contactado
    public function marcarComoContactado($notas = null)
    {
        $this->update([
            'status' => 'contactado',
            'contactado_at' => now(),
            'notas' => $notas ? $this->notas . "\n" . $notas : $this->notas,
        ]);
    }

    // Método para cambiar status
    public function cambiarStatus($status, $notas = null)
    {
        $this->update([
            'status' => $status,
            'notas' => $notas ? $this->notas . "\n" . $notas : $this->notas,
        ]);
    }
}
