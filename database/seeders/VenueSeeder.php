<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venue;

class VenueSeeder extends Seeder
{
    public function run()
    {
        // Создаем 20 площадок с помощью фабрики
        Venue::factory()->count(20)->create();
    }
}
