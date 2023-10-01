<?php

$multiplyTimes = (int)readline("Input number of terms: ");
for ($i = 0; $i < $multiplyTimes; $i++) {
    $pow = $i * $i;
    echo "$i * $i = $pow" . PHP_EOL;
}
//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function
