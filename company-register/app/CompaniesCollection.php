<?php declare(strict_types=1);

namespace App;

use League\Csv\Reader;
use League\Csv\Statement;

class CompaniesCollection extends App
{
    private array $companies;

    public function __construct(array $companies = [])
    {
        foreach ($companies as $company) {
            $this->add($company);
        }
    }

    public function add(Company $company): void
    {
        $this->companies[] = $company;
    }

    public function searchByRegistrationCode(Reader $reader, string $registrationCode): ?Company
    {
        $records = $reader->getRecords();
        foreach ($records as $record) {
            if ($record["regcode"] === $registrationCode) {
                return new Company($record["regcode"], $record["name"]);
            }
        }
        return null;
    }

    public function getCompanies(Reader $reader): array
    {
        $stmt = Statement::create()->limit($this->getRecordsLimit());
        $records = $stmt->process($reader);

        foreach ($records as $record) {
            $this->companies[] = new Company($record["regcode"], $record["name"]);
        }

        return $this->companies;
    }

    public function searchByName(Reader $reader, string $name): array
    {
        $records = $reader->getRecords();
        $results = [];
        foreach ($records as $record) {
            if (strpos($record["name"], $name) !== false && count($results) < $this->getSearchLimit()) {
                $results[] = new Company($record["regcode"], $record["name"]);
            }
        }
        return $results;
    }
}
