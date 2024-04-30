<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;
    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
