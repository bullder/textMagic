<?php

namespace App\Controller;

use App\Entity\Result;
use App\Entity\ResultQuestion;
use App\Entity\ResultRequest;
use App\Handler\ResultHandler;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ResultController extends AbstractController
{
    private ResultHandler $handler;
    private EntityManagerInterface $entityManager;

    public function __construct(ResultHandler $handler, EntityManagerInterface $entityManager)
    {
        $this->handler = $handler;
        $this->entityManager = $entityManager;
    }

    #[Route('/result/{id}', name: 'result', methods: ['POST'])]
    final public function save(string $id, Request $request): Response
    {
        $result = $this->handler->handle(ResultRequest::fromRequest($id, $request));

        return $this->redirect($this->generateUrl('show', ['id' => $result->id]));
    }


    #[Route('/show/{id}', name: 'show', methods: ['GET'])]
    final public function result(string $id): Response
    {
        $result = $this->entityManager->getRepository(Result::class)->findOneBy(['id' => $id]);
        if ($result === null) {
            throw $this->createNotFoundException('Result not found');
        }

        return $this->render(
            'result.html.twig',
            ['result' => $result]
        );
    }
}