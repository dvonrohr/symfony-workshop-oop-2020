<?php

namespace App\Model;

final class Wind
{
    private int $wind;

    public function __construct(int $wind)
    {
        if ($wind < 0) {
            throw new \InvalidArgumentException('Wind is not legit :(');
        }
        $this->wind = $wind;
    }

    public function getValue(): float
    {
        return $this->wind;
    }

    public function equals(self $other): string {
        return $this->wind === $other->wind;
    }
}