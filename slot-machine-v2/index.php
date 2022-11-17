<?php declare(strict_types=1);

require_once "vendor/autoload.php";

use App\App;
use App\PlayerObject;
use App\SlotsGenerator;

echo "----WELCOME TO CASINO----" . PHP_EOL;

$app = new App();

$money = (int)readline("Deposit your money (min deposit is {$app->getMinDeposit()}): ");
$bet = (int)readline("Enter your bet ({$app->getMinBet()} - {$app->getMaxBet()}): ");
$player = new PlayerObject($money, $bet);

while (true) {
    if ($player->getMoney() <= 0) {
        exit("You lost everything!" . PHP_EOL);
    }
    echo "Your current balance: {$player->getMoney()}" . PHP_EOL;
    $command = readline("Press 'Enter' to spin or type 'quit' to leave: ");
    if ($command == "quit") {
        exit("You left casino with: {$player->getMoney()}" . PHP_EOL);
    }

    $slotsGenerator = new SlotsGenerator();

    foreach ($slotsGenerator->getDisplay() as $row) {
        foreach ($row as $symbol) {
            echo " {$symbol->getSymbol()} |";
        }
        echo PHP_EOL;
        echo "---+---+---+---+---" . PHP_EOL;
    }

    $winnings = $app->spin($slotsGenerator, $player);

    if ($winnings > 0) {
        echo "You won: $winnings" . PHP_EOL;
    }
}
