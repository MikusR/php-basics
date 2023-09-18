<?php
//Create an array with integers (up to 10) and print them out using foreach loop.
//$array = [];
//for ($i = 1; $i <= 10; $i++) {
//    $array[] = $i;
//}
$array = [32, 5, 8, 1, 2, 4, 1, 1, 9];

foreach ($array as $number) {
    echo $number . PHP_EOL;
}