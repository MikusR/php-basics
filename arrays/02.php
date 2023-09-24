<?php

$numbers = [20, 30, 25, 35, -16, 60, -100];
$sumOfNumbers = 0;
foreach ($numbers as $number) {
    $sumOfNumbers += $number;
}
$average = $sumOfNumbers / count($numbers);
echo $average;


