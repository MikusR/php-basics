<?php
//Write a program to accept two integers and return true
// if the either one is 15 or if their sum or difference is 15.

function diff(int $a, int $b, $diff = 15): bool
{
    if ($a === $diff || $b === $diff) {
        return true;
    }

    if (($a + $b) === $diff || ($a - $b) === $diff) {
        return true;
    };
    return false;


}


//$a = 10;
$a = (int)readline('A:');
//$b = 5;
$b = (int)readline('B:');

if (diff($a, $b)) {
    echo 'true';
} else echo 'false';