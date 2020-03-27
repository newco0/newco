<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchfriendsController extends AbstractController
{
    /**
     * @Route("/searchfriends", name="searchfriends")
     */
    public function index()
    {
        return $this->render('front/searchfriends/index.html.twig', [
            'controller_name' => 'SearchfriendsController',
        ]);
    }
}
