<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz;

use Neos\Flow\Annotations as Flow;
use Neos\EventSourcing\EventStore\AbstractEventSourcedRepository;

/**
 * @Flow\Scope("singleton")
 *
 * @method Quiz get(string $identifier)
 */
class QuizRepository extends AbstractEventSourcedRepository
{

}
