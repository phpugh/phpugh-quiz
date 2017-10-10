<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Quiz;

use Neos\Flow\Annotations as Flow;
use Neos\EventSourcing\Projection\Doctrine\AbstractDoctrineProjector;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Event\QuizWasAdded;

/**
 * @Flow\Scope("singleton")
 */
class QuizProjector extends AbstractDoctrineProjector
{
    /**
     * @param QuizWasAdded $event
     */
    public function whenQuizWasAdded(QuizWasAdded $event)
    {
        $quiz = new Quiz($event->getQuizId(), $event->getTitle());
        $this->add($quiz);
    }
}
