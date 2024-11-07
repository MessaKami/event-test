<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class EventController extends AbstractController
{
    #[Route('/event/new', name: 'app_event_create')]
    #[IsGranted("ROLE_USER")]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event->setCreatedBy($this->getUser());
            $entityManager->persist($event);
            $entityManager->flush();

            $this->addFlash('success', 'Event created successfully!');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('event/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/event/{id}/edit', name: 'app_event_edit')]
    #[IsGranted("ROLE_USER")]
    public function edit(Event $event, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($event->getCreatedBy() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Event updated successfully!');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('event/edit.html.twig', [
            'form' => $form->createView(),
            'event' => $event,
        ]);
    }

    #[Route('/event/{id}/delete', name: 'app_event_delete', methods: ['POST'])]
    #[IsGranted("ROLE_USER")]
    public function delete(Event $event, EntityManagerInterface $entityManager): Response
    {
        // Vérifie que l'utilisateur est le créateur de l'événement
        if ($event->getCreatedBy() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $entityManager->remove($event);
        $entityManager->flush();

        $this->addFlash('success', 'Event deleted successfully!');

        return $this->redirectToRoute('app_home');
    }

    #[Route('/event/{id}', name: 'app_event_show', requirements: ['id' => '\d+'])]
    public function show(Event $event): Response
    {
        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }
}
