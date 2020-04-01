<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Contact;
use App\Entity\Users;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */

    public function index(Request $request)
    {
        unset($form);
        $entityManager = $this->getDoctrine()->getManager();
        $contact = new Contact();
        $iduser = $this->getUser();
        $user = $entityManager
            ->getRepository(Users::class)
            ->find($iduser);
        $contact->setIdUser($user);
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $entityManager->persist($contact);
            $entityManager->flush();
            return new JsonResponse(true);
        }else if ($form->isSubmitted() && !$form->isValid()) {
            return $this->render('front/contact/index.html.twig', [
                'form' => $form->createView()
            ]);
        }

        return $this->render('front/contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
