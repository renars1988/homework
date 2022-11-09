<?php declare(strict_types=1);

require_once "Account.php";

$a = new Account("A", 100.0);
$b = new Account("B", 0);
$c = new Account("C", 0);

Account::transfer($a, $b, 50.0);
Account::transfer($b, $c, 25.0);

echo $a->getBalance();
echo PHP_EOL;
echo $b->getBalance();
echo PHP_EOL;
echo $c->getBalance();
echo PHP_EOL;
