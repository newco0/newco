<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListmessageadminController extends AbstractController
{
    /**
     * @Route("/admin/listmessageadmin", name="listmessageadmin")
     */
    public function index()
    {
        return $this->render('admin/listmessageadmin/index.html.twig', [
            'controller_name' => 'ListmessageadminController',
        ]);
    }
}
