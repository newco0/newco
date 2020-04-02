<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListAdminController extends AbstractController
{
    /**
     * @Route("/admin/listadmin", name="list_admin")
     */
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $allAdmin = $entityManager->getRepository(Users::class)->findBy(['roles' => ['ROLE_ADMIN','ROLE_SUPER_ADMIN']]);

        return $this->render('/admin/list_admin/index.html.twig', [
            'allAdmin' => $allAdmin,
        ]);
    }
}
