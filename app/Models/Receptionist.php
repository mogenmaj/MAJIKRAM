<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Receptionist extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "first_name", "last_name", "birth_date", "phone", "email", "address", "hire_date","employement_status"] ;
       public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}



