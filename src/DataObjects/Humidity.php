<?php

namespace App\DataObjects;

class Humidity
{
    private float $humidity;

    public function __construct(float $humidity)
    {
        $this->humidity = $humidity;
    }

    public function __toString(): string {
        return $this->humidity;
    }
}