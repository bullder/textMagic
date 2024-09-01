<?php

namespace App\Handler;

use App\Entity\Result;
use App\Entity\ResultQuestion;
use App\Entity\ResultRequest;
use App\Repository\TestRepository;
use Doctrine\ORM\EntityManagerInterface;

class ResultHandler
{
    private TestRepository $testRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(TestRepository $testRepository, EntityManagerInterface $entityManager)
    {
        $this->testRepository = $testRepository;
        $this->entityManager = $entityManager;
    }

    final public function handle(ResultRequest $resultRequest): Result
    {
        $test = $this->testRepository->findOneById($resultRequest->testId);
        if ($test === null) {
            throw new \InvalidArgumentException('Test not found');
        }

        if (count($test->questions) !== count($resultRequest->choices)) {
            throw new \InvalidArgumentException('Invalid number of answers');
        }

        if (count(array_unique(array_keys($resultRequest->choices))) !== count($resultRequest->choices)) {
            throw new \InvalidArgumentException('Duplicate question ids');
        }

        $result = new Result();
        $result->setTest($test);

        foreach ($resultRequest->choices as $questionId => $answerId) {
            $question = $test->getQuestionById($questionId);
            if ($question === null) {
                throw new \InvalidArgumentException('Question not found');
            }

            $answer = $question->getAnswerById($answerId);
            if ($answer === null) {
                throw new \InvalidArgumentException('Answer not found');
            }

            $result->addResultQuestion(new ResultQuestion($question, $answer));
        }

        $this->entityManager->persist($result);
        $this->entityManager->flush();

        return $result;
    }
}