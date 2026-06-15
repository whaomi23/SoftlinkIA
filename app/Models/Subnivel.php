<?php
//12
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subnivel extends Model
{
    use HasFactory;

    protected $table = 'subniveles';

    protected $fillable = [
        'nivel_id',
        'numero',
        'titulo',
        'descripcion',
        'url_iframe',
        'url_video',
        'video_archivo_path',
        'video_archivo_nombre',
        'video_archivo_tipo',
        'video_archivo_tamaño',
        'usar_iframe',
        'usar_url_video',
        'usar_video_archivo',
        'recurso_path',
        'recurso_nombre',
        'recurso_tipo',
        'requiere_cuestionario',
    ];

    // Casts para arrays JSON de recursos
    protected $casts = [
        'recurso_path' => 'array',
        'recurso_nombre' => 'array',
        'recurso_tipo' => 'array',
        'requiere_cuestionario' => 'boolean',
    ];

    // Relaciones
    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function preguntas()
    {
        return $this->hasMany(PreguntaCuestionario::class, 'subnivel_id')->orderBy('numero_pregunta');
    }

    public function respuestasUsuarios()
    {
        return $this->hasMany(RespuestaCuestionarioUsuario::class, 'subnivel_id');
    }

    // Scopes
    public function scopeOrdered($query)
    {
        return $query->orderBy('numero');
    }

    // Accessors
    public function getTieneRecursoAttribute()
    {
        return !is_null($this->recurso_path);
    }

    public function getTieneIframeAttribute()
    {
        return !is_null($this->url_iframe);
    }

    public function getTieneUrlVideoAttribute()
    {
        return !is_null($this->url_video);
    }

    public function getTieneVideoArchivoAttribute()
    {
        return !is_null($this->video_archivo_path);
    }

    public function getTipoContenidoAttribute()
    {
        if ($this->usar_iframe && $this->tiene_iframe) {
            return 'iframe';
        } elseif ($this->usar_url_video && $this->tiene_url_video) {
            return 'url_video';
        } elseif ($this->usar_video_archivo && $this->tiene_video_archivo) {
            return 'video_archivo';
        }
        return null;
    }

    public function getTieneContenidoMultimediaAttribute()
    {
        return $this->tiene_iframe || $this->tiene_url_video || $this->tiene_video_archivo;
    }

    // Métodos para obtener URLs de video embebidas
    public function getUrlVideoEmbebidaAttribute()
    {
        if (!$this->url_video) {
            return null;
        }

        $url = $this->url_video;

        // YouTube
        if (strpos($url, 'youtube.com/watch') !== false) {
            preg_match('/[?&]v=([^&]+)/', $url, $matches);
            return isset($matches[1]) ? "https://www.youtube.com/embed/{$matches[1]}" : null;
        }

        if (strpos($url, 'youtu.be/') !== false) {
            preg_match('/youtu.be\/([^?]+)/', $url, $matches);
            return isset($matches[1]) ? "https://www.youtube.com/embed/{$matches[1]}" : null;
        }

        // Vimeo
        if (strpos($url, 'vimeo.com/') !== false) {
            preg_match('/vimeo.com\/(\d+)/', $url, $matches);
            return isset($matches[1]) ? "https://player.vimeo.com/video/{$matches[1]}" : null;
        }

        // Odysee
        if (strpos($url, 'odysee.com/') !== false) {
            // Odysee usa iframe embebido directamente
            return $url;
        }

        // Twitch
        if (strpos($url, 'twitch.tv/') !== false) {
            preg_match('/twitch.tv\/([^\/]+)/', $url, $matches);
            return isset($matches[1]) ? "https://player.twitch.tv/?channel={$matches[1]}&parent=" . request()->getHost() : null;
        }

        return $url; // Retornar URL original si no se puede convertir
    }

    // Método para obtener el tamaño del archivo de video formateado
    public function getVideoArchivoTamañoFormateadoAttribute()
    {
        if (!$this->video_archivo_tamaño) {
            return null;
        }

        $bytes = $this->video_archivo_tamaño;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
