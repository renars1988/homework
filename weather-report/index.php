<?php declare(strict_types=1);

use App\App;

require_once "vendor/autoload.php";

$app = new App("ff8b185ab913f2e91355385582acda72");

echo "----Weather Report----" . PHP_EOL;
$input = readline("Enter city: ");
$city = $app->getCity($input);
if (!$city) {
    exit("No results!" . PHP_EOL);
}
$weatherReport = $app->getWeather($city);
echo "In {$city->getName()} temperature now is {$weatherReport->getTemperature()} Celsius and humidity {$weatherReport->getHumidity()}%" . PHP_EOL;
