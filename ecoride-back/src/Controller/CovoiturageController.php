<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CovoiturageController extends AbstractController
{
    #[Route('/covoiturage', name: 'app_covoiturage')]
    public function index(): Response
    {
        // Logique pour récupérer les covoiturages de l'utilisateur
        

        return $this->render('covoiturage/index.html.twig', [
            'covoiturages' => $covoiturages,
        ]);
    }
}