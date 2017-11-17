<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Question;

use Neos\Flow\Annotations as Flow;
use Neos\EventSourcing\Projection\Doctrine\AbstractDoctrineProjector;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Event\QuestionWasAddedToQuiz;

/**
 * @Flow\Scope("singleton")
 * @method Question get($identifier)
 */
class QuestionProjector extends AbstractDoctrineProjector
{
    /**
     * @param QuestionWasAddedToQuiz $event
     */
    public function whenQuestionWasAddedToQuiz(QuestionWasAddedToQuiz $event)
    {
        $dto = $event->getQuestion();
        $question = new Question($dto->questionIdentifier, $event->getQuizIdentifier());
        $question->setTitle($dto->title);

        $this->add($question);
    }
}
