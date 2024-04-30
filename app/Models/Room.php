<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function roomcategory(): BelongsTo
    {
        return $this->belongsTo(Roomcategory::class);
    }
    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
