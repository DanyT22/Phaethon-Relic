<?php

namespace App\Controller;

use App\Entity\TeamMember;
use App\Form\TeamMemberType;
use App\Repository\TeamMemberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/team/member')]
final class TeamMemberController extends AbstractController
{
    #[Route(name: 'app_team_member_index', methods: ['GET'])]
    public function index(TeamMemberRepository $teamMemberRepository): Response
    {
        return $this->render('team_member/index.html.twig', [
            'team_members' => $teamMemberRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_team_member_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $teamMember = new TeamMember();
        $form = $this->createForm(TeamMemberType::class, $teamMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($teamMember);
            $entityManager->flush();

            return $this->redirectToRoute('app_team_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('team_member/new.html.twig', [
            'team_member' => $teamMember,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_team_member_show', methods: ['GET'])]
    public function show(TeamMember $teamMember): Response
    {
        return $this->render('team_member/show.html.twig', [
            'team_member' => $teamMember,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_team_member_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TeamMember $teamMember, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TeamMemberType::class, $teamMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_team_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('team_member/edit.html.twig', [
            'team_member' => $teamMember,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_team_member_delete', methods: ['POST'])]
    public function delete(Request $request, TeamMember $teamMember, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$teamMember->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($teamMember);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_team_member_index', [], Response::HTTP_SEE_OTHER);
    }
}
