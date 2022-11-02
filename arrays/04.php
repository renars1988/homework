<?php

$numbers = array_map(function () {
    return rand(1, 100);
}, array_fill(0, 10, null));
$numbersCopy = $numbers;
$numbers[9] = -7;

$output1 = "Array 1:";
$output2 = "Array 2:";

for ($x = 0; $x < count($numbers); $x++) {
    $output1 = $output1 . " $numbers[$x]";
    $output2 = $output2 . " $numbersCopy[$x]";
}

echo "$output1\n$output2\n";