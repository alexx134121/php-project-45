<?php

namespace BrainGames\Games\GCDGame;

use function BrainGames\Engine\check;
use function cli\prompt;
use function cli\line;

function run(): ?array
{
    line('Find the greatest common divisor of given numbers.');
    $a = rand(0, 100);
    $b = rand(0, 100);
    line("Question: $a $b");
    $correctAnswer = getGCD($a, $b);
    $answer = intval(prompt("Your answer"));
    return check($answer, $correctAnswer);
}

function getGCD(int $a, int $b): int
{
    $a = abs($a);
    $b = abs($b);
    if ($a < $b) {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }
    if ($b === 0) {
        return $a;
    }
    while ($a % $b !== 0) {
        $r = $a % $b;
        $a = $b;
        $b = $r;
    }
    return $b;
}
