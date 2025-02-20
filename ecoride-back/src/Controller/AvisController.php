<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/api/avis', name: 'app_avis', methods: ['POST'])]
    public function index(Request $request): JsonResponse
    {
        // Récupérer les données du formulaire (ici, via JSON dans le corps de la requête)
        $data = json_decode($request->getContent(), true);

        // Logique pour valider et traiter l'avis
        // Par exemple, tu peux valider les données et les enregistrer dans la base de données

        // Exemple de traitement de l'avis
        $avisData = [
            'message' => 'Avis soumis avec succès',
            'avis' => $data,  // Le contenu de l'avis soumis
        ];

        // Retourner une réponse JSON avec un message de succès
        return $this->json($avisData);
    }
}
