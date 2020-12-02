<?php

namespace App\ValueObjects;

class Wind
{
    private int $wind;

    public function __construct(int $wind)
    {
        $this->wind = $wind;
    }

    public function getValue(): float
    {
        return $this->wind;
    }

    public function equals(self $wind): string {
        return $this->wind === $wind->getValue();
    }
}