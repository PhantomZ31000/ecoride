<?php

namespace App\Controller;

use App\Repository\CovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class CovoiturageController extends AbstractController
{
    #[Route('/covoiturage', name: 'app_covoiturage')]
    public function index(CovoiturageRepository $covoiturageRepository, SerializerInterface $serializer): JsonResponse
    {
        // Fetching covoiturages from the database
        $covoiturages = $covoiturageRepository->findAll();

        // Serializing the data to convert it to a JSON-friendly format
        $data = $serializer->normalize($covoiturages, null, ['groups' => 'covoiturage:read']);

        return $this->json([
            'covoiturages' => $data,
        ]);
    }
}
