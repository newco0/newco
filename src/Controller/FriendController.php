<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Friend;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;



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
        $entityManager = $this->getDoctrine()->getManager();
        $allusers = $entityManager->getRepository(Users::class)->findAll();
        $iduserrequest = $this->getUser();
        
        return $this->render('front/searchfriends/index.html.twig', [
            'alluser' => $allusers,
            'iduserrequest' => $iduserrequest
        ]);
    }
    
    /**
     * @Route("/addfriends", name="addfriend")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $allusers = $entityManager->getRepository(Users::class)->findAll();
        $iduserrequest = $this->getUser();
        
        return $this->render('front/searchfriends/index.html.twig', [
            'alluser' => $allusers,
            'iduserrequest' => $iduserrequest
        ]);
    }

    /**
     * @Route("/deletefriendrelation/{id}", name="addfriend")
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