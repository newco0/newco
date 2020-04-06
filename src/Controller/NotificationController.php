<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Discussion;


class NotificationController extends AbstractController
{
    /**
     * @Route("/notification", name="notification")
     */
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $idUserRequest = $this->getUser()->getId();
        $getDiscId = $entityManager->getRepository(Discussion::class)->findAllDiscussionByUser($idUserRequest);
        $notification= [];

        foreach ($getDiscId as $discHistories) {
            $result = $discHistories->getDiscussionHistories();
            foreach ($result as $message) {
                if ($message->getUser()->getId() != $idUserRequest && !$message->getIsSeen() ) {
                    $notification[] = $message;
                }
            }
        }

        return $this->render('front/notification/index.html.twig', [
            'notification' => $notification,
        ]);
    }
}
