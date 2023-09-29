<?php

$numberToCheck = (int)readline("Enter the number. ");
$result = '';

$result = ($numberToCheck < 0) ? "Number $numberToCheck is negative" : "Number $numberToCheck is positive";
if ($numberToCheck === 0) $result = "Number $numberToCheck is neither positive nor negative";

echo $result;