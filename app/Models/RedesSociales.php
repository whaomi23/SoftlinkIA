<?php
//11
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedesSociales extends Model
{
    use HasFactory;

    protected $table = 'redes_sociales';

    protected $fillable = [
        'usuario_id',
        'nombre',
        'url',
        'status'
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
