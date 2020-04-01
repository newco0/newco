<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Discussion;
use App\Entity\DiscussionHistory;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\MessageType;
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

        $discussion = $entityManager->getRepository(Discussion::class)->findAllDiscussionByUser($user);
        if (!$discussion) {
            return $this->render('front/list_message/index.html.twig');
        };

        return $this->render('front/list_message/index.html.twig', [
            'discussion' => $discussion,
            'iduserrequest' => $iduserrequest
        ]);
    }

    /**
     * @Route("/messagedisc/{userId}/{id}", name="message_disc")
     */
    public function discussionhistories($userId, $id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $discussionhist = $entityManager
            ->getRepository(DiscussionHistory::class)
            ->findBy(
                ['discussion' => $id]
            );
        $discussion = $entityManager
            ->getRepository(Discussion::class)
            ->find($id);

        $user = $entityManager
            ->getRepository(Users::class)
            ->find($userId);

        $message = new DiscussionHistory();
        $message->setUser($user);
        $message->setDiscussion($discussion);
        $message->setText("coucou");
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $addmessage = $form->getData();
            $entityManager->persist($addmessage);
            $entityManager->flush();
            return new JsonResponse(true);
        }

        return $this->render('front/list_message/discussion.html.twig', [
            'discussion' => $discussionhist,
            'iduserrequest' => $userId,
            'formmessage' => $form->createView()
        ]);
    }
}
