<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropositionController extends AbstractController
{
    #[Route('/proposition', name: 'app_proposition')]
    public function index(Request $request): Response
    {
        // Logique pour gérer la soumission du formulaire de proposition de covoiturage
        

        return $this->render('proposition/index.html.twig', [
            
        ]);
    }
}