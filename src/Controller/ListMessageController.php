<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListMessageController extends AbstractController
{
    /**
     * @Route("/message", name="list_message")
     */
    public function index()
    {
        return $this->render('front/list_message/index.html.twig', [
            'controller_name' => 'ListMessageController',
        ]);
    }
}
