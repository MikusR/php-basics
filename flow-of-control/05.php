<?php
//On your phone keypad, the alphabets are mapped to digits as follows:
// ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).
//
//Write a program called PhoneKeyPad, which prompts user for a String (case insensitive),
// and converts to a sequence of keypad digits.
//
//Use:
//
//a "nested-if" statement
//a "switch-case-default" statement
//Hint: In switch-case, you can handle multiple cases by omitting the break statement, e.g.,

function PhoneKeyPad(string $string): string
{
    if (preg_match('/^[a-zA-Z\s]+$/', $string)) {
        $result = '';
        $arrayOfLetters = str_split(strtolower($string));
        foreach ($arrayOfLetters as $letter) {
            switch ($letter) {
                case 'a':
                    $result .= '2 ';
                    break;
                case 'b':
                    $result .= '22 ';
                    break;
                case 'c':
                    $result .= '222 ';
                    break;
                case 'd':
                    $result .= '3 ';
                    break;
                case 'e':
                    $result .= '33 ';
                    break;
                case 'f':
                    $result .= '333 ';
                    break;
                case 'g':
                    $result .= '4 ';
                    break;
                case 'h':
                    $result .= '44 ';
                    break;
                case 'i':
                    $result .= '444 ';
                    break;
                case 'j':
                    $result .= '5 ';
                    break;
                case 'k':
                    $result .= '55 ';
                    break;
                case 'l':
                    $result .= '555 ';
                    break;
                case 'm':
                    $result .= '6 ';
                    break;
                case 'n':
                    $result .= '66 ';
                    break;
                case 'o':
                    $result .= '666 ';
                    break;
                case 'p':
                    $result .= '7 ';
                    break;
                case 'q':
                    $result .= '77 ';
                    break;
                case 'r':
                    $result .= '777 ';
                    break;
                case 's':
                    $result .= '7777 ';
                    break;
                case 't':
                    $result .= '8 ';
                    break;
                case 'u':
                    $result .= '88 ';
                    break;
                case 'v':
                    $result .= '888 ';
                    break;
                case 'w':
                    $result .= '9 ';
                    break;
                case 'x':
                    $result .= '99 ';
                    break;
                case 'y':
                    $result .= '999 ';
                    break;
                case 'z':
                    $result .= '9999 ';
                    break;

            }
        }
        return $result;
    }
    return 'Use only English alphabet letters';
}

//echo PhoneKeyPad('aei');
$userInput = readline('Input text ');

echo PhoneKeyPad($userInput) . PHP_EOL;