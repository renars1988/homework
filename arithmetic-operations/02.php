<?php

echo "----CheckOddEven----";
echo PHP_EOL;

$input = readline("Input number: ");

if (!is_numeric($input)) {
    echo "Value must be a number!";
    echo PHP_EOL;
    exit("bye!");
}

if (!(intval($input) % 2 === 0)) {
    echo "Odd Number";
    echo PHP_EOL;
    exit("bye!");
}
echo "Even Number";
echo PHP_EOL;
exit("bye!");
