<?php

namespace BrainGames\Games\EvenGames;

use function cli\line;
use function cli\prompt;

const POSITIVE_ANSWER = 'yes';
const NEGATIVE_ANSWER = 'no';

function evenGame(): ?array
{
    $num = rand(0, 100);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line("Question: $num");
    $isEven = isEven($num);
    $correctAnswer = getCorrectAnswer($isEven);
    $answer = strtolower(prompt("Your answer"));
    if (isValidAnswer($answer) && $answer === $correctAnswer) {
        return null;
    } else {
        $result[0]=$answer;
        $result[1]=$correctAnswer;
        return $result;
    }
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function isValidAnswer(string $answer): bool
{
    return ($answer === POSITIVE_ANSWER || $answer === NEGATIVE_ANSWER);
}


function getCorrectAnswer(bool $isEven): string
{
    return strtolower(($isEven) ? POSITIVE_ANSWER : NEGATIVE_ANSWER);
}
