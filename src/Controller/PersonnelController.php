<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnelController extends AbstractController
{
    #[Route('/personnel', name: 'app_personnel')]
    public function index(): Response
    {
        // Vérifie si l'utilisateur est connecté et admin
        if ($this->isGranted('ROLE_PERSONNEL')) {
            return $this->render('personnel/personnel.html.twig');
        }

        return $this->redirectToRoute('home_accueil');
    }
}
