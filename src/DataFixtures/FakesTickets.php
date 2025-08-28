<?php

namespace App\DataFixtures;

use App\Entity\Ticket;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FakesTickets extends Fixture
{ // Création de 9 tickets avec Catégorie, status et dates différentes.
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $ticket = new Ticket();
            $ticket->setTickAuteur("clientTest@email.com");
            $ticket->setTickDateOuv(new \DateTimeImmutable('-2 days'));
            $ticket->setTickDescription("Nouveau ticket $i");
            $ticket->setTickCategorie("Incident");
            $ticket->setTickStatus("Nouveau");
            $manager->persist($ticket);
        }

        for ($i = 1; $i <= 3; $i++) {
            $ticket = new Ticket();
            $ticket->setTickAuteur("clientTest@email.com");
            $ticket->setTickDateOuv(new \DateTimeImmutable());
            $ticket->setTickDescription("Tiket ouvert $i");
            $ticket->setTickCategorie("Panne");
            $ticket->setTickStatus("Ouvert");
            $manager->persist($ticket);
        }

        for ($i = 1; $i <= 3; $i++) {
            $ticket = new Ticket();
            $ticket->setTickAuteur("clientTest@email.com");
            $ticket->setTickDateOuv(new \DateTimeImmutable('-5 days'));
            $ticket->setTickDescription("Tiket résolu $i");
            $ticket->setTickCategorie("Information");
            $ticket->setTickStatus("Résolu");
            $manager->persist($ticket);
        }

        $manager->flush();
    }
}
