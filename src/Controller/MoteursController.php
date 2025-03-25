<?php

namespace App\Controller;

use App\Entity\Moteurs;
use App\Form\MoteursType;
use App\Repository\MoteursRepository;
use App\Repository\SpecialitesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/moteurs')]
final class MoteursController extends AbstractController
{
    #[Route(name: 'app_moteurs_index', methods: ['GET'])]
    public function index(MoteursRepository $moteursRepository, SpecialitesRepository $specialites): Response
    {
        $moteurs = $moteursRepository->reverse();
        return $this->render('moteurs/index.html.twig', [
            'moteurs' => $moteurs,
            'specialites' => $specialites->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_moteurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $moteur = new Moteurs();
        $form = $this->createForm(MoteursType::class, $moteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($moteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_moteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moteurs/new.html.twig', [
            'moteur' => $moteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_moteurs_show', methods: ['GET'])]
    public function show(Moteurs $moteur): Response
    {
        return $this->render('moteurs/show.html.twig', [
            'moteur' => $moteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_moteurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Moteurs $moteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MoteursType::class, $moteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_moteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moteurs/edit.html.twig', [
            'moteur' => $moteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_moteurs_delete', methods: ['POST'])]
    public function delete(Request $request, Moteurs $moteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moteur->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($moteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_moteurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
