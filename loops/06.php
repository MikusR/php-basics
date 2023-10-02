<?php
//Write a console program in a class named AsciiFigure that draws a figure of the following form, using for loops.
//
// ////////////////\\\\\\\\\\\\\\\\
// ////////////********\\\\\\\\\\\\
// ////////****************\\\\\\\\
// ////************************\\\\
// ********************************
//Then, modify your program using an integer class constant so that it can create a similar figure of any size.
// For instance, the diagram above has a size of 5. For example, the figure below has a size of 3:
//
// ////////\\\\\\\\
// ////********\\\\
// ****************
//And the figure below has a size of 7:
//
// ////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\
// ////////////////////********\\\\\\\\\\\\\\\\\\\\
// ////////////////****************\\\\\\\\\\\\\\\\
// ////////////************************\\\\\\\\\\\\
// ////////********************************\\\\\\\\
// ////****************************************\\\\
// ************************************************


function drawAsciiFigure(int $size): void
{
    for ($rinda = 0; $rinda < $size; $rinda++) {

        for ($slash = $size - $rinda - 1; $slash > 0; $slash--) {
            echo "////";
        }
        for ($star = 0; $star < $rinda; $star++) {
            echo "********";
        }
        for ($backSlash = $size - $rinda - 1; $backSlash > 0; $backSlash--) {
            echo '\\\\\\\\';
        }
        echo PHP_EOL;
    }
}

drawAsciiFigure(7);
