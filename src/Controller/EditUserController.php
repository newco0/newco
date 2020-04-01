<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;

class EditUserController extends AbstractController
{
    /**
     * @Route("/admin/edituser", name="edit_user")
     */
    public function index()
    {
        return $this->render('/admin/edit_user/index.html.twig', [
            'controller_name' => 'EditUserController',
        ]);
    }
}
