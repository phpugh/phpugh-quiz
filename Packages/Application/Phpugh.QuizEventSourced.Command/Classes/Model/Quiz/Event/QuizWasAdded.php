<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz\Event;

use Neos\EventSourcing\Event\EventInterface;
use Neos\Flow\Annotations as Flow;

class QuizWasAdded implements EventInterface
{

    /**
     * @var string
     */
    protected $quizId;

    /**
     * @var string
     */
    protected $title;

    public function __construct(string $quizId, string $title)
    {
        $this->quizId = $quizId;
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