<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Utility\Algorithms;

final class AddQuiz implements QuizCommandInterface
{

    /**
     * @var string
     */
    private $quizIdentifier;

    /**
     * @Flow\Validate(type="NotEmpty")
     * @var string
     */
    private $title;

    /**
     * AddQuiz constructor.
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->quizIdentifier = Algorithms::generateUUID();
        $this->title = $title;
    }
    /*
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
}
