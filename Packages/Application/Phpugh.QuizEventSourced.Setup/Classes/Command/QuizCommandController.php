<?php
namespace Phpugh\QuizEventSourced\Setup\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Command\AddQuiz;
use Phpugh\QuizEventSoured\Command\Model\Quiz\QuizCommandHandler;

class QuizCommandController extends CommandController
{
    /**
     * @Flow\Inject
     * @var QuizCommandHandler
     */
    protected $quizCommandHandler;

    /**
     * Creates a new event sourced quiz
     */
    public function newCommand()
    {
        $title = $this->output->ask('Titel des neuen Quiz? ');
        $command = new AddQuiz($title);
        $this->quizCommandHandler->handleAddQuiz($command);
        $this->outputFormatted('Quiz <info>%s</info> wird erstellt.', [$title]);
    }

}
