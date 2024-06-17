<?php

namespace App\Services;

use Stevebauman\Location\Facades\Location;

class GeoLocationService
{
    public function getLocationByIp($ip)
    {
        return Location::get($ip);
    }
}
