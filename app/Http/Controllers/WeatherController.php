<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Services\WeatherService;
use App\Services\GeoLocationService;

class WeatherController extends Controller
{
    protected $weatherService;
    protected $geoLocationService;

    public function __construct(WeatherService $weatherService, GeoLocationService $geoLocationService)
    {
        $this->weatherService = $weatherService;
        $this->geoLocationService = $geoLocationService;
    }

    public function showWeather(Request $request)
    {
        $ip = $request->ip();
        $location = $this->geoLocationService->getLocationByIp($ip);

        $latitude = $location->latitude ?? 40.7128; // Значение по умолчанию (Нью-Йорк)
        $longitude = $location->longitude ?? -74.0060; // Значение по умолчанию (Нью-Йорк)

        $weatherData = $this->weatherService->getCurrentWeather($latitude, $longitude);

        // Представление данных о погоде в виде массива
        return response()->json($weatherData);
    }
}
