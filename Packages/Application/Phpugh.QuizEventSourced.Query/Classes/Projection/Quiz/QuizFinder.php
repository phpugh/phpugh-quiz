<?php
namespace Phpugh\QuizEventSoured\Query\Projection\Quiz;

use Neos\Flow\Annotations as Flow;
use Neos\EventSourcing\Projection\Doctrine\AbstractDoctrineFinder;

/**
 * @method Quiz findOneByQuizIdentifier(string $quizIdentifier)
* @Flow\Scope("singleton")
*/
class QuizFinder extends AbstractDoctrineFinder
{

}
