<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\TicketRepository;

class PersonnelController extends AbstractController
{
    #[Route('/personnel', name: 'app_personnel')]
    public function index(Request $request, TicketRepository $repo, PaginatorInterface $paginator)
    {
        $query = $repo->createQueryBuilder('ticket')
            ->orderBy('ticket.id', 'DESC');

        $tickets = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('personnel/personnel.html.twig', [
            'tickets' => $tickets,
            'pageTitle' => "Liste des tickets",
            'user'=> $this->getuser(),
        ]);
    }
}
