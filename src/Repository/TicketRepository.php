<?php

namespace App\Repository;

use App\Entity\Ticket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ticket>
 */
class TicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ticket::class);
    }
    // Fonction qui permet de récuperer la liste de tous les tikets existants
    public function getAllTickets(): array
    {
        return $this->createQueryBuilder('ticket')
            ->orderBy('ticket.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
