<?php declare(strict_types=1);

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point $p1, Point $p2)
    {
        $p1 = clone $p1;
        $this->x = $p2->x;
        $this->y = $p2->y;
        $p2->x = $p1->x;
        $p2->y = $p1->y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")\n";
echo "(" . $p2->x . ", " . $p2->y . ")\n";
