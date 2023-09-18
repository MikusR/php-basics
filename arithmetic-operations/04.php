<?php
//Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10),
// as an int. Take note that it is the same as factorial of N.

function product(int $number): int
{
    $result = 1;
    for ($i = 1; $i <= $number; $i++) {
        $result *= $i;
    }
    return $result;
}

/*function factorial(int $number): int
{
    if ($number <= 1) return 1;
    return $number *= factorial($number - 1);
}*/

echo product(10);
/*echo PHP_EOL;
echo factorial(10);*/

