<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Answer
{
    #[ORM\ManyToOne(targetEntity: Question::class, inversedBy: 'answers')]
    protected Question $question;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    public function __construct(
        #[ORM\Column(length: 255)]
        public string $text,
        #[ORM\Column(type: 'boolean')]
        public bool $isCorrect,
    ) {
    }

    final public function setQuestion(Question $question): self
    {
        $this->question = $question;

        return $this;
    }
}
