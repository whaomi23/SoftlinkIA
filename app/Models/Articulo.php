<?php
//1
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'nivel_dificultad',
        'categoria',
        'contenido',
        'url_imagen',
        'url_imagen_banner',
        'slug',
        'status',
        'vistas',
        'autor_id'
    ];

    /**
     * Usar slug como clave de ruta en lugar de ID
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relaciones
    public function autor()
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    /**
     * Incrementar el contador de vistas del artículo
     */
    public function incrementarVistas()
    {
        $this->increment('vistas');
    }

    /**
     * Obtener los artículos más leídos
     */
    public static function masLeidos($limit = 5)
    {
        return self::where('status', 'publicado')
            ->orderByDesc('vistas')
            ->limit($limit)
            ->get();
    }

    /**
     * Obtener los artículos menos leídos
     */
    public static function menosLeidos($limit = 5)
    {
        return self::where('status', 'publicado')
            ->orderBy('vistas')
            ->limit($limit)
            ->get();
    }

    /**
     * Obtener los niveles de dificultad disponibles
     */
    public static function getNivelesDificultad()
    {
        return [
            'Básico / Introductorio',
            'Fácil',
            'Intermedio bajo',
            'Intermedio',
            'Intermedio alto',
            'Avanzado',
            'Experto',
            'Investigación / Académico',
            'Crítico / Analítico',
            'Práctico / Aplicado'
        ];
    }

    /**
     * Boot del modelo para generar slug automáticamente
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($articulo) {
            $articulo->slug = $articulo->generateUniqueSlug();
        });

        static::updating(function ($articulo) {
            // Solo regenerar slug si cambió el título
            if ($articulo->isDirty('titulo')) {
                $articulo->slug = $articulo->generateUniqueSlug();
            }
        });
    }

    /**
     * Generar un slug único basado en el título
     */
    public function generateUniqueSlug()
    {
        $slug = Str::slug($this->titulo);
        $originalSlug = $slug;
        $counter = 1;

        // Verificar si el slug ya existe
        while (static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Buscar artículo por slug
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->firstOrFail();
    }
}
