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
        // unset the form

        unset($form);

        $entityManager = $this->getDoctrine()->getManager();

        $iduser = $this->getUser();
        $user = $entityManager
            ->getRepository(Users::class)
            ->find($iduser);

        // create a new contact with the id of the current user

        $contact = new Contact();
        $contact->setIdUser($user);

        // create a form
        
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // if the form is submitted and valid, send an response with no error

            $contact = $form->getData();

            $entityManager->persist($contact);
            $entityManager->flush();

            return new JsonResponse(["error" => false]);
        } else if ($form->isSubmitted() && !$form->isValid()) {
            // if the form is submitted but is not valid, send the form in order to display the error from the validator

            return $this->render('front/contact/index.html.twig', [
                'form' => $form->createView()
            ]);
        }

        // send the form to the view

        return $this->render('front/contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
