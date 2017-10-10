<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Utility\Algorithms;

final class AddQuiz
{

    /**
     * @Flow\Validate(type="NotEmpty")
     * @var string
     */
    private $quizId;

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
        $this->quizId = Algorithms::generateUUID();
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getQuizId(): string
    {
        return $this->quizId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


}
