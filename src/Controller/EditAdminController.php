<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MyprofilType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class EditAdminController extends AbstractController
{
    /**
     * @Route("/admin/editadmin/{id}", name="edit_admin")
     */
    public function index(UserPasswordEncoderInterface $passwordEncoder, Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager
                ->getRepository(Users::class)
                ->find($id);
        $form = $this->createForm(MyprofilType::class, $users);
        $form->handleRequest($request);

        //dd($form->get('roles')->getData());

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($users, $users->getPassword());
            $users->setPassword($password);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($users);
            $entityManager->flush();
            return new JsonResponse(true);
        }
        return $this->render('/admin/edit_admin/index.html.twig', ['form' => $form->createView(),'users' => $users]);
    }
}
