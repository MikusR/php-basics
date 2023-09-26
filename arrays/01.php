<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];


echo "Original numeric array: \n";
echo implode(', ', $numbers) . PHP_EOL;

$sortedNumbers = $numbers;
sort($sortedNumbers);
echo "Sorted numeric array: \n";
echo implode(', ', $sortedNumbers) . PHP_EOL;

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

echo "Original string array: \n";
echo implode(', ', $words) . PHP_EOL;

$sortedWords = $words;
sort($sortedWords);
echo "Sorted string array: \n";
echo implode(', ', $sortedWords) . PHP_EOL;