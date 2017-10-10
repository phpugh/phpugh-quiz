<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Quiz;

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 * @ORM\Table(name="phpugh_quiz")
 */
class Quiz
{

    /**
     * @ORM\Id
     * @var string
     */
    protected $quizId;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * Quiz constructor.
     * @param string $quizId
     * @param $title
     */
    public function __construct(string $quizId, $title)
    {
        $this->quizId = $quizId;
        $this->title = $title;
    }
}
