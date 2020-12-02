<?php

namespace App\Controller;

use App\Weather\WeatherRequestHandlerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    /**
     * @Route("/{city}", name="home")
     */
    public function index(string $city, WeatherRequestHandlerInterface $handler): Response
    {
        $weather = $handler->fetch($city);

        return $this->json($weather->toArray());
    }
}