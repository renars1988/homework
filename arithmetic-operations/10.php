<?php

class Geometry
{
    public static function calculateCircleArea() {
        $r = readline("Enter radius value: ");
        self::checkIfNegative($r);
        $area = M_PI * $r * 2;
        echo "The area of Circle with radius of $r is $area";
        echo PHP_EOL;
        exit();
    }

    public static function calculateRectangleArea() {
        $length = readline("Enter length value: ");
        $width = readline("Enter width value: ");
        self::checkIfNegative($length, $width);
        $area = $length * $width;
        echo "The area of Rectangle is $area";
        echo PHP_EOL;
        exit();
    }

    public static function calculateTriangleArea() {
        $baseLength = readline("Enter length of a triangle’s base: ");
        $height = readline("Enter triangle’s height: ");
        self::checkIfNegative($baseLength, $height);
        $area = $baseLength * $height * 0.5;
        echo "The area of Triangle is $area";
        echo PHP_EOL;
        exit();
    }

    private static function checkIfNegative (...$numbers) {
        foreach ($numbers as $number) {
            if ($number < 0 || !is_numeric($number)) {
                exit("Only positive numbers allowed!" . PHP_EOL);
            }
        }
    }
}

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";

// selection menu
$menu = range(1,4);

$input = readline("Enter your choice (1-4) : ");

if (!in_array($input, $menu)) {
    echo "Invalid selection\n";
    exit();
}

switch ($input) {
    case 1:
        Geometry::calculateCircleArea();
        break;
    case 2:
        Geometry::calculateRectangleArea();
        break;
    case 3:
        Geometry::calculateTriangleArea();
        break;
    case 4:
        exit();
}
