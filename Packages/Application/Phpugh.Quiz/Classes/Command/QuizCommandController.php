<?php

namespace Phpugh\Quiz\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Phpugh\Quiz\Domain\Model\Answer;
use Phpugh\Quiz\Domain\Model\Question;
use Phpugh\Quiz\Domain\Model\Quiz;
use Phpugh\Quiz\Domain\Model\Result;
use Phpugh\Quiz\Domain\Repository\QuizRepository;

/**
 * Class QuizCommandController
 *
 * @package Phpugh\Quiz\Command
 */
class QuizCommandController extends CommandController
{
    /**
     * @Flow\Inject
     * @var QuizRepository
     */
    protected $quizRepository;

    public function highscoreCommand()
    {
        $quizzes = $this->quizRepository->findAll();
        $selectedQuiz = $this->output->select('Für welches Quiz?', $quizzes->toArray());

        /** @var Quiz $quiz */
        $quiz = $quizzes->offsetGet($selectedQuiz);
        $results = $quiz->getResults();

        $this->output->outputTable(
            $results->map(function ($result) {
                return [$result->getCorrectAnswers(), $result->getPlayer()];
            })->toArray(),
            ['Punkte', 'Spieler']
        );
    }

    public function playCommand()
    {
        $quizzes = $this->quizRepository->findAll();
        $selectedQuiz = $this->output->select('Welches Quiz möchtest zu spielen?', $quizzes->toArray());
        /** @var Quiz $quiz */
        $quiz = $quizzes->offsetGet($selectedQuiz);

        $player = $this->output->ask("Let's start! Wie heißt du?");

        $result = new Result();
        $result->setPlayer($player);

        // Jetzt wird gespielt!
        $questions = $quiz->getQuestions()->toArray();

        shuffle($questions);

        $correctAnswers = 0;

        foreach ($questions as $theQuestion) {
            /** @var Question $theQuestion */
            $choices = $theQuestion->getAnswers();
            $selectedChoice = $this->output->select($theQuestion->getTitle(), $choices->toArray());

            /** @var Answer $answer */
            $answer = $choices->offsetGet($selectedChoice);
            $isCorrect = $answer->isCorrect();

            if ($isCorrect) {
                $correctAnswers++;
                $this->outputLine('Woohooo, du hasts drauf!');
            } else {
                $this->outputLine('Leider Nein.');
            }
        }

        $result->setCorrectAnswers($correctAnswers);
        $quiz->addResult($result);

        $this->quizRepository->update($quiz);
    }
}
