<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Discussion;
use App\Entity\DiscussionHistory;
use App\Entity\Users;
use Symfony\Component\Routing\Annotation\Route;

class ListMessageController extends AbstractController
{
    /**
     * @Route("/message", name="list_message")
     */
    public function index()
    {
        $iduserrequest = 2;
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager
            ->getRepository(Users::class)
            ->find($iduserrequest);

        $discussion = $entityManager->getRepository(Discussion::class)->findAllDiscussionByUser(2);
        // $alldiscussion = $discussionhistories->getDiscussionHistories()->getValues();

        return $this->render('front/list_message/index.html.twig', [
            'discussion' => $discussion,
            'iduserrequest' => $iduserrequest
            // ,'alldiscussion' => $alldiscussion
        ]);
    }

    /**
     * @Route("/messagedisc/{userId}/{id}", name="message_disc")
     */
    public function discussionhistories($userId, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $discussion = $entityManager
            ->getRepository(DiscussionHistory::class)
            ->findBy(
                ['discussion' => $id]
            );

        return $this->render('front/list_message/discussion.html.twig', [
            'discussion' => $discussion,
            'iduserrequest' => $userId
        ]);
    }
}
