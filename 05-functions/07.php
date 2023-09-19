<?php
//Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object)
// Person object has a name, valid licenses (multiple) & cash. Guns are objects stored within an array.
// Each gun has license letter, price & name.
// Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

//pārtaisīt lai atgriež masīvu ar elementiem un ja nevar tad tukšu masīvu

$person = new stdClass();
$person->name = 'Nota Fakename';
$person->licenses = ['Y', 'A'];
$person->cash = 400053;

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


function checkIfCanBuyGun(object $customer, array $listOfGuns): array
{
    $affordableGuns = [];

    foreach ($customer->licenses as $license) {
        foreach ($listOfGuns as $gun) {
            if (($gun->license === $license) && ($customer->cash >= $gun->price)) {
                $affordableGuns[] = $gun;

            };
        }
    }
    return $affordableGuns;

}

function formatOutput(array $affordableGuns): string
{
    $returnString = '';
    foreach ($affordableGuns as $affordableGun) {
        $returnString .= "Can buy Class $affordableGun->license gun $affordableGun->name for $affordableGun->price" . PHP_EOL;
    }
    if ($returnString === '') return 'Can\'t buy anything';
    return $returnString;
}

echo formatOutput(checkIfCanBuyGun($person, $guns));

