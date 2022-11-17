<?php declare(strict_types=1);

namespace App;

class WeatherReport
{
    private float $temperature;
    private int $humidity;

    public function __construct(float $temperature, int $humidity)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
    }

    public function getHumidity(): int
    {
        return $this->humidity;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }
}
