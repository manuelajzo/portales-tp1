<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de Post del blog con contenido y metadatos.
 */
class BlogPost extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category',
        'short_description',
        'is_published',
        'published_at'
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime'
    ];

    /**
     * Obtiene la imagen del post o devuelve una imagen por defecto si no existe.
     *
     * @param string $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        if ($value && file_exists(public_path($value))) {
            return $value;
        }

        return 'img/placeholder.jpg';
    }
}
