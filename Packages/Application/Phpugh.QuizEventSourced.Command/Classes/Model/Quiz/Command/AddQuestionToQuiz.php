<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz\Command;

use Phpugh\QuizEventSoured\Command\Model\Quiz\Dto\Question;

final class AddQuestionToQuiz implements QuizCommandInterface
{

    /**
     * @var string
     */
    private $quizIdentifier;

    /**
     * @var Question
     */
    private $question;

    /**
     * @param string $quizIdentifier
     * @param Question $question
     */
    public function __construct(string $quizIdentifier, Question $question)
    {
        $this->quizIdentifier = $quizIdentifier;
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getQuizIdentifier(): string
    {
        return $this->quizIdentifier;
    }

    /**
     * @return Question
     */
    public function getQuestion(): Question
    {
        return $this->question;
    }
}
