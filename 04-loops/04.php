<?php
//Create a non associative array with integers and print out only integers that divides by 3 without any left.

$array = [1, 5, 7, 3, 9, 12, 2, 15, 81];

foreach ($array as $number) {
    if ($number % 3 === 0) echo $number . PHP_EOL;
}
