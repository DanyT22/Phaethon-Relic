<?php

namespace App\Controller;

use App\Entity\Bangboos;
use App\Form\BangboosType;
use App\Repository\BangboosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/bangboos')]
final class BangboosController extends AbstractController
{
    #[Route(name: 'app_bangboos_index', methods: ['GET'])]
    public function index(BangboosRepository $bangboosRepository): Response
    {
        $bangboos = $bangboosRepository->reverse();

        return $this->render('bangboos/index.html.twig', [
            'bangboos' => $bangboos,
        ]);
    }

    #[Route('/new', name: 'app_bangboos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bangboo = new Bangboos();
        $form = $this->createForm(BangboosType::class, $bangboo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bangboo);
            $entityManager->flush();

            return $this->redirectToRoute('app_bangboos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bangboos/new.html.twig', [
            'bangboo' => $bangboo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bangboos_show', methods: ['GET'])]
    public function show(Bangboos $bangboo): Response
    {
        return $this->render('bangboos/show.html.twig', [
            'bangboo' => $bangboo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bangboos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bangboos $bangboo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BangboosType::class, $bangboo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bangboos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bangboos/edit.html.twig', [
            'bangboo' => $bangboo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bangboos_delete', methods: ['POST'])]
    public function delete(Request $request, Bangboos $bangboo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bangboo->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($bangboo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bangboos_index', [], Response::HTTP_SEE_OTHER);
    }
}
