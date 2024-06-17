<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\GeoLocationService;
use App\Services\WeatherService;

class WeatherMiddleware
{
    protected $geoLocationService;
    protected $weatherService;

    public function __construct(GeoLocationService $geoLocationService, WeatherService $weatherService)
    {
        $this->geoLocationService = $geoLocationService;
        $this->weatherService = $weatherService;
    }

    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $ip = $request->ip();
            $location = $this->geoLocationService->getLocationByIp($ip);

            $latitude = $location->latitude ?? 40.7128; // Значение по умолчанию (Нью-Йорк)
            $longitude = $location->longitude ?? -74.0060; // Значение по умолчанию (Нью-Йорк)

            $weatherData = $this->weatherService->getCurrentWeather($latitude, $longitude);

            // Передача данных о погоде в представления через глобальные переменные
            view()->share('weatherData', $weatherData);
        }

        return $next($request);
    }
}
