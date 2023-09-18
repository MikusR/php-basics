<?php
//Create a variable $plateNumber that stores your car plate number.
// Create a switch statement that prints out that its your car in case of your number.

$plateNumber = 'AA-34gg';
$testPlateNumber = readline('Check plate:');
switch ($testPlateNumber) {
    case ($plateNumber):
        echo "It's your car";
        break;
    default:
        echo "Not your car";
}