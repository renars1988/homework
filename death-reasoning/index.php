<?php declare(strict_types=1);

require_once "DataObject.php";
require_once "DataCollection.php";

function separateAndFilterToArray(string $subject): array
{
    return array_unique(array_filter(explode(";", $subject)));
}

function sortDescOrder(array $data): array
{
    arsort($data);
    return $data;
}

$bigData = new DataCollection();

$row = 1;
if (($handle = fopen("data.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $num = count($data);
        $row++;
        if ($row === 2) {
            continue;
        }
        $bigData->add(new DataObject(
            $data[1],
            $data[2],
            separateAndFilterToArray($data[3]),
            separateAndFilterToArray($data[4]),
            separateAndFilterToArray($data[5]),
        ));
    }
    fclose($handle);
}

$deathReasons = [];
// create as a string
foreach ($bigData->deathReasonTotals() as $key => $value) {
    $deathReasons[] = "$key - $value";
}

echo str_repeat("-", 40) . PHP_EOL;
echo $deathReasons[1] . PHP_EOL;
echo str_repeat("-", 40) . PHP_EOL;

echo str_repeat("-", 40) . PHP_EOL;
echo $deathReasons[0] . PHP_EOL;
echo str_repeat("-", 40) . PHP_EOL;

$nonViolentTotals = sortDescOrder($bigData->nonViolentDeathReasonTotals());

foreach ($nonViolentTotals as $key => $entry) {
    echo "$key - $entry" . PHP_EOL;
}
echo PHP_EOL;

echo str_repeat("-", 40) . PHP_EOL;
echo $deathReasons[2] . PHP_EOL;
echo str_repeat("-", 40) . PHP_EOL;

$violentTotals = sortDescOrder($bigData->violentDeathReasonTotals());

foreach ($violentTotals as $key => $entry) {
    echo "$key - $entry" . PHP_EOL;
}
echo PHP_EOL;

echo str_repeat("-", 40) . PHP_EOL;

$violentTypeTotals = sortDescOrder($bigData->violentDeathTypeTotals());

foreach ($violentTypeTotals as $key => $entry) {
    echo "$key - $entry" . PHP_EOL;
}