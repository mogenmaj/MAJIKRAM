<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;
       public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}



