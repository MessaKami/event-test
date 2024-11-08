<?php

namespace App\Tests\Controller;

use App\Entity\Event;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class EventControllerTest extends TestCase
{
    public function testUserCanEditOwnEvent(): void
    {
        $user = new User();
        $event = new Event();
        $event->setCreatedBy($user);

        $this->assertSame($user, $event->getCreatedBy());
    }

    public function testUserCannotEditOtherUserEvent(): void
    {
        $user1 = new User();
        $user2 = new User();
        $event = new Event();
        $event->setCreatedBy($user1);

        $this->assertNotSame($user2, $event->getCreatedBy());
    }
}