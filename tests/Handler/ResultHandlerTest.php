<?php

namespace App\Tests\Handler;

use App\DataFixtures\AppFixtures;
use App\Entity\ResultRequest;
use App\Handler\ResultHandler;
use App\Repository\TestRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class ResultHandlerTest extends TestCase
{
    private $testRepository;
    private $entityManager;
    private $resultHandler;

    protected function setUp(): void
    {
        $this->testRepository = $this->createMock(TestRepository::class);
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->resultHandler = new ResultHandler($this->testRepository, $this->entityManager);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHandle(array $choices, string $exception): void
    {
        $this->testRepository->method('findOneById')->willReturn(AppFixtures::prepareTest());

        $resultRequest = new ResultRequest(1, $choices);
        if ($exception !== '') {
            $this->expectExceptionMessage($exception);
        }
        $this->resultHandler->handle($resultRequest);
    }

    public function dataProvider(): array
    {
        return [
            [[421 => 12], 'Invalid number of answers'],
        ];
    }
}
