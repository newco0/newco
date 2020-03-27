<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListfriendsController extends AbstractController
{
    /**
     * @Route("/listfriends", name="listfriends")
     */
    public function index()
    {
        return $this->render('front/listfriends/index.html.twig', [
            'controller_name' => 'ListfriendsController',
        ]);
    }
}
