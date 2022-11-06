<?php declare(strict_types=1);

class Product
{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct()
    {
        echo "$this->name, price $this->startPrice, amount $this->amount";
    }
    public function changeQuantity($amount) {
        $this->amount = $amount;
    }
    public function changePrice($price) {
        $this->startPrice = $price;
    }
}

$products = [
    new Product("Logitech mouse", 70.00, 14),
    new Product("iPhone 5s", 999.99, 3),
    new Product("Epson EB-U05", 440.46, 1)
];

$products[0]->changeQuantity(5);
$products[1]->changePrice(899.99);

foreach ($products as $product) {
    echo $product->printProduct() . PHP_EOL;
}