<?php
//10
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'niveles';

    protected $fillable = [
        'curso_id',
        'numero',
        'titulo',
        'descripcion',
    ];

    // Relaciones
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function subniveles()
    {
        return $this->hasMany(Subnivel::class)->orderBy('numero');
    }

    // Scopes
    public function scopeOrdered($query)
    {
        return $query->orderBy('numero');
    }

    // Accessors
    public function getTotalSubnivelesAttribute()
    {
        return $this->subniveles()->count();
    }
}
