<?php

namespace App\Controller;

use App\Entity\Personnages;
use App\Form\PersonnagesType;
use App\Repository\PersonnagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/personnages')]
final class PersonnagesController extends AbstractController
{
    #[Route(name: 'app_personnages_index', methods: ['GET'])]
    public function index(PersonnagesRepository $personnagesRepository): Response
    {
                return $this->render('personnages/index.html.twig', [
            'personnages' => $personnagesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_personnages_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $personnage = new Personnages();
        $form = $this->createForm(PersonnagesType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($personnage);
            $entityManager->flush();

            return $this->redirectToRoute('app_personnages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('personnages/new.html.twig', [
            'personnage' => $personnage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_personnages_show', methods: ['GET'])]
    public function show(Personnages $personnage): Response
    {
        return $this->render('personnages/show.html.twig', [
            'personnage' => $personnage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_personnages_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Personnages $personnage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PersonnagesType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_personnages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('personnages/edit.html.twig', [
            'personnage' => $personnage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_personnages_delete', methods: ['POST'])]
    public function delete(Request $request, Personnages $personnage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personnage->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($personnage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_personnages_index', [], Response::HTTP_SEE_OTHER);
    }
}
