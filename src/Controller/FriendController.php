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
     * @Route("/friendaction/{page}", name="friendaction")
     */
    public function index($page = null)
    {
        // set the page to null by default, this allow to retrieve a request number from the notification page and display the desired select according to

        return $this->render('front/friend/index.html.twig');
    }

    /**
     * @Route("/searchfriends", name="searchfriend")
     */
    public function search()
    {
        $iduserrequest = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();

        // get all user

        $allusers = $entityManager->getRepository(Users::class)->findAll();

        // get all friend of the user, by search friend where $iduserrequest is equal to userid or friendid

        $allfriend = $entityManager->getRepository(Friend::class)->findFriendByIdUser($iduserrequest);

        // initializing array to sort the data in order to display only the friend that the request is pending or a request received

        $sortUser = [];
        $resultfriendpending = [];
        $resultfriendreceived = [];

        // fill the soruser with the key id and unset the current user

        foreach ($allusers as $nb => $key) {
            if ($iduserrequest != $key->getId() && $key->getIsActive()) {
                $sortUser[$key->getId()] = $key;
            }
        }

        // loop through the allfriend in order to send the right data to the arrays, then return them to the view

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
                    unset($sortUser[$iduser]);
                } else {
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

        // all friend where the isaccepted field is equal to true, then send the result to the view

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

        // check if the relation friend between the userrequest and usertoad is already existing
        // if this relation is already existing, send an error with a message

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

        // make sure that the usertoadd is not equal to the userrequest, otherwise send an error

        if ($iduserrequest == $idtoadd) {
            return new JsonResponse([
                "error" => true,
                "message" => "Error, the user id could not be the same to the friend id"
            ]);
        }


        $userrequest = $entityManager->getRepository(Users::class)->find($iduserrequest);
        $usertoadd = $entityManager->getRepository(Users::class)->find($idtoadd);

        // if the usertoadd or the userrequest is not existing, send an error

        if (!$usertoadd || !$userrequest) {
            return new JsonResponse(["error" => true]);
        };


        // if all is right, create the friend relation,  

        $friend = new Friend();
        $friend->setIdFriend($usertoadd);
        $userrequest->addFriend($friend);
        $entityManager->persist($friend);

        // In order to create a new notification, we make sure that is not an existing valid notification

        $isNotifExist = $entityManager->getRepository(Notification::class)->findBy([
            'user' => $usertoadd,
            'sender' =>  $userrequest,
            'type' => 1,
            'isActive' => true,
            'isSeen' => false
        ]);

        // If there is no notification, we create a new notification, then flush all the new entity and send a json response error to false

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

        // make sure that the requested relation is existing

        $isExistIdtoaccept = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($id, $iduserrequest);

        // if this relation is not existing or if the count is not equal to one, send an error, otherwise, update this requested relation by setting
        // the isAccepted to true and create a new notification and send a new jsonresponse with error setting to false

        if (!$isExistIdtoaccept || count($isExistIdtoaccept) != 1) {
            return new JsonResponse(
                [
                    "error" => true,
                    "message" => "This relation is not existing"
                ]
            );
        } else {
            // $idtoaccept = $entityManager->getRepository(Users::class)->find($isExistIdtoaccept[0]->getIdUser()->getId());
            $isExistIdtoaccept[0]->setIsAccepted(1);
            $notification = new Notification();
            $notification->setUser($isExistIdtoaccept[0]->getIdUser());
            $notification->setSender($iduserrequest);
            $notification->setType(2);
            $entityManager->persist($notification);
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

        // make sure that the requested relation is existing

        $isExistIdtoaccept = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($id, $iduserrequest);

        // if this relation is not existing or if the count is not equal to one, send an error, otherwise, update this requested relation by setting
        // the isAccepted to false and create a new notification and send a new jsonresponse with error setting to false

        if (!$isExistIdtoaccept || count($isExistIdtoaccept) != 1) {
            return new JsonResponse(
                [
                    "error" => true,
                    "message" => "This relation is not existing"
                ]
            );
        } else {
            $isExistIdtoaccept[0]->setIsAccepted(0);

            // remove the notification associated to this relation

            $isNotifExist = $entityManager->getRepository(Notification::class)->findBy([
                'user' => $iduserrequest,
                'sender' =>  $id,
                'type' => 1,
                'isActive' => true
            ]);

            if ($isNotifExist) {
                $entityManager->remove($isNotifExist[0]);
            }

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

        // make sure that the requested relation is existing

        $isExistIdtoaccept = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($id, $iduserrequest);

        if (!$isExistIdtoaccept || count($isExistIdtoaccept) != 1) {

            // if is not existing reverse the ids

            $isExistIdtoaccept = $entityManager->getRepository(Friend::class)->findFriendByIdRequest($iduserrequest, $id);

            // if this relation is not existing or if the count is not equal to one, send an error
            if (!$isExistIdtoaccept || count($isExistIdtoaccept) != 1) {
                return new JsonResponse(
                    [
                        "error" => true,
                        "message" => "This relation is not existing"
                    ]
                );
            }
        }

        // check if this relation is accepted or null to avoid to delete a requested relation rejected, and remove. Then, if there an existing notification, deleted it also
        // and send a jsonreponse error to false, otherwise send a jsonreponse error to true

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

        // get all the friend relation of the user, and send only the friend request by the user

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

        // get all the friend relation of the user, and send only the friend requests received and update the isseen field notification to true

        $result = [];
        foreach ($friendrequest as $key) {
            if (is_null($key->getIsAccepted())) {
                $result[$key->getIdUser()->getId()] = $key->getIdUser();
            }
        }

        $isNotifExist = $entityManager->getRepository(Notification::class)->findBy([
            'user' => $iduserrequest,
            'type' => 1,
            'isActive' => true,
            'isSeen' => false
        ]);

        if ($isNotifExist) {
            foreach ($isNotifExist as $notif) {
                $notif->setIsSeen(1);
            }
            $entityManager->flush();
        }


        return $this->render('front/friend/requestreceived.html.twig', [
            'alluser' => $result
        ]);
    }
}
