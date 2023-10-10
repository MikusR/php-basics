<?php

declare(strict_types=1);

class Account
{
    private string $name;
    private int $ammount;

    public function __construct(string $name, int $ammount = 0)
    {
        $this->name = $name;
        $this->ammount = $ammount * 100;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function withdrawal(int $ammount): void
    {
        $this->ammount -= $ammount * 100;
    }

    public function deposit(int $deposit): void
    {
        $this->ammount += $deposit * 100;
    }

    public function __toString(): string
    {
        return $this->name . ' ' . $this->ammount / 100 . PHP_EOL;
    }

    public function balance(): float
    {
        return $this->ammount / 100;
    }

}

class Bank
{
    /**
     * @var Account[]
     */
    private array $listOfAccounts;

    public function __construct(array $accounts = [])
    {
        $this->listOfAccounts = $accounts;
    }

    public function addAccount(string $name, int $ammount = 0)
    {
        $this->listOfAccounts[] = new Account($name, $ammount);
    }

    public function transfer(Account $from, Account $to, int $ammount): void
    {
        $from->withdrawal($ammount);
        $to->deposit($ammount);
    }

    public function getAccountByName(string $name): ?Account
    {
        foreach ($this->listOfAccounts as $account) {
            if ($account->getName() === $name) {
                return $account;
            }
        }
        return null;
    }

    public function __toString(): string
    {
        $returnString = '';
        foreach ($this->listOfAccounts as $account) {
            $returnString .= "{$account->getName()}, {$account->balance()}\n";
        }
        return $returnString;
    }
}

class Application
{
    public function run()
    {
        $bank = new Bank(
            [
                new Account('A', 100),
                new Account('B')
            ]
        );
        $bank->addAccount('C');
        $a = $bank->getAccountByName('A');
        $b = $bank->getAccountByName('B');
        $c = $bank->getAccountByName('C');
        echo $bank;
        $bank->transfer($a, $b, 50);
        $bank->transfer($b, $c, 25);
        echo $bank;
    }


}

$app = new Application();
$app->run();