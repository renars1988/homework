<?php declare(strict_types=1);

class Player
{
    private string $name;
    private Element $element;

    public function __construct(string $name, Element $element)
    {
        $this->name = $name;
        $this->element = $element;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getElement(): Element
    {
        return $this->element;
    }
}
