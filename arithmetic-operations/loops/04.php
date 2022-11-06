<?php

class FizzBuzz
{
    public static function print()
    {
        $input = readline("Max value?: ");
        for ($i = 1; $i <= $input; $i++) {

            // ======== MULTIPLES OF 3 AND 5 ========= \\
            if ($i % 3 == 0 & $i % 5 == 0) {
                echo "FizzBuzz ";

                // ========== MULTIPLES OF 3  ============ \\
            } elseif ($i % 3 == 0) {
                echo "Fizz ";

                // ========== MULTIPLES OF 5 ============ \\
            } elseif ($i % 5 == 0) {
                echo "Buzz ";

            } else {
                echo $i . " ";
            }
            if ($i % 20 == 0) { // 20 characters per column
                echo PHP_EOL;
            }
        }
    }
}

FizzBuzz::print();