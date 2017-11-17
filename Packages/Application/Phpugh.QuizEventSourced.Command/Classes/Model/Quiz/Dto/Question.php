<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz\Dto;

use Neos\Flow\Utility\Algorithms;

class Question
{
    /**
     * @var string
     */
    public $questionIdentifier;

    /**
     * @var string
     */
    public $title;

    /**
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->questionIdentifier = Algorithms::generateUUID();
        $this->title = $title;
    }
}
