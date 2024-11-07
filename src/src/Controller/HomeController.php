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
        // Récupération des filtres de date depuis la requête
        $startDate = $request->query->get('start_date');
        $endDate = $request->query->get('end_date');

        if ($startDate && $endDate) {
            // Si des dates sont fournies, filtrer les événements dans cet intervalle
            $events = $eventRepository->findEventsByDateRange(new \DateTime($startDate), new \DateTime($endDate));
        } else {
            // Sinon, récupérer tous les événements à venir
            $events = $eventRepository->findUpcomingEvents();
        }

        return $this->render('home/index.html.twig', [
            'events' => $events,
        ]);
    }
}
