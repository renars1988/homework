<?php declare(strict_types=1);

class Piglet
{
    public static string $welcomeMessage = "Welcome to Piglet!\n";

    public static function dice()
    {
        $score = 0;
        readline("Press 'Enter' to roll a dice");
        while (true) {
            $dice = rand(1, 6);
            echo "You rolled a $dice\n";
            if ($dice == 1) {
                exit("You got 0 points.\n");
            }
            $score += $dice;
            $input = readline("Roll again? Type 'y' or 'n': ");
            if ($input == "y") {
                continue;
            }
            exit("You got $score points.\n");
        }
    }
}

echo Piglet::$welcomeMessage;
Piglet::dice();
