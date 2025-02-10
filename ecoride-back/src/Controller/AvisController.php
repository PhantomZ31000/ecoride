<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(Request $request): Response
    {
        // Logique pour gérer la soumission du formulaire d'avis
        

        return $this->render('avis/index.html.twig', [
            
        ]);
    }
}