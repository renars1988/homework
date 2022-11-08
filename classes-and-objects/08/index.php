<?php declare(strict_types=1);

require_once "SavingsAccount.php";

$startingBalance = (float)readline("How much money is in the account?: ");
$annualInterestRate = (float)readline("Enter the annual interest rate: ");
$period = (int)readline("How long has the account been opened?: ");

$savingAcc = new SavingsAccount($startingBalance);
$savingAcc->setAnnualInterestRate($annualInterestRate);

$monthCounter = 1;
while ($monthCounter <= $period) {
    $deposit = (float)readline("Enter amount deposited for month: $monthCounter: ");
    $withdrawal = (float)readline("Enter amount withdrawn for $monthCounter: ");
    $savingAcc->deposit($deposit);
    $savingAcc->withdrawal($withdrawal);
    $savingAcc->addMonthlyInterest();
    $monthCounter++;
}

function formatMoney(float $number): string
{
    return "$" . number_format($number, 2);
}

echo "Total deposited: " . formatMoney($savingAcc->getTotalDeposited()) . PHP_EOL;
echo "Total withdrawn: " . formatMoney($savingAcc->getTotalWithdrawn()) . PHP_EOL;
echo "Interest earned: " . formatMoney($savingAcc->getInterestEarned()) . PHP_EOL;
echo "Ending balance: " . formatMoney($savingAcc->getBalance()) . PHP_EOL;