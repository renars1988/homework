<?php

$words = ["codelex", "awkward", "syndrome", "peekaboo", "dwarves"];
$wordToGuess = $words[array_rand($words)];
$letters = str_split($wordToGuess);
$word = str_split(str_repeat("_", strlen($wordToGuess)));
$guesses = 0;
$maxGuesses = 3;
$misses = [];

$answer = "";
while ($answer != "quit") {
    while ($guesses < $maxGuesses && in_array("_", $word)) {
        echo str_repeat("-=", 13) . PHP_EOL;
        echo "Word: \t" . implode(" ", $word) . PHP_EOL;
        echo "Misses: " . implode("", $misses) . PHP_EOL;

        $letter = readline("Guess:\t");
        $letterPositions = array_keys($letters, $letter);

        if (count($letterPositions)) {
            foreach ($letterPositions as $position) {
                $word[$position] = $letter;
            }
            continue;
        }
        $misses[] = $letter;
        $guesses++;
    }

    echo str_repeat("-=", 13) . PHP_EOL;
    echo "Word: \t" . implode(" ", $word) . PHP_EOL;
    echo "Misses: " . implode("", $misses) . PHP_EOL;
    echo $guesses == $maxGuesses ? "YOU LOST!\n" : "YOU GOT IT!\n";
    $answer = readline('Play "again" or "quit"? ');
}
