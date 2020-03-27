<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EditUserController extends AbstractController
{
    /**
     * @Route("/edituser", name="edit_user")
     */
    public function index()
    {
        return $this->render('/admin/edit_user/index.html.twig', [
            'controller_name' => 'EditUserController',
        ]);
    }
}
