<?php declare(strict_types=1);

function createProduct(string $name, int $price): stdClass
{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    return $product;
}

function formatMoney(int $money, int $decimals = 2): string
{
    return number_format($money / 100, $decimals);
}

// price in cents
$products = [
    createProduct("Apple", 175),
    createProduct("Banana", 250),
    createProduct("Snickers", 325),
    createProduct("Chupa Chups", 130),
    createProduct("Mars", 445),
];
// coin in cents => count in the machine
$coins = [
    200 => 50,
    100 => 50,
    50 => 50,
    20 => 0,
    10 => 0,
    5 => 20,
    2 => 50,
    1 => 100,
];

echo "----VENDING MACHINE----\n";
echo "Please select product:\n";
foreach ($products as $key => $product) {
    echo "$key $product->name " . formatMoney($product->price) . "€\n";
}

$input = readline("Select: ");
if ($input > count($products) || !is_numeric($input)) {
    exit("Invalid selection!\n");
}
$chosenProduct = $products[$input];
$money = 0;
while ($money < $chosenProduct->price) {
    echo "Please insert: " . formatMoney($chosenProduct->price - $money) . "€\n";
    $input = (int)readline("Insert coins(e.g. 100 = 1€ coin): ");
    if (!array_key_exists($input, $coins)) {
        echo "Please insert valid coin\n";
        continue;
    }
    $money += $input;
}

echo "Please take your product!\n";
if ($money > $chosenProduct->price) {
    $change = $money - $chosenProduct->price;
    $coinsToGiveOut = [];
    foreach ($coins as $coin => &$count) {
        $division = intdiv($change, $coin);
        if ($division >= 1) {
            for ($i = 0; $i < $division; $i++) {
                if ($count > 0 && $change > 0) {
                    $change -= $coin;
                    isset($coinsToGiveOut[$coin]) ? $coinsToGiveOut[$coin]++ : $coinsToGiveOut[$coin] = 1;
                    $coins[$coin]--;
                }
            }
        }
    }
    if ($change) {
        echo "Error: no more coins left!\n";
    }
    echo "Please take your change!\n";
    echo "Change: \n";
    foreach ($coinsToGiveOut as $coin => $count) {
        echo "$count X " . formatMoney($coin) . "€\n";
    }
}