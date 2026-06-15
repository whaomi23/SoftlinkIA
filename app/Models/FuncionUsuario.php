<?php
//8
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionUsuario extends Model
{
    use HasFactory;

    protected $table = 'funciones_usuario';

    protected $fillable = ['tipo_usuario_id', 'funcion'];

    // Relaciones
    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }
}
