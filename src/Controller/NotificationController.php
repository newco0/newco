<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Notification;
use Symfony\Component\HttpFoundation\JsonResponse;


class NotificationController extends AbstractController
{
    /**
     * @Route("/notification", name="notification")
     */
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $idUserRequest = $this->getUser()->getId();
        $notifications = $entityManager->getRepository(Notification::class)->findBy(
            [
                'user' => $idUserRequest,
                'isActive' => true
            ],
            ['date_register' => 'DESC']
        );

        return $this->render('front/notification/index.html.twig', [
            'notifications' => $notifications,
        ]);
    }
    /**
     * @Route("/notificationlist", name="notificationlist")
     */
    public function list()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $idUserRequest = $this->getUser()->getId();
        $notifications = $entityManager->getRepository(Notification::class)->findBy(
            [
                'user' => $idUserRequest,
                'isActive' => true
            ],
            ['date_register' => 'DESC']
        );

        return $this->render('front/notification/notification.html.twig', [
            'notifications' => $notifications,
        ]);
    }

    /**
     * @Route("/updateseennotification/{id}", name="updateseennotification")
     */
    public function updateIsSeen($id)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $notification = $entityManager->getRepository(Notification::class)->find($id);

        if (!$notification) {
            return new JsonResponse(["error" => true]);
        }

        $notification->setIsseen(true);
        $entityManager->flush();

        return new JsonResponse(["error" => false]);
    }

    /**
     * @Route("/updatenotseennotification/{id}", name="updatenotseennotification")
     */
    public function updateIsSeenFalse($id)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $notification = $entityManager->getRepository(Notification::class)->find($id);

        if (!$notification) {
            return new JsonResponse(["error" => true]);
        }

        $notification->setIsseen(false);
        $entityManager->flush();

        return new JsonResponse(["error" => false]);
    }

    /**
     * @Route("/desactivatenotification/{id}", name="desactivatenotification")
     */
    public function desactivateNotif($id)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $notification = $entityManager->getRepository(Notification::class)->find($id);

        if (!$notification) {
            return new JsonResponse(["error" => true]);
        }

        $notification->setIsActive(false);
        $entityManager->flush();

        return new JsonResponse(["error" => false]);
    }
}
