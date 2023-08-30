<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\CalcGames\run as calcGame;
use function BrainGames\Games\EvenGames\run as evenGame;
use function BrainGames\Games\GCDGame\run as GCDGame;
use function BrainGames\Games\Progression\run as ProgressionGame;
use function BrainGames\Games\Prime\run as PrimeGame;

const POSITIVE_ANSWER = 'yes';
const NEGATIVE_ANSWER = 'no';

function game(string $game): void
{
    $userName = getUserName();
    $i = 0;
    while ($i < 3) {
        $result = selectGame($game);
        if (is_null($result)) {
            line("Correct!");
        } else {
            [$answer, $correctAnswer] = $result;
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $userName");
            return;
        }
        $i++;
    }
    line("Congratulations, $userName!");
    return;
}

function getUserName(): string
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, $userName");
    return $userName;
}

function selectGame(string $game): ?array
{
    switch ($game) {
        case 'even':
            $result = evenGame();
            break;
        case 'calc':
            $result = calcGame();
            break;
        case 'gcd':
            $result = GCDGame();
            break;
        case 'progression':
            $result = ProgressionGame();
            break;
        case 'prime':
            $result = PrimeGame();
            break;
    }
    return $result;
}
function check($userAnswer, $correctAnswer): ?array
{
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
