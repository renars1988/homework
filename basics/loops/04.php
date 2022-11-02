<?php

$numbers = range(1, 10);

foreach ($numbers as $number) {
    if ($number % 3 === 0) echo $number . PHP_EOL;
}
