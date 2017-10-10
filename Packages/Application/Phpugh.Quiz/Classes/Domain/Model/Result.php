<?php
namespace Phpugh\Quiz\Domain\Model;

/*
 * This file is part of the Phpugh.Quiz package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Result
{

    /**
     * @var string
     */
    protected $player;

    /**
     * @var int
     */
    protected $correctAnswers;

    /**
     * @var \Phpugh\Quiz\Domain\Model\Quiz
     * @ORM\ManyToOne(inversedBy="results")
     */
    protected $quiz;

    /**
     * @return string
     */
    public function getPlayer(): string
    {
        return $this->player;
    }

    /**
     * @param string $player
     */
    public function setPlayer(string $player)
    {
        $this->player = $player;
    }

    /**
     * @return int
     */
    public function getCorrectAnswers(): int
    {
        return $this->correctAnswers;
    }

    /**
     * @param int $correctAnswers
     */
    public function setCorrectAnswers(int $correctAnswers)
    {
        $this->correctAnswers = $correctAnswers;
    }

    /**
     * @return Quiz
     */
    public function getQuiz(): Quiz
    {
        return $this->quiz;
    }

    /**
     * @param Quiz $quiz
     */
    public function setQuiz(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

}
