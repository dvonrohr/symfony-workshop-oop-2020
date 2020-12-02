<?php

namespace App\Weather;

use App\Weather\Model\Weather;

interface CityWeatherFetcherInterface
{
    public function fetch(): Weather;
    public function getName(): string;
}