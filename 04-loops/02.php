<?php
//Create an array with integers (up to 10) and print them out using for loop.

$array = [];
for ($i = 1; $i <= 10; $i++) {
    $array[] = $i;
}
for ($i = 0; $i < count($array); $i++) {
    echo $array[$i] . PHP_EOL;
}
