<?php
require_once "helpers.php";

function factorial($number){
    $factorial = 1;
    for ($i = 1; $i <= $number; $i++){
        $factorial = $factorial * $i;
    }
    return $factorial;
}

echo "----Factorial of N----";
echo PHP_EOL;
$input = readline("Please input a number: ");
checkInput($input);

$result = factorial($input);
echo "Factorial = $result";
echo PHP_EOL;