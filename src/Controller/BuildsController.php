<?php

namespace App\Controller;

use App\Entity\Builds;
use App\Form\BuildsType;
use App\Repository\BuildsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/builds')]
final class BuildsController extends AbstractController
{
    #[Route(name: 'app_builds_index', methods: ['GET'])]
    public function index(BuildsRepository $buildsRepository): Response
    {
        return $this->render('builds/index.html.twig', [
            'builds' => $buildsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_builds_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $build = new Builds();
        $form = $this->createForm(BuildsType::class, $build);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($build);
            $entityManager->flush();

            return $this->redirectToRoute('app_builds_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('builds/new.html.twig', [
            'build' => $build,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_builds_show', methods: ['GET'])]
    public function show(Builds $build): Response
    {
        return $this->render('builds/show.html.twig', [
            'build' => $build,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_builds_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Builds $build, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BuildsType::class, $build);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_builds_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('builds/edit.html.twig', [
            'build' => $build,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_builds_delete', methods: ['POST'])]
    public function delete(Request $request, Builds $build, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$build->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($build);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_builds_index', [], Response::HTTP_SEE_OTHER);
    }
}
