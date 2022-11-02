<?php

function checkInput($value)
{
    if (is_numeric($value)) {
        return;
    }
    echo "Value must be a number!";
    echo PHP_EOL;
    exit();
}