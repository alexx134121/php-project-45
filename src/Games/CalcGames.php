<?php

namespace BrainGames\Games\CalcGames;

use function BrainGames\Engine\check;
use function cli\line;
use function cli\prompt;

function run(): ?array
{
    line('What is the result of the expression?');
    $operations = ['-', '+', '*'];
    $firstArg = rand(0, 100);
    $secondArg = rand(0, 100);
    $operation = $operations[rand(0, 2)];
    $correctAnswer = calc($firstArg, $secondArg, $operation);
    $expression = "$firstArg $operation $secondArg";
    line("Question: $expression");
    $answer = floatval(prompt("Your answer"));
    return check($answer, $correctAnswer);
}

function calc(float $firstArg, float $secondArg, string $operation): ?float
{
    $result = null;
    switch ($operation) {
        case '+':
            $result = $firstArg + $secondArg;
            break;
        case '-':
            $result = $firstArg - $secondArg;
            break;
        case '*':
            $result = $firstArg * $secondArg;
            break;
    }
    return $result;
}
