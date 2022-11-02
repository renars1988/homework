<?php

$person = new stdClass();
$person->name = "Bob";
$person->licenses = ["A", "B"];
$person->cash = 1000;

function createGun(string $name, string $license, int $price): stdClass {
    $gun = new stdClass();
    $gun->name = $name;
    $gun->license = $license;
    $gun->price = $price;
    return $gun;
}

$guns = [
    createGun("Sig P938", "A", 300),
    createGun("Springfield 911", "B", 450),
    createGun("SAVAGE 110 HUNTER", "C", 500),
    createGun("AK 47", "C", 1100)
];

echo "Hi {$person->name}!";
echo PHP_EOL;
echo strtoupper("----welcome to our gun shop----");
echo PHP_EOL;

foreach ($guns as $key => $gun) {
    echo $key + 1 . " - " . $gun->name;
    echo PHP_EOL;
}

$input = readline("Please select a gun you would like to purchase: ");

if ((1 <= $input) && ($input <= count($guns))) {
    if ($guns[$input - 1]->price > $person->cash) {
        echo "You don't have enough money!";
        echo PHP_EOL;
        exit();
    }
    if (in_array($guns[$input - 1]->license, $person->licenses)) {
        echo "Thank you for shopping!";
        echo PHP_EOL;
        exit();
    }
    echo "You don't have a valid license!";
    echo PHP_EOL;
} else {
    echo "Please select with number 1 - " . count($guns);
    echo PHP_EOL;
}
