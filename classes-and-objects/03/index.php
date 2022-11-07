<?php declare(strict_types=1);

require_once "FuelGauge.php";
require_once "Odometer.php";

$fuelTank = new FuelGauge(10);
$fuelTank->addFuel(5);

$odometer = new Odometer(0);

while ($fuelTank->getFuel() > 0) {
    $odometer->addMileage();
    if ($odometer->getMileage() % 10 == 0) {
        $fuelTank->decreaseFuel();
    }
    echo "cars mileage " . $odometer->getMileage() . " fuel " . $fuelTank->getFuel() . PHP_EOL;
}