<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        // Генерация случайного изображения и сохранение его локально
        $image = $this->faker->image(public_path('images/events'), 1200, 800, null, false);

        // Изменение размера изображения
        $img = Image::make(public_path('images/events/' . $image));
        $img->fit(1200, 800);
        $img->save();

        return [
            'name' => $this->faker->sentence,
            'poster_path' => '/images/events/' . $image,
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'venue_id' => Venue::factory()->create()->id
        ];
    }
}

