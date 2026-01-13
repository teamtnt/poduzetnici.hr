<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'price',
        'type',
        'category',
        'duration_days',
        'expires_at',
        'is_anonymous',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('expires_at', '>', now());
    }
}
