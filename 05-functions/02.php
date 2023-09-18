<?php
//Create a function that accepts 2 integer arguments.
// First argument is a base value and the second one is a value its been multiplied by.
// For example, given argument 10 and 5 prints out 50

function multiplyBy(int $number, int $multiplyBy = 2): int
{
    return $number * $multiplyBy;
}

echo multiplyBy(2, 4);