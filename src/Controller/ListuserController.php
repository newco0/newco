<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListuserController extends AbstractController
{
    /**
     * @Route("/admin/listuser", name="listuser")
     */
    public function index()
    {
        return $this->render('admin/listuser/index.html.twig', [
            'controller_name' => 'ListuserController',
        ]);
    }
}
