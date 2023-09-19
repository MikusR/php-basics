<?php
/*Write a program that picks a random number from 1-100. Give the user a chance to guess it.
If they get it right, tell them so. If their guess is higher than the number, say "Too high."
If their guess is lower than the number, say "Too low." Then quit. (They don't get any more guesses for now.)

I'm thinking of a number between 1-100.  Try to guess it.
> 13

Sorry, you are too low.  I was thinking of 34.
I'm thinking of a number between 1-100.  Try to guess it.
> 79

Sorry, you are too high.  I was thinking of 51.
I'm thinking of a number between 1-100.  Try to guess it.
> 42

You guessed it!  What are the odds?!?*/

$randomNumber = mt_rand(1, 100);
$userInput = (int)readline('I\'m thinking of a number between 1-100.  Try to guess it. ');
switch ($userInput) {
    case ($userInput === $randomNumber):
        echo "You guessed it!  What are the odds?!?";
        break;
    case ($userInput < $randomNumber):
        echo "Sorry, you are too low.  I was thinking of $randomNumber";
        break;
    case ($userInput > $randomNumber):
        echo "Sorry, you are too high.  I was thinking of $randomNumber";
        break;
}