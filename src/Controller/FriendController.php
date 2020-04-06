<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Friend;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Users;
use App\Entity\Notification;

class FriendController extends AbstractController
{
    /**
     * @Route("/friendaction", name="friendaction")
     */
    public function index()
    {
        return $this->render('front/friend/index.html.twig');
    }

    /**
     * @Route("/searchfriends", name="searchfriend")
     */
    public function search()
    {
        $iduserrequest = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $allusers = $entityManager->getRepository(Users::class)->findAll();
        $allfriend = $entityManager->getRepository(Friend::class)->findFriendByIdUser($iduserrequest);
        $sortUser = [];
        $resultfriendpending = [];
        $resultfriendrejected = [];
        $resultfriendreceived = [];

        foreach ($allusers as $nb => $key) {
            if ($iduserrequest != $key->getId() && $key->getIsActive()) {
                $sortUser[$key->getId()] = $key;
            }
        }

        foreach ($allfriend as $nb => $key2) {
            $iduser = $key2->getIdUser()->getId();
            $idfriend = $key2->getIdFriend()->getId();
            if (is_null($key2->getIsAccepted())) {
                if (($iduser != $iduserrequest)) {
                    $resultfriendreceived[$iduser] = $iduser;
                } else {
                    $resultfriendpending[$idfriend] = $idfriend;
                };
            } elseif (!$key2->getIsAccepted() || $key2->getIsAccepted()) {
                if (($iduser != $iduserrequest)) {
                    $resultfriendrejected[$iduser] = $iduser;
                    unset($sortUser[$iduser]);
                } else {
                    $resultfriendrejected[$idfriend] = $idfriend;
                    unset($sortUser[$idfriend]);
                };
            }
        }

        return $this->render('front/friend/search.html.twig', [
            'alluser' => $sortUser,
            'idfriendpending' => $resultfriendpending,
            'idfriendreceived' => $resultfriendreceived,
            'iduserrequest' => $iduserrequest
        ]);
    }

    /**
     * @Route("/listfriends", name="listfriendrelation")
     */
    public function list()
    {
        $iduserrequest = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $allfriend = $entityManager->getRepository(Friend::class)->findFriendByIdUserAccepted($iduserrequest);

        return $this->render('front/friend/list.html.twig', [
            'alluser' => $allfriend,
            'iduserrequest' => $iduserrequest
        ]);
    }

    /**
     * @Route("/addfriends/{idtoadd}", name="addfriendrelation")
     */
    public function add($idtoadd)
    {
        $iduserrequest = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $isExistIdtoaddtouser = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($idtoadd, $iduserrequest);
        $isExistIdusertoadd = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($iduserrequest, $idtoadd);
        if (count($isExistIdtoaddtouser) > 0 || count($isExistIdusertoadd) > 0) {
            return new JsonResponse(
                [
                    "error" => true,
                    "message" => "This relation is already existing"
                ]
            );
        }

        if ($iduserrequest == $idtoadd) {
            return new JsonResponse([
                "error" => true,
                "message" => "Error, the user id could not be the same to the friend id"
            ]);
        }

        $userrequest = $entityManager->getRepository(Users::class)->find($iduserrequest);
        $usertoadd = $entityManager->getRepository(Users::class)->find($idtoadd);
        if (!$usertoadd || !$userrequest) {
            return new JsonResponse(["error" => true]);
        };

        $friend = new Friend();
        $friend->setIdFriend($usertoadd);
        $userrequest->addFriend($friend);
        $entityManager->persist($friend);

        $isNotifExist = $entityManager->getRepository(Notification::class)->findBy([
            'user' => $usertoadd,
            'sender' =>  $userrequest,
            'type' => 1,
            'isActive' => true,
            'isSeen' => false
        ]);


        if (!$isNotifExist) {
            $notification = new Notification();
            $notification->setUser($usertoadd);
            $notification->setSender($userrequest);
            $notification->setType(1);
            $entityManager->persist($notification);
        }
        $entityManager->flush();
        return new JsonResponse(["error" => false]);
    }

    /**
     * @Route("/accept/{id}", name="acceptfriendrelation")
     */
    public function acceptRequestedRelation($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $iduserrequest = $this->getUser();
        $isExistIdtoaccept = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($id, $iduserrequest);
        if (!$isExistIdtoaccept || count($isExistIdtoaccept) != 1) {
            return new JsonResponse(
                [
                    "error" => true,
                    "message" => "This relation is not existing"
                ]
            );
        } else {
            $isExistIdtoaccept[0]->setIsAccepted(1);
            $entityManager->persist($isExistIdtoaccept[0]);
            $entityManager->flush();
            return new JsonResponse(["error" => false]);
        }
    }

    /**
     * @Route("/reject/{id}", name="rejectfriendrelation")
     */
    public function rejectRequestedRelation($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $iduserrequest = $this->getUser();
        $isExistIdtoaccept = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($id, $iduserrequest);
        if (!$isExistIdtoaccept || count($isExistIdtoaccept) != 1) {
            return new JsonResponse(
                [
                    "error" => true,
                    "message" => "This relation is not existing"
                ]
            );
        } else {
            $isExistIdtoaccept[0]->setIsAccepted(0);
            $entityManager->persist($isExistIdtoaccept[0]);
            $entityManager->flush();
            return new JsonResponse(["error" => false]);
        }
    }

    /**
     * @Route("/delete/{id}", name="deletefriendrelation")
     */
    public function deleterelation($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $iduserrequest = $this->getUser();
        $isExistIdtoaccept = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($id, $iduserrequest);
        if (!$isExistIdtoaccept || count($isExistIdtoaccept) != 1) {
            $isExistIdtoaccept = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($iduserrequest, $id);
            if (!$isExistIdtoaccept || count($isExistIdtoaccept) != 1) {
                return new JsonResponse(
                    [
                        "error" => true,
                        "message" => "This relation is not existing"
                    ]
                );
            }
        }

        if ($isExistIdtoaccept[0]->getIsAccepted() || is_null($isExistIdtoaccept[0]->getIsAccepted())) {
            $entityManager->remove($isExistIdtoaccept[0]);

            $isNotifExist = $entityManager->getRepository(Notification::class)->findBy([
                'user' => $id,
                'sender' =>  $iduserrequest,
                'type' => 1,
                'isActive' => true,
                'isSeen' => false
            ]);
    
            if ($isNotifExist) {
                $entityManager->remove($isNotifExist[0]);
            }


            $entityManager->flush();
            return new JsonResponse(["error" => false]);
        } else {
            return new JsonResponse(
                [
                    "error" => true,
                    "message" => "You can not delete this relation"
                ]
            );
        }
    }

    /**
     * @Route("/friendrequest", name="listfriendrequest")
     */
    public function requestfriend()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $iduserrequest = $this->getUser()->getId();
        $friendrequest = $entityManager->getRepository(Friend::class)->findBy(['user' => $iduserrequest]);

        $result = [];
        foreach ($friendrequest as $key) {
            if (is_null($key->getIsAccepted())) {
                $result[$key->getIdFriend()->getId()] = $key->getIdFriend();
            }
        }
        return $this->render('front/friend/friendrequest.html.twig', [
            'alluser' => $result
        ]);
    }

    /**
     * @Route("/friendreceive", name="listfriendreceive")
     */
    public function receivedfriend()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $iduserrequest = $this->getUser()->getId();
        $friendrequest = $entityManager->getRepository(Friend::class)->findBy(['friend' => $iduserrequest]);

        $result = [];
        foreach ($friendrequest as $key) {
            if (is_null($key->getIsAccepted())) {
                $result[$key->getIdUser()->getId()] = $key->getIdUser();
            }
        }
        return $this->render('front/friend/requestreceived.html.twig', [
            'alluser' => $result
        ]);
    }
}
