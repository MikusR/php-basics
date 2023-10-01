<?php
$result = '';
$counter = 1;
$maxNumber = (int)readline("Max value? ");
$groupBy = 20;

for ($i = 1; $i <= $maxNumber; $i++) {
    if ($counter > 1) {
        $num = ' ';
    } else $num = '';
    $resultIsANumber = true;
    if ($i % 3 === 0) {
        $num .= 'Fizz';
        $resultIsANumber = false;
    }
    if ($i % 5 === 0) {
        $num .= 'Buzz';
        $resultIsANumber = false;
    }
  
    if ($resultIsANumber) {
        $num .= $i;
    }
    if ($counter < $groupBy) {
        $counter++;
        $result .= $num;
    } else {
        $counter = 1;
        $result .= $num . PHP_EOL;
    }
}
echo $result;