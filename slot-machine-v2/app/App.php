<?php declare(strict_types=1);

namespace App;

class App
{
    private int $minBet;
    private int $maxBet;
    private int $minDeposit;

    public function __construct(int $minBet = 1, int $maxBet = 100, int $minDeposit = 10)
    {
        $this->minBet = $minBet;
        $this->maxBet = $maxBet;
        $this->minDeposit = $minDeposit;
    }

    public function getMinBet(): int
    {
        return $this->minBet;
    }

    public function getMaxBet(): int
    {
        return $this->maxBet;
    }

    public function getMinDeposit(): int
    {
        return $this->minDeposit;
    }

    public function spin(SlotsGenerator $slotsGenerator, PlayerObject $player): int
    {
        $player->deductMoney($player->getBet());
        $combinations = new WinningsManager();
        return $combinations->checkWinnings($slotsGenerator, $player);
    }
}
