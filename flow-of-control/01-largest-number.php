<?php

/*$numberArray = [];
$numberArray[1] = (int)readline("Input the 1st number: ");
$numberArray[2] = (int)readline("Input the 2nd number: ");
$numberArray[3] = (int)readline("Input the 3rd number: ");
echo 'Largest number ' . max($numberArray);*/

$number1 = (int)readline("Input the 1st number: ");
$number2 = (int)readline("Input the 2nd number: ");
$number3 = (int)readline("Input the 3rd number: ");

$largestNumber = $number1;

if (($number2 > $number1) && ($number2 > $number3)) $largestNumber = $number2;
if (($number3 > $number1) && ($number3 > $number2)) $largestNumber = $number3;

echo "Largest number is $largestNumber";