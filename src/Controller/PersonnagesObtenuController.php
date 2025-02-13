<?php

namespace App\Controller;

use App\Entity\PersonnagesObtenu;
use App\Form\PersonnagesObtenuType;
use App\Repository\PersonnagesObtenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/personnages/obtenu')]
final class PersonnagesObtenuController extends AbstractController
{
    #[Route(name: 'app_personnages_obtenu_index', methods: ['GET'])]
    public function index(PersonnagesObtenuRepository $personnagesObtenuRepository): Response
    {
        return $this->render('personnages_obtenu/index.html.twig', [
            'personnages_obtenus' => $personnagesObtenuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_personnages_obtenu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $personnagesObtenu = new PersonnagesObtenu();
        $form = $this->createForm(PersonnagesObtenuType::class, $personnagesObtenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($personnagesObtenu);
            $entityManager->flush();

            return $this->redirectToRoute('app_personnages_obtenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('personnages_obtenu/new.html.twig', [
            'personnages_obtenu' => $personnagesObtenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_personnages_obtenu_show', methods: ['GET'])]
    public function show(PersonnagesObtenu $personnagesObtenu): Response
    {
        return $this->render('personnages_obtenu/show.html.twig', [
            'personnages_obtenu' => $personnagesObtenu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_personnages_obtenu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PersonnagesObtenu $personnagesObtenu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PersonnagesObtenuType::class, $personnagesObtenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_personnages_obtenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('personnages_obtenu/edit.html.twig', [
            'personnages_obtenu' => $personnagesObtenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_personnages_obtenu_delete', methods: ['POST'])]
    public function delete(Request $request, PersonnagesObtenu $personnagesObtenu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personnagesObtenu->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($personnagesObtenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_personnages_obtenu_index', [], Response::HTTP_SEE_OTHER);
    }
}
