<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Form\TicketType;
use App\Entity\Ticket;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'home_accueil')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $accueil = new Ticket();
        $ticketForm = $this->createForm(TicketType::class, $accueil);
        $ticketForm->handleRequest($request);

        if ($ticketForm->isSubmitted() && $ticketForm->isValid()) {
            $em->persist($accueil);
            $em->flush();
            $this->addFlash('success', 'Ticket ajouté avec succès !');
            return $this->redirectToRoute('home_accueil');
        }

        return $this->render('home/index.html.twig', [
            'ticketForm' => $ticketForm->createView(),
        ]);
    }
}
