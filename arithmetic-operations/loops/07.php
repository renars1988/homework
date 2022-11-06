<?php declare(strict_types=1);

class RollTwoDice
{
    public static function roll()
    {
        $input = readline("Desired sum: ");
        while (true) {
            $diceOne = rand(1, 6);
            $diceTwo = rand(1, 6);
            $sumOfDices = $diceOne + $diceTwo;
            echo "$diceOne and $diceTwo = $sumOfDices\n";
            if ($sumOfDices == $input) {
                exit;
            }
        }
    }
}

RollTwoDice::roll();
