<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\roundGame;
use function BrainGames\Engine\sendCongratulations;

use const BrainGames\Engine\COUNT_ROUND;

function run(): void
{
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
        $description = 'What is the result of the expression?';
        $operations = ['-', '+', '*'];
        $firstArg = rand(0, 100);
        $secondArg = rand(0, 100);
        $operation = $operations[rand(0, 2)];
        $correctAnswer = calc($firstArg, $secondArg, $operation);
        $question = "$firstArg $operation $secondArg";
        $roundResult = roundGame($description, $question, $correctAnswer, $userName);
        if ($roundResult === false) {
            return;
        }
    }
    sendCongratulations($userName);
}

function calc(float $firstArg, float $secondArg, string $operation): ?float
{
    $result = match ($operation) {
        '+' => $firstArg + $secondArg,
        '-' => $firstArg - $secondArg,
        '*' => $firstArg * $secondArg
    };
    return $result;
}
