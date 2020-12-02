<?php

namespace App\Weather;

use App\Weather\Model\Weather;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CachedWeatherRequestHandler implements WeatherRequestHandlerInterface
{
    private WeatherRequestHandlerInterface $decorated;
    private CacheInterface $cache;

    public function __construct(
        WeatherRequestHandlerInterface $decorated,
        CacheInterface $cache
    ) {
        $this->decorated = $decorated;
        $this->cache = $cache;
    }

    public function fetch(string $city): Weather
    {
        $fetcher = $this->decorated;

        return $this->cache->get($city,
            function (ItemInterface $item) use ($fetcher, $city) {
                $item->expiresAfter(60);
                return $fetcher->fetch($city);
            }
        );
    }
}