<?php

$row1 = ["   ", "   ", "   "];
$row2 = ["   ", "   ", "   "];
$row3 = ["   ", "   ", "   "];

$turn = "";
$isWinner = false;
$isTie = false;

function getWinner()
{
    global $row1, $row2, $row3, $turn, $isWinner, $isTie;
    // check winner by row
    if ($row1[0] == $turn && $row1[1] == $turn && $row1[2] == $turn) {
        $isWinner = true;
    }
    if ($row2[0] == $turn && $row2[1] == $turn && $row2[2] == $turn) {
        $isWinner = true;
    }
    if ($row3[0] == $turn && $row3[1] == $turn && $row3[2] == $turn) {
        $isWinner = true;
    }
    // check winner by column
    if ($row1[0] == $turn && $row2[0] == $turn && $row3[0] == $turn) {
        $isWinner = true;
    }
    if ($row1[1] == $turn && $row2[1] == $turn && $row3[1] == $turn) {
        $isWinner = true;
    }
    if ($row1[2] == $turn && $row2[2] == $turn && $row3[2] == $turn) {
        $isWinner = true;
    }
    // check winner diagonally
    if ($row1[0] == $turn && $row2[1] == $turn && $row3[2] == $turn) {
        $isWinner = true;
    }
    if ($row1[2] == $turn && $row2[1] == $turn && $row3[0] == $turn) {
        $isWinner = true;
    }
    //check tie
    if (!in_array("   ", $row1) && !in_array("   ", $row2) && !in_array("   ", $row3)) {
        $isTie = true;
    }
}

function display_board(...$rows)
{
    echo implode("|", $rows[0]) . "\n";
    echo "---+---+---\n";
    echo implode("|", $rows[1]) . "\n";
    echo "---+---+---\n";
    echo implode("|", $rows[2]) . "\n";
}

while (!$isWinner || !$isTie) {
    display_board($row1, $row2, $row3);

    if ($turn) {
        getWinner();
        if ($isWinner || $isTie) {
            break;
        }
    }

    $turn === " X " ? $turn = " O " : $turn = " X ";
    $input = readline("'$turn', choose your location (row, column): ");
    $selection = str_split(str_replace(' ', '', $input), 1);
    if (count($selection) !== 2 || $selection[0] > 2
        || $selection[1] > 2 || !is_numeric($selection[0])
        || !is_numeric($selection[1])) {
        echo "Error with selection!\n";
        exit();
    }

    switch ($selection[0]) {
        case 0:
            if (!trim($row1[$selection[1]])) {
                $row1[$selection[1]] = $turn;
            }
            break;
        case 1:
            if (!trim($row2[$selection[1]])) {
                $row2[$selection[1]] = $turn;
            }
            break;
        case 2:
            if (!trim($row3[$selection[1]])) {
                $row3[$selection[1]] = $turn;
            }
            break;
    }
}

if ($isWinner) {
    echo "The winner is $turn\n";
    return;
}
echo "The game is a tie.\n";

