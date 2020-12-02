<?php

namespace App\DataObjects;

class Temperature
{
    private float $temperature;

    public function __construct(float $temperature)
    {
        $this->temperature = $temperature;
    }

    public function __toString(): string {
        return $this->temperature;
    }
}