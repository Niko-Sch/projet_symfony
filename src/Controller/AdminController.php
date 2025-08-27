<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\TicketRepository;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(Request $request, TicketRepository $repo, PaginatorInterface $paginator)
{
    $query = $repo->createQueryBuilder('ticket')
        ->orderBy('ticket.id', 'DESC');

    $tickets = $paginator->paginate(
        $query,
        $request->query->getInt('page', 1),
        10
    );

    return $this->render('admin/admin.html.twig', [
        'tickets' => $tickets,
        'pageTitle' => "Liste des tickets",
        'user'=> $this->getuser(),
    ]);
}






}
