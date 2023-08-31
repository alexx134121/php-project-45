<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\check;
use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\sendResult;
use function cli\line;
use function cli\prompt;
use const BrainGames\Engine\COUNT_ROUND;

function run(): void
{
    $answers = [];
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
        line('What is the result of the expression?');
        $operations = ['-', '+', '*'];
        $firstArg = rand(0, 100);
        $secondArg = rand(0, 100);
        $operation = $operations[rand(0, 2)];
        $correctAnswer = calc($firstArg, $secondArg, $operation);
        $expression = "$firstArg $operation $secondArg";
        line("Question: $expression");
        $answer = floatval(prompt("Your answer"));
        $answers[0] = $correctAnswer;
        $answers[1] = $answer;
        $result = check($answers);
        sendResult($result, $userName);
        if (!is_null($result)) {
            return;
        }
    }
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
