<?php

class Survey
{
    private int $surveyed = 12467;
    private float $purchasedEnergyDrinks = 0.14;
    private float $preferCitrusDrinks = 0.64;

    public function calculateEnergyDrinkers(): int
    {
        return round($this->surveyed * $this->purchasedEnergyDrinks);
    }

    public function calculatePreferCitrus(): int
    {
        return round($this->calculateEnergyDrinkers() * $this->preferCitrusDrinks);
    }

    /**
     * @return int
     */
    public function getSurveyed(): int
    {
        return $this->surveyed;
    }

    public function printReport(): string
    {
        return "Total number of people surveyed " . $this->getSurveyed() . PHP_EOL .
            "Approximately " . $this->calculateEnergyDrinkers() . " bought at least one energy drink" . PHP_EOL .
            $this->calculatePreferCitrus() . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;
    }

}

$test = new Survey();
echo $test->printReport();
