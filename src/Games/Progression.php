<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\roundGame;
use function BrainGames\Engine\sendCongratulations;

use const BrainGames\Engine\COUNT_ROUND;

function run(): void
{
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
        $description = 'What number is missing in the progression?';
        $diff = rand(1, 10);
        $length = rand(5, 15);
        $initial = rand(1, 100);
        $progression = arithmeticProgression($initial, $diff, $length);
        $missingKey = rand(0, $length - 1);
        $correctAnswer = $progression[$missingKey];
        $progression[$missingKey] = '..';
        $question = implode(" ", $progression);
        $roundResult = roundGame($description, $question, $correctAnswer, $userName);
        if ($roundResult === false) {
            return;
        }
    }
    sendCongratulations($userName);
}

function arithmeticProgression(int $initial, int $diff, int $length): array
{
    $progression = [];
    for ($i = 1; $i <= $length; $i++) {
        $progression[] = $initial + ($i - 1) * $diff;
    }
    return $progression;
}
