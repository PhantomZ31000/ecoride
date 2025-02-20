<?php

namespace App\Controller;

use App\Entity\Covoiturage;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class StatsController extends AbstractController
{
    #[Route('/api/stats/covoiturages-par-jour', name: 'app_stats_covoiturages_par_jour')]
    #[IsGranted('ROLE_ADMIN')]
    public function covoituragesParJour(): JsonResponse
    {
        // Fetching the number of carpooling rides per day from the repository
        $covoituragesParJour = $this->getDoctrine()->getRepository(Covoiturage::class)->getNombreCovoituragesParJour();

        return $this->json([
            'covoiturages_par_jour' => $covoituragesParJour,
        ]);
    }

    #[Route('/api/stats/credits-par-jour', name: 'app_stats_credits_par_jour')]
    #[IsGranted('ROLE_ADMIN')]
    public function creditsParJour(): JsonResponse
    {
        // Fetching the credits earned per day from the User repository
        $creditsParJour = $this->getDoctrine()->getRepository(User::class)->getCreditsGagnesParJour();

        return $this->json([
            'credits_par_jour' => $creditsParJour,
        ]);
    }

    #[Route('/api/stats/total-credits', name: 'app_stats_total_credits')]
    #[IsGranted('ROLE_ADMIN')]
    public function totalCredits(): JsonResponse
    {
        // Fetching the total credits earned from the User repository
        $totalCredits = $this->getDoctrine()->getRepository(User::class)->getTotalCreditsGagnes();

        return $this->json([
            'total_credits' => $totalCredits,
        ]);
    }
}
