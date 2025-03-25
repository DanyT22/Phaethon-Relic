<?php

namespace App\Controller;

use App\Entity\Disques;
use App\Entity\DisquesObtenu;
use App\Form\DisquesType;
use App\Repository\DisquesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/disques')]
final class DisquesController extends AbstractController
{
    #[Route(name: 'app_disques_index', methods: ['GET'])]
    public function index(DisquesRepository $disquesRepository): Response
    {
        return $this->render('disques/index.html.twig', [
            'disques' => $disquesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_disques_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_connexion_inscription');
        }

        $disque = new Disques();
        $form = $this->createForm(DisquesType::class, $disque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($disque);
            // $entityManager->flush();

            $disqueObtenus = new DisquesObtenu();
            $disqueObtenus->setDisque($disque);
            $disqueObtenus->setUser($user);

            $entityManager->persist($disqueObtenus);
            $entityManager->flush();

            return $this->redirectToRoute('app_disques_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('disques/new.html.twig', [
            'disque' => $disque,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_disques_show', methods: ['GET'])]
    public function show(Disques $disque): Response
    {
        return $this->render('disques/show.html.twig', [
            'disque' => $disque,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_disques_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Disques $disque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DisquesType::class, $disque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_disques_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('disques/edit.html.twig', [
            'disque' => $disque,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_disques_delete', methods: ['POST'])]
    public function delete(Request $request, Disques $disque, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$disque->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($disque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_disques_index', [], Response::HTTP_SEE_OTHER);
    }
}
