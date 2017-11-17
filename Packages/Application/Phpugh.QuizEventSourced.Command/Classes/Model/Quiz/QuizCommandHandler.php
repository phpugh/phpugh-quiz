<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz;

use Neos\Flow\Annotations as Flow;
use Neos\EventSourcing\Event\EventPublisher;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Command\AddQuestionToQuiz;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Command\AddQuiz;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Command\QuizCommandInterface;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Event\QuestionWasAddedToQuiz;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Event\QuizWasAdded;

/**
 * @Flow\Scope("singleton")
 */
class QuizCommandHandler
{
    /**
     * @Flow\Inject
     * @var EventPublisher
     */
    protected $eventPublisher;

    /**
     * @param QuizCommandInterface $command
     * @return string
     */
    protected function resolveStreamName(QuizCommandInterface $command): string
    {
        return sprintf('Phpug:Quiz:%s', $command->getQuizIdentifier());
    }

    /**
     * @param AddQuiz $command
     */
    public function handleAddQuiz(AddQuiz $command)
    {
        $event = new QuizWasAdded($command->getQuizIdentifier(), $command->getTitle());
        $this->eventPublisher->publish($this->resolveStreamName($command), $event);
    }

    /**
     * @param AddQuestionToQuiz $command
     */
    public function handleAddQuestionToQuiz(AddQuestionToQuiz $command)
    {
        $event = new QuestionWasAddedToQuiz($command->getQuizIdentifier(), $command->getQuestion());
        $this->eventPublisher->publish($this->resolveStreamName($command), $event);
    }
}
