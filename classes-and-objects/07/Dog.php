<?php declare(strict_types=1);

class Dog
{
    private string $name;
    private string $sex;
    private ?string $mother;
    private ?string $father;

    public function __construct(string $name, string $sex, string $mother = null, string $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName(): string
    {
        return $this->father ?: "Unknown";
    }

    public function hasSameMotherAs(Dog $dog): bool
    {
        return $this->mother === $dog->mother;
    }
}
