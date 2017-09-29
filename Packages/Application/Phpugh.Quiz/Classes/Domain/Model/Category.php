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
class Category
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var ArrayCollection<\Phpugh\Quiz\Domain\Model\Quiz>
     * @ORM\OneToMany(mappedBy="category")
     */
    protected $quizzes;

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
     * @return ArrayCollection<\Phpugh\Quiz\Domain\Model\Quiz>
     */
    public function getQuizzes() {
        return $this->quizzes;
    }

    /**
     * @param Quiz $quiz
     * @return void
     */
    public function addQuiz(Quiz $quiz) {
        $quiz->setCategory($this);
        $this->quizzes->add($quiz);
    }
}
