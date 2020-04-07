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

        // send only the active notification sort by date of the user to the notification page

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

        // send only the active notification sort by date of the user to the notification rightside mobile device

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

        // find notification by id and update isSeen to true, otherwise send a jsonresponse setting error to true

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

        // find notification by id and update isSeen to false, otherwise send a jsonresponse setting error to true

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

        // find notification by id and update isActive to false, otherwise send a jsonresponse error setting to true

        $notification = $entityManager->getRepository(Notification::class)->find($id);

        if (!$notification) {
            return new JsonResponse(["error" => true]);
        }

        $notification->setIsActive(false);
        $entityManager->flush();

        return new JsonResponse(["error" => false]);
    }
}
