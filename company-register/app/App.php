<?php declare(strict_types=1);

namespace App;

use League\Csv\Reader;

class App
{
    private string $filePath;
    private string $delimiter;
    private int $recordsLimit = 30;
    private int $searchLimit = 10;

    public function __construct(string $filePath, string $delimiter)
    {
        $this->filePath = $filePath;
        $this->delimiter = $delimiter;
    }

    public function init(): Reader
    {
        $reader = Reader::createFromPath($this->filePath);
        $reader->setDelimiter($this->delimiter);
        $reader->setHeaderOffset(0);
        return $reader;
    }

    public function getRecordsLimit(): int
    {
        return $this->recordsLimit;
    }

    public function setRecordsLimit(int $recordsLimit): void
    {
        $this->recordsLimit = $recordsLimit;
    }

    public function getSearchLimit(): int
    {
        return $this->searchLimit;
    }

    public function setSearchLimit(int $searchLimit): void
    {
        $this->searchLimit = $searchLimit;
    }
}