<?php

namespace App\DataObjects;

class Wind
{
    private int $wind;

    public function __construct(int $wind)
    {
        $this->wind = $wind;
    }

    public function __toString(): string {
        return $this->wind;
    }
}