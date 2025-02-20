<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/api/accueil', name: 'app_accueil')]
    public function index(): JsonResponse
    {
        // Renvoie des données JSON à React
        return $this->json([
            'message' => 'Bienvenue sur l\'API d\'accueil !',
            'status' => 'success',
        ]);
    }
}
