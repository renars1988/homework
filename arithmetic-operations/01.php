<?php
require_once "helpers.php";

echo strtoupper("----Select two integers----");
echo PHP_EOL;

$val1 = readline("Select first value: ");
checkInput($val1);

$val2 = readline("Select second value: ");
checkInput($val2);

//convert to integer
$val1 = intval($val1);
$val2 = intval($val2);

if ($val1 === 15 || $val2 === 15) {
    echo "true";
    echo PHP_EOL;
    exit();
}

if ($val1 + $val2 === 15 || $val1 - $val2 === 15) {
    echo "true";
    echo PHP_EOL;
    exit();
}

echo "false";
echo PHP_EOL;
