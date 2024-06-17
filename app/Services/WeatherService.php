<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = Config::get('services.stormglass.api_key');
    }

    public function getCurrentWeather($latitude, $longitude)
    {
        $client = new Client([
            'base_uri' => 'https://api.stormglass.io/v2/',
            'headers' => [
                'Authorization' => $this->apiKey,
            ],
        ]);

        $response = $client->get('weather/point', [
            'query' => [
                'lat' => $latitude,
                'lng' => $longitude,
                'params' => 'airTemperature,windSpeed,precipitation', // Правильные параметры: airTemperature, windSpeed, precipitation
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

}
