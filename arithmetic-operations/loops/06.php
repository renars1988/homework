<?php declare(strict_types=1);

class AsciiFigure
{
    public static int $size = 7;

    public static function draw()
    {
        $size = self::$size;
        for ($i = 1; $i <= $size; $i++) {
            for ($x = 1; $x <= ($size * 4) - (4 * $i); $x++) {
                echo "/";
            }
            for ($x = 1; $x <= 8 * $i - 8; $x++) {
                echo "*";
            }
            for ($x = 1; $x <= ($size * 4) - (4 * $i); $x++) {
                echo "\\";
            }
            echo PHP_EOL;
        }
    }
}

AsciiFigure::draw();