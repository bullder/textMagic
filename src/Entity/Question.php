<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Question
{
    #[ORM\ManyToOne(targetEntity: Test::class, inversedBy: 'questions')]
    protected Test $test;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\OneToMany(targetEntity: Answer::class, mappedBy: 'question', cascade: ['persist'])]
    public Collection $answers;

    public function __construct(
        #[ORM\Column(length: 255)]
        public string $text,
    ) {
        $this->answers = new ArrayCollection();
    }

    final public function addAnswer(Answer $answer): self
    {
        $answer->setQuestion($this);
        $this->answers->add($answer);

        return $this;
    }

    final public function setTest(Test $test): void
    {
        $this->test = $test;
    }

    final public function getAnswerById(int $id): ?Answer
    {
        foreach ($this->answers as $answer) {
            if ($answer->id === $id) {
                return $answer;
            }
        }

        return null;
    }
}
