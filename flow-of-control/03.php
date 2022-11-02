<?php
echo "----Number of digits----\n";
$input = readline("Please enter the number: ");

if (is_numeric($input) && $input > 0) {
    echo "Digits: " . strlen($input);
    exit("\n");
}
echo "Invalid input!\n";