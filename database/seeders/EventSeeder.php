<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Venue;

class EventSeeder extends Seeder
{
    /**
     * Создаем 50 событий
     *
     * @return void
     */
    public function run()
    {
        Event::factory()->count(50)->create([
            'venue_id' => Venue::inRandomOrder()->first()->id
        ]);
    }
}
