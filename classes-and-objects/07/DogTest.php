<?php declare(strict_types=1);

require_once "Dog.php";

$dogs = [
    new Dog("Max", "male", "Lady", "Rocky"),
    new Dog("Rocky", "male", "Molly", "Sam"),
    new Dog("Sparky", "male"),
    new Dog("Buster", "male", "Lady", "Sparky"),
    new Dog("Sam", "male"),
    new Dog("Lady", "female"),
    new Dog("Molly", "female"),
    new Dog("Coco", "female", "Molly", "Buster"),
];

echo $dogs[7]->fathersName() . "\n";
echo $dogs[2]->fathersName() . "\n";

echo $dogs[7]->hasSameMotherAs($dogs[1]) ? "TRUE\n" : "FALSE\n";