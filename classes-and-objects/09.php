<?php

class BankAccount
{
    private string $name;
    private int $balance;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getBalance(): string
    {
        $balance = round($this->balance / 100, 2);
        return ($balance < 0) ? '-$' . abs($balance) : "$$balance";
    }

    public function showUserNameAndBalance(): string
    {
        return "{$this->getName()}, {$this->getBalance()}";
    }

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance * 100;
    }

}

$test = new BankAccount('Stella', -43.54);
echo $test->showUserNameAndBalance();