<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz;

use Neos\Flow\Annotations as Flow;
use Neos\EventSourcing\Domain\AbstractEventSourcedAggregateRoot;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Event\QuizWasAdded;

class Quiz extends AbstractEventSourcedAggregateRoot
{

    /**
     * @var string
     */
    protected $identifier;


    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @param string $quizId
     * @param string $title
     * @return Quiz
     */
    public static function create(string $quizId, string $title): Quiz
    {
        $quiz = new Quiz($quizId);

        $quiz->recordThat(
            new QuizWasAdded($quizId, $title)
        );

        return $quiz;
    }
}
