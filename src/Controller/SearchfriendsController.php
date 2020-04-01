<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;


class SearchfriendsController extends AbstractController
{
    /**
     * @Route("/searchfriends", name="searchfriends")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $allusers = $entityManager->getRepository(Users::class)->findAll();

        return $this->render('front/searchfriends/index.html.twig', [
            'alluser' => $allusers,
        ]);
    }
}
