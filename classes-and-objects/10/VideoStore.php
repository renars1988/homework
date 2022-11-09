<?php declare(strict_types=1);

class VideoStore
{
    private array $videos = [];

    public function addVideo(string $title): void
    {
        $this->videos[] = new Video($title);
    }

    public function checkOutVideo(string $title): void
    {
        $video = array_filter($this->videos, fn(Video $video) => $video->getTitle() === $title);
        $video = array_values($video)[0];
        $video->checkOut();
    }

    public function returnVideo(string $title): void
    {
        $video = array_filter($this->videos, fn(Video $video) => $video->getTitle() === $title);
        $video = array_values($video)[0];
        $video->checkIn();
    }

    public function getVideos(): array
    {
        return $this->videos;
    }
}