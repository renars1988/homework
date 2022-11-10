<?php declare(strict_types=1);

class Game
{
    private Player $player1;
    private Player $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function getWinner(): ?Player
    {
        if ($this->player1->getElement()->getName() === $this->player2->getElement()->getName()) {
            return null;
        }
        foreach ($this->player1->getElement()->getWins() as $element) {
            if ($element->getName() === $this->player2->getElement()->getName()) {
                return $this->player1;
            }
        }
        return $this->player2;
    }
}
