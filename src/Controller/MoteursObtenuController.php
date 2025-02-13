<?php

namespace App\Controller;

use App\Entity\MoteursObtenu;
use App\Form\MoteursObtenuType;
use App\Repository\MoteursObtenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/moteurs/obtenu')]
final class MoteursObtenuController extends AbstractController
{
    #[Route(name: 'app_moteurs_obtenu_index', methods: ['GET'])]
    public function index(MoteursObtenuRepository $moteursObtenuRepository): Response
    {
        return $this->render('moteurs_obtenu/index.html.twig', [
            'moteurs_obtenus' => $moteursObtenuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_moteurs_obtenu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $moteursObtenu = new MoteursObtenu();
        $form = $this->createForm(MoteursObtenuType::class, $moteursObtenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($moteursObtenu);
            $entityManager->flush();

            return $this->redirectToRoute('app_moteurs_obtenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moteurs_obtenu/new.html.twig', [
            'moteurs_obtenu' => $moteursObtenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_moteurs_obtenu_show', methods: ['GET'])]
    public function show(MoteursObtenu $moteursObtenu): Response
    {
        return $this->render('moteurs_obtenu/show.html.twig', [
            'moteurs_obtenu' => $moteursObtenu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_moteurs_obtenu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MoteursObtenu $moteursObtenu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MoteursObtenuType::class, $moteursObtenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_moteurs_obtenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moteurs_obtenu/edit.html.twig', [
            'moteurs_obtenu' => $moteursObtenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_moteurs_obtenu_delete', methods: ['POST'])]
    public function delete(Request $request, MoteursObtenu $moteursObtenu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moteursObtenu->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($moteursObtenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_moteurs_obtenu_index', [], Response::HTTP_SEE_OTHER);
    }
}
