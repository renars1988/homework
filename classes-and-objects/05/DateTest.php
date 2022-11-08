<?php declare(strict_types=1);

require_once "Date.php";

$date = new Date(3, 25, 1945);

$date->setMonth(11);
$date->setDay(10);
$date->setYear(2022);

echo $date->getMonth() . PHP_EOL;
echo $date->getDay() . PHP_EOL;
echo $date->getYear() . PHP_EOL;
echo $date->displayDate() . PHP_EOL;