<?php

$firstWord = readline("Enter first word: ");
$secondWord = readline("Enter second word: ");

$reminder = 30 - strlen($firstWord) - strlen($secondWord);
if ($reminder > 0) {
    echo $firstWord . str_repeat(".", $reminder) . $secondWord . PHP_EOL;
}