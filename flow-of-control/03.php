<?php
//Write a program that reads an positive integer and count the number of digits the number has.
$numberToCheck = (int)readline("Enter positive integer ");
$result = (is_int($numberToCheck) && $numberToCheck > 0)
    ? "Number $numberToCheck has " . strlen(strval($numberToCheck)) . ' digits'
    : "Number must be a positive integer";
echo $result;