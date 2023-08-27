<?php

namespace BrainGames\EvenGames;

use function cli\line;
use function cli\prompt;
const POSITIVE_ANSWER='yes';
const NEGATIVE_ANSWER='no';
function game(): void
{
    $userName=getUserName();
    $i=0;
    while ($i<3){
        $num=rand(0,100);
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line("Question: $num");
	$isEven= isEven($num);
	$correctAnswer=getCorrectAnswer($isEven);
        $answer=strtolower(prompt("Your answer"));
        if(isValidAnswer($answer) && $answer === $correctAnswer ){
            line("Correct!");
        }
        else{
    	    line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $userName");
    	    return;
    	}
	$i++;
    }
    line("Congratulations, $userName");
    return;
}

function isEven(int $num): bool
{
    return $num%2 === 0;
}

function isValidAnswer(string $answer): bool
{
    return ($answer === POSITIVE_ANSWER ||$answer === NEGATIVE_ANSWER);
}

function getUserName(): string
{
    line('Welcome to the Brain Games!');
    $userName=prompt('May I have your name?');
    line("Hello,$userName");
    return $userName;
}

function getCorrectAnswer(bool $isEven): string
{
    return strtolower(($isEven)?POSITIVE_ANSWER:NEGATIVE_ANSWER);
}
