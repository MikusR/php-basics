<?php
//Design a Geometry class with the following methods:
//
//A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//Area = π * r ** 2
//Use Math.PI for π and r for the radius of the circle
//A static method that accepts the length and width of a rectangle and returns the area of the rectangle.
// Use the following formula:
//Area = Length x Width
//A static method that accepts the length of a triangle’s base and the triangle’s height.
// The method should return the area of the triangle. Use the following formula:
//Area = Base x Height x 0.5
//The methods should display an error message if negative values are used for the circle’s radius,
// the rectangle’s length or width, or the triangle’s base or height.
//
//Next write a program to test the class, which displays the following menu and responds to the user’s selection:

function validateInput(float $number): bool
{
    return ($number > 0);
}

function calculateAreaOfCircle(float $radius): ?float
{
    return (validateInput($radius)) ? pi() * $radius ** 2 : null;
}

function calculateAreaOfRectangle(float $length, float $width): ?float
{
    return ((validateInput($length)) && (validateInput($width))) ? $length * $width : null;
}

function calculateAreaOfTriangle(float $base, float $height): ?float
{
    return ((validateInput($base)) && (validateInput($height))) ? $base * $height * 0.5 : null;
}

while (true) {
    echo "Geometry Calculator\n";
    echo "1. Calculate the Area of a Circle\n";
    echo "2. Calculate the Area of a Rectangle\n";
    echo "3. Calculate the Area of a Triangle\n";
    echo "4. Quit\n";

    $validInput = false;
    while ($validInput === false) {
        $choice = (int)readline("Enter your choice (1-4) : ");
        if (($choice >= 1) && ($choice <= 4)) {
            $validInput = true;
        } else {
            echo 'Only numbers 1-4 allowed' . PHP_EOL;
        }
    }
    switch ($choice) {
        case 1:
            $radius = readline('Enter radius of circle: ');
            $result = calculateAreaOfCircle($radius);
            echo (is_null($result)) ? "radius must be a positive number\n"
                : "The area of the circle is: $result\n";
            break;
        case 2:
            $length = readline('Enter length of rectangle: ');
            $width = readline('Enter width of rectangle: ');
            $result = calculateAreaOfRectangle($length, $width);
            echo (is_null($result)) ? "width and length must be a positive number\n"
                : "The area of the rectangle is: $result\n";
            break;
        case 3:
            $base = readline('Enter base of circle: ');
            $height = readline('Enter height of circle: ');
            $result = calculateAreaOfTriangle($base, $height);
            echo (is_null($result)) ? "base and height must be a positive number\n"
                : "The area of the triangle is: $result\n";
            break;
        case 4:
            exit();
    }
}