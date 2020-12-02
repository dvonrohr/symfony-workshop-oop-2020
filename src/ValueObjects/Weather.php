<?php

namespace App\ValueObjects;

class Weather
{
    private string $city;
    private Humidity $humidity;
    private Wind $wind;
    private Temperature $temperature;

    public function __construct(
        string $city,
        Humidity $humidity,
        Wind $wind,
        Temperature $temperature
    ) {
        $this->city = $city;
        $this->humidity = $humidity;
        $this->wind = $wind;
        $this->temperature = $temperature;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getHumidity(): Humidity
    {
        return $this->humidity;
    }

    public function getWind(): Wind
    {
        return $this->wind;
    }

    public function getTemperature(): Temperature
    {
        return $this->temperature;
    }

    public function equals(self $city): bool
    {
        return $this->city === $city->getCity()
            && $this->humidity->getValue() === $city->getHumidity()->getValue()
            && $this->wind->getValue() === $city->getWind()->getValue()
            && $this->temperature->getValue() === $city->getTemperature()->getValue();
    }
}