<?php

class FuelGauge
{
    private int $fuel;
    private int $capacity;

    public function __construct(int $fuel, int $capacity)
    {
        $this->fuel = $fuel;
        $this->capacity = $capacity;
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->fuel;
    }

    public function add(): void
    {
        if ($this->fuel < $this->getCapacity()) {
            $this->fuel++;
        }
    }

    public function burnFuel(): void
    {
        if ($this->fuel > 0) {
            $this->fuel--;
        }
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
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
    public function get(): int
    {
        return $this->mileage;
    }

    public function increment(): void
    {
        $this->distanceTraveled++;
        if ($this->distanceTraveled === 10) {
            $this->fuelGauge->burnFuel();
            $this->distanceTraveled = 0;
        };
        ($this->mileage < 999999) ? $this->mileage++ : $this->mileage = 0;
    }
}

class Car
{
    private Odometer $odometer;
    private FuelGauge $fuelGauge;

    public function __construct(Odometer $odometer, FuelGauge $fuelGauge)
    {
        $this->odometer = $odometer;
        $this->fuelGauge = $fuelGauge;
    }

    /**
     * @return FuelGauge
     */
    public function getFuelGauge(): FuelGauge
    {
        return $this->fuelGauge;
    }

    /**
     * @return Odometer
     */
    public function getOdometer(): Odometer
    {
        return $this->odometer;
    }

    public function drive(): void
    {
        $this->getOdometer()->increment();
        //if ($this->getFuelGauge()->burnFuel())
    }
}

$fuelGauge = new FuelGauge(30, 70);
$odometer = new Odometer(999910, $fuelGauge);
//$car = new Car(
// //   new Odometer(new FuelGauge(2, 70)),
//);
while ($fuelGauge->get() < $fuelGauge->getCapacity()) {
    $fuelGauge->add();
}
echo $odometer->get() . "\n";
echo $fuelGauge->get() . "\n";

while ($fuelGauge->get() > 0) {
    $odometer->increment();
    echo "kilometers: {$odometer->get()} liters: {$fuelGauge->get()}\n";
}
