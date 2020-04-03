<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Friend;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Users;

class FriendController extends AbstractController
{
    /**
     * @Route("/listfriends", name="listfriend")
     */
    public function list()
    {
        return $this->render('front/listfriends/index.html.twig', [
            'controller_name' => 'ListfriendsController',
        ]);
    }

    /**
     * @Route("/searchfriends", name="searchfriend")
     */
    public function search()
    {
        $iduserrequest = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $allusers = $entityManager->getRepository(Users::class)->findAll();
        $allfriend = $entityManager->getRepository(Friend::class)->findFriendById($iduserrequest);
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

        return $this->render('front/searchfriends/index.html.twig', [
            'alluser' => $sortUser,
            'idfriendpending' => $resultfriendpending,
            'idfriendreceived' => $resultfriendreceived,
            'iduserrequest' => $iduserrequest
        ]);
    }

    /**
     * @Route("/addfriends/{idtoadd}", name="addfriends")
     */
    public function add($idtoadd)
    {
        $iduserrequest = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();

        if ($iduserrequest == $idtoadd) {
            return new JsonResponse([
                "error" => true,
                "message" => "Error, the user id could not be the same to the friend id"
            ]);
        }

        $userrequest = $entityManager->getRepository(Users::class)->find($iduserrequest);
        $usertoadd = $entityManager->getRepository(Users::class)->find($idtoadd);
        if (!$usertoadd) {
            return new JsonResponse(["error" => true]);
        };

        $friend = new Friend();
        $friend->setIdFriend($usertoadd);
        $userrequest->addFriend($friend);
        $entityManager->persist($friend);
        $entityManager->flush();
        return new JsonResponse(["error" => false]);
    }

    /**
     * @Route("/deletefriendrelation/{id}", name="deletefriendrelation")
     */
    public function deleterelation($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $allusers = $entityManager->getRepository(Users::class)->findAll();
        $iduserrequest = $this->getUser();

        return $this->render('front/searchfriends/index.html.twig', [
            'alluser' => $allusers,
            'iduserrequest' => $iduserrequest
        ]);
    }
}


// foreach ($allfriend as $val1) { 
                //      //getIdUser getIdFriend
                //     if ($val1->getIdUser()->getId() == $iduserrequest || $val1->getIdFriend()->getId() == $iduserrequest) {
                //         if (is_null($val1->getIsAccepted())) {
                //             $result[$key->getId()] = $key;
                //         }
                //     }
                // }
