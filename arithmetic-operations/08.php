<?php

function createEmployee(float $basePay, int $hoursWorked): stdClass {
    $employee = new stdClass();
    $employee->basePay = $basePay;
    $employee->hoursWorked = $hoursWorked;
    return $employee;
}

function calculateWages(float $basePay, int $hoursWorked) {
    if ($basePay < 8.00 || $hoursWorked > 60) {
        echo "Cannot calculate wages with provided parameters for this employee";
        echo PHP_EOL;
        return;
    }

    $overtimeHours = 0;

    if ($hoursWorked - 40 > 0) {
        $overtimeHours = $hoursWorked - 40;
    }
    $total = ($hoursWorked - $overtimeHours) * $basePay + $overtimeHours * 1.5 * $basePay;
    echo number_format($total, 2) . "$";
    echo PHP_EOL;
}

$employees = [
    createEmployee(7.50, 35),
    createEmployee(8.20, 47),
    createEmployee(10.00, 73)
];

foreach ($employees as $employee) {
    calculateWages($employee->basePay, $employee->hoursWorked);
}