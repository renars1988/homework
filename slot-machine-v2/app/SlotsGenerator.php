<?php declare(strict_types=1);

namespace App;

class SlotsGenerator
{
    private array $display;
    private int $rowLength = 5;
    private int $rowCount = 3;

    public function __construct()
    {
        for ($i = 0; $i < $this->rowCount; $i++) {
            $this->generateRow();
        }
    }

    private function generateRow(): void
    {
        $row = [];
        for ($i = 0; $i < $this->rowLength; $i++) {
            $row[] = (new SymbolCollection())->randomSymbolGenerator();
        }
        $this->display[] = $row;
    }

    public function getDisplay(): array
    {
        return $this->display;
    }
}
