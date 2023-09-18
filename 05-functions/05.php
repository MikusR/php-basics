<?php
//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
// Create a secondary array with shipping costs per weight.
// Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
// Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = [
    ['name' => 'Apple', 'weight' => 2],
    ['name' => 'Pear', 'weight' => 3],
    ['name' => 'Watermelon', 'weight' => 20],
    ['name' => 'Chokeberry', 'weight' => 5]
];
$shippingCosts = [
    'over10' => 2,
    'below10' => 1
];
function isWeightOver10kg(array $fruit): bool
{
    if ($fruit['weight'] > 10) {
        return true;
    }
    return false;

}

foreach ($fruits as $fruit) {
    if (isWeightOver10kg($fruit)) {
        echo 'Fruit: ' . $fruit['name'] . ', cost to ship: ' . $shippingCosts['over10'] . PHP_EOL;
    } else {
        echo 'Fruit: ' . $fruit['name'] . ', cost to ship: ' . $shippingCosts['below10'] . PHP_EOL;
    }
}