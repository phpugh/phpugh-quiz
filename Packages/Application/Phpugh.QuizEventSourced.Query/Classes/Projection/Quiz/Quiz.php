<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Quiz;

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Persistence\QueryResultInterface;
use Phpugh\QuizEventSoured\Query\Projection\Question\QuestionFinder;

/**
 * @Flow\Entity
 * @ORM\Table(name="phpugh_quiz_projection_quiz")
 */
class Quiz
{
    /**
     * @Flow\Inject
     * @var QuestionFinder
     */
    protected $questionFinder;

    /**
     * @ORM\Id
     * @var string
     */
    protected $quizIdentifier;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var int
     */
    protected $questionCount = 0;

    /**
     * @param string $quizIdentifier
     */
    public function __construct(string $quizIdentifier)
    {
        $this->quizIdentifier = $quizIdentifier;
    }

    /**
     * @return string
     */
    public function getQuizIdentifier(): string
    {
        return $this->quizIdentifier;
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
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     *
     */
    public function incrementQuestionCount()
    {
        $this->questionCount += 1;
    }

    /**
     * @return int
     */
    public function getQuestionCount(): int
    {
        return $this->questionCount;
    }

    /**
     * @return QueryResultInterface
     */
    public function getQuestions(): QueryResultInterface
    {
        return $this->questionFinder->findByQuizIdentifier($this->quizIdentifier);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}
