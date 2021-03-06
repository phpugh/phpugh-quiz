<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Quiz;

use Neos\EventSourcing\EventStore\RawEvent;
use Neos\Flow\Annotations as Flow;
use Neos\EventSourcing\Projection\Doctrine\AbstractDoctrineProjector;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Event\QuestionWasAddedToQuiz;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Event\QuizWasAdded;

/**
 * @Flow\Scope("singleton")
 * @method Quiz get($identifier)
 */
class QuizProjector extends AbstractDoctrineProjector
{
    /**
     * @param QuizWasAdded $event
     * @param RawEvent $rawEvent
     */
    public function whenQuizWasAdded(QuizWasAdded $event, RawEvent $rawEvent)
    {
        $quiz = new Quiz($event->getQuizIdentifier());
        $quiz->setTitle($event->getTitle());

        $createdAt = new \DateTime();
        $createdAt->setTimestamp($rawEvent->getRecordedAt()->getTimestamp());
        $quiz->setCreatedAt($createdAt);

        $this->add($quiz);
    }

    /**
     * @param QuestionWasAddedToQuiz $event
     */
    public function whenQuestionWasAddedToQuiz(QuestionWasAddedToQuiz $event)
    {
        $quiz = $this->get($event->getQuizIdentifier());
        $quiz->incrementQuestionCount();
        $this->update($quiz);
    }
}
