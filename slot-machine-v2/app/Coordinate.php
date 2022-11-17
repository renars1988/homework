<?php declare(strict_types=1);

namespace App;

class Coordinate
{
    private array $coordinate;

    public function __construct(int $x, int $y)
    {
        $this->coordinate = [$x, $y];
    }

    public function getCoordinate(): array
    {
        return $this->coordinate;
    }
}
