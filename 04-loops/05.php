<?php
//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday.
// Using loop (by your choice) print out every persons personal data.

function createPerson(string $name, string $surname, int $age, string $birthday): stdClass
{
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;
    $person->birthday = $birthday;

    return $person;
}


$person1 = new stdClass();
$person1->name = "John";
$person1->surname = "Doore";
$person1->age = 28;
$person1->birthday = 'February 02';

$person2 = new stdClass();
$person2->name = "Jon";
$person2->surname = "Dare";
$person2->age = 12;
$person2->birthday = 'January 12';

$person3 = new stdClass();
$person3->name = "Johan";
$person3->surname = "Doe";
$person3->age = 32;
$person3->birthday = 'August 23';
//$people[] = $person;
$people = [$person1, $person2, $person3,
    createPerson('Ezis', 'Mazais', 5, 'June 21')];

$people[] = createPerson('Aldis', 'Aldersons', 75, 'December 4');

foreach ($people as $entry) {
    echo 'Name: ' . $entry->name . ' ' . $entry->surname . PHP_EOL;
    echo 'Age: ' . $entry->age . PHP_EOL;
    echo 'Born: ' . $entry->birthday . PHP_EOL . PHP_EOL;
}