<?php declare(strict_types=1);

class Video
{
    private string $title;
    private bool $checkedOut = false;
    private array $ratings = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function checkOut(): void
    {
        $this->checkedOut = true;
    }

    public function checkIn(): void
    {
        $this->checkedOut = false;
    }

    public function rateVideo(int $rating): void
    {
        if ($rating > 0 && $rating <= 5) {
            $this->ratings[] = $rating;
        }
    }

    public function getAvgRating(): int
    {
        if ($this->ratings) {
            return intval(array_sum($this->ratings) / count($this->ratings));
        }
        return 0;
    }

    public function getChecked(): bool
    {
        return $this->checkedOut;
    }
}
