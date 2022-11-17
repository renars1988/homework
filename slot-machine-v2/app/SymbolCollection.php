<?php declare(strict_types=1);

namespace App;

class SymbolCollection
{
    private array $collection;

    public function __construct()
    {
        $this->add(new Symbol("Q", 1, 5));
        $this->add(new Symbol("J", 1, 5));
        $this->add(new Symbol("K", 2, 4));
        $this->add(new Symbol("A", 3, 3));
        $this->add(new Symbol("$", 5, 2));
    }

    public function add(Symbol $symbol): void
    {
        $this->collection[] = $symbol;
    }

    public function randomSymbolGenerator(): Symbol
    {
        $symbolPool = [];
        foreach ($this->collection as $symbol) {
            $symbolPool = array_merge($symbolPool, array_fill(0, $symbol->getRarity(), $symbol));
        }
        return $symbolPool[array_rand($symbolPool)];
    }
}
