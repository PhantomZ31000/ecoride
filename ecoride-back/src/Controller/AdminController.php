<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/api/admin', name: 'app_admin')]
    public function index(UserRepository $userRepository): JsonResponse
    {
        // Fetching all users for admin purposes
        $users = $userRepository->findAll();

        // Transforming the users into a format suitable for React (e.g., using normalization)
        $usersData = [];
        foreach ($users as $user) {
            $usersData[] = [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'pseudo' => $user->getPseudo(),
                'role' => $user->getRole(),
            ];
        }

        return $this->json([
            'users' => $usersData,
        ]);
    }
}
