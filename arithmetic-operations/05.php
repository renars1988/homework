<?php
require_once "helpers.php";

echo strtoupper("----guess the number----");
echo PHP_EOL;
echo "Guess a number in range from 1 - 100";
echo PHP_EOL;

$randomNumber = rand(1, 100);

$input = readline("Your choice: ");
checkInput($input);
//convert to int
$input = intval($input);

if ($input === $randomNumber) {
    echo "Amazing, you won!";
    echo PHP_EOL;
    exit();
}

if ($input < $randomNumber) {
    echo "Too low";
    echo PHP_EOL;
    exit();
}

echo "Too high";
echo PHP_EOL;
exit();
