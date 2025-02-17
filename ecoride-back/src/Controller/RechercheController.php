<?php

namespace App\Controller;

use App\Repository\CovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function recherche(Request $request, CovoiturageRepository $covoiturageRepository): JsonResponse
    {
        $depart = $request->query->get('depart');
        $arrivee = $request->query->get('arrivee');
        $date = $request->query->get('date');

        // Searching covoiturages based on the provided criteria
        $covoiturages = $covoiturageRepository->findByCriteria($depart, $arrivee, $date);

        return $this->json([
            'covoiturages' => $covoiturages,
        ]);
    }
}
