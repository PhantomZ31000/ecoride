<?php

namespace App\Controller;

use App\Repository\CovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    #[Route('/api/recherche', name: 'app_recherche', methods: ['GET'])]
    public function recherche(Request $request, CovoiturageRepository $covoiturageRepository): JsonResponse
    {
        $depart = $request->query->get('depart');
        $arrivee = $request->query->get('arrivee');
        $date = $request->query->get('date');

        // Searching covoiturages based on the provided criteria
        $covoiturages = $covoiturageRepository->findByCriteria($depart, $arrivee, $date);

        // Serialize the data to make it JSON-friendly
        $data = [];
        foreach ($covoiturages as $covoiturage) {
            $data[] = [
                'id' => $covoiturage->getId(),
                'lieu_depart' => $covoiturage->getLieuDepart(),
                'lieu_arrivee' => $covoiturage->getLieuArrivee(),
                'date_depart' => $covoiturage->getDateDepart()->format('Y-m-d'),
                'prix' => $covoiturage->getPrix(),
                'nombre_places_disponibles' => $covoiturage->getNombrePlacesDisponibles(),
            ];
        }

        return $this->json([
            'covoiturages' => $data,
        ]);
    }
}
