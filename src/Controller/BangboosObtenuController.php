<?php

namespace App\Controller;

use App\Entity\BangboosObtenu;
use App\Form\BangboosObtenuType;
use App\Repository\BangboosObtenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/bangboos/obtenu')]
final class BangboosObtenuController extends AbstractController
{
    #[Route(name: 'app_bangboos_obtenu_index', methods: ['GET'])]
    public function index(BangboosObtenuRepository $bangboosObtenuRepository): Response
    {
        return $this->render('bangboos_obtenu/index.html.twig', [
            'bangboos_obtenus' => $bangboosObtenuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bangboos_obtenu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bangboosObtenu = new BangboosObtenu();
        $form = $this->createForm(BangboosObtenuType::class, $bangboosObtenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bangboosObtenu);
            $entityManager->flush();

            return $this->redirectToRoute('app_bangboos_obtenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bangboos_obtenu/new.html.twig', [
            'bangboos_obtenu' => $bangboosObtenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bangboos_obtenu_show', methods: ['GET'])]
    public function show(BangboosObtenu $bangboosObtenu): Response
    {
        return $this->render('bangboos_obtenu/show.html.twig', [
            'bangboos_obtenu' => $bangboosObtenu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bangboos_obtenu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BangboosObtenu $bangboosObtenu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BangboosObtenuType::class, $bangboosObtenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bangboos_obtenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bangboos_obtenu/edit.html.twig', [
            'bangboos_obtenu' => $bangboosObtenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bangboos_obtenu_delete', methods: ['POST'])]
    public function delete(Request $request, BangboosObtenu $bangboosObtenu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bangboosObtenu->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($bangboosObtenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bangboos_obtenu_index', [], Response::HTTP_SEE_OTHER);
    }
}
