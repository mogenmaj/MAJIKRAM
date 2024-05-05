<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $fillable=["first_name", "last_name", "birth_date", "address", "country", "city", "status", "phone", "nationality", "carte_number" ];
     public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

}
