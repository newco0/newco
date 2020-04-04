<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
use App\Form\MyprofilType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EditUserController extends AbstractController
{
    /**
     * @Route("/admin/edituser/{id}", name="edit_user")
     */
    public function index(UserPasswordEncoderInterface $passwordEncoder, Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager
                ->getRepository(Users::class)
                ->find($id);
        $form = $this->createForm(MyprofilType::class, $users);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($users, $users->getPassword());
            $users->setPassword($password);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($users);
            $entityManager->flush();
            return new JsonResponse(true);
        }
        return $this->render('admin/edit_user/index.html.twig', ['form' => $form->createView(),'users' => $users]);
    }
}
