<?php
require_once "helpers.php";

echo strtoupper("----sum & average----");
echo PHP_EOL;
echo "Please select range";
echo PHP_EOL;

$lowerBound = readline("Start: ");
checkInput($lowerBound);

$upperBound = readline("End: ");
checkInput($upperBound);

$numbers = range($lowerBound, $upperBound);

echo "The sum of {$lowerBound} to {$upperBound} is " . array_sum($numbers);
echo PHP_EOL;

$average = array_sum($numbers)/count($numbers);
echo "The average is {$average}";
echo PHP_EOL;
