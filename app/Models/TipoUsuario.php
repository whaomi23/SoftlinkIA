<?php
//13
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $table = 'tipos_usuarios';

    protected $fillable = ['nombre', 'descripcion'];

    // Relaciones
    public function usuarios()
    {
        return $this->hasMany(User::class, 'tipo_usuario_id');
    }

    public function funciones()
    {
        return $this->hasMany(FuncionUsuario::class, 'tipo_usuario_id');
    }

    // Scopes para roles específicos
    public function scopeAdmin($query)
    {
        return $query->where('nombre', 'administrador');
    }

    public function scopeCreador($query)
    {
        return $query->where('nombre', 'creador');
    }

    public function scopeEstudiante($query)
    {
        return $query->where('nombre', 'estudiante');
    }

    public function scopeMarketing($query)
    {
        return $query->where('nombre', 'marketing');
    }

    // Métodos de verificación de roles
    public function isAdmin()
    {
        return strtolower($this->nombre) === 'administrador';
    }

    public function isCreador()
    {
        return strtolower($this->nombre) === 'creador';
    }

    public function isEstudiante()
    {
        return strtolower($this->nombre) === 'estudiante';
    }

    public function isMarketing()
    {
        return strtolower($this->nombre) === 'marketing';
    }

    // Método para obtener permisos del rol
    public function getPermisosAttribute()
    {
        $permisos = [];

        switch (strtolower($this->nombre)) {
            case 'administrador':
                $permisos = [
                    'gestionar_usuarios',
                    'gestionar_cursos',
                    'gestionar_articulos',
                    'gestionar_certificados',
                    'aprobar_cursos',
                    'ver_todos_cursos',
                    'gestionar_categorias',
                    'ver_estadisticas'
                ];
                break;
            case 'creador':
                $permisos = [
                    'crear_cursos',
                    'editar_propios_cursos',
                    'ver_propios_cursos',
                    'gestionar_niveles',
                    'subir_recursos',
                    'ver_estadisticas_propias',
                    'crear_articulos',
                    'editar_propios_articulos',
                    'ver_propios_articulos',
                    'gestionar_articulos'
                ];
                break;
            case 'estudiante':
                $permisos = [
                    'inscribirse_cursos',
                    'ver_cursos_inscritos',
                    'descargar_certificados',
                    'ver_progreso',
                    'ver_articulos_publicados'
                ];
                break;
            case 'marketing':
                $permisos = [
                    'ver_estadisticas',
                    'gestionar_campanas',
                    'ver_usuarios_segmentados',
                    'gestionar_contenido_promocional',
                    'ver_articulos_publicados',
                    'gestionar_usuarios',
                    'gestionar_cursos',
                    'gestionar_articulos',
                    'gestionar_certificados',
                    'aprobar_cursos',
                    'ver_todos_cursos',
                    'gestionar_categorias',
                    'gestionar_contactos',
                    'otorgar_denegar_accesos',
                    'aprobar_solicitudes_roles'
                ];
                break;
        }

        return $permisos;
    }
}
