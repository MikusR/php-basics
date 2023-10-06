<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;

    public function __construct(int $year, int $month, int $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $month
     */
    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $day
     */
    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    private function addZero(int $number): string
    {
        return ($number < 10) ? '0' . $number : $number;
    }

    public function displayDate(): string
    {
        $month = $this->addZero($this->getMonth());
        $day = $this->addZero($this->getDay());
        return $month . '/' . $day . '/' . $this->getYear();
    }

    public function displayPropperDate(): string
    {
        $month = $this->addZero($this->getMonth());
        $day = $this->addZero($this->getDay());
        return $this->getYear() . '-' . $month . '-' . $day;
    }
}

class DateTest
{
    public static function setDate(int $year, int $month, int $day): Date
    {
        return new Date($year, $month, $day);
    }

    public static function dateToString(Date $date): string
    {
        return $date->displayPropperDate();
    }
}

$test = DateTest::setDate(1984, 4, 20);
echo DateTest::dateToString($test);
