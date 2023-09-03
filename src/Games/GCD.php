<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\roundGame;
use function BrainGames\Engine\sendCongratulations;

use const BrainGames\Engine\COUNT_ROUND;

function run(): void
{
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
        $description = 'Find the greatest common divisor of given numbers.';
        $a = rand(0, 100);
        $b = rand(0, 100);
        $question = "$a $b";
        $correctAnswer = getGCD($a, $b);
        $roundResult = roundGame($description, $question, $correctAnswer, $userName);
        if ($roundResult === false) {
            return;
        }
    }
    sendCongratulations($userName);
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
