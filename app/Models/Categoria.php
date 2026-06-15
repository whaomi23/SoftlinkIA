<?php
//3
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relaciones
    public function cursos()
    {
        return $this->hasMany(Curso::class, 'categoria_id');
    }

    /**
     * Scope para categorías con cursos activos
     */
    public function scopeConCursosActivos($query)
    {
        return $query->whereHas('cursos', function ($q) {
            $q->where('activo', true);
        });
    }
}
