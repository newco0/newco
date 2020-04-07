<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Discussion;
use App\Entity\Notification;
use App\Entity\DiscussionHistory;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\MessageType;
use DateTime;
use Symfony\Component\Routing\Annotation\Route;

class ListMessageController extends AbstractController
{
    /**
     * @Route("/message/{id}", name="list_message")
     */
    public function index(int $id = null)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $iduserrequest = $this->getUser();
        if ($id) {
            $checkifexistexptodest = $entityManager
                ->getRepository(Discussion::class)
                ->findBy([
                    'exp' => $iduserrequest,
                    'dest' => $id
                ]);
            if (!$checkifexistexptodest) {
                $checkifexistexptodest = $entityManager
                    ->getRepository(Discussion::class)
                    ->findBy([
                        'exp' => $id,
                        'dest' => $iduserrequest
                    ]);
                if (!$checkifexistexptodest) {
                    $userexp = $entityManager
                        ->getRepository(Users::class)
                        ->find($iduserrequest);
                    $userdest = $entityManager
                        ->getRepository(Users::class)
                        ->find($id);
                    $newdisc = new Discussion();
                    $newdisc->setDest($userdest);
                    $userexp->addDiscussion($newdisc);
                    $entityManager->persist($newdisc);
                    $entityManager->flush();
                }
            }
        }

        $discussion = $entityManager->getRepository(Discussion::class);
        $result = $discussion->findAllDiscussionByUser($iduserrequest);
        if (!$discussion) {
            return $this->render('front/list_message/index.html.twig');
        };

        return $this->render('front/list_message/index.html.twig', [
            'discussion' => $result,
            'iduserrequest' => $iduserrequest->getId()
        ]);
    }

    /**
     * @Route("/deletedisc/{id}", name="delete_disc")
     */
    public function deleteemptydisc($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $discussion = $entityManager
            ->getRepository(Discussion::class)
            ->find(
                $id
            );
        if (count($discussion->getDiscussionHistories()) == 0) {
            $entityManager->remove($discussion);
            $entityManager->flush();
            return new JsonResponse(["isdeleted" => "true"]);
        };
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
        $discussion->setDateUpdate(new DateTime());
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $addmessage = $form->getData();
            $entityManager->persist($addmessage);
            $idsendernotif = $this->getUser();
            $idusernotif = $discussion->getDest()->getId() == $this->getUser()->getId() ?  $discussion->getIdExp() : $discussion->getDest();

            $isNotifExist = $entityManager->getRepository(Notification::class)->findBy([
                'user' => $idusernotif,
                'sender' =>  $idsendernotif,
                'type' => 0,
                'isActive' => true,
                'isSeen' => false
            ]);


            if (!$isNotifExist) {
                $notification = new Notification();
                $notification->setUser($idusernotif);
                $notification->setSender($idsendernotif);
                $notification->setType(0);
                $entityManager->persist($notification);
            }

            $entityManager->flush();
            return new JsonResponse(true);
        }
        return $this->render('front/list_message/discussion.html.twig', [
            'discussion' => $discussionhist,
            'iduserrequest' => $userId,
            'formmessage' => $form->createView()
        ]);
    }

    /**
     * @Route("/updateseen/{userId}/{iddisc}/{expId}", name="update_seen_msg")
     */
    public function updateseenmessage($userId, $iddisc, $expId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $discussionhist = $entityManager
            ->getRepository(DiscussionHistory::class)
            ->findAllDiscussionWhereNotUser($userId, $iddisc);
        $discussion = $entityManager
            ->getRepository(Discussion::class)
            ->find($iddisc);

        foreach ($discussionhist as $key) {
            $key->setIsSeen(true);
        }

        if ($userId == $expId) {
            $idsendernotif = $discussion->getDest()->getId() == $expId ? $discussion->getIdExp() :  $discussion->getDest();
        } else {
            $idsendernotif = $expId;
        }

        $isMessNotifNotSeen = $entityManager->getRepository(Notification::class)->findBy([
            'user' => $this->getUser(),
            'sender' => $idsendernotif,
            'type' => 0,
            'isActive' => true,
            'isSeen' => false
        ]);

        if ($isMessNotifNotSeen) {
            foreach ($isMessNotifNotSeen as $notification) {
                $notification->setIsSeen(1);
            }
        }

        $entityManager->flush();
        return new JsonResponse(true);
    }
}
