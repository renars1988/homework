<?php declare(strict_types=1);

namespace App;

class PlayerObject
{
    private int $money;
    private int $bet;

    public function __construct(int $money, int $bet)
    {
        $this->money = $money;
        $this->bet = $bet;
    }

    public function getBet(): int
    {
        return $this->bet;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function addMoney(int $money): void
    {
        $this->money += $money;
    }

    public function deductMoney(int $money): void
    {
        $this->money -= $money;
    }
}
