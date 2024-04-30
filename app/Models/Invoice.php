<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
     public function reservation(): HasOne
    {
        return $this->hasOne(reservation::class);
    }
}
