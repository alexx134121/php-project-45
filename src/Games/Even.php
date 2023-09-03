<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\boolToStringAnswer;
use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\roundGame;
use function BrainGames\Engine\sendCongratulations;

use const BrainGames\Engine\COUNT_ROUND;

function run(): void
{
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
        $num = rand(0, 100);
        $description = 'Answer "yes" if the number is even, otherwise answer "no".';
        $question = $num;
        $isEven = isEven($num);
        $correctAnswer = boolToStringAnswer($isEven);
        $roundResult = roundGame($description, $question, $correctAnswer, $userName);
        if ($roundResult === false) {
            return;
        }
    }
    sendCongratulations($userName);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}
