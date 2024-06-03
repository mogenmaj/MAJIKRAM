<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ["amount", "payment_type","reservation_id"] ;
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
     public function reservation(): BelongsTo
    {
        return $this->belongsTo(reservation::class);
    }
}
