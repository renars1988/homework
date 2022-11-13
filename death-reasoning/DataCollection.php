<?php declare(strict_types=1);

class DataCollection
{
    private array $data;

    public function __construct(array $data = [])
    {
        foreach ($data as $entry) {
            $this->add($entry);
        }
    }

    public function add(DataObject $dataObject)
    {
        $this->data[] = $dataObject;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function deathReasonTotals(): array
    {
        $data = [];
        foreach ($this->data as $entry) {
            $data[] = $entry->getDeathReason();
        }
        return array_count_values($data);
    }

    public function nonViolentDeathReasonTotals(): array
    {
        $data = [];
        foreach ($this->data as $entry) {
            $data[] = $entry->getNonViolentDeathReason();
        }
        return array_count_values(array_merge(...$data));
    }

    public function violentDeathReasonTotals(): array
    {
        $data = [];
        foreach ($this->data as $entry) {
            $data[] = $entry->getViolentDeathReason();
        }
        return array_count_values(array_merge(...$data));
    }

    public function violentDeathTypeTotals(): array
    {
        $data = [];
        foreach ($this->data as $entry) {
            $data[] = $entry->getViolentDeathType();
        }
        return array_count_values(array_merge(...$data));
    }
}