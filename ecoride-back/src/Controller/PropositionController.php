<?php

namespace App\Controller;

use App\Entity\Proposition;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PropositionController extends AbstractController
{
    #[Route('/api/proposition', name: 'app_proposition', methods: ['GET'])]
    public function index(): JsonResponse
    {
        // Logique pour récupérer les propositions de covoiturage
        // Exemple de données de proposition
        $propositions = [
            [
                'id' => 1,
                'lieu_depart' => 'Paris',
                'lieu_arrivee' => 'Lyon',
                'date_depart' => '2025-02-18',
                'prix' => 30.00
            ],
            [
                'id' => 2,
                'lieu_depart' => 'Marseille',
                'lieu_arrivee' => 'Nice',
                'date_depart' => '2025-02-19',
                'prix' => 25.00
            ]
        ];

        // Retourner une réponse JSON avec les propositions
        return $this->json([
            'propositions' => $propositions,
        ]);
    }
}
