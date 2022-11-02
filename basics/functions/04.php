<?php

function createPerson(string $name, string $surname, int $age): stdClass {
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;
    return $person;
}

function isAdult(int $age) {
    echo $age >= 18 ? "Adult" : "Not an adult";
}

$persons = [
    createPerson("John", "Doe", 18),
    createPerson("Jane", "Doe", 17),
    createPerson("Bob", "Doe", 38)
];

foreach ($persons as $person) {
    isAdult($person->age);
    echo PHP_EOL;
}

