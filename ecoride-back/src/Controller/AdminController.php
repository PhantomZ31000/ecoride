<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AdminController extends AbstractController
{
    #[Route('/espace-administrateur', name: 'app_espace_administrateur')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        // Récupérer les statistiques de covoiturage
        $covoituragesParJour = $this->getDoctrine()->getRepository(Covoiturage::class)->getNombreCovoituragesParJour();

        // Récupérer les statistiques de crédits
        $creditsParJour = $this->getDoctrine()->getRepository(User::class)->getCreditsGagnesParJour();
        $totalCredits = $this->getDoctrine()->getRepository(User::class)->getTotalCreditsGagnes();

        // Récupérer la liste des utilisateurs
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'covoituragesParJour' => $covoituragesParJour,
            'creditsParJour' => $creditsParJour,
            'totalCredits' => $totalCredits,
            'users' => $users,
        ]);
    }

    #[Route('/espace-administrateur/suspendre-utilisateur/{id}', name: 'app_suspendre_utilisateur')]
    #[IsGranted('ROLE_ADMIN')]
    public function suspendreUtilisateur(User $user): Response
    {
        // Suspendre l'utilisateur
        $user->setEnabled(false);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_espace_administrateur');
    }

    #[Route('/espace-administrateur/activer-utilisateur/{id}', name: 'app_activer_utilisateur')]
    #[IsGranted('ROLE_ADMIN')]
    public function activerUtilisateur(User $user): Response
    {
        // Activer l'utilisateur
        $user->setEnabled(true);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_espace_administrateur');
    }
}