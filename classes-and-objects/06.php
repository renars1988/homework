<?php declare(strict_types=1);
$surveyed = 12467;
//percentage
$purchasedEnergyDrinks = 0.14;
$preferCitrusDrinks = 0.64;

$energyDrinkers = $surveyed * $purchasedEnergyDrinks;
$citrusEnergyDrinkers = $energyDrinkers * $preferCitrusDrinks;

echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . (int) $energyDrinkers . " bought at least one energy drink" . PHP_EOL;
echo (int) $citrusEnergyDrinkers . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;