<?php

$fruits = array(
    array("apples" => 11.2),
    array("bananas" => 15),
    array("blueberries" => 7),
    array("strawberries" => 8.5),
    array("oranges" => 10)
);

function overTenKg($weight): bool {
    return $weight >= 10;
}

$shippingCosts = array(">=10kg" => 2, "<10kg" => 1);

foreach ($fruits as $fruit) {
    foreach ($fruit as $key => $value) {
        echo "{$key}: {$value}kg, shipping costs: ", overTenKg($value) ? $shippingCosts['>=10kg'] : $shippingCosts['<10kg'], "€.";
        echo PHP_EOL;
    }
}