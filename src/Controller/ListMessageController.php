<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Discussion;
use App\Entity\DiscussionHistory;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\MessageType;
use DateTime;
use Symfony\Component\HttpFoundation\Response;
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
            $checkifexitexptodest = $entityManager
                ->getRepository(Discussion::class)
                ->findBy([
                    'exp' => $this->getUser(),
                    'dest' => $id
                ]);
            if (!$checkifexitexptodest) {
                $checkifexitdesttoexp = $entityManager
                    ->getRepository(Discussion::class)
                    ->findBy([
                        'exp' => $id,
                        'dest' => $iduserrequest
                    ]);
                if (!$checkifexitdesttoexp) {
                    $userexp = $entityManager
                        ->getRepository(Users::class)
                        ->find($this->getUser());
                    $userdest = $entityManager
                        ->getRepository(Users::class)
                        ->find($id);
                    $newdisc = new Discussion();
                    $newdisc->setDest($userdest)->setIdExp($userexp);
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

        // dd($result);


        return $this->render('front/list_message/index.html.twig', [
            'discussion' => $result,
            'iduserrequest' => $iduserrequest->getId()
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
        $discussion->setDateUpdate(new DateTime());
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

    /**
     * @Route("/updateseen/{userId}/{id}", name="update_seen_msg")
     */
    public function updateseenmessage($userId, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $discussionhist = $entityManager
            ->getRepository(DiscussionHistory::class)
            ->findAllDiscussionWhereNotUser($userId, $id);

        foreach ($discussionhist as $key) {
            $key->setIsSeen(true);
            $entityManager->persist($key);
            $entityManager->flush();
        }
    
        return new JsonResponse(true);
    }
}
