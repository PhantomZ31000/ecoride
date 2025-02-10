<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(): Response
    {
        // Logique pour récupérer les voitures de l'utilisateur
        

        return $this->render('voiture/index.html.twig', [
            'voitures' => $voitures,
        ]);
    }
}
