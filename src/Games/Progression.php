<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run as game;

function run(): void
{
    game(fn() => getData());
}

function getData(): array
{
    $description = 'What number is missing in the progression?';
    $diff = rand(1, 10);
    $length = rand(5, 15);
    $initial = rand(1, 100);
    $progression = arithmeticProgression($initial, $diff, $length);
    $missingKey = rand(0, $length - 1);
    $correctAnswer = $progression[$missingKey];
    $progression[$missingKey] = '..';
    $question = implode(" ", $progression);
    return [$description, $question, $correctAnswer];
}


function arithmeticProgression(int $initial, int $diff, int $length): array
{
    $progression = [];
    for ($i = 1; $i <= $length; $i++) {
        $progression[] = $initial + ($i - 1) * $diff;
    }
    return $progression;
}
