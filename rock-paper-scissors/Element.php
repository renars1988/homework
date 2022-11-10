<?php declare(strict_types=1);

class Element
{
    private string $name;
    private array $wins = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWins(): array
    {
        return $this->wins;
    }

    public function setWins(Element ...$elements): void
    {
        foreach ($elements as $element) {
            $this->wins[] = $element;
        }
    }
}
