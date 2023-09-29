<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\boolToStringAnswer;
use function BrainGames\Engine\run as game;

function run(): void
{
    game(fn() => getData());
}

function getData(): array
{
    $num = rand(0, 100);
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $question = strval($num);
    $isEven = isEven($num);
    $correctAnswer = boolToStringAnswer($isEven);
    return [$description, $question, $correctAnswer];
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}
