<?php

namespace App\Weather;

use App\Weather\Model\Weather;

Interface WeatherRequestHandlerInterface
{
    public function fetch(string $city): Weather;
}