<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de Producto con servicios y productos disponibles.
 */
class Product extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category',
        'is_available',
        'duration_minutes',
        'difficulty_level',
        'whats_included',
        'delivery_method',
    ];

    /**
     * Devuelve el precio formateado con símbolo de moneda.
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Devuelve la duración formateada en horas y minutos.
     *
     * @return string
     */
    public function getFormattedDurationAttribute()
    {
        if (!$this->duration_minutes) {
            return 'N/A';
        }

        $hours = floor($this->duration_minutes / 60);
        $minutes = $this->duration_minutes % 60;

        if ($hours > 0) {
            return $hours . 'h ' . $minutes . 'm';
        }

        return $minutes . ' minutos';
    }

    /**
     * Verifica si el producto está disponible.
     *
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->is_available;
    }

    /**
     * Relación: Un producto tiene muchas órdenes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Relación: Un producto tiene muchos usuarios a través de órdenes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'orders')
                ->withPivot('total_amount', 'status', 'order_date')
                ->withTimestamps();
    }

    /**
     * Get the user services for this product
     */
    public function userServices()
    {
        return $this->hasMany(UserService::class);
    }
}
