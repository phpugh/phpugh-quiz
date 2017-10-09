<?php
namespace Phpugh\Quiz\Domain\Model;

/*
 * This file is part of the Phpugh.Quiz package.
 */

use Doctrine\Common\Collections\ArrayCollection;
use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Question
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var \Phpugh\Quiz\Domain\Model\Quiz
     * @ORM\ManyToOne(inversedBy="questions")
     */
    protected $quiz;

    /**
     * @var ArrayCollection<\Phpugh\Quiz\Domain\Model\Answer>
     * @ORM\OneToMany(mappedBy="question")
     */
    protected $answers;

    /**
     * @return Quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * @param Quiz $quiz
     */
    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;
    }

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
     * @return ArrayCollection<\Phpugh\Quiz\Domain\Model\Answer>
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param Answer $answer
     * @return void
     */
    public function addAnswer(Answer $answer)
    {
        $answer->setQuestion($this);
        $this->answers->add($answer);
    }

    /**
     * @param ArrayCollection<Answer> $answers
     */
    public function setAnswers(ArrayCollection $answers)
    {
        foreach ($this->answers as $answer) {
            if (!$answers->contains($answer)) {
                $this->removeAnswer($answer);
            }
        }
        foreach ($answers as $answer) {
            $this->addAnswer($answer);
        }

        $this->answers = $answers;
    }

    /**
     * @param Answer $answer
     */
    public function removeAnswer($answer)
    {
        $this->answers->remove($answer);
    }
}
