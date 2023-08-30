<?php

namespace BrainGames\Games\EvenGames;

use function BrainGames\Engine\boolToStringAnswer;
use function BrainGames\Engine\check;
use function cli\line;
use function cli\prompt;

function run(): ?array
{
    $answers = [];
    $num = rand(0, 100);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line("Question: $num");
    $isEven = isEven($num);
    $correctAnswer = boolToStringAnswer($isEven);
    $answer = strtolower(prompt("Your answer"));
    $answers[0] = $correctAnswer;
    $answers[1] = $answer;
    return check($answers);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}
