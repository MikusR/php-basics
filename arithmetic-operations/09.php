<?php
//Write a program that calculates and displays a person's body mass index (BMI).
// A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
// Where weight is measured in pounds and height is measured in inches.
// Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
// A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
// If the BMI is less than 18.5, the person is considered underweight.
// If the BMI value is greater than 25, the person is considered overweight.
//
//Your program must accept metric units.


function calculateBMI(float $weight, float $height, string $method = 'metric'): ?float
{
    if ($method === 'metric') {
        return round(($weight / (($height) ** 2)), 1);
    }
    if ($method === 'imperial') {
        return round((($weight * 703) / (($height) ** 2)), 1);
    }
    return null;
}

function shameUser(float $bmi): string
{
    switch (true) {
        case ($bmi > 18.5) && ($bmi < 25):
            return 'Optimal';
        case ($bmi < 18.5):
            return 'Underweight';
        case ($bmi > 25):
            return 'Owerweight';
        default:
            return 'Error';
    }
}


$method = readline('metric/imperial ');
$weight = ($method === 'metric') ? readline("Weight in kg: ") : readline("Weight in lb: ");
$height = ($method === 'metric') ? readline("Height in m: ") : readline("Height in in: ");
$bmi = calculateBMI($weight, $height, $method);
echo 'Your BMI is ' . $bmi . ' and you are ' . shameUser($bmi);
