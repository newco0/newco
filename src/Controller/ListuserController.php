<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ListuserController extends AbstractController
{
    /**
     * @Route("/admin/listuser", name="listuser")
     */
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $allUsers = $entityManager->getRepository(Users::class)->findAll();

        return $this->render('admin/listuser/index.html.twig', [
            'allusers' => $allUsers,
        ]);
    }

    /**
     * @Route("/admin/listuser/updateisactive/{id}", name="updateisactive")
     */

    public function updateIsActive($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(Users::class)->find($id);
        if(!$user){
            return new JsonResponse(false);
        }
        $user->setIsActive(!$user->getIsActive());
        $entityManager->persist($user);
        $entityManager->flush();
        return new JsonResponse(true);
    }
}
