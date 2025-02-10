<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function index(): Response
    {
        // Logique pour récupérer les covoiturages en fonction des critères de recherche //

        return $this->render('recherche/index.html.twig', [
            'covoiturages' => $covoiturages,
        ]);
    }
}