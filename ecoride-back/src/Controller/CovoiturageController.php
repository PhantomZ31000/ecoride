<?php

namespace App\Controller;

use App\Repository\CovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class CovoiturageController extends AbstractController
{
    #[Route('/api/covoiturages', name: 'app_covoiturage', methods: ['GET'])]
    public function index(CovoiturageRepository $covoiturageRepository, SerializerInterface $serializer): JsonResponse
    {
        // Récupérer les covoiturages depuis la base de données
        $covoiturages = $covoiturageRepository->findAll();

        // Sérialiser les données pour les rendre au format JSON
        $data = $serializer->normalize($covoiturages, null, ['groups' => 'covoiturage:read']);

        // Retourner les données au format JSON
        return $this->json([
            'covoiturages' => $data,
        ]);
    }
}
