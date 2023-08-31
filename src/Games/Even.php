<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\boolToStringAnswer;
use function BrainGames\Engine\check;
use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\sendCongratulations;
use function BrainGames\Engine\sendResult;
use function cli\line;
use function cli\prompt;
use const BrainGames\Engine\COUNT_ROUND;

function run(): void
{
    $answers = [];
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
        $num = rand(0, 100);
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line("Question: $num");
        $isEven = isEven($num);
        $correctAnswer = boolToStringAnswer($isEven);
        $answer = strtolower(prompt("Your answer"));
        $answers[0] = $correctAnswer;
        $answers[1] = $answer;
        $result = check($answers);
        sendResult($result, $userName);
        if (!is_null($result)) {
            return;
        }
    }
    sendCongratulations($userName);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}
