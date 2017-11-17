<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Question;

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Phpugh\QuizEventSoured\Query\Projection\Quiz\Quiz;
use Phpugh\QuizEventSoured\Query\Projection\Quiz\QuizFinder;

/**
 * @Flow\Entity
 * @ORM\Table(name="phpugh_quiz_projection_question")
 */
class Question
{
    /**
     * @Flow\Inject
     * @var QuizFinder
     */
    protected $quizFinder;

    /**
     * @ORM\Id
     * @var string
     */
    protected $questionIdentifier;

    /**
     * @var string
     */
    protected $quizIdentifier;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param string $questionIdentifier
     * @param string $quizIdentifier
     */
    public function __construct(string $questionIdentifier, string $quizIdentifier)
    {
        $this->questionIdentifier = $questionIdentifier;
        $this->quizIdentifier = $quizIdentifier;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return Quiz
     */
    public function getQuiz(): Quiz
    {
        return $this->quizFinder->findOneByQuizIdentifier($this->quizIdentifier);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}
