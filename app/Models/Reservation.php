<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=["start_date", "end_date"];
    public function receptionist(): BelongsTo
    {
        return $this->belongsTo(Receptionist::class);
    }
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class);
    }
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}

