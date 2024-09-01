<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class ResultQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\ManyToOne(targetEntity: Result::class)]
    private Result $result;

    public function __construct(
        #[ORM\ManyToOne(targetEntity: Question::class)]
        public Question $question,
        #[ORM\ManyToOne(targetEntity: Answer::class)]
        public Answer $selectedAnswer,
    ) {
    }

    public function setResult(Result $result): self
    {
        $this->result = $result;

        return $this;
    }
}
