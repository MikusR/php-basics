//Given array

<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
//Program should display concatenated value of - John & Jane Doe`s

echo $items[0][0]['name'] . ' ' . $items[0][0]['surname'] . ' ' . $items[0][0]['age'] . PHP_EOL;
echo $items[0][1]['name'] . ' ' . $items[0][1]['surname'] . ' ' . $items[0][1]['age'] . PHP_EOL;
