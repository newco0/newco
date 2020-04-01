<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/admin/message", name="message")
     */
    public function index()
    {
        return $this->render('admin/message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
}
