<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

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

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime'
    ];

    /**
     * Get the post's image or return placeholder if not found
     */
    public function getImageAttribute($value)
    {
        if ($value && file_exists(public_path($value))) {
            return $value;
        }
        
        return 'img/placeholder.jpg';
    }
}
