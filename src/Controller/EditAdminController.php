<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class EditAdminController extends AbstractController
{
    /**
     * @Route("/admin/editadmin", name="edit_admin")
     */
    public function index()
    {
        return $this->render('/admin/edit_admin/index.html.twig', [
            'controller_name' => 'EditAdminController',
        ]);
    }
}
