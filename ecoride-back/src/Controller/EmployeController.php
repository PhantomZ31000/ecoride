<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Covoiturage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class EmployeController extends AbstractController
{
    #[Route('/espace-employe', name: 'app_espace_employe')]
    #[IsGranted('ROLE_EMPLOYE')]
    public function index(): Response
    {
        // Récupérer les avis en attente de validation
        $avisRepository = $this->getDoctrine()->getRepository(Avis::class);
        $avisEnAttente = $avisRepository->findBy(['validation' => false]);

        // Récupérer les covoiturages problématiques
        $covoiturageRepository = $this->getDoctrine()->getRepository(Covoiturage::class);
        $covoituragesProblemes = $covoiturageRepository->findBy(['probleme' => true]);

        return $this->render('employe/index.html.twig', [
            'avisEnAttente' => $avisEnAttente,
            'covoituragesProblemes' => $covoituragesProblemes,
        ]);
    }

    #[Route('/espace-employe/valider-avis/{id}', name: 'app_valider_avis')]
    #[IsGranted('ROLE_EMPLOYE')]
    public function validerAvis(Avis $avis): Response
    {
        // Valider l'avis
        $avis->setValidation(true);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_espace_employe');
    }

    #[Route('/espace-employe/refuser-avis/{id}', name: 'app_refuser_avis')]
    #[IsGranted('ROLE_EMPLOYE')]
    public function refuserAvis(Avis $avis): Response
    {
        // Refuser l'avis
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($avis);
        $entityManager->flush();

        return $this->redirectToRoute('app_espace_employe');
    }
}