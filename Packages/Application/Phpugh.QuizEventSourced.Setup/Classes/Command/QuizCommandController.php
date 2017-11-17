<?php
namespace Phpugh\QuizEventSourced\Setup\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Command\AddQuestionToQuiz;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Command\AddQuiz;
use Phpugh\QuizEventSoured\Command\Model\Quiz\Dto\Question as QuestionDto;
use Phpugh\QuizEventSoured\Command\Model\Quiz\QuizCommandHandler;
use Phpugh\QuizEventSoured\Query\Projection\Question\Question;
use Phpugh\QuizEventSoured\Query\Projection\Quiz\Quiz;
use Phpugh\QuizEventSoured\Query\Projection\Quiz\QuizFinder;

class QuizCommandController extends CommandController
{
    /**
     * @Flow\Inject
     * @var QuizCommandHandler
     */
    protected $quizCommandHandler;

    /**
     * @Flow\Inject
     * @var QuizFinder
     */
    protected $quizFinder;

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

    /**
     * Adds a new question to an existing event sourced quiz
     */
    public function addQuestionCommand()
    {
        $quizzes = $this->quizFinder->findAll();
        $quizIndex = $this->output->select('Für welches Quiz? ', $quizzes->toArray());
        /** @var Quiz $quiz */
        $quiz = $quizzes->offsetGet($quizIndex);

        $questionTitle = $this->output->ask('Fragetest? ');
        $question = new QuestionDto($questionTitle);

        $command = new AddQuestionToQuiz($quiz->getQuizIdentifier(), $question);
        $this->quizCommandHandler->handleAddQuestionToQuiz($command);
        $this->outputFormatted('Frage <info>%s</info> wird zu Quiz <info>%s</info> hinzugefügt', [$question->title, $quiz->getTitle()]);
    }

    /**
     * Lists all quizzes with all questions
     */
    public function listCommand()
    {
        $this->outputLine();
        $quizzes = $this->quizFinder->findAll();
        /** @var Quiz $quiz */
        foreach ($quizzes as $quiz) {
            $this->outputFormatted('Quiz <info>%s</info> mit %s Fragen:', [$quiz->getTitle(), $quiz->getQuestionCount()]);
            $this->outputLine();

            $questions = $quiz->getQuestions();
            /** @var Question $question */
            foreach ($questions as $index => $question) {
                $this->outputFormatted('Frage %s: <comment>%s</comment>', [$index + 1, $question->getTitle()]);
            }
            $this->outputLine();
        }
    }
}
