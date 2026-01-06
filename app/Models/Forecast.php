<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Forecast extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'temperature', 'date'];

    protected $casts = [
        'date' => 'date',
        'temperature' => 'decimal:2',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
