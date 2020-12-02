<?php

namespace App\Weather;

use App\Weather\Model\Humidity;
use App\Weather\Model\Temperature;
use App\Weather\Model\Weather;
use App\Weather\Model\Wind;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ParisCityWeatherFetcher implements CityWeatherFetcherInterface
{
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function fetch(): Weather
    {
        $data = $this->httpClient->request(
            'GET',
            'https://weather.titouangalopin.com/paris.json',
        )->toArray();

        return new Weather(
            new Humidity($data['humidity']),
            new Temperature($data['temperature']),
            new Wind($data['wind']),
        );
    }

    public function getName(): string
    {
        return 'paris';
    }
}