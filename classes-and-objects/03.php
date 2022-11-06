<?php declare(strict_types=1);

class FuelGauge
{
    // fuelTank in liters
    public int $fuel;

    public function __construct(int $fuel)
    {
        $this->setFuel($fuel);
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    protected function setFuel($fuelTank): void
    {
        if ($fuelTank > 70) {
            throw new InvalidArgumentException(
                'max fuelTank is 70 l.'
            );
        }
        $this->fuel = $fuelTank;
    }

    public function addFuel()
    {
        if ($this->fuel < 70) {
            $this->fuel++;
        }
    }

    public function decreaseFuel()
    {
        if ($this->fuel > 0) {
            $this->fuel--;
        }
    }

}

class Odometer
{

    private int $mileage;
    private FuelGauge $fuelTankGauge;

    public function __construct(FuelGauge $fuelTankGauge)
    {
        $this->mileage = 0;
        $this->fuelTankGauge = $fuelTankGauge;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function addMileage(): void
    {
        if ($this->mileage < 999999) {
            $this->mileage++;
            // 1l of petrol per 10 km
            if ($this->mileage % 10 == 0) {
                $this->fuelTankGauge->decreaseFuel();
            }
        } else {
            $this->mileage = 0;
        }
    }
}

$fuelTank = new FuelGauge(10);
$fuelTank->addFuel();
$fuelTank->addFuel();
$fuelTank->addFuel();
$fuelTank->addFuel();
$fuelTank->addFuel();

$odo = new Odometer($fuelTank);
while ($fuelTank->fuel > 0) {
    $odo->addMileage();
    echo "cars mileage " . $odo->getMileage() . " fuel " . $fuelTank->getFuel() . PHP_EOL;
}