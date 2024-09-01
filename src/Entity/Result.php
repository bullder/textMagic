<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Result
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\Column(type: 'integer')]
    public int $score = 0;

    #[ORM\Column(type: 'integer')]
    public int $maxScore = 0;

    #[ORM\OneToMany(targetEntity: ResultQuestion::class, mappedBy: 'result', cascade: ['persist'])]
    public Collection $resultQuestions;

    #[ORM\ManyToOne(targetEntity: Test::class)]
    private Test $test;

    public function __construct(
    )
    {
        $this->resultQuestions = new ArrayCollection();
    }

    public function setTest(Test $test): self
    {
        $this->test = $test;

        return $this;
    }

    public function addResultQuestion(ResultQuestion $resultQuestion): self
    {
        $resultQuestion->setResult($this);
        $this->resultQuestions->add($resultQuestion);
        $this->maxScore = $this->resultQuestions->count();
        if ($resultQuestion->selectedAnswer->isCorrect) {
            $this->score++;
        }

        return $this;
    }

    final public function getTest(): Test
    {
        return $this->test;
    }
}
