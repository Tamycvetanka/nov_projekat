<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Weather extends Model
{
    use HasFactory;

    protected $table = 'weather';

    protected $fillable = ['city_id', 'temperature'];

    protected $casts = [
        'temperature' => 'decimal:2',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
