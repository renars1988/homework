<?php declare(strict_types=1);

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function getPg (array $movies): array
    {
        return array_filter($movies, function ($movie) {
            return $movie->rating == "PG";
        });
    }
}
