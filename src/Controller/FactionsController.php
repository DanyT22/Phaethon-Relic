<?php

namespace App\Controller;

use App\Entity\Factions;
use App\Form\FactionsType;
use App\Repository\FactionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/factions')]
final class FactionsController extends AbstractController
{
    #[Route(name: 'app_factions_index', methods: ['GET'])]
    public function index(FactionsRepository $factionsRepository): Response
    {
        return $this->render('factions/index.html.twig', [
            'factions' => $factionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_factions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $faction = new Factions();
        $form = $this->createForm(FactionsType::class, $faction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($faction);
            $entityManager->flush();

            return $this->redirectToRoute('app_factions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('factions/new.html.twig', [
            'faction' => $faction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_factions_show', methods: ['GET'])]
    public function show(Factions $faction): Response
    {
        return $this->render('factions/show.html.twig', [
            'faction' => $faction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_factions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Factions $faction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FactionsType::class, $faction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_factions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('factions/edit.html.twig', [
            'faction' => $faction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_factions_delete', methods: ['POST'])]
    public function delete(Request $request, Factions $faction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$faction->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($faction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_factions_index', [], Response::HTTP_SEE_OTHER);
    }
}
