<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\check;

function run(): ?array
{
    line('What number is missing in the progression?');
    $diff = rand(1, 10);
    $length = rand(5, 15);
    $initial = rand(1, 100);
    $progression = arithmeticProgression($initial, $diff, $length);
    $missingKey = rand(0, $length - 1);
    $correctAnswer = $progression[$missingKey];
    $progression[$missingKey] = '..';
    $question = implode(" ", $progression);
    line("Question: $question");
    $answer = intval(prompt("Your answer"));
    return check($answer, $correctAnswer);
}

function arithmeticProgression(int $initial, int $diff, int $length): array
{
    $progression = [];
    for ($i = 1; $i <= $length; $i++) {
        $progression[] = $initial + ($i - 1) * $diff;
    }
    return $progression;
}
