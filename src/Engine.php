<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\CalcGames\calcGame;
use function BrainGames\Games\EvenGames\evenGame;

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
    line("Congratulations, $userName");
    return;
}

function getUserName(): string
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello,$userName");
    return $userName;
}

function selectGame(string $game):?array
{
    switch ($game) {
        case 'even':
            $result = evenGame();
            break;
        case 'calc':
            $result = calcGame();
            break;
    }
    return $result;
}