<?php
//Create a person object with name, surname and age.
// Create a function that will determine if the person has reached 18 years of age.
// Print out if the person has reached age of 18 or not.

$person = new stdClass();
$person->name = 'Jon';
$person->surname = 'Smat';
$person->age = 21;

function ageCheck(object $subject): string
{
    if ($subject->age >= 18) {
        return "$subject->name $subject->surname is over 18 years old";
    }
    return "$subject->name $subject->surname is too young";
}

echo ageCheck($person);