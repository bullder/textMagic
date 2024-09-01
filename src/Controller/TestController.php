<?php

namespace App\Controller;

use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    private TestRepository $repository;

    public function __construct(TestRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route('/test/{id}', name: 'test')]
    public function index(int $id): Response
    {
        $test = $this->repository->findOneById($id);
        if ($test === null) {
            throw $this->createNotFoundException('Test not found');
        }

        return $this->render(
            'test.html.twig',
            ['test' => $test]
        );
    }
}