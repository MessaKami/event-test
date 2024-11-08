<?php

namespace App\Tests\Entity;

use App\Entity\Event;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    public function testAddParticipant(): void
    {
        $event = new Event();
        $user = new User();

        // Vérifie que l'utilisateur est ajouté
        $event->addParticipant($user);
        $this->assertTrue($event->isParticipant($user));

        // Vérifie qu'il ne peut pas être ajouté deux fois
        $event->addParticipant($user);
        $this->assertCount(1, $event->getParticipants());
    }
}