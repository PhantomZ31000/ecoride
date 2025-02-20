<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthentificationController extends AbstractController
{
    #[Route('/api/connexion', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): JsonResponse
    {
        // Récupérer les erreurs de connexion si présentes
        $error = $authenticationUtils->getLastAuthenticationError();

        // Récupérer le dernier nom d'utilisateur entré par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        // Retourner une réponse JSON
        return $this->json([
            'last_username' => $lastUsername,
            'error'         => $error ? $error->getMessageKey() : null,
        ]);
    }

    #[Route('/api/deconnexion', name: 'app_logout')]
    public function logout(): JsonResponse
    {
        // Ici, le processus de déconnexion est géré par Symfony et le contrôleur ne fait rien
        return $this->json([
            'message' => 'Déconnexion réussie.',
        ]);
    }
}
