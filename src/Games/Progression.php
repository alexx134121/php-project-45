<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\sendResult;
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\check;
use const BrainGames\Engine\COUNT_ROUND;

function run(): void
{
    $answers = [];
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
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
        $answers[0] = $correctAnswer;
        $answers[1] = $answer;
        $result = check($answers);
        sendResult($result, $userName);
        if (!is_null($result)){
            return;
        }
    }
}

function arithmeticProgression(int $initial, int $diff, int $length): array
{
    $progression = [];
    for ($i = 1; $i <= $length; $i++) {
        $progression[] = $initial + ($i - 1) * $diff;
    }
    return $progression;
}
