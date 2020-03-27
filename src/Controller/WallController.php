<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WallController extends AbstractController
{
    /**
     * @Route("/wall", name="wall")
     */
    public function index()
    {
        return $this->render('front/wall/index.html.twig', [
            'controller_name' => 'WallController',
        ]);
    }
}
