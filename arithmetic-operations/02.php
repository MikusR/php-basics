<?php
//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd,
// or “Even Number” otherwise. The program shall always print “bye!” before exiting.

function CheckOddEven(int $number): string
{
    if ($number % 2 == 0) return 'Even Number' . PHP_EOL . 'bye!' . PHP_EOL;
    return 'Odd Number' . PHP_EOL . 'bye!' . PHP_EOL;
}

echo CheckOddEven(0);
echo CheckOddEven(-3);
echo CheckOddEven(6);

