<?php

namespace App\Weather\Model;

final class Humidity
{
    private float $humidity;

    public function __construct(float $humidity)
    {
        if ($humidity > 1 || $humidity < 0) {
            throw new \InvalidArgumentException('Should be between 0 and 1');
        }
        $this->humidity = $humidity;
    }

    public function getValue()
    {
        return $this->humidity;
    }

    public function equals(self $other): bool
    {
        return $this->humidity === $other->humidity;
    }
}