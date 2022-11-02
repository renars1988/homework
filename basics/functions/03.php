<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 18;

function isAdult(int $age) {
    echo $age >= 18 ? "Adult" : "Not an adult";
}

isAdult($person->age);