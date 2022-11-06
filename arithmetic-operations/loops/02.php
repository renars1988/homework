<?php
//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function
$n = readline("Input number of terms: ");
$result = 1;
for ($i = 1; $i <= $n; $i++) {
    $result *= $n;
}
echo $result . PHP_EOL;