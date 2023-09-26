<?php
//var definēt elementus
//izdrukājas laukums
//var būt dažādas kombinācijas
//0 - 0 - 0 - 0
//0 - 0 - 0 - 0
//0 - 0 - 0 - 0
// daži elementi biežāk
//norādīt uzvarošās kombinācijas
//3 vai 4 rindā
//definē punktus par 1 elementu un tad reizina
//x x x o
//0 0 0 x
//0 0 0 0
//
//todo dažām pozīcijām savs īpašs nosaukums

$maxRows = 3;
$maxColumns = 4;
$cashPerCombination = 10;
$symbols = [
    'A' => 1, 'B' => 2, 'C' => 2, 'D' => 2, 'E' => 2, 'F' => 4
];
$elements = [];
foreach ($symbols as $symbol => $count) {
    for ($i = 1; $i <= $count; $i++) {
        $elements[] = $symbol;
    }
}
$combinations = [
    [
        ['x' => 0, 'y' => 0],
        ['x' => 0, 'y' => 1],
        ['x' => 0, 'y' => 2],
        ['x' => 0, 'y' => 3]
    ],
    [
        ['x' => 1, 'y' => 0],
        ['x' => 1, 'y' => 1],
        ['x' => 1, 'y' => 2],
        ['x' => 1, 'y' => 3]
    ],
    [
        ['x' => 2, 'y' => 0],
        ['x' => 2, 'y' => 1],
        ['x' => 2, 'y' => 2],
        ['x' => 2, 'y' => 3]
    ],
    [
        ['x' => 0, 'y' => 0],
        ['x' => 1, 'y' => 1],
        ['x' => 1, 'y' => 2],
        ['x' => 1, 'y' => 3]
    ], [
        ['x' => 1, 'y' => 0],
        ['x' => 2, 'y' => 1],
        ['x' => 2, 'y' => 2],
        ['x' => 2, 'y' => 3]
    ], [
        ['x' => 0, 'y' => 0],
        ['x' => 0, 'y' => 1],
        ['x' => 1, 'y' => 2],
        ['x' => 1, 'y' => 3]
    ], [
        ['x' => 1, 'y' => 0],
        ['x' => 1, 'y' => 1],
        ['x' => 2, 'y' => 2],
        ['x' => 2, 'y' => 3]
    ],
];


function fillBoard(array $elements, int $maxRows, int $maxColumns): array

{
    $board = [];
    for ($row = 0; $row < $maxRows; $row++) {
        for ($column = 0; $column < $maxColumns; $column++) {
            $board[$row][$column] = $elements[array_rand($elements)];
        }
    }
    return $board;
}

function displayBoard(array $board): void
{
    foreach ($board as $row) {
        foreach ($row as $column => $element) {
            echo "[$element]";
        }
        echo PHP_EOL;
    }

}


$playerCash = 100;
$costPerSpin = 25;
$spin = true;

while ($spin) {
    $winnings = 0;
    $playerCash -= $costPerSpin;
    $board = fillBoard($elements, $maxRows, $maxColumns);
    $board = fillBoard(['A', 'F'], $maxRows, $maxColumns);
    displayBoard($board);
    $test = [];
    $boardCombinations = [];
    foreach ($combinations as $key => $combination) {
        foreach ($combination as $position) {
            $boardCombinations[$key][] = $board[$position['x']][$position['y']];
        }
    }

    foreach ($boardCombinations as $combination) {
        if (count(array_unique($combination)) === 1) {
            $winnings += round((4 * $cashPerCombination) / $symbols[$combination[0]], 0);
        }

    }
    echo "you won $winnings €\n";
    $playerCash += $winnings;
    if ($playerCash < $costPerSpin) {
        echo "You have only $playerCash €. you can't afford to spin";
        exit;
    }
    echo "You currently have $playerCash\n";
    (readline("Spin again? y/n ") === 'y') || exit;
}