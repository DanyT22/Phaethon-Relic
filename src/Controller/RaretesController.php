<?php

namespace App\Controller;

use App\Entity\Raretes;
use App\Form\RaretesType;
use App\Repository\RaretesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/raretes')]
final class RaretesController extends AbstractController
{
    #[Route(name: 'app_raretes_index', methods: ['GET'])]
    public function index(RaretesRepository $raretesRepository): Response
    {
        return $this->render('raretes/index.html.twig', [
            'raretes' => $raretesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_raretes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rarete = new Raretes();
        $form = $this->createForm(RaretesType::class, $rarete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rarete);
            $entityManager->flush();

            return $this->redirectToRoute('app_raretes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('raretes/new.html.twig', [
            'rarete' => $rarete,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_raretes_show', methods: ['GET'])]
    public function show(Raretes $rarete): Response
    {
        return $this->render('raretes/show.html.twig', [
            'rarete' => $rarete,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_raretes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Raretes $rarete, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RaretesType::class, $rarete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_raretes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('raretes/edit.html.twig', [
            'rarete' => $rarete,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_raretes_delete', methods: ['POST'])]
    public function delete(Request $request, Raretes $rarete, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rarete->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($rarete);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_raretes_index', [], Response::HTTP_SEE_OTHER);
    }
}
