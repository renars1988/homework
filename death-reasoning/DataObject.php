<?php declare(strict_types=1);

class DataObject
{
    private string $date;
    private string $deathReason;
    private array $nonViolentDeathReason;
    private array $violentDeathReason;
    private array $violentDeathType;

    public function __construct(string $date, string $deathReason, array $nonViolentDeathReason, array $violentDeathReason, array $violentDeathType)
    {
        $this->date = $date;
        $this->deathReason = $deathReason;
        $this->nonViolentDeathReason = $nonViolentDeathReason;
        $this->violentDeathReason = $violentDeathReason;
        $this->violentDeathType = $violentDeathType;
    }

    public function getDeathReason(): string
    {
        return $this->deathReason;
    }

    public function getNonViolentDeathReason(): array
    {
        return $this->nonViolentDeathReason;
    }

    public function getViolentDeathReason(): array
    {
        return $this->violentDeathReason;
    }

    public function getViolentDeathType(): array
    {
        return $this->violentDeathType;
    }
}
