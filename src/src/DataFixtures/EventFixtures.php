<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($j = 0; $j < 10; $j++) {
            $event = new Event();
            $event->setTitle($faker->sentence(3))
                ->setDescription($faker->paragraph)
                ->setLocation($faker->city)
                ->setStartDate($faker->dateTimeBetween('+1 days', '+1 month'))
                ->setEndDate($faker->dateTimeBetween('+1 month', '+2 months'))
                ->setCreatedBy($this->getReference('user_' . rand(0, 2)));

            foreach (range(0, rand(1, 2)) as $i) {
                $event->addParticipant($this->getReference('user_' . $i));
            }

            $manager->persist($event);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
