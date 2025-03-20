<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PersonnagesRepository;
use App\Repository\MoteursRepository;
use App\Repository\BangboosRepository;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PersonnagesRepository $personnagesRepository, MoteursRepository $moteursRepository, BangboosRepository $bangboosRepository): Response
    {
        $personnages = $personnagesRepository->findLastSix();
        $moteurs = $moteursRepository->findLastSix();
        $bangboos = $bangboosRepository->findLastTwo();

        return $this->render('home/index.html.twig', [
            'personnages' => $personnages,
            'moteurs' => $moteurs,
            'bangboos' => $bangboos,
        ]);
    }

    #[Route('/connexion_inscription', name: 'app_connexion_inscription')]
    public function connexion_inscription(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/connexion_inscription.html.twig');
    }
}
