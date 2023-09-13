//Given object

<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;
//Using dump method, dump out all 3 values.

var_dump($person->name);
var_dump($person->surname);
var_dump($person->age);

foreach ($person as $val) {
    echo $val . PHP_EOL;
}