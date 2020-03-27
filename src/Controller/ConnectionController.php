<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConnectionController extends AbstractController
{
    /**
     * @Route("/connection", name="connection")
     */
    public function index()
    {
        return $this->render('front/connection/index.html.twig', [
            'controller_name' => 'ConnectionController',
        ]);
    }
}
