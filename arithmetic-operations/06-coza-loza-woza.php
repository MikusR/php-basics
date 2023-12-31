<?php
/*Write a program called 06-coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
The program shall print "Coza" in place of the numbers which are multiples of 3,
"Loza" for multiples of 5, "Woza" for multiples of 7, "CozaLoza" for multiples of 3 and 5, and so on.

The output shall look like:

1 2 Coza 4 Loza Coza Woza 8 Coza Loza 11
Coza 13 Woza CozaLoza 16 17 Coza 19 Loza CozaWoza 22
23 Coza Loza 26 Coza Woza 29 CozaLoza 31 32 Coza*/
$result = '';
$counter = 1;
$maxNumber = 110;
$groupBy = 11;

for ($i = 1; $i <= $maxNumber; $i++) {
    if ($counter > 1) {
        $num = ' ';
    } else $num = '';
    $resultIsANumber = true;
    if ($i % 3 === 0) {
        $num .= 'Coza';
        $resultIsANumber = false;
    }
    if ($i % 5 === 0) {
        $num .= 'Loza';
        $resultIsANumber = false;
    }
    if ($i % 7 === 0) {
        $num .= 'Woza';
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