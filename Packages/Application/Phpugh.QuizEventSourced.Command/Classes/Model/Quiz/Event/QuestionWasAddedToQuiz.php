<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz\Event;

use Neos\EventSourcing\Event\EventInterface;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Dto\Question;

class QuestionWasAddedToQuiz implements EventInterface
{
    /**
     * @var string
     */
    protected $quizIdentifier;

    /**
     * @var Question
     */
    protected $question;

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
