<?php

function createPerson(string $name, string $surname, int $age, string $birthday): stdClass {
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;
    $person->birthday = $birthday;
    return $person;
}

$persons = [
    createPerson("John", "Doe", 20, "2002-02-02"),
    createPerson("Jane", "Doe", 22, "2000-02-04"),
    createPerson("Bob", "Doe", 40, "1982-03-02"),
];

foreach ($persons as $person) {
    echo $person->name;
    echo PHP_EOL;
    echo $person->surname;
    echo PHP_EOL;
    echo $person->age;
    echo PHP_EOL;
    echo $person->birthday;
    echo PHP_EOL;
    echo PHP_EOL;
}