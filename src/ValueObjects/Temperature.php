<?php

namespace App\ValueObjects;

class Temperature
{
    private float $temperature;

    public function __construct(float $temperature)
    {
        $this->temperature = $temperature;
    }

    public function getValue(): float {
        return $this->temperature;
    }

    public function equals(self $temperature): bool
    {
        return $this->temperature === $temperature->getValue();
    }
}