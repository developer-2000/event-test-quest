<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'poster_path', 'event_date', 'venue_id'];

    // Определение отношения с Venue
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
