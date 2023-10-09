<?php

class SavingsAccount
{
    private int $balanceInCents;
    private float $annualInterestRate;
    private float $monthlyInterestRate;

    public function __construct(int $initialAmount, float $interestRate)
    {
        $this->balanceInCents = $initialAmount * 100;
        $this->annualInterestRate = $interestRate / 100;
        $this->monthlyInterestRate = $this->annualInterestRate / 12;
    }

    public function withdraw(int $ammount): void
    {
        $this->balanceInCents -= $ammount * 100;
    }


    /**
     * @return int
     */
    public function getBalanceInCents(): int
    {
        return $this->balanceInCents;
    }

    /**
     * @return float
     */
    public function getBalanceInEuro(): float
    {
        return $this->getBalanceInCents() / 100;
    }

    public function calculateMonthlyInterest(): int
    {
        return round($this->balanceInCents * $this->monthlyInterestRate);
    }

    public function addMonthlyInterest()
    {
        $this->balanceInCents += $this->calculateMonthlyInterest();
    }

    public function deposit(int $ammount): void
    {
        $this->balanceInCents += $ammount * 100;
    }
}

class BankTest
{
    private SavingsAccount $account;

    public function __construct()
    {
        $ammount = (int)readline("How much money is in the account?: ");
        $interestRate = (float)readline("Enter the annual interest rate: ");
        $this->account = new SavingsAccount($ammount, $interestRate);
        $this->askForAdditionalData();
    }

    public function askForAdditionalData(): void
    {
        $monthsAccountOpen = (int)readline('How long has the account been opened?: ');
        $this->doTheLoop($monthsAccountOpen);
    }

    public function toEuro(int $cents): int
    {
        return $cents / 100;
    }

    public function doTheLoop(int $monthsOpened): void
    {
        $totalDeposited = 0;
        $totalWithdrawn = 0;
        $totalInterest = 0;
        for ($month = 1; $month <= $monthsOpened; $month++) {
            $deposited = (int)readline("Enter amount deposited for month: $month: ");
            $this->account->deposit($deposited);
            $withdrawn = (int)readline("Enter amount withdrawn for: $month: ");
            $this->account->withdraw($withdrawn);
            $totalInterest += $this->account->calculateMonthlyInterest();
            $this->account->addMonthlyInterest();
            $totalDeposited += $deposited;
            $totalWithdrawn += $withdrawn;
        }
        $balance = $this->account->getBalanceInCents();
        echo "Total deposited: €{$totalDeposited}\n";
        echo "Total withdrawn: €{$totalWithdrawn}\n";
        echo "Interest earned: €{$this->toEuro($totalInterest)}\n";
        echo "Ending balance: €{$this->toEuro($balance)}\n";
    }
}

$test = new BankTest();