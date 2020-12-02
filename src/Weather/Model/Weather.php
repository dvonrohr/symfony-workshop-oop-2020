<?php

namespace App\Weather\Model;

final class Weather
{
    private Humidity $humidity;
    private Temperature $temperature;
    private ?Wind $wind;

    public function __construct(
        Humidity $humidity,
        Temperature $temperature,
        ?Wind $wind = null
    )
    {
        $this->humidity = $humidity;
        $this->temperature = $temperature;
        $this->wind = $wind;
    }

    public function getHumidity(): Humidity
    {
        return $this->humidity;
    }

    public function getWind(): ?Wind
    {
        return $this->wind;
    }

    public function getTemperature(): Temperature
    {
        return $this->temperature;
    }

    public function equals(self $other): bool
    {
        return $this->humidity->equals($other->getHumidity())
            && $this->wind->equals($other->getWind())
            && (($this->temperature && $this->temperature->equals($other->getTemperature()))
                || (!$this->temperature && $other->getTemperature() === null));
    }

    public function toArray()
    {
        return [
            'humidity' => $this->humidity ? $this->humidity->getValue() : null,
            'wind' => $this->wind ? $this->wind->getValue() : null,
            'temperature' => $this->temperature ? $this->temperature->getValue() : null,
        ];
    }
}