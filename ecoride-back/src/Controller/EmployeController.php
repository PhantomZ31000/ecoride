<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Covoiturage;
use App\Repository\AvisRepository;
use App\Repository\CovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class EmployeController extends AbstractController
{
    #[Route('/api/espace-employe', name: 'app_espace_employe', methods: ['GET'])]
    #[IsGranted('ROLE_EMPLOYE')]
    public function index(AvisRepository $avisRepository, CovoiturageRepository $covoiturageRepository): JsonResponse
    {
        // Récupérer les avis en attente de validation
        $avisEnAttente = $avisRepository->findBy(['validation' => false]);

        // Récupérer les covoiturages problématiques
        $covoituragesProblemes = $covoiturageRepository->findBy(['probleme' => true]);

        // Retourner une réponse JSON avec les résultats
        return $this->json([
            'avisEnAttente' => $avisEnAttente,
            'covoituragesProblemes' => $covoituragesProblemes,
        ]);
    }

    #[Route('/api/espace-employe/valider-avis/{id}', name: 'app_valider_avis', methods: ['POST'])]
    #[IsGranted('ROLE_EMPLOYE')]
    public function validerAvis(Avis $avis): JsonResponse
    {
        // Valider l'avis
        $avis->setValidation(true);
        $this->getDoctrine()->getManager()->flush();

        // Retourner une réponse JSON pour indiquer que l'avis a été validé
        return $this->json([
            'message' => 'Avis validé avec succès',
            'avis' => $avis,
        ]);
    }

    #[Route('/api/espace-employe/refuser-avis/{id}', name: 'app_refuser_avis', methods: ['DELETE'])]
    #[IsGranted('ROLE_EMPLOYE')]
    public function refuserAvis(Avis $avis): JsonResponse
    {
        // Refuser l'avis
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($avis);
        $entityManager->flush();

        // Retourner une réponse JSON pour indiquer que l'avis a été refusé
        return $this->json([
            'message' => 'Avis refusé avec succès',
            'avis_id' => $avis->getId(),
        ]);
    }
}
