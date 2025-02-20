<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfilController extends AbstractController
{
    #[Route('/api/profil', name: 'app_profil', methods: ['GET'])]
    public function index(UserInterface $user): JsonResponse
    {
        // Logique pour récupérer les informations du profil utilisateur
        // Utilisation de l'utilisateur connecté pour récupérer ses données

        // Exemple de données de profil
        $utilisateur = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'pseudo' => $user->getPseudo(),
            'role' => $user->getRoles(),
        ];

        // Retourner une réponse JSON avec les données de l'utilisateur
        return $this->json([
            'utilisateur' => $utilisateur,
        ]);
    }
}
