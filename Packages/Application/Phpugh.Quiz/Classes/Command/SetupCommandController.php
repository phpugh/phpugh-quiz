<?php
namespace Phpugh\Quiz\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Phpugh\Quiz\Domain\Model\Answer;
use Phpugh\Quiz\Domain\Model\Category;
use Phpugh\Quiz\Domain\Model\Question;
use Phpugh\Quiz\Domain\Model\Quiz;
use Phpugh\Quiz\Domain\Repository\CategoryRepository;
use Phpugh\Quiz\Domain\Repository\QuizRepository;

/**
 * Class SetupCommandController
 *
 * @package Phpugh\Quiz\Command
 */
class SetupCommandController extends CommandController
{

    /**
     * @Flow\Inject
     * @var QuizRepository
     */
    protected $quizRepository;

    /**
     * @Flow\Inject
     * @var CategoryRepository
     */
    protected $categoryRepository;

    public function createCategoryCommand()
    {
        $answer = $this->output->ask('Wie soll die Kategorie heißen?');
        $category = new Category();
        $category->setTitle($answer);

        $this->categoryRepository->add($category);

        $this->outputLine('Die Kategorie wurde angelegt!');
    }

    public function createQuizCommand()
    {
        $categories = $this->categoryRepository->findAll();
        $selectedCategory = $this->output->select('Für welche Kategorie?', $categories->toArray());

        /** @var Category $category */
        $category = $categories->offsetGet($selectedCategory);

        $answer = $this->output->ask('Wie soll das quiz heißen?');

        $quiz = new Quiz();
        $quiz->setTitle($answer);
        $quiz->setStatus(Quiz::STATUS_DRAFT);

        $category->addQuiz($quiz);
        $this->quizRepository->add($quiz);

        $this->outputLine('Das Quiz wurde angelegt!');
    }

    public function addQuestionToQuizCommand()
    {
        $quizzes = $this->quizRepository->findAll();
        $selectedQuiz = $this->output->select('Für welches Quiz?', $quizzes->toArray());
        /** @var Quiz $quiz */
        $quiz = $quizzes->offsetGet($selectedQuiz);


        $question = $this->output->ask('Wie heißt die Frage?');
        $theQuestion = new Question();
        $theQuestion->setTitle($question);

        $answerA = $this->output->ask('Korrekte Antwortmöglichkeit:');
        $answerB = $this->output->ask('Zweite Antwortmöglichkeit:');
        $answerC = $this->output->ask('Dritte Antwortmöglichkeit:');

        $firstAnswer = new Answer();
        $firstAnswer->setTitle($answerA);
        $firstAnswer->setCorrect(true);

        $secondAnswer = new Answer();
        $secondAnswer->setTitle($answerB);
        $secondAnswer->setCorrect(false);

        $thirdAnswer = new Answer();
        $thirdAnswer->setTitle($answerC);
        $thirdAnswer->setCorrect(false);

        $theQuestion->addAnswer($firstAnswer);
        $theQuestion->addAnswer($secondAnswer);
        $theQuestion->addAnswer($thirdAnswer);

        $quiz->addQuestion($theQuestion);
        $this->quizRepository->update($quiz);

        $this->outputLine('Die Frage wurde hinzugefügt!');
    }

    public function listQuizzesCommand()
    {
        $quizzes = $this->quizRepository->findAll();

        foreach ($quizzes as $quiz) {
            /** @var Quiz $quiz */
            $this->outputLine($quiz->getTitle());
        }
    }
}
