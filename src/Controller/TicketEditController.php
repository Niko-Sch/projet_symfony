<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketEditType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TicketEditController extends AbstractController
{
    #[Route('/tickets/{id<\d+>}/edit', name: 'ticket_edit', methods: ['GET'])]
    public function edit(Ticket $ticket): Response
    {
        $form = $this->createForm(TicketEditType::class, $ticket, [
            'action' => $this->generateUrl('ticket_update', ['id' => $ticket->getId()]),
            'method' => 'POST',
        ]);

        // IMPORTANT : on rend un fragment SANS layout
        return $this->render('ticket/_edit_frame.html.twig', [
            'ticket' => $ticket,
            'form'   => $form->createView(),
        ]);
    }

    #[Route('/tickets/{id<\d+>}', name: 'ticket_update', methods: ['POST'])]
    public function update(Request $request, Ticket $ticket, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(TicketEditType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            // On peut renvoyer un petit message dans le même frame
            return $this->render('ticket/_saved.html.twig', ['ticket' => $ticket]);
        }

        // 422 pour ré-afficher le formulaire avec erreurs dans le frame
        return $this->render('ticket/_edit_frame.html.twig', [
            'ticket' => $ticket,
            'form'   => $form->createView(),
        ], new Response('', 422));
    }
}
