<?php declare(strict_types=1);

require_once "Player.php";
require_once "Element.php";
require_once "Game.php";

$rock = new Element("Rock");
$paper = new Element("Paper");
$scissors = new Element("Scissors");
$lizard = new Element("Lizard");
$spock = new Element("Spock");

$elements = [
    $rock,
    $paper,
    $scissors,
    $lizard,
    $spock
];

$scissors->setWins($paper, $lizard);
$paper->setWins($rock, $spock);
$rock->setWins($lizard, $scissors);
$lizard->setWins($spock, $paper);
$spock->setWins($scissors, $rock);

echo "[0] Player vs Computer" . PHP_EOL;
echo "[1] Computer vs Computer" . PHP_EOL;
$mode = (int)readline("Select mode: ");

$counter = 1;

if ($mode === 1) {
    $numberOfGames = (int)readline("How many games?: ");
    $counter = $numberOfGames;
}

while ($counter > 0) {
    if ($mode === 1) {
        $player1Element = $elements[array_rand($elements)];
        $player2Element = $elements[array_rand($elements)];
        $player1 = new Player("Computer1", $player1Element);
        $player2 = new Player("Computer2", $player2Element);
    } else {
        foreach ($elements as $key => $element) {
            echo "[$key] {$element->getName()}" . PHP_EOL;
        }
        $selection = (int)readline("Choose: ");

        $player1Element = $elements[$selection];
        $player2Element = $elements[array_rand($elements)];
        $player1 = new Player("Player", $player1Element);
        $player2 = new Player("Computer", $player2Element);
    }

    $game = new Game($player1, $player2);
    $winner = $game->getWinner();

    echo $player1Element->getName() . " VS " . $player2Element->getName();
    echo PHP_EOL;

    if ($winner === null) {
        echo "Draw!" . PHP_EOL;
    } else {
        echo "Winner: " . $winner->getName();
        echo PHP_EOL;
    }

    if ($mode !== 1) {
        exit;
    }
    $counter--;
    sleep(1);
}