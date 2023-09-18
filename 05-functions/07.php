<?php
//Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object)
// Person object has a name, valid licenses (multiple) & cash. Guns are objects stored within an array.
// Each gun has license letter, price & name.
// Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

$person = new stdClass();
$person->name = 'Nota Fakename';
$person->licenses = ['Y', 'A'];
$person->cash = 453;

function createANewGun(string $name, string $license, int $price): stdClass
{
    $handgun = new stdClass();
    $handgun->name = $name;
    $handgun->license = $license;
    $handgun->price = $price;

    return $handgun;
}

$guns = [
    createANewGun('COP .357', 'A', 376),
    createANewGun('M/28-30', 'B', 1322),
    createANewGun('Suomi KP/-31', 'D', 73),
    createANewGun('Mossberg 500', 'D', 177),
    createANewGun('M134 Minigun', 'Y', 19999),
];


function checkIfCanBuyGun(object $customer, array $listOfGuns): string
{
    $returnString = '';
    foreach ($customer->licenses as $license) {
        foreach ($listOfGuns as $gun) {
            if (($gun->license === $license) && ($customer->cash >= $gun->price)) {
                $returnString .= "Can buy Class $license gun $gun->name for $gun->price" . PHP_EOL;
            };
        }
    }
    if ($returnString === '') return 'Can\'t buy anything';
    return $returnString;
}

echo checkIfCanBuyGun($person, $guns);

