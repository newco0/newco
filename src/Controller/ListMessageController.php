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

        //if id is check, we will check if there are an existing discussion, otherwise, we will create this by create a new discussion.

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

                    // if the id sended by the client is not existing, render the original view whithout value

                    if (!$userdest) {
                        return $this->render('front/list_message/index.html.twig');
                    }
                    $newdisc = new Discussion();
                    $newdisc->setDest($userdest);
                    $userexp->addDiscussion($newdisc);
                    $entityManager->persist($newdisc);
                    $entityManager->flush();
                }
            }
        }

        $discussion = $entityManager->getRepository(Discussion::class);

        // get all discussion and send it to the view, otherwise  render the original view whithout value

        $result = $discussion->findAllDiscussionByUser($iduserrequest);

        if (!$result) {
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

        // check if this is an existing discussion and if the discussionhistories are empty and delete it

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

        // get the current iddiscussion of the discussion history

        $discussionhist = $entityManager
            ->getRepository(DiscussionHistory::class)
            ->findBy(
                ['discussion' => $id]
            );

        // get the current discussion

        $discussion = $entityManager
            ->getRepository(Discussion::class)
            ->find($id);

        $user = $entityManager
            ->getRepository(Users::class)
            ->find($userId);

        // create a new discussion history (message)

        $message = new DiscussionHistory();
        $message->setUser($user);
        $message->setDiscussion($discussion);

        $discussion->setDateUpdate(new DateTime());

        // create the form

        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $addmessage = $form->getData();
            $entityManager->persist($addmessage);
            $idsendernotif = $this->getUser();
            $idusernotif = $discussion->getDest()->getId() == $this->getUser()->getId() ?  $discussion->getIdExp() : $discussion->getDest();

            // check that there is no existing and active notification associated with this message

            $isNotifExist = $entityManager->getRepository(Notification::class)->findBy([
                'user' => $idusernotif,
                'sender' =>  $idsendernotif,
                'type' => 0,
                'isActive' => true,
                'isSeen' => false
            ]);

            // if there is no notification, create one, then flush and return a jsonresponse with error setting to false

            if (!$isNotifExist) {
                $notification = new Notification();
                $notification->setUser($idusernotif);
                $notification->setSender($idsendernotif);
                $notification->setType(0);
                $entityManager->persist($notification);
            }

            $entityManager->flush();
            return new JsonResponse(['error' => false]);
        }

        // return the view for the first request or on reload

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

        // check if this is an existing message and discussion

        $discussionhist = $entityManager
            ->getRepository(DiscussionHistory::class)
            ->findAllDiscussionWhereNotUser($userId, $iddisc);

        $discussion = $entityManager
            ->getRepository(Discussion::class)
            ->find($iddisc);


        // setisseen to true for each message

        foreach ($discussionhist as $key) {
            $key->setIsSeen(true);
        }

        // set idesendernotif depending the owner of the request, to set a different id in the field sender

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

        // update isSeen to all notification that is associated to this message

        if ($isMessNotifNotSeen) {
            foreach ($isMessNotifNotSeen as $notification) {
                $notification->setIsSeen(1);
            }
        }

        $entityManager->flush();
        return new JsonResponse(true);
    }
}
