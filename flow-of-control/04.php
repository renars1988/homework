<?php

echo "----What day is it?----\n";
$input = readline("Enter the number: ");
if (!is_numeric($input)) {
    exit("Not a valid day\n");
}

$dayNumber = (int)$input;

switch ($dayNumber) {
    case 0:
        echo "Sunday\n";
        break;
    case 1:
        echo "Monday\n";
        break;
    case 2:
        echo "Tuesday\n";
        break;
    case 3:
        echo "Wednesday\n";
        break;
    case 4:
        echo "Thursday\n";
        break;
    case 5:
        echo "Friday\n";
        break;
    case 6:
        echo "Saturday\n";
        break;
    default:
        echo "Not a valid day\n";
}