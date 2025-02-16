<?php

namespace App\Controller;

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
        $covoituragesParJour = $this->getDoctrine()->getRepository(Covoiturage::class)->getNombreCovoituragesParJour();
        return $this->json($covoituragesParJour);
    }

    #[Route('/api/stats/credits-par-jour', name: 'app_stats_credits_par_jour')]
    #[IsGranted('ROLE_ADMIN')]
    public function creditsParJour(): JsonResponse
    {
        $creditsParJour = $this->getDoctrine()->getRepository(User::class)->getCreditsGagnesParJour();
        return $this->json($creditsParJour);
    }

    #[Route('/api/stats/total-credits', name: 'app_stats_total_credits')]
    #[IsGranted('ROLE_ADMIN')]
    public function totalCredits(): JsonResponse
    {
        $totalCredits = $this->getDoctrine()->getRepository(User::class)->getTotalCreditsGagnes();
        return $this->json(['total' => $totalCredits]);
    }
}