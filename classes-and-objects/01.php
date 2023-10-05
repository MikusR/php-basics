<?php

class Product
{
    private float $price;
    private string $name;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->price = $startPrice;
        $this->amount = $amount;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return "$this->name, price $this->price €, amount $this->amount";
//        Banana, price 1.1, amount 13
    }
}


class Inventory
{
    /**
     * @var Product[]
     */
    private array $list;

    public function __construct()
    {
        $this->list[] = new Product('Logitech mouse', 70, 14);
        $this->list[] = new Product('iPhone 5s', 999.88, 3);
        $this->list[] = new Product('Epson EB-U05', 440.46, 1);
    }

    /**
     * @return Product[]
     */
    public function getInventory(): array
    {
        return $this->list;
    }

    public function printInventory(): string
    {
        $returnString = '';

        foreach ($this->list as $item) {
            $returnString .= $item->printProduct() . PHP_EOL;
        }
        return $returnString;
    }
}

$products = new Inventory();
foreach ($products->getInventory() as $product) {
    echo $product->printProduct() . PHP_EOL;
}
$products->getInventory()[0]->setPrice(99);
$products->getInventory()[1]->setAmount(999);
echo $products->printInventory();