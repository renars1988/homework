<?php declare(strict_types=1);

namespace App;

class WinningsManager
{
    private array $combinations;
    private array $linesCoefficient;

    public function __construct()
    {
        // straight lines
        $this->setCombination(new Coordinate(0, 0), new Coordinate(0, 1), new Coordinate(0, 2), new Coordinate(0, 3), new Coordinate(0, 4));
        $this->setCombination(new Coordinate(1, 0), new Coordinate(1, 1), new Coordinate(1, 2), new Coordinate(1, 3), new Coordinate(1, 4));
        $this->setCombination(new Coordinate(2, 0), new Coordinate(2, 1), new Coordinate(2, 2), new Coordinate(2, 3), new Coordinate(2, 4));
        // V pattern
        $this->setCombination(new Coordinate(0, 0), new Coordinate(1, 1), new Coordinate(2, 2), new Coordinate(1, 3), new Coordinate(0, 4));
        // /\ pattern
        $this->setCombination(new Coordinate(2, 0), new Coordinate(1, 1), new Coordinate(0, 2), new Coordinate(1, 3), new Coordinate(2, 4));
        // winning lines coefficient
        $this->setLinesCoefficient(3, 1);
        $this->setLinesCoefficient(4, 2);
        $this->setLinesCoefficient(5, 3);
    }

    public function setCombination(Coordinate ...$coordinates)
    {
        $combination = [];
        foreach ($coordinates as $coordinate) {
            $combination[] = $coordinate->getCoordinate();
        }
        $this->combinations[] = $combination;
    }

    public function setLinesCoefficient(int $lines, int $value): void
    {
        $this->linesCoefficient[$lines] = $value;
    }

    public function checkWinnings(SlotsGenerator $slotsGenerator, PlayerObject $player): int
    {
        $currentWinnings = 0;
        $display = $slotsGenerator->getDisplay();

        /** @var $symbol Symbol */
        foreach ($this->combinations as $combination) {
            [$symbolX, $symbolY] = $combination[0];
            $symbol = $display[$symbolX][$symbolY];

            $counter = 0;

            foreach ($combination as $position) {
                [$x, $y] = $position;
                if ($symbol != $display[$x][$y]) {
                    break;
                }
                $counter++;
            }
            if ($counter >= 3) {
                $player->addMoney($this->winningsFormula($symbol->getValue(), $player->getBet(), $this->getLinesCoefficient($counter)));
                $currentWinnings += $this->winningsFormula($symbol->getValue(), $player->getBet(), $this->getLinesCoefficient($counter));
            }
        }

        return $currentWinnings;
    }

    private function winningsFormula(int $symbolValue, int $bet, int $linesCoefficient): int
    {
        return $symbolValue * $bet * $linesCoefficient;
    }

    private function getLinesCoefficient(int $linesWon): int
    {
        return $this->linesCoefficient[$linesWon];
    }
}
