<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable=["room_number", "floor_number", "category_id", "price"];
    public function roomcategory(): BelongsTo
    {
        return $this->belongsTo(Roomcategory::class);
    }
    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
