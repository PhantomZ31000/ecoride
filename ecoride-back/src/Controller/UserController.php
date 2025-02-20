<?php

// src/Controller/UserController.php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/api/users", name="register_user", methods={"POST"})
     */
    public function register(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        UserRepository $userRepository,
        ValidatorInterface $validator
    ): Response {
        $data = json_decode($request->getContent(), true);

        $email = $data['email'] ?? null;
        $pseudo = $data['pseudo'] ?? null;
        $password = $data['password'] ?? null;

        // Validation des données envoyées
        if (!$email || !$pseudo || !$password) {
            return $this->json(['message' => 'Email, pseudo, and password are required.'], Response::HTTP_BAD_REQUEST);
        }

        // Vérifier si l'email est déjà utilisé
        $existingUser = $userRepository->findOneBy(['email' => $email]);
        if ($existingUser) {
            return $this->json(['message' => 'Email already in use.'], Response::HTTP_BAD_REQUEST);
        }

        // Création d'un nouvel utilisateur
        $user = new User();
        $user->setEmail($email);
        $user->setPseudo($pseudo);

        // Hachage du mot de passe
        $hashedPassword = $passwordHasher->hashPassword($user, $password);
        $user->setPassword($hashedPassword);

        // Enregistrement de l'utilisateur en base de données
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json(['message' => 'User created successfully.'], Response::HTTP_CREATED);
    }
}
