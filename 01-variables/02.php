<?php
//Dump the same values that should display both data type & its value. (Note, usage of var_dump)

$int = 10;
$float = 10.10;
$string = "hello world";

echo 'Variable $int is of type ' . gettype($int) . ' and its value is ' . $int . PHP_EOL;
echo 'Variable $float is of type ' . gettype($float) . ' and its value is ' . $float . PHP_EOL;
echo 'Variable $string is of type ' . gettype($string) . ' and its value is ' . $string . PHP_EOL;


