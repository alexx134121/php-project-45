<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const POSITIVE_ANSWER = 'yes';
const NEGATIVE_ANSWER = 'no';
const COUNT_ROUND = 3;

function sendResult(?array $result, string $userName): void
{
    if (is_null($result)) {
        line("Correct!");
        return;
    }
    [$answer, $correctAnswer] = $result;
    line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $userName!");
    return;
}

function getUserName(): string
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, $userName");
    return $userName;
}

function check(array $answers): ?array
{
    [$correctAnswer, $userAnswer] = $answers;
    $result = [];
    if ($correctAnswer == $userAnswer) {
        return null;
    } else {
        $result[0] = $userAnswer;
        $result[1] = $correctAnswer;
        return $result;
    }
}

function boolToStringAnswer(bool $val): string
{
    return strtolower(($val) ? POSITIVE_ANSWER : NEGATIVE_ANSWER);
}

function sendCongratulations(string $userName): void
{
    line("Congratulations, $userName!");
}

function roundGame(string $description, string $question, mixed $correctAnswer, string $userName): bool
{
    $answers = [];
    line($description);
    line("Question: $question");
    $answer = prompt("Your answer");
    $answers[0] = $correctAnswer;
    $answers[1] = $answer;
    $result = check($answers);
    sendResult($result, $userName);
    if (!is_null($result)) {
        return false;
    }
    return true;
}
function run(callable $game): void
{
    $userName = getUserName();
    for ($i = 0; $i < COUNT_ROUND; $i++) {
        [$description, $question, $answer] = $game();
        $roundResult = roundGame($description, $question, $answer, $userName);
        if ($roundResult === false) {
            return;
        }
    }
    sendCongratulations($userName);
    return;
}
