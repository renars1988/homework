<?php
require_once "helpers.php";

echo "----Person's body mass index (BMI) calculator----";
echo PHP_EOL;

$weight = readline("Enter your weight in(kg): ");
checkInput($weight);

$height = readline("Enter your height in(cm): ");
checkInput($height);

$weightInPounds = $weight * 2.2;
$heightInInches = $height / 2.54;

$bmi = round($weightInPounds * 703 / $heightInInches ** 2, 1);

//BMI = weight x 703 / height ^ 2
if ($bmi > 18.5 && $bmi < 25) {
    echo "Your BMI is $bmi";
    echo PHP_EOL;
    echo "Your weight is optimal.";
    echo PHP_EOL;
    exit();
}

if ($bmi < 18.5) {
    echo "Your BMI is $bmi";
    echo PHP_EOL;
    echo "You are underweight.";
    echo PHP_EOL;
    exit();
}

echo "Your BMI is $bmi";
echo PHP_EOL;
echo "You are overweight.";
echo PHP_EOL;