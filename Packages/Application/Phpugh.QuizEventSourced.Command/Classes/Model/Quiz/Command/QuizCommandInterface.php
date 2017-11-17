<?php
namespace Phpugh\QuizEventSoured\Command\Model\Quiz\Command;

interface QuizCommandInterface
{
    /**
     * @return string
     */
    public function getQuizIdentifier(): string;
}
