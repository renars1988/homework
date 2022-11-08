<?php declare(strict_types=1);

class SavingsAccount
{
    private float $balance;
    private float $annualInterestRate;
    private float $totalDeposited = 0;
    private float $totalWithdrawn = 0;
    private float $interestEarned = 0;

    public function __construct(float $startingBalance)
    {
        $this->balance = $startingBalance;
    }

    public function withdrawal(float $amount): void
    {
        $this->balance -= $amount;
        $this->totalWithdrawn += $amount;
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
        $this->totalDeposited += $amount;
    }

    public function setAnnualInterestRate(float $annualInterestRate): void
    {
        $this->annualInterestRate = $annualInterestRate;
    }

    public function addMonthlyInterest(): void
    {
        $monthlyInterest = $this->annualInterestRate / 12 * $this->balance;
        $this->interestEarned += $monthlyInterest;
        $this->balance += $monthlyInterest;
    }

    public function getTotalDeposited(): float
    {
        return $this->totalDeposited;
    }

    public function getTotalWithdrawn(): float
    {
        return $this->totalWithdrawn;
    }

    public function getInterestEarned(): float
    {
        return $this->interestEarned;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}
