<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class CasoExito extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos
     */
    protected $table = 'casos_exito';

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
        'autor_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relación con el autor (usuario)
     */
    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    /**
     * Obtener los niveles de dificultad disponibles
     */
    public static function getNivelesDificultad(): array
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
     * Boot method para generar slug automáticamente
     */
    protected static function boot()
    {
        parent::boot();
        // Generar slug único al crear y al actualizar cuando cambie el título
        static::creating(function ($casoExito) {
            if (empty($casoExito->slug)) {
                $casoExito->slug = self::generateUniqueSlug($casoExito->titulo);
            } else {
                // Si se proporciona un slug manual, asegurarse de que sea único
                $casoExito->slug = self::generateUniqueSlug($casoExito->slug);
            }
        });

        static::updating(function ($casoExito) {
            // Si el título cambió y el slug no fue modificado manualmente, regenerar
            if ($casoExito->isDirty('titulo') && !$casoExito->isDirty('slug')) {
                $casoExito->slug = self::generateUniqueSlug($casoExito->titulo, $casoExito->id);
            }
            // Si el slug fue modificado manualmente, normalizar y asegurar unicidad
            if ($casoExito->isDirty('slug')) {
                $casoExito->slug = self::generateUniqueSlug($casoExito->slug, $casoExito->id);
            }
        });
    }

    /**
     * Genera un slug único para el título dado.
     * Si ya existe un registro con el mismo slug, añade un sufijo incremental.
     *
     * @param string $value
     * @param int|null $ignoreId id a ignorar (útil en update)
     * @return string
     */
    protected static function generateUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'caso-exito';
        $slug = $base;
        $counter = 1;

        while (self::where('slug', $slug)->when($ignoreId, function ($q, $ignoreId) {
            return $q->where('id', '!=', $ignoreId);
        })->exists()) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    /**
     * Scope para casos de éxito publicados
     */
    public function scopePublicados($query)
    {
        return $query->where('status', 'publicado');
    }

    /**
     * Scope para casos de éxito por autor
     */
    public function scopePorAutor($query, $autorId)
    {
        return $query->where('autor_id', $autorId);
    }

    /**
     * Scope para casos de éxito por categoría
     */
    public function scopePorCategoria($query, $categoria)
    {
        return $query->where('categoria', 'LIKE', '%' . $categoria . '%');
    }

    /**
     * Scope para búsqueda de texto
     */
    public function scopeBuscar($query, $termino)
    {
        return $query->where(function($q) use ($termino) {
            $q->where('titulo', 'LIKE', '%' . $termino . '%')
              ->orWhere('subtitulo', 'LIKE', '%' . $termino . '%')
              ->orWhere('contenido', 'LIKE', '%' . $termino . '%');
        });
    }

    /**
     * Obtener el tiempo de lectura estimado
     */
    public function getTiempoLecturaAttribute(): int
    {
        $text = strip_tags($this->contenido ?? '');
        $words = str_word_count($text);
        return max(1, (int) ceil($words / 200));
    }

    /**
     * Obtener la URL de la imagen principal
     */
    public function getImagenUrlAttribute(): ?string
    {
        if ($this->url_imagen) {
            return asset('storage/' . ltrim($this->url_imagen, '/'));
        }
        
        return $this->url_imagen_banner;
    }

    /**
     * Obtener el nombre completo del autor
     */
    public function getAutorNombreCompletoAttribute(): string
    {
        return trim($this->autor->name . ' ' . $this->autor->apellido_paterno . ' ' . $this->autor->apellido_materno);
    }

    /**
     * Obtener las categorías como array
     */
    public function getCategoriasArrayAttribute(): array
    {
        if (empty($this->categoria)) {
            return [];
        }
        
        return array_unique(array_filter(array_map('trim', explode(',', $this->categoria))));
    }

    /**
     * Verificar si el caso de éxito está publicado
     */
    public function isPublicado(): bool
    {
        return $this->status === 'publicado';
    }

    /**
     * Verificar si el caso de éxito es borrador
     */
    public function isBorrador(): bool
    {
        return $this->status === 'borrador';
    }

    /**
     * Verificar si el caso de éxito está archivado
     */
    public function isArchivado(): bool
    {
        return $this->status === 'archivado';
    }
}
