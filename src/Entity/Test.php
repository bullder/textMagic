<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestRepository::class)]
class Test
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\OneToMany(targetEntity: Question::class, mappedBy: 'test', cascade: ['persist'])]
    public Collection $questions;

    public function __construct(
        #[ORM\Column(length: 255)]
        public string $title,
        #[ORM\Column(length: 255)]
        public string $text,
    ) {
        $this->questions = new ArrayCollection();
    }

    public function addQuestion(Question $question): self
    {
        $question->setTest($this);
        $this->questions->add($question);

        return $this;
    }

    final public function getQuestionById(int $id): ?Question
    {
        foreach ($this->questions as $question) {
            if ($question->id === $id) {
                return $question;
            }
        }

        return null;
    }
}
