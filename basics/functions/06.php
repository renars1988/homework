<?php

$list = [5, 23, 101, 10.2345, "25"];

function doubleInteger($val) {
    if (is_int($val)) {
        return $val * 2;
    }
}
for ($i = 0; $i < count($list); $i++) {
    echo doubleInteger($list[$i]);
    echo PHP_EOL;
}