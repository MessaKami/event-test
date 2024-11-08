<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EventRepository $eventRepository, Request $request): Response
    {
        // Récupérer les filtres de date depuis la requête
        $startDate = $request->query->get('start_date');
        $endDate = $request->query->get('end_date');

        // Filtrer les événements en fonction des dates fournies ou récupérer tous les événements à venir
        if ($startDate && $endDate) {
            $events = $eventRepository->findEventsByDateRange(new \DateTime($startDate), new \DateTime($endDate));
        } else {
            $events = $eventRepository->findUpcomingEvents();
        }

        return $this->render('home/index.html.twig', [
            'events' => $events,
        ]);
    }
}
