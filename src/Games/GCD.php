<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\run as game;

function run(): void
{
    game(fn() => getData());
}

function getData(): array
{
    $description = 'Find the greatest common divisor of given numbers.';
    $a = rand(0, 100);
    $b = rand(0, 100);
    $question = "$a $b";
    $correctAnswer = getGCD($a, $b);
    return [$description, $question, $correctAnswer];
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
