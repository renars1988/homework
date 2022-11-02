<?php

echo "----PhoneKeyPad----\n";
$input = readline("Enter your string: ");
$input = strtoupper($input);
$output = "";
$letters = str_split($input);
//Long version
foreach ($letters as $letter) {
    switch ($letter) {
        case "A":
            $output .= 2;
            break;
        case "B":
            $output .= 22;
            break;
        case "C":
            $output .= 222;
            break;
        case "D":
            $output .= 3;
            break;
        case "E":
            $output .= 33;
            break;
        case "F":
            $output .= 333;
            break;
        case "G":
            $output .= 4;
            break;
        case "H":
            $output .= 44;
            break;
        case "I":
            $output .= 444;
            break;
        case "J":
            $output .= 5;
            break;
        case "K":
            $output .= 55;
            break;
        case "L":
            $output .= 555;
            break;
        case "M":
            $output .= 6;
            break;
        case "N":
            $output .= 66;
            break;
        case "O":
            $output .= 666;
            break;
        case "P":
            $output .= 7;
            break;
        case "Q":
            $output .= 77;
            break;
        case "R":
            $output .= 777;
            break;
        case "S":
            $output .= 7777;
            break;
        case "T":
            $output .= 8;
            break;
        case "U":
            $output .= 88;
            break;
        case "V":
            $output .= 888;
            break;
        case "W":
            $output .= 9;
            break;
        case "X":
            $output .= 99;
            break;
        case "Y":
            $output .= 999;
            break;
        case "Z":
            $output .= 9999;
            break;
        default:
            $output .= "";
    }
}
echo "Keypad digits: $output\n";
//Short version
/*
$keyPad = [
    2 => "ABC",
    3 => "DEF",
    4 => "GHI",
    5 => "JKL",
    6 => "MNO",
    7 => "PQRS",
    8 => "TUV",
    9 => "WXYZ"
];

foreach ($letters as $letter) {
    foreach ($keyPad as $key => $button) {
        $position = strpos($button, strtoupper($letter));
        if (is_numeric($position)) {
            $output .= str_repeat($key, $position + 1);
        }
    }
}
echo "Keypad digits: $output\n";
*/