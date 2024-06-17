<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'poster_path', 'event_date', 'venue_id'];

    public function getPosterUrlAttribute()
    {
        if ($this->poster_path) {
            return asset('storage/' . $this->poster_path);
        }
        // Можно добавить fallback URL, если постер отсутствует
        return asset('images/default-poster.jpg');
    }
}
