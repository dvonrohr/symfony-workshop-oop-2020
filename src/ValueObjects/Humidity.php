<?php

namespace App\ValueObjects;


class Humidity
{
    private float $humidity;

    public function __construct(float $humidity)
    {
        if ($humidity > 1.0 || $humidity < 0.1) {
            throw new \InvalidArgumentException('Should be between 0 and 1');
        }
        $this->humidity = $humidity;
    }

    public function getValue(): float {
        return $this->humidity;
    }

    public function equals(self $humidity): bool
    {
        return $this->humidity === $humidity->getValue();
    }
}