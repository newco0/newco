<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\entity\Users;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;

class MyProfilController extends AbstractController
{
    /**
     * @Route("/myprofil", name="my_profil")
     */
    public function index(UserPasswordEncoderInterface $passwordEncoder, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $id = $this->getUser();
        $users = $entityManager
                ->getRepository(Users::class)
                ->find($id);
        $form = $this->createForm(InscriptionType::class, $users);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($users, $users->getPassword());
            $users->setPassword($password);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($users);
            $entityManager->flush();
            return new JsonResponse(true);
        }
        return $this->render('front/my_profil/index.html.twig', ['form' => $form->createView()]);
    }
}
