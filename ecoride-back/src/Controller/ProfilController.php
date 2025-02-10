<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        // Logique pour récupérer les informations du profil utilisateur
        

        return $this->render('profil/index.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }
}