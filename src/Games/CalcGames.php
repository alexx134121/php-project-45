<?php

namespace BrainGames\Games\CalcGames;

use function cli\line;
use function cli\prompt;

function calcGame():?array
{
    line('What is the result of the expression?');
    $operations = ['-', '+', '*'];
    $firstArg = rand(0, 100);
    $secondArg = rand(0, 100);
    $operation = $operations[rand(0, 2)];
    $correctAnswer = calc($firstArg, $secondArg, $operation);
    $expression = "$firstArg $operation $secondArg";
    line("Question: $expression");
    $answer = floatval(prompt("Your answer"));
    if ($correctAnswer == $answer) {
        return null;
    } else {
        $result[0] = $answer;
        $result[1] = $correctAnswer;
        return $result;
    }
}

function calc(float $firstArg, float $secondArg,string $operation): ?float
{
    $result=null;
    switch ($operation){
        case '+':
            $result=$firstArg+$secondArg;
            break;
        case '-':
            $result=$firstArg-$secondArg;
            break;
        case '*':
            $result=$firstArg*$secondArg;
            break;
    }
    return $result;
}

