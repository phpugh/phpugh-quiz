<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz;

use Neos\Flow\Annotations as Flow;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Command\AddQuiz;

/**
 * @Flow\Scope("singleton")
 */
class QuizCommandHandler
{
    /**
     * @Flow\Inject
     * @var QuizRepository
     */
    protected $quizRepository;

    public function handleAddQuiz(AddQuiz $command)
    {
        $quiz = Quiz::create(
            $command->getQuizId(),
            $command->getTitle()
        );
        $this->quizRepository->save($quiz);
    }
}
