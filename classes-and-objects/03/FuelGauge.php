<?php declare(strict_types=1);

class FuelGauge
{

    private int $fuel;

    public function __construct(int $fuel)
    {
        $this->fuel = $fuel;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function addFuel(int $amount = 1): void
    {
        $maxAmount = 70;
        $newAmount = $this->fuel + $amount;
        if ($newAmount > $maxAmount) {
            $newAmount = $maxAmount;
        }
        $this->fuel = $newAmount;
    }

    public function decreaseFuel(int $amount = 1): void
    {
        $minAmount = 0;
        $newAmount = $this->fuel - $amount;
        if ($newAmount < $minAmount) {
            $newAmount = $minAmount;
        }
        $this->fuel = $newAmount;
    }
}
