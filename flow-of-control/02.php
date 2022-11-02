<?php
echo "----Positive or negative number----\n";
$num = readline("Enter the number: ");
if ($num > 0) {
    echo "number is positive\n";
} elseif ($num < 0) {
    echo "number is negative\n";
} else {
    echo "number is 0\n";
}