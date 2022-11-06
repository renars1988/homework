<?php declare(strict_types=1);

class NumberSquare
{
    public static function draw()
    {
        $min = readline("Min? ");
        $max = readline("Max? ");
        for ($i = $min; $i <= $max; $i++) {
            for ($x = $i; $x <= $max; $x++) {
                echo $x;
            }
            for ($y = 0; $y < $i - $min; $y++) {
                echo $min + $y;
            }
            echo PHP_EOL;
        }
    }
}

NumberSquare::draw();
