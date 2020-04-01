<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminConnectionController extends AbstractController
{
    /**
     * @Route("/coucoupouette", name="admin_connection")
     */
    public function index()
    {
        return $this->render('admin/admin_connection/index.html.twig', [
            'controller_name' => 'AdminConnectionController',
        ]);
    }
}
