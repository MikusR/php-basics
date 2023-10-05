<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $pointa, int $pointb)
    {
        $this->x = $pointa;
        $this->y = $pointb;
    }

    public function swapPoints(Point &$pointa, Point &$pointb): void
    {
        $tempPoint = $pointa;
        $pointa = $pointb;
        $pointb = $tempPoint;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")" . PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")";