<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=["start_date", "end_date", "client_id",];

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
        return $this->belongsToMany(Room::class , 'reservation_room')->withTimestamps();
    }
    
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getFormattedNameAttribute(): string  {
        return $this->client->last_name .' ' . $this->start_date;
    }
}

