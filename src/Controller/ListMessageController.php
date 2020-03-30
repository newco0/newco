<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Discussion;
use App\Entity\Users;
use Symfony\Component\Routing\Annotation\Route;

class ListMessageController extends AbstractController
{
    /**
     * @Route("/message", name="list_message")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager
            ->getRepository(Users::class)
            ->find(2);
        
        // $discussionhistories = $entityManager
        //     ->getRepository(Discussion::class)
        //     ->findBy([
        //         discussion_
        //     ]);
        $discussion = $entityManager->getRepository(Discussion::class)->findAllDiscussionByUser(2);
        // $alldiscussion = $discussionhistories->getDiscussionHistories()->getValues();

        return $this->render('front/list_message/index.html.twig', [
            'discussion' => $discussion
            // ,'alldiscussion' => $alldiscussion
        ]);
    }

    // /**
    //  * @Route("/message/{id}", name="list_message")
    //  */
    // public function discussionhistories($id)
    // {
    //     $entityManager = $this->getDoctrine()->getManager();
    //     $user = $entityManager
    //         ->getRepository(Users::class)
    //         ->find(2);
    //     $discussion = $user->getDiscussions()->getValues();

    //     $alldiscussion = $user->getDiscussionHistories()->getValues();

    //     return $this->render('front/list_message/index.html.twig', [
    //         'discussion' => $discussion,
    //         'alldiscussion' => $alldiscussion
    //     ]);
    // }
}
