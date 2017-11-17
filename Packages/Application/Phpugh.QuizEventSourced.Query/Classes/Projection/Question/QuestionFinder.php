<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Question;

use Neos\Flow\Annotations as Flow;
use Neos\EventSourcing\Projection\Doctrine\AbstractDoctrineFinder;
use Neos\Flow\Persistence\QueryResultInterface;

/**
 * @Flow\Scope("singleton")
 * @method QueryResultInterface findByQuizIdentifier(string $quizIdentifier)
 */
class QuestionFinder extends AbstractDoctrineFinder
{

}
