<?php
//By your choice, create condition with 3 checks.
//For example, if value is greater than X, less than Y and is an even number.

$X = 2;
$Y = 14;
$input = (int)readline('Input number: ');

$evencheck = $input % 2 == 0;//ja dalās ar 2 bez atlikuma tad even
//$evenchenck = !($input & 1);//ja numuru AND ar 1 tad odd tēpēc !

if (($input > $X) && ($input < $Y) && ($evencheck)) {
    echo "$input>$X and $input<$Y and $input is even";
};