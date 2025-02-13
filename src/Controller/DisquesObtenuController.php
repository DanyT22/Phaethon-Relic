<?php

namespace App\Controller;

use App\Entity\DisquesObtenu;
use App\Form\DisquesObtenuType;
use App\Repository\DisquesObtenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/disques/obtenu')]
final class DisquesObtenuController extends AbstractController
{
    #[Route(name: 'app_disques_obtenu_index', methods: ['GET'])]
    public function index(DisquesObtenuRepository $disquesObtenuRepository): Response
    {
        return $this->render('disques_obtenu/index.html.twig', [
            'disques_obtenus' => $disquesObtenuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_disques_obtenu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $disquesObtenu = new DisquesObtenu();
        $form = $this->createForm(DisquesObtenuType::class, $disquesObtenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($disquesObtenu);
            $entityManager->flush();

            return $this->redirectToRoute('app_disques_obtenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('disques_obtenu/new.html.twig', [
            'disques_obtenu' => $disquesObtenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_disques_obtenu_show', methods: ['GET'])]
    public function show(DisquesObtenu $disquesObtenu): Response
    {
        return $this->render('disques_obtenu/show.html.twig', [
            'disques_obtenu' => $disquesObtenu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_disques_obtenu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DisquesObtenu $disquesObtenu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DisquesObtenuType::class, $disquesObtenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_disques_obtenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('disques_obtenu/edit.html.twig', [
            'disques_obtenu' => $disquesObtenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_disques_obtenu_delete', methods: ['POST'])]
    public function delete(Request $request, DisquesObtenu $disquesObtenu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$disquesObtenu->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($disquesObtenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_disques_obtenu_index', [], Response::HTTP_SEE_OTHER);
    }
}
