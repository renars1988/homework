<?php declare(strict_types=1);

class Account
{
    private string $accountName;
    private float $balance;

    public function __construct(string $accountName, float $balance)
    {
        $this->accountName = $accountName;
        $this->balance = $balance;
    }

    public static function transfer(Account $from, Account $to, float $howMuch)
    {
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);
    }

    public function withdrawal(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}