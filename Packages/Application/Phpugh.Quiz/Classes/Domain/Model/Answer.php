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
class Answer
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var boolean
     */
    protected $correct;

    /**
     * @var \Phpugh\Quiz\Domain\Model\Question
     * @ORM\ManyToOne(inversedBy="answers")
     */
    protected $question;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function isCorrect()
    {
        return $this->correct;
    }

    /**
     * @param bool $correct
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;
    }

    /**
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param Question $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function __toString()
    {
        return $this->title;
    }
}
