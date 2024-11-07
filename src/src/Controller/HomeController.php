<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EventRepository $eventRepository, Request $request): Response
    {
        // Récupération des événements à venir triés par date de début
        $events = $eventRepository->findUpcomingEvents();

        return $this->render('home/index.html.twig', [
            'events' => $events,
        ]);
    }
}
