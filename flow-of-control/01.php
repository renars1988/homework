<?php
echo "----Largest number----";
echo PHP_EOL;
$numbers = [];
$numbers[] = readline("Input the 1st number: ");
$numbers[] = readline("Input the 2nd number: ");
$numbers[] = readline("Input the 3rd number: ");
echo "Largest numbers is: " . max($numbers) . PHP_EOL;