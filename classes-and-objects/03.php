<?php

class FuelGauge
{
    private int $fuel;

    public function __construct(int $fuel)
    {
        $this->fuel = $fuel;
    }

    /**
     * @return int
     */
    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function addFuel(): void
    {
        if ($this->fuel < 70) {
            $this->fuel++;
        }
    }

    public function burnFuel(): void
    {
        if ($this->fuel > 0) {
            $this->fuel--;
        }
    }
}

class Odometer
{
    private int $mileage;
    private int $distanceTraveled = 0;
    private FuelGauge $fuelGauge;

    public function __construct(int $mileage, FuelGauge $fuelGauge)
    {
        $this->mileage = $mileage;
        $this->fuelGauge = $fuelGauge;
    }

    /**
     * @return int
     */
    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage(): void
    {
        $this->distanceTraveled++;
        if ($this->distanceTraveled === 10) {
            $this->fuelGauge->burnFuel();
            $this->distanceTraveled = 0;
        };
        ($this->mileage < 999999) ? $this->mileage++ : $this->mileage = 0;
    }
}

$fuelGauge = new FuelGauge(30);
$odometer = new Odometer(999910, $fuelGauge);

while ($fuelGauge->getFuel() < 70) {
    $fuelGauge->addFuel();
}
echo $odometer->getMileage() . "\n";
echo $fuelGauge->getFuel() . "\n";

while ($fuelGauge->getFuel() > 0) {
    $odometer->incrementMileage();
    echo "kilometers: {$odometer->getMileage()} liters: {$fuelGauge->getFuel()}\n";
}
