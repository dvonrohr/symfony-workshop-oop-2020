<?php

namespace App\Weather;

use App\Weather\Model\Humidity;
use App\Weather\Model\Temperature;
use App\Weather\Model\Weather;
use App\Weather\Model\Wind;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BerlinCityWeatherFetcher implements CityWeatherFetcherInterface
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
            'https://weather.titouangalopin.com/berlin.json',
        )->toArray();

        return new Weather(
            new Humidity($data['measure']['humidity']),
            new Temperature($data['measure']['temp']),
            new Wind($data['measure']['wind']),
        );
    }

    public function getName(): string
    {
        return 'berlin';
    }
}