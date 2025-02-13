<?php

namespace App\Controller;

use App\Entity\Elements;
use App\Form\ElementsType;
use App\Repository\ElementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/elements')]
final class ElementsController extends AbstractController
{
    #[Route(name: 'app_elements_index', methods: ['GET'])]
    public function index(ElementsRepository $elementsRepository): Response
    {
        return $this->render('elements/index.html.twig', [
            'elements' => $elementsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_elements_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $element = new Elements();
        $form = $this->createForm(ElementsType::class, $element);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($element);
            $entityManager->flush();

            return $this->redirectToRoute('app_elements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('elements/new.html.twig', [
            'element' => $element,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_elements_show', methods: ['GET'])]
    public function show(Elements $element): Response
    {
        return $this->render('elements/show.html.twig', [
            'element' => $element,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_elements_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Elements $element, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ElementsType::class, $element);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_elements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('elements/edit.html.twig', [
            'element' => $element,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_elements_delete', methods: ['POST'])]
    public function delete(Request $request, Elements $element, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$element->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($element);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_elements_index', [], Response::HTTP_SEE_OTHER);
    }
}
