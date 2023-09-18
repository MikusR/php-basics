<?php
declare(strict_types=1);
//Given variable (int) 50, determine if its in the range of 1 and 100.
//$int = 50;
//$int = intval(readline("Age: "));//vienmēr ir string
//$int = readline("Age: ");//vienmēr ir string
$int = (int)readline("Age: ");//Type cast

if (($int >= 1) && ($int <= 100)) {
    echo "$int is in the range of 1 and 100";
} else {
    echo "$int is not in the range of 1 and 100";
}
