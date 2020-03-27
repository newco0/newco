<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListAdminController extends AbstractController
{
    /**
     * @Route("/listadmin", name="list_admin")
     */
    public function index()
    {
        return $this->render('/admin/list_admin/index.html.twig', [
            'controller_name' => 'ListAdminController',
        ]);
    }
}
