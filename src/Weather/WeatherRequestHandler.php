<?php

namespace App\Weather;

use App\Weather\Model\Weather;

class WeatherRequestHandler implements WeatherRequestHandlerInterface
{
    /**
     * @var CityWeatherFetcherInterface
     */
    private $fetchers = [];

    public function __construct(iterable $fetchers)
    {
        foreach ($fetchers as $fetcher) {
            $this->fetchers[$fetcher->getName()] = $fetcher;
        }
    }

    public function fetch(string $city): Weather
    {
        if (!isset($this->fetchers[$city])) {
            throw new \InvalidArgumentException('City is not legit :(');
        }

        return $this->fetchers[$city]->fetch();
    }
}