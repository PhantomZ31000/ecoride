<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(VoitureRepository $voitureRepository): JsonResponse
    {
        // Fetching all voitures for the user
        $voitures = $voitureRepository->findAll();

        // Returning the list of voitures as JSON
        return $this->json([
            'voitures' => $voitures,
        ]);
    }
}
