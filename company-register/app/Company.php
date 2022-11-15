<?php declare(strict_types=1);

namespace App;

class Company
{
    private string $registrationCode;
    private string $name;

    public function __construct(string $registrationCode, string $name)
    {
        $this->registrationCode = $registrationCode;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRegistrationCode(): string
    {
        return $this->registrationCode;
    }
}
