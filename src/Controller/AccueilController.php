<?php
namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'home_accueil', methods: ['GET','POST'])]
public function index(Request $request, EntityManagerInterface $emi): Response
{
    $ticket = new Ticket();

    $ticket->setTickAuteur($this->getUser()?->getUserIdentifier() ?? '');
    $ticket->setTickDateOuv(new \DateTime());
    $ticket->setTickStatus('Nouveau');

    $form = $this->createForm(TicketType::class, $ticket);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $ticket->setTickAuteur($this->getUser()?->getUserIdentifier() ?? '');
        $emi->persist($ticket);
        $emi->flush();
        // addFlash permet d'afficher un message
        $this->addFlash('success',"Ticket créé avec succès !\nIl sera traité dés que possible.\nVous pouvez a présent vous déconnecter ou créer un autre ticket.");
        return $this->redirectToRoute('home_accueil', [], Response::HTTP_SEE_OTHER); // 303
    }

    if ($form->isSubmitted() && !$form->isValid()) {
        $resp = $this->render('home/index.html.twig', ['ticketForm' => $form->createView()]);
        $resp->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY); //422
        return $resp;
    }

    return $this->render('home/index.html.twig', [
        'ticketForm' => $form->createView(),
    ]);
}

}
