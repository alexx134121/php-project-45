<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run as game;

function run(): void
{
    game(fn() => getData());
}

function getData(): array
{
    $description = 'What is the result of the expression?';
    $operations = ['-', '+', '*'];
    $firstArg = rand(0, 100);
    $secondArg = rand(0, 100);
    $operation = $operations[rand(0, 2)];
    $correctAnswer = calc($firstArg, $secondArg, $operation);
    $question = "$firstArg $operation $secondArg";
    return [$description, $question, $correctAnswer];
}

function calc(float $firstArg, float $secondArg, string $operation): float
{
    return match ($operation) {
        '+' => $firstArg + $secondArg,
        '-' => $firstArg - $secondArg,
        '*' => $firstArg * $secondArg,
        default => 0
    };
}
