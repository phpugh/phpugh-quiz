<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz\Event;

use Neos\EventSourcing\Event\EventInterface;
use Neos\Flow\Annotations as Flow;

class QuizWasAdded implements EventInterface
{
    /**
     * @var string
     */
    protected $quizIdentifier;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param string $quizIdentifier
     * @param string $title
     */
    public function __construct(string $quizIdentifier, string $title)
    {
        $this->quizIdentifier = $quizIdentifier;
        $this->title = $title;
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


}
