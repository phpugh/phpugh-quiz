<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Quiz;

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 * @ORM\Table(name="phpugh_quiz_projection_quiz")
 */
class Quiz
{
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
     * @param string $quizIdentifier
     */
    public function __construct(string $quizIdentifier)
    {
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
}
