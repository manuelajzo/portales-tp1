<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'service_type',
        'price',
        'status',
        'purchased_at',
        'expires_at',
        'notes',
    ];

    protected $casts = [
        'purchased_at' => 'datetime',
        'expires_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    /**
     * Get the user that owns the service
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product associated with the service
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
