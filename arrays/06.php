<?php
$listOfWords = [
    'word',
    'codelex',
    'cat',
    'catsup',
    'ketchup'
];
$gameIsRunning = true;
while ($gameIsRunning) {
    $wordToGuess = str_split($listOfWords[array_rand($listOfWords)]);
    $guess = [];
    $wrongLetters = [];
    $numberOfGuesses = count($wordToGuess) + 3;

    for ($j = 0; $j < count($wordToGuess); $j++) {
        $guess[$j] = '-';
    }


    echo 'wtg|' . implode('', $wordToGuess) . PHP_EOL;
    echo "Guess the word\n";

    for ($i = 0; $i <= $numberOfGuesses; $i++) {
        $correctLetter = false;
        echo implode(' ', $guess) . PHP_EOL;
        echo ($wrongLetters === []) ? '' : 'Wrong letters|' . implode(',', $wrongLetters) . PHP_EOL;
        while ($correctLetter === false) {
            $letter = readline("Enter letter: ");
            if (in_array($letter, $wrongLetters) || in_array($letter, $guess)) {
                echo "Letter already used\n";
            } else {
                $correctLetter = true;
            };
        }

        if (in_array($letter, $wordToGuess)) {

            foreach (array_keys($wordToGuess, $letter) as $key) {
                $guess[$key] = $letter;
            }

        } else {
            $wrongLetters[] = $letter;
        }
        if ($guess === $wordToGuess) {
            echo 'The word was: ' . implode('', $wordToGuess) . PHP_EOL;
            echo "You win" . PHP_EOL;
            break;
        }
        if ($i === $numberOfGuesses) {
            echo 'The word was: ' . implode('', $wordToGuess) . PHP_EOL;
            echo 'You lose' . PHP_EOL;
        }
    }
    $continue = readline('Play "again" or "quit"? quit: ');
    ($continue === 'again') || $gameIsRunning = false;

}