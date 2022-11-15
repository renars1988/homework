<?php declare(strict_types=1);

require_once "vendor/autoload.php";

use App\App;
use App\CompaniesCollection;
use App\Company;

$app = new App("register.csv", ";");
$companiesCollection = new CompaniesCollection();
$reader = $app->init();
$menu = [
    "Show last {$app->getRecordsLimit()} entries",
    "Search by registration code",
    "Search by name"
];
echo "Select your option: " . PHP_EOL;
foreach ($menu as $key => $menuItem) {
    echo "[$key] $menuItem: " . PHP_EOL;
}

$selection = readline();

switch ($selection) {
    case 0:
        /** @var $company Company */
        foreach ($companiesCollection->getCompanies($reader) as $company) {
            echo "{$company->getRegistrationCode()} {$company->getName()}" . PHP_EOL;
        }
        break;
    case 1:
        $search = readline("Enter registration code: ");
        $company = $companiesCollection->searchByRegistrationCode($reader, $search);
        if ($company) {
            echo "{$company->getRegistrationCode()} {$company->getName()}" . PHP_EOL;
        } else {
            echo "Not found!" . PHP_EOL;
        }
        break;
    case 2:
        $search = readline("Enter the company name you would like to search for: ");
        $companies = $companiesCollection->searchByName($reader, $search);
        if ($companies) {
            foreach ($companies as $company) {
                echo "{$company->getRegistrationCode()} {$company->getName()}" . PHP_EOL;
            }
        } else {
            echo "Not found!" . PHP_EOL;
        }
        break;
    default:
        echo "Wrong selection!" . PHP_EOL;
}