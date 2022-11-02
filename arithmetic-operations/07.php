<?php

//formula: x(t) = 0.5 * a(t2) + v(t) + x

$acceleration = -9.81; // m/s2
$time = 10; // s
$initialVelocity = 0; // m/s
$initialPosition = 0;

$result = 0.5 * $acceleration * ($time ** 2) + $initialVelocity * $time +$initialPosition;
echo $result . "m";
echo PHP_EOL;