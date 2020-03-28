<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
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
        $user = $entityManager
            ->getRepository(Users::class)
            ->find(2);
        $contact->setIdUser($user);
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('success', 'Message envoyé!');
            return $this->redirectToRoute('contact');
        }

        return $this->render('front/contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
