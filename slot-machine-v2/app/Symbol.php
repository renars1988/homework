<?php declare(strict_types=1);

namespace App;

class Symbol
{
    private string $symbol;
    private int $value;
    private int $rarity;

    public function __construct(string $symbol, int $value, int $rarity)
    {
        $this->symbol = $symbol;
        $this->value = $value;
        $this->rarity = $rarity;
    }

    public function getRarity(): int
    {
        return $this->rarity;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
