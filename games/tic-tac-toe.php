<?php

function display_board(array $board)
{
//    echo "   |   |   \n";
//    echo "---+---+---\n";
//    echo "   |   |   \n";
//    echo "---+---+---\n";
//    echo "   |   |   \n";
    foreach ($board as $row) {
        foreach ($row as $cell) {
            echo $cell . ' ';
        }
        echo PHP_EOL;
    }
}


$players = ['X', 'O'];

$board = [
    ['-', '-', '-'],
    ['-', '-', '-'],
    ['-', '-', '-'],
];
function checkState(array $board, string $player): ?string
{
    $combinations = [
        [[0, 0], [0, 1], [0, 2]],
        [[1, 0], [1, 1], [1, 2]],
        [[2, 0], [2, 1], [2, 2]],
        [[0, 0], [1, 0], [2, 0]],
        [[0, 1], [1, 1], [2, 1]],
        [[0, 2], [1, 2], [2, 2]],
        [[0, 0], [1, 1], [2, 2]],
        [[0, 2], [1, 1], [2, 0]],
    ];

    foreach ($combinations as $combination) {
        $line = [];
        foreach ($combination as $cell) {


            $line[] = $board[$cell[0]][$cell[1]];

        }
        if ((count(array_unique($line)) === 1) && ($line[0]) !== '-') {
            return "win";
        }

        $line = [];
    }

    if (in_array('-', array_merge($board[0], $board[1], $board[2])) === false) {
        return "tie";
    }
    return null;
}


function getTurn(array $board, string $player): array
{
    $validTurn = false;
    while ($validTurn === false) {
        $result = explode(' ', readline("'$player' choose your location (row, column) "));
        if ($board[$result[0]][$result[1]] === '-') $validTurn = true;
    }
    return $result;
}

$currentState = null;
$currentPlayer = 'X';
display_board($board);
while ($currentState === null) {


    $turn = getTurn($board, $currentPlayer);
    $board[$turn[0]][$turn[1]] = $currentPlayer;
    display_board($board);
    $state = checkState($board, $currentPlayer);
    if ($state === 'win') {
        echo "$currentPlayer has won";
        $currentState = $state;
    }
    if ($state === 'tie') {
        echo 'Game was a tie';
        $currentState = $state;
    }
    switch ($currentPlayer) {
        case 'X':

            $currentPlayer = 'O';
            break;
        case 'O':
            $currentPlayer = 'X';
            break;
    }
}
