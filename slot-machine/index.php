<?php declare(strict_types=1);
// min & max bet
$minBet = 1;
$maxBet = 100;
// minimum deposit required
$minDeposit = 10;
//winning lines coefficient
$linesCoeff = [
    // three per line
    3 => 1,
    // four per line
    4 => 2,
    // five per line
    5 => 3
];
// slot-machine display 3x5
$display = [
    ["", "", "", "", ""],
    ["", "", "", "", ""],
    ["", "", "", "", ""],
];
//symbols and their value: 1 - 5, with 5 meaning it is the most valuable symbol
$symbols = [
    "Q" => 1,
    "J" => 1,
    "K" => 2,
    "A" => 3,
    "$" => 5,
];
// winning line combinations
$combinations = [
    // straight lines
    [[0, 0], [0, 1], [0, 2], [0, 3], [0, 4]],
    [[1, 0], [1, 1], [1, 2], [1, 3], [1, 4]],
    [[2, 0], [2, 1], [2, 2], [2, 3], [2, 4]],
    // V pattern
    [[0, 0], [1, 1], [2, 2], [1, 3], [0, 4]],
    // /\ pattern
    [[2, 0], [1, 1], [0, 2], [1, 3], [2, 4]],

];

echo "----WELCOME TO CASINO----\n";

while (true) {
    // players money
    $money = (int)readline("Deposit your money (min deposit is $minDeposit): ");
    // bet
    $bet = (int)readline("Enter your bet: ");
    if (!is_numeric($money) || $money < $minDeposit
        || !is_numeric($bet) || $bet < $minBet
        || $bet > $maxBet || $bet > $money) {
        echo "Invalid input!\n";
        continue;
    }

    while (true) {
        if ($money <= 0) {
            exit("You lost everything!\n");
        }
        echo "Your current balance: $money\n";
        $command = readline("Press 'Enter' to spin or type 'quit' to leave: ");
        if ($command == "quit") {
            exit("You left casino with: $money\n");
        }

        $money += -$bet;

        foreach ($display as &$row) {
            foreach ($row as &$value) {
                $value = array_rand($symbols);
            }
            echo " $row[0] | $row[1] | $row[2] | $row[3] | $row[4]\n";
            echo "---+---+---+---+---\n";
        }
        // current money won
        $winnings = 0;

        foreach ($combinations as $combination) {
            // winning lines counter
            $counter = 0;
            //current symbol to check
            $symbol = "";
            foreach ($combination as $position) {
                [$x, $y] = $position;
                if (!$symbol) {
                    $symbol = $display[$x][$y];
                }
                if ($symbol != $display[$x][$y]) {
                    break;
                }
                $counter++;
            }
            if ($counter >= 3) {
                $money += $symbols[$symbol] * $bet * $linesCoeff[$counter];
                $winnings += $symbols[$symbol] * $bet * $linesCoeff[$counter];
            }
        }
        if ($winnings > 0) {
            echo "You won: $winnings\n";
        }
    }
}