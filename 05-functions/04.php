<?php
//Create a array of objects that uses the function of exercise 3
// but in loop printing out if the person has reached age of 18.

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

$peopleToCheck = [$person1, $person2, $person3];

function ageCheck(object $subject): string
{
    if ($subject->age >= 18) {
        return "$subject->name $subject->surname is over 18 years old";
    }
    return "$subject->name $subject->surname is too young";
}


foreach ($peopleToCheck as $person) {
    echo ageCheck($person) . PHP_EOL;
}