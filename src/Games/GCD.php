<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\check;
use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\sendResult;
use function cli\prompt;
use function cli\line;
use const BrainGames\Engine\COUNT_ROUND;

function run(): void
{
    $answers = [];
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
        line('Find the greatest common divisor of given numbers.');
        $a = rand(0, 100);
        $b = rand(0, 100);
        line("Question: $a $b");
        $correctAnswer = getGCD($a, $b);
        $answer = intval(prompt("Your answer"));
        $answers[0] = $correctAnswer;
        $answers[1] = $answer;
        $result = check($answers);
        sendResult($result, $userName);
        if (!is_null($result)) {
            return;
        }
    }
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
