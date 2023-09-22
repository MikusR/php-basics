<?php


$elements = [
    'element_rock' => ['display_name' => 'Rock', 'stronger_than' => ['element_scissors', 'element_lizard']],
    'element_paper' => ['display_name' => 'Paper', 'stronger_than' => ['element_rock', 'element_spock']],
    'element_scissors' => ['display_name' => 'Scissors', 'stronger_than' => ['element_paper', 'element_lizard']],
    'element_lizard' => ['display_name' => 'Lizard', 'stronger_than' => ['element_paper', 'element_spock']],
    'element_spock' => ['display_name' => 'Spock', 'stronger_than' => ['element_scissors', 'element_rock']],
];
$computerElement = array_rand($elements); //array rand dod key

echo "Choose element:\n";
foreach ($elements as $element) {
    echo $element['display_name'] . PHP_EOL;
}
$userHasMadeAValidChoice = false;

$elements['element_joker'] = ['display_name' => 'Joker', 'stronger_than' => ['element_scissors',
    'element_rock', 'element_lizard', 'element_spock', 'element_paper']];

while ($userHasMadeAValidChoice === false) {
    $userSelection = readline('Enter element : ');

    foreach ($elements as $key => $element) {
        if (strtolower($element['display_name']) === strtolower($userSelection)) {
            $userElement = $key;
            $userHasMadeAValidChoice = true;
        }
    }
}
if ($computerElement === $userElement) {
    echo 'The result was a tie';
    exit;
}
echo (in_array($userElement, $elements[$computerElement]['stronger_than']))
    ? "Computer played {$elements[$computerElement]['display_name']} that is stronger than {$elements[$userElement]['display_name']}"
    : "Computer played {$elements[$computerElement]['display_name']} and loses to {$elements[$userElement]['display_name']}";