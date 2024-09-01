<?php

namespace App\Controller;

use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    private TestRepository $repository;

    public function __construct(TestRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route('/', name: 'index')]
    final public function index(): Response
    {
        $tests = $this->repository->getTitles();
        if (empty($tests)) {
            throw $this->createNotFoundException('Tests not found');
        }

        return $this->render('list.html.twig', ['tests' => $tests]);
    }
}