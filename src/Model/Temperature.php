<?php

namespace App\Model;

final class Temperature
{
    private float $temperature;

    public function __construct(float $temperature)
    {
        if ($temperature < -273.15) {
            throw new \InvalidArgumentException('Temperature is not legit :(');
        }
        $this->temperature = $temperature;
    }

    public function getValue(): float {
        return $this->temperature;
    }

    public function equals(self $other): bool
    {
        return $this->temperature === $other->temperature;
    }
}